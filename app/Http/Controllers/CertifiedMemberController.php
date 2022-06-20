<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CertifiedMember;
use App\CertifiedPencapaian;
use App\CertifiedPendidikan;
use App\CertifiedPengalaman;
use App\CertifiedUpload;
use App\CertifiedStatus;
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

    public function register(){
        return view('certified.register');
    }

    public function registerSubmit(Request $Request){
        CertifiedMember::create([
            'nama'=>$Request->nama,
            'email'=>$Request->email,
            'password'=>Hash::make($Request->password),
            'telp'=>$Request->telp
        ]);
        return back()->with('update', 'Selamat, Anda Berhasil Mendaftarkan Diri Anda');
    }

    public function login(){
        return view('certified.login');
    }

    public function home(){
        // dd(auth('certified')->user());
        return view('certified.dashboard.index');
        
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
        return back()->with('delete', 'Email or Password Salah');
    }

    public function insertData(){
        return view('certified.insert.index');
    }

    public function insertDataAction(Request $request){

        // dd($request);
        $id = auth('certified')->user()->id;
        $tmp_lahir= $request->tmp_lahir;
        $tgl_lahir= $request->tgl_lahir;
        $telp = $request->telp;
        $alamat = $request->alamat;
        
        $pendidikan = $request->pendidikan;
        $universitas = $request->universitas;
        $jurusan = $request->jurusan;

        $jabatan = $request->jabatan;
        $institusi = $request->institusi;
        $lama_bekerja = $request->lama_bekerja;


        $nama_pencapaian = $request->nama_pencapaian;
        $jenis_pencapaian = $request->jenis_pencapaian;
        $lama_pencapaian = $request->lama_pencapaian;
        $nilai_pencapaian = $request->nilai_pencapaian;

        for($i=0; $i<count($pendidikan); $i++){
            CertifiedPengalaman::create([
                'certified_member_id'=>$id,
                'jabatan'=> $jabatan[$i],
                'institusi'=>$institusi[$i],
                'lama_bekerja'=>$lama_bekerja[$i],
            ]);
        }

        for($i=0; $i<count($jabatan); $i++){
            CertifiedPendidikan::create([
                'certified_member_id'=>$id,
                'jenjang'=> $pendidikan[$i],
                'universitas'=>$universitas[$i],
                'jurusan'=>$jurusan[$i],
            ]);
        }

        for($i=0; $i<count($nama_pencapaian); $i++){
            CertifiedPencapaian::create([
                'certified_member_id'=>$id,
                'nama'=> $nama_pencapaian[$i],
                'jenis_pencapaian'=>$jenis_pencapaian[$i],
                'lama'=>$lama_pencapaian[$i],
                'nilai'=>$nilai_pencapaian[$i],
            ]);
        }


        // dd(auth('certified')->user()->nama,$request->alamat,$request->telp);
        $namaImg=explode(".",$request->file('foto')->getClientOriginalName());
        $imageName = time().'_'.$namaImg[0] . '.' . $request->file('foto')->extension();
        $insert_data = CertifiedMember::where('nama', auth('certified')->user()->nama);
        $insert_data->update([
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'foto' => $imageName,
            'status'=> "1",
        ]);
        $request->file('foto')->move(public_path($this->dir_upload.auth('certified')->user()->nama), $imageName);
        
        return back();
    }

    public function fileUpload(){
        $upload = CertifiedUpload::where('certified_member_id',auth('certified')->user()->id)->get();
        // dd($upload);
        return view('certified.fileupload.index',compact('upload'));
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
        $upload = CertifiedUpload::where('certified_member_id',$id)->get();
        $status = CertifiedStatus::where('certified_status', $datauser->certified_status)->first();
        // dd($datauser->certified_status);
        return view('admin.certified.userdetail',compact('datauser','pendidikan','pengalaman','pencapaian','upload','status'));
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
        dd(auth('certified')->user()->id);
    }

    public function inputNilai(Request $request){
        $nilai = CertifiedMember::where('id',$request->id);
        $nilai->update([
            'nilai'=>$request->nilai,
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

        // return $pdf->download($datauser->nama.'.pdf');
    }

}
