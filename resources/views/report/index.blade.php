<x-navbar :title="$title" activeName="report"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Báo cáo</span>
            </div>
            <div class="d-flex content__heading--right">
            </div>
        </div>
    </div>
    <div class="content-filter-all bg-white">
        <section class="content-header--options p-0 border-custom">
            <div class="h-100" style="width: 38%;">
                <ul class="header-options--nav-1 nav nav-tabs margin-left32 border-bottom-0 w-100 custom-nav"
                    style="margin: 13px 0 0 0 !important;height: 40px !important;">
                    <li>
                        <a class="text-secondary px-1 text-15 active" data-toggle="tab" href="#ttTonKho">Tổng tiền tồn
                            kho</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#lnBanHang">Lợi nhuận bán
                            hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary px-1 text-15" data-toggle="tab" href="#dnKH">Dư nợ khách
                            hàng</a>
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
                                                    class="text-13" onkeyup="filterFunction()" style="outline: none;">
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
        {{-- Tổng tiền tồn kho --}}
        <div id="ttTonKho" class="content tab-pane in active">
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
                                    <div class="outer4 text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr class="border-custom">
                                                    <th scope="col" style="padding-left: 2rem;" class="bg-white">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0" style="width: 25%;">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="provide_code"
                                                                data-sort-type="#">
                                                                <button class="btn-sort" type="submit"><span
                                                                        class="text-13">Mã hàng hóa
                                                                    </span></button>
                                                            </a>
                                                            <div class="icon" id="icon-import-provide_code">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0" style="width: 25%;">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="provide_name"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tên hàng hóa</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-provide_name">
                                                            </div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0" style="width: 15%;">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="sumSell"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Số lượng tồn</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-sumSell"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="bg-white pl-0">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link btn-submit"
                                                                data-button="import" data-sort-by="sumAmountOwed"
                                                                data-sort-type="DESC">
                                                                <button class="btn-sort" type="submit">
                                                                    <span class="text-13">Tổng tiền</span>
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-import-sumAmountOwed">
                                                            </div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-import">
                                                @foreach ($productInventory as $item_inventory)
                                                    <tr class="position-relative detailExport-info height-52">
                                                        <td class="text-13-black border-top-0 border-bottom">
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                            fill="#282A30"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1710_10941">
                                                                            <rect width="6" height="10"
                                                                                fill="white"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <input type="checkbox" class="checkall-btn p-0 m-0"
                                                                name="ids[]" id="checkbox" value="">
                                                        </td>
                                                        <td class="text-13-black text-left border-top-0 border-bottom">
                                                            <div class="">
                                                                {{ $item_inventory->product_code }}
                                                            </div>
                                                        </td>
                                                        <td class="text-13-black text-left border-top-0 border-bottom">
                                                            <div class="">
                                                                {{ $item_inventory->product_name }}
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="text-13-black text-right border-top-0 border-bottom">
                                                            <div class="">
                                                                {{ number_format($item_inventory->product_inventory) }}
                                                            </div>
                                                        </td>
                                                        <td class="text-13-black text-left border-top-0 border-bottom">
                                                            <div class="text-right">
                                                                {{ number_format($item_inventory->total_inventory_value) }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="w-100 bg-filter-search" style="height: 30px;bottom: 0;">
                                    <div class="position-relative">
                                        <div class="position-absolute px-4 pt-1 border bg-white" style="right: 0;">
                                            <span class="text-danger font-weight-bold">
                                                @php
                                                    $sumInventory = 0;
                                                    foreach ($productInventory as $item_inventory) {
                                                        $sumInventory += $item_inventory->total_inventory_value;
                                                    }
                                                @endphp
                                                {{number_format($sumInventory)}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- Lợi nhuận bán hàng --}}
        <div id="lnBanHang" class="tab-pane fade">
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
                                                    {{-- <th scope="col" class="bg-white pl-0">
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
                                                    </th> --}}
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
                                                    {{-- <th scope="col" class="bg-white pl-0">
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
                                                    </th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-import">
                                                @foreach ($detailExport as $item)
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
                                                            {{ $item->product_code }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0">
                                                            {{ $item->quotation_number }}
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
                                                        {{-- <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_price_import) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->product_price_import * $item->product_qty) }}
                                                        </td> --}}
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->price_export) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->price_export * $item->product_qty) }}
                                                        </td>
                                                        {{-- <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->price_export - $item->product_price_import) }}
                                                        </td> --}}
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
        {{-- Dư nợ khách hàng --}}
        <div id="dnKH" class="tab-pane fade">
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
                                            <tbody class="tbody-export">
                                                @foreach ($guest as $item)
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
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->sumSell) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
                                                            {{ number_format($item->totalPayment) }}
                                                        </td>
                                                        <td class="py-2 text-13-black pl-0 text-right">
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
    </div>
</div>
</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
