@extends('plantillas.basePrivada')

@section('titulo', 'Nueva crítica')

@section('contenido')
    <h2>Detalles de la película</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Año</th>
                <th>Argumento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pelicula->titulo }}</td>
                <td>{{ $pelicula->direccion }}</td>
                <td>{{ $pelicula->genero }}</td>
                <td>{{ $pelicula->duracion }}</td>
                <td>{{ $pelicula->anio }}</td>
                <td>{{ $pelicula->argumento }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Formulario para insertar la crítica --}}
    <h2>Nueva crítica</h2>
    <form action="{{ route('crearnuevacriticaMFG', $pelicula->id) }}" method="POST">
        @csrf
        <label>Valoración (1-5):</label>
        <select name="valoracion">
            <option value="texto">Seleccione una valoración</option>
            <option value="0">Número no válido</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <label>Comentario:</label><br>
        <textarea name="comentario" rows="5" cols="50"></textarea><br><br>
        <input type="submit" value="Enviar crítica">
    </form>
@endsection