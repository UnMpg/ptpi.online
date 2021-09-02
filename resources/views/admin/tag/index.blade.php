@extends('layouts.dashboard.app')
@section('title-page', 'Tags')
@section('title-header', 'Tags')
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
                            Tags
                            <a href="{{ action('TagController@create') }}"
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
                                    <th>Dibuat</th>
                                    <th>Diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>{{ $tag->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ action('TagController@destroy', $tag->id) }}" method="post" class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ action('TagController@edit', $tag->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger delete-confirm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
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
