<?php

namespace App\Exports\Users;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TodosExport implements FromCollection, WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return User::withTrashed()->select('id', 'name', 'email', 'created_at', 'deleted_at')->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'Nombre',
      'Correo electrónico',
      'Fecha de registro',
      'Fecha de eliminación'
    ];
  }
}
