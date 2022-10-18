@extends('layouts.certified.app')

@section('content')
<header class="masthead" id="home-page">
    <div class="container">
        <div class="masthead-heading text-uppercase" style="margin-bottom: 2rem">LSP TPI</div>
        <div class="masthead-subheading mb-4 ">Lembaga Sertifikasi Person <br> Teknik Perumahsakitan Indonesia</div>
        <a class="btn btn-primary btn-xl text-uppercase btn-daftar" href="{{ action('CertifiedMemberController@register') }}">Daftar Sekarang</a>
    </div>
</header>

{{-- {{-- <div class="high-light bg-light"> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h3 class="high-light-title">
                    Berita Terkini
                </h3>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="high-light-img">
                        
                        <div class="high-light-content">
                            <img src="{{ asset('assets/certified/img/pendaftaran.jpeg') }}" class="card-img-top" alt="...">
                            <div class="container content-high ">
                                {{-- <h4>LSP TPI Membuka Pendaftaran Sertifikasi Pelayanan Kesehatan</h4>
                                <p>pada tanggal 13 Oktober 2022 – 25 Oktober 2022</p> --}}
                    
                            </div>
                            
                        </div>
                    </div>
                    {{-- <div class="high-light-img">
                        
                        <div class="high-light-content">
                            <img src="{{ asset('assets/certified/img/berita.png') }}" class="card-img-top" alt="...">
                            <div class="container content-high">
                                <h4>Berita 2</h4>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur incidunt, debitis maiores odit accusantium aliquam in eum expedita, rem magni blanditiis commodi! Enim accusamus reiciendis dignissimos eum aperiam natus quam!</p>
                    
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="high-light-img">
                        
                        <div class="high-light-content">
                            <img src="{{ asset('assets/certified/img/berita.png') }}" class="card-img-top" alt="...">
                            <div class="container content-high">
                                <h4>Berita 3</h4>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur incidunt, debitis maiores odit accusantium aliquam in eum expedita, rem magni blanditiis commodi! Enim accusamus reiciendis dignissimos eum aperiam natus quam!</p>
                    
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About-->
{{-- <div class="" id="about" id="home-page">
    <div class="about-visi">
    <div class="container ">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">LSP TPI</h2>
            <br>
            <p>
                Lembaga Sertifikasi Person Teknik Perumahsakitan Indonesia (LSP TPI) didirikan dengan tujuan memenuhi ketersediaan para ahli yang kompeten di bidang pelayanan kesehatan.
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
</div> --}}

<div class="manfaat-sertifikasi  " id="manfaat">
    <div class="container ">
        <div class="row ">
            <h2 class="title-manfaat section-heading text-uppercase text-center ">MANFAAT SERTIFIKASI PROFESI</h2>
            <p class="mt-4 manfaat-detail">Dengan adanya sertikasi person ini, maka anda akan mendapatkan beberapa  maanfaat diantara lain :</p>
        </div>
        
        <div class="urutan ">
            <div class="container">
                <h3 class="manfaat-no" >1. &nbsp; Sebagai tanda bukti memiliki keahlian (kompetensi) sesuai bidangnya.</h3>
            </div>
        </div>

        <div class="isi-urutan">
            <p>Manfaat utama memiliki sertikasi profesi ini, adalah sebagai tanda bukti 
                bahwa anda memiliki kemampuan atau keahlian dalam bidang teknik perumahsakitan. Sehingga dengan sertifikasi memberikan tanda bahwa pemegang 
                sertifikat tersebut kompeten dalam menjalankan tugas bidang teknik perumahsakitan.</p>
        </div>

        <div class="urutan ">
            <div class="container">
                <h3 class="manfaat-no" >2. &nbsp; Dapat membuka kesempatan karir yang lebih luas</h3>
            </div>
        </div>

        <div class="isi-urutan">
            <p>Dengan keahlian atau kompetensi yang dimiliki dibuktikan dengan tanda sertifikasi ini, 
                maka anda dapat mengembangkan karir untuk dapat berkecimpung dalam bidang teknik perumahsakitan.</p>
        </div>

        <div class="urutan ">
            <div class="container">
                <h3 class="manfaat-no" >3. &nbsp; Ikut serta dalam pengembagan kualitas SDM di bidang perumahsakitan</h3>
            </div>
        </div>
        <div class="isi-urutan">
            <p>Dengan adanya sertifikasi bidang teknik perumahsakitan maka 
                meingkatkan kompetensi sumber daya manusia yang telah berkecimpung dalam bidang perumahsakitan, 
                sehingga kualitas SDM lebih meningkat.</p>
        </div>
                

    </div>
</div>
<div class="uu bg-light" id="uu">
    <div class="container">
        <div class="row ">
            <h2 class="title-manfaat section-heading text-uppercase text-center ">UU Tentang Sertifikasi</h2>    
        </div>
        <div class="uu-no">
            <h4> UU no 36 Tahun 2014 tentang tenaga kesehatan</h4>
        </div>
        <div class="uu-no">
            <h4>PP no 72 tahun 2012 tentang sistem kesehatan nasional</h4>
        </div>
        <div class="uu-no">
            <h4>PP no  35 Tahun 2015 tentang kementerian kesehatan </h4>
        </div>
        <div class="uu-no">
            <h4>PP no 67 tahun 2019 Tentang pengelolaan tenaga kesehatan</h4>
        </div>
        <div class="uu-no">
            <h4>PP no 5 tahun 2021 tentang Penyelenggaraan Perijinan Berbasis Resiko (OSS)</h4>
        </div>
        <div class="uu-no">
            <h4>PP no 47 tahun 2021 tentang penyelenggaraan bidang pelayanan kesehatan, termasuk dalam tenaga kesehatan</h4>
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
                <img src="{{ asset('assets/certified/img/lsp.png') }}" width="80%" alt="">
            </div>
            <div class="col-md-6 px-4 px-md-0">
                <ul class="alur pl-4">
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Register</h3>
                                {{-- <small>Melakukan pendaftaran akun serta pengisian biodata diri</small> --}}
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Melakukan pendaftaran akun serta pengisian biodata diri
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Lengkapi Data dan Submit Dokumen</h3>
                                {{-- <small> Mengisi data diri dan mengunggah CV dan berkas pendukung </small> --}}
                            </div>
                            <div class="col-md-12 alur-content-body">
                                Mengisi data diri dan mengunggah CV dan berkas pendukung
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer" style="margin-left: 2rem">
                        <div class="row alur-content-2">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Pengumuman</h3>
                                {{-- <small>Pengumuman Hasil Verikasi Data dan Dokument</small> --}}
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Pengumuman Hasil Verikasi Data dan Dokument
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Verikasi Ujian Tulis</h3>
                                {{-- <small>Peserta mengunggah bukti pembayaran dan memilih jadwal dan tempat ujian tulis</small> --}}
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Peserta mengunggah bukti pembayaran dan memilih jadwal dan tempat ujian tulis
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Ujian Tulis</h3>
                            </div>
                            {{-- <div class="col-md-12 alur-content-body">
                               Jadwal 
                            </div> --}}
                        </div>
                    </li>
                    <li class="alur-primer" style="margin-left: 2rem">
                        <div class="row alur-content-2">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Pengumuman Hasil Ujian Tulis</h3>
                                {{-- <small>Bagi peserta yang memenuhi syarat kelulusan ujian tulis akan melanjutkan tahap wawancara</small> --}}
                            </div>
                            <div class="col-md-12 alur-content-body">
                               Bagi peserta yang memenuhi syarat kelulusan ujian tulis akan melanjutkan tahap wawancara
                            </div>
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content">
                            <div class="col-md-12 p-3 alur-content-head">
                                <h3>Wawancara</h3>
                            </div>
                            {{-- <div class="col-md-12 alur-content-body">
                               <small>Peserta Akan di Wawancarai Oleh Pengawas dan Dewan Pakar LSP TPI </small> 
                            </div> --}}
                        </div>
                    </li>
                    <li class="alur-primer">
                        <div class="row alur-content-lolos">
                            <div class="col-md-12 p-3 ">
                                <h4>Lolos Sertifikasi</h4>
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
                    <a href="#portfolioModal1" data-bs-toggle="modal" ><img src="{{ asset('assets/certified/img/pendaftaran.jpeg') }}" class="card-img-top" alt="..."></a>
                    
                    <div class="card-body">
                      <h5 class="card-title">LSP TPI Membuka Pendaftaran Sertifikasi Pelayanan Kesehatan</h5>
                      <p class="card-text">Badan Sertifikasi Pelayanan Kesehatan LSP TPI (Teknik Perumahsakitan Indonesia) membuka
                        pendaftaran sertifikasi Ahli Muda, Madya, dan Utama pada tanggal 13 Oktober 2022 – 25 Oktober 2022.</p>
                      <a href="#portfolioModal1" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="card" >
                    <a href="#portfolioModal2" data-bs-toggle="modal" ><img src="{{ asset('assets/certified/img/berita.png') }}" class="card-img-top" alt="..."> </a>
                    <div class="card-body">
                      <h5 class="card-title">Berita 2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi provident quasi a architecto iure ipsum odit recusandae fuga consectetur! Iure provident officia corporis hic illo alias neque suscipit aliquid sint?</p>
                      <a href="#portfolioModal2" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="card" >
                    <a href="#portfolioModal3" data-bs-toggle="modal" ><img src="{{ asset('assets/certified/img/berita.png') }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">Berita 1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi provident quasi a architecto iure ipsum odit recusandae fuga consectetur! Iure provident officia corporis hic illo alias neque suscipit aliquid sint?</p>
                      <a href="#portfolioModal3" data-bs-toggle="modal" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div> --}}
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
                <form id="contactForm" method="POST" action="{{ action('CertifiedMemberController@insertSendEmail') }}" >
                    @csrf
                    <div class="row align-items-stretch mb-3">
                        
                            <div class="form-group">
                                <!-- Name input-->
                                <input name="nama" class="form-control" id="name" type="text" placeholder="Nama *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nama Anda.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input name="email" class="form-control" id="email" type="email" placeholder="Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Email Anda.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email tidak valid.</div>
                            </div>
                            <div class="form-group ">
                                <!-- Phone number input-->
                                <input name="telp" class="form-control" id="phone" type="tel" placeholder="Nomor Telepon *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Nomor Telpon Anda.</div>
                            </div>
                        
                            <div class="form-group form-group-textarea ">
                                <!-- Message input-->
                                <textarea name="pesan" class="form-control" id="message" placeholder="Pesan *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Pesan anda.</div>
                            </div>
                        
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    {{-- <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Pesan Sudah Terkirim </div>                            
                            <a href="#"></a>
                        </div>
                    </div> --}}
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    {{-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div> --}}
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " type="submit">Send Message</button></div>
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
                            <h2 class="text-uppercase" style="font-size: 2rem">Pendaftaran Sertifikasi Pelayanan Kesehatan</h2>
                            <img class="img-fluid d-block mx-auto" src="{{ asset('assets/certified/img/pendaftaran.jpeg') }}" alt="..." />
                            <p>Badan Sertifikasi Pelayanan Kesehatan LSP TPI (Teknik Perumahsakitan Indonesia) membuka
                                pendaftaran sertifikasi Ahli Muda, Madya, dan Utama pada tanggal 13 Oktober 2022 – 25 Oktober 2022.
                                Pendaftaran lebih lanjut dapat menghubungi kotak person atau membuka website ptpi.</p>
                            
                            <a class="btn btn-primary btn-xl text-uppercase btn-daftar" href="{{ action('CertifiedMemberController@register') }}">Daftar Sekarang</a>
                            <button class="btn btn-primary btn-xl text-uppercase btn-daftar" data-bs-dismiss="modal" type="button">
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