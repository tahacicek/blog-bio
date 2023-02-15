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

//eğer kullanıcı daha önce like yapmışsa beğendirme
        $postAction = PostAction::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        if ($postAction) {
            $postAction->action = 'like';
            $postAction->save();
        } elseif ($postAction)
            $postAction->action == 'like' ? $postAction->action = 'dislike' : $postAction->action = 'like';
        else {
            $postAction = new PostAction;
            $postAction->post_id = $postId;
            $postAction->user_id = $userId;
            $postAction->action = 'like';
            $postAction->save();
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

        if ($postAction) {
            $postAction->action = 'dislike';
            $postAction->save();
        }elseif($postAction)
            $postAction->action == 'like' ? $postAction->action = 'dislike' : $postAction->action = 'like';
        else {
            $postAction = new PostAction;
            $postAction->post_id = $postId;
            $postAction->user_id = $userId;
            $postAction->action = 'dislike';
            $postAction->save();
        }


        $disslikeCount = PostAction::where('post_id', $postId)
            ->where('action', 'dislike')
            ->count();

        return response()->json(['success' => true, 'disslikeCount' => $disslikeCount]);
    }
}
