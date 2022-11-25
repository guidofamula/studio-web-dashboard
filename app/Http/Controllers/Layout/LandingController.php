<?php

namespace App\Http\Controllers\Layout;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function homePage()
    {
        return view('landing.home-page.home', [
            'posts' => Post::publish()->latest()->paginate(3),
        ],
        $this->footerAttributes(),
    );
    }

    public function blogPage(Request $request)
    {
        $posts = Post::latest()->paginate(6);
        $search = $request->keyword;

        if($search != "") {
            $posts = Post::where(function($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->paginate(6);
            $posts->appends(['keyword' => $search]);
        }
        else {
            $posts = Post::latest()->paginate(6)->appends(['keyword' => $request->get('keyword')]);
        }

        return view('landing.blog-page.blog', [
            'posts' => $posts
        ],
        $this->footerAttributes()
    );
    }

    public function showPostDetail($slug)
    {
        $post = Post::publish()->with(['categories', 'tags'])->where('slug', $slug)->first();
        $categories = $post->categories;
        $tags = $post->tags;

        // Related post by category start
        $postRelated = Post::where('slug', '=', $slug)->first();
        $related_category = $post->categories()->pluck('categories.id');
        $related_posts = Post::whereHas('categories', function ($q) use($related_category) {
            $q->whereIn('category_id', $related_category);
        })
        ->where('id', '<>', $post->id)
        ->take(3)
        ->get();
        // Related post by category end


        $next_id = Post::publish()->where('id', '>', $post->id)->min('id');
        $prev_id = Post::publish()->where('id', '<', $post->id)->max('id');

        if(!$post) {
            return redirect()->route('landing.blog');
        }

        return view('landing.blog-page.post-detail', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'next' => Post::find($next_id),
            'previous' => Post::find($prev_id),
            'relatedPost' => $related_posts,
        ],
        $this->footerAttributes()
    );
    }

    public function showPostsByCategory($slug)
    {
        $posts = Post::publish()->whereHas('categories', function ($query) use($slug) {
            return $query->where('slug', $slug);
        })->latest()->paginate(6);

        $category = Category::where('slug', $slug)->first();

        $categories = Category::all();

        return view('landing.blog-page.postsByCategory', [
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
        ],
        $this->footerAttributes()
    );
    }

    public function showPostsByTag($slug)
    {
        $posts = Post::publish()->whereHas('tags', function ($query) use($slug) {
            return $query->where('slug', $slug);
        })->latest()->paginate(6);

        $tag = Tag::where('slug', $slug)->first();

        $tags = Tag::all();

        return view('landing.blog-page.postsByTag', [
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags,
        ],
        $this->footerAttributes()
    );
    }

    public function showCategories()
    {
        return view('landing.blog-page.categories', [
            'categories' => Category::latest()->paginate(6),
        ],
        $this->footerAttributes()
    );
    }

    public function showTags()
    {
        return view('landing.blog-page.tags', [
            'tags' => Tag::latest()->paginate(8),
        ],
        $this->footerAttributes()
    );
    }

    public function aboutPage()
    {
        return view('landing.about-page.about', $this->footerAttributes());
    }

    private function footerAttributes()
    {
        return [
            'footerCategories' => Category::latest()->paginate(6),
            'footerTags' => Tag::latest()->paginate(6),
        ];
    }
}
