<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     *
     * @return int
     */
    public function handle()
    {
        $db = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');
        $path = storage_path('backups');
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        $filename = $path . '/backup_' . date('Ymd_His') . '.sql';
        $command = "mysqldump -h{$host} -u{$user} -p{$pass} {$db} > {$filename}";
        $result = null;
        $output = null;
        exec($command, $output, $result);
        if ($result === 0) {
            $this->info('Database backup created: ' . $filename);
        } else {
            $this->error('Database backup failed.');
        }
    }
}
