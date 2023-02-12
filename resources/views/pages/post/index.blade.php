<x-app-layout>


    @push('style')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

        <style>
            .ck-editor__editable_inline {
                min-height: 300px;
            }

            .item{
                height: 1.5rem;
            }
        </style>


    @endpush

    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">New Blog Post</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <!-- New Post -->
            <form action="be_pages_blog_post_add.html" method="POST" enctype="multipart/form-data"
                onsubmit="return false;">
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-alt-secondary" href="be_pages_blog_post_manage.html">
                            <i class="fa fa-arrow-left me-1"></i> Manage Posts
                        </a>
                        <div class="block-options">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="" id="dm-post-add-active"
                                    name="dm-post-add-active">
                                <label class="form-check-label" for="dm-post-add-active">Set active</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <div class="mb-4">
                                    <label class="form-label" for="dm-post-add-title">Title</label>
                                    <input type="text" class="form-control" id="dm-post-add-title"
                                        name="dm-post-add-title" placeholder="Enter a title..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-post-add-excerpt">Excerpt</label>
                                    <textarea class="form-control" id="dm-post-add-excerpt" name="dm-post-add-excerpt" rows="3"
                                        placeholder="Enter an excerpt.."></textarea>
                                    <div class="form-text">Visible on blog post list as a small description of the post.
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-6">
                                        <label class="form-label" for="dm-post-add-image">Featured Image</label>
                                        <input class="form-control" type="file" id="dm-post-add-image">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.jsCkeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <label class="form-label">Body</label>
                                    <textarea id="js-ckeditor" name="dm-post-add-body"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="tags" class="form-label">Tag</label>
                                    <input id="input-tags" autocomplete="off" placeholder="How cool is this?">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check opacity-50 me-1"></i> Create Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END New Post -->
        </div>
        <!-- END Page Content -->
    </main>
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect("#input-tags",{
	persist: false,
	createOnBlur: true,
	create: true
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
    @endpush
</x-app-layout>
