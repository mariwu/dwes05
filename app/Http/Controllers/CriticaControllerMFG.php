<?php

namespace App\Http\Controllers;

use App\Models\PeliculaMFG;
use App\Models\CriticaMFG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriticaControllerMFG extends Controller
{
    public function mostrarFormularioCriticaMFG(Request $request){
        //Busco la pelicula que nos manda por su id
        $pelicula = PeliculaMFG::find($request->pelicula_id);
        //Si no existe la pelicula...
        if(!$pelicula){
            $error = "La película no existe.";
            //se muestra el error
            return view('privada.criticacreadaMFG', ['error' => $error]);        
        }else{
            //Existe la pelicula.. Se comprueba si el usuario a votado la pelicula..filtro por el id de la pelicula,id de usuario 
            //compruebo que no haya criticas... si las hay: muestro el error
            if(CriticaMFG::where('pelicula', $pelicula->id)->where('usuario', Auth::id())->count() > 0){
                $error = "Ya has votado en esta película.";
                return view('privada.criticacreadaMFG', ['error' => $error]);
            }else{
                //No hay criticas: Muestro los datos de la pelicula y el formulario
                return view('privada.formnuevacriticaMFG', ['pelicula' => $pelicula]);
            }
        
        }
    }

    public function crearNuevaCriticaMFG(PeliculaMFG $pelicula, Request $request){
        //Valido los datos del formulario
        $datosvalidados = $request->validate([
            //Valoracion entre 1 y 5 (entero)
            'valoracion' => 'integer|min:1|max:5',
            //Comentario string y no max de 255
            'comentario' => 'string|max:255',
        ]);

        //Verifico que el usuario no ha votado antes la pelicula (igual que antes)
        if(CriticaMFG::where('pelicula', $pelicula->id)->where('usuario', Auth::id())->count() > 0) {
            $error = "Ya has votado en esta película.";
            return view('privada.criticacreadaMFG', ['error' => $error]);
        }else{
            //No tiene critica, por tanto la creo
            $c = new CriticaMFG;
            $c->valoracion = $datosvalidados['valoracion'];
            $c->comentario = $datosvalidados['comentario'];
            $c->pelicula = $pelicula->id;
            $c->usuario = Auth::id();
            $c->save();
            //preparo mensaje de resultado con el tiutlo de la pelicula         
            $resultado = "Crítica creada correctamente para la película " . $pelicula->titulo;
            return view('privada.criticacreadaMFG', ['resultado' => $resultado]);
        }

    }

    public function mostrarFormularioBorraCriticaMFG(Request $request){
        //Busco la crítica por su id
        $critica = CriticaMFG::find($request->critica_id);

        //Verfico que la crítica existe y pertenece al usuario autenticado
        if (!$critica || $critica->usuario != Auth::id()) {
            $error = "La crítica no existe o no te pertenece.";
            return view('privada.criticacreadaMFG', ['error' => $error]);
        }

        //Se muestra el formulario de confirmación con los datos de la crítica
        return view('privada.formborracriticaMFG', ['critica' => $critica]);
    }

    public function borraCriticaMFG(CriticaMFG $critica, Request $request){
        //Verifico que la crítica pertenece al usuario autenticado
        if ($critica->usuario != Auth::id()) {
            $error = "La crítica no te pertenece.";
            return view('privada.criticacreadaMFG', ['error' => $error]);
        }

        //Si pulsa NO.. vuelve al listado
        if ($request->has('no')) {
            return redirect(route('zonaprivada'));
        }

        //Si pulsa SI y ha marcado la casilla... Se borra la crítica
        if ($request->has('confirmacion')) {
            $critica->delete();
            $resultado = "Crítica borrada correctamente.";
            return view('privada.criticacreadaMFG', ['resultado' => $resultado]);
        }

        //Si no se ha marcado la casilla... mostramos error
        $error = "Debes marcar la casilla de confirmación.";
        return view('privada.formborracriticaMFG', ['critica' => $critica, 'error' => $error]);
    }
}
