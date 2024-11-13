<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashbordController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin/')->name('admin.')->group(function() {
    Route::get('index', DashbordController::class)->name('index');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('post/breaking-news/{post}', [PostController::class, 'breakingNews'])->name('post.breaking-news');
    Route::get('post/selected/{post}', [PostController::class, 'selected'])->name('post.selected');
    Route::resource('banner', BannerController::class);
});
