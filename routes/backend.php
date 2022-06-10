<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Profile\Profile;
use App\Http\Livewire\Backend\User\All;

Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('profile', Profile::class)->name('profile');

    Route::get('/user', All::class)->name('user');
});
