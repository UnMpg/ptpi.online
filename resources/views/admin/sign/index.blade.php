@extends('layouts.dashboard.app')
@section('title-page', 'Sign')
@section('title-header', 'Sign')
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
                            Sign
                            <a href="{{ action('SignController@create') }}"
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
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>QRcode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($signs as $sign)
                                <tr>
                                    <td>{{ $sign->unique_id }}</td>
                                    <td>{{ $sign->name }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal"
                                            data-target="#exampleModal-{{ $sign->id }}">generate</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{ $sign->id }}" tabindex="-1"
                                            aria-labelledby="exampleModal-{{ $sign->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal-{{ $sign->id }}Label">
                                                            {{ $sign->filename }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . 'https://iahe.or.id' . '/home/sertifikat/ttd/scan/' . $sign->unique_id }}"
                                                            width="120" height="120" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ action('SignController@destroy', $sign->id) }}" method="post"
                                            class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ action('SignController@edit', $sign->id) }}"
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
