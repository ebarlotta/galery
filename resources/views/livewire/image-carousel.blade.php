<div class="min-h-screen bg-gray-900 flex flex-col">
    <!-- Título - 15% de la pantalla -->
    <div class="h-[15vh] bg-gradient-to-r from-gray-800 to-gray-900 flex items-center justify-center border-b border-gray-700">
        <h1 class="text-4xl md:text-5xl font-bold text-white text-center">
            <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                Desarrollo de Software
            </span>
        </h1>
    </div>

    <!-- Carrusel - 85% de la pantalladsadsad -->
    <div class="flex-1 relative bg-gray-800">
        @if(count($images) > 0)
            <!-- Imagen actual -->
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div class="max-w-4xl max-h-full w-full h-full flex items-center justify-center">
                    {{-- <img src="{{ asset($images[$currentIndex]['url']) }}"
                         alt="{{ $images[$currentIndex]['name'] }}"
                         class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-500 ease-in-out transform hover:scale-105"> --}}

                    <img src="{{ $images[$currentIndex]['url'] }}"
                         alt="{{ $images[$currentIndex]['name'] }}"
                         class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-500 ease-in-out transform hover:scale-105">
                </div>
            </div>

            <!-- Controles de navegación -->
            <button wire:click="previous"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-4 rounded-full transition-all duration-300 hover:scale-110">
                ◀
            </button>

            <button wire:click="next"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-4 rounded-full transition-all duration-300 hover:scale-110">
                ▶
            </button>

            <!-- Indicadores -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach($images as $index => $image)
                    <button wire:click="$set('currentIndex', {{ $index }})"
                            class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === $currentIndex ? 'bg-white scale-125' : 'bg-gray-500 hover:bg-gray-300' }}">
                    </button>
                @endforeach
            </div>

            <!-- Contador -->
            <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-4 py-2 rounded-full text-sm">
                {{ $currentIndex + 1 }} / {{ count($images) }}
            </div>

            <!-- Auto-avance cada 3 segundos -->
            <script>
                document.addEventListener('livewire:load', function() {
                    setInterval(() => {
                        @this.next();
                    }, 3000);
                });
            </script>

        @else
            <!-- Estado vacío -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-gray-400">
                    <div class="text-6xl mb-4">🖼️</div>
                    <h3 class="text-xl font-semibold mb-2">No hay imágenes disponibles</h3>
                    <p>Las imágenes aparecerán aquí una vez que sean cargadas.</p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let currentIndex = 0;
    const items = $('.carousel-item');
    const totalItems = items.length;

    function nextSlide() {
        items.eq(currentIndex).removeClass('active');
        currentIndex = (currentIndex + 1) % totalItems;
        items.eq(currentIndex).addClass('active');
    }

    // Cambiar cada 3 segundos
    setInterval(nextSlide, 3000);

    // Pausar al hacer hover
    $('.carousel').hover(
        function() { clearInterval(slideInterval); },
        function() { slideInterval = setInterval(nextSlide, 3000); }
    );

    let slideInterval = setInterval(nextSlide, 3000);
});
</script>
</div>
