<?php

namespace App\Livewire;

use App\Models\Wallet;
use App\Services\PaymentService;
use Livewire\Component;

class WithdrawalForm extends Component
{
    public $form = ['amount' => null];

    public function submit(PaymentService $paymentService)
    {
        $this->validate([
            'form.amount' => ['required', 'numeric', function ($attr, $value, $fail) {
                $wallet = Wallet::whereUserId(auth()->id())->firstOrFail();
                if ($wallet->balance < $value) {
                    $fail('Balance is less than with your amount');
                }
            }],
        ]);

        $paymentService->withdrawal([
            'amount' => $this->form['amount'],
        ]);

        $this->redirect(route('dashboard'));

        $this->form = ['amount' => null];
    }

    public function render()
    {
        return view('livewire.withdrawal-form');
    }
}
