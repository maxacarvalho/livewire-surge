<?php

Route::get('/', function () {
    return ['success!'];
});

// Auth
Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth.login')->layout('layouts.base')->name('auth.login');
    Route::livewire('/register', 'auth.register')->layout('layouts.base')->name('auth.register');

    Route::post('/logout', function() {
        auth()->logout(); return redirect('/login');
    })->name('logout');
});
