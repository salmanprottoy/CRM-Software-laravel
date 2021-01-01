<?php

namespace App\Imports;

use App\Models\marketUser;
use Maatwebsite\Excel\Concerns\ToModel;

class leadsimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new marketUser([
            'name'      =>  $row[0],
            'email'     =>  $row[1],
            'phone'    => $row[2],
            'status'    => $row[3],
            'gender'    => $row[4],
            'address'    => $row[5],
        ]);
    }
}
