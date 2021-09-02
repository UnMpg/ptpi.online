<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <a href="/">
                <h1><img src="{{ asset('assets/home/img/topbar5.png') }}" alt="" width="350px"></h1>
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
                        <li><a href="{{ action('HomeController@tujuanFungsi') }}">Tujuan Dan Fungsi</a></li>
                        <li><a href="{{ action('HomeController@strukturOrganisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">Informasi</a>
                    <ul>
                        <li><a href="{{ action('HomeController@berita') }}">Berita</a></li>
                        <li><a href="{{ action('HomeController@artikel') }}">Artikel</a></li>
                    </ul>
                </li>
                <li><a href="{{ action('HomeController@kontribusiSehatRI') }}" class="menu_link">Kontribusi Sehat-RI</a></li>
                {{-- <li><a href="/#contact" class="menu_link">Hubungi Kami</a></li> --}}
                <li class="drop-down"><a href="#" class="menu_link">Konsultasi</a>
                    <ul>
                        <li><a href="{{ action('HomeController@questionAnswer') }}">Tanya Jawab</a></li>
                        <li><a href="{{ action('HomeController@faq') }}">Pertanyaan</a></li>
                        <li><a href="{{ action('HomeController@faqTimeLine') }}">FAQs</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="" class="menu_link">Unduh</a>
                    <ul>
                        <li><a href="{{ asset('assets/members/doc/AD_PTPI.pdf') }}">Anggaran Dasar (AD)</a></li>
                        <li><a href="{{ asset('assets/members/doc/ART_PTPI.pdf') }}">Anggaran Rumah Tangga (ART)</a>
                        </li>
                        <li><a href="{{ asset('assets/members/doc/Akta_Pendirian_PTPI.pdf') }}">Akta Pendirian</a></li>
                        <li><a href="{{ action('HomeController@getSertifikat') }}">Sertifikat Seminar</a></li>
                    </ul>
                </li>
                <li><a href="{{ action('HomeController@laporan') }}" class="menu_link">Laporan</a></li>
                <li><a href="{{ action('AuthController@getLogin') }}" class="menu_link">Login</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->