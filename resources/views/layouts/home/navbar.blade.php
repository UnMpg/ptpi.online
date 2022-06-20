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
                <li class="drop-down"><a href="" class="menu_link">{{ trans('lang.ABOUT_US') }}</a>
                    <ul>
                        <li><a href="{{ action('HomeController@visiMisi') }}">{{ trans('lang.VISION_AND_MISSION') }}</a>
                        </li>
                        <li><a href="{{ action('HomeController@dasarHukum') }}">{{ trans('lang.BASIC_LAW') }}</a></li>
                        <li><a href="{{ action('HomeController@tujuanFungsi') }}">{{ trans('lang.FUNCTION') }}</a></li>
                        <li><a href="{{ action('HomeController@strukturOrganisasi') }}">{{ trans('lang.ORGANISM') }}</a>
                        </li>
                        <li><a
                                href="{{ asset('assets/home/img/maju_bersama_PTPI.pdf') }}">{{ trans('lang.OFFICIAL_SONG_PTPI') }}</a>
                        </li>
                        <li><a href="https://youtu.be/egYfc67eGbI">{{ trans('lang.PTPI_OFFICIAL_VIDEO') }}</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">{{ trans('lang.INFORMATION') }}</a>
                    <ul>
                        <li><a href="{{ action('HomeController@berita') }}">{{ trans('lang.NEWS') }}</a></li>
                        <li><a href="{{ action('HomeController@artikel') }}">{{ trans('lang.ARTICLE') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">{{ trans('lang.MEMBERSHIP') }}</a>
                    <ul>
                        <li><a href="{{ action('HomeController@sel') }}">{{ trans('lang.CELL') }}</a></li>
                        <li><a
                                href="{{ action('HomeController@bidangKeahlian') }}">{{ trans('lang.AREAS_OF_EXPERTISE') }}</a>
                        </li>
                        <li><a href="{{ action('HomeController@sertifikasi') }}">{{ trans('lang.CERTIFICATION') }}</a>
                        </li>
                        <li><a href="{{ action('HomeController@jejaring') }}">{{ trans('lang.NETWORK') }}</a>
                        </li>
                        <li><a href="{{action('AuthController@getRegister')}}">{{ trans('lang.REGISTRATION') }}</a>
                        </li>
                        <li><a
                                href="{{ action('HomeController@checkReferral') }}">{{ trans('lang.REFERRAL_NUMBER_CHECKING') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="menu_link">{{ trans('lang.CONSULTATION') }}</a>
                    <ul>
                        <li><a
                                href="{{ action('HomeController@questionAnswer') }}">{{ trans('lang.QUESTION_AND_ANSWER') }}</a>
                        </li>
                        <li><a href="{{ action('HomeController@faq') }}">{{ trans('lang.QUESTION') }}</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="" class="menu_link">{{ trans('lang.DOWNLOAD') }}</a>
                    <ul>
                        <li><a
                                href="{{ action('HomeController@getSertifikat') }}">{{ trans('lang.SEMINAR_CERTIFICATE') }}</a>
                        </li>
                        <li><a
                                href="{{ action('HomeController@seminarHefCertificate') }}">{{ trans('lang.HEF_SEMINAR_CERTIFICATE') }}</a>
                        </li>
                        <li><a
                                href="{{ action('HomeController@getSertifikatCommon') }}">{{ trans('lang.INDUSTRY_SEMINAR_CERTIFICATE') }}</a>
                        </li>
                        <li>
                            @php($laporan = App\LaporanKegiatan::orderByDesc('created_at')->take(1)->get())
                            @if(count($laporan) > 0)
                            @foreach($laporan as $item)
                            <a
                                href="{{ action('HomeController@downloadLaporan', $item->file) }}">{{ trans('lang.ACTIVITY_REPORT') }}</a>
                            @endforeach
                            @else
                            <span class="a-disable">
                                <a href="">{{ trans('lang.ACTIVITY_REPORT') }}</a>
                            </span>
                            @endif
                        </li>
                        <li><a
                                href="{{ action('HomeController@laporanKeuangan') }}">{{ trans('lang.FINANCIAL_REPORT') }}</a>
                        </li>
                        <li><a href="{{ action('HomeController@seminarHef') }}">{{ trans('lang.HEF_MATERIAL') }}</a>
                        </li>
                        <li><a
                                href="{{ action('HomeController@materi') }}">{{ trans('lang.SEMINAR_AND_WS_MATERIAL') }}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ action('AuthController@getLogin') }}" class="menu_link">{{ trans('lang.LOGIN') }}</a>
                </li>
             </ul>
        </nav><!-- .nav-menu -->
        
    </div>
</header><!-- End Header -->
