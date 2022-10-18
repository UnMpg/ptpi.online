@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Penilaian Wawancara')
@section('content')

<div class="view-penilaian" id="view-penilaian"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                
                <div class="x_title">
                    <h2>Input Penilaian Wawancara : {{ $datauser->nama }} </h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="{{ action('CertifiedMemberController@listPesertaSertifikasi') }}" class="btn btn-sm btn-outline-secondary float-right">
                            <i class="fa fa-arrow-left"></i>
                        </a>                 
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    <div class="container">
                        <div class="form-penguji">
                            <h5 id="h5-judul"> Penguji</h5>
                            <br>
                            
                            <form method="POST" action="{{ action('CertifiedMemberController@insertPenilaianWawancara') }}">
                                @csrf
                                <input type="text" name="no_penguji"  class="form-control-plaintext" id="no-penguji" hidden>
                                <input type="text" name="id_user"  class="form-control-plaintext" id="id_user" value="{{ $datauser->id }}" hidden>
                                <div class="form-group row">
                                    <label for="Nama Penguji" class="col-sm-2 col-form-label">Nama Penguji</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_penguji" class="form-control" id="nama-penguji" >
                                    </div>
                                </div>

                                <table id="tables" class="table table-bordered table-striped">
                                    <tr>
                                        <td style="background-color: #88cff2;">Ijazah</td>
                                        <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                        <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                        <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                    </tr>
                                    
                                    @php
                                        $no_pendidikan = 1;
                                    @endphp
                                    @foreach ($pendidikan as $item)
                                    <tr>  
                                        <td>{{ $item->jenjang }} - {{ $item->jurusan }} </td>                                            
                                        <td >{{ $item->score_verified }}</td>
                                        <td> <input type="text" name="id_pendidikan[]" id="id_pendidikan_{{ $no_pendidikan }}" value="{{ $item->id }}" hidden > <input type="text" name="score_pendidikan[]" id="score_pendidikan_{{ $no_pendidikan }}" style="width: 18rem"> </td>
                                        <td>  <textarea  name="catatan_pendidikan[]" id="catatan_pendidikan_{{ $no_pendidikan }}" style="width: 18rem" rows="2"></textarea></td>
                                    </tr>
                                    @php
                                        $no_pendidikan++
                                    @endphp
                                    @endforeach
                                    
                                    <tr>
                                        <td style="background-color: #88cff2;">Sertifikasi/Pelatihan</td>
                                        <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                        <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                        <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                    </tr>
                                    
                                    @php
                                        $no_pelatihan = 1;
                                    @endphp
                                    @foreach ($pelatihan as $item)
                                    <tr>  
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->score_verified }}</td>
                                        <td> <input type="text" name="id_pelatihan[]" id="id_pelatihan_{{ $no_pelatihan }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pelatihan[]" id="score_pelatihan_{{ $no_pelatihan }}" style="width: 18rem"> </td>
                                        <td> <textarea name="catatan_pelatihan[]" id="catatan_pelatihan_{{ $no_pelatihan }}" style="width: 18rem" rows="2"></textarea> </td>
                                    </tr>
                                    @php
                                        $no_pelatihan++
                                    @endphp
                                    @endforeach

                                    <tr>
                                        <td style="background-color: #88cff2;">Pengalaman</td>
                                        <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                        <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                        <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                    </tr>
                                    @php
                                        $no_pengalaman = 1;
                                    @endphp
                                    @foreach ($pengalaman as $item)
                                    <tr>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->score_verified }}</td>
                                        <td> <input type="text" name="id_pengalaman[]" id="id_pengalaman_{{ $no_pengalaman }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pengalaman[]" id="score_pengalaman_{{ $no_pengalaman }}" style="width: 18rem"> </td>
                                        <td> <textarea name="catatan_pengalaman[]" id="catatan_pengalaman_{{ $no_pengalaman }}" style="width: 18rem" rows="2"></textarea> </td>
                                    </tr>
                                    @php
                                        $no_pengalaman++
                                    @endphp
                                    @endforeach

                                    <tr>
                                        <td style="background-color: #88cff2;">Pencapaian</td>
                                        <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                        <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                        <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                    </tr>
                                    
                                    @php
                                    $no_pencapaian = 1;
                                    @endphp
                                    @foreach ($pencapaian as $item)
                                        @if ($item->jenis_pencapaian == "proyek")
                                            <tr>
                                                <td class="h-3">Proyek - {{ $item->jabatan }}</td>
                                                <td class="h-3">{{ $item->score_verified }}</td>
                                                <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}"hidden > <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                                <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"></textarea> </td>
                                            </tr>
                                        @endif

                                        @if ($item->jenis_pencapaian == "publikasi")
                                            <tr>
                                                <td class="h-3">publikasi - {{ $item->judul }}</td>
                                                <td class="h-3">{{ $item->score_verified }}</td>
                                                <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                                <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"> </textarea> </td>
                                            </tr>
                                        @endif

                                        @if ($item->jenis_pencapaian == "haki")
                                            <tr>
                                                <td class="h-3">Haki - {{ $item->judul }}</td>
                                                <td class="h-3">{{ $item->score_verified }}</td>
                                                <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                                <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"></textarea> </td>
                                            </tr>
                                        @endif

                                        @if ($item->jenis_pencapaian == "penghargaan")
                                        <tr>
                                            <td class="h-3">Penghargaan - {{ $item->judul }}</td>
                                            <td class="h-3">{{ $item->score_verified }}</td>
                                            <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                            <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"></textarea> </td>
                                        </tr>
                                        @endif

                                        @if ($item->jenis_pencapaian == "pengabdian")
                                        <tr>
                                            <td class="h-3">Pengabdian - {{ $item->jabatan }}</td>
                                            <td class="h-3">{{ $item->score_verified }}</td>
                                            <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                            <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"></textarea> </td>
                                        </tr>
                                        @endif

                                        @if ($item->jenis_pencapaian == "pelatihan")
                                        <tr>
                                            <td class="h-3">Pelatihan - {{ $item->judul }}</td>
                                            <td class="h-3">{{ $item->score_verified }}</td>
                                            <td> <input type="text" name="id_pencapaian[]" id="id_pencapaian_{{ $no_pencapaian }}" value="{{ $item->id }}" hidden> <input type="text" name="score_pencapaian[]" id="score_pencapaian_{{ $no_pencapaian }}" style="width: 18rem"> </td>
                                            <td> <textarea name="catatan_pencapaian[]" id="catatan_pencapaian_{{ $no_pencapaian }}" style="width: 18rem" rows="2"></textarea> </td>
                                        </tr>
                                        @endif
                                        @php
                                        $no_pencapaian++;
                                        @endphp
                                    @endforeach
                                    
                                </table>
                                <button type="submit" class="btn btn-primary" style="">Simpan</button>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
