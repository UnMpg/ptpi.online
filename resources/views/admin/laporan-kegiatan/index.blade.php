@extends('layouts.dashboard.app')
@section('title-page', 'Laporan Kegiatan')
@section('title-header', 'Laporan Kegiatan')
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
                            Laporan Kegiatan:
                            <a href="{{ action('LaporanKegiatanController@create') }}" class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <form action="{{ action('LaporanKegiatanController@index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="month" class="form-control" name="date" onchange="this.form.submit()" placeholder="Filter Waktu" value="{{ ($date ? $date->format('Y-m') : '') }}">
                                        <input type="hidden" name="kategori" value="kegiatan">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Nama Laporan</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                <tr>
                                    <td>{{$item->tgl}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->file}}</td>
                                    <td class="text-center">
                                        <form action="{{ action('LaporanKegiatanController@destroy', $item->id) }}" class="formdelete" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ action('LaporanKegiatanController@edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger delete-confirm"><i class="fas fa-trash"></i></button>
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
@section('script_custom')

@endsection