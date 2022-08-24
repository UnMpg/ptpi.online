<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3></h3>
      <ul class="nav side-menu">
        <li class=""><a href="{{ action('CertifiedMemberController@home') }}"><i class="fa fa-home"></i> Home </a>
          
        </li>
        <li><a href="{{ action('CertifiedMemberController@insertDataProfile') }}"><i class="fa fa-edit"></i> Lengkapi Data </a>
          
        </li>
        <li><a href="{{ action('CertifiedMemberController@profilUser') }}"><i class="fa fa-user"></i> Profile </a>
          
        </li>
        <li><a href="{{ action('CertifiedMemberController@uploadUser') }}"><i class="fa fa-file"></i> Upload Document </a>
          
        </li>
        <li><a href="{{ action('CertifiedMemberController@downloadUser') }}"><i class="fa fa-download"></i> Download Document </a>
          
        </li>
        
        @if ( auth('certified')->user()->certified_status >= "3" && auth('certified')->user()->nilai > "2000")
        <li><a href="{{ action('CertifiedMemberController@uploadBukti') }}"><i class="fa fa-file"></i> Upload Bukti Pembayaran </a>
          
        </li>
        @endif

      </ul>
    </div>

  </div>