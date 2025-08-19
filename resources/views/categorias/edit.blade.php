@if (Auth::user()->role == 'admin')
<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/categorias-form.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="categoria-form-container">
                <h1>Editar Categoria</h1>

                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="nome">Nome da Categoria:</label>
                    <input type="text" id="nome" name="nome" 
                           value="{{ old('nome', $categoria->nome) }}" required>

                    <button type="submit">Salvar Alterações</button>
                    <a href="{{ route('categorias.index') }}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@endif