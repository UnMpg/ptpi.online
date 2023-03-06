<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use Excel;
use App\CertifiedSoal;
use App\CertifiedUjian;
use App\CertifiedJawaban;
use App\CertifiedMember;
use App\Imports\ImportSoal;

class CertifiedUjianController extends Controller
{

    public function index(){
        return view('certified.ujian.index');
    }

    public function inputSoal(){
        $dataSoals = CertifiedSoal::get();
        return view('certified.ujian.inputSoal',compact('dataSoals'));
    }

    public function sertifikasiInputSoal(){
        $dataSoals = CertifiedSoal::get();
        return view('certified.ujian.sertifikasiInputSoal',compact('dataSoals'));
    }

    public function insertSoal(Request $request){
        // dd($request->key);
        $isi = $request->key;
        // dd($request->$isi);

        CertifiedSoal::create([
            'kategori'=>$request->kategori,
            'soal'=>$request->soal,
            'a'=>$request->a,
            'b'=>$request->b,
            'c'=>$request->c,
            'd'=>$request->d,
            // 'e'=>$request->e,
            'key'=>$request->$isi
        ]);

        return back()->with('save','Soal Berhasil Dimasukkan');
    }

    public function editSoal($id){
        // echo "saoal";

        $notive = CertifiedSoal::where('id',$id)->first();
        return response()->json($notive);
    }

    public function updateSoal(Request $request){
        // dd($request);
        $isi = $request->key;

        $update_soal = CertifiedSoal::where('id', $request->id);
        $update_soal->update([
        'soal' => $request->soal,
        'a'=>$request->a,
        'b'=>$request->b,
        'c'=>$request->c,
        'd'=>$request->d,
        // 'e'=>$request->e,
        'key'=>$request->$isi,
        ]);

        return back()->with('update','Soal Berhasil Diedit');

    }

    public function deleteSoal($id){
        
        // dd($id);
        $deleteSoal= CertifiedSoal::where('id',$id)->first();
        $deleteSoal->delete();

        return back()->with('delete','Soal Berhasil Delete');
        
    }

    public function actionLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');

        // dd($credentials);

