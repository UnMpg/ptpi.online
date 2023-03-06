@extends('layouts.certifiedUjian.app')
@section('title','Selesai Ujian')

@section('content')

<div class="home">
    <div class="container">
        <div class="text-center head-waktu">
           
        </div>
        <div class="body-ketentuan">
            <h2 class="text-center">Terima Kasih Anda Telah Melakukan Ujian Online</h2>

            <p class="text-center">Silahkan Menunggu Informasi Selanjutnya yang Akan diberitahukan Oleh Panitia
            </p>

            <a href="{{ action('CertifiedMemberController@index') }}" class="btn btn-primary text-center">Kembali</a>

        </div>
    </div>
</div>
    
@endsection
