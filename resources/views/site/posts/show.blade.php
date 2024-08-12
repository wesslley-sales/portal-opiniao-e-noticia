@extends('layouts.site')

@section('title', $post->title)
@section('description', $post->subtitle)

@section('content')
    <section class="news-details-area ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-details-desc">

                        <p>
                            <span class="text-muted">
                                {{ $post->published_at->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                            </span>
                                |
                                <span class="text-muted">
                               @forelse($post->users as $author)
                                        <a href="{{ route('site.posts.user', ['slug' => $author->slug]) }}">
                                            {{ $author->name }}
                                        </a>

                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @empty
                                    @endforelse
                           </span>
                        </p>

                        <h1 class="fw-bold">{{ $post->title }}</h1>

                        <h5 class="text-muted post-subtitle">
                            {{ $post->subtitle }}
                        </h5>

                        <div class="sharethis-inline-share-buttons"></div>

                        <hr>

                        <div class="article-content">
                            {!! $post->content !!}
                        </div>

                        <div class="article-footer">
                            <div class="article-share">
                                <ul class="social">
                                    <li><span>Compartilhar:</span></li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text={{ $post->title }} - {{ url($post->url) }}"
                                           title="Compartilhar no WhatsApp"
                                           target="_blank"
                                        >
                                            <i class="bx bxl-whatsapp"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $post->url }}"
                                           title="Compartilhar no Facebook"
                                           target="_blank"
                                        >
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ url($post->url) }}&text={{ $post->title }}"
                                           title="Compartilhar no X (Twitter)"
                                           target="_blank"
                                        >
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url($post->url) }}&title={{ $post->title }}"
                                           title="Compartilhar no LinkedIn"
                                           target="_blank"
                                        >
                                            <i class="bx bxl-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="comment-box-wrap post-comment">
                            <h4 class="comment-box-title">Deixe sua opinião:</h4>
                        </div>

                        <div class='fb-comments' data-width='100%' data-href="{{ url()->current() }}" data-numposts='50'></div>

                        <div class="post-navigation">
                            <h3>Veja também:</h3>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-health-news">
                                            <div class="health-news-image">
                                                <a href="{{ $relatedPost->url }}" title="{{ $relatedPost->title }}">
                                                    <img src="/resize-image?src={{ $post->featuredImageUrl }}&w=420&h=300&a=t"
                                                         alt="{{ $relatedPost->title }}"
                                                         loading="lazy"
                                                    />
                                                </a>
                                            </div>
                                            <div class="health-news-content">
                                                <h3>
                                                    <a href="{{ $relatedPost->url }}" title="{{ $relatedPost->title }}">
                                                        {{ $relatedPost->title }}
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
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        window.onload = (event) => {
            // transform links from audio and pdf to be most friendly
            $('.contentPost p a').each(function() {
                let href = $(this).attr("href");
                let replacement;

                switch (true) {
                    case href.includes(".ogg"):
                    case href.includes(".mp3"):
                        replacement = `<audio style="width: 100%;" controls><source src="${href}" type="audio/ogg"><source src="${href}" type="audio/mpeg"></audio>`;
                        break;
                    case href.includes(".pdf"):
                        replacement = `<iframe src="https://drive.google.com/viewerng/viewer?url=${href}?pid=explorer&efh=false&a=v&chrome=false&embedded=true" frameborder="1" scrolling="auto" height="600" width="100%"></iframe>`;
                        break;
                }

                if (replacement) {
                    $(this).replaceWith(replacement);
                }
            });
        };
    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0&appId=101403027367752&autoLogAppEvents=1"></script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=664f832f3a56e900196c14e5&product=inline-share-buttons&source=platform" async="async"></script>

    <script async src="https://cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
@endsection
