<div id="home" class="slider-area">
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <img src="{{ asset('assets/blog/img/slider/munas.jpg') }}" alt="" title="#slider-direction-1" />
        </div>

        <!-- direction 1 -->
        <div id="slider-direction-1" class="slider-direction slider-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slider-content">
                            <!-- layer 1 -->
                            <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                                <h2 class="title1">Indonesian Association of Hospital Engineering</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <h1 class="title2">Perkumpulan Teknik Perumahsakitan Indonesia</h1>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <a class="ready-btn right-btn page-scroll" href="#pengantar">Mulai</a>
                                <a class="ready-btn page-scroll" href="<?= base_url('auth/register'); ?>">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction slider-two">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slider-content text-center">
                            <!-- layer 1 -->
                            <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <h2 class="title1"> </h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <h1 class="title2">title 2</h1>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                <a class="ready-btn page-scroll" href="#about">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Slider Area -->

<!-- Start About area -->
<div id="pengantar" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Pengantar</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="well-middle">
                    <div class="single-well">
                        <a href="#">
                            <h4 class="sec-head">ASSALAMMU'LAIKUM DAN SALAM SEJAHTERA,</h4>
                        </a>
                        <p style="text-align: justify;">
                            Perkumpulan Teknik Perumahsakitan Indonesia (PTPI) atau dalam bahasa inggris dinamakan Indonesian Association of Hospital Engineering (IAHE) merupakan wadah para ahli teknik dan institusi perumahsakitan yang menginisiasi dan mendorong terciptanya kebijakan, sumber daya manusia, sistem manajemen dan kerja sama untuk mewujudkan rumah sakit di indonesia
                            yang <strong>S</strong>elamat, ber<strong>M</strong>utu, <strong>A</strong>man, be<strong>R</strong>ekabaru, dan <strong>T</strong>erjangkau <strong>(SMART)</strong>. <br>
                            Hal ini sesuai dengan amanah Undang-Undang Kesehatan dan Undang-Undang Rumah Sakit tahun 2009.
                            Melalui situs resmi ini, besar harapan kami untuk mengajak seluruh pihak yang berkaitan dengan teknik perumahsakitan untuk bergabung dan memberi kontribusi positif bagi perkembangan dan kemajuan rumah sakit di tanah air. <br><br>


                            <p>Salam hangat</p><br><br><br>
                            <p>(Prof. Dr.-Ing. Eko Supriyanto)</p>
                            <p>President</p>

                        </p>
                    </div>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
<!-- End About area -->

<!-- Start Blog Area -->
<div id="berita" class="blog-area">
    <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Berita Terbaru <strong class="text-danger">*</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($brt as $b) : ?>
                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="<?= base_url('berita/detail/') . $b['brt_id']; ?>">
                                    <img src="<?= base_url('assets/img/berita/') . $b['brt_img']; ?>" alt="" style="border-radius: 25px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <!-- <span class="comments-type">
                <i class="fa fa-comment-o"></i>
                <a href="#">13 comments</a>
              </span> -->
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i><?= date("d F Y H:i:s", strtotime($b['brt_datecreated'])); ?>
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="<?= base_url('berita/detail/') . $b['brt_id']; ?>"><?= $b['brt_judul']; ?></a>
                                </h4>
                                <p>
                                    <?php
                                    $string = strip_tags($b['brt_konten']);
                                    if (strlen($string) > 150) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 150);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                    ?>
                                </p>
                            </div>
                            <span>
                                <a href="<?= base_url('berita/detail/') . $b['brt_id']; ?>" class="ready-btn">Read more</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Left Blog-->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<!-- Start Blog Area -->
<div id="artikel" class="blog-area">
    <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Artikel Terbaru <strong class="text-danger">*</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($art as $a) : ?>
                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="<?= base_url('artikel/detail/') . $a['art_id']; ?>">
                                    <img src="<?= base_url('assets/img/artikel/') . $a['art_img']; ?>" alt="" style="border-radius: 25px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i><?= date("d F Y H:i:s", strtotime($a['art_datecreated'])); ?>
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="<?= base_url('artikel/detail/') . $a['art_id']; ?>"><?= $a['art_judul']; ?></a>
                                </h4>
                                <p>
                                    <?php
                                    $string = strip_tags($a['art_konten']);
                                    if (strlen($string) > 150) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 150);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                    ?>
                                </p>
                            </div>
                            <span>
                                <a href="" class="ready-btn">Read more</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Left Blog-->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<div id="aktifitas" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Jadwal Mendatang</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-blog">
                    <div class="blog-meta">
                        <span class="date-type">
                            <i class="fa fa-calendar"></i>17 Juli 2020
                        </span>
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="http://iahe.or.id/berita/detail/5">Seminar Online HVAC & Ruang Isolasi Di Era "New Normal" </a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-blog">
                    <div class="blog-meta">
                        <span class="date-type">
                            <i class="fa fa-calendar"></i>24 Juli 2020
                        </span>
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="http://iahe.or.id/berita/detail/6">Seminar Online Gas Medik & Vakum Medik Di Era "New Normal"</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Row -->
    </div>
</div>

<!-- Start Suscrive Area -->
<div class="suscribe-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                <div class="suscribe-text text-center">
                    <h3>Ingin daftar sebagai member ?</h3>
                    <a class="sus-btn" href="">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Suscrive Area -->
<!-- Start contact Area -->
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
                                Telp: +6285 641 345 581<br>
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
                                Location: Gedung Wisma NH Lantai 1, Jl. Raya Pasar Minggu No.2B-C 2 1 2, RT.2/RW.2, Pancoran, Kec. Pancoran,<br>
                                <span>Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.55806494695!2d106.83961308947755!3d-6.245338386548261!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b85bf3e09d%3A0x160234e756fdf17b!2sWisma%20NH!5e0!3m2!1sid!2sid!4v1616080917235!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
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
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area
