<?php

use App\Livewire\Dashboard;
use App\Livewire\DepositForm;
use App\Livewire\WithdrawalForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/deposit', DepositForm::class)->name('deposit.index');

Route::get('/withdrawal', WithdrawalForm::class)->name('withdrawal.index');

require __DIR__.'/auth.php';
