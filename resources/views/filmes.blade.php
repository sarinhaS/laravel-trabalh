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
                    <h1>FILTROS: </h1>
                    <form action="{{ route('filmes.filtrar') }}" method="get">
                        <select name="filtrocategoria" id="filtrocategoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                        <input type="text" placeholder="ano: ">
                        <button type="submit">Filtrar</button>
                    </form>
                    
                    <x-link-button href="{{ route('filmes.create') }}">
                        Adicionar filme
                    </x-link-button>

                    @foreach ($filmes as $filme)
                        <a href="{{ route('filmes.show', ['id' => $filme->id]) }}" class="each-film" >
                            <div class="image-film">
                                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="" style="margin: 0 20px; width:300px">
                            </div>
                            <div class="infos-film" style="margin-bottom:120px;">
                                <label for="nome">Nome: </label>
                                {{ $filme->nome }} <br>
                                <a href={{ route('filmes.edit', $filme->id) }}> Editar </a>
                                <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>