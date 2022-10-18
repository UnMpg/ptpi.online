@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Upload File')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Document </h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a class="" href="{{ asset('assets/certified/file/PERJANJIAN SERTIFIKASI.docx') }}"><i class="fa fa-download"></i> Download Surat Perjanjian</a>                      
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="massage-alert"></div>

                    @if (auth('certified')->user()->foto != Null)
                        <div class="terupload">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>Foto <i class="fa fa-check"></i> </h5>
                                    
                                </div>
                                <div class="col-md-2 upload-kanan text-right">
                                    @if (auth('certified')->user()->certified_status > 7)
                                    <form action="{{ action('CertifiedMemberController@deleteDataMember', auth('certified')->user()->foto) }}" method="post"
                                        class="formdelete">
                                        @csrf
                                        <input type="text" name="deskripsi" value="{{ auth('certified')->user()->foto }}" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                                    <i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </div>                            
                        </div>

                    @else
                        <div class="foto proses-upload" data-type="foto">
                            <h4><label class="form-label" for="customFile">Foto <span style="color: red">*</span></label></h4>
                            <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='foto'/>
                            <div id="file-message" class="text-muted mb-4">*format: png,jpg,jpeg  max:2Mb</div>
                        </div>

                    @endif

                    @if (auth('certified')->user()->ktp != Null)
                        <div class="terupload">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>KTP <i class="fa fa-check"></i> </h5>
                                    
                                </div>
                                <div class="col-md-2 upload-kanan text-right">
                                    @if (auth('certified')->user()->certified_status > 7)
                                    <form action="{{ action('CertifiedMemberController@deleteDataMember', auth('certified')->user()->ktp) }}" method="post"
                                        class="formdelete">
                                        @csrf
                                        <input type="text" name="deskripsi" value="{{ auth('certified')->user()->ktp }}" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger delete-confirm">
                                      <i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </div>                            
                        </div>
                    @else
                        <div class="ktp proses-upload" data-type="ktp">
                            <h4><label class="form-label" for="customFile">KTP <span style="color: red">*</span></label></h4>
                            <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='ktp'/>
                            <div id="file-message" class="text-muted mb-4">*format: png,jpg,jpeg,pdf  max:2Mb</div>
                        </div>
                    @endif

                    @if (auth('certified')->user()->certified_cv != Null)
                        <div class="terupload">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>CV <i class="fa fa-check"></i> </h5>
                                </div>
                                <div class="col-md-2 upload-kanan text-right">
                                    @if (auth('certified')->user()->certified_status > 7)
                                    <form action="{{ action('CertifiedMemberController@deleteDataMember', auth('certified')->user()->certified_cv) }}" method="post"
                                        class="formdelete">
                                        @csrf
                                        <input type="text" name="deskripsi" value="{{ auth('certified')->user()->certified_cv }}" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger delete-confirm" onclick="return confirm('Apakah anda ingin DELETE File?')">
                                    <i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                    
                                </div>
                            </div>                            
                        </div>
                    @else
                        <div class="cv proses-upload ">
                            <h4><label class="form-label" for="customFile">CV <span style="color: red">*</span></label></h4>
                            <input type="file" class="file-upload-field upload form-control mb-4" id="customFile" data-type='cv' />
                        </div>
                    @endif
                    
                    @foreach ($upload as $item)
                        <div class="terupload">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>{{ $item->upload_deskripsi }} <i class="fa fa-check"></i> </h5>
                                </div>
                                <div class="col-md-2 upload-kanan text-right">
                                    @if (auth('certified')->user()->certified_status > 7)
                                    <form action="{{ action('CertifiedMemberController@deleteUpload', $item->upload_deskripsi) }}" method="post"
                                        class="formdelete">
                                        @csrf
                                        <input type="text" name="deskripsi" value="{{ $item->upload_deskripsi }}" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger delete-confirm" onclick="return confirm('Apakah anda ingin DELETE File?')">
                                      <i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </div>                            
                        </div>
                    @endforeach
                    
                
                    {{-- <div class="surat-permohonan mb-4 proses-upload" id="permohonan">
                        <h4><label class="form-label" for="customFile">Surat Permohonan <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile"  data-type='surat_permohonan'/>
                    </div> --}}
                
                    {{-- <div class="surat-kepatuhan mb-4 proses-upload" id="kepatuhan">
                        <h4><label class="form-label" for="customFile">Surat Kepatuhan <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='surat_kepatuhan'/>
                    </div> --}}

                    <div class="ijazah mb-4 proses-upload" id="ijazah">
                        <h4><label class="form-label" for="customFile">Ijazah <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='ijazah'/>
                        <div id="file-message" class="text-muted mb-4">*format: doc,docx, dan pdf  max:2Mb</div>
                    </div>

                    <div class="transkrip mb-4 proses-upload" id="transkrip">
                        <h4><label class="form-label" for="customFile">Transkrip <span style="color: red">*</span></label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='transkrip'/>
                        <div id="file-message" class="text-muted mb-4">*format: doc,docx, dan pdf  max:2Mb</div>
                    </div>

                    {{-- <div class="perjanjian mb-4 proses-upload" id="perjanjian">
                        <h4><label class="form-label" for="customFile">Perjanjian <span style="color: red">*</span> <a class="" href="{{ asset('assets/certified/file/PERJANJIAN SERTIFIKASI.docx') }}"><i class="fa fa-download"></i> Download Surat Perjanjian</a>      </label></h4>
                        <input type="file" class="file-upload-field upload form-control" id="customFile" data-type='perjanjian'/>
                        <div id="file-message" class="text-muted mb-4">*format: doc,docx, dan pdf  max:2Mb</div>
                    </div> --}}


                    <div class="sertifikat">
                        <h3>Sertifikat</h3>
                          <div class="data-sertifikat">
                            <div class="tambah-sertifikat" id="tambah-sertifikat">
                              <i class="fa fa-plus icon-tambah"></i>
                              {{-- <i class="fa fa-times icon-hapus"></i> --}}
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
    var fileName = null ;

    $('.file-upload-field').change(function(e){
        fileName = e.target.files[0];
        var parent_class = $(this).parent();
        var data_type= $(this).attr('data-type');
        // console.log(parent_class);
        console.log(fileName);
        var btn_upload =  `<button type="button" class="btn btn-primary upload-document" data-type="${data_type}" data-name="${fileName}" >Upload</button>`;
        
       
        if (parent_class.children('button').length<=0) { 
            parent_class.append(btn_upload);
        }


    });

    
    $(document).on("click",`.upload-document`,function(){
           
            console.log("koss");
            console.log(fileName);
            upload_action = $(this).attr('data-type');
            var url_upload="";
            if(upload_action == "ktp"){
                url_upload = "{{ url('/sertifikasi/ktp') }}";
            }else if (upload_action == "foto"){
                url_upload = "{{ url('/sertifikasi/upload-foto') }}";
            }
            else if (upload_action == "cv"){
                url_upload = "{{ url('/sertifikasi/upload-cv') }}";
            }
            else if (upload_action == "ijazah"){
                url_upload = "{{ url('/sertifikasi/upload-document') }}";
            }
            else{
                url_upload = "{{ url('/sertifikasi/upload-document') }}";
            }

            var deskripsi = $(this).attr('data-type');
            uploadfile(fileName,url_upload,deskripsi);
        });

    

    function uploadfile(file,url_upload,deskripsi){

        console.log(url_upload+deskripsi);
        var formData = new FormData();
        formData.set( 'file', file );
        formData.set('upload_deskripsi',deskripsi);
        formData.set( '_token', '{{ csrf_token() }}' );

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
    console.log($('.document-upload').attr('id'))
    upload.forEach(function(item){
    // if(item.upload_deskripsi == "surat_permohonan"){
    //     $('#permohonan').css("display","none");
    // }

    // if(item.upload_deskripsi == "surat_kepatuhan"){
    //     $('#kepatuhan').css("display","none");
    // }
    if(item.upload_deskripsi == "ijazah"){
        $('#ijazah').css("display","none");
    }
    if(item.upload_deskripsi == "transkrip"){
        $('#transkrip').css("display","none");
    }
    if(item.upload_deskripsi == "perjanjian"){
        $('#perjanjian').css("display","none");
    }
    console.log(item.upload_deskripsi);
    });


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
  url_upload = "{{ url('/sertifikasi/upload-document') }}";

  uploadfile(fileName,url_upload,deskripsi);
  
}

</script>
    
@endsection