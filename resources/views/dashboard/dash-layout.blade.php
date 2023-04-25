<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Community Healthcare</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ url('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ url('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/jquery-bar-rating/fontawesome-stars.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#212529">
                <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}"><img style="height:180px; width:75%" src="{{ url('assets/images/default-monochrome.svg') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}"><img src="{{ url('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-flex">
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    @php
                    $id = Auth::user()->id;
                    @endphp
                    <li class="nav-item dropdown d-flex mr-4 ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                            <a href="{{ url('/user/profile/'.$id) }}" class="dropdown-item preview-item">
                                <i class="icon-head"></i> Profile
                            </a>
                            <a class="dropdown-item preview-item btn" href="{{ route('logout') }}">
                                <i class="icon-inbox"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#212529">
                <ul class="nav">
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('/dashboard') }}" style="border:none">
                            <i class="icon-box menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->access_level == 1)
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('/user') }}" style="border:none">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Clients</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('/admin/chw') }}" style="border:none">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">CHW</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('admin/questions') }}" style="border:none">
                            <i class="icon-paper menu-icon" style="font-size:24px"></i>
                            <span class="menu-title">Questions</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('admin/answers') }}" style="border:none">
                            <i class="icon-align-justify menu-icon" style="font-size:24px"></i>
                            <span class="menu-title">Answers</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('admin/forms') }}" style="border:none">
                            <i class="icon-paper-stack menu-icon" style="font-size:24px"></i>
                            <span class="menu-title">Submissions</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="{{ url('admin/submitted-form') }}" style="border:none">
                            <i class="icon-paper-stack menu-icon" style="font-size:24px"></i>
                            <span class="menu-title">Submitted <br> Submissions</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom:5px">
                        <a class="nav-link" href="#" style="border:none">
                            <i class="icon-file menu-icon" style="font-size:24px"></i>
                            <span class="menu-title">Reports</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </nav>

            @yield('content')
            @yield('profile-index-content')
            @yield('question-index-content')
            @yield('question-edit-content')
            @yield('answers-index-content')
            @yield('answer-edit-content')
            @yield('forms-index-content')
            @yield('forms-edit-content')
            @yield('forms-questions-index-content')
            @yield('forms-questions-edit-content')
            @yield('forms-answers-index-content')
            @yield('forms-answers-edit-content')
            @yield('chw-index-content')
            @yield('chw-edit-content')
            @yield('form-submit-index-content')
            @yield('form-submit-show-content')
            @yield('chw-dashboard-content')
            @yield('chw-form-assign-content')
            @yield('chw-assign-show-content')
            @yield('chw-search-content')
            @yield('chw-assigned-dashboard-content')


        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="{{ url('assets/vendors/base/vendor.bundle.base.js') }}"></script>

    <script src="{{ url('assets/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/js/template.js') }}"></script>
    <script src="{{ url('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ url('assets/js/dashboard.js') }}"></script>
</body>

</html>