<?php

namespace App\Exports\Providers;

use App\Models\Provider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProvidersExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Provider::select('id', 'name', 'email', 'phone', 'fax', 'created_at')->get();
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
    ];
  }
}
