@extends('layouts.dashboard.app')
@section('title-page', 'Dashboard')
@section('title-header', 'Dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="container">
            <div class="row">

                @if ( auth('certified')->user()->certified_status == "4" && auth('certified')->user()->nilai >= "2000")
                <h4 class="h4-title"> Selamat Anda lolos Verifikasi document </h4>

                <h4 class="h4-title"> Anda Berhak mengikuti Proses Selanjutnya yaitu Ujian Tulis</h4>
                @else
                    
            
                <div class="judul-dashboard">
                    <div class="icon-judul"><i class="fa fa-user"></i></div>
                    <h4 class="h4"> {{ auth('certified')->user()->nama }} </h4>
                </div>
                
                {{-- <h4 class="h4-title"> Hasil Verikasi</h4> --}}
            </div>

            
            <div class="row">
                <div class="flow-registrasi">
                    <h4>Flow Sertifikasi</h4>

                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                          <li>
                            <a href="#step-1">
                              <span class="step_no" style="background-color: #black;">1</span>
                              <span class="step_descr">
                                                Register<br />
                                                <small>Lolos</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-2">
                              <span class="step_no">2</span>
                              <span class="step_descr">
                                                Lengkapi Data<br />
                                                <small>Step 2 description</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-3">
                              <span class="step_no">3</span>
                              <span class="step_descr">
                                                Upload Document<br />
                                                <small>Step 3 description</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-3">
                              <span class="step_no">4</span>
                              <span class="step_descr">
                                                Verifikasi Data<br />
                                                <small>Step 3 description</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-3">
                              <span class="step_no">5</span>
                              <span class="step_descr">
                                                Ujian Tulis<br />
                                                <small>Step 3 description</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-4">
                              <span class="step_no">6</span>
                              <span class="step_descr">
                                               Wawancara<br />
                                                <small>Step 4 description</small>
                                            </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-4">
                              <span class="step_no">7</span>
                              <span class="step_descr">
                                               Lolos Sertifikasi<br />
                                                <small>Step 4 description</small>
                                            </span>
                            </a>
                          </li>
                        </ul>
  
                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('assets/certified/skema.png') }}" alt="" class="img-skema">
                </div>
                    
                {{-- <h4> Hasil Verikasi</h4> --}}
                {{-- <p>selamat anda lolos tahap verikasi document silahkan upload bukti pembayaran</p>
                <a class="btn btn-danger" href=""> upload </a> --}}
                
            </div>

        </div>

        @endif
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
