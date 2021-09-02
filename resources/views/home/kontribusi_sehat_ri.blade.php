@extends('layouts.home.app')
@section('title-page', 'Kontribusi - Sehat-RI')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <!-- single-well start-->
            <div class="col-2"></div>
            <div class="col-8">
                <br><br>
                @include('layouts.shared.status')
                <br>
                <div class="form contact-form">
                    <div class="card">
                        <div class="card-header">
                            <b>KONTRIBUSI SEHAT-RI</b>
                        </div>
                        @php
                            $content = nl2br(
                                    "Kontribusi untuk Sehat-RI dapat diberikan melalui rekening:
                                    -------------------------------------------------------------------------------
                                    No. Rekening: (menyusul)
                                    Bank: (menyusul)
                                    Berita : Nama Anda, No Referal Sehat RI, alamat email

                                    Setelah Anda mengirimkan kontribusi, Anda akan memperoleh tanda terima melalui  alamat email yang terdaftar dalam Sehat-RI, selambat-lambatnya 48 jam setelah kontribusi  Anda masuk dalam rekening kami. Selain itu, Anda juga akan memperoleh Poin Investasi yang akan terupdate dalam aplikasi mobile SEHAT-RI Anda. Setiap Rp.100 000 kontribusi, anda akan memperoleh 1 poin investasi. Kontribusi yang terkumpul akan digunakan untuk biaya pengembangan, biaya sewa server, dan biaya lainnya yang diperlukan untuk operasional SEHAT-RI.
                                    Jumlah kontribusi yang terkumpul akan diumumkan setiap minggu melalui website PTPI. Penggunaan kontribusi yang terkumpul juga akan diumumkan setiap minggu melalui website PTPI.
                                    Kontribusi ini sifatnya adalah sukarela, meskipun demikian kami akan mencatat setiap kontribusi, dan menkonversinya menjadi poin investasi SEHAT-RI. Kami tidak berjanji, meskipun demikian kami akan berusaha keras untuk mewujudkan SEHAT-RI sebagai aplikasi digital yang memberikan manfaat kesehatan dan manfaat ekonomi bagi para kontributor.
                                    Demikian, terima kasih, dan Tetap Sehat bersama SEHAT-RI.
                                    Presiden Perkumpulan Teknik Perumahsakitan Indonesia

                                    Catatan: Berita tentang Permohonan Kontribusi untuk Pengembangan dan Operasional SEHAT RI dapat "
                    );
                        @endphp
                        <div class="card-body">
                            <p class="text-justify">
                                {!! $content !!}
                                <a href="{{ action('HomeController@suratPermohonanLengkap') }}">diklik disini.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
