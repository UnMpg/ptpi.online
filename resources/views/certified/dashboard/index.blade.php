@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ auth('certified')->user()->nama }}</h2>
                    <div class="nav navbar-right panel_toolbox">
                      <a class="" href="{{ asset('assets/certified/file/[Versi 1.2] Buku Pedoman Umum Sertifikasi Ahli Teknik Perumahsakitan__.pdf') }}"><i class="fa fa-download"></i> Download Panduan LSP TPI</a>                      
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
                                                  <small></small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id ="2" href="{{ action('CertifiedMemberController@insertDataProfile') }}">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                                  Lengkapi Data<br />
                                                  <small>Data Diri, <br>  Pengalaman,<br> Pendidikan, dll. </small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a id="3" href="{{ action('CertifiedMemberController@uploadUser') }}">
                                <span class="step_no">3</span>
                                <span class="step_descr">
                                                  Upload Document<br />
                                                  <small>Upload document  <br>dan berkas lainnya.</small>
                                                  
                                              </span>
                              </a>
                              
                                
                              
                            </li>
                            <li>
                              <a id="4" href="#step-3">
                                <span class="step_no">4</span>
                                <span class="step_descr">
                                  @if (auth('certified')->user()->certified_status == "4")
                                  
                                    @if (auth('certified')->user()->nilai > 2000)
                                    LULUS Verifikasi<br/>
                                    <small>Anda memenuhi syarat <br> verifikasi dokumens <br> Silahkan lakukan Pembayaran <br> Terlebih dahulu </small>
                                  
                                    @else
                                    Tidak LULUS Verifikasi<br/>
                                    <small>Anda tidak memenuhi syarat <br> verifikasi dokumens </small>
                                  
                                    @endif
                                  @else
                                    Hasil Verifikasi Data<br/>
                                    <small> Pengumunan Hasil  <br> Verifikasi Data <br> </small>
                                  @endif
                                   
                                </span>
                              </a>
                              {{-- @if (auth('certified')->user()->certified_status == "4" && auth('certified')->user()->nilai > 2000 )
                                <a id="link_aksi" href="{{ asset('assets/certified/file/INVOICE PEMBAYARAN.pdf') }}"><span style="color: red">Download <br> Invoice Pembayaran</span></a> 
                              @endif --}}

                              @if (auth('certified')->user()->certified_status == "6")
                              <br>
                                <a id="link_aksi" href="{{ action('CertifiedMemberController@pilihJadwalUjian') }}"><span style="color: red">Pilih Jadwal Ujian</span></a> 
                              @endif
                            </li>
                            <li>
                              <a id="8" href="#step-3">
                                <span class="step_no">5</span>
                                <span class="step_descr">
                                    Ujian Tulis<br />
                                  </span>
                              </a>
                              @if (auth('certified')->user()->certified_status == "7" || auth('certified')->user()->certified_status == "8" )
                                <a id="link_aksi" href="#">Jadwal Ujian <br><span class="jadwal-ujian" style="color: red"></span></a> 
                              @endif

                              @if (auth('certified')->user()->certified_status == "10" )
                                <span class="" style="color: green"> Selamat Anda <br> LULUS Ujian Tulis</span> 
                              @endif
                              
                            </li>

                            <li>
                              <a id="11" href="#step-4">
                                <span class="step_no">6</span>
                                <span class="step_descr">
                                   Wawancara<br />
                                </span>
                              </a>
                              @if (auth('certified')->user()->certified_status == "11"  )
                                <a id="link_aksi" href="{{ action('CertifiedMemberController@jadwalWawancara') }}" style="color: red">Pilih Jadwal <br> Wawancara </a> 
                              @endif

                              @if (auth('certified')->user()->certified_status >= "12" )
                                <a id="link_aksi" href="" >Jadwal </a> 
                                <label for="" id="konfirmasi_jadwal_wawancara" style="color: red">  </label>
                              @endif
                            </li>
                            <li>
                              <a id="15" href="#step-4">
                                <span class="step_no">7</span>
                                <span class="step_descr">
                                   Lolos Sertifikasi<br />
                                </span>
                              </a>
                            </li>
                        </ul>
                    </div>

                    <div class="">
                      @if (auth('certified')->user()->certified_status == "4" && auth('certified')->user()->nilai > 2000)
                      {{-- <div>
                        <a id="link_aksi" href="{{ asset('assets/certified/file/INVOICE PEMBAYARAN.pdf') }}"><span style="color: red">Download Invoice Pembayaran</span></a> 
                      </div> --}}
                      <br>
                      <br>
                      <div>
                        <a href="{{ action('CertifiedMemberController@uploadBukti') }}"></i>Link Upload Bukti Pembayaran </a>
                      </div>
                      @endif

                      @if (auth('certified')->user()->certified_status == "6")
                      
                        <a id="link_aksi" href="{{ action('CertifiedMemberController@pilihJadwalUjian') }}"><span style="color: red">Pilih Jadwal Ujian</span></a> 
                      @endif

                      @if (auth('certified')->user()->certified_status == "11"  )
                        <a id="link_aksi" href="{{ action('CertifiedMemberController@jadwalWawancara') }}" style="color: red">Pilih Jadwal <br> Wawancara </a> 
                      @endif
                    </div>
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
    const id_user = {!! auth('certified')->user()->id !!} 
    $.ajax({
        url : "{{ url('/sertifikasi/ujian/get-jadwal-ujian') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "id" : id_user,
             },
        type : 'POST',
        dataType : 'json',
        success : function(result){
            
            console.log(result);
            $(".jadwal-ujian").html(result.split("-").reverse().join("-"));
            // console.log("===== " + result + " =====");

        }
    });

    if (status >= "12") {
      $.ajax({
        url : "{{ url('/sertifikasi/get-jadwal-wawancara') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "id" : id_user,
             },
        type : 'POST',
        dataType : 'json',
        success : function(result){
            
            console.log(result);
            $('#konfirmasi_jadwal_wawancara').html(`${result.konfirmasi_wawancara} <br> jam ${result.jam_wawancara}`);
            // $(".jadwal-ujian").html(result.split("-").reverse().join("-"));
            // console.log("===== " + result + " =====");

        }
    });
    }


</script>
    
@endsection