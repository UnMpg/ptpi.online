@extends('layouts.dashboard.app')
@section('title-page', 'Artikel')
@section('title-header', 'Artikel')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-file-alt"></i>
                            Articles
                            <a href="{{ action('ArticleController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @foreach ($articles as $article)
                        <div class="card-body bg-light rounded">
                            <div class="row">
                                <div class="col-10">
                                    <h5>
                                        <strong>
                                            <a
                                                href="{{ action('ArticleController@show', $article->id) }}">{{ $article->judul }}</a>
                                        </strong>
                                    </h5>
                                </div>
                                <div class="col-2 text-right">
                                    <form action="{{ action('ArticleController@destroy', $article->id) }}" method="post"
                                        class="formdelete">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ action('ArticleController@edit', $article->id) }}"
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
                                        <img src="{{ asset('assets/articles/' . $article->image) }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="text-justify">
                                        {!! str_limit($article->konten, 600) !!}
                                    </div>
                                    <p><a class="btn btn-default"
                                            href="{{ action('ArticleController@show', $article->id) }}">Read more</a>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <p class="mb-0">
                                <i class="icon-user"></i> by <a href="#">{{ $article->admin->nama }}</a>
                                | <i class="icon-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                | <i class="icon-tags"></i> Tags :
                                @foreach ($article->tags as $tag)
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
        </div>
        <hr>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
