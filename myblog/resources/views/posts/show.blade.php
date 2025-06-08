<x-guest-layout>
    @if (session('success'))
        <div id="success-message" class="bg-green-100 text-green-700 p-3 rounded mb-4 transition-opacity duration-500">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.classList.add('opacity-0');
                    setTimeout(() => msg.remove(), 500); // Lo quita del DOM luego de la transición
                }
            }, 3000); // 3000ms = 3 segundos
        </script>
    @endif

    <div class="w-full p-2 bg-white shadow-md rounded">
        <h1 class="text-5xl font-bold mb-4 text-start">{{ $post->title }}</h1>

        <div class="mb-4 text-gray-700">
            @if ($post->poster)
                <div class="flex justify-center mb-4">
                    <img src="{{ $post->poster }}" alt="Imagen del post"
                        class="w-full h-[400px] object-cover rounded shadow-md">
                </div>
            @endif

            <p class="mb-4 text-center">{{ $post->content }}</p>
        </div>

        <div class="flex justify-center gap-4">
            @auth
                @if ($isOwner)
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Editar
                    </a>
                @endif
            @endauth

            <a href="{{ route('category.show', $post->id_category) }}"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Volver al listado
            </a>
        </div>

        <hr class="my-6">

        <div class="mt-6">
            <h2 class="text-xl font-bold mb-4">Comentarios</h2>

            <!-- se muestran los comentarios que ya tiene -->
            @forelse($post->comments as $comment)
                <div class="mb-4 p-3 border rounded shadow-sm bg-gray-50">
                    <p class="text-sm text-gray-700 font-semibold">
                        {{ $comment->user->name ?? 'Usuario eliminado' }}
                    </p>
                    <p>{{ $comment->content }}</p>
                    <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-600">Aún no hay comentarios.</p>
            @endforelse

            <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mt-6">
                @csrf

                @auth
                    <textarea name="content" class="w-full border rounded p-2 mb-2" rows="3" placeholder="Escribí tu comentario..."></textarea>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Enviar Comentario
                    </button>
                @endauth
            </form>
        </div>

    </div>
    </x-guets-layout>
