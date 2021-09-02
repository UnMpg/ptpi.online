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
                            <div class="col-4">
                            <h5>
                                <i class="fas fa-tags"></i>
                                New Participants (seminar 3+) tes
                            </h5>
                        </div>
                        <div class="col-5"></div>
                        <div class="col-3">
                            <form action="{{ action('ParticipantController@index') }}" method="GET">
                                @csrf
                                <select name="seminar_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">~Pilih Seminar~</option>
                                    <option value="">Pilih Semua</option>
                                    @foreach ($certificates as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == $seminar_id)
                                                {{'selected="selected"'}}
                                            @endif
                                            >{{ $item->id }} - {{ $item->name }}</option>
                                    @endforeach
                                </select>
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
                                    <th>Email</th>
                                    <th>Provinsi</th>
                                    <th>Pekerjaan</th>
                                    <th>Seminar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

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
@section('script_custom')
    <script>
        $(document).ready(function () {
        $('#posts').DataTable({
            dom: 'lBfrtip',
            "buttons": [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        {
                            extend: 'copy',
                            title: 'Data Participants'
                        },
                        {
                            extend: 'excel',
                            title: 'Data Participants'
                        },
                        {
                            extend: 'csv',
                            title: 'Data Participants'
                        },
                        {
                            extend: 'pdf',
                            title: 'Data Participants'
                        },
                        {
                            extend: 'print',
                            title: 'Data Participants'
                        },
                    ],
                }
            ],
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ action('ParticipantController@fetchParticipant') }}?seminar_id={{ $seminar_id }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "nama" },
                { "data": "email" },
                { "data": "provinsi" },
                { "data": "pekerjaan" },
                { "data": "seminar" },
                { "data": "aksi" },
            ]

        });
    });
    </script>
@endsection
