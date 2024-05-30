<?php

namespace App\Livewire;

use App\Models\Wallet;
use Livewire\Component;

class Dashboard extends Component
{
    public Wallet $wallet;

    public function mount()
    {
        $this->wallet = Wallet::whereUserId(auth()->id())
            ->first();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
