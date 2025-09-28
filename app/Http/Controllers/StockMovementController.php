<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockMovement;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        $query = StockMovement::with(['tyre.vehicle', 'user']);
        $search = $request->input('search');
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('tyre_id', 'like', "%$search%")
                  ->orWhere('action', 'like', "%$search%")
                  ->orWhere('date', 'like', "%$search%")
                  ->orWhere('notes', 'like', "%$search%")
                  ;
            })
            ->orWhereHas('tyre.vehicle', function($v) use ($search) {
                $v->where('chassis_number', 'like', "%$search%")
                  ->orWhere('marque', 'like', "%$search%")
                  ->orWhere('modele', 'like', "%$search%")
                  ;
            })
            ->orWhereHas('user', function($u) use ($search) {
                $u->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ;
            });
        }
        $movements = $query->orderBy('date', 'desc')->get();
        return view('stock_movements.index', compact('movements', 'search'));
    }

    public function tyre($tyreId)
    {
        $movements = StockMovement::with(['tyre.vehicle', 'user'])
            ->where('tyre_id', $tyreId)
            ->orderBy('date', 'desc')
            ->get();
        return view('stock_movements.tyre', compact('movements', 'tyreId'));
    }

    public function store(Request $request)
    {
        $movement = StockMovement::create($request->all());
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'create_stock_movement',
            'target_type' => 'StockMovement',
            'target_id' => $movement->id,
            'details' => json_encode($movement->toArray()),
        ]);
    }
}
