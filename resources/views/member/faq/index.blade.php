@extends('layouts.dashboard.app')
@section('title-page', 'Faqs')
@section('title-header', 'Faqs')
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
                            Faqs
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th class="text-center">Status</th>
                                    <th>Ditanyakan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->content }}</td>
                                    <td>{{ $faq->answer_faq ? $faq->answer_faq : 'Belum terjawab' }}</td>
                                    <td class="text-center">
                                        @if ($faq->answer)
                                        <span class="badge badge-success">answered</span>
                                        @else
                                        <span class="badge badge-warning">open</span>
                                        @endif
                                    </td>
                                    <td>{{ $faq->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <form action="{{ action('TopicController@destroy', $faq->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                    data-toggle="modal" data-target="#showFaq-{{ $faq->id }}">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <div class="modal fade" id="showFaq-{{ $faq->id }}" tabindex="-1"
                                                    aria-labelledby="showFaq-{{ $faq->id }}Label" aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-left">
                                                                <h5 class="modal-title"
                                                                    id="showFaq-{{ $faq->id }}Label">
                                                                    <b>Topik: </b>
                                                                    <span>
                                                                        {{ $faq->user->category->name }}
                                                                    </span>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                <b>Pertanyaan:</b>
                                                                {{ $faq->content }}
                                                                <br>
                                                                <b>Jawaban: </b>
                                                                {{ $faq->answer_faq ? $faq->answer_faq : 'Belum ada jawaban.' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ action('MemberController@listFaqDetail', $faq) }}"
                                                    class="btn btn-sm btn-outline-info {{ $faq->answer ? 'disabled' : '' }}">
                                                    <i class="fab fa-telegram-plane"></i>
                                                </a>
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
