<x-app-layout>
    @push('style')
    @endpush
    <div class="bg-image" style="background-image: url('{{ asset($post->cover_image) }}');">
        <div class="hero bg-black-50">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <h1 class="display-4 fw-bold text-white mb-3">
                        {{ $post->title }}
                    </h1>
                    <h2 class="card">
                        <p id="text"><span>"{{ $post->excerpt }}"</span><br></p>
                    </h2>
                    <p>
                        <span class="badge rounded-pill bg-dark fs-base px-3 py-2 me-2 m-1">
                            <i class="fa fa-user-circle me-1 text"></i>@ {{ $user->username }}
                        </span>
                        <span class="badge rounded-pill bg-dark fs-base px-3 py-2 m-1">
                            <i class="fa fa-clock me-1"></i> {{ $post->reading_time }} dk.
                        </span>
                    </p>
                    <p>
                        @foreach ($tags as $tag)
                            <a href="">
                                <span class="badge rounded-pill bg-dark fs-base px-3 py-2 m-1">
                                    <i class="fa fa-hashtag me-1"></i> {{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                    </p>
                    <div>
                        <a class="btn btn-primary" href="#example-blog-post">
                            <i class="fa fa-fw fa-arrow-down opacity-50 me-1"></i> Şimdi başla..
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="example-blog-post" class="content content-full">
        <div class="row justify-content-center">
            <div class="col-sm-8 py-5">
                <article id="article" class="js-gallery story">
                    {!! $post->content !!}
                </article>
                <div class="mt-5 d-flex justify-content-between push">
                    <div class="btn-group" role="group">
                        <button data-id="{{ $post->id }}" data-user="{{ Auth::user()->id }}" id="like"
                            type="button"
                            class="btn btn-alt-secondary @if ($postAction->action == 'like') text-primary @endif"
                            data-bs-toggle="tooltip" title="Bu Yazıyı Beğendim">
                            <i class="fa fa-thumbs-up"></i>
                        </button>
                        <button id="dislike" data-user="{{ Auth::user()->id }}" data-id="{{ $post->id }}"
                            type="button"
                            class="btn btn-alt-secondary @if ($postAction->action == 'dislike') text-primary @endif"
                            data-bs-toggle="tooltip" title="Bunu Beğenmedim">
                            <i class="fa fa-thumbs-down"></i>
                        </button>
                        <button id="bookmark" data-user="{{ Auth::user()->id }}" data-id="{{ $post->id }}"
                            type="button"
                            class="btn btn-alt-secondary
                        @if ($postAction->bookmark_url != null) text-danger @endif"
                            data-bs-toggle="tooltip" title="Bunu Kaydet">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                        </button>
                        {{-- reblog --}}
                        <button id="reblog" data-user="{{ Auth::user()->id }}" data-id="{{ $post->id }}"
                            type="button"
                            class="btn btn-alt-secondary
                        @if ($postAction->bookmark_url != null) text-danger @endif"
                            data-bs-toggle="tooltip" title="REBİOBLOG">
                            <i class="fa fa-retweet" aria-hidden="true"></i>
                        </button>
                        <div class="btn-group float-end" role="group" data-bs-toggle="tooltip"
                            title="Bunu Paylaşmak İstiyorum">
                            <button type="button" class="btn btn-alt-secondary dropdown-toggle"
                                id="dropdown-blog-report" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                            </button>
                            <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-blog-report">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fab fa-fw fa-facebook me-1"></i> Facebook
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fab fa-fw fa-twitter me-1"></i> Twitter
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fab fa-fw fa-linkedin me-1"></i> LinkedIn
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-alt-secondary dropdown-toggle" id="dropdown-blog-story"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa  fa-flag opacity-50 me-1"></i> Raporla
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-blog-story">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fab fa-fw fa-facebook me-1"></i> Küfür, Hakaret
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fab fa-fw fa-twitter me-1"></i> Tehdit, Şiddet
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fab fa-fw fa-linkedin me-1"></i> Yalan, Sahte
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 pt-4 pb-4 rounded bg-body-extra-light">
                    <p class="fs-sm">
                        <i class="fa fa-thumbs-up text-info"></i><span id="likec"
                            class="me-1">{{ $like }}</span>
                        <i class="fa  fa-thumbs-down text-danger"></i><span id="dlikec">{{ $dislike }}</span>
                        <i class="fa fa-bookmark" aria-hidden="true"></i> <span
                            id="bookc">{{ $bookmark }}</span>
                        beğendi <a class="fw-semibold" href="javascript:void(0)">Brian Stevens</a>,
                        <a class="fw-semibold" href="javascript:void(0)">Megan Fuller</a>
                        <a class="fw-semibold" href="javascript:void(0)">ve 350 Kişi..</a>
                    </p>
                    <form id="commentForm" method="POST" onsubmit="return false;">
                        <input type="hidden" id="post_id" value="{{ $post->id }}">
                        <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="parent_id" value="0">
                        <div class="mb-4">
                            <div class="input-group">
                                <input data-id="{{ Auth::user()->id }}" id="comment" type="text"
                                    class="form-control form-control-alt" name="comment"
                                    placeholder="Bir yorum yaz..">
                                <button type="submit" class="btn btn-secondary"><i class="fa fa-comment"
                                        aria-hidden="true"></i></button>
                            </div>
                            <div class="row">
                                <div class="col-md-12 m-2" id="userList">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="pt-1 fs-sm">
                        @foreach ($parentArray as $comment)
                            @include('pages.post.includes.comment')
                        @endforeach
                        <div id="comment_detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/css/post.css', 'resources/js/post.js'])

    @push('script')
    @endpush
</x-app-layout>
