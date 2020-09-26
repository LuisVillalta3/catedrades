<?php

namespace App\Exports\Cellars;

use App\Models\Cellar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrashedExport implements FromCollection, WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return Cellar::onlyTrashed()->select('name', 'ubication', 'created_at', 'deleted_at')->get();
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
