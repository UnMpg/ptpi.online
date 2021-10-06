@extends('layouts.dashboard.app')
@section('title-page', 'Update Materi Seminar')
@section('title-header', 'Update Materi Seminar')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('SeminarHefController@update', $materi->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tgl" required autocomplete="off" value="{{ $materi->tgl }}">
                            </div>
                            <div class="form-group">
                                <label>Tipe Seminar</label>
                                <select name="tipe_seminar" value="{{ $materi->tipe_seminar }}" class="form-control">
                                    <option value="hari_pertama">Hari ke-1</option>
                                    <option value="hari_kedua">Hari ke-2</option>
                                    <option value="hari_ketiga">Hari ke-3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sesi Seminar</label>
                                <input type="text" class="form-control" name="sesi" required autocomplete="off" value="{{ $materi->sesi }}">
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="Judul" name="judul" required autocomplete="off" value="{{ $materi->judul }}">
                            </div>
                            <div class="form-group">
                                <label>Pembicara</label>
                                <input type="text" class="form-control" placeholder="Pembicara" name="pembicara" required autocomplete="off" value="{{ $materi->pembicara }}">
                            </div>
                            <div class="form-group">
                                <label>File Materi <small><em>(File harus berekstensi .pdf dengan ukuran maksimal 10 MB)</em></small></label>
                                <div style="display: flex;">
                                    <a href="{{ asset('assets/materihef/' . $materi->file) }}" style="margin-right: 10px;">{{ $materi->file }}</a>
                                    <input type="file" class="form-control file" name="file" value="{{ $materi->file }}">
                                </div>
                                <em><small style="color: red;" class="validate-file"></small></em>
                            </div>
                            <a href="{{ action('SeminarHefController@index') }}" class="btn btn-outline-secondary">
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