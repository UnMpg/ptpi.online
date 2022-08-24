<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ action('DashboardController@index') }}" class="brand-link">
        <img src="{{ asset('assets/dashboard/img/logo-ptpi.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PTPI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth('certified')->user() != Null)
                    <img src="{{ asset('assets/certified/upload/'.auth('certified')->user()->nama.'/'.auth('certified')->user()->foto) }}" class="img-circle elevation-2" alt="Admin">
                @else
                    <img src="{{ asset('assets/dashboard/img/default.jpg') }}" class="img-circle elevation-2" alt="Admin">
                @endif
                
            </div>
            <div class="info">
                <a href="#" class="d-block mb-0">
                    {{ optional(auth('admin')->user())->nama }}
                    {{ optional(auth('web')->user())->name }}
                    {{ optional(auth('certified')->user())->nama }}
                </a>
                <a href="{{ action('AuthController@logout') }}"><small class="text-info">Logout</small></a> |
                {{-- <a href="{{ action('AdminController@editProfile') }}"><small class="text-info">Edit</small></a> --}}
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (optional(auth('admin')->user())->email == "admin@mail.com")
                <li class="nav-item">
                    <a href="{{ action('DashboardController@index') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        &nbsp;
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Seminar Participants
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('CertificateDraftController@index') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                &nbsp;
                                <p>Old Participants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('ParticipantController@index') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                &nbsp;
                                <p>New Participants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('CertificateController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-tags"></i>
                                &nbsp;
                                <p>Seminar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('SignController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-tags"></i>
                                &nbsp;
                                <p>Sign</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Members
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('MemberController@indexPersonal') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-user"></i>
                                &nbsp;
                                <p>Perorangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('MemberController@indexCorporate') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-users"></i>
                                &nbsp;
                                <p>Korporasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-paper-plane"></i>
                        &nbsp;
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('ArticleController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('NewsController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="far fa-newspaper"></i>
                                &nbsp;
                                <p>News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('ActivityController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="far fa-newspaper"></i>
                                &nbsp;
                                <p>Activities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('TagController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-tags"></i>
                                &nbsp;
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fab fa-rocketchat"></i>
                        &nbsp;
                        <p>
                            Forum
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('UserController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-users"></i>
                                &nbsp;&nbsp;
                                <p>Ahli Teknik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('CategoryController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-user-tag"></i>
                                &nbsp;&nbsp;
                                <p>Bidang Teknik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('TopicController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fab fa-replyd"></i>
                                &nbsp;&nbsp;
                                <p>FAQs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database"></i>
                        &nbsp;
                        <p>
                            Data Center
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('DataCenterController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Sertifikat Workshop</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('DataCenterController@indexSurat') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Surat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file"></i>
                        &nbsp;
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('LaporanController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-hand-holding-usd"></i>
                                &nbsp;&nbsp;
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('LaporanKegiatanController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Laporan Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('SeminarHefController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-chalkboard-teacher"></i>
                                &nbsp;&nbsp;
                                <p>Materi HEF</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('MateriController@index') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-chalkboard-teacher"></i>
                                &nbsp;&nbsp;
                                <p>Materi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ action('LaporanController@index') }}" class="nav-link">
                        <i class="fas fa-hand-holding-usd"></i>
                        &nbsp;
                        <p>
                            Laporan
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ action('QuestionAnswerController@index') }}" class="nav-link">
                        <i class="fas fa-comments"></i>
                        &nbsp;
                        <p>
                            Tanya Jawab
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database"></i>
                        &nbsp;
                        <p>
                            Certified
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('CertifiedMemberController@certifiedView') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Data Member Certified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('CertifiedUjianController@inputSoal') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Input Soal Ujian</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ action('DataCenterController@indexSurat') }}" class="nav-link">
                                &nbsp;&nbsp;
                                <i class="fas fa-file-alt"></i>
                                &nbsp;&nbsp;
                                <p>Surat</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                @endif
                @auth('admin')
                <li class="nav-item">
                    <a href="{{ action('UserController@kontribusiSehatRI') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        &nbsp;
                        <p>
                            Kontributor
                        </p>
                    </a>
                </li>
                @endauth
                @auth('web')
                <li class="nav-item">
                    <a href="{{ action('MemberController@listFaq') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        &nbsp;
                        <p>
                            Pertanyaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ action('DataCenterController@indexSurat') }}" class="nav-link">
                        <i class="fas fa-file-alt"></i>
                        &nbsp;
                        <p>Surat</p>
                    </a>
                </li>
                @endauth
                @auth('certified')

                    <li class="nav-item">
                        <a href="{{ action('CertifiedMemberController@home') }}" class="nav-link">
                            <i class="fas fa-home"></i>
                            &nbsp;
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ action('CertifiedMemberController@insertData') }}" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            &nbsp;
                            <p>Lengkapi Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ action('CertifiedMemberController@fileUpload') }}" class="nav-link">
                            <i class="fas fa-file-alt"></i>
                            &nbsp;
                            <p>Upload Document</p>
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
