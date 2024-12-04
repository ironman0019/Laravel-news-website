<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        $breakingNews = Post::latest()->where('breaking_news', 1)->limit(1)->first();

        $lastPosts = Post::latest()->limit(5)->get();

        $popularPosts = Post::orderBy('view', 'desc')->limit(3)->get();

        $adsBanner = Banner::latest()->limit(1)->first();


        return view('app.index', compact('breakingNews', 'lastPosts', 'popularPosts', 'adsBanner'));
    }

    public function show(Post $post)
    {
        return view('app.show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = Post::latest()->where('category_id', $category->id)->get();
        return view('app.category', compact('posts', 'category'));
    }

    public function storeComment(Post $post, Request $request)
    {
        if(Auth::check()) {

            $inputs = $request->validate([
                'body' => 'required|min:3|max:500|string'
            ]);

            $inputs['post_id'] = $post->id;
            $inputs['user_id'] = Auth::user()->id;

            Comment::create($inputs);
            return back()->with('swal-success', 'نظر ثبت شد و پس از تایید نمایش داده میشود');

        } else {
            return back();
        }
    }

    public function search()
    {
        $posts = Post::latest()->filter(request(['search']))->get();
        return view('app.search', compact('posts'));
    }
}
