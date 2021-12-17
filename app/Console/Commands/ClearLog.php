<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Log;
use Log as fileLog;
use DB;

class ClearLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command used for clear all log data';

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
        // Log::orderBy('log_id','desc')->skip(3)->take(10)->delete();
        // $log = DB::table('logs')->orderBy('log_id', 'desc')->skip(6)->take(5)->delete();
        $log = DB::table('logs')->orderBy('log_id', 'asc')->skip(6)->take(1)->delete();
        fileLog::info('Clear Log');
        return $this->info('Success');
    }
}
