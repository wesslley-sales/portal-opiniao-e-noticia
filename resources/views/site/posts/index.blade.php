@extends('layouts.site')

@section('title', $title);

@section('content')
    <div class="blog-section">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xxl-9 col-xl-8 col-lg-12">
                    <h1 class="mb-20">
                        {{ $title }}
                    </h1>
                    <hr>

                    @forelse($posts as $post)
                        <div class="news-box d-flex align-items-center">
                            <div class="me-3 col-lg-4">
                                <a href="{{ $post->url }}" title="{{ $post->title }}" class="news-img">
                                    <img src="{{ $post->featuredImageUrl }}"
                                         alt="{{ $post->title }}"
                                         loading="lazy"
                                         class="rounded"
                                    />
                                </a>
                            </div>

                            <div class="news-info col-lg-8">
                                <span class="badge bg-brand">
                                    {{ $post->category->name }}
                                </span>
                                <h3 class="news-title">
                                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <i class="las la-clock"></i>
                                {{ $post->published_at->isoFormat('LL [às] HH:mm') }}
                            </div>
                        </div>

                        <hr>
                    @empty
                        <div class="alert alert-warning">
                            Nenhum post encontrado.
                        </div>
                    @endforelse

                    {{ $posts->links() }}
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-12">
                    @include('partials.site.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
