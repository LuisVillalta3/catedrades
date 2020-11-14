<?php

namespace App\Http\Controllers;

use App\Exports\Exports;
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
    
  }

  private function elements($model, $cont)
  {
    if ($cont == 'all') { return $model::select($model::$selection)->withTrashed()->get(); }
    if ($cont == 'normal') { return $model::select($model::$selection)->get(); }
    if ($cont == 'trash') { return $model::select($model::$selection)->onlyTrashed()->get(); }
  }
}
