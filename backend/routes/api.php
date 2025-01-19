<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\EmpresaController;

// Rutas públicas
Route::post('/login', [LoginController::class, 'login']); // Inicio de sesión

// Rutas principales protegidas
Route::middleware(['auth:sanctum'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout']);

    // Perfil del usuario autenticado
    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });
    Route::put('/profile', [ProfileController::class, 'updateProfile']);

    // Panel del Usuario
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard']);

    // Rutas exclusivas de administrador
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard']); // Panel admin
        Route::get('/solicitudes', [ClientRequestController::class, 'index']); // Solicitudes
        Route::post('/solicitudes/{id}/estado', [ClientRequestController::class, 'updateEstado']); // Estado
        Route::post('/empresas', [EmpresaController::class, 'store']); // Empresas
    });
});

