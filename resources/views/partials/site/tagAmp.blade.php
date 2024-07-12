@if(request()->routeIs('site.posts.show'))
    <link rel="amphtml" href='{{ $post->urlAmp }}'>
@endif
