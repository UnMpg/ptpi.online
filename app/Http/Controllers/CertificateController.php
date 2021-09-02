<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminars = Certificate::all();
        return view('admin.seminar.index', compact('seminars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.seminar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Certificate::create($data);
        return redirect(action('CertificateController@index'))->with('save', '"Tema Sertifikat" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $seminar
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $seminar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $seminar
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $seminar)
    {
        return view('admin.seminar.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $seminar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $seminar)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        $seminar->update($data);
        return redirect(action('CertificateController@index'))->with('update', '"Tema Sertifikat" Berhasil Diperbarui');
    }

    public function updateTema(Request $request)
    {
        if ($request->status) {
            Certificate::find($request->seminar_id)->update(['status' => true]);
        } else {
            Certificate::find($request->seminar_id)->update(['status' => false]);
        }
        return back();
    }

    public function updateActive(Request $request)
    {
        if ($request->active) {
            Certificate::find($request->seminar_id)->update(['active' => true]);
        } else {
            Certificate::find($request->seminar_id)->update(['active' => false]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $seminar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $seminar)
    {
        $seminar->delete();
        return redirect(action('CertificateController@index'))->with('delete', '"Tema Sertifikat" Berhasil Dihapus');
    }
}
