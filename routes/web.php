<?php

use App\Http\Controllers\proyectoController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta principal que redirige a la vista de landing
Route::get('/', function () {
    return view('landing.index'); // Redirige a index
})->name('raiz');

// Rutas de autenticación
Route::get('/login', [userController::class, 'formularioLogin'])->name('usuario.login');
Route::post('/login', [userController::class, 'login'])->name('usuario.validar');

// Rutas de registro de usuario
Route::get('/users/register', [userController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [userController::class, 'registrar'])->name('usuario.registrar');

// Ruta de backoffice (Dashboard con listado y creación de proyectos)
Route::get('/backoffice', [proyectoController::class, 'index'])->name('backoffice.dashboard');

// Rutas de proyectos
Route::post('/backoffice/proyectos/new', [proyectoController::class, 'create'])->name('proyectos.create');
//cerrar sesion
Route::post('/logout', [userController::class, 'logout'])->name('usuario.logout');
// eliminar proyecto
Route::delete('/proyectos/{id}', [proyectoController::class, 'destroy'])->name('proyectos.destroy');



//Route::get('/backoffice', [proyectoController::class, 'index'])->name('backoffice.dashboard');
//Route::post('/crearProyect', [proyectoController::class, 'store'])->name('proyectos.store');
///////////////////////////////////////////////////////////////////////////////////////////
// rutaspara login1,dashboard1 son de lo que iso el profe hasta la vista login en el video
Route::get('/dashboard', function () {
    
    return view('dashboard');
});

Route::get('/login1', function () {
   
    return view('login1');
});
