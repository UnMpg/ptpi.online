@extends('layouts.home.app')
@section('title-page', 'Laporan Kegiatan')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
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
                <!-- <h4>Pilih bulan</h4> -->
            </div>
            <!-- <div class="col-md-4">
                <form action="{{ action('HomeController@laporanKegiatan') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="month" class="form-control" name="date" onchange="this.form.submit()" placeholder="Filter Waktu" value="{{ ($date ? $date->format('Y-m') : '') }}">
                        <input type="hidden" name="kategori" value="kegiatan">
                    </div>
                </form>
            </div> -->
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Laporan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr>
                    <td>{{$item->tgl}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{ action('HomeController@downloadLaporan', $item->file) }}" class="btn-download"><i class="fa fa-download"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection