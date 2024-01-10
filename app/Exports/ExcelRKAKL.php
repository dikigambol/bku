<?php

namespace App\Exports;

use App\Modelrkakl;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelRKAKL implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Modelrkakl::all();
    }
}
