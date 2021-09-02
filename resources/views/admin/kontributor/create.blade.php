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
                    <form role="form" action="{{ action('UserController@storeKontributorSehatRI') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kontribusi</label>
                                <input type="date" class="form-control {{ $errors->first('tgl_kontribusi') ? 'is-invalid' : '' }}"
                                    placeholder="Tanggal Kontribusi" name="tgl_kontribusi" required>
                                @if ($errors->has('tgl_kontribusi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl_kontribusi') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Kontributor</label>
                                <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
                                    placeholder="Nama Kontributor" name="nama" required>
                                @if ($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
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
