<?php

namespace App\Services;

use App\Jobs\UpdateWalletJob;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function deposit(array $data): void
    {
        $order_id = $data['order_id'];
        $amount = $data['amount'];
        $timestamp = now()->timestamp;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.base64_encode('Sheena Muhammmad Ali Zien'),
        ])->post('https://yourdomain.com/deposit', [
            'order_id' => $order_id,
            'amount' => $amount,
            'timestamp' => $timestamp,
        ]);

        $status = $response->json()['status'];

        $wallet = null;
        if ($status == 1) {
            $wallet = Wallet::whereUserId(auth()->id())->firstOrFail();
            UpdateWalletJob::dispatch($wallet->id, $amount);
        }

        Transaction::create([
            'wallet_id' => $wallet->id,
            'order_id' => $order_id,
            'amount' => $amount,
            'status' => $status,
            'type' => 'deposit',
        ]);
    }

    public function withdrawal(array $data): void
    {
        $amount = $data['amount'];
        $timestamp = now()->timestamp;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.base64_encode('Sheena Muhammmad Ali Zien'),
        ])->post('https://yourdomain.com/withdrawal', [
            'amount' => $amount,
            'timestamp' => $timestamp,
        ]);

        $status = $response->json()['status'];

        $wallet = null;
        if ($status == 1) {
            $wallet = Wallet::whereUserId(auth()->id())->firstOrFail();
            UpdateWalletJob::dispatch($wallet->id, $amount, 'withdrawal');
        }

        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $amount,
            'status' => $status,
            'type' => 'deposit',
        ]);
    }
}
