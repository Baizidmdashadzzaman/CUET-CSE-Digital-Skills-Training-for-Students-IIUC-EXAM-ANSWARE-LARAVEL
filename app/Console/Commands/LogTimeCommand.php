<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logs or outputs the current time every 30 seconds';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = now()->toDateTimeString();
        Log::info("Current Time: {$currentTime}");
        $this->info("Current Time: {$currentTime}");
    }
}

