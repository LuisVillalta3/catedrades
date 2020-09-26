<?php

namespace App\Exports\Users;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return User::select('id', 'name', 'email', 'created_at')->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'Nombre',
      'Correo electrónico',
      'Fecha de registro'
    ];
  }
}
