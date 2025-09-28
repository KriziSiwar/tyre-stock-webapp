<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistic;
use Illuminate\Support\Facades\Cache;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::orderBy('order')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'category' => 'required|string|max:50',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        Statistic::create($request->all());
        
        // Clear cache
        Cache::forget('statistics');
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        return view('admin.statistics.show', compact('statistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'category' => 'required|string|max:50',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $statistic->update($request->all());
        
        // Clear cache
        Cache::forget('statistics');
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        
        // Clear cache
        Cache::forget('statistics');
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique supprimée avec succès.');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Statistic $statistic)
    {
        $statistic->update(['is_active' => !$statistic->is_active]);
        
        // Clear cache
        Cache::forget('statistics');
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statut de la statistique modifié.');
    }

    /**
     * Update order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'statistics' => 'required|array',
            'statistics.*.id' => 'required|exists:statistics,id',
            'statistics.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->statistics as $item) {
            Statistic::where('id', $item['id'])->update(['order' => $item['order']]);
        }
        
        // Clear cache
        Cache::forget('statistics');
        
        return response()->json(['success' => true]);
    }
}
