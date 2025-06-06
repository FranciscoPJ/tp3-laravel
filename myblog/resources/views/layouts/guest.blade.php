<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <!-- Footer siempre al fondo -->
    <footer class="text-grey bg-gray-100 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sección de contacto -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Acerca de</h3>
                <p>Este blog está creado para compartir noticias, artículos y opiniones sobre diversos temas.</p>
            </div>

            <!-- Enlaces útiles -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Enlaces</h3>
                <ul>
                    <li><a href="{{ route('home.index') }}" class="hover:underline">Inicio</a></li>
                    <li><a href="{{ route('category.index') }}" class="hover:underline">Categorías</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:underline">Contacto</a></li>
                </ul>
            </div>

            <!-- Redes sociales -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Redes Sociales</h3>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center py-3 text-sm">
            &copy; {{ date('Y') }} Mi Blog. Todos los derechos reservados.
        </div>
    </footer>
</body>

</html>
