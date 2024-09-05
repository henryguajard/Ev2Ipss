<?php

namespace App\Http\Controllers;

use App\Models\proyecto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class proyectoController extends Controller
{
    // Obtener proyecto
    public function index()
    {
        $user = Auth::user();
        if ($user == NULL) {
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
        }
    
        $datos = proyecto::all();
        return view('backoffice.dashboard', [
            'user' => $user,
            'datos' => $datos
        ]);
    }

    // Crear proyecto
    public function create(Request $_request)
    {
        $user = Auth::user();
        if ($user == NULL) {
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
        }

        // Validar la solicitud
        $mensajes = [
            'nombre.required' => 'El nombre del proyecto es obligatorio',
            'nombre.unique' => 'El nombre del proyecto ya existe',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'responsable.required' => 'El nombre del responsable es obligatorio',
            'monto.required' => 'El monto es obligatorio',
            'monto.integer' => 'El monto debe ser un número entero',
        ];
        
        $_request->validate([
            'nombre' => 'required|string|max:255|unique:proyectos',
            'fecha_inicio' => 'required|date',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|integer',
        ], $mensajes);

        try {
            // Ingresar registro a la BD
            proyecto::create([
                'nombre' => $_request->nombre,
                'fecha_inicio' => $_request->fecha_inicio,
                'responsable' => $_request->responsable,
                'monto' => $_request->monto,
                'activo' => false,
                'user_id' => $user->id,
            ]);
            return redirect()->back()->with('success', 'Proyecto creado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el proyecto: ' . $e->getMessage());
        }
    }

    // Eliminar proyecto
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user == NULL) {
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
        }

        try {
            $proyecto = proyecto::findOrFail($id);
            // Verifica que el usuario sea el dueño del proyecto o tiene permisos para eliminarlo
            if ($proyecto->user_id !== $user->id) {
                return redirect()->back()->withErrors(['message' => 'No tienes permiso para eliminar este proyecto']);
            }

            $proyecto->delete();
            return redirect()->back()->with('success', 'Proyecto eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el proyecto: ' . $e->getMessage());
        }
    }
}
