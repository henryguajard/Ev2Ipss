<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class proyectoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
        }
    
        // Obtener proyectos del usuario autenticado
        $datos = Proyecto::where('user_id', $user->id)->get();
    
        // Pasar los datos del usuario a la vista junto con los proyectos
        return view('backoffice.proyecto', compact('datos', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
        }

        // Validar y almacenar el proyecto
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_de_inicio' => 'required|date',
            'estado' => 'required|boolean',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        try {
            // Agregar el user_id al arreglo de datos
            $validatedData['user_id'] = $user->id; // Usa el ID del usuario autenticado
            Proyecto::create($validatedData);
            return redirect()->route('backoffice.dashboard')->with('success', 'Proyecto creado con éxito');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el proyecto: ' . $e->getMessage());
        }
    }
}

