<x-guest-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 w-full h-fit p-2 gap-1 overflow-hidden">

        {{-- Lateral izquierda (slider) --}}
        <div id="slider"
            class="relative overflow-hidden z-0 sm:col-span-1 md:col-span-2 lg:col-span-2 w-full min-h-[300px]">
            @foreach ($posts->slice(-3)->values() as $index => $post)
                <div
                    class="slide absolute w-full h-full flex justify-center items-center transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} rounded-sm">
                    <img src="{{ $post->poster }}" alt="home" class="object-cover w-full h-full rounded-sm ">

                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-70 text-white w-full p-2 text-center">
                        <a href="{{ url('/post/show/' . $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Lateral derecha --}}
        <div class="grid gap-1 sm:col-span-1 md:col-span-1 lg:col-span-1 w-full h-fit">
            @foreach ($posts->slice(0, $posts->count() - 3) as $post)
                <div
                    class="relative w-min-300 h-full overflow-hidden rounded-sm transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                    <img class="w-full h-full object-cover" src="{{ $post->poster }}" alt="home">

                    <div
                        class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white px-2 py-1 text-sm text-center">
                        <a href="{{ url('/post/show/' . $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </div>
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
            architecto? Corporis harum eligendi, magni corrupti aperiam neque perspiciatis, iste facere molestiae
            obcaecati
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
