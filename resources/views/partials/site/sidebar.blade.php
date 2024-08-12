<div class="sidebar sticky-top">
    @isset($banners['Quadrado 1'])
        <div class="ad">
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
        </div>
    @endisset

    <x-last-videos />

    @isset($banners['Torre 1'])
        <div class="sidebar-widget ad-widget">
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
        </div>
    @endisset

    <x-posts-most-read />
</div>
