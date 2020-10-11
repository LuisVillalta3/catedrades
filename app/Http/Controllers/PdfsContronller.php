<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class PdfsContronller extends Controller
{
  public function movement(int $id)
  {
    $movement = Movement::find($id);
    return view('app.pdfs.preview', compact('movement'));
  }
}
