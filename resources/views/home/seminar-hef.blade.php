@extends('layouts.home.app')
@section('title-page', 'Seminar HEF 2021')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Seminar HEF 2021</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-0">
                <!-- <h4>Pilih Bulan</h4> -->
            </div>
            <div class="col-md-4 mb-4">
                <!-- <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="date" placeholder="Filter Waktu">
                    </div>
                </form> -->
                <form action="{{ action('HomeController@searchMateriSeminar') }}" method="GET">
                    @csrf
                    <select name="tipe_seminar" class="form-control" onchange="this.form.submit()">
                        <option value="">- Pilih Seminar -</option>
                        <option value="hari_pertama">Hari ke-1</option>
                        <option value="hari_kedua">Hari ke-2</option>
                        <option value="hari_ketiga">Hari ke-3</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-3">
            <thead>
                <tr class="text-center">
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Pembicara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($materi->isNotEmpty())
                @foreach ($materi as $item)
                <tr>
                    <td>{{$item->tgl}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->pembicara}}</td>
                    <td class="text-center">
                        <a href="{{ action('HomeController@downloadMateriSeminar', $item->file) }}" style="font-size: 1.5rem;">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $materi->links() !!}
        </div>
        @else
        <div class="text-center">
            <h3>No materi found</h3>
        </div>
        @endif
    </div>
</div>
@endsection