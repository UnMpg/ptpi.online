@extends('layouts.dashboard.app')
@section('title-page', 'Topics')
@section('title-header', 'Topics')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-topics"></i>
                            Topics
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>PIC</th>
                                    <th>Pertanyaan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Q&A</th>
                                    <th>Ditanyakan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->email }}</td>
                                    <td>{{ $topic->user->name }}</td>
                                    <td>{{ $topic->content }}</td>
                                    <td class="text-center">
                                        @if ($topic->status)
                                        <span class="badge badge-success">sent</span>
                                        @else
                                        <span class="badge badge-warning">open</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($topic->answer)
                                        <span class="badge badge-success">answred</span>
                                        @else
                                        <span class="badge badge-warning">open</span>
                                        @endif
                                    </td>
                                    <td>{{ $topic->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="modal fade" id="showFaq-{{ $topic->id }}" tabindex="-1"
                                            aria-labelledby="showFaq-{{ $topic->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header text-left">
                                                        <h5 class="modal-title" id="showFaq-{{ $topic->id }}Label">
                                                            <b>Topik: </b>
                                                            <span>
                                                                {{ $topic->user->category->name }}
                                                            </span>
                                                            <br>
                                                            <b>PIC: </b>
                                                            <small>({{ $topic->user->category->name }} -
                                                                {{ $topic->user->email }})</small>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <b>Pertanyaan: </b>
                                                        {{ $topic->content }}
                                                        <br>
                                                        <b>Jawaban: </b>
                                                        {{ $topic->answer_faq ? $topic->answer_faq : 'Belum ada jawaban.' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ action('TopicController@destroy', $topic->id) }}" method="post"
                                            class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                    data-toggle="modal" data-target="#showFaq-{{ $topic->id }}">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <a href="{{ action('TopicController@submitEmail', $topic->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-mail-bulk"></i>
                                                </a>
                                                <a href="{{ action('TopicController@submitEmailVerify', $topic->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="fab fa-telegram-plane"></i>
                                                </a>
                                                <a href="{{ action('TopicController@edit', $topic->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger delete-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
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
