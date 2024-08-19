<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class proyectoController extends Controller
{
    // Aplicar middleware de autenticación
  

    // Método para obtener todos los proyectos
    public function index()
    {
      

        // Obtener todos los proyectos del usuario autenticado
        $user = Auth::user();
        $proyectos = proyecto::where('responsable', $user->nombre)->get();

        // Asegurarse de que la variable siempre exista
        $proyectos = $proyectos->isEmpty() ? collect([]) : $proyectos;

        // Retornar la vista con los proyectos y el usuario
        return view('backoffice.proyecto', compact('proyectos', 'user'));
    }

    // Método para crear un nuevo proyecto
    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_de_inicio' => 'required|date',
            'estado' => 'required|boolean',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        // Crear el proyecto
        $proyecto = Proyecto::create($validatedData);

        // Redirigir a la lista de proyectos con un mensaje de éxito
        return redirect()->route('backoffice.proyecto')->with('success', 'Proyecto creado exitosamente');
    }
}
