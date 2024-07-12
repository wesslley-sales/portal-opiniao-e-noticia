<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\ContentCategory;
use App\Models\ContentTag;
use App\Models\Post;
use App\Models\User;
use Gate;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = QueryBuilder::for(Post::class)
            ->with(['categories', 'users', 'tags', 'image'])
            ->withCount('views')
            ->allowedFilters([
                AllowedFilter::partial('category', 'categories.name'),
                'title',
                'featured_position',
                AllowedFilter::partial('user', 'users.name'),
                'published_at',
                AllowedFilter::exact('status'),
                AllowedFilter::scope('term', 'searchTerm'),
                AllowedFilter::scope('period', 'filterPeriod'),
            ])
            ->latest('published_at')
            ->paginate(100)
            ->withQueryString();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        return view('admin.posts.form', compact('categories', 'users'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        $post->categories()->sync($request->input('categories', []));
        $post->users()->sync($request->input('users', []));
        $post->tags()->sync($request->input('tags', []));

        return to_route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        $post->load('categories', 'users', 'tags');

        return view('admin.posts.form', compact('post', 'categories', 'users'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        $post->categories()->sync($request->input('categories', []));
        $post->users()->sync($request->input('users', []));
        $post->tags()->sync($request->input('tags', []));

        return to_route('admin.posts.index');
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('categories', 'users', 'tags');

        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostRequest $request)
    {
        $posts = Post::find(request('ids'));

        foreach ($posts as $post) {
            $post->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
