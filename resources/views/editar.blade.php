@if (Auth::user()->role == 'admin')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Filmes &raquo; Editar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('filmes.update', $filme->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label>Nome:</label><br>
                        <input type="text" name="nome" value="{{ old('nome', $filme->nome) }}" required><br><br>

                        <label>Sinopse:</label><br>
                        <textarea name="sinopse" required>{{ old('sinopse', $filme->sinopse) }}</textarea><br><br>

                        <label>Ano:</label><br>
                        <input type="number" name="ano" value="{{ old('ano', $filme->ano) }}" required><br><br>

                        <label>Categoria:</label><br>
                        <select name="categorias_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $filme->categorias_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select><br><br>

                        <label>Imagem:</label><br>
                        <input type="file" name="imagem"><br>
                        <img src="{{ asset('storage/'.$filme->imagem) }}" width="120" style="margin-top:10px"><br><br>

                        <label>Trailer:</label><br>
                        <input type="text" name="trailer" value="{{ old('trailer', $filme->trailer) }}" required><br><br>

                        <button type="submit">Salvar Alterações</button>
                        <a href="{{ route('filmes') }}">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endif