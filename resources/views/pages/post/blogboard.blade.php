<x-app-layout>
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .ck-editor__editable_inline {
                min-height: 300px;
            }

            .item {
                height: 1.5rem;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: black;
                border: 1px solid #aaa;
                border-radius: 4px;
                box-sizing: border-box;
                display: inline-block;
                margin-left: 5px;
                margin-top: 5px;
                padding: 0;
                padding-left: 20px;
                position: relative;
                max-width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
                vertical-align: bottom;
                white-space: nowrap;
            }
        </style>
    @endpush

    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Story -->
                    @foreach ($posts as $post)
                        <div class="block block-rounded block-link-pop">
                            <div class="block-content p-0 overflow-hidden">
                                <div class="row g-0">
                                    <div class="col-md-4 col-lg-5 overflow-hidden d-flex align-items-center">
                                        <a href="{{ url('post/' . $user->username . '/' . $post->slug) }}">
                                            <img class="img-fluid img-link bg-image fixed"
                                                src="{{ asset($post->cover_image) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="col-md-8 col-lg-7 d-flex align-items-center">
                                        <div class="px-4 py-3">
                                            <h4 class="mb-1">
                                                <a class="text-dark"
                                                    href="{{ url('post/' . $user->username . '/' . $post->slug) }}">{{ $post->title }}</a>
                                            </h4>
                                            <div class="fs-sm mb-2">
                                                @php
                                                    $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at);
                                                @endphp
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('d') . ' ' . $date->format('F') }},
                                                {{ Carbon\Carbon::parse($post->created_at)->format('Y') }}
                                                <em class="text-muted">{{ $post->reading_time }} dk.</em>
                                            </div>
                                            <p class="mb-0">
                                                {!! Str::limit($post->content, 195) !!}
                                                <a href="be_pages_blog_story.html">Read on</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full bg-body-light">
                                        <div class="row g-0 fs-sm text-center">
                                            <div class="col-3">
                                                <span class="text-muted fw-semibold">
                                                    <i class="fa fa-fw fa-eye opacity-100 me-1"></i> 890
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <span class="text-muted fw-semibold">
                                                    <i class="fa fa-fw fa-comments opacity-100 me-1"></i> 14
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <span class="text-muted fw-semibold">
                                                    <i class="fa fa-fw fa-thumbs-up opacity-100 me-1"></i> 56
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <span class="text-muted fw-semibold">
                                                    <i class="fa fa-fw fa-thumbs-down opacity-100 me-1"></i> 56
                                                </span>
                                            </div>
                                            <div class="card-footer">
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="far fa-fw fa-times-circle text-danger me-1"></i>
                                                            Hide similar posts
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="far fa-fw fa-thumbs-down text-warning me-1"></i>
                                                            Stop following this user
                                                        </a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report
                                                            this post
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination push">
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-4">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Ara</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <form action="be_pages_blog_classic.html" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt"
                                        placeholder="Yaz ve enter'la..">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Sosyal</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip"
                                title="Follow us on Twitter">
                                <i class="fab fa-fw fa-twitter"></i>
                            </a>
                            <a class="btn btn-alt-secondary" href="javascript:void(0)" dat-bs-toggle="tooltip"
                                title="Like our Facebook page">
                                <i class="fab fa-fw fa-facebook"></i>
                            </a>
                            <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip"
                                title="Follow us on Dribbble">
                                <i class="fab fa-fw fa-dribbble"></i>
                            </a>
                            <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip"
                                title="Subscribe on Youtube">
                                <i class="fab fa-fw fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <a class="block block-rounded block-link-shadow" href="be_pages_generic_profile.html">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Hakkında</h3>
                        </div>
                        <div class="block-content block-content-full text-center">
                            <div class="mb-3">
                                <img class="img-avatar" src="{{ asset($user->avatar) }}" alt="">
                            </div>
                            <div class="fs-lg fw-semibold">{{ $user->name }} {{ $user->surname }}</div>
                            <div class="fs-sm text-muted">{{ $user->country }} {{ $user->city }}</div>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <i class="fa fa-users fa-2x"></i>
                                    </div>
                                    <p class="fw-semibold text-muted">54k Followers</p>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <i class="fa fa-pencil-alt fa-2x"></i>
                                    </div>
                                    <p class="fw-semibold text-muted">56 Stories</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Recent Comments</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="push">
                                <a class="fw-semibold" href="be_pages_generic_profile.html">Brian Stevens</a> on <a
                                    href="be_pages_blog_story.html">Exploring the world</a>
                                <p class="mt-1">
                                    Awesome trip! Looking forward going there, I'm sure it will be a great experience!
                                </p>
                            </div>
                            <div class="push">
                                <a class="fw-semibold" href="be_pages_generic_profile.html">Jose Parker</a> on <a
                                    href="be_pages_blog_story.html">Travel &amp; Work</a>
                                <p class="mt-1">
                                    Thank you for sharing your story with us! I really appreciate the info, it will come
                                    in
                                    handy for sure!
                                </p>
                            </div>
                            <div class="push">
                                <a class="fw-semibold" href="be_pages_generic_profile.html">Carl Wells</a> on <a
                                    href="be_pages_blog_story.html">Black &amp; White</a>
                                <p class="mt-1">
                                    Really touching story.. I'm so happy everything went well at the end!
                                </p>
                            </div>
                            <div class="push">
                                <a class="fw-semibold" href="be_pages_generic_profile.html">Danielle Jones</a> on <a
                                    href="be_pages_blog_story.html">Sleep Better</a>
                                <p class="mt-1">
                                    Great advice! Thanks for sharing, I'm sure it will help many people sleep better and
                                    improve their lifes.
                                </p>
                            </div>
                            <div class="text-center push">
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">Read More..</a>
                            </div>
                        </div>
                    </div>
                    <!-- END Recent Comments -->
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $("#tags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#js-ckeditor'))

                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            $(document).ready(function() {
                $('#postolsturyor').on('submit', function(e) {
                    console.log('test');
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: '/post/olustur',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            form.reset();
                            iziToast.success({
                                title: 'Başarılı',
                                message: 'Post başarıyla oluşturuldu.',
                                position: 'topCenter'
                            });
                        },
                        error: function(data) {
                            form.reset();

                            iziToast.error({
                                title: 'Hata',
                                message: 'Post oluşturuldu.',
                                position: 'topCenter'
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
