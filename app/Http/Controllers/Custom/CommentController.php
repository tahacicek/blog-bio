<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentAction;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->id;
        $comment->user_id = $request->user;
        if ($request->parent_id) {
            $comment->parent_id = $request->parent_id;
        }
        $comment->comment = $request->comment;
        $comment->save();

        $commentAction = new CommentAction();
        $commentAction->post_id = $request->id;
        $commentAction->comment_id = $comment->id;
        $commentAction->save();

        $user = User::where('id', $comment->user_id)->first();

        return response()->json([
            'comment' => $comment,
            'user' => $user,
            'success' => true,
        ]);
    }

    public function user_get(Request $request)
    {
        $users = User::where('username', 'like', '%' . $request->search . '%')->get();
        return response()->json([
            'users' => $users,
            'success' => true,
        ]);
    }

    public function delete(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        $parent = Comment::where('parent_id', $request->id)->first();
        $commentAction = CommentAction::where('comment_id', $request->id)->first();
        if ($comment->comment == 0 && $parent == null) {
            $message = 1;
            if ($comment->comment == 0 && $parent != null) {
                $message = 0;
            } else {
                if ($parent == null) {
                    $comment->delete();
                    $message = 1;
                } else {
                    $comment->comment = 0;
                    $commentAction->action = null;
                    $commentAction->report_reason = null;
                    $commentAction->reblog = null;
                    $commentAction->user_id = null;
                    $comment->save();
                    $message = 2;
                }
            }
        }
        return response()->json([
            'success' => true,
            'comment' => $comment,
            'message' => $message,
        ]);
    }
}
