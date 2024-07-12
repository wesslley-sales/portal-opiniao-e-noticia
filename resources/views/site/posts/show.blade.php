@extends('layouts.site')

@section('title', $post->title)
@section('description', $post->subtitle)

@section('content')
    <div class="blog-section">
        <div class="container">

            @if($post->isFromBlog)
                <div class="post-author mt-0 d-flex align-items-center">
                    <div class="post-author-img h-auto w-auto">
                        <a href="{{ $post->category->url }}" title="{{ $post->category->name }}">
                            <img src="{{ $post->category->photo->url }}"
                                 alt="{{ $post->category->name }}"
                                 style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;"
                                 loading="lazy"
                            />
                        </a>
                    </div>
                    <div class="post-author-info">
                        <h4>
                            <a href="{{ $post->category->url }}" title="{{ $post->category->name }}">
                                {{ $post->category->name }}
                            </a>
                        </h4>
                        <p>{{ $post->category->description }}</p>
                    </div>
                </div>
            @endif

            <div class="row gx-5">
                <div class="col-xxl-9 col-xl-8 col-lg-12">
                    <article class="bg-white">
                        <span class="badge bg-brand text-uppercase  ">
                            {{ $post->category->name }}
                        </span>

                        <h2 class="post-title mb-10">
                            {{ $post->title }}
                        </h2>

                        <p class="text-muted post-subtitle">
                            {{ $post->subtitle }}
                        </p>

                        <ul class="news-metainfo list-style mb-20">
                            <li>
                                <i class="flaticon-clock"></i>
                                {{ $post->published_at->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                            </li>
                            <li>
                                <i class="flaticon-user-2"></i>
                                @forelse($post->users as $author)
                                    <a href="{{ route('site.posts.user', ['slug' => $author->slug]) }}">
                                        {{ $author->name }}
                                    </a>

                                    @if(!$loop->last)
                                    ,
                                    @endif
                                @empty
                                @endforelse
                            </li>
                        </ul>

                        <div class="sharethis-inline-share-buttons"></div>

                        <hr>

                        @if(!empty($post->featuredImageUrl) && empty($post->migration_image_url))
                            <div class="post-img big-image-noticia">
                                @if(!empty($post->image->credit))
                                    <span class="credit">{{ $post->image->credit }}</span>
                                @endif
                                <img src="{{ $post->featuredImageUrl }}" alt="{{ $post->title }}" loading="lazy" />
                                @if(!empty($post->image->legend))
                                    <div class="legend">{{ $post->image->legend }}</div>
                                @endif
                            </div>
                        @endif

                        <div class="post-para contentPost">
                           {!! $post->content !!}
                        </div>

                        <div class="social mt-4" style="background-color: #dcf8c6;">
                            <a href="{{ $settings['site.grupo_whatsapp'] ?? '' }}" target="_blank" class="d-flex align-items-center p-1" title="Receba as notícias do {{ config('app.name') }} pelo WhatsApp">
                                <span class="me-1"><i class="lab la-whatsapp la-2x text-success"></i></span>
                                <span class="fw-bold">Receba as notícias do {{ config('site.site_name') }} pelo WhatsApp</span>
                            </a>
                        </div>
                    </article>

                    <div class="post-meta-option mb-50">
                        <div class="row gx-0 align-items-center">
                            <div class="col-md-7 col-12">
                                <div class="post-tag">
                                    <span>Tags:</span>
                                    <ul class="list-style">
                                        @forelse($post->tags as $tag)
                                            <li>
                                                <a href="{{ route('site.posts.search', ['term' => $tag->name]) }}">
                                                    {{ $tag->name }}
                                                </a>

                                                @if(!$loop->last)
                                                ,
                                                @endif
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-5 col-12 text-md-end text-start">
                                <div class="post-share w-100">
                                    <span>Compartilhe:</span>
                                    <ul class="social-profile style3 list-style">
                                        <li>
                                            <a target="_blank" href="https://api.whatsapp.com/send?text={{ $post->title }} - {{ url()->current() }}" title="Compartilhar no WhatsApp">
                                                <i class="lab la-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{ $settings['site.link_instagram'] ?? '' }}" title="Compartilhar no Instagram">
                                                <i class="lab la-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://twitter.com/intent/tweet?text={{ $post->title }} - {{ url()->current() }}" title="Compartilhar no twitter">
                                                <i class="lab la-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" title="Compartilhar no facebook">
                                                <i class="lab la-facebook-f"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-box-wrap post-comment">
                        <h4 class="comment-box-title">Deixe sua opinião:</h4>
                    </div>

                    <div class='fb-comments' data-width='100%' data-href="{{ url()->current() }}" data-numposts='50'></div>

                    <div class="pt-3 pb-5">
                        <div id="taboola-below-article-thumbnails"></div>
                        <script type="text/javascript">
                            window._taboola = window._taboola || [];
                            _taboola.push({
                                mode: 'alternating-thumbnails-a',
                                container: 'taboola-below-article-thumbnails',
                                placement: 'Below Article Thumbnails',
                                target_type: 'mix'
                            });
                        </script>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-12">
                    @include('partials.site.sidebar')
                </div>
            </div>
        </div>
    </div>
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v20.0&autoLogAppEvents=1" nonce="E6UM70MS"></script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=664f832f3a56e900196c14e5&product=inline-share-buttons&source=platform" async="async"></script>

    <script async src="https://cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
@endsection
