@extends('layouts.home.app')
@section('content')
<div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                            <h1 class="title2">Artikel</h1>
                        </div>
                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                            <!-- <h2 class="title3">Profesional Blog Page</h2> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->

<div class="blog-page area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="page-head-blog">
                    <div class="single-blog-page">
                        <!-- search option start -->
                        <form action="#">
                            <div class="search-option">
                                <input type="text" placeholder="Search...">
                                <button class="button" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <!-- search option end -->
                    </div>
                    <div class="single-blog-page">
                        <!-- recent start -->
                        <div class="left-blog">
                            <h4>recent post</h4>
                            <div class="recent-post">
                                @foreach ($articleAll as $item)
                                <!-- start single post -->
                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="">
                                            <img src="{{ asset('assets/article/' . $item->image) }}" alt="" style="border-radius: 25px;">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="">{{ $item->judul }}</a></p>
                                    </div>
                                </div>
                                <!-- End single post -->
                                @endforeach
                            </div>
                        </div>
                        <!-- recent end -->
                    </div>
                </div>
            </div>
            <!-- End left sidebar -->

            <!-- Start single blog -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="">
                                    <img src="{{ asset('assets/articles/images/' . $article->image) }}" alt="image" style="width: 100%; height: 350px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i><?= date("d F Y / H:i:s"); ?>
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="">{{ $article->judul }}</a>
                                </h4>
                                <p>
                                    {!! $article->konten !!}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<div class="clearfix"></div>
@endsection