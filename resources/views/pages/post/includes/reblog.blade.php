<style>
    .form-control {
        border-radius: 0 !important;
        border: black !important;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group ">
                            <textarea type="text" id="body" name="body" class="text-white bg-dark form-control-sm form-control form-control-alt " name="comment"
                                placeholder="Yorumunuzu yazın..." style="font-size: none"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <select type="text" id="tags"
                                        class="text-white form-control-sm form-control bg-dark form-control-alt " name="comment"
                                        placeholder="etiket bırakabilirsiniz" style="font-size: none"></select>
                                    <button type="submit" class="btn-sm btn-block btn btn-secondary"><i
                                            class="fa fa-reply" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="block block-rounded bg-primary-dark block-link-popmb-0 text-white" href="be_pages_blog_story.html">
                            <div class="block-content">
                                <h4 class="mb-1">{{ $post->title }}</h4>
                                <p class="fs-sm">
                                    <span class="text-white">{{ '@'.$user->username }}</span>{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }} <em
                                        class="text-muted">{{ $post->reading_time }} dk.</em>
                                </p>
                                <p>
                                    Anam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce
                                    erat ipsum, varius vel euismod sed, tristique et lectus justo amet....
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-dark">
                <button type="button" class="btn btn-sm text-danger" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal"> <i
                        class="fa text-white fa-retweet" aria-hidden="true"></i>
                </button>
            </div>

        </div>
    </div>
</div>



