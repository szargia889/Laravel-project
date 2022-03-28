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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
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






/*Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto.index');

Route::get('/subirProyecto', [ProyectoController::class, 'create'])->name('proyecto.create');

Route::get('/proyecto/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyecto.edit');

Route::get('/proyecto/{proyecto}/destroy', [ProyectoController::class, 'destroy'])->name('proyecto.destroy');

Route::put('/proyecto/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto.update');

Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto.show');

Route::post('/subirProyecto', [ProyectoController::class, 'store']);*/



/* Edición de proyectos */
// Route::resource('proyecto', ProyectoController::class);


/* Eliminar un proyecto */



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
