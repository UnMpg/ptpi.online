@extends('layouts.certified.page')

@section('content')

<div class="page-view bg-light" >
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-4">Daftar Person Tersertifikasi</h2>
            <br>
        </div>
        <div class="row">
          <div class="container">
            <div class="row">
            
              <div class="mb-4" style="text-align: right">
                <div class="" style=" position: relative; display: flex;
                flex-wrap: wrap;
                align-items: stretch;
                flex-direction: row-reverse;" >
                <button type="button" class="btn btn-primary " style="z-index:12; margin-left : -2.5rem">
                  <i class="fas fa-search"></i>
                </button>
                  <div class="form-outline">
                    <input type="search" id="form1" class="form-control" />
                    {{-- <label class="form-label" for="form1">Search</label> --}}
                  </div>
                  
                </div>
              </div>

          </div>
          </div>
            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama </th>
                    <th scope="col">Institusi</th>
                    <th scope="col">No. Sertifikat</th>                    
                    <th scope="col">Tanggal Keluar Sertifikat</th>        
                    <th scope="col">Tanggal Berakhir Sertifikat</th>        
                    <th scope="col">Status Level</th>        
                    <th scope="col">Status Aktif</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Zain Wishnukahhar, ST</td>
                    <td>RS Ketergantungan Obat  Jakarta</td>
                    <td>No.STK.0001.ATPK.VI.2022</td>
                    <td>26 Juni 2022</td>
                    <td>27 Juni 2027</td>
                    <td>Muda</td>
                    <td>Aktif</td>
                  </tr>
                 
                </tbody>
            </table>
            
        </div>

        
        
    </div>
</div>
    
@endsection