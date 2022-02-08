@extends('layouts.dashboard.app')
@section('title-page', 'New Participants')
@section('title-header', 'New Participants')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h5>
                                    <i class="fas fa-tags"></i>
                                    Participant Seminar - {{ $seminar->name }}
                                </h5>
                            </div>
                            <div class="col-4">
                                <form action="{{ action('CertificateController@importParticipantSeminar') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="file" name="file" class="form-control"
                                            placeholder="Recipient's username" aria-label="Recipient's username"
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="posts" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Certificate Number</th>
                                    <th>Certificate URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->certificate_number }}</td>
                                    <td>
                                        @if ($item->certificate_url)
                                        <a href="{{ $item->certificate_url }}" target="_blank">File</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $participants->links() }}
                    </div>
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
