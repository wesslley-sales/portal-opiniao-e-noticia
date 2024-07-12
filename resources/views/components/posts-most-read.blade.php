<div class="sidebar-widget trending-post-widget box">
    <h2 class="widget-title">MAIS LIDAS</h2>
    <div class="tr-post-wrap">
        @foreach($postsMostRead as $post)
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
