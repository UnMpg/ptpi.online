@extends('layouts.dashboard.app')
@section('title-page', 'News')
@section('title-header', 'News')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="far fa-newspaper"></i>
                            News
                            <a href="{{ action('NewsController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    @foreach ($news as $new)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h5>
                                    <strong>
                                        <a href="{{ action('NewsController@show', $new->id) }}">{{ $new->judul }}</a>
                                    </strong>
                                </h5>
                            </div>
                            <div class="col-2 text-right">
                                <form action="{{ action('NewsController@destroy', $new->id) }}" method="post"
                                    class="formdelete">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ action('NewsController@edit', $new->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('assets/news/' . $new->image) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="col-9">
                                {!! str_limit($new->konten, 600) !!}
                                <p>
                                    <a class="btn btn-default" href="{{ action('NewsController@show', $new->id) }}">Read
                                        more</a>
                                </p>
                            </div>
                        </div>
                        <br>
                        <p>
                            <i class="icon-user"></i> by <a href="#">{{ $new->admin->nama }}</a>
                            | <i class="icon-calendar"></i> {{ $new->created_at->format('M d, Y') }}
                            | <i class="icon-comment"></i> <a href="#">3 Comments</a>
                            | <i class="icon-share"></i> <a href="#">39 Shares</a>
                            | <i class="icon-tags"></i> Tags :
                            @foreach ($new->tags as $tag)
                            <a href="#">
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                            </a>
                            @endforeach
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
