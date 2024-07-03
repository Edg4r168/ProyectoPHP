<?php

namespace App\Http\Controllers;

use App\Models\DocenteGrupo;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Grupo;

class DocenteGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DocenteGrupo::query();

        if($request->has('nombre')) {
            $query->whereHas('docente', function($docenteQuery) use ($request) {
                $docenteQuery->where('nombre', 'like', '%' . $request->nombre . '%');
            });
        }

        if($request->has('apellido')) {
            $query->whereHas('docente', function($docenteQuery) use ($request) {
                $docenteQuery->where('apellido', 'like', '%' . $request->apellido . '%');
            });
        }

        $docentesGrupos = $query->with('grupo', 'docente')
            ->orderBy('id', 'desc')
            ->simplePaginate(10);

        return view('docentes_grupos.index', compact('docentesGrupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Docente::all();
        $grupos = Grupo::all();

        return view('docentes_grupos.create', compact('grupos', 'docentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $docenteGrupo = DocenteGrupo::create($request->all());

        return redirect()->route('docentes_grupos.index')->with('success', 'Grupo de docentes creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docenteGrupo = DocenteGrupo::find($id);
        
        if (!$docenteGrupo) {
            return abort(404);
        }

        return view('docentes_grupos.show', compact('docenteGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docenteGrupo = DocenteGrupo::find($id);

        if (!$docenteGrupo) {
            return abort(404);
        }

        $docentes = Docente::all();
        $grupos = Grupo::all();

        return view('docentes_grupos.edit', compact('docenteGrupo', 'docentes', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $docenteGrupo = DocenteGrupo::find($id);

        if (!$docenteGrupo) {
            return abort(404);
        }

        $docenteGrupo->docente_id = $request->docente_id;
        $docenteGrupo->grupo_id = $request->grupo_id;
        $docenteGrupo->save();

        return redirect()->route('docentes_grupos.index')->with('success', 'Grupo de docentes actualizado correctamente');
    }

    public function delete($id)
    {
        $docenteGrupo = DocenteGrupo::with('grupo', 'docente')->find($id);

        if (!$docenteGrupo) {
            return abort(404);
        }

        return view('docentes_grupos.delete', compact('docenteGrupo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docenteGrupo = DocenteGrupo::find($id);

        if (!$docenteGrupo) {
            return abort(404);
        }

        $docenteGrupo->delete();

        return redirect()->route('docentes_grupos.index')->with('success', 'Grupo de docentes eliminado correctamente');
    }
}
