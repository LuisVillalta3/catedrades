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
