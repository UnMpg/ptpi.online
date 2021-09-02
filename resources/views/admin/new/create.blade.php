@extends('layouts.dashboard.app')
@section('title-page', 'New News')
@section('title-header', 'New News')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('NewsController@store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}"
                                    placeholder="Judul" name="judul" autofocus required>
                                @if ($errors->has('judul'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('judul') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" placeholder="Gambar" name="image">
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" multiple="multiple" name="tag_id[]"
                                    data-placeholder="Select a State" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea class="textarea" placeholder="Place some text here" name="konten"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <small class="text-danger">{{ $errors->first('konten') }}</small>
                            </div>
                            <a href="{{ action('NewsController@index') }}" class="btn btn-outline-secondary">
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
