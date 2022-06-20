@extends('layouts.dashboard.app')
@section('title-page', 'Upload File')
@section('title-header', 'Upload File ')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="container">
          <div class="row">
            <h3 class="h3-judul">Upload file</h3>
          </div>

          @if (auth('certified')->user()->ktp != Null)
            <div class="row" id="upload_ktp">
              <div class="mt-3 col-xl-12 ">
                <div class="upload-isi">
                  <div>
                  <p class="upload-label">KTP | {{ auth('certified')->user()->ktp }}</p>
                  </div>
                  <div class="action-kanan">
                    {{-- <a href="" class="upload-edit"><i class="far fa-edit" > </i></a> --}}
                    <form action="{{ action('CertifiedMemberController@deleteDataMember', auth('certified')->user()->ktp) }}" method="post"
                        class="formdelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                      <i class="far fa-trash-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @else
            <div class="row" id="upload_ktp">
              <div class="mt-3 col-xl-12 ">
                  <div class="file-upload-wrapper" data-text="KTP" id="btnDes">
                    <input name="file" type="file" class="file-upload-field upload" id="ktp" data-value="ktp">
                  </div>
                  <div id="file-message" class="text-muted">*format: png,jpg,jpeg,pdf  max:2Mb</div>
              </div>
            </div>
          @endif
          
          @if (auth('certified')->user()->certified_cv != Null)
            <div class="row" id="upload_cv">
              <div class="mt-3 col-xl-12 ">
                <div class="upload-isi">
                  <div>
                  <p class="upload-label">CV | {{ auth('certified')->user()->certified_cv }}</p>
                  </div>
                  <div class="action-kanan">
                    {{-- <a href="" class="upload-edit"><i class="far fa-edit" > </i></a> --}}
                    <form action="{{ action('CertifiedMemberController@deleteDataMember', auth('certified')->user()->certified_cv) }}" method="post"
                        class="formdelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                      <i class="far fa-trash-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @else
              
            <div class="row" id="upload_cv">
              <div class="mt-3 col-xl-12 ">
                  <div class="file-upload-wrapper" data-text="CV" id="btnDes">
                    <input name="file" type="file" class="file-upload-field upload" id="cv" data-value="cv">
                  </div>
                  <div id="file-message" class="text-muted">*format: png,jpg,jpeg,pdf  max:2Mb</div>
              </div>
            </div>
          @endif

          @foreach ($upload as $item)
            <div class="row" id="{{ $item->upload_deskripsi }}">
              <div class="mt-3 col-xl-12 ">
                <div class="upload-isi">
                  <div>
                  <p class="upload-label">{{ $item->upload_deskripsi }} | {{ $item->file_name }}</p>
                  </div>
                  <div class="action-kanan">
                    {{-- <a href="" class="upload-edit"><i class="far fa-edit" > </i></a> --}}
                    <form action="{{ action('CertifiedMemberController@deleteUpload', $item->upload_deskripsi) }}" method="post"
                        class="formdelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                      <i class="far fa-trash-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          @endforeach


          <div class="row  document-upload" id="permohonan">
            <div class="mt-3 col-xl-12 ">
                <div class="file-upload-wrapper" data-text="Surat Permohonan" id="btnDes">
                  <input name="file" type="file" class="file-upload-field upload" id="surat permohonan" data-value="surat permohonan">
                </div>
                <div id="file-message" class="text-muted">*format: doc,docx,txt,pdf  max:10Mb</div>
            </div>
          </div>

          <div class="row  document-upload" id="kepatuhan">
            <div class="mt-3 col-xl-12 ">
                <div class="file-upload-wrapper" data-text="Surat Pernyataan Kepatuhan" id="btnDes">
                  <input name="file" type="file" class="file-upload-field upload" id="surat pernyataan kepatuhan" data-value="surat pernyataan kepatuhan">
                </div>
                <div id="file-message" class="text-muted">*format: doc,docx,txt,pdf  max:10Mb</div>
            </div>
          </div>

          <div class="row  document-upload" id="ijazahh">
            <div class="mt-3 col-xl-12 ">
                <div class="file-upload-wrapper" data-text="Ijazah" id="btnDes">
                  <input name="file" type="file" class="file-upload-field upload" id="ijazah" data-value="ijazah">
                </div>
                <div id="file-message" class="text-muted"></div>
            </div>
          </div>

          <div class="row document-upload" id="transkrip nilai">
            <div class="mt-3 col-xl-12 ">
                <div class="file-upload-wrapper" data-text="Transkrip" id="btnDes">
                  <input name="file" type="file" class="file-upload-field upload" id="transkrip" data-value="ijazah">
                </div>
                <div id="file-message" class="text-muted"></div>
            </div>
          </div>
          
      </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('script')
    
<script>
function loadDeskripsi(){
    var fileInput = document.getElementById('file');
    var desk = document.getElementById('btnDes');
    var filename = fileInput.files[0].name;
    desk.setAttribute("data-text",filename);   
    console.log(filename);
    uploadfile();

  }

  const upload = {!! $upload !!};

  console.log(upload);
  console.log($('.document-upload').attr('id'))


  upload.forEach(function(item){
    if(item.upload_deskripsi == "surat permohonan"){
      $('#permohonan').css("display","none");
    }

    if(item.upload_deskripsi == "surat pernyataan kepatuhan"){
      $('#kepatuhan').css("display","none");
    }
    if(item.upload_deskripsi == "ijazah"){
      $('#ijazahh').css("display","none");
    }
    if(item.upload_deskripsi == "transkirp"){
      $('#transkrip nilai').css("display","none");
    }
    console.log(item.upload_deskripsi);
  });


  function nilai(x){
    hasil_response = x;
    return hasil_response;
  }

  $('.file-upload-field').change(function(e) {
        var fileName = e.target.files[0];

        var upload_action = $(this).attr('id'); 
        console.log(upload_action);
        console.log(fileName);
        let url_upload;

        if(upload_action == "ktp"){
          url_upload = "{{ url('/certified/ktp') }}";
        }
        else if (upload_action == "cv"){
          url_upload = "{{ url('/certified/upload-cv') }}";
        }
        else if (upload_action == "ijazah"){
          url_upload = "{{ url('/certified/upload-cv') }}";
        }
        else{
          url_upload = "{{ url('/certified/upload-document') }}";
        }

        console.log(url_upload);
        uploadfile(fileName,url_upload,upload_action);
        
        // const nilai_x = nilai();
        // // console.log(nilai_x);
        // if(nilai_x== 1){
        //   console.log("jalan aja");
        // }



  		// Inside find search element where the name should display (by Id Or Class)
});


function uploadfile(file,url_upload,deskripsi){

  console.log(url_upload+deskripsi);
  var formData = new FormData();
  formData.append( 'file', file );
  formData.append('upload_deskripsi',deskripsi);
  formData.append( '_token', '{{ csrf_token() }}' );
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
            //  this.reset();
            console.log(response);
            hasil_response = 1;
            nilai(hasil_response);
            alert(deskripsi +" berhasil di upload");
            location.reload();
          }

        },
        error: function(xhr,status,error){
            hasil_response = 2;
            nilai(hasil_response);
            console.log(xhr.responseText);
            $('#file-message').html(xhr.responseText);
        }
    });

    
  // return hasil_response;
}

</script>

@endsection