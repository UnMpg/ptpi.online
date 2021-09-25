@extends('layouts.auth.app')
@section('title', 'Korporasi')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Pendaftaran</b> Korporasi</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Pendaftaran Calon Anggota (korporasi)</p>
            <div class="alert alert-warning" role="alert">
                <small> <i class="fas fa-exclamation-triangle"></i> Perhatian! Isi terlebih dahulu Formulir
                    <strong>Curriculum Vitae</strong> bisa diunduh (<a href="{{ action('HomeController@downloadCvAnggota') }}">disini</a>), kemudian submit
                    kedalam form pendaftaran dibawah.</small>
            </div>
            <div class="mb-3">
                @include('layouts.shared.status')
            </div>
            <form action="{{ action('AuthController@registerCorporate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-0">
                    <input type="text" class="form-control" placeholder="Nama Instansi" name="instansi" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fab fa-slack-hash"></span>
                        </div>
                    </div>
                </div>
                <small class="font-italic text-muted">*Contoh : Pabrik Alat Kesehatan, Penyalur Alat
                    Kesehatan</small><br>

                <div class="input-group mb-0 mt-3">
                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
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

                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Nama Contact Person" name="nama" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-0 mt-3">
                    <input type="text" class="form-control" placeholder="Nomor Telepon / HP Contact Person" name="kontak" onkeypress="return hanyaAngka(event)" maxlength="13" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="alamat" class="form-control mt-3" id="" rows="4" placeholder="Tempat tinggal / Domisili Contact Person" required></textarea>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control mt-3" placeholder="Jabatan Contact Person" name="jabatan" required>
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="Bidang Ilmu Contact Person" name="bidang_ilmu" required>
                    <small class="font-italic text-muted">*Contoh : Biomedical Engineering</small><br>
                </div>

                <div class="form-group">
                    <label for="image">Foto 4x6 (Contact Person)</label>
                    <input id="img-korporasi" type="file" class="form-control-file" name="image" required>
                    <small class="font-italic text-muted mb-0 img-message">*File harus berekstensi <strong>.jpg/.jpeg/.png</strong>
                        Maks
                        2MB</small><br>
                </div>

                <div class="form-group">
                    <label for="cv">Curriculum Vitae (Contact Person)</label>
                    <input id="cv-korporasi" type="file" class="form-control-file" id="" name="member_cv" required>
                    <small class="font-italic text-muted file-message">*File harus berekstensi <strong>.pdf</strong> Maks
                        2MB</small><br>
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
            <a href="{{ action('AuthController@login') }}" class="text-center">Saya sudah terdaftar sebagai anggota</a>
            <br>
            <a href="{{ action('AuthController@login') }}" class="text-center">Pilih jenis pendaftaran</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <p style="text-align:center; font-size:12px;">Copyright &copy; 2019 Persatuan Teknik Perumahsakitan Indonesia</p>
</div>
<!-- /.register-box -->

<script>
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