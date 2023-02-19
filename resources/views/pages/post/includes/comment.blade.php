<style>
    a {
        color: #82b440;
        text-decoration: none;
    }

    .blog-comment::before,
    .blog-comment::after,
    .blog-comment-form::before,
    .blog-comment-form::after {
        content: "";
        display: table;
        clear: both;
    }

    .blog-comment {}

    .blog-comment ul {
        list-style-type: none;
        padding: 0;
    }

    .blog-comment img {
        opacity: 1;
        filter: Alpha(opacity=100);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
    }

    .blog-comment img.avatar {
        position: relative;
        float: left;
        margin-left: 0;
        margin-top: 0;
        width: 65px;
        height: 65px;
    }

    .blog-comment .post-comments {
        border: 1px solid #eee;
        margin-bottom: 20px;
        margin-left: 85px;
        margin-right: 0px;
        padding: 10px 20px;
        position: relative;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        background: #fff;
        color: #6b6e80;
        position: relative;
    }

    .blog-comment .meta {
        font-size: 13px;
        color: #aaaaaa;
        padding-bottom: 8px;
        margin-bottom: 10px !important;
        border-bottom: 1px solid #eee;
    }

    .blog-comment ul.comments ul {
        list-style-type: none;
        padding: 0;
        margin-left: 85px;
    }

    .blog-comment-form {
        padding-left: 15%;
        padding-right: 15%;
        padding-top: 40px;
    }

    .blog-comment h3,
    .blog-comment-form h3 {
        margin-bottom: 40px;
        font-size: 26px;
        line-height: 30px;
        font-weight: 800;
    }
</style>
<div class="d-flex">
    <div class="container-fluid bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <hr />
                    <ul class="comments">
                        <li class="clearfix">
                           <a href=""> <img src="{{ asset($comment->user->avatar) }}" class="avatar" alt=""></a>
                            <div class="post-comments">
                                <p class="meta">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} <a href="#">{{ '@'.$comment->user->username }}</a> diyo ki : <i
                                        class="float-end"><a href="#"><small>Şikayet Et</small></a></i></p>
                                <p>
                                  {!! $comment->comment !!}
                                </p>
                                <hr>
                                @if ($comment->user->id == Auth::user()->id)
                                    <button class="float-end border-0 btn-outline-dark bg-white"><i
                                            class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                                @endif
                                <button class="float-end border-0 me-1 bg-white"><i
                                        class="fa  fa-thumbs-down text-secondary" aria-hidden="true"></i></button>
                                <button class="float-end border-0 me-1  bg-white"><i
                                        class="fa fa-thumbs-up text-secondary" aria-hidden="true"></i></button>
                                <button id="{{ $comment->id }}"
                                    class="float-end border-0 me-1 text-center bg-white reply"><i
                                        class="fa fa-reply text-black" aria-hidden="true"></i></button>

                                <div class="mb-2 mt-5 reply_form" id="reply_form{{ $comment->id }}"
                                    style="display:none">
                                    <form id="commentParent" method="POST" onsubmit="return false;">
                                        <div class="input-group">
                                            <input type="hidden" id="parent_id" value="{{ $comment->id }}">
                                            <input type="hidden" id="post_id" value="{{ $comment->post_id }}">
                                            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text" id="comments"
                                                class=" form-control-sm form-control form-control-alt " name="comment"
                                                placeholder="{{ '@' . $comment->user->username }} kullanıcısnın yorumuna müdahil oluyor musun?"
                                                style="font-size: none">
                                            <button type="submit" class="btn-sm btn-block btn btn-secondary"><i
                                                    class="fa fa-reply" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                    <div class="row" >
                                        <div class="col-md-12 mt-2" id="userList2">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach ($comment->children as $child)
                                <ul class="comments">
                                    <li class="clearfix">
                                       <a href=""> <img src="{{ asset($child->user->avatar) }}" class="avatar"
                                        alt=""></a>
                                        <div class="post-comments">
                                            <p class="meta">{{ \Carbon\Carbon::parse($child->created_at)->diffForHumans() }} <a href="#">{{ '@'.$child->user->username }}</a> diyo ki : <i
                                                    class="float-end"><a href="#"><small>Şikayet Et</small></a></i></p>
                                            <p>
                                              {!! $child->comment !!}
                                            </p>
                                            <hr>
                                            @if ($comment->user->id == Auth::user()->id)
                                                <button class="float-end border-0 btn-outline-dark bg-white"><i
                                                        class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                                            @endif
                                            <button class="float-end border-0 me-1 bg-white"><i
                                                    class="fa  fa-thumbs-down text-secondary"
                                                    aria-hidden="true"></i></button>
                                            <button class="float-end border-0 me-1  bg-white"><i
                                                    class="fa fa-thumbs-up text-secondary"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
