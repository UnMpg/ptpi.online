<?php

use App\Certificate;
use App\Participant;
use App\DataCenter;

Route::get("/cert", function () {
    $data_part = [
        ['nama' => 'Veronica Yoan, S.Psi, M.M', 'email' => 'veronicayyoan@gmail.com'],
        ['nama' => 'dr.Jonas Ardianta, Sp.Rad', 'email' => 'jonasbangun@yahoo.com'],
        ['nama' => 'Ir. Deppy Taufik Hidayat MT.', 'email' => 'decimaarsitek2014@gmail.com'],
        ['nama' => 'Ajoi Bambang sugiyanto, Ir.', 'email' => 'pt.immanuel.s.s@gmail.com'],
        ['nama' => 'Budi Hartono, S.Kep.Ners', 'email' => 'budihartono1803@gmail.com'],
        ['nama' => 'Syahrial Syah SE, MH.', 'email' => 'aldisach@gmail.com'],
        ['nama' => 'dr. Linda Wijayanti, M.Sc., SpPK.', 'email' => 'ganonk2009@gmail.com'],
        ['nama' => 'Aprodita Emma Yetti, S.T., M.Sc', 'email' => 'aproditaemma@unisayogya.ac.id'],
        ['nama' => 'Ferry Purwana Leonard, S. Kep', 'email' => 'ferrypurwana@gmail.com '],
        ['nama' => 'Ir. Iswanta,SE.,MT', 'email' => 'iswanta.1959@gmai.com'],
        ['nama' => 'I Made Yudi Satriawan, A.Md.', 'email' => 'satriawanyudi2@gmail.com'],
        ['nama' => 'Bakori, SKp. MPd.', 'email' => 'kokobakori@gmail.com'],
        ['nama' => 'Rachmat Suprapto, S. T', 'email' => 'Rachmat.S@rs-jih.co.id'],
        ['nama' => 'Andhika Setiawan', 'email' => 'andhika@mgpratama.com'],
        ['nama' => 'dr. Angeline Sibarani, MARS', 'email' => 'lamhot_20@yahoo.co.id'],
        ['nama' => 'dr. Hj. Makiani, S.H.,M.M.,MARS', 'email' => 'makianicolyubi@gmail.com'],
        ['nama' => 'drg. Meyta Radhila Gwen', 'email' => 'meytaradhilagwen@gmail.com'],
        ['nama' => 'Mulyadi,ST', 'email' => 'mulyadi.rsud@yahoo.com'],
        ['nama' => 'Rita Amaliah, SKM, M.Epid', 'email' => 'ritaamaliahra51@gmail.com'],
        ['nama' => 'Muhammad Ihsan Siregar,ST', 'email' => 'ihsan.020874@gmail.com'],
        ['nama' => 'Putri Santi, S.T', 'email' => 'siputrisanti@gmail.com'],
        ['nama' => 'Untari Suprihatin, Amd.TEM', 'email' => 'Untaritari640@gmail.com'],
        ['nama' => 'TITO PRASETYO, S.T', 'email' => 'wafiramadhani@gmail.com'],
        ['nama' => 'dr. O.U. TATY DAMAYANTY', 'email' => 'tatyou73@gmail.com'],
        ['nama' => 'dr Rusbandi SpOG', 'email' => 'rusbandispog1@gmail.com'],
        ['nama' => 'drg. Yunita Puspita Sari P, M.Kes', 'email' => 'yunita.puspita@gmail.com'],
        ['nama' => 'dr. Luthfi Baihaqi', 'email' => 'luthfi.baihaqi.2010@gmail.com'],
        ['nama' => 'Ihfan firmansyah. ST', 'email' => 'ihfanfirmansyah@gmail.com'],
        ['nama' => 'dr. Aryani Vindhya Putri, SpM', 'email' => 'aryanivp@gmail.com'],
        ['nama' => 'Rita Suminarsih,S.ST', 'email' => 'ritasuminarsih@gmail.com'],
        ['nama' => 'Antonius Hernanda', 'email' => 'antoniushernanda8@gmail.com'],
        ['nama' => 'Ir. HP. Manullang. AUt.HAEI.', 'email' => 'dameria1710@yahoo.com'],
        ['nama' => 'Firman syah alam, SKM', 'email' => 'firman2105@gmail.com'],
        ['nama' => 'dr. Leonardo Ferdihansen', 'email' => 'spiderceltic@gmail.com'],
        ['nama' => 'dr. Yanta Immanuel Keliat, M.P.H.', 'email' => 'yanta.keliat@yahoo.com'],
        ['nama' => 'Dwi Desy Handayani, ST. IAI', 'email' => 'wiedhanda@gmail.com'],
        ['nama' => 'dr. Setyarini, MKes', 'email' => 'rini2yan@gmail.com '],
        ['nama' => 'Ns. K. Anis Paramita,S.Kep.M.Kes', 'email' => 'anisparamitaa@gmail.com'],
        ['nama' => 'dr. Sandra Tan Ayamiseba, SpKK', 'email' => 'ayamiseba.sandra@gmail.com'],
        ['nama' => 'Azwar Hamid, ST.,M.KKK', 'email' => 'azwarcivil46@gmail.com'],
        ['nama' => 'Erik Suhendar, S.T', 'email' => 'erik_sid@yahoo.com'],
        ['nama' => 'Emiliana Maria T', 'email' => 'rini@emc.id'],
        ['nama' => 'Aris Karismaputra Sunjaya, ST.', 'email' => 'aris.ksunjaya@gmail.com'],
        ['nama' => 'Kelly Anggoro, ST.', 'email' => 'kellyanggoro@gmail.com'],
        ['nama' => 'Mohamad Husni Thamin, S.Ag', 'email' => 'thamrin71@mail.com'],
        ['nama' => 'Dr. I Wayan Aryabiantara, SpAn.KIC', 'email' => 'aryabiantara@gmail.com'],
        ['nama' => 'F.Trias Pontia Wigyarianto, ST, MT, IPM, ASEAN Eng.', 'email' => 'trias.pontia@ee.untan.ac.id'],
        ['nama' => 'Ir. Taufiqurrachman', 'email' => 'taufiq_oi@yahoo.com'],
        ['nama' => 'Trianjaya Wicaksana., ST .,MT', 'email' => 'pandupersada.ded@gmail.com'],
        ['nama' => 'Gregorius Dimas, S.Ars', 'email' => 'dimasgreg1993@gmail.com'],
        ['nama' => 'Adrian Tri Prasetya, S.Kom', 'email' => 'ian88_ja@yahoo.com'],
        ['nama' => 'Fefen Suhedi', 'email' => 'fefen.suhedi@pu.go.id'],
    ];

    $_users = [];
    $orderNum = [
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
        21,
        22,
        23,
        24,
        25,
        26,
        27,
        28,
        29,
        30,
        31,
        32,
        33,
        34,
        35,
        36,
        37,
        38,
        39,
        40,
        41,
        42,
        43,
        44,
        45,
        46,
        47,
        48,
        49,
        50,
        51,
        52,
        13,
    ];

    foreach ($data_part as $key => $user) {
        // $orderNum = $key + 1;
        $sing = Participant::where('email', $user['email'])->first();
        array_push($_users, 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://iahe.or.id/home/sertifikat/scan/' . $sing['email'] . '/14');
        // if (!$sing) {
        //     Participant::create($user);
        // }
        // array_push($_users, $orderNum);
        // \DB::table('certificate_participant')->insert([
        //     'participant_id' => $sing->id,
        //     'certificate_id' => 14,
        //     'download' => 0,
        //     'order' => $orderNum[$key],
        // ]);
    }
    return $_users;
});

Route::get('auth', function () {
    return bcrypt('secret');
    $time = time();
    $data = DataCenter::whereNull('created_at')->get();
    foreach ($data as $item) {
        $item->created_at = "2021-05-19 10:44:53";
        $item->save();
    }
    return 'success';
});

Route::get('referral/{referral}', function ($referral = null) {

    $client = new \GuzzleHttp\Client();
    $request = $client->get('https://www.sehat-ri.net/api/institution/referral/check/code/' . $referral, ['http_errors' => false]);
    $result = \GuzzleHttp\json_decode($request->getBody());
    $resCode = trim(collect($result->code), '[]');
    if ($resCode == 200) {
        return collect($result);
        // return 'ada';
    } else {
        return collect($result);
        return 'kosong';
    }
});

Route::get('/', 'HomeController@index');
Route::get('/certificates-sign', 'HomeController@certificatesSign');

Route::post('/', 'HomeController@sendEmail');

Route::get('/register', 'AuthController@getRegister');

Route::get('/confirmation', 'AuthController@registerConfirmation');
Route::get('/status-confirmation', 'AuthController@statusConfirmation');
Route::get('/seminar-selection', 'AuthController@getSeminarParticipant');
Route::post('/seminar-selection', 'AuthController@temaParticipant');

// Route::get('/register/participant', 'AuthController@getRegisterParticipant');
// Route::post('/register/participant', 'AuthController@registerParticipant');
// Route::get('/login/participant', 'AuthController@getLoginParticipant');
// Route::post('/login/participant', 'AuthController@loginParticipant');
// Route::get('/participant/join/accept', 'AuthController@confirmationSeminar');

Route::get('/register/perorangan', 'AuthController@getRegisterPersonal');
Route::post('/register/perorangan', 'AuthController@registerPersonal');

Route::get('/register/korporasi', 'AuthController@getRegisterCorporate');
Route::post('/register/korporasi', 'AuthController@registerCorporate');

Route::get('/login', 'AuthController@getLogin')->name('login');

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');


Route::get('/cv-template-anggota', 'HomeController@downloadCvAnggota');

Route::group(['prefix' => 'home'], function () {
    Route::get('/room-zoom', 'HomeController@roomZoom');
    Route::get('/info-profile', 'HomeController@profilePresidenPtpi');
    Route::get('/tujuan-fungsi', 'HomeController@tujuanFungsi');
    Route::get('/dasar-hukum', 'HomeController@dasarHukum');
    Route::get('/visi-misi', 'HomeController@visiMisi');
    Route::get('/organisma', 'HomeController@strukturOrganisasi');
    Route::get('/sel', 'HomeController@sel');
    Route::get('/bidang-keahlian', 'HomeController@bidangKeahlian');
    Route::get('/sertifikasi', 'HomeController@sertifikasi');
    Route::get('/jejaring', 'HomeController@jejaring');
    Route::get('/sertifikat', 'HomeController@getSertifikat');
    Route::post('/sertifikat/entri/{referral?}', 'HomeController@sertifikat');
    Route::get('/check-referral', 'HomeController@checkReferral');
    Route::get('/sertifikat/scan/{email}/{certificate}', 'HomeController@scanSertifikat');
    Route::get('/sertifikat/ttd/scan/{unique_id}', 'HomeController@scanSignSertifikat');
    Route::get('/artikel', 'HomeController@artikel');
    Route::get('/artikel/{article}', 'HomeController@showArtikel');
    Route::get('/artikel/search/search-artikel', 'HomeController@searchArtikel');
    Route::get('/berita', 'HomeController@berita');
    Route::get('/berita/{new}', 'HomeController@showBerita');
    Route::get('/berita/search/search-news', 'HomeController@searchBerita');
    Route::get('/aktifitas', 'HomeController@aktifitas');
    Route::get('/frequently-asked-questions', 'HomeController@faq');
    Route::get('/kontribusi_sehat_ri', 'HomeController@kontribusiSehatRI');
    Route::get('/laporan', 'HomeController@laporan');
    // Route::get('/laporan-keuangan', 'HomeController@laporanKeuangan');
    Route::get('/laporan-keuangan', 'HomeController@laporanKeuangan');
    // Route::get('/laporan-kegiatan', 'HomeController@laporanKegiatan');
    Route::get('/materi', 'HomeController@materi');
    Route::get('/seminar-hef-certificate', 'HomeController@seminarHefCertificate');
    Route::get('/seminar-hef-certificate/download/{id}', 'HomeController@downloadSeminarHefCertificate');
    Route::get('/seminar-hef', 'HomeController@seminarHef');
    Route::get('/seminar-hef/download/{file}', 'HomeController@downloadMateriSeminar');
    Route::get('/materi/download/{file}', 'HomeController@downloadMateri');
    Route::get('/seminar-hef/search', 'HomeController@searchMateriSeminar');
    Route::get('/laporan-kegiatan/download/{file}', 'HomeController@downloadLaporan');
    Route::get('/surat-permohonan', 'HomeController@downloadSuratPermohonan');
    Route::get('/surat-permohonan/lengkap', 'HomeController@suratPermohonanLengkap');
    Route::get('/konsultasi-timeline', 'HomeController@faqTimeLine');
    Route::get('/frequently-asked-questions/submit/{topic}', 'TopicController@submitEmail');
    Route::get('/frequently-asked-questions/submit/{topic}/verify', 'TopicController@submitEmailVerify');
    Route::post('/frequently-asked-questions/draf-email', 'HomeController@draftEmail');
    Route::get('/tanya-jawab', 'HomeController@questionAnswer');
});

Route::get('/dashboard', 'DashboardController@index');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/profile', 'AdminController@editProfile');
    Route::post('/profile', 'AdminController@updateProfile');
    Route::resource('/article', 'ArticleController');
    Route::resource('/activity', 'ActivityController');
    Route::resource('/tag', 'TagController');
    Route::resource('/seminar', 'CertificateController');
    Route::post('/seminar/update/tema', 'CertificateController@updateTema');
    Route::post('/seminar/update/active', 'CertificateController@updateActive');
    Route::resource('/new', 'NewsController');
    Route::resource('/member', 'MemberController');
    Route::get('/perorangan', 'MemberController@indexPersonal');
    Route::resource('/tanya-jawab', 'QuestionAnswerController');
    Route::get('/tanya-jawab/create-answer/{id}', 'QuestionAnswerController@createAnswer');
    Route::post('/tanya-jawab/create-answer', 'QuestionAnswerController@storeAnswer');
    Route::get('/korporasi', 'MemberController@indexCorporate');
    Route::get('/member/accept/{member}', 'MemberController@accept');
    Route::get('/member/decline/{member}', 'MemberController@decline');
    Route::get('/member/download/cv/{user}', 'MemberController@downloadCv');

    // laporan
    // Route::resource('laporan', 'LaporanController');
    Route::resource('laporan-keuangan', 'LaporanController');
    Route::resource('laporan-kegiatan', 'LaporanKegiatanController');
    Route::resource('seminar-hef', 'SeminarHefController');
    Route::resource('materi', 'MateriController');
    Route::post('laporan-keuangan/update/saldo', 'LaporanController@updateSaldo');

    // kontribusi
    Route::get('/kontribusi/sehat_ri', 'UserController@kontribusiSehatRI');
    Route::get('/kontribusi/sehat_ri/create', 'UserController@createKontribusiSehatRI');
    Route::post('/kontribusi/sehat_ri', 'UserController@storeKontribusiSehatRI');
    Route::delete('/kontribusi/sehat_ri/{id}', 'UserController@destroyKontribusiSehatRI');

    // kontributor
    Route::get('/kontributor/sehat_ri/create', 'UserController@createKontributorSehatRI');
    Route::post('/kontributor/sehat_ri', 'UserController@storeKontributorSehatRI');
    Route::delete('/kontributor/sehat_ri/{id}', 'UserController@destroyKontributorSehatRI');

    Route::resource('/participant', 'ParticipantController');
    Route::post('/participant/fetch/participant/all', 'ParticipantController@fetchParticipant');
    Route::get('/participant/edit/password/{id}', 'ParticipantController@resetPassword');
    Route::resource('/certificate-draft', 'CertificateDraftController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/user', 'UserController');
    Route::resource('/topic', 'TopicController');
    Route::resource('/data-center', 'DataCenterController');
    Route::get('/data-center/list/surat/', 'DataCenterController@indexSurat');
    Route::get('/data-center/create/surat/', 'DataCenterController@createSurat');
    Route::post('/data-center/list/surat', 'DataCenterController@storeSurat');
});
Route::get('/data-center/files/{datacenter}', 'DataCenterController@downloadFile');
Route::get('/data-center/validasi/surat/{unique_id}', 'DataCenterController@validasiSurat');
Route::get('/data-center/validasi/certificate/{unique_id}', 'DataCenterController@validasiCertificate');

