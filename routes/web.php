<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\admin\DashbordController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin/')->middleware([CheckAdmin::class, 'verified'])->name('admin.')->group(function() {
    Route::get('index', DashbordController::class)->name('index');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('post/breaking-news/{post}', [PostController::class, 'breakingNews'])->name('post.breaking-news');
    Route::get('post/selected/{post}', [PostController::class, 'selected'])->name('post.selected');
    Route::resource('banner', BannerController::class);
    Route::resource('comment', CommentController::class);
    Route::get('comment/approve/{comment}', [CommentController::class, 'commentApprove'])->name('comment.approve');
    Route::resource('user', UserController::class);
    Route::get('user/change-status/{user}', [UserController::class, 'changeStatus'])->name('user.change-status');
    Route::get('webSetting/index', [WebSettingController::class, 'index'])->name('webSetting.index');
    Route::get('webSetting/set/{id}', [WebSettingController::class, 'setWebSettingIndex'])->name('webSetting.setIndex');
    Route::post('webSetting/set/{id}', [WebSettingController::class, 'setWebSetting'])->name('webSetting.set');
    Route::resource('menu', MenuController::class);
});


// app routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show/{post}', [HomeController::class, 'show'])->name('show');
Route::post('/store_comment/{post}', [HomeController::class, 'storeComment'])->name('store.comment');
