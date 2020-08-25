<?php

namespace App\Exports;

use App\Position;
use Maatwebsite\Excel\Concerns\FromCollection;

class PositionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Position::all();
    }
}
