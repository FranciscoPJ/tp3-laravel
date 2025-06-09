<x-guest-layout title="Listado de {{ $category->name }}">
    <div class="max-w-4xl mx-auto py-8 px-4 text-center">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Categoría: {{ $category->name }}</h1>

        @auth
            <a href="{{ route('posts.create')}}"
                class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                + Crear nuevo post
            </a>
        @endauth



        <form method="GET" action="{{ route('category.show', $category->id) }}" class="mb-6">
            <div class="flex gap-2 justify-center">
                <input type="text" name="search" placeholder="Buscar posts..." value="{{ $query ?? '' }}"
                    class="w-full md:w-1/2 p-2 border rounded shadow">
                <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition">
                    Buscar
                </button>
                <a href="{{ route('category.show', $category->id) }}"
                    class="bg-gray-300 text-gray-800 p-2 rounded hover:bg-gray-400 transition">
                    Limpiar
                </a>
            </div>
        </form>


        <h2 class="text-xl font-semibold mb-4 text-gray-700">📝 Listado de Posts</h2>

        @if ($posts->isEmpty())
            <p class="text-gray-500 mb-6">No hay posts en esta categoría.</p>
        @else
            <div class="grid gap-6 mb-8">
                @foreach ($posts as $post)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-left">
                        {{-- <span><img src="{{ $category->image }}" alt="{{ $post->title }}" class="w-auto"></span> --}}
                        <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 150) }}</p>
                        <a href="{{ url('/post/show/' . $post->id) }}"
                            class="text-blue-600 hover:underline font-semibold">Ver más
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $posts->appends(['search' => $query])->links() }}
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
