<style>

</style>
{{-- for reply for --}}

<hr class="hrs">
<div class="d-flex">
    <div class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
        <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset($comment->user->avatar) }}" alt="">
    </div>
    <div class="flex-grow-1">
        <div class="">
            <a class="fw-semibold" id="user" href="javascript:void(0)">{{ '@' . $comment->user->username }} </a>diyo
            ki
            @if ($comment->user->id == Auth::user()->id)
                <button class="float-end border-0 btn-outline-dark bg-white"><i class="fa text-danger fa-trash"
                        aria-hidden="true"></i></button>
            @endif
            <button class="float-end border-0 me-1 bg-white"><i class="fa  fa-thumbs-down text-secondary"
                    aria-hidden="true"></i></button>
            <button class="float-end border-0 me-1  bg-white"><i class="fa fa-thumbs-up text-secondary"
                    aria-hidden="true"></i></button>
            <button id="{{ $comment->id }}" class="float-end border-0 me-1 text-center bg-white reply"><i
                    class="fa fa-reply text-black" aria-hidden="true"></i></button>
            <br>
            <div  class="m-1">{!! $comment->comment !!}
            </div>
            <div class="border-top border-bottom p-2">
                {{ $comment->created_at->diffForHumans()  }}
            </div>

        </div>
        <div class="mb-2 mt-2 reply_form" id="reply_form{{ $comment->id }}" style="display:none">
            <form id="commentParent" method="POST" onsubmit="return false;">
                <div class="input-group">
                    <input type="hidden" id="parent_id" value="{{ $comment->id }}">
                    <input type="hidden" id="post_id" value="{{ $comment->post_id }}">
                    <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="text" id="comments" class=" form-control-sm form-control form-control-alt "
                        name="comment"
                        placeholder="{{ '@' . $comment->user->username }} kullanıcısına cevap veriyorsun.."
                        style="font-size: none">
                    <button type="submit" class="btn-sm btn-block btn btn-secondary"><i class="fa fa-reply"
                            aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
        <div class="row" >
            <div class="col-md-12 m-2" id="userList2">

            </div>
        </div>
       <div>
        @foreach ($comment->children as $child)
        <div class="d-flex" id="parent_detail" style="display: none">
            <a class="flex-shrink-0 img-link me-1" href="javascript:void(0)" >
                <img class="rounded-circle img-avatar img-avatar32 img-avatar-thumb"
                    src="{{ asset($child->user->avatar) }}" alt="">
            </a>
            <div class="flex-grow-1">
                <p class="mb-1">
                    <a class="fw-semibold" href="javascript:void(0)">{{ '@' . $child->user->username }}</a>
                <p id="comment_user">
                   {!! $child->comment !!}
                </p>

                </p>
            </div>
        </div>
    @endforeach
       </div>
    </div>
</div>
