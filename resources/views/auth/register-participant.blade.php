<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" value="{{ old('viewport') }}"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
        <title>Participant</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <style>
            body {
                background: #f3f3f3;
                font-family: 'Roboto', sans-serif;
            }

            .form-control {
                border-color: #eee;
                min-height: 41px;
                box-shadow: none !important;
            }

            .form-control:focus {
                border-color: #5cd3b4;
            }

            .form-control,
            .btn {
                border-radius: 3px;
            }

            .signup-form {
                width: 500px;
                margin: 0 auto;
                padding: 30px 0;
            }

            .signup-form h2 {
                color: #333;
                margin: 0 0 30px 0;
                display: inline-block;
                padding: 0 0 10px 0;
                border-bottom: 3px solid #5cd3b4;
            }

            .signup-form form {
                color: #999;
                border-radius: 3px;
                margin-bottom: 15px;
                background: #fff;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }

            .signup-form .form-group row {
                margin-bottom: 20px;
            }

            .signup-form label {
                font-weight: normal;
                font-size: 14px;
                line-height: 2;
            }

            .signup-form input[type="checkbox"] {
                position: relative;
                top: 1px;
            }

            .signup-form .btn {
                font-size: 16px;
                font-weight: bold;
                background: #5cd3b4;
                border: none;
                margin-top: 20px;
                min-width: 140px;
            }

            .signup-form .btn:hover,
            .signup-form .btn:focus {
                background: #41cba9;
                outline: none !important;
            }

            .signup-form a {
                color: #5cd3b4;
                text-decoration: underline;
            }

            .signup-form a:hover {
                text-decoration: none;
            }

            .signup-form form a {
                color: #5cd3b4;
                text-decoration: none;
            }

            .signup-form form a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="signup-form">
            <form action="{{ action('AuthController@registerParticipant') }}" method="post" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Daftar Data Diri</h2>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-4">Nama Lengkap</label>
                    <div class="col-8">
                        <input type="text" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
                            name="nama" value="{{ old('nama') }}" required="required"
                            placeholder="Nama Lengkap & (gelar/titel)" autofocus>
                        @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Email Address</label>
                    <div class="col-8">
                        <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" required="required" placeholder="Email Address...">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Nomor HP</label>
                    <div class="col-8">
                        <input type="text" class="form-control {{ $errors->first('kontak') ? 'is-invalid' : '' }}"
                            name="kontak" value="{{ old('kontak') }}" required="required" placeholder="Nomor HP...">
                        @if ($errors->has('kontak'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kontak') }}
                        </div>
                        @endif
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-form-label col-4">Jenis Instansi</label>
                    <div class="col-8">
                        <select name="jenis_instansi" id=""
                            class="form-control {{ $errors->first('jenis_instansi') ? 'is-invalid' : '' }}" required>
                            <option value="">~~ Pilih Instansi ~~</option>
                            <option value="RUMAH SAKIT">RUMAH SAKIT</option>
                            <option value="PUSKESMAS">PUSKESMAS</option>
                            <option value="DINKES">DINKES</option>
                            <option value="KLINIK">KLINIK</option>
                            <option value="PERUSAHAAN">PERUSAHAAN</option>
                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                        </select>
                        @if ($errors->has('jenis_instansi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jenis_instansi') }}
                        </div>
                        @endif
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label class="col-form-label col-4">Nama Instansi</label>
                    <div class="col-8">
                        <textarea name="nama_instansi" cols="30" rows="3"
                            class="form-control {{ $errors->first('nama_instansi') ? 'is-invalid' : '' }}"
                            placeholder="Contoh : Dinas Pendidikan Dan Kebudayaan">{{ old('nama_instansi') }}</textarea>
                        @if ($errors->has('nama_instansi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_instansi') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Instansi (Pekerjaan)</label>
                    <div class="col-8">
                        <select name="pekerjaan" id=""
                            class="form-control {{ $errors->first('pekerjaan') ? 'is-invalid' : '' }}" required>
                            <option value="">~~ Pilih Jenis Pekerjaan ~~</option>
                            <option value="Rumah Sakit (Pemilik)">Rumah Sakit (Pemilik)</option>
                            <option value="Rumah Sakit (Dirut/Kepala)">Rumah Sakit (Dirut/Kepala)</option>
                            <option value="Rumah Sakit (Direktur)">Rumah Sakit (Direktur)</option>
                            <option value="Rumah Sakit (Manajer)">Rumah Sakit (Manajer)</option>
                            <option value="Rumah Sakit (Dokter)">Rumah Sakit (Dokter)</option>
                            <option value="Rumah Sakit (Perawat)">Rumah Sakit (Perawat)</option>
                            <option value="Rumah Sakit (Engineer)">Rumah Sakit (Engineer)</option>
                            <option value="Rumah Sakit (Teknisi)">Rumah Sakit (Teknisi)</option>
                            <option value="Rumah Sakit (staff IT)">Rumah Sakit (staff IT)</option>
                            <option value="Rumah Sakit (Staff lainnya)">Rumah Sakit (Staff lainnya)</option>
                            <option value="Perguruan Tinggi (Pimpinan)">Perguruan Tinggi (Pimpinan)</option>
                            <option value="Perguruan Tinggi (Dosen)">Perguruan Tinggi (Dosen)</option>
                            <option value="Perguruan Tinggi (Mahasiswa)">Perguruan Tinggi (Mahasiswa)</option>
                            <option value="Perusahaan (Pemilik/Komisaris)">Perusahaan (Pemilik/Komisaris)</option>
                            <option value="Perusahaan (Dirut)">Perusahaan (Dirut)</option>
                            <option value="Perusahaan (Direktur/General Manager)">Perusahaan (Direktur/General Manager)</option>
                            <option value="Perusahaan (Manajer )">Perusahaan (Manajer )</option>
                            <option value="Perusahaan (Staff)">Perusahaan (Staff)</option>
                            <option value="Dinkes (Pimpinan)">Dinkes (Pimpinan)</option>
                            <option value="Dinkes (Staf)">Dinkes (Staf)</option>
                            <option value="Konsultan Freelance">Konsultan Freelance</option>
                            <option value="Puskesmas (Kepala)">Puskesmas (Kepala)</option>
                            <option value="Puskesmas (Dokter)">Puskesmas (Dokter)</option>
                            <option value="Puskesmas (Staff lain)">Puskesmas (Staff lain)</option>
                            <option value="Kementerian (Pimpinan)">Kementerian (Pimpinan)</option>
                            <option value="Kementerian (Staf)">Kementerian (Staf)</option>
                        </select>
                        @if ($errors->has('pekerjaan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pekerjaan') }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-4">Provinsi</label>
                    <div class="col-8">
                        <select name="provinsi" id=""
                            class="form-control {{ $errors->first('provinsi') ? 'is-invalid' : '' }}" required>
                            <option value="">~~ Pilih Provinsi ~~</option>
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatra Utara">Sumatra Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="D.I. Yogyakarta">D.I. Yogyakarta</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Banten">Banten</option>
                            <option value="Bali">Bali</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                        </select>
                        @if ($errors->has('provinsi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('provinsi') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Kabupaten</label>
                    <div class="col-8">
                        <select name="kabupaten"
                            class="form-control {{ $errors->first('kabupaten') ? 'is-invalid' : '' }} js-example-basic-single" required>
                            <option value="">~~ Pilih Kabupaten ~~</option>
                           <option value="Kab. Simeulue">Kab. Simeulue</option>
                            <option value="Kab. Aceh Singkil">Kab. Aceh Singkil</option>
                            <option value="Kab. Aceh Selatan">Kab. Aceh Selatan</option>
                            <option value="Kab. Aceh Tenggara">Kab. Aceh Tenggara</option>
                            <option value="Kab. Aceh Timur">Kab. Aceh Timur</option>
                            <option value="Kab. Aceh Tengah">Kab. Aceh Tengah</option>
                            <option value="Kab. Aceh Barat">Kab. Aceh Barat</option>
                            <option value="Kab. Aceh Besar">Kab. Aceh Besar</option>
                            <option value="Kab. Pidie">Kab. Pidie</option>
                            <option value="Kab. Bireuen">Kab. Bireuen</option>
                            <option value="Kab. Aceh Utara">Kab. Aceh Utara</option>
                            <option value="Kab. Aceh Barat Daya">Kab. Aceh Barat Daya</option>
                            <option value="Kab. Gayo Lues">Kab. Gayo Lues</option>
                            <option value="Kab. Aceh Tamiang">Kab. Aceh Tamiang</option>
                            <option value="Kab. Nagan Raya">Kab. Nagan Raya</option>
                            <option value="Kab. Aceh Jaya">Kab. Aceh Jaya</option>
                            <option value="Kab. Bener Meriah">Kab. Bener Meriah</option>
                            <option value="Kab. Pidie Jaya">Kab. Pidie Jaya</option>
                            <option value="Kota Banda Aceh">Kota Banda Aceh</option>
                            <option value="Kota Sabang">Kota Sabang</option>
                            <option value="Kota Langsa">Kota Langsa</option>
                            <option value="Kota Lhokseumawe">Kota Lhokseumawe</option>
                            <option value="Kota Subulussalam">Kota Subulussalam</option>
                            <option value="Kab. Nias">Kab. Nias</option>
                            <option value="Kab. Mandailing Natal">Kab. Mandailing Natal</option>
                            <option value="Kab. Tapanuli Selatan">Kab. Tapanuli Selatan</option>
                            <option value="Kab. Tapanuli Tengah">Kab. Tapanuli Tengah</option>
                            <option value="Kab. Tapanuli Utara">Kab. Tapanuli Utara</option>
                            <option value="Kab. Toba Samosir">Kab. Toba Samosir</option>
                            <option value="Kab. Labuhan Batu">Kab. Labuhan Batu</option>
                            <option value="Kab. Asahan">Kab. Asahan</option>
                            <option value="Kab. Simalungun">Kab. Simalungun</option>
                            <option value="Kab. Dairi">Kab. Dairi</option>
                            <option value="Kab. Karo">Kab. Karo</option>
                            <option value="Kab. Deli Serdang">Kab. Deli Serdang</option>
                            <option value="Kab. Langkat">Kab. Langkat</option>
                            <option value="Kab. Nias Selatan">Kab. Nias Selatan</option>
                            <option value="Kab. Humbang Hasundutan">Kab. Humbang Hasundutan</option>
                            <option value="Kab. Pakpak Bharat">Kab. Pakpak Bharat</option>
                            <option value="Kab. Samosir">Kab. Samosir</option>
                            <option value="Kab. Serdang Bedagai">Kab. Serdang Bedagai</option>
                            <option value="Kab. Batu Bara">Kab. Batu Bara</option>
                            <option value="Kab. Padang Lawas Utara">Kab. Padang Lawas Utara</option>
                            <option value="Kab. Padang Lawas">Kab. Padang Lawas</option>
                            <option value="Kab. Labuhan Batu Selatan">Kab. Labuhan Batu Selatan</option>
                            <option value="Kab. Labuhan Batu Utara">Kab. Labuhan Batu Utara</option>
                            <option value="Kab. Nias Utara">Kab. Nias Utara</option>
                            <option value="Kab. Nias Barat">Kab. Nias Barat</option>
                            <option value="Kota Sibolga">Kota Sibolga</option>
                            <option value="Kota Tanjung Balai">Kota Tanjung Balai</option>
                            <option value="Kota Pematang Siantar">Kota Pematang Siantar</option>
                            <option value="Kota Tebing Tinggi">Kota Tebing Tinggi</option>
                            <option value="Kota Medan">Kota Medan</option>
                            <option value="Kota Binjai">Kota Binjai</option>
                            <option value="Kota Padangsidimpuan">Kota Padangsidimpuan</option>
                            <option value="Kota Gunungsitoli">Kota Gunungsitoli</option>
                            <option value="Kab. Kepulauan Mentawai">Kab. Kepulauan Mentawai</option>
                            <option value="Kab. Pesisir Selatan">Kab. Pesisir Selatan</option>
                            <option value="Kab. Solok">Kab. Solok</option>
                            <option value="Kab. Sijunjung">Kab. Sijunjung</option>
                            <option value="Kab. Tanah Datar">Kab. Tanah Datar</option>
                            <option value="Kab. Padang Pariaman">Kab. Padang Pariaman</option>
                            <option value="Kab. Agam">Kab. Agam</option>
                            <option value="Kab. Lima Puluh Kota">Kab. Lima Puluh Kota</option>
                            <option value="Kab. Pasaman">Kab. Pasaman</option>
                            <option value="Kab. Solok Selatan">Kab. Solok Selatan</option>
                            <option value="Kab. Dharmasraya">Kab. Dharmasraya</option>
                            <option value="Kab. Pasaman Barat">Kab. Pasaman Barat</option>
                            <option value="Kota Padang">Kota Padang</option>
                            <option value="Kota Solok">Kota Solok</option>
                            <option value="Kota Sawah Lunto">Kota Sawah Lunto</option>
                            <option value="Kota Padang Panjang">Kota Padang Panjang</option>
                            <option value="Kota Bukittinggi">Kota Bukittinggi</option>
                            <option value="Kota Payakumbuh">Kota Payakumbuh</option>
                            <option value="Kota Pariaman">Kota Pariaman</option>
                            <option value="Kab. Kuantan Singingi">Kab. Kuantan Singingi</option>
                            <option value="Kab. Indragiri Hulu">Kab. Indragiri Hulu</option>
                            <option value="Kab. Indragiri Hilir">Kab. Indragiri Hilir</option>
                            <option value="Kab. Pelalawan">Kab. Pelalawan</option>
                            <option value="Kab. S I A K">Kab. S I A K</option>
                            <option value="Kab. Kampar">Kab. Kampar</option>
                            <option value="Kab. Rokan Hulu">Kab. Rokan Hulu</option>
                            <option value="Kab. Bengkalis">Kab. Bengkalis</option>
                            <option value="Kab. Rokan Hilir">Kab. Rokan Hilir</option>
                            <option value="Kab. Kepulauan Meranti">Kab. Kepulauan Meranti</option>
                            <option value="Kota Pekanbaru">Kota Pekanbaru</option>
                            <option value="Kota D U M A I">Kota D U M A I</option>
                            <option value="Kab. Kerinci">Kab. Kerinci</option>
                            <option value="Kab. Merangin">Kab. Merangin</option>
                            <option value="Kab. Sarolangun">Kab. Sarolangun</option>
                            <option value="Kab. Batang Hari">Kab. Batang Hari</option>
                            <option value="Kab. Muaro Jambi">Kab. Muaro Jambi</option>
                            <option value="Kab. Tanjung Jabung Timur">Kab. Tanjung Jabung Timur</option>
                            <option value="Kab. Tanjung Jabung Barat">Kab. Tanjung Jabung Barat</option>
                            <option value="Kab. Tebo">Kab. Tebo</option>
                            <option value="Kab. Bungo">Kab. Bungo</option>
                            <option value="Kota Jambi">Kota Jambi</option>
                            <option value="Kota Sungai Penuh">Kota Sungai Penuh</option>
                            <option value="Kab. Ogan Komering Ulu">Kab. Ogan Komering Ulu</option>
                            <option value="Kab. Ogan Komering Ilir">Kab. Ogan Komering Ilir</option>
                            <option value="Kab. Muara Enim">Kab. Muara Enim</option>
                            <option value="Kab. Lahat">Kab. Lahat</option>
                            <option value="Kab. Musi Rawas">Kab. Musi Rawas</option>
                            <option value="Kab. Musi Banyuasin">Kab. Musi Banyuasin</option>
                            <option value="Kab. Banyu Asin">Kab. Banyu Asin</option>
                            <option value="Kab. Ogan Komering Ulu Selatan">Kab. Ogan Komering Ulu Selatan</option>
                            <option value="Kab. Ogan Komering Ulu Timur">Kab. Ogan Komering Ulu Timur</option>
                            <option value="Kab. Ogan Ilir">Kab. Ogan Ilir</option>
                            <option value="Kab. Empat Lawang">Kab. Empat Lawang</option>
                            <option value="Kota Palembang">Kota Palembang</option>
                            <option value="Kota Prabumulih">Kota Prabumulih</option>
                            <option value="Kota Pagar Alam">Kota Pagar Alam</option>
                            <option value="Kota Lubuklinggau">Kota Lubuklinggau</option>
                            <option value="Kab. Bengkulu Selatan">Kab. Bengkulu Selatan</option>
                            <option value="Kab. Rejang Lebong">Kab. Rejang Lebong</option>
                            <option value="Kab. Bengkulu Utara">Kab. Bengkulu Utara</option>
                            <option value="Kab. Kaur">Kab. Kaur</option>
                            <option value="Kab. Seluma">Kab. Seluma</option>
                            <option value="Kab. Mukomuko">Kab. Mukomuko</option>
                            <option value="Kab. Lebong">Kab. Lebong</option>
                            <option value="Kab. Kepahiang">Kab. Kepahiang</option>
                            <option value="Kab. Bengkulu Tengah">Kab. Bengkulu Tengah</option>
                            <option value="Kota Bengkulu">Kota Bengkulu</option>
                            <option value="Kab. Lampung Barat">Kab. Lampung Barat</option>
                            <option value="Kab. Tanggamus">Kab. Tanggamus</option>
                            <option value="Kab. Lampung Selatan">Kab. Lampung Selatan</option>
                            <option value="Kab. Lampung Timur">Kab. Lampung Timur</option>
                            <option value="Kab. Lampung Tengah">Kab. Lampung Tengah</option>
                            <option value="Kab. Lampung Utara">Kab. Lampung Utara</option>
                            <option value="Kab. Way Kanan">Kab. Way Kanan</option>
                            <option value="Kab. Tulangbawang">Kab. Tulangbawang</option>
                            <option value="Kab. Pesawaran">Kab. Pesawaran</option>
                            <option value="Kab. Pringsewu">Kab. Pringsewu</option>
                            <option value="Kab. Mesuji">Kab. Mesuji</option>
                            <option value="Kab. Tulang Bawang Barat">Kab. Tulang Bawang Barat</option>
                            <option value="Kab. Pesisir Barat">Kab. Pesisir Barat</option>
                            <option value="Kota Bandar Lampung">Kota Bandar Lampung</option>
                            <option value="Kota Metro">Kota Metro</option>
                            <option value="Kab. Bangka">Kab. Bangka</option>
                            <option value="Kab. Belitung">Kab. Belitung</option>
                            <option value="Kab. Bangka Barat">Kab. Bangka Barat</option>
                            <option value="Kab. Bangka Tengah">Kab. Bangka Tengah</option>
                            <option value="Kab. Bangka Selatan">Kab. Bangka Selatan</option>
                            <option value="Kab. Belitung Timur">Kab. Belitung Timur</option>
                            <option value="Kota Pangkal Pinang">Kota Pangkal Pinang</option>
                            <option value="Kab. Karimun">Kab. Karimun</option>
                            <option value="Kab. Bintan">Kab. Bintan</option>
                            <option value="Kab. Natuna">Kab. Natuna</option>
                            <option value="Kab. Lingga">Kab. Lingga</option>
                            <option value="Kab. Kepulauan Anambas">Kab. Kepulauan Anambas</option>
                            <option value="Kota B A T A M">Kota B A T A M</option>
                            <option value="Kota Tanjung Pinang">Kota Tanjung Pinang</option>
                            <option value="Kab. Kepulauan Seribu">Kab. Kepulauan Seribu</option>
                            <option value="Kota Jakarta Selatan">Kota Jakarta Selatan</option>
                            <option value="Kota Jakarta Timur">Kota Jakarta Timur</option>
                            <option value="Kota Jakarta Pusat">Kota Jakarta Pusat</option>
                            <option value="Kota Jakarta Barat">Kota Jakarta Barat</option>
                            <option value="Kota Jakarta Utara">Kota Jakarta Utara</option>
                            <option value="Kab. Bogor">Kab. Bogor</option>
                            <option value="Kab. Sukabumi">Kab. Sukabumi</option>
                            <option value="Kab. Cianjur">Kab. Cianjur</option>
                            <option value="Kab. Bandung">Kab. Bandung</option>
                            <option value="Kab. Garut">Kab. Garut</option>
                            <option value="Kab. Tasikmalaya">Kab. Tasikmalaya</option>
                            <option value="Kab. Ciamis">Kab. Ciamis</option>
                            <option value="Kab. Kuningan">Kab. Kuningan</option>
                            <option value="Kab. Cirebon">Kab. Cirebon</option>
                            <option value="Kab. Majalengka">Kab. Majalengka</option>
                            <option value="Kab. Sumedang">Kab. Sumedang</option>
                            <option value="Kab. Indramayu">Kab. Indramayu</option>
                            <option value="Kab. Subang">Kab. Subang</option>
                            <option value="Kab. Purwakarta">Kab. Purwakarta</option>
                            <option value="Kab. Karawang">Kab. Karawang</option>
                            <option value="Kab. Bekasi">Kab. Bekasi</option>
                            <option value="Kab. Bandung Barat">Kab. Bandung Barat</option>
                            <option value="Kab. Pangandaran">Kab. Pangandaran</option>
                            <option value="Kota Bogor">Kota Bogor</option>
                            <option value="Kota Sukabumi">Kota Sukabumi</option>
                            <option value="Kota Bandung">Kota Bandung</option>
                            <option value="Kota Cirebon">Kota Cirebon</option>
                            <option value="Kota Bekasi">Kota Bekasi</option>
                            <option value="Kota Depok">Kota Depok</option>
                            <option value="Kota Cimahi">Kota Cimahi</option>
                            <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
                            <option value="Kota Banjar">Kota Banjar</option>
                            <option value="Kab. Cilacap">Kab. Cilacap</option>
                            <option value="Kab. Banyumas">Kab. Banyumas</option>
                            <option value="Kab. Purbalingga">Kab. Purbalingga</option>
                            <option value="Kab. Banjarnegara">Kab. Banjarnegara</option>
                            <option value="Kab. Kebumen">Kab. Kebumen</option>
                            <option value="Kab. Purworejo">Kab. Purworejo</option>
                            <option value="Kab. Wonosobo">Kab. Wonosobo</option>
                            <option value="Kab. Magelang">Kab. Magelang</option>
                            <option value="Kab. Boyolali">Kab. Boyolali</option>
                            <option value="Kab. Klaten">Kab. Klaten</option>
                            <option value="Kab. Sukoharjo">Kab. Sukoharjo</option>
                            <option value="Kab. Wonogiri">Kab. Wonogiri</option>
                            <option value="Kab. Karanganyar">Kab. Karanganyar</option>
                            <option value="Kab. Sragen">Kab. Sragen</option>
                            <option value="Kab. Grobogan">Kab. Grobogan</option>
                            <option value="Kab. Blora">Kab. Blora</option>
                            <option value="Kab. Rembang">Kab. Rembang</option>
                            <option value="Kab. Pati">Kab. Pati</option>
                            <option value="Kab. Kudus">Kab. Kudus</option>
                            <option value="Kab. Jepara">Kab. Jepara</option>
                            <option value="Kab. Demak">Kab. Demak</option>
                            <option value="Kab. Semarang">Kab. Semarang</option>
                            <option value="Kab. Temanggung">Kab. Temanggung</option>
                            <option value="Kab. Kendal">Kab. Kendal</option>
                            <option value="Kab. Batang">Kab. Batang</option>
                            <option value="Kab. Pekalongan">Kab. Pekalongan</option>
                            <option value="Kab. Pemalang">Kab. Pemalang</option>
                            <option value="Kab. Tegal">Kab. Tegal</option>
                            <option value="Kab. Brebes">Kab. Brebes</option>
                            <option value="Kota Magelang">Kota Magelang</option>
                            <option value="Kota Surakarta">Kota Surakarta</option>
                            <option value="Kota Salatiga">Kota Salatiga</option>
                            <option value="Kota Semarang">Kota Semarang</option>
                            <option value="Kota Pekalongan">Kota Pekalongan</option>
                            <option value="Kota Tegal">Kota Tegal</option>
                            <option value="Kab. Kulon Progo">Kab. Kulon Progo</option>
                            <option value="Kab. Bantul">Kab. Bantul</option>
                            <option value="Kab. Gunung Kidul">Kab. Gunung Kidul</option>
                            <option value="Kab. Sleman">Kab. Sleman</option>
                            <option value="Kota Yogyakarta">Kota Yogyakarta</option>
                            <option value="Kab. Pacitan">Kab. Pacitan</option>
                            <option value="Kab. Ponorogo">Kab. Ponorogo</option>
                            <option value="Kab. Trenggalek">Kab. Trenggalek</option>
                            <option value="Kab. Tulungagung">Kab. Tulungagung</option>
                            <option value="Kab. Blitar">Kab. Blitar</option>
                            <option value="Kab. Kediri">Kab. Kediri</option>
                            <option value="Kab. Malang">Kab. Malang</option>
                            <option value="Kab. Lumajang">Kab. Lumajang</option>
                            <option value="Kab. Jember">Kab. Jember</option>
                            <option value="Kab. Banyuwangi">Kab. Banyuwangi</option>
                            <option value="Kab. Bondowoso">Kab. Bondowoso</option>
                            <option value="Kab. Situbondo">Kab. Situbondo</option>
                            <option value="Kab. Probolinggo">Kab. Probolinggo</option>
                            <option value="Kab. Pasuruan">Kab. Pasuruan</option>
                            <option value="Kab. Sidoarjo">Kab. Sidoarjo</option>
                            <option value="Kab. Mojokerto">Kab. Mojokerto</option>
                            <option value="Kab. Jombang">Kab. Jombang</option>
                            <option value="Kab. Nganjuk">Kab. Nganjuk</option>
                            <option value="Kab. Madiun">Kab. Madiun</option>
                            <option value="Kab. Magetan">Kab. Magetan</option>
                            <option value="Kab. Ngawi">Kab. Ngawi</option>
                            <option value="Kab. Bojonegoro">Kab. Bojonegoro</option>
                            <option value="Kab. Tuban">Kab. Tuban</option>
                            <option value="Kab. Lamongan">Kab. Lamongan</option>
                            <option value="Kab. Gresik">Kab. Gresik</option>
                            <option value="Kab. Bangkalan">Kab. Bangkalan</option>
                            <option value="Kab. Sampang">Kab. Sampang</option>
                            <option value="Kab. Pamekasan">Kab. Pamekasan</option>
                            <option value="Kab. Sumenep">Kab. Sumenep</option>
                            <option value="Kota Kediri">Kota Kediri</option>
                            <option value="Kota Blitar">Kota Blitar</option>
                            <option value="Kota Malang">Kota Malang</option>
                            <option value="Kota Probolinggo">Kota Probolinggo</option>
                            <option value="Kota Pasuruan">Kota Pasuruan</option>
                            <option value="Kota Mojokerto">Kota Mojokerto</option>
                            <option value="Kota Madiun">Kota Madiun</option>
                            <option value="Kota Surabaya">Kota Surabaya</option>
                            <option value="Kota Batu">Kota Batu</option>
                            <option value="Kab. Pandeglang">Kab. Pandeglang</option>
                            <option value="Kab. Lebak">Kab. Lebak</option>
                            <option value="Kab. Tangerang">Kab. Tangerang</option>
                            <option value="Kab. Serang">Kab. Serang</option>
                            <option value="Kota Tangerang">Kota Tangerang</option>
                            <option value="Kota Cilegon">Kota Cilegon</option>
                            <option value="Kota Serang">Kota Serang</option>
                            <option value="Kota Tangerang Selatan">Kota Tangerang Selatan</option>
                            <option value="Kab. Jembrana">Kab. Jembrana</option>
                            <option value="Kab. Tabanan">Kab. Tabanan</option>
                            <option value="Kab. Badung">Kab. Badung</option>
                            <option value="Kab. Gianyar">Kab. Gianyar</option>
                            <option value="Kab. Klungkung">Kab. Klungkung</option>
                            <option value="Kab. Bangli">Kab. Bangli</option>
                            <option value="Kab. Karang Asem">Kab. Karang Asem</option>
                            <option value="Kab. Buleleng">Kab. Buleleng</option>
                            <option value="Kota Denpasar">Kota Denpasar</option>
                            <option value="Kab. Lombok Barat">Kab. Lombok Barat</option>
                            <option value="Kab. Lombok Tengah">Kab. Lombok Tengah</option>
                            <option value="Kab. Lombok Timur">Kab. Lombok Timur</option>
                            <option value="Kab. Sumbawa">Kab. Sumbawa</option>
                            <option value="Kab. Dompu">Kab. Dompu</option>
                            <option value="Kab. Bima">Kab. Bima</option>
                            <option value="Kab. Sumbawa Barat">Kab. Sumbawa Barat</option>
                            <option value="Kab. Lombok Utara">Kab. Lombok Utara</option>
                            <option value="Kota Mataram">Kota Mataram</option>
                            <option value="Kota Bima">Kota Bima</option>
                            <option value="Kab. Sumba Barat">Kab. Sumba Barat</option>
                            <option value="Kab. Sumba Timur">Kab. Sumba Timur</option>
                            <option value="Kab. Kupang">Kab. Kupang</option>
                            <option value="Kab. Timor Tengah Selatan">Kab. Timor Tengah Selatan</option>
                            <option value="Kab. Timor Tengah Utara">Kab. Timor Tengah Utara</option>
                            <option value="Kab. Belu">Kab. Belu</option>
                            <option value="Kab. Belu">Kab. Belu</option>
                            <option value="Kab. Alor">Kab. Alor</option>
                            <option value="Kab. Lembata">Kab. Lembata</option>
                            <option value="Kab. Flores Timur">Kab. Flores Timur</option>
                            <option value="Kab. Sikka">Kab. Sikka</option>
                            <option value="Kab. Ende">Kab. Ende</option>
                            <option value="Kab. Ngada">Kab. Ngada</option>
                            <option value="Kab. Manggarai">Kab. Manggarai</option>
                            <option value="Kab. Rote Ndao">Kab. Rote Ndao</option>
                            <option value="Kab. Manggarai Barat">Kab. Manggarai Barat</option>
                            <option value="Kab. Sumba Tengah">Kab. Sumba Tengah</option>
                            <option value="Kab. Sumba Barat Daya">Kab. Sumba Barat Daya</option>
                            <option value="Kab. Nagekeo">Kab. Nagekeo</option>
                            <option value="Kab. Manggarai Timur">Kab. Manggarai Timur</option>
                            <option value="Kab. Sabu Raijua">Kab. Sabu Raijua</option>
                            <option value="Kota Kupang">Kota Kupang</option>
                            <option value="Kab. Sambas">Kab. Sambas</option>
                            <option value="Kab. Bengkayang">Kab. Bengkayang</option>
                            <option value="Kab. Landak">Kab. Landak</option>
                            <option value="Kab. Pontianak">Kab. Pontianak</option>
                            <option value="Kab. Sanggau">Kab. Sanggau</option>
                            <option value="Kab. Ketapang">Kab. Ketapang</option>
                            <option value="Kab. Sintang">Kab. Sintang</option>
                            <option value="Kab. Kapuas Hulu">Kab. Kapuas Hulu</option>
                            <option value="Kab. Sekadau">Kab. Sekadau</option>
                            <option value="Kab. Melawi">Kab. Melawi</option>
                            <option value="Kab. Kayong Utara">Kab. Kayong Utara</option>
                            <option value="Kab. Kubu Raya">Kab. Kubu Raya</option>
                            <option value="Kota Pontianak">Kota Pontianak</option>
                            <option value="Kota Singkawang">Kota Singkawang</option>
                            <option value="Kab. Kotawaringin Barat">Kab. Kotawaringin Barat</option>
                            <option value="Kab. Kotawaringin Timur">Kab. Kotawaringin Timur</option>
                            <option value="Kab. Kapuas">Kab. Kapuas</option>
                            <option value="Kab. Barito Selatan">Kab. Barito Selatan</option>
                            <option value="Kab. Barito Utara">Kab. Barito Utara</option>
                            <option value="Kab. Sukamara">Kab. Sukamara</option>
                            <option value="Kab. Lamandau">Kab. Lamandau</option>
                            <option value="Kab. Seruyan">Kab. Seruyan</option>
                            <option value="Kab. Katingan">Kab. Katingan</option>
                            <option value="Kab. Pulang Pisau">Kab. Pulang Pisau</option>
                            <option value="Kab. Gunung Mas">Kab. Gunung Mas</option>
                            <option value="Kab. Barito Timur">Kab. Barito Timur</option>
                            <option value="Kab. Murung Raya">Kab. Murung Raya</option>
                            <option value="Kota Palangka Raya">Kota Palangka Raya</option>
                            <option value="Kab. Tanah Laut">Kab. Tanah Laut</option>
                            <option value="Kab. Kota Baru">Kab. Kota Baru</option>
                            <option value="Kab. Banjar">Kab. Banjar</option>
                            <option value="Kab. Barito Kuala">Kab. Barito Kuala</option>
                            <option value="Kab. Tapin">Kab. Tapin</option>
                            <option value="Kab. Hulu Sungai Selatan">Kab. Hulu Sungai Selatan</option>
                            <option value="Kab. Hulu Sungai Tengah">Kab. Hulu Sungai Tengah</option>
                            <option value="Kab. Hulu Sungai Utara">Kab. Hulu Sungai Utara</option>
                            <option value="Kab. Tabalong">Kab. Tabalong</option>
                            <option value="Kab. Tanah Bumbu">Kab. Tanah Bumbu</option>
                            <option value="Kab. Balangan">Kab. Balangan</option>
                            <option value="Kota Banjarmasin">Kota Banjarmasin</option>
                            <option value="Kota Banjar Baru">Kota Banjar Baru</option>
                            <option value="Kab. Paser">Kab. Paser</option>
                            <option value="Kab. Kutai Barat">Kab. Kutai Barat</option>
                            <option value="Kab. Kutai Kartanegara">Kab. Kutai Kartanegara</option>
                            <option value="Kab. Kutai Timur">Kab. Kutai Timur</option>
                            <option value="Kab. Berau">Kab. Berau</option>
                            <option value="Kab. Penajam Paser Utara">Kab. Penajam Paser Utara</option>
                            <option value="Kota Balikpapan">Kota Balikpapan</option>
                            <option value="Kota Samarinda">Kota Samarinda</option>
                            <option value="Kota Bontang">Kota Bontang</option>
                            <option value="Kab. Malinau">Kab. Malinau</option>
                            <option value="Kab. Bulungan">Kab. Bulungan</option>
                            <option value="Kab. Tana Tidung">Kab. Tana Tidung</option>
                            <option value="Kab. Nunukan">Kab. Nunukan</option>
                            <option value="Kota Tarakan">Kota Tarakan</option>
                            <option value="Kab. Bolaang Mongondow">Kab. Bolaang Mongondow</option>
                            <option value="Kab. Minahasa">Kab. Minahasa</option>
                            <option value="Kab. Kepulauan Sangihe">Kab. Kepulauan Sangihe</option>
                            <option value="Kab. Kepulauan Talaud">Kab. Kepulauan Talaud</option>
                            <option value="Kab. Minahasa Selatan">Kab. Minahasa Selatan</option>
                            <option value="Kab. Minahasa Utara">Kab. Minahasa Utara</option>
                            <option value="Kab. Bolaang Mongondow Utara">Kab. Bolaang Mongondow Utara</option>
                            <option value="Kab. Siau Tagulandang Biaro">Kab. Siau Tagulandang Biaro</option>
                            <option value="Kab. Minahasa Tenggara">Kab. Minahasa Tenggara</option>
                            <option value="Kab. Bolaang Mongondow Selatan">Kab. Bolaang Mongondow Selatan</option>
                            <option value="Kab. Bolaang Mongondow Timur">Kab. Bolaang Mongondow Timur</option>
                            <option value="Kota Manado">Kota Manado</option>
                            <option value="Kota Bitung">Kota Bitung</option>
                            <option value="Kota Tomohon">Kota Tomohon</option>
                            <option value="Kota Kotamobagu">Kota Kotamobagu</option>
                            <option value="Kab. Banggai Kepulauan">Kab. Banggai Kepulauan</option>
                            <option value="Kab. Banggai">Kab. Banggai</option>
                            <option value="Kab. Morowali">Kab. Morowali</option>
                            <option value="Kab. Poso">Kab. Poso</option>
                            <option value="Kab. Donggala">Kab. Donggala</option>
                            <option value="Kab. Toli-toli">Kab. Toli-toli</option>
                            <option value="Kab. Buol">Kab. Buol</option>
                            <option value="Kab. Parigi Moutong">Kab. Parigi Moutong</option>
                            <option value="Kab. Tojo Una-una">Kab. Tojo Una-una</option>
                            <option value="Kab. Sigi">Kab. Sigi</option>
                            <option value="Kota Palu">Kota Palu</option>
                            <option value="Kab. Kepulauan Selayar">Kab. Kepulauan Selayar</option>
                            <option value="Kab. Bulukumba">Kab. Bulukumba</option>
                            <option value="Kab. Bantaeng">Kab. Bantaeng</option>
                            <option value="Kab. Jeneponto">Kab. Jeneponto</option>
                            <option value="Kab. Takalar">Kab. Takalar</option>
                            <option value="Kab. Gowa">Kab. Gowa</option>
                            <option value="Kab. Sinjai">Kab. Sinjai</option>
                            <option value="Kab. Maros">Kab. Maros</option>
                            <option value="Kab. Pangkajene Dan Kepulauan">Kab. Pangkajene Dan Kepulauan</option>
                            <option value="Kab. Barru">Kab. Barru</option>
                            <option value="Kab. Bone">Kab. Bone</option>
                            <option value="Kab. Soppeng">Kab. Soppeng</option>
                            <option value="Kab. Wajo">Kab. Wajo</option>
                            <option value="Kab. Sidenreng Rappang">Kab. Sidenreng Rappang</option>
                            <option value="Kab. Pinrang">Kab. Pinrang</option>
                            <option value="Kab. Enrekang">Kab. Enrekang</option>
                            <option value="Kab. Luwu">Kab. Luwu</option>
                            <option value="Kab. Tana Toraja">Kab. Tana Toraja</option>
                            <option value="Kab. Luwu Utara">Kab. Luwu Utara</option>
                            <option value="Kab. Luwu Timur">Kab. Luwu Timur</option>
                            <option value="Kab. Toraja Utara">Kab. Toraja Utara</option>
                            <option value="Kota Makassar">Kota Makassar</option>
                            <option value="Kota Parepare">Kota Parepare</option>
                            <option value="Kota Palopo">Kota Palopo</option>
                            <option value="Kab. Buton">Kab. Buton</option>
                            <option value="Kab. Muna">Kab. Muna</option>
                            <option value="Kab. Konawe">Kab. Konawe</option>
                            <option value="Kab. Kolaka">Kab. Kolaka</option>
                            <option value="Kab. Konawe Selatan">Kab. Konawe Selatan</option>
                            <option value="Kab. Bombana">Kab. Bombana</option>
                            <option value="Kab. Wakatobi">Kab. Wakatobi</option>
                            <option value="Kab. Kolaka Utara">Kab. Kolaka Utara</option>
                            <option value="Kab. Buton Utara">Kab. Buton Utara</option>
                            <option value="Kab. Konawe Utara">Kab. Konawe Utara</option>
                            <option value="Kota Kendari">Kota Kendari</option>
                            <option value="Kota Baubau">Kota Baubau</option>
                            <option value="Kab. Boalemo">Kab. Boalemo</option>
                            <option value="Kab. Gorontalo">Kab. Gorontalo</option>
                            <option value="Kab. Pohuwato">Kab. Pohuwato</option>
                            <option value="Kab. Bone Bolango">Kab. Bone Bolango</option>
                            <option value="Kab. Gorontalo Utara">Kab. Gorontalo Utara</option>
                            <option value="Kota Gorontalo">Kota Gorontalo</option>
                            <option value="Kab. Majene">Kab. Majene</option>
                            <option value="Kab. Polewali Mandar">Kab. Polewali Mandar</option>
                            <option value="Kab. Mamasa">Kab. Mamasa</option>
                            <option value="Kab. Mamuju">Kab. Mamuju</option>
                            <option value="Kab. Mamuju Utara">Kab. Mamuju Utara</option>
                            <option value="Kab. Maluku Tenggara Barat">Kab. Maluku Tenggara Barat</option>
                            <option value="Kab. Maluku Tenggara">Kab. Maluku Tenggara</option>
                            <option value="Kab. Maluku Tengah">Kab. Maluku Tengah</option>
                            <option value="Kab. Buru">Kab. Buru</option>
                            <option value="Kab. Kepulauan Aru">Kab. Kepulauan Aru</option>
                            <option value="Kab. Seram Bagian Barat">Kab. Seram Bagian Barat</option>
                            <option value="Kab. Seram Bagian Timur">Kab. Seram Bagian Timur</option>
                            <option value="Kab. Maluku Barat Daya">Kab. Maluku Barat Daya</option>
                            <option value="Kab. Buru Selatan">Kab. Buru Selatan</option>
                            <option value="Kota Ambon">Kota Ambon</option>
                            <option value="Kota Tual">Kota Tual</option>
                            <option value="Kab. Halmahera Barat">Kab. Halmahera Barat</option>
                            <option value="Kab. Halmahera Tengah">Kab. Halmahera Tengah</option>
                            <option value="Kab. Kepulauan Sula">Kab. Kepulauan Sula</option>
                            <option value="Kab. Halmahera Selatan">Kab. Halmahera Selatan</option>
                            <option value="Kab. Halmahera Utara">Kab. Halmahera Utara</option>
                            <option value="Kab. Halmahera Timur">Kab. Halmahera Timur</option>
                            <option value="Kab. Pulau Morotai">Kab. Pulau Morotai</option>
                            <option value="Kota Ternate">Kota Ternate</option>
                            <option value="Kota Tidore Kepulauan">Kota Tidore Kepulauan</option>
                            <option value="Kab. Fakfak">Kab. Fakfak</option>
                            <option value="Kab. Kaimana">Kab. Kaimana</option>
                            <option value="Kab. Teluk Wondama">Kab. Teluk Wondama</option>
                            <option value="Kab. Teluk Bintuni">Kab. Teluk Bintuni</option>
                            <option value="Kab. Manokwari">Kab. Manokwari</option>
                            <option value="Kab. Sorong Selatan">Kab. Sorong Selatan</option>
                            <option value="Kab. Sorong">Kab. Sorong</option>
                            <option value="Kab. Raja Ampat">Kab. Raja Ampat</option>
                            <option value="Kab. Tambrauw">Kab. Tambrauw</option>
                            <option value="Kab. Maybrat">Kab. Maybrat</option>
                            <option value="Kota Sorong">Kota Sorong</option>
                            <option value="Kab. Merauke">Kab. Merauke</option>
                            <option value="Kab. Jayawijaya">Kab. Jayawijaya</option>
                            <option value="Kab. Jayapura">Kab. Jayapura</option>
                            <option value="Kab. Nabire">Kab. Nabire</option>
                            <option value="Kab. Kepulauan Yapen">Kab. Kepulauan Yapen</option>
                            <option value="Kab. Biak Numfor">Kab. Biak Numfor</option>
                            <option value="Kab. Paniai">Kab. Paniai</option>
                            <option value="Kab. Puncak Jaya">Kab. Puncak Jaya</option>
                            <option value="Kab. Mimika">Kab. Mimika</option>
                            <option value="Kab. Boven Digoel">Kab. Boven Digoel</option>
                            <option value="Kab. Mappi">Kab. Mappi</option>
                            <option value="Kab. Asmat">Kab. Asmat</option>
                            <option value="Kab. Yahukimo">Kab. Yahukimo</option>
                            <option value="Kab. Pegunungan Bintang">Kab. Pegunungan Bintang</option>
                            <option value="Kab. Tolikara">Kab. Tolikara</option>
                            <option value="Kab. Sarmi">Kab. Sarmi</option>
                            <option value="Kab. Keerom">Kab. Keerom</option>
                            <option value="Kab. Waropen">Kab. Waropen</option>
                            <option value="Kab. Supiori">Kab. Supiori</option>
                            <option value="Kab. Mamberamo Raya">Kab. Mamberamo Raya</option>
                            <option value="Kab. Nduga">Kab. Nduga</option>
                            <option value="Kab. Lanny Jaya">Kab. Lanny Jaya</option>
                            <option value="Kab. Mamberamo Tengah">Kab. Mamberamo Tengah</option>
                            <option value="Kab. Yalimo">Kab. Yalimo</option>
                            <option value="Kab. Puncak">Kab. Puncak</option>
                            <option value="Kab. Dogiyai">Kab. Dogiyai</option>
                            <option value="Kab. Intan Jaya">Kab. Intan Jaya</option>
                            <option value="Kab. Deiyai">Kab. Deiyai</option>
                            <option value="Kota Jayapura">Kota Jayapura</option>

                        </select>
                        @if ($errors->has('kabupaten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kabupaten') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Dengan mengikuti seminar ini saya bersedia didaftarkan pada Sehat-RI</label>
                    <div class="form-check col-8 pl-5">
                        <input class="form-check-input" type="checkbox" value="1" name="mobile_app" required="required">
                        <label class="form-check-label" for="defaultCheck1">
                            setuju
                        </label>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-form-label col-4">Kode Referral (masukkan kode referral yang valid)</label>
                    <div class="col-8">
                        <input type="text" class="form-control {{ $errors->first('referral') ? 'is-invalid' : '' }}"
                            name="referral" value="{{ old('referral') }}"
                            style="text-transform:uppercase"
                            placeholder="Kode Referral - Opsional" autofocus>
                        @if ($errors->has('referral'))
                        <div class="invalid-feedback">
                            {{ $errors->first('referral') }}
                        </div>
                        @endif
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label class="col-form-label col-4">Password</label>
                    <div class="col-8">
                        <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                            name="password" required="required" placeholder="Password...">
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4">Konfirmasi Password</label>
                    <div class="col-8">
                        <input type="password"
                            class="form-control {{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}"
                            name="password_confirmation" required="required" placeholder="Konfirmasi Password...">
                    </div>
                </div>
                <div class="form-group card">
                    <div class="col-12 card-body" style="background: #5cd3b4">
                        <p>
                            <label class="form-check-label text-white text-justify">
                                Dengan mengklik tombol <b class="text-uppercase" style="font-weight: bolder;"><i>Daftar
                                        baru</i></b>, saya menyatakan bahwa seluruh data yang saya isi adalah benar.
                                Saya setuju bahwa data yang saya berikan dapat disimpan
                                dan digunakan oleh PTPI. Saya juga bersedia memenuhi persyaratan-persyaratan dan
                                melaksanakan instruksi yang diberikan
                                bagi peserta seminar.
                            </label>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-8 offset-4">
                        <button type="submit" class="btn btn-primary btn-lg">Daftar Baru</button>
                    </div>
                </div>
            </form>
            <div class="text-center">Sudah memiliki akun? <a
                    href="{{ action('AuthController@getLoginParticipant') }}">Masuk disini</a></div>
        </div>

        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </body>

</html>
