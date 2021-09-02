<!DOCTYPE html>
<html>
    @include('layouts.home.header')

    <body data-spy="scroll" data-target="#navbar-example">
        @include('layouts.home.navbar')
        @include('layouts.home.slide')
        @include('layouts.home.content')

        @include('layouts.home.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <div id="preloader"></div>

        @include('layouts.home.body')
    </body>

</html>
