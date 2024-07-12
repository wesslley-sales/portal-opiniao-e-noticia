@extends('layouts.site')

@section('content')
    <section class="hero-wrap style1 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        @foreach($featuredPosts['Manchete'] as $post)
                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                <h1 class="headline-title">
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

                <div class="col-xl-7">
                    <div class="news-box style1">
                        <div class="top-news-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($featuredPosts['Destaque Slideshow'] as $post)
                                    <div class="swiper-slide featuredPostSlideShow">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            <div class="top-news-box style1 bg-f bgImage"
                                                 style="background: url('{{ $post->featuredImageUrl }}'); background-repeat: no-repeat; background-size: cover;">
                                                <div class="over_lay style1"></div>
                                                <div class="top-news-info">
                                                    <span class="badge bg-brand">{{ $post->category->name }}</span>
                                                    <h3 class="news-title text-white">
                                                        {{ $post->title }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="top-news-pagination slider-pagination style1"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="sidebar-widget trending-post-widget box mb-0 py-1">
                        <div class="section-title style1 mt-2 mb-3">
                            <h2>Eleições 2024</h2>
                        </div>
                        @foreach($postsCategoriesHome[37]->slice(0, 4) ?? [] as $post)
                            <div class="news-box style7 mb-2 postFeaturedCategory">
                                <a href="{{ $post->url }}" class="news-img">
                                    <img src="{{ $post->featuredImageUrl }}"
                                         alt="{{ $post->title }}"
                                         loading="lazy"
                                         style="height: 90px; object-fit: cover;"
                                    />
                                </a>
                                <div class="news-info">
                                    <h3 class="news-title mt-0">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <ul class="news-metainfo list-style">
                                        <li>
                                            <i class="flaticon-clock"></i>
                                            {{ $post->published_at->format('d/m/Y \à\s H:i') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @isset($banners['Full banner 2'])
            <div class="container">
                <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                    <div class="carousel-inner">
                        @foreach($banners['Full banner 2'] as $banner)
                            <div @class(['carousel-item', 'active' => $loop->first])>
                                @if($banner->isFormatCode)
                                    {!! $banner->code !!}
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
    </section>

    <section class="latest-news-wrap">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row align-items-start">
                        <div class="col-md-10 col-sm-7 order-md-1 order-sm-1 order-1">
                            <div class="section-title style1 mb-30">
                                <h2>Em Destaque</h2>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-5 order-md-2 order-sm-2 order-3 text-sm-end">
                            <div class="latest-btn-wrap  mb-30">
                                <div class="slider-btn style1 latest-prev"><i class="flaticon-left-arrow-1"></i></div>
                                <div class="slider-btn style1 latest-next"><i class="flaticon-next"></i></div>
                            </div>
                        </div>
                        <div class="col-md-12 order-md-3 order-sm-3 order-2 text-sm-end">
                            <div class="latest-news-slider swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($featuredPosts['Em Destaque'] ?? [] as $post)
                                        <div class="swiper-slide">
                                            <div class="news-box style3">
                                                <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                    <div class="news-img">
                                                        <img src="{{ $post->featuredImageUrl }}"
                                                             alt="{{ $post->title }}"
                                                             loading="lazy"
                                                             style="height: 300px; object-fit: cover;"
                                                        />
                                                    </div>
                                                </a>
                                                <div class="news-info-wrap">
                                                    <h3 class="news-title">
                                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div class="published-date">
                                                        <i class="lar la-clock"></i>
                                                        {{ $post->published_at->format('d/m/Y \à\s H:i') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="sidebar-widget trending-post-widget box">
                        <h2 class="widget-title">ÚLTIMAS NOTÍCIAS</h2>
                        <div class="tr-post-wrap">
                            @foreach($lastPosts->slice(0, 3) as $post)
                                <div class="tr-post-item">
                                    <h3 class="tr-post-title">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="published-date">
                                        <i class="lar la-clock"></i>
                                        {{ $post->published_at->format('d/m/Y \à\s H:i') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="politics-wrap style2 pb-30">
        <div class="container">
            <div class="row  mb-30 align-items-center">
                <div class="col-md-8 col-sm-7">
                    <div class="section-title style1">
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'entrevistas']) }}" title="Entrevistas {{ config('site.site_name') }}">
                            <h2 class="d-flex align-items-center">
                                Entrevistas
                            </h2>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 text-sm-end xs-none">
                    <a href="{{ route('site.posts.category', ['categoryPost' => 'entrevistas']) }}" title="Entrevistas {{ config('site.site_name') }}" class="link style2">
                        Ver todas
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            @foreach($postsCategoriesHome[9]->slice(0, 1) ?? [] as $post)
                                <div class="news-box style11">
                                    <div class="news-img">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}">
                                            <img src="{{ $post->featuredImageUrl }}"
                                                 alt="{{ $post->title }}"
                                                 class="w-100"
                                                 style="height: 625px; object-fit: cover;"
                                            />
                                            <div class="over_lay style3"></div>
                                        </a>
                                    </div>
                                    <div class="news-info">
                                        <h3 class="news-title style2">
                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="row">
                                @foreach($postsCategoriesHome[9]->slice(1, 2) ?? [] as $post)
                                    <div class="col-lg-12 col-md-6">
                                        <div class="news-box style5">
                                            <div class="news-img bg-f news-2">
                                                <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                    <img src="{{ $post->featuredImageUrl }}"
                                                         alt="{{ $post->title }}"
                                                         loading="lazy"
                                                         class="w-100"
                                                         style="height: 300px; object-fit: cover;"
                                                    >
                                                    <div class="over_lay style3"></div>
                                                </a>
                                            </div>
                                            <div class="news-info">
                                                <h3 class="news-title style2">
                                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-sm-none">
                <div class="col-md-4 col-sm-5 text-center">
                    <a href="{{ route('site.posts.category', ['categoryPost' => 'entrevistas']) }}" title="Entrevistas {{ config('site.site_name') }}" class="link style2">
                        Veja todas as entrevistas
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="row align-items-center">
                        <div class="col-md-10 col-sm-7 order-md-1 order-sm-1 order-1">
                            <div class="section-title style1 mb-30">
                                <h2>Mais Notícias</h2>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 order-md-3 order-sm-3 order-2">
                            @foreach($lastPosts->slice(0, 10) as $post)
                                <div class="news-box row align-items-center">
                                    <div class="col-lg-4">
                                        <a href="{{ $post->url }}" title="{{ $post->title }}" class="news-img">
                                            <img src="{{ $post->featuredImageUrl }}"
                                                 alt="{{ $post->title }}"
                                                 loading="lazy"
                                                 class="rounded"
                                            />
                                        </a>
                                    </div>

                                    <div class="news-info col-lg-8">
                                        <span class="badge bg-brand">{{ $post->category->name }}</span>
                                        <h3 class="news-title">
                                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <i class="las la-clock"></i>
                                        {{ $post->published_at->format('d/m/Y \à\s H:i') }}
                                    </div>
                                </div>

                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4">
                    <div style="position: sticky; top: 30px;">
                        <div class="sidebar-widget ad-widget">
                            @isset($banners['Quadrado 1'])
                                <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                                    <div class="carousel-inner">
                                        @foreach($banners['Quadrado 1'] as $banner)
                                            <div @class(['carousel-item', 'active' => $loop->first])>
                                                @if($banner->isFormatCode)
                                                    {!! $banner->code !!}
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
                            @endisset
                        </div>

                        @include('partials.site.boxStayConnected')

                        <div class="pb-30 ad-2">
                            @isset($banners['Torre 1'])
                                <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
                                    <div class="carousel-inner">
                                        @foreach($banners['Torre 1'] as $banner)
                                            <div @class(['carousel-item', 'active' => $loop->iteration == 1])>
                                                @if($banner->isFormatCode)
                                                    {!! $banner->code !!}
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
                            @endisset
                        </div>

                        <x-posts-most-read />

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-wrap pb-30 style2">
        <div class="container">
            <div class="row  mb-30 align-items-center">
                <div class="col-md-8 col-sm-7">
                    <div class="section-title style1">
                        <h2>Blogs e Colunas</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($postsBloggers as $postBlog)
                    <div class="col-lg-6 itemBlog">
                        <div class="hr-news-box style6" style="background: #21541d24;">
                            <div class="news-img">
                                <a href="{{ $postBlog->url }}" title="{{ $postBlog->title }}">
                                    <img src="{{ $postBlog->category->photo->url }}"
                                         alt="{{ $postBlog->category->name }}"
                                         loading="lazy"
                                         style="width: 150px; height: 150px;"
                                    />
                                </a>
                            </div>
                            <div class="news-info">
                                <a href="{{ route('site.posts.category', $postBlog->category) }}" title="Blog {{ $postBlog->category->name }}" class="badge bg-brand">
                                    {{ $postBlog->category->name }}
                                </a>
                                <h3 class="news-title">
                                    <a href="{{ $postBlog->url }}" title="{{ $postBlog->title }}">
                                        {{ $postBlog->title }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
