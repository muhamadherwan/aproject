<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('root') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset ('/assets/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('root') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset ('/assets/images/logo-light.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset ('/assets/images/logo-light.png') }}" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="@lang('translation.Search')"
                                       aria-label="Search input">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                s
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-4.jpg') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="contacts-profile"><i
                            class="bx bx-user font-size-16 align-middle me-1"></i> <span
                            key="t-profile">@lang('translation.Profile')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span
                            key="t-my-wallet">@lang('translation.My_Wallet')</span></a>
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
                       data-bs-target=".change-password"><span class="badge bg-success float-end">11</span><i
                            class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                            key="t-settings">@lang('translation.Settings')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                        <span key="t-lock-screen">@lang('translation.Lock_screen')</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                            >
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">@lang('translation.Dashboards')</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="index" class="dropdown-item" key="t-default">@lang('translation.Default')</a>
                            <a href="dashboard-saas" class="dropdown-item" key="t-saas">@lang('translation.Saas')</a>
                            <a href="dashboard-crypto" class="dropdown-item" key="t-crypto">@lang('translation.Crypto')</a>
                            <a href="dashboard-blog" class="dropdown-item" key="t-blog">@lang('translation.Blog')</a>
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Pendaftaran</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="#" class="dropdown-item" key="t-chat">Kolej</a>
                            <a href="#" class="dropdown-item" key="t-chat">Bidang</a>
                            <a href="#" class="dropdown-item" key="t-chat">Program</a>
                            <a href="#" class="dropdown-item" key="t-chat">Kursus</a>
                            <a href="#" class="dropdown-item" key="t-chat">Matapelajaran Akademik</a>
                            <a href="#" class="dropdown-item" key="t-chat">Matapelajaran Vokasional</a>
                            <a href="#" class="dropdown-item" key="t-chat">Kelas</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pelajar</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pensyarah</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Akademik</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="{{ route('continuous.index') }}" class="dropdown-item" key="t-chat">Penilaian
                                Berterusan Akademik (PBA)</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penilaian Akhir Akademik (PAA)</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pembetulan Markah PBA</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pembetulan Markah PAA</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Vokasional</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="#" class="dropdown-item" key="t-chat">Penilaian Berterusan Vokasional (PBV)</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penilaian Akhir Vokasional (PAV)</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pembetulan Markah PBV</a>
                            <a href="#" class="dropdown-item" key="t-chat">Pembetulan Markah PAV</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Penjanaan Gred</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="{{ route('grade.academics.create') }}" class="dropdown-item" key="t-chat">Akademik</a>
                            <a href="{{ route('vocationals.index') }}" class="dropdown-item" key="t-chat">
                                Vokasional</a>
                            <a href="#" class="dropdown-item" key="t-chat">Bahasa Melayu</a>
                            <a href="#" class="dropdown-item" key="t-chat">Sejarah</a>
                            <a href="#" class="dropdown-item" key="t-chat">Bahasa Melayu Ulang</a>
                            <a href="#" class="dropdown-item" key="t-chat">Sejarah Ulang</a>
                            <a href="#" class="dropdown-item" key="t-chat">PNGS</a>
                            <a href="#" class="dropdown-item" key="t-chat">Layak SVM</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Inden</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="#" class="dropdown-item" key="t-chat">Kursus</a>
                            <a href="#" class="dropdown-item" key="t-chat">Akademik</a>
                            <a href="#" class="dropdown-item" key="t-chat">Vokasional</a>
                            <a href="#" class="dropdown-item" key="t-chat">Kohort</a>
                            <a href="#" class="dropdown-item" key="t-chat">BM1104</a>
                            <a href="#" class="dropdown-item" key="t-chat">Akademik Mengikut Negeri</a>
                            <a href="#" class="dropdown-item" key="t-chat">Vokasional Mengikut Negeri</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Sijil</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="#" class="dropdown-item" key="t-chat">Sijil Vokasional Malaysia</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penyata BM</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penyata SJ</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">SVM Ulangan</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="#" class="dropdown-item" key="t-chat">Pendaftaran Calon Ulang</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-customize me-2"></i><span key="t-apps">Pentadbiran</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="{{ route('users.index') }}" class="dropdown-item" key="t-chat">Pengguna</a>
                            <a href="#" class="dropdown-item" key="t-chat">Konfigurasi Umum</a>
                            <a href="#" class="dropdown-item" key="t-chat">Takwim</a>
                            <a href="#" class="dropdown-item" key="t-chat">Wajaran</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penetapan Gred BM</a>
                            <a href="#" class="dropdown-item" key="t-chat">Penetapan Gred SJ</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>

<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               name="current_password" autocomplete="current_password"
                               placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                                data-id="{{ Auth::user()->id }}"
                                type="submit">Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
