@extends('layouts.dashboard.app')
@section('title-page', 'List Quiz')
@section('title-header', 'List Quiz')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($topics as $topic)
            <div class="col-sm-4">
                <div class="card mt-4">
                    <div class="card-header">
                        Tema : {{ $topic->name }}
                    </div>
                    <div class="card-body">
                        <p class="">Jumlah soal : {{ count($topic->questions) }} <br>
                            Tanggal : {{ $topic->created_at->format('d-m-Y') }}</p>
                        <a href="{{ action('ParticipantController@getPreTest', $topic->id) }}"
                            class="btn btn-primary form-control">Masuk</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
