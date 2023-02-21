<style>
    .avatar img {
        opacity: 1;
        filter: Alpha(opacity=100);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
    }

    .user img.avatar {
        position: relative;
        float: left;
        margin-left: 0;
        margin-top: 0;
        width: 20px;
        height: 20px;
    }

    hr {
        margin-top: 1px;

    }
</style>

<div class="row">
    @foreach ($uniqUsernames as $uniq)
        <div class="user mb-2">
            <a class="text-primary mt-2" href="/{{ $uniq->username }}">
                <img src="{{ $uniq->avatar }}" alt="" class="avatar rounded-circle mt-1 me-1">
                <div class="text-primary text-sm">{{ '@' . $uniq->username }}
                 <div class="float-end">
                    <i class="fa text-danger fa-retweet" aria-hidden="true"></i>
                    <i class="fa fa-thumbs-up text-success" aria-hidden="true"></i>
                    <i class="fa fa-bookmark text-danger" aria-hidden="true"></i>
                    <i class="fa fa-thumbs-down text-danger" aria-hidden="true"></i>

                 </div>
                </div>

            </a>
            <span class="text-xs text-secondary"><i>18 dakika önce</i></span>
        </div>
        <hr>

    @endforeach
</div>
