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
                    <form role="form" action="{{ action('QuestionAnswerController@store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul/Tema</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                                    placeholder="Judul/Tema" name="title" autofocus required>
                                @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    placeholder="Nama" name="name" autofocus required>
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
                                    placeholder="Pertanyaan" name="question" autofocus required>
                                @if ($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}"
                                    placeholder="Tanggal" name="date" autofocus required>
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
