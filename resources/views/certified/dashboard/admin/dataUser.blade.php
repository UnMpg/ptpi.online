@extends('layouts.certifiedDashboard.app')
@section('title-page', 'List Peserta Sertifikasi')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta Sertifikasi </h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="{{ action('CertifiedMemberController@listPesertaSertifikasi') }}" class="btn btn-sm btn-outline-secondary float-right">
                            <i class="fa fa-arrow-left"></i>
                        </a>                 
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

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
                                            <label class="col-sm-6 ">Status :</label>                                            
                                            <div class="col-sm-6">{{ $status->deskripsi }}</div>                                            
                                        </div>
                                        

                                        @if ($datauser->certified_status < 4)
                                            <div class="row">
                                                <label class="col-sm-6 ">Score Verifikasi :</label>
                                                <select id="tingkat" class="form-select col-sm-6" aria-label="Default select example">
                                                     
                                                    <option value="muda" selected>Muda</option>
                                                    <option value="madya">Madya</option>
                                                    <option value="utama">Utama</option>
                                                  </select>                                           
                                                <div class="col-sm-6" id="nilai_akhir" data-value="{{ $score }}" >{{ $score }}
                                                <a href="#" class="btn btn-primary mb-3" id="konfirmasi_score"> Konfirmasi Score</a>  </div>                                        
                                            </div>
                                        @else
                                            <div class="row">
                                                <label class="col-sm-6 ">Score Verifikasi :</label>                                            
                                                <div class="col-sm-6" id="nilai_akhir" data-value="{{ $score }}" >{{ $score }}</div>                                      
                                            </div>
                                        @endif


                                        @if ( $datauser->certified_status >= 7 )
                                            <div class="row jadwal">
                                                <label class="col-sm-6 ">Tanggal Ujian :</label>                                            
                                                <div class="col-sm-6" id="nilai_ujian" data-value="{{ $ujian->tanggal_ujian }}" >{{ $ujian->tanggal_ujian }}</div> 
                                                                                      
                                            </div>
                                        @else
                                            @if ($ujian == null)
                                                
                                                <div class="row jadwal">
                                                    <label class="col-sm-6 ">Pilihan Jadwal :</label>                                           
                                                                                          
                                                </div>
                                            @else
                                                <div class="row jadwal">
                                                    <label class="col-sm-6 ">Pilihan Jadwal :</label>                                            
                                                    <div class="col-sm-6" id="nilai_ujian" data-value="{{ $ujian->konfirmasi_ujian }}" >{{ $ujian->konfirmasi_ujian }} 
                                                    <a href="#" class="btn btn-primary mb-3" id="konfirmasi_ujian"> Konfirmasi Jadwal</a>  
                                                    </div>                                       
                                                </div>                                                
                                            @endif
                                            
                                        @endif

                                        @if ( $datauser->certified_status >= 7)
                                            <div class="row jadwal">
                                                <label class="col-sm-6 ">Score Ujian :</label>                                            
                                                <div class="col-sm-6" id="nilai_ujian" data-value="{{ $ujian->score_ujian }}" >{{ $ujian->score_ujian }}/100</div> 
                                                <label class="col-sm-6 ">Durasi Ujian :</label>                                            
                                                <div class="col-sm-6" id="nilai_ujian" data-value="{{ $ujian->lama_ujian }}" >{{ $ujian->lama_ujian }}
                                                    @if ($datauser->certified_status == 9)
                                                        <a href="#" class="btn btn-primary mb-3" id="konfirmasi_hasil_ujian"> Konfirmasi Hasil Ujian</a>
                                                    @endif
                                                </div> 
                                                    @if ($datauser->certified_status == 10)
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 " for="nilai"></label>
                                                            <div class="col-sm-10">
                                                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"> Pilih Jadwal Wawancara</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                            </div>
                                        @endif

                                        @if ($datauser->certified_status == 11)
                                            @if ($wawancara != null)
                                            <div class="row">
                                                <label class="col-sm-6 ">Jadwal Wawancara :</label> 
                                                <div class="col-sm-6" id="pilihan_wawancara" data-value="{{ $wawancara->konfirmasi_wawancara }}" >{{ $wawancara->konfirmasi_wawancara }} 
                                                
                                                    <a href="#" class="btn btn-primary mb-3" id="konfirmasi_wawancara"> Konfirmasi Jadwal</a>  
                                                </div>    
                                            </div>
                                            @endif
                                            
                                        @endif

                                        @if ($datauser->certified_status == 12)
                                        <div class="row">
                                            <label class="col-sm-6 ">Tanggal Wawancara :</label> 
                                            <div class="col-sm-6"  >{{ $wawancara->tanggal_wawancara }} 
                                             
                                            </div>    
                                        </div>
                                    @endif

                                        <a href="{{ action('CertifiedMemberController@downloadZipFile',$datauser->id) }}" class="btn btn-primary mb-3">Download Berkas</a>
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
                                                    Score Sementara : @if ($item->score_verified == null )
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
                                                                      <button type="submit" class="btn btn-primary">Langsung Verifikasi</button> 

                                                                      

                                                                </div>
                                                            </form>
                                                            <div class="edit-score">

                                                            </div>
                                                            
                                                            <input type="text" data-e="27" id="score-verifikasi-pengalaman-{{ $item->id }}" name="" style="padding: 5px;margin-bottom:5px;" >
                                                            <button data-aksi="pengalaman" data-id="{{ $item->id }}" class="btn btn-primary edit-score-nilai">Verifikasi Input</button>
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
                                                        Score Sementara : @if ($item->score_verified == null )
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

                                                            <input type="text" data-e="27" id="score-verifikasi-pelatihan-{{ $item->id }}" name="" style="padding: 5px;margin-bottom:5px;" >
                                                            <button data-aksi="pelatihan" data-id="{{ $item->id }}" class="btn btn-primary edit-score-nilai">Verifikasi Input</button>
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
                                                        Score Sementara : @if ($item->score_verified == null )
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
                                                            <input type="text" data-e="27" id="score-verifikasi-pencapaian-{{ $item->id }}" name="" style="padding: 5px;margin-bottom:5px;" >
                                                            <button data-aksi="pencapaian" data-id="{{ $item->id }}" class="btn btn-primary edit-score-nilai">Verifikasi Input</button>
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
                    
                
                    
                </div>
            </div>
        </div>
    </div>
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
                            <select name="kategori" class="custom-select jenis_notive" id="inputGroupSelect02">
                                <option selected value="">Choose...</option>
                                @if ($datauser->certified_status >= 4)
                                <option value="lulus_verifikasi">Pemberitahuan Lulus Verifikasi Dokumen</option>
                                <option value="tidak_lulus_verifikasi">Pemberitahuan Tidak Lulus Verifikasi Dokumen</option>
                                @endif                            
                                @if ($datauser->certified_status >= 5)
                                <option value="konfirmasi_ujian">Konfirmasi Ujian Tulis</option>
                                <option value="lulus_ujian">Pengumuman Lulus Ujian Tulis</option>
                                <option value="tidak_lulus_ujian">Pengumuman Tidak Lulus Ujian Tulis</option>
                                @endif                            
                                @if ($datauser->certified_status >= 10)
                                <option value="jadwal_wawancara">Pilih Jadwal Wawancara</option>
                                @endif
                                
                            </select>
                        </div>
                    </div>
                    <div class="add-form">
                        
                    </div>
                    <div class="form-group row">
                        <label for="Title" class="col-sm-3 col-form-label">Judul Notif</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control title_notive" id="title" placeholder="Title">
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input class="btn btn-primary btn-sm" id="generate" value="Aksi" />
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
    let aksi ;
    let data_id;
    let data_score;
    data_score = $(`#score-verifikasi-${aksi}-${data_id}`).attr("data-e");
    $('.edit-score-nilai').click(function(){
        aksi = $(this).attr("data-aksi");
        data_id = $(this).attr("data-id");
        data_score = $(`#score-verifikasi-${aksi}-${data_id}`).val();
        console.log(aksi);
        console.log(data_id);
        console.log(data_score);

        $.ajax({
            url : "{{ url('/sertifikasi/verifikasi-score') }}",
            data : {
                "_token": "{{ csrf_token() }}",
                "id" : data_id,
                "aksi" : aksi,
                "data_score" : data_score,
                },
            type : 'POST',
            dataType : 'json',
            success : function(result){
                console.log("===== " + result + " =====");
                if(confirm(`Score berhasil di update`)){
                    window.location.reload();  
                }
                // console.log(result);
                // $(".jadwal-ujian").html(result.split("-").reverse().join("-"));
                
            }
        });
    });

    const data = {!! $datauser !!}
    console.log(data);
    let jenisNotifikasi = "";
    let pilihanTanggal1 ;
    let pilihanTanggal2 ;
    let pilihanTanggal3 ;
    let jenis;
    let lulus_verifikasi = `<p>Kepada Yth, <strong> ${data.nama}</strong></p><p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Selamat anda dinyatakan <strong><em>LULUS</em></strong> tahapan verifikasi dengan potensi level teknik pelayanan kesehatan <strong><em>MUDA</em></strong>.</p><p>Selanjutnya dimohon mengunduh invoice pembayaran pada link berikut : <a href="Invoice Pembayaran" target="_blank">Invoice Pembayaran</a></p><p>Informasi lebih lanjut dapat menghubungi kami di Siti 081295994863 </p><p>Sekian, terimakasih.</p>`;
    let tidak_lulus_verifikasi =`<p>Kepada Yth, <strong> ${data.nama}</strong></p><p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
    let konfirmasi_ujian = `<p>Kepada Yth,  <strong> ${data.nama}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><ol><li id="pil1" class="pil1">${pilihanTanggal1}<br></li><li>${pilihanTanggal2}<br></li><li>${pilihanTanggal3}<br></li></ol><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
    let lulus_ujian = `<p>Kepada Yth, <strong> ${data.nama}</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis. Selamat anda dinyatakan <strong><em>Lulus</em></strong> ke tahap selanjutnya yaitu <strong><em>Wawancara</em></strong>, Detail hasil uji tulis sebagai berikut:</p><p>		Media uji tulis	: Online/offline</p><p>		Nilai Uji tulis		: Nilai</p><p>Selanjutnya dimohon melakukan kofirmasi jadwal uji wawancara pada link berikut: <a href="https://www.iahe.or.id/" target="_blank"><strong><em>Jadwal Wawancara</em></strong></a></p><p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p><p>Sekian, terimakasih.</p>`;
    let tidak_lulus_ujian = `<p>Kepada Yth, <strong> ${data.nama}</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p><p>Sekian, terimakasih.</p>`;
    $('.jenis_notive').change(function(){
        console.log($(this).val());
        jenis = $(this).val(); 
        if (jenis == 'lulus_verifikasi') {
            $('.title_notive').attr('value','LULUS Verifikasi');
            $(".isi-form").remove();
            jenisNotifikasi = lulus_verifikasi;
            // $(".ql-editor").html(lulus_verifikasi);
        }else if (jenis == 'tidak_lulus_verifikasi') {
            $('.title_notive').attr('value','Tidak LULUS Verifikasi');
            $(".isi-form").remove();
            jenisNotifikasi = tidak_lulus_verifikasi;
            // $(".ql-editor").html(tidak_lulus_verifikasi);
        }else if (jenis == 'konfirmasi_ujian') {
            // jenisNotifikasi = konfirmasi_ujian;
            var add_konfirmasi = `
                <div class="isi-form">
                <div class="form-group row">
                    <label for="tanggal 1" class="col-sm-3 col-form-label">Pilihan Tanggal 1</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal1" class="form-control title_notive" id="PilihanTanggal1" placeholder="PilihanTanggal1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Pilihan Tanggal 2</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal2" class="form-control title_notive" id="PilihanTanggal2" placeholder="PilihanTanggal2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pilihan Tanggal" class="col-sm-3 col-form-label">Pilihan Tanggal 3</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal3" class="form-control title_notive" id="PilihanTanggal3" placeholder="PilihanTanggal3">
                    </div>
                </div>
                </div>`;
            $('.title_notive').attr('value','Konfirmasi Ujian');

            $(".add-form").append(add_konfirmasi);

            // $(".ql-editor").html(konfirmasi_ujian);
        }else if (jenis == 'lulus_ujian') {
            $('.title_notive').attr('value','LULUS Ujian');
            jenisNotifikasi = lulus_ujian;
            $(".isi-form").remove();
            // $(".ql-editor").html(lulus_ujian);
        }else if (jenis == 'tidak_lulus_ujian') {
            $('.title_notive').attr('value','Tidak LULUS Ujian');
            jenisNotifikasi = tidak_lulus_ujian;
            $(".isi-form").remove();
            // $(".ql-editor").html(tidak_lulus_ujian);
        }
        else if (jenis == 'jadwal_wawancara') {
            var add_wawancara = `
                <div class="isi-form">
                <div class="form-group row">
                    <label for="tanggal 1" class="col-sm-3 col-form-label">Pilihan Tanggal 1</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal1" class="form-control title_notive" id="PilihanTanggal1" placeholder="PilihanTanggal1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu1" class="form-control title_notive" id="pilihanTanggal1_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu2" class="form-control title_notive" id="pilihanTanggal1_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Pilihan Tanggal 2</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal2" class="form-control title_notive" id="PilihanTanggal2" placeholder="PilihanTanggal2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu1" class="form-control title_notive" id="pilihanTanggal2_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu2" class="form-control title_notive" id="pilihanTanggal2_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pilihan Tanggal" class="col-sm-3 col-form-label">Pilihan Tanggal 3</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal3" class="form-control title_notive" id="PilihanTanggal3" placeholder="PilihanTanggal3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu1" class="form-control title_notive" id="pilihanTanggal3_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu2" class="form-control title_notive" id="pilihanTanggal3_waktu2" placeholder="Jam">
                    </div>
                </div>
                </div>`;
            $('.title_notive').attr('value','Jadwal Wawancara');

            $(".add-form").append(add_wawancara);

        } else {
            console.log("tidak ada kontent");
        }
        
    });

    // $(".isi-form").on("change","#PilihanTanggal2",function(){
    //     console.log($("#PilihanTanggal2").val());
    // })
        

    $("#generate").click(function(){

        if (jenis == 'konfirmasi_ujian') {
            pilihanTanggal1 = $("#PilihanTanggal1").val().split("-").reverse().join("-");
            pilihanTanggal2 = $("#PilihanTanggal2").val().split("-").reverse().join("-");
            pilihanTanggal3 = $("#PilihanTanggal3").val().split("-").reverse().join("-");
            console.log("ada deh");
            jenisNotifikasi = `<p>Kepada Yth,  <strong> ${data.nama}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><ol><li id="pil1" class="pil1">${pilihanTanggal1}<br></li><li>${pilihanTanggal2}<br></li><li>${pilihanTanggal3}<br></li></ol><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        }else if(jenis == 'jadwal_wawancara'){
            pilihanTanggal1 = $("#PilihanTanggal1").val().split("-").reverse().join("-");
            pilihanTanggal1_waktu1 = $("#pilihanTanggal1_waktu1").val();
            pilihanTanggal1_waktu2 = $("#pilihanTanggal1_waktu2").val();
            pilihanTanggal2 = $("#PilihanTanggal2").val().split("-").reverse().join("-");
            pilihanTanggal2_waktu1 = $("#pilihanTanggal2_waktu1").val();
            pilihanTanggal2_waktu2 = $("#pilihanTanggal2_waktu2").val();
            pilihanTanggal3 = $("#PilihanTanggal3").val().split("-").reverse().join("-");
            pilihanTanggal3_waktu1 = $("#pilihanTanggal3_waktu1").val();
            pilihanTanggal3_waktu2 = $("#pilihanTanggal3_waktu2").val();

            console.log(pilihanTanggal3_waktu2);
            console.log(pilihanTanggal3);

            jenisNotifikasi = `<p>Kepada Yth,  <strong> ${data.nama}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><p>
                1. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu1}<br>
                2. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu2}<br>
                3. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu1}<br>
                4. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu2}<br>
                5. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu1}<br>
                6. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu2}<br>
            </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        }
        
        else{
            console.log("tidak");
        }
        // console.log(pilihanTanggal1);
        $(".ql-editor").html(jenisNotifikasi);
    });

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
        var tingkat = $('#tingkat option:selected').val();

        console.log(tingkat);

        // console.log(`{{ url('/admin/konfirmasi-nilai/id=${id}&score=${score}') }}`);

         $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : id,
                "score" : score,
                "tingkat" : tingkat
            },
            type: "POST",
            url: `{{ url('/admin/konfirmasi-nilai') }}`,
            async: false
        }).responseText
        location.reload(); 
    })

    $("#konfirmasi_ujian").click(function(){
        console.log("konfirmasi");
        var id = {!! $datauser->id !!} ;
        console.log(id);
        console.log($("#nilai_ujian").data("value"));
        var konfirmasi_ujian =  $("#nilai_ujian").data("value");

        // console.log(`{{ url('/admin/konfirmasi-nilai/id=${id}&score=${score}') }}`);

        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : id,
                "konfirmasi_ujian" :konfirmasi_ujian
            },
            type: "POST",
            url: `{{ url('/sertifikasi/konfirmasi-ujian') }}`,
            async: false
        }).responseText;
        location.reload(); 
        
        // console.log(responseText);
    })

    $("#konfirmasi_hasil_ujian").click(function(){
        var id = {!! $datauser->id !!} ;
        console.log(id);

        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : id
            },
            type: "POST",
            url: `{{ url('/sertifikasi/konfirmasi-hasil-ujian') }}`,
            async: false
        }).responseText;
        location.reload(); 
        // console.log(responseText);
    })

    $("#konfirmasi_wawancara").click(function(){
        // console.log("konfirmasi");
        var id = {!! $datauser->id !!} ;
        console.log(id);
        console.log($("#nilai_ujian").data("value"));
        var konfirmasi_wawancara =  $("#pilihan_wawancara").data("value");

        // console.log(`{{ url('/admin/konfirmasi-nilai/id=${id}&score=${score}') }}`);

        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : id,
                "konfirmasi_wawancara" :konfirmasi_wawancara
            },
            type: "POST",
            url: `{{ url('/sertifikasi/konfirmasi-wawancara') }}`,
            async: false
        }).responseText;
        location.reload(); 
        // console.log(responseText);
    })
</script>
    
@endsection