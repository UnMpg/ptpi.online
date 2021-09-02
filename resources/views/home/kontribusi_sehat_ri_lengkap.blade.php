@extends('layouts.home.app')
@section('title-page', 'Kontribusi - Sehat-RI')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <!-- single-well start-->
            <div class="col-1"></div>
            <div class="col-10">
                <br><br>
                @include('layouts.shared.status')
                <br>
                <div class="form contact-form">
                    <h4>Surat Permohonan</h4>
                    <iframe src="{{ asset('assets/sponsor/surat_permohonan.pdf') }}" width="100%" height="500px">
                    </iframe>
                    <hr>
                    <h4>Ide Sehat-RI</h4>
                    <iframe src="{{ asset('assets/sponsor/surat_permohonan_1.pdf') }}" width="100%" height="500px">
                    </iframe>
                    <hr>
                    <h4>Pengenalan Sehat-RI</h4>
                    <iframe src="{{ asset('assets/sponsor/surat_permohonan_2.pdf') }}" width="100%" height="500px">
                    </iframe>
                </div>
            </div>
            <!-- single-well end-->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
