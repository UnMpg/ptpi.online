@extends('layouts.home.app')
@section('title-page', 'Visi dan Misi')
@section('content')
<!-- Start About area -->
<!-- ======= Pengantar Section ======= -->
<div id="about" class="about-area(hapus_ini_untuk_warna) area-padding" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Pengantar</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('assets/home/img/prof_eko.png') }}" class="rounded" alt="presiden_ptpi">
                <div class="text-center">
                    <a href="{{ action('HomeController@profilePresidenPtpi') }}"
                        class="btn btn-sm btn-info mt-3">Info lengkap</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="well-middle">
                    <div class="single-well">
                        <a href="#">
                            <h4 class="sec-head">ASSALAMMU'LAIKUM DAN SALAM SEJAHTERA,</h4>
                        </a>
                        <p style="text-align: justify;">
                            {{ trans('lang.INTRODUCTION_CONTENT') }}
                            <hr>
                        <p>Salam hangat</p><br><br>
                        <p>(Prof. Dr.-Ing. Eko Supriyanto)</p>
                        <p>President</p>
                        </p>
                    </div>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div><!-- End Pengantar Section -->

@endsection
