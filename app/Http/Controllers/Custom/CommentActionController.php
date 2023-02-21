<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentAction;
use App\Models\PostAction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if ($commentAction->action == 'dislike') {
                return response()->json(['success' => false]);
            } else {
                $commentAction->action = 'dislike';
                $commentAction->user_id = $user_id;
                $commentAction->save();
            }
        } else {
            $message = 0;
            return response()->json(['message' => $message, 'success' => false]);
        }

        $disslikeCount = CommentAction::where('comment_id', $comment_id)
            ->where('action', 'dislike')
            ->count();
        return response()->json(['success' => true, 'disslikeCount' => $disslikeCount]);
    }

    public function comment_detail(Request $request)
    {
        $post_id = $request->id;

        $postAction = PostAction::where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();

        $likeUsers = $postAction->likeUsers($post_id);
        $dislikeUsers = $postAction->dislikeUsers($post_id);
        $readUsers = $postAction->readUsers($post_id);
        $bookmarkUsers = $postAction->bookmarkUrlUsers($post_id);
        $reblogUsers = $postAction->reblogUsers($post_id);

        $uniqUsernames = [];
        foreach ($readUsers as $readUser) {
            $uniqUsernames[] = User::Where('id', $readUser->user_id)->with('postActions')->first();
        }

        return response()->json(['success' => true, 'data', view('pages.post.includes.comment_detail', ['uniqUsernames' => $uniqUsernames])->render()], 200);
    }
}
