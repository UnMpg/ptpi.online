@extends('layouts.home.app')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    @if ($status)
                    <h3>Tanda Tangan Berhasil Di Identifikasi</h3>
                    <i class="fa fa-check-circle" style="font-size:72px;"></i>
                    <br><br>
                    <h3>Screenshot Surat</h3>
                    <img src="{{ asset('assets/surat/' . $datacenter->image) }}" alt="image" class="img-fluid" width="300" height="300">
                    @else
                    <h3>404</h3>
                    <h3>MAAF, QRCODE/NOMOR SERTIFIKAT TIDAK ADA DALAM DATABASE KAMI</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@if ($status)
<script>
    Swal.fire(
            'Data Ditemukan',
            "{{ $datacenter->filename }}",
            'success'
        )
</script>
@else
<script>
    Swal.fire({
            icon: 'error',
            title: 'Maaf...',
            text: 'Data Tidak Valid!'
        })
</script>
@endif
@endsection
