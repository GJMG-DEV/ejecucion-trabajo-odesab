<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Incidencias;
use App\Livewire\Admin\Servicios;
use App\Livewire\Admin\Trabajadores;
use Illuminate\Support\Facades\Route;


Route::get('/',Dashboard::class)->name('dashboard');
Route::get('servicio',Servicios::class)->name('servicio');
Route::get('trabajadores',Trabajadores::class)->name('trabajadores');
Route::get('incidencias',Incidencias::class)->name('incidencias');