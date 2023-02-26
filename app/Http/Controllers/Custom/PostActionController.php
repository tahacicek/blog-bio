<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostAction;
use App\Models\Reblog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $disslikeCount = PostAction::where('post_id', $postId)
            ->where('action', 'dislike')
            ->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount, 'disslikeCount' => $disslikeCount]);
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
        $likeCount = PostAction::where('post_id', $postId)
            ->where('action', 'like')
            ->count();
        if ($disslikeCount > 0) {
            return response()->json(['success' => true, 'disslikeCount' => $disslikeCount, 'likeCount' => $likeCount]);
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

    public function reblogPost(Request $request)
    {
        $postId = $request->id;
        $userId = $request->user;
        $post = Post::find($postId);
        $user = User::where('id', $post->user_id)->first();
        return response()->json(['success' => true, 'data' => view('pages.post.includes.reblog', compact('post', 'user'))->render()], 200);
    }

    public function reblogForm(Request $request)
    {
        $postId = $request->post_id;
        $post = Post::find($postId);

        $tags = explode(',', $request->comment);
        $tags = array_map('trim', $tags);
        $tags = array_filter($tags);
        $tags = array_unique($tags);
        $tags = array_map('trim', $tags);
        $tags = array_map(function ($tag) {
            return '#' . $tag;
        }, $tags);


        $reblog = new Reblog();
        $reblog->user_id = Auth::user()->id;
        $reblog->post_id = $postId;
        $reblog->post_user_id = $post->user_id;
        $reblog->body = $request->body . ' ' . implode(' ', $tags);
        $reblog->save();

        $postAction = PostAction::where('post_id', $postId)
            ->where('user_id', Auth::user()->id)
            ->first();

        $postAction->reblog = 'reblog';
        $postAction->reblog_count = $postAction->reblog_count + 1;
        $postAction->save();

        $reblogCount = $postAction->reblog_count;

        return response()->json(['success' => true, 'reblogCount' => $reblogCount]);
    }
}
