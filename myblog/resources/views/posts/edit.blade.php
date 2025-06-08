<x-app-layoutt>
    <h1 class="text-xl font-bold mb-4">Editar Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Laravel espera este método para updates -->

        <div class="mb-4">
            <label for="title" class="block font-medium">Título:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}"
                class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="poster" class="block font-medium">Imagen:</label>
            <input type="file" id="poster" name="poster" class="border rounded w-full p-2" accept="image/*">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción:</label>
            <textarea id="description" name="description" class="border rounded w-full p-2" required>{{$post->content}}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</x-app-layoutt>
