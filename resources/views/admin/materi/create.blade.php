@extends('layouts.dashboard.app')
@section('title-page', 'New Seminar & WS')
@section('title-header', 'New Seminar & WS')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('MateriController@store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}"
                                    placeholder="Tanggal" name="date" required autocomplete="off">
                                @if ($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Judul </label>
                                <input type="text"
                                    class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                                    placeholder="Judul" name="title" required autocomplete="off">
                                @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pembicara</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('speaker') ? 'is-invalid' : '' }}"
                                    placeholder="Pembicara" name="speaker" required autocomplete="off">
                                @if ($errors->has('speaker'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('speaker') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pembicara</label>
                                <select name="certificate_id" class="form-control">
                                    <option value="">- Pilih Seminar -</option>
                                    @foreach (App\Certificate::all() as $item)
                                    <option value="{{ $item->id }}">{{
                                        $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('speaker'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('speaker') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File URL</label>
                                <input type="text"
                                    class="form-control {{ $errors->first('file_url') ? 'is-invalid' : '' }}"
                                    placeholder="File URL" name="file_url" autocomplete="off">
                                @if ($errors->has('file_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_url') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>File Laporan <small><em>(File harus berekstensi .pdf dengan ukuran maksimal 10
                                            MB)</em></small></label>
                                <input type="file" class="form-control file" name="file" autocomplete="off">
                                <em><small style="color: red;" class="validate-file"></small></em>
                                @if ($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
                            </div>
                            <a href="{{ action('MateriController@index') }}" class="btn btn-outline-secondary">
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
