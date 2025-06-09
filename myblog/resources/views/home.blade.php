<x-guest-layout title="MyBlog">
    <div class="w-full mt-10 flex flex-col items-center text-center px-4">
        <h2 class="text-5xl font-extrabold text-gray-800 mb-4">
            ¡Bienvenidos a <span class="text-indigo-600">MyBlog</span>!
        </h2>

        <p class="text-lg text-gray-600 max-w-2xl">
            Un espacio donde compartimos ideas, aprendizajes y experiencias sobre tecnología, desarrollo web, y mucho
            más.
            Descubre artículos interesantes, mantente al día con las últimas tendencias y únete a nuestra comunidad!
        </p>
    </div>

    <div class="w-full mt-10 flex flex-col items-center  px-4">
        <h2 class="text-3xl md:text-4xl  text-gray-800 mb-2">
            Revisa los últimos posts
        </h2>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 w-full h-fit p-2 gap-1 overflow-hidden">

        {{-- Lateral izquierda (slider) --}}
        <div id="slider"
            class="relative overflow-hidden z-0 sm:col-span-1 md:col-span-2 lg:col-span-2 w-full min-h-[300px]">
            @foreach ($posts->slice(-3)->values() as $index => $post)
                <div
                    class="slide absolute w-full h-full flex justify-center items-center transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} rounded-sm">
                    <img src="{{ $post->poster }}" alt="home" class="object-cover w-full h-full rounded-sm">
                    <div class="hidden post-link" data-link="{{ url('/post/show/' . $post->id) }}" data-title="{{ $post->title }}"></div>
                </div>
            @endforeach

            <!-- Botón absoluto -->
            <button id="goToPost"
                class="absolute bottom-4 right-4 bg-black bg-opacity-90 hover:bg-gray-700 text-white px-4 py-2 rounded shadow-md z-10">
                {{ $post->title }}
            </button>
        </div>



        {{-- Lateral derecha --}}
        <div class="grid gap-1 sm:col-span-1 md:col-span-1 lg:col-span-1 w-full h-fit">
            @foreach ($posts->slice(0, $posts->count() - 3) as $post)
                <div
                    class="relative w-min-300 h-full overflow-hidden rounded-sm transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                    <img class="w-full h-full object-cover" src="{{ $post->poster }}" alt="home">

                    <div
                        class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70  hover:bg-gray-700 text-white px-2 py-1 text-sm text-center">
                        <a href="{{ url('/post/show/' . $post->id) }}" class="w-full">
                            {{ $post->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <script>
    const slides = document.querySelectorAll("#slider .slide");
    let current = 0;
    const displayTime = 3000;
    const goToPostBtn = document.getElementById("goToPost");

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("opacity-100");
            slide.classList.add("opacity-0");
            if (i === index) {
                slide.classList.remove("opacity-0");
                slide.classList.add("opacity-100");
            }
        });

        // Actualizar el texto del botón con el título del slide visible
        const visibleSlide = slides[index];
        const postLinkDiv = visibleSlide.querySelector(".post-link");
        if (postLinkDiv) {
            goToPostBtn.textContent = postLinkDiv.dataset.title;
        }
    }

    function startSlider() {
        showSlide(current);
        setInterval(() => {
            current = (current + 1) % slides.length;
            showSlide(current);
        }, displayTime);
    }

    window.addEventListener("DOMContentLoaded", () => {
        startSlider();

        goToPostBtn.addEventListener("click", () => {
            const visibleSlide = document.querySelector("#slider .slide.opacity-100");
            const postLinkDiv = visibleSlide.querySelector(".post-link");
            const link = postLinkDiv?.dataset.link;

            if (link) {
                window.location.href = link;
            }
        });
    });
</script>



</x-guest-layout>
