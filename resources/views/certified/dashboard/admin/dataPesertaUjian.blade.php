@extends('layouts.certifiedDashboard.app')
@section('title-page', 'List Peserta Sertifikasi')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta yang Telah Mengikuti Ujian </h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Ujian</th>
                                <th>Nilai Ujian</th>
                                <th>Durasi Ujian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datacertified as $datacertifi)
                            <tr>
                                <td>{{ $datacertifi->nama }}</td>
                                <td>{{ $datacertifi->email }}</td>

                                @foreach ($ujian as $uji)

                                    @if ($uji->certified_member_id == $datacertifi->id)
                                        <td>{{ $uji->tanggal_ujian }}</td>
                                        <td>{{ $uji->score_ujian }}</td>
                                        <td>{{ $uji->lama_ujian }}</td>
                                    @endif
                                    
                                @endforeach
                                                                
                                <td class="text-center">
                                    <button class="btn btn-sm ">
                                        <a href="{{ action('CertifiedMemberController@dataJawabanPeserta', $datacertifi->id) }}"><i class="fa fa-edit"> </i> Jawaban</a>
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