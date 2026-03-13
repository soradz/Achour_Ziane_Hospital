<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * هنا تقدر تحدد أي أوامر تريد تتنفذ تلقائياً بالجدول الزمني
     * مثال: $schedule->command('inspire')->hourly();
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // مثال للأوامر المجدولة
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * هنا يتم تحميل جميع أوامر الـ Artisan الخاصة بك.
     *
     * @return void
     */
    protected function commands()
    {
        // تحميل أوامر موجودة في مجلد Commands
        $this->load(__DIR__.'/Commands');

        // تحميل أوامر الـ console المعرفة في routes/console.php
        require base_path('routes/console.php');
    }
}
