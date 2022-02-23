<?php

use App\Http\Controllers\ProyectoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

                                    /* Creación de proyectos */

Route::get('/subirProyecto', [ProyectoController::class, 'create'])->name('subirproyecto')->middleware('auth');

Route::post('/subirProyecto', [ProyectoController::class, 'store']);

/* Mostrar todos los proyectos y un único proyecto */

Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos');

Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('mostrarProyecto');

/* Edición de proyectos */

Route::get('/proyecto/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('editarProyecto');

Route::put('/proyecto/{proyecto}', [ProyectoController::class, 'update'])->name('actualizarProyecto');

/* Eliminar un proyecto */

Route::get('/proyecto/{proyecto}/destroy', [ProyectoController::class, 'destroy'])->name('eliminarProyecto');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
