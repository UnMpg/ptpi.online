@extends('layouts.dashboard.app')
@section('title-page', 'Data Center')
@section('title-header', 'Data Center')
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
                            Daftar Sertifikat Workshop
                            <a href="{{ action('DataCenterController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Dibuat</th>
                                    <th>Certificate ID</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>QRcode</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datacenters as $datacenter)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($datacenter->created_at)
       ->format('d-m-Y') }}</td>
                                    <td>{{ $datacenter->filename }}</td>
                                    <td>{{ $datacenter->description }}</td>
                                    <td>{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . action('DataCenterController@validasiCertificate', $datacenter->unique_id) }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal"
                                            data-target="#exampleModal-{{ $datacenter->id }}">generate</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{ $datacenter->id }}" tabindex="-1"
                                            aria-labelledby="exampleModal-{{ $datacenter->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModal-{{ $datacenter->id }}Label">
                                                            {{ $datacenter->filename }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . action('DataCenterController@validasiCertificate', $datacenter->unique_id) }}"
                                                            width="120" height="120" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ action('DataCenterController@destroy', $datacenter->id) }}"
                                            method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
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
