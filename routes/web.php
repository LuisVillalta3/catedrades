<?php

use App\Http\Controllers\ExportsController;
use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$routes = [
  'users'     => 'usuarios',
  'cellars'   => 'bodegas',
  'providers' => 'proveedores',
  'products'  => 'productos',
  'movements' => 'movimientos'
];

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [InitController::class, 'index'])->name('dashboard');

/** GLOBAL ROUTES **/
foreach ($routes as $key => $value) {
  Route::middleware(['auth:sanctum', 'verified'])->get('/'.$value, function () use ($key) {
    return view('app.'. $key .'.index');
  })->name($value);

  Route::middleware(['auth:sanctum', 'verified'])->get('/' . $value . '/nuevo', function ($id = null) use ($key) {
    return view('app.'. $key .'.form', compact('id'));
  })->name($value.'.new');

  Route::middleware(['auth:sanctum', 'verified'])->get('/' . $value . '/eliminados', function () use ($key) {
    return view('app.'. $key .'.trash');
  })->name($value.'.trash');

  Route::middleware(['auth:sanctum', 'verified'])->get('/' . $value . '/editar/{id}', function ($id) use ($key) {
    return view('app.'. $key .'.form', compact('id'));
  })->name($value.'.editar');
}

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/comprobante/{id}', function ($id) {
  return view('app.movements.preview', compact('id'));
})->name('movimientos.preview');

Route::get('/movimientos/comprobante/{id}/descargar', [InitController::class, 'movement'])->name('movimientos.download');

Route::post('/exportar', [ExportsController::class, 'export'])->name('exportar.datos');
Route::post('/exportar/movimientos', [ExportsController::class, 'exportMovements'])->name('exportar.movimientos.datos');
