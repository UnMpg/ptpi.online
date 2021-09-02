@extends('layouts.dashboard.app')
@section('title-page', 'New Question Answer')
@section('title-header', 'New Question Answer')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('QuestionAnswerController@storeAnswer') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $question->id }}" name="parent_id">
                        <input type="hidden" value="{{ $question->date }}" name="date">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul/Tema</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                                    placeholder="Question Answer Name" name="title" required readonly
                                    value="{{ $question->title }}">
                                @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('question') ? 'is-invalid' : '' }}"
                                    value="{{ $question->question }}" placeholder="Question Answer Name" name="question"
                                    required readonly>
                                @if ($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    placeholder="Nama" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Jawaban</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('answer') ? 'is-invalid' : '' }}"
                                    placeholder="Jawaban" name="answer" autofocus required>
                                @if ($errors->has('answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                                @endif
                            </div>
                            <a href="{{ action('QuestionAnswerController@index') }}" class="btn btn-outline-secondary">
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
