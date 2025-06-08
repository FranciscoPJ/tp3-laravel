<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <!-- Page Header -->
    <header class="bg-gray-100">
        @include('layouts.navigation')
    </header>

    <!-- Page Content -->
    <main class="flex-grow p-2 pt-[90px]">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-100 ">
        <div class="container mx-fit px-4 py-6 flex flex-col sm:flex-row justify-between gap-8 text-gray-700">

            <!-- Sección de contacto -->
            <div class="flex-1">
                <h3 class="text-lg font-semibold mb-2">Acerca de</h3>
                <p>Este blog está creado para compartir noticias, artículos y opiniones sobre diversos temas.</p>
            </div>

            <!-- Enlaces útiles -->
            <div class="flex-1">
                <h3 class="text-lg font-semibold mb-2">Enlaces</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('home.index') }}" class="hover:underline">Inicio</a></li>
                    <li><a href="{{ route('category.index') }}" class="hover:underline">Categorías</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:underline">Contacto</a></li>
                </ul>
            </div>

            <!-- Redes sociales -->
            <div class="flex-1">
                <h3 class="text-lg font-semibold mb-2">Redes Sociales</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                </ul>
            </div>
        </div>

        <div class="text-center py-3 text-sm bg-gray-100">
            &copy; {{ date('Y') }} Mi Blog. Todos los derechos reservados.
        </div>
    </footer>
</body>

</html>
