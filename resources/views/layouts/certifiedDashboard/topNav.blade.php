<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('assets/certified/img/lsp.jpeg') }}" alt=""> {{ auth('certified')->user()->nama }}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="{{ action('CertifiedMemberController@profilUser') }}"> Profile</a>
              {{-- <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a> --}}
              {{-- <a class="dropdown-item"  href="javascript:;">Help</a> --}}
              <a class="dropdown-item"  href="{{ action('CertifiedMemberController@logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>

          <li role="presentation" class="nav-item dropdown open">
            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o" style="font-size: 20px;"></i>
              <span class="badge bg-green jml_notive"></span>
            </a>
            <ul class="dropdown-menu list-unstyled msg_list" role="menu" id="list-notive" aria-labelledby="navbarDropdown1">
              
              {{-- @foreach ($notive as $item)
                <li class="nav-item">
                  <a class="dropdown-item">
                      <span class="image"><i class="fa fa-envelope-o"></i></span>
                      <span>
                          <span>{{ auth('certified')->user()->nama }}</span>
                          <span class="time">{{ $item->created_at->format('d F Y') }}</span>
                      </span>
                      <span class="message">
                          {{ $item->title }}
                      </span>
                  </a>
                </li>
              @endforeach --}}
              
              
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
<!-- /top navigation -->
