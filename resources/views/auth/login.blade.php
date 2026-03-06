@extends('plantillas.basePublica')

@section('titulo', 'Inicio de Sesión')

@section('contenido')
    @auth
        <h1>Ya has iniciado sesión</h1>
        <a href="{{ route('zonaprivada') }}">Ir a zona privada</a>
    @endauth

    @guest
        <div class="login">
            <h1>Iniciar Sesión</h1>
            @if ($errors->any())
                <div style="color: red;">
                    <h2>ERRORES:</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
        </div>    
    @endguest
@endsection