<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = ['direction', 'logistique', 'bureau'];
        return view('users.create', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:direction,logistique,bureau',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'create_user',
            'target_type' => 'User',
            'target_id' => $user->id,
            'details' => json_encode(['name' => $user->name, 'email' => $user->email, 'role' => $user->role]),
        ]);
        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
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
        $user = User::findOrFail($id);
        $roles = ['direction', 'logistique', 'bureau'];
        return view('users.edit', compact('user', 'roles'));
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
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:direction,logistique,bureau',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        $old = $user->toArray();
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->save();
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'update_user',
            'target_type' => 'User',
            'target_id' => $user->id,
            'details' => json_encode(['old' => $old, 'new' => $user->toArray()]),
        ]);
        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if ($user->trashed()) {
            $user->forceDelete();
            Audit::create([
                'user_id' => Auth::id(),
                'action' => 'delete_user',
                'target_type' => 'User',
                'target_id' => $user->id,
                'details' => json_encode(['name' => $user->name, 'email' => $user->email]),
            ]);
            return redirect()->route('users.index')->with('success', 'Utilisateur supprimé définitivement.');
        } else {
            $user->delete();
            Audit::create([
                'user_id' => Auth::id(),
                'action' => 'deactivate_user',
                'target_type' => 'User',
                'target_id' => $user->id,
                'details' => json_encode(['name' => $user->name, 'email' => $user->email]),
            ]);
            return redirect()->route('users.index')->with('success', 'Utilisateur désactivé avec succès.');
        }
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'reactivate_user',
            'target_type' => 'User',
            'target_id' => $user->id,
            'details' => json_encode(['name' => $user->name, 'email' => $user->email]),
        ]);
        return redirect()->route('users.index')->with('success', 'Utilisateur réactivé avec succès.');
    }

    public function auditsIndex()
    {
        $audits = \App\Models\Audit::with('user')->orderBy('created_at', 'desc')->limit(100)->get();
        return view('users.audits', compact('audits'));
    }
}
