<?php
//María Fernández Gilarte
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CriticaControllerMFG;
use App\Models\PeliculaMFG;
use Illuminate\Support\Facades\Auth;

//Ruta a la zona pública (simplemente accediendo a / vía GET)
Route::get('/', function () {
    //Obtengo todas las películas de la base de datos usando Eloquent
    $peliculas = PeliculaMFG::all();
    //Paso el listado de películas a la vista 'principal'
    return view('principal', ['peliculas' => $peliculas]);
})->name('zonapublica');

//Ruta a la zona privada (simplemente accediendo a /zonaprivada vía GET)
Route::get('/zonaprivada', function () {
    //Obtengo las críticas del usuario autenticado
    $criticas = Auth::user()->criticas;
    //Cuento cuántas críticas tiene en total
    $totalCriticas = $criticas->count();
    //Se pasa los datos a la vista
    return view('privada.principal', [
        'criticas' => $criticas,
        'totalCriticas' => $totalCriticas
    ]);
})->middleware('auth')->name('zonaprivada');

//Creamos una ruta nombrada (formlogin) tipo GET a '/login' que mostrará el formulario
Route::get('/login', [LoginController::class, 'mostrarFormularioLoginMFG'])->name('formlogin');
//Creamos una ruta nombrada (login) tipo POST a '/login' que procesará el formulario
Route::post('/login', [LoginController::class, 'loginMFG'])->name('login');
//Creamos una ruta nombrada (logout) tipo POST a '/logout' que cerrará la sesión
Route::get('/logout', [LoginController::class, 'logoutMFG'])->name('logout');
//Creo una ruta nombrada mostrarFormularioCriticaMFG tipo ANY para que acepte tanto get como post. Cuando Lavarel=error devuelve en get
Route::any('/formulario_critica_MFG', [CriticaControllerMFG::class, 'mostrarFormularioCriticaMFG'])->middleware('auth')->name('formcriticaMFG');
//Ruta para procesar el formulario y crear la crítica
Route::post('/crear_nueva_critica_MFG/{pelicula}', [CriticaControllerMFG::class, 'crearNuevaCriticaMFG'])->middleware('auth')->name('crearnuevacriticaMFG');
//Ruta para mostrar el formulario de confirmación de borrado
Route::post('/formulario_borra_critica_MFG', [CriticaControllerMFG::class, 'mostrarFormularioBorraCriticaMFG'])->middleware('auth')->name('formborracriticaMFG');
//Ruta para que se borre la critica
Route::post('/borra_critica_MFG/{critica}', [CriticaControllerMFG::class, 'borraCriticaMFG'])->middleware('auth')->name('borracriticaMFG');