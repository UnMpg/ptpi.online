@extends('layouts.certified.page')

@section('content')

<div class="page-view bg-light" >
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">Informasi Pembiayaan LSP TPI</h2>
            <br>
        </div>
        <div class="row">
            
            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Skema Sertifikasi</th>
                    <th scope="col">Level Sertifikasi</th>
                    <th scope="col">Metode Ujian</th>                    
                    <th scope="col">Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Ahli Teknik Pelayanan Kesehatan</td>
                    <td>Muda</td>
                    <td>Online <br> Offline</td>
                    <td>Rp. 6.000.000 <br>Rp. 7.000.000</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Ahli Teknik Pelayanan Kesehatan</td>
                    <td>Madya</td>
                    <td>Online <br> Offline</td>
                    <td>Rp. 8.000.000 <br>Rp. 9.000.000</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ahli Teknik Pelayanan Kesehatan</td>
                    <td>Utama</td>
                    <td>Online <br> Offline</td>
                    <td>Rp. 10.000.000 <br>Rp. 11.000.000</td>
                  </tr>
                </tbody>
            </table>
            
        </div>

        <div class="row mt-4">
            <h5 class="mt-4">Peruntukkan Biaya Sertifikasi:</h5>
            <p style="padding-left: 2rem;">1. Biaya Permohonan Awal.</p>
            <p style="padding-left: 2rem;">2. Biaya Verifikasi Dokumen.</p>
            <p style="padding-left: 2rem;">3. Biaya Ujian Tulis.</p>
            <p style="padding-left: 2rem;">4. Biaya Ujian Wawancara.</p>
            <p style="padding-left: 2rem;">5. Biaya Honor dan/atau Akomodasi Penguji.</p>
            <p style="padding-left: 2rem;">6. Biaya Penerbitan Sertifikasi.</p>
            <p style="padding-left: 2rem;">7. Biaya Surveilan.</p>
            
        </div>
        
        
    </div>
</div>
    
@endsection