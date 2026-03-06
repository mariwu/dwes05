@extends('plantillas.basePrivada')

@section('titulo', 'Crítica')

@section('contenido')
    {{-- Si hay error lo mostramos --}}
    @if(isset($error))
        <h2>Error</h2>
        <p>{{ $error }}</p>
    @endif

    {{-- Si todo fue bien mostramos el resultado --}}
    @if(isset($resultado))
        <h2>¡Crítica creada correctamente!</h2>
        <p>{{ $resultado }}</p>
    @endif

    {{-- Enlaces para navegar --}}
    <a href="{{ route('zonapublica') }}">Volver al listado de películas</a><br>
    <a href="{{ route('zonaprivada') }}">Ir a mi zona privada</a>
@endsection