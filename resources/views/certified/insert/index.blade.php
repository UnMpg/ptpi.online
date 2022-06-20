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

              @if (auth('certified')->user()->status == Null)


                <form id="regForm" method="POST" action="{{ action('CertifiedMemberController@insertDataAction') }}" enctype="multipart/form-data">
                  @csrf
                    <div style="" class="header-step">
                        <div class="step"><p>Data diri</p> </div>
                        <div class="step"><p>Pendidikan</p> </div>
                        <div class="step"><p>Pengalaman Kerja</p></div>
                        <div class="step"><p>Pencapaian</p></div>
                        
                      </div>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                              <div class="rata-tengah">
                              <div class="card upload-foto"  >
                                <img class="img-upload" src="{{ asset('assets/dashboard/img/default.jpg') }}" alt="Card image cap" id="output">
                                <div class="card-body">
                                  <h5 class="card-title">Upload Foto</h5>
                                  <input type="file" name="foto" accept="image/*" class="" onchange="loadFile(event)" style="border: none; padding-top:20px;">
                                  
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="Nama">Nama<span class="text-danger"> *</span></label>
                              <input type="text" name="nama" class="form-control" id="nama" value="{{ auth('certified')->user()->nama }}" disabled>
                              <label for="Email">Email<span class="text-danger"> *</span></label>
                              <input type="email" name="email" class="form-control" id="email" value="{{ auth('certified')->user()->email }}" disabled>
                              <label for="Tempat Lahir">Tempat Lahir<span class="text-danger"> *</span></label>
                              <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" >
                              <label for="Tanggal Lahir">Tanggal Lahir<span class="text-danger"> *</span></label>
                              <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" >
                              <label for="exampleFormControlSelect1">Jenis Kelamin<span class="text-danger"> *</span></label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option value="">-- Jenis Kelamin --</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                              </select>
                              <label for="No Telpon">No Telpon<span class="text-danger"> *</span></label>
                              <input type="number" name="telp" class="form-control" id="telp" onkeypress="return hanyaAngka(event)" >
                              
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Alamat<span class="text-danger"> *</span></label>
                                <textarea name="alamat" class="form-control" id="alamat" placeholder=""> </textarea>
                            </div>
                            

                            
                    </div>
                    <div class="tab">
                          <div class="col-md-12 " id="dynamic_form" data-id="pendidikan">
                            <div class="baru-data">
                            <div class="form-group row">
                                <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                <select name="pendidikan[]" class="form-control" id="exampleFormControlSelect2" >
                                  <option value="">-- Pendidikan --</option>
                                  <option value="s1">S1 - Sarjana</option>
                                  <option value="s2">S2</option>
                                  <option value="s3">S3</option>
                                </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Universitas[]" class="col-sm-2 col-form-label">Universitas</label>
                                <div class="col-sm-10">
                                  <input name="universitas[]" type="text" class="form-control" id="inputPassword3"  placeholder="Universitas">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                  <input name="jurusan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jurusan">
                                </div>
                              </div>

                              <div class="button-group ">
                                <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                            </div>
                          </div>
                          </div>
                      
                    </div>
                    <div class="tab">
                      <div class="col-md-12 " id="dynamic_pengalaman" data-id="pengalaman">
                        <div class="data-pengalaman">
                          <div class="form-group row">
                            <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                              <input name="jabatan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jabatan">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
                            <div class="col-sm-10">
                              <input name="institusi[]" type="text" class="form-control" id="inputPassword3"  placeholder="Institusi">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Lama Bekerja" class="col-sm-2 col-form-label">Masa Kerja</label>
                            <div class="col-sm-10">
                              <input name="lama_bekerja[]" type="text" class="form-control" id="inputPassword3"  placeholder="Masa Kerja">
                            </div>
                          </div>

                          <div class="button-group ">
                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="tab">
                      <div class="col-md-12 " id="dynamic_pencapaian" data-id="pencapaian">
                        <div class="data-pencapaian">
                          <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input name="nama_pencapaian[]" type="text" class="form-control" id="inputPassword3"  placeholder="Nama">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleFormControlSelect3" class="col-sm-2 col-form-label">Jenis Pencapaian</label>
                            <div class="col-sm-10">
                            <select name="jenis_pencapaian[]" class="form-control" id="exampleFormControlSelect3" >
                              <option value="">-- Jenis Pencapaian --</option>
                              <option value="Ketua Proyek Berhasil (100jt)">Ketua Proyek Berhasil (100jt)</option>
                              <option value="Anggota Proyek Berhasil (100jt)">Anggota Proyek Berhasil (100jt)</option>
                              <option value="FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL TIDAK TERINDEKS">FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL TIDAK TERINDEKS</option>
                              <option value="FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL TERINDEKS SCOPUS">FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL TERINDEKS SCOPUS</option>
                              <option value="FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL Q2/Q1">FIRST/CORES AUTHOR : MAKALAH PROCEEDING/JURNAL Q2/Q1</option>
                              <option value="MAIN INVENTOR HAK CIPTA">MAIN INVENTOR HAK CIPTA</option>
                              <option value="NON MAIN INVENTOR HAK CIPTA">NON MAIN INVENTOR HAK CIPTA</option>
                              <option value="NON MAIN INVENTOR PATENT">NON MAIN INVENTOR PATENT</option>
                              <option value="PEMBICARA INTERNASIONAL">PEMBICARA INTERNASIONAL</option>
                              <option value="PEMBICARA NASIONAL">PEMBICARA NASIONAL</option>
                              <option value="MODERATOR INTERNASIONAL">MODERATOR INTERNASIONAL</option>
                              <option value="MODERATOR NASIONAL">MODERATOR NASIONAL</option>
                              <option value="PRODUK TERPASARKAN (100 JUTA)">PRODUK TERPASARKAN (100 JUTA)</option>
                              <option value="PRODUK DI PABRIKASI (100 JUTA)">PRODUK DI PABRIKASI (100 JUTA)</option>
                              <option value="KONSULTASI DIBERIKAN (100 JUTA)">KONSULTASI DIBERIKAN (100 JUTA)</option>
                              <option value="PELATIHAN YANG DIBERIKAN (100 JAM)">PELATIHAN YANG DIBERIKAN (100 JAM)</option>
                            </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Durasi" class="col-sm-2 col-form-label">Rentang Waktu/Durasi</label>
                            <div class="col-sm-10">
                              <input name="lama_pencapaian[]" type="text" class="form-control" id="inputPassword3"  placeholder="Durasi">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="Nilai" class="col-sm-2 col-form-label">Nilai (RP)</label>
                            <div class="col-sm-10">
                              <input name="nilai_pencapaian[]" type="text" class="form-control" id="inputPassword3"  placeholder="Nilai Pencapaian">
                            </div>
                          </div>

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
                    <h5>Terima Kasih anda telah melengkapi data anda</h5>
                  @endif
            </div>
        </div>
        
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
<script>
  function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


  
  
</script>