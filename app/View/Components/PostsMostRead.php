<?php

namespace App\View\Components;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class PostsMostRead extends Component
{

    public function __construct(
        public PostService $postService
    ) { }

    public function render(): View
    {
        $postsMostRead = $this->postService->getPostsMostRead();

        return view('components.posts-most-read', compact('postsMostRead'));
    }
}
