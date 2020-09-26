<?php

namespace App\Exports\Products;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
    return Product::select('id', 'name', 'description', 'price', 'stock', 'created_at')->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'Nombre',
      'Descripción',
      'Precio',
      'Stock',
      'Fecha de registro'
    ];
  }
}
