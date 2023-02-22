<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->username != Auth::user()->username ? abort(404) : null;
        $todos = Todo::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('pages.project.show', ['todos' => $todos]);
    }
}
