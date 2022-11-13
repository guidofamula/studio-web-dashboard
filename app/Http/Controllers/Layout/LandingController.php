<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class LandingController extends Controller
{
    public function homePage()
    {
        return view('landing.home-page.home');
    }

    public function blogPage()
    {
        return view('landing.blog-page.blog', [
            'posts' => Post::publish()->latest()->paginate(9)
        ]);
    }

    public function showPostDetail($slug)
    {
        $post = Post::publish()->with(['categories', 'tags'])->where('slug', $slug)->first();
        $categories = $post->categories;
        $tags = $post->tags;

        if(!$post) {
            return redirect()->route('landing.blog');
        }

        return view('landing.blog-page.post-detail', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
