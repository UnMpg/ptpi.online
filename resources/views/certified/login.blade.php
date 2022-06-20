@extends('layouts.certified.app')
@section('title', 'Login')
@section('content')
<div class="login-box">
    <div class="login-logo mb-4">
        <img src="{{ asset('assets/auth/img/logo-ptpi.png') }}" alt="" width="75px">
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login</p>
            <div class="mb-3">
                @include('layouts.shared.status')
            </div>
            <form action="{{ action('CertifiedMemberController@loginAction') }}" method="post">
                @csrf
                <div class="input-group mb-0">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3 mt-3">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <!-- <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div> -->
                        <div class="input-group-text">
                            <span class="fas fa-eye" id="toggle" style="cursor: pointer;" onclick="showHide()"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ingat saya
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <br>
            <p class="mb-0">
                <a href="{{ action('CertifiedMemberController@register') }}" class="text-center"> Registration Certified</a>
                <br>
                <a href="/" class="text-center">Kembali ke Home</a>
            </p>
        </div>
    </div>
    <p style="text-align:center; font-size:12px;">Copyright &copy; 2022 Persatuan Teknik Perumahsakitan Indonesia</p>
</div>
<script>
    const password = document.getElementById('password');
    const toggle = document.getElementById('toggle');

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
</script>
@endsection