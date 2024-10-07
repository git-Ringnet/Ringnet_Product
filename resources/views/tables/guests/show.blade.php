<x-navbar :title="$title" activeGroup="systemFirst" activeName="guest"></x-navbar>
<form action="#" method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="table_name" value="KH">
    <input type="hidden" name="detail_id" value="{{ $guest->id }}">
    <div class="content editGuest min-height--none">
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
                        <a class="text-dark" href="{{ route('guests.index', ['workspace' => $workspacename]) }}">Khách
                            hàng
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
                            <a href="{{ route('guests.index', ['workspace' => $workspacename]) }}" class="activity"
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
                        <div class="history">
                            <div class="d-flex content__heading--right">
                                <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                    onclick="printContentCustom('printContent', 'print-debt')">In trang
                                </button>
                                <form id="exportForm" action="{{ route('exportDebtGuest', $guest->id) }}" method="GET"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a href="#" class="activity mr-2" data-name1="NCC" data-des="Export excel"
                                    onclick="event.preventDefault(); document.getElementById('exportForm').submit();">
                                    <button type="button"
                                        class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                                        <i class="fa-regular fa-file-excel"></i>
                                        <span class="m-0 ml-1">Xuất Excel</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="detailExport">
                            <div class="d-flex content__heading--right">
                                <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                    onclick="printContentCustom('printContent', 'print-detail')">In trang
                                </button>
                                <form id="exportFormDetail" action="{{ route('exportDetailGuest', $guest->id) }}"
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
                        <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.30639 10.2061C9.57305 10.4727 9.59528 10.8913 9.37306 11.1832L9.30639 11.2595L6.84832 13.7176C5.58773 14.9782 3.54392 14.9782 2.28333 13.7176C1.06621 12.5005 1.02425 10.5532 2.15742 9.28574L2.28333 9.15261L4.7414 6.69453C5.03231 6.40363 5.50396 6.40363 5.79486 6.69453C6.06152 6.9612 6.08375 7.37973 5.86153 7.67171L5.79486 7.74799L3.33679 10.2061C2.65801 10.8848 2.65801 11.9854 3.33679 12.6641C3.98163 13.309 5.00709 13.3412 5.68999 12.7609L5.79486 12.6641L8.25293 10.2061C8.54384 9.91516 9.01549 9.91516 9.30639 10.2061ZM9.83063 6.17029C10.1215 6.46119 10.1215 6.93284 9.83063 7.22375L7.35002 9.70437C7.05911 9.99528 6.58746 9.99528 6.29656 9.70437C6.00565 9.41347 6.00565 8.94182 6.29656 8.65091L8.77718 6.17029C9.06808 5.87938 9.53973 5.87938 9.83063 6.17029ZM13.7183 2.2826C14.9354 3.49972 14.9774 5.44698 13.8442 6.71446L13.7183 6.84759L11.2602 9.30567C10.9693 9.59657 10.4977 9.59657 10.2068 9.30567C9.94012 9.03901 9.9179 8.62047 10.1401 8.32849L10.2068 8.25221L12.6648 5.79413C13.3436 5.11535 13.3436 4.01484 12.6648 3.33606C12.02 2.69122 10.9946 2.65898 10.3117 3.23933L10.2068 3.33606L7.74872 5.79413C7.45781 6.08504 6.98616 6.08504 6.69526 5.79413C6.4286 5.52747 6.40637 5.10893 6.62859 4.81696L6.69526 4.74067L9.15333 2.2826C10.4139 1.02201 12.4577 1.02201 13.7183 2.2826Z"
                                    fill="white" />
                            </svg>
                            <span>Đính kèm file</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>
                        <a class="activity" data-name1="KH" data-des="Xem trang sửa"
                            href="{{ route('guests.edit', ['workspace' => $workspacename, 'guest' => $guest->id]) }}">
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
            <section class="content-header--options p-0">
                <ul class="header-options--nav nav nav-tabs margin-left32">
                    <li>
                        <a id="info-tab" class="text-secondary active m-0 pl-3 activity" data-name1="KH"
                            data-des="Xem thông tin khách hàng" data-toggle="tab" href="#info">Thông tin</a>
                    </li>
                    <li>
                        <a id="history-tab" class="text-secondary m-0 pl-3 pr-3 activity" data-toggle="tab"
                            data-name1="KH" data-des="Xem lịch sử giao dịch" href="#history">Lịch sử công nợ</a>
                    </li>
                    <li>
                        <a id="detailExport-tab" class="text-secondary m-0 pr-3 activity" data-toggle="tab"
                            data-name1="KH" data-des="Xem đơn hàng" href="#detailExport">Đơn hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary m-0 pr-3 activity" data-toggle="tab" data-name1="KH"
                            data-des="Xem lịch sử giao dịch" href="#files">File đính kèm</a>
                    </li>
                </ul>
            </section>
        </div>
        <div class="content editGuest" style="margin-top: 13.7rem;">
            <div class="tab-content mt-3">
                <div id="info" class="content tab-pane in active">
                    {{-- THÔNG TIN CHUNG --}}
                    <div class="bg-filter-search border-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="content-info">
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0  margin-left32 text-13">Nhóm khách hàng</p>
                            </div>
                            <input type="text" readonly value="{{ $guest->name }}"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0 required-label margin-left32 text-13-red">Mã khách hàng</p>
                            </div>
                            <input type="text" required readonly value="{{ $guest->key }}"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên khách hàng</p>
                            </div>
                            <input type="text" required readonly name="guest_name_display"
                                value="{{ $guest->guest_name_display }}"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                <p class="p-0 m-0  margin-left32 text-13">Địa chỉ</p>
                            </div>
                            <input type="text" required name="guest_address" value="{{ $guest->guest_address }}"
                                readonly
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Điện thoại</p>
                            </div>
                            <input type="text" name="guest_phone" value="{{ $guest->guest_phone }}" readonly
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        <div class="d-flex  align-items-center height-60-mobile">
                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Email</p>
                            </div>
                            <input type="text" name="guest_email" value="{{ $guest->guest_email }}" readonly
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                        {{-- <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                <p class="p-0 m-0  margin-left32 text-13">Tên viết tắt</p>
                            </div>
                            <input type="text" name="key" value="{{ $guest->key }}" readonly
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div> --}}
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                <p class="p-0 m-0  margin-left32 text-13">Tên đầy đủ</p>
                            </div>
                            <input type="text" required name="guest_email" value="{{ $guest->guest_name }}"
                                readonly
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                    </div>
                    {{-- THÔNG TIN NGƯỜI ĐẠI DIỆN --}}
                    {{-- <div class="bg-filter-search border-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN NGƯỜI ĐẠI
                            DIỆN
                        </p>
                    </div> --}}
                    {{-- <section class="content">
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
                    </section> --}}
                    {{-- THÔNG TIN BÁN HÀNG --}}
                    {{-- <div class="bg-filter-search border-0 text-left border-custom">
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
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                    style="width: 20%;">
                                                    <span class="mr-2">Tổng số tiền đã bán</span>
                                                </th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                    style="width: 20%;">
                                                    <span class="mr-2">Tổng số tiền thanh toán</span>
                                                </th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52 text-right"
                                                    style="width: 20%;">
                                                    <span class="mr-2">Dư nợ</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="dynamic-row-1" class="bg-white addProduct">
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom"
                                                    style="width: 18%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ $countDetail }}" readonly
                                                        class="border-0 px-2 py-1 w-100 text-13-black">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ number_format($sumSell) }}" readonly
                                                        class="border-0 px-2 py-1 w-100 text-13-black text-right">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ number_format($sumPay) }}" readonly
                                                        class="border-0 px-2 py-1 w-100 text-13-black text-right">
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35 height-52 border-bottom"
                                                    style="width: 20%;">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ number_format($sumDebt) }}" readonly
                                                        class="border-0 px-2 py-1 w-100 text-13-black text-right">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                </div>
                <div id="history" class="tab-pane fade">
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
                        <div class="outer table-responsive text-nowrap" id="print-debt">
                            <table class="table table-hover bg-white rounded" id="inputcontent">
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
                                            <span>Thu</span>
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
                                        // Kết hợp hai mảng
                                        $combined = $historyGuest->concat($cash_receipts);

                                        // Sắp xếp mảng kết hợp theo ngày tạo (created_at) tăng dần
                                        $sortedCombined = $combined->sortBy('created_at');

                                        $currentDebt = 0;
                                    @endphp

                                    @foreach ($sortedCombined as $item)
                                        <tr>
                                            <td class="text-13-black max-width120 border-bottom text-center">
                                                @if (isset($item->quotation_number))
                                                    <a href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $item->id]) }}"
                                                        class="duongDan activity" data-name1="BG"
                                                        data-des="Xem đơn báo giá">{{ $item->quotation_number }}
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{ route('cash_receipts.edit', ['workspace' => $workspacename, 'cash_receipt' => $item->id]) }}">{{ $item->receipt_code }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-13-black padding-left35 border-bottom text-center">
                                                {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                            </td>
                                            <td class="text-13-black max-width120 border-bottom">
                                                @if (isset($item->quotation_number))
                                                    Phiếu bán hàng
                                                @else
                                                    Phiếu thu
                                                @endif
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom text-right">
                                                @if (isset($item->total_price) && isset($item->total_tax))
                                                    {{ number_format($item->total_price + $item->total_tax) }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom text-right">
                                                @if (isset($item->amount))
                                                    {{ number_format($item->amount) }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td class="text-13-black text-nowrap border-bottom text-right">
                                                @if (isset($item->total_price) && isset($item->total_tax))
                                                    @php
                                                        $currentDebt += $item->total_price + $item->total_tax;
                                                    @endphp
                                                @elseif (isset($item->amount))
                                                    @php
                                                        $currentDebt -= $item->amount;
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
                                            {{ number_format($combined->where('total_price', '!=', null)->sum('total_price') + $combined->where('total_tax', '!=', null)->sum('total_tax')) }}
                                        </td>
                                        <td class="text-red text-nowrap border-bottom text-right">
                                            {{ number_format($combined->where('amount', '!=', null)->sum('amount')) }}
                                        </td>
                                        <td class="text-red text-nowrap border-bottom text-right">
                                            {{ number_format($currentDebt) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div id="detailExport" class="tab-pane fade">
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
                                                        CTV bán hàng
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
                                                        SL bán
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
                                        <td colspan="9" class="border-bottom bold">Khách hàng:
                                            {{ $guest->guest_name_display }}</td>
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
                                                ->where('detailexport_id', $itemDelivery->id)
                                                ->where('guest_id', $guest->id);
                                            $count = $matchedItems->count();
                                        @endphp

                                        @if ($matchedItems->isNotEmpty())
                                            @php
                                                $totalItemDeliveryTotalProductVat +=
                                                    $itemDelivery->totalProductVat + $itemDelivery->total_tax;
                                                $Pay =
                                                    $itemDelivery->totalProductVat +
                                                    $itemDelivery->total_tax -
                                                    $itemDelivery->amount_owed;
                                                $Remai = $itemDelivery->amount_owed;
                                                $totalPay += $Pay;
                                                $totalRemai += $Remai;
                                            @endphp

                                            @foreach ($matchedItems as $matchedItem)
                                                @php
                                                    $totalDeliverQty += $matchedItem->product_qty;
                                                    $totalPriceExport += $matchedItem->price_export;
                                                    $totalProductTotalVat += $matchedItem->product_total;
                                                @endphp
                                                <tr class="position-relative relative">
                                                    <input type="hidden" value="{{ $itemDelivery->id }}"
                                                        class="sell">
                                                    @if ($loop->first)
                                                        <td rowspan="{{ $count }}"
                                                            class="text-13-black height-52 border">
                                                            <a href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $itemDelivery->id]) }}"
                                                                class="duongDan activity" data-name1="BG"
                                                                data-des="Xem đơn báo giá">{{ $itemDelivery->maPhieu }}
                                                            </a>
                                                        </td>
                                                        <td rowspan="{{ $count }}"
                                                            class="text-13-black height-52 border">
                                                            {{ $itemDelivery->nameUser }}
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
                                                        {{ number_format($matchedItem->giaXuat) }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($matchedItem->giaXuat * $matchedItem->product_qty) }}
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
                <div class="tab-pane fade" id="files">
                    <div class="bg-filter-search text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                            File đính kèm
                        </p>
                    </div>
                    <x-form-attachment :value="$guest" name="KH"></x-form-attachment>
                </div>
            </div>
        </div>
    </div>
</form>
<x-print-component :contentId="$title" />
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.history').hide();
        $('.header-options--nav a[data-toggle="tab"]').click(function() {
            var targetId = $(this).attr('href');
            var content = '';
            // Hiển thị hoặc ẩn các phần tử tương ứng với tab được chọn
            $('.history').toggle(targetId === '#history');
            $('.detailExport').toggle(targetId === '#detailExport');
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
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
        var name = 'KH';
        var des = 'Đính kèm file';
        $.ajax({
            url: '{{ route('addActivity') }}',
            type: 'GET',
            data: {
                name: name,
                des: des,
            },
            success: function(data) {}
        });
    })
    getKeyGuest($('input[name="guest_name_display"]'))
    let fieldCounter = 1;
</script>
