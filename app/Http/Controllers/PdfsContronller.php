<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;
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
  }

  public function movementsByProduct($id)
  {
    $product = Product::find($id);
    $data = [
      'product'  => Product::find($id),
      'elements' => Movement::where('product_id', $id)->orderBy('created_at', 'desc')->get()
    ];
    $name = $product->created_at->timestamp . '-producto-' . $product->id . '.pdf';
    $pdf  = PDF::loadView('app.pdfs.movimientoxproducto', $data)->setPaper('a4', 'landscape');
    return $pdf->download($name);
  }
}
