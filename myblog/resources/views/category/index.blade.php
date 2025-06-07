<x-guest-layout>
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">📝 Listado de Categorias</h1>


        <div>
            <ul class="space-y-4">
                @foreach ($categories as $category)
                    <li class="border border-gray-200 shadow-sm p-6 rounded-lg bg-white hover:shadow-md transition">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $category->name }}</h2>
                        <a href="{{ url('/category/show/' . $category->id) }}"
                            class="text-blue-600 hover:underline font-medium">
                            Ver Posts →
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-guest-layout>
