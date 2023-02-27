@vite(['resources/css/project.css', 'resources/js/project.js'])
<div class="block block-transparent bg-primary-dark mb-0">
    <ul class="nav nav-tabs nav-tabs-block" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="btabs-static-home-tab" data-bs-toggle="tab"
                data-bs-target="#btabs-static-home" role="tab" aria-controls="btabs-static-home" aria-selected="true">
                ToDo
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="btabs-static-profile-tab" data-bs-toggle="tab"
                data-bs-target="#btabs-static-profile" role="tab" aria-controls="btabs-static-profile"
                aria-selected="false">
                Proje
            </button>
        </li>
        <li class="nav-item ms-auto">
            <button class="nav-link" id="btabs-static-settings-tab" data-bs-toggle="tab"
                data-bs-target="#btabs-static-settings" role="tab" aria-controls="btabs-static-settings"
                aria-selected="false">
                <i class="si si-settings"></i>
            </button>
        </li>
    </ul>
    <div class="block-content tab-content">
        <div class="tab-pane active" id="btabs-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab"
            tabindex="0">
            <form action="">
                <div class="form-group mb-3">
                    <label class="form-label" for="title">ToDo</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $todo->title }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="description">Açıklama</label>
                    <textarea type="text" class="form-control" id="description" name="description">{{ $todo->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="start_date">Başlangıç Tarihi</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ $todo->start_date }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="end_date">Bitiş Tarihi</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ $todo->end_date }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="warning_date">Uyarı Tarihi</label>
                    <input type="date" class="form-control" id="warning_date" name="warning_date"
                        value="{{ $todo->warning_date }}">
                </div>
        </div>
        <div class="tab-pane" id="btabs-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab"
            tabindex="0">
            <div class="form-group mb-3">
                <label class="form-label" for="title">Proje</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="category">
                    Kategori <span class="text-danger">*</span>
                </label>
                <select class="form-select" id="category" name="category">

                    <option value="personal" @if ($project->category == 'personal') selected @endif>Kişisel</option>
                    <option value="work" @if ($project->category == 'work') selected @endif>İş</option>
                    <option value="other" @if ($project->category == 'other') selected @endif>Diğer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="description">Açıklama</label>
                <textarea type="text" class="form-control" id="project-edit-description" name="description">{!! $project->description !!}</textarea>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="color">Renk</label>
                <input type="color" class="form-control" id="color" name="color" placeholder="#0665d0">
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="deadline">Bitiş Tarihi</label>
                <input type="date" class="form-control" id="deadline" name="deadline"
                    value="{{ $project->deadline }}">
            </div>
        </div>
        <div class="tab-pane" id="btabs-static-settings" role="tabpanel" aria-labelledby="btabs-static-settings-tab"
            tabindex="0">
            <div class="input-group">
                <button id="create_key" type="button" class="btn btn-primary">
                    Oluştur
                </button>
                <input type="text" class="form-control" id="invite_code" name="invite_code"
                    value="{{ $project->invite_code }}">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-clone"></i>
                </button>
            </div>
            <div class="block-content block-content-full text-end bg-primary-dark">
                <div class="form-grouo mb-3 text-center">
                    <label class="form-label me-1" for="is_public">
                        Gizli
                    </label>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="is_public"
                            @if ($project->is_public == '1') checked @endif name="is_public">
                        <label class="form-check-label" for="is_public">Açık</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="block-content block-content-full text-end bg-primary-dark">
        <button type="submit" class="btn btn-sm btn-alt-secondary text-dark">Kaydet</button>
    </div>
    </form>
</div>
<script>
    $('#create_key').click(function() {
        console.log('test')
        var key = 'BIO' + '-' + Math.random().toString(36).substring(2, 5).toUpperCase() + Math.random()
            .toString(36).substring(2, 5).toUpperCase() + '-' + 'BLOG';
        $('#invite_code').val(key);
    });
</script>
