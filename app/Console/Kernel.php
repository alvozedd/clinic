<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
<<<<<<< HEAD
=======
        $schedule->command('inventory:check-low-stock')->daily();
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
<<<<<<< HEAD
}
=======
    protected $routeMiddleware = [
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];
}

>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
