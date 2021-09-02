@extends('layouts.home.app')
@section('title-page', 'Tanya Jawab')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <h3 class="text-left">Tanya Jawab</h3>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                       <!--Letakkan fungsi Filter disini!-->
                    </div>
                </div>
                <ul class="timeline">
                    @foreach ($questions->where('parent_id', null) as $question)
                    <li style="margin-left: 40px;">
                        <a href="#">{{ $question->name }}</a>
                        <a href="#" class="float-right">{{ $question->date }}</a>
                        <p>
                            <h6>{{ $question->question }}</h6>
                        </p>
                        @foreach ($questions->where('parent_id', $question->id) as $answer)
                        <p>
                            <b>Jawaban</b>
                            <a href="#">{{ $question->name ? "($answer->name)" : null }}</a>
                            : {{ $answer->answer ? $answer->answer : 'Belum ada jawaban' }}
                        </p>
                        @endforeach
                    </li>
                    @endforeach
                    {{ $questions->appends(\Request::except('page'))->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

