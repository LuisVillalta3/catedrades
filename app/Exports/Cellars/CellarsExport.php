<?php

namespace App\Exports\Cellars;

use App\Models\Cellar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CellarsExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Cellar::select('name', 'ubication', 'created_at')->get();
  }

  public function headings(): array
  {
    return [
      'Nombre',
      'Ubicación',
      'Fecha de creación',
      'Fecha de eliminación',
    ];
  }
}
