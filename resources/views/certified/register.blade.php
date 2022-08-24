@extends('layouts.certified.login')
@section('title', 'Register - LSP TPI')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Certified</b> Registration</a>
    </div>

    {{-- @foreach ($instansi as $item)
        {{ $item->kota }}
    @endforeach --}}

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Certified Registration</p>
            {{-- <div class="alert alert-warning" role="alert">
                <small> <i class="fas fa-exclamation-triangle"></i> Perhatian! Isi terlebih dahulu Formulir
                    <strong>Curriculum Vitae</strong> bisa diunduh (<a href="{{ action('HomeController@downloadCvAnggota') }}">disini</a>), kemudian submit
                    kedalam form pendaftaran dibawah.</small>
            </div> --}}
            <div class="mb-3">
                @include('layouts.shared.status')
            </div>
            <form action="{{ action('CertifiedMemberController@registerSubmit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-0">
                    <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>


                <div class="input-group mb-0 mt-3">
                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-0 mt-3">
                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp" onkeypress="return hanyaAngka(event)" maxlength="13" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-0 mt-3">
                    <div class="instansi">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Propinsi Instansi</option>

                            @foreach ($provinsi as $item)
                                <option class="provinsi" value="{{ $item->provinsi }}">{{ $item->provinsi }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>

                <div class="input-group mb-0 mt-3">
                    <div class="kota_instansi">
                        
                    </div>
                </div>
                
                <div class="input-group mb-0 mt-3">
                    <div class="nama_rs">
                        
                    </div>
                </div>

                <div class="input-group mb-0 mt-3">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <!-- <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div> -->
                        <div class="input-group-text">
                            <span class="fas fa-eye" id="toggle" style="cursor: pointer;" onclick="showHide()"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                        <option data-tokens="name">name</option>
                        <option data-tokens="family">family</option>
                        </select>
                  </div>

                <div class="input-group mb-0 mt-3">
                    <input id="repassword" type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    <div class="input-group-append">
                        <!-- <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div> -->
                        <div class="input-group-text">
                            <span class="fas fa-eye" id="retoggle" style="cursor: pointer;" onclick="reShowHide()"></span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                Saya setuju dengan <a href="#">ketentuan</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" id="btnRegister" class="btn btn-primary btn-block" disabled="disabled">Daftar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <a href="{{ action('CertifiedMemberController@login') }}" class="text-center">Saya sudah terdaftar sebagai Member</a>
            <br>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <p style="text-align:center; font-size:12px;">Copyright &copy; 2022 Persatuan Teknik Perumahsakitan Indonesia</p>
</div>
<!-- /.register-box -->

<script>

  
    const data= {!! $instansi !!};
    
    let nama_kota =[];
    let nama_instansi = [];
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
        let option = "<option selected>Kota Instansi</option>"

        for (let index = 0; index < nama_kota.length; ++index) {
                            const element = nama_kota[index];
                            // console.log(element);
                            option += ` <option class="nama_kota_instansi" value="${nama_kota[index]}">${nama_kota[index]}</option> `;
                        }

        var add_kota = `<select class="form-select" aria-label="Default select example" name="nama_kota">
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
        
        var add_namaRs = `<select class="form-select" aria-label="Default select example" name="nama_rs">
                        ${option_nama}
                        </select>`;

        $('.nama_rs').append(add_namaRs);
    })



    const password = document.getElementById('password');
    const toggle = document.getElementById('toggle');
    const repassword = document.getElementById('repassword');
    const retoggle = document.getElementById('retoggle');
    const max = 2 * 1024 * 1024;


    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $("#agreeTerms").click(function() {
        $("#btnRegister").attr("disabled", !this.checked);
    });


    function showHide() {
        if (password.type === 'password') {
            password.setAttribute('type', 'text');
            toggle.classList.remove('fa-eye');
            toggle.classList.add('fa-eye-slash');
        } else {
            password.setAttribute('type', 'password');
            toggle.classList.remove('fa-eye-slash');
            toggle.classList.add('fa-eye');
        }
    }

    function reShowHide() {
        if (repassword.type === 'password') {
            repassword.setAttribute('type', 'text');
            retoggle.classList.remove('fa-eye');
            retoggle.classList.add('fa-eye-slash');
        } else {
            repassword.setAttribute('type', 'password');
            retoggle.classList.remove('fa-eye-slash');
            retoggle.classList.add('fa-eye');
        }
    }

    document.getElementById('img-korporasi').addEventListener('change', (e) => {
        let extensions = /(\.jpg|\.jpeg|\.png)$/i;
        let fileName = document.getElementById('img-korporasi').value;
        let fileSize = e.target.files[0].size;

        if (!extensions.exec(fileName)) {
            document.querySelector('.img-message').classList.remove('text-muted');
            document.querySelector('.img-message').classList.add('text-danger');
            document.getElementById('img-korporasi').value = '';
            return false;
        } else {
            if (fileSize > max) {
                document.querySelector('.img-message').classList.remove('text-muted');
                document.querySelector('.img-message').classList.add('text-danger');
                document.getElementById('img-korporasi').value = "";
            } else {
                document.querySelector('.img-message').classList.add('text-muted');
                document.querySelector('.img-message').classList.remove('text-danger');
            }
        }
    });

    document.getElementById('cv-korporasi').addEventListener('change', (e) => {
        let extensionsFile = /(\.pdf)$/i;
        let fileName2 = document.getElementById('cv-korporasi').value;
        let fileSize2 = e.target.files[0].size;

        if (!extensionsFile.exec(fileName2)) {
            document.querySelector('.file-message').classList.remove('text-muted');
            document.querySelector('.file-message').classList.add('text-danger');
            document.getElementById('cv-korporasi').value = '';
            return false;
        } else {
            if (fileSize2 > max) {
                document.querySelector('.file-message').classList.remove('text-muted');
                document.querySelector('.file-message').classList.add('text-danger');
                document.getElementById('cv-korporasi').value = "";
            } else {
                document.querySelector('.file-message').classList.add('text-muted');
                document.querySelector('.file-message').classList.remove('text-danger');
            }
        }
    });

    

    
</script>
@endsection