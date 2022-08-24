@extends('layouts.dashboard.app')
@section('title-page', 'Insert Data')
@section('title-header', 'Insert Data')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="insert-data">
            <div class="row">

              @if (auth('certified')->user()->certified_status == Null || auth('certified')->user()->certified_status == "1" )


                <form id="regForm" class="" method="POST" action="{{ action('CertifiedMemberController@insertDataAction') }}" enctype="multipart/form-data">
                  @csrf
                    <div style="" class="header-step ">
                        <div class="step"><p>Data diri</p> </div>
                        <div class="step"><p>Pendidikan</p> </div>
                        <div class="step"><p>Pelatihan</p> </div>
                        <div class="step"><p>Pengalaman Kerja</p></div>
                        <div class="step"><p>Pencapaian</p></div>
                        
                      </div>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="form-row">
                          <div class="form-group col-md-6 ">
                            <label for="Nama">Nama Lengkap Beserta Gelar<span class="text-danger"> *</span></label>
                            <input type="text" name="nama_gelar" class="form-control" id="nama" >
                            <label for="Tempat Lahir">Tempat Lahir<span class="text-danger"> *</span></label>
                            <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" >
                            <label for="Tanggal Lahir">Tanggal Lahir<span class="text-danger"> *</span></label>
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" >
                            <label for="exampleFormControlSelect1">Jenis Kelamin<span class="text-danger"> *</span></label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                              <option value="">-- Jenis Kelamin --</option>
                              <option value="l">Laki-laki</option>
                              <option value="p">Perempuan</option>
                            </select>
                            {{-- <div class="rata-tengah">
                            <div class="card upload-foto"  >
                              <img class="img-upload" src="{{ asset('assets/dashboard/img/default.jpg') }}" alt="Card image cap" id="output">
                              <div class="card-body">
                                <h5 class="card-title">Upload Foto</h5>
                                <input type="file" name="foto" accept="image/*" class="" onchange="loadFile(event)" style="border: none; padding-top:20px;">
                                
                              </div>
                            </div>
                          </div> --}}
                          </div>
                          <div class="form-group col-md-6">                              
                            <label for="Email">Email<span class="text-danger"> *</span></label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ auth('certified')->user()->email }}" disabled>
                            <label for="No Telpon">No KTP/Passpor <span class="text-danger"> *</span></label>
                            <input type="number" name="ktp_passpor" class="form-control" id="telp" onkeypress="return hanyaAngka(event)" >
                            <label for="No Telpon">No Telpon<span class="text-danger"> *</span></label>
                            <input type="number" name="telp" class="form-control" id="telp" onkeypress="return hanyaAngka(event)" >
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Alamat Domisili<span class="text-danger"> *</span></label>
                            <textarea name="alamat" class="form-control" id="alamat" placeholder=""> </textarea>
                        </div>                        
                    </div>
                    {{-- pendidikan --}}
                    <div class="tab">
                          <div class="col-md-12 " id="dynamic_form" data-id="pendidikan">
                            <div class="baru-data">
                              <div class="form-group row">
                                <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                <select name="pendidikan[]" class="form-control" id="exampleFormControlSelect2" >
                                  <option value="">-- Pendidikan --</option>
                                  <option value="s1">S1 - Sarjana</option>
                                  <option value="s2">S2 - Magister</option>
                                  <option value="s3">S3 - Doktor</option>
                                </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Universitas" class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                                <div class="col-sm-10">
                                  <input name="universitas[]" type="text" class="form-control" id="inputPassword3"  placeholder="Perguruan Tinggi">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="jurusan" class="col-sm-2 col-form-label">Program Studi</label>
                                <div class="col-sm-10">
                                  <input name="jurusan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Program Studi">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-md-6 ">
                                  <div class="form-group row">                       
                                    <label for="Tahun Masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
                                    <div class="col-sm-8">
                                      <input name="tahun_masuk[]" type="date" class="form-control" id="inputPassword3"  >
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">                              
                                  <div class="form-group row">                       
                                    <label for="Tahun Lulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
                                    <div class="col-sm-8">
                                      <input name="tahun_lulus[]" type="date" class="form-control" id="inputPassword3" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="button-group ">
                                <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                            </div>
                          </div>
                        </div>
                    </div>
                    {{-- pelatihan --}}
                    <div class="tab">
                      <div class="col-md-12 " id="dynamic_pelatihan" data-id="pelatihan">
                        <div class="data-pelatihan">
                          <div class="form-group row">
                            <label for="Nama Pelatihan" class="col-sm-2 col-form-label">Nama Pelatihan</label>
                            <div class="col-sm-10">
                              <input name="pelatihan_nama[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jabatan">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
                            <div class="col-sm-10">
                              <input name="pelatihan_institusi[]" type="text" class="form-control" id="inputPassword3"  placeholder="Institusi Pelatihan">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Tanggal Pelatihan" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                              <input name="pelatihan_tanggal[]" type="text" class="form-control" id="inputPassword3"  placeholder="Masa Kerja">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Pelatihan Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam </label>
                            <div class="col-sm-10">
                              <input name="pelatihan_durasi[]" type="text" class="form-control" id="inputPassword3"  placeholder="Durasi dalam Jam">
                            </div>
                          </div>

                          <div class="button-group ">
                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    {{-- pengalaman --}}
                    <div class="tab">
                      <div class="col-md-12 " id="dynamic_pengalaman" data-id="pengalaman">
                        <div class="data-pengalaman">
                          <div class="form-group row">
                            <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan/Posisi</label>
                            <div class="col-sm-10">
                              <input name="pengalaman_jabatan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jabatan/Posisi">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleFormControlSelect5" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
                            <div class="col-sm-10">
                            <select name="pengalaman_jenis[]" class="form-control" id="exampleFormControlSelect5" >
                              <option value="">-- Jenis Pekerjaan --</option>
                              <option value="teknik">Teknik</option>
                              <option value="manajemen">Manajemen</option>
                              <option value="admin">Admin</option>
                            </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
                            <div class="col-sm-10">
                              <input name="pengalaman_institusi[]" type="text" class="form-control"  placeholder="Institusi">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam</label>
                            <div class="col-sm-10">
                              <input name="pengalaman_durasi[]" type="text" class="form-control"  placeholder="Durasi dalam Jam">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="col-md-6 ">
                              <div class="form-group row">                       
                                <label for="Tahun Masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
                                <div class="col-sm-8">
                                  <input name="pengalaman_tahunawal[]" type="date" class="form-control"   >
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">                              
                              <div class="form-group row">                       
                                <label for="Tahun Lulus" class="col-sm-4 col-form-label">Sampai</label>
                                <div class="col-sm-8">
                                  <input name="pengalaman_tahunakhir[]" type="date" class="form-control"  >
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="button-group ">
                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- Pencapaian --}}
                    <div class="tab">
                      <div class="col-md-12 " id="dynamic_pencapaian" data-id="pencapaian">
                        <div class="data-pencapaian">

                          <div class="form-group row">
                            <label for="jenis_pencapain" class="col-sm-2 col-form-label">Jenis Pencapaian</label>
                            <div class="col-sm-10">
                            <select name="jenis_pencapaian[]" class="form-control jenis-pencapaian" id="jenis_pencapain">
                              <option value="">-- Jenis Pencapaian --</option>
                              <option value="proyek" onclick="formProyek()">PROYEK</option>
                              <option value="publikasi" onclick="formPublikasi()">PUBLIKASI</option>
                              <option value="haki" onclick="formHaki()">HAKI/PRODUK</option>
                              <option value="penghargaan" onclick="formPenghargaan()">PENGHARGAAN</option>
                              <option value="pengabdian" onclick="formPengabdian()">PENGABDIAN MASYARAKAT/ KEORGANISASIAN PROFESI</option>
                              <option value="pelatihan" onclick="formPelatihan()">PELATIHAN/ SEMINAR/ KOFERENSI</option>
                            </select>
                            </div>
                          </div>

                          <div class="form-pencapaian" id="form_pencapaian"></div>


                          <div class="button-group ">
                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div style="overflow:auto;">
                      <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                      </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    
                  </form>
                  
                  @else
                    <h5>Terima Kasih anda telah melengkapi data anda </h5>
                  @endif
            </div>
        </div>
        
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

