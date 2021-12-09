<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
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
        $search = $request->input('search');

        $materi = Materi::where('speaker', 'LIKE', '%' . $search . '%')->paginate(10);
        return view('admin.materi.index', compact('materi'));
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
        return view('admin.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = new Materi();

        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = time() . '.' . $file->extension();
            $request->file->move(public_path('assets/materi_seminar_workshop'), $filename);
            $data->file = $filename;
        }

        $data->date = $request->date;
        $data->category = $request->category;
        $data->title = $request->title;
        $data->speaker = $request->speaker;
        $data->file_url = $request->file_url;

        $data->save();
        return redirect(action('MateriController@index'))->with('save', '"Materi" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $laporan)
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
        $materi = Materi::find($id);
        return view('admin.materi.edit', compact('materi'));
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
        $materi = Materi::find($id);
        if ($request->file) {
            $filename = time() . '.' . $request->file('file')->extension();
            $request->file->move(public_path('assets/materi_seminar_workshop'), $filename);
            $materi->update([
                'date' => $request->date,
                'category' => $request->category,
                'title' => $request->title,
                'speaker' => $request->speaker,
                'file' => $filename
            ]);
        } else {
            $materi->update([
                'date' => $request->date,
                'category' => $request->category,
                'title' => $request->title,
                'file_url' => $request->file_url,
                'speaker' => $request->speaker
            ]);
        }
        return redirect(action('MateriController@index'))->with('update', '"Data Seminar" Berhasil Diubah');
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
        $materi = Materi::find($id);
        $materi->delete();
        return redirect(action('MateriController@index'))->with('delete', '"Data Seminar" Berhasil Dihapus');
    }
}
