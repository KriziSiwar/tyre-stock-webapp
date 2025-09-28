<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tyre;
use App\Models\Vehicle;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TyreApiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Tyre::with(['vehicle', 'locker']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('dimension', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('season', 'like', "%{$search}%")
                  ->orWhereHas('vehicle', function($vq) use ($search) {
                      $vq->where('chassis_number', 'like', "%{$search}%")
                         ->orWhere('marque', 'like', "%{$search}%")
                         ->orWhere('modele', 'like', "%{$search}%");
                  });
            });
        }
        
        if ($request->filled('season')) {
            $query->where('season', $request->season);
        }
        
        if ($request->filled('wear')) {
            $query->where('wear', $request->wear);
        }
        
        if ($request->filled('status')) {
            if ($request->status === 'in_stock') {
                $query->inStock();
            } elseif ($request->status === 'removed') {
                $query->whereNotNull('removed_at');
            }
        }
        
        $tyres = $query->paginate(20);
        
        return response()->json([
            'success' => true,
            'data' => $tyres->items(),
            'pagination' => [
                'current_page' => $tyres->currentPage(),
                'last_page' => $tyres->lastPage(),
                'per_page' => $tyres->perPage(),
                'total' => $tyres->total()
            ]
        ]);
    }

    public function show($id): JsonResponse
    {
        $tyre = Tyre::with(['vehicle', 'locker'])->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $tyre
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'locker_id' => 'required|exists:lockers,id',
            'dimension' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'wear' => 'required|string|max:255',
            'season' => 'required|string|max:255',
        ]);
        
        $tyre = Tyre::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Pneu ajouté avec succès',
            'data' => $tyre->load(['vehicle', 'locker'])
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $tyre = Tyre::findOrFail($id);
        
        $request->validate([
            'vehicle_id' => 'sometimes|exists:vehicles,id',
            'locker_id' => 'sometimes|exists:lockers,id',
            'dimension' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
            'wear' => 'sometimes|string|max:255',
            'season' => 'sometimes|string|max:255',
        ]);
        
        $tyre->update($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Pneu mis à jour avec succès',
            'data' => $tyre->load(['vehicle', 'locker'])
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $tyre = Tyre::findOrFail($id);
        $tyre->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Pneu supprimé avec succès'
        ]);
    }

    public function searchByQr($qrCode): JsonResponse
    {
        $tyre = Tyre::with(['vehicle', 'locker'])
            ->where('qr_code', $qrCode)
            ->first();
        
        if (!$tyre) {
            return response()->json([
                'success' => false,
                'message' => 'Pneu non trouvé'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $tyre
        ]);
    }

    public function statistics(): JsonResponse
    {
        $stats = [
            'total' => Tyre::count(),
            'in_stock' => Tyre::inStock()->count(),
            'removed' => Tyre::whereNotNull('removed_at')->count(),
            'by_season' => Tyre::inStock()
                ->selectRaw('season, count(*) as count')
                ->groupBy('season')
                ->get(),
            'by_wear' => Tyre::inStock()
                ->selectRaw('wear, count(*) as count')
                ->groupBy('wear')
                ->get(),
        ];
        
        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
} 