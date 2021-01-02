<?php

namespace App\Imports;

use App\Models\marketCustomer;
use Maatwebsite\Excel\Concerns\ToModel;

class customerimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new marketCustomer([
            'customerName'      =>  $row[0],
            'customerEmail'     =>  $row[1],
            'customerContactNumber'    => $row[2],
            'customerStatus'    => $row[3],
            'customerGender'    => $row[4],
            'customerAdress'    => $row[5],
        ]);
    }
}
