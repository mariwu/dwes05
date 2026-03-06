@extends('plantillas.basePrivada')

@section('titulo', 'Borrar crítica')

@section('contenido')
    <h2>¿Estás seguro de que quieres borrar la crítica?</h2>

    {{-- Si hay error lo mostramos --}}
    @if(isset($error))
        <p>{{ $error }}</p>
    @endif

    <h3>Detalles de la crítica:</h3>
    <table>
        <tbody>
            <tr><td>Título</td><td>{{ $critica->pelicula()->first()->titulo }}</td></tr>
            <tr><td>Dirección</td><td>{{ $critica->pelicula()->first()->direccion }}</td></tr>
            <tr><td>Año</td><td>{{ $critica->pelicula()->first()->anio }}</td></tr>
            <tr><td>Tu valoración</td><td>{{ $critica->valoracion }} de 5</td></tr>
            <tr><td>Tu comentario</td><td>{{ $critica->comentario }}</td></tr>
        </tbody>
    </table>

    {{-- Formulario de confirmación --}}
    <form action="{{ route('borracriticaMFG', $critica->id) }}" method="POST">
        @csrf
        <p>
            Marca la casilla de confirmación y haz click en "Sí" para confirmar el borrado
            <input type="checkbox" name="confirmacion">
            <button type="submit" name="si">Sí</button>
        </p>
        <p>
            o haz clic en "No" para no borrar la crítica
            <button type="submit" name="no">No</button>
        </p>
    </form>
@endsection