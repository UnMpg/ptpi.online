@extends('layouts.dashboard.app')
@section('title-page', 'New User')
@section('title-header', 'New User')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('UserController@store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" name="name" required>
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" name="email" required>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div><label>Gender</label></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                        value="1" required>
                                    <label class="form-check-label" for="inlineRadio1">L</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="0">
                                    <label class="form-check-label">P</label>
                                </div>
                                @if ($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                                @endif
                            </div>
                            <a href="{{ action('UserController@index') }}" class="btn btn-outline-secondary">
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
