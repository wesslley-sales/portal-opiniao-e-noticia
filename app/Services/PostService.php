<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostService
{
    public function __construct(
        public Post $model
    ) { }

    public function getPostsMostRead(int $take = 5): mixed
    {
        return Cache::remember('postsMostRead', 5000, function () use ($take) {
            return $this->model::withCount('views')
                ->orderByDesc('views_count')
                ->take($take)
                ->get(['id', 'title']);
        });
    }

}
