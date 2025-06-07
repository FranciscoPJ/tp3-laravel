<x-guest-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 text-center">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Categoría: {{ $category->name }}</h1>

        <a href="{{ route('posts.create', ['category' => $category->id]) }}"
            class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
            + Crear nuevo post
        </a>

        <h2 class="text-xl font-semibold mb-4 text-gray-700">📝 Listado de Posts</h2>

        @if ($category->posts->isEmpty())
            <p class="text-gray-500 mb-6">No hay posts en esta categoría.</p>
        @else
            <div class="grid gap-6 mb-8">
                @foreach ($category->posts as $post)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-left">
                        <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ $post->content }}</p>
                        <a href="{{ url('/post/show/' . $post->id) }}"
                            class="text-blue-600 hover:underline font-semibold">Ver más</a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-10">
            <a href="{{ route('category.index') }}"
                class="inline-block bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300 transition">
                ← Volver a las categorías
            </a>
        </div>
    </div>
</x-guest-layout>
