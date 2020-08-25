<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            
            'name'      => $row[0],
            'position_id' => $row[1],
            'email'     => $row[2],
            'salary'    => $row[3],
            'description' => $row[4]
        ]);
    }
}
