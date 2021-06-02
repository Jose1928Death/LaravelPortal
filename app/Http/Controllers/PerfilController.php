<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use PDOException;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil=Perfil::orderBy('nombre')->paginate(5);
        return view('perfiles.index', compact('perfil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
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
            'nombre'=>['string', 'required', 'max:20', 'min:1'],
            'descripcion'=>['string', 'required', 'max:200', 'min:1']
        ]);
        try{
            Perfil::create($request->all());
        }catch(PDOException $ex){
            return redirect()->route('perfil.index')->with("mensaje","Error al guardar perfil");
        }
        return redirect()->route('perfil.index')->with("mensaje","Perfil creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'nombre'=>['string', 'required', 'max:20', 'min:1', 'unique:perfils,nombre'.$perfil->id],
            'descripcion'=>['string', 'required', 'max:200', 'min:1']
        ]);
        try{
            $perfil->update($request->all());
            return redirect()->route('perfil.index')->with("mensaje","Perfil actualizado");
        }catch(PDOException $ex){
            return redirect()->route('perfil.index')->with("mensaje","Error al actualizar perfil");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        try{
            $perfil->delete();
        }catch(PDOException $ex){
            return redirect()->route('perfil.index')->with("mensaje","Error al borrar perfil");
        }
        return redirect()->route('perfil.index')->with("mensaje","Perfil borrado");
    }
}
