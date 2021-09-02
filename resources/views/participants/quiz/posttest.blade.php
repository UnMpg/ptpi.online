@extends('layouts.dashboard.app')
@section('title-page', 'Post-Test')
@section('title-header', 'Post-Test')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-questions"></i>
                            {{ $topic->name }}
                            <div class="float-right">
                                <a href="{{ action('ParticipantController@getPreTest', $topic->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Pre-Test
                                </a>
                                <a href="{{ action('ParticipantController@getPostTest', $topic->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Post-Test
                                </a>
                            </div>
                        </h5>
                    </div>
                    <?php //dd($questions) ?>
                    @if(count($topic->questions) > 0)
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <?php $i = 1; ?>
                            @foreach($topic->questions as $question)
                            @if ($i > 1)
                            <hr /> @endif
                            <div class="row ml-3">
                                <div class="col-xs-12 form-group">
                                    <div class="form-group">
                                        <strong>Question {{ $i }}.<br />{!! nl2br($question->konten) !!}</strong>

                                        <input type="hidden" name="questions[{{ $i }}]" value="{{ $question->id }}">
                                        @foreach($question->options as $option)
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option->id }}">
                                            {{ $option->option }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
