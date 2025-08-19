<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="categorias-container">
                        @if (Auth::user()->role == 'admin')
                            <x-link-button href="{{ route('categorias.create') }}">
                                Adicionar categoria
                            </x-link-button>
                        @endif

                        @foreach ($categorias as $categoria)
                            <div class="categoria-card">
                                <b>{{ $categoria->nome }}</b>

                                @if (Auth::user()->role == 'admin')
                                    <div class="categoria-actions">
                                        <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>

                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Deletar</button>
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
