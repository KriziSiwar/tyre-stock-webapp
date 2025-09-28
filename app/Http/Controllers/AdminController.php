<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;
use App\Models\Locker;
use App\Models\StockMovement;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalTyres = Tyre::inStock()->count();
        $tyresAddedThisWeek = Tyre::where('created_at', '>=', Carbon::now()->startOfWeek())->count();
        $tyresRemovedThisWeek = Tyre::whereNotNull('removed_at')->where('removed_at', '>=', Carbon::now()->startOfWeek())->count();
        $totalLockers = Locker::count();
        $usedLockers = Tyre::inStock()->whereNotNull('locker_id')->distinct('locker_id')->count('locker_id');
        $recentMovements = StockMovement::with(['tyre.vehicle', 'user'])->orderBy('date', 'desc')->limit(5)->get();
        return view('admin.dashboard', compact('totalTyres', 'tyresAddedThisWeek', 'tyresRemovedThisWeek', 'totalLockers', 'usedLockers', 'recentMovements'));
    }

    public function movementsTable(Request $request)
    {
        $query = StockMovement::with(['tyre.vehicle', 'user']);
        $period = $request->get('period', 'week');
        if ($period === 'week') {
            $query->where('date', '>=', now()->startOfWeek());
        } elseif ($period === 'month') {
            $query->where('date', '>=', now()->startOfMonth());
        } elseif ($period === 'custom') {
            if ($request->filled('start')) {
                $query->where('date', '>=', $request->start);
            }
            if ($request->filled('end')) {
                $query->where('date', '<=', $request->end);
            }
        }
        $movements = $query->orderBy('date', 'desc')->limit(20)->get();
        return view('admin.partials.movements-table', compact('movements'))->render();
    }

    public function movementsChart(Request $request)
    {
        $period = $request->get('period', 'week');
        $start = null;
        $end = null;
        if ($period === 'week') {
            $start = now()->startOfWeek();
            $end = now();
            $interval = 'day';
        } elseif ($period === 'month') {
            $start = now()->startOfMonth();
            $end = now();
            $interval = 'day';
        } elseif ($period === 'custom') {
            $start = $request->filled('start') ? Carbon::parse($request->start) : now()->startOfMonth();
            $end = $request->filled('end') ? Carbon::parse($request->end) : now();
            $interval = 'day';
        }
        $labels = [];
        $entries = [];
        $removals = [];
        $periodRange = 
            $interval === 'day'
            ? new \DatePeriod($start, new \DateInterval('P1D'), $end->copy()->addDay())
            : [];
        foreach ($periodRange as $date) {
            $label = $date->format('d/m');
            $labels[] = $label;
            $entries[] = StockMovement::where('action', 'entry')->whereDate('date', $date)->count();
            $removals[] = StockMovement::where('action', 'removal')->whereDate('date', $date)->count();
        }
        return response()->json([
            'labels' => $labels,
            'entries' => $entries,
            'removals' => $removals,
        ]);
    }

    public function movementsExport(Request $request)
    {
        $query = StockMovement::with(['tyre.vehicle', 'user']);
        $period = $request->get('period', 'week');
        if ($period === 'week') {
            $query->where('date', '>=', now()->startOfWeek());
        } elseif ($period === 'month') {
            $query->where('date', '>=', now()->startOfMonth());
        } elseif ($period === 'custom') {
            if ($request->filled('start')) {
                $query->where('date', '>=', $request->start);
            }
            if ($request->filled('end')) {
                $query->where('date', '<=', $request->end);
            }
        }
        $movements = $query->orderBy('date', 'desc')->get();
        $filename = 'mouvements_stock_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        $callback = function() use ($movements) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Date', 'Action', 'Pneu (ID)', 'Véhicule', 'Utilisateur', 'Notes']);
            foreach ($movements as $move) {
                fputcsv($file, [
                    $move->date,
                    $move->action,
                    $move->tyre ? $move->tyre->id : '',
                    $move->tyre && $move->tyre->vehicle ? $move->tyre->vehicle->chassis_number : '',
                    $move->user ? $move->user->name : '',
                    $move->notes
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
} 