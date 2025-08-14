<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                            <div class="image-film">
                                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="" style="margin: 0 20px; width:300px">
                            </div>
                            <div class="infos-film" style="margin-bottom:120px;">
                           <label for="nome">Nome: </label>
                                {{ $filme->nome }} <br>
                                <label for="sinopse">Sinopse: </label>
                                {{ $filme->sinopse }} <br>
                                <label for="ano">ano: </label>
                                {{ $filme->ano }} <br>
                                <label for="categoria">Categoria: </label>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->id == $filme->categorias_id)
                                        {{$categoria->nome}}
                                    @endif
                                
                                @endforeach
                                <br>
                                <label for="trailer">Trailer: </label>
                                {{ $filme->trailer }} <br>
                                <br>
                                <a href={{ route('filmes.edit', $filme->id) }}> Editar </a>
                                <a href="{{ route('filmes') }}">Voltar</a>

                                <h3>Comentários</h3>
                                <ul>
                                    @forelse($filme->comentarios as $comentario)
                                        <li>
                                            <strong>{{ $comentario->autor }}:</strong> {{ $comentario->conteudo }}
                                        </li>
                                    @empty
                                        <li>Sem comentários ainda.</li>
                                    @endforelse
                                </ul>

                                <hr>

                                <h3>Deixe seu comentário</h3>
                                <form action="{{ route('comentarios.store', $filme->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="autor" placeholder="Seu nome">
                                    <textarea name="conteudo" placeholder="Seu comentário"></textarea>
                                    <button type="submit">Enviar</button>
                                </form>
                            </div>
                        </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>