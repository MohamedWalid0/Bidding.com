<?php

namespace App\Console;

use App\Console\Commands\DeadlineBidCommand;
use App\Console\Commands\HandleBidCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\ShortSchedule\ShortSchedule;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        HandleBidCommand::class,
        DeadlineBidCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     * to run this commands run => php artisan schedule:work
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('watch:product')->hourly()->withoutOverlapping();
        $schedule->command('bid:notify')->everyFifteenMinutes()->withoutOverlapping();
    }
//    protected function shortSchedule(ShortSchedule $schedule)
//    {
//        // this artisan command will run every second
////        $schedule->command('watch:product')->everySecond()->withoutOverlapping();
//    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
