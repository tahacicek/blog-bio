<x-app-layout>
    @vite(['resources/css/project.css', 'resources/js/project.js'])

    <!-- Hero -->
    @section('header_image',
        'https://cutewallpaper.org/21/5120-x-1440-wallpaper/3840x10805760x10805120x1440-Milky-Way-multiwall.jpg')
    @section('header_content')
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="flex-grow-1 fs-2 text-white my-2">
                {{ $project->title }} <span class="fs-base fw-medium text-white-75">{{ $project->category }}</span>
            </h1>

        </div>
    @endsection
    <!-- Page Content -->
    <div class="row g-0 flex-md-grow-1 ">
        <div class="col-md-4 col-lg-5 col-xl-3 order-md-1">
            <div class="content">
                <!-- Toggle Side Content -->
                <div class="d-md-none push">
                    <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                    <button type="button" class="btn w-100 btn-hero btn-dark" data-toggle="class-toggle"
                        data-target="#side-content" data-class="d-none">
                        Project Details

                    </button>
                </div>
                <!-- END Toggle Side Content -->

                <!-- Side Content -->
                <div id="side-content" class="d-none d-md-block push">

                    <!-- Completion -->
                    <h2 class="h4 fw-normal mb-3">Tamamlanma Oranınız</h2>
                    @if ($completedPercent == 100)
                        <p class="text-sm font-medium">Tebrikler, ToDo perişan halde!</p>
                    @elseif($completedPercent == 0)
                        <p class="text-sm font-medium">Henüz hiçbir işiniz yok dostum..</p>
                    @elseif($completedPercent > 0 && $completedPercent < 100)
                        <p class="text-sm font-medium">İşlerini halledebilirsin dostum!</p>
                    @endif
                    <div class="progress push">
                        <div class="progress-bar @if ($completedPercent == 100) bg-success @elseif($completedPercent < 60) bg-warning @endif"
                            role="progressbar" style="width: {{ $completedPercent }}%;" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100">
                            {{-- sadece ilk dört sayıyı al --}}
                            <span class="fs-sm fw-semibold">%{{ substr($completedPercent, 0, 4) }}</span>
                        </div>
                    </div>
                    <!-- END Completion -->

                    <!-- About -->
                    <h2 class="h4 fw-normal my-3">Proje Hakkında</h2>
                    <p class="mb-2">
                        {!! $project->description !!}
                    </p>
                    <p class="text-muted">
                        {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}
                    </p>
                    <!-- END About -->

                    <!-- People -->
                    <h2 class="h4 fw-normal my-3">Proje Üyeleri</h2>
                    <p>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                        </a>
                    </p>
                    <!-- END People -->
                </div>
                <!-- END Side Content -->
            </div>
        </div>
        <div class="col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark">
            <!-- Main Content -->
            <div class="content content-full">
                <!-- Tasks, custom functionality is initialized in js/pages/be_pages_projects_tasks.min.js which was auto compiled from _js/pages/be_pages_projects_tasks.js -->
                <div class="js-tasks">
                    <!-- Add task -->
                    <form id="js-task-form" action="{{ route('project.func') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="hidden" id="project_id" value="{{ $project->id }}">
                            <input type="hidden" id="status" value="create-todo">
                            <input class="form-control form-control-lg fs-base" type="text" id="js-task-input"
                                name="js-task-input" placeholder="Yaz ve enter'la..">
                            <button type="submit" class="btn btn-dark">Kaydet</button>
                        </div>

                    </form>
                    <!-- END Add task -->

                    <!-- Tasks List -->
                    <h2 class="content-heading pb-0 mb-3 border-0 d-flex align-items-top space-x-2">
                        <span>Aktif ToDo</span>
                        <span class="fs-base">
                            <span class="js-task-badge badge rounded-pill bg-primary animated fadeIn"></span>
                        </span>
                    </h2>
                    <div class="js-task-list">
                        @foreach ($todos as $todo)
                            <div class="js-task block block-rounded mb-2 animated fadeIn"
                                data-task-id="{{ $todo->id }}" data-task-completed="false"
                                data-task-starred="false">
                                <table class="table table-borderless table-vcenter mb-0">
                                    <tr>
                                        <td class="text-center pe-0" style="width: 38px;">
                                            <div class="js-task-status form-check">
                                                <input type="checkbox" class="form-check-input tasks-cb"
                                                    id="tasks-cb-id{{ $todo->id }}" data-id="{{ $todo->id }}"
                                                    @if ($todo->status == 'completed') checked @endif name="tasks-cb-id">
                                                <label class="form-check-label"
                                                    for="tasks-cb-id{{ $todo->id }}"></label>
                                            </div>
                                        </td>
                                        <td data-todo="{{ $todo->id }}" data-project="{{ $project->id }}"
                                            style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-block-slideright"
                                            class="js-task-content fw-semibold ps-0 todo-edit">
                                            {{ $todo->title }}
                                        </td>
                                        <td class="text-end">
                                            <button type="button" data-id="{{ $todo->id }}"
                                                class="js-task-star btn btn-sm btn-link text-warning">
                                                <i class="far fa-star fa-fw"></i>
                                            </button>
                                            <button data-id="{{ $todo->id }}" type="button"
                                                class="js-task-remove btn btn-sm btn-link text-danger">
                                                <i class="fa fa-times fa-fw"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                    <h2 class="content-heading pb-0 mb-3 border-0 d-flex align-items-top space-x-2">
                        <span>Yıdızlı ToDo</span>
                        <span class="fs-base">
                            <span class="js-task-badge-starred badge rounded-pill bg-primary animated fadeIn"></span>
                        </span>
                    </h2>
                    <div class="js-task-list-starred">
                        @foreach ($todostar as $todo)
                            <div class="js-task block block-rounded mb-2 animated fadeIn"
                                data-task-id="{{ $todo->id }}" data-task-completed="false"
                                data-task-starred="true">
                                <table class="table table-borderless table-vcenter mb-0">
                                    <tr>
                                        <td class="text-center pe-0" style="width: 38px;">
                                            <div class="js-task-status form-check">
                                                <input type="checkbox" class="form-check-input tasks-cb"
                                                    id="tasks-cb-id{{ $todo->id }}"
                                                    data-id="{{ $todo->id }}"
                                                    @if ($todo->status == 'completed') checked @endif
                                                    name="tasks-cb-id">
                                                <label class="form-check-label"
                                                    for="tasks-cb-id{{ $todo->id }}"></label>
                                            </div>
                                        </td>
                                        <td data-todo="{{ $todo->id }}" data-project="{{ $project->id }}"
                                            style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-block-slideright"
                                            class="js-task-content fw-semibold ps-0 todo-edit">
                                            {{ $todo->title }}
                                        </td>
                                        <td class="text-end">
                                            <button data-id="{{ $todo->id }}" type="button"
                                                class="js-task-star btn btn-sm btn-link text-warning">
                                                <i class="fa fa-star"></i>
                                            </button>
                                            <button data-id="{{ $todo->id }}" type="button"
                                                class="js-task-remove btn btn-sm btn-link text-danger">
                                                <i class="fa fa-times fa-fw"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                        <!-- END Task -->
                    </div>
                    <!-- END Starred Tasks List -->

                    <!-- Tasks List Completed -->
                    <h2 class="content-heading pb-0 mb-3 border-0 d-flex align-items-top space-x-2">
                        <span>Biten ToDo</span>
                        <span class="fs-base">
                            <span class="js-task-badge-completed badge rounded-pill bg-primary animated fadeIn"></span>
                        </span>
                    </h2>
                    <div class="js-task-list-completed">
                        @foreach ($todocompleted as $todo)
                            <div class="js-task block block-rounded mb-2 animated fadeIn"
                                data-task-id="{{ $todo->id }}" data-task-completed="true"
                                data-task-starred="false">
                                <table class="table table-borderless table-vcenter bg-body mb-0">
                                    <tr>
                                        <td class="text-center pe-0" style="width: 38px;">
                                            <div class="js-task-status form-check">
                                                <input type="checkbox" class="form-check-input tasks-cb"
                                                    id="tasks-cb-id{{ $todo->id }}"
                                                    data-id="{{ $todo->id }}"
                                                    @if ($todo->status == 'completed') checked @endif
                                                    name="tasks-cb-id">
                                                <label class="form-check-label"
                                                    for="tasks-cb-id{{ $todo->id }}"></label>
                                            </div>
                                        </td>
                                        <td data-todo="{{ $todo->id }}" data-project="{{ $project->id }}"
                                            style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-block-slideright"
                                            class="js-task-content fw-semibold ps-0 todo-edit">
                                            </del>
                                            <del> {{ $todo->title }}
                                        </td>
                                        <td class="text-end">
                                            <button data-id="{{ $todo->id }}" type="button"
                                                class="js-task-star btn btn-sm btn-link text-warning">
                                                <i class="far fa-star fa-fw"></i>
                                            </button>
                                            <button data-id="{{ $todo->id }}" type="button"
                                                class="js-task-remove btn btn-sm btn-link text-danger">
                                                <i class="fa fa-times fa-fw"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                        <!-- END Completed Task -->
                    </div>
                    <!-- END Tasks List Completed -->
                </div>
                <!-- END Tasks -->
            </div>
            <!-- END Main Content -->
            <!-- Slide Right Block Modal -->
            <div class="modal fade" id="modal-block-slideright" tabindex="-1" role="dialog"
                aria-labelledby="modal-block-slideright" aria-hidden="true">
                <div class="modal-dialog modal-dialog-slideright modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-themed block-transparent mb-0">
                            <div class="block-header bg-dark">
                                <h3 class="block-title"></h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content body bg-dark text-white">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Slide Right Block Modal -->
        </div>
    </div>
    <!-- END Page Content -->


    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
        <script src="{{ asset('custom') }}/assets/js/dashmix.app.min.js"></script>
        <script src="{{ asset('custom') }}/assets/js/lib/jquery.min.js"></script>
        <script src="{{ asset('custom') }}/assets/js/pages/be_pages_projects_tasks.min.js"></script>
    @endpush
</x-app-layout>
