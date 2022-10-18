@extends('layouts.certified.page')

@section('content')

<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-heading text-uppercase">Dewan Pakar LSP TPI</h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_hilmad.jpg') }}" alt="..." />
                    <h4>Ir. Hilmad Hamid., H.Eng</h4>
                    <p class="text-muted">Dewan Pakar Bidang Elektrikal, Mekanikal dan Bangunan Rumah Sakit</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_setyo.jpg') }}" alt="..." />
                    <h4>Ir. Setyo Triyono, AUt., HAEI., ACPE</h4>
                    <p class="text-muted">Dewan PTPI Bidang Elektrikal Rumah Sakit</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_nasir.jpg') }}" alt="..." />
                    <h4>Ir. Mohammad Nasir, M.Si</h4>
                    <p class="text-muted">Dewan Pakar Bidang Lingkungan </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_sutowo.jpg') }}" alt="..." />
                    <h4>Ir. Achmad Sutowo, MARS., HAEI., ACPE., IPU</h4>
                    <p class="text-muted">Dewan Pakar Bidang MEP </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_adi.jpg') }}" alt="..." />
                    <h4>Ir. Adi Utomo Hatmoko, M.Arch., IAI., AA</h4>
                    <p class="text-muted">Dewan Pakar PTPI Bidang Bangunan Rumah sakit</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_john.png') }}" alt="..." />
                    <h4>Ir. John Budi Harijanto Listijono, M.Eng.Sc. Fellow ASHRAE., IPU</h4>
                    <p class="text-muted">Dewan Pakar PTPI Bidang HVAC</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_jusuf.png') }}" alt="..." />
                    <h4>Dipl.-Ing, Jusuf Umar</h4>
                    <p class="text-muted">Dewan Pakar PTPI Bidang Gas Medis</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_benny.jpg') }}" alt="..." />
                    <h4>dr. Benny Purwanto, MARS</h4>
                    <p class="text-muted">Dewan Pakar PTPI Bidang Peralatan Medis</p>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection