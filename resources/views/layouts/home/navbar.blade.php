<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <a href="/">
                <h1><img src="{{ asset('assets/home/img/topbar5.png') }}" alt="" width="300px"></h1>
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="drop-down"><a href="" class="menu_link">Tentang Kami</a>
                    <ul>
                        <li><a href="{{ action('HomeController@visiMisi') }}">Visi & Misi</a></li>
                        <li><a href="{{ action('HomeController@dasarHukum') }}">Dasar Hukum</a></li>
                        <li><a href="{{ action('HomeController@tujuanFungsi') }}">Fungsi</a></li>
                        <li><a href="{{ action('HomeController@strukturOrganisasi') }}">Organisma</a></li>
                        <li><a href="{{ asset('assets/home/img/maju_bersama_PTPI.pdf') }}">Mars PTPI</a></li>
                        <li><a href="https://youtu.be/egYfc67eGbI">Mars PTPI (Official Video)</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">Informasi</a>
                    <ul>
                        <li><a href="{{ action('HomeController@berita') }}">Berita</a></li>
                        <li><a href="{{ action('HomeController@artikel') }}">Artikel</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">Keanggotaan</a>
                    <ul>
                        <!-- <li><a href="{{ action('HomeController@kontribusiSehatRI') }}">Sel</a></li> -->
                        <li><a href="{{ action('HomeController@sel') }}">Sel</a></li>
                        <li><a href="{{ action('HomeController@bidangKeahlian') }}">Bidang Keahlian</a></li>
                        <li><a href="{{ action('HomeController@sertifikasi') }}">Sertifikat</a></li>
                        <li><a href="{{ action('HomeController@jejaring') }}">Jejaring</a></li>
                        <li><a href="{{action('AuthController@getRegister')}}">Pendaftaran</a></li>
                        <li><a href="{{ action('HomeController@checkReferral') }}">Cek Referral Sehat-RI</a></li>
                        <!-- <li><a href="">Pendaftaran</a></li> -->
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">Rencana</a>
                    <ul>
                        <!-- <li><a href="#">Rapat Rutin</a></li> -->
                        <!-- <li><a href="#">Workshop</a></li> -->
                        <!-- <li><a href="#">Seminar</a></li> -->
                        <li><a href="https://hospital-engineering-expo.com/backend/public/" target="_blank">Forum
                                Nasional</a></li>
                        <!-- <li><a href="#">Konsultasi</a></li> -->
                        <!-- <li><a href="#">Penelitian</a></li> -->
                    </ul>
                </li>
                <!-- <li><a href="{{ action('HomeController@kontribusiSehatRI') }}" class="menu_link"></a></li> -->
                {{-- <li><a href="/#contact" class="menu_link">Hubungi Kami</a></li> --}}
                <li class="drop-down"><a href="#" class="menu_link">Konsultasi</a>
                    <ul>
                        <li><a href="{{ action('HomeController@questionAnswer') }}">Tanya Jawab</a></li>
                        <li><a href="{{ action('HomeController@faq') }}">Pertanyaan</a></li>
                        <!-- <li><a href="{{ action('HomeController@faqTimeLine') }}">Konsultasi Timeline</a></li> -->
                    </ul>
                </li>
                <li class="drop-down"><a href="" class="menu_link">Unduh</a>
                    <ul>
                        <!-- <li><a href="{{ asset('assets/members/doc/AD_PTPI.pdf') }}">Anggaran Dasar (AD)</a></li> -->
                        <!-- <li><a href="{{ asset('assets/members/doc/ART_PTPI.pdf') }}">Anggaran Rumah Tangga (ART)</a></li> -->
                        <!-- <li><a href="{{ asset('assets/members/doc/Akta_Pendirian_PTPI.pdf') }}">Akta Pendirian</a></li> -->
                        <li><a href="{{ action('HomeController@getSertifikat') }}">Sertifikat Seminar</a></li>
                        <li><a href="{{ action('HomeController@seminarHefCertificate') }}">Sertifikat Seminar
                                HEF</a>
                        </li>
                        <li>
                            @php($laporan = App\LaporanKegiatan::orderByDesc('created_at')->take(1)->get())
                            @if(count($laporan) > 0)
                            @foreach($laporan as $item)
                            <a href="{{ action('HomeController@downloadLaporan', $item->file) }}">Laporan Kegiatan</a>
                            @endforeach
                            @else
                            <span class="a-disable">
                                <a href="">Laporan Kegiatan</a>
                            </span>
                            @endif
                        </li>
                        <li><a href="{{ action('HomeController@laporanKeuangan') }}">Laporan Keuangan</a></li>
                        <li><a href="{{ action('HomeController@seminarHef') }}">Materi HEF</a></li>
                        <li><a href="{{ action('HomeController@materi') }}">Materi Seminar & WS</a></li>
                        <!-- <li><a href="{{ action('HomeController@laporan') }}" class="menu_link">Laporan</a></li> -->
                    </ul>
                </li>
                <li><a href="{{ action('AuthController@getLogin') }}" class="menu_link">Login</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
