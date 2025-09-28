<?php

namespace App\Http\Controllers;

use App\Models\Tyre;
use App\Models\Vehicle;
use App\Models\Locker;
use App\Models\StockMovement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function stockSummary()
    {
        $totalTyres = Tyre::count();
        $inStockTyres = Tyre::inStock()->count();
        $removedTyres = $totalTyres - $inStockTyres;
        
        $tyresBySeason = Tyre::inStock()
            ->select('season', DB::raw('count(*) as count'))
            ->groupBy('season')
            ->get();
            
        $tyresByWear = Tyre::inStock()
            ->select('wear', DB::raw('count(*) as count'))
            ->groupBy('wear')
            ->get();
            
        $lockerUtilization = Locker::withCount(['tyres' => function($query) {
            $query->inStock();
        }])->get();
        
        $recentMovements = StockMovement::with(['tyre', 'user'])
            ->latest('date')
            ->take(10)
            ->get();

        return view('reports.stock-summary', compact(
            'totalTyres',
            'inStockTyres', 
            'removedTyres',
            'tyresBySeason',
            'tyresByWear',
            'lockerUtilization',
            'recentMovements'
        ));
    }

    public function movementReport(Request $request)
    {
        $query = StockMovement::with(['tyre.vehicle', 'tyre.locker', 'user']);
        
        if ($request->filled('start_date')) {
            $query->where('date', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->where('date', '<=', $request->end_date);
        }
        
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }
        
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        
        $movements = $query->latest('date')->paginate(50);
        $users = User::all();
        
        return view('reports.movement-report', compact('movements', 'users'));
    }

    public function vehicleReport()
    {
        $vehicles = Vehicle::withCount(['tyres' => function($query) {
            $query->inStock();
        }])->orderBy('tyres_count', 'desc')->get();
        
        return view('reports.vehicle-report', compact('vehicles'));
    }

    public function exportStock(Request $request)
    {
        $tyres = Tyre::with(['vehicle', 'locker'])
            ->when($request->filled('season'), function($query) use ($request) {
                return $query->where('season', $request->season);
            })
            ->when($request->filled('wear'), function($query) use ($request) {
                return $query->where('wear', $request->wear);
            })
            ->when($request->filled('type'), function($query) use ($request) {
                return $query->where('type', $request->type);
            })
            ->get();
            
        $filename = 'stock_report_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($tyres) {
            $file = fopen('php://output', 'w');
            
            // Headers
            fputcsv($file, [
                'ID', 'Dimension', 'Type', 'Wear', 'Season', 
                'Vehicle', 'Chassis', 'Locker', 'Status', 'Created At'
            ]);
            
            foreach ($tyres as $tyre) {
                fputcsv($file, [
                    $tyre->id,
                    $tyre->dimension,
                    $tyre->type,
                    $tyre->wear,
                    $tyre->season,
                    $tyre->vehicle ? $tyre->vehicle->marque . ' ' . $tyre->vehicle->modele : '',
                    $tyre->vehicle ? $tyre->vehicle->chassis_number : '',
                    $tyre->locker ? $tyre->locker->code : '',
                    $tyre->removed_at ? 'Removed' : 'In Stock',
                    $tyre->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function dashboard()
    {
        // Monthly statistics
        $currentMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();
        
        $monthlyStats = [
            'current' => [
                'entries' => StockMovement::where('action', 'entry')
                    ->whereMonth('date', $currentMonth->month)
                    ->whereYear('date', $currentMonth->year)
                    ->count(),
                'removals' => StockMovement::where('action', 'removal')
                    ->whereMonth('date', $currentMonth->month)
                    ->whereYear('date', $currentMonth->year)
                    ->count(),
            ],
            'previous' => [
                'entries' => StockMovement::where('action', 'entry')
                    ->whereMonth('date', $lastMonth->month)
                    ->whereYear('date', $lastMonth->year)
                    ->count(),
                'removals' => StockMovement::where('action', 'removal')
                    ->whereMonth('date', $lastMonth->month)
                    ->whereYear('date', $lastMonth->year)
                    ->count(),
            ]
        ];
        
        // Top users by activity
        $topUsers = User::withCount(['stockMovements' => function($query) {
            $query->where('date', '>=', Carbon::now()->subDays(30));
        }])->orderBy('stock_movements_count', 'desc')->take(5)->get();
        
        // Low stock alerts (lockers with few tyres)
        $lowStockLockers = Locker::withCount(['tyres' => function($query) {
            $query->inStock();
        }])->having('tyres_count', '<', 5)->get();
        
        return view('reports.dashboard', compact('monthlyStats', 'topUsers', 'lowStockLockers'));
    }
} 