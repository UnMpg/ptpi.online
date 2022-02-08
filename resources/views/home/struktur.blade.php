@extends('layouts.home.app')
@section('title-page', 'Organisma')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Organisma</h2>
                </div>
            </div>
        </div>
        <div class="row" style="display: block; margin: 0 auto;">
            @if (session('locale'))
            @if (session('locale') == 'id')
            <img src="{{ asset('assets/home/img/organisma.png') }}" alt="" width="2000px">
            @endif
            @if (session('locale') == 'en')
            <img src="{{ asset('assets/home/img/organisma_en.png') }}" alt="" width="2000px">
            @endif
            @else
            <img src="{{ asset('assets/home/img/organisma_en.png') }}" alt="" width="2000px">
            @endif
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
