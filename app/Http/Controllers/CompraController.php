<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Http\Resources\CompraResource;
use App\Models\Compra;
use App\Models\ItemCompra;
use App\Models\Produto;
use Inertia\Inertia;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Inclui os itens na listagem com Eager Loading
        $compras = Compra::with('itens')->orderBy('data', 'desc')->paginate(10);
        return inertia('Compras/Index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Compras/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompraRequest $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
            'valor_total' => 'required|numeric',
            'itens' => 'array',
            'itens.*.produto_id' => 'required|integer',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor' => 'required|numeric|min:0',
        ]);

        // Cria a compra
        $compra = Compra::create($request->only('nome', 'data', 'valor_total'));

        // Cria os itens associados
        $compra->itens()->createMany($request->input('itens', []));

        return redirect()->route('compras.index')->with('message', 'Compra criada com sucesso!');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        $compra->load('itens');
        return inertia('Compras/Edit', ['compra' => $compra]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
            'valor_total' => 'required|numeric',
            'itens' => 'array',
            'itens.*.produto_id' => 'required|integer',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor' => 'required|numeric|min:0',
        ]);

        // Atualiza a compra
        $compra->update($request->only('nome', 'data', 'valor_total'));

        // Sincroniza os itens (remove os antigos e adiciona os novos)
        $compra->itens()->delete();
        $compra->itens()->createMany($request->input('itens', []));

        return redirect()->route('compras.index')->with('message', 'Compra atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('message', 'Compra excluída com sucesso!');
    }
}
