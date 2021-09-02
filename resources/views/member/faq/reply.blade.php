@extends('layouts.dashboard.app')
@section('title-page', 'Reply Question')
@section('title-header', 'Reply Question')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('MemberController@replyFaq') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                            <div class="form-group">
                                <label>Topic Name</label>
                                <input type="text" class="form-control" placeholder="Topic Name" name="name"
                                    value="{{ $user->category->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea name="content" cols="30" rows="5" class="form-control"
                                    disabled>{{ $topic->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea name="answer_faq" cols="30" rows="5" class="form-control"
                                    placeholder="Jawaban Anda...">{{ $topic->answer_faq }}</textarea>
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
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
@endsection
