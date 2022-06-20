@extends('layouts.home.app')
@section('title-page', 'Hospital Engineer Certified')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Hospital Engineer Certified</h2>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; justify-content:center;">
            <!-- single-well start-->
            <div>
                <img src="{{ asset('assets/home/img/sertifikasi_baru.png') }}" alt="" width="2000px"
                    style="display: block; margin: 0 auto;" class="mb-4">
            </div>
            <p>Informasi tentang sertifikasi silahkan klik disini. <a
                    href="{{ asset('assets/hef-certificates/panduan.pdf') }}">Download</a></p>
        </div>
    </div>
</div>
@endsection
