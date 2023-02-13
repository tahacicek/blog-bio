<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        //giriş yapmış kullanıcıyı alır.
        $user = Auth::user();
        //giriş yapmış kullanıcının postlarını alır.
        $posts = $user->posts;
        //post with tags
        $postsWithTags = $user->posts->load('tags');
        dd($postsWithTags);
        return view('pages.user.dashboard');
    }
}
