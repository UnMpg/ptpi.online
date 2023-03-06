<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CertifiedMember;
use App\CertifiedPencapaian;
use App\CertifiedPendidikan;
use App\CertifiedPengalaman;
use App\CertifiedPelatihan;
use App\CertifiedUpload;
use App\CertifiedStatus;
use App\CertifiedInformation;
use App\CertifiedUjian;
use App\CertifiedJawaban;
use App\CertifiedSoal;
use App\CertifiedWawancara;
use App\CertifiedPenilaianWawancara;
use App\Location;
use App\LocationKoordinat;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use File;
use PDF;
use ZipArchive;


class CertifiedMemberController extends Controller
{
    public $dir_foto = "assets/certified/foto/";
    public $dir_upload = "assets/certified/upload/";

    public function index(){
        return view('certified.index');
    }

    public function logout()
    {
        if (auth('admin')->check()) {
            auth('admin')->logout();
        } elseif (auth('web')->check()) {
            auth('web')->logout();
        }elseif(auth('certified')->check()){
            auth('certified')->logout();
        }
        return redirect('/sertifikasi');
    }

    public function register(){
        $provinsi = LocationKoordinat::orderByDesc('created_at')->get('provinsi');
        $instansi = Location::orderByDesc('created_at')->get();
        // dd($instansi);
        return view('certified.register1',compact('provinsi','instansi'));
    }

    public function tentangLSP(){
        return view('certified.tentangLSP');
    }

    public function visiMisi(){
        return view('certified.visiMisi');
    }

    public function strukturOrganisasi(){
        return view('certified.strukturOrganisasi');
    }

    public function fungsiPeran(){
        return view('certified.fungsiPeran');
    }

    public function ahliTeknikKesehatan(){
        return view('certified.ahliTeknikKesehatan');
    }

    public function hakKewajiban(){
        return view('certified.hakKewajiban');
    }

    public function pemuktahiran(){
        return view('certified.pemuktahiran');
    }

    public function persyaratanDokumen(){
        return view('certified.persyaratanDokumen');
    }

    public function banding(){
        return view('certified.banding');
    }

    public function surveilen(){
        return view('certified.surveilen');
    }

    public function infoPembiayaan(){
        return view('certified.infoPembiayaan');
    }

    public function prosedurKeluhan(){
        return view('certified.prosedurKeluhan');
    }

    public function komitmenKetidakBerpihakan(){
        return view('certified.komitmenKetidakBerpihakan');
    }
    
    public function listTersertifikasi(){
        return view('certified.listTersertifikasi');
    }

    public function dewanPakar(){
        return view('certified.dewanPakar');
    }

    public function dewanPengarah(){
        return view('certified.dewanPengarah');
    }

    public function resertifikasi(){
        return view('certified.resertifikasi');
    }

    public function daftarTempatuji(){
        return view('certified.daftarTempatuji');
    }

    public function sertifikasiUlang(){
        return view('certified.sertifikasiUlang');
    }

    public function berita(){
        return view('certified.berita');
    }

    public function materiSosialisasi(){
        return view('certified.materiSosialisasi');
    }

    public function registerSubmit(Request $Request){
        
        CertifiedMember::create([
            'nama'=>$Request->nama,
            'email'=>$Request->email,
            'role'=>"user",
            'telp'=>$Request->no_telp,
            'password'=>Hash::make($Request->password),
            'jenis_instansi'=>$Request->jenis_instansi,
            'nama_instansi'=>$Request->nama_instansi,
            'nama_provinsi'=>$Request->nama_provinsi,
            'nama_kota'=>$Request->nama_kota,
            'certified_status'=>"1"
        ]);

        // return redirect()->with('success', 'Selamat, Anda Berhasil Mendaftarkan Diri Anda');
        return back()->with('success', 'Selamat, Anda Berhasil Mendaftar ');
    }

    public function login(){
        return view('certified.login');
    }

    public function home(){
        // dd(auth('certified')->user());
        $notive = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->get();
        // dd($notive);
        $jml_notive = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->where('status','1')->count();
        return view('certified.dashboard.index' ,compact('notive','jml_notive'));
        
    }


    public function konfirmasiNilai(Request $request){

        // $update_score = CertifiedMember::where('id', $request->id);
        // $update_score->update([
        //     'nilai'=>$request->score,
        // ]);
        if($request->tingkat == null){
            $tingkat="muda";
        }else {
            $tingkat = $request->tingkat;
        }
        
        $score= (int)$request->score;
        if($score >= 2000){
            $insert_data = CertifiedMember::where('id', $request->id);
            $insert_data->update([
            'nilai' => $request->score,
            'certified_status' => "4",
            'tingkat'=>$tingkat,
            'status'=>"Lolos Verifikasi Dokumen"
            ]);
        }else {
            $insert_data = CertifiedMember::where('id', $request->id);
            $insert_data->update([
            'nilai' => $request->score,
            'status'=>"Tidak Lolos Verifikasi Dokument",
            'certified_status' => "20"
            ]);

            $title = "Tidak LULUS Verifikasi";
            $status = "1";
            $kategori = "tidak_lulus_verifikasi";
            $body  = "<p>Kepada Yth, <strong> fenau</strong></p>
            <p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti :08473274282</p>
            <p>Sekian, terimakasih.</p>";

            CertifiedInformation::create([
                'certified_member_id'=>$request->id,
                'title'=>$title,
                'status'=>$status,
                'kategori'=>$kategori,
                'body'=>$body
            ]);
        }

        $title = "LULUS Verifikasi Dokumen";
        $status = "1";
        $kategori = "lulus_verifikasi";
        $body ="<p>Kepada Yth, <strong>" .$request->nama." </strong></p>
        <p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Selamat anda dinyatakan <strong><em>LULUS</em></strong> 
        tahapan verifikasi dengan potensi level teknik pelayanan kesehatan <strong><em>MUDA</em></strong>.</p>
        <p>Selanjutnya Melakukan Pembayara Rekening berikut :</p>
        <p>Nama : TEKNIK PERUMAHSAKITAN IN</p>
        <p>Nomor Rekening : 5290849995</p>
        <p>Bank : BCA</p>
        <p>Jumlah : RP 6.000.000</p>
        <p>Informasi lebih lanjut dapat menghubungi kami di Siti 082383477128</p><p>Sekian, terimakasih.</p>";
        $body_invoice  = "<p>Kepada Yth, <strong> asnanda</strong></p>
        <p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Selamat anda dinyatakan <strong><em>LULUS</em></strong> 
        tahapan verifikasi dengan potensi level teknik pelayanan kesehatan <strong><em>MUDA</em></strong>.</p>
        <p>Selanjutnya dimohon mengunduh invoice pembayaran pada link berikut : 
        <a href='https://ptpi.online/assets/certified/file/INVOICE PEMBAYARAN.pdf' target='_blank'>Invoice Pembayaran</a></p>
        <p>Informasi lebih lanjut dapat menghubungi kami di Siti 082383477128</p><p>Sekian, terimakasih.</p>";

        CertifiedInformation::create([
            'certified_member_id'=>$request->id,
            'title'=>$title,
            'status'=>$status,
            'kategori'=>$kategori,
            'body'=>$body
        ]);
        return response()->json($body, 200);
    }

