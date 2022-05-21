<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\Backend\Profile\Profile;

Route::middleware(['verified', 'auth'])->group(function () {
	Route::get('profile', Profile::class)->name('profile');
});
