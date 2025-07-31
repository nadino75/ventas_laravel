<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Materia;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('materias.create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_estudiantes' => 'nullable|exists:estudiantes,id',
            'codigo_materia' => 'required|string|max:255|unique:materias,codigo_materia',
            'nombre_materia' => 'required|string|max:255',
            'grupo' => 'required|string|max:100',
            'docente' => 'required|string|max:255',
            'semestre' => 'required|string|max:50',
            'turno' => 'required|string|max:50',
            'fecha_solicitud' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    public function show(Materia $materia)
    {
        // Carga la materia (con estudiante relacionado si existe)
        return view('materias.show', compact('materia'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        $estudiantes = Estudiante::all();
        return view('materias.edit', compact('materia', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materia = Materia::findOrFail($id);

        $request->validate([
            'id_estudiantes' => 'nullable|exists:estudiantes,id',
            'codigo_materia' => 'required|string|max:255|unique:materias,codigo_materia,' . $materia->id,
            'nombre_materia' => 'required|string|max:255',
            'grupo' => 'required|string|max:100',
            'docente' => 'required|string|max:255',
            'semestre' => 'required|string|max:50',
            'turno' => 'required|string|max:50',
            'fecha_solicitud' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente');
    }
}
