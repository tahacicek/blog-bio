<div class="d-flex">
    <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
        <img class="img-avatar img-avatar32 img-avatar-thumb"
            src="{{ asset($user->avatar) }}" alt="">
    </a>
    <div class="flex-grow-1">
        <p class="mb-1">
            <a class="fw-semibold" id="user" href="javascript:void(0)">{{ $user->name }} {{ $user->surname }} </a>diyo ki
            <br>
            {{ $comment->comment }}
        </p>
        <p>
            <a class="me-1" href="javascript:void(0)">Beğen</a>
            <a href="javascript:void(0)">Yorum</a>
        </p>
        <div class="d-flex">
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
        </div>
    </div>
</div>
