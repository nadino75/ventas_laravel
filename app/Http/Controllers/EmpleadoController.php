<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Turno;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('turno')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $turnos = Turno::all();
        return view('empleados.create', compact('turnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|integer|unique:empleados,ci',
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'rol' => 'required|string|max:50',
            'id_turno' => 'nullable|exists:turnos,id',
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        $turnos = Turno::all();
        return view('empleados.edit', compact('empleado', 'turnos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'ci' => 'required|integer|unique:empleados,ci,' . $empleado->id,
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'rol' => 'required|string|max:50',
            'id_turno' => 'nullable|exists:turnos,id',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
