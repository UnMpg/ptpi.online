@extends('layouts.home.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="side-content col-xl-12">
        <div class="col-md-12 ">
          <div class="row tb-side">
              <div class="td-head tb-width">Forum Intro</div>
              <div class="tb-width">IAHE Intro</div>
              <div class="tb-width">Organism</div>
              <div class="tb-width">Legal</div>
              <div class="tb-width">Vision & Mission</div>
              <div class="tb-width">Function & Target</div>
              <div class="tb-width">Hymne & Video</div>
              <div class="tb-width">Facts</div>
          </div>
          <div class="row tb-side-2">
            <div class="td-head-2 tb-width">About US</div>
            <div class="tb-width"> <a href="{{ action('HomeController@ptpiIntroduction') }}"> PTPI Intro</a></div>
            <div class="tb-width"> <a href="{{ action('HomeController@dasarHukum') }}"> Legal Standing</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@visiMisi') }}"> Vision & Mission</a></div>
            <div class="tb-width"> <a href="{{ action('HomeController@tujuanFungsi') }}"> Function & Target</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@historyandRoadmap') }}"> History & Roadmap</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@organism') }}"> Organisme</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@expert') }}"> Expert</a></div>
            <div class="tb-width"><a href="https://youtu.be/egYfc67eGbI"> Hymne & Corp Video</a></div>
            <div class="tb-width"><a href=""> Fact</a></div>
          </div>

          <div class="row tb-side">
            <div class="td-head tb-width">Activities</div>
            <div class="tb-width"><a href=""> Activities Intro</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@pastActivities') }}">Past Activities</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@upcomingActivities') }}">Upcoming Activities</a></div>
            <div class="tb-width"><a href="https://www.youtube.com/channel/UCtTYDMMLYGfI8Hq4yA9Y5_Q">Live Stream</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@berita') }}">News</a></div>
            <div class="tb-width"><a href="#">Event Schedule</a></div>
            <div class="tb-width"><a href="{{action('AuthController@eventRegistration')}}">Event Registration</a></div>
            <div class="tb-width"><a href="">Contact Us</a></div>
        </div>
        <div class="row tb-side-2">
          <div class="td-head-2 tb-width">Hospital</div>
          <div class="tb-width"><a href="{{ action('HomeController@hospitalMap') }}">Hospital Map & Profile</a></div>
          <div class="tb-width"><a href="{{ action('HomeController@hospitalNews') }}">Hospital Member News</a></div>
          <div class="tb-width"><a href="{{ action('HomeController@hospitalListCertified') }}">List Of Certified Hospital</a></div>
          <div class="tb-width"><a href="{{ action('HomeController@hospitalListSmarthospital') }}">List Of Smart Hospital</a></div>
          <div class="tb-width"><a href="{{ action('HomeController@hospitalContact') }}">Contact Hospital</a></div>
          <div class="tb-width"><a href="#">Registration For Hospital</a></div>
        </div>

        <div class="row tb-side">
          <div class="td-head tb-width">Industry</div>
          <div class="tb-width"><a href="{{ action('HomeController@industryMap') }}">Industry Map & Profile</a></div>
          <div class="tb-width"><a href="{{ action('HomeController@industryNews') }}">Industry Member News</a></div>
          <div class="tb-width"><a href="#">List of Member Industry</a></div>
          <div class="tb-width"><a href="">List of Corporate Ind Member</a></div>
          <div class="tb-width"><a href="">List of Registered Products</a></div>
          <div class="tb-width"><a href="">List of Promotion</a></div>
          <div class="tb-width"><a href="">List of Certified Industry Member</a></div>
          <div class="tb-width"><a href="">Contact Industry Member</a></div>          
          <div class="tb-width"><a href="{{ action('AuthController@getRegisterCorporate') }}">Registration as Industry Corp Member</a></div>
      </div>

      <div class="row tb-side-2">
        <div class="td-head-2 tb-width">Membership</div>
        <div class="tb-width"><a href="{{ action('HomeController@memberGuideline')}}">Guideline for Member</a></div>
        <div class="tb-width"><a href="#">List of Cretified Hospital Engineer</a></div>
        <div class="tb-width"><a href="{{ action('HomeController@engineerCertified') }}">Hospital Engineer Certification</a></div>
        <div class="tb-width"><a href="#">Hospital Engineer Training</a></div>
        <div class="tb-width"><a href="{{ action('HomeController@getSertifikat') }}">Download Certificate</a></div>
        <div class="tb-width"><a href="{{ action('AuthController@getRegisterPersonal') }}">Individual Member Registration</a></div>
        <div class="tb-width"><a href="#">Contact Hospital Engineer</a></div>
        <div class="tb-width"><a href="#">Cek member Certificate</a></div>
      </div>
      <div class="row tb-side">
            <div class="td-head tb-width">Find Us</div>
            <div class="tb-width"><a href="#">Reference</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@upcomingActivities') }}">Activities</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@hospitalMap') }}">Hospital</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@industryMap') }}">Industry</a></div>
            <div class="tb-width"><a href="#">Products</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@expert') }}">Expert</a></div>
            <div class="tb-width"><a href="#">Partner</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@memberGuideline')}}">Guideline</a></div>
            <div class="tb-width"><a href="{{ action('HomeController@getSertifikat') }}">Certificate</a></div>
        </div>
        <div class="row tb-side-2">
          <div class="td-head-2 tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
          <div class="tb-width">Forum</div>
        </div>
        <div class="row tb-side">
          <div class="td-head tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
          <div class="tb-width">Network</div>
      </div>
      <div class="row tb-side-2">
        <div class="td-head-2 tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
        <div class="tb-width">Smart Hospital</div>
      </div>
      <div class="row tb-side">
        <div class="td-head tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
        <div class="tb-width">Digital Platform</div>
    </div>
    <div class="row tb-side-2">
      <div class="td-head-2 tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
      <div class="tb-width">Reference</div>
    </div>
    <div class="row tb-side">
      <div class="td-head tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
      <div class="tb-width">Report</div>
  </div>
  <div class="row tb-side-2">
    <div class="td-head-2 tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
    <div class="tb-width">Contact US</div>
  </div>
  <div class="row tb-side">
    <div class="td-head tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
    <div class="tb-width">Sosial Media</div>
</div>
<div class="row tb-side-2">
  <div class="td-head-2 tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
  <div class="tb-width">Latest Update</div>
</div>
        </div>
      </div>
    </div>
</div>
<!-- END Header -->
<div class="clearfix"></div>
@endsection