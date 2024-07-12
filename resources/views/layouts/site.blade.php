<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <link rel="stylesheet" href="{{ asset('css/site/line-awesome.min.css') }}" media="print" onload="this.media='all'" />
        <link rel="stylesheet" href="{{ asset('css/site/flaticon.css') }}" media="print" onload="this.media='all'" />
        <link rel="stylesheet" href="{{ asset('css/site/swiper-min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/responsive.css') }}">

        <style>
            .page-wrapper {
                overflow-x: inherit;
            }

            .contentPost blockquote {
                font-size: 1.25rem;
                border: 1px solid rgba(33, 84, 29, 0.54);
                border-left: 0.5rem solid rgba(33, 84, 29, 0.54);
                color: #6c757d;
                font-family: "Open Sans", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-style: italic;
                line-height: 1.6;
                margin: 1.875rem auto;
                max-width: 90%;
                padding: 4.6875rem 1.875rem 1.875rem 4.6875rem;
                position: relative;
                width: 100%;
            }

            .contentPost blockquote:before {
                color: rgba(33, 84, 29, 0.54);
                content: "“";
                font-family: "Noto Serif", "Georgia", "Times New Roman", "Times", serif;
                font-size: 5.5rem;
                height: 3.75rem;
                left: 0.9375rem;
                line-height: 1;
                max-width: 3.75rem;
                position: absolute;
                text-align: inherit;
                top: 0.9375rem;
                width: 100%;
            }

            .blockquote:after {
                content: "";
            }

            .contentPost .fr-video {
                display: block;
                text-align: center;
            }

            .bg-brand,
            .header-wrap.style1 .header-top .header-top-right .subscribe-btn,
            .section-title.style1 h2:after,
            .news-title.style2:before {
                background-color: #21541c;
            }

            .slider-btn.style1 i, .slider-btn.style2 i, .slider-btn.style3 i, .slider-btn.style4 i,
            .published-date i,
            .news-box.style6 .news-metainfo li i, .news-box.style8 .news-metainfo li i,
            .news-metainfo li i,
            .social-profile.style3 li a i {
                color: #21541c;
            }

            .slider-btn.style1, .slider-btn.style2, .slider-btn.style3, .slider-btn.style4 {
                border: 1px solid #21541c;
            }

            .footer-wrap .footer-top .footer-widget .newsletter-form .form-group button {
                background: #ffb800;
                color: #1f1212;
                font-weight: 600;
            }

            .social-profile.style1 li a i {
                color: white;
            }

            .footer-wrap .footer-top .footer-widget .footer-widget-title:after {
                background: #ffb800;
            }

            .header-wrap .subscribe-btn {
                align-items: center;
                display: flex;
                padding: 12px;
            }

            .header-wrap.style1 .header-top .header-top-right .searchbtn {
                background-color: #f5f5f5;
            }

            .header-wrap.style1 .header-top .header-top-right .searchbtn i,
            .header-wrap .present-date i,
            .header-wrap .trending-news h6 i{
                color: #1f1212;
            }

            .logo img {
                max-width: 180px;
            }

            .headline-title {
                font-size: 4rem;
                font-weight: 600;
                line-height: 1.15;
            }

            .header-wrap.style1 .header-bottom .main-menu-wrap #menu > ul > li > a {
                font-weight: 600;
            }

            .politics-wrap.style2 .news-box.style11 .news-info .news-title {
                font-size: 2rem;
            }

            .news-metainfo li i {
                top: 6px;
            }

            .header-wrap.sticky.style1 {
                margin-top: -117px;
            }

            .post-title {
                font-size: 40px;
            }

            article .post-subtitle {
                font-size: 20px;
            }

            .play-icon-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }
            .news-img:hover .play-icon-overlay {
                opacity: 1;
            }

            .header-wrap.style1 {
                position: relative;
            }

            .hero-wrap.style1 {
                margin-top: 0px;
            }

            .section-title h2 {
                font-size: 26px;
                color: #21541c;
            }

            .news-metainfo li i {
                top: initial;
            }

            .news-metainfo li {
                font-size: 13px;
            }

            .big-image-noticia {
                width: 100%;
                margin-bottom: 10px;
                float: left;
            }

            .big-image-noticia img {
                width: 100%;
            }

            .big-image-noticia .credit {
                font-size: 14px;
                text-transform: uppercase;
                display: block;
                text-align: start;
                padding-bottom: 2px;
            }

            .big-image-noticia .legend {
                padding: 5px;
                background: #e8e8e8;
            }

            .contentPost p a {
                text-decoration: underline;
                font-weight: 600;
                color: blue;
            }

            @media only screen and (max-width: 450px) {
                .headline-title {
                    font-size: 2rem;
                }

                .featuredPostSlideShow .bgImage {
                    background-size: 100% !important;
                    height: 272px;
                }

                .postFeaturedCategory img {
                    width: 100%;
                    height: 220px !important;
                }

                .itemBlog {
                    text-align: center;
                }

                .contentPost .iframeGalleryPhoto {
                    width: 100%;
                    height: 400px;
                }

                .contentPost .fr-video iframe {
                    max-width: 100%;
                    height: 230px;
                }
            }
        </style>

        @yield('styles')

        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-P46HNTW');</script>
        <!-- End Google Tag Manager -->

        <script src="//cdn.simpleads.com.br/v2/s628055/p1910166/show.js" type="text/javascript" async></script>

        <script type="text/javascript">
            window._taboola = window._taboola || [];
            _taboola.push({article: 'auto'});
            !function (e, f, u, i) {
                if (!document.getElementById(i)) {
                    e.async = 1;
                    e.src = u;
                    e.id = i;
                    f.parentNode.insertBefore(e, f);
                }
            }(document.createElement('script'),
                document.getElementsByTagName('script')[0],
                '//cdn.taboola.com/libtrc/pensarpiaui-publisher/loader.js',
                'tb_loader_script');
            if (window.performance && typeof window.performance.mark == 'function') {
                window.performance.mark('tbl_ic');
            }
        </script>
    </head>

    <body>
        <div class="page-wrapper">
            <header class="header-wrap style1">
                <div class="header-top bg-white">
                    <div class="close-header-top xl-none">
                        <button type="button"><i class="las la-times"></i></button>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="header-top-left">
                                    <a href="{{ route('site.home.index') }}" title="{{ config('app.name') }}" class="logo lg-none">
                                        <img class="logo-light"
                                             src="{{ asset('images/site/logo.png') }}"
                                             alt="{{ config('app.name') }}"
                                        />
                                    </a>
                                    <p class="present-date">
                                        <i class="las la-clock"></i>
                                        {{ now()->isoFormat('D [de] MMMM [de] YYYY') }}
                                    </p>

                                    @isset($lastPosts)
                                        <div class="trending-news lg-none">
                                            <h6><i class="lab la-gripfire"></i></h6>
                                            <div class="news">
                                                <ul class="list-style">
                                                    @foreach($lastPosts->slice(0, 5) as $post)
                                                        <li>
                                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                                {{ $post->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endisset

                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="header-top-right">
                                    <button type="button" class="searchbtn lg-none">
                                        <i class="flaticon-search-interface-symbol"></i>
                                    </button>

                                    <a class="subscribe-btn"
                                       href="{{ $settings['site.grupo_whatsapp'] ?? '' }}"
                                       title="Participe do grupo de notícias do {{ config('app.name') }} no WhatsApp"
                                       target="_blank"
                                    />
                                        <i class="la la-2x la-whatsapp"></i>
                                        Participe do grupo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-bottom bg-brand">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6 col-4 xl-none">
                                <a href="{{ route('site.home.index') }}" title="{{ config('app.name') }}" class="logo">
                                    <img class="logo-light"
                                         src="{{ asset('images/site/logo.svg') }}"
                                         alt="{{ config('app.name') }}"
                                    />
                                </a>
                            </div>
                            <div class="col-lg-12 col-md-6 col-8">
                                <div class="main-menu-wrap style1">
                                    <div class="menu-close xl-none">
                                        <a href="javascript:void(0)">
                                            <i class="las la-times"></i>
                                        </a>
                                    </div>
                                    <div id="menu">
                                        <ul class="main-menu list-style text-center">
                                            <li>
                                                <a href="{{ route('site.posts.index') }}" title="Últimas Notícias">
                                                    Últimas Notícias
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.posts.category', ['categoryPost' => 'cidade']) }}" title="Notícias Cidade">
                                                    Cidade
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.posts.category', ['categoryPost' => 'cultura']) }}" title="Notícias Cultura">
                                                    Cultura
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.posts.category', ['categoryPost' => 'esportes']) }}" title="Notícias Esporte">
                                                    Esporte
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.posts.category', ['categoryPost' => 'internacional']) }}" title="Notícias Internacional">
                                                    Internacional
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.posts.blogs') }}" title="Blogs e Colunas">
                                                    Blogs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.videos.index') }}" title="Vídeos Pensar Piauí">
                                                    <i class="las la-play-circle"></i>
                                                    Vídeos
                                                </a>
                                            </li>
                                            <li class="has-children">
                                                <a href="javascript:void(0)" title="Blogs">
                                                    Outras Notícias
                                                </a>
                                                <ul class="sub-menu list-style">
                                                    <li>
                                                        <a href="{{ route('site.posts.category', ['categoryPost' => 'economia']) }}" title="Notícias Economia">
                                                            Economia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('site.posts.category', ['categoryPost' => 'educacao']) }}" title="Notícias Educação">
                                                            Educação
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('site.posts.category', ['categoryPost' => 'diversidade']) }}" title="Notícias Diversidade">
                                                            Diversidade
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mobile-bar-wrap">
                                    <button type="button" class="searchbtn xl-none">
                                        <i class="flaticon-search-interface-symbol"></i>
                                    </button>

                                    <div class="mobile-top-bar xl-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="mobile-menu xl-none">
                                        <a href="javascript:void(0)"><i class="las la-bars"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-area">
                    <div class="container">
                        <button type="button" class="close-searchbox">
                            <i class="las la-times"></i>
                        </button>
                        <form action="{{ route('site.posts.search') }}">
                            <div class="form-group">
                                <input type="search" name="term" placeholder="faça uma busca" autofocus required>
                            </div>
                        </form>
                    </div>
                </div>
            </header>

            @isset($banners['Full banner 1'])
                <div class="container">
                    <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                        <div class="carousel-inner">
                            @foreach($banners['Full banner 1'] as $banner)
                                <div @class(['carousel-item', 'active' => $loop->first])>
                                    @if($banner->isFormatCode)
                                        <div class="d-block ad text-center pt-30 pb-30">
                                            {!! $banner->code !!}
                                        </div>
                                    @else
                                        <a href="{{ $banner->link }}" title="{{ $banner->name }}" target="_blank" class="d-block ad text-center pt-30 pb-30">
                                            <img src="{{ $banner->image->getUrl() }}"
                                                 loading="lazy"
                                                 alt="{{ $banner->name }}"
                                                 class="w-100"
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

            <footer class="footer-wrap style1 bg-brand">
                <div class="footer-top pt-100 pb-70 bg-vista-white">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12">
                                <div class="footer-widget">
                                    <a href="{{ route('site.home.index') }}" title="Página inicial {{ config('app.name') }}" class="footer-logo">
                                        <img src="{{ asset('images/site/logo.svg') }}"
                                             alt="{{ config('app.name') }}"
                                             loading="lazy"
                                        />
                                    </a>

                                    <p class="comp-desc">
                                        {{ trans('panel.description') }}
                                    </p>

                                    <div class="newsletter-form">
                                        <h5 class="footer-widget-title style2">Newsletter</h5>
                                        <form action="{{ route('site.home.saveLead') }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <input type="email"
                                                       name="email"
                                                       placeholder="digite seu e-mail"
                                                       required
                                                />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <button type="submit">Ok</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="footer-widget text-center">
                                    <h5 class="footer-widget-title style2">
                                        Acompanhe nas redes sociais
                                    </h5>
                                    <ul class="social-profile style1 list-style">
                                        <li>
                                            <a href="{{ $settings['site.link_facebook'] ?? '' }}" target="_blank" title="Facebook - {{ config('app.name') }}">
                                                <i class="flaticon-facebook-app-symbol"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings['site.link_twitter'] ?? '' }}" target="_blank" title="X (Twitter) - {{ config('app.name') }}">
                                                <i class="flaticon-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings['site.link_instagram'] ?? '' }}" target="_blank" title="Instagram - {{ config('app.name') }}">
                                                <i class="flaticon-instagram-1"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings['site.link_youtube'] ?? '' }}" target="_blank" title="YouTube - {{ config('app.name') }}">
                                                <i class="flaticon-youtube-symbol"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom bg-racing-green">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 order-md-1 order-2">
                                <div class="copyright">
                                    <p>
                                        <span class="las la-copyright"></span>
                                        <script>document.write(new Date().getFullYear())</script>
                                        {{ config('app.name') }} - Todos os direitos reservados.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 order-md-2 order-1 text-md-end">
                                <ul class="footer-bottom-menu list-style">
                                    <li>
                                        <a href="{{ route('site.pages.privacyPolicy') }}" title="Política de Privacidade">
                                            Política de Privacidade
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="{{ asset('js/site/jquery.min.js') }}"></script>
        <script src="{{ asset('js/site/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/site/swiper-min.js') }}"></script>
        <script src="{{ asset('js/site/jquery-appear.js') }}"></script>
        <script src="{{ asset('js/site/jquery-magnific-popup.js') }}"></script>
        <script src="{{ asset('js/site/main.js') }}"></script>

        @yield('scripts')

        <!-- BANNER TOP SITE -->
        <script data-cfasync="false" type="text/javascript" id="clever-core">
            (function (document, window) {
                var a, c = document.createElement("script");

                c.id = "CleverCoreLoader48223";
                c.src = "//scripts.cleverwebserver.com/6f497db742b82253d9cf8c89073da954.js";

                c.async = !0;
                c.type = "text/javascript";
                c.setAttribute("data-target", window.name);
                c.setAttribute("data-callback", "put-your-callback-macro-here");

                try {
                    a = parent.document.getElementsByTagName("script")[0] || document.getElementsByTagName("script")[0];
                } catch (e) {
                    a = !1;
                }

                a || (a = document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]);
                a.parentNode.insertBefore(c, a);
            })(document, window);
        </script>

        <script type="text/javascript">
            window._taboola = window._taboola || [];
            _taboola.push({flush: true});
        </script>
    </body>
</html>
