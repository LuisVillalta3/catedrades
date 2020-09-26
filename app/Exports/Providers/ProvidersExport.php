<?php

namespace App\Exports\Providers;

use App\Provider;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProvidersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Provider::all();
    }
}
