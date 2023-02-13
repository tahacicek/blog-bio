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
            <form action="{{ route('post.insert') }}" method="POST" id="postolsturyor" enctype="multipart/form-data"
                onsubmit="return false;">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-alt-secondary" href="be_pages_blog_post_manage.html">
                            <i class="fa fa-arrow-left me-1"></i> Manage Posts
                        </a>
                        <div class="block-options">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="private" id="visibility"
                                    name="visibility">
                                <label class="form-check-label" for="dm-post-add-active">Sadece takip edenler.</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <div class="mb-4">
                                    <label class="form-label" for="title">Yazı Başlığınız</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Bir başlık girin..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="excerpt">Alıntı</label>
                                    <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Enter an excerpt.."></textarea>
                                    <div class="form-text">Blog yazısı listesinde, yazının küçük bir açıklaması olarak
                                        görünür. Zorunlu Değildir. Lakin bazı insanlar gerçekten güzel söylemiştir.
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-12">
                                        <label class="form-label" for="cover_image">Kapak Görseli</label>
                                        <input class="form-control" type="file" id="cover_image" name="cover_image">
                                        <div class="form-text">Bunu senin için yazının kapak görseli olarak
                                            ayarlayacağız. Eğer fazladan görsel istersen editör buna müsade ediyor.
                                            Görsel koymayı zorunlu yaptık.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.jsCkeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <label class="form-label" for="content">Body</label>
                                    <textarea id="js-ckeditor" name="content" id="content"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="tags" class="form-label">Tag</label>
                                    <select class="form-control col-md-12" id="tags" name="tags[]"
                                        autocomplete="off" multiple="multiple"
                                        placeholder="Bu yazıda neler anlatıyorsun?"></select>
                                    <div class="form-text">Buna mantıklı şeyler koy lütfen. İnsanlar bunun üzerinden
                                        arama yapabilir. Eğer mantıksız şeyler ise şikayet üzerine biolog puanın düşer.
                                        (Merak etme, biolog puanı yok.) <br> Şaka şaka, var ama kontrol etmeden şikayeti
                                        kayda almıyoruz. Hatta geçerisz şikayet ise onların puanı düşüyor. Daha fazla
                                        bilgi için <a href="">bkz.</a>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="published_date">Yayın Tarihi</label>
                                        <input class="form-control" type="date" id="published_date" name="published_date">
                                        <div class="form-text">Daha sonra yayınlanmasını istiyorsan eğer.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="deleted_date">Silinme Tarihi</label>
                                        <input class="form-control" type="date" id="deleted_date" name="deleted_date">
                                        <div class="form-text">Otomatik silinsin istiyorsan eğer.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check opacity-50 me-1"></i> Yazıyı Oluştur
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

        <script></script>
    @endpush
</x-app-layout>
