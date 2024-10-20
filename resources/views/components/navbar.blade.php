@if (Auth::guest())
    <?php header('Location: ' . route('landingPage'));
    exit(); ?>
@endif
@if (!Auth::user()->current_workspace)
    <?php header('Location: ' . route('landingPage'));
    exit(); ?>
@endif
@if (Auth::check())
    <!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
    @php
        $currentWorkspace = Auth::user()->current_workspace;
        $workspacename = App\Models\Workspace::where('id', Auth::user()->current_workspace)->first();
        $workspacename = $workspacename->workspace_name;
        $idUser = Auth::user()->id;
        $workspaceExists = App\Models\Workspace::where('id', $currentWorkspace)->where('user_id', $idUser)->exists();
    @endphp
    {{-- @if ($workspaceExists)
        <!-- Hiển thị nội dung navbar dựa trên việc current_workspace của người dùng có tồn tại trong Workspace hay không -->
        <p>User's current workspace exists in Workspace.</p>
    @else
        <p>User's current workspace does not exist in Workspace.</p>
    @endif --}}
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="google-site-verification" content="K1w-WrdYbh4UE0ZLNP8lot6xN-tkavJTByQY-Hd4t-0" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F10684L2DN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F10684L2DN');
    </script>

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
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Việt css -->
    <link rel="stylesheet" href="{{ asset('dist/css/css.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('dist/js/scripts.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/n2words@1.21.0/dist/n2words.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
</head>




