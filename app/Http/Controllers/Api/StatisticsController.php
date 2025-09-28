<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistic;
use App\Models\Tyre;
use App\Models\StockMovement;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class StatisticsController extends Controller
{
    /**
     * Get real-time statistics
     */
    public function realtime()
    {
        $data = Cache::remember('api.realtime.stats', 300, function () {
            return [
                'current_tires' => Tyre::where('is_active', true)->count(),
                'today_movements' => StockMovement::whereDate('created_at', today())->count(),
                'active_users' => User::where('last_login_at', '>=', now()->subMinutes(30))->count(),
                'system_status' => '100%',
                'last_updated' => now()->format('Y-m-d H:i:s')
            ];
        });

        return response()->json($data);
    }

    /**
     * Get all statistics
     */
    public function all()
    {
        $statistics = Cache::remember('api.statistics.all', 1800, function () {
            return Statistic::where('is_active', true)
                ->orderBy('order')
                ->get()
                ->groupBy('category');
        });

        return response()->json($statistics);
    }

    /**
     * Get metrics statistics
     */
    public function metrics()
    {
        $metrics = Cache::remember('api.statistics.metrics', 1800, function () {
            return Statistic::where('is_active', true)
                ->where('category', 'metric')
                ->orderBy('order')
                ->get();
        });

        return response()->json($metrics);
    }

    /**
     * Get performance statistics
     */
    public function performance()
    {
        $performance = Cache::remember('api.statistics.performance', 1800, function () {
            return Statistic::where('is_active', true)
                ->where('category', 'performance')
                ->orderBy('order')
                ->get();
        });

        return response()->json($performance);
    }

    /**
     * Get chart data
     */
    public function charts()
    {
        $data = Cache::remember('api.statistics.charts', 3600, function () {
            // Growth data (last 12 months)
            $growthData = [];
            for ($i = 11; $i >= 0; $i--) {
                $date = now()->subMonths($i);
                $growthData[] = [
                    'month' => $date->format('M'),
                    'value' => rand(3000 + $i * 250, 3500 + $i * 250)
                ];
            }

            // Distribution data
            $distributionData = [
                ['label' => 'Été', 'value' => 35, 'color' => '#ff9100'],
                ['label' => 'Hiver', 'value' => 30, 'color' => '#e67e00'],
                ['label' => '4 Saisons', 'value' => 25, 'color' => '#f39c12'],
                ['label' => 'Performance', 'value' => 10, 'color' => '#e74c3c']
            ];

            // Performance data
            $performanceData = [
                'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
                'datasets' => [
                    [
                        'label' => 'Satisfaction Client',
                        'data' => [95, 97, 98, 99],
                        'backgroundColor' => '#ff9100'
                    ],
                    [
                        'label' => 'Efficacité Opérationnelle',
                        'data' => [88, 92, 95, 97],
                        'backgroundColor' => '#e67e00'
                    ]
                ]
            ];

            return [
                'growth' => $growthData,
                'distribution' => $distributionData,
                'performance' => $performanceData
            ];
        });

        return response()->json($data);
    }
}
