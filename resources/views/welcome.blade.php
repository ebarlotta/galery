<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel de Imágenes</title>
    <style>
        .carousel-container {
            position: relative;
            max-width: 700px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            height: 500px;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Botones de navegación */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s;
        }

        .carousel-btn:hover {
            background: rgba(0,0,0,0.8);
        }

        .prev-btn {
            left: 10px;
            border-radius: 0 5px 5px 0;
        }

        .next-btn {
            right: 10px;
            border-radius: 5px 0 0 5px;
        }

        /* Indicadores */
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .indicator.active {
            background: white;
        }
    </style>


</head>
<body>
    <div class="min-h-screen bg-gray-900 flex flex-col">
        <!-- Título - 15% de la pantalla -->
        <div class="h-[15vh] bg-gradient-to-r from-gray-800 to-gray-900 flex items-center justify-center border-b border-gray-700">
            <h1 class="text-4xl md:text-8xl font-bold text-white text-center" style="font-size: 80px;">
                <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent" style="    justify-content: center;
    display: flex;">
                    Desarrollo de Software
                </span>
            </h1>
        </div>
    {{-- <div class="flex-1 relative bg-gray-800"> --}}

        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-item">
                    <img src="storage/1.jpeg" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="storage/2.jpeg" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="storage/3.jpeg" alt="Imagen 3">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/800/400?random=2" alt="Imagen 2">
                </div>
                {{-- <div class="carousel-item">
                    <img src="https://picsum.photos/800/400?random=3" alt="Imagen 3">
                </div> --}}
            </div>

            <!-- Botones de navegación -->
            <button class="carousel-btn prev-btn">‹</button>
            <button class="carousel-btn next-btn">›</button>

            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button class="indicator active" data-slide="0"></button>
                <button class="indicator" data-slide="1"></button>
                <button class="indicator" data-slide="2"></button>
            </div>
        </div>
    {{-- </div> --}}

    <script>
        class Carrusel {
            constructor(container) {
                this.container = container;
                this.carousel = container.querySelector('.carousel');
                this.items = container.querySelectorAll('.carousel-item');
                this.prevBtn = container.querySelector('.prev-btn');
                this.nextBtn = container.querySelector('.next-btn');
                this.indicators = container.querySelectorAll('.indicator');
                this.currentIndex = 0;
                this.totalItems = this.items.length;

                this.init();
            }

            init() {
                // Event listeners para botones
                this.prevBtn.addEventListener('click', () => this.prevSlide());
                this.nextBtn.addEventListener('click', () => this.nextSlide());

                // Event listeners para indicadores
                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });

                // Auto-play cada 3 segundos
                this.startAutoPlay();

                // Pausar auto-play al hacer hover
                this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
                this.container.addEventListener('mouseleave', () => this.startAutoPlay());
            }

            updateCarousel() {
                // Mover el carrusel
                this.carousel.style.transform = `translateX(-${this.currentIndex * 100}%)`;

                // Actualizar indicadores
                this.indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentIndex);
                });
            }

            nextSlide() {
                this.currentIndex = (this.currentIndex + 1) % this.totalItems;
                this.updateCarousel();
            }

            prevSlide() {
                this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
                this.updateCarousel();
            }

            goToSlide(index) {
                this.currentIndex = index;
                this.updateCarousel();
            }

            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, 3000);
            }

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                }
            }
        }

        // Inicializar el carrusel cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', () => {
            const carouselContainer = document.querySelector('.carousel-container');
            new Carrusel(carouselContainer);
        });
    </script>
</body>
</html>
