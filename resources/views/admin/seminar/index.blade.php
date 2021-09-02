@extends('layouts.dashboard.app')
@section('title-page', 'Seminar')
@section('title-header', 'Seminar')
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
                            Seminar
                            <a href="{{ action('CertificateController@create') }}"
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
                                    <th>Nama</th>
                                    <th>Seri</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seminars as $seminar)
                                <tr>
                                    <td>{{ $seminar->name }}</td>
                                    <td>{{ $seminar->id }}</td>
                                    <td>
                                        <form action="{{ action('CertificateController@updateTema') }}" method="post"
                                            onsubmit="return confirm('Do you really want to submit the form?');">
                                            @csrf
                                            <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
                                            <input type="checkbox" onChange="this.form.submit()" name="status"
                                                {{ $seminar->status ? 'checked' : null }}>
                                        </form>
                                    </td>
                                    <td>{{ optional($seminar->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ action('CertificateController@destroy', $seminar->id) }}"
                                            method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ action('CertificateController@edit', $seminar->id) }}"
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
