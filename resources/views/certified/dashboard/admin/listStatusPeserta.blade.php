@extends('layouts.certifiedDashboard.app')
@section('title-page', 'List Peserta Sertifikasi')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta Sertifikasi </h2>
                        <select name="status" id="status" class="custom-select jenis_notive" id="inputGroupSelect02">
                            <option selected value="">Choose...</option>
                            
                            <option value="1">Register</option>
                            <option value="2">Melengkapi Data</option>                            
                            <option value="3">Upload FIle</option>
                            <option value="4">Hasil Verifikasi</option>
                            <option value="5">Upload Bukti</option>
                            <option value="6">Memilih Jadwal Ujian</option>
                            <option value="7">Jadwal Ujian Terkonfirmasi</option>
                            <option value="8">Ujian Tulis</option>
                            <option value="10">Verifikasi Ujian Tulis</option>
                            <option value="11">Memilih Jadwal Wawancara</option>
                            <option value="12">Jadwal Wawancara Terkonfirmasi</option>
                            <option value="13">Wawancara</option>
                            <option value="14">Hasil Wawancara Terinput</option>
                            <option value="15">Hasil Sertifikasi</option>
                            
                            
                        </select>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                {{-- <th class="text-center">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody id="data-list">
                            @foreach ($datacertified as $datacertifi)
                            <tr>
                                <td>{{ $datacertifi->nama }}</td>
                                <td>{{ $datacertifi->email }}</td>
                                <td>{{ $datacertifi->telp }}</td>
                                {{-- <td class="text-center">
                                    <button type="submit"
                                    class="btn btn-sm ">
                                    <a href="{{ action('CertifiedMemberController@dataProfileUser', $datacertifi->id) }}"><i class="fa fa-edit"> </i></a>
                                    </button>
                                    
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    
                
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#status').change(function(){
        var status = $(this).find(":selected").val();
        console.log(status);
        let data ;
        var id;
        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "status" :status
            },
            type: "POST",
            url: `{{ url('/sertifikasi/get-status-peserta') }}`,
            async: false,
            success: function (response) {
                // console.log(response);
                data = response;
                $('#data-list').empty();
                response.forEach(element => {
                    id = element.id;
                    console.log(id);
                    var list = `
                    <tr>
                        <td>${element.nama}</td>
                        <td>${element.email}</td>
                        <td>${element.telp}</td>
                        
                    </tr>
                    `;
                    $('#data-list').append(list);
                });
            // You will get response from your PHP page (what you echo or print)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        }).responseText;
       
        console.log(data);
        
    })
</script>

@endsection