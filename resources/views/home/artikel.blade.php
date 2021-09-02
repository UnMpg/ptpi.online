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
                                <!-- start single post -->
                                @foreach ($articles as $article)
                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="">
                                            <img src="{{ asset('assets/articles/images/' . $article->gambar) }}" alt=""
                                                style="border-radius: 25px;">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="">{{ $article->judul }}</a></p>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End single post -->
                            </div>
                        </div>
                        <!-- recent end -->
                    </div>

                    <div class="single-blog-page">
                        <div class="left-blog">
                            <h4>archive</h4>
                            <ul>
                                <li>
                                    <a href="#"><?= date("d F Y"); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End left sidebar -->

            <!-- Start single blog -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="">
                                    <img src="{{ asset('assets/articles/images/' . $article->gambar) }}" alt=""
                                        style="border-radius: 25px; height: 350px; width: 100%;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>
                                    {{ $article->created_at->format('d F Y / H:i:s') }}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="">{{ $article->judul }} </a>
                                </h4>
                                <p>
                                    {!! str_limit($article->konten, 600) !!}
                                </p>
                            </div>
                            <span>
                                <a href="" class="ready-btn">Read
                                    more</a>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<div class="clearfix"></div>
@endsection
