@extends('layouts.certified.page')

@section('content')

<div class="page-view bg-light" >
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">Berita</h2>
            <br>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="page-head-blog">
                    <div class="single-blog-page">
                        <!-- search option start -->
                        <form action=" " method="GET">
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
                                
                                <!-- start single post -->
                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="#">
                                            <img src="{{ asset('assets/home/img/news.jpg') }}"  alt="">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="#">Judul Berita terbaru</a></p>
                                        <small>12 May 2022</small>
                                    </div>
                                </div>
                                <!-- End single post -->
                               

                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="#">
                                            <img src="{{ asset('assets/home/img/news.jpg') }}"  alt="">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="#">BERITA KE 2</a></p>
                                        <small>12 Juli 2022</small>
                                    </div>
                                </div>

                                <!-- start single post -->
                                <div class="recent-single-post">
                                    <div class="post-img">
                                        <a href="#">
                                            <img src="{{ asset('assets/home/img/news.jpg') }}"  alt="">
                                        </a>
                                    </div>
                                    <div class="pst-content">
                                        <p><a href="#">Berita 3</a></p>
                                        <small>12 May 2022</small>
                                    </div>
                                </div>
                                <!-- End single post -->
                               
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
                        {{-- single blog --}}
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{ asset('assets/home/img/news.jpg') }}" alt="image" style="border-radius: 5px; object-fit:cover; height: 400px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i> 13 juli 2022
                                </span>
                            </div>

                            <div class="blog-text">
                                <h5>
                                    <a href="#">Judul Dari Berita yang ada</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ratione cupiditate labore cumque. Sed rerum, recusandae beatae sint laborum nesciunt id necessitatibus odit nobis nisi error est voluptatem eius adipisci.
                                </p>
                            </div>
                            <div class="blog-btn">
                                <a href="">Read</a>
                            </div>

                        </div>
                        {{-- end single blog --}}

                        {{-- single blog --}}
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{ asset('assets/home/img/news.jpg') }}" alt="image" style="border-radius: 5px; object-fit:cover; height: 400px;">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i> 13 juli 2022
                                </span>
                            </div>

                            <div class="blog-text">
                                <h5>
                                    <a href="#">Judul Dari Berita yang ada</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ratione cupiditate labore cumque. Sed rerum, recusandae beatae sint laborum nesciunt id necessitatibus odit nobis nisi error est voluptatem eius adipisci.
                                </p>
                            </div>
                            <div class="blog-btn">
                                <a href="">Read</a>
                            </div>

                        </div>
                        {{-- end single blog --}}

                    </div>

                </div>
            </div>
        </div>
        
        
    </div>
</div>
    
@endsection