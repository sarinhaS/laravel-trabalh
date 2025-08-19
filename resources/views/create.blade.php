@if (Auth::user()->role == 'admin')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Filmes &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('filmes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-4">
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                                :value="old('nome')" required autofocus />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Sinopse -->
                        <div class="mb-4">
                            <x-input-label for="sinopse" :value="__('Sinopse')" />
                            <textarea id="sinopse" name="sinopse" rows="4"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('sinopse') }}</textarea>
                            <x-input-error :messages="$errors->get('sinopse')" class="mt-2" />
                        </div>

                        <!-- Ano -->
                        <div class="mb-4">
                            <x-input-label for="ano" :value="__('Ano')" />
                            <x-text-input id="ano" class="block mt-1 w-full" type="number" name="ano"
                                :value="old('ano')" required />
                            <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                        </div>

                        <!-- Categoria -->
                        <div class="mb-4">
                            <label for="categorias_id">Categoria:</label>
                            <select name="categorias_id" id="categorias_id">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Imagem -->
                        <div class="mb-4">
                            <input type="file" name="imagem" id="imagem" accept="image/*">
                        </div>

                        <!-- Trailer -->
                        <div class="mb-4">
                            <x-input-label for="trailer" :value="__('Trailer (URL)')" />
                            <x-text-input id="trailer" class="block mt-1 w-full" type="url" name="trailer"
                                :value="old('trailer')" required />
                            <x-input-error :messages="$errors->get('trailer')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button>
                                Salvar filme
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