@section('script')
<script>
  let count_form = 1;

  function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

  function addPencapaian(){
    var pencapaian = `
    <div class="data-pencapaian">

      <div class="form-group row">
        <label for="jenis_pencapain" class="col-sm-2 col-form-label">Jenis Pencapaian</label>
        <div class="col-sm-10">
        <select name="jenis_pencapaian[]" class="form-control jenis-pencapaian" id="jenis_pencapain">
          <option value="">-- Jenis Pencapaian --</option>
          <option value="proyek" onclick="formProyek(${count_form})">PROYEK</option>
          <option value="publikasi" onclick="formPublikasi(${count_form})">PUBLIKASI</option>
          <option value="haki" onclick="formHaki(${count_form})">HAKI/PRODUK</option>
          <option value="penghargaan" onclick="formPenghargaan(${count_form})">PENGHARGAAN</option>
          <option value="pengabdian" onclick="formPengabdian(${count_form})">PENGABDIAN MASYARAKAT/ KEORGANISASIAN PROFESI</option>
          <option value="pelatihan" onclick="formPelatihan(${count_form})">PELATIHAN/ SEMINAR/ KOFERENSI</option>
        </select>
        </div>
      </div>

      <div class="form-pencapaian${count_form}"></div>


      <div class="button-group ">
        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
      </div>
      </div>
    `;

    $("#dynamic_pencapaian").append(pencapaian);
    count_form++;
  }

  $("#dynamic_pencapaian").on("click", ".btn-tambah", function(){
  addPencapaian();
  $(this).css("display","none")     
  var valtes = $(this).parent().find(".btn-hapus").css("display","");
  })


  $("#dynamic_pencapaian").on("click", ".btn-hapus", function(){
    $(this).parent().parent('.data-pencapaian').remove();
    var bykrow = $(".data-pencapaian").length;
    if(bykrow==1){
      $(".btn-hapus").css("display","none")
      $(".btn-tambah").css("display","");
    }else{
      $('.data-pencapaian').last().find('.btn-tambah').css("display","");
    }
  });

  function addPelatihan(){
    var pelatihan = `
    <div class="data-pelatihan">
      <div class="form-group row">
        <label for="Nama Pelatihan" class="col-sm-2 col-form-label">Nama Pelatihan</label>
        <div class="col-sm-10">
          <input name="pelatihan_nama[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jabatan">
        </div>
      </div>

      <div class="form-group row">
        <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
        <div class="col-sm-10">
          <input name="pelatihan_institusi[]" type="text" class="form-control" id="inputPassword3"  placeholder="Institusi Pelatihan">
        </div>
      </div>

      <div class="form-group row">
        <label for="Tanggal Pelatihan" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
          <input name="pelatihan_tanggal[]" type="text" class="form-control" id="inputPassword3"  placeholder="Masa Kerja">
        </div>
      </div>

      <div class="form-group row">
        <label for="Pelatihan Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam </label>
        <div class="col-sm-10">
          <input name="pelatihan_durasi[]" type="text" class="form-control" id="inputPassword3"  placeholder="Durasi dalam Jam">
        </div>
      </div>

      <div class="button-group ">
        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
      </div>
    </div>
    `;

    $("#dynamic_pelatihan").append(pelatihan);
  }

  $("#dynamic_pelatihan").on("click", ".btn-tambah", function(){
  addPelatihan()
  $(this).css("display","none")     
  var valtes = $(this).parent().find(".btn-hapus").css("display","");
  })


  $("#dynamic_pelatihan").on("click", ".btn-hapus", function(){
    $(this).parent().parent('.data-pelatihan').remove();
    var bykrow = $(".data-pelatihan").length;
    if(bykrow==1){
      $(".btn-hapus").css("display","none")
      $(".btn-tambah").css("display","");
    }else{
      $('.data-pelatihan').last().find('.btn-tambah').css("display","");
    }
  });

  // $("jenis-pencapain").on("click",function(){
  //   var action = $(this).val();
  //   console.log(action);
  // });

  function formProyek(count_form = ""){
    var proyek =`

    <div class="form-group row">
      <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan/Posisi</label>
      <div class="col-sm-10">
        <input name="pencapaian_jabatan[]" type="text" class="form-control"  placeholder="Jabatan/Posisi">
      </div>
    </div>

    <div class="form-group row">
      <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
      <div class="col-sm-10">
        <input name="pencapaian_institusi[]" type="text" class="form-control"  placeholder="Institusi">
      </div>
    </div>

    <div class="form-group row">
      <label for="Nilai" class="col-sm-2 col-form-label">Nilai Projek</label>
      <div class="col-sm-10">
        <input name="pencapaian_nilai[]" type="text" class="form-control"  placeholder="... jt">
      </div>
    </div>

    <div class="form-group row">
      <label for="Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam</label>
      <div class="col-sm-10">
        <input name="pencapaian_durasi[]" type="text" class="form-control"  placeholder="Durasi dalam Jam">
      </div>
    </div>
    

    <div class="form-row">
      <div class="col-md-6 ">
        <div class="form-group row">                       
          <label for="Tahun Masuk" class="col-sm-4 col-form-label">Tahun Mulai</label>
          <div class="col-sm-8">
            <input name="pencapaian_tahunawal[]" type="text" class="form-control"  >
          </div>
        </div>
      </div>                            
      <div class="col-md-6">                              
        <div class="form-group row">                       
          <label for="Tahun Lulus" class="col-sm-4 col-form-label">Tahun Selesai</label>
          <div class="col-sm-8">
            <input name="pencapaian_tahunakhir[]" type="text" class="form-control"  >
          </div>
        </div>
      </div>
    </div>

    <input name="pencapaian_tahun[]" type="text" class="form-control"  hidden>
    <input type="text" name="pencapaian_judul[]" hidden>
    <input type="text" name="pencapaian_penerbit[]" hidden>
    <input type="text" name="pencapaian_jenis[]" hidden>
    <input type="text" name="pencapaian_kualitas[]" hidden>
    <input type="text" name="pencapaian_nomor[]" hidden>
    <input type="text" name="pencapaian_status[]" hidden>
    <input type="text" name="pencapaian_peringkat[]" hidden>
    <input type="text" name="pencapaian_organisasi[]" hidden>
    <input type="text" name="pencapaian_tingkat[]" hidden>

    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    
    $(`.form-pencapaian`+count_form).append(proyek); 
  }

  function formPublikasi(count_form = ""){
    var publikasi = `
    <div class="form-group row">
      <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input name="pencapaian_judul[]" type="text" class="form-control"  placeholder="Judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="Jurnal" class="col-sm-2 col-form-label">Penerbit/Jurnal</label>
      <div class="col-sm-10">
        <input name="pencapaian_penerbit[]" type="text" class="form-control"  placeholder="Penerbit / Jurnal">
      </div>
    </div>

    <div class="form-group row">
      <label for="Kualitas" class="col-sm-2 col-form-label">Kualitas</label>
      <div class="col-sm-10">
      <select name="pencapaian_kualitas[]" class="form-control jenis-pencapaian" >
        <option value="">-- Kualitas --</option>
        <option value="google" >Goolge</option>
        <option value="scopus" >Scopus</option>
        <option value="q4" >Q4</option>
        <option value="q3" >Q3</option>
        <option value="q2" >Q2</option>
        <option value="q1" >Q1</option>
        <option value="lain" >Lainnya</option>
      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
      <div class="col-sm-10">
      <select name="pencapaian_jenis[]" class="form-control jenis-pencapaian" >
        <option value="">-- Jenis --</option>
        <option value="proceding" >Proceding</option>
        <option value="jurnal" >Jurnal</option>
      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input name="pencapaian_tahun[]" type="date" class="form-control"  placeholder="Tahun">
      </div>
    </div>

    <input type="text" name="pencapaian_jabatan[]" hidden>
    <input type="text" name="pencapaian_institusi[]" hidden>
    <input type="text" name="pencapaian_durasi[]" hidden>
    <input type="text" name="pencapaian_nilai[]" hidden>
    <input type="text" name="pencapaian_nomor[]" hidden>
    <input type="text" name="pencapaian_status[]" hidden>
    <input type="text" name="pencapaian_peringkat[]" hidden>
    <input type="text" name="pencapaian_organisasi[]" hidden>
    <input type="text" name="pencapaian_tingkat[]" hidden>

    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    $(`.form-pencapaian`+count_form).append(publikasi);
  }

  function formHaki(count_form = ""){
    var haki=`
    <div class="form-group row">
      <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input name="pencapaian_judul[]" type="text" class="form-control"  placeholder="Judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="Nomor" class="col-sm-2 col-form-label">Nomor</label>
      <div class="col-sm-10">
        <input name="pencapaian_nomor[]" type="text" class="form-control"  placeholder="Nomor">
      </div>
    </div>

    <div class="form-group row">
      <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
      <div class="col-sm-10">
      <select name="pencapaian_jenis[]" class="form-control " >
        <option value="">-- Jenis --</option>
        <option value="patent" >Patent</option>
        <option value="copyright" >Copyright</option>
      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input name="pencapaian_tahun[]" type="date" class="form-control"  placeholder="Tahun">
      </div>
    </div>

    <div class="form-group row">
      <label for="Status" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
      <select name="pencapaian_status[]" class="form-control " >
        <option value="">-- Status --</option>
        <option value="main" >Main</option>
        <option value="non main" >Non Main</option>
      </select>
      </div>
    </div>

    <input type="text" name="pencapaian_jabatan[]" hidden>
    <input type="text" name="pencapaian_institusi[]" hidden>
    <input type="text" name="pencapaian_durasi[]" hidden>
    <input type="text" name="pencapaian_nilai[]" hidden>
    <input type="text" name="pencapaian_penerbit[]" hidden>
    <input type="text" name="pencapaian_kualitas[]" hidden>
    <input type="text" name="pencapaian_peringkat[]" hidden>
    <input type="text" name="pencapaian_organisasi[]" hidden>
    <input type="text" name="pencapaian_tingkat[]" hidden>
    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    $(`.form-pencapaian`+count_form).append(haki);
  }


  function formPenghargaan(count_form = ""){
    var penghargaan = `
    <div class="form-group row">
      <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input name="pencapaian_judul[]" type="text" class="form-control"  placeholder="Judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
      <div class="col-sm-10">
        <input name="pencapaian_institusi[]" type="text" class="form-control"  placeholder="Institusi">
      </div>
    </div>

    <div class="form-group row">
      <label for="Peringkat" class="col-sm-2 col-form-label">Peringkat</label>
      <div class="col-sm-10">
        <input name="pencapaian_peringkat[]" type="text" class="form-control"  placeholder="Peringkat">
      </div>
    </div>

    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input name="pencapaian_tahun[]" type="date" class="form-control"  placeholder="Tahun">
      </div>
    </div>

    <input type="text" name="pencapaian_jabatan[]" hidden>
    <input type="text" name="pencapaian_durasi[]" hidden>
    <input type="text" name="pencapaian_nilai[]" hidden>
    <input type="text" name="pencapaian_penerbit[]" hidden>
    <input type="text" name="pencapaian_jenis[]" hidden>
    <input type="text" name="pencapaian_kualitas[]" hidden>
    <input type="text" name="pencapaian_nomor[]" hidden>
    <input type="text" name="pencapaian_status[]" hidden>
    <input type="text" name="pencapaian_organisasi[]" hidden>
    <input type="text" name="pencapaian_tingkat[]" hidden>
    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    $(`.form-pencapaian`+count_form).append(penghargaan);
  }

  function formPengabdian(count_form = ""){

    var pengabdian = `
    <div class="form-group row">
      <label for="Nama" class="col-sm-2 col-form-label">Nama Organisasi</label>
      <div class="col-sm-10">
        <input name="pencapaian_organisasi[]" type="text" class="form-control"  placeholder="Nama Organisasi">
      </div>
    </div>

    <div class="form-group row">
      <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
      <div class="col-sm-10">
        <input name="pencapaian_jabatan[]" type="text" class="form-control"  placeholder="Jabatan">
      </div>
    </div>

    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input name="pencapaian_tahun[]" type="date" class="form-control"  placeholder="Tahun">
      </div>
    </div>

    <div class="form-group row">
      <label for="Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam</label>
      <div class="col-sm-10">
        <input name="pencapaian_durasi[]" type="text" class="form-control"  placeholder="Durasi dalam Jam">
      </div>
    </div>

    <input type="text" name="pencapaian_institusi[]" hidden>
    <input type="text" name="pencapaian_nilai[]" hidden>
    <input type="text" name="pencapaian_penerbit[]" hidden>
    <input type="text" name="pencapaian_jenis[]" hidden>
    <input type="text" name="pencapaian_kualitas[]" hidden>
    <input type="text" name="pencapaian_nomor[]" hidden>
    <input type="text" name="pencapaian_status[]" hidden>
    <input type="text" name="pencapaian_peringkat[]" hidden>
    <input type="text" name="pencapaian_tingkat[]" hidden>
    <input type="text" name="pencapaian_judul[]" hidden>

    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    $(`.form-pencapaian`+count_form).append(pengabdian);
  }

  function formPelatihan(count_form = ""){
    var pelatihan =`
    <div class="form-group row">
      <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input name="pencapaian_judul[]" type="text" class="form-control"  placeholder="Judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
      <div class="col-sm-10">
      <select name="pencapaian_jenis[]" class="form-control " >
        <option value="">-- Jenis --</option>
        <option value="narasumber" >Narasumber</option>
        <option value="moderator" >Moderator</option>
        <option value="peserta" >Peserta</option>
      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="Tingkat" class="col-sm-2 col-form-label">Tingkat</label>
      <div class="col-sm-10">
      <select name="pencapaian_tingkat[]" class="form-control " >
        <option value="">-- Tingkat --</option>
        <option value="internasional" >Internasional</option>
        <option value="nasional" >Nasional</option>
      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input name="pencapaian_tahun[]" type="date" class="form-control"  placeholder="Tahun">
      </div>
    </div>

    <div class="form-group row">
      <label for="Durasi" class="col-sm-2 col-form-label">Durasi dalam Jam</label>
      <div class="col-sm-10">
        <input name="pencapaian_durasi[]" type="text" class="form-control"  placeholder="Durasi dalam Jam">
      </div>
    </div>

    <input type="text" name="pencapaian_jabatan[]" hidden>
    <input type="text" name="pencapaian_institusi[]" hidden>
    <input type="text" name="pencapaian_nilai[]" hidden>
    <input type="text" name="pencapaian_penerbit[]" hidden>
    <input type="text" name="pencapaian_kualitas[]" hidden>
    <input type="text" name="pencapaian_nomor[]" hidden>
    <input type="text" name="pencapaian_status[]" hidden>
    <input type="text" name="pencapaian_peringkat[]" hidden>
    <input type="text" name="pencapaian_organisasi[]" hidden>
    `;

    if($(`.form-pencapaian`+count_form).children().length > 0){
      $(`.form-pencapaian`+count_form).children().remove();
    }
    $(`.form-pencapaian`+count_form).append(pelatihan);
  }

</script>
@endsection
