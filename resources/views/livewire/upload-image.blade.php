<div>
    <div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-gray-800 bg-opacity-50 backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-blue-400 border-opacity-30">
        <!-- Título futurista -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                CARGADOR DE IMÁGENES
            </h1>
            <p class="text-gray-300 mt-2">Sube tus imágenes al sistema</p>
        </div>


        <form wire:submit.prevent="save">


            <button type="submit">Save Photo</button>

        <!-- Área de carga -->
        <div class="mb-6">
            @if(!$uploaded)
                {{-- <form wire:submit.prevent="upload"> --}}

                <div class="border-2 border-dashed border-blue-400 border-opacity-50 rounded-xl p-8 text-center transition-all duration-300 hover:border-cyan-400 hover:bg-blue-900 hover:bg-opacity-20">
                    <input type="file"  wire:model="photo">
                    @error('photo') <span class="error">{{ $message }}</span> @enderror

                    {{-- <input type="file" wire:model="image" class="hidden" id="imageInput" accept="image/*"> --}}
                    <label for="imageInput" class="cursor-pointer block">
                        <div class="text-4xl mb-4">📸</div>
                        <p class="text-gray-300 mb-2">Haz clic para seleccionar una imagen</p>
                        <p class="text-sm text-gray-400">PNG, JPG, JPEG (Max. 10MB)</p>
                    </label>
                </div>

                @if($photo)

                        <div class="mt-4 p-4 bg-green-900 bg-opacity-30 rounded-lg">
                            <p class="text-green-400">📁 Archivo seleccionado: {{ $photo->getClientOriginalName() }}</p>
                            {{-- <button wire:click="upload"
                                    class="mt-3 w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105"> --}}
                                <button type="submit"
                                    class="mt-3 w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105">
                                🚀 SUBIR ARCHIVO
                            </button>
                        </div>
                @endif

                {{-- </form> --}}

            @endif

            <!-- Mensaje de éxito -->
            @if($uploaded)
                <div class="text-center p-6 bg-green-900 bg-opacity-40 rounded-xl border border-green-400">
                    <div class="text-5xl mb-4">✅</div>
                    <h3 class="text-xl font-bold text-green-400 mb-2">¡Éxito!</h3>
                    <p class="text-gray-300">{{ $message }}</p>
                    <button wire:click="$set('uploaded', false)"
                            class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                        📤 Subir otra imagen
                    </button>
                </div>
            @endif

            <!-- Mensaje de error -->
            @if($message && !$uploaded)
                <div class="mt-4 p-4 bg-red-900 bg-opacity-40 rounded-lg border border-red-400">
                    <p class="text-red-400">❌ {{ $message }}</p>
                </div>
            @endif
        </div>

        </form>


        <!-- Efectos visuales -->
        <div class="flex justify-center space-x-2">
            <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
            <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
            <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
        </div>
    </div>
    </div>
</div>
