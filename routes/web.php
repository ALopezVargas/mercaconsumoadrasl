<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Contacto;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Database\Seeders\CategoriaSeeder;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

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
    $productos=Producto::orderby('nombre')->where('oferta',true)->paginate(8);
    return view('welcome',compact('productos'));
})->name('inicio');

Route::get('/sobre-nosotros',function(){
    return view('productos.sobrenosotros');
})->name('sobreNosotros');

//Rutas contacto
Route::get('/contacto',function(){
    return view('productos.contacto');
})->name('contacto');

Route::post('/contacto',[ContactoController::class,"enviarContacto"])->name('contacto.submit');

//Ruta oferta
Route::get('/ofertas', function () {
    $productos=Producto::orderby('nombre')->where('oferta',true)->paginate(4);
    return view('productos.ofertas',compact('productos'));
})->name('ofertas');//Middleware -> ha de ser autentificado



Route::resource('categorias',CategoriaController::class)->middleware('administrador');
Route::resource('producto','\App\Http\Controllers\ProductoController');

//Rutas carrito
Route::get('carrito',[CarritoController::class,'index'])->name('carrito.index');
Route::post('carrito/update',[CarritoController::class,'update'])->name('carrito.update');
Route::delete('carrito/destroy',[CarritoController::class,'destroy'])->name('carrito.destroy');

//Añadir al carrito.
Route::post('/carrito-compra',[ProductoController::class,"aniadirCarrito"])
->name('addToCart');

//Borrar elemento carrito
Route::delete('/carrito-borrar',[CarritoController::class,"borrarElemento"])->name('carrito.borrarUno');

//Ruta para crear un enlace de todos los productos asignados a una categoría
Route::get('producto/{id}/mostrarProductos',[ProductoController::class,'mostrarProductos'])->name('mostrarProductos');


require __DIR__.'/auth.php';
