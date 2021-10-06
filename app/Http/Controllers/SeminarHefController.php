<?php

namespace App\Http\Controllers;

// use App\Laporan;

use App\SeminarHef;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeminarHefController extends Controller
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

    public function index(Request $request)
    {
        // $materi = SeminarHef::all();
        $search = $request->input('search');

        $materi = SeminarHef::where('pembicara', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.seminar-hef.index', compact('materi'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.laporan.create');
    // }

    public function create()
    {
        return view('admin.seminar-hef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = new SeminarHef();

        $file = $request->file;
        $filename = time() . '.' . $file->extension();
        $request->file->move(public_path('assets/materihef'), $filename);

        $data->file = $filename;
        $data->tgl = $request->tgl;
        $data->tipe_seminar = $request->tipe_seminar;
        $data->sesi = $request->sesi;
        $data->judul = $request->judul;
        $data->pembicara = $request->pembicara;

        $data->save();
        return redirect(action('SeminarHefController@index'))->with('save', '"Materi" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarHef $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = SeminarHef::find($id);
        return view('admin.seminar-hef.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materi = SeminarHef::find($id);
        if ($request->file) {
            $filename = time() . '.' . $request->file('file')->extension();
            $request->file->move(public_path('assets/materihef'), $filename);
            $materi->update([
                'tgl' => $request->tgl,
                'tipe_seminar' => $request->tipe_seminar,
                'sesi' => $request->sesi,
                'judul' => $request->judul,
                'pembicara' => $request->pembicara,
                'file' => $filename
            ]);
        } else {
            $materi->update([
                'tgl' => $request->tgl,
                'tipe_seminar' => $request->tipe_seminar,
                'sesi' => $request->sesi,
                'judul' => $request->judul,
                'pembicara' => $request->pembicara
            ]);
        }
        return redirect(action('SeminarHefController@index'))->with('update', '"Data Seminar" Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanKegiatan  $laporan
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Laporan $laporan)
    // {
    //     $laporan->delete();
    //     return redirect(action('LaporanController@index'))->with('delete', '"Data Laporan" Berhasil Dihapus');
    // }

    public function destroy($id)
    {
        $materi = SeminarHef::find($id);
        $materi->delete();
        return redirect(action('SeminarHefController@index'))->with('delete', '"Data Seminar" Berhasil Dihapus');
    }
}
