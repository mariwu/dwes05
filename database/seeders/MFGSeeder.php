<?php
//Maria Fernandez Gilarte
namespace Database\Seeders;
use App\Models\GeneroMFG;
use App\Models\PeliculaMFG;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MFGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Antes de insertar compruebo si existe el usuario para evitar duplicados si ejecuto el seeder varias veces
        if(User::where('name','MFG1')->count()==0){
            
            $u = new User;
            $u->name = 'MFG1';
            $u->email = 'MFG1@email.MFG';
            $u->password = Hash::make('MFG1');//encriptacion de contraseña
            $u->email_verified_at = now();
            $u->save(); //se guarda en la BBDD
        }

        if (User::where('name','MFG2')->count()==0){
            $u = new User;
            $u->name = 'MFG2';
            $u->email = 'MFG2@email.MFG';
            $u->password = Hash::make('MFG2');
            $u->email_verified_at = now();
            $u->save();
        }

        //inserto los generos
        if(GeneroMFG::where('nombre','animacion')->count()==0){
            $g= new GeneroMFG;
            $g->nombre='animacion';
            $g->descripcion='Películas de animación, tanto tradicionales como por computadora.';
            $g->save();
        }
        if(GeneroMFG::where('nombre','drama')->count()==0){
            $g= new GeneroMFG;
            $g->nombre='drama';
            $g->descripcion='Películas centradas en el desarrollo emocional y conflictos de los personajes.';
            $g->save();
        }
        if(GeneroMFG::where('nombre','ciencia ficción-fantasía')->count()==0){
            $g= new GeneroMFG;
            $g->nombre='ciencia ficción-fantasía';
            $g->descripcion='Películas con elementos tecnológicos, futuristas o fantásticos.';
            $g->save();
        }
        if(GeneroMFG::where('nombre','comedia')->count()==0){
            $g= new GeneroMFG;
            $g->nombre='comedia';
            $g->descripcion='Películas destinadas a provocar risa y entretenimiento ligero.';
            $g->save();
        }
        if(GeneroMFG::where('nombre','otros')->count()==0){
            $g= new GeneroMFG;
            $g->nombre='otros';
            $g->descripcion='Películas o documentales de otros géneros.';
            $g->save();
        }
        //Inserto pelicula
        if(PeliculaMFG::where('titulo','La princesa cisne')->count()==0){
            $p = new PeliculaMFG();
            $p->titulo='La princesa cisne';
            $p->direccion='Una persona';
            $p->duracion=80;
            $p->argumento='Una muchacha que se transforma en cisne cuando se moja';
            $p->anio=1994;
            $p->genero = 1;//id:animacion
            $p->save();
        }
        if(PeliculaMFG::where('titulo','Mulan')->count()==0){
            $p = new PeliculaMFG();
            $p->titulo='Mulan';
            $p->direccion='Otra persona';
            $p->duracion=100;
            $p->argumento='Una guerrera del oriental';
            $p->anio=2010;
            $p->genero = 2;//id:drama
            $p->save();
        }
    }
}
