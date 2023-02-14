<?php

use App\Http\Controllers\Custom\PostController;
use App\Http\Controllers\custom\UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/index', [HomeController::class, 'index'])->name('user.index');

Route::middleware('auth')->group(function () {
    Route::get('/ayarlar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/ayarlar', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/ayarlar', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post/{username}', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/olustur', [PostController::class, 'insert'])->name('post.insert');

    Route::get('/blog/{username}', [PostController::class, 'blogboard'])->name('post.blogboard');
});

Route::get('{username}', [HomeController::class, 'dashboard'])->name('user.dashboard');
