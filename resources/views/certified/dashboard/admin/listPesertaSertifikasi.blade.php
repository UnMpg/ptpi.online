@extends('layouts.certifiedDashboard.app')
@section('title-page', 'List Peserta Sertifikasi')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta Sertifikasi </h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
                                <td>{{ $datacertifi->certified_status }}</td>
                                
                                <td class="text-center">
                                    <button type="submit"
                                    class="btn btn-sm ">
                                    <a href="{{ action('CertifiedMemberController@dataProfileUser', $datacertifi->id) }}"><i class="fa fa-edit"> </i></a>
                                    </button>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    
                
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection