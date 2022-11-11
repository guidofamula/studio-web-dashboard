<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    public function home()
    {
        return view('blog.home', [
            'posts' => Post::publish()->latest()->paginate(5),
        ]);
    }

    public function showCategories()
    {
        return view('blog.categories', [
            'categories' => Category::latest()->paginate(5),
        ]);
    }

    public function showTags()
    {
        return view('blog.tags', [
            'tags' => Tag::latest()->paginate(5),
        ]);
    }

    public function searchPosts(Request $request)
    {
        if (! $request->get('keyword')) {
            return redirect()->route('blog.home');
        }

        return view('blog.searchPost', [
            'posts' => Post::publish()->search($request->keyword)
                    ->paginate(5)
                    ->appends(['keyword' => $request->keyword]),
        ]);
    }
}
