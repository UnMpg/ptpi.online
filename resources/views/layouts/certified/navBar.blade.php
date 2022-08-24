<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/certified/"><img src="{{ asset('assets/certified/img/lsp.png') }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tentang_kami" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profile
                    </a>
                    <div class="dropdown-menu tentang" aria-labelledby="#tentang_kami" >
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@tentangLSP') }}">Tentang LSP TPI</a>
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@visiMisi') }}">Visi dan Misi</a>
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@strukturOrganisasi') }}">Struktur Organisasi</a>
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@fungsiPeran') }}">Fungsi dan Peran</a>
                    </div>
                </li>                                      
                <li class="nav-item"><a class="nav-link" href="#home-page">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ruang_lingkup" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Layanan
                    </a>
                    <div class="dropdown-menu lingkup" aria-label="ruang_lingkup" >
                      <a class="dropdown-item" href="{{ action('CertifiedMemberController@ahliTeknikKesehatan') }}"> Sertifikasi Ahli Teknik Pelayanan Kesehatan</a>
                      <a class="dropdown-item" href="#">Sertifikasi Ahli Teknik Informatika</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="sertifikasi" data-bs-toggle="collapse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sertifikasi
                  </a>
                  <div class="dropdown-menu sertifikasi" aria-label="sertifikasi" >
                    <a class="dropdown-item" href="#">Jadwal Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@hakKewajiban') }}">Hak dan Kewajiban Pemohon</a>
                    <a class="dropdown-item" href="#">Informasi Pembiayaan Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@persyaratanDokumen') }}">Dokumen Persyaratan Sertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@pemuktahiran') }}">Proses Penambahan / Pemutakhiran Ruang Lingkup / Level</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@banding') }}">Informasi Proses Banding</a>
                    {{-- <a class="dropdown-item" href="#">Memvalidasi, Memverifikasi dan Menindaklanjuti Banding dan Keluhan</a> --}}
                    <a class="dropdown-item" href="#">Proses Surveilen</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@resertifikasi') }}">Resertifikasi</a>
                    <a class="dropdown-item" href="{{ action('CertifiedMemberController@daftarTempatuji') }}">Informasi Daftar Tempat Uji Sertifikasi</a>
                  </div>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ action('CertifiedMemberController@berita') }}">Berita</a></li>   --}}
                <li class="nav-item"><a class="nav-link" href="#">Klien</a></li>               
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('CertifiedMemberController@login') }}">Login</a></li>
            </ul>

        </div>
    </div>
</nav>

