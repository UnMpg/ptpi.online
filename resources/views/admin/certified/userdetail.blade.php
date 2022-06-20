@extends('layouts.dashboard.app')
@section('title-page', 'User Detail')
@section('title-header', 'User Detail')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">   
                    <div class="card-header mb-4">
                        <h5>
                            <i class="fas fa-tags"></i>
                            {{ $datauser->nama }}

                            <a href="{{ action('CertifiedMemberController@certifiedView') }}" class="btn btn-sm btn-outline-secondary float-right">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            {{-- <a href="{{ action('DataCenterController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a> --}}
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 detail-foto">
                                <div class="card" style="width: 100%;">
                                    <img class="card-img-top" src="{{ asset('assets/certified/upload/'.$datauser->nama.'/'.$datauser->foto) }}" alt="Card image cap">
                                    <div class="card-body mt-2">
                                        <h5 class="card-title"> <strong>{{ $datauser->nama }}</strong></h5>
                                        <p class="card-text">{{ $datauser->telp }}</p>
                                        <p class="card-text">{{ $datauser->alamat }}</p>
                                        <div class="row">
                                            <label class="col-sm-3 ">Status :</label>                                            
                                            <div class="col-sm-8">{{ $status->deskripsi }}</div>                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 ">Nilai :</label>                                            
                                            <div class="col-sm-8">{{ $datauser->nilai }}</div>                                            
                                        </div>
                                        <a href="{{ action('CertifiedMemberController@downloadZipFile',$datauser->id) }}" class="btn btn-primary">Download Berkas</a>
                                        <a href="{{ action('CertifiedMemberController@downloadPDF',$datauser->id) }}" class="btn btn-primary">Download Data PDF</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 100%;">
                                    <div class="container">
                                        <form action="{{ action('CertifiedMemberController@inputNilai') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="id" value="{{ $datauser->id }}" hidden>
                                                <label for="nilai">Input Nilai Peserta</label>
                                                <input type="text" name ="nilai" class="form-control" id="nilai" >
                                            </div>
                                            <button type="submit" class="btn btn-primary">Input Nilai</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">


                                <div class="card ">
                                    <div class="card-header bg-light">
                                      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link active"  data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="true">Pendidikan</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link"  data-toggle="tab" href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false">Pengalaman</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link "  data-toggle="tab" href="#pencapaian" role="tab" aria-controls="pencapaian" aria-selected="false">Pencapaian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "  data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="false">Upload File</a>
                                          </li>
                                      </ul>
                                    </div>
                                    <div class="card-body tab-content" id="myTabContent">
                                        
                                        {{-- pendidikan --}}
                                        <div class="tab-pane fade show active" id="pendidikan" role="tabpanel" >
                                            @foreach ($pendidikan as $item)
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenjang </label>
                                                    <div class="col-sm-10"><h5 class="card-title mt-2"><strong> {{ $item->jenjang }}</strong></h5></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <label class="col-sm-3 ">Universitas </label>
                                                    <div class="col-sm-8">{{ $item->universitas }}</div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-3 ">Jurusan </label>
                                                    <div class="col-sm-8">{{ $item->jurusan }}</div>
                                                </div>
                                                <div class="garis-bawah"></div>

                                            @endforeach
                                        </div>

                                        {{-- Pengalaman --}}
                                        <div class="tab-pane fade" id="pengalaman" role="tabpanel" >
                                            @foreach ($pengalaman as $item)

                                                <div class="form-group row">
                                                    <label class="col-sm-3 ">{{ $item->jabatan }}</label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 ">Institusi </label>
                                                    <div class="col-sm-8">{{ $item->institusi }}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 ">Lama Bekerja </label>
                                                    <div class="col-sm-8">{{ $item->lama_bekerja }}</div>
                                                </div>
                                                <div class="garis-bawah"></div>
                                            @endforeach
                                        </div>

                                        {{-- Pencapaian --}}
                                        <div class="tab-pane fade" id="pencapaian" role="tabpanel" >
                                            @foreach ($pencapaian as $item)

                                            <div class="form-group row">
                                                <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 ">Nama </label>
                                                <div class="col-sm-8">{{ $item->nama }}</div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 ">Durasi </label>
                                                <div class="col-sm-8">{{ $item->lama }}</div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 ">Nilai </label>
                                                <div class="col-sm-8">{{ $item->nilai }}</div>
                                            </div>
                                            <div class="garis-bawah"></div>
                                        @endforeach
                                        </div>

                                        {{-- Upload File  --}}
                                        <div class="tab-pane fade" id="upload" role="tabpanel" >
                                            

                                            {{-- <div class="form-group row">
                                                <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                            </div> --}}
                                            <div class="row">
                                                <label class="col-sm-3 ">KTP </label>
                                                <div class="col-sm-8">{{ $datauser->ktp }}</div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 ">CV  </label>
                                                <div class="col-sm-8">{{ $datauser->certified_cv }}</div>
                                            </div>
                                            @foreach ($upload as $item)
                                            <div class="row">
                                                <label class="col-sm-3 ">{{ $item->upload_deskripsi }} </label>
                                                <div class="col-sm-8">{{ $item->file_name }}</div>
                                            </div>
                                                
                                            @endforeach
                                            
                                            <div class="garis-bawah"></div>
                                        
                                        </div>
                                    </div>
                                  </div>


                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

<script>
    console.log("nama saya");
</script>