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
                    <form role="form" action="{{ action('LaporanController@store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Pengeluaran</label>
                                <input type="date" class="form-control {{ $errors->first('tgl') ? 'is-invalid' : '' }}" placeholder="Tanggal Pengeluaran" name="tgl" required autocomplete="off">
                                @if ($errors->has('tgl'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Jenis Pengeluaran</label>
                                <input type="text" class="form-control {{ $errors->first('jenis') ? 'is-invalid' : '' }}" placeholder="Jenis Pengeluaran" name="jenis" required autocomplete="off">
                                @if ($errors->has('jenis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jenis') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Detail Pengeluaran</label>
                                <input type="text" class="form-control {{ $errors->first('details') ? 'is-invalid' : '' }}" placeholder="Detail Pengeluaran" name="details" required autocomplete="off">
                                @if ($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nominal Pengeluaran</label>
                                <input type="number" class="form-control {{ $errors->first('nominal') ? 'is-invalid' : '' }}" placeholder="Contoh: 10000 - adalah sepuluh ribu rupiah" name="nominal" required autocomplete="off">
                                @if ($errors->has('nominal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nominal') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pembayaran Via</label>
                                <input type="text" class="form-control {{ $errors->first('pembayaran_via') ? 'is-invalid' : '' }}" placeholder="Pembayaran Via" name="pembayaran_via" required autocomplete="off">
                                @if ($errors->has('pembayaran_via'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pembayaran_via') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipe Laporan</label>
                                <select name="tipe_laporan" class="form-control">
                                    <option value="pengeluaran">Pengeluaran</option>
                                    <option value="pemasukan">Pemasukan</option>
                                </select>
                                @if ($errors->has('tipe_laporan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tipe_laporan') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Kategori Laporan</label>
                                <input type="text" class="form-control" name="kategori" value="keuangan" placeholder="Keuangan">
                                <!-- <select name="kategori" class="form-control">
                                    <option value="keuangan">Keuangan</option>
                                    <option value="kegiatan">Kegiatan</option>
                                </select> -->
                                @if ($errors->has('kategori'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kategori') }}
                                </div>
                                @endif
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