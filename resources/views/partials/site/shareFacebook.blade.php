@if(request()->routeIs('site.posts.show'))
    <meta property="fb:app_id" content="1043052762572185"/>
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->subtitle }}" />
    <meta property="og:image" content="{{ $post?->featuredImageUrl }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="article:author" content="{{ config('app.name') }}" />
    <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}" />
    <meta property="article:modified_time" content="{{ $post?->updated_at?->toIso8601String() }}" />
    <meta property="article:section" content="{{ $post->categories->first()?->name }}" />

    <meta name="twitter:creator" content="@pensarpiaui"/>
    <meta name="twitter:site" content="@pensarpiaui">
    <meta name="twitter:card" content="photo">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->subtitle }}">
    <meta name="twitter:image" content="{{ $post?->featuredImageUrl }}">
@else
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ config('site.site_description') }}" />
    <meta property="og:image" content="{{ url('images/site/share.jpg') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="article:author" content="{{ config('app.name') }}" />
    <meta property="article:section" content="{{ config('app.name') }}" />
@endif
