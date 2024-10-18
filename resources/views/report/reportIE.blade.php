<x-navbar :title="$title" activeGroup="statistic" activeName="viewReportIE"></x-navbar>
<div class="content-wrapper m-0 min-height--none p-0">
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
            <div class="chi">
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        {{-- In and export --}}
                        <button class="mx-1 d-flex align-items-center btn-primary rounded"
                            onclick="printContent('printContent', 'chi','foot')">In
                            trang</button>
                        <form id="exportFormChi" action="{{ route('exportReportIEChi') }}" method="GET"
                            style="display: none;">
                            @csrf
                            <input class="datavalue_chi" type="hidden" name="data[]">
                        </form>

                        <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                            onclick="event.preventDefault(); document.getElementById('exportFormChi').submit();">
                            <button type="button"
                                class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                <i class="fa-regular fa-file-excel"></i>
                                <span class="m-0 ml-1">Xuất Excel</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="thu">
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        {{-- In and export --}}
                        <button class="mx-1 d-flex align-items-center btn-primary rounded"
                            onclick="printContent('printContent', 'thu','foot')">In
                            trang</button>
                        <form id="exportForm" action="{{ route('exportReportIE') }}" method="GET"
                            style="display: none;">
                            @csrf
                            <input class="datavalue_thu" type="hidden" name="data[]">
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
        </div>
        <div class="thu">
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
                                        <button class="filter-btn ml-2 align-items-center d-flex border mb-0"
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
                                                <button class="dropdown-item btndropdown text-13-black"
                                                    data-button="thu" id="btn-date-thu" type="button">Ngày báo
                                                    giá
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-code"
                                                    id="btn-code-import" data-button="code" data-button="thu"
                                                    type="button">Mã nhà cung cấp
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-name"
                                                    id="btn-name-import" data-button="name" data-button="thu"
                                                    type="button">Công ty
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-total"
                                                    id="btn-total-import" data-button="thu" data-button="total"
                                                    type="button">
                                                    Tổng thanh toán
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-debt"
                                                    id="btn-debt-import" data-button="thu" data-button="debt"
                                                    type="button">
                                                    Công nợ
                                                </button>
                                            </div>
                                        </div>
                                        <x-filter-date-time name="date-thu" button="thu" title="Ngày báo giá" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chi">
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
                                        <button class="filter-btn ml-2 align-items-center d-flex border mb-0"
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
                                                <button class="dropdown-item btndropdown text-13-black"
                                                    id="btn-date-chi" data-button="chi" type="button">Ngày báo
                                                    giá
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-code"
                                                    id="btn-code-chi" data-button="code" data-button="chi"
                                                    type="button">Mã nhà cung cấp
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-name"
                                                    id="btn-name-chi" data-button="name" data-button="chi"
                                                    type="button">Công ty
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-total"
                                                    id="btn-total-chi" data-button="chi" data-button="total"
                                                    type="button">
                                                    Tổng thanh toán
                                                </button>
                                                <button class="dropdown-item btndropdown text-13-black btn-debt"
                                                    id="btn-debt-chi" data-button="chi" data-button="debt"
                                                    type="button">
                                                    Công nợ
                                                </button>
                                            </div>
                                        </div>
                                        <x-filter-date-time name="date-chi" button="chi" title="Ngày báo giá" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 12.9rem;">
        <section class="container-fluided">
            <div class="row result-filter-thu thu margin-left30 my-1">
            </div>
            <div class="row result-filter-chi chi margin-left30 my-1" style="display: none">
            </div>
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="w-100">
                                <ul class="header-options--nav-2 nav nav-tabs margin-left32 border-bottom-0 w-100 custom-nav"
                                    style="margin: 13px 0 13px 0 !important;">
                                    <li>
                                        <a class="text-secondary px-4 text-15 active" data-toggle="tab"
                                            href="#thu">Thu</a>
                                    </li>
                                    <li>
                                        <a class="text-secondary px-4 text-15" data-toggle="tab"
                                            href="#chi">Chi</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="example2">
                                <div id="thu" class="content tab-pane in active">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead style="position: sticky">
                                                <tr>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Ngày
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Tên
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Nội dung thu chi
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số tiền
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Quỹ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Ghi chú
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-thu">
                                                <tr>
                                                    <td colspan="7" class="border bold">Loại: Thu</td>
                                                </tr>
                                                @php
                                                    $previousContentPay = null;
                                                    $totalThu = 0;
                                                @endphp
                                                @foreach ($contentExport as $item)
                                                    @if ($previousContentPay !== $item->content_id)
                                                        <tr>
                                                            <td colspan="7">
                                                                <span
                                                                    style="color: #007bff; text-decoration: none; background-color: transparent;">
                                                                    @if ($item->getContentPay)
                                                                        Nội dung: {{ $item->getContentPay->name }}
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            // Không cần reset $totalThu ở đây nếu muốn tính tổng từng loại thu
                                                            // $totalThu = 0;
                                                        @endphp
                                                    @endif
                                                    <tr class="main-row thu-info"
                                                        data-id="{{ $item->content_id }}">
                                                        <input type="hidden" value="{{ $item->id }}"
                                                            class="thu-item">
                                                        <td class="border">
                                                            {{ date_format(new DateTime($item->date_created), 'd/m/Y') }}
                                                        </td>
                                                        <td class="border">{{ $item->receipt_code }}</td>
                                                        <td class="border">
                                                            {{ $item->getGuest ? $item->getGuest->guest_name_display : '' }}
                                                        </td>
                                                        <td class="border">
                                                            {{ $item->getContentPay ? $item->getContentPay->name : '' }}
                                                        </td>
                                                        <td class="border">{{ number_format($item->amount) }}</td>
                                                        <td class="border">
                                                            {{ $item->getFund ? $item->getFund->name : '' }}</td>
                                                        <td class="border">{{ $item->note }}</td>
                                                    </tr>
                                                    @php
                                                        $previousContentPay = $item->content_id;
                                                        $totalThu += $item->amount; // Tính tổng thu từng item
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="border bold text-right"><strong>Tổng
                                                            thu</strong></td>
                                                    <td colspan="3" class="border bold">
                                                        <strong>{{ number_format($totalThu) }}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="chi" class="tab-pane fade">
                                    <div class="outer-4 top-table table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead style="position: sticky">
                                                <tr>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Ngày
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Chứng từ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Tên
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 15%   ">
                                                        <span class="d-flex justify-content-end">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Nội dung thu chi
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Số tiền
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Quỹ
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52 border"
                                                        style="width: 13.33333333333333%   ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Ghi chú
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-chi">
                                                <tr>
                                                    <td colspan="7" class="border bold">Loại: Chi</td>
                                                </tr>
                                                @php
                                                    $previousContentPay = null;
                                                    $totalChi = 0;
                                                @endphp
                                                @foreach ($contentImport as $item)
                                                    @if ($previousContentPay !== $item->content_pay)
                                                        <tr>
                                                            <td colspan="7">
                                                                <span
                                                                    style="color: #007bff; text-decoration: none; background-color: transparent;">
                                                                    @if ($item->getContentPay)
                                                                        Nội dung: {{ $item->getContentPay->name }}
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            // Không cần reset $totalChi ở đây nếu muốn tính tổng từng loại chi
                                                            // $totalChi = 0;
                                                        @endphp
                                                    @endif
                                                    <tr class="main-row chi-info"
                                                        data-id="{{ $item->content_pay }}">
                                                        <input type="hidden" value="{{ $item->id }}"
                                                            class="chi-item">
                                                        <td class="border">
                                                            {{ date_format(new DateTime($item->payment_date), 'd/m/Y') }}
                                                        </td>
                                                        <td class="border">{{ $item->payment_code }}</td>
                                                        <td class="border">
                                                            {{ $item->getGuest ? $item->getGuest->guest_name_display : '' }}
                                                        </td>
                                                        <td class="border">
                                                            {{ $item->getContentPay ? $item->getContentPay->name : '' }}
                                                        </td>
                                                        <td class="border">{{ number_format($item->total) }}</td>
                                                        <td class="border">
                                                            {{ $item->getFund ? $item->getFund->name : '' }}
                                                        </td>
                                                        <td class="border">{{ $item->note }}</td>
                                                    </tr>
                                                    @php
                                                        $previousContentPay = $item->content_pay;
                                                        $totalChi += $item->total; // Tính tổng chi từng item
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="border bold text-right"><strong>Tổng
                                                            chi</strong></td>
                                                    <td colspan="3" class="border bold">
                                                        <strong>{{ number_format($totalChi) }}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
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
        <div class="position-relative relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>
                    <tr>
                        <th class="text-center text-danger font-weight-bold border height-52" style="width: 60%;">
                            Tổng cộng
                        </th>
                        <th class="text-center text-red border" style="width: 13.33333333333333%;">
                            {{ number_format($totalThu - $totalChi) }}
                        </th>
                        <th class="text-center text-red border" style="width: 13.33333333333333%;">

                        </th>
                        <th class="text-center text-red border" style="width: 13.33333333333333%;">

                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<x-right-click :workspacename="$workspacename" :page="'viewReportIE'"></x-right-click>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $('.chi').hide();
    $('.header-options--nav-2 a[data-toggle="tab"]').click(function() {
        var targetId = $(this).attr('href');
        var content = '';
        // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
        $('.thu').toggle(targetId === '#thu');
        $('.chi').toggle(targetId === '#chi');
    });

    var filters = [];
    var idName = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
        var buttonName = $(this).data('button');
        var btn_submit = $(this).data('button-name');
        var search = $('#search').val();
        var date_start_thu = $('#date_start_date-thu').val();
        var date_end_thu = $('#date_end_date-thu').val();
        var date_thu = [date_start_thu, date_end_thu];
        var dataArrayThu = [{
            key: 'date',
            value: date_thu
        }, ];

        // Chuyển đổi mảng thành chuỗi JSON và lưu vào input hidden
        $('.datavalue_thu').val(JSON.stringify(dataArrayThu));

        var date_start_chi = $('#date_start_date-chi').val();
        var date_end_chi = $('#date_end_date-chi').val();
        var date_chi = [date_start_chi, date_end_chi];
        var dataArrayChi = [{
            key: 'date',
            value: date_chi
        }, ];

        // Chuyển đổi mảng thành chuỗi JSON và lưu vào input hidden
        $('.datavalue_chi').val(JSON.stringify(dataArrayChi));
        var sort_by = '';
        if (typeof $(this).data('sort-by') !== 'undefined') {
            sort_by = $(this).data('sort-by');
        }
        var sort_type = $(this).data('sort-type');
        sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
        $(this).data('sort-type', sort_type);
        $('.icon').text('');
        var iconId = 'icon-' + sort_by;
        var iconDiv = $('#' + iconId);
        iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
        sort = [
            sort_by, sort_type
        ];
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + btn_submit + '-options').hide();
        }
        if ($(this).data('delete') === 'date_thu') {
            date_thu = null;
            $('#date_start_date-thu').val('');
            $('#date_end_date-thu').val('');
            $('.datavalue_thu').val('');

        }
        if ($(this).data('delete') === 'date_chi') {
            date_chi = null;
            $('#date_start_date-chi').val('');
            $('#date_end_date-chi').val('');
            $('.datavalue_chi').val('');

        }

        if (buttonName == 'thu') {
            $.ajax({
                type: 'get',
                url: "{{ route('searchRPContentE') }}",
                data: {
                    search: search,
                    date_thu: date_thu,
                    sort: sort,
                },
                success: function(data) {

                    updateFilters(data, filters, '.result-filter-thu', '.-thu',
                        '.thu-info', '.thu-item', buttonName);
                }
            });
        }
        if (buttonName == 'chi') {
            $.ajax({
                type: 'get',
                url: "{{ route('searchRPContentI') }}",
                data: {
                    search: search,
                    date_chi: date_chi,
                    sort: sort,
                },
                success: function(data) {

                    updateFilters(data, filters, '.result-filter-chi', '.-chi',
                        '.chi-info', '.chi-item', buttonName);
                }
            });
        }
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
