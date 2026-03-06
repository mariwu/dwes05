<?php
//María Fernandez Gilarte
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroMFG extends Model
{
    use HasFactory;
    //Edito el modelo de la tabla
    protected $table = 'generos';
    //Relleno el atributo $fillable para que se completen los datos de golpe
    protected $fillable =[
        'nombre',
        'descripcion'
    ];
    //Establezco las relaciones. Un genero está en muchas peliculas (1:N) 
    public function peliculas(){
        return $this->hasMany(PeliculaMFG::class, 'genero');
    }
}
