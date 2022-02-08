<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ParticipantCommonImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        \DB::table('certificate_commons')->insert([
            'name'                  => $row['name'],
            'certificate_id'        => $row['certificate_id'],
            'certificate_number'    => $row['certificate_number'],
            'certificate_url'       => $row['certificate_url'],
        ]);
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
