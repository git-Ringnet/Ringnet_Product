<x-navbar :title="$title" activeName="report"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Báo cáo</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary title-data">Mua hàng</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    {{-- <a href="{{ route('inventory.create', $workspacename) }}"> --}}
                    <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100">
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white"></path>
                        </svg>
                        <span class="text-btnIner-primary ml-2">Tạo mới</span>
                    </button>
                    </a>
                    <button type="button" class="btn-option bg-white border-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#42526E"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <section class="border-custom d-flex" style="height: 50px;">
            <div class="toggle">
                <ul class="header-options--nav nav nav-tabs margin-left32">
                    <li>
                        <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#import">Mua hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#export">Bán hàng</a>
                    </li>
                </ul>
            </div>
        </section>
        <div class="import">
            <div class="bg-filter-search pl-4">
                <div class="content-wrapper1 py-2">
                    <div class="row m-auto filter p-0">
                        <div class="w-100">
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <form action="" method="get" id="search-filter" class="p-0 m-0">
                                        <div class="position-relative ml-1">
                                            <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                id="search-import" style="outline: none;"
                                                class="pr-4 w-100 input-search text-13"
                                                value="{{ request()->keywords }}">
                                            <span id="search-icon" class="search-icon btn-submit"
                                                data-button="import"><i class="fas fa-search"
                                                    aria-hidden="true"></i></span>
                                            <input class="btn-submit" type="submit" id="hidden-submit"
                                                name="hidden-submit" style="display: none;">
                                        </div>
                                    </form>
                                    <div class="dropdown mx-2">
                                        <button class="btn-filter_searh" data-toggle="dropdown">
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
                                            <span class="text-btnIner">Bộc lọc</span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                    fill="#6B6F76" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu" id="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <div class="search-container px-2">
                                                <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                    class="text-13" onkeyup="filterFunction()"
                                                    style="outline: none;">
                                                <span class="search-icon mr-2">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                            <div class="scrollbar">
                                                <button class="dropdown-item btndropdown text-13-black btn-code"
                                                    id="btn-code-import" data-button="code" data-button="import"
                                                    type="button">Mã nhà
                                                    cung cấp
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-name"
                                                    id="btn-name-import" data-button="name" data-button="import"
                                                    type="button">Công
                                                    ty
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-total"
                                                    id="btn-total-import" data-button="import" data-button="total"
                                                    type="button">
                                                    Tổng thanh toán
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-debt"
                                                    id="btn-debt-import" data-button="import" data-button="debt"
                                                    type="button">
                                                    Công nợ
                                                </button>
                                            </div>
                                        </div>
                                        {{-- Nhập --}}
                                        <x-filter-text name="code-import" button="import" title="Mã nhà cung cấp" />
                                        <x-filter-checkbox :dataa='$provides' name="name-import"
                                            title="Tên nhà cung cấp" namedisplay="provide_name" />
                                        <x-filter-compare name="total-import" title="Tổng thanh toán" />
                                        <x-filter-compare name="debt-import" title="Công nợ" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cac">Import</div>
        </div>
        <div class="export" style="display: none">
            <div class="bg-filter-search pl-4">
                <div class="content-wrapper1 py-2">
                    <div class="row m-auto filter p-0">
                        <div class="w-100">
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <form action="" method="get" id="search-filter" class="p-0 m-0">
                                        <div class="position-relative ml-1">
                                            <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                id="search-export" style="outline: none;"
                                                class="pr-4 w-100 input-search text-13"
                                                value="{{ request()->keywords }}">
                                            <span id="search-icon" class="search-icon btn-submit"
                                                data-button="export"><i class="fas fa-search"
                                                    aria-hidden="true"></i></span>
                                            <input class="btn-submit" type="submit" id="hidden-submit"
                                                name="hidden-submit" style="display: none;">
                                        </div>
                                    </form>
                                    <div class="dropdown mx-2">
                                        <button class="btn-filter_searh" data-toggle="dropdown">
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
                                            <span class="text-btnIner">Bộc lọc</span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                    fill="#6B6F76" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu" id="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <div class="search-container px-2">
                                                <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                    class="text-13" onkeyup="filterFunction()"
                                                    style="outline: none;">
                                                <span class="search-icon mr-2">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                            <div class="scrollbar">
                                                <button class="dropdown-item btndropdown text-13-black btn-code"
                                                    id="btn-code-export" data-button="code" data-button="export"
                                                    type="button">Mã khách hàng
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-name"
                                                    id="btn-name-export" data-button="name" data-button="export"
                                                    type="button">Công
                                                    ty
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-total"
                                                    id="btn-total-export" data-button="export" data-button="total"
                                                    type="button">
                                                    Tổng doanh số
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-debt"
                                                    id="btn-debt-export" data-button="export" data-button="debt"
                                                    type="button">
                                                    Công nợ
                                                </button>
                                            </div>
                                        </div>
                                        {{-- Bán --}}
                                        <x-filter-text name="code-export" button="export" title="Mã khách hàng" />
                                        <x-filter-checkbox :dataa='$guests' name="name-export" title="Tên khách hàng"
                                            namedisplay="guest_name" />
                                        <x-filter-compare name="total-export" title="Tổng doanh số" />
                                        <x-filter-compare name="debt-export" title="Công nợ" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cac">Export</div>
        </div>
    </div>
    <div class="tab-content">
        {{-- Mua hàng --}}
        <div id="import" class="content tab-pane in active">
            <div class="content margin-top-fixed6">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card scroll-custom mt-3">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;"
                                                        class="border-top-0 bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã nhà cung cấp
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="export_code" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công ty</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_receiver" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng thanh toán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_receiver"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_receiver" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_receiver"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import">
                                                @foreach ($provides as $item)
                                                    <tr class="position-relative provide-info"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-provide" class="id-provide"
                                                            id="id-provide" value="{{ $item->provide_id }}">
                                                        <td>
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                            fill="#282A30" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1710_10941">
                                                                            <rect width="6" height="10"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <input type="checkbox" class="p-0 m-0 checkall-btn"
                                                                name="ids[]" id="checkbox" value=""
                                                                onclick="event.stopPropagation();">
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->provide_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->provide_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumSell) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumAmountOwed) }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
                                                                cac
                                                            </div>
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
                </section>
            </div>
        </div>
        {{-- Bán hàng --}}
        <div id="export" class="tab-pane fade">
            <div class="content margin-top-fixed6">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">

                                <div class="card scroll-custom mt-3">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;"
                                                        class="border-top-0 bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã khách hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="export_code" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công ty</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_receiver" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng doanh số</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_receiver"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border-top-0 bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_receiver" data-sort-type="">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_receiver"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import">
                                                @foreach ($guests as $item)
                                                    <tr class="position-relative guests-info"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-guest" class="id-guest"
                                                            id="id-guest" value="{{ $item->guest_id }}">
                                                        <td>
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                            fill="#282A30" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1710_10941">
                                                                            <rect width="6" height="10"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <input type="checkbox" class="p-0 m-0 checkall-btn"
                                                                name="ids[]" id="checkbox" value=""
                                                                onclick="event.stopPropagation();">
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->guest_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->guest_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumSell) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumAmountOwed) }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
                                                                CAC
                                                            </div>
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
                </section>
            </div>
        </div>
    </div>