    public function resetNilai(Request $request){

        if ($request->aksi == "pendidikan") {
            $update_pendidikan = CertifiedPendidikan::where('id',$request->id);
            $update_pendidikan->update([
                "score_verified"=> null
            ]);

            return response()->json($request->id, 200);
        }elseif($request->aksi == "pelatihan"){
            $update_pelatihan = CertifiedPelatihan::where('id',$request->id);
            $update_pelatihan->update([
                "score_verified"=> null
            ]);

            return response()->json($request->id, 200);
        }elseif($request->aksi == "pengalaman"){
            $update_pengalaman = CertifiedPengalaman::where('id',$request->id);
            $update_pengalaman->update([
                "score_verified"=> null
            ]);

            return response()->json($request->id, 200);
        }elseif($request->aksi == "pencapaian"){
            $update_pencapaian = CertifiedPencapaian::where('id',$request->id);
            $update_pencapaian->update([
                "score_verified"=> null
            ]);

            return response()->json($request->id, 200);
        }else{
            return response()->json($request->id, 200);
        }
    }

    public function uploadBukti(){
        $cek_upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->whereIn('upload_deskripsi',['perjanjian','bukti_pembayaran'])->get();
        
        if (count($cek_upload) >= 2) {
            $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
            $insert_data->update([
            'certified_status' => "5"
            ]);
        }

        $upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->whereIn('upload_deskripsi',['perjanjian','bukti_pembayaran'])->get();
        return view('certified.dashboard.uploadBukti',compact('upload'));
    }

    public function uploadBuktiSave(Request $request){
        $pesan = $request->upload_deskripsi.auth('certified')->user()->nama."berhasil di upload";
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,doc,docx,ppt,pptx,txt,pdf|max:10040'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $documentName = $request->upload_deskripsi.'_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        CertifiedUpload::create([
            'certified_member_id'=>auth('certified')->user()->id,
            'upload_deskripsi'=>$request->upload_deskripsi,
            'file_name'=>$documentName
        ]);

        
        
    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $documentName);
        
