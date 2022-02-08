<footer>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="footer-logo">
                        <h2><img src="{{ asset('assets/home/img/logo-ptpi.png') }}" alt="" width="33px"> IAHE
                        </h2>
                    </div>
                    <div class="footer-text">
                        <p><i>Indonesian Association of Hospital Engineering</i><br>
                            Wadah para ahli teknik dan institusi perumahsakitan untuk mewujudkan rumah sakit di
                            indonesia yang selamat, bermutu, aman, ramah lingkungan, dan terjangkau (SMART)</p>
                        <div class="footer-icons">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/PT-Karya-Indonesia-Cerdas-105967367795487"
                                        target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/PtCerdas" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCF9Sna9RP4yJvBa18Ktvo1g"
                                        target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-7 text-right">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @switch($locale)
                                @case('en')
                                English
                                @break
                                @case('id')
                                Indonesia
                                @break
                                @case('bn')
                                Bengali
                                @break
                                @case('in')
                                Hindi
                                @break
                                @default
                                English
                                @endswitch
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ action('LocalizationController@index', 'en') }}"><img
                                        src="{{asset('img/us.png')}}">
                                    English</a>
                                <a class="dropdown-item" href="{{ action('LocalizationController@index', 'id') }}"><img
                                        src="{{asset('img/id.png')}}">
                                    Indonesia</a>
                                <a class="dropdown-item" href="lang/bn"><img src="{{asset('img/bn.png')}}">
                                    Bengali</a>
                                <a class="dropdown-item" href="lang/in"><img src="{{asset('img/in.png')}}">
                                    Hindi</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end single footer -->
                <!-- <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>informasi</h4>
                            <p>
                                Gedung Wisma NH Lantai 1, Jl. Raya Pasar Minggu No.2B-C 2 1 2, RT.2/RW.2, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel 1:</span> 087778899087 (Jordy)</p>
                                <p><span>Tel 2:</span> 085314798456 (Adrian)</p>
                                <p><span>Tel 3:</span> 082112887869 (Mardiansyah)</p>
                                <p><span>Email:</span> <a href="mailto:admin@iahe.or.id">admin@iahe.or.id</a></p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            Copyright &copy;
                            <?= date('Y'); ?> <strong>IAHE</strong>. All Rights Reserved
                        </p>
                    </div>
                    <!-- <div class="credits"> -->
                    <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
                    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
