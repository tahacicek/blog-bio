<?php

use App\Http\Controllers\Custom\CommentActionController;
use App\Http\Controllers\Custom\CommentController;
use App\Http\Controllers\Custom\PostActionController;
use App\Http\Controllers\Custom\PostController;
use App\Http\Controllers\Custom\ProjectController;
use App\Http\Controllers\custom\UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\CommentAction;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(Auth::check()){
    Route::get('/',[ UserDashboardController::class, 'index'])->name('user.homepage');

}else{
    Route::get('/', function () {
        return view('welcome');
    });
}

require __DIR__.'/auth.php';


//gelen $username'lar eğer bir yola uyuşuyorsa ona göre yönlendirme yapar.

//sayfa yenilendiğinde cache clear edilir.

Broadcast::routes(['middleware' => ['auth:sanctum']]);
require base_path('routes/channels.php');

Route::get('/index', [HomeController::class, 'index'])->name('user.index');

Route::middleware('auth')->group(function () {
    Route::get('/ayarlar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/ayarlar', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/ayarlar', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post/{username}', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/olustur', [PostController::class, 'insert'])->name('post.insert');

    Route::get('/blog/{username}', [PostController::class, 'blogboard'])->name('post.blogboard');
    Route::get('/post/{username}/{slug}', [PostController::class, 'show'])->name('post.show');

    Route::post('/post/begen', [PostActionController::class, 'likePost'])->name('post.like');
    Route::post('/post/begenme', [PostActionController::class, 'dislikePost'])->name('post.dislike');
    Route::post('/post/bookmark', [PostActionController::class, 'bookmarkPost'])->name('post.bookmark');
    Route::post('/post/reblog', [PostActionController::class, 'reblogPost'])->name('post.reblog');

    Route::post('/post/yorum', [CommentController::class, 'comment'])->name('post.comment');
    Route::post('/post/yorum/sil', [CommentController::class, 'delete'])->name('post.comment.delete');

    Route::get('/biolog/username', [CommentController::class, 'user_get'])->name('user.get');

    Route::post('/post/yorum/begen', [CommentActionController::class, 'likeComment'])->name('comment.like');
    Route::post('/post/yorum/begenme', [CommentActionController::class, 'dislikeComment'])->name('comment.dislike');
    Route::get('/post/yorum/detay', [CommentActionController::class, 'action_detail'])->name('comment.detay');

    Route::post('/post/comment/detail', [CommentActionController::class, 'comment_detail'])->name('comment.detail');

    //project routes
    Route::get('/proje/{username}', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/proje/func', [ProjectController::class, 'func'])->name('project.func');
});

Route::get('{username}', [HomeController::class, 'dashboard'])->name('user.dashboard');
