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
                                <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
                                    placeholder="Profile Name" name="nama" value="{{ $auth->nama }}" required>
                                @if ($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email"
                                    class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email Address" name="email" value="{{ $auth->email }}" required>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password"
                                    class="form-control {{ $errors->first('old_password') ? 'is-invalid' : '' }} {{ session('old_password') ? 'is-invalid' : '' }}"
                                    placeholder="Password" name="old_password" required>
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
                                <input type="password"
                                    class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                    placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password"
                                    class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                    placeholder="Password" name="password_confirmation" required>
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
@endsection
