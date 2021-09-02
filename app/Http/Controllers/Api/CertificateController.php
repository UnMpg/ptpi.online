<?php

namespace App\Http\Controllers\Api;

use App\Certificate;
use App\CertificateDraft;
use App\KeynoteSpeaker;
use App\Participant;
use Illuminate\Routing\Controller;
use PDF;

class CertificateController extends Controller
{
    public function downloadCertificate($email = '', $seminar_id = 0)
    {
        // inisialisasi
        $backgroundKominfo = '';
        $backgroundEsdm = '';
        $backgroundKsp = '';
        $backgroundUi = '';
        $backgroundKemenhut = '';
        
        $speaker_1 = KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', true)->first()->unique_id;
        $speaker_2 = optional(KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', false)->first())->unique_id;

        $querySeminar = Certificate::find($seminar_id);
        $resQuery = CertificateDraft::where('email', 'LIKE', "%$email%")->first();
        if ($resQuery) {
            $query = $resQuery->where('certificate_id', $seminar_id)->first();
        }
        
        // convert logo ptpi
        $tempdirbackPtpi = public_path("assets/sertifikat/ptpi.png");
        $ImageTypeBackPtpi = pathinfo($tempdirbackPtpi, PATHINFO_EXTENSION);
        $dataPtpi = file_get_contents($tempdirbackPtpi);
        $dataURIBackPtpi = 'data:image/' . $ImageTypeBackPtpi . ';base64,' . base64_encode($dataPtpi);
        $backgroundPtpi = $dataURIBackPtpi;

        // convert logo kemenkes
        $tempdirbackKemenkes = public_path("assets/sertifikat/kemenkes.png");
        $ImageTypeBackKemenkes = pathinfo($tempdirbackKemenkes, PATHINFO_EXTENSION);
        $dataKemenkes = file_get_contents($tempdirbackKemenkes);
        $dataURIBackKemenkes = 'data:image/' . $ImageTypeBackKemenkes . ';base64,' . base64_encode($dataKemenkes);
        $backgroundKemenkes = $dataURIBackKemenkes;

        // convert logo kemenkes
        $tempdirbackIakmi = public_path("assets/sertifikat/iakmi.png");
        $ImageTypeBackIakmi = pathinfo($tempdirbackIakmi, PATHINFO_EXTENSION);
        $dataIakmi = file_get_contents($tempdirbackIakmi);
        $dataURIBackIakmi = 'data:image/' . $ImageTypeBackIakmi . ';base64,' . base64_encode($dataIakmi);
        $backgroundIakmi = $dataURIBackIakmi;

        // convert background image
        $tempdirback = public_path("assets/background/seminar$seminar_id.png");
        $ImageTypeBack = pathinfo($tempdirback, PATHINFO_EXTENSION);
        $data = file_get_contents($tempdirback);
        $dataURIBack = 'data:image/' . $ImageTypeBack . ';base64,' . base64_encode($data);
        $background = $dataURIBack;

        if (isset($query)) {
            \DB::table('certificate_drafts')->where('id', $query->id)->where('certificate_id', $seminar_id)->update([
                'download' => true
            ]);
            if ($seminar_id == 1) {
                $pdf = PDF::loadView('home.sertifikat.seminar1', compact('query', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            } else {
                // convert logo i-can
                $tempdirbackIcan = public_path("assets/sertifikat/i-can.png");
                $ImageTypeBackIcan = pathinfo($tempdirbackIcan, PATHINFO_EXTENSION);
                $dataIcan = file_get_contents($tempdirbackIcan);
                $dataURIBackIcan = 'data:image/' . $ImageTypeBackIcan . ';base64,' . base64_encode($dataIcan);
                $backgroundIcan = $dataURIBackIcan;

                $pdf = PDF::loadView('home.sertifikat.seminar2-dev', compact('query', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi', 'backgroundIcan'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            }
        }

        if ($seminar_id > 2) {
            $queryNewCertificate = Participant::where('email', 'LIKE', "%$email%")->first();
            $checkSertifikat = \DB::table('certificate_participant')->where('participant_id', $queryNewCertificate->id)->where('certificate_id', $seminar_id)->first();
            if ($queryNewCertificate && $checkSertifikat) {
                // convert logo i-can
                $tempdirbackIcan = public_path("assets/sertifikat/i-can.png");
                $ImageTypeBackIcan = pathinfo($tempdirbackIcan, PATHINFO_EXTENSION);
                $dataIcan = file_get_contents($tempdirbackIcan);
                $dataURIBackIcan = 'data:image/' . $ImageTypeBackIcan . ';base64,' . base64_encode($dataIcan);
                $backgroundIcan = $dataURIBackIcan;
                if ($seminar_id == 5) {
                    // convert logo esdm
                    $tempdirbackEsdm = public_path("assets/sertifikat/esdm.png");
                    $ImageTypeBackEsdm = pathinfo($tempdirbackEsdm, PATHINFO_EXTENSION);
                    $dataEsdm = file_get_contents($tempdirbackEsdm);
                    $dataURIBackEsdm = 'data:image/' . $ImageTypeBackEsdm . ';base64,' . base64_encode($dataEsdm);
                    $backgroundEsdm = $dataURIBackEsdm;
                } elseif ($seminar_id == 6) {
                    // convert logo ksp
                    $tempdirbackKsp = public_path("assets/sertifikat/ksp.png");
                    $ImageTypeBackKsp = pathinfo($tempdirbackKsp, PATHINFO_EXTENSION);
                    $dataKsp = file_get_contents($tempdirbackKsp);
                    $dataURIBackKsp = 'data:image/' . $ImageTypeBackKsp . ';base64,' . base64_encode($dataKsp);
                    $backgroundKsp = $dataURIBackKsp;
                    // convert logo ui
                    $tempdirbackUi = public_path("assets/sertifikat/ui.png");
                    $ImageTypeBackUi = pathinfo($tempdirbackUi, PATHINFO_EXTENSION);
                    $dataUi = file_get_contents($tempdirbackUi);
                    $dataURIBackUi = 'data:image/' . $ImageTypeBackUi . ';base64,' . base64_encode($dataUi);
                    $backgroundUi = $dataURIBackUi;
                } elseif ($seminar_id >= 9) {
                    if ($seminar_id == 10) {
                        // convert logo kemenhut
                        $tempdirbackKemenhut = public_path("assets/sertifikat/kemenhut.png");
                        $ImageTypeBackKemenhut = pathinfo($tempdirbackKemenhut, PATHINFO_EXTENSION);
                        $dataKemenhut = file_get_contents($tempdirbackKemenhut);
                        $dataURIBackKemenhut = 'data:image/' . $ImageTypeBackKemenhut . ';base64,' . base64_encode($dataKemenhut);
                        $backgroundKemenhut = $dataURIBackKemenhut;
                    }
                } else {
                    // convert logo kominfo
                    $tempdirbackKominfo = public_path("assets/sertifikat/kominfo.png");
                    $ImageTypeBackKominfo = pathinfo($tempdirbackKominfo, PATHINFO_EXTENSION);
                    $dataKominfo = file_get_contents($tempdirbackKominfo);
                    $dataURIBackKominfo = 'data:image/' . $ImageTypeBackKominfo . ';base64,' . base64_encode($dataKominfo);
                    $backgroundKominfo = $dataURIBackKominfo;
                }

                $dataParticipantPivot = $queryNewCertificate->certificates()->updateExistingPivot($seminar_id, ['download' => true]);
                $order = $queryNewCertificate->certificates->where('id', $seminar_id)->first()->pivot;

                $pdf = PDF::loadView('home.sertifikat.seminar' . $seminar_id . '', compact('queryNewCertificate', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi', 'backgroundIcan', 'backgroundKominfo', 'backgroundEsdm', 'order', 'backgroundKsp', 'backgroundUi', 'backgroundKemenhut'))->setPaper('letter', 'landscape')->download('certificate.pdf');
                return $pdf;
            }
        }
        return view('home.sertifikat.404');
    }
}
