<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function formularioLogin()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function formularioNuevo()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    public function login(Request $request)
    {
        $mensajes = [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no tiene un formato valido',
            'password.required' => 'La contraseña es obligatoria'
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $mensajes);

        $credenciales = $request->only('email', 'password');

        
    if (Auth::attempt($credenciales)) {
        $user = Auth::user();
        if (!$user->activo) {
            Auth::logout();
            return redirect()->route('usuario.login')->withErrors(['email' => 'El usuario se encuentra desactivado.']);
        }
        // Autenticación exitosa
        $request->session()->regenerate(); // Regenera la sesión
        return redirect()->route('backoffice.dashboard');
    }

    return redirect()->back()->withErrors(['email' => 'El usuario o contraseña son incorrectos']);
    }



    public function registrar(Request $request)
    {
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no tiene un formato valido',
            'email.unique' => 'El email ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'rePassword.required' => 'Repetir contraseña es obligatorio',
            'dayCode.required' => 'El código del día es obligatorio',
        ];

        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'rePassword' => 'required|string',
            'dayCode' => 'required|string',
        ], $mensajes);

        $datos = $request->only('nombre', 'email', 'password', 'rePassword', 'dayCode');

        if ($datos['password'] != $datos['rePassword']) {
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no son iguales']);
        }

        if ($datos['dayCode'] != date("d")) {
            return back()->withErrors(['message' => 'El código del día no es válido']);
        }

        try {
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente');
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        return redirect()->route('usuario.login')->with('success', 'Sesión cerrada con éxito');
    }
}

