<?php

use Illuminate\Support\Facades\Auth;
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
  if (Auth::user()) { return redirect()->route('dashboard'); }
  else { return redirect()->route('login'); }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/** USERS ROUTES **/
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', function () {
  return view('app.users.index');
})->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/nuevo', function ($id = null) {
  return view('app.users.form', compact('id'));
})->name('usuarios.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/editar/{id}', function ($id) {
  return view('app.users.form', compact('id'));
})->name('usuarios.editar');

/** Bodegas ROUTES **/
Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas', function () {
  return view('app.cellars.index');
})->name('bodegas');

Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/nuevo', function ($id = null) {
  return view('app.cellars.form', compact('id'));
})->name('bodegas.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/editar/{id}', function ($id) {
  return view('app.cellars.form', compact('id'));
})->name('bodegas.editar');

/** proveedores ROUTES **/
Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores', function () {
  return view('app.providers.index');
})->name('proveedores');

Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/nuevo', function ($id = null) {
  return view('app.providers.form', compact('id'));
})->name('proveedores.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/editar/{id}', function ($id) {
  return view('app.providers.form', compact('id'));
})->name('proveedores.editar');

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/productos', function () {
  return view('app.products.index');
})->name('productos');

Route::middleware(['auth:sanctum', 'verified'])->get('/productos/nuevo', function ($id = null) {
  return view('app.products.form', compact('id'));
})->name('productos.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/productos/editar/{id}', function ($id) {
  return view('app.products.form', compact('id'));
})->name('productos.editar');
