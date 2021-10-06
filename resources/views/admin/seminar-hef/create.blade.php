@extends('layouts.dashboard.app')
@section('title-page', 'New Seminar HEF 2021')
@section('title-header', 'New Seminar HEF 2021')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('SeminarHefController@store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control {{ $errors->first('tgl') ? 'is-invalid' : '' }}" placeholder="Tanggal Kegiatan" name="tgl" required autocomplete="off">
                                @if ($errors->has('tgl'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipe Seminar</label>
                                <select name="tipe_seminar" class="form-control">
                                    <option value="">- Select one -</option>
                                    <option value="hari_pertama">Hari ke-1</option>
                                    <option value="hari_kedua">Hari ke-2</option>
                                    <option value="hari_ketiga">Hari ke-3</option>
                                </select>
                                @if ($errors->has('tipe_seminar'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tipe_seminar') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Sesi Seminar</label>
                                <input type="text" class="form-control" placeholder="Contoh: Sesi 1/Sambutan" name="sesi" required autocomplete="off">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Judul Seminar</label>
                                <input type="text" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" placeholder="Judul Sesi Seminar" name="judul" required autocomplete="off">
                                @if ($errors->has('judul'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('judul') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pembicara</label>
                                <input type="text" class="form-control {{ $errors->first('pembicara') ? 'is-invalid' : '' }}" placeholder="Pembicara" name="pembicara" required autocomplete="off">
                                @if ($errors->has('pembicara'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pembicara') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File Laporan <small><em>(File harus berekstensi .pdf dengan ukuran maksimal 10 MB)</em></small></label>
                                <input type="file" class="form-control file" name="file" required autocomplete="off">
                                <em><small style="color: red;" class="validate-file"></small></em>
                                @if ($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
                            </div>
                            <a href="" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-outline-primary">
                                Submit
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
@endsection
@section('script_custom')
<script>
    let max = 10 * 1024 * 1024;
    document.querySelector('.file').addEventListener('change', (e) => {
        let extensions = /(\.pdf)$/i;
        let fileName = document.querySelector('.file').value;
        let fileSize = e.target.files[0].size;

        if (!extensions.exec(fileName)) {
            alert('File yang diinputkan harus berekstensi .pdf');
            document.querySelector('.file').value = '';
            document.querySelector('button[type="submit"]').disabled = false;
            return false;
        } else {
            if (fileSize > max) {
                document.querySelector('.validate-file').innerText = "File yang anda upload harus kurang dari 10MB";
                document.querySelector('.file').value = "";
                document.querySelector('button[type="submit"]').disabled = true;
            } else {
                document.querySelector('.validate-file').innerText = "";
                document.querySelector('button[type="submit"]').disabled = false;
            }
        }

    })
</script>
@endsection