<x-guest-layout title="Listado de Categorias">
    <div class="max-w-4xl mx-auto pt-4">
        <h1 class="text-2xl font-bold text-blue-700 mb-6 text-center">📝 Listado de Categorias</h1>


        <div>
            <ul class="space-y-4">
                @foreach ($categories as $category)
                    <li class="relative border border-gray-200 shadow-sm p-6 rounded-lg bg-white hover:shadow-md transition"
                        style="background-image: url('{{ $category->image }}');">
                        <div class="absolute inset-0 bg-black/25 backdrop-blur-sm rounded-lg object-cover"></div>
                        <div class="relative z-10">
                            <h2 class="text-xl font-semibold text-white mb-2">{{ $category->name }}</h2>
                            <div class="bg-black/15 w-fit rounded-md backdrop-blur-sm">
                                <a href="{{ url('/category/show/' . $category->id) }}"
                                class="text-white hover:underline font-medium p-2">
                                    Ver Posts →
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-guest-layout>
