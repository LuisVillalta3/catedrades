<?php

namespace App\Exports\Products;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrashedExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Product::onlyTrashed()->select('id', 'name', 'description', 'price', 'stock', 'created_at', 'deleted_at')->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'Nombre',
      'Descripción',
      'Precio',
      'Stock',
      'Fecha de registro',
      'Fecha de eliminación'
    ];
  }
}
