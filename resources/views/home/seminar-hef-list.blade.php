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
                <form action="">
                    <select name="hef_category_id" class="form-control" onchange="dayChangedTrigger()"
                        id="hef_category_id">
                        <option value="">- Pilih Sesi -</option>
                        <option value="1">Sesi ke-1</option>
                        <option value="2">Sesi ke-2</option>
                        <option value="3">Sesi ke-3</option>
                        <option value="4">Sesi ke-4</option>
                        <option value="5">Sesi ke-5</option>
                        <option value="6">Sesi ke-6</option>
                        <option value="7">Sesi ke-7</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-3">
            <thead>
                <tr class="text-center">
                    {{-- <th>Date</th> --}}
                    <th>Nama</th>
                    <th>Nomor Sertifikat</th>
                    <th>Sesi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($certificates->isNotEmpty())
                @foreach ($certificates as $item)
                <tr>
                    {{-- <td>{{$item->date}}</td> --}}
                    <td>{{$item->name}}</td>
                    <td>{{$item->certificate_number}}</td>
                    <td>{{$item->hef_category_id}}</td>
                    <td class="text-center">
                        <a href="{{ action('HomeController@downloadSeminarHefCertificate', $item->id) }}"
                            style="font-size: 1.5rem;">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $certificates->links() !!}
        </div>
        @else
        <div class="text-center">
            <h3>No certificate found</h3>
        </div>
        @endif
    </div>
</div>
@endsection
@section('script')
<script>
    function dayChangedTrigger () {
            let queryString = window.location.search;  // get url parameters
            let params = new URLSearchParams(queryString);  // create url search params object
            params.delete('hef_category_id');  // delete hef_category_id parameter if it exists, in case you change the dropdown more then once
            params.append('hef_category_id', document.getElementById("hef_category_id").value); // add selected hef_category_id
            document.location.href = "?" + params.toString(); // refresh the page with new url
        }
</script>
@endsection
