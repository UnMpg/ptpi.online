<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Certificate;
use App\CertificateDraft;
use App\KeynoteSpeaker;
use App\Mail\WarungMail;
use App\Member;
use App\News;
use App\Participant;
use App\Topic;
use App\User;
use App\Laporan;
use App\LaporanKegiatan;
use App\LaporanKeuangan;
use App\Materi;
use App\QuestionAnswer;
use App\SeminarHef;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('created_at')->take(6)->get();
        $articles = Article::orderByDesc('created_at')->take(6)->get();
        return view('home.index', compact('articles', 'news'));
    }

    public function certificatesSign(Request $request)
    {
        if ($request->certificate_number) {
            $certificate_number = substr($request->certificate_number, 4);
            $certificate_order = substr($request->certificate_number, 0, 4);
            $data = \DB::table('certificates_sign')->where('certificate_number', $certificate_number)->first();
            return \DB::table('certificates_sign')->get();

            if ($data && $certificate_order <= 700) {
                return view('home.certificates-sign');
            } else {
                abort(404);
            }
        }
        abort(404);
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content
        ];

        Mail::send('home.email-templete', ['email' => $data['email'], 'content' => $data['content']], function ($message) use ($data) {
            $message->from($data['email'], $data['name'])->subject($data['subject']);
            $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });

        // Mail::send('home.email-templete', $data, function ($message) use ($data) {
        //     $message->to(env('MAIL_USERNAME'))
        //         ->subject($data['subject']);
        //     $message->from($data['email']);
        // });

        return back()->with(['message' => 'Email successfully sent!']);
    }

    public function roomZoom()
    {
        return view('home.room-zoom');
    }

    public function laporan(Request $request)
    {
        $saldo = \DB::table('laporan_saldo')->first()->saldo;
        $date = null;
        $tipe_laporan = null;
        $kategori = null;
        $initialDate = now();
        $laporan = Laporan::whereYear('tgl', $initialDate->format('Y'));

        if ($request->date) {
            $date = Carbon::parse($request->date);
            $laporan = Laporan::whereMonth('tgl', $date->month);
        }

        if ($request->tipe_laporan) {
            $laporan = $laporan->where('tipe_laporan', $request->tipe_laporan);
            $tipe_laporan = $request->tipe_laporan;
        }

        if ($request->kategori) {
            $laporan = $laporan->where('kategori', $request->kategori);
            $kategori = $request->kategori;
        }

        $laporan = $laporan->get();
        return view('home.laporan', compact('laporan', 'date', 'tipe_laporan', 'saldo', 'kategori'));
    }
    public function laporanKeuangan(Request $request)
    {
        $saldo = \DB::table('laporan_saldo')->first()->saldo;
        $date = null;
        $initialDate = now();
        $laporan = LaporanKeuangan::whereYear('tgl', $initialDate->format('Y'));

        if ($request->date) {
            $date = Carbon::parse($request->date);
            $laporan = LaporanKeuangan::whereMonth('tgl', $date->month);
        }

        $laporan = $laporan->get();
        return view('home.laporan-keuangan', compact('laporan', 'date', 'saldo'));
    }

    public function seminarHef()
    {
        $materi = SeminarHef::paginate(8);
        return view('home.seminar-hef', compact('materi'));
    }

    public function materi(Request $request)
    {
        $materi = Materi::where('certificate_id', '!=', 0);
        if ($request->certificate_id) {
            $materi->where('certificate_id', $request->certificate_id);
        }
        $materi = $materi->paginate(8);
        return view('home.materi', compact('materi'));
    }

    public function seminarHefCertificate(Request $request)
    {
        $search = $request->keyword;
        $session = $request->session;
        $day = $request->day;
        $certificates = \DB::table('hef_certificates');
        if ($session) {
            $certificates->where('session', $session);
        }
        if ($day) {
            $certificates->where('day', $day);
        }
        if ($search) {
            $certificates->where('name', 'LIKE', '%' . $search . '%');
            $certificates = $certificates->orderBy('hef_category_id', 'ASC')->simplePaginate(8);
        } else {
            $certificates = collect([]);
        }

        return view('home.seminar-hef-list', compact('certificates', 'search', 'day', 'session'));
    }

    public function downloadSeminarHefCertificate(Request $request, $id)
    {
        $certificate = \DB::table('hef_certificates')->where('id', $id)->first();
        return response()->download(public_path('assets/hef-certificates/' . $certificate->hef_category_id . '/SESI ' . $certificate->hef_category_id . ' ' . $certificate->name . '.pdf'));
    }

    public function downloadMateriSeminar(Request $request, $file)
    {
        return response()->download(public_path('assets/materihef/' . $file));
    }

    public function downloadMateri(Request $request, $file)
    {
        return response()->download(public_path('assets/materi_seminar_workshop/' . $file));
    }

    public function searchMateriSeminar(Request $request)
    {
        $search = $request->input('tipe_seminar');


        $materi = SeminarHef::where('tipe_seminar', 'LIKE', "%{$search}%")->paginate();
        return view('home.seminar-hef', compact('materi'));
    }

    // public function laporanKegiatan(Request $request)
    // {
    //     $date = null;
    //     $initialDate = now();
    //     $laporan = LaporanKegiatan::whereYear('tgl', $initialDate->format('Y'));

    //     if ($request->date) {
    //         $date = Carbon::parse($request->date);
    //         $laporan = LaporanKegiatan::whereMonth('tgl', $date->month);
    //     }

    //     $laporan = $laporan->get();
    //     return view('home.laporan-kegiatan', compact('laporan', 'date'));
    // }

    // public function laporanKegiatan()
    // {
    //     $laporan = LaporanKegiatan::all();
    //     return view('home.laporan-kegiatan', compact('laporan'));
    // }

    public function downloadLaporan(Request $request, $file)
    {
        return response()->download(public_path('assets/file/' . $file));
    }

    public function profilePresidenPtpi()
    {
        return view('home.info_presiden_ptpi');
    }

    public function tujuanFungsi()
    {
        return view('home.tujuan_fungsi');
    }

    public function visiMisi()
    {
        return view('home.visimisi');
    }

    public function dasarHukum()
    {
        return view('home.dasar-hukum');
    }

    public function strukturOrganisasi()
    {
        return view('home.struktur');
    }

    public function sel()
    {
        return view('home.sel');
    }
    public function bidangKeahlian()
    {
        return view('home.bidangkeahlian');
    }
    // public function laporanKeuangan()
    // {
    //     return view('home.laporan-keuangan');
    // }
    // public function laporanKegiatan()
    // {
    //     return view('home.laporan-kegiatan');
    // }
    public function sertifikasi()
    {
        return view('home.sertifikasi');
    }
    public function jejaring()
    {
        return view('home.jejaring');
    }

    public function getSertifikat()
    {
        $seminars = Certificate::all()->where('status', true)->whereNotIn('id', [15]);
        return view('home.sertifikat', compact('seminars'));
    }

    public function getSertifikatCommon(Request $request)
    {
        if ($request->has('seminar_id') || $request->has('keyword')) {
            $participant = \DB::table('certificate_commons')->where('name', 'LIKE', '%' . $request->keyword . '%')
                ->first();
            if ($participant) {
                return redirect($participant->certificate_url);
            }
        }
        $seminars = Certificate::all()->where('status', true)->whereIn('id', [15]);
        return view('home.sertifikat-common', compact('seminars'));
    }

    public function scanSertifikat($email, Certificate $certificate)
    {
        $status = false;
        $oldCertificate = CertificateDraft::where('certificate_id', $certificate->id)->where('email', $email)->first();
        if ($oldCertificate) {
            $certificateUpdate = false;
            $status = true;
            return view('home.sertifikat.status-scan', compact('status', 'oldCertificate', 'certificate', 'certificateUpdate'));
        }

        $newCertificate = Participant::where('email', $email)->first();
        if ($newCertificate) {
            $certificateUpdate = true;
            $status = true;
            return view('home.sertifikat.status-scan', compact('status', 'newCertificate', 'certificate', 'certificateUpdate'));
        }

        return view('home.sertifikat.status-scan', compact('status'));
    }

    // versi pertama tidak dipakai lagi
    public function scanSignSertifikat1($email, Certificate $certificate)
    {
        $status = false;
        $oldCertificate = CertificateDraft::where('certificate_id', $certificate->id)->where('email', $email)->first();
        if ($oldCertificate) {
            $certificateUpdate = false;
            $status = true;
            return view('home.sertifikat.status-scan-ttd', compact('status', 'oldCertificate', 'certificate', 'certificateUpdate'));
        }

        $newCertificate = Participant::where('email', $email)->first();
        if ($newCertificate) {
            $certificateUpdate = true;
            $status = true;
            return view('home.sertifikat.status-scan-ttd', compact('status', 'newCertificate', 'certificate', 'certificateUpdate'));
        }

        return view('home.sertifikat.status-scan-ttd', compact('status'));
    }

    public function scanSignSertifikat($unique_id)
    {
        $status = false;
        $speaker = KeynoteSpeaker::where('unique_id', $unique_id)->first();
        if ($speaker) {
            $status = true;
            return view('home.sertifikat.status-scan-ttd', compact('status', 'speaker'));
        }

        return view('home.sertifikat.status-scan-ttd', compact('status'));
    }

    public function artikel()
    {
        $articles = Article::orderByDesc('created_at')->paginate(5);
        // $articleAll = Article::orderByDesc('created_at')->take(5)->get();
        return view('home.artikel', compact('articles'));
    }

    public function searchArtikel(Request $request)
    {
        $search = $request->input('search');


        $articles = Article::where('judul', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('home.artikel', compact('search', 'articles'));
    }

    public function showArtikel(Article $article)
    {
        $articleAll = Article::orderByDesc('created_at')->take(5)->get();
        return view('home.show-artikel', compact('article', 'articleAll'));
    }

    public function downloadCvAnggota()
    {
        return response()->download(public_path('assets/members/doc/CV_Calon_Anggota_PTPI.docx'));
    }

    public function berita()
    {
        $news = News::orderByDesc('created_at')->paginate(5);
        $newsAll = News::orderByDesc('created_at')->take(5)->get();
        return view('home.berita', compact('news', 'newsAll'));
    }

    public function searchBerita(Request $request)
    {
        $search = $request->input('search');


        $news = News::where('judul', 'LIKE', "%{$search}%")->paginate();
        return view('home.berita', compact('news'));
    }


    public function showBerita(News $new)
    {
        $newsAll = News::orderByDesc('created_at')->take(5)->get();
        return view('home.show-berita', compact('new', 'newsAll'));
    }

    public function aktifitas()
    {
        return view('home.aktifitas');
    }

    public function faq()
    {
        $users = User::all();
        return view('home.faq', compact('users'));
    }

    public function kontribusiSehatRI()
    {
        return view('home.kontribusi_sehat_ri');
    }

    public function downloadSuratPermohonan()
    {
        return response()->file(public_path('assets/sponsor/surat_permohonan.pdf'));
    }

    public function suratPermohonanLengkap()
    {
        return view('home.kontribusi_sehat_ri_lengkap');
    }

    public function faqTimeLine(Request $request)
    {
        $topics = Topic::where('publish', true);
        $category_id = null;
        if ($request->category_id) {
            $category_id = $request->category_id;
            $users = User::where('category_id', $category_id)->pluck('id');
            $topics = Topic::whereIn('user_id', $users)->where('publish', true);
        }
        $categories = Category::all();
        $topics = $topics->paginate(5);
        return view('home.question-answer', compact('categories', 'topics', 'category_id'));
    }

    public function draftEmail(Request $request)
    {
        Topic::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content,
            'user_id' => $request->user_id
        ]);
        return back()->with('save', '"Pertanyaan" Berhasil Dikirim');
    }

    //participants
    public function sertifikat(Request $request)
    {
        // inisialisasi
        $backgroundKominfo = '';
        $backgroundEsdm = '';
        $backgroundKsp = '';
        $backgroundUi = '';
        $backgroundKemenhut = '';
        $backgroundDdrc = '';

        $keyword = $request->keyword;
        $seminar_id = $request->seminar_id;
        $speaker_1 = KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', true)->first()->unique_id;
        $speaker_2 = optional(KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', false)->first())->unique_id;

        $querySeminar = Certificate::find($seminar_id);
        $resQuery = CertificateDraft::orderBy('nama')->where('nama', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->get();
        $query = $resQuery->where('certificate_id', $seminar_id)->first();

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
            $queryNewCertificate = Participant::where('nama', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->first();
            $checkPass = password_verify($request->password, $queryNewCertificate->password);
            $checkSertifikat = \DB::table('certificate_participant')->where('participant_id', $queryNewCertificate->id)->where('certificate_id', $seminar_id)->first();
            if ($queryNewCertificate && $checkPass && $checkSertifikat || $seminar_id > 12) {
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
                    if ($seminar_id == 13) {
                        // convert logo ddrc
                        $tempdirbackDdrc = public_path("assets/sertifikat/ddrc.png");
                        $ImageTypeBackDdrc = pathinfo($tempdirbackDdrc, PATHINFO_EXTENSION);
                        $dataDdrc = file_get_contents($tempdirbackDdrc);
                        $dataURIBackDdrc = 'data:image/' . $ImageTypeBackDdrc . ';base64,' . base64_encode($dataDdrc);
                        $backgroundDdrc = $dataURIBackDdrc;
                    }

                    $referral = $request->referral;
                    if ($referral !== null) {
                        $client = new \GuzzleHttp\Client();
                        $request = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . $referral, ['http_errors' => false]);
                        $result = json_decode($request->getBody());
                        $resCode = trim(collect($result->code), '[]');
                        if ($resCode == 404) {
                            return back()->with('delete', trim(collect($result->message), '[]'));
                        }
                    } else {
                        return back()->with('delete', 'Kode Referral Wajib diisi!');
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

                $pdf = PDF::loadView('home.sertifikat.seminar' . $seminar_id . '', compact('queryNewCertificate', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi', 'backgroundIcan', 'backgroundKominfo', 'backgroundEsdm', 'order', 'backgroundKsp', 'backgroundUi', 'backgroundKemenhut', 'backgroundDdrc'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            }
        }
        return view('home.sertifikat.404');
    }

    // pembicara
    public function sertifikatPembicara(Request $request)
    {
        // inisialisasi
        $backgroundKominfo = '';
        $backgroundEsdm = '';
        $backgroundKsp = '';
        $backgroundUi = '';

        $keyword = $request->keyword;
        $seminar_id = $request->seminar_id;
        $speaker_1 = KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', true)->first()->unique_id;
        $speaker_2 = KeynoteSpeaker::where('certificate_id', $seminar_id)->where('level', false)->first()->unique_id;

        $querySeminar = Certificate::find($seminar_id);
        $resQuery = CertificateDraft::orderBy('nama')->where('nama', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->get();
        $query = $resQuery->where('certificate_id', $seminar_id);

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
        if (count($query) > 0) {
            \DB::table('certificate_drafts')->where('id', $query->first()->id)->where('certificate_id', $seminar_id)->update([
                'download' => true
            ]);
            if ($seminar_id == 1) {
                $pdf = PDF::loadView('home.sertifikat.seminar1-pembicara', compact('query', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            } else {
                // convert logo i-can
                $tempdirbackIcan = public_path("assets/sertifikat/i-can.png");
                $ImageTypeBackIcan = pathinfo($tempdirbackIcan, PATHINFO_EXTENSION);
                $dataIcan = file_get_contents($tempdirbackIcan);
                $dataURIBackIcan = 'data:image/' . $ImageTypeBackIcan . ';base64,' . base64_encode($dataIcan);
                $backgroundIcan = $dataURIBackIcan;

                $pdf = PDF::loadView('home.sertifikat.seminar2-pembicara', compact('query', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi', 'backgroundIcan'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            }
        }
        if ($seminar_id > 2) {
            $queryNewCertificate = Participant::where('nama', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->first();
            $checkPass = password_verify($request->password, $queryNewCertificate->password);
            $checkSertifikat = \DB::table('certificate_participant')->where('participant_id', $queryNewCertificate->id)->where('certificate_id', $seminar_id)->first();

            if ($queryNewCertificate && $checkPass && $checkSertifikat) {
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
                } else {
                    // convert logo kominfo
                    $tempdirbackKominfo = public_path("assets/sertifikat/kominfo.png");
                    $ImageTypeBackKominfo = pathinfo($tempdirbackKominfo, PATHINFO_EXTENSION);
                    $dataKominfo = file_get_contents($tempdirbackKominfo);
                    $dataURIBackKominfo = 'data:image/' . $ImageTypeBackKominfo . ';base64,' . base64_encode($dataKominfo);
                    $backgroundKominfo = $dataURIBackKominfo;
                }

                $dataParticipantPivot = $queryNewCertificate->certificates()->updateExistingPivot($seminar_id, ['download' => true]);

                $pdf = PDF::loadView('home.sertifikat.seminar' . $seminar_id . '-pembicara', compact('queryNewCertificate', 'background', 'speaker_1', 'speaker_2', 'querySeminar', 'backgroundPtpi', 'backgroundKemenkes', 'backgroundIakmi', 'backgroundIcan', 'backgroundKominfo', 'backgroundEsdm', 'backgroundUi', 'backgroundKsp'))->setPaper('letter', 'landscape')->stream('certificate.pdf');
                return $pdf;
            }
        }
        return view('home.sertifikat.404');
    }

    public function checkReferral(Request $request)
    {
        $inputNotEmpty = false;
        $referral_code = null;
        if ($request->keyword) {
            $client = new \GuzzleHttp\Client();
            $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . $request->keyword, ['http_errors' => false]);
            $result = json_decode($requestApi->getBody());
            $resCode = trim(collect($result->code), '[]');
            $inputNotEmpty = true;
            if ($resCode == 200) {
                $referral_code = collect($result->data);
                $referral_code = $referral_code['referral_code'];
            }
        }
        return view('home.check-referral', compact('referral_code', 'inputNotEmpty'));
    }

    public function questionAnswer(Request $request)
    {
        $topics = Topic::where('publish', true);
        $category_id = null;
        if ($request->category_id) {
            $category_id = $request->category_id;
            $users = User::where('category_id', $category_id)->pluck('id');
            $topics = Topic::whereIn('user_id', $users)->where('publish', true);
        }
        $categories = Category::all();
        $topics = $topics->paginate(5);
        $questions = QuestionAnswer::query();
        $questions = $questions->paginate(5);
        return view('home.question-answer', compact('questions', 'categories', 'topics', 'category_id'));
    }
}
