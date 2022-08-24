@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Profile')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Profile </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-3 col-sm-3  profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <img class="img-responsive avatar-view" src="{{ asset('assets/certified/upload/'.auth('certified')->user()->nama.'/'.auth('certified')->user()->foto) }}" alt="Avatar" title="Change the avatar">
              </div>
            </div>
            <h3>{{ auth('certified')->user()->nama }}</h3>

            <ul class="list-unstyled user_data">
              <li><i class="fa fa-map-marker user-profile-icon"></i> {{ auth('certified')->user()->alamat  }}
              </li>

              <li>
                <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
              </li>

              <li class="m-top-xs">
                <i class="fa fa-external-link user-profile-icon"></i>
              <a href="" target="_blank">{{ auth('certified')->user()->email }}</a>
              </li>
            </ul>

            {{-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> --}}
            <br />

            

          </div>
          <div class="col-md-9 col-sm-9 ">

            
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pendidikan</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pengalaman</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"> Pelatihan</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false"> Pencapaian</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false"> File Upload</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                  {{-- pendidikan --}}
                    <div class="container">
                      @foreach ($pendidikan as $item)
                      
                          <div class="pendidikan-view">
                            <h4 class="heading">{{ $item->jenjang }} -- {{ $item->universitas }}</h4>

                            <p> Tahun Masuk : {{ $item->tahun_masuk }}</p>
                            <p> Tahun Lulus : {{ $item->tahun_lulus }}</p>
                          </div>
                      
                      @endforeach
                    </div>
                  {{-- /pendidikan --}}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <div class="container">
                    @foreach ($pengalaman as $item)
                    
                        <div class="pendidikan-view">
                          <h4 class="heading">{{ $item->institusi }}</h4>

                          <p> Jabatan : {{ $item->jabatan }}</p>
                          <p> Jenis Pekerjaan : {{ $item->jenis_pekerjaan }}</p>
                        </div>
                    
                    @endforeach
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <div class="container">
                    @foreach ($pelatihan as $item)
                    
                        <div class="pendidikan-view">
                          <h4 class="heading">{{ $item->judul }}</h4>

                          <p> Institusi : {{ $item->institusi_pelatihan }}</p>
                          <p> Tanggal : {{ $item->tanggal }}</p>
                        </div>
                    
                    @endforeach
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                  

                  <div class="container">
                    @foreach ($pencapaian as $item)
                    
                        <div class="pendidikan-view">
                          <h4 class="heading">{{ $item->jenis_pencapaian }}</h4>
                          @if ( $item->jabatan != NULL)
                          <p> Jabatan : {{ $item->jabatan }}</p>
                          @endif

                          @if ( $item->institusi != NULL)
                          <p> Institusi : {{ $item->institusi }}</p>
                          @endif

                          @if ( $item->judul != NULL)
                            <p> Judul : {{ $item->judul }}</p>
                          @endif

                          @if ( $item->penerbit != NULL)
                          <p> Penerbit : {{ $item->penerbit }}</p>
                          @endif

                          @if ( $item->jenis != NULL)
                          <p> Jenis : {{ $item->jenis }}</p>
                          @endif

                          @if ( $item->kualitas != NULL)
                          <p> Kualitas : {{ $item->kualitas }}</p>
                          @endif
                          
                          @if ( $item->nomor != NULL)
                          <p> Nomor : {{ $item->nomor }}</p>
                          @endif
                          
                          @if ( $item->status != NULL)
                          <p> Status : {{ $item->status }}</p>
                          @endif
                          
                          @if ( $item->peringkat != NULL)
                          <p> Peringkat : {{ $item->peringkat }}</p>
                          @endif
                          
                          @if ( $item->nama_organisai != NULL)
                          <p> Nama Organisai : {{ $item->nama_organisai }}</p>
                          @endif

                          @if ( $item->tingkat != NULL)
                          <p> Tingkat : {{ $item->tingkat }}</p>
                          @endif

                          @if ( $item->tahun != NULL)
                          <p> Tahun : {{ $item->tahun }}</p>
                          @endif

                          @if ( $item->durasi != NULL)
                          <p> Durasi : {{ $item->durasi }}</p>
                          @endif
                          
                                                  
                        </div>
                    
                    @endforeach
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                  <div class="container">
                    @foreach ($upload as $item)
                    
                        <div class="pendidikan-view">
                          <h4 class="heading">{{ $item->upload_deskripsi }} <i class="fa fa-check-circle"></i></h4>
                            
                        </div>
                    
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection