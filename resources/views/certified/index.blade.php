@extends('layouts.certified.app')

@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To!</div>
        <div class="masthead-heading text-uppercase">LSP TPI</div>
        <a class="btn btn-primary btn-xl text-uppercase btn-daftar" href="{{ action('CertifiedMemberController@register') }}">Daftar Sekarang</a>
    </div>
</header>
<!-- About-->
<div class="" id="about" id="home-page">
    <div class="about-visi">
    <div class="container ">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">LSP TPI</h2>
            <br>
            <p>
                Lembaga Sertifikasi Perkumpulan Teknik Perumahsakitan Indonesia (LSP TPI) didirikan dengan tujuan memenuhi ketersediaan para ahli yang kompeten di bidang pelayanan kesehatan.
            </p>
        </div>
        <div class="row text-center mb-4">
            <h2 class="section-heading text-uppercase mb-4">Visi</h2>
            <p>
                Menjadi Lembaga Sertifikasi Person Terbaik di Indonesia Dalam Bidang Teknik Perumasakitan 
            </p>
        </div>
        <div class="row">
            <h2 class="section-heading text-uppercase mb-4 text-center">Misi</h2>
            <p>1. Mengembangkan metode dan kurikulum kompetensi untuk para ahli teknik perumahsakitan  </p>
            <p>2. Melaksanakan penilaian para Praktisi Teknik Perumasakitan untuk memastikan mereka bekerja secara kompeten atau dengan baik di rumah sakit </p>
            <p>3. Melakukan evaluasi kebutuhan teknik perumahsakitan di Indonesia</p>
            <p>4. Menjalin hubungan dengan berbagai stakeholder baik didalam maupun luar negeri untuk memastikan kompetensi para ahli Teknik perumahsakitan 
                dapat secara efektif digunakan di rumah sakit dan diakui secara Nasional dan Internasional </p>
        </div>
    </div>
    </div>
</div>

{{-- Alur Sertifikasi --}}
<section class="page-section bg-light " id="alur">
    <div class="container">
        <div class="row text-center alur-judul " >
            <h2 class="section-heading text-uppercase mb-4">Alur Sertifikasi</h2>
        </div>
        <div class="row container_sticky">
            <div class="col-md-6 img-sticky text-center">
                <img src="{{ asset('assets/certified/img/lsp.png') }}" alt="">
            </div>
            <div class="col-md-6 px-4 px-md-0">
                <ul class="alur pl-4">
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Register</h3>
                                <small>Melakukan pendaftaran akun serta pengisian biodata diri</small>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Jadwal Register 
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Lengkapi Data dan Submit Dokumen</h3>
                                <small> </small>
                            </div>
                            <div class="col-md-12 alur-content-body">
                                Mengisi Data diri dan mengupload Ktp, CV dan Lainnya
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer" style="margin-left: 2rem">
                        <div class="row alur-content-2">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Pengumuman</h3>
                                <small>Pengumuman Hasil Verikasi Data dan Dokument</small>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Jadwalnya :......... 
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Verikasi Ujian Tulis</h3>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Peserta Melakukan Upload Bukti Pembayaran dan Memilih tempat dan Jadwal ujian Tulis 
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Ujian Tulis</h3>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Jadwal 
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer" style="margin-left: 2rem">
                        <div class="row alur-content-2">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Pengumuman Hasil Ujian Tulis</h3>
                                <small></small>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Bagi Peserta yang Memenuhi Syarat Akan Melanjutkan pada Tahap Wawancara
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Wawancara</h3>
                            </div>
                            <div class="col-md-12 alur-content-body">
                               <small>Peserta Akan di Wawancarai Oleh Pengawas dan Dewan Pakar LSP TPI </small> 
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content-lolos">
                            <div class="col-md-12 p-3 ">
                                <h3>Lolos Sertifikasi</h3>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>

        </div>
    </div>
</section>

<div class="daftar-sertifikasi " id="daftar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                <div class="sertifikasi-daftar text-center">
                    <div  style="display: inline">
                    <h3>Daftar Sertifikasi </h3>
                    <a class="btn btn-primary btn-xl text-uppercase btn-daftar" style="margin-left: 2rem" href="{{ action('CertifiedMemberController@register') }}">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- News Grid-->
<section class="page-section " id="news">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Berita</h2>
            {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            <br>
        </div>
        <div class="row " >
            <div class="col-lg-4 col-sm-6 mb-4 " style="justify-content: center;">
                <!-- Portfolio item 1-->
                <div class="card" >
                    <a href="#portfolioModal1" data-bs-toggle="modal" ><img src="{{ asset('assets/home/img/news.jpg') }}" class="card-img-top" alt="..."></a>
                    
                    <div class="card-body">
                      <h5 class="card-title">Berita 1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi provident quasi a architecto iure ipsum odit recusandae fuga consectetur! Iure provident officia corporis hic illo alias neque suscipit aliquid sint?</p>
                      <a href="#portfolioModal1" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="card" >
                    <a href="#portfolioModal2" data-bs-toggle="modal" ><img src="{{ asset('assets/home/img/news.jpg') }}" class="card-img-top" alt="..."> </a>
                    <div class="card-body">
                      <h5 class="card-title">Berita 2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi provident quasi a architecto iure ipsum odit recusandae fuga consectetur! Iure provident officia corporis hic illo alias neque suscipit aliquid sint?</p>
                      <a href="#portfolioModal2" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="card" >
                    <a href="#portfolioModal3" data-bs-toggle="modal" ><img src="{{ asset('assets/home/img/news.jpg') }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">Berita 1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi provident quasi a architecto iure ipsum odit recusandae fuga consectetur! Iure provident officia corporis hic illo alias neque suscipit aliquid sint?</p>
                      <a href="#portfolioModal3" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hubungi Kami</h2>
            <br>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="map-view">
                <iframe  width="100%" height="300px"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.55806494695!2d106.83961308947755!3d-6.245338386548261!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b85bf3e09d%3A0x160234e756fdf17b!2sWisma%20NH!5e0!3m2!1sid!2sid!4v1616080917235!5m2!1sid!2sid"
                             style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <div class="col-md-6">
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-3">
                        
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group ">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        
                            <div class="form-group form-group-textarea ">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
        
        
    </div>
</section>



<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/certified/img/close.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Berita 1</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/news.jpg') }}" alt="..." />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>
                                    <strong>Client:</strong>
                                    Threads
                                </li>
                                <li>
                                    <strong>Category:</strong>
                                    Illustration
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio item 2 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/certified/img/close.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Berita</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/news.jpg') }}" alt="..." />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio item 3 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/certified/img/close.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Berita 3</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/news.jpg') }}" alt="..." />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection