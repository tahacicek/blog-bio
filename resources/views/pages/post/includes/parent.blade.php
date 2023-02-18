<div class="mb-2 mt-2 reply_form" id="reply_form{{ $comment->id }}" style="display:none">
    <form id="commentParent" method="POST" onsubmit="return false;">
        <div class="input-group">
            <input type="hidden" id="parent_id" value="{{ $comment->id }}">
            <input type="hidden" id="post_id" value="{{ $comment->post_id }}">
            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
            <input type="text" id="comments" class=" form-control-sm form-control form-control-alt "
                name="comment" placeholder="{{ '@' . $comment->user->username }} kullanıcısına cevap veriyorsun.."
                style="font-size: none">
            <button type="submit" class="btn-sm btn-block btn btn-secondary"><i class="fa fa-reply"
                    aria-hidden="true"></i></button>
        </div>
    </form>
</div>
<div class="d-flex mt-4" id="parent_detail">
    <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
        <img class="img-avatar img-avatar32 img-avatar-thumb"
            src="{{ asset($comment->user->avatar) }}" alt="">
    </a>
    <div class="flex-grow-1">
        <p class="mb-1">
            <a class="fw-semibold" href="javascript:void(0)">{{ '@'.$comment->user->username }}</a>
           <p>
            {{ $comment->comment  }}
           </p>
        </p>
    </div>
</div>
</div>
</div>
{{-- pagination --}}

