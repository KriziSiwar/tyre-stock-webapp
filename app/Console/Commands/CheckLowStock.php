<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Locker;
use App\Models\User;
use App\Notifications\LowStockNotification;

class CheckLowStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:check-low {--threshold=5 : Minimum number of tyres before alert}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for lockers with low stock and send notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $threshold = $this->option('threshold');
        
        $this->info("Checking for lockers with less than {$threshold} tyres...");
        
        $lowStockLockers = Locker::withCount(['tyres' => function($query) {
            $query->inStock();
        }])->having('tyres_count', '<', $threshold)->get();
        
        if ($lowStockLockers->isEmpty()) {
            $this->info('No lockers with low stock found.');
            return 0;
        }
        
        $this->info("Found {$lowStockLockers->count()} lockers with low stock.");
        
        // Get users with direction role to notify
        $directionUsers = User::where('role', 'direction')->get();
        
        foreach ($lowStockLockers as $locker) {
            $this->line("Locker {$locker->code}: {$locker->tyres_count} tyres");
            
            foreach ($directionUsers as $user) {
                $user->notify(new LowStockNotification($locker));
                $this->line("Notification sent to {$user->name}");
            }
        }
        
        $this->info('Low stock notifications sent successfully.');
        return 0;
    }
}
