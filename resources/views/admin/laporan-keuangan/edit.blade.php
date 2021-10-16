@extends('layouts.dashboard.app')
@section('title-page', 'Update Laporan Keuangan')
@section('title-header', 'Update Laporan Keuangan')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('LaporanController@update', $laporan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Pengeluaran</label>
                                <input type="date" class="form-control" placeholder="Tanggal Pengeluaran" name="tgl" required autocomplete="off" value="{{ $laporan->tgl }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Pengeluaran</label>
                                <input type="text" class="form-control" placeholder="Jenis Pengeluaran" name="jenis" required autocomplete="off" value="{{ $laporan->jenis }}">
                            </div>
                            <div class="form-group">
                                <label>Detail Pengeluaran</label>
                                <input type="text" class="form-control" placeholder="Detail Laporan" name="details" required autocomplete="off" value="{{ $laporan->details }}">
                            </div>
                            <div class="form-group">
                                <label>Nominal Pengeluaran</label>
                                <input type="number" class="form-control" placeholder="Contoh: 10000 - adalah sepuluh ribu rupiah" name="nominal" required autocomplete="off" value="{{ $laporan->nominal }}">
                            </div>
                            <div class="form-group">
                                <label>Pembayaran Via</label>
                                <input type="text" class="form-control" placeholder="Pembayaran Via" name="pembayaran_via" required autocomplete="off" value="{{ $laporan->pembayaran_via }}">
                            </div>
                            <div class="form-group">
                                <label>Tipe Laporan</label>
                                <select name="tipe_laporan" class="form-control" value="{{ $laporan->tipe_laporan }}">
                                    <option value="{{ $laporan->tipe_laporan }}">{{ $laporan->tipe_laporan }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- <label>Kategori Laporan</label> -->
                                <input type="hidden" class="form-control" name="kategori" value="{{ $laporan->kategori }}" placeholder="Keuangan">
                            </div>
                            <a href="{{ action('LaporanController@index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-outline-primary">
                                Submit
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
@endsection