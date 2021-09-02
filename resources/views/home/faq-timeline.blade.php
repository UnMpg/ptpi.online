@extends('layouts.home.app')
@section('title-page', 'Konsultasi Timeline')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <h3 class="text-left">Konsultasi Timeline</h3>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <form action="{{ action('HomeController@faqTimeLine') }}" method="get">
                            @csrf
                            <select name="category_id" class="custom-select custom-select-sm"
                                onchange="this.form.submit()">
                                <option value="">~~ All Categories ~~</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <ul class="timeline">
                    @foreach ($topics as $topic)
                    <li style="margin-left: 40px;">
                        <a href="#">{{ $topic->user->category->name }}</a>
                        <a href="#" class="float-right">{{ optional($topic->created_at)->format('d M, Y') }}</a>
                        <p>{{ $topic->content }}</p>
                        <p><b>Jawaban:</b> {{ $topic->answer_faq ? $topic->answer_faq : 'Belum ada jawaban' }}</p>
                    </li>
                    @endforeach
                    {{ $topics->appends(\Request::except('page'))->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
