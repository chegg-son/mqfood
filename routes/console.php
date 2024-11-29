<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Register your scheduler logic
app()->singleton(Schedule::class, function ($app) {
    return tap(new Schedule, function ($schedule) {
        // Schedule your custom command
        $schedule->command('transaksi:update-expired')->everyMinute(); // Runs every minute
    });
});
