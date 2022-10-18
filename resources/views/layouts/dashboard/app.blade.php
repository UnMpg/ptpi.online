<!DOCTYPE html>
<html>
    
    @include('layouts.dashboard.header')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @include('layouts.dashboard.navbar')

            @include('layouts.dashboard.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="m-3 pb-0" style="margin-bottom: 0 !important">
                    @include('layouts.shared.status')
                </div>
                @yield('content')
            </div>
            <!-- /.content-wrapper -->


            @include('layouts.dashboard.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        
        @include('layouts.dashboard.body')
        

        @yield('script')
        
    </body>

</html>
