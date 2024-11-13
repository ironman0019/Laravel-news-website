<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        $inputs['user_id'] = Auth::user()->id;
        $post = Post::create($inputs);

        return to_route('admin.post.index')->with('swal-success', 'پست با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($post->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        $inputs['user_id'] = Auth::user()->id;
        $post->update($inputs);

        return to_route('admin.post.index')->with('swal-success', 'پست با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('admin.post.index')->with('swal-success', 'پست با موفقیت حذف شد');
    }

    public function breakingNews(Post $post)
    {
        if($post->breaking_news === 0) {
            $post->breaking_news = 1;

        } else {
            $post->breaking_news = 0;
        }
        $post->save();
        return back();
    }

    public function selected(Post $post)
    {
        if($post->selected === 0) {
            $post->selected = 1;

        } else {
            $post->selected = 0;
        }
        $post->save();
        return back();
    }
}
