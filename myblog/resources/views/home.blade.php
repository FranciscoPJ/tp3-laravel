<x-guest-layout>


    @if($posts->isEmpty())
        <p>No hay publicaciones.</p>
    @endif

    <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 w-full h-fit p-2 gap-1 overflow-hidden">

        {{-- Lateral izquierda (slider) --}}
        <div id="slider"
            class="relative overflow-hidden z-0 sm:col-span-1 md:col-span-2 lg:col-span-2 w-full min-h-[300px]">
            @foreach ($posts->take(3) as $index => $post)
                <div
                    class="slide absolute w-full h-full flex justify-center items-center transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} rounded-sm">
                    <img src="{{ $post->poster }}" alt="home" class="object-cover w-full h-full rounded-sm ">
                </div>
            @endforeach
        </div>

        {{-- Lateral derecha --}}
        <div class="grid gap-1 sm:col-span-1 md:col-span-1 lg:col-span-1 h-full">
            @foreach ($posts->take(3) as $post)
                <div class="flex justify-center items-center transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                    <img class="w-[300px] h-[128px] rounded-sm object-cover" src="{{ $post->poster }}" alt="home">
                </div>
            @endforeach
        </div>

    </div>


    <div class="w-full mt-2 flex flex-col items-start">

        <h2 class="ml-2 text-5xl">
            Explora Nuestros Blogs
        </h2>

        <div class="mt-2 ml-3 text-md">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nobis harum eum esse doloribus iure provident
            architecto? Corporis harum eligendi, magni corrupti aperiam neque perspiciatis, iste facere molestiae obcaecati
            vero.
        </div>

    </div>

    <script>
        const slides = document.querySelectorAll("#slider .slide");
        let current = 0;
        const displayTime = 3000; // milisegundos (3 segundos)

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove("opacity-100");
                slide.classList.add("opacity-0");
                if (i === index) {
                    slide.classList.remove("opacity-0");
                    slide.classList.add("opacity-100");
                }
            });
        }

        function startSlider() {
            console.log(slides); // Agregad    
            showSlide(current);
            setInterval(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            }, displayTime);
        }

        // Iniciar cuando cargue
        window.addEventListener("DOMContentLoaded", startSlider);
    </script>

</x-guest-layout>
