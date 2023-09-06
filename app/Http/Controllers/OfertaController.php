<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\OfertaRepository;
use App\Http\Repositories\MembroRepository;

class OfertaController extends Controller
{
    public function __construct(Oferta $oferta){
        $this->oferta = $oferta;
    }

    public function index(Request $request)
    {
        $ofertaRepository = new OfertaRepository($this->oferta);

        return response()->json($ofertaRepository->getResultado(), 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $ofertaRepository = new OfertaRepository($this->oferta);
        $ofertas = $ofertaRepository->getResultado();

        foreach ($ofertas as &$oferta) {
            $oferta->obreiro;
            $oferta->membro;
        }

        return view('relatorio', ['ofertas' => $ofertas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membroRepository = new MembroRepository(new Membro());
        $membros = $membroRepository->getResultado();
        //print($membros[0]);
        return view('oferta', ['membros' => $membros]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->oferta->rules(), $this->oferta->feedback());
        //dd("Entrou no store");
        $oferta = $this->oferta->create([
            'membro_id' => $request->membro_id,
            'valor_entregue' => $request->valor_entregue,
            'troco' => $request->troco,
            'valor_final' => $request->valor_final,
            'obreiro_id' => $request->obreiro_id,
            'data_oferta' => $request->data_oferta
        ]);

        return response()->json($oferta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oferta $oferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oferta $oferta)
    {
        //
    }
}
