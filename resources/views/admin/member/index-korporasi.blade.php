@extends('layouts.dashboard.app')
@section('title-page')
Members - {{ $title }}
@endsection
@section('title-header')
Members - {{ $title }}
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>
                            Members - {{ $title }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Profil</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tipe</th>
                                    <th>Institusi</th>
                                    <th>Jenis Usaha</th>
                                    <th>Jabatan</th>
                                    <th>Bidang Ilmu</th>
                                    <th>Domisili</th>
                                    <th>Telp</th>
                                    <th>CV</th>
                                    <th>Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ action('MemberController@accept', $user->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-check-square"></i>
                                            </a>
                                            <a href="{{ action('MemberController@decline', $user->id) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="far fa-window-close"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><img src="{{ asset('assets/members/images/' . $user->image) }}"
                                            class="img-fluid" width="60" alt="profil"></td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->member_type }}</td>
                                    <td>{{ $user->instansi }}</td>
                                    <td>{{ $user->jenis_usaha }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td>{{ $user->bidang_ilmu }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->kontak }}</td>
                                    <td>
                                        <a
                                            href="{{ action('MemberController@downloadCv', $user->id) }}">{{ $user->member_cv }}</a>
                                    </td>
                                    <td>{{ optional($user->created_at)->diffForHumans() }}</td>
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
