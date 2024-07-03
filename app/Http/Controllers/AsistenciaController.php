<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asistencia::query();

        if($request->has('nombre')) {
            $query->whereHas('estudiante', function($estudianteQuery) use ($request) {
                $estudianteQuery->where('nombre', 'like', '%' . $request->nombre . '%');
            });
        }

        if($request->has('apellido')) {
            $query->whereHas('estudiante', function($estudianteQuery) use ($request) {
                $estudianteQuery->where('apellido', 'like', '%' . $request->apellido . '%');
            });
        }

        $asistencias = $query->with('grupo', 'estudiante')
            ->orderBy('id', 'desc')
            ->simplePaginate(10);

        return view('asistencias.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asistencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudianteId = intval(session('estudiante_id'));
        $grupoId = intval(session('estudiante_grupo')->grupo_id);

        $request->merge(['grupo_id' => $grupoId, 'estudiante_id' => $estudianteId]);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('estudiantes.home')->with('success', 'Asistencia registrada correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia = Asistencia::with('grupo', 'estudiante')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asistencia = Asistencia::with('grupo', 'estudiante')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $grupos = Grupo::all();

        return view('asistencias.edit', compact('asistencia', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asistencia = Asistencia::with('grupo', 'estudiante')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->grupo_id = $request->grupo_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->hora_entrada = $request->hora_entrada;
        $asistencia->save();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente');
    }

    public function delete($id)
    {
        $asistencia = Asistencia::with('grupo', 'estudiante')->find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencias.delete', compact('asistencia'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->delete();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada correctamente');
    }
}
