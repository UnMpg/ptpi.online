@extends('layouts.certified.login')
@section('title', 'Login - Ujian LSP TPI')
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
                        <h3 class="text-start">Ujian <br> LSP TPI</h3>
                    </div>
                </div>

                @if (\Session::has('warning'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>{!! \Session::get('warning') !!} </li>
                        </ul>
                    </div>
                @endif
              
              <form action="{{ action('CertifiedUjianController@actionLogin') }}" method="post" >
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
                            {{-- <ul style="list-style-type: none;" >
                                <li ><a href="{{ action('CertifiedMemberController@index') }}">Home</a></li>
                                <li ><a href="{{ action('CertifiedMemberController@register') }}" class="text-center">Register</a></li>
                            </ul> --}}
                            
                            
                        </div>
                        
                        
                    </div>

                    <div class="col-md-6  text-end">
                        <div class="pt-2">
                          <button class="btn btn-primary btn-lg" type="submit" value="Login"> Login </button>
                            {{-- <input class="btn btn-primary btn-lg" type="submit" value="Submit" /> --}}
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
