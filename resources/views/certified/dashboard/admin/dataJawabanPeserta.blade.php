@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Data Jawaban Ujian Online')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Jawaban Ujian </h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawaban as $jawab)
                            <tr>
                                
                                @foreach ($soal as $item)

                                    @if ($jawab->soal_id == $item->id)
                                        <td>{{ $item->soal }}</td>
                                    @endif
                                    
                                @endforeach

                                <td>{{ $jawab->jawaban }}</td>
                                
                                @if ($jawab->hasil == 1)
                                    <td>Benar</td>
                                @else
                                    <td>Salah</td> 
                                @endif
                                
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