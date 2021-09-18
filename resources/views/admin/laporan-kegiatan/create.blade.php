@extends('layouts.dashboard.app')
@section('title-page', 'New Article')
@section('title-header', 'New Article')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('LaporanKegiatanController@store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control {{ $errors->first('tgl') ? 'is-invalid' : '' }}" placeholder="Tanggal Pengeluaran" name="tgl" required autocomplete="off">
                                @if ($errors->has('tgl'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Laporan</label>
                                <input type="text" class="form-control" placeholder="Nama Laporan" name="name" required autocomplete="off">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <input type="text" class="form-control {{ $errors->first('details') ? 'is-invalid' : '' }}" placeholder="Detail Pengeluaran" name="details" required autocomplete="off">
                                @if ($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label>Kategori Laporan</label> -->
                                <input type="hidden" class="form-control" name="kategori" value="kegiatan" placeholder="Kegiatan">
                                @if ($errors->has('kategori'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kategori') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File Laporan</label>
                                <input type="file" class="form-control" name="file" required autocomplete="off">
                                @if ($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
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