<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Candidato;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Oferta::all();
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
        $oferta = $request->all();
        $arrayCandidatos = $oferta['candidatos'];
        $arrayCandidatosF = [];
        foreach ($arrayCandidatos as $key => $candidato) {
            $candidatoF = Candidato::find($candidato['id']);
            if ($candidatoF) {
                $arrayCandidatosF[] = $candidato;
            }else{
                return response()->json("El id del candidato no se encuentra, id : ".$candidato['id'],400);
            }
        }
        $oferta['candidatos'] = serialize($arrayCandidatosF);
        $oferta = Oferta::create($oferta);
        return response()->json(compact('oferta'),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Oferta::find($id)->toArray();
        $candidatos = unserialize($data['candidatos']);
        $data['candidatos'] = [];
        foreach ($candidatos as $key => $candidato) {
            $candidatoF = Candidato::find($candidato['id']);
            if($candidatoF){
                $data['candidatos'][] = $candidatoF->toArray();
            }
        }
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
        $ofertaRequest = $request->all();
        $arrayCandidatos = $ofertaRequest['candidatos'];
        $ofertaRequest['candidatos'] = serialize($arrayCandidatos);
        $oferta = Oferta::find($id);
        $oferta->update($ofertaRequest);
        return response()->json(compact('oferta'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = Oferta::find($id);
        $oferta->delete();    
        return response()->json(200);
    }
}
