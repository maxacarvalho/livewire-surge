<?php

Route::get('/', function () {
    return ['success!'];
});

Route::livewire('/register', 'auth.register');
