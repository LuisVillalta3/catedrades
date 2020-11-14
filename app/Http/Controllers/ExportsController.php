<?php

namespace App\Http\Controllers;

use App\Exports\Exports;
use App\Exports\MovementsExports;
use App\Models\Movement;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
  public function export(Request $request)
  {
    $model = $request->model;
    $name  = $request->name ?? with(new $model)->getTable();
    $ext   = $request->ext;
    $cont  = $request->content;

    if ($ext != 'pdf')
      return Excel::download(new Exports($model, $cont), Carbon::now() . ' - ' . $name . '.' . $ext);

    $data = [
      'elements' => $this->elements($model, $cont),
      'headers'  => $model::$headers,
      'select'   => $model::$selection,
      'name'     => $name
    ];

    $pdf = PDF::loadView('app.pdfs.pdf', $data)->setPaper('a4', 'landscape');

    return $pdf->download(Carbon::now() . ' - ' . $name . '.' . $ext);
  }

  public function exportMovements(Request $request)
  {
    $name   = $request->name ?? 'Movimientos';
    $ext    = $request->ext;
    $cont   = $request->content;
    $filter = $request->filter;
    $prod   = $request->product;
    $date   = $request->by_date ? true : false;
    $since  = $request->since;
    $until  = $request->until;

    if ($ext != 'pdf')
      return Excel::download(new MovementsExports($cont, $date, $since, $until, $prod, $filter), Carbon::now() . ' - ' . $name . '.' . $ext);

    $data = [
      'elements' => $this->movementsElements($cont, $date, $prod, $since, $until, $filter),
      'name'     => Product::find($prod)->name ?? ''
    ];

    $pdf = PDF::loadView('app.pdfs.movimientos', $data)->setPaper('a4', 'landscape');

    return $pdf->download(Carbon::now() . ' - ' . $name . '.' . $ext);
  }

  private function movementsElements($content, $date, $id, $since, $until, $filter)
  {
    if ($filter != 'all') {
      if ($date && $id) {
        if ($content == 'normal') { return Movement::where('type', $filter)->whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
        if ($content == 'all') { return Movement::where('type', $filter)->withTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
        if ($content == 'trash') { return Movement::where('type', $filter)->onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      }

      if ($date) {
        if ($content == 'normal') { return Movement::where('type', $filter)->whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
        if ($content == 'all') { return Movement::where('type', $filter)->withTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
        if ($content == 'trash') { return Movement::where('type', $filter)->onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      }

      if ($id) {
        if ($content == 'normal') { return Movement::where('type', $filter)->where('product_id', $id)->get(); }
        if ($content == 'all') { return Movement::where('type', $filter)->withTrashed()->where('product_id', $id)->get(); }
        if ($content == 'trash') { return Movement::where('type', $filter)->onlyTrashed()->where('product_id', $id)->get(); }
      }

      if ($content == 'normal') { return Movement::where('type', $filter)->get(); }
      if ($content == 'all') { return Movement::where('type', $filter)->withTrashed()->get(); }
      if ($content == 'trash') { return Movement::where('type', $filter)->onlyTrashed()->get(); }
    }

    if ($date && $id) {
      if ($content == 'normal') { return Movement::whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      if ($content == 'all') { return Movement::withTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      if ($content == 'trash') { return Movement::onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->where('product_id', $id)->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
    }

    if ($date) {
      if ($content == 'normal') { return Movement::whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      if ($content == 'all') { return Movement::withTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
      if ($content == 'trash') { return Movement::onlyTrashed()->whereDate('created_at', '>=', Carbon::parse($since))->whereDate('created_at', '<=', Carbon::parse($until))->get(); }
    }

    if ($id) {
      if ($content == 'normal') { return Movement::where('product_id', $id)->get(); }
      if ($content == 'all') { return Movement::withTrashed()->where('product_id', $id)->get(); }
      if ($content == 'trash') { return Movement::onlyTrashed()->where('product_id', $id)->get(); }
    }

    if ($content == 'normal') { return Movement::all(); }
    if ($content == 'all') { return Movement::withTrashed()->get(); }
    if ($content == 'trash') { return Movement::onlyTrashed()->get(); }
  }

  private function elements($model, $cont)
  {
    if ($cont == 'all') { return $model::select($model::$selection)->withTrashed()->get(); }
    if ($cont == 'normal') { return $model::select($model::$selection)->get(); }
    if ($cont == 'trash') { return $model::select($model::$selection)->onlyTrashed()->get(); }
  }
}
