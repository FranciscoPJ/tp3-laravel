<x-app-layout>
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
            <label for="category" class="block font-medium">Categoría:</label>            
            <div class="inline-block relative w-full">
                <select name="id_category"
                    class="block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->id_category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0.5 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="poster" class="block font-medium">URL de Imagen:</label>
            <input type="text" name="poster" value="{{ $post->poster }}"
                class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Escribe una URL de un poster...">
        </div>

        <div>
            <div class="flex mb-4 mt-4 w-full shadow appearance-none border rounded py-3 px-1 bg-white bg-opacity-75">
                <label for="default-checkbox" class="text-start">¿Habilitado?</label>
                <input type="checkbox" name="habilitated" value="1" {{ $post->habilitated ? 'checked' : '' }}
                    class="w-4 ml-2 mt-0.5">
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción:</label>
            <textarea id="content" name="content" class="border rounded w-full p-2" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</x-app-layout>
