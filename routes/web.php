<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Servicios;
use Illuminate\Support\Facades\Route;


Route::get('/',Dashboard::class)->name('dashboard');
Route::get('servicio',Servicios::class)->name('servicio');