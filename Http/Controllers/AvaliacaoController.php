<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAvaliacaoRequest;
use App\Http\Requests\UpdateAvaliacaoRequest;
use App\Models\Avaliacao;
use Inertia\Inertia;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$avaliacoes = Avaliacao::paginate(10);
        $avaliacoes = Avaliacao::with(['itensAvaliacao', 'tipo'])->orderBy('id', 'asc')->paginate(10);
        return Inertia::render('Avaliacoes/Index', [
            'avaliacoes' => $avaliacoes
        ]);
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
    public function store(StoreAvaliacaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliacao $avaliacao)
    {
        $avaliacao->load('itensAvaliacao');
        return inertia('Avaliacoes/Edit', ['avaliacao' => $avaliacao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvaliacaoRequest $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }
}
