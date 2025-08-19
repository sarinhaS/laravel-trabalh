<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

                    <!-- Imagem -->
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $filme->imagem) }}" 
                             alt="Capa do filme"
                             class="rounded-xl shadow-lg w-72 h-auto object-cover">
                    </div>

                    <!-- Informações -->
                    <div class="space-y-4">
                        <div>
                            <label class="font-bold text-gray-700 dark:text-gray-300">Nome:</label>
                            <p class="text-lg">{{ $filme->nome }}</p>
                        </div>

                        <div>
                            <label class="font-bold text-gray-700 dark:text-gray-300">Sinopse:</label>
                            <p class="text-justify">{{ $filme->sinopse }}</p>
                        </div>

                        <div>
                            <label class="font-bold text-gray-700 dark:text-gray-300">Ano:</label>
                            <span>{{ $filme->ano }}</span>
                        </div>

                        <div>
                            <label class="font-bold text-gray-700 dark:text-gray-300">Categoria:</label>
                            <span>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->id == $filme->categorias_id)
                                        {{ $categoria->nome }}
                                    @endif
                                @endforeach
                            </span>
                        </div>

                        <div>
                            <label class="font-bold text-gray-700 dark:text-gray-300">Trailer:</label>
                            <a href="{{ $filme->trailer }}" target="_blank" 
                               class="text-blue-600 hover:underline dark:text-blue-400">
                                Assistir no YouTube
                            </a>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <a href="{{ route('filmes.edit', $filme->id) }}" 
                               class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                                Editar
                            </a>
                            <a href="{{ route('filmes') }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Comentários -->
                <div class="mt-12">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Comentários</h3>
                    <ul class="space-y-3 mb-6">
                        @forelse($filme->comentarios as $comentario)
                            <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                                <strong class="text-gray-900 dark:text-gray-100">{{ $comentario->autor }}:</strong>
                                <span class="text-gray-700 dark:text-gray-300">{{ $comentario->conteudo }}</span>
                            </li>
                        @empty
                            <li class="text-gray-500 dark:text-gray-400">Sem comentários ainda.</li>
                        @endforelse
                    </ul>

                    <hr class="my-6 border-gray-300 dark:border-gray-600">

                    <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-200">Deixe seu comentário</h3>
                    <form action="{{ route('comentarios.store', $filme->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="autor" placeholder="Seu nome"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-white dark:bg-gray-700 dark:text-gray-200">
                        
                        <textarea name="conteudo" placeholder="Seu comentário"
                                  class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-white dark:bg-gray-700 dark:text-gray-200"></textarea>
                        
                        <button type="submit" 
                                class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
