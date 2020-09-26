<?php

namespace App\Exports\Movements;

use App\Models\Movement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MovementsExport implements FromView
{
  public function view(): View
  {
    return view('exports.movements', [
      'movements' => Movement::withTrashed()->get(),
      'trashed'   => false
    ]);
  }
}
