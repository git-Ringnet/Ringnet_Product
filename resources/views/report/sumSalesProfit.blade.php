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
            <div class="hanghoa">
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        {{-- In and export --}}
                        <button class="mx-1 d-flex align-items-center btn-primary rounded"
                            onclick="printContent('printContent', 'hanghoa','foot')">In
                            trang</button>
                        <form id="exportForm" action="{{ route('exportSellProfit') }}" method="GET"
                            style="display: none;">
                            @csrf
                            <input class="datavalue_hanghoa" type="hidden" name="data[]">
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
            </div>
            <div class="khachhang">
                <div class="d-flex content__heading--right khachhang">
                    <div class="row m-0">
                        {{-- In and export --}}
                        <button class="mx-1 d-flex align-items-center btn-primary rounded"
                            onclick="printContent('printContent', 'khachhang','foot')">In
                            trang</button>
                        <form id="exportFormGuest" action="{{ route('exportSellProfitGuest') }}" method="GET"
                            style="display: none;">
                            @csrf
                            <input class="datavalue_khachhang" type="hidden" name="data[]">
                        </form>

                        <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                            onclick="event.preventDefault(); document.getElementById('exportFormGuest').submit();">
                            <button type="button"
                                class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                <i class="fa-regular fa-file-excel"></i>
                                <span class="m-0 ml-1">Xuất Excel</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hanghoa">
            <div class="content-filter-all">
                <div class="bg-filter-search pl-4 border-bottom-0">
                    <div class="content-wrapper1 py-2">
                        <div class="row m-auto filter p-0">
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
                                            <button class="btn-filter_search" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                </span>
                                            </button>
                                            <div class="dropdown-menu" id="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton">
                                                <div class="search-container px-2">
                                                    <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                        onkeyup="filterFunction()" class="text-13">
                                                    <span class="search-icon mr-2">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <div class="scrollbar">
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-date" data-button="date"
                                                        type="button">Ngày</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-maphieu" data-button="maphieu" type="button">Số
                                                        chứng từ</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-customers" data-button="customers" type="button">Tên
                                                        khách hàng</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-sales" data-button="sales" type="button">Nhân viên
                                                        Sale</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-code" data-button="code" type="button">Mã
                                                        hàng</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-name" data-button="name" type="button">Tên
                                                        hàng</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-dvt" data-button="dvt" type="button">ĐVT</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-slban" data-button="slban" type="button">Số lượng
                                                        bán</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-unit_price_cost" data-button="unit_price_cost"
                                                        type="button">Đơn giá vốn</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-value_cost" data-button="value_cost"
                                                        type="button">Giá trị vốn</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-unit_price_sell" data-button="unit_price_sell"
                                                        type="button">Giá xuất</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-sales_value" data-button="sales_value"
                                                        type="button">Doanh số</button>
                                                    <button class="dropdown-item btndropdown text-13-black"
                                                        id="btn-difference" data-button="difference"
                                                        type="button">Chênh lệch</button>
                                                </div>
                                            </div>
                                            <!-- Input fields for filtering -->
                                            <x-filter-date-time name="date" title="Ngày" />
                                            <x-filter-text name="maphieu" title="Số chứng từ" />
                                            <x-filter-text name="customers" title="Tên khách hàng" />
                                            <x-filter-text name="sales" title="Nhân viên Sale" />
                                            <x-filter-text name="code" title="Mã hàng" />
                                            <x-filter-text name="name" title="Tên hàng" />
                                            <x-filter-text name="dvt" title="ĐVT" />
                                            <x-filter-compare name="slban" title="Số lượng bán" />
                                            <x-filter-compare name="unit_price_cost" title="Đơn giá vốn" />
                                            <x-filter-compare name="value_cost" title="Giá trị vốn" />
                                            <x-filter-compare name="unit_price_sell" title="Giá xuất" />
                                            <x-filter-compare name="sales_value" title="Doanh số" />
                                            <x-filter-compare name="difference" title="Chênh lệch" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="khachhang">
        </div>
    </div>
    <div class="content" style="margin-top: 12.9rem;">
        <section class="container-fluided">
            <div class="row result-filter-product hanghoa margin-left30 my-1">
            </div>
            <div class="row result-filter-guest khachhang margin-left30 my-1" style="display: none">
            </div>
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            {{-- <div class="w-100">
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
                            </div> --}}
                            <div class="tab-content" id="example2">
                                <div id="hanghoa" class="content tab-pane in active">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table class="table table-hover">
                                            <thead class="position-sticky">
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
                                                                    Tên khách hàng
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
                                                                    Nhân viên Sale
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
                                            <tbody class="table-hanghoa">
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
                                                        chọn nhóm
                                                    </td>
                                                </tr>
                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_id == 0)
                                                        <tr class="position-relative relative main-row hanghoa-info"
                                                            data-id="{{ $item->id }}" data-status="hanghoa">
                                                            <input type="hidden" value="{{ $item->id }}"
                                                                class="hanghoa-item">
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->maPhieu }}
                                                            </td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->nameGuest }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->getSale->name ?? '' }}</td>
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
                                                            <tr class="position-relative relative hanghoa-info"
                                                                data-id="{{ $item->id }}" data-status="hanghoa">
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    class="hanghoa-item">
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->maPhieu }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->nameGuest }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->getSale->name ?? '' }}</td>
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
                                        <table class="table table-hover">
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
                                                                    Tên khách hàng
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
                                            <tbody class="table-khachhang">
                                                @php
                                                    // Khởi tạo các biến tổng cộng không nhóm
                                                    $totalUngrouped = 0;
                                                    $totalSlXuatUngrouped = 0;
                                                    $totalPriceImportUngrouped = 0;
                                                    $totalPriceImportSlxuatUngrouped = 0;
                                                    $totalPriceExportUngrouped = 0;
                                                    $totalProductTotalVatUngrouped = 0;
                                                    $totalProfitUngrouped = 0;

                                                    // Khởi tạo các biến tổng cộng lớn
                                                    $grandTotalSlXuat = 0;
                                                    $grandTotalPriceImport = 0;
                                                    $grandTotalPriceImportSlxuat = 0;
                                                    $grandTotalPriceExport = 0;
                                                    $grandTotalProductTotalVat = 0;
                                                    $grandTotalProfit = 0;
                                                @endphp

                                                <tr>
                                                    <td colspan="10" class="border-bottom bold">Nhóm khách hàng:
                                                        Chưa chọn nhóm</td>
                                                </tr>
                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_idGuest == 0)
                                                        <tr class="position-relative relative main-row khachhang-info"
                                                            data-id="{{ $item->guest_id }}" data-status="khachhang">
                                                            <input type="hidden" value="{{ $item->id }}"
                                                                class="khachhang-item">
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->maPhieu }}</td>
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->nameGuest }}</td>
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
                                                            $totalPriceImportSlxuatUngrouped +=
                                                                $item->slxuat * $item->giaNhap;
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
                                                        {{ number_format($totalPriceImportSlxuatUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalPriceExportUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalProductTotalVatUngrouped) }}</td>
                                                    <td class="height-52 text-green border bold">
                                                        {{ number_format($totalProfitUngrouped) }}</td>
                                                </tr>

                                                @php
                                                    // Cộng dồn các giá trị không nhóm vào tổng cộng lớn
                                                    $grandTotalSlXuat += $totalSlXuatUngrouped;
                                                    $grandTotalPriceImport += $totalPriceImportUngrouped;
                                                    $grandTotalPriceImportSlxuat += $totalPriceImportSlxuatUngrouped;
                                                    $grandTotalPriceExport += $totalPriceExportUngrouped;
                                                    $grandTotalProductTotalVat += $totalProductTotalVatUngrouped;
                                                    $grandTotalProfit += $totalProfitUngrouped;
                                                @endphp

                                                @foreach ($groupGuests as $value)
                                                    @php
                                                        $totalSlXuatGrouped = 0;
                                                        $totalPriceImportGrouped = 0;
                                                        $totalPriceImportSlxuatGrouped = 0;
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
                                                            <tr class="position-relative relative main-row khachhang-info"
                                                                data-id="{{ $item->guest_id }}"
                                                                data-status="khachhang">
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    class="khachhang-item">
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->maPhieu }}</td>
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->nameGuest }}</td>
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
                                                                $totalSlXuatGrouped += $item->slxuat;
                                                                $totalPriceImportGrouped += $item->giaNhap;
                                                                $totalPriceImportSlxuatGrouped +=
                                                                    $item->slxuat * $item->giaNhap;
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
                                                            {{ number_format($totalPriceImportSlxuatGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalPriceExportGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalProductTotalVatGrouped) }}</td>
                                                        <td class="height-52 text-green bold border">
                                                            {{ number_format($totalProfitGrouped) }}</td>
                                                    </tr>
                                                    @php
                                                        // Cộng dồn các giá trị của nhóm vào tổng cộng lớn
                                                        $grandTotalSlXuat += $totalSlXuatGrouped;
                                                        $grandTotalPriceImport += $totalPriceImportGrouped;
                                                        $grandTotalPriceImportSlxuat += $totalPriceImportSlxuatGrouped;
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
                            {{ number_format($grandTotalPriceImportSlxuat) }}
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
<x-right-click :workspacename="$workspacename" :page="'viewReportSumSellProfit'"></x-right-click>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $('.khachhang').hide();
    $('.header-options--nav-2 a[data-toggle="tab"]').click(function() {
        var targetId = $(this).attr('href');
        var content = '';
        // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
        $('.hanghoa').toggle(targetId === '#hanghoa');
        $('.khachhang').toggle(targetId === '#khachhang');
    });

    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;

        var formData = {
            search: $('#search').val(), // Nếu có trường tìm kiếm chung
            date: retrieveDateData(this, 'date'), // Lọc theo ngày
            maphieu: getData('#maphieu', this), // Số chứng từ
            customers: getData('#customers', this), // Tên khách hàng
            sales: getData('#sales', this), // Nhân viên Sale
            code: getData('#code', this), // Mã hàng
            name: getData('#name', this), // Tên hàng
            dvt: getData('#dvt', this), // ĐVT (Đơn vị tính)
            slban: retrieveComparisonData(this, 'slban'), // Số lượng bán
            unit_price_cost: retrieveComparisonData(this, 'unit_price_cost'), // Đơn giá vốn
            value_cost: retrieveComparisonData(this, 'value_cost'), // Giá trị vốn
            unit_price_sell: retrieveComparisonData(this, 'unit_price_sell'), // Giá xuất
            sales_value: retrieveComparisonData(this, 'sales_value'), // Doanh số
            difference: retrieveComparisonData(this, 'difference'), // Chênh lệch
            sort: getSortData(buttonElement) // Nếu có sắp xếp dữ liệu
        };
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + $(this).data('button-name') + '-options').hide();
        }
        // Để lọc filter khi xuất Excel
        var date = formData.date;
        var dataArray = [{
            key: 'date',
            value: date
        }];
        // Chuyển đổi mảng thành chuỗi JSON và lưu vào input hidden
        $('.datavalue').val(JSON.stringify(dataArray));
        $.ajax({
            type: 'get',
            url: "{{ route('searchReportSumSellProfit') }}",
            data: formData,
            success: function(data) {
                updateFilters(data, filters, '.result-filter-product', '.-hanghoa',
                    '.hanghoa-info', '.hanghoa-item', buttonElement);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
