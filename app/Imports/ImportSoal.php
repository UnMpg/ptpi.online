<?php

namespace App\Imports;

use App\CertifiedSoal;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSoal implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CertifiedSoal([
            'kategori' => $row[0]==''?'-':$row[0],
            'soal' => $row[1]==''?'-':$row[1],
            'a' => $row[2]==''?'-':$row[2],
            'b' => $row[3]==''?'-':$row[3],
            'c' => $row[4]==''?'-':$row[4],
            'd' => $row[5]==''?'-':$row[5],
            'key' => $row[6]==''?'-':$row[6],
        ]);

    }
}
