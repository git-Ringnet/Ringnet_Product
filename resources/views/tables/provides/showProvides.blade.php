<x-navbar :title="$title" activeGroup="systemFirst" activeName="provide">
</x-navbar>
{{-- <div class="content-wrapper m-0"> --}}
<div class="content editGuest min-height--none">
    <!-- Content Header (Page header) -->
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
                    <a class="text-dark" href="{{ route('provides.index', $workspacename) }}">Nhà cung cấp
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
                <span class="last-span">{{ $title }}</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <a href="{{ route('provides.index', $workspacename) }}" class="user_flow" data-type="NCC"
                        data-des="Trở về">
                        <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Trở về</span>
                        </button>
                    </a>
                    <div class="history">
                        <div class="d-flex content__heading--right">
                            <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                onclick="printContentCustom('printContent', 'print-debt')">In trang
                            </button>
                            <form id="exportFormDebt" action="{{ route('exportDebtProvides', $provide->id) }}"
                                method="GET" style="display: none;">
                                @csrf
                            </form>

                            <a href="#" class="activity mr-2" data-name1="NCC" data-des="Export excel"
                                onclick="event.preventDefault(); document.getElementById('exportFormDebt').submit();">
                                <button type="button"
                                    class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                    <i class="fa-regular fa-file-excel"></i>
                                    <span class="m-0 ml-1">Xuất Excel</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="detailImport">
                        <div class="d-flex content__heading--right">
                            <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                onclick="printContentCustom('printContent', 'print-detail')">In trang
                            </button>
                            <form id="exportFormDetail" action="{{ route('exportDetailProvide', $provide->id) }}"
                                method="GET" style="display: none;">
                                @csrf
                            </form>

                            <a href="#" class="activity mr-2" data-name1="NCC" data-des="Export excel"
                                onclick="event.preventDefault(); document.getElementById('exportFormDetail').submit();">
                                <button type="button"
                                    class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                    <i class="fa-regular fa-file-excel"></i>
                                    <span class="m-0 ml-1">Xuất Excel</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('provides.edit', ['workspace' => $workspacename, 'provide' => $provide->id]) }}"
                        class="user_flow mr-1" data-type="NCC" data-des="Chỉnh sửa nhà cung cấp">
                        <button type="button" class="custom-btn d-flex align-items-center h-100 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
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

                    {{-- <button class="btn-option">
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
                    </button> --}}
                </div>
            </div>
        </div>
        <section class="content-header--options p-0">
            <ul class="header-options--nav nav nav-tabs margin-left32">
                <li class="user_flow" data-type="NCC" data-des="Xem thông tin">
                    <a id="info-tab" class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông
                        tin</a>
                </li>
                <li class="user_flow" data-type="NCC" data-des="Lịch sử mua hàng">
                    <a id="history-tab" class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch
                        sử
                        công nợ</a>
                </li>
                <li class="user_flow">
                    <a id="detailExport-tab" class="text-secondary m-0 pl-3 pr-3" data-toggle="tab"
                        href="#detailImport">Đơn hàng</a>
                </li>
                {{-- <li class="user_flow" data-type="NCC" data-des="File đính kèm">
                    <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#">File đính kèm</a>
                </li> --}}
            </ul>
        </section>
    </div>
    <section class="content editGuest" style="margin-top: 13.5rem;">
        <div class="container-fluided">
            <div class="tab-content mt-3">
                <div id="info" class="content tab-pane in active">
                    <div class="content-wrapper1 py-0 pl-0 px-0">
                        <div class="container-fluided">
                            <div class="tab-content">
                                <div id="info" class="content tab-pane in active">
                                    <div class="bg-filter-search border-0 text-left border-custom">
                                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG
                                            TIN CHUNG</p>
                                    </div>
                                    <div class="content-info">
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Nhóm</p>
                                            </div>
                                            <input readonly type="text" name="provide_name"
                                                value="@if ($provide->getGroup) {{ $provide->getGroup->name }} @endif"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0 required-label margin-left32 text-13-red">Mã nhà cung
                                                    cấp</p>
                                            </div>
                                            <input readonly type="text" name="key"
                                                value="{{ old('key') ?? $provide->key }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 height-100">
                                                <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên
                                                </p>
                                            </div>
                                            <input readonly type="text" name="provide_name_display"
                                                value="{{ old('provide_name_display') ?? $provide->provide_name_display }}"
                                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Địa chỉ
                                                </p>
                                            </div>
                                            <input readonly type="text" name="provide_address"
                                                value="{{ old('provide_address') ?? $provide->provide_address }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Mã số thuế
                                                </p>
                                            </div>
                                            <input readonly type="text" name="provide_code"
                                                value="{{ old('provide_code') ?? $provide->provide_code }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Điện thoại
                                                </p>
                                            </div>
                                            <input readonly type="text" name="provide_address"
                                                value="{{ old('provide_address') ?? $provide->provide_phone }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Email</p>
                                            </div>
                                            <input readonly type="text" name="provide_name"
                                                value="{{ old('provide_name') ?? $provide->provide_email }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Thông tin đại diện --}}
                    {{-- <div class="content-wrapper1 py-0 pl-0 px-0">
                        <div class="container-fluided">
                            <div class="tab-content">
                                <div id="info" class="content tab-pane in active">
                                    <div class="bg-filter-search border-0 text-left border-custom">
                                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG
                                            TIN NGƯỜI ĐẠI DIỆN</p>
                                    </div>
                                    <div class="content-info">
                                        <div class="d-flex align-items-center">
                                            <table class="table table-hover bg-white rounded m-0" id="listrepesent">
                                                <thead>
                                                    <tr>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                            style="width: 18%;">Người đại diện</th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                            style="width: 20%;">Số điện thoại</th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                            style="width: 20%;">Email</th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                            style="width: 20%;">Địa chỉ nhận</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($repesent as $rp)
                                                        <tr class="bg-white">
                                                            <input type="hidden" name="repesent_id[]"
                                                                value="{{ $rp->id }}">
                                                            <td
                                                                class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom">
                                                                <input readonly type="text" name="represent_name[]"
                                                                    value="{{ $rp->represent_name }}"
                                                                    class="border-0  py-1 w-100">
                                                            </td>
                                                            <td
                                                                class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom">
                                                                <input readonly type="text"
                                                                    name="represent_phone[]"
                                                                    value="{{ $rp->represent_phone }}"
                                                                    class="border-0  py-1 w-100">
                                                            </td>
                                                            <td
                                                                class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom">
                                                                <input readonly type="text"
                                                                    name="represent_email[]"
                                                                    value="{{ $rp->represent_email }}"
                                                                    class="border-0  py-1 w-100">
                                                            </td>
                                                            <td
                                                                class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom">
                                                                <input readonly type="text"
                                                                    name="represent_address[]"
                                                                    value="{{ $rp->represent_address }}"
                                                                    class="border-0  py-1 w-100">
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
                    </div> --}}

                    {{-- Thông tin mua hàng --}}
                    {{-- <div class="content-wrapper1 py-0 pl-0 px-0">
                        <div class="container-fluided">
                            <div class="tab-content">
                                <div id="info" class="content tab-pane in active">
                                    <div class="bg-filter-search border-0 text-left border-custom">
                                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG
                                            TIN MUA HÀNG</p>
                                    </div>
                                    <div class="content-info">
                                        <div class="d-flex align-items-center">
                                            <table class="table table-hover" id="listrepesent">
                                                <thead>
                                                    <tr>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                            style="width: 18%;">
                                                            <span class="mr-2">Tổng số đơn đã mua</span>
                                                        </th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                            style="width: 20%;"><span class="mr-2">Tổng số tiền đã
                                                                mua</span>
                                                        </th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                            style="width: 20%;"><span class="mr-2">Tổng số tiền
                                                                thanh toán</span>
                                                        </th>
                                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                            style="width: 20%;"><span class="mr-2">Dư nợ</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white">
                                                        <td
                                                            class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom">
                                                            <span class="ml-0">
                                                                @if ($provide->getAllDetailByID)
                                                                    <span class="px-1">
                                                                        {{ $provide->getAllDetailByID->count() }}
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td
                                                            class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom text-right">
                                                            @if ($provide->getAllDetailByID)
                                                                <span class="px-1">
                                                                    {{ number_format($provide->getAllDetailByID->whereIn('status', [2, 0])->sum('total_tax')) }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom text-right">
                                                            @if ($provide->getPayment && $provide->getPayment->getHistoryPayment)
                                                                <span class="px-1">
                                                                    {{ number_format($provide->getPayment->getHistoryPayment->sum('payment')) }}@else{{ 0 }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom text-right">
                                                            <span
                                                                class="px-1">{{ number_format($provide->provide_debt) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="history" class="tab-pane fade">
                    <div class="content-wrapper1 py-0 pl-0 px-0">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluided" style="padding-top:3rem;" id="print-debt">
                            <table class="outer table table-hover bg-white rounded" id="inputcontent">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Chứng từ</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Ngày</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap">
                                            <span>Diễn giải</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-right">
                                            <span>Tiền toa</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-right">
                                            <span>Chi</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-right">
                                            <span>Còn nợ</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Kết hợp hai mảng và sắp xếp theo ngày tạo (tăng dần)
                                        $sortedCombined = $provide->getAllDetail
                                            ->concat($payOrder)
                                            ->sortBy('created_at');

                                        // Khởi tạo biến để giữ giá trị còn nợ
                                        $currentDebt = 0;
                                    @endphp
                                    @if ($provide->getAllDetail)
                                        @foreach ($sortedCombined as $item)
                                            <tr>
                                                <td class="text-13-black max-width120 border-bottom text-center">
                                                    @if (isset($item->quotation_number))
                                                        <a
                                                            href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}">
                                                            {{ $item->quotation_number }}
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('paymentOrder.edit', ['workspace' => $workspacename, 'paymentOrder' => $item->id]) }}">
                                                            {{ $item->payment_code }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-13-black padding-left35 border-bottom text-center">
                                                    {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                                </td>
                                                <td class="text-13-black max-width120 border-bottom">
                                                    @if (isset($item->quotation_number))
                                                        Phiếu đặt hàng
                                                    @else
                                                        Phiếu chi
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-nowrap border-bottom text-right">
                                                    @if (isset($item->total_price))
                                                        {{ number_format($item->total_price) }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-nowrap border-bottom text-right">
                                                    @if (isset($item->total))
                                                        {{ number_format($item->total) }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-nowrap border-bottom text-right">
                                                    @if (isset($item->total_price))
                                                        @php
                                                            $currentDebt += $item->total_price;
                                                        @endphp
                                                    @elseif (isset($item->total))
                                                        @php
                                                            $currentDebt -= $item->total;
                                                        @endphp
                                                    @endif
                                                    {{ number_format($currentDebt) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="border-bottom"></td>
                                            <td class="text-red text-nowrap border-bottom"><strong>Tổng</strong></td>
                                            <td class="text-red text-nowrap border-bottom text-right">
                                                {{ number_format($sortedCombined->where('total_price', '!=', null)->sum('total_price')) }}
                                            </td>
                                            <td class="text-red text-nowrap border-bottom text-right">
                                                {{ number_format($sortedCombined->where('amount', '!=', null)->sum('amount')) }}
                                            </td>
                                            <td class="text-red text-nowrap border-bottom text-right">
                                                {{ number_format($currentDebt) }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div id="files" class="tab-pane fade">
                    ádasdsadsa
                </div> --}}
                <div id="detailImport" class="tab-pane fade">
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
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                    fill="#6B6F76" />
                                            </svg>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-13-black" href="#">Action</a>
                                            <a class="dropdown-item text-13-black" href="#">Another action</a>
                                            <a class="dropdown-item text-13-black" href="#">Something else
                                                here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="content-infor" style="padding-top:3rem;">
                        <div class="outer table-responsive text-nowrap" id="print-detail">
                            <table id="example2" class="table table-hover">
                                <thead style="position: sticky">
                                    <tr>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        Số chứng từ
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        Mã hàng
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        Tên hàng
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        ĐVT
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        SL Mua
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        Đơn giá
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52 border"
                                            style="width: 7.142857142857143%">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_name_display"
                                                    data-sort-type="ASC">
                                                    <button class="btn-sort text-13 bold" type="submit">
                                                        Thành tiền
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-sell">
                                    <tr>
                                        <td colspan="9" class="border-bottom bold">Nhà cung cấp:
                                            {{ $provide->provide_name_display }}</td>
                                    </tr>
                                    @php
                                        $totalDeliverQty = 0;
                                        $totalPriceExport = 0;
                                        $totalProductTotalVat = 0;
                                        $totalItemDeliveryTotalProductVat = 0;
                                        $Pay = 0;
                                        $Remai = 0;
                                        $totalPay = 0;
                                        $totalRemai = 0;
                                        $stt = 1; // Initialize the STT variable
                                    @endphp

                                    @foreach ($allDelivery as $itemDelivery)
                                        @php
                                            $matchedItems = $productDelivered
                                                ->where('detailimport_id', $itemDelivery->id)
                                                ->where('provide_id', $provide->id);
                                            $count = $matchedItems->count();
                                        @endphp
                                        @if ($matchedItems->isNotEmpty())
                                            @foreach ($matchedItems as $matchedItem)
                                                <tr class="position-relative relative">
                                                    <input type="hidden" value="{{ $itemDelivery->id }}"
                                                        class="sell">
                                                    @if ($loop->first)
                                                        <td rowspan="{{ $count }}"
                                                            class="text-13-black height-52 border">
                                                            <a href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $itemDelivery->id]) }}"
                                                                class="duongDan activity" data-name1="BG"
                                                                data-des="Xem đơn báo giá">{{ $itemDelivery->maPhieu }}
                                                            </a>
                                                        </td>
                                                    @endif
                                                    <td class="text-13-black height-52 border">
                                                        {{ $matchedItem->product_code }}</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ $matchedItem->product_name }}</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ $matchedItem->product_unit }}</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($matchedItem->product_qty) }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($matchedItem->price_export) }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($matchedItem->product_qty * $matchedItem->price_export) }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @php
                                                $stt++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- <section class="content-wrapper1 p-2 position-relative" style="margin-top:2px; margin-bottom: 2px;">
    <div class="d-flex justify-content-between">
        <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
            <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông tin</a>
            </li>
            <li class="text-nav">
                <a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch sử</a>
            </li>
            <li class="text-nav">
                <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
            </li>
        </ul>
        <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
        </div>
    </div>
</section> -->
</form>
</div>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.history').hide();
        $('.header-options--nav a[data-toggle="tab"]').click(function() {
            var targetId = $(this).attr('href');
            var content = '';
            // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
            $('.history').toggle(targetId === '#history');
            $('.detailImport').toggle(targetId === '#detailImport');
        });
        // Lấy giá trị của 'option' từ URL
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        };

        var option = getUrlParameter('option');

        // Kích hoạt tab tương ứng dựa trên giá trị của 'option'
        switch (option) {
            case 'donhang':
                $('#detailExport-tab').tab('show');
                break;
            case 'congno':
                $('#history-tab').tab('show');
                break;
            default:
                $('#info-tab').tab('show');
                break;
        }
    });
    $(document).on('click', '.user_flow', function(e) {
        var type = $(this).attr('data-type')
        var des = $(this).attr('data-des');
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: type,
                des: des
            },
            success: function(data) {}
        })
    })
</script>
