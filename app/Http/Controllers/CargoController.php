<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\CargoRepository;

class CargoController extends Controller
{
    public function __construct(Cargo $cargo){
        $this->cargo = $cargo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cargoRepository = new CargoRepository($this->cargo);

        //http://localhost:8000/api/membro?atributos=id,nome,imagem&atributos_tipo=id, igreja_id,nome,imagem&filtro=nome:=:Eucaliptos
        return response()->json($cargoRepository->getResultado(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Membro $membro)
    {
        // retorna o membro
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membro $membro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membro $membro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membro $membro)
    {
        //
    }
}
