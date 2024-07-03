<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Controllers\EstudianteGrupoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Estudiante::query();

        if($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if($request->has('apellido')) {
            $query->where('apellido', 'like', '%' . $request->apellido . '%');
        }

        $estudiantes = $query->orderBy('id', 'desc')->simplePaginate(10);

        return view('estudiantes.index', compact('estudiantes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudiante = Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;
        $estudiante->save();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    public function delete($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        return view('estudiantes.delete', compact('estudiante'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }

    public function loginForm()
    {
        return view('estudiantes.login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'pin');

        $estudiante = Estudiante::where('email', $credentials['email'])->first();

        if (!$estudiante || $estudiante->pin !== $credentials['pin']) {
            return redirect()->back()->withErrors([
                'InvalidCredentials' => 'Las credenciales no coinciden con nuestros registros.'
            ]);
        }

        Auth::guard('estudiante')->login($estudiante);
        
        session(['estudiante_id' => $estudiante->id]);
        session(['estudiante_grupo' => EstudianteGrupoController::getByStudentId($estudiante->id)]);
        session(['estudiante_nombre' => $estudiante->nombre]);
        
        return redirect()->intended();
    }

    public function logout(Request $request)
    {
        Auth::guard('estudiante')->logout();

        return redirect()->route('estudiantes.loginForm');
    }

    public function home() {
        return view('estudiantes.home');
    }

    public function registrarAsistencia() {
        return view('estudiantes.registrarAsistencia');
    }
}
