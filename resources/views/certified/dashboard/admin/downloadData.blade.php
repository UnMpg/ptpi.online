@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Download Data')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Download Peserta Sertifikasi </h2>
                        
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Download Data PDF</th>
                                <th class="text-center">Download Berkas</th>
                            </tr>
                        </thead>
                        <tbody id="data-list">
                            @foreach ($datacertified as $datacertifi)
                            <tr>
                                <td>{{ $datacertifi->nama }}</td>
                                <td>{{ $datacertifi->email }}</td>
                                
                                <td class="text-center">
                                    <button class="btn btn-sm ">
                                        <a href="{{ action('CertifiedMemberController@downloadPDF', $datacertifi->id) }}"><i class="fa fa-download"> </i> Download Berkas</a>
                                    </button>                                    
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm ">
                                        <a href="{{ action('CertifiedMemberController@downloadZipFile',$datacertifi->id) }}"><i class="fa fa-download"> </i> Download Data Pdf</a>
                                    </button>                                    
                                </td>
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
                        <td class="text-center">
                            <button type="submit"
                            class="btn btn-sm ">
                            <a href="/sertifikasi/data-profile-user/${element.id}"><i class="fa fa-edit"> </i></a>
                            </button>
                            
                        </td>
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