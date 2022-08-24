<!DOCTYPE html>
<html lang="en">
    @include('layouts.certified.header')
<body>
    @include('layouts.certified.navBarPage')
    @yield('content')
    
    @include('layouts.certified.footer')

    @include('layouts.certified.body')
    @yield('script')
</body>
</html>