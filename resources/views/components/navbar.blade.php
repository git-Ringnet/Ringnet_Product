<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @if (!empty($title))
            {{ $title }}
        @endif
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/icon/favicon.ico') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <script src="https://kit.fontawesome.com/774b78ff1e.js" crossorigin="anonymous"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Việt css -->
    <link rel="stylesheet" href="{{ asset('dist/css/css.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light w-100">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link p-0 d-flex align-items-center" data-widget="pushmenu" href="#"
                        role="button"><svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="8" fill="white" />
                            <path d="M16 19H32" stroke="#212529" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 24H32" stroke="#212529" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 29H32" stroke="#212529" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item d-sm-inline-block">
                    <a href="#" class="title">
                        @if (!empty($title))
                            {{ $title }}
                        @endif
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown d-none">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4" style="top:57px">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg class="stroke" width="32" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 11.7455V20C3 20.5523 3.44772 21 4 21H8.75C9.30229 21 9.75 20.5523 9.75 20V15.7692C9.75 15.2169 10.1977 14.7692 10.75 14.7692H13.25C13.8023 14.7692 14.25 15.2169 14.25 15.7692V20C14.25 20.5523 14.6977 21 15.25 21H20C20.5523 21 21 20.5523 21 20V11.7455C21 11.4664 20.8834 11.2 20.6783 11.0107L12.6783 3.6261C12.2952 3.27251 11.7048 3.27251 11.3217 3.6261L3.32172 11.0107C3.11664 11.2 3 11.4664 3 11.7455Z"
                                    stroke="#555555" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg class="fill" width="32" height="32" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6516 4C11.2699 4 10.895 4.10041 10.5644 4.29114L5.08731 7.45356C4.75673 7.64442 4.48222 7.91893 4.29136 8.2495C4.1005 8.58007 4.00001 8.95508 4 9.3368V15.6607C4 16.4378 4.41424 17.1557 5.08756 17.544L10.5644 20.7071C10.8794 20.8889 11.2347 20.9886 11.5978 20.9976C11.6155 20.9992 11.6334 21 11.6516 21C11.6697 21 11.6876 20.9992 11.7054 20.9976C12.0684 20.9886 12.4239 20.8888 12.7389 20.707L18.2158 17.5447C18.5464 17.3538 18.8209 17.0793 19.0118 16.7488C19.2026 16.4182 19.3031 16.0432 19.3031 15.6614V9.3368C19.3031 8.55972 18.8888 7.84177 18.2156 7.45341L12.7387 4.29114C12.4082 4.10041 12.0332 4 11.6516 4ZM17.6227 16.5175L12.2447 19.6227V12.8416L18.117 9.45097V15.6614C18.117 15.8349 18.0713 16.0054 17.9845 16.1557C17.8978 16.3059 17.773 16.4307 17.6227 16.5175ZM11.0585 19.6227V12.8415L7.94211 11.0422C7.93429 11.0379 7.92656 11.0334 7.91893 11.0288L5.18617 9.45094V15.6607C5.18617 16.0143 5.3745 16.3402 5.68017 16.5165L11.0585 19.6227ZM9.41421 10.5225L15.29 7.13387L17.5239 8.42372L11.6516 11.8143L9.41421 10.5225ZM8.22775 9.83741L5.77929 8.4237L11.1572 5.31856C11.3075 5.23189 11.4781 5.18617 11.6516 5.18617C11.8251 5.18617 11.9957 5.23189 12.146 5.31856L14.1035 6.44882L8.22775 9.83741Z"
                                    fill="#555555" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.52127 12.2537C5.72909 11.8954 6.18803 11.7734 6.54633 11.9812L9.54633 13.7212C9.90464 13.9291 10.0266 14.388 9.81882 14.7463C9.611 15.1046 9.15206 15.2266 8.79376 15.0188L5.79376 13.2788C5.43545 13.071 5.31345 12.612 5.52127 12.2537Z"
                                    fill="#55555" />
                            </svg>
                            <p>
                                Sản phẩm
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg class="fill" width="32" height="32" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6516 4C11.2699 4 10.895 4.10041 10.5644 4.29114L5.08731 7.45356C4.75673 7.64442 4.48222 7.91893 4.29136 8.2495C4.1005 8.58007 4.00001 8.95508 4 9.3368V15.6607C4 16.4378 4.41424 17.1557 5.08756 17.544L10.5644 20.7071C10.8794 20.8889 11.2347 20.9886 11.5978 20.9976C11.6155 20.9992 11.6334 21 11.6516 21C11.6697 21 11.6876 20.9992 11.7054 20.9976C12.0684 20.9886 12.4239 20.8888 12.7389 20.707L18.2158 17.5447C18.5464 17.3538 18.8209 17.0793 19.0118 16.7488C19.2026 16.4182 19.3031 16.0432 19.3031 15.6614V9.3368C19.3031 8.55972 18.8888 7.84177 18.2156 7.45341L12.7387 4.29114C12.4082 4.10041 12.0332 4 11.6516 4ZM17.6227 16.5175L12.2447 19.6227V12.8416L18.117 9.45097V15.6614C18.117 15.8349 18.0713 16.0054 17.9845 16.1557C17.8978 16.3059 17.773 16.4307 17.6227 16.5175ZM11.0585 19.6227V12.8415L7.94211 11.0422C7.93429 11.0379 7.92656 11.0334 7.91893 11.0288L5.18617 9.45094V15.6607C5.18617 16.0143 5.3745 16.3402 5.68017 16.5165L11.0585 19.6227ZM9.41421 10.5225L15.29 7.13387L17.5239 8.42372L11.6516 11.8143L9.41421 10.5225ZM8.22775 9.83741L5.77929 8.4237L11.1572 5.31856C11.3075 5.23189 11.4781 5.18617 11.6516 5.18617C11.8251 5.18617 11.9957 5.23189 12.146 5.31856L14.1035 6.44882L8.22775 9.83741Z"
                                    fill="#555555" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.52127 12.2537C5.72909 11.8954 6.18803 11.7734 6.54633 11.9812L9.54633 13.7212C9.90464 13.9291 10.0266 14.388 9.81882 14.7463C9.611 15.1046 9.15206 15.2266 8.79376 15.0188L5.79376 13.2788C5.43545 13.071 5.31345 12.612 5.52127 12.2537Z"
                                    fill="#55555" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between" style="width: 80%;">
                                <p>Bán hàng</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('quoteExport.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Báo giá</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Giao hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hóa đơn bán hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thanh toán</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Khách hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="alert notification d-flex justify-content-center align-items-center m-0">
        <div class="success" style="position: absolute;top: 60px;">
            @if (Session::has('msg'))
                <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert"
                    style="z-index: 999999;">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4.38462C7.79374 4.38462 4.38462 7.79374 4.38462 12C4.38462 16.2063 7.79374 19.6154 12 19.6154C16.2063 19.6154 19.6154 16.2063 19.6154 12C19.6154 7.79374 16.2063 4.38462 12 4.38462ZM3 12C3 7.02903 7.02903 3 12 3C16.971 3 21 7.02903 21 12C21 16.971 16.971 21 12 21C7.02903 21 3 16.971 3 12Z"
                                fill="#ffff" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.1818 9.66432C16.4522 9.93468 16.4522 10.373 16.1818 10.6434L11.5664 15.2588C11.2961 15.5291 10.8577 15.5291 10.5874 15.2588L7.81813 12.4895C7.54777 12.2192 7.54777 11.7808 7.81813 11.5105C8.08849 11.2401 8.52684 11.2401 8.7972 11.5105L11.0769 13.7902L15.2027 9.66432C15.4731 9.39396 15.9115 9.39396 16.1818 9.66432Z"
                                fill="#ffff" />
                        </svg>
                    </div>
                    <div class="message pl-3">
                        {{ Session::get('msg') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="d-flex" aria-hidden="true"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            @endif
        </div>
        <div class="warning" style="position: absolute;top: 60px;">
            @if (Session::has('warning'))
                <div id="notification" class="alert alert-warning alert-dismissible fade show m-0" role="alert"
                    style="z-index: 999999;">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4.38462C7.79374 4.38462 4.38462 7.79374 4.38462 12C4.38462 16.2063 7.79374 19.6154 12 19.6154C16.2063 19.6154 19.6154 16.2063 19.6154 12C19.6154 7.79374 16.2063 4.38462 12 4.38462ZM12 21C7.02903 21 3 16.971 3 12C3 7.02903 7.02903 3 12 3C16.971 3 21 7.02903 21 12C21 16.971 16.971 21 12 21Z"
                                fill="#ffff" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 7.15384C12.3824 7.15384 12.6923 7.4638 12.6923 7.84615V12.4615C12.6923 12.8439 12.3824 13.1538 12 13.1538C11.6177 13.1538 11.3077 12.8439 11.3077 12.4615V7.84615C11.3077 7.4638 11.6177 7.15384 12 7.15384Z"
                                fill="#ffff" />
                            <circle cx="12" cy="15.6923" r="0.923077" fill="#ffff" />
                        </svg>
                    </div>
                    <div class="message pl-3">
                        {{ Session::get('warning') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="d-flex" aria-hidden="true"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     setTimeout(function() {
        //         $('#notification').fadeOut('slow', function() {
        //             $(this).remove();
        //         });
        //     }, 4000);
        // });
    </script>
