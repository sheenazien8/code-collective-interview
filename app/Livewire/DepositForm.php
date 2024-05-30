<?php

namespace App\Livewire;

use App\Services\PaymentService;
use Livewire\Component;

class DepositForm extends Component
{
    public $form = [
        'order_id' => null,
        'amount' => null,
    ];

    public function submit(PaymentService $paymentService)
    {
        $this->validate([
            'form.order_id' => 'required',
            'form.amount' => 'required|numeric',
        ]);

        $paymentService->deposit([
            'order_id' => $this->form['order_id'],
            'amount' => $this->form['amount'],
        ]);

        $this->form = [
            'order_id' => null,
            'amount' => null,
        ];
    }

    public function render()
    {
        return view('livewire.deposit-form');
    }
}
