@extends('layouts.certified.page')

@section('content')

<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-heading text-uppercase">Dewan Pengarah LSP TPI</h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/prof_eko.png') }}" alt="..." />
                    <h4>Prof. Ir. Dr-Ing Eko Supriyanto</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_benny.jpg') }}" alt="..." />
                    <h4>dr. Benny Purwanto, MARS</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('assets/certified/img/dewan/pak_sodikin.png') }}" alt="..." />
                    <h4>Ir. Sodikin Sadek, M.Kes</h4>
                </div>
            </div>
            
        </div>
    </div>
</section>
    
@endsection