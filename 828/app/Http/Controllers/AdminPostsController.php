<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort_by');
        $sortOrder = $request->query('sort_order', 'asc');

        $posts = Post::query();

        if ($sortBy === 'name') {
            $posts->orderBy('name', $sortOrder);
        } elseif ($sortBy === 'title') {
            $posts->orderBy('title', $sortOrder);
        } elseif ($sortBy === 'time') {
            $posts->orderBy('updated_at', $sortOrder);
        } else {
            $posts->orderBy('id', $sortOrder);
        }

        $data = [
            'posts' => $posts->get(),
            'sortOrder' => $sortOrder,
            'sortBy' => $sortBy
        ];

        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $data = [
            'post' => $post,
        ];

        return view('admin.posts.edit', $data);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    public function search(Request $request)
    {
        $searchKeyword = $request->input('search');

        $sortBy = $request->query('sort_by');
        $sortOrder = $request->query('sort_order', 'asc');

        $posts = Post::query();

        if ($searchKeyword) {
            $posts->where(function ($query) use ($searchKeyword) {
                $query->where('name', 'like', '%' . $searchKeyword . '%')
                    ->orWhere('title', 'like', '%' . $searchKeyword . '%')
                    ->orWhere('id', 'like', '%' . $searchKeyword . '%');
            });
        }

        $searchedPosts = $posts->get();

        if ($sortBy === 'name') {
            $searchedPosts = $searchedPosts->sortBy('name', $sortOrder);
        } elseif ($sortBy === 'title') {
            $searchedPosts = $searchedPosts->sortBy('title', $sortOrder);
        } elseif ($sortBy === 'time') {
            $searchedPosts = $searchedPosts->sortBy('updated_at', $sortOrder);
        }

        $data = [
            'posts' => $searchedPosts,
            'sortOrder' => $sortOrder,
            'sortBy' => $sortBy
        ];

        return view('admin.posts.index', $data);
    }


}
