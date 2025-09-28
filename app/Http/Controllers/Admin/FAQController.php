<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Facades\Cache;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::orderBy('order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:50',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        FAQ::create($request->all());
        
        // Clear cache
        Cache::forget('faqs');
        
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:50',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $faq->update($request->all());
        
        // Clear cache
        Cache::forget('faqs');
        
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        
        // Clear cache
        Cache::forget('faqs');
        
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ supprimée avec succès.');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(FAQ $faq)
    {
        $faq->update(['is_active' => !$faq->is_active]);
        
        // Clear cache
        Cache::forget('faqs');
        
        return redirect()->route('admin.faqs.index')
            ->with('success', 'Statut de la FAQ modifié.');
    }

    /**
     * Update order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'faqs' => 'required|array',
            'faqs.*.id' => 'required|exists:faqs,id',
            'faqs.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->faqs as $item) {
            FAQ::where('id', $item['id'])->update(['order' => $item['order']]);
        }
        
        // Clear cache
        Cache::forget('faqs');
        
        return response()->json(['success' => true]);
    }
}
