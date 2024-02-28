<x-navbar :title="$title" activeGroup="sell" activeName="delivery" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('delivery.update', ['workspace' => $workspacename, 'delivery' => $delivery->soGiaoHang]) }}"
    method="POST" id="deliveryForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $delivery->soGiaoHang }}">
    <input type="hidden" name="table_name" value="GH">
    <input type="hidden" name="detailexport_id" id="detailexport_id" value="{{ $delivery->detailexport_id }}">
    <div class="content-wrapper1 py-2 border border-top-0 border-left-0 border-right-0">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn giao hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">{{ $delivery->code_delivery }}</span>
                    @if ($delivery->tinhTrang == 1)
                        <span class="border ml-2 p-1 text-nav text-secondary shadow-sm rounded">Chưa giao</span>
                    @else
                        <span class="border ml-2 p-1 text-nav text-primary shadow-sm rounded">Đã giao</span>
                    @endif
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('delivery.index', ['workspace' => $workspacename]) }}">
                            <button type="button" class="btn-save-print d-flex align-items-center h-100 mr-2 rounded"
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
                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 14 14" fill="none">
                            <path
                                d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                fill="white" />
                        </svg>
                        <span>Đính kèm file</span>
                        <input type="file" style="display: none;" id="file_restore" accept="*" name="file">
                    </label>
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                            style="margin-right:10px;">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="{{ route('pdfdelivery', $delivery->soGiaoHang) }}">Xuất
                                PDF</a>
                        </div>
                    </div>
                    @if ($delivery->tinhTrang !== 2)
                        <div class="dropdown">
                            <button type="submit" id="submitXacNhan" name="action" value="action_1"
                                class="btn-save-print rounded d-flex align-items-center h-100"
                                onclick="kiemTraFormGiaoHang(event)" style="margin-right:10px">
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">Xác nhận</span>
                            </button>
                        </div>
                    @endif
                    <button name="action" value="action_2" type="submit" id="xoaBtn"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        class="custom-btn-danger d-flex align-items-center h-100 py-1 px-2" style="margin-right:10px">
                        <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                fill="white" />
                        </svg>
                        <span>Xóa</span>
                    </button>
                    <div id="sideGuest">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA"></rect>
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content-wrapper1 p-2 position-relative">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
                <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông tin</a>
                </li>
                <li class="text-nav"><a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch sử</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
                </li>
            </ul>
            <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
            </div>
        </div>
    </section>
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-bottom-0 text-center py-2 border-right-0">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                    </div>
                    <section class="content">
                        <div class="container-fluided order_content">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="note p-1">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item_quote)
                                        <tr class="bg-white addProduct">
                                            <td
                                                class="border border-left-0 border-top-0 border-bottom-0 border position-relative">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_code }}"
                                                        class="border-0 px-2 py-1 w-75 product_code"
                                                        name="product_code[]">
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex align-items-center">
                                                    <input type="text" value="{{ $item_quote->product_name }}"
                                                        class="border-0 px-2 py-1 w-100 product_name" readonly
                                                        autocomplete="off" name="product_name[]">
                                                    <input type="hidden" class="product_id"
                                                        value="{{ $item_quote->product_id }}" autocomplete="off"
                                                        name="product_id[]">
                                                    <div class="info-product" data-toggle="modal"
                                                        data-target="#productModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1704_35239)">
                                                                <path
                                                                    d="M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z"
                                                                    fill="#282A30"></path>
                                                                <path
                                                                    d="M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z"
                                                                    fill="#282A30"></path>
                                                                <path
                                                                    d="M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z"
                                                                    fill="#282A30"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1704_35239">
                                                                    <rect width="16" height="16"
                                                                        fill="white"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" autocomplete="off" readonly
                                                    value="{{ $item_quote->product_unit }}"
                                                    class="border-0 px-2 py-1 w-100 product_unit"
                                                    name="product_unit[]">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <input type="text" readonly
                                                            data-row="row{{ $item_quote->product_id }}"
                                                            value="{{ is_int($item_quote->deliver_qty) ? $item_quote->deliver_qty : rtrim(rtrim(number_format($item_quote->deliver_qty, 4, '.', ''), '0'), '.') }}"
                                                            class="border-0 px-2 py-1 w-100 quantity-input"
                                                            autocomplete="off" name="product_qty[]">
                                                        <input type="hidden" class="tonkho">
                                                        <p class="text-primary text-center position-absolute inventory"
                                                            style="top: 68%;">Tồn kho:
                                                            <span
                                                                class="soTonKho">{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="">
                                                        <a href="#" class="btn btn-primary sn1"
                                                            data-row="row{{ $item_quote->product_id }}"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{ $item_quote->product_id }}"
                                                            style="background:transparent; border:none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <rect width="32" height="32" rx="4"
                                                                    fill="white">
                                                                </rect>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                                    fill="#0095F6"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                                    fill="#0095F6"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                                    fill="#0095F6"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                                    fill="#0095F6"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative d-none">
                                                <input type="text"
                                                    value="{{ number_format($item_quote->price_export) }}"
                                                    class="border-0 px-2 py-1 w-100 product_price" autocomplete="off"
                                                    name="product_price[]" readonly>
                                                <p class="text-primary text-right position-absolute transaction"
                                                    style="top: 68%; right: 5%; display: none;">Giao dịch
                                                    gần đây
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 px-4 d-none">
                                                <select name="product_tax[]" class="border-0 text-center product_tax"
                                                    disabled>
                                                    <option value="0" <?php if ($item_quote->product_tax == 0) {
                                                        echo 'selected';
                                                    } ?>>0%</option>
                                                    <option value="8" <?php if ($item_quote->product_tax == 8) {
                                                        echo 'selected';
                                                    } ?>>8%</option>
                                                    <option value="10" <?php if ($item_quote->product_tax == 10) {
                                                        echo 'selected';
                                                    } ?>>10%</option>
                                                    <option value="99" <?php if ($item_quote->product_tax == 99) {
                                                        echo 'selected';
                                                    } ?>>NOVAT
                                                    </option>
                                                </select>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 d-none">
                                                <input type="text" readonly=""
                                                    value="{{ number_format($item_quote->product_total) }}"
                                                    class="border-0 px-2 py-1 w-100 total-amount">
                                            </td>
                                            <td class="border-top border-secondary p-0 bg-secondary Daydu d-none"
                                                style="width:1%;"></td>
                                            <td
                                                class="border border-top-0 border-bottom-0 position-relative product_ratio d-none">
                                                <input type="text" class="border-0 px-2 py-1 w-100 heSoNhan"
                                                    autocomplete="off" required="required" readonly
                                                    value="{{ $item_quote->product_ratio }}" name="product_ratio[]">
                                            </td>
                                            <td
                                                class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                <input type="text" class="border-0 px-2 py-1 w-100 giaNhap"
                                                    readonly autocomplete="off" required="required"
                                                    name="price_import[]"
                                                    value="{{ number_format($item_quote->price_import) }}">
                                            </td>
                                            <td
                                                class="border border-top-0 border-bottom-0 border-right-0 position-relative note p-1">
                                                <input type="text" class="border-0 py-1 w-100" readonly
                                                    name="product_note[]" value="{{ $item_quote->product_note }}">
                                            </td>
                                            <td style="display:none;" class="">
                                                <input type="text" class="product_tax1">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="content">
                        <div class="container-fluided">
                            <div class="row position-relative footer-total m-0">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="mt-4 w-50" style="float: right;">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-table"><b>Giá trị trước thuế:</b></span>
                                            <span id="total-amount-sum" class="text-table">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 align-items-center">
                                            <span class="text-table"><b>Thuế VAT:</b></span>
                                            <span id="product-tax" class="text-table">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="text-lg"><b>Tổng cộng:</b></span>
                                            <span><b id="grand-total" data-value="0">0đ</b></span>
                                            <input type="text" hidden="" name="totalValue" value="0"
                                                id="total">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="history" class="tab-pane fade">
                    <div class="bg-filter-search border-bottom-0 border-right-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">LỊCH SỬ</span>
                    </div>
                    <section class="content">
                        <div class="container-fluided order_content">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right text-table text-secondary">
                                            Mã sản phẩm
                                        </th>
                                        <th class="border-right text-table text-secondary">Tên sản phẩm</th>
                                        <th class="border-right text-table text-secondary">Đơn vị</th>
                                        <th class="border-right text-table text-secondary">Số lượng</th>
                                        <th class="border-right text-table text-secondary">Đơn giá</th>
                                        <th class="border-right text-table text-secondary">Thuế</th>
                                        <th class="border-right text-table text-secondary">Thành tiền</th>
                                        <th class="note text-table text-secondary">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quoteExport as $item_quote)
                                        <tr class="bg-white">
                                            <td
                                                class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_code }}"
                                                        class="border-0 px-2 py-1 w-75 product_code">
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex align-items-center">
                                                    <input type="text" value="{{ $item_quote->product_name }}"
                                                        class="border-0 px-2 py-1 w-100 product_name" readonly
                                                        autocomplete="off">
                                                    <input type="hidden" class="product_id"
                                                        value="{{ $item_quote->product_id }}" autocomplete="off">
                                                    <div class="info-product" data-toggle="modal"
                                                        data-target="#productModal">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z"
                                                                fill="#42526E">
                                                            </path>
                                                            <path
                                                                d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z"
                                                                fill="#42526E">
                                                            </path>
                                                            <path
                                                                d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z"
                                                                fill="#42526E">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" autocomplete="off" readonly
                                                    value="{{ $item_quote->product_unit }}"
                                                    class="border-0 px-2 py-1 w-100 product_unit">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input type="text" readonly
                                                    value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                    class="border-0 px-2 py-1 w-100 quantity-input"
                                                    autocomplete="off">
                                                <input type="hidden" class="tonkho">
                                                <p class="text-primary text-center position-absolute inventory"
                                                    style="top: 68%; display: none;">Tồn kho:
                                                    <span class="soTonKho">35</span>
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input type="text"
                                                    value="{{ number_format($item_quote->price_export) }}"
                                                    class="border-0 px-2 py-1 w-100 product_price" autocomplete="off"
                                                    readonly>
                                                <p class="text-primary text-right position-absolute transaction"
                                                    style="top: 68%; right: 5%; display: none;">Giao dịch
                                                    gần đây
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 px-4">
                                                <select class="border-0 text-center product_tax" disabled>
                                                    <option value="0" <?php if ($item_quote->product_tax == 0) {
                                                        echo 'selected';
                                                    } ?>>0%</option>
                                                    <option value="8" <?php if ($item_quote->product_tax == 8) {
                                                        echo 'selected';
                                                    } ?>>8%</option>
                                                    <option value="10" <?php if ($item_quote->product_tax == 10) {
                                                        echo 'selected';
                                                    } ?>>10%</option>
                                                    <option value="99" <?php if ($item_quote->product_tax == 99) {
                                                        echo 'selected';
                                                    } ?>>NOVAT
                                                    </option>
                                                </select>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" readonly=""
                                                    value="{{ number_format($item_quote->product_total) }}"
                                                    class="border-0 px-2 py-1 w-100 total-amount">
                                            </td>
                                            <td
                                                class="border border-top-0 border-bottom-0 border-right-0 position-relative note p-1">
                                                <input type="text" class="border-0 py-1 w-100" readonly
                                                    value="{{ $item_quote->product_note }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                {{-- Modal seri --}}
                @foreach ($product as $item)
                    <div id="list_modal">
                        <div class="modal fade my-custom-modal" id="exampleModal{{ $item->product_id }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number
                                        </h5>
                                        <a href="#" class="close btnclose" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table_SNS">
                                            <thead>
                                                <tr>
                                                    <td style="width:2%"></td>
                                                    <th style="width:5%">STT</th>
                                                    <th style="width:100%">Serial number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $stt = 1;
                                                @endphp
                                                @foreach ($serinumber as $item_seri)
                                                    @if ($item->product_id == $item_seri->product_id)
                                                        <tr>
                                                            <td>
                                                                <input name="id_seri[]"
                                                                    {{ $item_seri->detailexport_id == $delivery->detailexport_id ? 'checked' : '' }}
                                                                    type="checkbox" class="check-item" disabled
                                                                    data-product-id={{ $item_seri->product_id }}
                                                                    value="{{ $item_seri->idSeri }}">
                                                            </td>
                                                            <td>{{ $stt++ }}</td>
                                                            <td>
                                                                <input readonly class="form-control w-25"
                                                                    type="text"
                                                                    value="{{ $item_seri->serinumber }}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="modal-footer">
                            <a href="#" class="btn btn-primary check-seri" data-dismiss=""
                                data-row="row{{ $item->product_id }}"
                                data-target="#exampleModal{{ $item->product_id }}">
                                Save changes
                            </a>
                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- Thông tin khách hàng --}}
                <div class="content-wrapper2 px-0 py-0">
                    <div id="mySidenav" class="sidenav1 border">
                        <div id="show_info_Guest">
                            <div class="bg-filter-search border-0 py-2 text-center">
                                <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                            </div>
                            <div class="d-flex">
                                <div style="width: 55%;">
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Số báo giá</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Khách hàng</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Người đại diện</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Mã giao hàng</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Đơn vị vận chuyển</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Phí giao hàng</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                        <span class="text-table ml-2">Ngày giao hàng</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                        <input type="text" readonly value="{{ $delivery->quotation_number }}"
                                            class="border-0 bg w-100 bg-input-guest py-0 numberQute px-0"
                                            id="myInput" autocomplete="off" name="quotation_number">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" readonly value="{{ $delivery->guest_name_display }}"
                                            class="border-0 bg w-100 bg-input-guest py-0 px-0" id="myInput"
                                            autocomplete="off">
                                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" readonly value="{{ $delivery->represent_name }}"
                                            class="border-0 bg w-100 bg-input-guest py-0 px-0" autocomplete="off">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" readonly value="{{ $delivery->code_delivery }}"
                                            class="border-0 bg w-100 bg-input-guest py-0 px-0" autocomplete="off">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" value="{{ $delivery->shipping_unit }}"
                                            placeholder="Nhập thông tin"
                                            class="border-0 bg w-100 bg-input-guest py-0 px-0" autocomplete="off"
                                            name="shipping_unit">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" name="shipping_fee"
                                            value="{{ number_format($delivery->shipping_fee) }}"
                                            placeholder="Nhập thông tin"
                                            class="border-0 bg w-100 bg-input-guest py-0 px-0 fee_ship"
                                            autocomplete="off">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                        <input type="text" readonly
                                            value="{{ date_format(new DateTime($delivery->ngayGiao), 'd/m/Y') }}"
                                            name="date_deliver" class="border-0 bg w-100 bg-input-guest py-0 px-0">
                                        <div class="opacity-0">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                        </div>
                    </div>
                </div>
