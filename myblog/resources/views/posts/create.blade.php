<x-guest-layout>
    <h1 class="text-xl font-bold mb-4">Crear nuevo Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-medium">Título:</label>
            <input type="text" id="title" name="title" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="poster" class="block font-medium">Poster:</label>
            <input type="file" id="poster" name="poster" class="border rounded w-full p-2" accept="image/*"
                required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción:</label>
            <textarea id="description" name="description" class="border rounded w-full p-2" required></textarea>
        </div>

        <input type="hidden" name="category_id" value="{{ $category->id }}">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</x-guest-layout>
