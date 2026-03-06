<?php
//María Fernandez Gilarte
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaMFG extends Model
{
    use HasFactory;
    //Edito el modelo de la tabla
    protected $table = 'peliculas';
        protected $fillable =[
            'titulo',
            'direccion',
            'duracion',
            'argumento',
            'anio',
            'genero'
        ];
        //Establezco la relacion de pelicula con genero, una pelicula tiene un genero
        public function genero(){
            return $this->belongsTo(GeneroMFG::class, 'genero');
        }
        //Establezco la relacion de pelicula y critica (una pelicula tiene muchas criticas 1:N)
        public function criticas(){
            return $this->hasMany(CriticaMFG::class, 'pelicula');
        }
}
