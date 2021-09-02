@extends('layouts.dashboard.app')
@section('title-page', 'Ahli Teknik')
@section('title-header', 'Ahli Teknik')
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
                            Ahli Teknik
                            <a href="{{ action('UserController@create') }}"
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
                                    <th>Email</th>
                                    <th>Bidang Ilmu</th>
                                    {{-- <th class="text-center">Gender</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->category->name }}
                                    </td>
                                    {{-- <td class="text-center">{{ $user->gender ? 'L' : 'P' }}</td> --}}
                                    <td>
                                        <form action="{{ action('UserController@destroy', $user->id) }}" method="post"
                                            class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ action('UserController@edit', $user->id) }}"
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
