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
                    <h2>{{ trans('lang.VISION_AND_MISSION') }}</h2>
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
                        <h4 class="sec-head">{{ trans('lang.VISION') }}</h4>
                    </a>
                    <p>
                        {{ trans('lang.VISION_CONTENT') }}
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
                        <h4 class="sec-head">{{ trans('lang.MISSION') }}</h4>
                    </a>
                    <ul>
                        <li class="mb-3">
                            {{ trans('lang.MISSION_CONTENT') }}
                        </li>
                        <li>
                            {{ trans('lang.MISSION_CONTENT2') }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
