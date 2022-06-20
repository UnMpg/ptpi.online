@extends('layouts.dashboard.app')
@section('title-page', 'Daftar Ceritified')
@section('title-header', 'Daftar Ceritified')
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
                            Daftar Certified Member
                            {{-- <a href="{{ action('DataCenterController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a> --}}
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datacertified as $datacertifi)
                                <tr>
                                    <td>{{ $datacertifi->nama }}</td>
                                    <td>{{ $datacertifi->email }}</td>
                                    <td>{{ $datacertifi->telp }}</td>
                                    <td>{{ $datacertifi->status }}</td>
                                    {{-- <td>
                                        <a href="#" data-toggle="modal"
                                            data-target="">generate</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="" tabindex="-1"
                                            aria-labelledby="Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="Label">
                                                            </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src=""
                                                            width="120" height="120" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                    <td class="text-center">
                                        <button type="submit"
                                        class="btn btn-sm ">
                                        <a href="{{ action('CertifiedMemberController@viewUser', $datacertifi->id) }}"><i class="far fa-edit"> </i></a>
                                        </button>
                                        {{-- <form action=""
                                            method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger delete-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </form> --}}
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