Route::group(['prefix' => 'member'], function () {
    Route::get('/faqs', 'MemberController@listFaq');
    Route::get('/faqs/{topic}', 'MemberController@listFaqDetail');
    Route::post('/faqs', 'MemberController@replyFaq');
});

// Route::get('check', function () {
//     // return $rekap = Certificate::find('3')->participants->where('jenis_instansi', 'RUMAH SAKIT');


//     $seminar4_1 = \DB::table('pretest')->get();
//     $data = Participant::whereIn('email', collect($seminar4_1)->pluck('email'))->get();
//     foreach ($data as $val) {
//         $cek = \DB::table('certificate_participant')->where([
//             'participant_id' => $val->id,
//             'certificate_id' => 4
//         ])->first();
//         if (!$cek) {
//             \DB::table('certificate_participant')->insert([
//                 'participant_id' => $val->id,
//                 'certificate_id' => 4,
//                 'download' => false,
//             ]);
//         }
//     }
//     return 'success';
// });

Route::get('check_grouping', function () {
    $participants = Participant::all();
    //return $participants->where('pekerjaan', 'IT');
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', 8)->first()) {
            array_push($data, $participant);
        }
    }
    return $data;
    return collect($data)->groupBy('provinsi');
    // return collect($data)->pluck('email');
});


