@extends('layouts.dashboard.app')
@section('title-page', 'Update Seminar & WS')
@section('title-header', 'Update Seminar & WS')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('MateriController@update', $materi->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="date"
                                    required autocomplete="off" value="{{ $materi->date }}">
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="Judul" name="title" required
                                    autocomplete="off" value="{{ $materi->title }}">
                            </div>
                            <div class="form-group">
                                <label>Pembicara</label>
                                <input type="text" class="form-control" placeholder="Pembicara" name="speaker"
                                    required autocomplete="off" value="{{ $materi->speaker }}">
                            </div>
                            <div class="form-group">
                                <label>File URL</label>
                                <input type="text" class="form-control" placeholder="File URL" name="file_url"
                                    autocomplete="off" value="{{ $materi->file_url }}">
                            </div>
                            <div class="form-group">
                                <label>File Materi <small><em>(File harus berekstensi .pdf dengan ukuran maksimal 10
                                            MB)</em></small></label>
                                <div style="display: flex;">
                                    <a href="{{ asset('assets/materihef/' . $materi->file) }}"
                                        style="margin-right: 10px;">{{ $materi->file }}</a>
                                    <input type="file" class="form-control file" name="file"
                                        value="{{ $materi->file }}">
                                </div>
                                <em><small style="color: red;" class="validate-file"></small></em>
                            </div>
                            <a href="{{ action('MateriController@index') }}" class="btn btn-outline-secondary">
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
