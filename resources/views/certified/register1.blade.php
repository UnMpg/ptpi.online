@extends('layouts.certified.register')
@section('title', 'Register - LSP TPI')
@section('content')

<section class="vh-100 gradient-custom page-form">
    
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                
                <div class="row mb-4">
                    <div class="col-md-12 text-center">
                    <div class="title-form">
                        <a href="{{ action('CertifiedMemberController@index') }}"><img src="{{ asset('assets/certified/img/lsp.png') }}" class="img-title" alt=""></a>
                        <h3 class="">Daftar LSP TPI</h3>
                    </div>
                  </div>
                </div>

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!} Silahkan <a href="{{ action('CertifiedMemberController@login') }}">Login</a></li>
                        </ul>
                    </div>
                @endif
              
              <form action="{{ action('CertifiedMemberController@registerSubmit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">  
                    <div class="form-outline">
                      <label class="form-label" for="Nama">Nama</label>
                      <input type="text" name="nama" id="Nama" class="form-control form-control-lg"  required="required"/>
                      
                    </div>  
                  </div>

                 
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="lastName">Email</label>
                      <input type="email" name="email" id="Email" class="form-control form-control-lg"  required="required"/>
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-6 mb-4">    
                      <div class="form-outline">
                        <label class="form-label" for="Password">Password</label>
                        <input type="password" name="password" id="Password" class="form-control form-control-lg" required="required"/>
                        
                      </div>
    
                    </div>
  
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastName">Repassword</label>
                        <input type="password" name="repassword" id="repassword" class="form-control form-control-lg" required="required"/>
                        
                      </div>
                    </div>
                  </div>
  
                <div class="row">

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="lastName">Nomor HP</label>
                      <input type="number" name="no_telp" id="no_telp" class="form-control form-control-lg" required="required"/>
                      
                    </div>
                  </div>
                  
                  <div class="col-md-6 mb-4">  
                    <h6 class="mb-2 pb-1">Instansi: </h6>  
                    <div class="form-check form-check-inline" id="rsKlik">
                      <input class="form-check-input" type="radio" name="jenis_instansi" id="femaleGender"
                        value="rumah sakit" checked />
                      <label class="form-check-label "  for="femaleGender">Rumah Sakit</label>
                    </div>

                    <div class="form-check form-check-inline" id="otherKlik">
                      <input class="form-check-input" type="radio" name="jenis_instansi" id="otherGender"
                        value="other" />
                      <label class="form-check-label"  for="otherGender">Other</label>
                    </div>
  
                  </div>
                    <div class="col-md-6 mb-4 other">
                        <div class="form-outline ">
                            <label class="form-label" for="lastName">Nama Instansi</label>
                            <input type="text" name="nama_instansi" id="Instansi" class="form-control form-control-lg" />
                            
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 rs">
                        <div class="form-outline ">
                            <label class="form-label" for="lastName">Provinsi Rumah Sakit</label>
                            <select id="nama-provinsi" class="select form-control-lg form-select" name="nama_provinsi" aria-label="Default select example">
                                <option selected value="">Propinsi Instansi</option>
                                @foreach ($provinsi as $item)
                                    <option id="provinsi" class="provinsi" value="{{ $item->provinsi }}">{{ $item->provinsi }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline kota_instansi">
                            
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline nama_rs">
                            
                        </div>
                    </div>

                </div>
  
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a href="{{ action('CertifiedMemberController@login') }}" class="text-center">Saya Sudah Terdaftar </a>
                    </div>

                    <div class="col-md-6 mb-4 text-end">
                        <div class="pt-2">
                            <input class="btn btn-primary btn-lg" type="submit" value="Daftar" />
                        </div>
                    </div>
                    
                </div>  
                
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>  
@endsection

@section('script')

<script>
    $('#rsKlik').click(function(){
        
        $('.rs').show();
        $('.other').hide();
    });

    $('#otherKlik').click(function(){
        
        $('.other').show();
        $('.rs').hide();
    });

    const data= {!! $instansi !!};

    
    let nama_kota =[];
    let nama_instansi = [];
    $("#nama-provinsi").change(function(){
      console.log($(this).find("option:selected").val());
      nama_kota = [];
      $('.kota_instansi').empty();
      $('.nama_rs').empty();

      data.forEach((item) => {
            
            if (item.provinsi == $(this).find("option:selected").val()) {
                
                if (nama_kota.includes(item.kota)) {
                    // console.log("sudah ada");    
                }else{
                    nama_kota.push(item.kota);
                // console.log(item.kota);
                }
            }
            
        });
        nama_kota.sort();
        let option = "<option selected>Kota </option>"

        for (let index = 0; index < nama_kota.length; ++index) {
                            const element = nama_kota[index];
                            // console.log(element);
                            option += ` <option class="nama_kota_instansi" value="${nama_kota[index]}">${nama_kota[index]}</option> `;
                        }

        var add_kota = `<label class="form-label" for="lastName">Kota</label>
                        <select id="nama-kota" class="select form-control-lg form-select" aria-label="Default select example" name="nama_kota">
                        ${option}
                        </select>`;

        
        console.log(nama_kota);
        // console.log(add_kota);
        $('.kota_instansi').append(add_kota);
    });

    $('.provinsi').click(function(){
        console.log($(this).val());
        nama_kota = [];
        $('.kota_instansi').empty();
        $('.nama_rs').empty();
        data.forEach((item) => {
            
            if (item.provinsi == $(this).val()) {
                
                if (nama_kota.includes(item.kota)) {
                    // console.log("sudah ada");    
                }else{
                    nama_kota.push(item.kota);
                // console.log(item.kota);
                }
            }
            
        });

        nama_kota.sort();
        let option = "<option selected>Kota </option>"

        for (let index = 0; index < nama_kota.length; ++index) {
                            const element = nama_kota[index];
                            // console.log(element);
                            option += ` <option class="nama_kota_instansi" value="${nama_kota[index]}">${nama_kota[index]}</option> `;
                        }

        var add_kota = `<label class="form-label" for="lastName">Kota</label>
                        <select id="nama-kota" class="form-select" aria-label="Default select example" name="nama_kota">
                        ${option}
                        </select>`;

        
        console.log(nama_kota);
        // console.log(add_kota);
        $('.kota_instansi').append(add_kota);

    })

    $(".kota_instansi").on("click", ".nama_kota_instansi", function(){
        console.log("kota instansi ter klik");
        $('.nama_rs').empty();
        console.log($(this).val());
        nama_instansi = [];

        data.forEach((item) => {
            
            if (item.kota == $(this).val()) {
                
                if (nama_instansi.includes(item.nama)) {
                    // console.log("sudah ada");    
                }else{
                    nama_instansi.push(item.nama);
                // console.log(item.kota);
                }
            }
            
        });

        nama_instansi.sort();

        console.log(nama_instansi);

        let option_nama = "<option selected>Nama Rumah Sakit</option>"
        for (let index = 0; index < nama_instansi.length; ++index) {
                            const element = nama_instansi[index];
                            // console.log(element);
                            option_nama += ` <option class="nama_rs" value="${nama_instansi[index]}">${nama_instansi[index]}</option> `;
                        }
        
        var add_namaRs = `
                        <label class="form-label" for="lastName">Nama Rumah Sakit</label>
                        <select id="nama-rs" style="font-size: 1rem;" class="select form-control-lg form-select" aria-label="Default select example" name="nama_instansi">
                        ${option_nama}
                        </select>`;

        $('.nama_rs').append(add_namaRs);
    })

    $(".kota_instansi").on("change", "#nama-kota", function(){
        console.log("kota instansi ter klik");
        $('.nama_rs').empty();
        console.log($(this).find("option:selected").val());
        nama_instansi = [];

        data.forEach((item) => {
            
            if (item.kota == $(this).find("option:selected").val()) {
                
                if (nama_instansi.includes(item.nama)) {
                    // console.log("sudah ada");    
                }else{
                    nama_instansi.push(item.nama);
                // console.log(item.kota);
                }
            }
            
        });

        nama_instansi.sort();

        console.log(nama_instansi);

        let option_nama = "<option selected>Nama Rumah Sakit</option>"
        for (let index = 0; index < nama_instansi.length; ++index) {
                            const element = nama_instansi[index];
                            // console.log(element);
                            option_nama += ` <option class="nama_rs" value="${nama_instansi[index]}">${nama_instansi[index]}</option> `;
                        }
        
        var add_namaRs = `
                        <label class="form-label" for="lastName">Nama Rumah Sakit</label>
                        <select id="nama-rs" class="select form-control-lg form-select" aria-label="Default select example" name="nama_instansi">
                        ${option_nama}
                        </select>`;

        $('.nama_rs').append(add_namaRs);
    })

    

</script>
    
@endsection

