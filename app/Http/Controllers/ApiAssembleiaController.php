<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Assembleia;
use PDF;

class ApiAssembleiaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $assembleiacases = Assembleia::paginate(15);
        return view('login', compact('assembleiacases'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function votantesDocs()
    {
        $assembleias = Assembleia::paginate(15);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventoId($eventoId)
    {
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

    public function geraPdf($id)
    {
        $gerapdf = DB::table('Assembleia')->where([
            ['id', '=', $id]
        ])->get();

        $pdf = PDF::loadView('pdf', compact('gerapdf'));

        return $pdf->setPaper('a4')->stream('Votante.pdf');
    }
}
