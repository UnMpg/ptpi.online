@extends('layouts.home.app')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="m-3 pb-0" style="margin-bottom: 0 !important">
                @include('layouts.shared.status')
            </div>
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Sertifikat Seminar PTPI</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-3 col-sm-3 col-xs-3 text-center"></div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="well-left">
                    <div class="single-well">
                        <form action="{{ action('HomeController@getSertifikatCommon') }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label>Tema Seminar</label>
                                <select name="seminar_id" class="form-control" required>
                                    <option value="">~ Pilih Tema Seminar ~</option>
                                    @foreach ($seminars as $seminar)
                                    <option value="{{ $seminar->id }}">
                                        {{ str_limit($seminar->name, 70) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pencarian Sertifikat Berdasarkan Nama</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama..."
                                    autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
