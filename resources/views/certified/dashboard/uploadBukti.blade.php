@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Upload File')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Bukti Pembayaran </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="massage-alert"></div>

                    <div class="upload-bukti mb-4 proses-upload" id="uploadBukti">
                        <h4><label class="form-label" for="customFile">Upload Bukti Pembayaran <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile"  data-type='bukti_pembayaran'/>
                    </div>
                
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
    
    $('.file-upload-field').change(function(e){
        var fileName = e.target.files[0];
        var parent_class = $(this).parent();
        var data_type= $(this).attr('data-type');
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
            var url_upload="{{ url('/certified/upload-document') }}";
            

            var deskripsi = data_type;
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


    function sertifikatForm(){
    const addformSertifikat = `
        <div class="form-row">
          <div class="form-group col-md-8">
            <input type="text" name="sertifikat_name" class="form-control" id="sertifikat_deskripsi" placeholder="Nama Sertifikat">
          </div>
          <div class="form-group col-md-4">
            <input type="file" class="form-control upload " id="myfile">
          </div>
        </div>
        <button class="btn btn-primary text-right apss" id="upload_sertifikat" onclick="upload_sertifikat()" >Submit</button>
    `;
    $("#tambah-sertifikat").append(addformSertifikat);

  }

  $("#tambah-sertifikat").on("click",".icon-tambah",function (){
    sertifikatForm();
    console.log("sdajuj");
    $('.icon-tambah').css("display","none");
  });

  var sertifikat_file;
$('#input_sertifikat').change(function(e) {
  sertifikat_file = e.target.files;
  console.log(sertifikat_file); 
  });

function upload_sertifikat(){
  // console.log("gqgbwb");
  // var fileName = $("#myfile").files[0];
  
  var fileInput = document.getElementById('myfile');
  var fileName = fileInput.files[0];
  console.log(fileName);

  var deskripsi = "sertifikat_"+$("#sertifikat_deskripsi").val();
  console.log(deskripsi);
  url_upload = "{{ url('/certified/upload-document') }}";

  uploadfile(fileName,url_upload,deskripsi);
  
}

</script>
    
@endsection