@extends('layouts.home.app')
@section('title-page', 'Visi dan Misi')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Visi dan Misi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                        <img src="{{ asset('assets/home/img/visi-misi.png') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                        <a href="#">
                            <h4 class="sec-head">Visi</h4>
                        </a>
                        <p>
                            Menjadi Organisasi Utama Yang Mendukung Implementasi Rumah Sakit
                            Yang <b>SMART</b> Di Indonesia
                        </p>

                        <a href="#">
                            <h4 class="sec-head">Misi</h4>
                        </a>
                        <ul>
                            <li>
                                <i class="fa fa-check"></i> Mendorong Terciptanya, Mengawal Implementasi Dan Memperbaiki
                                Terus
                                Menerus
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Kebijakan, Sdm (Engineer And Manager), Aset, Organisasi
                                (Sistem Manajemen),
                                Dan Penganggaran (Dukungan Keuangan)
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Untuk Mewujudkan Rumah Sakit Yang <b>SMART</b> Di Indonesia
                                Sesuai Dengan Amanah Undang-Undang Kesehatan Dan Rumah Sakit 2009
                            </li>
                        </ul>
                        <p><b style="font-size: 19px;">SMART</b>: <b style="font-size: 19px;">S</b>ELAMAT, BER<b
                                style="font-size: 19px;">M</b>UTU DAN BER<b style="font-size: 19px;">M</b>ANFAAT, <b
                                style="font-size: 19px;">A</b>MAN,
                            BER<b style="font-size: 19px;">R</b>EKABARU
                            SERTA <b style="font-size: 19px;">T</b>ERJANGKAU.</p>
                    </div>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
