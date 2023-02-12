<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, $username)
    {
        $id = $request->user()->username;
        $user = User::where('username', $id)->first() ?? abort(404);
        $username = $user->username;
        return view('pages.post.index', compact('username'));
    }

    public function create()
    {
        return view('pages.post.create');
    }
}
