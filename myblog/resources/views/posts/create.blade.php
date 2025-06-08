<x-app-layout>

    <h1 class="text-xl font-bold mb-4">Crear Nuevo Blog</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-medium">Título:</label>
            <input type="text" id="title" name="title" class="border rounded w-full p-2" required>
        </div>

        <label class="block font-medium w-full">Categoría:</label>
        <div class="inline-block relative w-full">
            <select name="id_category"
                class="block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
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

        {{-- <div class="mb-4">
            <label for="poster" class="block font-medium">Poster:</label>
            <input type="file" id="poster" name="poster" class="border rounded w-full p-2" accept="image/*"
                required>
        </div> --}}

        <div class="mb-4 mt-4">
            <label class="text-start w-full ml-2">Poster:</label>
            <input type="text" name="poster" value="{{ old('poster') }}"
                class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Escribe una URL de un poster...">
        </div>

        <div class="flex mb-4 mt-4 w-full shadow appearance-none border rounded py-3 px-1 bg-white bg-opacity-75">
            <label for="default-checkbox" class="text-start">¿Habilitado?</label>
            <input type="checkbox" name="habilitated" value="1" {{ old('habilitated') ? 'checked' : '' }}
                class="w-4 ml-2 mt-0.5">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción:</label>
            <textarea id="content" name="content" class="border rounded w-full p-2" required></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>

</x-app-layout>
