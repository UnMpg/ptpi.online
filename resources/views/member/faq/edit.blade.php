@extends('layouts.dashboard.app')
@section('title-page', 'New Topic')
@section('title-header', 'New Topic')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <form action="{{ action('TopicController@update', $topic->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Topic Name" name="name"
                                value="{{ $topic->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Topic Name" name="name"
                                value="{{ $topic->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>PIC</label>
                            <input type="text" class="form-control" placeholder="Topic Name" name="name"
                                value="{{ $topic->category->user->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <textarea name="content" cols="30" rows="5" class="form-control"
                                placeholder="Question...">{{ $topic->content }}</textarea>
                        </div>
                        <a href="{{ action('TopicController@index') }}" class="btn btn-outline-secondary">
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
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
@endsection
