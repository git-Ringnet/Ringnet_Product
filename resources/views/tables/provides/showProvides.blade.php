<x-navbar :title="$title" activeGroup="buy" activeName="provide">
</x-navbar>
{{-- <div class="content-wrapper m-0"> --}}
<div class="content-wrapper editGuest min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Mua hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="nearLast-span">
                    <a class="text-dark" href="{{ route('provides.index') }}">Nhà cung cấp
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
                    <a href="{{ route('provides.index') }}" class="user_flow" data-type="NCC"
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

                    <a href="{{ route('provides.edit', ['provide' => $provide->id]) }}"
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
                    <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                <li class="user_flow" data-type="NCC" data-des="Lịch sử mua hàng">
                    <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch sử mua hàng</a>
                </li>
                <li class="user_flow" data-type="NCC" data-des="File đính kèm">
                    <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#">File đính kèm</a>
                </li>
            </ul>
        </section>
    </div>
    <section class="content editGuest" style="margin-top: 7.5rem;">
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
                                            <div class="title-info py-2 border border-left-0 height-100">
                                                <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên hiển thị
                                                </p>
                                            </div>
                                            <input readonly type="text" required placeholder="Nhập thông tin"
                                                name="provide_name_display"
                                                value="{{ old('provide_name_display') ?? $provide->provide_name_display }}"
                                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 required-label text-13-red">Mã số thuế
                                                </p>
                                            </div>
                                            <input readonly type="text" required placeholder="Nhập thông tin"
                                                name="provide_code"
                                                value="{{ old('provide_code') ?? $provide->provide_code }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 required-label text-13-red">Địa chỉ
                                                </p>
                                            </div>
                                            <input readonly type="text" required placeholder="Nhập thông tin"
                                                name="provide_address"
                                                value="{{ old('provide_address') ?? $provide->provide_address }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Tên viết tắt</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="key" value="{{ old('key') ?? $provide->key }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0  margin-left32 text-13">Tên đầy đủ</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="provide_name"
                                                value="{{ old('provide_name') ?? $provide->provide_name }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Thông tin đại diện --}}
                    <div class="content-wrapper1 py-0 pl-0 px-0">
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
                                                            {{-- <td class="border border-top-0 border-bottom-0 border-left-0">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                        fill="#42526E"></path>
                                                                </svg>
                                                            </td> --}}
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

                    {{-- Thông tin mua hàng --}}
                    <div class="content-wrapper1 py-0 pl-0 px-0">
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
                    </div>
                </div>
                <div id="history" class="tab-pane fade">
                    <div class="content-wrapper1 py-0 pl-0 px-0">
                        <div class="container-fluided">
                            <table class="table table-hover bg-white rounded" id="inputcontent">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-13 text-nowrap padding-left35">
                                            <span>Ngày mua hàng</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap">
                                            <span>Đơn mua</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap">
                                            <span>Số tham chiếu</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-left">
                                            <span>Nhà cung cấp</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        {{-- <th scope="col" class="text-13 text-nowrap text-left">
                                            <span>Dự án</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th> --}}
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Trạng thái</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Nhận hàng</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Xuất hóa đơn</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-center">
                                            <span>Thanh toán</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-right">
                                            <span>Tổng tiền</span>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                viewBox='0 0 16 16' fill='none'>
                                                <path
                                                    d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                    fill='#6B6F76' />
                                            </svg>
                                        </th>
                                        <th scope="col" class="text-13 text-nowrap text-right">
                                            <span>Dự nợ</span>
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
                                    @if ($provide->getAllDetail)
                                        @foreach ($provide->getAllDetail as $detail)
                                            <tr class="bg-white">
                                                <td class="text-13-black padding-left35 border-top-0 border-bottom">
                                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                                </td>
                                                <td class="text-13-black border-top-0 border-bottom">
                                                    {{ $detail->quotation_number }}
                                                </td>
                                                <td class="text-13-black border-top-0 border-bottom">
                                                    {{ $detail->reference_number }}
                                                </td>
                                                <td class="text-13-black border-top-0 border-bottom">
                                                    @if ($detail->getProvideName)
                                                        {{ $detail->getProvideName->provide_name_display }}
                                                    @endif
                                                </td>
                                                {{-- <td class="text-13-black border-top-0 border-bottom">
                                                    @if ($detail->getProjectName)
                                                        {{ $detail->getProjectName->project_name }}
                                                    @endif
                                                </td> --}}
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($detail->status_receive == 2 && $detail->status_reciept == 2 && $detail->status_pay == 2)
                                                        <span class="text-success">Close</span>
                                                    @elseif($detail->status == 1)
                                                        <span class="text-secondary">Draft</span>
                                                    @else
                                                        <span class="text-primary">Approved</span>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($detail->status_receive == 0)
                                                        <!-- NO DONE -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($detail->status_receive == 1)
                                                        <!-- Pedding-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <g clip-path="url(#clip0_2466_23134)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @else
                                                        <!-- Finished -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($detail->status_reciept == 0)
                                                        <!-- NO DONE -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($detail->status_reciept == 1)
                                                        <!-- Pedding-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <g clip-path="url(#clip0_2466_23134)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @else
                                                        <!-- Finished -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($detail->status_pay == 0)
                                                        <!-- NO DONE -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($detail->status_pay == 1)
                                                        <!-- Pedding-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <g clip-path="url(#clip0_2466_23134)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @else
                                                        <!-- Finished -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-right border-top-0 border-bottom">
                                                    {{ number_format($detail->total_tax) }}</td>
                                                <td class="text-13-black text-right border-top-0 border-bottom">
                                                    @if ($detail->getPayOrder && $detail->getPayOrder->getHistoryPaymentByID)
                                                        {{ number_format($detail->total_tax - $detail->getPayOrder->getHistoryPaymentByID->sum('payment')) }}
                                                    @else
                                                        {{ number_format($detail->total_tax) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="files" class="tab-pane fade">
                    ádasdsadsa
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
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
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
