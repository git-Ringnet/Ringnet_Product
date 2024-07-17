<x-navbar :title="$title" activeGroup="manageProfess" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.store', $workspacename) }}" method="POST">
    <div class="content-wrapper--2Column m-0 min-height--none">
        <!-- Content Header (Page header) -->
        @csrf
        <input type="hidden" id="provides_id" name="provides_id">
        <input type="hidden" id="project_id" name="project_id">
        <input type="hidden" id="represent_id" name="represent_id">
        <div class="content-header-fixed p-0 border-bottom-0">
            <div class="content__header--inner">
                <div class="content__heading--left">
                    <span class="ml-4">Quản lý nghiệp vụ</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Đặt hàng NCC</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo đơn đặt hàng NCC</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('import.index', $workspacename) }}">
                            <button type="button"
                                class="btn-destroy btn-light d-flex align-items-center h-100 user_flow mx-1"
                                data-type="DMH" data-des="Hủy đơn mua hàng">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <button type="submit" class="custom-btn d-flex align-items-center h-100 mx-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="white"></path>
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                        </button>

                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA" />
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content margin-top-75">
            <x-view-mini :listDetail="$listDetail" :workspacename="$workspacename" :page="'DHNCC'" />
            <div id="main">
                <div class="border">
                    <div id="show_info_Guest">
                        <div class="bg-filter-search border-0 text-center">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN nhà cung cấp
                            </p>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày lập</span>
                                <input class="text-13-black w-50 border-0 bg-input-guest flatpickr-input py-2 px-2"
                                    name="" placeholder="Chọn thông tin" style="flex:2;" id="datePicker"
                                    value="{{ date('Y-m-d') }}" />
                                <input type="hidden" name="date_quote" id="hiddenDateInput"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>
                                <span class="mx-1 text-13" style="flex: 2;">
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest" id="myInput"
                                        style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                        readonly>
                                </span>
                                <div id="myUL"
                                    class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block list-guest"
                                    style="z-index: 99;display: none;">
                                    <ul class="m-0 p-0 scroll-data">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập nhà cung cấp"
                                                    class="pr-4 w-100 input-search bg-input-guest" id="provideFilter">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search text-table" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @foreach ($provides as $item)
                                            <li class="p-2 align-items-center text-wrap"
                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                <a href="javascript:void(0)" style="flex:2" id="{{ $item->id }}"
                                                    name="search-info" class="search-info">
                                                    <span
                                                        class="text-13-black">{{ $item->provide_name_display }}</span></span>
                                                </a>
                                                <a id="" class="search-infoEdit" type="button"
                                                    data-toggle="modal" data-target="#editProvide"
                                                    data-id="{{ $item->id }}">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path
                                                                d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z"
                                                                fill="black" />
                                                            <path
                                                                d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z"
                                                                fill="black" />
                                                            <path
                                                                d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                        data-toggle="modal" data-target="#provideModal"
                                        style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                        </span>
                                        <span class="text-13-black pl-3 pt-1"
                                            style="font-weight: 600 !important;">Thêm
                                            nhà cung cấp</span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng nợ cũ</span>
                                <input tye="text"
                                    class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 text-right debt-old"
                                    value="0" disabled>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    name="quotation_number"
                                    style="flex:2; background-color:#F0F4FF;border-radius:4px;"
                                    placeholder="Chọn thông tin">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Họ và tên</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    name="provides_name" style="flex:2; background-color:#F0F4FF;border-radius:4px;"
                                    placeholder="Nhập thông tin">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số điện thoại</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    name="phone" style="flex:2; background-color:#F0F4FF;border-radius:4px;"
                                    placeholder="Nhập thông tin">
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số phiếu</span>
                                <input class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    placeholder="Nhập thông tin"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                    name="reference_number" />
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa chỉ</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    name="address" style="flex:2; background-color:#F0F4FF;border-radius:4px;"
                                    placeholder="Nhập thông tin">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao</span>
                                <input id="date_delivery" readonly="readonly"
                                    class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2 flatpickr-input active"
                                    style="flex:2;" type="text">
                                <input type="hidden" id="hiddenDateDelivery" name="date_delivery" value="">
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    value="{{ Auth::user()->name }}" style="flex:2;" disabled>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhân viên</span>
                                <select name="id_sale"
                                    class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                    <option value=""></option>
                                    @foreach ($listUser as $listU)
                                        <option value="{{ $listU->id }}">{{ $listU->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Trạng thái</span>
                                <select name="status_receive"
                                    class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                    <option value="0" class="text-uppercase">Chưa nhận</option>
                                    <option value="2" class="text-uppercase">Đã nhận</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    name="note" style="flex:10; background-color:#F0F4FF;border-radius:4px;"
                                    placeholder="Nhập thông tin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div id="title--fixed" class="bg-filter-search text-center border-custom border-0">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM
                        </p>
                    </div>
                    <div class="content-info position-relative text-nowrap order_content">
                        <table id="inputcontent" class="table table-hover bg-white rounded">
                            <thead>
                                <tr style="height:44px;">
                                    <th class="border-right px-2 p-0" style="width: 16%">
                                        <input type='checkbox'
                                            class='checkall-btn ml-4 mr-1 text-left'id="checkall" />
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-left" style="width: 15%;z-index:99;">
                                        <span class="text-table text-secondary">Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-left" style="width: 8%;">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 13%;">
                                        <span class="text-table text-secondary">Đơn giá</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                        <span class="text-table text-secondary">KM</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-center" style="width: 8%;">
                                        <span class="text-table text-secondary">Thuế</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 11%;">
                                        <span class="text-table text-secondary">Thành tiền</span>
                                    </th>
                                    <th class="border-right note px-2 p-0 text-left" style="width: 15%;">
                                        <span class="text-table text-secondary">Ghi chú</span>
                                    </th>
                                    <th class=""></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($dataImport)
                                    @foreach ($dataImport as $item)
                                        <tr class="bg-white">
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="hidden" readonly value="{{ $item->id }}"
                                                    name="listProduct[]">
                                                {{-- <div
                                                class="d-flex w-100 justify-content-between align-items-center position-relative">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                        fill="#42526E" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                        fill="#42526E" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                        fill="#42526E" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                        fill="#42526E" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                        fill="#42526E" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                        fill="#42526E" />
                                                </svg>
                                                <input type="checkbox">
                                                <input type="text" name="product_code[]"
                                                    class="border-0 px-2 py-1 w-50 searchProduct"
                                                    value="{{ $item->product_code }}">
                                                <ul id="listProductCode"
                                                    class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; left: 24%; top: 75%;">
                                                </ul>
                                            </div> --}}

                                                <span class="ml-1 mr-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="6" height="10" viewBox="0 0 6 10" fill="none">
                                                        <g clip-path="url(#clip0_1710_10941)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                fill="#282A30"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1710_10941">
                                                                <rect width="6" height="10" fill="white">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <input type="checkbox" class="cb-element checkall-btn ml-1 mr-1">
                                                <input type="text" id="searchProduct"
                                                    class="border-0 pl-1 pr-2 py-1 w-50 height-32 searchProduct"
                                                    name="product_code[]" autocomplete="off">
                                            </td>
                                            <td
                                                class="border-right p-2 text-13 align-top position-relative border-bottom border-top-0">
                                                <input id="searchProductName" type="text" name="product_name[]"
                                                    class="searchProductName border-0 px-2 py-1 w-100 height-32"
                                                    value="{{ $item->product_name }}">
                                                <ul id="listProductName"
                                                    class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                </ul>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text" name="product_unit[]" required
                                                    class="border-0 px-2 py-1 w-100 product_unit height-32"
                                                    value="{{ $item->product_unit }}">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <div class="d-flex">
                                                    <input type="text" required=""
                                                        oninput="validateQtyInput1(this)"
                                                        class="border-0 px-2 py-1 w-100 quantity-input text-right height-32"
                                                        name="product_qty[]">
                                                </div>
                                                <div class="mt-3 text-13-blue inventory text-right">Tồn kho: <span
                                                        class="pl-1 soTonKho"
                                                        id="soTonKho">{{ is_int($item->product_inventory) ? $item->product_inventory : rtrim(rtrim(number_format($item->product_inventory, 4, '.', ''), '0'), '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <div>
                                                    <input type="text" required=""
                                                        value="{{ number_format($item->product_price_export) }}"
                                                        class="border-0 px-2 py-1 w-100 price_export text-right height-32"
                                                        name="price_export[]">
                                                </div>
                                                <div class="mt-3 text-13-blue transaction text-right" id="transaction"
                                                    data-toggle="modal" data-target="#recentModal">Giao dịch gần đây
                                                </div>
                                            </td>
                                            <input type="hidden" class="product_tax1">
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <select name="product_tax[]" id="" disabled
                                                    class="product_tax border-0 w-100 text-center height-32">
                                                    <option value="0"
                                                        @if ($item->product_tax == 0) selected @endif>0%
                                                    </option>
                                                    <option value="8"
                                                        @if ($item->product_tax == 8) selected @endif>8%
                                                    </option>
                                                    <option value="10"
                                                        @if ($item->product_tax == 10) selected @endif>
                                                        10%
                                                    </option>
                                                    <option value="99"
                                                        @if ($item->product_tax == 99) selected @endif>
                                                        NOVAT
                                                    </option>
                                                </select>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text"
                                                    class="border-0 px-2 py-1 w-100 total_price text-right height-32"
                                                    readonly="" name="total_price[]">
                                            </td>
                                            {{-- <td class="border p-0 bg-secondary"></td> --}}
                                            <td class="border-right note p-2 align-top border-bottom border-top-0">
                                                <input type="text" class="border-0 py-1 w-100 height-32 text-13-black"
                                                    name="product_note[]" placeholder="Nhập ghi chú">
                                            </td>
                                            <td class="p-2 align-top border-bottom border-top-0 user_flow" data-type="DMH"
                                                data-des="Xóa sản phẩm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
                                                    viewBox="0 0 16 15" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z"
                                                        fill="#6B6F76">
                                                    </path>
                                                </svg>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div class="ml-4 mt-1">
                            <span class="text-perpage">
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded user_flow"
                                                id="addRowTable" style="margin-right:10px" data-type="DMH"
                                                data-des="Thêm sản phẩm">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="12" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                        fill="#42526E"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                        fill="#42526E"></path>
                                                </svg>
                                                <span class="text-table">Thêm sản phẩm</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </span>
                        </div>
                        <x-formsynthetic :import="''"></x-formsynthetic>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <x-formprovides></x-formprovides>
    <x-form-modal-import title="Thêm mới người đại diện" name="addRepresent"
        idModal="modalAddRepresent"></x-form-modal-import>
    <x-form-modal-import title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-form-modal-import>
    <x-form-modal-import title="Chỉnh sửa nhà cung cấp" name="provide" idModal="editProvide"></x-form-modal-import>
    <x-form-modal-import title="Điều khoản thanh toán" name="termpay"
        idModal="formModalTermPay"></x-form-modal-import>
    {{-- <x-date-form-modal title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-date-form-modal> --}}
    <input type="hidden" name="total_bill" id="total_bill">
</form>
<div class="modal fade" id="recentModal" tabindex="-1" aria-labelledby="productModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="outer text-nowrap">
                    <table id="example2" class="table table-hover bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Ngày mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>


</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    flatpickr("#date_delivery", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateDelivery").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    getKeyProvide($('#getKeyProvide'));
    getKeyProvide($('#getKeyProvide1'));
    $(document).click(function(event) {
        if ((!$(event.target).closest("#searchRepresent").length && !$(event.target).closest('#represent')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listRepresent').hide();
        }
        if ((!$(event.target).closest('#price_effect').length && !$(event.target).closest('#searchPriceEffect')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listPriceEffect').hide();
        }
        if ((!$(event.target).closest('#terms_pay').length && !$(event.target).closest('#searchTermsPay')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listTermsPay').hide();
        }
    });

    $(document).on('click', '#myUL .search-info', function() {
        var provides_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                $('input[name="quotation_number"]').val(data['resultNumber']);
                $('#myInput').val(data['provide'].provide_name_display);
                $('#provides_id').val(data['provide'].id);
                $('.debt-old').val(formatCurrency(data['provide'].provide_debt));
                $.ajax({
                    url: "{{ route('getDataForm') }}",
                    type: "get",
                    data: {
                        id: data['provide'].id,
                        status: 'add'
                    },
                    success: function(data) {
                        $('#listRepresent li').empty();
                        $('#listPriceEffect li').empty();
                        $('#listTermsPay li').empty();
                        $('#represent').val('');
                        $('#price_effect').val('');
                        $('#terms_pay').val('')
                        if (data['default_price'][0]) {
                            $('#price_effect').val(data['default_price'][0].form_desc)
                        }
                        if (data['default_term'][0]) {
                            $('#terms_pay').val(data['default_term'][0].form_desc)
                        }

                        data['represent'].forEach(function(element) {
                            var li =
                                `<li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" id="` +
                                element.id + `">
                                        <a href="javascript:void(0)"
                                            class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent"
                                            id="` + element.id + `" name="search-represent">
                                            <span class="w-100 text-13-black">` + element.represent_name +
                                `</span>
                                        </a>
                                        <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                            <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                element.id + `" id="` + element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                            <a class="dropdown-item delete-item" href="#" data-id="` +
                                element.id +
                                `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                            <a class="dropdown-item set-default default-id aaa1" id="default-id` +
                                element.id +
                                `" href="#" data-name="represent" data-id="` +
                                element.id + `">
                                                                <i class="fa-solid fa-link-slash" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                    </li>`;
                            $('#listRepresent .p-1').after(li);
                            if (element.default == 1) {
                                $('#represent').val(element.represent_name);
                                $('#represent_id').val(element.id);
                            }
                        });

                        data['price_effect'].forEach(function(element) {
                            var li =
                                `
                            <li class="p-2 align-items-center text-wrap border-top border-bottom rounded" id="` +
                                element.id + `">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect"
                                    id="` + element.id + `" name="search-price-effect">
                                    <span class="w-100 text-13-black overflow-hidden">` + element.form_name + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="priceeffect"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="price_effect"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listPriceEffect .p-1').after(li);
                        });

                        data['terms_pay'].forEach(function(element) {
                            var li =
                                `
                            <li class="p-2 align-items-center text-wrap border-top border-bottom" id="` + element.id + `">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay"
                                    id="` + element.id + `" name="search-term-pay">
                                    <span class="w-100 text-13-black overflow-hidden">` + element.form_name + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="termpay"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="termpay"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listTermsPay .p-1').after(li);
                        });
                    }
                })
                $('#more_info').show();
                $('#more_info1').show();
            }
        });
    });

    function showData(classname, inputShow, inputHide) {
        $(document).on('click', '.' + classname, function(e) {
            e.preventDefault();
            id = $(this).attr('id');
            table = $(this).attr('name');
            $.ajax({
                url: "{{ route('showData') }}",
                type: "get",
                data: {
                    id: id,
                    table: table,
                },
                success: function(data) {
                    if (data['table'] == "search-represent") {
                        $('#' + inputShow).val(data[table].represent_name)
                        $('#' + inputHide).val(data[table].id)
                    } else {
                        $(data['table'] == "search-price-effect" ? '#price_effect' : '#terms_pay')
                            .val(data[table].form_desc).attr('data-id', id)
                    }
                }
            })
        })
    }



    showData('search-represent', 'represent', 'represent_id')
    showData('search-price-effect', 'price_effect', '')
    showData('search-term-pay', 'terms_pay', '')

    // Ghim 
    $(document).on('click', '.set-default', function() {
        id = $(this).attr('data-id');
        form = $(this).attr('data-name');
        provides_id = $('#provides_id').val();
        $.ajax({
            url: "{{ route('setDefault') }}",
            type: "get",
            data: {
                id: id,
                provides_id: provides_id,
                form: form
            },
            success: function(data) {
                if (data['represent']) {
                    $('#represent').val(data['represent'].represent_name)
                    $('#represent_id').val(data['represent'].id)
                    $('#listRepresent').hide()
                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: (data.status == 1 ? "Ghim người đại diện" :
                                "Xóa ghim người đại diện")
                        },
                        success: function(data) {}
                    })
                } else {
                    $(data['price_effect'] ? '#price_effect' : '#terms_pay').val((data[
                            'price_effect'] ?
                        data['price_effect'] : data['termpay']).form_desc)
                    $(data['price_effect'] ? '#listPriceEffect' : '#listTermsPay').hide()
                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: (data['price_effect'] ?
                                (data.status == 1 ? "Ghim hiệu lực báo giá" :
                                    "Xóa ghim hiệu lực báo giá") :
                                (data.status == 1 ? "Ghim điều khoản thanh toán" :
                                    "Xóa ghim điều khoản thanh toán"))
                        },
                        success: function(data) {}
                    })
                }
            }
        })
    })

    // Xóa người đại diện
    $(document).on('click', '.delete-item', function() {
        id = $(this).attr('data-id')
        table = $(this).attr('data-name')
        $.ajax({
            url: "{{ route('deleteForm') }}",
            type: "get",
            data: {
                id: id,
                table: table
            },
            success: function(data) {
                if (data.success) {
                    if (data.list == "represent") {
                        var inputName = $('#represent')
                    } else if (data.list == "listPriceEffect") {
                        var inputName = $('#price_effect')
                    } else {
                        var inputName = $('#terms_pay')
                    }
                    if (data.id == $(inputName).attr('data-id')) {
                        $(inputName).val('')
                    }
                    $('#' + data.list + ' li#' + data.id).remove();
                    showAutoToast('success', data.msg)

                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: "Xóa người đại diện"
                        },
                        success: function(data) {}
                    })
                } else {
                    showAutoToast('warning', data.msg)
                }
            }
        })
    })

    // Chỉnh sửa thông tin
    $(document).on('click', '.search-date-form', function() {
        var id = $(this).data('id');
        var table = $(this).attr('data-name')
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                    table: table
                },
                success: function(data) {
                    if (data['represent']) {
                        $('input[name="provide_represent_new"]').val(data['represent']
                            .represent_name)
                        $('input[name="provide_email_new"]').val(data['represent'].represent_email)
                        $('input[name="provide_phone_new"]').val(data['represent'].represent_phone)
                        $('input[name="provide_address_delivery_new"]').val(data['represent']
                            .represent_address)
                        $('#modalAddRepresent #exampleModalLabel').text('Cập nhật')
                        $('#addRepresent').attr('data-id', data['represent'].id).text('Cập nhật')
                    } else {
                        $('#form-name-' + data['table']).val(data[data['table']].form_name)
                        $('#form-desc-' + data['table']).val(data[data['table']].form_desc)
                        $('#form_field').val(data[data['table']].form_field)
                        $('#formModalquote #exampleModalLabel').text('Cập nhật')
                        $('#' + data['table']).attr('data-id', data[data['table']].id).text(
                            'Cập nhật')
                    }
                }
            })
        }
    })

    // Chỉnh sửa nhà cung cấp
    $(document).on('click', '.search-infoEdit', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                },
                success: function(data) {
                    $('#editProvide input[name="provide_name_display"]').val(data
                        .provide_name_display)
                    $('#editProvide input[name="provide_code"]').val(data.provide_code)
                    $('#editProvide input[name="provide_address"]').val(data.provide_address)
                    $('#editProvide input[name="key"]').val(data.key)
                    $('#editProvide input[name="provide_name"]').val(data.provide_name)
                    $('#editProvide #editProvide').attr('data-id', data.id)
                }
            })
        }
    })

    $('.modal-dialog #editProvide').on('click', function(e) {
        e.preventDefault();
        var id = $('.modal-dialog #editProvide').data('id');
        var check = false;
        var provide_name_display = $("#editProvide input[name='provide_name_display']").val().trim();
        var provide_code = $("#editProvide input[name='provide_code']").val().trim();
        var provide_address = $("#editProvide input[name='provide_address']").val().trim();
        var key = $("#editProvide input[name='key']").val().trim();
        var provide_name = $("#editProvide input[name='provide_name']").val().trim();
        if (provide_name_display == '') {
            showAutoToast('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showAutoToast('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showAutoToast('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
            check = true;
            return false;
        }
        if (!check) {
            $.ajax({
                url: "{{ route('updateProvide') }}",
                type: "get",
                data: {
                    id: id,
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    provide_name: provide_name,
                },
                success: function(data) {
                    if (data.success) {
                        $('.btn.btn-secondary').click()
                        if (data.provide_id == $('#provides_id').val()) {
                            $('#myInput').val(provide_name_display)
                            $("input[name='provide_name_display']").val(data.resultNumber)
                        }
                        $('#myUL ul li').find('a#' + data.provide_id + " span").text(
                            provide_name_display)
                        $("#editProvide input[name='provide_name_display']").val('')
                        $("#editProvide input[name='provide_code']").val('')
                        $("#editProvide input[name='provide_address']").val('')
                        $("#editProvide input[name='key']").val('')
                        $("#editProvide input[name='provide_name']").val('')
                        showAutoToast('success', 'Chỉnh sửa thông tin thành công !')


                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Chỉnh sửa nhà cung cấp"
                            },
                            success: function(data) {}
                        })
                    } else {
                        showAutoToast('warning', 'Nhà cung cấp đã tồn tại !')
                    }
                }
            })
        }
    })


    $('#addProvide').click(function() {
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var key = $("input[name='key']").val().trim();
        var provide_name = $("input[name='provide_name']").val().trim();
        var provide_represent = $("input[name='provide_represent']").val().trim();
        var provide_email = $("input[name='provide_email']").val().trim();
        var provide_phone = $("input[name='provide_phone']").val().trim();
        var provide_address_delivery = $("input[name='provide_address_delivery']").val().trim();
        if (provide_name_display == '') {
            showAutoToast('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showAutoToast('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showAutoToast('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
            check = true;
            return false;
        }
        if (!check) {
            $.ajax({
                url: "{{ route('addNewProvide') }}",
                type: "get",
                data: {
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    provide_name: provide_name,
                    provide_represent: provide_represent,
                    provide_email: provide_email,
                    provide_phone: provide_phone,
                    provide_address_delivery: provide_address_delivery
                },
                success: function(data) {
                    $('#listPriceEffect li').empty();
                    $('#listTermsPay li').empty();
                    if (data.success == true) {
                        // quotation = getQuotation(data.key, '1')
                        quotation = data.resultNumber
                        // Thêm nhà cung cấp vào danh sách
                        if (data.id) {
                            var newLi = `
                            <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" style="flex:2" id="` + data.id + `" name="search-info" class="search-info">
                                                <span class="text-13-black">` + data.name +
                                `</span>
                                            </a>
                                            <a id="" class="search-infoEdit" type="button" data-toggle="modal" data-target="#editProvide" data-id="` +
                                data.id + `">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"></path>
                                                        <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"></path>
                                                        <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>
                            `;
                            $('#myUL .p-1').after(newLi)
                        }
                        $('#myInput').val(data.name);
                        $('#provides_id').val(data.id);
                        $('input[name="quotation_number"]').val(quotation);
                        $('.modal [data-dismiss="modal"]').click();
                        showAutoToast('success', data.msg)
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='key']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                        // Thêm hiệu lực báo giá vào danh sách
                        if (data.price_effect) {
                            data.price_effect.forEach(function(element) {
                                var li = `
                            <li class="p-2 align-items-center text-wrap border-top border-bottom rounded" id="` +
                                    element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                    element.id + `" name="search-price-effect">
                                    <span class="w-100 text-13-black overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                    element.id + `" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` +
                                    element.id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` +
                                    element.form_name + `" id="default-id` +
                                    element.id + `" href="#" data-name="import" data-id="` +
                                    element.id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listPriceEffect .p-1').after(li);
                            })

                        }

                        // Thêm điều khoản thanh toán
                        if (data.terms_pay) {
                            data.terms_pay.forEach(function(element) {
                                var li = `
                                <li class="p-2 align-items-center text-wrap border-top border-bottom" id="` + element
                                    .id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                    element.id + `" name="search-term-pay">
                                    <span class="w-100 text-13-black overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="2" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + element.id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc +
                                    `" id="default-id` + element.id +
                                    `" href="#" data-name="termpay" data-id="` + element
                                    .id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listTermsPay .p-1').after(li);
                            })

                        }

                        // Thêm người đại diện
                        if (data.id_represent) {
                            $('#represent').val(data.represent_name)
                            $('#represent_id').val(data.id_represent)
                            var newli = `
                                    <li class="border" id="` + data.id_represent +
                                `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                data.id_represent + `" name="search-represent">
                                        <span class="w-100 text-13-black overflow-hidden">` + data
                                .represent_name +
                                `</span>
                                    </a>
                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                data.id_represent + `" id="` + data.id_represent + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id_represent + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.represent_name +
                                `" id="default-id` + data.id_represent +
                                `" href="#" data-name="represent" data-id="` + data.id_represent + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                            $('#listRepresent .p-1').after(newli)
                        }

                        $('#more_info').show();
                        $('#more_info1').show();

                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Thêm mới nhà cung cấp"
                            },
                            success: function(data) {}
                        })
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showAutoToast('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showAutoToast('warning', data.msg)
                        }
                    }
                }
            });
        }
    });


    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showAutoToast(type, message);
        }, delayTime);
    }

    $(document).on('click', '.closeModal', function(e) {
        e.preventDefault();
        $("input[name='provide_represent_new']").val('')
        $("input[name='provide_email_new']").val('')
        $("input[name='provide_phone_new']").val('')
        $("input[name='provide_address_delivery_new']").val('')
        $("input[name='form-name-import']").val('')
        $("input[name='form-desc-import']").val('')
    })


    function actionForm(id, routeAdd, routeEdit) {
        $('#' + id).click(function() {
            var status = $(this).text().trim();
            var provide_represent = $("input[name='provide_represent_new']").val().trim();
            var provide_email = $("input[name='provide_email_new']").val().trim();
            var provide_phone = $("input[name='provide_phone_new']").val().trim();
            var provide_address_delivery = $("input[name='provide_address_delivery_new']").val().trim();

            if (status == 'Thêm mới') {
                if ((provides_id == "" || provide_represent == "") && id == 'addRepresent') {
                    showAutoToast('warning', 'Vui lòng nhập tên người đại diện')
                } else {
                    if (id == 'addRepresent') {
                        provides_id = $('#provides_id').val();
                        $.ajax({
                            url: routeAdd,
                            type: "get",
                            data: {
                                table: id,
                                provides_id: provides_id,
                                provide_represent: provide_represent,
                                provide_email: provide_email,
                                provide_phone: provide_phone,
                                provide_address_delivery: provide_address_delivery
                            },
                            success: function(data) {
                                if (data.success) {
                                    $("input[name='provide_represent_new']").val('')
                                    $("input[name='provide_email_new']").val('')
                                    $("input[name='provide_phone_new']").val('')
                                    $("input[name='provide_address_delivery_new']").val('')
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
                                    $('#represent_id').val(data.id)
                                    $('#represent').val(data.data)
                                    var newli = `
                                    <li class="border" id="` + data.id +
                                        `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                        data.id + `" name="search-represent">
                                        <span class="w-100 text-13-black overflow-hidden">` + data.data +
                                        `</span>
                                    </a>

                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                        data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.data +
                                        `" id="default-id` + data.id +
                                        `" href="#" data-name="represent" data-id="` + data.id + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                                    $('#listRepresent .p-1').after(newli)
                                }
                                showAutoToast('success', data.msg)

                                $.ajax({
                                    url: "{{ route('addUserFlow') }}",
                                    type: "get",
                                    data: {
                                        type: "DMH",
                                        des: "Thêm mới người đại diện"
                                    },
                                    success: function(data) {}
                                })
                            }
                        })
                    } else {
                        inputName = $('#form-name-' + id).val().trim();
                        inputDesc = $('#form-desc-' + id).val()
                        if (inputName == "" || inputDesc == "") {
                            inputName == "" ? showAutoToast('warning', 'Vui lòng nhập tên biểu mẫu') :
                                showAutoToast('warning', 'Vui lòng nhập nội dung')
                        } else {
                            $.ajax({
                                url: routeAdd,
                                type: "get",
                                data: {
                                    table: id,
                                    inputName: inputName,
                                    inputDesc: inputDesc,
                                },
                                success: function(data) {
                                    if (data.success) {
                                        $('#form-name-' + id).val('')
                                        $('#form-desc-' + id).val('')
                                        $('#' + id).closest('div').find('.closeModal')[0].click()
                                        $(id == "import" ? '#price_effect' : '#terms_pay').val(data
                                            .data);
                                        $(id == "import" ? '#price_effect' : '#terms_pay').attr(
                                            'data-id', data.id);
                                        if (id == "import") {
                                            var price_effect =
                                                `
                                        <li class="p-2 align-items-center text-wrap border-top border-bottom rounded" id="` +
                                                data
                                                .id +
                                                `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                                data.id + `" name="search-price-effect">
                                                <span class="w-100 text-13-black overflow-hidden">` + data
                                                .inputName +
                                                `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                                data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                                .id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                                `" id="default-id` + data.id +
                                                `" href="#" data-name="import" data-id="` + data
                                                .id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                        } else {
                                            var term_pay = `
                                        <li class="p-2 align-items-center text-wrap border-top border-bottom" id="` +
                                                data.id +
                                                `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                                data.id + `" name="search-term-pay">
                                                <span class="w-100 text-13-black overflow-hidden">` + data
                                                .inputName +
                                                `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                                data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                                .id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                                `" id="default-id` + data.id +
                                                `" href="#" data-name="termpay" data-id="` + data
                                                .id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                        }
                                        $(id == "import" ? $('#listPriceEffect .p-1').after(
                                            price_effect) : $('#listTermsPay .p-1').after(
                                            term_pay))
                                        showAutoToast('success', data.msg)

                                        $.ajax({
                                            url: "{{ route('addUserFlow') }}",
                                            type: "get",
                                            data: {
                                                type: "DMH",
                                                des: (id == "import" ?
                                                    "Thêm mới hiệu lực báo giá" :
                                                    "Thêm mới điều khoản")
                                            },
                                            success: function(data) {}
                                        })

                                    } else {
                                        showAutoToast('warning', data.msg)
                                    }
                                }
                            })
                        }
                    }
                }
            } else {
                present_id = $(this).attr('data-id');
                if (id == 'addRepresent') {
                    $.ajax({
                        url: routeEdit,
                        type: "get",
                        data: {
                            table: id,
                            present_id: present_id,
                            provide_represent: provide_represent,
                            provide_email: provide_email,
                            provide_phone: provide_phone,
                            provide_address_delivery: provide_address_delivery
                        },
                        success: function(data) {
                            if (data.success) {
                                if ($('#represent_id').val() == data.id) {
                                    $('#represent').val(data.data)
                                }
                                $('#listRepresent').find('li#' + data.id + ' span').text(data.data)
                                $('#' + id).closest('div').find('.closeModal')[0].click()
                                showAutoToast('success', data.msg)

                                $.ajax({
                                    url: "{{ route('addUserFlow') }}",
                                    type: "get",
                                    data: {
                                        type: "DMH",
                                        des: "Chỉnh sửa người đại diện"
                                    },
                                    success: function(data) {}
                                })

                            } else {
                                showAutoToast('warning', data.msg)
                            }
                        }
                    })
                } else {
                    inputName = $('#form-name-' + id).val().trim();
                    inputDesc = $('#form-desc-' + id).val()
                    inputField = $('#form_field').val()
                    if (inputName == "" || inputDesc == "") {
                        inputName == "" ? showAutoToast('warning', 'Vui lòng nhập tên biểu mẫu') :
                            showAutoToast('warning', 'Vui lòng nhập nội dung')
                    } else {
                        $.ajax({
                            url: routeEdit,
                            type: "get",
                            data: {
                                table: id,
                                present_id: present_id,
                                inputName: inputName,
                                inputDesc: inputDesc,
                                inputField: inputField
                            },
                            success: function(data) {
                                if (data.success) {
                                    var get_dataID = (inputField == "import" ? $('#price_effect')
                                        .data(
                                            'id') : $('#terms_pay').data('id'))
                                    if (get_dataID != null) {
                                        if (get_dataID == data.id) {
                                            $('#' + (inputField == "import" ? "price_effect" :
                                                    "terms_pay"))
                                                .val(data.form_desc)
                                        }
                                    }
                                    $('#' + (inputField == "import" ? "listPriceEffect" :
                                        "listTermsPay")).find(
                                        'li#' + data.id + " span").text(data.form_name)
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
                                    showAutoToast('success', data.msg)

                                    $.ajax({
                                        url: "{{ route('addUserFlow') }}",
                                        type: "get",
                                        data: {
                                            type: "DMH",
                                            des: (id == "import" ?
                                                "Chỉnh sửa hiệu lực báo giá" :
                                                "Chỉnh sửa điều khoản")
                                        },
                                        success: function(data) {}
                                    })
                                } else {
                                    showAutoToast('warning', data.msg)
                                }
                            }
                        })
                    }

                }
            }
        })

    }

    function getAc(button) {
        return $(button).attr('id');
    }

    actionForm('addRepresent', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('import', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('termpay', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')

    function getProduct(name) {
        $('#inputcontent tbody tr .' + name).on('click', function() {
            listProductName = $(this).closest('tr').find('#listProductName');
            inputCode = $(this).closest('tr').find('.searchProduct');
            inputName = $(this).closest('tr').find('.searchProductName');
            inputUnit = $(this).closest('tr').find('.product_unit');
            inputPriceExprot = $(this).closest('tr').find('.price_export');
            inputRatio = $(this).closest('tr').find('.product_ratio');
            inputPriceImport = $(this).closest('tr').find('.price_import');
            selectTax = $(this).closest('tr').find('.product_tax');
            $.ajax({
                url: "{{ route('showProductName') }}",
                type: "get",
                success: function(data) {
                    listProductName.empty();
                    data.forEach(element => {
                        var UL = '<li class="w-100">' +
                            '<a data-unit="' + element
                            .product_unit +
                            '" data-code="' + element
                            .product_code +
                            '" data-priceExport= "' +
                            element.product_price_export +
                            '" data-ratio="' + element
                            .product_ratio +
                            '" data-priceImport="' + element
                            .product_price_import +
                            '" href="javascript:void(0)" class="text-dark d-flex w-100 justify-content-between p-2 search-name" id="' +
                            element.id +
                            '" data-tax="' + element
                            .product_tax +
                            '" name="search-product">' +
                            '<span class="w-100 text-13-black" data-id="' +
                            element.id + '">' + element
                            .product_name + '</span>' +
                            '</a>' +
                            '</li>';
                        listProductName.append(UL);
                    })
                    $('.search-name').on('click', function() {
                        var currentTr = $(this);
                        inputCode.val($(this).attr('data-code') == "null" ? "" : $(this)
                            .attr('data-code'));
                        inputName.val($(this).closest('li').find('span').text());
                        inputUnit.val($(this).attr('data-unit') == "null" ? "" : $(this)
                            .attr('data-unit'));
                        // inputPriceExprot.val($(this).attr('data-priceExport') == "null" ?
                        //     "" : formatCurrency($(this).attr('data-priceExport')))
                        inputPriceExprot.val('')
                        inputRatio.val($(this).attr('data-ratio') == "null" ? "" : $(this)
                            .attr('data-ratio'))
                        inputPriceImport.val($(this).attr('data-priceImport') == "null" ?
                            "" : formatCurrency($(this).attr('data-priceImport')))
                        selectTax.val($(this).attr('data-tax'))
                        listProductName.hide();
                        var product_name = $(this).find("span").text()
                        $.ajax({
                            url: "{{ route('getInventory') }}",
                            type: "get",
                            data: {
                                product_name: product_name,
                            },
                            success: function(data) {
                                $(currentTr).closest('tr').find('#soTonKho')
                                    .text(
                                        formatCurrency(data[
                                            'products'].product_inventory))
                                $('.transaction').on('click', function() {
                                    nameProduct = $(this).closest('tr')
                                        .find('.searchProductName')
                                        .val()
                                    $.ajax({
                                        url: "{{ route('getHistoryImport') }}",
                                        type: "get",
                                        data: {
                                            product_name: nameProduct,
                                        },
                                        success: function(
                                            data) {
                                            $('#recentModal .modal-body tbody')
                                                .empty()
                                            if (data[
                                                    'history'
                                                ]) {
                                                data[
                                                        'history'
                                                    ]
                                                    .forEach(
                                                        element => {
                                                            var tr = `
                                            <tr>
                                                <td>` + element.product_name + `</td>
                                                <td>` + formatCurrency(element.price_export) + `</td>
                                                <td>` + (element.product_tax == 99 ? "NOVAT" : element.product_tax + "%") + `</td>
                                                <td>` + new Date(element.created_at).toLocaleDateString('vi-VN'); + `</td>
                                            </tr> `;
                                                            $('#recentModal .modal-body tbody')
                                                                .append(
                                                                    tr
                                                                );
                                                        })
                                            }
                                        }
                                    })
                                })
                            }
                        })
                    })
                }
            })
        })
    }


    $('.project_name').on('click', function() {
        var project_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_project') }}",
            type: "get",
            data: {
                project_id: project_id
            },
            success: function(data) {
                $('#inputProject').val(data.project_name);
                $('#project_id').val(data.id);
            }
        })
    })

    $('form').on('submit', function(e) {
        e.preventDefault();
        var formSubmit = true;
        if ($('#provides_id').val() == '') {
            formSubmit = false;
            showAutoToast('warning', 'Vui lòng chọn nhà cung cấp')
            return false;
        }
        if ($('#inputcontent tbody tr').length < 1) {
            formSubmit = false;
            showAutoToast('warning', 'Vui lòng thêm ít nhất 1 sản phẩm')
            return false;
        }

        if (!checkProduct()) {
            formSubmit = false;
        }
        if (!checkQtyProduct()) {
            formSubmit = false;
            showAutoToast('warning', 'Vui lòng nhập số lượng sản phẩm lớn hơn 0')
        }

        var quotetion_number = $('input[name="quotation_number"]').val();
        if (formSubmit) {
            provide_id = $('#provides_id').val();
            $('.product_tax').prop('disabled', false);
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    provide_id: provide_id
                },
                success: function(data) {
                    if (!data['status']) {
                        showAutoToast('warning', 'Số báo giá đã tồn tại')
                    } else {
                        var listName = [];
                        var listTax = [];
                        // Kiểm tra sản phẩm trùng thuế

                        var rows = $('#inputcontent tbody tr');
                        rows.each(function() {
                            listName.push($(this).find('.searchProductName').val())
                            listTax.push($(this).find('.product_tax').val())
                        })
                        $.ajax({
                            url: "{{ route('checkProductTax') }}",
                            type: "get",
                            data: {
                                listName: listName,
                                listTax: listTax
                            },
                            success: function(data) {
                                if (data.status == false) {
                                    if (data.type) {
                                        showAutoToast('warning', data.msg);
                                    } else {
                                        showAutoToast('warning', data.msg);
                                        delayAndShowNotification('success',
                                            "Đã cập nhật lại thuế cho sản phẩm :" +
                                            data.product_name + "",
                                            500);
                                        rows.each(function() {
                                            if ($(this).find(
                                                    '.searchProductName')
                                                .val() == data.product_name) {
                                                $(this).find('.product_tax')
                                                    .val(
                                                        data.product_tax)
                                            }
                                        })
                                    }
                                    updateTaxAmount()
                                    calculateTotalAmount()
                                    calculateTotalTax()
                                    calculateGrandTotal()
                                } else {
                                    $.ajax({
                                        url: "{{ route('addUserFlow') }}",
                                        type: "get",
                                        data: {
                                            type: "DMH",
                                            des: "Tạo mới đơn mua hàng"
                                        },
                                        success: function(data) {}
                                    })
                                    $('form')[1].submit();
                                }
                            }
                        })
                    }
                }
            })
        }
    })

    $(document).on('click', '.searchWarehouse', function(e) {
        e.preventDefault();

        var position = $(this);
        $.ajax({
            url: "{{ route('getWarehouse') }}",
            type: "get",
            data: {},
            success: function(data) {
                $(position).closest('tr').find('#listWarehouse li').remove()
                data.forEach(item => {
                    var li = `
                        <li class="w-100">
                            <a data-id="` + item.id + `" data-value="` + item.warehouse_name + `"
                            href="javascript:void(0)" 
                            class="text-dark d-flex w-100 justify-content-between p-2 search-warehouse" 
                            name="search-warehouse">
                            <span class="w-100 text-13-black">` + item.warehouse_name + `</span>
                            </a>
                        </li>`;
                    $(position).closest('tr').find('#listWarehouse').append(li);
                });
            }
        })
    })

    $(document).on('click', '.search-warehouse', function() {
        var tr = $(this).closest('tr');
        $(tr).find('#searchWarehouse').val($(this).data('value'));
        $(tr).find('.warehouse_id').val($(this).data('id'));
        $(tr).find('#listWarehouse').hide();
    })

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
</body>

</html>
