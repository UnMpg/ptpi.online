@extends('layouts.dashboard.app')
@section('title-page', 'Old Participants')
@section('title-header', 'Old Participants')
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
                            Old Participants
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center">Seminar ke</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $participant)
                                <tr>
                                    <td>{{ $participant->nama }}</td>
                                    <td>{{ $participant->email }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ ($participant->certificate_id == 1) ? 'badge-info' : 'badge-success' }}">seminar
                                            {{ $participant->certificate_id }}</span>
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
