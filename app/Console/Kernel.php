<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    
    protected $commands = [
       'App\Console\Commands\AddRate',
       'App\Console\Commands\GetGoldRate',
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('addrate:cron')->everyTwoMinutes();
        $schedule->command('getgoldrate:cron')->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        //$this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
