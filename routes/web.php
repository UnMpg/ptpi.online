<?php

use App\Participant;

Route::get('lang/{locale}', 'LocalizationController@index');

Route::get('/', 'HomeController@index');
Route::get('/certificates-sign', 'HomeController@certificatesSign');

Route::post('/', 'HomeController@sendEmail');

Route::get('/register', 'AuthController@getRegister');

Route::get('/confirmation', 'AuthController@registerConfirmation');
Route::get('/status-confirmation', 'AuthController@statusConfirmation');
Route::get('/seminar-selection', 'AuthController@getSeminarParticipant');
Route::post('/seminar-selection', 'AuthController@temaParticipant');

Route::get('/register/participant', 'AuthController@getRegisterParticipant');
Route::post('/register/participant', 'AuthController@registerParticipant');
// Route::get('/login/participant', 'AuthController@getLoginParticipant');
// Route::post('/login/participant', 'AuthController@loginParticipant');
Route::get('/participant/join/accept', 'AuthController@confirmationSeminar');
Route::get('/register/hospital', 'AuthController@getRegisterHospital');
Route::post('/register/hospital', 'AuthController@registerHospital');

Route::get('/register/perorangan', 'AuthController@getRegisterPersonal');
Route::post('/register/perorangan', 'AuthController@registerPersonal');

Route::get('/register/korporasi', 'AuthController@getRegisterCorporate');
Route::post('/register/korporasi', 'AuthController@registerCorporate');

Route::get('/login', 'AuthController@getLogin')->name('login');

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

//tambahan
Route::group(['prefix'=>'certified'],function(){
    Route::get('/','CertifiedMemberController@index');
    Route::get('/register','CertifiedMemberController@register');
    Route::post('/register','CertifiedMemberController@registerSubmit');
    Route::get('/login','CertifiedMemberController@login');
    Route::post('/login','CertifiedMemberController@loginAction');
    Route::get('/tetang-lsp','CertifiedMemberController@tentangLSP');
    Route::get('/visi-misi','CertifiedMemberController@visiMisi');
    Route::get('/struktur','CertifiedMemberController@strukturOrganisasi');    
    Route::get('/ahli-teknik-kesehatan','CertifiedMemberController@ahliTeknikKesehatan');
    Route::get('/fungsi-peran','CertifiedMemberController@fungsiPeran');
    Route::get('/hak-kewajiban','CertifiedMemberController@hakKewajiban');
    Route::get('/persyaratan-dokumen','CertifiedMemberController@persyaratanDokumen');
    Route::get('/pemutakhiran','CertifiedMemberController@pemuktahiran');
    Route::get('/banding','CertifiedMemberController@banding');
    Route::get('/daftar-tempatuji','CertifiedMemberController@daftarTempatuji');
    Route::get('/sertifikasi-ulang','CertifiedMemberController@sertifikasiUlang');
    Route::get('/berita','CertifiedMemberController@berita');
    Route::get('/resertifikasi','CertifiedMemberController@resertifikasi');
    Route::get('/home','CertifiedMemberController@home');
    Route::get('/inset-data','CertifiedMemberController@insertData');
    Route::post('/inset-data','CertifiedMemberController@insertDataAction');
    Route::get('/file-upload','CertifiedMemberController@fileUpload');
    Route::post('/ktp','CertifiedMemberController@ktp');
    Route::post('/upload-cv','CertifiedMemberController@uploadCv');
    Route::post('/upload-ijazah','CertifiedMemberController@uploadIjazah');
    Route::post('/upload-document','CertifiedMemberController@uploadDocument');
    Route::delete('/upload-document/{deskripsi}','CertifiedMemberController@deleteDataMember');
    Route::delete('/delete-upload/{deskripsi}','CertifiedMemberController@deleteUpload');
    Route::post('/input-nilai','CertifiedMemberController@inputNilai');
    Route::get('/download-pdf/{id}','CertifiedMemberController@downloadPDF');
    Route::post('/update-score-pendidikan','CertifiedMemberController@updateScorePendidikan');
    Route::post('/update-score-pelatihan','CertifiedMemberController@updateScorePelatihan');
    Route::post('/update-score-pengalaman','CertifiedMemberController@updateScorePengalaman');    
    Route::post('/update-score-pencapaian','CertifiedMemberController@updateScorePencapaian');
    Route::get('/home-dashboard','CertifiedMemberController@homeDashboard');
    Route::get('/profile-user','CertifiedMemberController@profilUser');
    Route::get('/upload-document-user','CertifiedMemberController@uploadUser');
    Route::get('/download-file','CertifiedMemberController@downloadUser');
    Route::get('/insert-data-profile','CertifiedMemberController@insertDataProfile');
    Route::post('/insert-notive','CertifiedMemberController@insertNotive');
    Route::get('/get-notive','CertifiedMemberController@getNotive');
    Route::get('/upload-bukti-pembayaran','CertifiedMemberController@uploadBukti');
});


