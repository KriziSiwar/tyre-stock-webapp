<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;
use App\Models\Vehicle;
use App\Models\Locker;
use App\Models\StockMovement;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class TyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Tyre::with(['vehicle', 'locker'])->inStock();
        $search = $request->input('search');
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->whereHas('vehicle', function($v) use ($search) {
                    $v->where('chassis_number', 'like', "%$search%")
                      ->orWhere('marque', 'like', "%$search%")
                      ->orWhere('modele', 'like', "%$search%")
                      ->orWhere('owner_name', 'like', "%$search%")
                      ->orWhere('owner_phone', 'like', "%$search%")
                      ;
                })
                ->orWhere('dimension', 'like', "%$search%")
                ->orWhere('type', 'like', "%$search%")
                ->orWhere('wear', 'like', "%$search%")
                ->orWhere('season', 'like', "%$search%")
                ->orWhere('qr_code', 'like', "%$search%")
                ;
            });
        }
        $tyres = $query->orderBy('created_at', 'desc')->get();
        return view('tyres.index', compact('tyres', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::orderBy('chassis_number')->get();
        $lockers = Locker::orderBy('code')->get();
        return view('tyres.create', compact('vehicles', 'lockers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'locker_id' => 'nullable|exists:lockers,id',
            'dimension' => 'required|string',
            'type' => 'required|string',
            'wear' => 'required|string',
            'season' => 'nullable|string',
            'qr_code' => 'nullable|string',
        ]);
        $tyre = Tyre::create($validated);
        // Log stock movement (entrée)
        StockMovement::create([
            'tyre_id' => $tyre->id,
            'action' => 'entrée',
            'user_id' => Auth::id(),
            'date' => now(),
            'notes' => 'Ajout du pneu en stock',
        ]);
        // Audit log
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'create_tyre',
            'target_type' => 'Tyre',
            'target_id' => $tyre->id,
            'details' => json_encode($tyre->toArray()),
        ]);
        return redirect()->route('tyres.index')->with('success', 'Pneu ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tyre = Tyre::findOrFail($id);
        $old = $tyre->toArray();
        $tyre->removed_at = now();
        $tyre->save();
        // Log stock movement (sortie)
        StockMovement::create([
            'tyre_id' => $tyre->id,
            'action' => 'sortie',
            'user_id' => Auth::id(),
            'date' => now(),
            'notes' => 'Sortie du pneu du stock',
        ]);
        // Audit log
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'remove_tyre',
            'target_type' => 'Tyre',
            'target_id' => $tyre->id,
            'details' => json_encode($old),
        ]);
        return redirect()->route('tyres.index')->with('success', 'Pneu retiré du stock avec succès.');
    }
}
