@extends('layouts.home.app')
@section('title-page', 'Fungsi')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Fungsi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div style="display: block; margin: 0 auto; margin-bottom: 40px;">
                <img src="{{ asset('assets/home/img/fungsi_baru.png') }}" alt="" width="700px">
            </div>
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Kelompok</th>
                        <th>Kegiatan</th>
                        <th>Bidang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Formulasi</td>
                        <td>Rekomendasi kebijakan dan teknologi</td>
                        <td>TEKNIK PERUMAHSAKITAN</td>
                    </tr>
                    <tr>
                        <td>Pelatihan</td>
                        <td>
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>Seminar</li>
                                <li>Workshop</li>
                                <li>Konferensi</li>
                            </ul>
                        </td>
                        <td>PERALATAN MEDIS</td>
                    </tr>
                    <tr>
                        <td>Sertifikasi</td>
                        <td>
                            Pelaksanaan sertifikasi:
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>SDM</li>
                                <li>Sistem dan produk</li>
                                <li>Korporasi</li>
                            </ul>
                        </td>
                        <td>SISTEM INFORMASI dan KOMUNIKASI KESEHATAN</td>
                    </tr>
                    <tr>
                        <td>Penilaian</td>
                        <td>Pengukuran dan penilaian:
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>SDM</li>
                                <li>Sistem dan produk</li>
                                <li>Korporasi</li>
                            </ul>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Inovasi</td>
                        <td>Penelitian dan pengembangan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Konsultasi</td>
                        <td>Pendampingan rumah sakit</td>
                    </tr>
                </tbody>
            </table>
            <!-- single-well end-->
            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/home/img/fungsi_tabel.jpeg') }}" alt="" width="700px" style="display: block; margin: 0 auto;" class="mb-4">
            </div> -->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection