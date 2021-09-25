@extends('layouts.dashboard.app')
@section('title-page', 'Profile')
@section('title-header', 'Profile')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('AdminController@updateProfile') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Profile Name</label>
                                <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}" placeholder="Profile Name" name="nama" value="{{ $auth->nama }}" required>
                                @if ($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" placeholder="Email Address" name="email" value="{{ $auth->email }}" required>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password Lama</label>
                                <div class="input-group">
                                    <input id="old_password" type="password" class="form-control {{ $errors->first('old_password') ? 'is-invalid' : '' }} {{ session('old_password') ? 'is-invalid' : '' }}" placeholder="Password" name="old_password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye" id="old_toggle" style="cursor: pointer;" onclick="oldShowHide()"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('old_password') || session('old_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('old_password') }}
                                    {{ session('old_password') }}
                                </div>
                                @endif
                            </div>
                            <hr>
                            <h5>Ganti Password Baru:</h5>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <div class="input-group">
                                    <input id="password-baru" type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye" id="toggle" style="cursor: pointer;" onclick="showHide()"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <div class="input-group">
                                    <input id="repassword" type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password_confirmation" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye" id="retoggle" style="cursor: pointer;" onclick="reShowHide()"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <a href="{{ action('DashboardController@index') }}" class="btn btn-outline-secondary">
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
<script>
    const oldPassword = document.getElementById('old_password');
    const oldToggle = document.getElementById('old_toggle');
    const password = document.getElementById('password-baru');
    const toggle = document.getElementById('toggle');
    const repassword = document.getElementById('repassword');
    const retoggle = document.getElementById('retoggle');

    function oldShowHide() {
        if (oldPassword.type === 'password') {
            oldPassword.setAttribute('type', 'text');
            oldToggle.classList.remove('fa-eye');
            oldToggle.classList.add('fa-eye-slash');
        } else {
            oldPassword.setAttribute('type', 'password');
            oldToggle.classList.remove('fa-eye-slash');
            oldToggle.classList.add('fa-eye');
        }
    }

    function showHide() {
        if (password.type === 'password') {
            password.setAttribute('type', 'text');
            toggle.classList.remove('fa-eye');
            toggle.classList.add('fa-eye-slash');
        } else {
            password.setAttribute('type', 'password');
            toggle.classList.remove('fa-eye-slash');
            toggle.classList.add('fa-eye');
        }
    }

    function reShowHide() {
        if (repassword.type === 'password') {
            repassword.setAttribute('type', 'text');
            retoggle.classList.remove('fa-eye');
            retoggle.classList.add('fa-eye-slash');
        } else {
            repassword.setAttribute('type', 'password');
            retoggle.classList.remove('fa-eye-slash');
            retoggle.classList.add('fa-eye');
        }
    }
</script>
@endsection