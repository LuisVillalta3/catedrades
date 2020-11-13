<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use App\Models\Movement;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InitController extends Controller
{
  public function index()
  {
    return view('dashboard', [
      'count_products'  => count(Product::all()),
      'count_provider'  => count(Provider::all()),
      'count_bodegas'   => count(Cellar::all()),
      'count_movements' => count(Movement::all())
    ]);
  }

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
}
