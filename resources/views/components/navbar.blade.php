@if (Auth::guest())
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
    <a id="live-chat" href="https://zalo.me/g/pcgrpw834" target="_blank"><img
            src="{{ asset('dist/img/Icon_of_Zalo.svg.png') }}" alt=""></a>
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
                    <li
                        class="nav-item
                         @if (!empty($activeGroup) && $activeGroup == 'products') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.1433 2.65738C11.329 2.55416 11.538 2.5 11.7505 2.5C11.963 2.5 12.172 2.5542 12.3578 2.65742L19.3578 6.54642C19.5524 6.65472 19.7146 6.81305 19.8275 7.00505C19.9404 7.19714 20 7.41596 20 7.6388V11.7498C20 12.164 20.3358 12.4998 20.75 12.4998C21.1642 12.4998 21.5 12.164 21.5 11.7498V7.6388C21.5 7.14857 21.369 6.66723 21.1205 6.24465C20.8719 5.82206 20.5147 5.47345 20.0862 5.23519L13.0862 1.34619C12.6777 1.11915 12.2179 1 11.7505 1C11.2831 1 10.8233 1.11919 10.4147 1.34623L3.41476 5.23519C2.9861 5.47327 2.62889 5.82164 2.38013 6.2442C2.13136 6.6668 2.00012 7.14842 2 7.6388V20.7498C2 21.164 2.33579 21.4998 2.75 21.4998H6.74581C6.74721 21.4998 6.7486 21.4998 6.75 21.4998L11.75 21.4998C12.1642 21.4998 12.5 21.164 12.5 20.7498C12.5 20.3356 12.1642 19.9998 11.75 19.9998L7.5 19.9998V18.4998H11.75C12.1642 18.4998 12.5 18.164 12.5 17.7498C12.5 17.3356 12.1642 16.9998 11.75 16.9998H7.5V15.4998H11.75C12.1642 15.4998 12.5 15.164 12.5 14.7498C12.5 14.3356 12.1642 13.9998 11.75 13.9998H7.5V12.4998H16.75C17.1642 12.4998 17.5 12.164 17.5 11.7498C17.5 11.3356 17.1642 10.9998 16.75 10.9998H6.75C6.33579 10.9998 6 11.3356 6 11.7498V14.7498V17.7498V19.9998H3.5V7.6388C3.50008 7.41596 3.55974 7.19719 3.67279 7.00515C3.78587 6.81306 3.94837 6.65464 4.14324 6.54642L10.9593 2.75962L11.1433 2.65738ZM9.75 6.99982C9.33579 6.99982 9 7.3356 9 7.74982C9 8.16403 9.33579 8.49982 9.75 8.49982H13.75C14.1642 8.49982 14.5 8.16403 14.5 7.74982C14.5 7.3356 14.1642 6.99982 13.75 6.99982H9.75Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.75 15.4998C15.6837 15.4998 15.6201 15.5261 15.5732 15.573C15.5263 15.6199 15.5 15.6835 15.5 15.7498V20.7498C15.5 20.8161 15.5263 20.8796 15.5732 20.9265C15.6201 20.9734 15.6837 20.9998 15.75 20.9998H20.75C20.8163 20.9998 20.8799 20.9734 20.9268 20.9265C20.9737 20.8797 21 20.8161 21 20.7498V15.7498C21 15.6835 20.9737 15.6199 20.9268 15.573C20.8799 15.5261 20.8163 15.4998 20.75 15.4998H15.75ZM15.75 13.9998H20.75C21.2141 13.9998 21.6592 14.1841 21.9874 14.5123C22.3156 14.8405 22.5 15.2856 22.5 15.7498V20.7498C22.5 21.2139 22.3156 21.659 21.9874 21.9872C21.6592 22.3154 21.2141 22.4998 20.75 22.4998H15.75C15.2859 22.4998 14.8408 22.3154 14.5126 21.9872C14.1844 21.659 14 21.2139 14 20.7498V15.7498C14 15.2856 14.1844 14.8405 14.5126 14.5123C14.8408 14.1841 15.2859 13.9998 15.75 13.9998ZM18.25 15.9999C18.6642 15.9999 19 16.3357 19 16.7499V17.4999H19.75C20.1642 17.4999 20.5 17.8357 20.5 18.2499C20.5 18.6642 20.1642 18.9999 19.75 18.9999H19V19.7499C19 20.1642 18.6642 20.4999 18.25 20.4999C17.8358 20.4999 17.5 20.1642 17.5 19.7499V18.9999H16.75C16.3358 18.9999 16 18.6642 16 18.2499C16 17.8357 16.3358 17.4999 16.75 17.4999H17.5V16.7499C17.5 16.3357 17.8358 15.9999 18.25 15.9999Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Kho hàng</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('inventory.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'product') active @endif">
                                    <p class="text-nav ml-2">Sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editProduct', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'editproduct') active @endif">
                                    <p class="text-nav ml-2">Sửa tồn kho</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <p class="text-nav ml-2">Chuyển kho</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item
                        @if (!empty($activeGroup) && $activeGroup == 'sell') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1499_29845)">
                                    <path fill="#555555"
                                        d="M6.85714 3.88603H5.57143C4.88944 3.88603 4.23539 4.15097 3.75315 4.62257C3.27092 5.09417 3 5.73379 3 6.40074V19.6029C3 20.2699 3.27092 20.9095 3.75315 21.3811C4.23539 21.8527 4.88944 22.1176 5.57143 22.1176H18.4286C19.1106 22.1176 19.7646 21.8527 20.2468 21.3811C20.7291 20.9095 21 20.2699 21 19.6029V6.40074C21 5.73379 20.7291 5.09417 20.2468 4.62257C19.7646 4.15097 19.1106 3.88603 18.4286 3.88603H17.1429V5.14338H18.4286C18.7696 5.14338 19.0966 5.27585 19.3377 5.51165C19.5788 5.74745 19.7143 6.06727 19.7143 6.40074V19.6029C19.7143 19.9364 19.5788 20.2562 19.3377 20.492C19.0966 20.7278 18.7696 20.8603 18.4286 20.8603H5.57143C5.23044 20.8603 4.90341 20.7278 4.66229 20.492C4.42117 20.2562 4.28571 19.9364 4.28571 19.6029V6.40074C4.28571 6.06727 4.42117 5.74745 4.66229 5.51165C4.90341 5.27585 5.23044 5.14338 5.57143 5.14338H6.85714V3.88603Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path fill="#555555"
                                        d="M13.9286 3.25735C14.0991 3.25735 14.2626 3.32359 14.3831 3.44149C14.5037 3.55939 14.5714 3.71929 14.5714 3.88603V5.14338C14.5714 5.31012 14.5037 5.47002 14.3831 5.58792C14.2626 5.70582 14.0991 5.77206 13.9286 5.77206H10.0714C9.90093 5.77206 9.73742 5.70582 9.61686 5.58792C9.4963 5.47002 9.42857 5.31012 9.42857 5.14338V3.88603C9.42857 3.71929 9.4963 3.55939 9.61686 3.44149C9.73742 3.32359 9.90093 3.25735 10.0714 3.25735H13.9286ZM10.0714 2C9.55994 2 9.0694 2.19871 8.70772 2.55241C8.34605 2.9061 8.14286 3.38582 8.14286 3.88603V5.14338C8.14286 5.64359 8.34605 6.12331 8.70772 6.47701C9.0694 6.83071 9.55994 7.02941 10.0714 7.02941H13.9286C14.4401 7.02941 14.9306 6.83071 15.2923 6.47701C15.654 6.12331 15.8571 5.64359 15.8571 5.14338V3.88603C15.8571 3.38582 15.654 2.9061 15.2923 2.55241C14.9306 2.19871 14.4401 2 13.9286 2H10.0714Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path fill="#555555"
                                        d="M8.14286 15.3143C8.28021 16.512 9.54706 17.362 11.4756 17.4719V18.3456H12.4436V17.4719C14.5504 17.3433 15.8571 16.4387 15.8571 15.1009C15.8571 13.9585 14.9782 13.2975 13.1137 12.9253L12.4436 12.791V10.0593C13.4849 10.1383 14.1875 10.5723 14.3648 11.2203H15.7291C15.575 10.0708 14.2998 9.24595 12.4436 9.1547V8.28676H11.4756V9.17266C9.67606 9.33791 8.44077 10.2303 8.44077 11.4402C8.44077 12.4849 9.33731 13.2242 10.9104 13.536L11.4766 13.6524V16.5487C10.4102 16.4265 9.67606 15.9739 9.4988 15.3143H8.14286ZM11.29 12.5582C10.322 12.3692 9.80507 11.9654 9.80507 11.3971C9.80507 10.7188 10.4584 10.2181 11.4756 10.0837V12.5948L11.29 12.5582ZM12.7666 13.9032C13.9611 14.1353 14.4854 14.5204 14.4854 15.1742C14.4854 15.9624 13.7188 16.4876 12.4436 16.5673V13.8407L12.7666 13.9032Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path fill="#555555"
                                        d="M6.85714 3.88603H5.57143C4.88944 3.88603 4.23539 4.15097 3.75315 4.62257C3.27092 5.09417 3 5.73379 3 6.40074V19.6029C3 20.2699 3.27092 20.9095 3.75315 21.3811C4.23539 21.8527 4.88944 22.1176 5.57143 22.1176H18.4286C19.1106 22.1176 19.7646 21.8527 20.2468 21.3811C20.7291 20.9095 21 20.2699 21 19.6029V6.40074C21 5.73379 20.7291 5.09417 20.2468 4.62257C19.7646 4.15097 19.1106 3.88603 18.4286 3.88603H17.1429V5.14338H18.4286C18.7696 5.14338 19.0966 5.27585 19.3377 5.51165C19.5788 5.74745 19.7143 6.06727 19.7143 6.40074V19.6029C19.7143 19.9364 19.5788 20.2562 19.3377 20.492C19.0966 20.7278 18.7696 20.8603 18.4286 20.8603H5.57143C5.23044 20.8603 4.90341 20.7278 4.66229 20.492C4.42117 20.2562 4.28571 19.9364 4.28571 19.6029V6.40074C4.28571 6.06727 4.42117 5.74745 4.66229 5.51165C4.90341 5.27585 5.23044 5.14338 5.57143 5.14338H6.85714V3.88603Z"
                                        stroke="#26273B" stroke-opacity="0.8" stroke-width="0.4" />
                                    <path fill="#555555"
                                        d="M13.9286 3.25735C14.0991 3.25735 14.2626 3.32359 14.3831 3.44149C14.5037 3.55939 14.5714 3.71929 14.5714 3.88603V5.14338C14.5714 5.31012 14.5037 5.47002 14.3831 5.58792C14.2626 5.70582 14.0991 5.77206 13.9286 5.77206H10.0714C9.90093 5.77206 9.73742 5.70582 9.61686 5.58792C9.4963 5.47002 9.42857 5.31012 9.42857 5.14338V3.88603C9.42857 3.71929 9.4963 3.55939 9.61686 3.44149C9.73742 3.32359 9.90093 3.25735 10.0714 3.25735H13.9286ZM10.0714 2C9.55994 2 9.0694 2.19871 8.70772 2.55241C8.34605 2.9061 8.14286 3.38582 8.14286 3.88603V5.14338C8.14286 5.64359 8.34605 6.12331 8.70772 6.47701C9.0694 6.83071 9.55994 7.02941 10.0714 7.02941H13.9286C14.4401 7.02941 14.9306 6.83071 15.2923 6.47701C15.654 6.12331 15.8571 5.64359 15.8571 5.14338V3.88603C15.8571 3.38582 15.654 2.9061 15.2923 2.55241C14.9306 2.19871 14.4401 2 13.9286 2H10.0714Z"
                                        stroke="#26273B" stroke-opacity="0.8" stroke-width="0.4" />
                                    <path fill="#555555"
                                        d="M8.14286 15.3143C8.28021 16.512 9.54706 17.362 11.4756 17.4719V18.3456H12.4436V17.4719C14.5504 17.3433 15.8571 16.4387 15.8571 15.1009C15.8571 13.9585 14.9782 13.2975 13.1137 12.9253L12.4436 12.791V10.0593C13.4849 10.1383 14.1875 10.5723 14.3648 11.2203H15.7291C15.575 10.0708 14.2998 9.24595 12.4436 9.1547V8.28676H11.4756V9.17266C9.67606 9.33791 8.44077 10.2303 8.44077 11.4402C8.44077 12.4849 9.33731 13.2242 10.9104 13.536L11.4766 13.6524V16.5487C10.4102 16.4265 9.67606 15.9739 9.4988 15.3143H8.14286ZM11.29 12.5582C10.322 12.3692 9.80507 11.9654 9.80507 11.3971C9.80507 10.7188 10.4584 10.2181 11.4756 10.0837V12.5948L11.29 12.5582ZM12.7666 13.9032C13.9611 14.1353 14.4854 14.5204 14.4854 15.1742C14.4854 15.9624 13.7188 16.4876 12.4436 16.5673V13.8407L12.7666 13.9032Z"
                                        stroke="#26273B" stroke-opacity="0.8" stroke-width="0.4" />
                                </g>
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Bán hàng</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('detailExport.index', $workspacename) }}" data-name1="BH"
                                    data-des="Đơn báo giá"
                                    class="nav-link activity1
                                    @if (!empty($activeName) && $activeName == 'quote') active @endif">
                                    <p class="text-nav ml-2">Đơn báo giá</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('delivery.index', $workspacename) }}" data-name1="BH"
                                    data-des="Đơn giao hàng"
                                    class="nav-link activity1 @if (!empty($activeName) && $activeName == 'delivery') active @endif">
                                    <p class="text-nav ml-2">Đơn giao hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('billSale.index', $workspacename) }}" data-name1="BH"
                                    data-des="Hóa đơn bán hàng"
                                    class="nav-link activity1  @if (!empty($activeName) && $activeName == 'billsale') active @endif">
                                    <p class="text-nav ml-2">Hóa đơn bán hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payExport.index', $workspacename) }}" data-name1="BH"
                                    data-des="Thanh toán bán hàng"
                                    class="nav-link activity1 @if (!empty($activeName) && $activeName == 'payexport') active @endif">
                                    <p class="text-nav ml-2">Thanh toán bán hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guests.index', $workspacename) }}" data-name1="BH"
                                    data-des="Khách hàng"
                                    class="nav-link activity1  @if (!empty($activeName) && $activeName == 'guest') active @endif">
                                    <p class="text-nav ml-2">Khách hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (!empty($activeGroup) && $activeGroup == 'buy') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M20 11V5C20 4.46957 19.7893 3.96086 19.4142 3.58579C19.0391 3.21071 18.5304 3 18 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H10"
                                    stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9.25 15H10" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.5 13.8184V17.0004" stroke="#26273B" stroke-opacity="0.8"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M21 22.0004H14.125C13.8266 22.0004 13.5405 21.8818 13.3295 21.6709C13.1185 21.4599 13 21.1737 13 20.8754V16.5674C13.0002 16.2972 13.055 16.0298 13.161 15.7814L13.708 14.5014C13.7947 14.2987 13.939 14.126 14.123 14.0045C14.307 13.8831 14.5226 13.8184 14.743 13.8184H20.257C20.4773 13.8185 20.6927 13.8832 20.8765 14.0047C21.0603 14.1261 21.2045 14.2988 21.291 14.5014L21.839 15.7834C21.9452 16.0318 22 16.2992 22 16.5694V21.0004C22 21.2656 21.8946 21.5199 21.7071 21.7075C21.5196 21.895 21.2652 22.0004 21 22.0004Z"
                                    stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M22 18C22 17.7348 21.8946 17.4804 21.7071 17.2929C21.5196 17.1054 21.2652 17 21 17H14C13.7348 17 13.4804 17.1054 13.2929 17.2929C13.1054 17.4804 13 17.7348 13 18"
                                    stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9.25 11H13" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.25 7.125H16" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M6.75 7.7998C6.89834 7.7998 7.04334 7.75582 7.16668 7.6734C7.29001 7.59099 7.38614 7.47386 7.44291 7.33682C7.49967 7.19977 7.51453 7.04897 7.48559 6.90349C7.45665 6.758 7.38522 6.62436 7.28033 6.51947C7.17544 6.41458 7.0418 6.34316 6.89632 6.31422C6.75083 6.28528 6.60003 6.30013 6.46299 6.35689C6.32594 6.41366 6.20881 6.50979 6.1264 6.63312C6.04399 6.75646 6 6.90147 6 7.0498C6 7.24872 6.07902 7.43948 6.21967 7.58014C6.36032 7.72079 6.55109 7.7998 6.75 7.7998Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path
                                    d="M6.75 11.7998C6.89834 11.7998 7.04334 11.7558 7.16668 11.6734C7.29001 11.591 7.38614 11.4739 7.44291 11.3368C7.49967 11.1998 7.51453 11.049 7.48559 10.9035C7.45665 10.758 7.38522 10.6244 7.28033 10.5195C7.17544 10.4146 7.0418 10.3432 6.89632 10.3142C6.75083 10.2853 6.60003 10.3001 6.46299 10.3569C6.32594 10.4137 6.20881 10.5098 6.1264 10.6331C6.04399 10.7565 6 10.9015 6 11.0498C6 11.2487 6.07902 11.4395 6.21967 11.5801C6.36032 11.7208 6.55109 11.7998 6.75 11.7998Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path
                                    d="M6.75 15.7002C6.89834 15.7002 7.04334 15.6562 7.16668 15.5738C7.29001 15.4914 7.38614 15.3743 7.44291 15.2372C7.49967 15.1002 7.51453 14.9494 7.48559 14.8039C7.45665 14.6584 7.38522 14.5248 7.28033 14.4199C7.17544 14.315 7.0418 14.2435 6.89632 14.2146C6.75083 14.1857 6.60003 14.2005 6.46299 14.2573C6.32594 14.314 6.20881 14.4102 6.1264 14.5335C6.04399 14.6569 6 14.8019 6 14.9502C6 15.1491 6.07902 15.3399 6.21967 15.4805C6.36032 15.6212 6.55109 15.7002 6.75 15.7002Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Mua hàng</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item user_flow_nav" data-type="DMH" data-des="DMH">
                                <a href="{{ route('import.index', $workspacename) }}"
                                    class="nav-link  @if (!empty($activeName) && $activeName == 'import') active @endif">
                                    <p class="text-nav ml-2">Đơn mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item user_flow_nav" data-type="DNH" data-des="DNH">
                                <a href="{{ route('receive.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'receive') active @endif ">
                                    <p class="text-nav ml-2">Đơn nhận hàng</p>
                                </a>
                            </li>
                            <li class="nav-item user_flow_nav" data-type="HDMH" data-des="HDMH">
                                <a href="{{ route('reciept.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'reciept') active @endif ">
                                    <p class="text-nav ml-2">Hóa đơn mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item user_flow_nav" data-type="TTMH" data-des="TTMH">
                                <a href="{{ route('paymentOrder.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'paymentorder') active @endif ">
                                    <p class="text-nav ml-2">Thanh toán mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item user_flow_nav" data-type="NCC" data-des="NCC">
                                <a href="{{ route('provides.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'provide') active @endif">
                                    <p class="text-nav ml-2">Nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('report.index', $workspacename) }}"
                            class="nav-link @if (!empty($activeName) && $activeName == 'report') active @endif">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.6775 10.6226V5.91931C18.6775 5.50352 18.5123 5.10476 18.2183 4.81075C17.9243 4.51674 17.5255 4.35156 17.1097 4.35156H6.91937C6.50358 4.35156 6.10482 4.51674 5.81081 4.81075C5.5168 5.10476 5.35162 5.50352 5.35162 5.91931V16.8936C5.35162 17.3093 5.5168 17.7081 5.81081 18.0021C6.10482 18.2961 6.50358 18.4613 6.91937 18.4613H10.8387"
                                    stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10.2509 13.7581H10.8388" stroke="#26273B" stroke-opacity="0.8"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.2509 10.6226H13.1904" stroke="#26273B" stroke-opacity="0.8"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.2509 7.58521H15.542" stroke="#26273B" stroke-opacity="0.8"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M8.29115 8.11429C8.40743 8.11429 8.52109 8.07981 8.61778 8.01521C8.71446 7.95061 8.78981 7.85879 8.83431 7.75136C8.8788 7.64394 8.89045 7.52573 8.86776 7.41169C8.84508 7.29764 8.78909 7.19289 8.70687 7.11067C8.62465 7.02845 8.51989 6.97246 8.40585 6.94977C8.29181 6.92709 8.1736 6.93873 8.06617 6.98323C7.95875 7.02772 7.86693 7.10308 7.80233 7.19976C7.73773 7.29644 7.70325 7.41011 7.70325 7.52638C7.70325 7.6823 7.76519 7.83184 7.87544 7.9421C7.98569 8.05235 8.13523 8.11429 8.29115 8.11429Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path
                                    d="M8.29115 11.2498C8.40743 11.2498 8.52109 11.2153 8.61778 11.1507C8.71446 11.0861 8.78981 10.9943 8.83431 10.8869C8.8788 10.7794 8.89045 10.6612 8.86776 10.5472C8.84508 10.4331 8.78909 10.3284 8.70687 10.2462C8.62465 10.1639 8.51989 10.108 8.40585 10.0853C8.29181 10.0626 8.1736 10.0742 8.06617 10.1187C7.95875 10.1632 7.86693 10.2386 7.80233 10.3353C7.73773 10.4319 7.70325 10.5456 7.70325 10.6619C7.70325 10.8178 7.76519 10.9673 7.87544 11.0776C7.98569 11.1878 8.13523 11.2498 8.29115 11.2498Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path
                                    d="M8.29115 14.3069C8.40743 14.3069 8.52109 14.2724 8.61778 14.2078C8.71446 14.1432 8.78981 14.0514 8.83431 13.944C8.8788 13.8366 8.89045 13.7184 8.86776 13.6043C8.84508 13.4903 8.78909 13.3855 8.70687 13.3033C8.62465 13.2211 8.51989 13.1651 8.40585 13.1424C8.29181 13.1197 8.1736 13.1314 8.06617 13.1759C7.95875 13.2204 7.86693 13.2957 7.80233 13.3924C7.73773 13.4891 7.70325 13.6027 7.70325 13.719C7.70325 13.8749 7.76519 14.0245 7.87544 14.1347C7.98569 14.245 8.13523 14.3069 8.29115 14.3069Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.2246 13.1819C16.996 11.9533 15.004 11.9533 13.7754 13.1819C12.5468 14.4105 12.5468 16.4025 13.7754 17.6311C15.004 18.8597 16.996 18.8597 18.2246 17.6311C19.4532 16.4025 19.4532 14.4105 18.2246 13.1819ZM18.8284 12.5781C17.2663 11.016 14.7337 11.016 13.1716 12.5781C11.6095 14.1402 11.6095 16.6728 13.1716 18.2349C14.7337 19.797 17.2663 19.797 18.8284 18.2349C20.3905 16.6728 20.3905 14.1402 18.8284 12.5781Z"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.1376 18.1376C18.321 17.9541 18.6184 17.9541 18.8019 18.1376L20.8624 20.1981C21.0459 20.3816 21.0459 20.679 20.8624 20.8624C20.679 21.0459 20.3816 21.0459 20.1981 20.8624L18.1376 18.8019C17.9541 18.6184 17.9541 18.321 18.1376 18.1376Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Báo cáo</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('history.index', $workspacename) }}"
                            class="nav-link @if (!empty($activeName) && $activeName == 'history') active @endif">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2436_7601)">
                                    <path
                                        d="M20 13V5C20 4.46957 19.7893 3.96086 19.4142 3.58579C19.0391 3.21071 18.5304 3 18 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H13.5"
                                        stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.25 15H10" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.25 11H13" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.25 7.125H16" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M6.75 7.80005C6.89834 7.80005 7.04334 7.75606 7.16668 7.67365C7.29001 7.59124 7.38614 7.47411 7.44291 7.33706C7.49967 7.20002 7.51453 7.04922 7.48559 6.90373C7.45665 6.75824 7.38522 6.62461 7.28033 6.51972C7.17544 6.41483 7.0418 6.3434 6.89632 6.31446C6.75083 6.28552 6.60003 6.30037 6.46299 6.35714C6.32594 6.4139 6.20881 6.51003 6.1264 6.63337C6.04399 6.75671 6 6.90171 6 7.05005C6 7.24896 6.07902 7.43973 6.21967 7.58038C6.36032 7.72103 6.55109 7.80005 6.75 7.80005Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path
                                        d="M6.75 11.8C6.89834 11.8 7.04334 11.7561 7.16668 11.6736C7.29001 11.5912 7.38614 11.4741 7.44291 11.3371C7.49967 11.2 7.51453 11.0492 7.48559 10.9037C7.45665 10.7582 7.38522 10.6246 7.28033 10.5197C7.17544 10.4148 7.0418 10.3434 6.89632 10.3145C6.75083 10.2855 6.60003 10.3004 6.46299 10.3571C6.32594 10.4139 6.20881 10.51 6.1264 10.6334C6.04399 10.7567 6 10.9017 6 11.05C6 11.249 6.07902 11.4397 6.21967 11.5804C6.36032 11.721 6.55109 11.8 6.75 11.8Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path
                                        d="M6.75 15.7C6.89834 15.7 7.04334 15.656 7.16668 15.5736C7.29001 15.4911 7.38614 15.374 7.44291 15.237C7.49967 15.0999 7.51453 14.9491 7.48559 14.8036C7.45665 14.6581 7.38522 14.5245 7.28033 14.4196C7.17544 14.3147 7.0418 14.2433 6.89632 14.2144C6.75083 14.1854 6.60003 14.2003 6.46299 14.257C6.32594 14.3138 6.20881 14.4099 6.1264 14.5333C6.04399 14.6566 6 14.8016 6 14.95C6 15.1489 6.07902 15.3396 6.21967 15.4803C6.36032 15.6209 6.55109 15.7 6.75 15.7Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.7532 13.5C15.464 13.4975 13.5 15.4602 13.5 17.75C13.5 18.8772 13.9478 19.9582 14.7448 20.7552C15.5418 21.5522 16.6228 22 17.75 22H17.7503C18.8775 22.0005 19.9587 21.5531 20.756 20.7564C21.5534 19.9597 22.0015 18.8789 22.002 17.7517C22.0025 16.6245 21.5551 15.5433 20.7584 14.746C19.9617 13.9487 18.8809 13.5005 17.7537 13.5L17.7532 13.5ZM17.7543 12C14.6357 11.9968 12 14.6319 12 17.75C12 19.275 12.6058 20.7375 13.6841 21.8159C14.7624 22.8941 16.2248 23.4999 17.7497 23.5M17.7545 12C19.2794 12.0007 20.7416 12.6071 21.8195 13.6858C22.8974 14.7645 23.5026 16.2273 23.502 17.7523C23.5014 19.2773 22.895 20.7396 21.8162 21.8175C20.7375 22.8953 19.2749 23.5005 17.75 23.5"
                                        fill="#26273B" fill-opacity="0.8" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.75 15C18.1642 15 18.5 15.3358 18.5 15.75V15.8199C18.6986 15.8939 18.8858 15.998 19.0546 16.1297L19.1043 16.1009C19.4627 15.8934 19.9216 16.0158 20.1291 16.3742C20.3366 16.7327 20.2143 17.1915 19.8558 17.3991L19.8262 17.4162C19.8452 17.5254 19.8555 17.6362 19.8569 17.7476C19.8583 17.8617 19.8503 17.9755 19.8331 18.0878L19.8558 18.1009C20.2143 18.3085 20.3366 18.7673 20.1291 19.1258C19.9216 19.4842 19.4627 19.6066 19.1043 19.3991L19.0881 19.3897C18.9284 19.5196 18.7501 19.6253 18.5588 19.7032C18.5393 19.7111 18.5197 19.7188 18.5 19.7261V19.75C18.5 20.1642 18.1642 20.5 17.75 20.5C17.3358 20.5 17 20.1642 17 19.75V19.7084C16.9801 19.7004 16.9602 19.6921 16.9404 19.6835C16.7592 19.6045 16.5906 19.5003 16.4393 19.3743L16.3909 19.4019C16.0309 19.6067 15.573 19.4809 15.3682 19.1209C15.1633 18.7609 15.2891 18.303 15.6491 18.0981L15.7094 18.0638C15.6947 17.9597 15.6879 17.854 15.6892 17.7476C15.6904 17.6439 15.6994 17.541 15.7158 17.4398L15.6491 17.4019C15.2891 17.197 15.1633 16.7391 15.3682 16.3791C15.573 16.0191 16.0309 15.8933 16.3909 16.0981L16.4725 16.1446C16.6331 16.0164 16.811 15.9132 17 15.8377V15.75C17 15.3358 17.3358 15 17.75 15ZM18.2497 17.4356C18.2279 17.4049 18.2032 17.3762 18.1758 17.3501C18.0654 17.245 17.9183 17.1872 17.7659 17.1891C17.6135 17.1909 17.4679 17.2523 17.3601 17.3601C17.2523 17.4679 17.1909 17.6135 17.1891 17.7659C17.1872 17.9183 17.245 18.0654 17.3501 18.1758C17.4038 18.2322 17.4683 18.2773 17.5397 18.3084C17.5692 18.3213 17.5997 18.3316 17.6308 18.3394C17.6696 18.3332 17.7095 18.33 17.75 18.33C17.7997 18.33 17.8483 18.3349 17.8953 18.3441C17.9287 18.3369 17.9615 18.3269 17.9932 18.3139C18.0654 18.2846 18.1309 18.2411 18.186 18.186C18.192 18.1799 18.1979 18.1738 18.2037 18.1675C18.2188 18.1255 18.2378 18.0842 18.261 18.0442C18.2822 18.0076 18.306 17.9734 18.3321 17.9418C18.3493 17.8849 18.3577 17.8256 18.357 17.7659C18.356 17.688 18.3395 17.6111 18.3084 17.5397C18.3031 17.5277 18.2975 17.5158 18.2914 17.5042C18.2808 17.4885 18.2706 17.4724 18.261 17.4558C18.2571 17.4491 18.2533 17.4424 18.2497 17.4356Z"
                                        fill="#26273B" fill-opacity="0.8" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2436_7601">
                                        <rect width="24" height="24" rx="4" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Lịch sử giao dịch</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index', $workspacename) }}" class="nav-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5703 2.21802C12.9227 2.21723 13.2673 2.32264 13.559 2.52052C13.8506 2.7184 14.0759 2.99957 14.2055 3.32737L14.7235 4.64053C14.7235 4.64045 14.7236 4.64061 14.7235 4.64053C14.8392 4.93323 15.061 5.17182 15.3446 5.30829C15.6283 5.4448 15.953 5.46934 16.254 5.377L17.6063 4.9629C17.9428 4.85984 18.3025 4.86038 18.6387 4.96444C18.9748 5.0685 19.2719 5.27127 19.4914 5.54641L20.2062 6.44322C20.4256 6.71823 20.5573 7.05287 20.5841 7.40367C20.6109 7.75447 20.5316 8.10522 20.3564 8.41036L19.6512 9.63681C19.4944 9.90948 19.4462 10.2312 19.5162 10.5379C19.5862 10.8445 19.7692 11.1135 20.0287 11.2912L21.1949 12.0897C21.4858 12.2883 21.7099 12.57 21.8382 12.8979C21.9663 13.2257 21.9928 13.5844 21.9141 13.9274C21.914 13.9276 21.9141 13.9271 21.9141 13.9274L21.6592 15.0448C21.4987 15.746 20.9263 16.2797 20.2145 16.3884C20.2143 16.3884 20.2146 16.3884 20.2145 16.3884L18.8165 16.6024C18.5055 16.6498 18.2235 16.8128 18.0273 17.0588C17.8312 17.3047 17.735 17.6156 17.758 17.9293L17.861 19.3421C17.861 19.342 17.861 19.3422 17.861 19.3421C17.8866 19.6921 17.8064 20.0422 17.6308 20.346C17.4551 20.65 17.192 20.8941 16.8757 21.0466L15.8394 21.5457C15.1905 21.858 14.4174 21.7431 13.888 21.2539C13.888 21.2539 13.888 21.2539 13.888 21.2539L12.849 20.2939C12.618 20.0804 12.315 19.9618 12.0005 19.9618C11.686 19.9618 11.383 20.0803 11.152 20.2938L10.112 21.2548C9.5841 21.7408 8.81082 21.859 8.16107 21.5455L7.12753 21.0477C6.47962 20.7351 6.08754 20.0586 6.13996 19.3404L6.24296 17.9294C6.26591 17.6157 6.16973 17.3047 5.9736 17.0588C5.77747 16.8128 5.49582 16.6499 5.18485 16.6024L3.78703 16.3885C3.07543 16.2798 2.50186 15.7466 2.34261 15.0432C2.34254 15.0429 2.34269 15.0435 2.34261 15.0432L2.08797 13.9267C2.08791 13.9265 2.08802 13.927 2.08797 13.9267C1.92728 13.2251 2.21253 12.4961 2.806 12.0894L3.95906 11.2993C4.22009 11.1205 4.40374 10.8494 4.47275 10.5406C4.54176 10.2318 4.49113 9.90841 4.33108 9.63553C4.33107 9.63551 4.33109 9.63554 4.33108 9.63553L3.61008 8.40653C3.4314 8.10176 3.34887 7.74992 3.37351 7.39749C3.39814 7.04517 3.52862 6.7085 3.74785 6.4316C3.74779 6.43168 3.74791 6.43152 3.74785 6.4316L4.45765 5.53386C4.67701 5.2571 4.97536 5.05229 5.31263 4.94756C5.64973 4.84288 6.01056 4.84234 6.34797 4.94601L7.75597 5.37801C8.0578 5.47089 8.38421 5.44627 8.6685 5.30876C8.95275 5.17128 9.17443 4.93131 9.28901 4.63708M9.28901 4.63708L9.794 3.33911C9.794 3.33912 9.794 3.3391 9.794 3.33911C9.92183 3.01052 10.1457 2.72805 10.4365 2.52861C10.7272 2.32916 11.0714 2.22197 11.424 2.22102L12.5703 2.21802M3.89997 15.6471L4.01346 14.9057L5.4111 15.1196C5.41098 15.1196 5.41122 15.1196 5.4111 15.1196C6.0951 15.2241 6.71495 15.5826 7.14636 16.1236C7.57782 16.6646 7.78944 17.3484 7.73898 18.0386C7.73898 18.0387 7.73899 18.0386 7.73898 18.0386L7.63598 19.4496C7.62841 19.5534 7.6848 19.6511 7.77888 19.6965L8.81242 20.1943C8.90453 20.2388 9.01753 20.2232 9.09561 20.1516C9.0955 20.1517 9.09572 20.1515 9.09561 20.1516L10.1339 19.1922C10.1339 19.1923 10.1339 19.1922 10.1339 19.1922C10.642 18.7226 11.3086 18.4618 12.0005 18.4618C12.6924 18.4618 13.3588 18.7226 13.8669 19.1922C13.8669 19.1921 13.867 19.1922 13.8669 19.1922L14.9059 20.1522C14.9825 20.2229 15.0937 20.2399 15.1888 20.1942L16.2242 19.6954C16.2694 19.6737 16.307 19.6388 16.3321 19.5954C16.3572 19.5519 16.3687 19.502 16.365 19.452L16.262 18.0387C16.262 18.0387 16.262 18.0388 16.262 18.0387C16.2115 17.3486 16.4231 16.6646 16.8546 16.1236C17.286 15.5826 17.9055 15.2241 18.5895 15.1197C18.5894 15.1197 18.5896 15.1196 18.5895 15.1197L19.9875 14.9057C20.0894 14.8901 20.1734 14.8133 20.1969 14.7108C20.1969 14.7108 20.1969 14.7107 20.1969 14.7108L20.4521 13.5919C20.4634 13.5427 20.4596 13.4912 20.4412 13.4442C20.4228 13.3972 20.3907 13.3568 20.349 13.3284L19.1813 12.5289C18.6103 12.138 18.2077 11.5462 18.0538 10.8716C17.8999 10.197 18.0059 9.48912 18.3508 8.88923L19.0555 7.66368C19.0809 7.61949 19.0923 7.5687 19.0885 7.5179C19.0846 7.46709 19.0655 7.41864 19.0337 7.37882L18.3186 6.48163C18.3186 6.48159 18.3186 6.48168 18.3186 6.48163C18.2868 6.44186 18.2437 6.41241 18.1951 6.39736C18.1464 6.38229 18.0943 6.38221 18.0456 6.39714L16.6939 6.81104C16.0321 7.01408 15.318 6.96013 14.6942 6.65994C14.0704 6.35975 13.5827 5.8354 13.3284 5.19151L12.8105 3.87867C12.7917 3.8312 12.7591 3.79048 12.7168 3.76182C12.6746 3.73319 12.6248 3.71792 12.5738 3.71802C12.5737 3.71802 12.5738 3.71802 12.5738 3.71802L11.428 3.72102C11.428 3.72102 11.428 3.72102 11.428 3.72102C11.3769 3.72116 11.3271 3.73669 11.285 3.76556C11.2429 3.79444 11.2105 3.83534 11.1919 3.88293L10.6869 5.18096C10.4349 5.8284 9.94708 6.35658 9.32164 6.6591C8.69638 6.96153 7.97985 7.01616 7.31598 6.81203L5.90798 6.38003C5.8591 6.365 5.80632 6.36491 5.75748 6.38008C5.70873 6.39521 5.66568 6.42468 5.63393 6.46464C5.63387 6.46472 5.634 6.46456 5.63393 6.46464L4.9243 7.36218C4.89264 7.40215 4.87341 7.45124 4.86986 7.50211C4.86631 7.5529 4.87816 7.60357 4.90387 7.64751M4.90387 7.64751L5.62487 8.87651C5.97703 9.47689 6.08846 10.1885 5.93663 10.8678C5.7848 11.5471 5.38104 12.1435 4.80677 12.5368L3.65394 13.3267C3.65393 13.3267 3.65396 13.3267 3.65394 13.3267C3.56765 13.3859 3.52702 13.4912 3.54998 13.5913L3.80556 14.7118C3.82858 14.8138 3.91164 14.8901 4.01346 14.9057L3.89997 15.6471"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.3872 10.6158C13.0193 10.2501 12.5214 10.0452 12.0027 10.0459C11.4839 10.0466 10.9866 10.253 10.6197 10.6198C10.2529 10.9866 10.0464 11.4838 10.0455 12.0026C10.0446 12.5213 10.2494 13.0193 10.615 13.3873C10.7968 13.5703 11.0129 13.7156 11.2509 13.8148C11.489 13.9141 11.7442 13.9655 12.0022 13.9659C12.2601 13.9663 12.5155 13.9159 12.7539 13.8174C12.9922 13.7189 13.2088 13.5744 13.3912 13.392C13.5736 13.2097 13.7182 12.9931 13.8168 12.7548C13.9153 12.5164 13.9658 12.261 13.9655 12.0031C13.9651 11.7452 13.9138 11.4899 13.8146 11.2518C13.7154 11.0138 13.5702 10.7976 13.3872 10.6158ZM14.4447 9.55199C13.7952 8.90638 12.9163 8.54459 12.0005 8.5459C11.0847 8.54721 10.2068 8.91152 9.5592 9.55899C8.91156 10.2065 8.54703 11.0843 8.54548 12C8.54393 12.9158 8.90549 13.7949 9.55093 14.4445C9.87181 14.7675 10.2533 15.024 10.6735 15.1992C11.0937 15.3745 11.5443 15.4651 11.9996 15.4659C12.4549 15.4667 12.9059 15.3776 13.3266 15.2037C13.7474 15.0299 14.1298 14.7747 14.4517 14.4528C14.7737 14.1309 15.029 13.7486 15.203 13.3279C15.3769 12.9072 15.4661 12.4562 15.4655 12.0009C15.4648 11.5457 15.3743 11.095 15.1992 10.6747C15.024 10.2545 14.7676 9.87296 14.4447 9.55199Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Cài đặt</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5703 2.21802C12.9227 2.21723 13.2673 2.32264 13.559 2.52052C13.8506 2.7184 14.0759 2.99957 14.2055 3.32737L14.7235 4.64053C14.7235 4.64045 14.7236 4.64061 14.7235 4.64053C14.8392 4.93323 15.061 5.17182 15.3446 5.30829C15.6283 5.4448 15.953 5.46934 16.254 5.377L17.6063 4.9629C17.9428 4.85984 18.3025 4.86038 18.6387 4.96444C18.9748 5.0685 19.2719 5.27127 19.4914 5.54641L20.2062 6.44322C20.4256 6.71823 20.5573 7.05287 20.5841 7.40367C20.6109 7.75447 20.5316 8.10522 20.3564 8.41036L19.6512 9.63681C19.4944 9.90948 19.4462 10.2312 19.5162 10.5379C19.5862 10.8445 19.7692 11.1135 20.0287 11.2912L21.1949 12.0897C21.4858 12.2883 21.7099 12.57 21.8382 12.8979C21.9663 13.2257 21.9928 13.5844 21.9141 13.9274C21.914 13.9276 21.9141 13.9271 21.9141 13.9274L21.6592 15.0448C21.4987 15.746 20.9263 16.2797 20.2145 16.3884C20.2143 16.3884 20.2146 16.3884 20.2145 16.3884L18.8165 16.6024C18.5055 16.6498 18.2235 16.8128 18.0273 17.0588C17.8312 17.3047 17.735 17.6156 17.758 17.9293L17.861 19.3421C17.861 19.342 17.861 19.3422 17.861 19.3421C17.8866 19.6921 17.8064 20.0422 17.6308 20.346C17.4551 20.65 17.192 20.8941 16.8757 21.0466L15.8394 21.5457C15.1905 21.858 14.4174 21.7431 13.888 21.2539C13.888 21.2539 13.888 21.2539 13.888 21.2539L12.849 20.2939C12.618 20.0804 12.315 19.9618 12.0005 19.9618C11.686 19.9618 11.383 20.0803 11.152 20.2938L10.112 21.2548C9.5841 21.7408 8.81082 21.859 8.16107 21.5455L7.12753 21.0477C6.47962 20.7351 6.08754 20.0586 6.13996 19.3404L6.24296 17.9294C6.26591 17.6157 6.16973 17.3047 5.9736 17.0588C5.77747 16.8128 5.49582 16.6499 5.18485 16.6024L3.78703 16.3885C3.07543 16.2798 2.50186 15.7466 2.34261 15.0432C2.34254 15.0429 2.34269 15.0435 2.34261 15.0432L2.08797 13.9267C2.08791 13.9265 2.08802 13.927 2.08797 13.9267C1.92728 13.2251 2.21253 12.4961 2.806 12.0894L3.95906 11.2993C4.22009 11.1205 4.40374 10.8494 4.47275 10.5406C4.54176 10.2318 4.49113 9.90841 4.33108 9.63553C4.33107 9.63551 4.33109 9.63554 4.33108 9.63553L3.61008 8.40653C3.4314 8.10176 3.34887 7.74992 3.37351 7.39749C3.39814 7.04517 3.52862 6.7085 3.74785 6.4316C3.74779 6.43168 3.74791 6.43152 3.74785 6.4316L4.45765 5.53386C4.67701 5.2571 4.97536 5.05229 5.31263 4.94756C5.64973 4.84288 6.01056 4.84234 6.34797 4.94601L7.75597 5.37801C8.0578 5.47089 8.38421 5.44627 8.6685 5.30876C8.95275 5.17128 9.17443 4.93131 9.28901 4.63708M9.28901 4.63708L9.794 3.33911C9.794 3.33912 9.794 3.3391 9.794 3.33911C9.92183 3.01052 10.1457 2.72805 10.4365 2.52861C10.7272 2.32916 11.0714 2.22197 11.424 2.22102L12.5703 2.21802M3.89997 15.6471L4.01346 14.9057L5.4111 15.1196C5.41098 15.1196 5.41122 15.1196 5.4111 15.1196C6.0951 15.2241 6.71495 15.5826 7.14636 16.1236C7.57782 16.6646 7.78944 17.3484 7.73898 18.0386C7.73898 18.0387 7.73899 18.0386 7.73898 18.0386L7.63598 19.4496C7.62841 19.5534 7.6848 19.6511 7.77888 19.6965L8.81242 20.1943C8.90453 20.2388 9.01753 20.2232 9.09561 20.1516C9.0955 20.1517 9.09572 20.1515 9.09561 20.1516L10.1339 19.1922C10.1339 19.1923 10.1339 19.1922 10.1339 19.1922C10.642 18.7226 11.3086 18.4618 12.0005 18.4618C12.6924 18.4618 13.3588 18.7226 13.8669 19.1922C13.8669 19.1921 13.867 19.1922 13.8669 19.1922L14.9059 20.1522C14.9825 20.2229 15.0937 20.2399 15.1888 20.1942L16.2242 19.6954C16.2694 19.6737 16.307 19.6388 16.3321 19.5954C16.3572 19.5519 16.3687 19.502 16.365 19.452L16.262 18.0387C16.262 18.0387 16.262 18.0388 16.262 18.0387C16.2115 17.3486 16.4231 16.6646 16.8546 16.1236C17.286 15.5826 17.9055 15.2241 18.5895 15.1197C18.5894 15.1197 18.5896 15.1196 18.5895 15.1197L19.9875 14.9057C20.0894 14.8901 20.1734 14.8133 20.1969 14.7108C20.1969 14.7108 20.1969 14.7107 20.1969 14.7108L20.4521 13.5919C20.4634 13.5427 20.4596 13.4912 20.4412 13.4442C20.4228 13.3972 20.3907 13.3568 20.349 13.3284L19.1813 12.5289C18.6103 12.138 18.2077 11.5462 18.0538 10.8716C17.8999 10.197 18.0059 9.48912 18.3508 8.88923L19.0555 7.66368C19.0809 7.61949 19.0923 7.5687 19.0885 7.5179C19.0846 7.46709 19.0655 7.41864 19.0337 7.37882L18.3186 6.48163C18.3186 6.48159 18.3186 6.48168 18.3186 6.48163C18.2868 6.44186 18.2437 6.41241 18.1951 6.39736C18.1464 6.38229 18.0943 6.38221 18.0456 6.39714L16.6939 6.81104C16.0321 7.01408 15.318 6.96013 14.6942 6.65994C14.0704 6.35975 13.5827 5.8354 13.3284 5.19151L12.8105 3.87867C12.7917 3.8312 12.7591 3.79048 12.7168 3.76182C12.6746 3.73319 12.6248 3.71792 12.5738 3.71802C12.5737 3.71802 12.5738 3.71802 12.5738 3.71802L11.428 3.72102C11.428 3.72102 11.428 3.72102 11.428 3.72102C11.3769 3.72116 11.3271 3.73669 11.285 3.76556C11.2429 3.79444 11.2105 3.83534 11.1919 3.88293L10.6869 5.18096C10.4349 5.8284 9.94708 6.35658 9.32164 6.6591C8.69638 6.96153 7.97985 7.01616 7.31598 6.81203L5.90798 6.38003C5.8591 6.365 5.80632 6.36491 5.75748 6.38008C5.70873 6.39521 5.66568 6.42468 5.63393 6.46464C5.63387 6.46472 5.634 6.46456 5.63393 6.46464L4.9243 7.36218C4.89264 7.40215 4.87341 7.45124 4.86986 7.50211C4.86631 7.5529 4.87816 7.60357 4.90387 7.64751M4.90387 7.64751L5.62487 8.87651C5.97703 9.47689 6.08846 10.1885 5.93663 10.8678C5.7848 11.5471 5.38104 12.1435 4.80677 12.5368L3.65394 13.3267C3.65393 13.3267 3.65396 13.3267 3.65394 13.3267C3.56765 13.3859 3.52702 13.4912 3.54998 13.5913L3.80556 14.7118C3.82858 14.8138 3.91164 14.8901 4.01346 14.9057L3.89997 15.6471"
                                    fill="#26273B" fill-opacity="0.8" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.3872 10.6158C13.0193 10.2501 12.5214 10.0452 12.0027 10.0459C11.4839 10.0466 10.9866 10.253 10.6197 10.6198C10.2529 10.9866 10.0464 11.4838 10.0455 12.0026C10.0446 12.5213 10.2494 13.0193 10.615 13.3873C10.7968 13.5703 11.0129 13.7156 11.2509 13.8148C11.489 13.9141 11.7442 13.9655 12.0022 13.9659C12.2601 13.9663 12.5155 13.9159 12.7539 13.8174C12.9922 13.7189 13.2088 13.5744 13.3912 13.392C13.5736 13.2097 13.7182 12.9931 13.8168 12.7548C13.9153 12.5164 13.9658 12.261 13.9655 12.0031C13.9651 11.7452 13.9138 11.4899 13.8146 11.2518C13.7154 11.0138 13.5702 10.7976 13.3872 10.6158ZM14.4447 9.55199C13.7952 8.90638 12.9163 8.54459 12.0005 8.5459C11.0847 8.54721 10.2068 8.91152 9.5592 9.55899C8.91156 10.2065 8.54703 11.0843 8.54548 12C8.54393 12.9158 8.90549 13.7949 9.55093 14.4445C9.87181 14.7675 10.2533 15.024 10.6735 15.1992C11.0937 15.3745 11.5443 15.4651 11.9996 15.4659C12.4549 15.4667 12.9059 15.3776 13.3266 15.2037C13.7474 15.0299 14.1298 14.7747 14.4517 14.4528C14.7737 14.1309 15.029 13.7486 15.203 13.3279C15.3769 12.9072 15.4661 12.4562 15.4655 12.0009C15.4648 11.5457 15.3743 11.095 15.1992 10.6747C15.024 10.2545 14.7676 9.87296 14.4447 9.55199Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Quay lại trang Quản lý workspace</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
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
    <script>
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

    </script>
