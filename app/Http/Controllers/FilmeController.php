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
        $categorias = Categoria::all();
        return view('filmes', [
            'categorias' => $categorias,
            'filmes' => $filmes,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('create', compact('categorias'));
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
    public function show(string $id )
    {
        $filme = Filme::find($id);
        $categoria = Categoria::all();
        $filme->load('comentarios');

        return view('show', [
            'filme' => $filme,
            'categorias' => $categoria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filme $filme)
    {
        $categorias = Categoria::all();

        return view('editar', [
            'filme' => $filme,
            'categorias' => $categorias
        ]);
    }

    public function update(FilmesRequest $request, Filme $filme)
    {
        $filme->fill($request->validated());
    
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('filmes', 'public');
            $filme['imagem'] = $caminhoImagem;
        }

        $filme->save();

        return redirect()->route('filmes');
    }

    /**
     * Update the specified resource in storage.
     */
    public function filtrar(FilmesRequest $request)
    {
        $filmes = Filme::query();

        // Filtro por ano
        if ($request->filled('ano')) {
            $filmes->where('ano', $request->ano);
        }

        // Filtro por categoria
        if ($request->filled('categoria_id')) {
            $filmes->where('categorias_id', $request->categoria_id);
        }

        $filmes = $filmes->get();

        return view('filmes', [
            'filmes' => $filmes,
            'categorias' => Categoria::all(), // mantém as categorias no select
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filme $filme)
    {
        $filme->delete();
        return redirect()->route('filmes');
    }
}
