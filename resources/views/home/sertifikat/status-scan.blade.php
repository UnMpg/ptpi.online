@extends('layouts.home.app')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h3>{{ 'Tabel Pencarian Sertifikat' }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Tema Seminar</th>
                        </thead>
                        <tbody>
                            @if ($status)
                            @if ($certificateUpdate)
                            <td class="text-left">{{ $newCertificate->nama }}</td>
                            <td class="text-left">{{ $newCertificate->email }}</td>
                            <td class="text-left">{{ $certificate->name }}</td>
                            @else
                            <td class="text-left">{{ $oldCertificate->nama }}</td>
                            <td class="text-left">{{ $oldCertificate->email }}</td>
                            <td class="text-left">{{ $certificate->name }}</td>
                            @endif
                            @else
                            <td colspan="3">Maaf, Sertifikat tidak ditemukan dalam database kami!</td>
                            @endif
                        </tbody>
                    </table>
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
            "",
            'success'
        )
</script>
@else
<script>
    Swal.fire({
            icon: 'error',
            title: 'Maaf...',
            text: 'Sertifikat Tidak Ditemukan!'
        })
</script>
@endif
@endsection