        return response()->json($documentName, 200);

    }

    public function uploadPerjanjianKonfirmasi(Request $request){
        $pesan = $request->upload_deskripsi."berhasil di upload";
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,doc,docx,ppt,pptx,txt,pdf|max:10040'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $documentName = $request->upload_deskripsi.'_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        CertifiedUpload::create([
            'certified_member_id'=>$request->id_user,
            'upload_deskripsi'=>$request->upload_deskripsi,
            'file_name'=>$documentName
        ]);

    
        $request->file('file')->move(public_path($this->dir_upload.$request->nama), $documentName);
        
        return response()->json($documentName, 200);

    }

    public function loginAction(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');

        // dd($credentials);
        
        if (auth('certified')->attempt($credentials)) {
            // $request->session()->regenerate(); 
            // dd($credentials);
            
            return redirect(action('CertifiedMemberController@home'));
            
        }
        return back()->with('warning', 'Email or Password Anda Salah');
    }

    public function insertData(){
        return view('certified.insert.index');
    }
    public function insertDataProfile(){
        return view('certified.dashboard.insertData');
    }

    public function insertNotive(Request $request ){
        
        // dd($request);

        if ($request->kategori == "konfirmasi_ujian") {
            
            $update = CertifiedMember::where('id',$request->id)->first();
            
            if ($update->certified_status <= 6  )  {

                $update_notive = CertifiedInformation::where('certified_member_id',$request->id)->where('title','LIKE','Konfirmasi Ujian')->first();
                if($update_notive != null){
                    $update_notive->update([
                        'body'=>$request->body,
                        'ujian_pilihan_1'=> $request->pilihanTanggal1,
                        'ujian_pilihan_1_sesi1'=>$request->pilihanTanggal1_waktu1,
                        'ujian_pilihan_1_sesi2'=>$request->pilihanTanggal1_waktu2,
                        'ujian_pilihan_2'=> $request->pilihanTanggal2,
                        'ujian_pilihan_2_sesi1'=>$request->pilihanTanggal2_waktu1,
                        'ujian_pilihan_2_sesi2'=>$request->pilihanTanggal2_waktu2,
                        'ujian_pilihan_3'=> $request->pilihanTanggal3,
                        'ujian_pilihan_3_sesi1'=>$request->pilihanTanggal3_waktu1,
                        'ujian_pilihan_3_sesi2'=>$request->pilihanTanggal3_waktu2
                    ]);

                    $insertNotive = True;
                }else {
                    $insertNotive = CertifiedInformation::create([
                        'certified_member_id'=>$request->id,
                        'kategori'=>$request->kategori,
                        'title'=>$request->title,
                        'body'=>$request->body,
                        'ujian_pilihan_1'=> $request->pilihanTanggal1,
                        'ujian_pilihan_1_sesi1'=>$request->pilihanTanggal1_waktu1,
                        'ujian_pilihan_1_sesi2'=>$request->pilihanTanggal1_waktu2,
                        'ujian_pilihan_2'=> $request->pilihanTanggal2,
                        'ujian_pilihan_2_sesi1'=>$request->pilihanTanggal2_waktu1,
                        'ujian_pilihan_2_sesi2'=>$request->pilihanTanggal2_waktu2,
                        'ujian_pilihan_3'=> $request->pilihanTanggal3,
                        'ujian_pilihan_3_sesi1'=>$request->pilihanTanggal3_waktu1,
                        'ujian_pilihan_3_sesi2'=>$request->pilihanTanggal3_waktu2,
                        'status'=>"1"
                    ]);
                }

                $update_status = CertifiedMember::where('id',$request->id)->first();
                $update_status->update([
                    'certified_status'=>"6",
                ]);
            } else {
                return back()->with('warning','Notive Tidak Masuk');
            }
            
        } elseif($request->kategori == "jadwal_wawancara"){

            $update = CertifiedMember::where('id',$request->id)->first();
            if ($update->certified_status <= 11  ) {

                $update_notive = CertifiedInformation::where('certified_member_id',$request->id)->where('title','LIKE','Jadwal Wawancara')->first();
                if($update_notive != null){
                    $update_notive->update([
                        'body'=>$request->body,
                        'wawancara1'=> $request->pilihanTanggal1,
                        'wawancara1_sesi1'=>$request->pilihanTanggal1_waktu1,
                        'wawancara1_sesi2'=>$request->pilihanTanggal1_waktu2,
                        'wawancara2'=> $request->pilihanTanggal2,
                        'wawancara2_sesi1'=>$request->pilihanTanggal2_waktu1,
                        'wawancara2_sesi2'=>$request->pilihanTanggal2_waktu2,
                        'wawancara3'=> $request->pilihanTanggal3,
                        'wawancara3_sesi1'=>$request->pilihanTanggal3_waktu1,
                        'wawancara3_sesi2'=>$request->pilihanTanggal3_waktu2
                    ]);

                    $insertNotive = True;
                }else {
                    $insertNotive = CertifiedInformation::create([
                        'certified_member_id'=>$request->id,
                        'kategori'=>$request->kategori,
                        'title'=>$request->title,
                        'body'=>$request->body,
                        'wawancara1'=> $request->pilihanTanggal1,
                        'wawancara1_sesi1'=>$request->pilihanTanggal1_waktu1,
                        'wawancara1_sesi2'=>$request->pilihanTanggal1_waktu2,
                        'wawancara2'=> $request->pilihanTanggal2,
                        'wawancara2_sesi1'=>$request->pilihanTanggal2_waktu1,
                        'wawancara2_sesi2'=>$request->pilihanTanggal2_waktu2,
                        'wawancara3'=> $request->pilihanTanggal3,
                        'wawancara3_sesi1'=>$request->pilihanTanggal3_waktu1,
                        'wawancara3_sesi2'=>$request->pilihanTanggal3_waktu2,
                        'status'=>"1"
                    ]);
                }
                $update_status = CertifiedMember::where('id',$request->id)->first();
                $update_status->update([
                    'certified_status'=>"11",
                ]);
            } else {
                return back()->with('warning','Notive habis');
            }
                        
        }
        
        else {
            $insertNotive = CertifiedInformation::create([
                'certified_member_id'=>$request->id,
                'kategori'=>$request->kategori,
                'title'=>$request->title,
                'body'=>$request->body,
                'status'=>"1"
            ]);
        }
        
        
        if ($insertNotive) {
            $email_user = CertifiedMember::where('id',$request->id)->first();
            $isi = $request->body;
            $subject = $request->title;
            $alamat_email=$email_user->email;        
            Mail::to($alamat_email)->send(new SendEmail($subject,$isi));
            
            return back()->with('success','Notive berhasil ditambahkan');
        }else{
            return back()->with('warning','Notive kosong');
        }

    }

    public function jadwalWawancara(){
        $jadwalWawancara = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->where('title','Jadwal Wawancara')->first();
        // dd($pilihanJadwals);
        $cek= CertifiedMember::where('id',auth('certified')->user()->id)->first();
        if($cek->certified_status <= 11 ){
            // dd("belum");
            
            return view('certified.dashboard.jadwalWawancara',compact('jadwalWawancara'));
        }else{
            // dd("sudah");
            return back();
        }  
        
        
    }


    
    public function kalkulasiJam($mulai, $selesai){
        
        $awal = strtotime($mulai);
        
        $akhir = strtotime($selesai);
        $hasil = ($akhir - $awal)/3600;
        $jumlah_jam = $hasil*0.2411;

        // dd($awal.'-'. $akhir.'='.$hasil.' jumlah jam=> '.$jumlah_jam );
        return (int)$jumlah_jam;

    }

    public function scoreProyek($pencapaian_jabatan,$pencapaian_nilai,$pencapaian_durasi){
        if ($pencapaian_jabatan == "ketua") {
            $bobot_jabatan = 0.1;
        }else {
            $bobot_jabatan = 0.025;
        }

        $perhitungan_nilai = (int)$pencapaian_durasi*(int)$pencapaian_nilai;

        $perhitungan_jabatan = (int)$pencapaian_durasi * $bobot_jabatan; 

        $hasil = ($perhitungan_nilai + $perhitungan_jabatan)/2;

        return $hasil;

    }

    public function scorePublikasi($pencapaian_kualitas){
        if($pencapaian_kualitas == "q1" || $pencapaian_kualitas == "q2"){
            $score = "100";
        }elseif ($pencapaian_kualitas == "q3" || $pencapaian_kualitas == "q4"){
            $score = "50";
        }elseif ($pencapaian_kualitas == "scopus" || $pencapaian_kualitas == "google") {
            $score = "30";
        }else {
            $score = "10";
        }

        return $score;
    }

    public function scoreHaki($pencapaian_jenis, $pencapaian_status){
        if ($pencapaian_jenis == "patent" && $pencapaian_status == "main"){
            $score = "100";
        }elseif ($pencapaian_jenis == "patent" && $pencapaian_status == "non main" ) {
            $score = "20";
        }elseif ($pencapaian_jenis == "copyright" && $pencapaian_status == "main" ) {
            $score = "30";
        }elseif ($pencapaian_jenis == "copyright" && $pencapaian_status == "non main" ) {
            $score = "5";
        }else {
            $score = "5";
        }

        return $score;
    }

    public function scorePelatihan($pencapaian_jenis,$pencapaian_tingkat,$pencapaian_durasi){
        if ($pencapaian_jenis == "moderator" && $pencapaian_tingkat == "internasional"){
            $bobot = 0.2;
        }elseif ($pencapaian_jenis == "moderator" && $pencapaian_tingkat == "nasional") {
            $bobot = 0.1;
        }elseif ($pencapaian_jenis == "narasumber" && $pencapaian_tingkat == "internasional") {
            $bobot = 0.4;
        }elseif ($pencapaian_jenis == "narasumber" && $pencapaian_tingkat == "nasional") {
            $bobot = 0.2;
        }else {
            $bobot = 0.05;
        }

        $hasil = (int)$pencapaian_durasi * $bobot;

        return (int)$hasil;

    }

    public function insertDataAction(Request $request){
        // dd($request);
        
        $id = auth('certified')->user()->id;
        $nama_gelar=$request->nama_gelar;
        $tmp_lahir= $request->tmp_lahir;
        $tgl_lahir= $request->tgl_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $telp = $request->telp;
        $ktp_passpor= $request->ktp_passpor;
        $alamat = $request->alamat;

        $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
        $insert_data->update([
            'nama_gelar'=>$nama_gelar,
            'tmp_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'telp' => $request->telp,
            'ktp_passpor' => $ktp_passpor,
            'alamat' => $request->alamat,
            'certified_status'=> "2",
        ]);

        
        $pendidikan = $request->pendidikan;
        $universitas = $request->universitas;
        $jurusan = $request->jurusan;
        $tahun_masuk =$request->tahun_masuk;
        $tahun_lulus= $request->tahun_lulus;


        for($i=0; $i<count($pendidikan); $i++){
            if($pendidikan[$i] == "s1"){
                $score = "500";
            }else if($pendidikan[$i] == "s2"){
                $score = "200";
            }else if($pendidikan[$i] == "s3"){
                $score = "400";
            }
            else{
                $score = null;
            }
            CertifiedPendidikan::create([
                'certified_member_id'=>$id,
                'jenjang'=> $pendidikan[$i],
                'universitas'=>$universitas[$i],
                'jurusan'=>$jurusan[$i],
                'tahun_masuk'=>$tahun_masuk[$i],
                'tahun_lulus'=>$tahun_lulus[$i],
                'score_submit'=>$score,
            ]);
        }

        $pelatihan_nama = $request->pelatihan_nama;
        $pelatihan_institusi = $request->pelatihan_institusi;
        $pelatihan_tanggal = $request->pelatihan_tanggal;
        $pelatihan_durasi= $request->pelatihan_durasi;

        for($i=0; $i<count($pelatihan_nama); $i++){
            $score = 1 * (int)$pelatihan_durasi;
            $score_submit = (string) $score;
            CertifiedPelatihan::create([
                'certified_member_id'=>$id,
                'judul'=> $pelatihan_nama[$i],
                'institusi_pelatihan'=>$pelatihan_institusi[$i],
                'tanggal'=>$pelatihan_tanggal[$i],
                'durasi'=>$pelatihan_durasi[$i],
                'score_submit'=>$score_submit,
            ]);
        }

        $pengalaman_jabatan = $request->pengalaman_jabatan;
        $pengalaman_jenis = $request->pengalaman_jenis;
        $pengalaman_institusi = $request->pengalaman_institusi;
        $pengalaman_durasi = $request->pengalaman_durasi;
        $pengalaman_tahunawal = $request->pengalaman_tahunawal;
        $pengalaman_tahunakhir = $request->pengalaman_tahunakhir;


        for($i=0; $i<count($pengalaman_jabatan); $i++){
            $durasi_jam = $this->kalkulasiJam($pengalaman_tahunawal[$i], $pengalaman_tahunakhir[$i]);
            if($pengalaman_jenis[$i] == "teknik"){
                $score = $durasi_jam *  0.1667;
            }elseif ($pengalaman_jenis[$i] == "manajemen") {
                $score = $durasi_jam *  0.133;
            }elseif ($pengalaman_jenis[$i] == "admin") {
                $score = $durasi_jam *  0.1;
            }else {
                $score = $durasi_jam *  0.1;
            }

            $int_submit = (int)$score;
            $score_submit = (string)$int_submit;

            // dd($pengalaman_jenis[$i] , $score_submit );
            CertifiedPengalaman::create([
                'certified_member_id'=>$id,
                'jabatan'=> $pengalaman_jabatan[$i],
                'institusi'=>$pengalaman_institusi[$i],
                'jenis_pekerjaan'=>$pengalaman_jenis[$i],
                'tahun_awal'=>$pengalaman_tahunawal[$i],
                'tahun_akhir'=>$pengalaman_tahunakhir[$i],
                'durasi'=>$durasi_jam,
                'score_submit'=>$score_submit,
            ]);
        }
 

        $jenis_pencapaian = $request->jenis_pencapaian;
        $pencapaian_jabatan = $request->pencapaian_jabatan;
        $pencapaian_institusi = $request->pencapaian_institusi;
        $pencapaian_nilai = $request->pencapaian_nilai;
        $pencapaian_durasi = $request->pencapaian_durasi;

        $pencapaian_tahunawal = $request->pencapaian_tahunawal;
        $pencapaian_tahunakhir = $request->pencapaian_tahunakhir;
        $pencapaian_judul = $request->pencapaian_judul;
        $pencapaian_penerbit = $request->pencapaian_penerbit;
        $pencapaian_kualitas = $request->pencapaian_kualitas;
        $pencapaian_jenis = $request->pencapaian_jenis;
        $pencapaian_tahun = $request->pencapaian_tahun;
        $pencapaian_nomor = $request->pencapaian_nomor;
        $pencapaian_status = $request->pencapaian_status;
        $pencapaian_peringkat = $request->pencapaian_peringkat;
        $pencapaian_organisasi = $request->pencapaian_organisasi;
        $pencapaian_tingkat = $request->pencapaian_tingkat;

        
        for($i=0; $i<count($jenis_pencapaian); $i++){
            if($jenis_pencapaian[$i] == "proyek"){
                $score = $this->scoreProyek($pencapaian_jabatan[$i],$pencapaian_nilai[$i],$pencapaian_durasi[$i]);
                $score_submit = (string)$score;
            }
            elseif ($jenis_pencapaian[$i] == "publikasi") {
                $score_submit = $this->scorePublikasi($pencapaian_kualitas[$i]);
            }
            elseif ($jenis_pencapaian[$i] == "haki") {
                $score_submit = $this->scoreHaki($pencapaian_jenis[$i],$pencapaian_status[$i]);
            }
            elseif ($jenis_pencapaian[$i] == "penghargaan") {
                $score_submit = "0";
            }
            elseif ($jenis_pencapaian[$i] == "pengabdian") {
                $score_submit = "0";
            }
            elseif ($jenis_pencapaian[$i] == "pelatihan") {
                $score = $this->scorePelatihan($pencapaian_jenis[$i],$pencapaian_tingkat[$i],$pencapaian_durasi[$i]);
                $score_submit = (string)$score;
            }
            else {
                $score_submit="0";
            }
            CertifiedPencapaian::create([
                'certified_member_id'=>$id,
                'jenis_pencapaian'=>$jenis_pencapaian[$i],
                'jabatan'=>$pencapaian_jabatan[$i],
                'institusi'=>$pencapaian_institusi[$i],
                'tahun'=>$pencapaian_tahun[$i],
                'durasi'=>$pencapaian_durasi[$i],
                'nilai'=>$pencapaian_nilai[$i],
                'judul'=>$pencapaian_judul[$i],
                'penerbit'=>$pencapaian_penerbit[$i],
                'jenis'=>$pencapaian_jenis[$i],
                'kualitas'=>$pencapaian_kualitas[$i],
                'nomor'=>$pencapaian_nomor[$i],
                'status'=>$pencapaian_status[$i],
                'peringkat'=>$pencapaian_peringkat[$i],
                'nama_organisasi'=>$pencapaian_organisasi[$i],
                'tingkat'=>$pencapaian_tingkat[$i],
                'score_submit'=>$score_submit,
            ]);
        }

        
        // dd(auth('certified')->user()->nama,$request->alamat,$request->telp);
        // $namaImg=explode(".",$request->file('foto')->getClientOriginalName());
        // $imageName = time().'_'.$namaImg[0] . '.' . $request->file('foto')->extension();
        // $request->file('foto')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return back();
    }

    public function fileUpload(){
        $upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->get();
        $sertifikat= array();
        foreach($upload as $data){
            $nama= $data->upload_deskripsi;
            $nama = explode("_",$data->upload_deskripsi);
            if ($nama[0]=="sertifikat") {
                $sertifikat[]=$data->upload_deskripsi;

            }
        }
        // dd($upload);
        return view('certified.fileupload.index',compact('upload','sertifikat'));
    }

    public function ktp(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $imageName = 'KTP_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        $update_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
        $update_data->update([
            'ktp' => $imageName,
        ]);

    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return response()->json($imageName, 200);
        
    }

    public function getNotive(){
        $notive = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->get();
        $jml_notive = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->where('status','1')->count();
        
        $notive_response= [
            'jml_notive'=>$jml_notive,
            'data'=>$notive
        ];

        return response()->json($notive_response);
    }

    public function uploadCv(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $imageName = 'CV_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
        $insert_data->update([
            'certified_cv' => $imageName,
        ]);
    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return response()->json($request->indikator, 200);
        
    }

    public function uploadFoto(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,psd,pdf,ai|max:2048'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $imageName = 'Foto_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
        $insert_data->update([
            'foto' => $imageName,
        ]);
    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return response()->json($request->indikator, 200);
        
    }

    public function uploadIjazah(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $imageName = time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
        $insert_data->update([
            'ktp' => $imageName,
        ]);

        
    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return response()->json($imageName, 200);
        
    }

    public function uploadDocument(Request $request){
        // dd($request);
        $pesan = $request->upload_deskripsi.auth('certified')->user()->nama."berhasil di upload";
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:doc,docx,ppt,pptx,txt,pdf|max:10040'
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors()->first('file'), 400);
        }
        
        $completeFileName = explode(".",$request->file('file')->getClientOriginalName());
        $documentName = $request->upload_deskripsi.'_'.time().'_'.$completeFileName[0] . '.' . $request->file('file')->extension();

        CertifiedUpload::create([
            'certified_member_id'=>auth('certified')->user()->id,
            'upload_deskripsi'=>$request->upload_deskripsi,
            'file_name'=>$documentName
        ]);
    
        $request->file('file')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $documentName);
        
        return response()->json($documentName, 200);
    }

    public function certifiedView(){
        $datacertified = CertifiedMember::orderByDesc('created_at')->get();
        return view('admin.certified.index', compact('datacertified'));
    }

    public function viewUser($id){
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();
        $ujian = CertifiedUjian::where('certified_member_id',$id)->first();
        $wawancara = CertifiedWawancara::where('certified_member_id',$id)->first();
        // dd($datauser);
        $nilai = 0;
        
        foreach ($pendidikan as $nilai_pendidikan){
            
            $nilai = $nilai + (int)$nilai_pendidikan->score_verified;
        }

        foreach ($pengalaman as $nilai_pengalaman){
            
            $nilai = $nilai + (int)$nilai_pengalaman->score_verified;
        }
        foreach ($pelatihan as $nilai_pelatihan){
            
            $nilai = $nilai + (int)$nilai_pelatihan->score_verified;
        }

        foreach ($pencapaian as $nilai_pencapaian){
            
            $nilai = $nilai + (int)$nilai_pencapaian->score_verified;
        }

        $score = (string)$nilai;
        return view('admin.certified.userdetail',compact('datauser','pendidikan','pengalaman','pelatihan','pencapaian','upload','status','score','ujian','wawancara'));
    }

    public function downloadZipFile($id){
        $datauser = CertifiedMember::where('id',$id)->first();
        
        $zip = new ZipArchive;
        // dd($datauser->nama);
        $fileName = 'download_'.$datauser->nama.'.zip';
        
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files($this->dir_upload.$datauser->nama);

            foreach ($files as $key => $value){
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function deleteDataMember(Request $request)
    {
        $deskripsi = $request->deskripsi;
        $aksi = explode("_",$deskripsi);
        File::delete($this->dir_upload.auth('certified')->user()->nama.'/'.$deskripsi);
        // dd($this->dir_upload.auth('certified')->user()->nama.'/'.$deskripsi);
        if ($aksi[0] == "CV"){
            $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
            $insert_data->update([
            'certified_cv' => null,
            ]);
            
        }
        if ($aksi[0] == "Foto"){
            $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
            $insert_data->update([
            'foto' => null,
            ]);
            
        }
        if ($aksi[0] == "KTP"){
            $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
            $insert_data->update([
            'ktp' => null,
            ]);
            
        }
       return back();
    }

    public function deleteUpload(Request $request){
        
        $upload_deskripsi = $request->deskripsi;
        
        $delete_upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->where('upload_deskripsi',$upload_deskripsi)->first();
        $delete_upload->delete();
        File::delete($this->dir_upload.auth('certified')->user()->nama.'/'.$delete_upload->file_name);
        // dd($delete_upload->file_name);
        return back();
    }

    public function inputNilai(Request $request){

        $score= (int)$request->nilai;
        if($score >= 2000){
            $insert_data = CertifiedMember::where('id', $request->id);
            $insert_data->update([
            'nilai' => $request->nilai,
            'certified_status' => "4",
            'status'=>"Lolos Verifikasi Dokumen"
            ]);
        }else {
            $insert_data = CertifiedMember::where('id', $request->id);
            $insert_data->update([
            'nilai' => $request->nilai,
            'status'=>"Tidak Lolos Verifikasi Dokument"
            ]);
        }

        return back()->with('update', 'Nilai berhasil dimasukkan'); 
    }

    public function downloadPDF($id){
        // dd($id);
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $ujian = CertifiedUjian::where('certified_member_id',$id)->first();
        $wawancara = CertifiedWawancara::where('certified_member_id',$id)->first();
        $penilaianWawancara = CertifiedPenilaianWawancara::where('certified_member_id',$id)->get();
        $penguji = CertifiedPenilaianWawancara::where('certified_member_id',$id)->groupBy('penguji')->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();
        $time= date("Y-m-d H:i:s", strtotime('now'));
        $waktu = explode(" ",$time);
        $waktu1 = explode("-",$waktu[0]);
        if($waktu1[1]=="01"){
            $bulan = "Januari";
        }elseif($waktu1[1]=="02"){
            $bulan = "Februari";
        }elseif($waktu1[1]=="03"){
            $bulan = "Maret";
        }elseif($waktu1[1]=="04"){
            $bulan = "April";
        }elseif($waktu1[1]=="05"){
            $bulan = "Mei";
        }elseif($waktu1[1]=="06"){
            $bulan = "Juni";
        }elseif($waktu1[1]=="07"){
            $bulan = "Juli";
        }elseif($waktu1[1]=="08"){
            $bulan = "Agustus";
        }elseif($waktu1[1]=="09"){
            $bulan = "September";
        }elseif($waktu1[1]=="10"){
            $bulan = "Oktober";
        }elseif($waktu1[1]=="11"){
            $bulan = "November";
        }elseif($waktu1[1]=="12"){
            $bulan = "Desember";
        }else {
            $bulan = $waktu1[1];
        }
        $tanggal = $waktu1[2]." ".$bulan." ".$waktu1[0]; 

        $jlm_penguji = count($penguji);
        $avr_pendidikan = CertifiedPenilaianWawancara::selectRaw('sum(penilaian_penguji)/count(penilaian_penguji) as summery, id_pendidikan')
            ->where('certified_member_id',$id)
            ->whereNotNull('id_pendidikan')
            ->groupBy('id_pendidikan')
            ->get();
        $avr_pelatihan = CertifiedPenilaianWawancara::selectRaw('sum(penilaian_penguji)/count(penilaian_penguji) as summery, id_pelatihan')
            ->where('certified_member_id',$id)
            ->whereNotNull('id_pelatihan')
            ->groupBy('id_pelatihan')
            ->get();
        $avr_pengalaman = CertifiedPenilaianWawancara::selectRaw('sum(penilaian_penguji)/count(penilaian_penguji) as summery, id_pengalaman')
            ->where('certified_member_id',$id)
            ->whereNotNull('id_pengalaman')
            ->groupBy('id_pengalaman')
            ->get();
        $avr_pencapaian = CertifiedPenilaianWawancara::selectRaw('sum(penilaian_penguji)/count(penilaian_penguji) as summery, id_pencapaian')
            ->where('certified_member_id',$id)
            ->whereNotNull('id_pencapaian')
            ->groupBy('id_pencapaian')
            ->get();

                        
        $pdf = PDF::loadView('certified.dataPDF',compact('datauser','avr_pendidikan','avr_pelatihan','avr_pengalaman','avr_pencapaian','penilaianWawancara','penguji','tanggal','ujian','wawancara','pendidikan','pelatihan','pengalaman','pencapaian','upload','jlm_penguji','status'));

        return $pdf->download($datauser->nama.'.pdf');
    }

    public function updateScorePendidikan(Request $request){
        
        $jam = 48;

        if($request->jenjang == "s1"){
            $bobot = 0.25;
        }elseif($request->jenjang == "s2"){
            $bobot = 0.5;
        }elseif($request->jenjang == "s3"){
            $bobot = 0.85;
        }else {
            $bobot = 0.2;
        }

        $score = $request->sks * $jam * $bobot;
        $score_verified = (string) $score;

        $updateScore = CertifiedPendidikan:: where('id', $request->id);
        $updateScore->update([
            'score_verified'=>$score_verified,
        ]);

        return back();
        // dd($score_verified);
    }

    public function updateScorePelatihan(Request $request){
        $bobot = 0.5;

        $score = $request->durasi * $bobot;
        $score_verified = (string) $score;

        $updateScore = CertifiedPelatihan:: where('id', $request->id);
        $updateScore->update([
            'score_verified'=>$score_verified,
        ]);
        return back();
    }
    public function updateScorePengalaman(Request $request){

        $score_verified = $request->score_submit;
        // dd($request);

        $updateScore = CertifiedPengalaman:: where('id', $request->id);
        $updateScore->update([
            'score_verified'=>$score_verified,
        ]);
        return back();
    }

    public function updateScorePencapaian(Request $request){
        $score_verified = $request->score_submit;

        $updateScore = CertifiedPencapaian:: where('id', $request->id);
        $updateScore->update([
            'score_verified'=>$score_verified,
        ]);
        return back();

    }

    public function homeDashboard(){
        return view('certified.dashboard.home');
    }

    public function  uploadUser(){

        $upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->get();
        $sertifikat= array();
        $cek_upload = array();
        foreach($upload as $data){

            $nama= $data->upload_deskripsi;            
            $nama = explode("_",$data->upload_deskripsi);
            if ($nama[0]=="sertifikat") {
                $sertifikat[]=$data->upload_deskripsi;
            }
            $cek_upload[] = $data->upload_deskripsi;
        }
        if (auth('certified')->user()->ktp !=NULL && auth('certified')->user()->certified_cv != NULL) {
            
            if (count($cek_upload)<=1){
               
                if (auth('certified')->user()->certified_status >= 4 ) {
                    $a="aas";
                } else {
                    $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                    $insert_data->update([
                    'certified_status' => "2",
                    ]);
                }

            }else {
                $hitung = 0;
                foreach($cek_upload as $item){
                    if ($item == "surat_permohonan") {
                       $hitung++;
                    }elseif($item == "surat_kepatuhan"){
                        $hitung++;
                    }elseif($item == "ijazah"){
                        $hitung++;
                    }elseif($item == "transkrip"){
                        $hitung++;
                    }elseif($item == "pernyataan"){
                        $hitung++;
                    }else{
                        $hitung;
                    }
                }
                
                if ($hitung >= 2) {
                    
                    if (auth('certified')->user()->certified_status >= 4 ) {
                        $a="aas";
                    } else {
                        $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                        $insert_data->update([
                        'certified_status' => "3",
                        ]);
                    }
                    
                } else {
                    if (auth('certified')->user()->certified_status >= 4 ) {
                        $a="aas";
                    } else {
                        $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                        $insert_data->update([
                        'certified_status' => "2",
                        ]);
                    }
                    
                }
            }
        }
        // dd($cek_upload);
        return view('certified.dashboard.upload',compact('upload','sertifikat'));
    }

    public function downloadUser(){
        return view('certified.dashboard.downloadFile');
    }

    public function profilUser(){
        $notive = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->get();
        $pendidikan = CertifiedPendidikan::where('certified_member_id', auth('certified')->user()->id)->get();
        
        $pengalaman = CertifiedPengalaman::where('certified_member_id',auth('certified')->user()->id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id', auth('certified')->user()->id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id', auth('certified')->user()->id)->get();
        $upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->get();
        $wawancara = CertifiedWawancara::where('certified_member_id',auth('certified')->user()->id)->get();
        return view('certified.dashboard.profilUser',compact('pendidikan','pengalaman','pencapaian','pelatihan','upload','notive','wawancara'));
    }

    public function sendEmail(){
        $email_send = CertifiedInformation::where('id',52)->first();
        $isi = $email_send->body;
        $subject = $email_send->title;
        $alamat_email="fendyasnanda@gmail.com";        
        Mail::to($alamat_email)->send(new SendEmail($subject,$isi));
        return 'Berhasil Mengirim Email';

    }

    public function insertSendEmail(Request $request){
        // dd($request);
        $isi = $request->pesan;
        $subject = "Pesan dari ".$request->nama;
        $alamat_email = "lspptpi@gmail.com";
        Mail::to($alamat_email)->send(new SendEmail($subject,$isi));

        return back();
    }

    public function verifikasiScore(Request $request) {
        // dd($request);
        if($request->aksi == "pengalaman"){
            $update_data = CertifiedPengalaman::where('id', $request->id);
            $update_data->update([
            'score_verified' => $request->data_score,
            ]);
            return response()->json($request->id . $request->data_score . $request->aksi , 200);

        }elseif($request->aksi == "pelatihan"){
            $update_data = CertifiedPelatihan::where('id', $request->id);
            $update_data->update([
            'score_verified' => $request->data_score,
            ]);
            return response()->json( $request->id . $request->data_score . $request->aksi, 200);

        }elseif($request->aksi == "pencapaian"){
            $update_data = CertifiedPencapaian::where('id', $request->id);
            $update_data->update([
            'score_verified' => $request->data_score,
            ]);
            return response()->json($request->id . $request->data_score . $request->aksi, 200);

        }else {
            return response()->json("tidak terupdate", 200);
        }

        // return response()->json("masuk", 200);
    }

    public function pilihJadwalUjian(){
        // dd(auth('certified')->user()->id);
        $pilihanJadwals = CertifiedInformation::where('certified_member_id',auth('certified')->user()->id)->where('title','Konfirmasi Ujian')->first();
        // dd($pilihanJadwals);
        return view('certified.dashboard.pilihJadwalUjian',compact('pilihanJadwals'));
    }
    
    public function insertJadwalUjian(Request $request){
        // dd($request);
        $data = CertifiedUjian::where('certified_member_id',$request->id)->first();
        $jadwal = explode("_",$request->Konfirmasi_Ujian);
        if ($data != null) {
            // dd("sudah ada ");
            $data->update([
                'konfirmasi_ujian'=>$jadwal[0],
                'jam_ujian'=>$jadwal[1]
            ]);
        } else {
            // dd("belum ada ");
            CertifiedUjian::create([
                'certified_member_id'=>$request->id,
                'konfirmasi_ujian'=>$jadwal[0],
                'jam_ujian'=>$jadwal[1]
            ]);
        }
        return redirect(action('CertifiedMemberController@home'));
    }

    public function konfirmasiUjian(Request $request){
        $data = CertifiedUjian::where('certified_member_id',$request->id)->first();
        $status = CertifiedMember::where('id',$request->id)->first();

        $data->update([
            'tanggal_ujian'=>$request->konfirmasi_ujian,
        ]);

        $status->update([
            'certified_status'=>"7",
        ]);

        return response()->json("Ujian Telah Terkonfirmasi",200);
    }
    public function konfirmasiUjian1(Request $request){
        $data = CertifiedUjian::where('certified_member_id',$request->id)->first();
        $status = CertifiedMember::where('id',$request->id)->first();

        $data->update([
            'tanggal_ujian'=>$request->konfirmasi_ujian,
        ]);

        $status->update([
            'certified_status'=>"7",
        ]);

        return back();
    }

    public function konfirmasiHasilUjian(Request $request){
        $tes = CertifiedMember::where('id',$request->id)->first();
        $ujian = CertifiedUjian::where('certified_member_id',$request->id)->first();
        $nama = $tes->nama;
        $score = $ujian->score_ujian;
        // dd($status->nama);


        if($ujian->score_ujian >= 60){
            $aksi = "Lulus Ujian Tulis";
            $certified_status = "10";

            $title = "LULUS Ujian";
            $status = "1";
            $kategori = "lulus_ujian";
            $body ="<p>Kepada Yth, <strong> ".$nama."</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis. 
            Selamat anda dinyatakan <strong><em>Lulus</em></strong> ke tahap selanjutnya yaitu <strong><em>Wawancara</em></strong>, 
            Detail hasil uji tulis sebagai berikut:</p>
            <p>		Media uji tulis	    : Online</p>
            <p>		Nilai Uji tulis		: ".$score."</p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p>
            <p>Sekian, terimakasih.</p>";

            
            
        }else{
            $aksi = "Tidak Lulus Ujian Tulis";
            $certified_status = "21";

            $title = "Tidak LULUS Ujian";
            $status = "1";
            $kategori = "tidak_lulus_ujian";
            $body  = "<p>Kepada Yth, <strong>".$nama." </strong></p>
            <p>Berdasarkan hasil Ujian Anda, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti :08473274282</p>
            <p>Sekian, terimakasih.</p>";


        }
        CertifiedInformation::create([
            'certified_member_id'=>$request->id,
            'title'=>$title,
            'status'=>$status,
            'kategori'=>$kategori,
            'body'=>$body
        ]);
        
        
        $status = CertifiedMember::where('id',$request->id)->first();
        $status->update([
            'certified_status'=>$certified_status,
            'status'=>$aksi,
        ]);

        return response()->json("Hasil Ujian Telah Terkonfirmasi",200);
    }

    public function konfirmasiHasilUjian1(Request $request){
        // dd($request);
        $tes = CertifiedMember::where('id',$request->id)->first();
        $ujian = CertifiedUjian::where('certified_member_id',$request->id)->first();
        $nama = $tes->nama;
        $score = $ujian->score_ujian;
        // dd($status->nama);


        if($ujian->score_ujian >= 60){
            $aksi = "Lulus Ujian Tulis";
            $certified_status = "10";

            $title = "LULUS Ujian";
            $status = "1";
            $kategori = "lulus_ujian";
            $body ="<p>Kepada Yth, <strong> ".$nama."</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis. 
            Selamat anda dinyatakan <strong><em>Lulus</em></strong> ke tahap selanjutnya yaitu <strong><em>Wawancara</em></strong>, 
            Detail hasil uji tulis sebagai berikut:</p>
            <p>		Media uji tulis	    : Online</p>
            <p>		Nilai Uji tulis		: ".$score."</p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p>
            <p>Sekian, terimakasih.</p>";

            
            
        }else{
            $aksi = "Tidak Lulus Ujian Tulis";
            $certified_status = "21";

            $title = "Tidak LULUS Ujian";
            $status = "1";
            $kategori = "tidak_lulus_ujian";
            $body  = "<p>Kepada Yth, <strong>".$nama." </strong></p>
            <p>Berdasarkan hasil Ujian Anda, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti :08473274282</p>
            <p>Sekian, terimakasih.</p>";


        }
        CertifiedInformation::create([
            'certified_member_id'=>$request->id,
            'title'=>$title,
            'status'=>$status,
            'kategori'=>$kategori,
            'body'=>$body
        ]);
        
        
        $status = CertifiedMember::where('id',$request->id)->first();
        $status->update([
            'certified_status'=>"10",
            'status'=>$aksi,
        ]);
        

        return back();
    }

    public function insertJadwalWawancara(Request $request){
        // dd($request);
        $jadwal = explode("_",$request->Jadwal_Wawancara);
        $data = CertifiedWawancara::where('certified_member_id',$request->id)->first();
        if ($data != null) {
            // dd("sudah ada ");
            $data->update([
                'konfirmasi_wawancara'=>$jadwal[0],                
                'jam_wawancara'=>$jadwal[1]
            ]);
        } else {
            // dd("belum ada ");
            CertifiedWawancara::create([
                'certified_member_id'=>$request->id,
                'konfirmasi_wawancara'=>$jadwal[0],
                'jam_wawancara'=>$jadwal[1]
            ]);
        }

        
        return redirect(action('CertifiedMemberController@home'));
    }

    public function getJadwalWawancara(Request $request){
        $getJadwal = CertifiedWawancara ::where('certified_member_id', $request->id)->first();
        return response()->json($getJadwal,200);
    }

    public function konfirmasiWawancara(Request $request){
        
        $data = CertifiedWawancara::where('certified_member_id',$request->id)->first();
        $status = CertifiedMember::where('id',$request->id)->first();

        $data->update([
            'tanggal_wawancara'=>$request->konfirmasi_wawancara,
        ]);

        $status->update([
            'certified_status'=>"12",
        ]);

        return response()->json($request->konfirmasi_wawancara,200);
    }

    public function konfirmasiWawancara1(Request $request){
        
        $data = CertifiedWawancara::where('certified_member_id',$request->id)->first();
        $status = CertifiedMember::where('id',$request->id)->first();

        $data->update([
            'tanggal_wawancara'=>$request->konfirmasi_wawancara,
        ]);

        $status->update([
            'certified_status'=>"12",
        ]);

        return back();

    }
    public function listPesertaSertifikasi(){
       
        $datacertified = CertifiedMember::orderByDesc('created_at')->get();
        return view('certified.dashboard.admin.listPesertaSertifikasi', compact('datacertified'));
      
    }

    public function listStatusPeserta(){
       
        $datacertified = CertifiedMember::orderByDesc('created_at')->get();
        return view('certified.dashboard.admin.listStatusPeserta', compact('datacertified'));
      
    }

    public function downloadData(){
       
        $datacertified = CertifiedMember::whereIn('certified_status',[3,4,5,6,7,8,9,10,11,12,13,14,15])->orderByDesc('created_at')->get();
        return view('certified.dashboard.admin.downloadData', compact('datacertified'));
      
    }

    public function getStatusPeserta(Request $request){
       
        $data = CertifiedMember::where('certified_status',$request->status)->orderByDesc('created_at')->get();
        // $data = CertifiedMember::orderByDesc('created_at')->get();
        return response()->json($data, 200);
      
    }

    public function getStatusPesertaNotive(Request $request){
       
        $data = CertifiedMember::where('certified_status',$request->status)->get();
        // $data = CertifiedMember::orderByDesc('created_at')->get();
        return response()->json($data, 200);
      
    }

    public function dataProfileUser($id){
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();
        $ujian = CertifiedUjian::where('certified_member_id',$id)->first();
        $wawancara = CertifiedWawancara::where('certified_member_id',$id)->first();
        // dd($datauser);
        $nilai = 0;
        
        foreach ($pendidikan as $nilai_pendidikan){
            
            $nilai = $nilai + (int)$nilai_pendidikan->score_verified;
        }

        foreach ($pengalaman as $nilai_pengalaman){
            
            $nilai = $nilai + (int)$nilai_pengalaman->score_verified;
        }
        foreach ($pelatihan as $nilai_pelatihan){
            
            $nilai = $nilai + (int)$nilai_pelatihan->score_verified;
        }

        foreach ($pencapaian as $nilai_pencapaian){
            
            $nilai = $nilai + (int)$nilai_pencapaian->score_verified;
        }

        $score = (string)$nilai;
        return view('certified.dashboard.admin.dataUser',compact('datauser','pendidikan','pengalaman','pelatihan','pencapaian','upload','status','score','ujian','wawancara'));
    }

    public function dataPesertaUjian(){
       
        $datacertified = CertifiedMember::whereIn('certified_status', [9,10,11,12,13,14])->get();
        // dd($datacertified->id);
        $ujian= CertifiedUjian::get();
        //  dd($ujian);
        return view('certified.dashboard.admin.dataPesertaUjian', compact('datacertified','ujian'));
      
    }

    public function dataJawabanPeserta($id){
        $jawaban= CertifiedJawaban::where('certified_member_id',$id)->get();
        $soal = CertifiedSoal::get();
        //  dd($jawaban);
        return view('certified.dashboard.admin.dataJawabanPeserta', compact('jawaban','soal'));
      
    }

    

    public function listPesertaVerifikasi(){
       
        $datacertified = CertifiedMember::where('certified_status', [3,4])->orderByDesc('created_at')->get();
        return view('certified.dashboard.admin.listPesertaVerifikasi', compact('datacertified'));
      
    }

    public function hasilPesertaVerifikasi(){
       
        $datacertified = CertifiedMember::whereIn('certified_status', [4,5,6,7,8,9,10,11,12,13])->orderByDesc('created_at')->get();
        return view('certified.dashboard.admin.hasilPesertaVerifikasi', compact('datacertified'));
      
    }

    public function dataUserVerifikasi($id){
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();
        $ujian = CertifiedUjian::where('certified_member_id',$id)->first();
        $wawancara = CertifiedWawancara::where('certified_member_id',$id)->first();
        // dd($datauser);
        $nilai = 0;
        
        foreach ($pendidikan as $nilai_pendidikan){
            
            $nilai = $nilai + (int)$nilai_pendidikan->score_verified;
        }

        foreach ($pengalaman as $nilai_pengalaman){
            
            $nilai = $nilai + (int)$nilai_pengalaman->score_verified;
        }
        foreach ($pelatihan as $nilai_pelatihan){
            
            $nilai = $nilai + (int)$nilai_pelatihan->score_verified;
        }

        foreach ($pencapaian as $nilai_pencapaian){
            
            $nilai = $nilai + (int)$nilai_pencapaian->score_verified;
        }

        $score = (string)$nilai;
        return view('certified.dashboard.admin.verifikasiDataUser',compact('datauser','pendidikan','pengalaman','pelatihan','pencapaian','upload','status','score','ujian','wawancara'));
    }

    public function konfirmasiPesertaSertifikasi(){
       
        return view('certified.dashboard.admin.konfirmasiPesertaSertifikasi');
      
    }

    public function getDataKonfirmasi(Request $request){
        
        if($request->status == 5){
            $data = CertifiedMember::whereIn('certified_status',[5,6,7,8,9,10,11,12])->get();
            $upload = CertifiedUpload::get();
            $notive_response= [
                'data'=>$data,
                'upload'=>$upload
            ];
            return response()->json($notive_response, 200);
        }elseif($request->status == 6){
            $data = CertifiedMember::where('certified_status',6)->get();
            $ujian = CertifiedUjian::get();
            $notive_response= [
                'data'=>$data,
                'ujian'=>$ujian
            ];
            return response()->json( $notive_response, 200);
        }elseif($request->status == 9){
            $data = CertifiedUjian::leftJoin('certified_members','certified_members.id','=','certified_ujian.certified_member_id')
                                    ->get();
            
            return response()->json( $data, 200);
        }elseif($request->status == 11){
            $data = CertifiedWawancara::leftJoin('certified_members','certified_members.id','=','certified_wawancara.certified_member_id')
                                    ->get();
            
            return response()->json( $data, 200);
        }else{
            return response()->json("Tidak Ada Data", 200);
        }

        // $data = CertifiedMember::where('certified_status',$request->status)->get();
        // $data = CertifiedMember::orderByDesc('created_at')->get();
        
      
    }

    public function tambahNotivePeserta(){
       
        $datacertified = CertifiedMember::where('role','user')->orderByDesc('created_at')->get();
        $notive = CertifiedInformation::get();
        return view('certified.dashboard.admin.tambahNotivePeserta', compact('datacertified','notive'));
      
    }

    public function dataPesertaWawancara(){
       
        $datas = CertifiedMember::whereIn('certified_status', [12,13,14])->get();
        // dd($datacertified->id);
        $wawancaras= CertifiedWawancara::get();
        //  dd($wawancaras);
        return view('certified.dashboard.admin.dataPesertaWawancara', compact('datas','wawancaras'));
      
    }

    public function viewPenilaianWawancara($id){
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $pelatihan = CertifiedPelatihan::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $wawancara = CertifiedWawancara::where('certified_member_id',$id)->first();
        $pengujiWawancara = CertifiedPenilaianWawancara::where('certified_member_id',$id)->groupBy('penguji')->get();
        $penilaianWawancara = CertifiedPenilaianWawancara::where('certified_member_id',$id)->get();
        
        // dd(count($pengujiWawancara));

        return view('certified.dashboard.admin.viewPenilaianWawancara',compact('datauser','pendidikan','pelatihan','pengalaman','pencapaian','upload','wawancara','pengujiWawancara','penilaianWawancara'));
    }

    public function insertPenilaianWawancara(Request $request){
        // dd($request);

        for($i=0; $i<count($request->id_pendidikan); $i++){
            CertifiedPenilaianWawancara::create([
                'certified_member_id'=>$request->id_user,
                'penguji'=>$request->no_penguji,
                'nama_penguji'=>$request->nama_penguji,
                'id_pendidikan'=>$request->id_pendidikan[$i],
                'penilaian_penguji'=>$request->score_pendidikan[$i],
                'catatan_pendidikan'=>$request->catatan_pendidikan[$i]
            ]);
        }

        for($i=0; $i<count($request->id_pelatihan); $i++){
            CertifiedPenilaianWawancara::create([
                'certified_member_id'=>$request->id_user,
                'penguji'=>$request->no_penguji,
                'nama_penguji'=>$request->nama_penguji,
                'id_pelatihan'=>$request->id_pelatihan[$i],
                'penilaian_penguji'=>$request->score_pelatihan[$i],
                'catatan_pelatihan'=>$request->catatan_pelatihan[$i]
            ]);
        }

        for($i=0; $i<count($request->id_pengalaman); $i++){
            CertifiedPenilaianWawancara::create([
                'certified_member_id'=>$request->id_user,
                'penguji'=>$request->no_penguji,
                'nama_penguji'=>$request->nama_penguji,
                'id_pengalaman'=>$request->id_pengalaman[$i],
                'penilaian_penguji'=>$request->score_pengalaman[$i],
                'catatan_pengalaman'=>$request->catatan_pengalaman[$i]
            ]);
        }

        for($i=0; $i<count($request->id_pencapaian); $i++){
            CertifiedPenilaianWawancara::create([
                'certified_member_id'=>$request->id_user,
                'penguji'=>$request->no_penguji,
                'nama_penguji'=>$request->nama_penguji,
                'id_pencapaian'=>$request->id_pencapaian[$i],
                'penilaian_penguji'=>$request->score_pencapaian[$i],
                'catatan_pencapaian'=>$request->catatan_pencapaian[$i]
            ]);
        }

        $status = CertifiedMember::where('id',$request->id_user)->first();
        if ($status->certified_status < 14 ) {
            $status->update([
                'certified_status'=>"14",
            ]);
        }

        return back();
    }

    public function uploadSuratPerjanjian(){
        $datauser = CertifiedMember::whereIn('certified_status',[4,5,6,7,8,9,10,11,12,13,14])->get();
        $dataupload = CertifiedUpload::where('upload_deskripsi','perjanjian')->get();
        $dataupload_perjanjian = CertifiedUpload::where('upload_deskripsi','perjanjian_konfirmasi')->get();
        // dd($dataupload_perjanjian);

        return view('certified.dashboard.admin.uploadSuratPerjanjian',compact('datauser','dataupload','dataupload_perjanjian'));
    }


}
