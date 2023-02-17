<style>
    .hrs{
        border-top-color: black;
    }
</style>
{{-- for reply for --}}

<hr class="hrs">
<div class="d-flex mb-2">
    <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
        <img class="img-avatar img-avatar32 img-avatar-thumb"
            src="{{ asset($comment->user->avatar) }}" alt="">
    </a>
    <div class="flex-grow-1">
        <div class="">
            <a class="fw-semibold" id="user" href="javascript:void(0)">{{ '@'. $comment->user->username }} </a>diyo ki @if ($comment->user->id == Auth::user()->id)
            <button class="float-end border-0 btn-outline-dark bg-white"><i class="fa text-danger fa-trash" aria-hidden="true"></i></button>
            <button class="float-end border-0 me-1  bg-white"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></button>
            <button class="float-end border-0 me-1 bg-white"><i class="fa  fa-thumbs-down text-secondary" aria-hidden="true"></i></button>
            <button class="float-end border-0 me-1  bg-white"><i class="fa fa-thumbs-up text-secondary" aria-hidden="true"></i></button>
            <button  id="{{ $comment->id }}" class="float-end border-0 me-1 text-center bg-white reply"><i class="fa fa-reply text-black" aria-hidden="true"></i></button>

            @endif
            <br>
           <div class="m-1"> {{ $comment->comment }}</div>
        </div>
        <div class="mb-2 mt-2 reply_form" id="reply_form{{ $comment->id }}" style="display:none">
            <div class="input-group">
              <input data-id="{{ Auth::user()->id }}" id="comment" type="text" class=" form-control-sm form-control form-control-alt " name="body" placeholder="{{ '@'.$comment->user->username}} kullanıcısına cevap veriyorsun.." style="font-size: none">
              <button type="submit" class="btn-sm btn-block btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i></button>
            </div>
          </div>

    </div>
</div>
{{-- <div class="d-flex">
    <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
        <img class="img-avatar img-avatar32 img-avatar-thumb"
            src="assets/media/avatars/avatar9.jpg" alt="">
    </a>
    <div class="flex-grow-1">
        <p class="mb-1">
            <a class="fw-semibold" href="javascript:void(0)">Brian Cruz</a>
            Odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
            in faucibus.
        </p>
        <p>
            <a class="me-1" href="javascript:void(0)">Like</a>
            <a href="javascript:void(0)">Comment</a>
        </p>
    </div>
</div> --}}