<script>

let penguji = {!! $pengujiWawancara !!};
const hasil = {!! $penilaianWawancara !!};
const pendidikan = {!! $pendidikan !!};
const pengalaman = {!! $pengalaman !!};
const pelatihan = {!! $pelatihan !!};
const pencapaian = {!! $pencapaian !!};

// console.log(penguji);
// console.log(hasil);


let nama_penguji;
let no_penguji;

penguji.forEach(item => {
    nama_penguji = item.nama_penguji;
    no_penguji = item.penguji ;
    let pendidikan_view = "";
    let pengalaman_view= "";
    let pencapaian_view= "";
    let pelatihan_view="";
    // console.log(pencapaian_view);

    hasil.forEach(element => {
    
        if (element.id_pendidikan != null) {
            pendidikan.forEach(a => {
                if (element.penguji == no_penguji) {
                    if (element.id_pendidikan == a.id) {
                        var tesaa1= `<tr>
                            <td>${a.jenjang} - ${a.jurusan}</td>
                            <td>${a.score_verified}</td>
                            <td>${element.penilaian_penguji}</td>
                            <td>${element.catatan_pendidikan}</td>
                        </tr>
                        `;
                    }
                    // console.log(element.catatan_pendidikan);
                    pendidikan_view += tesaa1;
                }
            });
        }

        if (element.id_pengalaman != null) {
            pengalaman.forEach(a => {
                if (element.penguji == no_penguji) {
                    if (element.id_pengalaman == a.id) {
                        var tesaa= `<tr>
                            <td>${a.jabatan} - ${a.institusi}</td>
                            <td>${a.score_verified}</td>
                            <td>${element.penilaian_penguji}</td>
                            <td>${element.catatan_pengalaman}</td>
                        </tr>
                        `;
                    }
                    // console.log(element.catatan_pendidikan);
                    pengalaman_view += tesaa;
                }
            });
        }

        if (element.id_pelatihan != null) {
            pelatihan.forEach(a => {
                if (element.penguji == no_penguji) {
                    if (element.id_pelatihan == a.id) {
                        var tes= `<tr>
                            <td>${a.judul}</td>
                            <td>${a.score_verified}</td>
                            <td>${element.penilaian_penguji}</td>
                            <td>${element.catatan_pelatihan}</td>
                        </tr>
                        `;
                    }
                    // console.log(element.catatan_pendidikan);
                    pelatihan_view += tes;
                }
            });
        }

        if (element.id_pencapaian != null) {
            pencapaian.forEach(a => {
                if (element.penguji == no_penguji) {
                    if (element.id_pencapaian == a.id) {
                        var tespen= `<tr>
                            <td>${a.jenis_pencapaian} </td>
                            <td>${a.score_verified} </td>
                            <td>${element.penilaian_penguji}</td>
                            <td>${element.catatan_pencapaian}</td>
                        </tr>
                        `;
                    }                    
                    pencapaian_view +=  tespen;
                }
            });
        }
        

    });
    // console.log(nama_penguji);
    // console.log(no_penguji);
    // console.log(pendidikan_view);
    

    var add = `<div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">

                            <h2>${no_penguji}. ${nama_penguji}<small> Penilaian Penguji </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>


                        </div>
                        <div class="x_content">
                            <br />
                            <div class="container">
                                <div class="form-penguji">
                                    <table id="tables" class="table table-bordered table-striped">
                                        <tr>
                                            <td style="background-color: #88cff2;">Ijazah</td>
                                            <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                            <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                            <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                        </tr>
                                        ${pendidikan_view}
                                        <tr>
                                            <td style="background-color: #88cff2;">Sertifikasi/Pelatihan</td>
                                            <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                            <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                            <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                        </tr>
                                        ${pelatihan_view}
                                        

                                        <tr>
                                            <td style="background-color: #88cff2;">Pengalaman</td>
                                            <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                            <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                            <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                        </tr>
                                    
                                        ${pengalaman_view}

                                        <tr>
                                            <td style="background-color: #88cff2;">Pencapaian</td>
                                            <td style="background-color: #88cff2;">Skor Verifikasi</td>
                                            <td style="background-color: #88cff2;">Input Score Wawancara</td>
                                            <td style="background-color: #88cff2;">Catatan/Keterangan</td>
                                        </tr>
                                        
                                    
                                        ${pencapaian_view}
                                            
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>`;

    $('#view-penilaian').append(add);
});

console.log(no_penguji);   

if(no_penguji != null || no_penguji < 1){

    $('#no-penguji').val(parseInt(no_penguji)+1);
    $('#h5-judul').html(`Penguji ${parseInt(no_penguji)+1}`);
}else{
    $('#no-penguji').val("1");
}




</script>
    
@endsection