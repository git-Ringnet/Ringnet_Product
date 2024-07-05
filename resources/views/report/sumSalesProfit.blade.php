<x-navbar :title="$title" activeGroup="statistic" activeName="reportSumSellProfit"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner mt-4">
            <div class="content__heading--left ">
                <span class="ml-4">Báo cáo</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div>
        <div class="hanghoa">
            <div class="bg-filter-search pl-4">
                <div class="content-wrapper1 py-2">
                    <div class="row m-auto filter p-0">
                        <div class="w-100">
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <form action="" method="get" id="search-filter" class="p-0 m-0">
                                        <div class="position-relative relative ml-1">
                                            <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                style="outline: none;" class="pr-4 w-100 input-search text-13"
                                                value="{{ request()->keywords }}">
                                            <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </form>
                                    <div class="dropdown mx-1">
                                        <button class="filter-btn ml-2 align-items-center d-flex  mb-0"
                                            data-toggle="dropdown">
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
                                            <span class="text-btnIner mx-1">Bộ lọc</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.82078 6.15415C5.02632 5.94862 5.35956 5.94862 5.5651 6.15415L7.99996 8.58901L10.4348 6.15415C10.6404 5.94862 10.9736 5.94862 11.1791 6.15415C11.3847 6.35969 11.3847 6.69294 11.1791 6.89848L8.37212 9.70549C8.16658 9.91103 7.83334 9.91103 7.6278 9.70549L4.82078 6.89848C4.61524 6.69294 4.61524 6.35969 4.82078 6.15415Z"
                                                    fill="#26273B" fill-opacity="0.8" />
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
                                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                        onclick="printContent('printContent', 'hanghoa','foot')">In
                                        trang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="khachhang">
            <div class="bg-filter-search pl-4">
                <div class="content-wrapper1 py-2">
                    <div class="row m-auto filter p-0">
                        <div class="w-100">
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <form action="" method="get" id="search-filter" class="p-0 m-0">
                                        <div class="position-relative relative ml-1">
                                            <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                style="outline: none;" class="pr-4 w-100 input-search text-13"
                                                value="{{ request()->keywords }}">
                                            <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </form>
                                    <div class="dropdown mx-1">
                                        <button class="filter-btn ml-2 align-items-center d-flex  mb-0"
                                            data-toggle="dropdown">
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
                                            <span class="text-btnIner mx-1">Bộ lọc</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.82078 6.15415C5.02632 5.94862 5.35956 5.94862 5.5651 6.15415L7.99996 8.58901L10.4348 6.15415C10.6404 5.94862 10.9736 5.94862 11.1791 6.15415C11.3847 6.35969 11.3847 6.69294 11.1791 6.89848L8.37212 9.70549C8.16658 9.91103 7.83334 9.91103 7.6278 9.70549L4.82078 6.89848C4.61524 6.69294 4.61524 6.35969 4.82078 6.15415Z"
                                                    fill="#26273B" fill-opacity="0.8" />
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
                                    </div>
                                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                        onclick="printContent('printContent', 'khachhang','foot')">In
                                        trang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 13.8rem;">
        <section class="container-fluided">
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="w-100">
                                <ul class="header-options--nav-2 nav nav-tabs margin-left32 border-bottom-0 w-100 custom-nav"
                                    style="margin: 13px 0 13px 0 !important;">
                                    <li>
                                        <a class="text-secondary px-1 text-15 active" data-toggle="tab"
                                            href="#hanghoa">Nhóm hàng hoá</a>
                                    </li>
                                    <li>
                                        <a class="text-secondary px-1 text-15" data-toggle="tab"
                                            href="#khachhang">Nhóm
                                            khách
                                            hàng</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div id="hanghoa" class="content tab-pane in active">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Mã hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Tên hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    ĐVT
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số lượng bán
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Đơn giá vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Giá trị vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Giá xuất
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Doanh số
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Chênh lệch
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalUngrouped = 0;
                                                    $totalGrouped = 0;

                                                    $totalSlXuatUngrouped = 0;
                                                    $totalPriceImportUngrouped = 0;
                                                    $totalPriceImport = 0;
                                                    $totalPriceExportUngrouped = 0;
                                                    $totalProductTotalVatUngrouped = 0;
                                                    $totalProfitUngrouped = 0;

                                                    $grandTotalSlXuat = 0;
                                                    $grandTotalPriceImport = 0;
                                                    $grandTotalPriceExport = 0;
                                                    $grandTotalProductTotalVat = 0;
                                                    $grandTotalProfit = 0;
                                                @endphp

                                                <tr>
                                                    <td colspan="10" class="border-bottom bold">Nhóm hàng hóa : Chưa
                                                        chọn
                                                        nhóm</td>
                                                </tr>

                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_id == 0)
                                                        <tr class="position-relative relative">
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->maPhieu }}
                                                            </td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_code }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_name }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_unit }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->slxuat) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->giaNhap) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->slxuat * $item->giaNhap) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->price_export) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->product_total_vat) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->product_total_vat - $item->slxuat * $item->giaNhap) }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalUngrouped++;
                                                            $totalSlXuatUngrouped += $item->slxuat;
                                                            $totalPriceImportUngrouped += $item->giaNhap;
                                                            $totalPriceImport += $item->slxuat * $item->giaNhap;
                                                            $totalPriceExportUngrouped += $item->price_export;
                                                            $totalProductTotalVatUngrouped += $item->product_total_vat;
                                                            $totalProfitUngrouped +=
                                                                $item->product_total_vat -
                                                                $item->slxuat * $item->giaNhap;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <tr class="bg-light">
                                                    <td colspan="4" class="text-right bold border text-green">Tổng
                                                        cộng:</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalSlXuatUngrouped) }}</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalPriceImportUngrouped) }}</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalPriceImport) }}</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalPriceExportUngrouped) }}</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalProductTotalVatUngrouped) }}</td>
                                                    <td class="height-52 bold border text-green">
                                                        {{ number_format($totalProfitUngrouped) }}</td>
                                                </tr>

                                                @php
                                                    $grandTotalSlXuat += $totalSlXuatUngrouped;
                                                    $grandTotalPriceImport += $totalPriceImport;
                                                    $grandTotalPriceExport += $totalPriceExportUngrouped;
                                                    $grandTotalProductTotalVat += $totalProductTotalVatUngrouped;
                                                    $grandTotalProfit += $totalProfitUngrouped;
                                                @endphp

                                                @foreach ($groups as $value)
                                                    @php
                                                        $totalGroupItems = 0;

                                                        $totalSlXuatGrouped = 0;
                                                        $totalPriceImportGrouped = 0;
                                                        $totalPriceExportGrouped = 0;
                                                        $totalProductTotalVatGrouped = 0;
                                                        $totalProfitGrouped = 0;
                                                    @endphp

                                                    <tr>
                                                        <td colspan="10" class="border-bottom bold">Nhóm hàng hóa :
                                                            {{ $value->name }}</td>
                                                    </tr>

                                                    @foreach ($allDeliveries as $item)
                                                        @if ($item->group_id == $value->id)
                                                            <tr class="position-relative relative">
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->maPhieu }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_code }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_name }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_unit }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->slxuat) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->giaNhap) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->slxuat * $item->giaNhap) }}
                                                                </td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->price_export) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->product_total_vat) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->product_total_vat - $item->slxuat * $item->giaNhap) }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $totalGroupItems++;
                                                                $totalSlXuatGrouped += $item->slxuat;
                                                                $totalPriceImportGrouped += $item->giaNhap;
                                                                $totalPriceExportGrouped += $item->price_export;
                                                                $totalProductTotalVatGrouped +=
                                                                    $item->product_total_vat;
                                                                $totalProfitGrouped +=
                                                                    $item->product_total_vat -
                                                                    $item->slxuat * $item->giaNhap;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <tr class="bg-light">
                                                        <td colspan="4" class="text-right text-green border bold">
                                                            Tổng cộng:
                                                        </td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalSlXuatGrouped) }}</td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalPriceImportGrouped) }}</td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalSlXuatGrouped * $totalPriceImportGrouped) }}
                                                        </td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalPriceExportGrouped) }}</td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalProductTotalVatGrouped) }}</td>
                                                        <td class="height-52 text-green border bold">
                                                            {{ number_format($totalProfitGrouped) }}</td>
                                                    </tr>

                                                    @php
                                                        $grandTotalSlXuat += $totalSlXuatGrouped;
                                                        $grandTotalPriceImport +=
                                                            $totalSlXuatGrouped * $totalPriceImportGrouped;
                                                        $grandTotalPriceExport += $totalPriceExportGrouped;
                                                        $grandTotalProductTotalVat += $totalProductTotalVatGrouped;
                                                        $grandTotalProfit += $totalProfitGrouped;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot id="total-footer">
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>
                                {{-- Gom nhóm theo khác hàng --}}
                                <div id="khachhang" class="tab-pane fade">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Mã hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Tên hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    ĐVT
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số lượng bán
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Đơn giá vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Giá trị vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Giá xuất
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Doanh số
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border" style="width: 10%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Chênh lệch
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalUngrouped = 0;
                                                    $totalGrouped = 0;

                                                    $totalSlXuatUngrouped = 0;
                                                    $totalPriceImportUngrouped = 0;
                                                    $totalPriceImport = 0;
                                                    $totalPriceExportUngrouped = 0;
                                                    $totalProductTotalVatUngrouped = 0;
                                                    $totalProfitUngrouped = 0;

                                                    $grandTotalSlXuat = 0;
                                                    $grandTotalPriceImport = 0;
                                                    $grandTotalPriceExport = 0;
                                                    $grandTotalProductTotalVat = 0;
                                                    $grandTotalProfit = 0;
                                                @endphp

                                                <tr>
                                                    <td colspan="10" class="border-bottom bold">Nhóm khách hàng:
                                                        Chưa
                                                        chọn nhóm</td>
                                                </tr>
                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_idGuest == 0)
                                                        <tr class="position-relative relative">
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->maPhieu }}
                                                            </td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_code }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_name }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->product_unit }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->slxuat) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->giaNhap) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->slxuat * $item->giaNhap) }}
                                                            </td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->price_export) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->product_total_vat) }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ number_format($item->product_total_vat - $item->slxuat * $item->giaNhap) }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalUngrouped++;
                                                            $totalSlXuatUngrouped += $item->slxuat;
                                                            $totalPriceImportUngrouped += $item->giaNhap;
                                                            $totalPriceImport += $item->slxuat * $item->giaNhap;
                                                            $totalPriceExportUngrouped += $item->price_export;
                                                            $totalProductTotalVatUngrouped += $item->product_total_vat;
                                                            $totalProfitUngrouped +=
                                                                $item->product_total_vat -
                                                                $item->slxuat * $item->giaNhap;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <tr class="bg-light">
                                                    <td colspan="4" class="text-right text-green border bold">Tổng
                                                        cộng:</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalSlXuatUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalPriceImportUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalPriceImport) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalPriceExportUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalProductTotalVatUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalProfitUngrouped) }}</td>
                                                </tr>

                                                @php
                                                    $grandTotalSlXuat += $totalSlXuatUngrouped;
                                                    $grandTotalPriceImport += $totalPriceImport;
                                                    $grandTotalPriceExport += $totalPriceExportUngrouped;
                                                    $grandTotalProductTotalVat += $totalProductTotalVatUngrouped;
                                                    $grandTotalProfit += $totalProfitUngrouped;
                                                @endphp

                                                @foreach ($groupGuests as $value)
                                                    @php
                                                        $totalGroupItems = 0;

                                                        $totalSlXuatGrouped = 0;
                                                        $totalPriceImportGrouped = 0;
                                                        $totalPriceExportGrouped = 0;
                                                        $totalProductTotalVatGrouped = 0;
                                                        $totalProfitGrouped = 0;
                                                    @endphp

                                                    <tr>
                                                        <td colspan="10" class="border-bottom bold">Nhóm khách hàng:
                                                            {{ $value->name }}</td>
                                                    </tr>

                                                    @foreach ($allDeliveries as $item)
                                                        @if ($item->group_idGuest == $value->id)
                                                            <tr class="position-relative relative">
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->maPhieu }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_code }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_name }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->product_unit }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->slxuat) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->giaNhap) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->slxuat * $item->giaNhap) }}
                                                                </td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->price_export) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->product_total_vat) }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ number_format($item->product_total_vat - $item->slxuat * $item->giaNhap) }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $totalGroupItems++;
                                                                $totalSlXuatGrouped += $item->slxuat;
                                                                $totalPriceImportGrouped += $item->giaNhap;
                                                                $totalPriceExportGrouped += $item->price_export;
                                                                $totalProductTotalVatGrouped +=
                                                                    $item->product_total_vat;
                                                                $totalProfitGrouped +=
                                                                    $item->product_total_vat -
                                                                    $item->slxuat * $item->giaNhap;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <tr class="bg-light">
                                                        <td colspan="4" class="text-right text-green bold border">
                                                            Tổng cộng:</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalSlXuatGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalPriceImportGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalSlXuatGrouped * $totalPriceImportGrouped) }}
                                                        </td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalPriceExportGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalProductTotalVatGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalProfitGrouped) }}</td>
                                                    </tr>
                                                    @php
                                                        // Cộng dồn các giá trị của nhóm vào tổng cộng
                                                        $grandTotalSlXuat += $totalSlXuatGrouped;
                                                        $grandTotalPriceImport += $totalPriceImportGrouped;
                                                        $grandTotalPriceExport += $totalPriceExportGrouped;
                                                        $grandTotalProductTotalVat += $totalProductTotalVatGrouped;
                                                        $grandTotalProfit += $totalProfitGrouped;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot id="total-footer">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="w-100 bg-filter-search position-fixed" style="height: 30px;bottom: 10px;left: 0;" id="foot">
        <div class="position-relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>
                    <tr>
                        <th class="text-center text-danger font-weight-bold border height-52" style="width: 40%; ">
                            Tổng cộng tất cả
                        </th>
                        <th class="text-center text-red border" style="width: 10%;">
                            {{ number_format($grandTotalSlXuat) }}
                        </th>
                        <th class="text-center text-red border" style="width: 10%;">
                            {{ number_format($grandTotalPriceImport) }}
                        </th>
                        <th class="text-center text-red border" style="width: 10%;">
                            {{ number_format($grandTotalPriceImport) }}
                        </th>
                        <th class="text-center text-red border" style="width: 10%;">
                            {{ number_format($grandTotalPriceExport) }}
                        </th>
                        <th class="text-center text-red border" style="width: 10%; ">
                            {{ number_format($grandTotalProductTotalVat) }}
                        </th>
                        <th class="text-center text-red border" style="width: 10%; ">
                            {{ number_format($grandTotalProfit) }}
                        </th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>
<x-print-component :contentId="$title" />
<script>
    $('.khachhang').hide();
    $('.header-options--nav-2 a[data-toggle="tab"]').click(function() {
        var targetId = $(this).attr('href');
        var content = '';
        // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
        $('.hanghoa').toggle(targetId === '#hanghoa');
        $('.khachhang').toggle(targetId === '#khachhang');
    });
</script>
