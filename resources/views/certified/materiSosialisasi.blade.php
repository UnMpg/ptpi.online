@extends('layouts.certified.page')

@section('content')

<div class="page-view bg-light" >
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">Materi Sosialisasi</h2>
            <br>
        </div>
        <div class="row">
          <div class="container">
            <div class="row">
            

          </div>
          </div>
            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pemateri </th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>            
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Donny Purnomo J.E, S.T</td>
                    <td>Akreditasi Lembaga Sertifikasi Ahli Teknik Pelayanan Kesehatan oleh KAN</td>
                    <td> <a href="{{ asset('assets/certified/file/Akreditasi Lembaga Sertifikasi Ahli Teknik Pelayanan Kesehatan oleh KAN.pdf') }}" style="text-decoration: none"><i class="fa-solid fa-download"></i> Download</a> </td>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td>Prof. Dr. –Ing. Eko Supriyanto P.H.Eng</td>
                    <td>Sosialisasi LSP Ahli Teknik Pelayanan Perumahsakitan</td>
                    <td> <a href="{{ asset('assets/certified/file/Sosialisasi LSP Ahli Teknik Pelayanan Perumahsakitan.pdf') }}" style="text-decoration: none"><i class="fa-solid fa-download"></i> Download</a> </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Rino Ferdian Surahkusumah, M. Eng</td>
                    <td>Persyaratan dan Proses Sertifikasi Ahli Teknik Pelayanan Kesehatan</td>
                    <td> <a href="{{ asset('assets/certified/file/Persyaratan dan Proses Sertifikasi Ahli Teknik Pelayanan Kesehatan.pdf') }}" style="text-decoration: none"><i class="fa-solid fa-download"></i> Download</a> </td>
                  </tr>
                 
                </tbody>
            </table>
            
        </div>

        
        
    </div>
</div>
    
@endsection