<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Auth::logout(); // Cierra la sesión del usuario
    return view('landing.index'); // Redirige a index
})->name('raiz');

Route::get('/login', [userController::class,'formularioLogin'])->name('usuario.login');
    
Route::post('/login', [userController::class,'login'])->name('usuario.validar');

Route::get('/users/register', [userController::class,'formularioNuevo'])->name('usuario.registrar');

Route::post('/users/register', [userController::class,'registrar'])->name('usuario.registrar');

Route::get('/backoffice', function(){
    $user = Auth::user();
    if($user == NULL){
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesion activa']);
    }
    return view('backoffice.dashboard', ['user' => $user]);
})->name('backoffice.dashboard');
///////////////////////////////////////////////////////////////////////////////////////////
// rutaspara login1,dashboard1 son de lo que iso el profe hasta la vista login en el video
Route::get('/dashboard', function () {
    
    return view('dashboard');
});

Route::get('/login1', function () {
   
    return view('login1');
});
