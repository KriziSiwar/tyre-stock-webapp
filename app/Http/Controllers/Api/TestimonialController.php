<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $testimonials = Testimonial::where('is_active', true)
                ->orderBy('order')
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => $testimonials,
                'message' => 'Témoignages récupérés avec succès',
                'count' => $testimonials->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des témoignages',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'client_name' => 'required|string|max:255',
                'company' => 'nullable|string|max:255',
                'testimonial' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'photo' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'boolean'
            ]);

            $testimonial = Testimonial::create($request->all());

            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Témoignage créé avec succès'
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création du témoignage',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial): JsonResponse
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Témoignage récupéré avec succès'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération du témoignage',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial): JsonResponse
    {
        try {
            $request->validate([
                'client_name' => 'sometimes|required|string|max:255',
                'company' => 'nullable|string|max:255',
                'testimonial' => 'sometimes|required|string',
                'rating' => 'sometimes|required|integer|min:1|max:5',
                'photo' => 'nullable|string|max:255',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'boolean'
            ]);

            $testimonial->update($request->all());

            return response()->json([
                'success' => true,
                'data' => $testimonial,
                'message' => 'Témoignage mis à jour avec succès'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du témoignage',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial): JsonResponse
    {
        try {
            $testimonial->delete();

            return response()->json([
                'success' => true,
                'message' => 'Témoignage supprimé avec succès'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du témoignage',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
