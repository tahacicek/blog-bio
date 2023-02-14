<x-app-layout>
    @push('style')
        <style>
            #quote-1 {
                height: 75px;
            }

            p span {
                border: 0 solid black;
                padding: 12px;
                position: relative;
            }

            #text {
                text-align: center;
                font-family: 'Pacifico', cursive;
                font-size: 25px;
                margin-top: 20px;
            }

            .card {
                border-radius: 40px 0px 40px 0px !important;
                background-color: #f8f9fa !important;
                border: 4px black solid !important;
            }

            .card:hover {
                border-radius: 40px 0px 40px 0px !important;
                background-color: #f8f9fa !important;
                border: 4px white solid !important;
                background-color: black !important;
                color: white !important;
                transition: 0.5s;
            }
        </style>
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
                <!-- Story -->
                <!-- Magnific Popup (.js-gallery class is initialized in Helpers.jqMagnific()) -->
                <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                <article class="js-gallery story">
                    {!! $post->content !!}
                </article>
                <!-- END Story -->

                <!-- Actions -->
                <div class="mt-5 d-flex justify-content-between push">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-alt-secondary" data-bs-toggle="tooltip"
                            title="Like Story">
                            <i class="fa fa-thumbs-up text-primary"></i>
                        </button>
                        <button type="button" class="btn btn-alt-secondary" data-bs-toggle="tooltip" title="Recommend">
                            <i class="fa fa-heart text-danger"></i>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-alt-secondary dropdown-toggle" id="dropdown-blog-story"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-blog-story">
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
                <!-- END Actions -->

                <!-- Comments -->
                <div class="px-4 pt-4 rounded bg-body-extra-light">
                    <p class="fs-sm">
                        <i class="fa fa-thumbs-up text-info"></i>
                        <i class="fa fa-heart text-danger"> </i>

                        <a class="fw-semibold" href="javascript:void(0)">Brian Stevens</a>,
                        <a class="fw-semibold" href="javascript:void(0)">Megan Fuller</a>,
                        <a class="fw-semibold" href="javascript:void(0)">and 56 others</a>
                    </p>
                    <form action="be_pages_blog_story_cover.html" method="POST" onsubmit="return false;">
                        <input type="text" class="form-control form-control-alt" placeholder="Write a comment..">
                    </form>
                    <div class="pt-3 fs-sm">
                        <div class="d-flex">
                            <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                                <img class="img-avatar img-avatar32 img-avatar-thumb"
                                    src="assets/media/avatars/avatar3.jpg" alt="">
                            </a>
                            <div class="flex-grow-1">
                                <p class="mb-1">
                                    <a class="fw-semibold" href="javascript:void(0)">Alice Moore</a>
                                    Vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                                    nisi vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.
                                </p>
                                <p>
                                    <a class="me-1" href="javascript:void(0)">Like</a>
                                    <a href="javascript:void(0)">Comment</a>
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
                        <div class="d-flex">
                            <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                                <img class="img-avatar img-avatar32 img-avatar-thumb"
                                    src="assets/media/avatars/avatar13.jpg" alt="">
                            </a>
                            <div class="flex-grow-1">
                                <p class="mb-1">
                                    <a class="fw-semibold" href="javascript:void(0)">Henry Harrison</a>
                                    Leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer
                                    sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus?
                                    Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi,
                                    gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus
                                    facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante
                                    sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices.
                                </p>
                                <p>
                                    <a class="me-1" href="javascript:void(0)">Like</a>
                                    <a href="javascript:void(0)">Comment</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Comments -->
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
    @endpush
</x-app-layout>
