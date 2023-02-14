<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;
use Illuminate\Support\Str;
class PostController extends Controller
{

    public function index($username){

        $user = User::where('username', $username)->firstOrFail();
        $user->username != Auth::user()->username ? abort(404) : null;
        $id = $user->id;
        $tags = Tag::where('user_id', $id)->orderBy('count', 'desc')->get();
        return view('pages.post.index', compact('tags'));
    }

    public function insert(Request $request){

        $post = new Post();
            $image_name = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('uploads/post'), $image_name);
            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->excerpt = $request->excerpt;
            $post->cover_image =  'uploads/post/' . $image_name;
            $post->slug = Str::slug($request->title, '-', Str::random(5));
            if($request->visibility){
                $post->published_at = $request->published_at;
                $post->status = 'draft';
            }
            if($request->deleted_at){
                $post->deleted_at = $request->deleted_at;
            }
            $post->published_at = $request->published_at;
            $post->deleted_at = $request->deleted_at;
            $post->save();

            if($post->save()){
                for($i = 0; $i < count($request->tags); $i++){
                    $tags = new Tag();
                    $tags->user_id = Auth::user()->id;
                    $tags->post_id = $post->id;
                    $tags->name = $request->tags[$i];
                    $tags->slug = Str::slug($request->tags[$i]);
                    $post->count += 1;
                    $tags->save();
                }
            }
            return response()->json([
                'message' => 'Post created successfully',
                'post' => $post
            ], 201);
    }
}
