@extends('layouts.dashboard.app')
@section('title-page', 'Edit Question Answer')
@section('title-header', 'Edit Question Answer')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('QuestionAnswerController@update', $question->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul/Tema</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                                    placeholder="Question Answer Name" name="title" autofocus required
                                    value="{{ $question->title }}">
                                @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    placeholder="Question Answer Name" name="name" autofocus required
                                    value="{{ $question->name }}">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('question') ? 'is-invalid' : '' }}"
                                    placeholder="Question Answer Name" name="question" autofocus required
                                    value="{{ $question->question }}">
                                @if ($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}"
                                    placeholder="Tanggal" name="date" autofocus required value="{{ $question->date }}">
                                @if ($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
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
