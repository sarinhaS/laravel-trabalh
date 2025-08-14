<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioRequest;
use App\Models\Comentario;
use App\Models\Filme;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(ComentarioRequest $request, $filme_id)
    {
        $comentarios = $request->validated();
        $comentarios['filme_id'] = $filme_id;

        Comentario::create($comentarios);

        return redirect()->route('filmes.show', $filme_id);
    }

    public function show($id)
    {
        $filme = Filme::with('comentarios')->find($id);
        return view('filmes.show', compact('filme'));
    }
}
