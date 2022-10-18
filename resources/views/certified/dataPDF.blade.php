<!DOCTYPE html>
<html>
<head>
	<title>	Download Data Pdf</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <style>
    .halaman{
        width: 690px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        margin: 3px 5px;
        /* background-color: #aaa; */
    }

    .header{
        margin: 2px 2px;
        width: 100%;
        height: 12rem;
        /* background-color: red; */
    }
    .bg-biru{
        background-color: rgb(92, 125, 255);
    }
    .text-center{
        text-align: center;
    }
    .header-foto{
        width: 150px;
    }

    .jjudul{
        
        color: rgb(92, 125, 255);
        font-weight: bold;
    }
    .header-title{
        width: 350px;
        text-align: center;
    }
    .header-deskripsi{
        width: 180px;
    }
      
    p{
        margin:0px 0px;
    }
    h3{
        margin:0px 0px;
    }
    .judul-table{
        font-size: 1.2rem;
    }
    .pendidikan{
        width: 100%;
        margin-bottom: 2rem;
        text-align: center;
    }
    .pendidikan td{
        height: 1.5rem;
    }
    .biodata{
        width: 100%;
        margin-bottom: 2rem;
    }
    
    .pengalaman{
        width: 100%;
        margin-bottom: 2rem;
        text-align: center;
    }
    .pelatihan{
        width: 100%;
        margin-bottom: 2rem;
        text-align: center;
    }
    .pencapaian{
        width: 100%;
        margin-bottom: 2rem;
        text-align: center;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    
    .h-3{
        height: 3rem;
        text-align: center;
    }

  </style>
</head>
<body>
<div class="halaman" >
    
    {{-- <table style="width: 100%; height:12rem; border: none;">
        <tr style="border: none;">
            <td style="width: 30%; border: none;">
                <img src="{{ asset('assets/certified/img/icon-user.png') }}" style="width: 100%" alt="">
            </td>
            <td style="width: 40%; border: none;">
                <div>
                    <h3>{{ $datauser->nama }}</h3>
                    <p>{{ $datauser->email }}</p>
                    <p>{{ $datauser->tgl_lahir }}</p>  
                </div>      
            </td>
            <td style="width: 30%; border: none;">
                <div>
                    <p>{{ $datauser->alamat }}</p>
                </div>
            </td>
        </tr>
    </table> --}}
    <div class="judul-table jjudul" style="text-align: center; font-size: 1.7rem; margin-bottom:1.5rem; text-decoration: underline;">
       A. CURRICULUM VITAE
    </div>
    
    <table class="biodata" style="border: none;" >
        <tr style="width: 100%; border: none; border-collapse: none;">
            <td style="width: 35%; border: none; border-collapse: none;">Nama Lengkap Beserta Gelar</td><td style="width: 3%; border: none; ">:</td><td style="border: none; ">{{ $datauser->nama_gelar }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">No KTP/Passpor</td><td style="width: 3%; border: none;">:</td><td style="border: none; ">{{ $datauser->ktp_passpor }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">Tempat Lahir</td><td style="width: 3%; border: none;">:</td><td style="border: none;">{{ $datauser->tmp_lahir }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">Tanggal Lahir</td><td style="width: 3%; border: none;">:</td><td style="border: none;">{{ $datauser->tgl_lahir }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">alamat</td><td style="width: 3%; border: none; ">:</td><td style="border: none;">{{ $datauser->alamat }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">No. Hp</td><td style="width: 3%; border: none;">:</td><td style="border: none;">{{ $datauser->telp }}</td>
        </tr>
        <tr style="width: 100%; border: none;">
            <td style="width: 35%; border: none;">Email</td><td style="width: 3%; border: none;">:</td><td style="border: none;">{{ $datauser->email }}</td>
        </tr>
    </table>
    <br>
    <div class="judul-table">
        Pendidikan
    </div>

    <table class="pendidikan" >
        <thead>
            <tr class="bg-biru">
                <td>Tahun</td>
                <td>Jenjang</td>
                <td>Program Studi</td>
                <td>Perguruan Tinggi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendidikan as $item)
            <tr>
                <td>{{ $item->tahun_lulus }}</td>
                <td>{{ $item->jenjang }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->universitas }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <div class="judul-table">
        Pelatihan/Seminar/Webinar
    </div>
    <table class="pelatihan" >
        <thead>
            <tr class="bg-biru">
                <td>Tanggal</td>
                <td>Durasi(Jam)</td>
                <td>Judul/Topik</td>
                <td>Institusi Pelatihan</td>
                <td>Jenis</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelatihan as $item)
            <tr>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->durasi }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->institusi_pelatihan }}</td>
                <td>Pelatihan</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <div class="judul-table">
        Pengalaman
    </div>
    <table class="pengalaman" >
        <thead >
            <tr class="bg-biru">
                <td>Tahun</td>
                <td>Jabatan/Posisi</td>
                <td>Jenis Pekerjaan</td>
                <td>Institusi</td>
                <td>Durasi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengalaman as $item)
            <tr>
                <td>{{ $item->tahun_awal }}-{{ $item->tahun_akhir }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->jenis_pekerjaan }}</td>
                <td>{{ $item->institusi }}</td>
                <td>{{ $item->durasi }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <div class="judul-table">
        Pencapaian
    </div>

    @foreach ($pencapaian as $item)
        
        @if ($item->jenis_pencapaian == "proyek")
        <div class="judul-table">
            Penyelesaian Proyek
        </div>
            <table class="pencapaian" >
                <thead>
                    <tr class="bg-biru">
                        <td>Tahun</td>
                        <td>Jabatan</td>
                        <td>Durasi</td>
                        <td>Nilai Projek</td>
                        <td>Institusi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->nilai }}</td>
                        <td>{{ $item->institusi }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        @if ($item->jenis_pencapaian == "publikasi")
        <div class="judul-table">
            Publikasi
        </div>
            <table class="pencapaian" >
                <thead>
                    <tr class="bg-biru">
                        <td>Tahun</td>
                        <td>Judul</td>
                        <td>Jenis</td>
                        <td>Penerbit</td>
                        <td>Kualitas</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->kualitas }}</td>
                    </tr>
                    
                </tbody>
            </table>
        @endif

        @if ($item->jenis_pencapaian == "haki")
        <div class="judul-table">
            Haki
        </div>
            <table class="pencapaian" >
                <thead>
                    <tr class="bg-biru">
                        <td>Tahun</td>
                        <td>Judul</td>
                        <td>Nomor</td>
                        <td>Jenis</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->jenis }}</td>
                    </tr>
                    
                </tbody>
        </table>
        @endif

        @if ($item->jenis_pencapaian == "penghargaan")
        <div class="judul-table">
            Penghargaan
        </div>
        <table class="pencapaian" >
            <thead>
                <tr class="bg-biru">
                    <td>Tahun</td>
                    <td>Judul</td>
                    <td>Peringkat</td>
                    <td>Institusi Pemberi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->peringkat }}</td>
                    <td>{{ $item->institusi }}</td>
                </tr>
                
            </tbody>
        </table>
        @endif

        @if ($item->jenis_pencapaian == "pengabdian")
        <div class="judul-table">
            Pengabdian Masyarakat/Keorganisasian Profesi
        </div>
            <table class="pencapaian" >
                <thead>
                    <tr class="bg-biru">
                        <td>Tahun</td>
                        <td>Jabatan</td>
                        <td>Nama Organisasi</td>
                        <td>Durasi Keaktifan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->nama_organisasi }}</td>
                        <td>{{ $item->durasi }}</td>
                    </tr>
                    
                </tbody>
            </table>
        @endif

        @if ($item->jenis_pencapaian == "pelatihan")
        <div class="judul-table">
            Pelatihan / Seminar / Konferensi (Narasumber/Moderator)
        </div>
            <table class="pencapaian" >
                <thead>
                    <tr class="bg-biru">
                        <td>Tanggal</td>
                        <td>Jenis</td>
                        <td>Judul</td>
                        <td>Tingkat</td>
                        <td>Durasi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->durasi }}</td>
                    </tr>
                    
                </tbody>
            </table>
        @endif

    @endforeach

    
    <div class="judul-table jjudul" style="text-align: center; font-size: 1.7rem; margin-top:1.5rem; margin-bottom:1rem; text-decoration: underline;">
        B. Hasil Verifikasi
     </div>

     <table style="width: 100%; margin-bottom:1rem;">
        <tr>
            <td class="bg-biru" style="text-align: center; width:35%;">Nama</td>
            <td  style="text-align: center; "> {{ $datauser->nama }}</td>
            <td class="bg-biru" style="font-size:1.2rem; width:20%; text-align:center;">Total Skor Verifikasi</td>            
            <td style="text-align: center; ">{{ $datauser->nilai }}</td>
        </tr>
        <tr>
            <td class="bg-biru" style="text-align: center; width:35%;">KTP</td>
            <td style="text-align: center; "> {{ $datauser->ktp_passpor }} </td>
            <td class="bg-biru" style="font-size:1.2rem; width:20%; text-align:center;"> Potensi</td>            
            <td style="text-align: center; ">{{ $datauser->tingkat }} </td>
        </tr>
     </table>

     <table style="width: 100%">
        <tr class="bg-biru text-center">
            <td>Ijazah</td>
            <td>Universitas/Institusi</td>
            <td>Skor</td>
            <td>Keterangan</td>
        </tr>

        @foreach ($pendidikan as $item)
        <tr>
            <td class="h-3">{{ $item->jenjang }} - {{ $item->jurusan }} </td>
            <td class="h-3">{{ $item->universitas }}</td>
            <td class="h-3">{{ $item->score_verified }}</td>
            <td class="h-3"></td>
        </tr>
        @endforeach
        
        <tr class="bg-biru text-center">
            <td>Sertifikasi/Pelatihan</td>
            <td>Institusi</td>
            <td>Skor</td>
            <td>Keterangan</td>
        </tr>

        @foreach ($pelatihan as $item)
            <tr>
                <td class="h-3">{{ $item->judul }}</td>
                <td class="h-3">{{ $item->institusi_pelatihan }}</td>
                <td class="h-3">{{ $item->score_verified }}</td>
                <td class="h-3"></td>
            </tr>
        @endforeach

        <tr class="bg-biru text-center">
            <td>Pengalaman</td>
            <td>Institusi</td>
            <td>Skor</td>
            <td>Keterangan</td>
        </tr>
        @foreach ($pengalaman as $item)
            <tr>
                <td class="h-3">{{ $item->jabatan }}</td>
                <td class="h-3">{{ $item->institusi }}</td>
                <td class="h-3">{{ $item->score_verified }}</td>
                <td class="h-3"></td>
            </tr>
        @endforeach

        <tr class="bg-biru text-center">
            <td>Pencapaian Projek/ Publication profesional dan awards</td>
            <td>Institusi</td>
            <td>Skor</td>
            <td>Keterangan</td>
        </tr>
        @foreach ($pencapaian as $item)
            @if ($item->jenis_pencapaian == "proyek")
                <tr>
                    <td class="h-3">Proyek - {{ $item->jabatan }}</td>
                    <td class="h-3">{{ $item->institusi }}</td>
                    <td class="h-3">{{ $item->score_verified }}</td>
                    <td class="h-3"></td>
                </tr>
            @endif

            @if ($item->jenis_pencapaian == "publikasi")
                <tr>
                    <td class="h-3">publikasi - {{ $item->judul }}</td>
                    <td class="h-3">{{ $item->penerbit }}</td>
                    <td class="h-3">{{ $item->score_verified }}</td>
                    <td class="h-3"></td>
                </tr>
            @endif

            @if ($item->jenis_pencapaian == "haki")
                <tr>
                    <td class="h-3">Haki - {{ $item->judul }}</td>
                    <td class="h-3">{{ $item->jenis }} - {{ $item->nomor }} </td>
                    <td class="h-3">{{ $item->score_verified }}</td>
                    <td class="h-3"></td>
                </tr>
            @endif

            @if ($item->jenis_pencapaian == "penghargaan")
            <tr>
                <td class="h-3">Penghargaan - {{ $item->judul }}</td>
                <td class="h-3">{{ $item->institusi }}</td>
                <td class="h-3">{{ $item->score_verified }}</td>
                <td class="h-3"></td>
            </tr>
            @endif

            @if ($item->jenis_pencapaian == "pengabdian")
            <tr>
                <td class="h-3">Pengabdian - {{ $item->jabatan }}</td>
                <td class="h-3">{{ $item->institusi }}</td>
                <td class="h-3">{{ $item->score_verified }}</td>
                <td class="h-3"></td>
            </tr>
            @endif

            @if ($item->jenis_pencapaian == "pelatihan")
            <tr>
                <td class="h-3">Pelatihan - {{ $item->judul }}</td>
                <td class="h-3">{{ $item->jenis }} - {{ $item->tingkat }}</td>
                <td class="h-3">{{ $item->score_verified }}</td>
                <td class="h-3"></td>
            </tr>
            @endif
            
        @endforeach

        <tr style="border-bottom: 1px solid black;">
            <td class="text-center" colspan="2">TOTAL</td>
            <td colspan="2">{{ $datauser->nilai }}</td>         
        </tr>

        <tr >
            <td colspan="4">
            <div >
                <p style="text-align: justify">
                    Berdasarkan hasil skoring, dengan ini saya yang bertanda tangan dibawah ini menyatakan telah melakukan verifikasi dokumen dan penilaian skoring 
                    kepada {{ $datauser->nama }} sesuai dengan abats minimal skoring skema sertifikasi maka peserta Mengikuti/ Tidak mengikuti * ujian tulis sertifikasi Ahli Tkenik Perumahsakitan
                    Dengan ini saya menyatakan bahwa pernyataan ini dibuat sebenar-benarnya dan dapat digunakan sebagiamana mesetinya.
                    </p>
                <p style="text-align: right">Jakarta, {{ $tanggal }}</p>
                <br><br><br><br>
                <p style="text-align: right">{{ auth('certified')->user()->nama }}</p>
                <p style="text-align: right">Tim Verifikasi/Operational</p>
            </div>            
            </td>
        </tr>
     </table>   

    {{-- sudah ujian tulis  --}}
    @if ($datauser->certified_status >= 10)
        <div class="judul-table jjudul" style="text-align: center; font-size: 1.7rem; margin-top:1.5rem; margin-bottom:1rem; text-decoration: underline;">
        C. Hasil Uji Tulis
        </div>
    
        <table style="width: 100%">
            <tr>
                <td style="width: 30%">Nama</td>
                <td>{{ $datauser->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Institusi</td>
                <td>{{ $datauser->nama_instansi }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Tanggal Ujian</td>
                <td> {{ $ujian->tanggal_ujian }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Hasil Ujian</td>
                <td> {{ $ujian->score_ujian }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Durasi</td>
                <td>{{ $ujian->lama_ujian }}</td>
            </tr>
            <tr>
                <td colspan="2">
                <div style="">
                    <p style="text-align: justify">
                        Dengan ini kami yang bertanda tangan dibawah ini menyatakan bahwa simulasi uji tulis telah 
                        dilakukan dan diselenggarakan secara online selama kurang durasi 2 jam, </p>
                    <p style="text-align: justify">
                        Dengan ini kami  menyatakan bahwa pernyataan ini dibuat sebenar-benarnya dan dapat digunakan sebagiamana mesetinya.
                    </p>
                    <p style="text-align: right">Jakarta, {{ $tanggal }}</p>
                    <br><br><br><br>
                    
                    <table style="width:100%; border: none;">
                        <tr style="border: none;">
                            <td style="text-align: left; border: none;">(...............................) <br> Tim Verifikasi/Operational </td>
                            <td style="text-align: right; border: none;">(................................) <br> Tim Verifikasi/Operational</td>
                        </tr>
                    </table>
                    {{-- <div style="display: inline-block">
                        <p >(...............................) <br> Tim Verifikasi/Operational </p>
                        <p style="text-align: right ; margin-top:-40px;">(.................................) <br> Tim Verifikasi/Operational</p>
                    </div> --}}
    
                </div> 
            </td>
            </tr>
        </table>
    @endif


    
    {{-- sudah melakukan wawancara --}}

    @if ($datauser->certified_status >= 13)
        
    

        <div class="judul-table jjudul" style="text-align: center; font-size: 1.7rem; margin-top:1.5rem; margin-bottom:1rem; text-decoration: underline;">
            D. Hasil Uji Wawancara
        </div>
    
        <div class="judul-table">
            Diisi oleh tim verifikasi/Operasional yang didapatkan dari hasil wawancara
        </div>
        <br>
        @foreach ($penguji as $penguji_item)
            <div class="judul-table">
                {{ $penguji_item->penguji }}. Penguji : {{ $penguji_item->nama_penguji }}
            </div>
            <br>
            <table style="width: 100%" class="text-center">
            
            @foreach ($penilaianWawancara as $wawancara_item)                
                @if ($wawancara_item->id_pendidikan != null)
                    @php $text=1 ;    @endphp
                    @foreach ($pendidikan as $pendidikan_item)
                        @if ($wawancara_item->penguji == $penguji_item->penguji)
                            @if ($wawancara_item->id_pendidikan == $pendidikan_item->id)
                                @if ($text == 1)
                                    <tr class="bg-biru">
                                        <td style="width: 35%">Ijazah </td>
                                        <td style="width: 45%">Skor</td>
                                        <td style="width: 20%"> Keterangan</td>
                                    </tr>
                                @endif
                                <tr >
                                    <td style="width: 35%; height:3rem">{{ $pendidikan_item->jenjang }} - {{ $pendidikan_item->jurusan }}</td>
                                    <td style="width: 45%  height:3rem">{{ $wawancara_item->penilaian_penguji }}</td>
                                    <td style="width: 20%  height:3rem">{{ $wawancara_item->catatan_pendidikan }}</td>
                                </tr>
                            @endif
                        @endif
                        @php $text++ ;    @endphp
                    @endforeach                    
                @endif

                @if ($wawancara_item->id_pengalaman != null)
                    @php $text=1 ;    @endphp
                    @foreach ($pengalaman as $pengalaman_item)
                        @if ($wawancara_item->penguji == $penguji_item->penguji)
                            
                            @if ($wawancara_item->id_pengalaman == $pengalaman_item->id)
                                @if ($text == 1)
                                    <tr class="bg-biru">
                                        <td style="width: 35%">Pengalaman </td>
                                        <td style="width: 45%">Skor</td>
                                        <td style="width: 20%"> Keterangan</td>
                                    </tr>
                                @endif
                                <tr >
                                    <td style="width: 35%; height:3rem">{{ $pengalaman_item->jabatan }} - {{ $pengalaman_item->institusi }}</td>
                                    <td style="width: 45%  height:3rem">{{ $wawancara_item->penilaian_penguji }}</td>
                                    <td style="width: 20%  height:3rem">{{ $wawancara_item->catatan_pengalaman }}</td>
                                </tr>
                            @endif
                        @endif
                        @php $text++ ;    @endphp
                    @endforeach                    
                @endif

                @if ($wawancara_item->id_pelatihan != null)
                    @php $text=1 ;    @endphp
                    @foreach ($pelatihan as $pelatihan_item)
                        @if ($wawancara_item->penguji == $penguji_item->penguji)                            
                            @if ($wawancara_item->id_pelatihan == $pelatihan_item->id)
                                @if ($text == 1)
                                    <tr class="bg-biru">
                                        <td style="width: 35%">Seminar/Workshop/Pelatihan </td>
                                        <td style="width: 45%">Skor</td>
                                        <td style="width: 20%"> Keterangan</td>
                                    </tr>
                                @endif
                                <tr >
                                    <td style="width: 35%; height:3rem">{{ $pelatihan_item->judul }} - {{ $pelatihan_item->institusi_pelatihan }}</td>
                                    <td style="width: 45%  height:3rem">{{ $wawancara_item->penilaian_penguji }}</td>
                                    <td style="width: 20%  height:3rem">{{ $wawancara_item->catatan_pelatihan }}</td>
                                </tr>
                            @endif
                        @endif
                        @php $text++ ;    @endphp
                    @endforeach                    
                @endif

                @if ($wawancara_item->id_pencapaian != null)
                    @php $text = 1;    @endphp
                    @foreach ($pencapaian as $pencapaian_item)                        
                        @if ($wawancara_item->penguji == $penguji_item->penguji)                            
                            @if ($wawancara_item->id_pencapaian == $pencapaian_item->id)
                                @if ($text == 1)
                                    <tr class="bg-biru">
                                        <td style="width: 35%">Pencapaian Proyek/Publikasi profesional dan award</td>
                                        <td style="width: 45%">Skor</td>
                                        <td style="width: 20%">Keterangan</td>
                                    </tr>
                                @endif                                
                                <tr >
                                    <td style="width: 35%; height:3rem">{{ $pencapaian_item->jenis_pencapaian }} - {{ $pencapaian_item->jabatan }}{{ $pencapaian_item->judul }}{{ $pencapaian_item->institusi }}</td>
                                    <td style="width: 45%  height:3rem">{{ $wawancara_item->penilaian_penguji }}</td>
                                    <td style="width: 20%  height:3rem">{{ $wawancara_item->catatan_pencapaian }}</td>
                                </tr>
                            @endif
                        @endif
                        @php $text++ ;    @endphp
                    @endforeach                    
                @endif               
                   
            @endforeach
                <tr>
                    <td colspan="3">
                    <div style="height: 4rem" >
                        <p style="text-align: left">Catatan:</p>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                    <div style="">
                        <p style="text-align: justify">Berdasarkan total akhir yang didapat, dengan ini saya yang bertanda tangan dibawah 
                            Merekomendasikan/Tidak Merekomendasikan* peserta dengan nama 
                            {{ $datauser->nama }} untuk menjadi Ahli Teknik Perumahsakitan pada  Level {{ $datauser->tingkat }}
                            <br> Dengan ini saya menyatakan bahwa pernyataan ini dibuat sebenar-benarnya dan dapat digunakan sebagiamana mesetinya.</p>
                        <br>
                        <p style="text-align: right">Jakarta, {{ $tanggal }}</p>
                        <br>
                        <br>
                        <br>
                        <p style="text-align: right">(        {{ $penguji_item->nama_penguji }}         )</p>
        
                    </div>
                </td>
                </tr>
            </table>

            <br>
            <br>
            
        @endforeach

    
        <div class="judul-table jjudul" style="text-align: center; font-size: 1.7rem; margin-top:1.5rem; margin-bottom:1rem; text-decoration: underline;">
        E. Hasil Score Akhir Ujian Wawancara
        </div>
        
        @php
            $total = 0;
        @endphp
        <table style="width: 60%">
            <tr class="bg-biru">
                <td style="width: 10%">No</td>
                <td style="width: 65%"> Parameter</td>
                <td>Rata-rata Skor Hasil Wawancara</td>
            </tr>
            {{-- <tr class="bg-biru">
                
                <td></td>
            </tr> --}}
            
            @foreach ($pendidikan as $item)
                <tr class="">
                {{-- <td></td>
                <td>{{ $item->jenjang }} - {{ $item->jurusan }}</td> --}}

                <td>I</td>
                <td>Pendidikan</td>
                @foreach ($avr_pendidikan as $i)
                    @if ($item->id == $i->id_pendidikan)
                        {{-- <td>{{ (int)$i->summery }}</td> --}}
                        @php
                            $total = $total + (int)$i->summery;
                        @endphp

                    @endif
                @endforeach 
                {{-- </tr>                --}}
            @endforeach
            {{-- <tr class="bg-biru">
                <td>II</td>
                <td>Pelatihan</td>
                <td></td>
            </tr> --}}

            @foreach ($pelatihan as $item)
                {{-- <tr>
                <td></td>
                <td>{{ $item->judul }} - {{ $item->institusi_pelatihan }}</td> --}}
                @foreach ($avr_pelatihan as $i)
                    @if ($item->id == $i->id_pelatihan)
                        {{-- <td>{{ (int)$i->summery }}</td> --}}
                        @php
                            $total = $total + (int)$i->summery;
                        @endphp
                    @endif
                @endforeach
            {{-- </tr>                 --}}
            @endforeach

            <td>{{ $total }}</td>
            </tr>
            

            <tr class="">
                <td>II</td>
                <td>Pengalaman</td>
                {{-- <td></td>
            </tr> --}}
            @php
                $total_pengalaman = 0;
            @endphp
            @foreach ($pengalaman as $item)
                {{-- <tr>
                <td></td>
                <td>{{ $item->jabatan }} - {{ $item->institusi }}</td> --}}
                @foreach ($avr_pengalaman as $i)
                    @if ($item->id == $i->id_pengalaman)
                        {{-- <td>{{ (int)$i->summery }}</td> --}}
                        @php
                            $total = $total + (int)$i->summery;
                            $total_pengalaman = $total_pengalaman + (int)$i->summery;
                        @endphp
                    @endif
                @endforeach
                {{-- </tr>                 --}}
            @endforeach

            <td>{{ $total_pengalaman }}</td>
            </tr>

            <tr class="">
                <td>III</td>
                <td>Pencapaian</td>
                {{-- <td></td>
            </tr> --}}

            @php
                $total_pencapaian = 0;
            @endphp
            @foreach ($pencapaian as $item)
                {{-- <tr>
                <td></td>
                <td>{{ $item->jenis_pencapaian }} - {{ $item->jabatan }}{{ $item->judul }}{{ $item->nama_organisasi }}</td> --}}
                @foreach ($avr_pencapaian as $i)
                    @if ($item->id == $i->id_pencapaian)
                        {{-- <td>{{ (int)$i->summery }}</td> --}}
                        @php
                            $total = $total + (int)$i->summery;
                            $total_pencapaian = $total_pencapaian + (int)$i->summery;
                        @endphp
                    @endif
                @endforeach 
                {{-- </tr>                --}}
            @endforeach

            <td>{{ $total_pencapaian }}</td>
                </tr>

            <tr>
                <td style="font-size:1.2rem" colspan="2">Total</td>
                <td> {{ $total }}</td>
            </tr>
            <tr>
                <td style="font-size:1.2rem" colspan="2">Tingkat Level Keahlian</td>
                

                @if ($total < 5000 && $total > 0)
                    <td>Muda</td>
                @endif
                @if ($total < 10000 && $total >= 5000)
                    <td>Madya</td>
                @endif
                @if ($total >= 10000 )
                    <td>Utama</td>
                @endif
            </tr>
        </table>


    @endif
    
</div>
</body>
</html>