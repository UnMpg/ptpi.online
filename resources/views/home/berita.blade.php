@extends('layouts.home.app')
@section('content')
<div id="about" class="service-area area-padding" style="margin-bottom: -100px;">
    <!-- <div class="home-overly"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Berita</h2>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                            <h1 class="title2">Berita</h1>
                        </div>
                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                            <h2 class="title3">Profesional Blog Page</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
                        <form action="{{ action('HomeController@searchBerita') }}" method="GET">
                            <div class="search-option">
                                <input type="text" name="search" placeholder="Search...">
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
                                @foreach ($news as $new)
                                <!-- start single post -->
                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="{{ action('HomeController@showBerita', $new->id) }}">
                                            <img src="{{ asset('assets/news/' . $new->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="{{ action('HomeController@showBerita', $new->id) }}">{{ $new->judul }}</a></p>
                                        <small>{{ $new->created_at->format('d F Y') }}</small>
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
                @if($news->isNotEmpty())
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @foreach ($news as $new)
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="{{ action('HomeController@showBerita', $new->id) }}">
                                    <img src="{{ asset('assets/news/' . $new->image) }}" alt="image" style="border-radius: 5px; object-fit:cover; height: 400px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>{{ $new->created_at->format('d F Y / H:i:s') }}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="{{ action('HomeController@showBerita', $new->id) }}">{{ $new->judul }}</a>
                                </h4>
                                <p>
                                    {!! str_limit($new->konten, 600) !!}
                                </p>
                            </div>
                            <span>
                                <a href="{{ action('HomeController@showBerita', $new->id) }}" class="ready-btn">Read
                                    more</a>
                            </span>
                        </div>
                        @endforeach
                        {{ $news->links() }}
                    </div>

                </div>
                @else
                <div class="text-center">
                    <h2>No news found</h2>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<div class="clearfix"></div>
@endsection