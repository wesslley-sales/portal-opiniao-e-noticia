@extends('layouts.site')

@section('content')
    <div class="container pt-4">
        <div class="col-12">
            <div class="text-center">
                @foreach($featuredPosts['Manchete'] as $post)
                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                        <h1 class="fw-bold">
                            {{ $post->title }}
                        </h1>
                        <p>
                            {{ $post->subtitle }}
                        </p>
                    </a>
                @endforeach
            </div>
            <hr>
        </div>
    </div>

    <section class="main-news-slider-area pt-4 pb-1">
        <div class="container-fluid">
            <div class="main-news-slides owl-carousel owl-theme">
                @foreach($featuredPosts['Destaque Slideshow'] as $post)
                    <div class="news-slider-item">
                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                            <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=560&h=420&a=t"
                                 alt="{{ $post->title }}"
                                 loading="lazy"
                            />
                        </a>
                        <div class="slider-content">
                            <h3>
                                <a href="{{ $post->url }}" title="{{ $post->title }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @isset($banners['Full banner 2'])
        <div class="container py-4">
            <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                <div class="carousel-inner">
                    @foreach($banners['Full banner 2'] as $banner)
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

    <section class="default-news-area">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-4 col-12">
                    <div class="title-section mb-3">
                        <h3>
                            <a href="{{ route('site.posts.category', ['categoryPost' => 'municipios']) }}" title="Notícias Municípios" style="border-bottom: 2px solid #09abe7;">
                                Municípios
                            </a>
                        </h3>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="highlights-content-2-wrapper">
                            @foreach($postsCategoriesHome[2] ?? [] as $post)
                                <div class="highlights-content-2 mb-sm-2 d-grid align-items-center" style="gap: 20px; grid-template-columns: 140px 1fr;">
                                    <div class="thumb transtion_zoom">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=180&h=145&a=t" alt="{{ $post->title }}" class="rounded" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title" style="font-size: 18px;">
                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="title-section mb-3">
                        <h3>
                            <a href="{{ route('site.posts.category', ['categoryPost' => 'fala-comunidade']) }}" title="Notícias Municípios" style="border-bottom: 2px solid #09abe7;">
                                Fala Comunidade
                            </a>
                        </h3>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="highlights-content-2-wrapper">
                            @foreach($postsCategoriesHome[9] ?? [] as $post)
                                <div class="highlights-content-2 mb-sm-2 d-grid align-items-center" style="gap: 20px; grid-template-columns: 140px 1fr;">
                                    <div class="thumb transtion_zoom">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=180&h=145&a=t" alt="{{ $post->title }}" class="rounded" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title" style="font-size: 18px;">
                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="title-section mb-3">
                        <h3>
                            <a href="{{ route('site.posts.category', ['categoryPost' => 'a-noticia-e-sua']) }}" title="Notícias Municípios" style="border-bottom: 2px solid #09abe7;">
                                A Notícia é Sua
                            </a>
                        </h3>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="highlights-content-2-wrapper">
                            @foreach($postsCategoriesHome[6] ?? [] as $post)
                                <div class="highlights-content-2 mb-sm-2 d-grid align-items-center" style="gap: 20px; grid-template-columns: 140px 1fr;">
                                    <div class="thumb transtion_zoom">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=180&h=145&a=t" alt="{{ $post->title }}" class="rounded" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title" style="font-size: 18px;">
                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6507859803003463"
                    crossorigin="anonymous"></script>
            <!-- fullbanner ads -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6507859803003463"
                 data-ad-slot="4284682795"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <div class="politics-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'politica']) }}" title="Notícias Política">
                            Política
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[1] ?? [] as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-politics-news">
                                <div class="politics-news-image">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                             alt="{{ $post->title }}"
                                             loading="lazy"
                                        />
                                    </a>
                                </div>
                                <div class="politics-news-content">
                                    <h3>
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        {{ $post->created_at->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="business-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'policia']) }}" title="Notícias Polícia">
                            Polícia
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[3] ?? [] as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-most-popular-news">
                                <div class="popular-news-image">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                             alt="{{ $post->title }}"
                                             loading="lazy"
                                        />
                                    </a>
                                </div>
                                <div class="popular-news-content">
                                    <h3>
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        {{ $post->created_at->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tech-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'cidades']) }}" title="Notícias Cidades">
                            Cidades
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[2] ?? [] as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-tech-news-box">
                                <a href="{{ $post->url }}" title="{{ $post->title }}">
                                    <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                         alt="{{ $post->title }}"
                                         loading="lazy"
                                    />
                                </a>
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        {{ $post->created_at->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tech-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'concursos']) }}" title="Notícias Concursos">
                            Concursos
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[18] ?? [] as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-tech-news-box">
                                <a href="{{ $post->url }}" title="{{ $post->title }}">
                                    <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                         alt="{{ $post->title }}"
                                         loading="lazy"
                                    />
                                </a>
                                <div class="tech-news-content">
                                    <h3>
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        {{ $post->created_at->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="health-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'mundo-pet']) }}" title="Notícias Mundo PET">
                            Mundo PET
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[8] ?? [] as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-health-news">
                                <div class="health-news-image">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                             alt="{{ $post->title }}"
                                             loading="lazy"
                                        />
                                    </a>
                                </div>
                                <div class="health-news-content">
                                    <h3>
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        {{ $post->created_at->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="title-section mb-3">
                    <h3>
                        <a href="/noticias" title="Últimas Vídeos" style="border-bottom: 2px solid #09abe7;">
                            NOTÍCIAS MAIS LIDAS
                        </a>
                    </h3>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="highlights-content-2-wrapper">
                        @foreach($postsMostRead->take(5) as $post)
                            <div class="highlights-content-2 mb-sm-2 d-grid align-items-center" style="gap: 20px; grid-template-columns: 140px 1fr;">
                                <div class="thumb transtion_zoom">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=180&h=145&a=t" alt="{{ $post->title }}" class="rounded" loading="lazy">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 18px;">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="title-section mb-3">
                    <h3>
                        <a href="/videos" title="Últimas Vídeos" style="border-bottom: 2px solid #09abe7;">
                            VÍDEOS MAIS VISTOS
                        </a>
                    </h3>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="highlights-content-2-wrapper">
                        @foreach($videosMostViewed->take(5) as $video)
                            <div class="highlights-content-2 mb-sm-2 d-grid align-items-center" style="gap: 20px; grid-template-columns: 140px 1fr;">
                                <div class="thumb transtion_zoom">
                                    <a href="{{ $video->url }}" title="{{ $video->title }}">
                                        <img src="/resize-image?src=https://img.youtube.com/vi/{{ $video->youtubeId }}/hqdefault.jpg&w=180&h=145&a=t"
                                             alt="{{ $video->title }}"
                                             class="rounded"
                                             loading="lazy"
                                        />
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 18px;">
                                        <a href="{{ $video->url }}" title="{{ $video->title }}">
                                            {{ $video->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="video-news">
        <div class="section-title">
            <h2>
                <a href="{{ route('site.videos.index') }}" title="Vídeos">
                    Vídeos
                </a>
            </h2>
        </div>
        <div class="video-slides owl-carousel owl-theme">
            @foreach($lastVideos as $video)
                <div class="video-item">
                    <div class="video-news-image">
                        <a href="{{ $video->url }}" title="{{ $video->title }}">
                            <img src="https://img.youtube.com/vi/{{ $video->youtubeId }}/hqdefault.jpg"
                                 alt="{{ $video->title }}"
                                 loading="lazy"
                            />
                        </a>
                        <a href="{{ $video->url }}" title="{{ $video->title }}">
                            <i class='bx bx-play-circle'></i>
                        </a>
                    </div>
                    <div class="video-news-content">
                        <h3>
                            <a href="{{ $video->url }}" title="{{ $video->title }}">
                                {{ $video->title }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
