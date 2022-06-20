<!DOCTYPE html>
<html>
    @include('layouts.home.header')

    <body data-spy="scroll" data-target="#navbar-example">
        @include('layouts.home.nav_n')
        {{-- <div class="home">
            <div class="home-back">
                
        
                <div class="home-title text-center">
                    <h2>HOSPITAL ENGINEERING FORUM 2022</h2> 
                    <h5> Webinar Series <span style="font-size: 40px;">.</span> Visual Exhibitoin <span style="font-size: 40px;">.</span> Product Simulation</h5>
                </div>
            </div>
            
        </div> --}}
        
        @include('layouts.home.slide_n')
        @include('layouts.home.content_n')

        @include('layouts.home.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <div id="preloader"></div>

        @include('layouts.home.body')
    </body>

</html>
