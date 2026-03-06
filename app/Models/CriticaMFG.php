<?php
//María Fernandez Gilarte
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticaMFG extends Model
{
    use HasFactory;
    //Edito el modelo de la tabla
    protected $table = 'criticas';
    protected $fillable =[
        'valoracion',
        'comentario',
        'pelicula',
        'usuario'
    ];
    //Establezco la relacion. Una crítica pertenece a una película
    public function pelicula(){
        return $this->belongsTo(PeliculaMFG::class, 'pelicula');
    }

    //Una crítica pertenece A un usuario
    public function usuario(){
        return $this->belongsTo(User::class, 'usuario');
    }
}