Route::get('_group_all', function () {
    $participants = Participant::all();
    //return $participants->where('pekerjaan', 'IT');
    // $data = [];
    // foreach ($participants as $participant) {
    //     if ($participant->certificates->where('id', 9)->first()) {
    //         array_push($data, $participant);
    //     }
    // }
    //return $data;
    return $participants->slice(4500, 900);
});

Route::get('_group_split/{id}', function ($id) {
    $participants = Participant::all();
    //return $participants->where('pekerjaan', 'IT');
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return $data;
    // return collect($data)->groupBy('email')->slice(0, 900);
});

Route::get('_count/{id}', function ($id) {
    $participants = Participant::all();
    //return $participants->where('pekerjaan', 'IT');
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return count($data);
    // return collect($data)->groupBy('email')->slice(0, 900);
});

Route::get('_group_provinsi/{id}', function ($id) {
    $participants = Participant::all();
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return collect($data)->groupBy('provinsi');
});

Route::get('_group_pekerjaan/{id}', function ($id) {
    $participants = Participant::all();
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return collect($data)->groupBy('pekerjaan');
});

Route::get('_group_instansi/{id}', function ($id) {
    $participants = Participant::all();
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return collect($data)->groupBy('jenis_instansi');
});

Route::get('reset_pass', function () {
    return bcrypt('secret');
});

Route::get('_group_null/{id}', function ($id) {
    $participants = Participant::all();
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    return collect($data)->where('pekerjaan', null);
});
