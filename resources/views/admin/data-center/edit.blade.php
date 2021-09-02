@extends('layouts.dashboard.app')
@section('title-page', 'Edit Data')
@section('title-header', 'Edit Data')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('DataCenterController@update', $dataCenter->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input inputFile"
                                        aria-describedby="inputGroupFileAddon01" name="filename" disabled>
                                    <label class="custom-file-label inputFileName"
                                        for="inputGroupFile01">{{ $dataCenter->filename }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description File</label>
                                <textarea name="description" cols="30" rows="5" class="form-control"
                                    placeholder="Description File...">{{ $dataCenter->description }}</textarea>
                            </div>
                            <a href="{{ action('DataCenterController@index') }}" class="btn btn-outline-secondary">
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
