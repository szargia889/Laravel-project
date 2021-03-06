<?php

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

/* RUTAS SOBRE LOS PROYECTOS */
require __DIR__.'/auth.php';
Route::get('/busqueda', [ProyectoController::class, 'busqueda'])->name('proyecto.busqueda')->middleware(['auth']);
Route::get('/home', [ProyectoController::class, 'home'])->name('proyecto.home')->middleware(['auth']);

Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto.index')->middleware(['auth']);
Route::get('/todosProyectos', [ProyectoController::class, 'index2'])->name('proyecto.index2')->middleware(['auth']);

Route::get('/subirProyecto', [ProyectoController::class, 'create'])->name('proyecto.create')->middleware(['auth']);
Route::post('/subirProyecto', [ProyectoController::class, 'store']);

Route::get('/proyecto/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyecto.edit')->middleware(['auth']);
Route::put('/proyecto/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto.update')->middleware(['auth']);

Route::get('/proyecto/{proyecto}/destroy', [ProyectoController::class, 'destroy'])->name('proyecto.destroy')->middleware(['auth']);

Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto.show')->middleware(['auth']);

/* RUTAS SOBRE EL REGISTRO */


Route::get('/registro', [RegistroController::class, 'create'])->name('register.create')->middleware(['auth']);
Route::post('/registro', [RegistroController::class, 'store']);

/* RUTAS SOBRE LOS USUARIOS */

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware(['auth']);

Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit')->middleware(['auth']);
Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update')->middleware(['auth']);

Route::get('/usuarios/{usuario}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy')->middleware(['auth']);

Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show')->middleware(['auth']);

/*Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto.index');

Route::get('/subirProyecto', [ProyectoController::class, 'create'])->name('proyecto.create');

Route::get('/proyecto/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyecto.edit');

Route::get('/proyecto/{proyecto}/destroy', [ProyectoController::class, 'destroy'])->name('proyecto.destroy');

Route::put('/proyecto/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto.update');

Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto.show');

Route::post('/subirProyecto', [ProyectoController::class, 'store']);*/



/* Edici??n de proyectos */
// Route::resource('proyecto', ProyectoController::class);


/* Eliminar un proyecto */



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
