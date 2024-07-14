<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

        @include('partials.dns-prefech-and-preconnect')
        @include('partials.google-analytics')
        @include('partials.pwa')
        @include('partials.oneSignal')
        @include('partials.site.shareFacebook')
        @include('partials.site.structuredData')
        @include('partials.site.tagAmp')

        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('description', config('site.site_description'))">
        <link rel="canonical" href="{{ url()->current() }}" />

        <link rel="icon" href="{{ asset('images/site/favicon.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('images/site/favicon.png') }}" sizes="192x192" />
        <link rel="apple-touch-icon" href="{{ asset('images/site/favicon.png') }}" />
        <meta name="msapplication-TileImage" content="{{ asset('images/site/favicon.png') }}" />

        <link rel="stylesheet" href="{{ asset('css/site/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/responsive.css') }}">

        <style>
            @media only screen and (max-width: 450px) {

            }
        </style>

        @yield('styles')
    </head>

    <body>
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-header-social">
                            <li>
                                <a href="#" class="facebook" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="top-header-others">
                            <li>
                                <i class='bx bx-user'></i>
                                <a href="login.html">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('images/site/logo.png') }}"
                                     class="white-logo"
                                     alt="image"
                                     style="width: 200px;"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('images/site/logo.png') }}"
                                 class="white-logo"
                                 alt="image"
                                 style="width: 200px;"
                            />
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        Início
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Política
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Cidades
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Geral
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Artigos
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Vídeos
                                    </a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search for..">
                                        <button type="submit"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search for..">
                                        <button type="submit"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="copyright-area">
            <div class="container">
                <div class="copyright-area-content">
                    <p>
                        {{ date('Y') }}  | Todos os direitos reservados
                    </p>
                </div>
            </div>
        </div>

        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>

        <script src="{{ asset('js/site/jquery.min.js') }}"></script>
        <script src="{{ asset('js/site/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/site/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/site/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/site/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/site/wow.min.js') }}"></script>
        <script src="{{ asset('js/site/main.js') }}"></script>

        @yield('scripts')
    </body>
</html>
