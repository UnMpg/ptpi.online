@extends('layouts.auth.app')
@section('title', 'Option Register')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <p><b>Pendaftaran</b> Anggota</p>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Pilih Jenis Pendaftaran</p>
            <div class="row">
                <!-- /.col -->
                <div class="col-6">
                    <a href="{{ action('AuthController@getRegisterPersonal') }}"
                        class="btn btn-block bg-gradient-primary opsi"><span class="fas fa-user" id="personal"></span>
                        Personal</a>
                </div>
                <div class="col-6">
                    <a href="{{ action('AuthController@getRegisterCorporate') }}" type="button"
                        class="btn btn-block bg-gradient-success opsi" id="korporasi"><span
                            class="fas fa-building"></span> Korporasi</a>
                </div>
                {{-- <div class="col-4">
                    <a href="{{ action('AuthController@getRegisterParticipant') }}" type="button"
                class="btn btn-block bg-gradient-success opsi" id="korporasi"><span class="fas fa-users"></span>
                Participant</a>
            </div> --}}
            <!-- /.col -->
        </div>
        <br>
        <a href="/"><span class="fas fa-long-arrow-alt-left"></span> Kembali</a>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
<p style="text-align:center; font-size:12px;">Copyright &copy; 2019 Persatuan Teknik Perumahsakitan Indonesia</p>
</div>
<!-- /.register-box -->
@endsection
