<?php

namespace App\Http\Controllers;

use App\Laporan;
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
        $laporan = Laporan::whereYear('tgl', $initialDate->format('Y'));

        if ($request->date) {
            $date = Carbon::parse($request->date);
            $laporan = Laporan::whereMonth('tgl', $date->month);
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

        return view('admin.laporan.index', compact('laporan', 'date', 'tipe_laporan', 'saldo', 'kategori'));
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
    public function create()
    {
        return view('admin.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Laporan::create($request->all());
        return redirect(action('LaporanController@index'))->with('save', '"Data Laporan" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect(action('LaporanController@index'))->with('delete', '"Data Laporan" Berhasil Dihapus');
    }
}
