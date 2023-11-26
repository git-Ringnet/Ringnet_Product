<?php

namespace App\Console;

use App\Models\PayExport;
use App\Models\PayOder;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $payOrder = PayOder::all();
            if ($payOrder) {
                foreach ($payOrder as $pay) {
                    $startDate = Carbon::now()->startOfDay();
                    $endDate = Carbon::parse($pay->payment_date);
                    $daysDiffss = $startDate->diffInDays($endDate);

                    if ($endDate < $startDate) {
                        $daysDiff = -$daysDiffss;
                    } else {
                        $daysDiff = $daysDiffss;
                    }

                    // Cập nhật lại tình trạng đơn hàng
                    if ($daysDiff <= 3 && $daysDiff > 0) {
                        $status = 3;
                    } elseif ($daysDiff == 0) {
                        $status = 5;
                    } elseif ($daysDiff < 0) {
                        $status = 4;
                    } else {
                        $status = 1;
                    }
                    $dataUpdate = [
                        'status' => $status,
                    ];
                    DB::table('pay_order')->where('id', $pay->id)->update($dataUpdate);
                }
            }
            //
            $payExport = PayExport::all();
            if ($payExport) {
                foreach ($payExport as $pay) {
                    $startDate = Carbon::now()->startOfDay();
                    $endDate = Carbon::parse($pay->payment_date);
                    $daysDiffss = $startDate->diffInDays($endDate);

                    if ($endDate < $startDate) {
                        $daysDiff = -$daysDiffss;
                    } else {
                        $daysDiff = $daysDiffss;
                    }

                    // Cập nhật lại tình trạng đơn hàng
                    if ($daysDiff <= 3 && $daysDiff > 0) {
                        $status = 3;
                    } elseif ($daysDiff == 0) {
                        $status = 5;
                    } elseif ($daysDiff < 0) {
                        $status = 4;
                    } else {
                        $status = 1;
                    }
                    $dataUpdate = [
                        'status' => $status,
                    ];
                    DB::table('pay_export')->where('id', $pay->id)->update($dataUpdate);
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
