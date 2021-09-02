@extends('layouts.dashboard.app')
@section('title-page', 'New Question Answer')
@section('title-header', 'New Question Answer')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-header">
                    <div class="float-left">
                        Pertanyaan: {{ $question->question }}
                    </div>
                    <div class="float-right">
                        <a href="{{ action('QuestionAnswerController@index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body pad">
                    <h5>Jawaban:</h5>
                    @foreach ($answers as $answer)
                    <li>{{ $answer->answer }}</li>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
@endsection
