<?php

namespace App\Exports\Movements;

use App\Movement;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrashedExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movement::all();
    }
}
