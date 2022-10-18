@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Input Soal')
@section('title-header', 'Input Soal')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">   
                    <div class="card-header">
                        <h5>
                            <i class="fa fa-tags"></i>
                            Data Soal
                            {{-- <a href="{{ action('DataCenterController@create') }}"
                                class="btn btn-sm btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                            </a> --}}
                            <div class="float-right">
                                Tambah Soal
                                <a href="" data-toggle="modal" data-target=".input-soal-ujian" class="btn btn-sm btn-outline-secondary ">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            
                        </h5>

                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       
                        <table id="tables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Soal</th>
                                    <th>Option A</th>
                                    <th>Option B</th>
                                    <th>Option C</th>
                                    <th>Option D</th>
                                    {{-- <th>Option E</th> --}}
                                    <th>Jawaban</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($dataSoals as $dataSoal)
                                <tr>
                                    <td>{{ $dataSoal->kategori }}</td>
                                    <td>{{ $dataSoal->soal }}</td>
                                    <td>{{ $dataSoal->a }}</td>
                                    <td>{{ $dataSoal->b }}</td>
                                    <td>{{ $dataSoal->c }}</td>
                                    <td>{{ $dataSoal->d }}</td>
                                    {{-- <td>{{ $dataSoal->e }}</td> --}}
                                    <td>{{ $dataSoal->key }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning edit-soal" data-value="{{ $dataSoal->id }}" data-toggle="modal" data-target=".input-soal-ujian" ><i class="fa fa-edit"> </i></a> 
                                    
                                        <form action="{{ action('CertifiedUjianController@deleteSoal', $dataSoal->id) }}" method="post"
                                            class="formdelete">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="btn btn-sm btn-danger delete-confirm" >
                                          <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                            
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<div class="modal fade input-soal-ujian" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input Soal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form action="{{ action('CertifiedUjianController@insertSoal') }}" method="POST" id="formInputSoal">
                @csrf
                
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Ketegori" required>
                    </div>
                </div>

                <input type="text" name="id" class="form-control" id="id" placeholder="" hidden>
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Input Soal</label>
                    <div class="col-sm-10">
                        <textarea name="soal" id="soal" style="width: 100%;min-height: 9rem;"></textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Option A</label>
                    <div class="col-sm-10">
                        <input type="text" name="a" class="form-control" id="a" placeholder="A" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Option B</label>
                    <div class="col-sm-10">
                        <input type="text" name="b" class="form-control" id="b" placeholder="B" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Option C</label>
                    <div class="col-sm-10">
                        <input type="text" name="c" class="form-control" id="c" placeholder="C" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Option D</label>
                    <div class="col-sm-10">
                        <input type="text" name="d" class="form-control" id="d" placeholder="D" required>
                    </div>
                </div>
                
                {{-- <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Option E</label>
                    <div class="col-sm-10">
                        <input type="text" name="e" class="form-control" id="e" placeholder="E" required>
                    </div>
                </div> --}}

                {{-- <input type="text" name="id" value="{{ $datauser->id }}"  hidden/> --}}
                <div class="form-group row">
                    <label for="Notif" class="col-sm-2 col-form-label">Jawaban</label>
                    <div class="col-sm-10">
                        <select name="key" class="custom-select" id="inputGroupSelect02" required>
                            <option value="" selected>Choose...</option>
                            <option value="a">Option A</option>
                            <option value="b">Option B</option>
                            <option value="c">Option C</option>
                            <option value="d">Option D</option>
                            {{-- <option value="e">Option E</option> --}}
                        </select>
                    </div>
                </div>
                    {{-- Text Editor Notive --}}
                    {{-- <div id="editor" style="min-height: 8rem">
                    
                    </div> --}}
                    

                <div class="form-grup row mt-4">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-3 text-end">
                        <input class="btn btn-primary btn-sm" type="submit" value="Submit" />
                    </div>    
                </div> 
                    
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection


@section('script')

<script>

    function getSoal(url){
        return $.ajax({
            type: "GET",
            url: url,
            async: false
        }).responseText
        
    }

    $('.edit-soal').click(function(){
        var idSoal = $(this).data('value');
        console.log($(this).data('value'));
        $(".modal-title").html("Edit Soal"); 

        var url = `{{ url('/admin/certified-edit-soal/${idSoal}') }}`;

        console.log(url);

        let response = JSON.parse(getSoal(url));
        console.log(response);
        var editkey;
        if (response.key== response.a) {
            editkey = "a";
        }else if(response.key== response.b){
            editkey = "b";
        }else if(response.key== response.c){
            editkey = "c";
        }else if(response.key== response.d){
            editkey = "d";
        } else{
            editkey = "";
        }  
        $('#kategori').val(response.kategori);
        $('#id').val(response.id);
        $('#soal').val(response.soal);
        $('#a').val(response.a);
        $('#b').val(response.b);
        $('#c').val(response.c);
        $('#d').val(response.d);
        $('#e').val(response.e);
        $('#inputGroupSelect02').val(editkey);

        $('#formInputSoal').attr('action','{{ url('/admin/certified-update-soal') }}');
        // $.ajax({
        //     url: url,
        //     type : "GET",
        //     async: false,
        //     success: function(response){
        //             console.log(response);
                    
        //         },
        //         error : function(response){
        //             console.log(response);
        //         }

        // });
        
    })

</script>
    
@endsection