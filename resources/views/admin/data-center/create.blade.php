@extends('layouts.dashboard.app')
@section('title-page', 'New File')
@section('title-header', 'New File')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 card-outline card-info">
                <div class="card-body pad">
                    <form role="form" action="{{ action('DataCenterController@store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>No Certificate</label>
                                <input type="text" class="form-control" name="filename" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="description" required>
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
