@extends('layouts.auth.app')
@section('title', 'Option Register')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <p><b>Pendaftaran</b> Event</p>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Pilih Jenis Event Yang Akan Diikuti</p>
            <div class="row">
                <!-- /.col -->
                
                <div class="col-md-12 text-center">
                    <div class="dropdown" >
                        <button class="btn btn-secondary dropdown-toggle" style="width: 85%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Pilih Event
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{action('AuthController@getRegisterParticipant')}}">Webinar Alat Kesehatan Dalam Negeri</a>
                          <a class="dropdown-item" href="{{action('AuthController@getRegisterParticipant')}}">Webinar Energi Ramah Lingkungan</a>
                          <a class="dropdown-item" href="{{action('AuthController@getRegisterParticipant')}}">Seminar Online PTPI</a>
                        </div>
                      </div>
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
<p style="text-align:center; font-size:12px;">Copyright &copy; 2022 Persatuan Teknik Perumahsakitan Indonesia</p>
</div>
<!-- /.register-box -->
@endsection
