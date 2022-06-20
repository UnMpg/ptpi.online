@extends('layouts.home.app')
@section('content')

<div class="past-event">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 event-title">
                <div class="event-title">
                    <h2 class="h2-title">Past Activities</h2>            
                <button class="btn btn-sm btn-danger mr-2">This Mount</button>
                <button class="btn btn-sm btn-primary mr-2">Februari 2022</button>            
                <button class="btn btn-sm btn-primary">Januari 2022</button>
                </div>

                <div class="event-content">
                    <div class="container">
                        @if($news->isNotEmpty())
                            <div class="row ">
                                @foreach ($news as $new)
                                <div class="col-md-3">
                                    <img src="https://www.eventhunterindonesia.com/wp-content/uploads/2018/09/Medical-weed-business-seminar1-1024x493.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div>
                                    <h5 >{{ $new->judul }}</h5>
                                    <p>{!! str_limit($new->konten, 600) !!}</p>
                                    <br/>
                                    </div>
                                    <div class="" style="margin-bottom: 20px">
                                    <button class="btn btn-primary mr-4">Read More</button>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>{{ $new->created_at->format('d F Y') }}
                                    </span>                                    
                                    </div>
                                </div>
                                <span class="garis mb-4"></span>
                                @endforeach
                            </div>

                        @else
                        <div class="text-center">
                            <h2>No news found</h2>
                        </div>
                        @endif
                    </div>
                </div>
                
        
            </div>

            <div class="col-lg-3 pt-4">
                <div class="card" >
                    <img src="https://www.eventhunterindonesia.com/wp-content/uploads/2018/09/Medical-weed-business-seminar1-1024x493.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Ongoing Event</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Show More</a>
                      
                    </div>
                  </div>
            </div>
        
        
        </div>

    
    </div>    
</div>


<!-- END Header -->

<!-- End Blog Area -->

<div class="clearfix"></div>
@endsection