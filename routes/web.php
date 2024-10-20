<?php

use App\Livewire\TaskPage;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/', Welcome::class);
Route::get('/task', TaskPage::class);

// Route::get('/counter', Counter::class);

