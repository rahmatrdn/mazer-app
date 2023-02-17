<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MazerApp</title>

    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/main/app.css" />
    <link rel="shortcut icon" href="{{ asset('assets/mazer') }}/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/mazer') }}/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/shared/iconly.css" />
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <nav class="navbar navbar-expand-lg bg-body-tertiary bg-white fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <b>MazerApp</b>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                                <li class="nav-item me-0 me-md-2">
                                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                                </li>
                                <li class="nav-item me-0 me-md-2">
                                    <a class="nav-link" href="#">Kategori</a>
                                </li>
                                <li class="nav-item me-0 me-md-2">
                                    <a class="nav-link" href="#">Tentang Kami</a>
                                </li>
                            </ul>

                            @if (Auth::check())
                                {{-- INFO AKUN --}}
                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown"
                                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="avatar avatar-md2">
                                            <img src="{{ asset('assets/mazer') }}/images/user.png" alt="Avatar" />
                                        </div>
                                        <div class="text">
                                            <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                            <p class="user-dropdown-status text-sm text-muted">
                                                Member
                                            </p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                        aria-labelledby="topbarUserDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('auth/logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div>
                                    <a href="{{ url('/login') }}" class="btn btn-primary me-1">Login</a>
                                    <a href="{{ url('/register') }}" class="btn btn-outline-primary">Daftar Akun</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </nav>
            </header>

            <div class="my-5"></div>

            @yield('content')

            <footer>
                <div class="container mt-5">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>
                                App by <a href="https://rahmatrdn.github.io">Rahmat Ramadhan</a> |

                                Template by <a href="https://saugi.me">Saugi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/mazer') }}/js/bootstrap.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/app.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/pages/horizontal-layout.js"></script>

    <script src="{{ asset('assets/mazer') }}/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/pages/dashboard.js"></script>
</body>

</html>
