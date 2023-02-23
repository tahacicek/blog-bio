<x-app-layout>
    @vite(['resources/css/project.css', 'resources/js/project.js'])
    <!-- Hero -->
    @section('header_image',
        'https://cutewallpaper.org/21/5120-x-1440-wallpaper/3840x10805760x10805120x1440-Milky-Way-multiwall.jpg')
    @section('header_content')
        <h1 class="flex-grow-1 fs-2 text-white my-2">
            <i class="fa fa-boxes text-white-50 me-1"></i> Tüm Projeleriniz
        </h1>
        <a class="btn btn-primary my-2" href="{{url('proje/olustur/'.Auth::user()->username) }}">
            <i class="fa fa-fw fa-check opacity-50"></i>
            <span class="d-none d-sm-inline ms-1">Yeni Proje</span>
        </a>
    @endsection

    <!-- Page Content -->
    <div class="content">
        <form action="be_pages_projects_dashboard.html" method="POST" onsubmit="return false;">
            <div class="row items-push">
                <div class="col-sm-6 col-xl-3">
                    <div class="input-group">
                        <input type="text" class="form-control border-start-0" id="dm-projects-search"
                            name="dm-projects-search" placeholder="Proje Ara..">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 offset-xl-6">
                    <select class="form-select" id="dm-projects-filter" name="dm-projects-filter">
                        <option value="all">Tümü (6)</option>
                        <option value="active">Aktif (3)</option>
                        <option value="pending">Önemli (1)</option>
                        <option value="planning">Tamamlandı (1)</option>
                        <option value="canceled">Arşiv (1)</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="row items-push">
            @foreach ($projects as $project)
                <div class="col-md-6 col-xl-4">
                    <!-- Project #1 -->
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-header">
                            <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                                <i class="fa fa-clock me-1"></i>
                                {{ \Carbon\Carbon::parse($project->created_at)->format('d M') }}
                            </div>
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-users me-1"></i> People
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-bell me-1"></i> Alerts
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-check-double me-1"></i> Tasks
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="be_pages_projects_edit.html">
                                            <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content bg-body-light text-center">
                            <h3 class="fs-4 fw-bold mb-1">
                                <a href="be_pages_projects_tasks.html">{{ $project->title }}</a>
                            </h3>
                            <h4 class="fs-6 text-muted mb-3">
                                @if ($project->category == 'personal')
                                    Kişisel
                                @elseif($project->category == 'work')
                                    İş
                                @elseif($project->category == 'other')
                                    Diğer
                                @endif
                            </h4>
                            <div class="push">
                                @if ($project->status == 'active')
                                    <span class="badge bg-success text-uppercase fw-bold py-2 px-3">Aktif</span>
                                @elseif($project->status == 'star')
                                    <span class="badge bg-danger text-uppercase fw-bold py-2 px-3">Önemli</span>
                                @elseif($project->status == 'completed')
                                    <span class="badge bg-success text-uppercase fw-bold py-2 px-3">Tamamlandı</span>
                                @endif
                            </div>
                        </div>
                        <div class="block-content text-center">
                            <a class="img-link m-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg"
                                    alt="">
                            </a>
                            <a class="img-link m-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg"
                                    alt="">
                            </a>
                            <a class="img-link m-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg"
                                    alt="">
                            </a>
                            <a class="img-link m-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg"
                                    alt="">
                            </a>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-6">
                                    <a class="btn w-100 btn-alt-secondary" href="{{ url('proje/'.Auth::user()->username. '/' . $project->slug) }}">
                                        <i class="fa fa-eye me-1 opacity-50"></i> Projeye Git
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                        <i class="fa fa-archive me-1 opacity-50"></i> Arşivle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Project #1 -->
                </div>
            @endforeach
        </div>
    </div>
    <!-- END Page Content -->

    @push('script')
        <script src="{{ asset('custom') }}/assets/js/dashmix.app.min.js"></script>
    @endpush
</x-app-layout>
