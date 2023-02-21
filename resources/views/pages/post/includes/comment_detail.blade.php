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
            </a>


                 <div class="float-end">
                    @if ($uniq->postActions[0]->action == 'like')
                        <i class="fa fa-thumbs-up text-success" aria-hidden="true"></i>
                    @endif
                    @if ($uniq->postActions[0]->action == 'dislike')
                        <i class="fa fa-thumbs-down text-danger" aria-hidden="true"></i>
                    @endif
                    @if ($uniq->postActions[0]->bookmark_url != null)
                        <i class="fa fa-bookmark text-primary" aria-hidden="true"></i>
                    @endif
                    @if ($uniq->postActions[0]->reblog != null)
                        <i class="fa fa-retweet text-primary" aria-hidden="true"></i>
                    @endif
                    @php
                        $commentCount = count($uniq->comments)
                    @endphp
                    @if ($commentCount > 0)
                        <i class="fa fa-comment text-primary text-sm" aria-hidden="true"></i>
                        <span class="text-primary">{{ $commentCount }}</span>
                    @endif
                 </div>
                </div>

            <span class="text-xs text-secondary"><i>18 dakika önce</i></span>
        </div>
        <hr>

    @endforeach
</div>
