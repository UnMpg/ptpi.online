<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/sertifikasi/"><img src="{{ asset('assets/certified/img/lsp.png') }}" alt="..." /></a>
        <a class="navbar-brand" href="/sertifikasi/"><img  style="padding-left:1rem; width: 8rem; height: auto;" src="{{ asset('assets/certified/img/kan.png') }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                                                     
                <li class="nav-item"><a class="nav-link" href="#home-page">Home</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-drop" href="#" id="tentang_kami" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                  </a>
                  <div class="dropdown-menu tentang" aria-labelledby="#tentang_kami" >
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@tentangLSP') }}">Tentang LSP TPI</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@visiMisi') }}">Visi dan Misi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@strukturOrganisasi') }}">Struktur Organisasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@fungsiPeran') }}">Fungsi dan Peran</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@dewanPengarah') }}">Dewan Pengarah LSP TPI</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@dewanPakar') }}">Dewan Pakar LSP TPI</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@komitmenKetidakBerpihakan') }}">Komitmen Ketidak Berpihakan</a>
                    {{-- <a class="dropdown-item" href="#">komitmen Kerahasian</a> --}}
                    {{-- <a class="dropdown-item" href="#">Akreditasi KAN</a> --}}
                  </div>
                </li> 
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ruang_lingkup" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Layanan
                    </a>
                    <div class="dropdown-menu lingkup" aria-label="ruang_lingkup" >
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@ahliTeknikKesehatan') }}"> Sertifikasi Ahli Teknik Pelayanan Kesehatan</a>
                      <a class="dropdown-item" href="#">Sertifikasi Ahli Teknik Informatika</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-drop" href="#" id="sertifikasi" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sertifikasi
                  </a>
                  <div class="dropdown-menu sertifikasi" aria-label="sertifikasi" >
                
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@ahliTeknikKesehatan') }}"> Ruang Lingkup</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@listTersertifikasi') }}"> Daftar Person Tersertifikasi</a>
                    {{-- <a class="dropdown-item" href="#">Jadwal Sertifikasi</a> --}}
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@hakKewajiban') }}">Hak dan Kewajiban Pemohon</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@infoPembiayaan') }}">Informasi Pembiayaan Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@persyaratanDokumen') }}">Dokumen Persyaratan Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@daftarTempatuji') }}">Informasi Daftar Tempat Uji Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@pemuktahiran') }}">Pemutakhiran Ruang Lingkup/Level</a>
                    {{-- <a class="dropdown-item" href="#">Memvalidasi, Memverifikasi dan Menindaklanjuti Banding dan Keluhan</a> --}}
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@surveilen') }}">Proses Surveilan</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@resertifikasi') }}">Sertifikasi Ulang</a>
                    {{-- <a class="dropdown-item" href="{{ action('CertifiedMemberController@banding') }}">Proses Banding</a> --}}
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@prosedurKeluhan') }}">Proses Banding dan Keluhan</a>
                  </div>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ action('CertifiedMemberController@berita') }}">Berita</a></li>   --}}
                {{-- <li class="nav-item"><a class="nav-link" href="#">Klien</a></li>                --}}
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-drop" href="#" id="ruang_lingkup" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Download
                  </a>
                  <div class="dropdown-menu lingkup" aria-label="ruang_lingkup" >
                    <a class="dropdown-item" href="{{ asset('assets/certified/file/[Versi 1.2] Buku Pedoman Umum Sertifikasi Ahli Teknik Perumahsakitan__.pdf') }}"> Download Buku Panduan</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@materiSosialisasi') }}">Materi Sosialisasi LSP TPI</a>
                  </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item btn-login"><a class="" href="{{ action('CertifiedMemberController@login') }}">Login</a></li>
            </ul>

        </div>
    </div>
</nav>

