<style>

</style>
<div class="d-flex">
    <div class="container-fluid bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <hr />
                    <ul class="comments" >
                        <li class="clearfix" id="comment{{ $comment->id }}">
                           <div>
                            <a href=""> <img src="{{ asset($comment->user->avatar) }}" class="avatar" alt=""></a>
                            <div class="post-comments">
                                <p class="meta">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} <a href="#">{{ '@'.$comment->user->username }}</a> diyo ki : <i
                                        class="float-end"><a href="#"><small>Şikayet Et</small></a></i></p>
                                <p id="comment_statu{{ $comment->id }}">
                                  @if ($comment->comment == 0)
                                   Bu yorum silinmiştir.
                                      @else
                                      {!! $comment->comment !!}
                                  @endif
                                </p>
                                <hr>
                                @if ($comment->user->id == Auth::user()->id)
                                    <button type="button" id="{{ $comment->id }}" class="comment_trash float-end border-0 btn-outline-dark bg-white"><i
                                            class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                                @endif
                                <button type="button" id="{{ $comment->id }}" user="{{ Auth::user()->id }}" post="{{ $comment->post_id }}" class=" comment_dislike float-end border-0 me-1 bg-white"><i
                                        class="fa  fa-thumbs-down comment_dislikes{{ $comment->id }} text-secondary" aria-hidden="true"></i><span class="badge text-dark badge-secondary p-2 dislike_point{{ $comment->id }}">2</span></button>
                                <button id="{{ $comment->id }}" user="{{ Auth::user()->id }}"  post="{{ $comment->post_id }}" class="comment_like float-end border-0 me-1  bg-white"><i
                                        class="fa fa-thumbs-up comment_likes{{ $comment->id }} text-secondary" aria-hidden="true"></i><span class="badge text-dark badge-secondary p-2 like_point{{ $comment->id }}">2</span></button>
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

                           </div>
                            @foreach ($comment->children as $child)
                                <ul class="comments" id="comment{{ $child->id }}">
                                    <li class="clearfix">
                                       <a href=""> <img src="{{ asset($child->user->avatar) }}" class="avatar"
                                        alt=""></a>
                                        <div class="post-comments">
                                            <p class="meta">{{ \Carbon\Carbon::parse($child->created_at)->diffForHumans() }} <a href="#">{{ '@'.$child->user->username }}</a> diyo ki : <i
                                                    class="float-end"><a href="#"><small>Şikayet Et</small></a></i></p>
                                            <p >
                                              {!! $child->comment !!}
                                            </p>
                                            @if ($child->user->id == Auth::user()->id)
                                            <button type="button" id="{{ $child->id }}" class="comment_trash float-end border-0 btn-outline-dark bg-white"><i
                                                        class="fa text-danger fa-trash" aria-hidden="true"></i></button>
                                            @endif
                                            <button id="{{ $child->id }}" user="{{ Auth::user()->id }}"  post="{{ $child->post_id }}" class=" comment_dislike float-end border-0 me-1 bg-white"><i
                                                    class="fa comment_dislikes{{ $child->id }} fa-thumbs-down text-secondary"
                                                    aria-hidden="true"></i><span class="badge text-dark badge-secondary p-2 dislike_point{{ $comment->id }}">2</span></button>
                                            <button id="{{ $child->id }}" user="{{ Auth::user()->id }}"  post="{{ $child->post_id }}" class="comment_like float-end border-0 me-1  bg-white"><i
                                                    class="fa comment_likes{{ $child->id }} fa-thumbs-up text-secondary"
                                                    aria-hidden="true"></i><span class="badge text-dark badge-secondary p-2 like_point{{ $comment->id }}">2</span></button>
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
