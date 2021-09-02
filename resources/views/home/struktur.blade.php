@extends('layouts.home.app')
@section('title-page', 'Struktur Organisasi')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Struktur Organisasi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('assets/home/img/struktur.png') }}" alt="" width="700px"
                style="display: block; margin: 0 auto;" class="mb-4">

            <!-- single-well start-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/home/img/bidang-keahlian.png') }}" alt="" width="700px"
                    style="display: block; margin: 0 auto;" class="mb-4">
            </div>
            <!-- single-well end-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/home/img/bidang-keahlian2.png') }}" alt="" width="700px"
                    style="display: block; margin: 0 auto;" class="mb-4">
                <img src="{{ asset('assets/home/img/bidang-keahlian3.png') }}" alt="" width="700px"
                    style="display: block; margin: 0 auto;" class="mb-4">
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
