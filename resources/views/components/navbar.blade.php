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
        $workspaceExists = App\Models\Workspace::where('id', $currentWorkspace)
            ->where('user_id', $idUser)
            ->exists();
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
                    <li
                        class="nav-item 
                         @if (!empty($activeGroup) && $activeGroup == 'products') menu-is-opening menu-open @endif">
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
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Tồn kho</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('inventory.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'product') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0;"></i>
                                    <p class="text-nav">Sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editProduct', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'editproduct') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0;"></i>
                                    <p class="text-nav">Sửa tồn kho</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon" style="opacity: 0;"></i>
                                    <p class="text-nav">Chuyển kho</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item
                        @if (!empty($activeGroup) && $activeGroup == 'sell') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link">
                            <svg class="fill" width="32" height="32" viewBox="0 0 24 24" fill="none"
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
                                <a href="{{ route('detailExport.index', $workspacename) }}"
                                    class="nav-link
                                    @if (!empty($activeName) && $activeName == 'quote') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Đơn báo giá</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('delivery.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'delivery') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Đơn giao hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('billSale.index', $workspacename) }}"
                                    class="nav-link  @if (!empty($activeName) && $activeName == 'billsale') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p>Hóa đơn bán hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payExport.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'payexport') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Thanh toán bán hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guests.index', $workspacename) }}"
                                    class="nav-link  @if (!empty($activeName) && $activeName == 'guest') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Khách hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (!empty($activeGroup) && $activeGroup == 'buy') menu-is-opening menu-open @endif">
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
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="text-nav">Mua hàng</p>
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('import.index', $workspacename) }}"
                                    class="nav-link  @if (!empty($activeName) && $activeName == 'import') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Đơn mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('receive.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'receive') active @endif ">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Đơn nhận hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reciept.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'reciept') active @endif ">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Hóa đơn mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('paymentOrder.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'paymentorder') active @endif ">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Thanh toán mua hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('provides.index', $workspacename) }}"
                                    class="nav-link @if (!empty($activeName) && $activeName == 'provide') active @endif">
                                    <i class="far fa-circle nav-icon" style="opacity: 0"></i>
                                    <p class="text-nav">Nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <svg class="fill" width="32" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.75C9.81196 3.75 7.71354 4.61919 6.16637 6.16637C4.61919 7.71354 3.75 9.81196 3.75 12C3.75 14.188 4.61919 16.2865 6.16637 17.8336C7.71354 19.3808 9.81196 20.25 12 20.25C14.188 20.25 16.2865 19.3808 17.8336 17.8336C19.3808 16.2865 20.25 14.188 20.25 12C20.25 9.81196 19.3808 7.71354 17.8336 6.16637C16.2865 4.61919 14.188 3.75 12 3.75ZM5.10571 5.10571C6.93419 3.27723 9.41414 2.25 12 2.25C14.5859 2.25 17.0658 3.27723 18.8943 5.10571C20.7228 6.93419 21.75 9.41414 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75C9.41414 21.75 6.93419 20.7228 5.10571 18.8943C3.27723 17.0658 2.25 14.5859 2.25 12C2.25 9.41414 3.27723 6.93419 5.10571 5.10571Z"
                                    fill="#555555" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.9394 8.18934C11.2207 7.90804 11.6022 7.75 12.0001 7.75C12.3979 7.75 12.7794 7.90804 13.0607 8.18934C13.3421 8.47065 13.5001 8.85219 13.5001 9.25001C13.5001 9.64784 13.3421 10.0294 13.0607 10.3107C12.7794 10.592 12.3979 10.75 12.0001 10.75C11.6022 10.75 11.2207 10.592 10.9394 10.3107C10.6581 10.0294 10.5001 9.64784 10.5001 9.25001C10.5001 8.85219 10.6581 8.47065 10.9394 8.18934ZM12.0001 6.25C12.7957 6.25 13.5588 6.56607 14.1214 7.12868C14.684 7.6913 15.0001 8.45436 15.0001 9.25001C15.0001 10.0457 14.684 10.8087 14.1214 11.3713C13.5588 11.934 12.7957 12.25 12.0001 12.25C11.2044 12.25 10.4414 11.934 9.87874 11.3713C9.31613 10.8087 9.00006 10.0457 9.00006 9.25001C9.00006 8.45436 9.31613 7.6913 9.87874 7.12868C10.4414 6.56607 11.2044 6.25 12.0001 6.25ZM13.4573 13.338L10.5441 13.338C9.67413 13.3391 8.83217 13.6506 8.17135 14.2164C7.51054 14.7822 7.07327 15.5652 6.93816 16.4245C6.87384 16.8337 7.1534 17.2176 7.56259 17.2819C7.97178 17.3462 8.35564 17.0667 8.41996 16.6575C8.49961 16.1509 8.75738 15.6893 9.14692 15.3558C9.53634 15.0224 10.0319 14.8388 10.5446 14.838H13.4554C13.9681 14.839 14.4636 15.0226 14.853 15.356C15.2426 15.6896 15.5004 16.1511 15.5802 16.6577C15.6446 17.0669 16.0286 17.3463 16.4378 17.2819C16.8469 17.2174 17.1264 16.8335 17.0619 16.4243C16.9266 15.5651 16.4893 14.7823 15.8286 14.2166C15.1679 13.6509 14.3271 13.3394 13.4573 13.338Z"
                                    fill="#555555" />
                            </svg>
                            <p class="text-nav">
                                Báo cáo
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <svg class="fill" width="32" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.75C9.81196 3.75 7.71354 4.61919 6.16637 6.16637C4.61919 7.71354 3.75 9.81196 3.75 12C3.75 14.188 4.61919 16.2865 6.16637 17.8336C7.71354 19.3808 9.81196 20.25 12 20.25C14.188 20.25 16.2865 19.3808 17.8336 17.8336C19.3808 16.2865 20.25 14.188 20.25 12C20.25 9.81196 19.3808 7.71354 17.8336 6.16637C16.2865 4.61919 14.188 3.75 12 3.75ZM5.10571 5.10571C6.93419 3.27723 9.41414 2.25 12 2.25C14.5859 2.25 17.0658 3.27723 18.8943 5.10571C20.7228 6.93419 21.75 9.41414 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75C9.41414 21.75 6.93419 20.7228 5.10571 18.8943C3.27723 17.0658 2.25 14.5859 2.25 12C2.25 9.41414 3.27723 6.93419 5.10571 5.10571Z"
                                    fill="#555555" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.9394 8.18934C11.2207 7.90804 11.6022 7.75 12.0001 7.75C12.3979 7.75 12.7794 7.90804 13.0607 8.18934C13.3421 8.47065 13.5001 8.85219 13.5001 9.25001C13.5001 9.64784 13.3421 10.0294 13.0607 10.3107C12.7794 10.592 12.3979 10.75 12.0001 10.75C11.6022 10.75 11.2207 10.592 10.9394 10.3107C10.6581 10.0294 10.5001 9.64784 10.5001 9.25001C10.5001 8.85219 10.6581 8.47065 10.9394 8.18934ZM12.0001 6.25C12.7957 6.25 13.5588 6.56607 14.1214 7.12868C14.684 7.6913 15.0001 8.45436 15.0001 9.25001C15.0001 10.0457 14.684 10.8087 14.1214 11.3713C13.5588 11.934 12.7957 12.25 12.0001 12.25C11.2044 12.25 10.4414 11.934 9.87874 11.3713C9.31613 10.8087 9.00006 10.0457 9.00006 9.25001C9.00006 8.45436 9.31613 7.6913 9.87874 7.12868C10.4414 6.56607 11.2044 6.25 12.0001 6.25ZM13.4573 13.338L10.5441 13.338C9.67413 13.3391 8.83217 13.6506 8.17135 14.2164C7.51054 14.7822 7.07327 15.5652 6.93816 16.4245C6.87384 16.8337 7.1534 17.2176 7.56259 17.2819C7.97178 17.3462 8.35564 17.0667 8.41996 16.6575C8.49961 16.1509 8.75738 15.6893 9.14692 15.3558C9.53634 15.0224 10.0319 14.8388 10.5446 14.838H13.4554C13.9681 14.839 14.4636 15.0226 14.853 15.356C15.2426 15.6896 15.5004 16.1511 15.5802 16.6577C15.6446 17.0669 16.0286 17.3463 16.4378 17.2819C16.8469 17.2174 17.1264 16.8335 17.0619 16.4243C16.9266 15.5651 16.4893 14.7823 15.8286 14.2166C15.1679 13.6509 14.3271 13.3394 13.4573 13.338Z"
                                    fill="#555555" />
                            </svg>

                            <p class="text-nav">
                                Lịch sử giao dịch
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <svg class="fill" width="32" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.75C9.81196 3.75 7.71354 4.61919 6.16637 6.16637C4.61919 7.71354 3.75 9.81196 3.75 12C3.75 14.188 4.61919 16.2865 6.16637 17.8336C7.71354 19.3808 9.81196 20.25 12 20.25C14.188 20.25 16.2865 19.3808 17.8336 17.8336C19.3808 16.2865 20.25 14.188 20.25 12C20.25 9.81196 19.3808 7.71354 17.8336 6.16637C16.2865 4.61919 14.188 3.75 12 3.75ZM5.10571 5.10571C6.93419 3.27723 9.41414 2.25 12 2.25C14.5859 2.25 17.0658 3.27723 18.8943 5.10571C20.7228 6.93419 21.75 9.41414 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75C9.41414 21.75 6.93419 20.7228 5.10571 18.8943C3.27723 17.0658 2.25 14.5859 2.25 12C2.25 9.41414 3.27723 6.93419 5.10571 5.10571Z"
                                    fill="#555555" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.9394 8.18934C11.2207 7.90804 11.6022 7.75 12.0001 7.75C12.3979 7.75 12.7794 7.90804 13.0607 8.18934C13.3421 8.47065 13.5001 8.85219 13.5001 9.25001C13.5001 9.64784 13.3421 10.0294 13.0607 10.3107C12.7794 10.592 12.3979 10.75 12.0001 10.75C11.6022 10.75 11.2207 10.592 10.9394 10.3107C10.6581 10.0294 10.5001 9.64784 10.5001 9.25001C10.5001 8.85219 10.6581 8.47065 10.9394 8.18934ZM12.0001 6.25C12.7957 6.25 13.5588 6.56607 14.1214 7.12868C14.684 7.6913 15.0001 8.45436 15.0001 9.25001C15.0001 10.0457 14.684 10.8087 14.1214 11.3713C13.5588 11.934 12.7957 12.25 12.0001 12.25C11.2044 12.25 10.4414 11.934 9.87874 11.3713C9.31613 10.8087 9.00006 10.0457 9.00006 9.25001C9.00006 8.45436 9.31613 7.6913 9.87874 7.12868C10.4414 6.56607 11.2044 6.25 12.0001 6.25ZM13.4573 13.338L10.5441 13.338C9.67413 13.3391 8.83217 13.6506 8.17135 14.2164C7.51054 14.7822 7.07327 15.5652 6.93816 16.4245C6.87384 16.8337 7.1534 17.2176 7.56259 17.2819C7.97178 17.3462 8.35564 17.0667 8.41996 16.6575C8.49961 16.1509 8.75738 15.6893 9.14692 15.3558C9.53634 15.0224 10.0319 14.8388 10.5446 14.838H13.4554C13.9681 14.839 14.4636 15.0226 14.853 15.356C15.2426 15.6896 15.5004 16.1511 15.5802 16.6577C15.6446 17.0669 16.0286 17.3463 16.4378 17.2819C16.8469 17.2174 17.1264 16.8335 17.0619 16.4243C16.9266 15.5651 16.4893 14.7823 15.8286 14.2166C15.1679 13.6509 14.3271 13.3394 13.4573 13.338Z"
                                    fill="#555555" />
                            </svg>
                            <p class="text-nav">
                                Cài đặt
                            </p>
                        </a>
                    </li>
                    <a href="{{ route('dashboard') }}" class="text-nav">Quay lại trang Quản lý workspace</a>
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
        $(document).ready(function() {
            setTimeout(function() {
                $('#notification').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 4000);
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
