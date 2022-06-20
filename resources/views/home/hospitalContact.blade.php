@extends('layouts.home.app')
@section('content')
<div id="about" class="service-area area-padding" style="margin-bottom: -100px;">
    <!-- <div class="home-overly"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Hospital Contact Member</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form action="{{ action('HomeController@searchHospitalContact') }}" method="GET">
                    <div class="search-option">
                        <input type="text" name="search" placeholder="Search...">
                        <button class="button" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nama Hospital</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Contact</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{ $location->nama }}</td>
                            <td>{{ $location->alamat }}</td>
                            <td>{{ $location->provinsi }}</td>
                            <td>{{ $location->nomor_telp }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
              </table>
              
             
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2 col-md-8 text-center mb-4 mt-2">
              {{ $locations->links() }}
            </div>                
        </div>
    </div>
</div>
<!-- END Header -->


<div class="clearfix"></div>
@endsection