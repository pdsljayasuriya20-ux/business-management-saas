<?php

use Illuminate\Support\Facades\Route;

// Main Dashboard
Route::livewire('/', 'pages::dashboard')
    ->name('dashboard');
