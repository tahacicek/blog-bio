<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="text-white">
              <form id="invite_form" action="{{ route('project.func') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <div class="col-md-12">
                        <label for="invite_code" class="form-label">Davet Kodu</label>
                        <input type="text" class="form-control" name="invite_code" placeholder="Lütfen Davet Kodunu Gir..">
                        <input type="text" class="form-control" name="status" value="invite-control" hidden>
                    </div>
                </div>
                <div class="block-content block-content-full text-end ">
                    <button type="submit" class="btn btn-sm btn-primary">Gönder</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
