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
        <div class="container">
            <!-- single-well start-->
            <div class="row" style="margin-bottom: 50px;">
                <div class="col">
                    <img src="{{ asset('assets\home\img\visi_baru2.png') }}" alt="" width="2000px">
                </div>
                <div class="col">
                    <a href="#">
                        <h4 class="sec-head">Visi</h4>
                    </a>
                    <p>
                        Menjadi organisasi terdepan untuk mewujudkan rumah sakit di Indonesia yang Selamat, Bermanfaat, Aman, Ramah Lingkungan, dan Terjangkau <b>(S.M.A.R.T)</b>.
                    </p>
                </div>
            </div>
            <!-- single-well end-->
            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets\home\img\misi_baru.png') }}" alt="">
                </div>
                <div class="col">
                    <a href="#">
                        <h4 class="sec-head">Misi</h4>
                    </a>
                    <ul>
                        <li class="mb-3">
                            Mendorong terciptanya, mengawal implementasi dan memperbaiki terus menerus kebijakan, SDM <em>(Engineer and Manager)</em>, aset, organisasi (Sistem Manajemen), dan penganggaran (Dukungan Keuangan) untuk mewujudkan rumah sakit yang <b>SMART</b> di Indonesia sesuai dengan amanah Undang-Undang Kesehatan Dan Rumah Sakit 2009.
                        </li>
                        <li>
                            Menghubungkan, mensinergikan, mengharmoniskan berbagai <em>stakeholder</em> untuk mewujudkan rumah sakit yang lebih S.M.A.R.T.
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
@endsection