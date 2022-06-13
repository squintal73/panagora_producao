<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Assembleia;

class ApiAssembleiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assembleias = Assembleia::all();
        return response()->json($assembleias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criarVotante(Request $request)
    {
        $assembleia = new Assembleia;
        $assembleia->id = $request->id;
        $assembleia->nome = $request->nome;
        $assembleia->nome_evento = $request->nome_evento;
        $assembleia->codigo_evento = $request->codigo_evento;
        $assembleia->save();
        return response()->json([
            "messagem" => "Votande Criado com Sucesso"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventoId($eventoId)
    {
       // $assembleias = Assembleia::findOrFail($id);
        $assembleias = DB::table('Assembleia')->where([
            ['codigo_evento', '=', $eventoId]
        ])->get();
        return response()->json($assembleias);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function votanteId($eventoId,$Id)
    {
       // $assembleias = Assembleia::findOrFail($id);
        $assembleias = DB::table('Assembleia')->where([
            ['id', '=', $Id],
            ['codigo_evento', '=', $eventoId],
        ])->get();
        return response()->json($assembleias);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
