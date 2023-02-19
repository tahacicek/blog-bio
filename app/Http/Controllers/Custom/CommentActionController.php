<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentAction;
use Illuminate\Http\Request;

class CommentActionController extends Controller
{
    public function likeComment(Request $request)
    {
        $comment_id = $request->id;
        $post_id = $request->post;
        $user_id = $request->user;
        $comment = Comment::where('id', $comment_id)->first();
        if ($comment->comment != 0) {
            $commentAction = CommentAction::where('comment_id', $comment_id)->first();
            if ($commentAction->action == 'like') {
                return response()->json(['success' => false]);
            } else {
                $commentAction->action = 'like';
                $commentAction->user_id = $user_id;
                $commentAction->save();
            }
        } else {
            $message = 0;
            return response()->json(['message' => $message]);
        }



        $likeCount = CommentAction::where('comment_id', $comment_id)
            ->where('action', 'like')
            ->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount]);
    }

    public function dislikeComment(Request $request)
    {
        $comment_id = $request->id;
        $post_id = $request->post;
        $user_id = $request->user;
        $comment = Comment::where('id', $comment_id)->first();
        if ($comment->comment != 0) {
            $commentAction = CommentAction::where('comment_id', $comment_id)->first();
        } else {
            $message = 0;
        }

        if ($commentAction->action == 'dislike') {
            return response()->json(['success' => false]);
        } else {
            $commentAction->action = 'dislike';
            $commentAction->user_id = $user_id;
            $commentAction->save();
        }

        $disslikeCount = CommentAction::where('comment_id', $comment_id)
            ->where('action', 'dislike')
            ->count();
        if ($disslikeCount > 0) {
            return response()->json(['success' => true, 'disslikeCount' => $disslikeCount]);
        } else {
            return response()->json(['success' => false, 'disslikeCount' => $disslikeCount]);
        }
    }
}
