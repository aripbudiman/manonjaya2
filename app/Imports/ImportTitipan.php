<?php

namespace App\Imports;

use App\Models\Titipan;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTitipan implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Titipan([
            'id'=>$row[0],
            'trx_date' => $row[1],
            'petugas' => $row[2],
            'description' => $row[3],
            'debet'=>$row[4],
            'kredit'=>$row[5]
        ]);
    }
}
