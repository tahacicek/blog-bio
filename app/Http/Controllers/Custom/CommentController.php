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

        $user = User::where('id', $comment->user_id)->first();


        return response()->json([
            'comment' => $comment,
            'user' => $user,
            'success' => true,
        ]);

    }

    public function user_get(Request $request){

        //request->search'a göre kullanıcıları getir
        $users = User::where('username', 'like', '%' . $request->search . '%')->get();
        return response()->json([
            'users' => $users,
            'success' => true,
        ]);

    }

    public function delete(Request $request){
        $comment = Comment::where('id', $request->id)->first();
        $parent = Comment::where('parent_id', $request->id)->first();
        //eğer gelen id'nin parent_id'si varsa onu silme
        if($comment->comment == 0){
           $message = 0;
        }else{
        if($parent->id == null){
            $comment->delete();
        }else{
            $comment->comment = 0;
            $comment->save();
        }
    }
        return response()->json([
            'success' => true,
            'comment' => $comment,
            'message' => $message,
        ]);
    }

}
