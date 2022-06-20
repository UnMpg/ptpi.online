@extends('layouts.home.app')
@section('title-page', 'Member Guideline')
@section('content')
<!-- Start About area -->
<!-- ======= Pengantar Section ======= -->
<div id="about" class="area-padding" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Guideline Membership</h2>
                </div>
            </div>
        </div>
        <div class="row guide">
            <div class="col-md-6 d-flex ">
                <div class="col-md-4 guide-title ">
                    <div class="stg-lingkaran-1"></div>
                    <h4 class="guide-title-1">Anggota Biasa</h4>
                </div>
                <div class="col-md-8 guide-cont">
                    <p>Warga Negara Indonesia</p>
                    <p>Mendaftar seminar/webinar PTPI</p>
                    <p>Mendaftar dalam Sehat RI</p>
                    <p>Tertarik berkontribusi dalam pelayanan kesehatan di Indonesia</p>
                </div>
            </div>
            <div class="col-md-6 d-flex ">
                <div class="col-md-4 guide-title ">
                    <div class="stg-lingkaran-2"></div>
                    <h4 class="guide-title-2">Ahli Teknik</h4>
                </div>
                <div class="col-md-8 guide-cont">
                    <p>Warga Negara Indonesia</p>
                    <p>Lulusan S1</p>
                    <p>Pengalaman minimal 3 tahun dalam bidang teknik perumahsakitan</p>
                    <p>Lulus ujian sertifikasi</p>
                </div>
            </div>
            
            <!-- End col-->
        </div>
        <div class="row mt-3 guide">
            <div class="col-md-6 d-flex">
                <div class="col-md-4 guide-title  ">
                    <div class="stg-lingkaran-3"></div>
                    <h4 class="guide-title-3">Kehormatan</h4>
                </div>
                <div class="col-md-8 guide-cont">
                    <p>Berkontribusi Besar dalam PTPI</p>
                    <p>Diakui oleh pengurus pusat dewan Pengawas</p>
                </div>
            </div>
            <div class="col-md-6 d-flex ">
                <div class="col-md-4 guide-title  ">
                    <div class="stg-lingkaran-4"></div>
                    <h4 class="guide-title-4">Korporat</h4>
                </div>
                <div class="col-md-8 guide-cont">
                    <p>Lembaga/ Institusi yang berkontribusi</p>
                    <p>Diakui oleh pengurus</p>
                </div>
            </div>
            
            <!-- End col-->
        </div>
    </div>
</div><!-- End Pengantar Section -->

@endsection
