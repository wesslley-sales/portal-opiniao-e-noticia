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

    <section class="main-news-slider-area pt-4">
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

    <section class="default-news-area">
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

            <div class="culture-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'entretenimento']) }}" title="Notícias Entretenimento">
                            Entretenimento
                        </a>
                    </h2>
                </div>
                <div class="row">
                    @foreach($postsCategoriesHome[16] ?? [] as $post)
                        <div class="col-lg-6">
                            <div class="single-culture-news">
                                <div class="culture-news-image">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=640&h=420&a=t"
                                             alt="{{ $post->title }}"
                                             loading="lazy"
                                        />
                                    </a>
                                </div>
                                <div class="culture-news-content">
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

            <div class="health-news">
                <div class="section-title">
                    <h2>
                        <a href="{{ route('site.posts.category', ['categoryPost' => 'mundo-bet']) }}" title="Notícias Mundo PET">
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
                                        <a href="#">
                                            Governo do Estado entrega Hospital Veterinário de Teresina em julho
                                        </a>
                                    </h3>
                                    <p>
                                        <i class="bx bx-time"></i>
                                        30/07/2024 às 16h
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
