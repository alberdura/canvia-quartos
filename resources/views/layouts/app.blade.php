<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>@yield('title', 'Cambio de Divisas')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-primary text-center" >
            <a class="navbar-brand" href="#table">Taula de conversions</a>
            <a class="navbar-brand" href="#graphic">Gràfic de les monedes</a>
        </nav>
    </header>

    <div class="content">
    <main>
        @yield('convert')
        @yield('tableContent')
        @yield('graphicContent')
    </main>
    </div>
    <footer>
        <p>&copy; 2024 Canvi de divises</p>
    </footer>
</body>
</html>
