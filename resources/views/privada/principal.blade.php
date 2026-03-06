@extends('plantillas.basePrivada')

@section('titulo', 'Zona Privada')

@section('contenido')
        <H2>Bienvenido {{ Auth::user()->name}} a la página principal de la zona PRIVADA.</H2>
            <A href="{{ route('zonapublica') }}">Ve a la zona pública</A><BR>
            <A href="{{ route('logout') }}">Cierra sesión.</A></BR>
        
        <h2>Mis criticas</h2>
        <h3>En total has realizado {{ $totalCriticas }} criticas</h3>
        
        @if($totalCriticas == 0)
            <p>No tienes criticas todavía. ¡Animate y critica alguna pelicula!</p>
        @else
            <table border=1>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Valoración</th>
                        <th>Comentario</th>
                        <th>Título película</th>
                        <th>Año</th>
                        <th>Dirección</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($criticas as $critica)
                    <tr>
                        <td>{{ $critica->id }}</td>
                        <td>{{ $critica->valoracion }}</td>
                        <td>{{ $critica->comentario }}</td>
                        {{-- Accedemos a la película relacionada mediante la relación belongsTo --}}
                        <td>{{ $critica->pelicula()->first()->titulo }}</td>
                        <td>{{ $critica->pelicula()->first()->anio }}</td>
                        <td>{{ $critica->pelicula()->first()->direccion }}</td>
                        <td>
                            <form action="{{ route('formborracriticaMFG') }}" method="POST">
                                @csrf
                                <input type="hidden" name="critica_id" value="{{ $critica->id }}">
                                <button type="submit">Borrar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
@endsection