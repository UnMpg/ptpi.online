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
        <div class="alert alert-warning">
            Sertifikat hanya untuk yang hadir dan isi survei, paling lambat 30 hari setelah acara.
        </div>
        <div class="row">
            <div class="col">
                <form action="">
                    <select name="day" class="form-control" onchange="dayChangedTrigger()" id="day">
                        <option value="">- Pilih Hari -</option>
                        <option value="1">Hari ke-1</option>
                        <option value="2">Hari ke-2</option>
                    </select>
                </form>
            </div>
            <div class="col">
                <form action="">
                    <select name="hef_category_id" class="form-control" onchange="sessionChangedTrigger()"
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
            <div class="col">
                <form action="{{ action('HomeController@seminarHefCertificate') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Cari Nama"
                            value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-3">
            <thead>
                <tr class="text-center">
                    {{-- <th>Date</th> --}}
                    <th>Nama</th>
                    <th>Nomor Sertifikat</th>
                    <th>Hari</th>
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
                    <td>{{$item->day}}</td>
                    <td>{{$item->session}}</td>
                    <td class="text-center">
                        @if ($item->hef_category_id)
                        <a href="{{ action('HomeController@downloadSeminarHefCertificate', $item->id) }}"
                            style="font-size: 1.5rem;">
                            <i class="fa fa-download"></i>
                        </a>
                        @else
                        <a href="{{ $item->certificate_url }}" style="font-size: 1.5rem;">
                            <i class="fa fa-download"></i>
                        </a>
                        @endif
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
            params.delete('day');  // delete day parameter if it exists, in case you change the dropdown more then once
            params.append('day', document.getElementById("day").value); // add selected day
            document.location.href = "?" + params.toString(); // refresh the page with new url
        }
    function sessionChangedTrigger () {
            let queryString = window.location.search;  // get url parameters
            let params = new URLSearchParams(queryString);  // create url search params object
            params.delete('hef_category_id');  // delete hef_category_id parameter if it exists, in case you change the dropdown more then once
            params.append('hef_category_id', document.getElementById("hef_category_id").value); // add selected hef_category_id
            document.location.href = "?" + params.toString(); // refresh the page with new url
        }
</script>
@endsection
