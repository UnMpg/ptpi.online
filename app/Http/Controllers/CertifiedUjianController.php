<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;

use App\CertifiedSoal;

class CertifiedUjianController extends Controller
{

    public function index(){
        return view('certified.ujian.index');
    }

    public function inputSoal(){
        $dataSoals = CertifiedSoal::get();
        return view('certified.ujian.inputSoal',compact('dataSoals'));
    }

    public function insertSoal(Request $request){
        // dd($request);

        CertifiedSoal::create([
            'soal'=>$request->soal,
            'a'=>$request->a,
            'b'=>$request->b,
            'c'=>$request->c,
            'd'=>$request->d,
            'e'=>$request->e,
            'key'=>$request->key
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

        $update_soal = CertifiedSoal::where('id', $request->id);
        $update_soal->update([
        'soal' => $request->soal,
        'a'=>$request->a,
        'b'=>$request->b,
        'c'=>$request->c,
        'd'=>$request->d,
        'e'=>$request->e,
        'key'=>$request->key,
        ]);

        return back()->with('update','Soal Berhasil Diedit');

    }

    public function actionLogin(Request $request){
        dd($request);
    }
}
