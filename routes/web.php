<?php

use App\Http\Controllers\proyectoController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta principal que cierra la sesión y redirige a la vista de landing
Route::get('/', function () {
    Auth::logout(); // Cierra la sesión del usuario
    return view('landing.index'); // Redirige a index
})->name('raiz');

// Rutas de autenticación de usuario
Route::get('/login', [userController::class,'formularioLogin'])->name('usuario.login');
Route::post('/login', [userController::class,'login'])->name('usuario.validar');

// Rutas de registro de usuario
Route::get('/users/register', [userController::class,'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [userController::class,'registrar'])->name('usuario.registrar');

// Rutas de backoffice, se aseguran de que el usuario esté autenticado
Route::middleware(['auth'])->group(function () {
    // Dashboard del backoffice
    Route::get('/dashboard', [proyectoController::class, 'index'])->name('backoffice.dashboard');
    
    // Crear un nuevo proyecto
    Route::post('/crearProyect', [proyectoController::class, 'store'])->name('proyecto.store');
});

// Rutas sin autenticación
Route::get('/backoffice', function(){
    $user = Auth::user();
    if($user == NULL){
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesion activa']);
    }
    return view('backoffice.dashboard', ['user' => $user]);
})->name('backoffice.dashboard');

Route::get('/backoffice.proyecto', function () {
    return view('backoffice.proyecto');
});



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
