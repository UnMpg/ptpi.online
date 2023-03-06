{{-- @extends('layouts.certified.login')
@section('title', 'Login')
@section('content')
<div class="login-box">
    <div class="login-logo mb-4">
        <img src="{{ asset('assets/certified/img/lsp.png') }}" alt="" width="75px">
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
@endsection --}}



@extends('layouts.certified.login')
@section('title', 'Login - LSP TPI')
@section('content')

<section class="vh-100 gradient-custom page-form">
    
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-5">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                
                <div class="row text-center pb-2 pb-md-0 mb-md-5 ">
                    <div class="title-form">
                        <a href="{{ action('CertifiedMemberController@index') }}"><img src="{{ asset('assets/certified/img/lsp.png') }}" class="img-title" alt=""></a>
                        <h3 class="text-start">Login <br> LSP TPI</h3>
                    </div>
                </div>

                @if (\Session::has('warning'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>{!! \Session::get('warning') !!} </li>
                        </ul>
                    </div>
                @endif
              
              <form action="{{ action('CertifiedMemberController@loginAction') }}" method="post" >
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-4">
  
                    <div class="form-outline">
                      <input type="text" name="email" id="email" class="form-control form-control-lg"  required="required"/>
                      <label class="form-label" for="Email">Email</label>
                    </div>
  
                  </div>

                  <div class="col-md-12 mb-4">
                    <div class="form-outline">
                      <input type="password" name="password" id="password" class="form-control form-control-lg"  required="required"/>
                      <label class="form-label" for="Password">Password</label>
                    </div>
                  </div>
                </div>
                
  
                
                <div class="row">
                    <div class="col-md-6 ">
                        <div style="display: block">
                            <ul style="list-style-type: none;" >
                                <li ><a href="{{ action('CertifiedMemberController@index') }}">Home</a></li>
                                <li ><a href="{{ action('CertifiedMemberController@register') }}" class="text-center">Register</a></li>
                            </ul>
                            
                            
                        </div>
                        
                        
                    </div>

                    <div class="col-md-6  text-end">
                        <div class="pt-2">
                            <button class="btn btn-primary btn-lg" type="submit" value="Login"> Login </button>
                            {{-- <input class="btn btn-primary btn-lg" type="submit" value="Login" /> --}}
                        </div>
                    </div>
                    
                </div>  
                
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>  
@endsection


