<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostAction;
use Illuminate\Http\Request;

class PostActionController extends Controller
{
    public function likePost(Request $request)
    {
        $postId = $request->id;
        $userId = $request->user;
        $postAction = PostAction::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();
        if ($postAction) {
            if ($postAction->action == 'like') {
                return response()->json(['success' => false]);
            } else {
                if ($postAction) {
                    $postAction->action = 'like';
                    $postAction->save();
                } elseif ($postAction)
                    $postAction->action == 'like' ? $postAction->action = 'dislike' : $postAction->action = 'like';
            }
        }
        $likeCount = PostAction::where('post_id', $postId)
            ->where('action', 'like')
            ->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount]);
    }

    public function dislikePost(Request $request)
    {
        $postId = $request->id;
        $userId = $request->user;
        $postAction = PostAction::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();
        if ($postAction->action == 'dislike') {
            return response()->json(['success' => false]);
        } else {
            if ($postAction) {
                $postAction->action = 'dislike';
                $postAction->save();
            } elseif ($postAction)
                $postAction->action == 'like' ? $postAction->action = 'dislike' : $postAction->action = 'like';
        }
        $disslikeCount = PostAction::where('post_id', $postId)
            ->where('action', 'dislike')
            ->count();
        if ($disslikeCount > 0) {
            return response()->json(['success' => true, 'disslikeCount' => $disslikeCount]);
        } else {
            return response()->json(['success' => false, 'disslikeCount' => $disslikeCount]);
        }
    }

    public function bookmarkPost(Request $request)
    {
        $postId = $request->id;
        $userId = $request->user;
        $post = Post::find($postId);
        if ($post->user_id == $userId) {
            return response()->json(['success' => false, 'message' => 'Kendi yazdığınız yazıyı işaretleyemezsiniz.']);
        }
        $id = $post->id;
        $postAction = PostAction::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();
        if ($postAction->bookmark_url != null) {
            return response()->json(['success' => false]);
        } else {
            if ($postAction) {
                $postAction->bookmark_url = $id;
                $postAction->save();
            }
        }
        $bookmarkCount = PostAction::where('post_id', $postId)
            ->where('action', 'bookmark')
            ->count();
        return response()->json(['success' => true, 'bookmarkCount' => $bookmarkCount]);
    }
}
