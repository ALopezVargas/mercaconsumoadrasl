<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Database\Seeders\CategoriaSeeder;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
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
})->name('inicio');

Route::get('/ofertas', function () {
    $productos=Producto::orderby('nombre')->where('oferta',true)->paginate(4);
    return view('productos.ofertas',compact('productos'));
})->name('ofertas');//Middleware -> ha de ser autentificado

Route::resource('categorias',CategoriaController::class)->middleware('administrador');
Route::resource('producto','\App\Http\Controllers\ProductoController');



//Ruta para crear un enlace de todos los productos asignados a una categoría
Route::get('producto/{id}/mostrarProductos',[ProductoController::class,'mostrarProductos'])->name('mostrarProductos');


require __DIR__.'/auth.php';
