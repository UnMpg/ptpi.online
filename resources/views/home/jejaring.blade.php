@extends('layouts.home.app')
@section('title-page', 'Jejaring')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Jejaring</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div style="text-align: center; margin-bottom: 100px;">
                <img src="{{ asset('assets\home\img\jejaring_baru.png') }}" alt="" width="2000px" class="mb-4">
            </div>
            <!-- single-well end-->
            <div style="text-align: center;">
                <h3>Program PTPI (2020-2024)</h3>
                <img src="{{ asset('assets/home/img/jejaring1_baru.png') }}" alt="" width="2000px" class="mb-4">
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
@endsection