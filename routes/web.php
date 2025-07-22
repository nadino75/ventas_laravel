<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('turnos', TurnoController::class);
Route::resource('empleados', EmpleadoController::class);