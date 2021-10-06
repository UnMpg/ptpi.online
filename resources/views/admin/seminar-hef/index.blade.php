@extends('layouts.dashboard.app')
@section('title-page', 'Seminar HEF 2021')
@section('title-header', 'Seminar HEF 2021')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-tags"></i>
                            Seminar HEF 2021:
                            <a href="{{ action('SeminarHefController@create') }}" class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <form action="{{ action('SeminarHefController@index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="search" placeholder="Cari pembicara">
                                        <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Tipe Seminar</th>
                                    <th>Sesi</th>
                                    <th>Judul</th>
                                    <th>Pembicara</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materi as $item)
                                <tr>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->tipe_seminar }}</td>
                                    <td>{{ $item->sesi }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->pembicara }}</td>
                                    <td>{{ $item->file }}</td>

                                    @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                    <td class="text-center">
                                        <form action="{{ action('SeminarHefController@destroy', $item->id) }}" class="formdelete" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ action('SeminarHefController@edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger delete-confirm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @endif
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
@section('script_custom')

@endsection