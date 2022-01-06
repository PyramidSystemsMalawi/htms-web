<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Carbon\Carbon;
class DbBackup extends Command
{

    protected $signature = 'db:backup';

    protected $description = 'Create Database Backup';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
    }
}