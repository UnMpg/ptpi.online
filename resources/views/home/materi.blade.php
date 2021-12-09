@extends('layouts.home.app')
@section('title-page', 'Seminar & WS')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>Seminar & WS</h2>
                </div>
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
                    <td>{{$item->date}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->speaker}}</td>
                    <td class="text-center">
                        @if ($item->file_url)
                        <a href="{{ $item->file_url }}" style="font-size: 1.5rem;">
                            <i class="fa fa-download"></i>
                            @else
                            <a href="{{ action('HomeController@downloadMateri', $item->file) }}"
                                style="font-size: 1.5rem;">
                                <i class="fa fa-download"></i>
                                @endif
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
