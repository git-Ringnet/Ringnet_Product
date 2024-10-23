<x-navbar :title="$title" activeGroup="statistic" activeName="viewReportIE"></x-navbar>
<div class="content-wrapper m-0 min-height--none p-0">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner">
            {{-- <div class="content__heading--left">
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
            </div> --}}
            <div class="thu">
                <div class="pl-3 d-flex align-items-center">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" viewBox="0 0 16 16" fill="none">
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
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-date_thu"
                                    id="btn-date_thu" data-button="date_thu"
                                    type="button">Ngày</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-return_code"
                                    id="btn-return_code" data-button="thu" type="button">Chứng
                                    từ</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-customers"
                                    id="btn-customers" data-button="customers"
                                    type="button">Tên</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-content"
                                    id="btn-content" data-button="thu" type="content">Nội
                                    dung thu
                                    chi</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-amount"
                                    id="btn-amount" data-button="thu" type="amount">Số
                                    tiền</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-fund"
                                    id="btn-fund" data-button="fund"
                                    type="button">Quỹ</button>
                                <button
                                    class="dropdown-item btndropdown text-13-black btn-note"
                                    id="btn-note" data-button="note" type="button">Ghi
                                    chú</button>
                            </div>
                        </div>
                        <x-filter-date-time name="date_thu" button="thu" title="Ngày" />
                        <x-filter-text name="return_code" title="Chứng từ" />
                        <x-filter-text name="customers" title="Tên" />
                        <x-filter-checkbox :dataa='$content' name="content" title="Nội dung"
                            namedisplay="name" />
                        <x-filter-compare name="amount" title="Số tiền" />
                        <x-filter-text name="fund" title="Quỹ" />
                        <x-filter-text name="note" title="Ghi chú" />
                    </div>
                </div>
            </div>
            <div class="chi">
                <div class="pl-3 d-flex align-items-center">
                    <form action="" method="get" id="search-filter" class="p-0 m-0">
                        <div class="position-relative ml-1">
                            <input type="text" placeholder="Tìm kiếm" id="search2"
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
                    <div class="dropdown mx-2 filter-al">
                        <button class="btn-filter_search" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" viewBox="0 0 16 16" fill="none">
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
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-date_chi"
                                    id="btn-date_chi" data-button="date_chi"
                                    type="button">Ngày</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-chungtu_chi"
                                    id="btn-chungtu_chi" data-button="chungtu_chi"
                                    type="button">Chứng từ</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-name_chi"
                                    id="btn-name_chi" data-button="name_chi"
                                    type="button">Tên</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-content_chi"
                                    id="btn-content_chi" data-button="content_chi"
                                    type="button">Nội
                                    dung chi</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-total_chi"
                                    id="btn-total_chi" data-button="total_chi"
                                    type="button">Số
                                    tiền</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-fund_chi"
                                    id="btn-fund_chi" data-button="fund_chi"
                                    type="button">Quỹ</button>
                                <button
                                    class="dropdown-item btndropdownn text-13-black btn-note_chi"
                                    id="btn-note_chi" data-button="note_chi"
                                    type="button">Ghi
                                    chú</button>
                            </div>
                        </div>
                        <x-filter-date-time name="date_chi" button="date_chi"
                            title="Ngày" />
                        <x-filter-text name="chungtu_chi" title="Chứng từ" />
                        <x-filter-text name="name_chi" title="Tên" />
                        <x-filter-checkbox :dataa='$content_chi' name="content_chi"
                            title="Nội dung chi" namedisplay="name" />
                        <x-filter-compare name="total_chi" title="Số tiền" />
                        <x-filter-text name="fund_chi" title="Quỹ" />
                        <x-filter-text name="note_chi" title="Ghi chú" />
                    </div>
                </div>
            </div>
            {{-- -- --}}
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
    </div>
</div>
<div class="content" style="margin-top: 8.4rem;">
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
                                    <a class="text-secondary px-4 text-15" data-toggle="tab" href="#chi">Chi</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="example2">
                            <div id="thu" class="content tab-pane in active">
                                <div class="outer-4 top-table table-responsive text-nowrap">
                                    <table id="example2" class="table table-hover">
                                        <thead style="position: sticky">
                                            <tr>
                                                <th scope="col" class="height-52 border" style="width: 15%   ">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Ngày
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%   ">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Chứng từ
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%   ">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Tên
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%   ">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
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
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
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
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
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
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
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
                                                <tr class="main-row thu-info" data-id="{{ $item->content_id }}">
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
                                        <thead>
                                            <tr>
                                                <th scope="col" class="height-52 border" style="width: 15%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Ngày
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Chứng từ
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Tên
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 15%">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Nội dung thu chi
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 13.33333333333333%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Số tiền
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 13.33333333333333%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Quỹ
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 13.33333333333333%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
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
                                                <tr class="main-row chi-info" data-id="{{ $item->content_pay }}">
                                                    <input type="hidden" value="{{ $item->id }}"
                                                        class="chi-item">
                                                    <td class="border">
                                                        {{ date_format(new DateTime($item->payment_date), 'd/m/Y') }}
                                                    </td>
                                                    <td class="border">{{ $item->payment_code }}</td>
                                                    <td class="border">
                                                        {{ $item->getGuest
                                                            ? $item->getGuest->guest_name_display
                                                            : ($item->getprovide
                                                                ? $item->getprovide->provide_name_display
                                                                : $item->provide_guest_name ?? 'N/A') }}
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

    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;
        var parentElement = $(this).closest('.thu, .chi');
        if (parentElement.hasClass('thu')) {
            var buttonElement = this;
            var formData = {
                search: $('#search').val(),
                date_thu: retrieveDateData(this, 'date_thu'),
                return_code: getData('#return_code', this),
                customers: getData('#customers', this),
                content: getStatusData(this, 'content'),
                amount: retrieveComparisonData(this, 'amount'),
                fund: getData('#fund', this),
                note: getData('#note', this),
                sort: getSortData(buttonElement)
            };

            $.ajax({
                type: 'get',
                url: "{{ route('searchRPContentE') }}",
                data: formData,
                success: function(data) {
                    updateFilters(data, filters, '.result-filter-thu', '.-thu',
                        '.thu-info', '.thu-item', buttonElement);
                }
            });
        } else if (parentElement.hasClass('chi')) {
            var formData = {
                search: $('#search2').val(), // Trường tìm kiếm chung (nếu có)
                date_chi: retrieveDateData(this, 'date_chi'), // Ngày chi
                chungtu_chi: getData('#chungtu_chi', this), // Chứng từ chi
                name_chi: getData('#name_chi', this), // Tên (người nhận/khách hàng)
                content_chi: getStatusData(this, 'content_chi'),
                total_chi: retrieveComparisonData(this, 'total_chi'), // Số tiền chi
                fund_chi: getData('#fund_chi', this), // Quỹ
                note_chi: getData('#note_chi', this), // Ghi chú
                sort: getSortData(buttonElement) // Sắp xếp dữ liệu nếu có
            };

            $.ajax({
                type: 'get',
                url: "{{ route('searchRPContentI') }}",
                data: formData,
                success: function(data) {
                    updateFilters(data, filters, '.result-filter-chi', '.-chi',
                        '.chi-info', '.chi-item', buttonElement);
                }
            });
        } else {
            console.log('Parent is neither thu nor chi');
        }
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + $(this).data('button-name') + '-options').hide();
        }
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
