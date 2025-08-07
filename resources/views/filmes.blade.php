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
                    <x-link-button href="{{ route('filmes.create') }}">
                        Adicionar filme
                    </x-link-button>

                    @foreach ($filmes as $filme)
                        <div>
                            <label for="nome">Nome: </label>
                            {{ $filme->nome }} <br>
                            <label for="sinopse">Sinopse: </label>
                            {{ $filme->sinopse }} <br>
                            <label for="ano">ano: </label>
                            {{ $filme->ano }} <br>
                            <label for="categoria">Categoria: </label>
                            {{ $filme->categoria }} <br>
                            <img src="{{ asset('storage/' . $filme->imagem) }}" alt="" style="margin: 0 20px; width:300px">
                            <label for="trailer">Trailer: </label>
                            {{ $filme->trailer }} <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
