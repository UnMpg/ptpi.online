@extends('layouts.home.app')
@section('title-page', 'Laporan Keuangan')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Laporan Keuangan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-0">
                <!-- <h4>Pilih Bulan</h4> -->
            </div>
            <div class="col-md-4 mb-0">
                <form action="{{ action('HomeController@laporanKeuangan') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="month" class="form-control" name="date" onchange="this.form.submit()" placeholder="Filter Waktu" value="{{ ($date ? $date->format('Y-m') : '') }}">
                        <input type="hidden" name="kategori" value="keuangan">
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr>
                    <td>{{$item->tipe_laporan}}</td>
                    <td>{{$item->tgl}}</td>
                    <td>{{$item->details}}</td>
                    <td>Rp. <span class="uang">{{ $item->nominal }}</span></td>
                </tr>
                @endforeach
                <tr>
                    <td>Saldo</td>
                    <td class="text-center">Update {{ date('d/m/Y') }}</td>
                    <td class="text-center">-</td>
                    <td class="text-center">Rp. <span class="uang">{{ $saldo }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script_custom')
<script>
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('000.000.000', {
            reverse: true
        });
    })
</script>
@endsection