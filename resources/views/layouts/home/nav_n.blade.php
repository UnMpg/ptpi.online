

<div class="head-header mb-2">
    <div class="row ">
        <div class="container d-flex justify-content-center" >
            <div class="head-header-img">
                <img src="{{ asset('assets/home/img/logo-ptpi.png') }}" alt="">
            </div>
            <div class="head-header-cont">
                <marquee class="runing-text" >RUNING TEXT WILL BE HERE....</marquee>
                <h4 class="text-title">PLAN YOUR HOSPITAL WITH THE LAST TECHNOLOGIES!</h4>
            </div>
            <div class="head-header-log">
                <div class="reg-log align-items-center">
                    <a href="{{action('AuthController@getRegister')}}" class="register">REGISTER?</a>
                    <button type="button" class="btn btn-outline-primary ml-3"><a href="{{ action('AuthController@getLogin') }}" class="login-n">LOGIN</a></button>
                </div>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-section " id="navbar-section">
    <div class="container">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler navbar-hiden" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ><i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
    </button>
  
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active nav-item-name">
            <a class="navbar-brand nav-item-font" href="{{ action('HomeController@index') }}" id="navbarAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                HOME
            </a>
            
        </li>
        <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ABOUT US
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarAbout">
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@ptpiIntroduction') }}">PTPI Introduction</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@dasarHukum') }}">Legal Standing</a>                        
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@visiMisi') }}">Vision and Mission</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@tujuanFungsi') }}">Function and Target</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@historyandRoadmap') }}">History and Roadmap</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@organism') }}">Organisme</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@expert') }}">Expert</a>
                        <a class="dropdown-item dp-item" href="https://youtu.be/egYfc67eGbI">Hymne and Corp Video</a>
                        <a class="dropdown-item dp-item" href="#">Facts</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarActivities" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ACTIVITIES
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarActivities">
                        <a class="dropdown-item dp-item" href="#">Activities Intro</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@pastActivities') }}">Past Activities</a>                        
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@upcomingActivities') }}">Upcoming Activities</a>
                        <a class="dropdown-item dp-item" href="https://www.youtube.com/channel/UCtTYDMMLYGfI8Hq4yA9Y5_Q">Live Streaming</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@berita') }}">News</a>
                        <a class="dropdown-item dp-item" href="#">Event Schedule</a>
                        <a class="dropdown-item dp-item" href="{{action('AuthController@eventRegistration')}}">Event Registration</a>
                        <a class="dropdown-item dp-item" href="/#contact">Contact Us</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarHospital" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        HOSPITAL
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarHospital">
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalMap') }}">Hospital Map & Profile</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalNews') }}">Hospital Member News</a>                        
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalListCertified') }}">List of Cetified Hospital</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalListSmarthospital') }}">List of Smart Hospital</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalContact') }}">Contact Hospital Member</a>
                        <a class="dropdown-item dp-item" href="#">Registration for Hospital</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarHospital" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INDUSTRY
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarHospital">
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@industryMap') }}">Industry, Field Map & Profile</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@industryNews') }}">Industry Member News</a>                        
                        <a class="dropdown-item dp-item" href="#">List of Corporate Ind Member</a>
                        <a class="dropdown-item dp-item" href="#">List of Registered Products</a>
                        <a class="dropdown-item dp-item" href="#">List of Promotion</a>
                        <a class="dropdown-item dp-item" href="#">List of Certified Industry Member</a>
                        <a class="dropdown-item dp-item" href="#">Contact Industry Member</a>
                        <a class="dropdown-item dp-item" href="{{ action('AuthController@getRegisterCorporate') }}">Registration as Industry Corp Member</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarMembership" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MEMBERSHIP
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarMembership">
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@memberGuideline')}}">Guideline for Member</a>                       
                        <a class="dropdown-item dp-item" href="#">List of Cretified Hospital Engineer</a>
                        <a class="dropdown-item dp-item" href="{{ action('CertifiedMemberController@index') }}">Hospital Engineer Certification</a>
                        <a class="dropdown-item dp-item" href="#">Hospital Engineer Training</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@getSertifikat') }}">Download Certificate</a>
                        <a class="dropdown-item dp-item" href="{{ action('AuthController@getRegisterPersonal') }}">Individual Member Registration</a>
                        <a class="dropdown-item dp-item" href="#">Contact Hospital Engineer</a>
                        <a class="dropdown-item dp-item" href="#">Cek member Certificate</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-name">
                    <a class="navbar-brand nav-item-font" href="#" id="navbarMembership" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        FIND US
                      </a>
                    <div class="dropdown-menu dp-menu" aria-labelledby="navbarMembership">
                        <a class="dropdown-item dp-item" href="#">Reference</a>                       
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@upcomingActivities') }}">Activities</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@hospitalMap') }}">Hospital</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@industryMap') }}">Industry</a>
                        <a class="dropdown-item dp-item" href="#">Products</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@expert') }}">Expert</a>
                        <a class="dropdown-item dp-item" href="#">Partner</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@memberGuideline')}}">Guideline</a>
                        <a class="dropdown-item dp-item" href="#">Report</a>
                        <a class="dropdown-item dp-item" href="#">Answer</a>
                        <a class="dropdown-item dp-item" href="{{ action('HomeController@getSertifikat') }}">Certificate</a>
                    </div>
                </li>
      </ul>
      
    </div>
</div>
  </nav>

{{-- <div class="sidebar" id="sidebar">
    <div class="toggle" onclick="toggle_div()" id="toggle"></div>
    <ul>
        <li><a href="">SITE MAP</a></li>
        <li><a href="">FORUM</a></li>
        <li><a href="">NETWORK</a></li>
        <li><a href="">SMART HOSPITAL</a></li>
        <li><a href="">DIGITAL PLATFORM</a></li>
        <li><a href="">REFERENCE</a></li>
        <li><a href="">REPORT</a></li>
    </ul>
    
</div> --}}

<div class="bottom-bar" id="bottom-bar">
    <div class="bottom-toggle" onclick="bottom_toggle()" id="toggle"></div>
    <ul>
        <li><a class="www" href="{{ action('HomeController@sideMap') }}">SITE MAP</a></li>
        <li><a class="www" href="{{ action('HomeController@forum') }}">FORUM</a></li>
        <li><a  class="www" href="">NETWORK</a></li>
        <li><a class="www" href="">SMART HOSPITAL</a></li>
        <li><a class="www"href="">DIGITAL PLATFORM</a></li>
        <li><a class="www" href="">REFERENCE</a></li>
        <li><a class="www" href="">REPORT</a></li>
    </ul>
    
</div>

{{-- <script>
    function toggle_div(){
        
        var tes = document.getElementByID('sidebar');
        tes.classList.add("active");
    }
</script> --}}