        if (auth('certified')->attempt($credentials)) {
            // $request->session()->regenerate(); 
            // dd($credentials);
            
            return redirect(action('CertifiedUjianController@ujian'));
            
        }
        return back()->with('warning', 'Email or Password Anda Salah');
    }

    public function ketentuan(){
        $time= date("Y-m-d H:i:s", strtotime('now'));
        $waktu = explode(" ",$time);        
        $gettime = CertifiedUjian:: where('certified_member_id', auth('certified')->user()->id)->first();

        if($gettime == null){
            return redirect(action('CertifiedUjianController@index'))->with('warning', 'Jadwal Ujian Anda Belum Terverifikasi Silahkan Hubungi Panitia');
        }
    
        if($gettime->tanggal_ujian == $waktu[0]){


            $gettime->update([
                'akses_ujian'=>$waktu[1],
            ]);
            $dateTime = strtotime('+3 minutes');
            $getDateTime = date("Y-m-d H:i:s", $dateTime); 
            return view('certified.ujian.ketentuan',compact('getDateTime'));

        }else{

            return redirect(action('CertifiedUjianController@index'))->with('warning', 'Bukan Jadwal Ujian Anda');
        }
        
    }

    public function ujian(){
        $time= date("Y-m-d H:i:s", strtotime('now'));
        $waktu = explode(" ",$time);
        $gettime = CertifiedUjian:: where('certified_member_id', auth('certified')->user()->id)->first();

        
        if($gettime == null){
            return redirect(action('CertifiedUjianController@index'))->with('warning', 'Jadwal Ujian Anda Belum Terkonfirmasi Silahkan Hubungi Panitia');
            
        }

        if($gettime->score_ujian != null && $gettime->lama_ujian != null){
            return redirect(action('CertifiedUjianController@index'))->with('warning', 'Terimas Kasih Anda Telah Melakukan Ujian');
            
        }

        if($gettime->tanggal_ujian == $waktu[0]){
            
            if($gettime->waktu_ujian == null && $gettime->akses_ujian != null){
                $gruopSoal = CertifiedSoal::groupBy('kategori')->get();
                
                $items = "";
                foreach($gruopSoal as $group) {
                    $Soals = CertifiedSoal::where('kategori',$group->kategori)->inRandomOrder()->limit(10)->get();
    
                    foreach($Soals as $idSoal) {
                    $items .= $idSoal->id.",";
                    }
                    
                }
                // if (auth('certified')->user()->id == 14) {
                //     $items = "1,2,3,4,5,6,7,8,9,10,49,50,51,52,53,54,55,56,57,58,99,100,101,102,103,104,105,106,107,108,155,156,157,158,160,161,162,163,164,166,167,168,169,170,171,172,173,174,175,177,178,179,180,181,182,183,184,185,186,234,235,236,237,238,239,240,241,242,243,245,246,247,248,249,250,251,252,253,254,256,257,258,259,260,261,262,263,264,265,267,268,269,270,271,272,273,274,275,276,277,";
                // }
                // dd($items);
    
                $mulaiUjian = CertifiedUjian:: where('id', $gettime->id);
                $mulaiUjian->update([
                    'waktu_ujian'=>$waktu[1],
                    'paket_soal'=>$items,
                ]);
                $awal = strtotime('now');
                $jarak = $awal + 7200;
                $countdown = date("Y-m-d H:i:s", $jarak);

                $status = CertifiedMember::where('id',auth('certified')->user()->id)->first();
                $status->update([
                    'certified_status'=>"8"
                ]);
    
                // dd(date("Y-m-d H:i:s", $countdown));
                // $getSoals = CertifiedSoal::get();
                $random= explode(",",$items);
                $getSoals = CertifiedSoal::whereIn('id',$random)->get();
                $jawaban = CertifiedJawaban::where('certified_member_id', auth('certified')->user()->id)->get();
                return view('certified.ujian.ujian',compact('countdown','getSoals','jawaban'));

    
            }else if($gettime->waktu_ujian == null && $gettime->akses_ujian == null){
                $gettime->update([
                    'akses_ujian'=>$waktu[1],
                ]);
                $dateTime = strtotime('+3 minutes');
                $getDateTime = date("Y-m-d H:i:s", $dateTime); 
                return view('certified.ujian.ketentuan',compact('getDateTime'));
            }
            
            else{
                if (auth('certified')->user()->certified_status == '9') {
                    return view('certified.ujian.penutup');
                }
                $soal_id= explode(",",$gettime->paket_soal);
                $getSoals = CertifiedSoal::whereIn('id',$soal_id)->get();
                // dd($getSoals);
                $awal = strtotime($gettime->waktu_ujian);
                $jarak = $awal + 7200;
                $countdown = date("Y-m-d H:i:s", $jarak);
                $jawaban = CertifiedJawaban::where('certified_member_id', auth('certified')->user()->id)->get();
                return view('certified.ujian.ujian',compact('countdown','getSoals','jawaban'));
    
            }
            
        }
        else{
            return redirect(action('CertifiedUjianController@index'))->with('warning', 'Bukan Jadwal Ujian Anda');
        }

        
        // dd($gettime->score_ujian);
       
    }

    public function simpanJawaban(Request $request){

        $cekJawaban = CertifiedJawaban ::where('certified_member_id', auth('certified')->user()->id)->where('soal_id',$request->soal_id)->first();
        $cekKeySoal = CertifiedSoal::where('id',$request->soal_id)->first();
        if ($cekJawaban != null){
            
            if($cekKeySoal->key == $request->jawaban){
                // $update_jawaban = CertifiedJawaban::where('id', $cekJawaban->id);
                $cekJawaban->update([
                    'soal_key' => $cekKeySoal->key,
                    'jawaban' => $request->jawaban,
                    'hasil'=>"1",
                ]);
                return response()->json( "update",200);
            }else{
                $cekJawaban->update([
                    'soal_key' => $cekKeySoal->key,
                    'jawaban' => $request->jawaban,
                    'hasil'=>"0",
                ]);
                return response()->json("update",200);
            }
            
        }else{

            if($cekKeySoal->key == $request->jawaban){
                $inputJawaban = CertifiedJawaban::create([
                    'certified_member_id'=>auth('certified')->user()->id,
                    'soal_id'=>$request->soal_id,
                    'soal_key'=>$cekKeySoal->key,
                    'jawaban'=>$request->jawaban,
                    'hasil'=>"1" 
                ]);
                return response()->json("input",200);
            }else{
                CertifiedJawaban::create([
                    'certified_member_id'=>auth('certified')->user()->id,
                    'soal_id'=>$request->soal_id,
                    'soal_key'=>$cekKeySoal->key,
                    'jawaban'=>$request->jawaban,
                    'hasil'=>"0",
                ]);
                return response()->json("input",200);
            }
           
        }
        
    }

    public function getJadwalUjian(Request $request){
        $getJadwal = CertifiedUjian ::where('certified_member_id', $request->id)->first();
        return response()->json($getJadwal->tanggal_ujian,200);
    }

    public function selesaiUjian(){
        $time= date("Y-m-d H:i:s", strtotime('now'));
        $jamSelesai = explode(" ",$time);
        $ujian= CertifiedUjian::where('certified_member_id', auth('certified')->user()->id)->first();
        $score = CertifiedJawaban::where('certified_member_id', auth('certified')->user()->id)->where('hasil','1')->count();
        
        // dd($ujian->score_ujian);
        $waktuAkhir = explode(":",$jamSelesai[1]);
        $waktuAwal = explode(":",$ujian->waktu_ujian);
        $detik = (int)$waktuAkhir[2]-(int)$waktuAwal[2];
        $menit = (int)$waktuAkhir[1]-(int)$waktuAwal[1];
        if($menit < 0){
            $menit = ((int)$waktuAkhir[1]+60)-(int)$waktuAwal[1];
            $jam = ((int)$waktuAkhir[0]-1)-(int)$waktuAwal[0];
        }else{
            $jam = (int)$waktuAkhir[0]-(int)$waktuAwal[0];
        }
         
        $lama_ujian =  $jam.":".$menit;
        // dd($lama_ujian);
        // dd($score ."=". $waktuAwal ."=". $lama_ujian);

        $ujian->update([
            'score_ujian'=>$score,
            'jam_selesai'=>$jamSelesai[1],
            'lama_ujian'=>$lama_ujian,
        ]);

        $status = CertifiedMember::where('id',auth('certified')->user()->id)->first();
        $status->update([
            'certified_status'=>"9"
        ]);

        return redirect('/sertifikasi/ujian/penutup');
    }

    public function penutup(){
        return view('certified.ujian.penutup');
    }

    public function importSoal(Request $request)
    {
        
        Excel::import(new ImportSoal(), \public_path('/assets/certified/file/data soal LSP.xlsx'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
