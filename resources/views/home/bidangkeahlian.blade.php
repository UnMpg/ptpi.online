@extends('layouts.home.app')
@section('title-page', 'Bidang Keahlian')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Bidang Keahlian</h2>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <div style="margin-bottom: 50px">
                <img src="{{ asset('assets/home/img/6_bidang_keahlian.png') }}" alt="" width="700px" style="display: block; margin: 0 auto; object-fit:cover;" class="mb-4">
                <img src="{{ asset('assets/home/img/6_bidang_keahlian1.png') }}" alt="" width="900px" style="margin-bottom: 50px">
                <img src="{{ asset('assets/home/img/bidang_keahlian2.png') }}" alt="" width="800px" style="margin-bottom: 50px">
            </div>
        </div>
    </div>
</div>
@endsection