@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Konfirmasi Peserta Sertifikasi')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta Sertifikasi </h2>
                        <select name="status" id="status" class="custom-select jenis_notive" id="inputGroupSelect02">
                            <option selected value="">Choose...</option>
                            
                            <option value="5">Cek Bukti Pembayaran Bukti</option>
                            <option value="6">Konfirmasi Jadwal Ujian</option>
                            <option value="9">Konfirmasi Hasil Ujian Tulis</option>
                            <option value="11">Konfirmasi Jadwal Wawancara</option>   
                                                    
                            
                        </select>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr id="data-title">
                                
                            </tr>
                        </thead>
                        <tbody id="data-list">
                            
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
            url: `{{ url('/sertifikasi/get-data-konfirmasi') }}`,
            async: false,
            success: function (response) {
                console.log(response);
                data = response;

            
            // You will get response from your PHP page (what you echo or print)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        }).responseText;
       
       
        if (status == 5) {
            $('#data-title').empty();
            $('#data-title').html(`<th>nama</th><th>email</th><th>status</th><th>BuktiPembayaran</th>`);

            $('#data-list').empty();

            console.log(data.data);
            data.data.forEach(element => {
                id = element.id;
                var file;
                data.upload.forEach(item => {
                    
                    if (element.id == item.certified_member_id){                        
                        if (item.upload_deskripsi == "bukti_pembayaran") {
                            console.log(item.id);
                            file = item.file_name
                        }
                    }
                });
                var list = `
                <tr>
                    <td>${element.nama}</td>
                    <td>${element.email}</td>
                    <td>${element.status}</td>
                    <td class="text-center">
                        <button type="submit" class="btn btn-sm ">                        
                        <a href="{{ asset('assets/certified/upload/${element.nama}/${file}') }}">Bukti Pembayaran</a>
                        </button>
                        
                    </td>
                </tr>
                `;
                $('#data-list').append(list);
            });

        }

        if (status == 6) {
            $('#data-title').empty();
            $('#data-title').html(`<th>nama</th><th>status</th><th>Pilihan Tanggal Ujian</th><th>Aksi</th>`);
            $('#data-list').empty();

            data.data.forEach(element => {
                id = element.id;
                var tanggal = "";
                var jam = "";
                data.ujian.forEach(item => {
                    
                    if (element.id == item.certified_member_id){                        
                        
                        tanggal = item.konfirmasi_ujian;
                        jam = item.jam_ujian;
                    }
                });
                var list = `
                <tr>
                    <td>${element.nama}</td>
                    <td>${element.certified_status}</td>
                    <td>${tanggal} jam ${jam}</td>
                    <td class="text-center">
                        <form action="{{ action('CertifiedMemberController@konfirmasiUjian1') }}" method="post"
                            class="formdelete">
                            @csrf
                            <input type="text" name="id" value="${id}" hidden>
                            <input type="text" name="konfirmasi_ujian" value="${tanggal}" hidden>
                            
                            <button type="submit" class="btn btn-sm btn-info delete-confirm" >
                            <i class="fa fa-edit"></i> Konfirmasi</button>
                        </form>                      
                    </td>
                </tr>
                `;
                $('#data-list').append(list);
            });

        }

        if (status == 9) {
            $('#data-title').empty();
            $('#data-title').html(`<th>nama</th><th>Tanggal Ujian</th><th>Durasi Ujian</th><th>Score</th><th>Aksi</th>`);
            $('#data-list').empty();
            
            // console.log(data);

            data.forEach(element => {
                id = element.id;
                var aksi ="";
                if (element.certified_status == 9) {
                    aksi = `<form action="{{ action('CertifiedMemberController@konfirmasiHasilUjian1') }}" method="post"
                            class="formdelete">
                            @csrf
                            <input type="text" name="id" value="${id}" hidden>
                            
                            <button type="submit" class="btn btn-sm btn-info" >
                            <i class="fa fa-edit"></i> Konfirmasi</button>
                        </form>`;
                }else{
                    
                    aksi = `Hasil Ujian Online Sudah dikonfirmasi <br> <strong style="color: blue">${element.status}</strong>  `;
                }
                var list = `
                <tr>
                    <td>${element.nama}</td>
                    <td>${element.tanggal_ujian} jam ${element.akses_ujian}</td>
                    <td>${element.lama_ujian}</td>
                    <td>${element.score_ujian}</td>
                    <td class="text-center">
                        ${aksi}                      
                    </td>
                </tr>
                `;

                $('#data-list').append(list);
            });
        }

        if (status == 11){
            $('#data-title').empty();
            $('#data-title').html(`<th>nama</th><th>Pilihan Tanggal Wawancara</th><th>Aksi</th>`);
            $('#data-list').empty();
            console.log(data);
            data.forEach(element => {
                id = element.id;
                var aksi ="";
                if (element.certified_status == 11 && element.tanggal_wawancara == null) {
                    aksi = `<form action="{{ action('CertifiedMemberController@konfirmasiWawancara1') }}" method="post"
                            class="formdelete">
                            @csrf
                            <input type="text" name="id" value="${id}" hidden>
                            <input type="text" name="konfirmasi_wawancara" value="${element.konfirmasi_wawancara}" hidden>
                            
                            <button type="submit" class="btn btn-sm btn-info" >
                            <i class="fa fa-edit"></i> Konfirmasi</button>
                        </form>`;
                }else{
                    
                    aksi = `Jadwal Wawancara Sudah Terkonfirmasi <br> <strong style="color: blue">${element.tanggal_wawancara}</strong>  `;
                }
                var list = `
                <tr>
                    <td>${element.nama}</td>
                    <td>${element.konfirmasi_wawancara} jam ${element.jam_wawancara}</td>
                    <td class="text-center">
                        ${aksi}                      
                    </td>
                </tr>
                `;

                $('#data-list').append(list);
            });
        }
    })
</script>

@endsection