<?php

use App\Http\Controllers\ContactoController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

//----------------------------------------------------
Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
Route::resource('proveedors', 'App\Http\Controllers\ProveedorController');
Route::resource('productos', 'App\Http\Controllers\ProductoController');
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::resource('pedidos', 'App\Http\Controllers\PedidoController');
Route::resource('ventas', 'App\Http\Controllers\VentaController');

//-----------------------------------------------------

require __DIR__.'/auth.php';

//Rutas para la gestion del contacto
Route::get('contact', [ContactoController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('contact.create');
Route::post('contact', [ContactoController::class, 'send'])
    ->middleware(['auth', 'verified'])->name('contact.send');

