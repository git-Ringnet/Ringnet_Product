<x-navbar :title="$title" activeGroup="statistic" activeName="reportSumSellProfit"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left ">
                <span>Báo cáo</span>
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
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <button class="btn-option">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#42526E" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-filter-search pl-4">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative ml-1">
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
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
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
    </div>
    <div class="content" style="margin-top: 7.5rem;">
        <section class="container-fluided margin-250">
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
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
                                    <div class="outer table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Số chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Mã hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Tên hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    ĐVT
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Số lượng bán
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Đơn giá vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Giá trị vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Giá xuất
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Doanh số
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
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
                                                    <td colspan="10" class="border-bottom">Nhóm hàng hóa : Chưa chọn
                                                        nhóm</td>
                                                </tr>

                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_id == 0)
                                                        <tr class="position-relative">
                                                            <td class="text-13-black height-52">
                                                                {{ $item->code_delivery }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->product_code }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->getProduct ? $item->getProduct->product_name : '' }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->product_unit }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->slxuat) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->price_import) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->slxuat * $item->price_import) }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->price_export) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->product_total_vat) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->product_total_vat - $item->slxuat * $item->price_import) }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalUngrouped++;
                                                            $totalSlXuatUngrouped += $item->slxuat;
                                                            $totalPriceImportUngrouped += $item->price_import;
                                                            $totalPriceExportUngrouped += $item->price_export;
                                                            $totalProductTotalVatUngrouped += $item->product_total_vat;
                                                            $totalProfitUngrouped +=
                                                                $item->product_total_vat -
                                                                $item->slxuat * $item->price_import;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <tr class="bg-light">
                                                    <td colspan="4" class="text-right text-green">Tổng cộng:</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalSlXuatUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalPriceImportUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalSlXuatUngrouped * $totalPriceImportUngrouped) }}
                                                    </td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalPriceExportUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalProductTotalVatUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalProfitUngrouped) }}</td>
                                                </tr>

                                                @php
                                                    $grandTotalSlXuat += $totalSlXuatUngrouped;
                                                    $grandTotalPriceImport += $totalPriceImportUngrouped;
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
                                                        <td colspan="10" class="border-bottom">Nhóm hàng hóa :
                                                            {{ $value->name }}</td>
                                                    </tr>

                                                    @foreach ($allDeliveries as $item)
                                                        @if ($item->group_id == $value->id)
                                                            <tr class="position-relative">
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->code_delivery }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->product_code }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->getProduct ? $item->getProduct->product_name : '' }}
                                                                </td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->product_unit }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->slxuat) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->price_import) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->slxuat * $item->price_import) }}
                                                                </td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->price_export) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->product_total_vat) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->product_total_vat - $item->slxuat * $item->price_import) }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $totalGroupItems++;
                                                                $totalSlXuatGrouped += $item->slxuat;
                                                                $totalPriceImportGrouped += $item->price_import;
                                                                $totalPriceExportGrouped += $item->price_export;
                                                                $totalProductTotalVatGrouped +=
                                                                    $item->product_total_vat;
                                                                $totalProfitGrouped +=
                                                                    $item->product_total_vat -
                                                                    $item->slxuat * $item->price_import;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <tr class="bg-light">
                                                        <td colspan="4" class="text-right text-green">Tổng cộng:
                                                        </td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalSlXuatGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalPriceImportGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalSlXuatGrouped * $totalPriceImportGrouped) }}
                                                        </td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalPriceExportGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalProductTotalVatGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalProfitGrouped) }}</td>
                                                    </tr>

                                                    @php
                                                        $grandTotalSlXuat += $totalSlXuatGrouped;
                                                        $grandTotalPriceImport += $totalPriceImportGrouped;
                                                        $grandTotalPriceExport += $totalPriceExportGrouped;
                                                        $grandTotalProductTotalVat += $totalProductTotalVatGrouped;
                                                        $grandTotalProfit += $totalProfitGrouped;
                                                    @endphp
                                                @endforeach

                                            </tbody>
                                            <tfoot id="total-footer">
                                                <tr class="bg-light total-row">
                                                    <td colspan="4" class="text-right text-red">Tổng của tất
                                                        cả
                                                        các
                                                        nhóm:</td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalSlXuat) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalPriceImport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalSlXuat * $grandTotalPriceImport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalPriceExport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalProductTotalVat) }}</td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalProfit) }}
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                {{-- Gom nhóm theo khác hàng --}}
                                <div id="khachhang" class="tab-pane fade">
                                    <div class="outer table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Số chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Mã hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Tên hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    ĐVT
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Số lượng bán
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Đơn giá vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Giá trị vốn
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Giá xuất
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
                                                                    Doanh số
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13" type="submit">
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
                                                    <td colspan="10" class="border-bottom">Nhóm khách hàng : Chưa
                                                        chọn
                                                        nhóm</td>
                                                </tr>
                                                @foreach ($allDeliveries as $item)
                                                    @if ($item->group_idGuest == 0)
                                                        <tr class="position-relative">
                                                            <td class="text-13-black height-52">
                                                                {{ $item->code_delivery }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->product_code }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->getProduct ? $item->getProduct->product_name : '' }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ $item->product_unit }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->slxuat) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->price_import) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->slxuat * $item->price_import) }}
                                                            </td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->price_export) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->product_total_vat) }}</td>
                                                            <td class="text-13-black height-52">
                                                                {{ number_format($item->product_total_vat - $item->slxuat * $item->price_import) }}
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalUngrouped++;
                                                            $totalSlXuatUngrouped += $item->slxuat;
                                                            $totalPriceImportUngrouped += $item->price_import;
                                                            $totalPriceExportUngrouped += $item->price_export;
                                                            $totalProductTotalVatUngrouped += $item->product_total_vat;
                                                            $totalProfitUngrouped +=
                                                                $item->product_total_vat -
                                                                $item->slxuat * $item->price_import;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <tr class="bg-light">
                                                    <td colspan="4" class="text-right text-green">Tổng cộng:</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalSlXuatUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalPriceImportUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalSlXuatUngrouped * $totalPriceImportUngrouped) }}
                                                    </td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalPriceExportUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalProductTotalVatUngrouped) }}</td>
                                                    <td class="height-52 text-green">
                                                        {{ number_format($totalProfitUngrouped) }}</td>
                                                </tr>

                                                @php
                                                    $grandTotalSlXuat += $totalSlXuatUngrouped;
                                                    $grandTotalPriceImport += $totalPriceImportUngrouped;
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
                                                        <td colspan="10" class="border-bottom">Nhóm khách hàng :
                                                            {{ $value->name }}</td>
                                                    </tr>

                                                    @foreach ($allDeliveries as $item)
                                                        @if ($item->group_idGuest == $value->id)
                                                            <tr class="position-relative">
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->code_delivery }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->product_code }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->getProduct ? $item->getProduct->product_name : '' }}
                                                                </td>
                                                                <td class="text-13-black height-52">
                                                                    {{ $item->product_unit }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->slxuat) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->price_import) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->slxuat * $item->price_import) }}
                                                                </td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->price_export) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->product_total_vat) }}</td>
                                                                <td class="text-13-black height-52">
                                                                    {{ number_format($item->product_total_vat - $item->slxuat * $item->price_import) }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $totalGroupItems++;
                                                                $totalSlXuatGrouped += $item->slxuat;
                                                                $totalPriceImportGrouped += $item->price_import;
                                                                $totalPriceExportGrouped += $item->price_export;
                                                                $totalProductTotalVatGrouped +=
                                                                    $item->product_total_vat;
                                                                $totalProfitGrouped +=
                                                                    $item->product_total_vat -
                                                                    $item->slxuat * $item->price_import;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <tr class="bg-light">
                                                        <td colspan="4" class="text-right text-green">Tổng cộng:
                                                        </td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalSlXuatGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalPriceImportGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalSlXuatGrouped * $totalPriceImportGrouped) }}
                                                        </td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalPriceExportGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalProductTotalVatGrouped) }}</td>
                                                        <td class="height-52 text-green">
                                                            {{ number_format($totalProfitGrouped) }}</td>
                                                    </tr>

                                                    @php
                                                        $grandTotalSlXuat += $totalSlXuatGrouped;
                                                        $grandTotalPriceImport += $totalPriceImportGrouped;
                                                        $grandTotalPriceExport += $totalPriceExportGrouped;
                                                        $grandTotalProductTotalVat += $totalProductTotalVatGrouped;
                                                        $grandTotalProfit += $totalProfitGrouped;
                                                    @endphp
                                                @endforeach

                                            </tbody>
                                            <tfoot id="total-footer">
                                                <tr class="bg-light total-row">
                                                    <td colspan="4" class="text-right text-red">Tổng của tất
                                                        cả
                                                        các
                                                        nhóm:</td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalSlXuat) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalPriceImport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalSlXuat * $grandTotalPriceImport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalPriceExport) }}
                                                    </td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalProductTotalVat) }}</td>
                                                    <td class="height-52 text-red">
                                                        {{ number_format($grandTotalProfit) }}
                                                    </td>
                                                </tr>
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
</div>
