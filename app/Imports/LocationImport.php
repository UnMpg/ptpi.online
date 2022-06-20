<?php

namespace App\Imports;

use App\Location;
use Maatwebsite\Excel\Concerns\ToModel;

class LocationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Location([
            'nama' => $row[0]==''?'-':$row[0],
            'alamat' => $row[1]==''?'-':$row[1],
            'nomor_telp' => $row[2]==''?'-':$row[2],
            'provinsi' => $row[3]==''?'-':$row[3],
            'kota' => $row[4]==''?'-':$row[4],
            'long' => $row[5]==''?'-':$row[5],
            'lat' => $row[6]==''?'-':$row[6],
            'image' => $row[7]==''?'-':$row[7],
        ]);

    }
}
