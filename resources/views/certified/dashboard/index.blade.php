@extends('layouts.dashboard.app')
@section('title-page', 'Dashboard')
@section('title-header', 'Dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            {{-- <h4 class="h4-title"> Flow chart Skema </h4> --}}
            <h4 class="h4-title"> Hasil Verikasi</h4>
        </div>
        <div class="row ">
            {{-- <div class="col-lg-12 text-center">
                <img src="{{ asset('assets/certified/skema.png') }}" alt="" class="img-skema">
            </div> --}}
                
            {{-- <h4> Hasil Verikasi</h4> --}}
            <p>selamat anda lolos tahap verikasi document silahkan upload bukti pembayaran</p>
            <a class="btn btn-danger" href=""> upload </a>
            
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
