<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfsContronller extends Controller
{
  public function movement(int $id)
  {
    $movement = Movement::find($id);
    $data = [
      'movement' => Movement::find($id)
    ];
    $name = $movement->created_at->timestamp . '-movement-' . $movement->id . '.pdf';
    $pdf  = PDF::loadView('app.pdfs.preview', $data);
    return $pdf->download($name);
    // return view('app.pdfs.preview', compact('movement'));
  }
}
