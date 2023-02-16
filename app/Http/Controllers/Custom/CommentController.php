<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){
        $comment = new Comment();
        $comment->post_id = $request->id;
        $comment->user_id = $request->user;
        if($request->parent_id){
            $comment->parent_id = $request->parent_id;
        }
        $comment->comment = $request->comment;
        $comment->save();

        $user = User::where('id', $request->user)->first();

        return response()->json([
            'comment' => $comment,
            'user' => $user,
            'success' => true,
        ]);

    }
}
