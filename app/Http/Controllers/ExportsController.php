<?php

namespace App\Http\Controllers;

use App\Exports\Exports;
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
  }
}
