<?php

namespace App\Console;

use App\Http\Controllers\Crawler\Concursos\ConcursoNewsController;
use App\Http\Controllers\Crawler\Concursos\FolhaDirigidaController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(new ConcursoNewsController())->hourly()->between('7:00', '22:00');

        $schedule->call(new FolhaDirigidaController())->hourly()->between('7:00', '22:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
