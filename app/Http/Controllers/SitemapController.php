<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\Sitemap\Sitemap;
use Illuminate\Http\Request;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function sitemapGenerator()
    {
        $sitemap = Sitemap::create()->add(Url::create('/about'))
                                    ->add(Url::create('/blog'));

        $posts = Post::all();
        foreach ($posts as $post) {
            $sitemap->add(Url::create("/post/{$post->slug}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
