<style>
.form-control{
    border-radius: 0 !important;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-12">
                            <p>
                            {{-- iç içe inputlar en altta select2 --}}
                            <div class="input-group">
                                <textarea type="text" id="comments" class=" form-control-sm form-control form-control-alt " name="comment" placeholder="Yorumunuzu yazın..." style="font-size: none"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="comments" class=" form-control-sm form-control form-control-alt " name="comment" placeholder="etiket bırakabilirsiniz" style="font-size: none">
                                        <button type="submit" class="btn-sm btn-block btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            </p>
                        <div class="blog-comment">
                            <hr/>
                            <ul class="comments">
                            <li class="clearfix">
                              <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                              <div class="post-comments">
                                  <p class="meta">Dec 18, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                                  <p>
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                      Etiam a sapien odio, sit amet
                                  </p>
                              </div>
                            </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-dark">
                <button type="button" class="btn btn-sm text-danger" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">                              <i class="fa text-white fa-retweet" aria-hidden="true"></i>
                </button>
              </div>

        </div>
    </div>
</div>
