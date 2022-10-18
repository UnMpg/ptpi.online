@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Data Peserta Wawancara')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Peserta Wawancara</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Wawancara</th>
                                <th>Score</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>

                                @foreach ($wawancaras as $wawancara)
                                                                        
                                   
                                    @if ($data->id == $wawancara->certified_member_id)
                                    <td>{{ $wawancara->tanggal_wawancara }}</td>
                                    <td>{{ $wawancara->score_wawancara }}</td>
                                    @endif
                                    
                                @endforeach

                                <td class="text-center">
                                    <button type="submit"
                                    class="btn btn-sm ">
                                    <a href="{{ action('CertifiedMemberController@viewPenilaianWawancara', $data->id) }}"><i class="fa fa-edit"> </i> Input Penilaian</a>
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