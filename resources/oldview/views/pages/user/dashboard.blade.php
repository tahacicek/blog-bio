<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @push('style')
    @endpush
    <div id="page-container" class="sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-boxed">
        <!-- Side Overlay-->
        <aside id="side-overlay">
          <!-- Side Header -->
          <div class="bg-primary">
            <div class="content-header">
              <div class="fs-lg fw-light text-white">
                <i class="fa fa-users me-1"></i> People
              </div>

              <!-- Close Side Overlay -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times-circle"></i>
              </a>
              <!-- END Close Side Overlay -->
            </div>
          </div>
          <!-- END Side Header -->

          <!-- Side Content -->
          <div class="content-side">
            <form class="push" action="db_social_compact.html" method="POST" onsubmit="return false;">
              <div class="input-group">
                <input class="form-control" placeholder="Search People..">
                <span class="input-group-text">
                  <i class="fa fa-fw fa-search"></i>
                </span>
              </div>
            </form>
            <div class="block pull-x">
              <!-- Online -->
              <div class="block-content block-content-sm block-content-full bg-body">
                <span class="text-uppercase fs-sm fw-bold">Online</span>
              </div>
              <div class="block-content">
                <ul class="nav-items">
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar5.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Andrea Gardner</div>
                        <div class="fs-sm text-muted">Photographer</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Justin Hunt</div>
                        <div class="fw-normal fs-sm text-muted">Web Designer</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Carol Ray</div>
                        <div class="fw-normal fs-sm text-muted">Web Developer</div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- Online -->

              <!-- Busy -->
              <div class="block-content block-content-sm block-content-full bg-body">
                <span class="text-uppercase fs-sm fw-bold">Busy</span>
              </div>
              <div class="block-content">
                <ul class="nav-items">
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-danger"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Judy Ford</div>
                        <div class="fw-normal fs-sm text-muted">UI Designer</div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END Busy -->

              <!-- Away -->
              <div class="block-content block-content-sm block-content-full bg-body">
                <span class="text-uppercase fs-sm fw-bold">Away</span>
              </div>
              <div class="block-content">
                <ul class="nav-items">
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-warning"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Albert Ray</div>
                        <div class="fw-normal fs-sm text-muted">Copywriter</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-warning"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Danielle Jones</div>
                        <div class="fw-normal fs-sm text-muted">Writer</div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END Away -->

              <!-- Offline -->
              <div class="block-content block-content-sm block-content-full bg-body">
                <span class="text-uppercase fs-sm fw-bold">Offline</span>
              </div>
              <div class="block-content">
                <ul class="nav-items">
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar13.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Jesse Fisher</div>
                        <div class="fw-normal fs-sm text-muted">Teacher</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Barbara Scott</div>
                        <div class="fw-normal fs-sm text-muted">Photographer</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar5.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Lori Grant</div>
                        <div class="fw-normal fs-sm text-muted">Front-end Developer</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 mx-3 overlay-container">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg" alt="">
                        <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                      </div>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">Wayne Garcia</div>
                        <div class="fw-normal fs-sm text-muted">UX Specialist</div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END Offline -->

              <!-- Add People -->
              <div class="block-content border-top">
                <a class="btn btn-alt-primary w-100" href="javascript:void(0)">
                  <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Add People
                </a>
              </div>
              <!-- END Add People -->
            </div>
          </div>
          <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
          Sidebar Mini Mode - Display Helper classes

          Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

          Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
          Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
          Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
        -->
        <nav id="sidebar" aria-label="Main Navigation">
          <!-- Side Header -->
          <div class="content-header bg-primary">
            <!-- Logo -->
            <a class="text-dual d-inline-block" href="index.html">
              <i class="fa fa-campground"></i>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
              <!-- Close Sidebar, Visible only on mobile screens -->
              <a class="d-lg-none text-white ms-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-times-circle"></i>
              </a>
              <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
          </div>
          <!-- END Side Header -->

          <!-- Sidebar Scrolling -->
          <div class="js-sidebar-scroll">
            <!-- User Info -->
            <div class="smini-hidden">
              <div class="content-side content-side-full bg-black-10 d-flex align-items-center">
                <a class="img-link d-inline-block" href="javascript:void(0)">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar8.jpg" alt="">
                </a>
                <div class="ms-3">
                  <a class="fw-semibold text-dual" href="javascript:void(0)">Stella Smith</a>
                  <div class="fs-sm text-dual">Developer</div>
                </div>
              </div>
            </div>
            <!-- END User Info -->

            <!-- Side Navigation -->
            <div class="content-side">
              <ul class="nav-main">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-user-circle"></i>
                    <span class="nav-main-link-name">My Profile</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-bell"></i>
                    <span class="nav-main-link-name">Notifications</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-info">6</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-envelope-open"></i>
                    <span class="nav-main-link-name">Messages</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-info">1</span>
                  </a>
                </li>
                <li class="nav-main-heading">Home</li>
                <li class="nav-main-item">
                  <a class="nav-main-link active" href="db_social_compact.html">
                    <i class="nav-main-link-icon far fa-newspaper"></i>
                    <span class="nav-main-link-name">News Feed</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-gem"></i>
                    <span class="nav-main-link-name">Marketplace</span>
                  </a>
                </li>
                <li class="nav-main-heading">Explore</li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-calendar-alt"></i>
                    <span class="nav-main-link-name">Events</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-user"></i>
                    <span class="nav-main-link-name">Groups</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-file-alt"></i>
                    <span class="nav-main-link-name">Pages</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-danger">32</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon far fa-images"></i>
                    <span class="nav-main-link-name">Photos</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-warning">14</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-plus"></i>
                    <span class="nav-main-link-name">More</span>
                  </a>
                  <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon far fa-clock"></i>
                        <span class="nav-main-link-name">On This Day</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon far fa-newspaper"></i>
                        <span class="nav-main-link-name">Pages Feed</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon fa fa-gamepad"></i>
                        <span class="nav-main-link-name">Games</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-success">25</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-main-heading">Dashboards</li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_dashboard_all.html">
                    <i class="nav-main-link-icon fa fa-arrow-left"></i>
                    <span class="nav-main-link-name">Go Back</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Side Navigation -->
          </div>
          <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
          <!-- Header Content -->
          <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
              <!-- Logo -->
              <a class="btn btn-alt-secondary me-2" href="index.html">
                <i class="fa fa-campground"></i>
              </a>
              <!-- END Logo -->

              <!-- Open Search Section -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-secondary d-lg-none" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i>
              </button>
              <!-- END Open Search Section -->

              <!-- Search form in larger screens -->
              <form class="d-none d-lg-inline-block" action="be_pages_generic_search.html" method="POST">
                <input type="text" class="form-control form-control-sm border-0 rounded-pill px-3" placeholder="Search.." id="page-header-search-input-full" name="page-header-search-input-full">
              </form>
              <!-- END Search form in larger screens -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
              <!-- User Profile -->
              <a class="btn btn-alt-secondary d-none d-sm-inline-block"  href="javascript:void(0)">
                <i class="fa fa-user-circle opacity-50 me-1"></i> Stella
              </a>
              <!-- END User Profile -->

              <!-- Notifications Dropdown -->
              <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-fw fa-bell"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0" aria-labelledby="page-header-notifications-dropdown">
                  <div class="bg-primary-darker rounded-top fw-semibold text-white text-center p-3">
                    Notifications
                  </div>
                  <ul class="nav-items my-2">
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-fw fa-user-plus text-primary"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">John Doe send you a friend request!</div>
                          <div class="text-muted">6 min ago</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-fw fa-user-plus text-primary"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">Elisa Doe send you a friend request!</div>
                          <div class="text-muted">10 min ago</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-check-circle text-success"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">Backup completed successfully!</div>
                          <div class="text-muted">2 hours ago</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-fw fa-user-plus text-primary"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">George Smith send you a friend request!</div>
                          <div class="text-muted">3 hours ago</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-exclamation-circle text-warning"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">You are running out of space. Please consider upgrading your plan.</div>
                          <div class="text-muted">1 day ago</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                          <i class="fa fa-envelope-open text-info"></i>
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                          <div class="fw-semibold">You have a new message!</div>
                          <div class="text-muted">2 days ago</div>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <div class="p-2 border-top">
                    <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                      <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                    </a>
                  </div>
                </div>
              </div>
              <!-- END Notifications Dropdown -->

              <!-- Toggle Side Overlay -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-comment-alt"></i>
              </button>
              <!-- END Toggle Side Overlay -->

              <!-- Toggle Sidebar -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
              </button>
              <!-- END Toggle Sidebar -->
            </div>
            <!-- END Right Section -->
          </div>
          <!-- END Header Content -->

          <!-- Header Search -->
          <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
              <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                    <i class="fa fa-fw fa-times-circle"></i>
                  </button>
                  <input type="text" class="form-control border-0" placeholder="Search your network.." id="page-header-search-input" name="page-header-search-input">
                </div>
              </form>
            </div>
          </div>
          <!-- END Header Search -->

          <!-- Header Loader -->
          <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
          <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
              <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
              </div>
            </div>
          </div>
          <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
          <!-- Page Content -->
          <div class="content content-full">
            <div class="row">
              <div class="col-lg-3 d-none d-lg-block">
                <!-- User and Main Navigation -->
                <div class="block block-bordered block-rounded bg-body">
                  <div class="block-content">
                    <div class="bg-body rounded p-2 mb-3 d-flex align-items-center">
                      <a class="img-link d-inline-block" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                      </a>
                      <div class="ms-3">
                        <a class="fw-semibold" href="javascript:void(0)">Stella Smith</a>
                        <div class="fs-sm text-muted">Developer</div>
                      </div>
                    </div>
                    <ul class="nav-main">
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-user-circle"></i>
                          <span class="nav-main-link-name">My Profile</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-bell"></i>
                          <span class="nav-main-link-name">Notifications</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-info">6</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-envelope-open"></i>
                          <span class="nav-main-link-name">Messages</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-info">1</span>
                        </a>
                      </li>
                      <li class="nav-main-heading">Home</li>
                      <li class="nav-main-item">
                        <a class="nav-main-link active" href="db_social_compact.html">
                          <i class="nav-main-link-icon far fa-newspaper"></i>
                          <span class="nav-main-link-name">News Feed</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-gem"></i>
                          <span class="nav-main-link-name">Marketplace</span>
                        </a>
                      </li>
                      <li class="nav-main-heading">Explore</li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-calendar-alt"></i>
                          <span class="nav-main-link-name">Events</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-user"></i>
                          <span class="nav-main-link-name">Groups</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-file-alt"></i>
                          <span class="nav-main-link-name">Pages</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-danger">32</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                          <i class="nav-main-link-icon far fa-images"></i>
                          <span class="nav-main-link-name">Photos</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-warning">14</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                          <i class="nav-main-link-icon fa fa-plus"></i>
                          <span class="nav-main-link-name">More</span>
                        </a>
                        <ul class="nav-main-submenu">
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                              <i class="nav-main-link-icon far fa-clock"></i>
                              <span class="nav-main-link-name">On This Day</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                              <i class="nav-main-link-icon far fa-newspaper"></i>
                              <span class="nav-main-link-name">Pages Feed</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                              <i class="nav-main-link-icon fa fa-gamepad"></i>
                              <span class="nav-main-link-name">Games</span>
                              <span class="nav-main-link-badge badge rounded-pill bg-success">25</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-main-heading">Dashboards</li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="be_pages_dashboard_all.html">
                          <i class="nav-main-link-icon fa fa-arrow-left"></i>
                          <span class="nav-main-link-name">Go Back</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END User and Main Navigation -->
              </div>
              <div class="col-md-8 col-lg-6">
                <!-- Post Update -->
                <div class="block block-bordered block-rounded">
                  <div class="block-content block-content-full">
                    <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                      <div class="input-group">
                        <input type="text" class="form-control form-control-alt" placeholder="What’s happening?">
                        <button type="submit" class="btn btn-primary border-0">
                          <i class="fa fa-pencil-alt opacity-50 me-1"></i> Post
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- END Post Update -->

                <!-- Timeline -->
                <!-- Update #1 -->
                <div class="block block-rounded block-bordered">
                  <div class="block-header block-header-default">
                    <div>
                      <a class="img-link me-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar1.jpg" alt="">
                      </a>
                      <a class="fw-semibold" href="javascript:void(0)">Danielle Jones</a>
                      <span class="fs-sm text-muted">3 hrs ago</span>
                    </div>
                    <div class="block-options">
                      <div class="dropdown">
                        <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-times-circle text-danger me-1"></i> Hide similar posts
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-thumbs-down text-warning me-1"></i> Stop following this user
                          </a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report this post
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-content">
                    <p>
                      How to get started your HTML page:
                    </p>
                    <pre><code class="html">&lt;!doctype html&gt;
  &lt;html&gt;
      &lt;head&gt;
          &lt;meta charset=&quot;utf-8&quot;&gt;

          &lt;title&gt;Title&lt;/title&gt;
      &lt;/head&gt;
      &lt;body&gt;
          &lt;!-- Your content --&gt;
      &lt;/body&gt;
  &lt;/html&gt;</code></pre>
                    <hr>
                    <ul class="nav nav-pills fs-sm push">
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-thumbs-up opacity-50 me-1"></i> Like
                        </a>
                      </li>
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-comment-alt opacity-50 me-1"></i> Comment
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="block-content block-content-full bg-body-light">
                    <p class="fs-sm">
                      <i class="fa fa-thumbs-up text-info"></i>
                      <i class="fa fa-heart text-danger"></i>
                      <i class="far fa-smile text-warning me-1"></i>
                      <a class="fw-semibold" href="javascript:void(0)">Thomas Riley</a>,
                      <a class="fw-semibold" href="javascript:void(0)">Lori Moore</a>,
                      <a class="fw-semibold" href="javascript:void(0)">and 150 others</a>
                    </p>
                    <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                      <input type="text" class="form-control form-control-alt" placeholder="Write a comment..">
                    </form>
                    <div class="pt-3 fs-sm">
                      <div class="d-flex">
                        <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                          <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                        </a>
                        <div class="flex-grow-1">
                          <p class="mb-1">
                            <a class="fw-semibold" href="javascript:void(0)">Laura Carr</a>
                            Vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.
                          </p>
                          <p>
                            <a href="javascript:void(0)" class="me-1">Like</a>
                            <a href="javascript:void(0)">Comment</a>
                          </p>
                          <div class="d-flex">
                            <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                              <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar12.jpg" alt="">
                            </a>
                            <div class="flex-grow-1">
                              <p class="mb-1">
                                <a class="fw-semibold" href="javascript:void(0)">Jose Wagner</a>
                                Odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                              </p>
                              <p>
                                <a href="javascript:void(0)" class="me-1">Like</a>
                                <a href="javascript:void(0)">Comment</a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END Update #1 -->

                <!-- Update #2 -->
                <div class="block block-rounded block-bordered">
                  <div class="block-header block-header-default">
                    <div>
                      <a class="img-link me-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar16.jpg" alt="">
                      </a>
                      <a class="fw-semibold" href="javascript:void(0)">Henry Harrison</a>
                      <span class="fs-sm text-muted">5 hrs ago</span>
                    </div>
                    <div class="block-options">
                      <div class="dropdown">
                        <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-times-circle text-danger me-1"></i> Hide similar posts
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-thumbs-down text-warning me-1"></i> Stop following this user
                          </a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report this post
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-content">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <hr>
                    <ul class="nav nav-pills fs-sm push">
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-thumbs-up opacity-50 me-1"></i> Like
                        </a>
                      </li>
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-comment-alt opacity-50 me-1"></i> Comment
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="block-content block-content-full bg-body-light">
                    <p class="fs-sm">
                      <i class="fa fa-heart text-danger"></i>
                      <a class="fw-semibold" href="javascript:void(0)">Jose Mills</a>,
                      <a class="fw-semibold" href="javascript:void(0)">Alice Moore</a>,
                      <a class="fw-semibold" href="javascript:void(0)">and 36 others</a>
                    </p>
                    <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                      <input type="text" class="form-control form-control-alt" placeholder="Write a comment..">
                    </form>
                  </div>
                </div>
                <!-- END Update #2 -->

                <!-- Update #3 -->
                <div class="block block-rounded block-bordered">
                  <div class="block-header block-header-default">
                    <div>
                      <a class="img-link me-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar5.jpg" alt="">
                      </a>
                      <a class="fw-semibold" href="javascript:void(0)">Helen Jacobs</a>
                      <span class="fs-sm text-muted">8 hrs ago</span>
                    </div>
                    <div class="block-options">
                      <div class="dropdown">
                        <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-times-circle text-danger me-1"></i> Hide similar posts
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-thumbs-down text-warning me-1"></i> Stop following this user
                          </a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report this post
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-content">
                    <p>
                      Our city escape continues..
                    </p>
                    <div class="row g-sm js-gallery img-fluid-100">
                      <!-- Magnific Popup (.js-gallery class is initialized in Helpers.jqMagnific()) -->
                      <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                      <div class="col-4">
                        <a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="assets/media/photos/photo11@2x.jpg">
                          <img class="img-fluid" src="assets/media/photos/photo11.jpg" alt="">
                        </a>
                      </div>
                      <div class="col-4">
                        <a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="assets/media/photos/photo12@2x.jpg">
                          <img class="img-fluid" src="assets/media/photos/photo12.jpg" alt="">
                        </a>
                      </div>
                      <div class="col-4">
                        <a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="assets/media/photos/photo13@2x.jpg">
                          <img class="img-fluid" src="assets/media/photos/photo13.jpg" alt="">
                        </a>
                      </div>
                    </div>
                    <hr>
                    <ul class="nav nav-pills fs-sm push">
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-thumbs-up opacity-50 me-1"></i> Like
                        </a>
                      </li>
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-comment-alt opacity-50 me-1"></i> Comment
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="block-content block-content-full bg-body-light">
                    <p class="fs-sm">
                      <i class="fa fa-thumbs-up text-info"></i>
                      <i class="fa fa-heart text-danger"></i>
                      <i class="far fa-smile text-warning me-1"></i>
                      <a class="fw-semibold" href="javascript:void(0)">Sara Fields</a>,
                      <a class="fw-semibold" href="javascript:void(0)">Jesse Fisher</a>,
                      <a class="fw-semibold" href="javascript:void(0)">and 43 others</a>
                    </p>
                    <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                      <input type="text" class="form-control form-control-alt" placeholder="Write a comment..">
                    </form>
                  </div>
                </div>
                <!-- END Update #3 -->

                <!-- Update #4 -->
                <div class="block block-rounded block-bordered">
                  <div class="block-header block-header-default">
                    <div>
                      <a class="img-link me-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar5.jpg" alt="">
                      </a>
                      <a class="fw-semibold" href="javascript:void(0)">Carol Ray</a>
                      <span class="fs-sm text-muted">15 hrs ago</span>
                    </div>
                    <div class="block-options">
                      <div class="dropdown">
                        <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-times-circle text-danger me-1"></i> Hide similar posts
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-thumbs-down text-warning me-1"></i> Stop following this user
                          </a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report this post
                          </a>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-content">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <hr>
                    <ul class="nav nav-pills fs-sm push">
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-thumbs-up opacity-50 me-1"></i> Like
                        </a>
                      </li>
                      <li class="nav-item me-1">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-comment-alt opacity-50 me-1"></i> Comment
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="block-content block-content-full bg-body-light">
                    <p class="fs-sm">
                      <i class="fa fa-thumbs-up text-info"></i>
                      <a class="fw-semibold" href="javascript:void(0)">Danielle Jones</a>,
                      <a class="fw-semibold" href="javascript:void(0)">Albert Ray</a>,
                      <a class="fw-semibold" href="javascript:void(0)">and 5 others</a>
                    </p>
                    <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                      <input type="text" class="form-control form-control-alt" placeholder="Write a comment..">
                    </form>
                  </div>
                </div>
                <!-- END Update #4 -->
                <!-- END Timeline -->
              </div>
              <div class="col-md-4 col-lg-3">
                <!-- Group Suggestions -->
                <div class="block block-bordered block-rounded bg-body">
                  <div class="block-content block-content-full">
                    <div class="row g-sm mb-2">
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo18.jpg" alt="">
                      </div>
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo16.jpg" alt="">
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a class="fw-semibold" href="javascript:void(0)">Hiking</a>
                        <div class="fs-sm text-muted">68k Members</div>
                      </div>
                      <a class="btn btn-sm btn-alt-secondary d-inline-block" href="javascript:void(0)">
                        <i class="fa fa-fw fa-plus-circle"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="block block-bordered block-rounded bg-body">
                  <div class="block-content block-content-full">
                    <div class="row g-sm mb-2">
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo12.jpg" alt="">
                      </div>
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo13.jpg" alt="">
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a class="fw-semibold" href="javascript:void(0)">Travel Photos</a>
                        <div class="fs-sm text-muted">65k Members</div>
                      </div>
                      <a class="btn btn-sm btn-alt-secondary d-inline-block" href="javascript:void(0)">
                        <i class="fa fa-fw fa-plus-circle"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="block block-bordered block-rounded bg-body">
                  <div class="block-content block-content-full">
                    <div class="row g-sm mb-2">
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo22.jpg" alt="">
                      </div>
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo23.jpg" alt="">
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a class="fw-semibold" href="javascript:void(0)">Coding Frenzy</a>
                        <div class="fs-sm text-muted">109k Members</div>
                      </div>
                      <a class="btn btn-sm btn-alt-secondary d-inline-block" href="javascript:void(0)">
                        <i class="fa fa-fw fa-plus-circle"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="block block-bordered block-rounded bg-body">
                  <div class="block-content block-content-full">
                    <div class="row g-sm mb-2">
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo9.jpg" alt="">
                      </div>
                      <div class="col-6">
                        <img class="img-fluid" src="assets/media/photos/photo6.jpg" alt="">
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a class="fw-semibold" href="javascript:void(0)">Nature Lovers</a>
                        <div class="fs-sm text-muted">32k Members</div>
                      </div>
                      <a class="btn btn-sm btn-alt-secondary d-inline-block" href="javascript:void(0)">
                        <i class="fa fa-fw fa-plus-circle"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- END Group Suggestions -->
              </div>
            </div>

            <!-- Pinned Chat Block -->
            <!-- Chat functionality is initialized in js/pages/be_comp_chat.min.js which was auto compiled from _js/pages/be_comp_chat.js -->
            <!--
                You can use the following JS function to add a header message to a chat window:
                Chat.addHeader(chatId, chatMsg, chatMsgLevel)

                chatId         : the data-chat-id attribute of the chat window
                chatMsg        : the header message you would like to add
                chatMsgLevel   : 'self' aligns the header to the right (default is left)

                You can use the following JS function to add a message to a chat window:
                Chat.addMessage(chatId, chatMsg, chatMsgLevel)

                chatId         : the data-chat-id attribute of the chat window
                chatMsg        : the message you would like to add
                chatMsgLevel   : 'self' the user sends the message (default is when the user receives the message)
            -->
            <div class="block block-mode-pinned">
              <!-- Chat #4 Header -->
              <div class="block-header block-header-default">
                <h3 class="block-title">
                  <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar7.jpg" alt="">
                  <span class="fs-sm fw-semibold ms-2">Lisa Smith</span>
                </h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                  </button>
                </div>
              </div>
              <!-- END Chat #4 Header -->

              <!-- Chat #4 Messages -->
              <div class="js-chat-messages block-content block-content-full text-break overflow-y-auto" data-chat-id="4" style="height: 300px;"></div>

              <!-- Chat #4 Input -->
              <div class="js-chat-form block-content p-2 bg-body-light">
                <form action="db_social_compact.html" method="POST">
                  <input type="text" class="js-chat-input form-control form-control-alt" data-target-chat-id="4" placeholder="Type a message..">
                </form>
              </div>
              <!-- END Chat #4 Input -->
            </div>
            <!-- END Pinned Chat Block -->
          </div>
          <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
          <div class="content py-0">
            <div class="row fs-sm">
              <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
              </div>
              <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                <a class="fw-semibold" href="https://1.envato.market/r6y" target="_blank">Dashmix 5.5</a> &copy; <span data-toggle="year-copy"></span>
              </div>
            </div>
          </div>
        </footer>
        <!-- END Footer -->
      </div>
      <!-- END Page Container -->

    @push('script')

        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
            <script>
                Dashmix.onLoad(function () {
                  // Add demonstration headers and messages for Chat #4
                  Chat.addHeader(4, 'Yesterday');
                  Chat.addMessage(4, 'Hi there!');
                  Chat.addHeader(4, 'Today', 'self');
                  Chat.addMessage(4, 'Hey, how are you?', 'self');
                });
              </script>

<script>Dashmix.helpersOnLoad(['js-highlightjs', 'jq-magnific-popup']);</script>
    @endpush
</x-app-layout>
