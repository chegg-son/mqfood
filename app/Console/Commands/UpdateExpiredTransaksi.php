<?php

namespace App\Console\Commands;

use App\Models\Transaksi;
use Illuminate\Console\Command;

class UpdateExpiredTransaksi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $affected = Transaksi::where('status', 'pending')
            ->where('expired_at', '<', now())
            ->update(['status' => 'expired']);

        $this->info("{$affected} transaksi expired.");
    }
}
