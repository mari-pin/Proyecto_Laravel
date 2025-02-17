<?php


use App\Http\Controllers\CarritoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use App\Models\User;
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
    $productos = Producto::all();
    return view('productos.index',compact('productos'));
})->middleware('auth');
Route::resource('users', UserController::class)->middleware('roles:admin');
Route::resource('productos', ProductoController::class)->only('index', 'show')->middleware('auth');
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('carrito', [CarritoController::class, 'getCarrito'])->name('carrito')->middleware('auth');
Route::get('postCarrito/{producto}', [CarritoController::class, 'postCarrito'])->name('postCarrito')->middleware('auth');
Route::get('putCarrito', [CarritoController::class, 'putCarrito'])->name('putCarrito')->middleware('auth');
Route::get('deleteCarrito', [CarritoController::class, 'deleteCarrito'])->name('deleteCarrito')->middleware('auth');
Route::get('confirmarPedido', [CarritoController::class , 'confirmarPedido'])->name('confirmarPedido')->middleware('auth');



