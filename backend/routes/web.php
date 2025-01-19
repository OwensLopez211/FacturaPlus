<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\EmpresaController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome'); // Cambia a la vista principal que desees
})->name('welcome');

Route::get('/solicitud', [ClientRequestController::class, 'create'])->name('client-request.create');
Route::post('/solicitud', [ClientRequestController::class, 'store'])->name('client-request.store');

// Página de inicio para usuarios autenticados
Route::get('/home', function () {
    return view('home'); // Asegúrate de que exista la vista home.blade.php
})->middleware('auth')->name('home');

// Rutas protegidas (Solo para administradores)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Gestión de solicitudes
    Route::get('/solicitudes', [ClientRequestController::class, 'index'])->name('solicitudes.index');
    Route::post('/solicitudes/{id}/estado', [ClientRequestController::class, 'updateEstado'])->name('solicitudes.updateEstado');

    // Gestión de empresas y usuarios
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
});

// Rutas adicionales de autenticación
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
