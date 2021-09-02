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
                            <i class="fas fa-tags"></i>
                            News - {{ $new->judul }}
                            <a href="{{ action('NewsController@index') }}"
                                class="btn btn-sm btn-outline-secondary float-right">
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
                                        <img src="{{ asset('assets/news/' . $new->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h5><strong><a href="#">{{ $new->judul }}</a></strong>
                                    </h5>
                                </div>
                                <div class="col-11">
                                    <div class="text-justify">
                                        {!! $new->konten !!}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p class="mb-0">
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
