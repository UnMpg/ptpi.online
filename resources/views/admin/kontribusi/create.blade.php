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
                    <form role="form" action="{{ action('UserController@storeKontribusiSehatRI') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Pengeluaran</label>
                                <input type="date" class="form-control {{ $errors->first('tgl_pengeluaran') ? 'is-invalid' : '' }}"
                                    placeholder="Tanggal Pengeluaran" name="tgl_pengeluaran" required>
                                @if ($errors->has('tgl_pengeluaran'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl_pengeluaran') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pengeluaran</label>
                                <input type="text" class="form-control {{ $errors->first('jumlah_pengeluaran') ? 'is-invalid' : '' }}"
                                    placeholder="contoh: Rp 500.000" name="jumlah_pengeluaran" required>
                                @if ($errors->has('jumlah_pengeluaran'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jumlah_pengeluaran') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Keperluan</label>
                                    <textarea name="keperluan" class="form-control" cols="30" rows="4" placeholder="Keperluan"></textarea>
                                @if ($errors->has('keperluan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keperluan') }}
                                </div>
                                @endif
                            </div>
                            <a href="{{ action('UserController@kontribusiSehatRI') }}" class="btn btn-outline-secondary">
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
