<x-navbar :title="$title" activeGroup="sell" activeName="guest"></x-navbar>
<div class="content-wrapper editGuest min-height--none">
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Bán hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="nearLast-span">
                    <a class="text-dark" href="{{ route('guests.index', ['workspace' => $workspacename]) }}">Khách hàng
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
                    <div class="dropdown">
                        <a href="{{ route('guests.index', ['workspace' => $workspacename]) }}">
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
                    <a href="{{ route('guests.edit', ['workspace' => $workspacename, 'guest' => $guest->id]) }}">
                        <button type="button" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                class="mx-1" fill="none">
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
                            <span>Sửa</span>
                        </button>
                    </a>
                    <div>
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
                    </div>
                </div>
            </div>
        </div>
        <section class="content-header--options p-0">
            <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                <li>
                    <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                <li>
                    <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
                </li>
                <li>
                    <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#">File đính kèm</a>
                </li>
            </ul>
        </section>
    </div>
    <div class="content editGuest" style="margin-top: 7.5rem;">
        <div class="tab-content mt-3">
            <div id="info" class="content tab-pane in active">
                {{-- THÔNG TIN CHUNG --}}
                <div class="bg-filter-search border-0 text-left border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN CHUNG</p>
                </div>
                <div class="content-info">
                    <div class="d-flex align-items-center height-60-mobile">
                        <div class="title-info py-2 border border-left-0 height-100">
                            <p class="p-0 m-0 required-label margin-left32 text-13">Tên khách hàng</p>
                        </div>
                        <input type="text" required readonly name="guest_name_display"
                            value="{{ $guest->guest_name_display }}"
                            class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                    </div>
                    <div class="d-flex align-items-center height-60-mobile">
                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                            <p class="p-0 m-0  margin-left32 text-13">Tên hiển thị</p>
                        </div>
                        <input type="text" name="key" value="{{ $guest->key }}" readonly
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                    </div>
                    <div class="d-flex align-items-center height-60-mobile">
                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                            <p class="p-0 m-0  margin-left32 text-13">Địa chỉ</p>
                        </div>
                        <input type="text" required name="guest_address" value="{{ $guest->guest_address }}"
                            readonly
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                    </div>
                    <div class="d-flex align-items-center height-60-mobile">
                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                            <p class="p-0 m-0  margin-left32 text-13">Email khách hàng</p>
                        </div>
                        <input type="text" required name="guest_email" value="{{ $guest->guest_email }}" readonly
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                    </div>
                    <div class="d-flex align-items-center height-60-mobile">
                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                            <p class="p-0 m-0  margin-left32 text-13">Mã số thuế</p>
                        </div>
                        <input type="text" name="guest_code" value="{{ $guest->guest_code }}" readonly
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                    </div>
                </div>
                {{-- THÔNG TIN NGƯỜI ĐẠI DIỆN --}}
                <div class="bg-filter-search border-0 text-left border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN NGƯỜI ĐẠI DIỆN
                    </p>
                </div>
                <section class="content">
                    <div class="container-fluided">
                        <div class="info-chung">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded m-0">
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
                                        @foreach ($representGuest as $itemRepresent)
                                            <tr id="dynamic-row-1" class="bg-white addProduct">
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52"
                                                    style="width: 18%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ $itemRepresent->represent_name }}" readonly
                                                        class="border-0  py-1 w-100 represent_name" required=""
                                                        name="represent_name[]">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ $itemRepresent->represent_email }}" readonly
                                                        class="border-0 py-1 w-100 represent_email"
                                                        name="represent_email[]">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ $itemRepresent->represent_phone }}" readonly
                                                        class="border-0 py-1 w-100 represent_phone"
                                                        name="represent_phone[]">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $itemRepresent->represent_address }}"
                                                        class="border-0 py-1 w-100 represent_address"
                                                        name="represent_address[]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- THÔNG TIN BÁN HÀNG --}}
                <div class="bg-filter-search border-0 text-left border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN BÁN HÀNG</p>
                </div>
                <section class="content">
                    <div class="container-fluided">
                        <div class="info-chung">
                            <div class="content-info">
                                <table class="table table-hover bg-white rounded m-0">
                                    <thead>
                                        <tr>
                                            <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                style="width: 18%;">Tổng số đơn đã bán</th>
                                            <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                style="width: 20%;">Tổng số tiền đã bán</th>
                                            <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                style="width: 20%;">Tổng số tiền đã thanh toán</th>
                                            <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                                style="width: 20%;">Dư nợ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="dynamic-row-1" class="bg-white addProduct">
                                            <td class="border-right text-13-black px-0 py-2 padding-left35"
                                                style="width: 18%;">
                                                <input type="text" autocomplete="off" value="{{ $countDetail }}"
                                                    readonly class="border-0 px-2 py-1 w-100 text-13-black">
                                            </td>
                                            <td class="border-right text-13-black px-0 py-2 padding-left35"
                                                style="width: 20%;">
                                                <input type="text" autocomplete="off"
                                                    value="{{ number_format($sumSell) }}" readonly
                                                    class="border-0 px-2 py-1 w-100 text-13-black">
                                            </td>
                                            <td class="border-right text-13-black px-0 py-2 padding-left35"
                                                style="width: 20%;">
                                                <input type="text" autocomplete="off"
                                                    value="{{ number_format($sumPay) }}" readonly
                                                    class="border-0 px-2 py-1 w-100 text-13-black">
                                            </td>
                                            <td class="border-right text-13-black px-0 py-2 padding-left35"
                                                style="width: 20%;">
                                                <input type="text" autocomplete="off"
                                                    value="{{ number_format($sumDebt) }}" readonly
                                                    class="border-0 px-2 py-1 w-100 text-13-black">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="history" class="tab-pane fade">
                <div
                    class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed margin-250 border-custom">
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
                                <div class="dropdown ml-1">
                                    <button class="btn-filter_searh" type="button" id="dropdownMenuButton"
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
                                        <a class="dropdown-item text-13-black" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content-infor" style="padding-top:3rem;">
                    <div class="outer table-responsive text-nowrap">
                        <table class="table table-hover bg-white rounded" id="inputcontent">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-13 text-nowrap padding-left35">
                                        <span>Ngày báo giá</span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            viewBox='0 0 16 16' fill='none'>
                                            <path
                                                d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                fill='#6B6F76' />
                                        </svg>
                                    </th>
                                    <th scope="col" class="text-13 text-nowrap">
                                        <span>Số báo giá</span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            viewBox='0 0 16 16' fill='none'>
                                            <path
                                                d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                fill='#6B6F76' />
                                        </svg>
                                    </th>
                                    <th scope="col" class="text-13 text-nowrap">
                                        <span>Trạng thái</span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            viewBox='0 0 16 16' fill='none'>
                                            <path
                                                d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                fill='#6B6F76' />
                                        </svg>
                                    </th>
                                    <th scope="col" class="text-13 text-nowrap text-center">
                                        <span>Giao hàng</span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            viewBox='0 0 16 16' fill='none'>
                                            <path
                                                d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                fill='#6B6F76' />
                                        </svg>
                                    </th>
                                    <th scope="col" class="text-13 text-nowrap text-center">
                                        <span> Xuất hóa đơn</span>
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
                                    <th scope="col" class="text-13 text-nowrap">
                                        <span>Tổng tiền</span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            viewBox='0 0 16 16' fill='none'>
                                            <path
                                                d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                                fill='#6B6F76' />
                                        </svg>
                                    </th>
                                    <th scope="col" class="text-13 text-nowrap">
                                        <span>Dư nợ</span>
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
                                @foreach ($historyGuest as $itemGuest)
                                    <tr>
                                        <td class="text-13-black padding-left35">
                                            {{ date_format(new DateTime($itemGuest->created_at), 'd/m/Y') }}
                                        </td>
                                        <td class="text-13-black max-width120">
                                            {{ $itemGuest->quotation_number }}
                                        </td>
                                        <td class="text-13-black">
                                            @if ($itemGuest->status === 1)
                                                <span class="text-secondary">Draft</span>
                                            @elseif($itemGuest->status === 2)
                                                <span class="text-warning">Approved</span>
                                            @elseif($itemGuest->status === 3)
                                                <span class="text-success">Close</span>
                                            @endif
                                        </td>
                                        <td class="text-13-black text-center">
                                            @if ($itemGuest->status_receive === 1)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                        fill="#858585" />
                                                </svg>
                                            @elseif ($itemGuest->status_receive === 3)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            @elseif($itemGuest->status_receive === 2)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                        fill="#08AA36" fill-opacity="0.75" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($itemGuest->status_reciept === 1)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                        fill="#858585" />
                                                </svg>
                                            @elseif ($itemGuest->status_reciept === 3)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            @elseif($itemGuest->status_reciept === 2)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                        fill="#08AA36" fill-opacity="0.75" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-13-black text-center">
                                            @if ($itemGuest->status_pay === 1)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                        fill="#858585" />
                                                </svg>
                                            @elseif ($itemGuest->status_pay === 3)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            @elseif($itemGuest->status_pay === 2)
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                        fill="#08AA36" fill-opacity="0.75" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-13-black text-nowrap">
                                            {{ number_format($itemGuest->total_price + $itemGuest->total_tax) }}</td>
                                        <td class="text-13-black text-nowrap">
                                            {{ number_format($itemGuest->amount_owed) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    getKeyGuest($('input[name="guest_name_display"]'))
    let fieldCounter = 1;
</script>
