@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Verifikasi Data User')
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
                                        <p class="card-text">{{ $datauser->email }}</p>
                                        <p class="card-text">{{ $datauser->alamat }}</p>
                                        <div class="row">
                                            <label class="col-sm-6 ">Status :</label>                                            
                                            <div class="col-sm-6">{{ $status->deskripsi }}</div>                                            
                                        </div>
                                        

                                        @if ($datauser->certified_status < 4)
                                            <div class="row">
                                                <label class="col-sm-6 ">Score Verifikasi :</label>                                            
                                                <div class="col-sm-6" id="nilai_akhir" data-value="{{ $score }}" >{{ $score }}
                                                    
                                                      
                                                                                       
                                            </div>
                                            <select id="tingkat" class="form-select col-sm-6" aria-label="Default select example">
                                                     
                                                <option value="muda" selected>Muda</option>
                                                <option value="madya">Madya</option>
                                                <option value="utama">Utama</option>
                                              </select>
                                              

                                            <a href="#" class="btn btn-primary mb-3" id="konfirmasi_score"> Konfirmasi Score</a>  </div> 
                                        @else
                                            <div class="row">
                                                <label class="col-sm-6 ">Score Verifikasi :</label>                                            
                                                <div class="col-sm-6" id="nilai_akhir" data-value="{{ $score }}" >{{ $score }}</div>                                      
                                            </div>
                                        @endif

                                     
                                        
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

                                                                @if ($datauser->certified_status < 4)
                                                                    <div  class="reset-nilai" data-id="{{ $item->id }}" data-aksi="pendidikan" style="cursor: pointer"><i class="fa fa-trash" style="font-size: 2rem; color:red"></i>Reset Nilai</div>        
                                                                @endif
                                                            
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
                                                                @if ($datauser->certified_status < 4)
                                                                    <div  class="reset-nilai" data-id="{{ $item->id }}" data-aksi="pengalaman" style="cursor: pointer"><i class="fa fa-trash" style="font-size: 2rem; color:red"></i>Reset Nilai</div>        
                                                                @endif
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

                                                                @if ($datauser->certified_status < 4)
                                                                    <div  class="reset-nilai" data-id="{{ $item->id }}" data-aksi="pelatihan" style="cursor: pointer"><i class="fa fa-trash" style="font-size: 2rem; color:red"></i>Reset Nilai</div>        
                                                                @endif
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
                                                                @if ($datauser->certified_status < 4)
                                                                    <div  class="reset-nilai" data-id="{{ $item->id }}" data-aksi="pencapaian" style="cursor: pointer"><i class="fa fa-trash" style="font-size: 2rem; color:red"></i>Reset Nilai</div>        
                                                                @endif
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
   

    $("#konfirmasi_score").click(function(){
        console.log("konfirmasi");
        var id = {!! $datauser->id !!} ;
        var nama = data.nama;
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
                "nama"  : nama,
                "score" : score,
                "tingkat" : tingkat
            },
            type: "POST",
            url: `{{ url('/admin/konfirmasi-nilai') }}`,
            async: false
        }).responseText
        location.reload(); 
    })

    $(".reset-nilai").click(function(){
        console.log($(this).attr("data-id"));
        console.log($(this).attr("data-aksi"));
        var reset_id = $(this).attr("data-id");
        var reset_aksi = $(this).attr("data-aksi");

        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "id"    : reset_id,
                "aksi" : reset_aksi
            },
            type: "POST",
            url: `{{ url('/admin/reset-nilai') }}`,
            async: false
        }).responseText
        location.reload(); 

    });

    
</script>
    
@endsection