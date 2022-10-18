<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3></h3>
      <ul class="nav side-menu">

        @if (auth('certified')->user()->role == "sertifikasi")
          <li class=""><a href=""><i class="fa fa-home"></i> Home </a>        </li>
          {{-- <li class=""><a href="{{ action('CertifiedMemberController@listPesertaSertifikasi') }}"><i class="fa fa-user"></i> List Peserta </a></li>           --}}
          <li><a href="{{ action('CertifiedMemberController@listPesertaVerifikasi') }}"><i class="fa fa-user"></i> Verifikasi Datadiri Peserta </a></li>
          <li><a href="{{ action('CertifiedUjianController@sertifikasiInputSoal') }}"><i class="fa fa-edit"></i> Data Soal </a> </li>
          <li><a href="{{ action('CertifiedMemberController@dataPesertaUjian') }}"><i class="fa fa-edit"></i> Data Peserta Ujian </a> </li>
          <li><a href="{{ action('CertifiedMemberController@dataPesertaWawancara') }}"><i class="fa fa-user"></i> Data Peserta Wawancara </a></li>
          <li><a href="{{ action('CertifiedMemberController@downloadData') }}"><i class="fa fa-download"></i> Download data Peserta</a></li>
        @endif

        @if (auth('certified')->user()->role == "penunjang")
          <li class=""><a href=""><i class="fa fa-home"></i> Home </a>        </li>
          {{-- <li class=""><a href="{{ action('CertifiedMemberController@listPesertaSertifikasi') }}"><i class="fa fa-user"></i> List Peserta </a></li> --}}
          
          <li><a href="{{ action('CertifiedMemberController@listStatusPeserta') }}"><i class="fa fa-edit"></i> List Berdasarkan Status </a> </li>
          <li><a href="{{ action('CertifiedMemberController@dataPesertaUjian') }}"><i class="fa fa-edit"></i> Data Peserta Ujian </a> </li>          
          <li><a href="{{ action('CertifiedMemberController@konfirmasiPesertaSertifikasi') }}"><i class="fa fa-user"></i> Konfirmasi Peserta </a></li>
          <li><a href="{{ action('CertifiedMemberController@tambahNotivePeserta') }}"><i class="fa fa-user"></i> Tambah Notive</a></li>
          <li><a href="{{ action('CertifiedMemberController@uploadSuratPerjanjian') }}"><i class="fa fa-download"></i> Download/Upload Surat Perjanjian Peserta</a></li>
          <li><a href="{{ action('CertifiedMemberController@downloadData') }}"><i class="fa fa-download"></i> Download data Peserta</a></li>
          
        @endif

        @if (auth('certified')->user()->role == "user" || auth('certified')->user()->role == null )
          <li class=""><a href="{{ action('CertifiedMemberController@home') }}"><i class="fa fa-home"></i> Home </a>
         
          </li>
          @if (auth('certified')->user()->certified_status <= "2")
          <li><a href="{{ action('CertifiedMemberController@insertDataProfile') }}"><i class="fa fa-edit"></i> Lengkapi Data </a>
            
          </li>
          @endif
          
          <li><a href="{{ action('CertifiedMemberController@profilUser') }}"><i class="fa fa-user"></i> Profile </a>
            
          </li>
          <li><a href="{{ action('CertifiedMemberController@uploadUser') }}"><i class="fa fa-file"></i> Upload Document </a>
            
          </li>
          {{-- <li><a href="{{ action('CertifiedMemberController@downloadUser') }}"><i class="fa fa-download"></i> Download Document </a>
            
          </li> --}}
          
          @if ( auth('certified')->user()->certified_status >= "4" && auth('certified')->user()->nilai > "2000")
          <li><a href="{{ action('CertifiedMemberController@uploadBukti') }}"><i class="fa fa-file"></i> Upload Bukti Pembayaran </a>
            
          </li>
          @endif
        @endif
      </ul>
    </div>

  </div>