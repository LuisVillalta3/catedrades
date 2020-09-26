<?php

namespace App\Exports\Products;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrashedExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
}
