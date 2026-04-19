<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    
    protected $commands = [
       'App\Console\Commands\AddRate',
    //    'App\Console\Commands\GetGoldRate',
        //  'App\Console\Commands\GetGoldRateFromCHGold',
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('addrate:cron')->everyFifteenMinutes();
        // $schedule->command('getgoldrate:cron')->everySixHours();
        // $schedule->command('getgoldrate:cron')->dailyAt('10:00');
        // $schedule->command('getgoldrate:cron')->dailyAt('12:00');
        // $schedule->command('getgoldrate:cron')->dailyAt('15:00');
        // $schedule->command('getgoldrate:cron')->dailyAt('17:00');
        // $schedule->command('getgoldratefromchgold:cron')->everyMinute();

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