</form>
<div id="files" class="tab-pane fade">
    <div class="bg-filter-search border-bottom-0 text-center py-2 border-right-0">
        <span class="font-weight-bold text-secondary text-nav">FILE ĐÍNH KÈM</span>
    </div>
    <x-form-attachment :value="$delivery" name="GH"></x-form-attachment>
</div>
</div>
</div>
</section>

{{-- Thông tin sản phẩm --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#deliveryForm').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#deliveryForm')[0].submit();
    })
    //Kiểm tra số lượng SN được checked
    // $('.check-seri').on('click', function() {
    //     // Lấy giá trị của data-target và data-row từ button
    //     const dataTarget = $(this).data('target');
    //     const rowID = $(this).data('row');

    //     // Lấy giá trị từ input số lượng
    //     const quantityInputValue = parseInt($(`.${rowID} .quantity-input`).val());

    //     // Lấy số lượng checkbox được chọn trong modal
    //     const checkedCheckboxCount = $(`${dataTarget} .check-item:checked`).length;

    //     // Kiểm tra xem số lượng checkbox có bằng với giá trị từ input không
    //     if (checkedCheckboxCount !== quantityInputValue) {
    //         alert('Vui lòng chọn đủ serinumber.');
    //     }
    // });

    //
    $('.ml-1.btn-sm').on('click', function(event) {
        $('input[name="_method"][value="put"]').remove();
    });

    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax', function() {
        calculateTotals();
    });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                var donGia = productPrice;
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));
                $(this).find('.product_price').val(formatCurrency(donGia));

                // Cộng dồn vào tổng totalAmount và totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
        }

        // Cập nhật giá trị data-value
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        // Làm tròn đến 2 chữ số thập phân
        value = Math.round(value * 100) / 100;

        // Xử lý phần nguyên
        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        // Định dạng phần nguyên
        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        // Nếu có phần thập phân, thêm vào sau phần nguyên
        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }

    function kiemTraFormGiaoHang(event) {
        var rows = document.querySelectorAll('tr');
        var invalidProducts = [];
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var quantityInput = row.querySelector('.quantity-input');
            var soTonKhoElement = row.querySelector('.soTonKho');
            var productNameInput = row.querySelector('.product_name');

            // Kiểm tra xem phần tử có tồn tại không
            if (quantityInput && soTonKhoElement && productNameInput) {
                var quantityValue = parseInt(quantityInput.value);
                var soTonKho = parseInt(soTonKhoElement.innerText);
                var productName = productNameInput.value;

                if (quantityValue > soTonKho) {
                    invalidProducts.push(productName);
                }

                // Kiểm tra xem có thẻ tr nào có class addProduct không
                if (row.classList.contains('addProduct')) {
                    hasProducts = true;
                }
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            alert("Không có sản phẩm để giao");
            event.preventDefault();
        }

        // Hiển thị thông báo cuối cùng nếu có sản phẩm không hợp lệ
        if (invalidProducts.length > 0) {
            alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" + invalidProducts.join(', '));
            event.preventDefault();
        } else if (hasProducts) {
            var hiddenInputsToRemove = document.querySelectorAll(
                'input[type="hidden"][name="_method"][value="delete"]');
            hiddenInputsToRemove.forEach(function(hiddenInput) {
                hiddenInput.remove();
            });
            $('.check-item').prop('disabled', false);
            // Nếu không có lỗi và có sản phẩm, tiếp tục submit form
            document.getElementById('deliveryForm').submit();
        }
    }
    $('#xoaBtn').on('click', function(event) {
        var hiddenInputsToRemove = document.querySelectorAll(
            'input[type="hidden"][name="_method"][value="delete"]');
        hiddenInputsToRemove.forEach(function(hiddenInput) {
            hiddenInput.remove();
        });
    })
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .fee_ship', function(event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, '');

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    });

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split('.');
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }

    $('.info-product').click(function() {
        var idProduct = $(this).closest('tr').find('.product_id').val();

        $.ajax({
            url: '{{ route('getProductFromQuote') }}',
            type: 'GET',
            data: {
                idProduct: idProduct
            },
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var productData = data[0];
                    $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                        productData.product_name + '<br>' + '<b>Đơn vị: </b>' + productData
                        .product_unit + '<br>' + '<b>Tồn kho: </b>' + (formatNumber(productData
                            .product_inventory == null ? 0 : productData
                            .product_inventory)) + '<br>' + '<b>Thuế: </b>' + (productData
                            .product_tax == 99 || productData.product_tax == null ? "NOVAT" :
                            productData.product_tax + '%'
                        ));
                }
            }
        });
    });
</script>
</body>

</html>
