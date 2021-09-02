@extends('layouts.dashboard.app')
@section('title-page', 'New Category')
@section('title-header', 'New Category')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('CategoryController@update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Bidang Ilmu</label>
                                <input type="text" class="form-control" placeholder="Bidang Ilmu" name="name" required
                                    value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label>PIC</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="user_id" required>
                                    <option value="">~ Pilih Ahli Teknik ~</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ ($category->user_id == $user->id) ? 'selected' : null }}>{{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @if (count($users) == 0)
                                <a href="{{ action('UserController@index') }}">Tambah Data Pengurus</a>
                                @endif
                            </div>
                            <a href="{{ action('CategoryController@index') }}" class="btn btn-outline-secondary">
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
