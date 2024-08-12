<div class="sidebar-widget trending-post-widget box">
    <h2 class="widget-title">VÍDEOS</h2>
    <div class="tr-post-wrap">
        @foreach($lastVideos as $video)
            <div class="tr-post-item">
                @if($loop->first)
                    <div class="tr-post-thumbnail">
                        <a href="{{ $video->url }}" title="{{ $video->title }}">
                            <img src="{{ $video->featured_image->url }}"
                                 alt="{{ $video->title }}"
                                 class="rounded mb-2"
                                 loading="lazy"
                            />
                        </a>
                    </div>
                @endif

                <h5 class="tr-post-title">
                    <a href="{{ $video->url }}" title="{{ $video->title }}">
                        {{ $video->title }}
                    </a>
                </h5>

                @if(!$loop->last)
                    <hr/>
                @endif
            </div>
        @endforeach
    </div>
</div>
