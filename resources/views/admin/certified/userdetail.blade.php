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
                                    @if ($datauser->foto == null)
                                    <img class="card-img-top"  src="{{ asset('assets/dashboard/img/default.jpg') }}" alt="Card image cap">
                                    @else
                                    <img class="card-img-top" src="{{ asset('assets/certified/upload/'.$datauser->nama.'/'.$datauser->foto) }}" alt="Card image cap">
                                    @endif
                                    
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
                                            <div class="col-sm-8" id="nilai_akhir" data-value="{{ $score }}" >{{ $score }}</div> 
                                            <a href="#" class="btn btn-primary mb-3" id="konfirmasi_score"> Konfirmasi Score</a>                                         
                                        </div>
                                        <a href="{{ action('CertifiedMemberController@downloadZipFile',$datauser->id) }}" class="btn btn-primary mb-3">Download Berkas</a>
                                        {{-- <a href="{{ action('CertifiedMemberController@downloadPDF',$datauser->id) }}" class="btn btn-primary">Download Data PDF</a> --}}
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

                                        <div class="add-info">
                                            <div class="form-group">
                                                <label for="nilai">Notifikasi</label>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Tambah Notive</button>
                                            </div>
                                        </div>
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
                                            <a class="nav-link "  data-toggle="tab" href="#pelatihan" role="tab" aria-controls="pelatihan" aria-selected="false">Pelatihan</a>
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
                                                <div class="row">
                                                <div class="col-md-9">
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
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    Score : @if ($item->score_verified == null )
                                                            {{ $item->score_submit }}
                                                            <form action="{{ action('CertifiedMemberController@updateScorePendidikan') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-4">sks</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                                                                            <input type="text" name="jenjang" value="{{ $item->jenjang }}" hidden>
                                                                            <input type="text" name="sks" class="form-control" placeholder="sks">
                                                                        </div>
                                                                      </div>
                                                                      <button type="submit" class="btn btn-primary">Input</button> 
                                                                </div>
                                                            </form>
                                                            @else
                                                            {{ $item->score_verified }}
                                                            <div><i class="fa fa-check"> </i><i>  Terverifikasi</i></div>
                                                            
                                                            @endif 
                                                </div>
                                                
                                            </div>
                                            <div class="garis-bawah"></div>
                                            @endforeach
                                        </div>

                                        {{-- Pengalaman --}}
                                        <div class="tab-pane fade" id="pengalaman" role="tabpanel" >
                                            @foreach ($pengalaman as $item)
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 ">{{ $item->jabatan }}</label>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 ">Institusi / PT </label>
                                                        <div class="col-sm-8">{{ $item->institusi }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 ">Jenis </label>
                                                        <div class="col-sm-8">{{ $item->jenis_pekerjaan }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 ">Tahun Masuk </label>
                                                        <div class="col-sm-8">{{ $item->tahun_awal }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 ">Sampai </label>
                                                        <div class="col-sm-8">{{ $item->tahun_akhir }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 ">Durasi dalam jam</label>
                                                        <div class="col-sm-8">{{ $item->durasi }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    Score : @if ($item->score_verified == null )
                                                            {{ $item->score_submit }}
                                                            <form action="{{ action('CertifiedMemberController@updateScorePengalaman') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="form-group row">
                                                                        {{-- <label for="" class="col-sm-4">sks</label> --}}
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                                                                            <input type="text" name="jenis_pekerjaan" value="{{ $item->jenis_pekerjaan }}" hidden>
                                                                            <input type="text" name="score_submit" value="{{ $item->score_submit }}" hidden>
                                                                            {{-- <input type="text" name="sks" class="form-control" placeholder="sks"> --}}
                                                                        </div>
                                                                      </div>
                                                                      <button type="submit" class="btn btn-primary">Verifikasi</button> 
                                                                </div>
                                                            </form>
                                                            @else
                                                            {{ $item->score_verified }}
                                                            <div><i class="fa fa-check"> </i><i>  Terverifikasi</i></div>
                                                            
                                                            @endif 
                                                </div>
                                            </div>
                                                
                                                <div class="garis-bawah"></div>
                                            @endforeach
                                        </div>

                                        {{-- Pelatihan  --}}
                                        <div class="tab-pane fade" id="pelatihan" role="tabpanel" >
                                            @foreach ($pelatihan as $item)
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group row">
                                                            <label class="col-sm-8 ">{{ $item->judul }}</label>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-3 ">Institusi </label>
                                                            <div class="col-sm-8">{{ $item->institusi_pelatihan }}</div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-3 ">Tanggal </label>
                                                            <div class="col-sm-8">{{ $item->tanggal }}</div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-3 ">Durasi </label>
                                                            <div class="col-sm-8">{{ $item->durasi }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        Score : @if ($item->score_verified == null )
                                                            {{ $item->score_submit }}
                                                            <form action="{{ action('CertifiedMemberController@updateScorePelatihan') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                                                                            <input type="text" name="durasi" value="{{ $item->durasi }}" hidden>
                                                                            {{-- <input type="text" name="score" class="form-control" placeholder="score"> --}}
                                                                        </div>
                                                                      </div>
                                                                      <button type="submit" class="btn btn-primary">Verifikasi</button> 
                                                                </div>
                                                            </form>
                                                            @else
                                                            {{ $item->score_verified }}
                                                            <div><i class="fa fa-check"> </i><i>  Terverifikasi</i></div>
                                                            @endif 
                                                    </div>
                                                  
                                                </div>
                                                <div class="garis-bawah"></div>
                                            @endforeach
                                        </div>

                                        {{-- Pencapaian --}}
                                        <div class="tab-pane fade" id="pencapaian" role="tabpanel" >
                                            @foreach ($pencapaian as $item)
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        
                                                        @switch($item->jenis_pencapaian)
                                                            @case("proyek")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Jabatan </label>
                                                                    <div class="col-sm-8">{{ $item->jabatan }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Nilai Proyek </label>
                                                                    <div class="col-sm-8">{{ $item->nilai }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Institusi </label>
                                                                    <div class="col-sm-8">{{ $item->institusi }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Durasi </label>
                                                                    <div class="col-sm-8">{{ $item->durasi }}</div>
                                                                </div>
                                                                
                                                                @break
                                                            @case("publikasi")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Judul </label>
                                                                    <div class="col-sm-8">{{ $item->judul }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Jenis </label>
                                                                    <div class="col-sm-8">{{ $item->jenis }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Penerbit </label>
                                                                    <div class="col-sm-8">{{ $item->penerbit }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Kualitas </label>
                                                                    <div class="col-sm-8">{{ $item->kualitas }}</div>
                                                                </div>
                                                                
                                                                @break
                                                            @case("haki")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Judul </label>
                                                                    <div class="col-sm-8">{{ $item->judul }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Jenis </label>
                                                                    <div class="col-sm-8">{{ $item->jenis }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Nomor </label>
                                                                    <div class="col-sm-8">{{ $item->nomor }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Tahun </label>
                                                                    <div class="col-sm-8">{{ $item->tahun }}</div>
                                                                </div>

                                                                @break
                                                            @case("penghargaan")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Judul </label>
                                                                    <div class="col-sm-8">{{ $item->judul }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Peringkat </label>
                                                                    <div class="col-sm-8">{{ $item->peringkat }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Institusi </label>
                                                                    <div class="col-sm-8">{{ $item->institusi }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Tahun </label>
                                                                    <div class="col-sm-8">{{ $item->tahun }}</div>
                                                                </div>
                                                                
                                                                @break
                                                            @case("pengabdian")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Jabatan </label>
                                                                    <div class="col-sm-8">{{ $item->jabatan }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Nama Organisasi </label>
                                                                    <div class="col-sm-8">{{ $item->organisasi }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Durasi </label>
                                                                    <div class="col-sm-8">{{ $item->durasi }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Tahun </label>
                                                                    <div class="col-sm-8">{{ $item->tahun }}</div>
                                                                </div>
                                                                
                                                                @break
                                                            @case("pelatihan")
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Judul </label>
                                                                    <div class="col-sm-8">{{ $item->judul }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Jenis </label>
                                                                    <div class="col-sm-8">{{ $item->jenis }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Tingkat </label>
                                                                    <div class="col-sm-8">{{ $item->tingkat }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Tahun </label>
                                                                    <div class="col-sm-8">{{ $item->tahun }}</div>
                                                                </div>
                                                                
                                                                @break
                                                            @default
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 ">{{ $item->jenis_pencapaian }}</label>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Nama </label>
                                                                    <div class="col-sm-8">{{ $item->nama }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Durasi </label>
                                                                    <div class="col-sm-8">{{ $item->durasi }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 ">Nilai </label>
                                                                    <div class="col-sm-8">{{ $item->nilai }}</div>
                                                                </div>
                                                        @endswitch
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        Score : @if ($item->score_verified == null )
                                                            {{ $item->score_submit }}
                                                            <form action="{{ action('CertifiedMemberController@updateScorePencapaian') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="form-group row">
                                                                        {{-- <label for="" class="col-sm-4">sks</label> --}}
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                                                                            <input type="text" name="jenis_pencapaian" value="{{ $item->jenis_pencapaian }}" hidden>
                                                                            <input type="text" name="score_submit" value="{{ $item->score_submit }}" hidden>
                                                                            {{-- <input type="text" name="sks" class="form-control" placeholder="sks"> --}}
                                                                        </div>
                                                                      </div>
                                                                      <button type="submit" class="btn btn-primary">Verifikasi</button> 
                                                                </div>
                                                            </form>
                                                            @else
                                                            {{ $item->score_verified }}
                                                            <div><i class="fa fa-check"> </i><i>  Terverifikasi</i></div>
                                                            
                                                            @endif 

                                                    </div>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Notive</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form action="{{ action('CertifiedMemberController@insertNotive') }}" method="POST" id="notive">
                @csrf
                

                <input type="text" name="id" value="{{ $datauser->id }}"  hidden/>
                <div class="form-group row">
                    <label for="Notif" class="col-sm-3 col-form-label">Jenis Notifikasi</label>
                    <div class="col-sm-9">
                        <select name="kategori" class="custom-select" id="inputGroupSelect02">
                            <option selected>Choose...</option>
                            <option value="verifikasi">Pemberitahuan Lulus verifikasi Dokumen</option>
                            <option value="pembayaran">Pemberitahuan Upload Bukti Pembayaran</option>
                            <option value="tempat ujian">Pemberitahuan Tempat Ujian</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Judul Notif</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>
                    {{-- Text Editor Notive --}}
                    <div id="editor" style="min-height: 8rem">
                    
                    </div>
                    <textarea name="body" id="inputbody" cols="30" rows="10" style="display: none"></textarea>

                <div class="form-grup row mt-4">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-3 text-end">
                        <input class="btn btn-primary btn-sm" type="submit" value="Submit" />
                    </div>    
                </div> 
                    
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let options=[
        ["bold","italic","underline","strike"],
        [{header:[1,2,3,4,5,6,false]}],
        [{list:"ordered"},{list:"bullet"}],
        [{script:"sub"},{script:"super"}],
        [{indent:"+1"},{indent:"-1"}],
        [{align:[]}],
        [{size:["small","large","huge",false]}],
        ["image","link","video",'formula'],
    ]
    console.log("nama saya");
    var quill = new Quill('#editor', {
        modules:{
            toolbar : options,
        },
        theme: 'snow'
    });

    // console.log($("#editor").children().html());

    $("#notive").on("submit",function(){
        $("#inputbody").val($("#editor .ql-editor").html());
    })

    $("#konfirmasi_score").click(function(){
        console.log("konfirmasi");
        var id = {!! $datauser->id !!} ;
        console.log(id);
        console.log($("#nilai_akhir").data("value"));
        var score =  $("#nilai_akhir").data("value");

        // console.log(`{{ url('/admin/konfirmasi-nilai/id=${id}&score=${score}') }}`);

         $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : id,
                "score" :score
            },
            type: "POST",
            url: `{{ url('/admin/konfirmasi-nilai') }}`,
            async: false
        }).responseText
    })
</script>
@endsection
