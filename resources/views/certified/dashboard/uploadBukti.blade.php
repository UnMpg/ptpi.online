@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Upload File Bukti Pembayaran dan Surat Perjanjian ')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Bukti dan Surat Perjanjian</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="massage-alert"></div>

                    @if (auth('certified')->user()->certified_status >= 5)
                    <div class="upload-bukti mb-4 proses-upload" id="uploadBukti">
                        <h4><label class="form-label" for="customFile">Upload Bukti Pembayaran Sudah Terupload</label></h4>
                        
                    </div>
                    @else

                    @foreach ($upload as $item)
                        <div class="terupload">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>{{ $item->upload_deskripsi }} <i class="fa fa-check"></i> </h5>
                                </div>
                                <div class="col-md-2 upload-kanan text-right">
                                   
                                </div>
                            </div>                            
                        </div>
                    @endforeach

                    <div class="perjanjian mb-4 proses-upload" id="perjanjian">
                        <h4><label class="form-label" for="customFile">Surat Perjanjian <span style="color: red">*</span> <a class="" href="{{ asset('assets/certified/file/PERJANJIAN SERTIFIKASI.docx') }}"><i class="fa fa-download"></i> Download Surat Perjanjian</a>      </label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='perjanjian'/>
                        <div id="file-message" class="text-muted mb-4">*format: doc,docx, dan pdf  max:2Mb</div>
                    </div>

                    <div class="upload-bukti mb-4 proses-upload" id="uploadBukti">
                        <h4><label class="form-label" for="customFile">Upload Bukti Pembayaran <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile"  data-type='bukti_pembayaran'/>
                    </div>
                        
                    @endif
                    
                
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
    let deskripsia;
    let url_upload;
    $('.file-upload-field').change(function(e){
        var fileName = e.target.files[0];
        var parent_class = $(this).parent();
        var data_type= $(this).attr('data-type');
        deskripsia = $(this).attr('data-type');
        // console.log(parent_class);
        console.log(fileName);
        var btn_upload =  `<button type="button" class="btn btn-primary upload-document" data-type="${data_type}" data-name="${fileName}" >Upload</button>`;
        

        if (parent_class.children('button').length<=0) { 
            parent_class.append(btn_upload);
        }

        $('.proses-upload').on("click",`.upload-document[data-type=${data_type}]`,function(){
            console.log("koss");
            console.log(fileName);
            var upload_action = data_type;
            var deskripsi = data_type;
            
            
            // console.log(deskripsia);
            if (deskripsia == "perjanjian") {
                url_upload = "{{ url('/sertifikasi/upload-document') }}";
                // console.log(url_upload);
            }else if(deskripsia == "bukti_pembayaran"){
                url_upload = "{{ url('/sertifikasi/upload-bukti-save') }}";
                // console.log(url_upload);
            }else{
                console.log("url tidak ada");
            }
            
            // console.log(deskripsi);
            uploadfile(fileName,url_upload,deskripsi);
        });

    });

    

    function uploadfile(file,url_upload,deskripsi){

        console.log(url_upload+deskripsi);
        var formData = new FormData();
        formData.append( 'file', file );
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

    const upload = {!! $upload !!};

    console.log(upload);
    console.log($('.proses-upload').attr('id'))
    upload.forEach(function(item){

    if(item.upload_deskripsi == "perjanjian"){
        $('#perjanjian').css("display","none");
    }
    if(item.upload_deskripsi == "bukti_pembayaran"){
        $('#uploadBukti').css("display","none");
    }
    console.log(item.upload_deskripsi);
    });


</script>
    
@endsection