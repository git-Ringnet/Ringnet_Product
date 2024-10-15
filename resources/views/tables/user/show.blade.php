<x-navbar :title="$title" activeGroup="systemFirst" activeName="users"></x-navbar>
<form action="#" method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content editGuest min-height--none">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left opacity-0">
                    <span class="ml-4">Thiết lập ban đầu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('users.index', ['workspace' => $workspacename]) }}">Nhân
                            viên
                        </a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $title }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('users.index', ['workspace' => $workspacename]) }}" class="activity"
                                data-name1="KH" data-des="Trở về">
                                <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                    style="margin-right:10px;">
                                    <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-button">Trở về</span>
                                </button>
                            </a>
                        </div>
                        <div class="detail">
                            <div class="d-flex content__heading--right">
                                <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                    onclick="printContentCustom('printContent', 'print-order')">In
                                    trang
                                </button>
                                <form id="exportForm" action="{{ route('exportDetailUser', $user->id) }}" method="GET"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                                    onclick="event.preventDefault(); document.getElementById('exportForm').submit();">
                                    <button type="button"
                                        class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                        <i class="fa-regular fa-file-excel"></i>
                                        <span class="m-0 ml-1">Xuất Excel</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="history">
                            <div class="d-flex content__heading--right">
                                <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                    onclick="printContentCustom('printContent', 'print-sales')">In
                                    trang
                                </button>
                                <form id="exportFormSales" action="{{ route('exportDetailUserSales', $user->id) }}"
                                    method="GET" style="display: none;">
                                    @csrf
                                </form>

                                <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                                    onclick="event.preventDefault(); document.getElementById('exportFormSales').submit();">
                                    <button type="button"
                                        class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                        <i class="fa-regular fa-file-excel"></i>
                                        <span class="m-0 ml-1">Xuất Excel</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <a class="activity" data-name1="KH" data-des="Xem trang sửa"
                            href="{{ route('users.edit', ['workspace' => $workspacename, 'user' => $user->id]) }}">
                            <button type="button" class="custom-btn d-flex align-items-center h-100 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                        fill="white" />
                                    <path
                                        d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                        fill="white" />
                                    <path
                                        d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                        fill="white" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Sửa</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <section class="content-header--options p-0">
                <ul class="header-options--nav nav nav-tabs margin-left32">
                    <li>
                        <a id="info-tab" class="text-secondary active m-0 pl-3 activity" data-name1="KH"
                            data-des="Xem thông tin" data-toggle="tab" href="#info">Thông tin</a>
                    </li>
                    <li>
                        <a id="detail-tab" class="text-secondary m-0 pl-3 activity" data-toggle="tab"
                            href="#detail">Đơn
                            hàng</a>
                    </li>
                    <li>
                        <a id="history-tab" class="text-secondary m-0 pl-3 pr-3 activity" data-toggle="tab"
                            data-name1="KH" data-des="Xem doanh số" href="#history">Doanh số</a>
                    </li>
                </ul>
            </section>
        </div>
        <div class="content margin-top-75" style="margin-top: 13.7rem;">
            <div class="content">
                <div class="tab-content mt-3">
                    <div id="info" class="content tab-pane in active">
                        {{-- THÔNG TIN CHUNG --}}
                        <div class="bg-filter-search border-0 text-left border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN CHUNG
                            </p>
                        </div>
                        <div class="info-chung">
                            <div class="content-info">
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Chọn nhóm đối tượng</p>
                                    </div>
                                    <select name="grouptype_id" id="grouptypeSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        disabled>
                                        <option value="0">Chưa chọn nhóm</option>
                                        @foreach ($groups as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($user->group_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Mã nhân viên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="user_code"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->user_code }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="name"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->name }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-red required-label">Chức vụ</p>
                                    </div>
                                    <select name="role_id" id="roleSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        disabled>
                                        <option value="0">Chọn chức vụ</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($user->roleid == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-red required-label">Email(Tài khoản
                                            đăng
                                            nhập)</p>
                                    </div>
                                    <input type="email" required placeholder="Nhập thông tin" name="email"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->email }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Mật khẩu</p>
                                    </div>
                                    <input type="password" placeholder="Nhập thông tin" name="password"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->password }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Địa chỉ</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="address"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->address }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Điện thoại</p>
                                    </div>
                                    <input type="text" oninput="validateInput(this)" placeholder="Nhập thông tin"
                                        name="phone_number"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->phone_number }}" disabled>
                                </div>
                            </div>
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        </div>
                    </div>
                    <div id="detail" class="tab-pane fade">
                        {{-- THÔNG TIN CHUNG --}}
                        <div class="bg-filter-search border-0 text-left border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-left">DOANH SỐ BÁN HÀNG
                            </p>
                        </div>
                        <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed border-custom">
                            <div class="w-100">
                                <div class="row mr-0">
                                    <div class="col-md-5 d-flex align-items-center">
                                        <form action="" method="get" id="search-filter" class="p-0 m-0">
                                            <div class="position-relative ml-1">
                                                <input type="text" placeholder="Tìm kiếm" id="search"
                                                    name="keywords" style="outline: none;"
                                                    class="pr-4 w-100 input-search text-13"
                                                    value="{{ request()->keywords }}" />
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search btn-submit"></i>
                                                </span>
                                                <input class="btn-submit" type="submit" id="hidden-submit"
                                                    name="hidden-submit" style="display: none;" />
                                            </div>
                                        </form>
                                        <div class="dropdown mx-2 filter-all">
                                            <button class="btn-filter_search" data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                        fill="#6D7075" />
                                                </svg>
                                                <span class="text-btnIner">Bộ lọc</span>
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="#6B6F76" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" id="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton" style="z-index:">
                                                <div class="search-container px-2">
                                                    <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                        class="text-13" onkeyup="filterFunction()"
                                                        style="outline: none;">
                                                    <span class="search-icon mr-2">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <div class="scrollbar">
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-ma" data-button="ma" type="button">
                                                        Mã phiếu
                                                    </button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-date" data-button="date" type="button">
                                                        Ngày lập
                                                    </button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-diengiai" data-button="diengiai" type="button">
                                                        Diễn giải
                                                    </button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-khachhang-ncc" data-button="khachhang-ncc"
                                                        type="button">
                                                        Khách hàng / NCC
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Input fields to filter -->
                                            <x-filter-text name="ma" title="Mã phiếu" />
                                            <x-filter-date-time name="date" title="Ngày lập" />
                                            <x-filter-text name="diengiai" title="Diễn giải" />
                                            <x-filter-text name="khachhang-ncc" title="Khách hàng / NCC" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-chung">
                            <div class="col-12 p-0 m-0">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 table-responsive text-nowrap mt-5" id="print-order">
                                        <table id="example2" class="table table-hover bg-white rounded">
                                            <thead class="border-custom">
                                                <tr style="height: 44px;">
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Mã phiếu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Ngày lập</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Diễn giải</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Khách hàng / NCC</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-detail">
                                                @php
                                                    // Kết hợp hai mảng
                                                    $combined = $detailExport->concat($detailImport);

                                                    // Sắp xếp mảng kết hợp theo ngày tạo (created_at) tăng dần
                                                    $sortedCombined = $combined->sortBy('created_at');

                                                    $currentDebt = 0;

                                                @endphp
                                                @foreach ($sortedCombined as $item)
                                                    <tr class="detail-info">
                                                        <td
                                                            class="text-13-black max-width120 border-bottom border-right">
                                                            <input type="hidden" name="id-detail" class="id-detail"
                                                                id="id-detail" value="{{ $item->id }}"
                                                                data-source="{{ $item->source_id }}">
                                                            @if (isset($item->guest_id))
                                                                <a
                                                                    href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $item->maBG]) }}">
                                                                    {{ $item->quotation_number }}
                                                                </a>
                                                            @else
                                                                <a
                                                                    href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}">
                                                                    {{ $item->quotation_number }}
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black padding-left35 border-bottom border-right">
                                                            {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                                        </td>
                                                        <td
                                                            class="text-13-black max-width120 border-bottom border-right">
                                                            @if (isset($item->guest_id))
                                                                Phiếu bán hàng
                                                            @else
                                                                Phiếu đặt hàng NCC
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-nowrap border-bottom border-right">
                                                            @if (isset($item->guest_name_display))
                                                                {{ $item->guest_name_display }}
                                                            @else
                                                                {{ $item->provide_name_display }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade">
                        {{-- THÔNG TIN CHUNG --}}
                        <div class="bg-filter-search border-0 text-left border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-left">DOANH SỐ BÁN HÀNG
                            </p>
                        </div>
                        <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed border-custom">
                            <div class="w-100">
                                <div class="row mr-0">
                                    <div class="col-md-5 d-flex align-items-center">
                                        <form action="" method="get" id="search-filter" class="p-0 m-0">
                                            <div class="position-relative ml-1">
                                                <input type="text" placeholder="Tìm kiếm" id="search2"
                                                    name="keywords" style="outline: none;"
                                                    class="pr-4 w-100 input-search text-13"
                                                    value="{{ request()->keywords }}" autocomplete="off" />
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search btn-submit"></i>
                                                </span>
                                                <input class="btn-submit" type="submit" id="hidden-submit"
                                                    name="hidden-submit" style="display: none;" />
                                            </div>
                                        </form>
                                        <div class="dropdown mx-2 filter-al">
                                            <button class="btn-filter_search" data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                        fill="#6D7075" />
                                                    <path
                                                        d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                        fill="#6D7075" />
                                                </svg>
                                                <span class="text-btnIner">Bộ lọc</span>
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="#6B6F76" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" id="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton" style="z-index:">
                                                <div class="search-container px-2">
                                                    <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                        class="text-13" onkeyup="filterFunction()"
                                                        style="outline: none;" autocomplete="off">
                                                    <span class="search-icon mr-2">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <div class="scrollbar">
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-chungtu" data-button="chungtu" type="button">
                                                        Số chứng từ
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-ctvbanhang" data-button="ctvbanhang" type="button">
                                                        CTV bán hàng
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-mahang" data-button="mahang" type="button">
                                                        Mã hàng
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-tenhang" data-button="tenhang" type="button">
                                                        Tên hàng
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-dvt" data-button="dvt" type="button">
                                                        ĐVT
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-slban" data-button="slban" type="button">
                                                        SL bán
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-dongia" data-button="dongia" type="button">
                                                        Đơn giá
                                                    </button>
                                                    <button class="dropdown-item btndropdownn text-13-black"
                                                        id="btn-thanhtien" data-button="thanhtien" type="button">
                                                        Thành tiền
                                                    </button>
                                                </div>
                                                <x-filter-text name="chungtu" title="Số chứng từ" />
                                                <x-filter-text name="ctvbanhang" title="CTV bán hàng" />
                                                <x-filter-text name="mahang" title="Mã hàng" />
                                                <x-filter-text name="tenhang" title="Tên hàng" />
                                                <x-filter-text name="dvt" title="ĐVT" />
                                                <x-filter-compare name="slban" title="SL bán" />
                                                <x-filter-compare name="dongia" title="Đơn giá" />
                                                <x-filter-compare name="thanhtien" title="Thành tiền" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-chung">
                            <div class="col-12 p-0 m-0">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 table-responsive text-nowrap mt-5" id="sales">
                                        <table id="example2" class="table table-hover bg-white rounded">
                                            <thead class="border-custom">
                                                <tr style="height: 44px;">
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Mã phiếu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Khách hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Nhóm hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Mã hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>

                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn vị tính</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Số lượng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn giá</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                    <th class="height-52 border" scope="col" style="">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="group_type" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Thành tiền</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalDeliverQty = 0;
                                                    $totalPriceExport = 0;
                                                    $totalProductTotalVat = 0;
                                                    $totalItemDeliveryTotalProductVat = 0;
                                                    $Pay = 0;
                                                    $Remai = 0;
                                                    $totalPay = 0;
                                                    $totalRemai = 0;
                                                    $stt = 1; // Initialize the STT variable
                                                @endphp

                                                @foreach ($allDelivery as $itemDelivery)
                                                    @php
                                                        $matchedItems = $productDelivered
                                                            ->where('detailexport_id', $itemDelivery->id)
                                                            ->where('id_sale', $user->id);
                                                        $count = $matchedItems->count();
                                                    @endphp

                                                    @if ($matchedItems->isNotEmpty())
                                                        @php
                                                            $totalItemDeliveryTotalProductVat +=
                                                                $itemDelivery->totalProductVat +
                                                                $itemDelivery->total_tax;
                                                            $Pay =
                                                                $itemDelivery->totalProductVat +
                                                                $itemDelivery->total_tax -
                                                                $itemDelivery->amount_owed;
                                                            $Remai = $itemDelivery->amount_owed;
                                                            $totalPay += $Pay;
                                                            $totalRemai += $Remai;
                                                        @endphp

                                                        @foreach ($matchedItems as $matchedItem)
                                                            @php
                                                                $totalDeliverQty += $matchedItem->product_qty;
                                                                $totalPriceExport += $matchedItem->price_export;
                                                                $totalProductTotalVat += $matchedItem->product_total;
                                                            @endphp
                                                            <tr class="position-relative relative">
                                                                <input type="hidden" value="{{ $itemDelivery->id }}"
                                                                    class="sell">
                                                                @if ($loop->first)
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->maPhieu }}
                                                                    </td>
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->nameGuest }}
                                                                    </td>
                                                                @endif
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->nameGr }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_code }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_name }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_unit }}
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ number_format($matchedItem->product_qty) }}
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ number_format($matchedItem->price_export) }}
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ number_format($matchedItem->product_total) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        @php
                                                            $stt++; // Increment STT after each invoice
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var parentId = $(this).closest('#history, #detailExport').attr('id');

        if (parentId === 'history') {
            console.log('Parent is history');
            // Xử lý logic cho history
        } else if (parentId === 'detailExport') {
            console.log('Parent is detailExport');
            // Xử lý logic cho detailExport
        } else {
            console.log('Parent is neither history nor detailExport');
            // Xử lý khi không phải cả hai
        }

        // Lịch sử công nợ
        if (parentId === 'history') {
            var buttonElement = this;
            // Thu thập dữ liệu và reset nếu action delete được kích hoạt
            var formData = {
                data: {{ $user->id }},
                search: $('#search').val(),
                // Lấy dữ liệu từ các trường tương ứng
                ma: getData('#ma', this),
                date: retrieveDateData(this, 'date'),
                diengiai: getData('#diengiai', this),
                khachhang_ncc: getData('#khachhang-ncc', this),
                sort: getSortData(buttonElement)
            };
            // AJAX request cho lịch sử công nợ
            $.ajax({
                type: 'get',
                url: "{{ route('searchHistoryDebt') }}",
                data: formData,
                success: function(data) {
                    updateFilters(data, filters, '.result-filter-history', '.tbody-history',
                        '.history-info', '.id-history', $(this).data('button'));
                }
            });

            // Đơn hàng
        } else if (parentId === 'detailExport') {
            var buttonElement = this;
            // Thu thập dữ liệu và reset nếu action delete được kích hoạt
            var formData = {
                data: {{ $user->id }},
                search: $('#search2').val(),
                chungtu: getData('#chungtu', this),
                ctvbanhang: getData('#ctvbanhang', this),
                mahang: getData('#mahang', this),
                tenhang: getData('#tenhang', this),
                dvt: getData('#dvt', this),
                slban: retrieveComparisonData(this, "slban"),
                dongia: retrieveComparisonData(this, "dongia"),
                thanhtien: retrieveComparisonData(this, "thanhtien"),
                sort: getSortData(buttonElement)
            };
            // AJAX request cho đơn hàng
            $.ajax({
                type: 'get',
                url: "{{ route('searchDetailGuest') }}",
                data: formData,
                success: function(data) {
                    console.log(data);
                    updateFilters(data, filters, '.result-filter-detail', '.tbody-detail',
                        '.detail-info', '.id-detail', $(this).data('button'));
                }
            });
        }
        // Ẩn các tùy chọn nếu cần
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + $(this).data('button-name') + '-options').hide();
        }

        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });

    $(document).ready(function() {
        $('.history').hide();
        $('.detail').hide();

        // Xử lý khi chọn tab
        $('.header-options--nav a[data-toggle="tab"]').click(function() {
            var targetId = $(this).attr('href');
            // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
            $('.history').toggle(targetId === '#history');
            $('.detail').toggle(targetId === '#detail');
        });
    });
</script>
