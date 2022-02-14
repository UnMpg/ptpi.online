<?php

namespace App\Exports;

use App\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParticipantCommonExport implements FromCollection
{
    public $seminarId;

    public function __construct($seminarId)
    {
        $this->seminarId = $seminarId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $participants = Participant::all();
        $data = [];
        foreach ($participants as $participant) {
            if ($participant->certificates->where('id', $this->seminarId)->first()) {
                array_push($data, $participant);
            }
        }
        $emails = collect($data)->pluck('email');
        $data = Participant::whereIn('email', $emails)->get([
            "id",
            "email",
            "nama",
            "kontak",
            "jenis_instansi",
            "nama_instansi",
            "provinsi",
            "pekerjaan",
            "kabupaten",
            "referral",
            "unit",
            "bidang_ilmu",
            "created_at",
            "updated_at",
        ]);
        if (count($data) > 0) {
            return $data;
        } else {
            return \DB::table('certificate_commons')->where('certificate_id', $this->seminarId)->get();
        }
    }
}
