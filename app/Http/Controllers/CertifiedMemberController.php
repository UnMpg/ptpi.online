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
use App\Location;
use App\LocationKoordinat;
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

    public function register(){
        $provinsi = LocationKoordinat::orderByDesc('created_at')->get('provinsi');
        $instansi = Location::orderByDesc('created_at')->get();
        // dd($instansi);
        return view('certified.registerm',compact('provinsi','instansi'));
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

    public function registerSubmit(Request $Request){
        
        CertifiedMember::create([
            'nama'=>$Request->nama,
            'email'=>$Request->email,
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

        $insert_data = CertifiedMember::where('id', $request->id);
        $insert_data->update([
        'nilai' => $request->score,
        ]);
        return response()->json($request->score, 200);
    }

    public function uploadBukti(){
        return view('certified.dashboard.uploadBukti');
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

        $insertNotive = CertifiedInformation::create([
            'certified_member_id'=>$request->id,
            'kategori'=>$request->kategori,
            'title'=>$request->title,
            'body'=>$request->body,
            'status'=>"1"
        ]);

        if ($insertNotive) {
            
            return back()->with('success','Notive berhasil ditambahkan');
        }else{
            return back()->with('warning','Notive kosong');
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
        // dd($datauser->certified_status);
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
        return view('admin.certified.userdetail',compact('datauser','pendidikan','pengalaman','pelatihan','pencapaian','upload','status','score'));
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

    public function deleteDataMember($deskripsi)
    {
        
        $aksi = explode("_",$deskripsi);
        File::delete($this->dir_upload.auth('certified')->user()->nama.'/'.$deskripsi);
        // dd($this->dir_upload.auth('certified')->user()->nama.'/'.$deskripsi);
        if ($aksi[0] == "CV"){
            $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
            $insert_data->update([
            'certified_cv' => null,
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

    public function deleteUpload($deskripsi){
        
        $upload_deskripsi = $deskripsi;
        
        $delete_upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->where('upload_deskripsi',$upload_deskripsi)->first();
        $delete_upload->delete();
        File::delete($this->dir_upload.auth('certified')->user()->nama.'/'.$delete_upload->file_name);
        // dd($delete_upload->file_name);
        return back();
    }

    public function inputNilai(Request $request){
        $nilai = CertifiedMember::where('id',$request->id);
        $nilai->update([
            'nilai'=>$request->nilai,
            'certified_status'=>"4",
        ]);
        return back()->with('update', 'Nilai berhasil dimasukkan'); 
    }

    public function downloadPDF($id){
        // dd($id);
        $datauser = CertifiedMember::where('id',$id)->first();

        $pendidikan = CertifiedPendidikan::where('certified_member_id',$id)->get();
        $pengalaman = CertifiedPengalaman::where('certified_member_id',$id)->get();
        $pencapaian = CertifiedPencapaian::where('certified_member_id',$id)->get();
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();

        $pdf = PDF::loadView('certified.dataPDF',compact('datauser','pendidikan','pengalaman','pencapaian','upload','status'));

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
            if (count($cek_upload)<=4){
                $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                $insert_data->update([
                'certified_status' => "2",
                ]);
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
                    }
                }
                if ($hitung >= 4) {
                    $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                    $insert_data->update([
                    'certified_status' => "3",
                    ]);
                } else {
                    $insert_data = CertifiedMember::where('id', auth('certified')->user()->id);
                    $insert_data->update([
                    'certified_status' => "2",
                    ]);
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
        return view('certified.dashboard.profilUser',compact('pendidikan','pengalaman','pencapaian','pelatihan','upload','notive'));
    }

}
