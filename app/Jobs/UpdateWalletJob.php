<?php

namespace App\Jobs;

use App\Models\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateWalletJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $wallet_id;

    protected $amount;

    protected $type;

    public function __construct($wallet_id, $amount, $type = 'deposit')
    {
        $this->wallet_id = $wallet_id;
        $this->amount = $amount;
        $this->type = $type;
    }

    public function handle()
    {
        $wallet = Wallet::find($this->wallet_id);
        if ($this->type == 'deposit') {
            $wallet->balance += $this->amount;
        }

        if ($this->type == 'withdrawal') {
            $wallet->balance -= $this->amount;
        }
        $wallet->save();
    }
}
