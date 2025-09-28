<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locker;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Locker::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('code', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ;
        }
        $lockers = $query->orderBy('created_at', 'desc')->get();
        return view('lockers.index', compact('lockers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lockers.create');
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
            'code' => 'required|string|unique:lockers,code',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $locker = Locker::create($validated);
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'create_locker',
            'target_type' => 'Locker',
            'target_id' => $locker->id,
            'details' => json_encode($locker->toArray()),
        ]);
        return redirect()->route('lockers.index')->with('success', 'Casier ajouté avec succès.');
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
        $locker = Locker::findOrFail($id);
        $old = $locker->toArray();
        $validated = $request->validate([
            'code' => 'required|string|unique:lockers,code,' . $locker->id,
            'location' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $locker->update($validated);
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'update_locker',
            'target_type' => 'Locker',
            'target_id' => $locker->id,
            'details' => json_encode(['old' => $old, 'new' => $locker->toArray()]),
        ]);
        return redirect()->route('lockers.index')->with('success', 'Casier modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locker = Locker::findOrFail($id);
        $old = $locker->toArray();
        $locker->delete();
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'delete_locker',
            'target_type' => 'Locker',
            'target_id' => $locker->id,
            'details' => json_encode($old),
        ]);
        return redirect()->route('lockers.index')->with('success', 'Casier supprimé avec succès.');
    }

    public function showQr($id)
    {
        $locker = Locker::findOrFail($id);
        return view('lockers.qr', compact('locker'));
    }
}
