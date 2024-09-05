<x-navbar :title="$title" activeGroup="systemFirst" activeName="funds"></x-navbar>
<form action="#" method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="editgroup min-height--none pr-2">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left">
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
                        <a class="text-dark" href="{{ route('funds.index', ['workspace' => $workspacename]) }}">
                            Quỹ
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
                    <span class="last-span">{{ $fund->name }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('funds.index', ['workspace' => $workspacename]) }}" class="activity"
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
                        <a class="activity" data-name1="KH" data-des="Xem trang sửa"
                            href="{{ route('funds.edit', $fund->id) }}">
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
        </div>
        <div class="content editgroup" style="margin-top: 10rem;">
            <section class="content-header--options p-0">
                <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                    <li>
                        <a id="info-tab" class="text-secondary active m-0 pl-3 activity" data-name1="KH"
                            data-des="Xem thông tin khách hàng" data-toggle="tab" href="#info">
                            Thông tin
                        </a>
                    </li>
                    <li>
                        <a id="product-tab" class="text-secondary m-0 pl-3 pr-3 activity" data-toggle="tab"
                            href="#fund">
                            Quỹ
                        </a>
                    </li>
                </ul>
            </section>
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="content-info">
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info height-100 py-2 border border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Tên quỹ</p>
                            </div>
                            <input type="text" name="name" id="name" placeholder="Nhập thông tin" readonly
                                value="{{ $fund->name }}"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Mô tả</p>
                            </div>
                            <input type="text" name="description" id="description" readonly
                                value="{{ $fund->description }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Tiền quỹ</p>
                            </div>
                            <input type="text" name="amount" id="amount" readonly
                                value="{{ number_format($fund->amount) }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                placeholder="Nhập thông tin" required>
                        </div>
                        <div class="d-flex align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Tên ngân hàng</p>
                            </div>
                            <input type="text" name="bank_name" id="bank_name" readonly
                                value="{{ $fund->bank_name }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Số tài khoản</p>
                            </div>
                            <input type="text" name="bank_account_number" readonly
                                value="{{ $fund->bank_account_number }}" id="bank_account_holder"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Chủ tài khoản</p>
                            </div>
                            <input type="text" name="bank_account_holder" id="bank_account_holder" readonly
                                value="{{ $fund->bank_account_holder }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Ngày bắt đầu</p>
                            </div>
                            <input type="date" readonly name="start_date" id="start_date"
                                value="{{ $fund->start_date }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile ">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Ngày kết thúc</p>
                            </div>
                            <input type="date" name="end_date" id="end_date" readonly
                                value="{{ $fund->end_date }}"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                        </div>
                    </div>
                </div>
                <div id="fund" class="content tab-pane">
                    <div class="info-chung">
                        <p class="font-weight-bold text-uppercase info-chung--heading border-custom">
                            Quỹ
                        </p>
                        <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed border-custom">
                            <div class="w-100">
                                <div class="row mr-0">
                                    <div class="col-md-5 d-flex align-items-center">
                                        <form action="" method="get" id='search-filter' class="p-0 m-0">
                                            <div class="position-relative ml-1">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    style="outline: none;" class="pr-4 w-100 input-search text-13"
                                                    value="{{ request()->keywords }}">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </form>
                                        <div class="dropdown mx-2 d-none filter-all">
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
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-13-black" href="#">Action</a>
                                                <a class="dropdown-item text-13-black" href="#">Another
                                                    action</a>
                                                <a class="dropdown-item text-13-black" href="#">Something else
                                                    here</a>
                                            </div>
                                        </div>
                                        <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                            onclick="printContentCustom('printContent', 'print-funds')">In trang
                                        </button>
                                        <form id="exportFormFund" action="{{ route('exportDetailFund', $fund->id) }}"
                                            method="GET" style="display: none;">
                                            @csrf
                                        </form>

                                        <a href="#" class="activity mr-3" data-name1="NCC"
                                            data-des="Export excel"
                                            onclick="event.preventDefault(); document.getElementById('exportFormFund').submit();">
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
                        <div class="outer container-fluided order_content mt-5" id="print-funds">
                            <table class="table table-hover bg-white rounded" id="warehouseTable">
                                <thead>
                                    <tr>
                                        <th class="border-right height/-52 padding-left35 text-13">
                                            Ngày
                                        </th>
                                        <th class="border-right height/-52 padding-left35 text-13">
                                            Chứng từ
                                        </th>
                                        <th class="border-right height-52 padding-left35 text-13">
                                            Tên quỹ
                                        </th>
                                        <th class="border-right height-52 padding-left35 text-13">
                                            Thu
                                        </th>
                                        <th class="border-right height-52 padding-left35 text-13">
                                            Chi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Kết hợp hai mảng
                                        $combined = $fundReceipts->concat($fundPayments);

                                        // Sắp xếp mảng kết hợp theo ngày tạo (created_at) tăng dần
                                        $sortedCombined = $combined->sortBy('created_at');

                                        $currentDebt = 0;
                                    @endphp
                                    @foreach ($sortedCombined as $item)
                                        <tr>
                                            <td class="text-13-black padding-left35 border-bottom">
                                                {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                            </td>
                                            <td class="text-13-black max-width120 border-bottom">
                                                @if (isset($item->receipt_code))
                                                    {{ $item->receipt_code }}
                                                @else
                                                    {{ $item->payment_code }}
                                                @endif
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom">
                                                {{ $item->fund_name }}
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom">
                                                @if (isset($item->amount))
                                                    {{ number_format($item->amount) }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom">
                                                @if (isset($item->payment))
                                                    {{ number_format($item->payment) }}
                                                @else
                                                    0
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
    </div>
</form>
<x-print-component :contentId="$title" />
<x-user-flow></x-user-flow>
