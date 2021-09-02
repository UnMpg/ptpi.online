@extends('layouts.home.app')
@section('title-page', 'PTPI - FAQs')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <!-- single-well start-->
            <div class="col-3"></div>
            <div class="col-6">
                <br><br>
                <h2 class="text-center">Warung Konsultasi</h2>
                <br>
                @include('layouts.shared.status')
                <br>
                <div class="form contact-form">
                    <form action="{{ action('HomeController@draftEmail') }}" method="post" role="form"
                        class="contactForm">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required />
                        </div>
                        <div class="form-group">
                            <select class="form-control select2bs4" style="width: 100%;" name="user_id" required>
                                <option value="">Choose a Category</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->category->name }} -
                                    {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="5" required
                                placeholder="Question"></textarea>
                        </div>
                        <div class="text-center"><button class="ready-btn mt-0" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- single-well end-->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
