<div>
    {{-- @extends('layouts.app') --}}
    @section('content')
    <div class="min-h-screen bg-gray-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="bg-gray-800 rounded-xl p-6 mb-6 border border-gray-700">
            <h1 class="text-3xl font-bold text-white mb-2">🎛️ Panel Administrativo</h1>
            <p class="text-gray-400">Gestiona las imágenes del carrusel</p>

            <!-- Barra de búsqueda -->
            <div class="mt-4">
                <input type="text"
                       wire:model.debounce.300ms="search"
                       placeholder="🔍 Buscar imágenes..."
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            </div>
        </div>

        <!-- Grid de imágenes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($images as $image)
                <div class="bg-gray-800 rounded-xl overflow-hidden border border-gray-700 hover:border-blue-500 transition-all duration-300">
                    <!-- Imagen -->
                    <div class="h-48 bg-gray-700 relative">
                        <img src="{{ Storage::url($image->file_path) }}"
                             alt="{{ $image->original_name }}"
                             class="w-full h-full object-cover">

                        <!-- Badge de estado -->
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 text-xs rounded-full {{ $image->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ $image->is_active ? 'Activo' : 'Oculto' }}
                            </span>
                        </div>
                    </div>

                    <!-- Información -->
                    <div class="p-4">
                        <h3 class="text-white font-semibold truncate" title="{{ $image->original_name }}">
                            {{ \Str::limit($image->original_name, 30) }}
                        </h3>
                        <p class="text-gray-400 text-sm mt-1">
                            Subido: {{ $image->created_at->format('d/m/Y H:i') }}
                        </p>

                        <!-- Botones de acción -->
                        <div class="flex space-x-2 mt-4">
                            <button wire:click="toggleVisibility({{ $image->id }})"
                                    class="flex-1 py-2 px-3 rounded-lg text-sm font-medium transition-all duration-300 {{ $image->is_active ? 'bg-yellow-500 hover:bg-yellow-600 text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}">
                                {{ $image->is_active ? '👁️ Ocultar' : '👁️ Mostrar' }}
                            </button>

                            <button wire:click="deleteImage({{ $image->id }})"
                                    wire:confirm="¿Estás seguro de que quieres eliminar esta imagen?"
                                    class="flex-1 py-2 px-3 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-all duration-300">
                                🗑️ Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-xl text-white font-semibold mb-2">No hay imágenes</h3>
                    <p class="text-gray-400">No se encontraron imágenes que coincidan con tu búsqueda.</p>
                </div>
            @endforelse
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $images->links() }}
        </div>

        <!-- Mensaje flash -->
        @if (session()->has('message'))
            <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in">
                ✅ {{ session('message') }}
            </div>
        @endif
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endsection
</div>
