@extends('layouts.dashboard.app')
@section('title-page', 'Activities')
@section('title-header', 'Activities')
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
                            Activities
                            <a href="{{ action('ActivityController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @foreach ($activities as $activity)
                        <div class="card-body bg-light rounded">
                            <div class="row">
                                <div class="col-10">
                                    <h5>
                                        <strong>
                                            <a
                                                href="{{ action('ActivityController@show', $activity->id) }}">{{ $activity->judul }}</a>
                                        </strong>
                                    </h5>
                                </div>
                                <div class="col-2 text-right">
                                    <form action="{{ action('ActivityController@destroy', $activity->id) }}"
                                        method="post" class="formdelete">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ action('ActivityController@edit', $activity->id) }}"
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
                                        <img src="{{ asset('assets/activities/' . $activity->image) }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="text-justify">
                                        {!! str_limit($activity->konten, 600) !!}
                                    </div>
                                    <p><a class="btn btn-default"
                                            href="{{ action('ActivityController@show', $activity->id) }}">Read more</a>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <p class="mb-0">
                                <i class="icon-user"></i> by <a href="#">{{ $activity->admin->nama }}</a>
                                | <i class="icon-calendar"></i> {{ $activity->created_at->format('M d, Y') }}
                                | <i class="icon-tags"></i> Tags :
                                @foreach ($activity->tags as $tag)
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
