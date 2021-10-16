@extends('layouts.dashboard.app')
@section('title-page', 'Members Chart')
@section('title-header', 'Members Chart')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-user-tag"></i>
                            Members
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-4">
                    <div id="piechart" style="width: 1000px; height: 500px; text-align:center;"></div>
                </div>
            </div>

        </div>
        <hr>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script_custom')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Member Type', 'Member Count'],
            ['Perorangan', `{{$perorangan_count}}`],
            ['Korporasi', `{{$korporasi_count}}`]
        ]);

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data);
    }
</script>
@endsection