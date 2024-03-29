<style>
    #tags2 {
        z-index: 999;
    }

    .form-control {
        border-radius: 0 !important;
        border: black !important;
    }

    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: 0px !important;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0 !important;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        --bs-btn-padding-y: 0.25rem;
        --bs-btn-padding-x: 0.5rem;
        --bs-btn-font-size: 0.875rem;
        --bs-btn-border-radius: 0rem !important;
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

    .ts-wrapper.multi .ts-control>div {
        cursor: pointer;
        margin: 0px 25px 3px 13px;
        padding: 2px 6px;
        background: #f2f2f2;
        color: #303030;
        border: 0px solid #d0d0d0;
    }

    textarea {
        resize: none;
    }

    .ts-wrapper.multi .ts-control>div {
        cursor: pointer;
        margin: 0px 25px 3px 13px;
        padding: 2px 6px;
        color: #ffffff;
        background: none;
        border: 0px #343a40;
    }

    .ts-control,
    .ts-wrapper.single.input-active .ts-control {
        background: #343a40;
        cursor: text;
    }

    .ts-control {
        border: 0 solid #343a40;
        padding: 8px 8px;
        width: 100%;
        overflow: hidden;
        position: relative;
        z-index: 1;
        box-sizing: border-box;
        box-shadow: none;
        border-radius: 3px;
        display: flex;
        flex-wrap: wrap;
    }

    .has-items .ts-control>input {
        margin: 0px 4px !important;
        color: white;
    }

    .ts-control>input:focus {
        outline: none !important;
        color: white;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block block-rounded bg-primary-dark block-link-popmb-0 text-white"
                            href="be_pages_blog_story.html">
                            <div class="block-content">
                                <h4 class="mb-1">{{ $post->title }}</h4>
                                <p class="fs-sm">
                                    <span
                                        class="text-white">{{ '@' . $user->username }}</span>{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
                                    <em class="text-muted">{{ $post->reading_time }} dk.</em>
                                </p>
                                <p>
                                    Anam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce
                                    erat ipsum, varius vel euismod sed, tristique et lectus justo amet....
                                </p>
                            </div>
                        </div>
                        <hr>
                        <form id="reblog_form" method="POST" action="{{ route('post.rebloged') }}">
                            @csrf
                            <div class="input-group ">
                                <textarea placeholder="yorumunuzu buraya yazın"
                                    class="text-white bg-dark form-control-sm form-control form-control-alt " name="body" id="body"
                                    cols="30" rows="5"></textarea>
                                <button type="submit" class="btn-sm btn-block btn btn-secondary">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="tags2"
                                            class="text-white form-control-sm form-control bg-dark form-control-alt "
                                            name="comment" placeholder="etiket bırakabilirsiniz"
                                            style="font-size: none">
                                        <button type="submit" class="btn-sm btn-block btn btn-secondary"><i
                                                class="fa fa-tag" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden>
                            <div class="block-content block-content-full text-end bg-dark">
                                <button type="button" class="btn btn-sm text-danger"
                                    data-bs-dismiss="modal">İptal</button>
                                <button id="rebloged" type="submit" class="btn btn-sm btn-success"> <i
                                        class="fa text-white fa-retweet" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new TomSelect("#tags2", {
        plugins: {
            remove_button: {
                title: 'Remove this item',
                label: '&times;'
            }
        },
        delimiter: ',',
        //if value selected before, add # to the value
        tags: '#',
        render: {
            option_create: function(data, escape) {
                return '<div class="create">Bunu ekle <strong>' + escape('#' + data.input) +
                    '</strong>&hellip;</div>';
            },
            item: function(data, escape) {
                return '<div class="item">#' + escape(data.text) + '</div>';
            },
            no_results: function(data, escape) {
                return '<div class="no-results">Etiket bizde. Virgül ile ayırmaya bak.</div>';
            },
        },
        persist: false,
        createOnBlur: true,
        create: true,
    });
</script>
<script>
    $('#reblog_form').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var data = form.serialize();
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response) {
                if (response.success == true) {
                    iziToast.success({
                        title: 'Başarılı',
                        message: 'Reblog başarılı',
                        position: 'topRight'
                    });
                    $('#reblog_form').trigger("reset");
                    $('#modal-block-popin2').modal('hide');
                } else {}
            },
        });
    });
</script>
