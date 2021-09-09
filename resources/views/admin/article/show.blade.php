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
                            <i class="fas fa-tags"></i>
                            Articles - {{ $article->judul }}
                            <a href="{{ action('ArticleController@index') }}" class="btn btn-sm btn-outline-secondary float-right">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="card-body bg-light rounded">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center">
                                    <a href="#" class="thumbnail">
                                        <img src="{{ asset('assets/articles/' . $article->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h5><strong><a href="#">{{ $article->judul }}</a></strong>
                                    </h5>
                                </div>
                                <div class="col-11">
                                    <div class="text-justify">
                                        {!! $article->konten !!}
                                    </div>
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