<body class="hold-transition sidebar-mini layout-fixed">
    @if (!Auth::user()->phone_number)
        <div class="modal-backdrop show"></div>
        <div class="input_phone_number">
            <label for="">Số điện thoại*</label>
            <div class="row">
                <input class="form-control" id="phone_number" name="phone_number" type="number">
            </div>
            <div class="row pb-2">
                <div class="text-noiti text-13-red"></div>
            </div>
            <div class="row">
                <button class="form-control btn-confirm-phonenumber">
                    Xác nhận
                </button>
            </div>
        </div>
    @endif
    {{-- <a id="live-chat" href="https://zalo.me/g/pcgrpw834" target="_blank"><img
            src="{{ asset('dist/img/Icon_of_Zalo.svg.png') }}" alt=""></a> --}}
    <div id="dropdown-content" class="dropdown-content position-absolute setting-user-info">
        @if (Route::has('login'))
            @auth
                <div class="email_info border-bottom" style="padding-left:16px;">
                    {{ Auth::user()->email }}
                </div>
                <div class="workspace_user border-bottom">
                    @isset($global_variable)
                        @foreach ($global_variable as $item)
                            <div class="d-flex align-items-baseline justify-content-between pr-2">
                                <a class="workspace-link" href="{{ route('welcome', $item['workspace_name']) }}"
                                    data-id="{{ $item['id'] }}">{{ $item['workspace_name'] }}</a>
                                <svg class="{{ Auth::user()->current_workspace == $item['id'] ? 'd-block' : 'd-none' }}"
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.93777 11.6924C3.78507 11.6918 3.63434 11.6578 3.49614 11.5928C3.35794 11.5279 3.2356 11.4335 3.13768 11.3163L0.233359 7.82795C0.147155 7.72562 0.0825398 7.60692 0.0433996 7.47897C0.00425936 7.35103 -0.00859695 7.21649 0.00560415 7.08345C0.0198052 6.95041 0.0607702 6.82161 0.126035 6.70481C0.1913 6.58801 0.279515 6.48562 0.385376 6.4038C0.600698 6.23605 0.8726 6.15819 1.14407 6.18653C1.41555 6.21487 1.6655 6.34722 1.84154 6.55581L3.84976 8.95607L9.29836 0.955201C9.45267 0.730273 9.68858 0.57436 9.956 0.520579C10.2234 0.466797 10.5013 0.519384 10.7305 0.66717C10.8474 0.737722 10.9485 0.831645 11.0274 0.943059C11.1064 1.05447 11.1614 1.18098 11.1892 1.31466C11.217 1.44835 11.2169 1.58633 11.1889 1.71997C11.1609 1.85361 11.1057 1.98003 11.0266 2.09133L4.80187 11.2363C4.71247 11.3687 4.59379 11.4786 4.45505 11.5577C4.3163 11.6368 4.1612 11.6829 4.00178 11.6924H3.93777Z"
                                        fill="#6E79D6" />
                                </svg>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="workspace_setting border-bottom">
                    @if (Auth::user()->origin_workspace === Auth::user()->current_workspace)
                        <a href="{{ route('overview', $workspacename) }}">Cài đặt workspace</a>
                    @endif
                    <a href="{{ route('settings.index', $workspacename) }}">Mời và quản lý thành viên</a>
                </div>
                {{-- Button logout laravel Vite --}}
                {{-- @method('POST')
                <a href="{{ route('logout') }}">Đăng xuất</a> --}}

                <div class="logout_user">
                    <form class="" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="text-sm text-custom" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">Đăng
                            xuất</a>
                    </form>
                </div>
            @endauth
        @endif
    </div>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light w-100 border-bottom-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav me-auto">
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
            </ul>
            <!-- Centered navigation items -->
            {{-- <ul class="navbar-nav mx-auto nav-title justify-content-center">
                <li
                    class="nav-item {{ request()->route()->named('inventory.index', 'inventory.edit', 'guests.index', 'guests.create', 'guests.edit')? 'active': '' }}">
                    <a href="#" class="">Kho hàng</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#" class="">Dự án</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="">Nhân sự</a>
                </li>
            </ul> --}}
            <!-- Right navbar links -->
            {{-- <ul class="navbar-nav justify-content-end align-items-baseline">
                <li class="nav-item">Button dropdown</li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.2604 19C14.6688 19 15 19.3231 15 19.7216V20.0726C15 20.0726 15 20.0727 15 20.0726C15.0001 20.8488 14.6842 21.5934 14.1218 22.1423C13.5593 22.6913 12.7963 22.9998 12.0007 23C11.205 23.0002 10.4419 22.692 9.87914 22.1432C9.31641 21.5945 9.00017 20.8501 9 20.0739V19.7225C9 19.324 9.33115 19.001 9.73965 19.001C10.1481 19.001 10.4793 19.324 10.4793 19.7225V20.0736C10.4793 20.0735 10.4793 20.0736 10.4793 20.0736C10.4794 20.467 10.6397 20.8444 10.9249 21.1225C11.2102 21.4007 11.597 21.5569 12.0003 21.5568C12.4036 21.5567 12.7904 21.4004 13.0755 21.1221C13.3607 20.8438 13.5208 20.4664 13.5207 20.0729V19.7216C13.5207 19.3231 13.8519 19 14.2604 19Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.3054 1C11.9796 1 11.6569 1.0585 11.3558 1.17216C11.0548 1.28582 10.7812 1.45242 10.5508 1.66244C10.3204 1.87245 10.1376 2.12178 10.0129 2.39618C9.88816 2.67058 9.82397 2.96468 9.82397 3.2617V4.0655C9.82397 4.13834 9.83699 4.20841 9.861 4.27388C9.53811 4.34835 9.22064 4.44677 8.91146 4.56871C8.12777 4.8778 7.40998 5.33315 6.80129 5.91291C6.19242 6.49286 5.70436 7.18634 5.36966 7.95623C5.0349 8.72623 4.86136 9.55534 4.86149 10.3945L4.86136 12.873L4.86135 13.1302C4.86135 13.1302 4.86075 13.1326 4.85957 13.1353C4.85734 13.1405 4.85131 13.1514 4.83733 13.1647L4.17939 13.7913C3.43608 14.4992 3.00023 15.4794 3 16.5216C3 17.5354 3.42368 18.4887 4.14589 19.1766C4.86501 19.8616 5.82184 20.2314 6.80165 20.2314H17.8094C18.2964 20.2314 18.7806 20.1402 19.235 19.9609C19.6896 19.7815 20.1084 19.5165 20.4652 19.1766C20.8222 18.8366 21.1105 18.4279 21.3089 17.9715C21.5075 17.5149 21.611 17.0221 21.611 16.522C21.6108 15.4798 21.1752 14.4994 20.4319 13.7915L19.7737 13.1647C19.7597 13.1514 19.7537 13.1405 19.7515 13.1353C19.7509 13.134 19.7505 13.1327 19.7502 13.1318C19.7499 13.1308 19.7497 13.1302 19.7497 13.1302L19.7496 10.3945C19.7497 9.55535 19.5761 8.72623 19.2414 7.95623C18.9067 7.18634 18.4186 6.49286 17.8098 5.91291C17.2011 5.33315 16.4833 4.8778 15.6996 4.56871C15.3904 4.44675 15.0728 4.34832 14.7499 4.27385C14.7739 4.20839 14.7869 4.13833 14.7869 4.0655V3.2617C14.7869 2.96468 14.7227 2.67058 14.598 2.39618C14.4733 2.12178 14.2905 1.87245 14.0601 1.66244C13.8297 1.45242 13.5561 1.28582 13.2551 1.17216C12.954 1.0585 12.6313 1 12.3054 1ZM13.347 4.10277C13.3463 4.09043 13.3459 4.07801 13.3459 4.0655V3.2617C13.3459 3.13717 13.319 3.01385 13.2667 2.8988C13.2144 2.78375 13.1378 2.67921 13.0411 2.59116C12.9445 2.5031 12.8298 2.43325 12.7036 2.3856C12.5774 2.33794 12.4421 2.31341 12.3054 2.31341C12.1688 2.31341 12.0335 2.33794 11.9073 2.3856C11.7811 2.43325 11.6664 2.5031 11.5698 2.59116C11.4731 2.67921 11.3965 2.78375 11.3442 2.8988C11.2919 3.01385 11.265 3.13717 11.265 3.2617V4.0655C11.265 4.07801 11.2646 4.09044 11.2639 4.10277C11.3008 4.10217 11.3378 4.10187 11.3748 4.10187H13.2363C13.2732 4.10187 13.3101 4.10217 13.347 4.10277ZM6.72268 10.3665C6.72262 10.3757 6.72259 10.3849 6.72259 10.3941V13.1295C6.72248 13.6482 6.50605 14.1456 6.12092 14.5123L5.46278 15.1392C5.07765 15.5059 4.86122 16.0033 4.8611 16.522C4.8611 17.0122 5.06556 17.4823 5.42948 17.829C5.7934 18.1756 6.28699 18.3703 6.80165 18.3703H17.8094C18.0642 18.3703 18.3166 18.3225 18.552 18.2296C18.7874 18.1368 19.0014 18.0006 19.1816 17.829C19.3618 17.6573 19.5047 17.4536 19.6022 17.2293C19.6997 17.0051 19.7499 16.7647 19.7499 16.522C19.7498 16.0033 19.5334 15.5059 19.1483 15.1392L18.4901 14.5123C18.105 14.1456 17.8886 13.6482 17.8885 13.1295V10.3941C17.8886 9.81217 17.7683 9.23591 17.5346 8.69824C17.3009 8.16057 16.9582 7.67204 16.5262 7.26054C16.0941 6.84905 15.5812 6.52266 15.0167 6.30002C14.4523 6.07738 13.8472 5.96285 13.2363 5.96298H11.3748C10.8368 5.96287 10.3034 6.05166 9.79823 6.22488C9.72972 6.24838 9.66172 6.27343 9.59431 6.30002C9.02982 6.52266 8.51691 6.84905 8.08489 7.26054C7.65286 7.67204 7.31019 8.16057 7.07645 8.69824C6.8464 9.2274 6.72629 9.79395 6.72268 10.3665Z"
                                fill="#42526E" />
                        </svg>
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.5703 0.218022C10.9227 0.217226 11.2673 0.32264 11.559 0.520522C11.8506 0.718404 12.0759 0.999573 12.2055 1.32737L12.7235 2.64053C12.7235 2.64045 12.7236 2.64061 12.7235 2.64053C12.8392 2.93323 13.061 3.17182 13.3446 3.30829C13.6283 3.4448 13.953 3.46934 14.254 3.377L15.6063 2.9629C15.9428 2.85984 16.3025 2.86038 16.6387 2.96444C16.9748 3.0685 17.2719 3.27127 17.4914 3.54641L18.2062 4.44322C18.4256 4.71823 18.5573 5.05287 18.5841 5.40367C18.6109 5.75447 18.5316 6.10522 18.3564 6.41036L17.6512 7.63681C17.4944 7.90948 17.4462 8.23122 17.5162 8.53786C17.5862 8.8445 17.7692 9.11349 18.0287 9.29118L19.1949 10.0897C19.4858 10.2883 19.7099 10.57 19.8382 10.8979C19.9663 11.2257 19.9928 11.5844 19.9141 11.9274C19.914 11.9276 19.9141 11.9271 19.9141 11.9274L19.6592 13.0448C19.4987 13.746 18.9263 14.2797 18.2145 14.3884C18.2143 14.3884 18.2146 14.3884 18.2145 14.3884L16.8165 14.6024C16.5055 14.6498 16.2235 14.8128 16.0273 15.0588C15.8312 15.3047 15.735 15.6156 15.758 15.9293L15.861 17.3421C15.861 17.342 15.861 17.3422 15.861 17.3421C15.8866 17.6921 15.8064 18.0422 15.6308 18.346C15.4551 18.65 15.192 18.8941 14.8757 19.0466L13.8394 19.5457C13.1905 19.858 12.4174 19.7431 11.888 19.2539C11.888 19.2539 11.888 19.2539 11.888 19.2539L10.849 18.2939C10.618 18.0804 10.315 17.9618 10.0005 17.9618C9.68596 17.9618 9.38301 18.0803 9.15204 18.2938L8.112 19.2548C7.5841 19.7408 6.81082 19.859 6.16107 19.5455L5.12753 19.0477C4.47962 18.7351 4.08754 18.0586 4.13996 17.3404L4.24296 15.9294C4.26591 15.6157 4.16973 15.3047 3.9736 15.0588C3.77747 14.8128 3.49582 14.6499 3.18485 14.6024L1.78703 14.3885C1.07543 14.2798 0.501861 13.7466 0.342613 13.0432C0.34254 13.0429 0.342687 13.0435 0.342613 13.0432L0.087966 11.9267C0.0879126 11.9265 0.0880194 11.927 0.087966 11.9267C-0.0727156 11.2251 0.21253 10.4961 0.806004 10.0894L1.95906 9.29932C2.22009 9.12054 2.40374 8.84935 2.47275 8.54059C2.54176 8.23184 2.49113 7.90841 2.33108 7.63553C2.33107 7.63551 2.33109 7.63554 2.33108 7.63553L1.61008 6.40653C1.4314 6.10176 1.34887 5.74992 1.37351 5.39749C1.39814 5.04517 1.52862 4.7085 1.74785 4.4316C1.74779 4.43168 1.74791 4.43152 1.74785 4.4316L2.45765 3.53386C2.67701 3.2571 2.97536 3.05229 3.31263 2.94756C3.64973 2.84288 4.01056 2.84234 4.34797 2.94601L5.75597 3.37801C6.0578 3.47089 6.38421 3.44627 6.6685 3.30876C6.95275 3.17128 7.17443 2.93131 7.28901 2.63708M7.28901 2.63708L7.794 1.33911C7.794 1.33912 7.794 1.3391 7.794 1.33911C7.92183 1.01052 8.14574 0.728051 8.43649 0.528607C8.72725 0.329158 9.07137 0.221969 9.42396 0.221023L10.5703 0.218022M1.89997 13.6471L2.01346 12.9057L3.4111 13.1196C3.41098 13.1196 3.41122 13.1196 3.4111 13.1196C4.0951 13.2241 4.71495 13.5826 5.14636 14.1236C5.57782 14.6646 5.78944 15.3484 5.73898 16.0386C5.73898 16.0387 5.73899 16.0386 5.73898 16.0386L5.63598 17.4496C5.62841 17.5534 5.6848 17.6511 5.77888 17.6965L6.81242 18.1943C6.90453 18.2388 7.01753 18.2232 7.09561 18.1516C7.0955 18.1517 7.09572 18.1515 7.09561 18.1516L8.13391 17.1922C8.13388 17.1923 8.13394 17.1922 8.13391 17.1922C8.64203 16.7226 9.30858 16.4618 10.0005 16.4618C10.6924 16.4618 11.3588 16.7226 11.8669 17.1922C11.8669 17.1921 11.867 17.1922 11.8669 17.1922L12.9059 18.1522C12.9825 18.2229 13.0937 18.2399 13.1888 18.1942L14.2242 17.6954C14.2694 17.6737 14.307 17.6388 14.3321 17.5954C14.3572 17.5519 14.3687 17.502 14.365 17.452L14.262 16.0387C14.262 16.0387 14.262 16.0388 14.262 16.0387C14.2115 15.3486 14.4231 14.6646 14.8546 14.1236C15.286 13.5826 15.9055 13.2241 16.5895 13.1197C16.5894 13.1197 16.5896 13.1196 16.5895 13.1197L17.9875 12.9057C18.0894 12.8901 18.1734 12.8133 18.1969 12.7108C18.1969 12.7108 18.1969 12.7107 18.1969 12.7108L18.4521 11.5919C18.4634 11.5427 18.4596 11.4912 18.4412 11.4442C18.4228 11.3972 18.3907 11.3568 18.349 11.3284L17.1813 10.5289C16.6103 10.138 16.2077 9.54616 16.0538 8.87156C15.8999 8.19696 16.0059 7.48912 16.3508 6.88923L17.0555 5.66368C17.0809 5.61949 17.0923 5.5687 17.0885 5.5179C17.0846 5.46709 17.0655 5.41864 17.0337 5.37882L16.3186 4.48163C16.3186 4.48159 16.3186 4.48168 16.3186 4.48163C16.2868 4.44186 16.2437 4.41241 16.1951 4.39736C16.1464 4.38229 16.0943 4.38221 16.0456 4.39714L14.6939 4.81104C14.0321 5.01408 13.318 4.96013 12.6942 4.65994C12.0704 4.35975 11.5827 3.8354 11.3284 3.19151L10.8105 1.87867C10.7917 1.8312 10.7591 1.79048 10.7168 1.76182C10.6746 1.73319 10.6248 1.71792 10.5738 1.71802C10.5737 1.71802 10.5738 1.71802 10.5738 1.71802L9.42799 1.72102C9.42797 1.72102 9.428 1.72102 9.42799 1.72102C9.37694 1.72116 9.32708 1.73669 9.28499 1.76556C9.24288 1.79444 9.21046 1.83534 9.19195 1.88293L8.68694 3.18096C8.4349 3.8284 7.94708 4.35658 7.32164 4.6591C6.69638 4.96153 5.97985 5.01616 5.31598 4.81203L3.90798 4.38003C3.8591 4.365 3.80632 4.36491 3.75748 4.38008C3.70873 4.39521 3.66568 4.42468 3.63393 4.46464C3.63387 4.46472 3.634 4.46456 3.63393 4.46464L2.9243 5.36218C2.89264 5.40215 2.87341 5.45124 2.86986 5.50211C2.86631 5.5529 2.87816 5.60357 2.90387 5.64751M2.90387 5.64751L3.62487 6.87651C3.97703 7.47689 4.08846 8.18851 3.93663 8.86779C3.7848 9.54707 3.38104 10.1435 2.80677 10.5368L1.65394 11.3267C1.65393 11.3267 1.65396 11.3267 1.65394 11.3267C1.56765 11.3859 1.52702 11.4912 1.54998 11.5913L1.80556 12.7118C1.82858 12.8138 1.91164 12.8901 2.01346 12.9057L1.89997 13.6471"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.3872 8.61595C11.0193 8.25023 10.5214 8.04528 10.0027 8.04602C9.4839 8.04677 8.98659 8.25314 8.61972 8.61991C8.25285 8.98668 8.04635 9.48394 8.04547 10.0027C8.0446 10.5215 8.24941 11.0194 8.61504 11.3874C8.79681 11.5704 9.0129 11.7157 9.25093 11.815C9.48896 11.9142 9.74425 11.9656 10.0022 11.966C10.2601 11.9665 10.5155 11.916 10.7539 11.8175C10.9922 11.719 11.2088 11.5745 11.3912 11.3921C11.5736 11.2098 11.7182 10.9932 11.8168 10.7549C11.9153 10.5166 11.9658 10.2611 11.9655 10.0032C11.9651 9.74531 11.9138 9.49001 11.8146 9.25195C11.7154 9.0139 11.5702 8.79777 11.3872 8.61595ZM12.4447 7.55211C11.7952 6.90651 10.9163 6.54471 10.0005 6.54602C9.08474 6.54734 8.20684 6.91165 7.5592 7.55911C6.91156 8.20658 6.54703 9.08439 6.54548 10.0002C6.54393 10.9159 6.90549 11.795 7.55093 12.4446C7.87181 12.7676 8.25329 13.0241 8.67348 13.1994C9.09367 13.3746 9.54433 13.4652 9.99961 13.466C10.4549 13.4668 10.9059 13.3777 11.3266 13.2039C11.7474 13.03 12.1298 12.7748 12.4517 12.4529C12.7737 12.131 13.029 11.7488 13.203 11.328C13.3769 10.9073 13.4661 10.4563 13.4655 10.0011C13.4648 9.54578 13.3743 9.0951 13.1992 8.67486C13.024 8.25462 12.7676 7.87308 12.4447 7.55211Z"
                                fill="#42526E" />
                        </svg>
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
                <li class="nav-item dropdown">
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
            </ul> --}}
        </nav>
        <!-- /.navbar -->
        <div class="header-fixed border-bottom-0">
            <!-- Main Sidebar Container -->
            <div class="d-flex align-items-center justify-content-between w-100 height-47">
                <div class="align-baseline opacity-0">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15 28.125C18.481 28.125 21.8194 26.7422 24.2808 24.2808C26.7422 21.8194 28.125 18.481 28.125 15C28.125 11.519 26.7422 8.18064 24.2808 5.71922C21.8194 3.25781 18.481 1.875 15 1.875C11.519 1.875 8.18064 3.25781 5.71922 5.71922C3.25781 8.18064 1.875 11.519 1.875 15C1.875 18.481 3.25781 21.8194 5.71922 24.2808C8.18064 26.7422 11.519 28.125 15 28.125ZM9.60187 20.3981L7.70813 22.2919C6.26585 20.8497 5.28363 19.0122 4.88569 17.0117C4.48774 15.0113 4.69193 12.9377 5.47245 11.0534C6.25296 9.16897 7.57474 7.55835 9.27063 6.42517C10.9665 5.292 12.9604 4.68717 15 4.68717C17.0396 4.68717 19.0335 5.292 20.7294 6.42517C22.4253 7.55835 23.747 9.16897 24.5276 11.0534C25.3081 12.9377 25.5123 15.0113 25.1143 17.0117C24.7164 19.0122 23.7341 20.8497 22.2919 22.2919L20.3981 20.3981C19.8757 19.8755 19.2554 19.461 18.5727 19.1782C17.89 18.8954 17.1583 18.7499 16.4194 18.75H13.5806C12.8417 18.7499 12.11 18.8954 11.4273 19.1782C10.7446 19.461 10.1243 19.8755 9.60187 20.3981Z"
                            fill="#151516" />
                        <path
                            d="M15 7.5C14.0054 7.5 13.0516 7.89509 12.3483 8.59835C11.6451 9.30161 11.25 10.2554 11.25 11.25V12.1875C11.25 13.1821 11.6451 14.1359 12.3483 14.8392C13.0516 15.5424 14.0054 15.9375 15 15.9375C15.9946 15.9375 16.9484 15.5424 17.6516 14.8392C18.3549 14.1359 18.75 13.1821 18.75 12.1875V11.25C18.75 10.2554 18.3549 9.30161 17.6516 8.59835C16.9484 7.89509 15.9946 7.5 15 7.5Z"
                            fill="#151516" />
                    </svg>
                </div>
                <div class="d-flex content__heading--right">
                    {{-- <a href="{{ route('dashboardProduct.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border justify-content-center align-items-center p-1 px-2 rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'dashboardProduct') active @endif">
                            <p class="m-0 p-0 text-13-black">Dashboard</p>
                        </button>
                    </a> --}}

                    <div class="dropdown">
                        <a class="text-dark justify-content-center align-items-center mx-3 px-1 bg-white font-weight-600 navbar-head @if (!empty($activeGroup) && $activeGroup == 'systemFirst') active-navbar @endif"
                            href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            THIẾT LẬP BAN ĐẦU
                        </a>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-13-black"
                                href="{{ route('groups.index', $workspacename) }}">Nhóm đối
                                tượng</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('guests.index', $workspacename) }}">Khách
                                hàng</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('provides.index', $workspacename) }}">Nhà cung
                                cấp</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('inventory.index', $workspacename) }}">Hàng
                                hóa</a>
                            <a class="dropdown-item text-13-black" href="{{ route('funds.index') }}">Quỹ</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('content.index', $workspacename) }}">Nội dung thu
                                chi</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('warehouse.index', $workspacename) }}">Kho</a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('users.index', $workspacename) }}">Nhân viên</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="text-dark justify-content-center align-items-center mx-3 px-1 bg-white font-weight-600 navbar-head @if (!empty($activeGroup) && $activeGroup == 'manageProfess') active-navbar @endif"
                            href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            QUẢN LÝ NGHIỆP VỤ
                        </a>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-13-black"
                                href="{{ route('detailExport.index', $workspacename) }}">Phiếu
                                bán hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('import.index', $workspacename) }}">Đặt hàng
                                NCC
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('returnImport.index', $workspacename) }}">Trả
                                hàng NCC
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('returnExport.index', $workspacename) }}">Khách
                                trả hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('receive.index', $workspacename) }}">Phiếu nhập
                                kho
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('delivery.index', $workspacename) }}">Phiếu xuất
                                kho
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('cash_receipts.index', $workspacename) }}">Phiếu
                                thu
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('paymentOrder.index', $workspacename) }}">Phiếu
                                chi
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('changeFund.index', $workspacename) }}">Chuyển
                                tiền nội bộ
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('changeWarehouse.index', $workspacename) }}">Phiếu xuất chuyển kho
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('importChangeWarehouse.index', $workspacename) }}">
                                Phiếu nhập chuyển kho
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('commissionSale', $workspacename) }}">Hoa hồng Sale
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('promotionGuest', $workspacename) }}">Chương trình khuyến mãi
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="text-dark justify-content-center align-items-center mx-3 px-1 bg-white font-weight-600 navbar-head @if (!empty($activeGroup) && $activeGroup == 'statistic') active-navbar @endif"
                            href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            BÁO CÁO THỐNG KÊ
                        </a>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportDebtGuests', $workspacename) }}">Công nợ khách hàng
                            </a>
                            {{-- <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportSell', $workspacename) }}">Tổng kết bán hàng
                            </a> --}}
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportSales', $workspacename) }}">Doanh số bán hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportBuy', $workspacename) }}">Doanh số mua hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportDelivery', $workspacename) }}">Tổng kết giao hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportSumReturnExport', $workspacename) }}">Tổng kết khách trả
                                hàng
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportSumSellProfit', $workspacename) }}">Báo cáo lợi nhuận bán
                                hàng
                            </a>
                            {{-- <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportImport', $workspacename) }}">Tổng kết mua hàng
                            </a> --}}
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportProvides', $workspacename) }}">Công nợ NCC
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportReturnImport', $workspacename) }}">Trả hàng NCC
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportIE', $workspacename) }}">Tổng hợp nội dung thu chi
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportChangeFunds', $workspacename) }}">Chuyển tiền nội bộ
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportIEFunds', $workspacename) }}">Thống kê thu chi tồn quỹ
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportIEEnventory', $workspacename) }}">Xuất - nhập - tồn kho
                            </a>
                            <a class="dropdown-item text-13-black"
                                href="{{ route('viewReportSumBusiness', $workspacename) }}">Tổng hợp kết quả kinh
                                doanh
                            </a>
                        </div>
                    </div>
                </div>
                <div class="align-baseline setting">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15 28.125C18.481 28.125 21.8194 26.7422 24.2808 24.2808C26.7422 21.8194 28.125 18.481 28.125 15C28.125 11.519 26.7422 8.18064 24.2808 5.71922C21.8194 3.25781 18.481 1.875 15 1.875C11.519 1.875 8.18064 3.25781 5.71922 5.71922C3.25781 8.18064 1.875 11.519 1.875 15C1.875 18.481 3.25781 21.8194 5.71922 24.2808C8.18064 26.7422 11.519 28.125 15 28.125ZM9.60187 20.3981L7.70813 22.2919C6.26585 20.8497 5.28363 19.0122 4.88569 17.0117C4.48774 15.0113 4.69193 12.9377 5.47245 11.0534C6.25296 9.16897 7.57474 7.55835 9.27063 6.42517C10.9665 5.292 12.9604 4.68717 15 4.68717C17.0396 4.68717 19.0335 5.292 20.7294 6.42517C22.4253 7.55835 23.747 9.16897 24.5276 11.0534C25.3081 12.9377 25.5123 15.0113 25.1143 17.0117C24.7164 19.0122 23.7341 20.8497 22.2919 22.2919L20.3981 20.3981C19.8757 19.8755 19.2554 19.461 18.5727 19.1782C17.89 18.8954 17.1583 18.7499 16.4194 18.75H13.5806C12.8417 18.7499 12.11 18.8954 11.4273 19.1782C10.7446 19.461 10.1243 19.8755 9.60187 20.3981Z"
                            fill="#151516" />
                        <path
                            d="M15 7.5C14.0054 7.5 13.0516 7.89509 12.3483 8.59835C11.6451 9.30161 11.25 10.2554 11.25 11.25V12.1875C11.25 13.1821 11.6451 14.1359 12.3483 14.8392C13.0516 15.5424 14.0054 15.9375 15 15.9375C15.9946 15.9375 16.9484 15.5424 17.6516 14.8392C18.3549 14.1359 18.75 13.1821 18.75 12.1875V11.25C18.75 10.2554 18.3549 9.30161 17.6516 8.59835C16.9484 7.89509 15.9946 7.5 15 7.5Z"
                            fill="#151516" />
                    </svg>
                </div>
            </div>
            <div
                class="px-3 py-2 border-bottom border-top bg-grey @if (
                    (!empty($activeGroup) && $activeGroup == 'systemFirst') ||
                        (!empty($activeGroup) && $activeGroup == 'manageProfess') ||
                        (!empty($activeGroup) && $activeGroup == 'statistic')) d-flex @else d-none @endif">
                <div class="@if (!empty($activeGroup) && $activeGroup == 'systemFirst') d-flex @else d-none @endif">
                    <a href="{{ route('groups.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'groups') active @endif">
                            Nhóm đối tượng
                        </button>
                    </a>
                    <a href="{{ route('guests.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'guest') active @endif">
                            Khách hàng
                        </button>
                    </a>
                    <a href="{{ route('provides.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'provide') active @endif">
                            Nhà cung cấp
                        </button>
                    </a>
                    <a href="{{ route('inventory.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'product') active @endif">
                            Hàng hóa
                        </button>
                    </a>
                    <a href="{{ route('funds.index') }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'funds') active @endif">
                            Quỹ
                        </button>
                    </a>
                    <a href="{{ route('content.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'content') active @endif">
                            Nội dung thu chi
                        </button>
                    </a>
                    <a href="{{ route('warehouse.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'warehouse') active @endif">
                            Kho
                        </button>
                    </a>
                    <a href="{{ route('users.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'users') active @endif">
                            Nhân viên
                        </button>
                    </a>
                </div>
                <div class="@if (!empty($activeGroup) && $activeGroup == 'manageProfess') d-flex @else d-none @endif">
                    <a href="{{ route('detailExport.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'quote') active @endif">
                            Phiếu bán hàng
                        </button>
                    </a>
                    <a href="{{ route('import.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'import') active @endif">
                            Đặt hàng NCC
                        </button>
                    </a>
                    <a href="{{ route('returnImport.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'returnImport') active @endif">
                            Trả hàng NCC
                        </button>
                    </a>
                    <a href="{{ route('returnExport.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'returnexport') active @endif">
                            Khách trả hàng
                        </button>
                    </a>
                    <a href="{{ route('receive.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'receive') active @endif">
                            Phiếu nhập kho
                        </button>
                    </a>
                    <a href="{{ route('delivery.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'delivery') active @endif">
                            Phiếu xuất kho
                        </button>
                    </a>
                    <a href="{{ route('cash_receipts.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'cash_receipts') active @endif">
                            Phiếu thu
                        </button>
                    </a>
                    <a href="{{ route('paymentOrder.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'paymentorder') active @endif">
                            Phiếu chi
                        </button>
                    </a>
                    <a href="{{ route('changeFund.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'changefund') active @endif">
                            Chuyển tiền nội bộ
                        </button>
                    </a>
                    <a href="{{ route('changeWarehouse.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'changeWarehouse') active @endif">
                            Phiếu xuất chuyển kho
                        </button>
                    </a>
                    <a href="{{ route('importChangeWarehouse.index', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'importChangeWarehouse') active @endif">
                            Phiếu nhập chuyển kho
                        </button>
                    </a>
                    <a href="{{ route('commissionSale', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'commission') active @endif">
                            Hoa hồng Sale
                        </button>
                    </a>
                    <a href="{{ route('promotionGuest', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'promotion') active @endif">
                            Chương trình khuyến mãi
                        </button>
                    </a>
                </div>
                <div class="@if (!empty($activeGroup) && $activeGroup == 'statistic') d-flex @else d-none @endif">
                    <a href="{{ route('viewReportDebtGuests', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'debtGuests') active @endif">
                            Công nợ khách hàng
                        </button>
                    </a>
                    {{-- <a href="{{ route('viewReportSell', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumSell') active @endif">
                            Tổng kết bán hàng
                        </button>
                    </a> --}}
                    <a href="{{ route('viewReportSales', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumSales') active @endif">
                            Doanh số bán hàng
                        </button>
                    </a>
                    <a href="{{ route('viewReportBuy', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumBuy') active @endif">
                            Doanh số mua hàng
                        </button>
                    </a>
                    <a href="{{ route('viewReportDelivery', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumDelivery') active @endif">
                            Tổng kết giao hàng
                        </button>
                    </a>
                    <a href="{{ route('viewReportSumReturnExport', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumReturnExport') active @endif">
                            Tổng kết khách trả hàng
                        </button>
                    </a>
                    <a href="{{ route('viewReportSumSellProfit', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'reportSumSellProfit') active @endif">
                            Báo cáo lợi nhuận bán hàng
                        </button>
                    </a>
                    {{-- <a href="{{ route('viewReportImport', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportImport') active @endif">
                            Tổng kết mua hàng
                        </button>
                    </a> --}}
                    <a href="{{ route('viewReportProvides', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportProvides') active @endif">
                            Công nợ NCC
                        </button>
                    </a>
                    <a href="{{ route('viewReportReturnImport', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportReturnImport') active @endif">
                            Trả hàng NCC
                        </button>
                    </a>
                    <a href="{{ route('viewReportIE', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportIE') active @endif">
                            Tổng hợp nội dung thu chi
                        </button>
                    </a>
                    <a href="{{ route('viewReportChangeFunds', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportChangeFunds') active @endif">
                            Chuyển tiền nội bộ
                        </button>
                    </a>
                    <a href="{{ route('viewReportIEFunds', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportIEFunds') active @endif">
                            Thống kê thu chi tồn quỹ
                        </button>
                    </a>
                    <a href="{{ route('viewReportIEEnventory', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'viewReportIEEnventory') active @endif">
                            Xuất - nhập - tồn kho
                        </button>
                    </a>
                    <a href="{{ route('viewReportSumBusiness', $workspacename) }}" class="height-36">
                        <button type="button"
                            class="h-100 border text-dark justify-content-center align-items-center text-13-black rounded bg-white ml-2 @if (!empty($activeName) && $activeName == 'sumBusiness') active @endif">
                            Tổng hợp kết quả kinh doanh
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="alert notification d-flex justify-content-center align-items-center m-0 w-100"
        style="position: absolute;top: 0;">
        <div class="success">
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
        <div class="warning">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/vn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.js"></script>
    <script>
        // Lắng nghe sự kiện khi phần tử .input_phone_number được hiển thị
        $('.input_phone_number').on('show.bs.modal', function() {
            // Thêm lớp .blur-body vào thẻ body khi hiển thị
            $('body').addClass('blur-body');
        });

        // Lắng nghe sự kiện click của nút xác nhận
        $('.input_phone_number button').on('click', function() {
            // Loại bỏ lớp .blur-body khỏi thẻ body khi nhấp vào nút xác nhận
            $('body').removeClass('blur-body');
        });


        $('.workspace-link').on('click', function(event) {
            var workspaceId = $(this).data('id');
            $.ajax({
                url: '{{ route('updateWorkspaceUser') }}',
                type: 'GET',
                data: {
                    workspaceId: workspaceId,
                },
                success: function(data) {}
            });
        });
        $('.setting').click(function() {
            $('#dropdown-content').toggleClass('show');
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.setting').length) {
                $('#dropdown-content').removeClass('show');
            }
        });
        $(document).ready(function() {
            setTimeout(function() {
                $('#notification').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 4000);
        });

        //Lưu thao tác chức năng bán hàng
        $(document).on('click', '.activity1', function(e) {
            var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
            var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
            $.ajax({
                url: '{{ route('addActivity') }}',
                type: 'GET',
                data: {
                    name: name,
                    des: des,
                },
                success: function(data) {}
            });
        });

        $(document).on('click', '.user_flow_nav', function(e) {
            var type = $(this).attr('data-type')
            var des = $(this).attr('data-des');
            $.ajax({
                url: "{{ route('addUserFlow') }}",
                type: "get",
                data: {
                    type: type,
                    des: des
                },
                success: function(data) {}
            })
        })
        $(document).ready(function() {
            $('#phone_number').on('input', function() {
                var phone_number = $('#phone_number').val();
                if (phone_number.length < 10 || phone_number.length > 11) {
                    $('#phone_number').css('border', '1px solid red');
                    $('.btn-confirm-phonenumber').attr('disabled', true);
                    $('.text-noiti').text('Số điện thoại không hợp lệ');
                } else {
                    $('#phone_number').css('border', '1px solid #DFE1E4');
                    $('.btn-confirm-phonenumber').attr('disabled', false);
                    $('.text-noiti').text('');
                }
            });
        });
        // Click btn-confirm-phonenumber save phone number and fade modal-backdrop show 
        $(document).on('click', '.btn-confirm-phonenumber', function(e) {
            var phoneNumber = $('#phone_number').val();
            // check phone number if not empty perform ajax request else alert message
            if ($.trim(phoneNumber) == '') {

            } else {
                $.ajax({
                    url: '{{ route('updateWorkspace') }}',
                    type: "get",
                    data: {
                        phone_number: phoneNumber
                    },
                    success: function(data) {
                        $('#phone_number').val('');
                        $('.input_phone_number').hide();
                        // remove modal-backdrop
                        $('.modal-backdrop').remove();
                    }
                })
            }
        })
    </script>
