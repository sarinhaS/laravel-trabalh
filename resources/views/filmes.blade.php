<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->role == 'admin')
                        <x-link-button href="{{ route('filmes.create') }}">
                            Adicionar filme
                        </x-link-button>
                    @endif
                    
                    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">🎬 Filtros</h1>

                    <form action="{{ route('filmes.filtrar') }}" method="get" 
                        class="flex flex-col md:flex-row items-center gap-4 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-md">

                        <div class="flex flex-col w-full md:w-1/3">
                            <label for="categoria_id" class="text-gray-700 dark:text-gray-300 font-medium mb-1">Categoria</label>
                            <select name="categoria_id" id="categoria_id"
                                    class="rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Todas as categorias</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col w-full md:w-1/3">
                            <label for="ano" class="text-gray-700 dark:text-gray-300 font-medium mb-1">Ano</label>
                            <input type="text" name="ano" id="ano" placeholder="Ex: 2024"
                                class="rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div class="flex w-full md:w-auto mt-2 md:mt-6">
                            <button type="submit" 
                                    class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow-md transition">
                                Filtrar
                            </button>
                        </div>
                    </form>

                    <div class="galeria-filmes">
                        @foreach ($filmes as $filme)
                            <div class="filme-card">
                                <a href="{{ route('filmes.show', ['id' => $filme->id]) }}">
                                    <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->nome }}">
                                    <div class="infos-film">
                                        <p>{{ $filme->nome }}</p>
                                    </div>
                                </a>

                                @if (Auth::user()->role == 'admin')
                                    <div class="admin-actions">
                                        <a href="{{ route('filmes.edit', $filme->id) }}">Editar</a>
                                        <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>