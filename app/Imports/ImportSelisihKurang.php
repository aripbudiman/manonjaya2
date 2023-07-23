<?php

namespace App\Imports;

use App\Models\SelisihKurang;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSelisihKurang implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SelisihKurang([
            'id'=>$row[0],
            'trx_date' => $row[1],
            'petugas' => $row[2],
            'description' => $row[3],
            'debet'=>$row[4],
            'kredit'=>$row[5]
        ]);
    }
}
