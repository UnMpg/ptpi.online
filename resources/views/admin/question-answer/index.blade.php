@extends('layouts.dashboard.app')
@section('title-page', 'Tanya Jawab')
@section('title-header', 'Tanya Jawab')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-Pertanyaan - Jawaban"></i>
                            Tanya Jawab
                            <a href="{{ action('QuestionAnswerController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>Pertanyaan</th>
                                    <th>Tanggal</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions->where('answer', null) as $question)
                                <tr>
                                    <td>{{ $question->title }}</td>
                                    <td>{{ $question->name }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->date }}</td>
                                    <td>
                                        <a href="{{ action('QuestionAnswerController@show', $question->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ action('QuestionAnswerController@createAnswer', $question->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ action('QuestionAnswerController@destroy', $question->id) }}"
                                            method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ action('QuestionAnswerController@edit', $question->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger delete-confirm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