</div>



</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    $('.header-options--nav a[data-toggle="tab"]').click(function() {
        var targetId = $(this).attr('href');
        var content = (targetId === '#import') ? "Mua hàng" : "Bán hàng";
        $('.title-data').html(content);
        $('.import').toggle(targetId === '#import');
        $('.export').toggle(targetId === '#export');
    });


    $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        var buttonname = $(this).data('button') || 'import';
        var code = $('#code-' + buttonname).val();
        var name = $('#name-' + buttonname).val();
        var total = $('#total-' + buttonname).val();
        var debt = $('#debt-' + buttonname).val();
        var search = $('#search-' + buttonname).val();
        if (buttonname == 'import') {
            console.log('import');
            $.ajax({
                url: "{{ route('searchReportProvides') }}",
                type: "get",
                data: {
                    search: search,
                    code: code,
                    name: name,
                    debt: debt,
                    total: total,
                },
                success: function(data) {
                    // var userIds = [];
                    // data.forEach(function(item) {
                    //     var userId = item.id;
                    //     userIds.push(userId);
                    // });
                    // $('.user-workspaces').each(function() {
                    //     var value = parseInt($(this).find('.id-info').val());
                    //     if (userIds.includes(value)) {
                    //         $(this).show();
                    //     } else {
                    //         $(this).hide();
                    //     }
                    // });
                }
            })
        }
        if (buttonname == 'export') {
            console.log('export');
            console.log(code);
            $.ajax({
                url: "{{ route('searchReportGuests') }}",
                type: "get",
                data: {
                    search: search,
                    code: code,
                    name: name,
                    debt: debt,
                    total: total,
                },
                success: function(data) {
                    // console.log(data);
                    var guestIds = [];
                    data.forEach(function(item) {
                        var guestId = item.guest_id;
                        guestIds.push(guestId);
                    });
                    $('.guests-info').each(function() {
                        var value = parseInt($(this).find('.id-guest').val());
                        if (guestIds.includes(value)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
            })
        }

    });
</script>
