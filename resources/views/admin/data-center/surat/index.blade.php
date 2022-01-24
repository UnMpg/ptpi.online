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
                            Data Center (No.Surat)
                            <a href="{{ action('DataCenterController@createSurat') }}"
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
                                    <th>Image</th>
                                    <th>Nama File</th>
                                    <th>Mime Type</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuat</th>
                                    <th>QRcode</th>
                                    <th>File</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datacenters as $datacenter)
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/surat/' . $datacenter->image) }}" alt="image"
                                            class="img-fluid" width="50" height="50">
                                    </td>
                                    <td>{{ $datacenter->filename }}</td>
                                    <td>{{ $datacenter->file_type }}</td>
                                    <td>{{ $datacenter->description }}</td>
                                    <td>{{ $datacenter->created_at->diffForHumans() }}</td>
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
                                                            {{ $datacenter->filename }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?data=' . action('DataCenterController@validasiSurat', $datacenter->unique_id) }}"
                                                            width="120" height="120" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($datacenter->document)
                                        <a href="{{ asset('assets/surat-document/' . $datacenter->document) }}"
                                            target="_blank">Download</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form
                                            action="{{ action('DataCenterController@destroySurat', $datacenter->id) }}"
                                            method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                {{-- <a href="{{ action('DataCenterController@edit', $datacenter->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                                </a> --}}
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
