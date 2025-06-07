<x-guest-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4 text-center">{{ $post->title }}</h1>

        <div class="mb-4 text-gray-700">
            <p class="mb-4 text-center">{{ $post->content }}</p>

            @if ($post->poster)
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post"
                        class="w-64 h-auto rounded shadow-md">
                </div>
            @endif
        </div>

        <div class="flex justify-center gap-4">
            <a href="{{ route('posts.edit', $post->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Editar
            </a>
            <a href="{{ route('category.show', $post->category) }}"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Volver al listado
            </a>
        </div>
    </div>
</x-guest-layout>
