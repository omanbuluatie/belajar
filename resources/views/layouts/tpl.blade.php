<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/tpl') }}/assets/libs/flatpickr/dist/flatpickr.min.css" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Codescandy" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/tpl') }}/assets/images/favicon/favicon.ico" />

    <!-- darkmode js -->
    <script src="{{ asset('/tpl') }}/assets/js/vendors/darkMode.js"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('/tpl') }}/assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="{{ asset('/tpl') }}/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="{{ asset('/tpl') }}/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/tpl') }}/assets/css/theme.min.css">

    <link rel="canonical" href="admin-dashboard.html" />
    <title>Dashboard | Geeks - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="vh-100" data-simplebar>
                <!-- Brand logo -->
                <a class="navbar-brand" href="../../index.html">
                    <img src="{{ asset('/tpl') }}/assets/images/brand/logo/logo-inverse.svg" alt="Geeks" />
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item">
                        <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#navDashboard"
                            aria-expanded="false" aria-controls="navDashboard">
                            <i class="nav-icon fe fe-home me-2"></i>
                            Dashboard
                        </a>
                        <div id="navDashboard" class="collapse  show " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link  active " href="admin-dashboard.html">Overview</a>
                                </li>
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link " href="dashboard-analytics.html">Analytics</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    

                </ul>
                <!-- Card -->
                <div class="card bg-dark-primary shadow-none text-center mx-4 my-8 border-0">
                    <div class="card-body py-6">
                        <img src="{{ asset('/tpl') }}/assets/images/background/giftbox.png" alt="" />
                        <div class="mt-4">
                            <h5 class="text-white">Unlimited Access</h5>
                            <p class="text-white-50 fs-6">Upgrade your plan from a Free trial, to select ‘Business
                                Plan’. Start Now</p>
                            <a href="#" class="btn btn-white btn-sm mt-2">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar-default navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#">
                        <i class="fe fe-menu"></i>
                    </a>
                    <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <!-- Form -->
                        <form class="d-flex align-items-center">
                            <span class="position-absolute ps-3 search-icon">
                                <i class="fe fe-search"></i>
                            </span>
                            <input type="search" class="form-control ps-6" placeholder="Search Entire Dashboard" />
                        </form>
                    </div>
                    <!--Navbar nav -->
                    <div class="ms-auto d-flex">
                        <div class="dropdown">
                            <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center"
                                type="button" aria-expanded="false" data-bs-toggle="dropdown"
                                aria-label="Toggle theme (auto)">
                                <i class="bi theme-icon-active"></i>
                                <span class="visually-hidden bs-theme-text">Toggle theme</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="light" aria-pressed="false">
                                        <i class="bi theme-icon bi-sun-fill"></i>
                                        <span class="ms-2">Light</span>
                                    </button>
                                </li>
                                
                            </ul>
                        </div>
                        <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
                            <li class="dropdown stopevent">
                                <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary"
                                    href="#" role="button" id="dropdownNotification"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe fe-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
                                    aria-labelledby="dropdownNotification">
                                    <div>
                                        <div
                                            class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                            <span class="h4 mb-0">Notifications</span>
                                            <a href="# ">
                                                <span class="align-middle">
                                                    <i class="fe fe-settings me-1"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- List group -->
                                        <ul class="list-group list-group-flush" data-simplebar
                                            style="max-height: 300px">
                                            <li class="list-group-item bg-light">
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-body" href="#">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('/tpl') }}/assets/images/avatar/avatar-1.jpg"
                                                                    alt="" class="avatar-md rounded-circle" />
                                                                <div class="ms-3">
                                                                    <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                                    <p class="mb-3">Krisitn Watsan like your comment
                                                                        on course Javascript Introduction!</p>
                                                                    <span class="fs-6">
                                                                        <span>
                                                                            <span
                                                                                class="fe fe-thumbs-up text-success me-1"></span>
                                                                            2 hours ago,
                                                                        </span>
                                                                        <span class="ms-1">2:19 PM</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-center me-2">
                                                        <a href="#" class="badge-dot bg-info"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Mark as read"></a>
                                                        <div>
                                                            <a href="#" class="bg-transparent"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Remove">
                                                                <i class="fe fe-x"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-body" href="#">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('/tpl') }}/assets/images/avatar/avatar-2.jpg"
                                                                    alt="" class="avatar-md rounded-circle" />
                                                                <div class="ms-3">
                                                                    <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                                    <p class="mb-3">Just launched a new Courses React
                                                                        for Beginner.</p>
                                                                    <span class="fs-6">
                                                                        <span>
                                                                            <span
                                                                                class="fe fe-thumbs-up text-success me-1"></span>
                                                                            Oct 9,
                                                                        </span>
                                                                        <span class="ms-1">1:20 PM</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-center me-2">
                                                        <a href="#" class="badge-dot bg-secondary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Mark as unread"></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-body" href="#">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('/tpl') }}/assets/images/avatar/avatar-3.jpg"
                                                                    alt="" class="avatar-md rounded-circle" />
                                                                <div class="ms-3">
                                                                    <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                                    <p class="mb-3">Krisitn Watsan like your comment
                                                                        on course Javascript Introduction!</p>
                                                                    <span class="fs-6">
                                                                        <span>
                                                                            <span
                                                                                class="fe fe-thumbs-up text-info me-1"></span>
                                                                            Oct 9,
                                                                        </span>
                                                                        <span class="ms-1">1:56 PM</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-center me-2">
                                                        <a href="#" class="badge-dot bg-secondary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Mark as unread"></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-body" href="#">
                                                            <div class="d-flex">
                                                                <img src="{{ asset('/tpl') }}/assets/images/avatar/avatar-4.jpg"
                                                                    alt="" class="avatar-md rounded-circle" />
                                                                <div class="ms-3">
                                                                    <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                                    <p class="mb-3">You earn new certificate for
                                                                        complete the Javascript Beginner course.</p>
                                                                    <span class="fs-6">
                                                                        <span>
                                                                            <span
                                                                                class="fe fe-award text-warning me-1"></span>
                                                                            Oct 9,
                                                                        </span>
                                                                        <span class="ms-1">1:56 PM</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-center me-2">
                                                        <a href="#" class="badge-dot bg-secondary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Mark as unread"></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="border-top px-3 pt-3 pb-0">
                                            <a href="../notification-history.html" class="text-link fw-semibold">See
                                                all Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- List -->
                            
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Page Header -->
            <!-- Container fluid -->
            <section class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div
                            class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                            <div>
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="input-group">
                                    <input class="form-control flatpickr" type="text" placeholder="Select Date"
                                        aria-describedby="basic-addon2" />

                                    <span class="input-group-text" id="basic-addon2"><i
                                            class="fe fe-calendar"></i></span>
                                </div>
                                <a href="#" class="btn btn-primary">Setting</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </section>
        </main>
    </div>

    <!-- Script -->

    <!-- Libs JS -->
    <script src="{{ asset('/tpl') }}/assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('/tpl') }}/assets/js/theme.min.js"></script>
    {{-- <script src="{{ asset('js') }}/jquery.min.js"></script> --}}

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/') }}/dataTables.responsive.min.js"></script>
    <script src="{{ asset('js/') }}/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('/tpl') }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/js/vendors/chart.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/js/vendors/flatpickr.js"></script>
</body>
</html>
