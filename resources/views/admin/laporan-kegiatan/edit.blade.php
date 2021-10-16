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
                    <form role="form" action="{{ action('LaporanKegiatanController@update', $laporan->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control" placeholder="Tanggal Pengeluaran" name="tgl" required autocomplete="off" value="{{ $laporan->tgl }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Laporan</label>
                                <input type="text" class="form-control" placeholder="Nama Laporan" name="name" required autocomplete="off" value="{{ $laporan->name }}">
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <input type="text" class="form-control" placeholder="Detail Laporan" name="details" required autocomplete="off" value="{{ $laporan->details }}">
                            </div>
                            <div class="form-group">
                                <!-- <label>Kategori Laporan</label> -->
                                <input type="hidden" class="form-control" name="kategori" value="{{ $laporan->kategori }}" placeholder="Kegiatan">
                            </div>
                            <div class="form-group">
                                <label>File Laporan <small><em>(File harus berekstensi .pdf dengan ukuran maksimal 2 MB)</em></small></label>
                                <div style="display: flex;">
                                    <a href="{{ asset('assets/file/' . $laporan->file) }}" style="margin-right: 10px;">{{ $laporan->file }}</a>
                                    <input type="file" class="form-control file" name="file" value="{{ $laporan->file }}">
                                </div>
                                <em><small style="color: red;" class="validate-file"></small></em>
                            </div>
                            <a href="{{ action('LaporanKegiatanController@index') }}" class="btn btn-outline-secondary">
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