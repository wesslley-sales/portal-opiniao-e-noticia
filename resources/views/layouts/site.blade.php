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

        <link rel="stylesheet" href="{{ asset('css/site/bootstrap.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/animate.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/meanmenu.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/boxicons.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/owl.carousel.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/owl.theme.default.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/magnific-popup.min.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/style.css') }}?v={{ date('dmY') }}">
        <link rel="stylesheet" href="{{ asset('css/site/responsive.css') }}?v={{ date('dmY') }}">

        <style>
            .article-footer .article-share .social li a {
                color: #09abe7;
            }

            .trending-post-widget .tr-post-item .tr-post-title {
                font-size: 18px;
                margin: 5px 0 10px;
            }

            @media only screen and (max-width: 450px) {

            }

            .ticker-wrapper-h{
                display: flex;
                position: relative;
                overflow: hidden;
                border: 1px solid #09abe7;
                margin-top: 20px;
            }

            .ticker-wrapper-h .heading{
                background-color: #09abe7;
                color: #fff;
                padding: 5px 10px;
                flex: 0 0 auto;
                z-index: 1000;
            }
            .ticker-wrapper-h .heading:after{
                content: "";
                position: absolute;
                top: 0;
                border-left: 20px solid #09abe7;
                border-top: 17px solid transparent;
                border-bottom: 15px solid transparent;
            }

            .news-ticker-h {
                display: flex;
                margin:0;
                padding: 0;
                padding-left: 90%;
                z-index: 999;

                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-name: tic-h;
                animation-duration: 90s;

            }
            .news-ticker-h:hover {
                animation-play-state: paused;
            }

            .news-ticker-h li{
                display: flex;
                width: 100%;
                align-items: center;
                white-space: nowrap;
                padding-left: 20px;
            }

            .news-ticker-h li a{
                color: #212529;
                font-weight: bold;
            }

            @keyframes tic-h {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }
                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
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
                                <a href="{{ $settings['site.link_facebook'] ?? "" }}" title="Facebook {{ config('app.name') }}" class="facebook" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['site.link_instagram'] ?? "" }}" title="Instagram {{ config('app.name') }}" class="pinterest" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['site.link_whatsapp'] ?? "" }}" title="WhatsApp {{ config('app.name') }}" class="pinterest" target="_blank">
                                    <i class='bx bxl-whatsapp'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['site.link_twitter'] ?? "" }}" title="Twitter {{ config('app.name') }}" class="twitter" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['site.link_youtube'] ?? "" }}" title="YouTube {{ config('app.name') }}" class="linkedin" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="top-header-others">
                            <li>
                                <i class='bx bx-calendar text-white'></i>
                                <span class="text-white">{{ now()->isoFormat('D [de] MMMM [de] YYYY') }}</span>
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
                            <a href="{{ route('site.home.index') }}" title="Página inicial">
                                <img src="{{ asset('images/site/logo.png') }}"
                                     class="white-logo"
                                     alt="{{ config('app.name') }}"
                                     loading="lazy"
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
                        <a class="navbar-brand" href="{{ route('site.home.index') }}" title="Página inicial">
                            <img src="{{ asset('images/site/logo.png') }}"
                                 class="white-logo"
                                 alt="image"
                                 style="width: 200px;"
                            />
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('site.home.index') }}" title="Página inicial {{ config('app.name') }}" class="nav-link active">
                                        Início
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('site.posts.category', ['categoryPost' => 'politica']) }}" title="Notícias Política" class="nav-link">
                                        Política
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('site.posts.category', ['categoryPost' => 'cidades']) }}" title="Notícias Cidades" class="nav-link">
                                        Cidades
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('site.posts.category', ['categoryPost' => 'geral']) }}" title="Notícias Geral" class="nav-link">
                                        Geral
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('site.posts.category', ['categoryPost' => 'artigos']) }}" title="Artigos" class="nav-link">
                                        Artigos
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('site.videos.index') }}" title="Vídeos" class="nav-link">
                                        Vídeos
                                    </a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <form class="search-box" action="{{ route('site.posts.search') }}">
                                        <input type="text" name="term" class="form-control" placeholder="faça uma busca" required />
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
                                    <form class="search-box" action="{{ route('site.posts.search') }}">
                                        <input type="text" name="term" class="form-control" placeholder="faça uma busca" required />
                                        <button type="submit"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="ticker-wrapper-h">
                <div class="heading fw-bold">
                    ÚLTIMAS NOTÍCIAS
                </div>

                <ul class="news-ticker-h">
                    @foreach($lastPosts ?? [] as $post)
                        <li>
                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                {{ $post->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        @isset($banners['Full banner 1'])
            <div class="container mt-4">
                <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                    <div class="carousel-inner">
                        @foreach($banners['Full banner 1'] as $banner)
                            <div @class(['carousel-item', 'active' => $loop->first])>
                                @if($banner->isFormatCode)
                                    <div class="d-block ad text-center mt-3">
                                        {!! $banner->code !!}
                                    </div>
                                @else
                                    <a href="{{ $banner->link }}" title="{{ $banner->name }}" target="_blank" class="d-block ad text-center pt-30 pb-30">
                                        <img src="{{ $banner->image->getUrl() }}"
                                             alt="{{ $banner->name }}"
                                             loading="lazy"
                                        />
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endisset

        @yield('content')

        <section class="footer-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-footer-widget">
                            <a href="{{ route('site.home.index') }}" title="Página inicial {{ config('app.name') }}">
                                <img src="{{ asset('images/site/logo.png') }}"
                                     alt="{{ config('app.name') }}"
                                     loading="lazy"
                                     class="rounded"
                                     style="max-width: 120px;"
                                />
                            </a>
                            <p><strong>Opinião e Notícia</strong> trabalha com informações checadas, livres de fakes.</p>
                            <p>Os artigos publicados são de inteira responsabilidade de seus autores. As opiniões neles emitidas não exprimem, necessariamente, o ponto de vista do <strong>Opinião e Notícia - ON</strong>.</p>
                            <ul class="social">
                                <li>
                                    <a href="{{ $settings['site.link_facebook'] ?? "" }}" title="Facebook {{ config('app.name') }}" class="facebook" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings['site.link_instagram'] ?? "" }}" title="Instagram {{ config('app.name') }}" class="pinterest" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings['site.link_whatsapp'] ?? "" }}" title="WhatsApp {{ config('app.name') }}" class="pinterest" target="_blank">
                                        <i class='bx bxl-whatsapp'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings['site.link_twitter'] ?? "" }}" title="Twitter {{ config('app.name') }}" class="twitter" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings['site.link_youtube'] ?? "" }}" title="YouTube {{ config('app.name') }}" class="linkedin" target="_blank">
                                        <i class='bx bxl-youtube'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Inscreva-se</h2>
                            <div class="widget-subscribe-content">
                                <p>Inscreva-se na nossa lista de emails para receber as principais notícias!</p>
                                <form class="newsletter-form" method="POST" action="{{ route('site.home.saveLead') }}">
                                    @csrf

                                    <input type="email" class="input-newsletter" placeholder="digite seu e-mail" name="EMAIL" required>
                                    <button type="submit">QUERO RECEBER!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <script src="{{ asset('js/site/jquery.min.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/bootstrap.bundle.min.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/jquery.meanmenu.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/owl.carousel.min.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/jquery.magnific-popup.min.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/wow.min.js') }}?v={{ date('dmY') }}"></script>
        <script src="{{ asset('js/site/main.js') }}?v={{ date('dmY') }}"></script>

        @yield('scripts')
    </body>
</html>
