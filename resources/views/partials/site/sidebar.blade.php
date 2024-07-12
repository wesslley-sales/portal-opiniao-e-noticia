<div class="sidebar sticky-top">
    <div class="ad">
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

    @isset($relatedPosts)
        <div class="sidebar-widget trending-post-widget box">
            <h2 class="widget-title">Veja também</h2>
            <div class="tr-post-wrap">
                @foreach($relatedPosts as $post)
                    <div class="tr-post-item">
                        <span class="tr-post-cat text-uppercase">{{ $post->category->name }}</span>
                        <h3 class="tr-post-title">
                            <a href="{{ $post->url }}" title="{{ $post->title }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="published-date">
                            <i class="lar la-clock"></i>
                            {{ $post->published_at->isoFormat('LL [às] HH:mm') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endisset

    <x-last-videos />

    @include('partials.site.boxStayConnected')

    <div class="sidebar-widget ad-widget">
        @isset($banners['Torre 1'])
            <div id="carouselExampleFb1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($banners['Torre 1'] as $banner)
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

    <x-posts-most-read />
</div>
