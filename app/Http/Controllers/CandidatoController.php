<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Candidato::all();
        return response()->json(compact('data'),200);
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
            'correo' => 'required',
            'nombre' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required',
        ]);
        
        $candidato = Candidato::create($request->all());
        return response()->json(compact('candidato'),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Candidato::find($id);
        return response()->json(compact('data'),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'correo' => 'required',
            'nombre' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required'
        ]);
        $candidato = Candidato::find($id);
        $candidato->update($request->all());
        return response()->json(compact('candidato'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato = Candidato::find($id);
        $candidato->delete();    
        return response()->json(200);
    }
}
