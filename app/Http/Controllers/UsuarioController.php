<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;
use PDOException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=Usuario::orderBy('nomusu')->paginate(10);
        return view('usuarios.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfils=Perfil::array();
        return view('usuarios.create', compact('perfils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomusu'=>['string', 'required', 'max:20', 'min:1'],
            'mail'=>['string', 'required', 'unique:usuarios,mail'],
            'localidad'=>['string', 'required', 'max:25', 'min:1'],
            'perfil_id'=>['require']
        ]);
        try{
            Usuario::create($request->all());
            return redirect()->route('usuario.index')->with("mensaje","Usuario creado");
        }catch(PDOException $ex){
            return redirect()->route('usuario.index')->with("mensaje","Error al crear usuario");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $perfils=Perfil::array();
        return view('usuarios.edit', compact('usuario','perfils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nomusu'=>['string', 'required', 'max:20', 'min:1', 'unique:usuarios,nomusu'.$usuario->id],
            'mail'=>['string', 'required', 'unique:usuarios,mail'.$usuario->id],
            'localidad'=>['string', 'required', 'max:25', 'min:1'],
            'perfil_id'=>['required']
        ]);
        try{
            $usuario->update($request->all());
            return redirect()->route('usuario.index')->with("mensaje","Usuario actualizado");
        }catch(PDOException $ex){
            return redirect()->route('usuario.index')->with("mensaje","Error al actualizar usuario");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try{
            $usuario->delete();
        }catch(PDOException $ex){
            return redirect()->route('usuario.index')->with("mensaje","Error al borrar usuario");
        }
        return redirect()->route('usuario.index')->with("mensaje","Usuario borrado");;
    }
}
