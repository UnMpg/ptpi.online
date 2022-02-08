@extends('layouts.home.app')
@section('title-page', 'Fungsi')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br><br>
                    <h2>{{ trans('lang.FUNCTION') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div style="display: block; margin: 0 auto; margin-bottom: 40px;">
                <img src="{{ asset('assets/home/img/fungsi_baru.png') }}" alt="" width="700px">
            </div>
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>{{ trans('lang.GROUP') }}</th>
                        <th>{{ trans('lang.ACTIVITY') }}</th>
                        <th>{{ trans('lang.FIELD') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ trans('lang.FORMULATION') }}</td>
                        <td>{{ trans('lang.POLICY_AND_TECHNOLOGY_RECOMMENDATIONS') }}</td>
                        <td>{{ trans('lang.HOSPITAL_ENGINEERING') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('lang.TRAINING') }}</td>
                        <td>
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>{{ trans('lang.SEMINAR') }}</li>
                                <li>{{ trans('lang.WORKSHOP') }}</li>
                                <li>{{ trans('lang.CONFERENCE') }}</li>
                            </ul>
                        </td>
                        <td>{{ trans('lang.MEDICAL_EQUIPMENT') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('lang.CERTIFICATION') }}</td>
                        <td>
                            {{ trans('lang.IMPLEMENTATION_OF_CERTIFICATION') }}
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>{{ trans('lang.HR') }}</li>
                                <li>{{ trans('lang.SYSTEMS_AND_PRODUCTS') }}</li>
                                <li>{{ trans('lang.CORPORATION') }}</li>
                            </ul>
                        </td>
                        <td>{{ trans('lang.HEALTHY_INFORMATION') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('lang.EVALUATION') }}</td>
                        <td>{{ trans('lang.MEASUREMENT_AND_ASSESSMENT') }}:
                            <ul style="list-style-type:disc; margin-left: 20px;">
                                <li>{{ trans('lang.HR') }}</li>
                                <li>{{ trans('lang.SYSTEMS_AND_PRODUCTS') }}</li>
                                <li>{{ trans('lang.CORPORATION') }}</li>
                            </ul>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ trans('lang.INNOVATION') }}</td>
                        <td>{{ trans('lang.RESEARCH_AND_DEVELOPMENT') }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ trans('lang.CONSULTATION') }}</td>
                        <td>{{ trans('lang.HOSPITAL_ASSISTANCE') }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- single-well end-->
            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/home/img/fungsi_tabel.jpeg') }}" alt="" width="700px" style="display: block; margin: 0 auto;" class="mb-4">
            </div> -->
            <!-- End col-->
        </div>
    </div>
</div>
@endsection