// Ujian Sertifikasi 
Route::group(['prefix'=>'certified/ujian'],function(){
    Route::get('/','CertifiedUjianController@index');
    Route::post('/action-login','CertifiedUjianController@actionLogin');
});

// Route::group(['middleware'=>['auth']],function (){
//     oute::group(['middleware' => ['cek_login:admin']], function () {
//         Route::resource('admin', AdminController::class);
//     });
// });

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
    Route::get('/sertifikat/all', 'HomeController@getSertifikatCommon');
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

    //tambahan baru
    Route::get('/past-activities', 'HomeController@pastActivities');
    Route::get('/upcoming-activities', 'HomeController@upcomingActivities');
    Route::get('/event-registration', 'AuthController@eventRegistration');
    Route::get('/ptpi-introduction', 'HomeController@ptpiIntroduction');
    Route::get('/member-guideline', 'HomeController@memberGuideline');
    Route::get('/history-roadmap', 'HomeController@historyandRoadmap');
    Route::get('/organism', 'HomeController@organism');
    Route::get('/hospital-map', 'HomeController@hospitalMap');
    Route::get('/expert', 'HomeController@expert');
    Route::get('/import-excel', 'HomeController@importExcel');
    Route::get('/hospital-news', 'HomeController@hospitalNews');    
    Route::get('/hospital-news/{new}', 'HomeController@showHospitalNews');
    Route::get('/hospital-news/search/search-news', 'HomeController@searchHospitalNews');
    Route::get('/hospital-listCertified', 'HomeController@hospitalListCertified');
    Route::get('/hospital-listSmarthospital', 'HomeController@hospitalListSmarthospital');
    Route::get('/hospital-contact', 'HomeController@hospitalContact');
    Route::get('/hospital-contact/search/search-contact', 'HomeController@searchHospitalContact');
    Route::get('/industry-map', 'HomeController@industryMap');
    Route::get('/industry-news', 'HomeController@industryNews');
    Route::get('/industry-news/{new}', 'HomeController@showIndustryNews');
    Route::get('/industry-news/search/search-news', 'HomeController@searchIndustryNews');
    Route::get('/engineer-certified', 'HomeController@engineerCertified');

    Route::get('/side-map', 'HomeController@sideMap');
    Route::get('/forum', 'HomeController@forum');
});

Route::get('/dashboard', 'DashboardController@index');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/profile', 'AdminController@editProfile');
    Route::post('/profile', 'AdminController@updateProfile');
    Route::resource('/article', 'ArticleController');
    Route::resource('/activity', 'ActivityController');
    Route::resource('/tag', 'TagController');
    Route::resource('/sign', 'SignController');
    Route::resource('/seminar', 'CertificateController');
    Route::get('/seminar/participant/{seminar}', 'CertificateController@showParticipant');
    Route::post('/seminar/participant/import', 'CertificateController@importParticipantSeminar');
    Route::get('/seminar/participant/export/{seminar_id}', 'CertificateController@exportParticipantSeminar');
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
    Route::delete('/data-center/list/surat/delete/{id}', 'DataCenterController@destroySurat');

    // tambahan
    Route::get('/certified-view','CertifiedMemberController@certifiedView');
    Route::get('/certified-view-user/{id}','CertifiedMemberController@viewUser');
    Route::get('/download-file/{id}','CertifiedMemberController@downloadZipFile');
    Route::get('/certified-input-soal','CertifiedUjianController@inputSoal');
    Route::post('/certified-insert-soal','CertifiedUjianController@insertSoal');
    Route::get('/certified-edit-soal/{id}','CertifiedUjianController@editSoal');    
    Route::post('/certified-update-soal','CertifiedUjianController@updateSoal');
    Route::post('/konfirmasi-nilai','CertifiedMemberController@konfirmasiNilai');
    
});


Route::get('/data-center/files/{datacenter}', 'DataCenterController@downloadFile');
Route::get('/data-center/validasi/surat/{unique_id}', 'DataCenterController@validasiSurat');
Route::get('/data-center/validasi/certificate/{unique_id}', 'DataCenterController@validasiCertificate');

Route::group(['prefix' => 'member'], function () {
    Route::get('/faqs', 'MemberController@listFaq');
    Route::get('/faqs/{topic}', 'MemberController@listFaqDetail');
    Route::post('/faqs', 'MemberController@replyFaq');
});

Route::get('check_grouping/{id}', function ($id) {
    $participants = Participant::all();
    //return $participants->where('pekerjaan', 'IT');
    $data = [];
    foreach ($participants as $participant) {
        if ($participant->certificates->where('id', $id)->first()) {
            array_push($data, $participant);
        }
    }
    // return collect($data)->groupBy('provinsi');
    $emails = collect($data)->pluck('email');
    return Participant::whereIn('email', $emails)->get([
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
