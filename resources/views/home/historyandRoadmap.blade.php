@extends('layouts.home.app')
@section('title-page', 'History and Roadmap')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    
                    <h2>History and Roadmap</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div style="display: block; margin: 0 auto; margin-bottom: 40px; " >
                <img src="{{ asset('assets/home/img/history_dan_roadmap.png') }}" alt="" width="800"  >
            </div>
            
            <!-- single-well end-->
            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/home/img/fungsi_tabel.jpeg') }}" alt="" width="700px" style="display: block; margin: 0 auto;" class="mb-4">
            </div> -->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
