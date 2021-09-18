<main id="main">

    <!-- ======= Pengantar Section ======= -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pengantar</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2">
                    <img src="{{ asset('assets/home/img/prof_eko.png') }}" class="rounded" alt="presiden_ptpi">
                    <div class="text-center">
                        <a href="{{ action('HomeController@profilePresidenPtpi') }}" class="btn btn-sm btn-info mt-3">Info lengkap</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head">ASSALAMMU'LAIKUM DAN SALAM SEJAHTERA,</h4>
                            </a>
                            <p style="text-align: justify;">
                                Perkumpulan Teknik Perumahsakitan Indonesia (PTPI) atau dalam bahasa inggris dinamakan
                                <em>Indonesian Association of Hospital Engineering (IAHE)</em> merupakan wadah para ahli
                                teknik dan
                                institusi perumahsakitan yang menginisiasi dan mendorong terciptanya kebijakan, sumber
                                daya
                                manusia, sistem manajemen dan kerja sama untuk mewujudkan rumah sakit di indonesia yang
                                <strong>S</strong>elamat, Ber<strong>M</strong>utu, <strong>A</strong>man,
                                <strong>R</strong>amah Lingkungan, dan <strong>T</strong>erjangkau
                                <strong>(SMART)</strong>. <br> Hal ini sesuai dengan amanah Undang-Undang Kesehatan dan
                                Undang-Undang Rumah Sakit tahun 2009. Melalui situs resmi ini, besar harapan kami untuk
                                mengajak seluruh pihak yang berkaitan dengan teknik perumahsakitan untuk bergabung dan
                                memberi kontribusi positif bagi perkembangan dan kemajuan rumah sakit di tanah air.
                                <hr>
                            <p>Salam hangat</p><br><br>
                            <p>(Prof. Dr.-Ing. Eko Supriyanto)</p>
                            <p>President</p>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div><!-- End Pengantar Section -->

    <!-- ======= Berita Terbaru Section ======= -->
    <div id="services" class="services-area area-padding">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Berita Terbaru <strong class="text-danger">*</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($news as $new)
                <!-- Start Left Blog -->
                <div class="col-md-4 col-sm-4 col-xs-12 mb-5">
                    <div class="single-blog">
                        <div class="single-blog-img">
                            <!-- <a href="{{ action('HomeController@showBerita', $new->id) }}">
                                <img src="{{ asset('assets/news/' . $new->image) }}" alt="" style="border-radius: 5px; width: 100%; height: 240px;" />
                            </a> -->
                            <a href="{{ action('HomeController@showBerita', $new->id) }}">
                                <img src="{{ asset('assets\home\slider\6_bidang.png' . $new->image) }}" alt="" style="border-radius: 5px; width: 100%; height: 240px;" />
                            </a>
                        </div>
                        <div class="blog-meta">
                            <!-- <span class="comments-type">
                                <i class="fa fa-comment-o"></i>
                                <a href="#">13 comments</a>
                            </span> -->
                            <span class="date-type">
                                <i class="fa fa-calendar"></i>
                                {{ $new->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div class="blog-text">
                            <p class="text-link">
                                <a href="{{ action('HomeController@showBerita', $new->id) }}"> {{ $new->judul }}</a>
                            </p>
                        </div>
                        <span>
                            <a href="{{ action('HomeController@showBerita', $new->id) }}" class="ready-btn">Read
                                more</a>
                        </span>
                    </div>
                    <!-- Start single blog -->
                </div>
                <!-- End Left Blog-->
                @endforeach
            </div>
        </div>
    </div><!-- End Berita Terbaru Section -->

    <!-- ======= Artikel Section ======= -->
    <div id="artikel" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Artikel Terbaru <strong class="text-danger">*</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <div class="row">
                                <!-- Start Left Blog -->
                                @foreach ($articles as $article)
                                <!-- Start Left Blog -->
                                <div class="col-md-4 col-sm-4 col-xs-12 mb-5">
                                    <div class="single-blog">
                                        <div class="single-blog-img">
                                            <!-- <a href="{{ action('HomeController@showArtikel', $article->id) }}">
                                                <img src="{{ asset('assets/articles/' . $article->image) }}" alt="" style="border-radius: 5px; width: 100%; height: 240px;" />
                                            </a> -->
                                            <a href="{{ action('HomeController@showArtikel', $article->id) }}">
                                                <img src="{{ asset('assets\home\slider\6_bidang.png') }}" alt="" style="border-radius: 5px; width: 100%; height: 240px;" />
                                            </a>
                                        </div>
                                        <div class="blog-meta">
                                            <!-- <span class="comments-type">
                                                                <i class="fa fa-comment-o"></i>
                                                                <a href="#">13 comments</a>
                                                            </span> -->
                                            <span class="date-type">
                                                <i class="fa fa-calendar"></i>
                                                {{ $article->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                        <div class="blog-text">
                                            <p class="text-link">
                                                <a href="{{ action('HomeController@showArtikel', $article->id) }}">
                                                    {{ $article->judul }}</a>
                                            </p>
                                        </div>
                                        <span>
                                            <a href="{{ action('HomeController@showArtikel', $article->id) }}" class="ready-btn">Read
                                                more</a>
                                        </span>
                                    </div>
                                    <!-- Start single blog -->
                                </div>
                                <!-- End Left Blog-->
                                @endforeach
                                <!-- End Left Blog-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div><!-- End Artikel Section -->

    <!-- ======= Hubungi Kami Section ======= -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>Ingin daftar sebagai member ?</h3>
                        <a class="sus-btn" href="{{action('AuthController@getRegister')}}">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Hubungi Kami Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Hubungi Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-mobile"></i>
                                <p>
                                    Telp: +62 877-7889-9087 (Jordy)<br>
                                    Telp: +62 853-1479-8456 (Adrian)<br>
                                    Telp: +62-821-1288-7869 (Mardiansyah)<br>
                                    <span>Senin - Jumat (9am-5pm)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-envelope-o"></i>
                                <p>
                                    Email: <a href="mailto:admin@iahe.or.id">admin@iahe.or.id</a><br>
                                    <span>Web: www.iahe.or.id</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    Location: Gedung Wisma NH Lantai 1, Jl. Raya Pasar Minggu No.2B-C, RT 002/RW 002,
                                    Pancoran, Kec. Pancoran Kota,<br>
                                    <span>Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row side-map">

                    <!-- Start Google Map -->
                    <div class="col-md-6 col-sm-6 col-xs-12 map">
                        <!-- Start Map -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.55806494695!2d106.83961308947755!3d-6.245338386548261!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b85bf3e09d%3A0x160234e756fdf17b!2sWisma%20NH!5e0!3m2!1sid!2sid!4v1616080917235!5m2!1sid!2sid" width="530" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->

                    <!-- Start  contact -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form contact-form">
                            <form action="{{ action('HomeController@sendEmail') }}" method="POST" role="form" class="contactForm contact-form">
                                {{ csrf_field() }}

                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif


                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center"><button class="ready-btn mt-0" type="submit">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->

</main><!-- End #main -->