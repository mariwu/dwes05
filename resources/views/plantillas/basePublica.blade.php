<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - Zona Pública</title>
    <link rel="stylesheet" href="{{ asset('css/estiloPublico.css') }}"/>
</head>
<body>
    <header class="cabecera">
        <h1>Bienvenido a la web de críticas de películas</h1>
        <h4>María Fernández Gilarte</h4>
    </header>
    <div class="contenido">
    @yield('contenido')
    </div>
    <footer>        
        <div>
            <p>&copy; Copyright DEWS</p>
            <p>Diseñado por: María Fernández Gilarte</p>
        </div>
    </footer>
</body>
</html>