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
                <ul class="header-options--nav-2 nav nav-tabs margin-left32 border-bottom-0 w-100 custom-nav"
                    style="margin: 13px 0 0 0 !important;">
                    {{-- <li class="active">
                        <a class="text-secondary px-1 text-15 d-none" data-toggle="tab" href="#dashboard">Tổng quan</a>
                    </li>
                    <li>
                        <a class="text-secondary text-15 px-1 d-none" data-toggle="tab" href="#export">Bán hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15 d-none" data-toggle="tab" href="#import">Mua hàng</a>
                    </li> --}}
                    {{-- <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#kqkinhdoanh">Kết quả kinh
                            doanh</a>
                    </li> --}}
                    <li>
                        <a class="text-secondary px-1 text-15 active" data-toggle="tab" href="#tkbanhang">Tổng kết bán
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#tkgiaohang">Tổng kết giao
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#countInport">Tổng kết mua
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#compareDebt">Công nợ khách hàng
                        </a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#profitExport">Lợi nhuận bán
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#importExport">Thống kê nhập xuất
                            tồn
                            kho</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#debtProvide">Công nợ
                            nhà cung cấp</a>
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
        <div id="dashboard" class="tab-pane fade">
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
        {{-- Tổng kết bán hàng --}}
        <div id="tkbanhang" class="content tab-pane in active">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-detailExport margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-0 m-0 pl-2">
                                <div class="card">
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover bg-white rounded">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width:5%;padding-left: 2rem;"
                                                        class="height-52">
                                                        <input type="checkbox" name="all" id="checkall">
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="quotation_number" data-sort-type="DESC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Số báo giá#
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-quotation_number"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 12%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="reference_number"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Số tham
                                                                    chiếu</button>
                                                            </a>
                                                            <div class="icon" id="icon-reference_number"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="ngayBG" data-sort-type="DESC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Ngày báo giá
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-ngayBG"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Khách
                                                                    hàng</button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                        <th scope="col" class="height-52" style="width: 10%;">
                                                            <span class="d-flex justify-content-start">
                                                                <a href="#" class="sort-link btn-submit"
                                                                    data-sort-by="" data-sort-type="DESC">
                                                                    <button class="btn-sort text-13" type="submit">
                                                                        Người tạo
                                                                    </button>
                                                                </a>
                                                                <div class="icon" id=""></div>
                                                            </span>
                                                        </th>
                                                    @endif
                                                    <th scope="col" class="height-52" style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="status" data-sort-type="DESC"><button
                                                                    class="btn-sort text-13" type="submit">Trạng
                                                                    thái</button>
                                                            </a>
                                                            <div class="icon" id="icon-status"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="status_receive"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Giao hàng</button>
                                                            </a>
                                                            <div class="icon" id="icon-status_receive"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="status_reciept"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Hóa đơn</button>
                                                            </a>
                                                            <div class="icon" id="icon-status_reciept"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="status_pay"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Thanh
                                                                    toán</button>
                                                            </a>
                                                            <div class="icon" id="icon-status_pay"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="total_price"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Tổng tiền</button>
                                                            </a>
                                                            <div class="icon" id="icon-total_price"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-detailExport">
                                                @foreach ($quoteExport as $value_export)
                                                    <tr class="position-relative detailExport-info height-52"
                                                        data-id="{{ $value_export->maBG }}">
                                                        <input type="hidden" name="id-detailExport"
                                                            class="id-detailExport" id="id-detailExport"
                                                            value="{{ $value_export->maBG }}">
                                                        <td class="text-13-black border-top-0 border-bottom">
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
                                                            <input type="checkbox" class="checkall-btn p-0 m-0"
                                                                name="ids[]" id="checkbox" value=""
                                                                onclick="event.stopPropagation();">
                                                        </td>
                                                        <td class="text-13-black text-left border-top-0 border-bottom">
                                                            <div class="">
                                                                <a href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $value_export->maBG]) }}"
                                                                    class="duongDan activity" data-name1="BG"
                                                                    data-des="Xem đơn báo giá">{{ $value_export->quotation_number }}</a>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                                            {{ $value_export->reference_number }}
                                                        </td>
                                                        <td class="text-13-black text-left border-top-0 border-bottom">
                                                            {{ date_format(new DateTime($value_export->ngayBG), 'd/m/Y') }}
                                                        </td>
                                                        <td
                                                            class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                            {{ $value_export->guest_name }}
                                                        </td>
                                                        @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                            <td
                                                                class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                                {{ $value_export->name }}
                                                            </td>
                                                        @endif
                                                        <td
                                                            class="text-13-black text-center border-top-0 border-bottom">
                                                            @if ($value_export->tinhTrang === 1)
                                                                <span class="text-secondary">Draft</span>
                                                            @elseif($value_export->tinhTrang === 2)
                                                                <span class="text-warning">Approved</span>
                                                            @elseif($value_export->tinhTrang === 3)
                                                                <span class="text-success">Close</span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-center border-top-0 border-bottom">
                                                            @if ($value_export->status_receive === 1)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                        fill="#858585" />
                                                                </svg>
                                                            @elseif ($value_export->status_receive === 3)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_1699_20021)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                            fill="#E8B600" />
                                                                        <path
                                                                            d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                            fill="#E8B600" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1699_20021">
                                                                            <rect width="16" height="16"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            @elseif($value_export->status_receive === 2)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75" />
                                                                </svg>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-center border-top-0 border-bottom">
                                                            @if ($value_export->status_reciept === 1)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                        fill="#858585" />
                                                                </svg>
                                                            @elseif ($value_export->status_reciept === 3)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_1699_20021)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                            fill="#E8B600" />
                                                                        <path
                                                                            d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                            fill="#E8B600" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1699_20021">
                                                                            <rect width="16" height="16"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            @elseif($value_export->status_reciept === 2)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75" />
                                                                </svg>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-center border-top-0 border-bottom">
                                                            @if ($value_export->status_pay === 1)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                        fill="#858585" />
                                                                </svg>
                                                            @elseif ($value_export->status_pay === 3)
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_1699_20021)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                            fill="#E8B600" />
                                                                        <path
                                                                            d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                            fill="#E8B600" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1699_20021">
                                                                            <rect width="16" height="16"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            @elseif($value_export->status_pay === 2)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75" />
                                                                </svg>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-right border-top-0 border-bottom">
                                                            {{ number_format($value_export->total_price + $value_export->total_tax) }}
                                                        </td>
                                                        <td
                                                            class="position-absolute m-0 p-0 border-0 bg-hover-icon icon-center">
                                                            <div class="d-flex w-100">
                                                                <a
                                                                    href="{{ route('detailExport.edit', ['workspace' => $workspacename, 'detailExport' => $value_export->maBG]) }}">
                                                                    <div class="m-0 px-2 py-1 mx-2 rounded activity"
                                                                        data-name1="BG" data-des="Xem đơn báo giá">
                                                                        <svg width="16" height="16"
                                                                            viewBox="0 0 16 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.985" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                                fill="#6C6F74" />
                                                                            <path opacity="0.979" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                                fill="#6C6F74" />
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <a href="#">
                                                                    <div class="m-0 mx-2 rounded">
                                                                        <form
                                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                            action="{{ route('detailExport.destroy', ['workspace' => $workspacename, 'detailExport' => $value_export->maBG]) }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path opacity="0.936"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </a>
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
        {{-- Tổng kết giao hàng --}}
        <div id="tkgiaohang" class="tab-pane fade">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-delivery margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr class="border-custom">
                                                    <th scope="col" style="width:5%;padding-left: 2rem;"
                                                        class="height-52">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="code_delivery" data-sort-type="DESC">
                                                                <button class="btn-sort text-13" type="submit">Mã
                                                                    giao
                                                                    hàng#</button>
                                                            </a>
                                                            <div class="icon" id="icon-code_delivery"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="quotation_number" data-sort-type="DESC">
                                                                <button class="btn-sort text-13" type="submit">Số báo
                                                                    giá#</button>
                                                            </a>
                                                            <div class="icon" id="icon-quotation_number"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="ngayGiao" data-sort-type="DESC"><button
                                                                    class="btn-sort text-13" type="submit">Ngày giao
                                                                    hàng</button>
                                                            </a>
                                                            <div class="icon" id="icon-ngayGiao"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="guest_name"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Khách
                                                                    hàng</button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                        <th scope="col" class="height-52" style="width: 10%;">
                                                            <span class="d-flex justify-content-start">
                                                                <a href="#" class="sort-link btn-submit"
                                                                    data-sort-by="" data-sort-type="DESC">
                                                                    <button class="btn-sort text-13" type="submit">
                                                                        Người tạo
                                                                    </button>
                                                                </a>
                                                                <div class="icon" id=""></div>
                                                            </span>
                                                        </th>
                                                    @endif
                                                    <th scope="col" class="height-52" style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="shipping_unit"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Đơn vị vận
                                                                    chuyển</button>
                                                            </a>
                                                            <div class="icon" id="icon-shipping_unit"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 10%;">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="shipping_fee"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Phí giao
                                                                    hàng</button>
                                                            </a>
                                                            <div class="icon" id="icon-shipping_fee"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52" style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="trangThai" data-sort-type="DESC"><button
                                                                    class="btn-sort text-13" type="submit">Trạng
                                                                    thái</button>
                                                            </a>
                                                            <div class="icon" id="icon-trangThai"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="totalProductVat"
                                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                                    type="submit">Tổng tiền</button>
                                                            </a>
                                                            <div class="icon" id="icon-totalProductVat"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-delivery">
                                                @foreach ($deliveries as $item_delivery)
                                                    <tr class="position-relative delivery-info height-52"
                                                        onclick="handleRowClick('checkbox', event);">
                                                        <input type="hidden" name="id-delivery" class="id-delivery"
                                                            id="id-delivery"
                                                            value="{{ $item_delivery->maGiaoHang }}">
                                                        <td class="text-13-black border-bottom border-top-0">
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
                                                            <input type="checkbox" class="cb-element checkall-btn"
                                                                name="ids[]" id="checkbox" value=""
                                                                onclick="event.stopPropagation();">
                                                        </td>
                                                        <td
                                                            class="text-13-black text-left border-bottom border-top-0">
                                                            <a href="{{ route('watchDelivery', ['workspace' => $workspacename, 'id' => $item_delivery->maGiaoHang]) }}"
                                                                class="duongDan activity" data-name1="GH"
                                                                data-des="Xem đơn giao hàng">
                                                                {{ $item_delivery->code_delivery }}
                                                            </a>
                                                        </td>
                                                        <td
                                                            class="text-13-black max-width120 text-left border-bottom border-top-0">
                                                            {{ $item_delivery->quotation_number }}
                                                        </td>
                                                        <td
                                                            class="text-13-black text-left border-bottom border-top-0">
                                                            {{ date_format(new DateTime($item_delivery->ngayGiao), 'd/m/Y') }}
                                                        </td>
                                                        <td
                                                            class="text-13-black max-width120 text-left border-bottom border-top-0">
                                                            {{ $item_delivery->guest_name }}
                                                        </td>
                                                        @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                            <td
                                                                class="text-13-black max-width120 text-left border-bottom border-top-0">
                                                                {{ $item_delivery->name }}
                                                            </td>
                                                        @endif
                                                        <td
                                                            class="text-13-black text-left border-bottom border-top-0">
                                                            {{ $item_delivery->shipping_unit }}
                                                        </td>
                                                        <td
                                                            class="text-13-black text-right border-bottom border-top-0">
                                                            {{ number_format($item_delivery->shipping_fee) }}
                                                        </td>
                                                        <td
                                                            class="text-13-black text-center border-bottom border-top-0">
                                                            @if ($item_delivery->trangThai == 1)
                                                                <span>Chưa giao</span>
                                                            @else
                                                                <span class="text-success">Đã giao</span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="text-13-black text-right border-bottom border-top-0">
                                                            {{ number_format($item_delivery->totalProductVat) }}
                                                        </td>
                                                        <td
                                                            class="position-absolute m-0 p-0 border-0 bg-hover-icon icon-center">
                                                            <div class="d-flex w-100">
                                                                <a href="#">
                                                                    <div class="m-0 mx-2 rounded">
                                                                        <form
                                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                            action="{{ route('delivery.destroy', ['workspace' => $workspacename, 'delivery' => $item_delivery->maGiaoHang]) }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-sm">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path opacity="0.936"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                    <path opacity="0.891"
                                                                                        fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                                        fill="#6C6F74" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </a>
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
        {{-- Kết quả kinh doanh --}}
        {{-- <div id="kqkinhdoanh" class="content tab-pane in active">
            <div class="content margin-top-fixed10">
                <!-- Main content -->
                <section class="content margin-250">
                    <div class="container-fluided">
                        <div class="row result-filter-payExport margin-left30 my-1">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="outer2 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr style="height: 44px;">
                                                    <th scope="col" class="height-52"
                                                        style="width:5%;padding-left: 2rem;">
                                                        <input type="checkbox" class="checkall-btn" name="all"
                                                            id="checkall">
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="code_payment" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Doanh số bán hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-code_payment"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 14%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="quotation_number"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng giá vốn bán hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-quotation_number"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng lợi nhuận bán
                                                                        hàng</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 8%;">
                                                        <span class="d-flex justify-content-center">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="status" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Khách hàng còn nợ</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-status"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 10%;">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="payment_date" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng tiền nhập hàng
                                                                        NCC</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-payment_date"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="my-0 py-2 height-52"
                                                        style="width: 10%;">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-sort-by="tongTienNo" data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Trả tiền mua hàng NCC</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-tongTienNo"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-payExport">
                                                <tr class="position-relative payExport-info height-52"
                                                    onclick="handleRowClick('checkbox', event);">
                                                    <input type="hidden" name="id-payExport" class="id-payExport"
                                                        id="id-payExport" value="{{ $item_pay->id }}">
                                                    <td class="border-bottom border-top-0">
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
                                                        <input type="checkbox" class="cb-element checkall-btn"
                                                            name="ids[]" id="checkbox" value=""
                                                            onclick="event.stopPropagation();">
                                                    </td>
                                                    <td
                                                        class="text-13-black max-width120 text-left border-bottom border-top-0">
                                                        {{ number_format($doanhso) }}
                                                    </td>
                                                    <td
                                                        class="text-13-black max-width120 text-left border-bottom border-top-0">
                                                        {{ number_format($tonggiavon) }}
                                                    </td>
                                                    <td class="text-13-black text-left border-bottom border-top-0">
                                                        {{ number_format($doanhso - $tonggiavon) }}
                                                    </td>
                                                    <td class="text-13-black text-right border-bottom border-top-0">
                                                        {{ number_format($totalSales) }}
                                                    </td>
                                                    <td class="text-13-black text-right border-bottom border-top-0">
                                                        {{ number_format($item_pay->tongThanhToan) }}
                                                    </td>
                                                    <td class="text-13-black text-right border-bottom border-top-0">
                                                        {{ number_format($item_pay->debt) }}
                                                    </td>
                                                </tr>
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
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
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
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
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
                                                                    <span class="text-13">Tổng tiền</span>
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
                                                                    <span class="text-13">Đã thanh toán</span>
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
                                                                    <span class="text-13">Còn lại</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-sumAmountOwed">
                                                            </div>
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
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                        fill="#E8B600"></path>
                                                                    <path
                                                                        d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                        fill="#E8B600"></path>
                                                                </svg>
                                                            @elseif($item->status_pay == 2)
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="14" height="14"
                                                                    viewBox="0 0 14 14" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75"></path>
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="14" height="14"
                                                                    viewBox="0 0 14 14" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                        fill="#858585"></path>
                                                                </svg>
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->total_tax) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->getPayOrder->payment) }}
                                                            @else
                                                                0
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayOrder)
                                                                {{ number_format($item->total_tax - $item->getPayOrder->payment) }}
                                                            @else
                                                                {{ number_format($item->total_tax) }}
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
                                                                        class="text-13">Mã khách hàng
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_code"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên Khách hàng</span>
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
                                                                    <span class="text-13">Thanh toán</span>
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
                                                @foreach ($guest as $item)
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
                                                            {{ $item->guest_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->guest_name_display }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getAllDetailByID)
                                                                @php
                                                                    $total =
                                                                        $item->getAllDetailByID->sum('total_price') +
                                                                        $item->getAllDetailByID->sum('total_tax');
                                                                @endphp
                                                            @endif
                                                            {{ number_format($total) }}

                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @php
                                                                $debt = 0;
                                                            @endphp
                                                            @if ($item->getAllDetailByID)
                                                                @foreach ($item->getAllDetailByID as $value)
                                                                    @if ($value->getPayExport)
                                                                        @php
                                                                            $debt += $value->getPayExport->payment;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            {{ number_format($debt) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($total - $debt) }}
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
                                                                    <span class="text-13">SL bán</span>
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
                                                                    <span class="text-13">Đơn giá vốn</span>
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
                                                            {{ $item->donhang }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            {{ $item->product_name }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->product_unit }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->slban) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->dongia) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->dongia * $item->slban) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->dongiaban) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->tongban) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->tongban - $item->dongia * $item->slban) }}
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
                                                    {{-- <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tồn</span>
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
                                                    </th> --}}
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
                                                                    <span class="text-13">Giá tồn</span>
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
                                                            id="id-guest" value="">
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
                                                            {{-- @if ($item->getProduct)
                                                                {{ $item->getProduct->product_name }}
                                                            @endif --}}
                                                            {{ $item->product_name }}

                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{-- @if ($item->getProduct)
                                                                {{ $item->getProduct->product_unit }}
                                                            @endif --}}
                                                            {{ $item->product_unit }}

                                                        </td>
                                                        {{-- <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getProduct)
                                                                {{ number_format($item->getProduct->product_inventory) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getQuoteImport)
                                                                {{ number_format($item->getQuoteImport->price_export) }}
                                                            @endif
                                                        </td> --}}
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{-- @if ($item->getQuoteImport)
                                                                {{ number_format($item->getQuoteImport->product_qty) }}
                                                            @endif --}}
                                                            {{-- {{ number_format($item->tongslnhap) }} --}}
                                                            {{ number_format($item->total_quantity + $item->product_inventory) }}

                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{-- {{ number_format($item->qty_export) }} --}}
                                                            {{ number_format($item->total_quantity) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{-- @if (isset($item->getProduct) && isset($item->getQuoteImport))
                                                                {{ number_format($item->getProduct->product_inventory + $item->getQuoteImport->product_qty - $item->qty_export) }}
                                                            @endif --}}
                                                            {{ number_format($item->product_inventory) }}

                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{-- @if ($item->getDataReport && $item->product_id == $item->getDataReport->product_id)
                                                                {{ number_format($item->getDataReport->price_export) }}
                                                            @endif --}}
                                                            {{ number_format($item->gianhap * $item->product_inventory) }}
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
                                                                data-button="export" data-sort-by="guest_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Mã nhà cung cấp</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-export-guest_name"></div>
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
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="export" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng tiền</span>
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
                                                                    <span class="text-13">Thanh toán</span>
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
                                                            {{ $item->provide_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->provide_name_display }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-wrap">
                                                            @if ($item->getAllDetailByID)
                                                                @php
                                                                    $total = $item->getAllDetailByID
                                                                        ->whereIn('status', [2, 0])
                                                                        ->sum('total_tax');
                                                                @endphp
                                                                {{ number_format($total) }}
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            @if ($item->getPayment && $item->getPayment->getHistoryPayment)
                                                                @php
                                                                    $debt = $item->getPayment->getHistoryPayment->sum(
                                                                        'payment',
                                                                    );
                                                                @endphp
                                                                <span class="px-1">
                                                                    {{ number_format($debt) }}@else{{ 0 }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->provide_debt) }}
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
