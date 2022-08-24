<!DOCTYPE html>
<html lang="en">
    @include('layouts.certified.header')
<body id="page-top">
    
    @include('layouts.certified.navBar')

    @yield('content')

    @include('layouts.certified.footer')

    @include('layouts.certified.body')

    @yield('script')

</body>
</html>