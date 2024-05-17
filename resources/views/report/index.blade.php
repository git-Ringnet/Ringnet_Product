<x-navbar :title="$title" activeName="report"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
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
                    <!-- <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100">
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
                    </button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="content-filter-all bg-white">
        <section class="content-header--options p-0 border-custom">
            <div class="w-100">
                <ul class="header-options--nav nav nav-tabs margin-left32 border-bottom-0 w-100" style="">
                    <li class="active">
                        <a class="text-secondary pl-3 active text-15" data-toggle="tab" href="#dashboard">Tổng quan</a>
                    </li>
                    <li>
                        <a class="text-secondary text-15" data-toggle="tab" href="#export">Bán hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#import">Mua hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#import">Đơn đặt hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#import">Kết quả kinh doanh</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#import">Tổng kết bán hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#import">Tổng kết giao hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#countInport">Tổng kết mua
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#compareDebt">Công nợ khách hàng
                        </a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#profitExport">Lợi nhuận bán
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#importExport">Thống kê nhập xuất
                            tồn
                            kho</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3 text-15" data-toggle="tab" href="#debtProvide">Công nợ
                            nha cung cấp</a>
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
                                                    type="button">Mã nhà cung cấp
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-name"
                                                    id="btn-name-import" data-button="name" data-button="import"
                                                    type="button">Công ty
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
                                        <x-filter-checkbox :dataa='$provides' button="import" name="name-import"
                                            title="Tên nhà cung cấp" button="import" namedisplay="provide_name" />
                                        <x-filter-compare name="total-import" button="import"
                                            title="Tổng thanh toán" />
                                        <x-filter-compare name="debt-import" button="import" title="Công nợ" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="cac">Import</div> --}}
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
                                                    type="button">Công ty
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
                                        <x-filter-checkbox :dataa='$guests' button="export" name="name-export"
                                            title="Tên khách hàng" namedisplay="guest_name" />
                                        <x-filter-compare name="total-export" button="export"
                                            title="Tổng doanh số" />
                                        <x-filter-compare name="debt-export" button="export" title="Công nợ" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="cac">Export</div> --}}
        </div>
    </div>
    <div class="tab-content">
        {{-- Tổng quan --}}
        <div id="dashboard" class="content tab-pane in active">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card" style="scrollbar-width: none;">
                                    <div class="row">
                                        <div class="col-md-6 px-5 pb-5" style="position: relative; height:70vh;">
                                            <h5 class="text-center mt-2">Top 5 khách hàng</h5>
                                            <canvas id="myChart" width="400" height="400"></canvas>
                                        </div>
                                        <div class="col-md-6 px-5 pb-5" style="position: relative; height:70vh;">
                                            <h5 class="text-center mt-2">Công nợ bán hàng</h5>
                                            <canvas id="chartDebt" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 px-5 py-5" style="position: relative; height:70vh;">
                                            <h5 class="text-center mt-2">Tổng số đơn hàng</h5>
                                            <canvas id="chartPay" width="400" height="400"></canvas>
                                        </div>
                                        <div class="col-md-6 px-5 py-5" style="position: relative; height:70vh;">
                                            <h5 class="text-center mt-2">Công nợ mua hàng</h5>
                                            <canvas id="chartDebtImport" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 px-5 py-5" style="position: relative; height:70vh;">
                                            <h5 class="text-center mt-2">Tổng doanh thu theo quý</h5>
                                            <canvas id="chartTotal" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- Mua hàng --}}
        <div id="import" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-import margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr class="border-custom">
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="provide_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã nhà cung cấp
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-import-provide_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="provide_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công ty</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-provide_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng thanh toán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Dư nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-import">
                                                @foreach ($provides as $item)
                                                    <tr class="position-relative provides-info"
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
                                                            @if (isset($item->sumSell))
                                                                {{ number_format($item->sumSell) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumAmountOwed) }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã khách hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Công ty</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng doanh số</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Dư nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
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
                                                            @if (isset($item->sumSell))
                                                                {{ number_format($item->sumSell) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->sumAmountOwed) }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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









        {{-- Tổng kết mua hàng --}}
        <div id="countInport" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">STT
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn mua hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Số tham chiếu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Ngày báo giá</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Nhà cung cấp</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0 text-center">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Trạng thái</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng tiền</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đã thanh toán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Còn lại</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($dataImport as $item)
                                                    @php
                                                        $count++;
                                                    @endphp
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
                                                            {{ $count }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->quotation_number }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->reference_number }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            {{ $item->provide_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-center">
                                                            @if ($item->status_pay == 0)
                                                            @elseif($item->status_pay == 1)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 16 16"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                        fill="#E8B600"></path>
                                                                    <path
                                                                        d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                        fill="#E8B600"></path>
                                                                </svg>
                                                            @elseif($item->status_pay == 2)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75"></path>
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                        fill="#858585"></path>
                                                                </svg>
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->getPayOrder->total) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->getPayOrder->payment) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->getPayOrder->total - $item->getPayOrder->payment) }}
                                                            @endif
                                                        </td>

                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_note }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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


        {{-- <div id="countInport" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">STT
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Ngày
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Số phiếu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Nhà cung cấp</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên hàng hóa</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">ĐVT</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Số lượng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn giá</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Thành tiền</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng cộng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Thanh toán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Còn lại</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Ghi chú</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($countImport as $item)
                                                    @php
                                                        $total =
                                                            $item->product_total +
                                                            ($item->price_export *
                                                                $item->product_qty *
                                                                ($item->product_tax == 99 ? 0 : $item->product_tax)) /
                                                                100;
                                                        $count++;
                                                    @endphp
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
                                                            {{ $count }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getQuoteNumber)
                                                                {{ $item->getQuoteNumber->quotation_number }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getQuoteNumber)
                                                                {{ $item->getQuoteNumber->provide_name }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            {{ $item->product_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_unit }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->product_qty) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->price_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($item->product_total) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ number_format($total) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getPayment)
                                                                {{ number_format($item->getPayment->sum('payment')) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getPayment)
                                                                {{ number_format($total - $item->getPayment->sum('payment')) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_note }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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
        </div> --}}

        {{-- Công nợ khách hàng --}}
        <div id="compareDebt" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Tên khách hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    {{-- <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Nợ đầu kỳ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th> --}}
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Bán hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Thanh toán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
                                                @foreach ($detailE as $item)
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
                                                            {{ $item->guest_name }}
                                                        </td>
                                                        {{-- <td class="py-2 text-13-black pl-0">
                                                            @if (isset($item->getGuest))
                                                                {{number_format($item->getGuest->guest_debt)}}
                                                            @endif
                                                        </td> --}}
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            @if (isset($item->getQuoteExport))
                                                                @foreach ($item->getQuoteExport as $value)
                                                                    {{ $value->product_name }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if (isset($item->getPayExport))
                                                                {{ number_format($item->getPayExport->payment) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if (isset($item->getPayExport) && isset($item->getGuest))
                                                                {{ number_format($item->getPayExport->payment + $item->getGuest->guest_debt) }}
                                                            @endif
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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


        {{-- Lợi nhuận bán hàng --}}
        <div id="profitExport" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">ĐVT</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">SL bán</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đơn giá vốn</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Giá trị vốn</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Giá xuất</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Doanh số</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Chênh lệch</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
                                                @foreach ($quoteexport as $item)
                                                    <tr class="position-relative guests-info"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-guest" class="id-guest"
                                                            id="id-guest" value="{{ $item->guest_id }}">
                                                        <td>
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="6" height="10"
                                                                    viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd"
                                                                            clip-rule="evenodd"
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
                                                            {{ $item->product_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getDetailExport)
                                                                {{ $item->getDetailExport->quotation_number }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            {{ $item->product_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_unit }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->qty_delivery) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getProduct)
                                                                {{ number_format($item->getProduct->product_price_import) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getProduct)
                                                                {{ number_format($item->getProduct->product_price_import * $item->qty_delivery) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->price_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_total) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getProduct)
                                                                {{ number_format($item->product_total - $item->getProduct->product_price_import * $item->qty_delivery) }}
                                                            @endif
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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




        {{-- Thống kê xuất nhập tồn kho --}}
        <div id="importExport" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;"
                                                        class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">ĐVT</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tồn đầu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Giá vốn</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Nhập</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Xuất</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tồn cuối</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Giá vốn</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="importExport" class="tbody-export">
                                                @foreach ($htrImport as $item)
                                                    <tr class="position-relative guests-info"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-guest" class="id-guest"
                                                            id="id-guest" value="{{ $item->guest_id }}">
                                                        <td>
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="6" height="10"
                                                                    viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd"
                                                                            clip-rule="evenodd"
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
                                                            {{ $item->product_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            {{ $item->product_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_unit }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_qty) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->price_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_qty) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->qty_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_qty - $item->qty_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->giaban) }}
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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




        {{-- Thông tin công nợ Nhà cung cấp --}}
        <div id="debtProvide" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-export margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="padding-left: 2rem;"
                                                        class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã nhà cung cấp
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên nhà cung cấp</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    {{-- <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Đầu kỳ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumSell"></div>
                                                        </span>
                                                    </th> --}}
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Mua hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Thu</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="import" class="tbody-export">
                                                @foreach ($provide as $item)
                                                    {{-- @php
                                                        $totalPayment = 0;
                                                    @endphp --}}

                                                    {{-- @if ($item->getPayOrder && $item->getPayOrder->getAllHistoryPayments)
                                                        @foreach ($item->getPayOrder->getAllHistoryPayments as $value)
                                                            @php
                                                                $itemCreatedAt = \Carbon\Carbon::parse(
                                                                    $item->created_at,
                                                                );
                                                                $valueCreatedAt = \Carbon\Carbon::parse(
                                                                    $value->created_at,
                                                                );
                                                            @endphp
                                                            @if ($valueCreatedAt->greaterThan($itemCreatedAt))
                                                                {{ $value->payment }}
                                                                @php
                                                                    $totalPayment += $value->payment;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif --}}
                                                    <tr class="position-relative guests-info"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-guest" class="id-guest"
                                                            id="id-guest" value="{{ $item->guest_id }}">
                                                        <td>
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="6" height="10"
                                                                    viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd"
                                                                            clip-rule="evenodd"
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
                                                            @if ($item->getProvideName)
                                                                {{ $item->getProvideName->provide_code }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getProvideName)
                                                                {{ $item->getProvideName->provide_name_display }}
                                                            @endif
                                                        </td>
                                                        {{-- <td class="py-2 text-13-black pl-0">
                                                            @if ($item->getProvideName)
                                                            {{ number_format($item->getProvideName->provide_debt) }}
                                                            @endif
                                                        </td> --}}
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            @if (isset($item->getProductImport))
                                                                @foreach ($item->getProductImport as $value)
                                                                    {{ $value->product_name }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->getPayOrder->payment) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if (isset($item->getPayOrder) && isset($item->getProvideName))
                                                                {{ number_format($item->getPayOrder->payment + $item->getProvideName->provide_debt) }}
                                                            @endif
                                                        </td>
                                                        <td class="position-absolute m-0 p-0 border-0 bg-hover-icon"
                                                            style="right: 10px; top: 7px;">
                                                            <div class="d-flex w-100">
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
    $('.import').hide();
    //Biểu đồ
    //Top 5 khách hàng
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! $labels !!},
            datasets: [{
                label: 'Top doanh số',
                data: {!! $data !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //Công nợ bán hàng
    var ctx1 = document.getElementById('chartDebt').getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: {!! $labels1 !!},
            datasets: [{
                data: {!! $data1 !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //Tổng số đơn hàng
    var ctx2 = document.getElementById('chartPay').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Đơn đã bán', 'Đơn đã mua'],
            datasets: [{
                label: 'Tổng số đơn hàng',
                data: [{!! $detailExport !!}, {!! $detailImport !!}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //Công nợ mua hàng
    var ctx3 = document.getElementById('chartDebtImport').getContext('2d');
    var myChart3 = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: {!! $labels3 !!},
            datasets: [{
                label: 'Dư nợ thanh toán',
                data: {!! $data3 !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //Doanh thu theo quý
    var ctx4 = document.getElementById('chartTotal').getContext('2d');
    var revenueData = []; // Khởi tạo mảng để lưu trữ doanh thu

    @foreach ($revenueByQuarter as $item)
        revenueData.push({{ $item->total_revenue }});
    @endforeach

    var myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Quý 1', 'Quý 2', 'Quý 3', 'Quý 4'],
            datasets: [{
                label: 'Tổng số đơn hàng',
                data: revenueData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });

    $('.header-options--nav a[data-toggle="tab"]').click(function() {
        var targetId = $(this).attr('href');
        var content = '';

        // Kiểm tra id của tab và gán nội dung tương ứng
        if (targetId === '#import') {
            content = "Mua hàng";
        } else if (targetId === '#export') {
            content = "Bán hàng";
        } else if (targetId === '#dashboard') {
            content = "Tổng quan";
        }

        // Hiển thị nội dung tương ứng
        $('.title-data').html(content);

        // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
        $('.import').toggle(targetId === '#import');
        $('.export').toggle(targetId === '#export');
        $('.dashboard').toggle(targetId === '#dashboard');
    });

    var idGuests = [];
    var idProvides = [];
    var filtersProvides = [];
    var filters = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"


    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
        var buttonname = $(this).data('button') || 'import';
        var code = $('#code-' + buttonname).val();
        var name = $('#name-' + buttonname).val();
        var operator_total = $('.total-' + buttonname + '-operator').val();
        var val_total = $('.total-' + buttonname + '-quantity').val();
        var total = [operator_total, val_total];
        var operator_debt = $('.debt-' + buttonname + '-operator').val();
        var val_debt = $('.debt-' + buttonname + '-quantity').val();
        var debt = [operator_debt, val_debt];
        var search = $('#search-' + buttonname).val();

        // Sort
        var sort_by = '';
        if (typeof $(this).data('sort-by') !== 'undefined') {
            sort_by = $(this).data('sort-by');
        }
        var sort_type = $(this).data('sort-type');
        sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
        $(this).data('sort-type', sort_type);
        $('.icon').text('');
        var iconId = 'icon-' + buttonname + '-' + sort_by;
        var iconDiv = $('#' + iconId);
        iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
        sort = [
            sort_by, sort_type
        ];

        var btn_submit = $(this).data('button-name');
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + btn_submit + '-options').hide();
        }
        $(".btn-filter_search").prop("disabled", false);
        // Xử lí dữ liệu
        if (buttonname == 'import') {
            // console.log('import');
            if ($(this).data('button-name') === 'name-import') {
                $('.ks-cboxtags-name-import input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && idProvides.indexOf(value) === -1) {
                        idProvides.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = idProvides.indexOf(value);
                        if (index !== -1) {
                            idProvides.splice(index, 1);
                        }
                    }
                });
            }
            if ($(this).data('delete') === 'code') {
                code = null;
                $('#code-' + buttonname).val('');
            }
            if ($(this).data('delete') === 'name') {
                idProvides = [];
                // $('.deselect-all-name-import').click();
                $('.ks-cboxtags-name-import input[type="checkbox"]').prop('checked', false);
            }
            if ($(this).data('delete') === 'total') {
                total = null;
                $('.total-' + buttonname + '-quantity').val('');
            }
            if ($(this).data('delete') === 'debt') {
                debt = null;
                $('.debt-' + buttonname + '-quantity').val('');
            }
            $.ajax({
                url: "{{ route('searchReportProvides') }}",
                type: "get",
                data: {
                    search: search,
                    code: code,
                    name: idProvides,
                    debt: debt,
                    total: total,
                    sort: sort,
                },
                success: function(data) {
                    // console.log(data.filtersProvides);
                    // Hiển thị label dữ liệu tìm kiếm ...
                    var existingNames = [];
                    data.filtersProvides.forEach(function(item) {
                        // Kiểm tra xem item.name đã tồn tại trong mảng filtersProvides chưa
                        if (filtersProvides.indexOf(item.name) === -1) {
                            filtersProvides.push(item.name);
                        }
                        existingNames.push(item.name);
                    });

                    filtersProvides = filtersProvides.filter(function(name) {
                        return existingNames.includes(name);
                    });
                    $('.result-filter-import').empty();
                    if (data.filtersProvides.length > 0) {
                        $('.result-filter-import').addClass('has-filters');
                    } else {
                        $('.result-filter-import').removeClass('has-filters');
                    }
                    // Lặp qua mảng filtersProvides để tạo và render các phần tử
                    data.filtersProvides.forEach(function(item) {
                        var index = filtersProvides.indexOf(item.name);
                        // Tạo thẻ item-filter
                        var itemFilter = $('<div>').addClass(
                            'item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2'
                        ).attr({
                            'data-icon': item.icon,
                            'data-button': item.name,
                            'data-report': buttonname
                        });
                        itemFilter.css('order', index);
                        // Thêm nội dung và thuộc tính data vào thẻ item-filter
                        itemFilter.append(
                            '<span class="text text-13-black m-0" style="flex:2;">' +
                            item.value +
                            '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                            item.name + '" data-button="' + buttonname + '"></i>');
                        // Thêm thẻ item-filter vào resultFilterimport
                        $('.result-filter-import').append(itemFilter);
                    });

                    // Ẩn hiện dữ liệu khi đã filtersProvides
                    var provideIds = [];
                    // Lặp qua mảng provides và thu thập các provideIds
                    data.provides.forEach(function(item) {
                        var provideId = item.provide_id;
                        provideIds.push(provideId);
                    });

                    // Ẩn tất cả các phần tử .provides-info
                    // Lặp qua từng phần tử .provides-info để hiển thị và cập nhật data-position
                    $('.provides-info').each(function() {
                        var value = parseInt($(this).find('.id-provide')
                            .val());
                        var index = provideIds.indexOf(value);
                        if (index !== -1) {
                            $(this).show();
                            // Cập nhật data-position
                            $(this).attr('data-position', index + 1);
                        } else {
                            $(this).hide();
                        }
                    });
                    // Tạo một bản sao của mảng phần tử .provides-info
                    var clonedElements = $('.provides-info').clone();
                    // Sắp xếp các phần tử trong bản sao theo data-position
                    var sortedElements = clonedElements.sort(function(a, b) {
                        return $(a).data('position') - $(b).data('position');
                    });
                    // Thay thế các phần tử trong .tbody-provides bằng các phần tử đã sắp xếp
                    $('.tbody-import').empty().append(sortedElements);
                }
            })
        }
        if (buttonname == 'export') {
            // console.log('export');
            if ($(this).data('button-name') === 'name-export') {
                $('.ks-cboxtags-name-export input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && idGuests.indexOf(value) === -1) {
                        idGuests.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = idGuests.indexOf(value);
                        if (index !== -1) {
                            idGuests.splice(index, 1);
                        }
                    }
                });
            }
            if ($(this).data('delete') === 'code') {
                code = null;
                $('#code-' + buttonname).val('');
            }
            if ($(this).data('delete') === 'name') {
                idGuests = [];
                // $('.deselect-all-name-export').click();
                $('.ks-cboxtags-name-export input[type="checkbox"]').prop('checked', false);
            }
            if ($(this).data('delete') === 'total') {
                total = null;
                $('.total-' + buttonname + '-quantity').val('');
            }
            if ($(this).data('delete') === 'debt') {
                debt = null;
                $('.debt-' + buttonname + '-quantity').val('');
            }
            $.ajax({
                url: "{{ route('searchReportGuests') }}",
                type: "get",
                data: {
                    search: search,
                    code: code,
                    name: idGuests,
                    debt: debt,
                    total: total,
                    sort: sort,
                },
                success: function(data) {
                    // Hiển thị label dữ liệu tìm kiếm ...
                    var existingNames = [];
                    data.filters.forEach(function(item) {
                        // Kiểm tra xem item.name đã tồn tại trong mảng filters chưa
                        if (filters.indexOf(item.name) === -1) {
                            filters.push(item.name);
                        }
                        existingNames.push(item.name);
                    });

                    filters = filters.filter(function(name) {
                        return existingNames.includes(name);
                    });
                    $('.result-filter-export').empty();
                    if (data.filters.length > 0) {
                        $('.result-filter-export').addClass('has-filters');
                    } else {
                        $('.result-filter-export').removeClass('has-filters');
                    }
                    // Lặp qua mảng filters để tạo và render các phần tử
                    data.filters.forEach(function(item) {
                        var index = filters.indexOf(item.name);
                        // Tạo thẻ item-filter
                        var itemFilter = $('<div>').addClass(
                            'item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2'
                        ).attr({
                            'data-icon': item.icon,
                            'data-button': item.name,
                            'data-report': buttonname
                        });
                        itemFilter.css('order', index);
                        // Thêm nội dung và thuộc tính data vào thẻ item-filter
                        itemFilter.append(
                            '<span class="text text-13-black m-0" style="flex:2;">' +
                            item.value +
                            '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                            item.name + '" data-button="' + buttonname + '"></i>');
                        // Thêm thẻ item-filter vào resultFilterExport
                        $('.result-filter-export').append(itemFilter);
                    });

                    // Ẩn hiện dữ liệu khi đã filters
                    var guestIds = [];
                    data.guests.forEach(function(item) {
                        var guestId = item.guest_id;
                        guestIds.push(guestId);
                    });
                    $('.guests-info').each(function() {
                        var value = parseInt($(this).find('.id-guest')
                            .val());
                        var index = guestIds.indexOf(value);
                        if (index !== -1) {
                            $(this).show();
                            // Cập nhật data-position
                            $(this).attr('data-position', index + 1);
                        } else {
                            $(this).hide();
                        }
                    });
                    // Tạo một bản sao của mảng phần tử .guests-info
                    var clonedElements = $('.guests-info').clone();
                    // Sắp xếp các phần tử trong bản sao theo data-position
                    var sortedElements = clonedElements.sort(function(a, b) {
                        return $(a).data('position') - $(b).data('position');
                    });
                    // Thay thế các phần tử trong .tbody-guests bằng các phần tử đã sắp xếp
                    $('.tbody-export').empty().append(sortedElements);
                }
            })
        }
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });

    });
</script>
