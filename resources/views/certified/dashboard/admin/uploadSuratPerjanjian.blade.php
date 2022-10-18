@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Upload dan Download Surat Perjanjian')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Peserta Yang Sudah Sudah Upload Surat Perjanjian</h2>
                        
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr id="data-title">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Surat Perjanjian</th>
                                <th>Upload Surat Perjanjian</th>
                            </tr>
                        </thead>
                        <tbody id="data-list">
                            @foreach ($datauser as $user)
                                @foreach ($dataupload as $upload)
                                    @if ($user->id == $upload->certified_member_id)
                                        @php
                                            $a = true;
                                        @endphp
                                        <tr>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->certified_status }}</td>
                                            <td>
                                                <button  class="btn btn-sm ">                        
                                                <a href="{{ asset('assets/certified/upload/'.$user->nama.'/'.$upload->file_name) }}">Surat Perjanjian</a>
                                                </button>
                                                
                                            </td>

                                                                                        
                                            @foreach ($dataupload_perjanjian as $item)
                                            
                                                @if ($user->id == $item->certified_member_id  )
                                                    <td>
                                                        <button  class="btn btn-sm ">                        
                                                            <a href="{{ asset('assets/certified/upload/'.$user->nama.'/'.$item->file_name) }}">Surat Perjanjian Konfirmasi</a>
                                                        </button>
                                                    </td>
                                                    @php
                                                        $a = false;
                                                    @endphp
                                                @endif
                                                
                                            @endforeach

                                            @if ($a)
                                                <td>
                                                    <div class="perjanjian-konfirmasi mb-4 proses-upload row" id="perjanjian-konfirmasi">
                                                        <h4 class="col-md-3"><label class="form-label" for="customFile">Perjanjian <span style="color: red">*</span></label></h4>
                                                        <div class="col-md-8">
                                                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-userID="{{ $user->id }}" data-nama="{{ $user->nama }}" data-type='perjanjian_konfirmasi'/>
                                                    </div>
                                                    </div>
                                                </td>
                                            @endif
                                            
                                            
                                        </tr>
                                    @endif
                                @endforeach
                                
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
    var fileName = null ;
    let id_user;
    let nama;
$('.file-upload-field').change(function(e){
    fileName = e.target.files[0];
    var parent_class = $(this).parent();
    var data_type= $(this).attr('data-type');
    id_user = $(this).attr('data-userID');
    nama = $(this).attr('data-nama');
    // console.log(parent_class);
    console.log(fileName);
    var btn_upload =  `<button type="button" class="btn btn-primary upload-document" data-type="${data_type}" data-name="${fileName}" >Upload</button>`;
    
   
    if (parent_class.children('button').length<=0) { 
        parent_class.append(btn_upload);
    }

    $('.proses-upload').on("click",`.upload-document[data-type=${data_type}]`,function(){
            console.log("koss");
            console.log(fileName);
            console.log(id_user);
            console.log(nama);
            var upload_action = data_type;
            var url_upload="{{ url('/sertifikasi/upload-perjanjian-konfirmasi') }}";
            

            var deskripsi = data_type;
            uploadfile(fileName,id_user,nama,url_upload,deskripsi);
        });


});


    function uploadfile(file,id_user,nama,url_upload,deskripsi){
        console.log(url_upload+deskripsi);
        var formData = new FormData();
        formData.append( 'file', file );
        formData.append( 'id_user', id_user );
        formData.append( 'nama', nama );
        formData.append('upload_deskripsi',deskripsi);
        formData.append( '_token', '{{ csrf_token() }}' );

        console.log(FormData);
        $.ajax({
            url : url_upload,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: (response) => {
                if (response) {
                // $('.massage-alert').append(`<h3> ${deskripsi} Berhasil di Upload </h3>`);
                console.log(response);                
                alert(deskripsi +" berhasil di upload");
                location.reload();
                }

            },
            error: function(xhr,status,error){
                
                console.log(xhr.responseText);
                $('#file-message').html(xhr.responseText);
            }
        });
        }

</script>

@endsection