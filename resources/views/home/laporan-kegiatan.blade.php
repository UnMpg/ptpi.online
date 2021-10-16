@extends('layouts.home.app')
@section('title-page', 'Laporan Kegiatan')
@section('content')
<!-- Start About area -->
<!-- <div id="about" class="service-area area-padding">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Laporan Kegiatan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4>Pilih bulan</h4>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kegiatan</th>
                    <th>Judul</th>
                    <th>Tanggal Kegiatan</th>
                    <th>File</th>
                    <th>Partner Utama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->details}}</td>
                    <td>{{$item->tgl}}</td>
                    <td>{{$item->file}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> -->
@endsection