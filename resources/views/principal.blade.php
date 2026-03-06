@extends('plantillas.basePublica')

@section('titulo', 'Zona Publica')

@section('contenido')

    <H2>Bienvenido a la página principal PÚBLICA.</H2>
    @auth
    Estás autenticado, puedes ir a ...
    <A href="{{ route('zonaprivada') }}">tu zona privada</A><BR>
    @endauth
    @guest
    No estás autenticado, por favor ...
    <A href="{{ route('formlogin') }}">inicia sesión.</A><BR>
    @endguest

    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Año</th>
                <th>Argumento</th>
                @auth
                    <th>Total críticas</th>
                    <th>Puntuación media</th>
                    <th>Acciones</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
            <tr>
                <td>{{ $pelicula->id }}</td>
                <td>{{ $pelicula->titulo }}</td>
                <td>{{ $pelicula->direccion }}</td>
                <td>{{ $pelicula->genero }}</td>
                <td>{{ $pelicula->duracion }}</td>
                <td>{{ $pelicula->anio }}</td>
                <td>{{ $pelicula->argumento }}</td>
                @auth
                <td>{{ $pelicula->criticas->count() }}</td>
                <td>{{ $pelicula->criticas->avg('valoracion') }}</td>
                    <td>
                        <form action="{{ route('formcriticaMFG') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">
                            <button type="submit">Valorar Película</button>
                        </form>
                    </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection