<!DOCTYPE html>
<html>
    @include('layouts.home.header')

    <body data-spy="scroll" data-target="#navbar-example">

        @include('layouts.home.nav_n')

        @yield('content')

        @include('layouts.home.footer')

        @include('layouts.home.body')
        @yield('script')
    </body>

</html>
