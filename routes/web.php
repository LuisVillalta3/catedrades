<?php

use App\Exports\Cellars\CellarsExport;
use App\Exports\Cellars\TodosExport as CellarsTodosExport;
use App\Exports\Cellars\TrashedExport as CellarsTrashedExport;
use App\Exports\Movements\MovementsExport;
use App\Exports\Movements\TodosExport as MovementsTodosExport;
use App\Exports\Movements\TrashedExport as MovementsTrashedExport;
use App\Exports\Products\ProductsExport;
use App\Exports\Products\TodosExport as ProductsTodosExport;
use App\Exports\Products\TrashedExport as ProductsTrashedExport;
use App\Exports\Providers\ProvidersExport;
use App\Exports\Providers\TodosExport as ProvidersTodosExport;
use App\Exports\Providers\TrashedExport as ProvidersTrashedExport;
use App\Exports\Users\TodosExport;
use App\Exports\Users\TrashedExport;
use App\Exports\Users\UsersExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/eliminados', function () {
  return view('app.users.trash');
})->name('usuarios.trash');

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

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos', function () {
  return view('app.movements.index');
})->name('movimientos');

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/nuevo', function ($id = null) {
  return view('app.movements.form', compact('id'));
})->name('movimientos.new');

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/editar/{id}', function ($id) {
  return view('app.movements.form', compact('id'));
})->name('movimientos.editar');

Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/eliminados', function () {
  return view('app.cellars.trash');
})->name('bodegas.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/eliminados', function () {
  return view('app.providers.trash');
})->name('proveedores.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/productos/eliminados', function () {
  return view('app.products.trash');
})->name('productos.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/eliminados', function () {
  return view('app.movements.trash');
})->name('movimientos.trash');

/** Exports */
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/exportar', function () {
  return Excel::download(new UsersExport, Carbon::now() . ' - users.xlsx');
})->name('usuarios.exportar');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/exportar/trash', function () {
  return Excel::download(new TrashedExport, Carbon::now() . ' - users-eliminados.xlsx');
})->name('usuarios.exportar.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios/exportar/todos', function () {
  return Excel::download(new TodosExport, Carbon::now() . ' - users-todos.xlsx');
})->name('usuarios.exportar.todos');

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/exportar', function () {
  return Excel::download(new CellarsExport, Carbon::now() . ' - Cellars.xlsx');
})->name('bodegas.exportar');

Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/exportar/trash', function () {
  return Excel::download(new CellarsTrashedExport, Carbon::now() . ' - Cellars-eliminados.xlsx');
})->name('bodegas.exportar.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/bodegas/exportar/todos', function () {
  return Excel::download(new CellarsTodosExport, Carbon::now() . ' - Cellars-todos.xlsx');
})->name('bodegas.exportar.todos');

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/exportar', function () {
  return Excel::download(new ProvidersExport, Carbon::now() . ' - Providers.xlsx');
})->name('proveedores.exportar');

Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/exportar/trash', function () {
  return Excel::download(new ProvidersTrashedExport, Carbon::now() . ' - Providers-eliminados.xlsx');
})->name('proveedores.exportar.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/proveedores/exportar/todos', function () {
  return Excel::download(new ProvidersTodosExport, Carbon::now() . ' - Providers-todos.xlsx');
})->name('proveedores.exportar.todos');

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/productos/exportar', function () {
  return Excel::download(new ProductsExport, Carbon::now() . ' - Products.xlsx');
})->name('productos.exportar');

Route::middleware(['auth:sanctum', 'verified'])->get('/productos/exportar/trash', function () {
  return Excel::download(new ProductsTrashedExport, Carbon::now() . ' - Products-eliminados.xlsx');
})->name('productos.exportar.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/productos/exportar/todos', function () {
  return Excel::download(new ProductsTodosExport, Carbon::now() . ' - Products-todos.xlsx');
})->name('productos.exportar.todos');

/** */
Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/exportar', function () {
  return Excel::download(new MovementsExport, Carbon::now() . ' - Movements.xlsx');
})->name('movimientos.exportar');

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/exportar/trash', function () {
  return Excel::download(new MovementsTrashedExport, Carbon::now() . ' - Movements-eliminados.xlsx');
})->name('movimientos.exportar.trash');

Route::middleware(['auth:sanctum', 'verified'])->get('/movimientos/exportar/todos', function () {
  return Excel::download(new MovementsTodosExport, Carbon::now() . ' - Movements-todos.xlsx');
})->name('movimientos.exportar.todos');
