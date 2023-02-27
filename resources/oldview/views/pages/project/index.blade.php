<x-app-layout>
    @vite(['resources/css/project.css', 'resources/js/project.js'])
    <!-- Hero -->
    @section('header_image',
        'https://cutewallpaper.org/21/5120-x-1440-wallpaper/3840x10805760x10805120x1440-Milky-Way-multiwall.jpg')
    @section('header_content')
        <h1 class="fs-2 text-white my-2">
            <i class="fa fa-check text-white-50 me-1"></i> Yeni Proje
        </h1>
    @endsection
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <form id="createProject" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="create-project">
                    <!-- Vital Info -->
                    <h2 class="content-heading pt-0">Önemli Bilgiler</h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Yeni projeniz hakkında bazı önemli bilgiler
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="title">
                                    Proje İsmi <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="blogbio önyüz geliştirmesi">
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <label class="form-label" for="category">
                                        Kategori <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="category" name="category">
                                        <option selected>Bir Kategori Seç</option>
                                        <option value="personal">Kişisel</option>
                                        <option value="work">İş</option>
                                        <option value="other">Diğer</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <h2 class="content-heading pt-0">İsteğe Bağlı Bilgiler</h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                İsterseniz daha fazla ayrıntı ekleyebilirsiniz, ancak zorunlu değildir.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="description">Açıklama</label>
                                <textarea class="form-control" id="project-editor" name="description" rows="6"
                                    placeholder="Proje hakkında bilgiler ver, görsel ekle, tablo oluştur."></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <label class="form-label me-1" for="is_public">
                                        Gizli
                                    </label>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_public"
                                            name="is_public">
                                        <label class="form-check-label" for="is_public">Açık</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <!-- Bootstrap Datepicker (.js-datepicker class are initialized in Helpers.jqDatepicker()) -->
                                    <!-- For more info and examples you can check out https://github.com/eternicode/bootstrap-datepicker -->
                                    <label class="form-label" for="deadline">Bitiş Tarihi</label>
                                    <input type="date" class="js-datepicker form-control" id="deadline"
                                        name="deadline" data-week-start="1" data-autoclose="true"
                                        data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 info">
                                    <label class="form-label" for="color">Renk</label>
                                    <input type="color" class="form-control" id="color" name="color"
                                        placeholder="#0665d0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit -->
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle me-1 opacity-50"></i> Projeyi Oluştur
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Submit -->
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#project-editor'))

                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#project-edit-description'))

                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>

        <script>
                $('#create_key').click(function() {
        console.log('test')
        var key = 'BIO' + '-' + Math.random().toString(36).substring(2, 5).toUpperCase() + Math.random()
            .toString(36).substring(2, 5).toUpperCase() + '-' + 'BLOG';
        $('#invite_code').val(key);
    });

        </script>
    @endpush
</x-app-layout>
