<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/welcome', function () {
    return view('welcome');
});

// Ruta de inicio, redirige a la lista de proyectos
Route::get('/', function () {
    return redirect()->route('projects.index');
});

// Rutas del CRUD para Project (disponibles para todos los usuarios autenticados)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

// Ruta protegida para administradores usando RoleMiddleware directamente
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Asegúrate de tener esta vista
    })->name('admin.dashboard');

    // Agrega aquí más rutas para administradores
});

// Ruta para usuarios con un rol específico (ejemplo: `user`)
Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/profile', function () {
        return view('user.profile'); // Asegúrate de tener esta vista
    })->name('user.profile');
});

// Rutas protegidas con Jetstream para el dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
