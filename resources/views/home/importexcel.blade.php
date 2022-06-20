@extends('layouts.home.app')
@section('title-page', 'Organism')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding" style="padding-bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    
                    <h2>Import</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file" required>

            <button type="submit" class="btn btn-primary">import</button>
            </form>
        </div>
    </div>
</div>
@endsection
