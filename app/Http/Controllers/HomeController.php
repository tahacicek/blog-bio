<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index($id)
    {
        dd($id);

        return redirect()->route('dashboard');
    }

    public function dashboard($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $id = $user->id;


        return view('pages.dashboard.index', compact('user', 'id'));
    }

    public function profile($username)
    {
        $id = Auth::user()->username;
        return redirect()->route('profile.edit', $id);
    }
}
