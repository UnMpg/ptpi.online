@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ auth('certified')->user()->nama }}</h2>
                    <div class="nav navbar-right panel_toolbox">
                      <a class="collapse-link" href="#"><i class="fa fa-download"></i>  Download Panduan LSP TPI</a>                      
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li>
                              <a id="1" href="#step-1">
                                <span class="step_no" style="background-color: #black;">1</span>
                                <span class="step_descr">
                                                  Register<br />
                                                  <small>Lolos</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id ="2" href="{{ action('CertifiedMemberController@insertDataProfile') }}">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                                  Lengkapi Data<br />
                                                  <small>Step 2 description</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="3" href="{{ action('CertifiedMemberController@uploadUser') }}">
                                <span class="step_no">3</span>
                                <span class="step_descr">
                                                  Upload Document<br />
                                                  <small>Upload document paling <br> lambat 30 juli 2022</small>
                                                  
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="4" href="#step-3">
                                <span class="step_no">4</span>
                                <span class="step_descr">
                                                  Verifikasi Data<br />
                                                  <small>Verifikasi data <br> dan upload bukti pembayaran <br> <span style="color: red">* bagi peserta yang lulus</span></small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="5" href="#step-3">
                                <span class="step_no">5</span>
                                <span class="step_descr">
                                                  Ujian Tulis<br />
                                                  <small>Step 3 description</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="6" href="#step-4">
                                <span class="step_no">6</span>
                                <span class="step_descr">
                                                 Wawancara<br />
                                                  <small>Step 4 description</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="7" href="#step-4">
                                <span class="step_no">7</span>
                                <span class="step_descr">
                                                 Lolos Sertifikasi<br />
                                                  <small>Step 4 description</small>
                                              </span>
                              </a>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="row">
                      <h3> Upload Bukti Pembayaran</h3>

                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script>
    const status = {!! auth('certified')->user()->certified_status !!};
    console.log(status);

    for (let index = 1; index <= status; index++) {
        $(`#${index}`).addClass("done");
    }

</script>
    
@endsection