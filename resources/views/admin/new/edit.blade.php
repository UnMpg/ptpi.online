@extends('layouts.dashboard.app')
@section('title-page', 'News')
@section('title-header', 'News')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('NewsController@update', $new->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="Judul" name="judul"
                                    value="{{ $new->judul }}">
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" multiple="multiple" name="tag_id[]"
                                    data-placeholder="Select a State" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @foreach ($new->tags as $item)
                                        {{ ($tag->id == $item->id ? 'selected' : '') }}
                                        @endforeach
                                        >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea class="textarea" placeholder="Place some text here" name="konten"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $new->konten }}</textarea>
                            </div>
                            <div class="form-row">
                                <label>Gambar</label>
                                <div class="col text-center">
                                    <img src="{{ asset('assets/news/' . $new->image) }}" alt="image" class="img-fluid"
                                        width="300">
                                </div>
                                <div class="col">
                                    <input type="file" class="form-control" placeholder="Gambar" name="image"
                                        value="{{ $new->image }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
