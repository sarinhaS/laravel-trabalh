<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmesRequest;
use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filmes = Filme::all();
        return view('filmes', [
            'filmes' => $filmes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('filmes.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmesRequest $request)
    {
        $dados = $request->validated();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('filmes', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        Filme::create($dados);
        return redirect()->route('filmes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
