<?php

namespace App\Http\Controllers;

// use App\Laporan;
use App\LaporanKegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller
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
        $date = null;
        $kategori = null;
        $initialDate = now();
        $laporan = LaporanKegiatan::whereYear('tgl', $initialDate->format('Y'));

        if ($request->date) {
            $date = Carbon::parse($request->date);
            $laporan = LaporanKegiatan::whereMonth('tgl', $date->month);
        }

        if ($request->kategori) {
            $laporan = $laporan->where('kategori', $request->kategori);
            $kategori = $request->kategori;
        }

        $laporan = $laporan->get();

        return view('admin.laporan-kegiatan.index', compact('laporan', 'date', 'kategori'));
    }

    public function updateSaldo(Request $request)
    {
        $saldo = \DB::table('laporan_saldo')->where('id', 1)->update(['saldo' => $request->saldo]);
        if ($saldo) {
            return redirect(action('LaporanController@index'))->with('update', '"Saldo" Berhasil Diperbarui');
        }
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
        return view('admin.laporan-kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     Laporan::create($request->all());
    //     return redirect(action('LaporanController@index'))->with('save', '"Data Laporan" Berhasil Ditambahkan');
    // }

    public function store(Request $request)
    {
        $data = new LaporanKegiatan();

        $file = $request->file;
        $filename = time() . '.' . $file->extension();
        $request->file->move(public_path('assets/file'), $filename);

        $data->file = $filename;
        $data->tgl = $request->tgl;
        $data->name = $request->name;
        $data->details = $request->details;
        $data->kategori = $request->kategori;

        $data->save();
        return redirect(action('LaporanKegiatanController@index'))->with('save', '"Laporan" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKegiatan $laporan)
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
        $laporan = LaporanKegiatan::find($id);
        return view('admin.laporan-kegiatan.edit', compact('laporan'));
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
        $laporan = LaporanKegiatan::find($id);
        if ($request->file) {
            $filename = time() . '.' . $request->file('file')->extension();
            $request->file->move(public_path('assets/file'), $filename);
            $laporan->update([
                'tgl' => $request->tgl,
                'name' => $request->name,
                'details' => $request->details,
                'kategori' => $request->kategori,
                'file' => $filename
            ]);
        } else {
            $laporan->update([
                'tgl' => $request->tgl,
                'name' => $request->name,
                'details' => $request->details,
                'kategori' => $request->kategori
            ]);
        }
        return redirect(action('LaporanKegiatanController@index'))->with('update', '"Data Laporan" Berhasil Diubah');
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
        $laporan = LaporanKegiatan::find($id);
        $laporan->delete();
        return redirect(action('LaporanKegiatanController@index'))->with('delete', '"Data Laporan" Berhasil Dihapus');
    }
}
