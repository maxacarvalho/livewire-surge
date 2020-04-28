<?php

Route::redirect('/', 'dashboard');

/**
 * App Routes
 */
Route::middleware('auth')->group(function () {
    Route::livewire('/dashboard', 'dashboard');
});

/**
 * Authentication
 */
Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth.login')->layout('layouts.auth')->name('auth.login');
    Route::livewire('/register', 'auth.register')->layout('layouts.auth')->name('auth.register');
});
