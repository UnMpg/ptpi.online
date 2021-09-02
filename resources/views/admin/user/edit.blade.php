@extends('layouts.dashboard.app')
@section('title-page', 'Edit Pengurus')
@section('title-header', 'Edit Pengurus')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('UserController@update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" name="name" value="{{ $user->name }}">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email"
                                    class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email Address" name="email" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                        value="1" required {{ ($user->gender == 1) ? 'checked' : null }}>
                                    <label class="form-check-label" for="inlineRadio1">L</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="0"
                                        {{ ($user->gender == 0) ? 'checked' : null }}>
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
