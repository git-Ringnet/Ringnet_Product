@if (Auth::guest())
    <?php header('Location: ' . route('login'));
    exit(); ?>
@endif
@if (!Auth::user()->current_workspace)
    <?php header('Location: ' . route('login'));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light w-100 d-none">
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
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary border-right">
        <!-- Sidebar -->
        <div class="sidebar p-0">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    {{-- Logo --}}
                    <li class="">
                        <a href="{{ route('welcome', $workspacename) }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center w-100">
                                <img src="{{ asset('dist/img/logo_ringnetOC_small.png') }}" alt="">
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('welcome', $workspacename) }}"
                            class="nav-link
                                    @if (!empty($activeName) && $activeName == 'member') active @endif">
                            <i class="fas fa-angle-left"></i>
                            <p class="text-nav ml-2">Cài đặt</p>
                        </a>
                    </li>
                    <li class="nav-item" style="pointer-events: none">
                        <a href="{{ route('history.index', $workspacename) }}"
                            class="nav-link @if (!empty($activeName) && $activeName == 'history') active @endif">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.875 4.53906C4.6679 4.53906 4.49754 4.37033 4.52312 4.16481C4.70733 2.68458 5.96988 1.53906 7.5 1.53906H16.5C18.0302 1.53906 19.2927 2.68458 19.4769 4.16481C19.5024 4.37033 19.3322 4.53906 19.125 4.53906H4.875Z"
                                    fill="#6B6F76" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.25 6.03906C4.83579 6.03906 4.5 6.37485 4.5 6.78906V21.7891C4.5 22.2032 4.83579 22.5391 5.25 22.5391H8.25C8.66421 22.5391 9 22.2032 9 21.7891V18.7891C9 18.3749 9.33579 18.0391 9.75 18.0391H14.25C14.6642 18.0391 15 18.3749 15 18.7891V21.7891C15 22.2032 15.3358 22.5391 15.75 22.5391H18.75C19.1642 22.5391 19.5 22.2032 19.5 21.7891V6.78906C19.5 6.37485 19.1642 6.03906 18.75 6.03906H5.25ZM16.5 12.0391C15.6715 12.0391 15 12.7106 15 13.5391V14.4391C15 14.7704 15.2686 15.0391 15.6 15.0391H17.4C17.7314 15.0391 18 14.7704 18 14.4391V13.5391C18 12.7106 17.3285 12.0391 16.5 12.0391ZM15 9.03906C15 8.21064 15.6715 7.53906 16.5 7.53906C17.3285 7.53906 18 8.21064 18 9.03906V9.93906C18 10.2704 17.7314 10.5391 17.4 10.5391H15.6C15.2686 10.5391 15 10.2704 15 9.93906V9.03906ZM12 7.53906C11.1716 7.53906 10.5 8.21064 10.5 9.03906V9.93906C10.5 10.2704 10.7686 10.5391 11.1 10.5391H12.9C13.2314 10.5391 13.5 10.2704 13.5 9.93906V9.03906C13.5 8.21064 12.8284 7.53906 12 7.53906ZM10.5 13.5391C10.5 12.7106 11.1716 12.0391 12 12.0391C12.8284 12.0391 13.5 12.7106 13.5 13.5391V14.4391C13.5 14.7704 13.2314 15.0391 12.9 15.0391H11.1C10.7686 15.0391 10.5 14.7704 10.5 14.4391V13.5391ZM7.5 12.0391C6.67158 12.0391 6 12.7106 6 13.5391V14.4391C6 14.7704 6.26864 15.0391 6.6 15.0391H8.4C8.73136 15.0391 9 14.7704 9 14.4391V13.5391C9 12.7106 8.32842 12.0391 7.5 12.0391ZM6 9.03906C6 8.21064 6.67158 7.53906 7.5 7.53906C8.32842 7.53906 9 8.21064 9 9.03906V9.93906C9 10.2704 8.73136 10.5391 8.4 10.5391H6.6C6.26864 10.5391 6 10.2704 6 9.93906V9.03906Z"
                                    fill="#6B6F76" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Workspace</p>
                            </div>
                        </a>
                    </li>
                    @if (Auth::user()->origin_workspace === Auth::user()->current_workspace)
                        <li class="nav-item">
                            <a href="{{ route('overview', $workspacename) }}"
                                class="nav-link
                                    @if (!empty($activeName) && $activeName == 'overview') active @endif">
                                <p class="text-nav ml-2">Tổng quan</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('viewCompany', $workspacename) }}"
                            class="nav-link
                                    @if (!empty($activeName) && $activeName == 'viewCompany') active @endif">
                            <p class="text-nav ml-2">Thông tin doanh nghiệp</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index', $workspacename) }}"
                            class="nav-link
                                    @if (!empty($activeName) && $activeName == 'members') active @endif">
                            <p class="text-nav ml-2">Thành viên</p>
                        </a>
                    </li>
                    <li class="nav-item" style="pointer-events: none">
                        <a href="{{ route('history.index', $workspacename) }}"
                            class="nav-link @if (!empty($activeName) && $activeName == 'history') active @endif">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.8218 10.8611C12.4663 10.8375 13.0767 10.566 13.5259 10.1032C13.975 9.64036 14.2281 9.02199 14.2323 8.37709C14.2224 7.74751 13.9629 7.1476 13.5109 6.70924C13.0589 6.27087 12.4514 6.02992 11.8218 6.03934C11.1921 6.02972 10.5843 6.27058 10.1321 6.70897C9.67995 7.14735 9.42039 7.74737 9.41052 8.37709C9.41455 9.02217 9.66766 9.64075 10.117 10.1036C10.5663 10.5665 11.1771 10.8379 11.8218 10.8611V10.8611Z"
                                    stroke="#6B6F76" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16.75 18.0391V16.5391C16.75 15.7434 16.4339 14.9804 15.8713 14.4177C15.3087 13.8551 14.5456 13.5391 13.75 13.5391H10C9.20435 13.5391 8.44129 13.8551 7.87868 14.4177C7.31607 14.9804 7 15.7434 7 16.5391V18.0391"
                                    stroke="#6B6F76" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">My account</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('viewUser', $workspacename) }}"
                            class="nav-link
                                    @if (!empty($activeName) && $activeName == 'user') active @endif">
                            <p class="text-nav ml-2">Thông tin cá nhân</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="w-100 messagesss">
        <div class="container message-success justify-content-center align-items-center m-0 w-100"
            style="display:flex !important;z-index: 99999; position: fixed;top:5%;left:15%;">
            <div class="alert alert-success">
                <div class="message-success-text"></div>
            </div>
        </div>
    </div>
    <div class="alert notification d-flex justify-content-center align-items-center m-0"
        style="position: absolute;left:40%">
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
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#notification').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 10000);
        });

        // $(document).ready(function() {
        //     $("li.nav-item:has(ul.nav.nav-treeview)").each(function() {
        //         var navItem = $(this);
        //         var ulElement = navItem.find("ul.nav.nav-treeview");
        //         var iconElement = navItem.find(".fas.fa-angle-left.right");

        //         if (ulElement.css("display") === "block") {
        //             iconElement.css("transform", "rotate(-90deg)");
        //         }

        //         ulElement.on("change", function() {
        //             if (ulElement.css("display") === "block") {
        //                 iconElement.css("transform", "rotate(-90deg)");
        //             }
        //             elseif(ulElement.css("display") === "none") {
        //                 iconElement.css("transform", "rotate(0deg)");
        //             }
        //         });
        //     });
        // });
    </script>
