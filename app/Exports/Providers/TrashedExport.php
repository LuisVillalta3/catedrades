<?php

namespace App\Exports\Providers;

use App\Models\Provider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrashedExport implements FromCollection, WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return Provider::onlyTrashed()->select('id', 'name', 'email', 'phone', 'fax', 'created_at', 'deleted_at')->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'Nombre',
      'Correo electrónico',
      'Teléfono',
      'Fax',
      'Fecha de registro',
      'Fecha de eliminación'
    ];
  }
}
