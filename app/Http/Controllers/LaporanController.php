<?php

namespace App\Http\Controllers;

// use App\Laporan;
use App\LaporanKeuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
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
        $saldo = \DB::table('laporan_saldo')->first()->saldo;
        $date = null;
        $tipe_laporan = null;
        $kategori = null;
        $initialDate = now();
        $laporan = LaporanKeuangan::whereYear('tgl', $initialDate->format('Y'));

        if ($request->date) {
            $date = Carbon::parse($request->date);
            $laporan = LaporanKeuangan::whereMonth('tgl', $date->month);
        }

        if ($request->tipe_laporan) {
            $laporan = $laporan->where('tipe_laporan', $request->tipe_laporan);
            $tipe_laporan = $request->tipe_laporan;
        }

        if ($request->kategori) {
            $laporan = $laporan->where('kategori', $request->kategori);
            $kategori = $request->kategori;
        }

        $laporan = $laporan->get();

        return view('admin.laporan-keuangan.index', compact('laporan', 'date', 'tipe_laporan', 'saldo', 'kategori'));
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
        return view('admin.laporan-keuangan.create');
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
        LaporanKeuangan::create($request->all());
        return redirect(action('LaporanController@index'))->with('save', '"Data Laporan" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanKeuangan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKeuangan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanKeuangan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = LaporanKeuangan::find($id);
        return view('admin.laporan-keuangan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanKeuangan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laporan = LaporanKeuangan::find($id);
        $laporan->update([
            'tgl' => $request->tgl,
            'jenis' => $request->jenis,
            'details' => $request->details,
            'nominal' => $request->nominal,
            'pembayaran_via' => $request->pembayaran_via,
            'tipe_laporan' => $request->tipe_laporan,
            'kategori' => $request->kategori
        ]);
        return redirect(action('LaporanController@index'))->with('Update', '"Data Laporan" Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanKeuangan  $laporan
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Laporan $laporan)
    // {
    //     $laporan->delete();
    //     return redirect(action('LaporanController@index'))->with('delete', '"Data Laporan" Berhasil Dihapus');
    // }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::find($id);
        $laporan->delete();
        return redirect(action('LaporanController@index'))->with('delete', '"Data Laporan" Berhasil Dihapus');
    }
}
