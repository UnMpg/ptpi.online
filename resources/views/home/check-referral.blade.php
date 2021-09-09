@extends('layouts.home.app')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h3>Cek Nomor Referral</h3>
                    <form action="{{ action('HomeController@checkReferral') }}" method="GET">
                        @csrf
                        <div class="form-group text-left">
                            <small class="text-secondary"><em>Contoh: +62875000000 atau 08962000000</em></small>
                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan nomor hp atau email anda...">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">
                                Periksa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@if ($inputNotEmpty)
@if ($referral_code)
<script>
    Swal.fire(
        'Data Ditemukan',
        "Referral Code:<br><i>{{ $referral_code }}</i>",
        'success'
    )
</script>
@else
<script>
    Swal.fire({
        icon: 'error',
        title: 'Maaf...',
        text: 'Referral tidak ditemukan!'
    })
</script>
@endif
@endif
@endsection