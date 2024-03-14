<x-navbar :title="$title" activeGroup="sell" activeName="payexport"></x-navbar>
<form onsubmit="return kiemTraFormGiaoHang();" action="{{ route('payExport.store', ['workspace' => $workspacename]) }}"
    method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <input type="hidden" name="billSale_id" id="billSale_id">
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span class="">Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Thanh toán bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo thanh toán bán hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('payExport.index', $workspacename) }}">
                                <button type="button"
                                    class="btn-destroy btn-light mx-1 rounded d-flex align-items-center h-100">
                                    <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light mx-1 rounded d-flex align-items-center h-100 dropdown-toggle">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">In</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#">Xuất Excel</a>
                                <a class="dropdown-item text-13-black" href="#">Xuất PDF</a>
                            </div>
                        </div>
                        <button type="submit" class="custom-btn mx-1 d-flex align-items-center h-100">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Xác nhận</span>
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
        <div class="content margin-top-38" id="main">
            <!-- Main content -->
            <section class="content margin-250">
                <div id="title--fixed" class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="info-chung">
                        <div class="container-fluided position-relative table-responsive text-nowrap">
                            {{-- <section class="multiple_action" style="display: none;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="count_checkbox mr-5">Đã chọn 1</span>
                                    <div class="row action">
                                        <div class="btn-chotdon my-2 ml-3">
                                            <button type="button" id="btn-chot"
                                                class="btn-group btn-light d-flex align-items-center h-100">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                        fill="#42526E" />
                                                </svg>
                                                <span class="px-1">Nhân hệ số</span>
                                            </button>
                                        </div>
                                        <div class="btn-xoahang my-2 ml-1">
                                            <button id="deleteExports" type="button"
                                                class="btn-group btn-light d-flex align-items-center h-100">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                        fill="#42526E" />
                                                </svg>
                                                <span class="px-1">Thuế</span>
                                            </button>
                                        </div>
                                        <div class="btn-huy my-2 ml-3">
                                            <button id="cancelBillExport"
                                                class="btn-group btn-light d-flex align-items-center h-100">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.75 15.75L2.25 2.25" stroke="#42526E" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.75 2.25L2.25 15.75" stroke="#42526E" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="px-1">Xóa</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="btn ml-auto cancal_action">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </section> --}}
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right p-0 px-2 text-13" style="width:13%;">
                                            <span class="mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M6.37 7.63C6.49289 7.75305 6.56192 7.91984 6.56192 8.09375C6.56192 8.26766 6.49289 8.43445 6.37 8.5575L4.375 10.5L5.46875 11.5938C5.46875 11.7678 5.39961 11.9347 5.27654 12.0578C5.15347 12.1809 4.98655 12.25 4.8125 12.25H2.40625C2.2322 12.25 2.06528 12.1809 1.94221 12.0578C1.81914 11.9347 1.75 11.7678 1.75 11.5938V9.1875C1.75 9.01345 1.81914 8.84653 1.94221 8.72346C2.06528 8.60039 2.2322 8.53125 2.40625 8.53125L3.5 9.625L5.4425 7.63C5.56555 7.50711 5.73234 7.43808 5.90625 7.43808C6.08016 7.43808 6.24695 7.50711 6.37 7.63ZM7.63 6.37C7.50711 6.24695 7.43808 6.08016 7.43808 5.90625C7.43808 5.73234 7.50711 5.56555 7.63 5.4425L9.625 3.5L8.53125 2.40625C8.53125 2.2322 8.60039 2.06528 8.72346 1.94221C8.84653 1.81914 9.01345 1.75 9.1875 1.75H11.5938C11.7678 1.75 11.9347 1.81914 12.0578 1.94221C12.1809 2.06528 12.25 2.2322 12.25 2.40625V4.8125C12.25 4.98655 12.1809 5.15347 12.0578 5.27654C11.9347 5.39961 11.7678 5.46875 11.5938 5.46875L10.5 4.375L8.5575 6.37C8.43445 6.49289 8.26766 6.56192 8.09375 6.56192C7.91984 6.56192 7.75305 6.49289 7.63 6.37Z"
                                                        fill="#26273B" fill-opacity="0.8" />
                                                </svg>
                                            </span>
                                            <input class="checkall-btn mx-1" id="checkall" type="checkbox">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">Tên sản phẩm</th>
                                        <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Số
                                            lượng</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">Đơn
                                            giá</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Thuế
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">Thành
                                            tiền</th>
                                        <th class="border-right p-0 px-2 note text-13">Ghi chú sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($quoteExport)
                                        {{-- @dd($quoteExport); --}}
                                        @foreach ($quoteExport as $item)
                                            <tr id="dynamic-row" class="bg-white sanPhamGiao">
                                                <td
                                                    class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                                fill="#42526E"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                                fill="#42526E"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                                fill="#42526E"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                                fill="#42526E"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                                fill="#42526E"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                                fill="#42526E"></path>
                                                        </svg>
                                                        <input type="checkbox" class="cb-element">
                                                        <input type="text"
                                                            value="{{ $item->product_code == null ? '' : $item->product_code }}"
                                                            readonly autocomplete="off"
                                                            class="border-0 px-2 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" readonly value="{{ $item->product_name }}"
                                                            class="border-0 px-2 py-1 w-100 product_name"
                                                            autocomplete="off" required="" name="product_name[]">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $item->product_id }}" autocomplete="off"
                                                            name="product_id[]">
                                                        <div class="info-product" data-toggle="modal"
                                                            data-target="#productModal" style="display: none;">
                                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z"
                                                                    fill="#42526E"></path>
                                                                <path
                                                                    d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z"
                                                                    fill="#42526E"></path>
                                                                <path
                                                                    d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z"
                                                                    fill="#42526E"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" value="{{ $item->product_unit }}" readonly
                                                        autocomplete="off" class="border-0 px-2 py-1 w-100 product_unit"
                                                        required="" name="product_unit[]">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text" value="{{ $item->product_qty }}" readonly
                                                        class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off"
                                                        required="" name="product_qty[]">
                                                    <input type="hidden" class="tonkho">
                                                    <p class="text-primary text-center position-absolute inventory"
                                                        style="top: 68%; display: none;">Tồn kho: 35</p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text" value="{{ number_format($item->price_export) }}"
                                                        readonly class="border-0 px-2 py-1 w-100 product_price"
                                                        autocomplete="off" name="product_price[]" required=""
                                                        readonly="readonly">
                                                    <p class="text-primary text-right position-absolute transaction"
                                                        style="top: 68%; right: 5%;">Giao dịch gần
                                                        đây
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 px-4">
                                                    <select name="product_tax[]" class="border-0 text-center product_tax"
                                                        disabled required="" readonly>
                                                        <option value="0"
                                                            {{ $item->product_tax == 0 ? 'selected' : '' }}>
                                                            0%</option>
                                                        <option value="8"
                                                            {{ $item->product_tax == 8 ? 'selected' : '' }}>
                                                            8%</option>
                                                        <option value="10"
                                                            {{ $item->product_tax == 10 ? 'selected' : '' }}>
                                                            10%</option>
                                                        <option value="99"
                                                            {{ $item->product_tax == 99 ? 'selected' : '' }}>
                                                            NOVAT</option>
                                                    </select>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text"
                                                        value="{{ number_format($item->product_total) }}" readonly=""
                                                        class="border-0 px-2 py-1 w-100 total-amount">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative note p-1">
                                                    <input type="text" readonly
                                                        value="{{ $item->product_note == null ? '' : $item->product_note }}"
                                                        class="border-0 py-1 w-100" name="product_note[]">
                                                </td>
                                                <td style="display:none;" class=""><input type="text"
                                                        class="product_tax1"></td>
                                                <td style="display:none;"><input type="text" class="product_tax1">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="content">
                        <div class="row" style="width:95%;">
                            <div class="position-relative col-lg-4 px-0"></div>
                            <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                <div class="m-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-13-black">Giá trị trước thuế: </span>
                                        <span id="total-amount-sum">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-13-black">Thuế VAT: </span>
                                        <span id="product-tax">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-13-bold text-lg font-weight-bold">Tổng cộng: </span>
                                        <span class="text-13-bold text-lg font-weight-bold text-right"
                                            id="grand-total" data-value="0">0đ</span>
                                        <input type="text" hidden="" name="totalValue" value="0"
                                            id="total">
                                    </div>
                                </div>
                            </div>
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
            {{-- Modal giao dịch gần đây --}}
            <div class="modal fade" id="recentModal" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel" aria-hidden="true">
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
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Tên sản phẩm
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Giá bán
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Thuế
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Ngày bán
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
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div>
                    <div class="bg-filter-search border-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:44px;" style="height:44px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>

                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 numberQute " id="myInput"
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                value="@isset($yes) {{ $data['quotation_number'] }} @endisset"
                                required>
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $data['detail_id'] }} @endisset">
                        </span>
                        <div class="">
                            <div id="myUL"
                                class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập số báo giá"
                                            class="pr-4 w-100 input-search bg-input-guest" id="myInput">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="m-0 p-0 scroll-data">
                                    @foreach ($numberQuote as $quote_value)
                                        <li class="p-2 align-items-center text-wrap"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="#" style="flex:2" id="{{ $quote_value->id }}"
                                                name="search-info" class="search-info">
                                                <span
                                                    class="text-13-black">{{ $quote_value->quotation_number }}</span></span>
                                            </a>
                                            <a id="" class="" type="button" data-toggle=""
                                                data-target="">
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
                                <!-- <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                            data-toggle="modal" data-target="#guestModal"
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
                                                style="font-weight: 600 !important;">Thêm khách hàng</span>
                                        </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="content-info--common" id="show-info-guest">
                        <ul class="p-0 m-0 ">
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>

                                <input class="text-13-black w-50 border-0 nameGuest bg-input-guest"
                                    value="@isset($yes){{ $getGuestbyId[0]->guest_name_display }}@endisset"
                                    style="flex:2;outline:none;">

                                <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                    value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input class="text-13-black w-50 border-0 represent_name"
                                    style="flex:2; outline:none;"
                                    value="{{ $getRepresentbyId[0]->represent_name ?? '' }}" required readonly />
                                <input type="hidden" class="idRepresent" autocomplete="off"
                                    value="{{ $getRepresentbyId[0]->id ?? '' }}">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã thanh toán</span>
                                <input class="text-13-black w-50 border-0" placeholder="Nhập thông tin"
                                    name="code_payment" style="flex:2;outline:none;" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hạn thanh toán</span>

                                <input class="text-13-black w-50 border-0 bg-input-guest" id="datePicker"
                                    style="flex:2;outline:none;" />

                                <input type="hidden" id="hiddenDateInput" value="" name="date_pay">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng tiền</span>
                                <input class="text-13-black w-50 border-0 bg-input-guest tongTien" name="total"
                                    style="flex:2;outline:none;" value="" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đã thanh toán</span>

                                <input type="text" class="text-13-black w-50 border-0 bg-input-guest daThanhToan"
                                    value="" readonly style="flex:2;" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dư nợ</span>
                                <input type="text" value="" readonly
                                    class="text-13-black w-50 border-0 duNo" style="flex:2;" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-2" style="flex: 1.5;">Thanh toán trước</span>
                                <input type="text" placeholder="Nhập thông tin" name="payment"
                                    class="text-13-black w-50 border-0 bg-input-guest payment" style="flex:2;" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
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
    //thêm sản phẩm
    let fieldCounter = 1;
    $(document).ready(function() {
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white`,
            });
            const maSanPham = $(
                "<td class='border border-left-0 border-top-0 border-bottom-0 position-relative'>" +
                "<div class='d-flex w-100 justify-content-between align-items-center'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24'" +
                "fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z' fill='#42526E'/>" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z'" +
                "fill='#42526E' />" +
                "</svg>" +
                "<input type='checkbox' class='cb-element'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-75 product_code' name='product_code[]'>" +
                "</td>");
            const tenSanPham = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 10%;'>" +
                "@foreach ($product as $product_value)" +
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-50'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "</a></ul>" +
                "<div class='d-flex align-items-center'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                "<div class='info-product' data-toggle='modal' data-target='#productModal'>" +
                "<svg width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path d='M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z' fill='#42526E'/>" +
                "<path d='M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z' fill='#42526E'/>" +
                "<path d='M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z' fill='#42526E'/>" +
                "</svg></div></div></td>"
            );
            const dvTinh = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'></td>"
            );
            const soLuong = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;'>Tồn kho: 35</p>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute transaction' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-top-0 border-bottom-0 px-4'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'>"
            );
            const option = $(
                "<td class='border border-top-0 border-bottom-0 border-right-0 text-right'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const ghiChu = $(
                "<td class='border border-top-0 border-bottom-0 position-relative note p-1'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, thue, thanhTien, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();
                var productTaxText = $('#product-tax').text();
                var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
                var taxAmount = parseFloat(('.product_tax1').text());
                var totalTax = productTaxValue - taxAmount;
                $('#product-tax').text(totalTax);
            });
            // Checkbox
            $('#checkall').change(function() {
                $('.cb-element').prop('checked', this.checked);
                updateMultipleActionVisibility();
            });
            $('.cb-element').change(function() {
                updateMultipleActionVisibility();
                if ($('.cb-element:checked').length === $('.cb-element').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
            $(document).on('click', '.cancal_action', function(e) {
                e.preventDefault();
                $('.cb-element:checked').prop('checked', false);
                $('#checkall').prop('checked', false);
                updateMultipleActionVisibility()
            })

            function updateMultipleActionVisibility() {
                if ($('.cb-element:checked').length > 0) {
                    $('.multiple_action').show();
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
                } else {
                    $('.multiple_action').hide();
                }
            }
            //Hiển thị danh sách mã sản phẩm
            // $(".list_code").hide();
            // $('.product_code').on("click", function(e) {
            //     e.stopPropagation();
            //     $(this).closest('tr').find(".list_code").show();
            // });
            // $(document).on("click", function(e) {
            //     if (!$(e.target).is(".product_code")) {
            //         $(".list_code").hide();
            //     }
            // });
            //Hiển thị danh sách tên sản phẩm
            $(".list_product").hide();
            $('.product_name').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_product").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_name")) {
                    $(".list_product").hide();
                }
            });
            //search mã sản phẩm
            // $(".product_code").on("keyup", function() {
            //     var value = $(this).val().toUpperCase();
            //     var $tr = $(this).closest("tr");
            //     $tr.find(".list_code li").each(function() {
            //         var text = $(this).find("a").text().toUpperCase();
            //         $(this).toggle(text.indexOf(value) > -1);
            //     });
            // });
            //search tên sản phẩm
            $(".product_name").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_product li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
            //lấy thông tin sản phẩm
            $(document).ready(function() {
                $('.inventory').hide();
                $('.info-product').hide();
                $('.idProduct').click(function() {
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var idProduct = $(this).attr('id');
                    $.ajax({
                        url: '{{ route('getProductFromQuote') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            productName.val(data.product_name);
                            productUnit.val(data.product_unit);
                            thue.val(data.product_tax);
                            product_id.val(data.id);
                            tonkho.val(data.product_inventory)
                            $('.info-product').show();
                            if (data.product_inventory !== null) {
                                $('.inventory').show();
                                $('.transaction').show();
                            }
                        }
                    });
                });
            });
            //lấy thông tin mã sản phẩm
            // $(document).ready(function() {
            //     $('.maSP').click(function() {
            //         var idCode = $(this).attr('id');
            //         var productCode = $(this).closest('tr').find('.product_code');
            //         $.ajax({
            //             url: '{{ route('getProductCode') }}',
            //             type: 'GET',
            //             data: {
            //                 idCode: idCode
            //             },
            //             success: function(data) {
            //                 productCode.val(data.product_code);
            //             }
            //         });
            //     });
            // });
            //Xem thông tin sản phẩm
            $('.info-product').click(function() {
                var productName = $(this).closest('tr').find('.product_name').val();
                var dvt = $(this).closest('tr').find('.product_unit').val();
                var thue = $(this).closest('tr').find('.product_tax').val();
                var tonKho = $(this).closest('tr').find('.tonkho').val();
                $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                    productName + '<br>' +
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + tonKho +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
            });
            //Mở rộng
            if (status_form == 1) {
                $('.change_colum').text('Tối giản');
                $('.product_price').attr('readonly', false);
                // Xóa dữ liệu trường hệ số nhân, giá nhập
                $(this).closest("tr").find('.product_ratio').val('')
                $(this).closest("tr").find('.price_import').val('')
                // Xóa required
                $('tbody .heSoNhan').removeAttr('required');
                $('tbody .giaNhap').removeAttr('required');
                $('.product-ratio').hide();
                $('.product_ratio').hide()
                $('.price_import').hide();
                $('.note').hide();
                $('.Daydu').hide();
                $('.heSoNhan').val('')
                $('.giaNhap').val('')
            } else {
                $('.change_colum').text('Đầy đủ');
                $('.product_price').attr('readonly', true);
                $(this).closest("tr").find('.product_price').val('');
                // Xóa dữ liệu trương đơn giá
                $(this).closest("tr").find('.price_export').val('')
                // Thêm required
                $('tbody .heSoNhan').attr('required', true);
                $('tbody .giaNhap').attr('required', true);
                $('.product_ratio').show()
                $('.price_import').show();
                $('.note').show();
                $('.Daydu').show();
                $(this).closest("tr").find('.heSoNhan').val('');
                $(this).closest("tr").find('.giaNhap').val('');
            }
        });
    });
    //hiện, tìm kiếm, ẩn danh sách số báo giá khi click trường tìm kiếm
    $("#myUL").hide();
    $(document).ready(function() {
        function toggleListGuest(input, list, filterInput) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length && !$(event.target).closest(filterInput)
                    .length) {
                    list.hide();
                }
            });

            var applyFilter = function() {
                var value = filterInput.val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            };

            input.on("keyup", applyFilter);
            filterInput.on("keyup", applyFilter);
        }

        toggleListGuest($("#myInput"), $("#myUL"), $("#companyFilter"));
    });
    //Lấy thông tin từ số báo giá
    $(document).ready(function() {
        $('#show-info-guest').hide();
        $('#show-title-guest').hide();
        $('.search-info').click(function(event, idQuote) {
            if (idQuote) {
                idQuote = idQuote
            } else {
                idQuote = parseInt($(this).attr('id'), 10);
            }
            $.ajax({
                url: '{{ route('getInfoPay') }}',
                type: 'GET',
                data: {
                    idQuote: idQuote
                },
                success: function(data) {
                    $('#show-info-guest').show();
                    $('#show-title-guest').show();
                    $('.idRepresent').val(data.represent_id)
                    $('.represent_name').val(data.represent_name)
                    // $("#billSale_id").val(data.maThanhToan);
                    $('.numberQute').val(data.quotation_number);
                    $('.nameGuest').val(data.guest_name_display);
                    $('.tongTien').val(formatCurrency(Math.round(data.tongTienNo)));
                    $('.daThanhToan').val(formatCurrency(data.tongThanhToan));
                    $('.duNo').val(formatCurrency(Math.round(data.tongTienNo - data
                        .tongThanhToan)));
                    $('input[name="code_payment"]').val('MTT-' + (data.lastPayExportId +
                        1));
                    $.ajax({
                        url: '{{ route('getProductPay') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".sanPhamGiao").remove();
                            var totalProductTotal = 0;
                            var totalTax1 = 0;
                            $.each(data, function(index, item) {
                                $("#detailexport_id").val(item
                                    .detailexport_id);
                                var totalTax = parseFloat(item
                                    .total_tax) || 0;
                                var totalPrice = parseFloat(item
                                    .total_price) || 0;
                                var grandTotal = totalTax + totalPrice;
                                var tax = (item.price_export * item
                                    .product_qty * (item
                                        .product_tax == 99 ? 0 :
                                        item
                                        .product_tax)) / 100;
                                totalProductTotal += parseFloat(item
                                    .price_export * item
                                    .product_qty) || 0;
                                totalTax1 += tax;
                                $(".idGuest").val(item.guest_id);
                                var newRow = `
                                <tr id="dynamic-row-${item.id}" class="bg-white sanPhamGiao height-80">
                            <td class="border border-left-0 border-top-0  align-top border-bottom-0 position-relative">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <span class='mx-2'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='10' height='13' viewBox='0 0 10 13' fill='none'>
                                             <g clip-path='url(#clip0_1710_10941)'>
                                             <path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>
                                             </g>
                                             <defs>
                                                 <clipPath id='clip0_1710_10941'>
                                                 <rect width='6' height='10' fill='white'/>
                                                 </clipPath>
                                             </defs>
                                        </svg>
                                    </span>
                                    <input type="checkbox" class="cb-element checkall-btn">
                                    <input type="text" value="${item.product_code == null ? '' : item.product_code}" readonly autocomplete="off" class="border-0 text-13-black px-2 py-1 w-75 product_code" name="product_code[]">
                                </div>
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative align-top">
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly value="${item.product_name}" class="border-0 text-13-black px-2 py-1 w-100 product_name" autocomplete="off" required="" name="product_name[]">
                                    <input type="hidden" class="product_id" value="${item.product_id}" autocomplete="off" name="product_id[]">
                                    <div class="info-product" data-toggle="modal" data-target="#productModal" style="display: none;">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z" fill="#42526E"></path>
                                        <path d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z" fill="#42526E"></path>
                                        <path d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z" fill="#42526E"></path>
                                    </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="border-right p-2 text-13 align-top">
                                <input type="text" value="${item.product_unit}" readonly autocomplete="off" class="border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                            </td>
                            <td class="border-right p-2 text-13 align-top">
                                <input type="text" value="${formatNumber(item.product_qty)}" readonly class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off" required="" name="product_qty[]">
                                <input type="hidden" class="tonkho">
                                <p class="text-primary text-center position-absolute inventory" style="top: 68%; display: none;">Tồn kho: 35</p>
                            </td>
                            <td class="border-right p-2 text-13 align-top">
                                <input type="text" value="${formatCurrency(item.price_export)}" readonly class="border-0 px-2 py-1 w-100 product_price" autocomplete="off" name="product_price[]" required="" readonly="readonly">
                                <p class="mt-3 text-13-blue transaction recentModal" data-toggle="modal" data-target="#recentModal">Giao dịch gần đây</p>
                            </td>
                            <td class="border-right p-2 text-13 align-top">
                                <select name="product_tax[]" class="border-0 text-center product_tax" required="" disabled>
                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                </select>
                            </td>
                            <td class="border border-top-0 border-bottom-0 align-top">
                                <input type="text" value="${formatCurrency(Math.round(item.product_total))}" readonly="" class="text-13-black text-right border-0 px-2 py-1 w-100 total-amount">
                            </td>
                            <td class="border border-top-0 border-bottom-0 border-right-0 position-relative note align-top">
                                <input type="text" readonly placeholder="Nhập ghi chú"
                                    value="${(item.product_note == null) ? '' : item.product_note}" class="text-13-black border-0 py-1 w-100" name="product_note[]">
                            </td>
                            <td style="display:none;"><input type="text" class="product_tax1" value="${tax}"></td>
                            </tr>`;
                                $("#dynamic-fields").before(newRow);
                                //Xem giao dịch gần đây
                                $('.recentModal').click(function() {
                                    var idProduct = $(this)
                                        .closest('tr').find(
                                            '.product_id')
                                        .val();
                                    $.ajax({
                                        url: '{{ route('getRecentTransaction') }}',
                                        type: 'GET',
                                        data: {
                                            idProduct: idProduct
                                        },
                                        success: function(
                                            data) {
                                            if (Array
                                                .isArray(
                                                    data
                                                ) &&
                                                data
                                                .length >
                                                0) {
                                                $('#recentModal .modal-body tbody')
                                                    .empty();
                                                data.forEach(
                                                    function(
                                                        productData
                                                    ) {
                                                        var newRow =
                                                            $(
                                                                '<tr class="position-relative">' +
                                                                '<td class="text-13-black" id="productName"></td>' +
                                                                '<td class="text-13-black" id="productPrice"></td>' +
                                                                '<td class="text-13-black" id="productTax"></td>' +
                                                                '<td class="text-13-black" id="dateProduct"></td>' +
                                                                '</tr>'
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productName'
                                                            )
                                                            .text(
                                                                productData
                                                                .product_name
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productPrice'
                                                            )
                                                            .text(
                                                                formatCurrency(
                                                                    productData
                                                                    .price_export
                                                                )
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productTax'
                                                            )
                                                            .text(
                                                                productData
                                                                .product_tax ==
                                                                99 ?
                                                                'NOVAT' :
                                                                productData
                                                                .product_tax +
                                                                '%'
                                                            );
                                                        var formattedDate =
                                                            new Date(
                                                                productData
                                                                .created_at
                                                            )
                                                            .toLocaleDateString(
                                                                'vi-VN'
                                                            );
                                                        newRow
                                                            .find(
                                                                '#dateProduct'
                                                            )
                                                            .text(
                                                                formattedDate
                                                            );
                                                        newRow
                                                            .appendTo(
                                                                '#recentModal .modal-body tbody'
                                                            );
                                                    }
                                                );
                                            } else {
                                                $('#recentModal .modal-body tbody')
                                                    .empty();
                                            }
                                        }
                                    });
                                });
                                //kéo thả vị trí sản phẩm
                                // $("table tbody").sortable({
                                //     axis: "y",
                                //     handle: "td",
                                // });
                                //Giới hạn số tiền
                                document.querySelector('.payment')
                                    .addEventListener('input',
                                        function() {
                                            var duNoValue = document
                                                .querySelector('.duNo')
                                                .value;
                                            var paymentInput = document
                                                .querySelector(
                                                    '.payment');
                                            var paymentValue =
                                                paymentInput.value;
                                            var duNoNumber = parseFloat(
                                                duNoValue.replace(
                                                    /,/g, ''));
                                            var paymentNumber =
                                                parseFloat(paymentValue
                                                    .replace(/,/g, ''));

                                            if (paymentNumber < 0 ||
                                                paymentNumber >
                                                duNoNumber) {
                                                paymentInput.value =
                                                    duNoValue;
                                            }
                                        });
                                //Xóa sản phẩm
                                $('.deleteProduct').click(function() {
                                    $(this).closest("tr")
                                        .remove();
                                    fieldCounter--;
                                    calculateTotalAmount();
                                    calculateGrandTotal();
                                    var productTaxText = $(
                                            '#product-tax')
                                        .text();
                                    var productTaxValue =
                                        parseFloat(
                                            productTaxText
                                            .replace(/,/g, ''));
                                    var taxAmount = parseFloat((
                                            '.product_tax1')
                                        .text());
                                    var totalTax =
                                        productTaxValue -
                                        taxAmount;
                                    $('#product-tax').text(
                                        totalTax);
                                });
                                // Checkbox
                                $('#checkall').change(function() {
                                    $('.cb-element').prop(
                                        'checked', this
                                        .checked);
                                    updateMultipleActionVisibility
                                        ();
                                });
                                $('.cb-element').change(function() {
                                    updateMultipleActionVisibility
                                        ();
                                    if ($('.cb-element:checked')
                                        .length === $(
                                            '.cb-element')
                                        .length) {
                                        $('#checkall').prop(
                                            'checked', true);
                                    } else {
                                        $('#checkall').prop(
                                            'checked', false
                                        );
                                    }
                                });
                                $(document).on('click',
                                    '.cancal_action',
                                    function(e) {
                                        e.preventDefault();
                                        $('.cb-element:checked')
                                            .prop('checked', false);
                                        $('#checkall').prop(
                                            'checked', false);
                                        updateMultipleActionVisibility
                                            ()
                                    })

                                function updateMultipleActionVisibility() {
                                    if ($('.cb-element:checked')
                                        .length > 0) {
                                        $('.multiple_action').show();
                                        $('.count_checkbox').text(
                                            'Đã chọn ' + $(
                                                '.cb-element:checked'
                                            ).length);
                                    } else {
                                        $('.multiple_action').hide();
                                    }
                                }
                                //Hiển thị danh sách tên sản phẩm
                                $(".list_product").hide();
                                $('.product_name').on("click", function(
                                    e) {
                                    e.stopPropagation();
                                    $(this).closest('tr').find(
                                            ".list_product")
                                        .show();
                                });
                                $(document).on("click", function(e) {
                                    if (!$(e.target).is(
                                            ".product_name")) {
                                        $(".list_product")
                                            .hide();
                                    }
                                });
                                //search tên sản phẩm
                                $(".product_name").on("keyup",
                                    function() {
                                        var value = $(this).val()
                                            .toUpperCase();
                                        var $tr = $(this).closest(
                                            "tr");
                                        $tr.find(".list_product li")
                                            .each(function() {
                                                var text = $(
                                                        this)
                                                    .find("a")
                                                    .text()
                                                    .toUpperCase();
                                                $(this).toggle(
                                                    text
                                                    .indexOf(
                                                        value
                                                    ) >
                                                    -1);
                                            });
                                    });
                                //lấy thông tin sản phẩm
                                $(document).ready(function() {
                                    $('.inventory').hide();
                                    $('.info-product').hide();
                                    $('.idProduct').click(
                                        function() {
                                            var productName =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_name'
                                                );
                                            var productUnit =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_unit'
                                                );
                                            var thue = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_tax'
                                                );
                                            var product_id =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_id'
                                                );
                                            var tonkho = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.tonkho'
                                                );
                                            var idProduct =
                                                $(this)
                                                .attr('id');
                                            $.ajax({
                                                url: '{{ route('getProductFromQuote') }}',
                                                type: 'GET',
                                                data: {
                                                    idProduct: idProduct
                                                },
                                                success: function(
                                                    data
                                                ) {
                                                    productName
                                                        .val(
                                                            data
                                                            .product_name
                                                        );
                                                    productUnit
                                                        .val(
                                                            data
                                                            .product_unit
                                                        );
                                                    thue.val(
                                                        data
                                                        .product_tax
                                                    );
                                                    product_id
                                                        .val(
                                                            data
                                                            .id
                                                        );
                                                    tonkho
                                                        .val(
                                                            data
                                                            .product_inventory
                                                        )
                                                    $('.info-product')
                                                        .show();
                                                    if (data
                                                        .product_inventory !==
                                                        null
                                                    ) {
                                                        $('.inventory')
                                                            .show();
                                                        $('.transaction')
                                                            .show();
                                                    }
                                                }
                                            });
                                        });
                                });
                                //Xem thông tin sản phẩm
                                $('.info-product').click(function() {
                                    var productName = $(this)
                                        .closest('tr').find(
                                            '.product_name')
                                        .val();
                                    var dvt = $(this).closest(
                                            'tr').find(
                                            '.product_unit')
                                        .val();
                                    var thue = $(this).closest(
                                            'tr').find(
                                            '.product_tax')
                                        .val();
                                    var tonKho = $(this)
                                        .closest('tr').find(
                                            '.tonkho').val();
                                    $('#productModal').find(
                                        '.modal-body').html(
                                        '<b>Tên sản phẩm: </b> ' +
                                        productName +
                                        '<br>' +
                                        '<b>Đơn vị: </b>' +
                                        dvt + '<br>' +
                                        '<b>Tồn kho: </b>' +
                                        tonKho +
                                        '<br>' +
                                        '<b>Thuế: </b>' +
                                        (thue == 99 ||
                                            thue == null ?
                                            "NOVAT" : thue +
                                            '%'));
                                });
                                //Mở rộng
                                if (status_form == 1) {
                                    $('.change_colum').text('Tối giản');
                                    $('.product_price').attr('readonly',
                                        false);
                                    // Xóa dữ liệu trường hệ số nhân, giá nhập
                                    $(this).closest("tr").find(
                                        '.product_ratio').val('')
                                    $(this).closest("tr").find(
                                        '.price_import').val('')
                                    // Xóa required
                                    $('tbody .heSoNhan').removeAttr(
                                        'required');
                                    $('tbody .giaNhap').removeAttr(
                                        'required');
                                    $('.product-ratio').hide();
                                    $('.product_ratio').hide()
                                    $('.price_import').hide();
                                    $('.note').hide();
                                    $('.Daydu').hide();
                                    $('.heSoNhan').val('')
                                    $('.giaNhap').val('')
                                } else {
                                    $('.change_colum').text('Đầy đủ');
                                    $('.product_price').attr('readonly',
                                        true);
                                    $(this).closest("tr").find(
                                        '.product_price').val('');
                                    // Xóa dữ liệu trương đơn giá
                                    $(this).closest("tr").find(
                                        '.price_export').val('')
                                    // Thêm required
                                    $('tbody .heSoNhan').attr(
                                        'required', true);
                                    $('tbody .giaNhap').attr('required',
                                        true);
                                    $('.product_ratio').show()
                                    $('.price_import').show();
                                    $('.note').show();
                                    $('.Daydu').show();
                                    $(this).closest("tr").find(
                                        '.heSoNhan').val('');
                                    $(this).closest("tr").find(
                                        '.giaNhap').val('');
                                }
                            });
                            $("#total-amount-sum").text(
                                formatCurrency(totalProductTotal));
                            $("#grand-total").text(formatCurrency(
                                totalProductTotal + totalTax1));
                            $("#product-tax").text(formatCurrency(
                                totalTax1));
                        }
                    });
                }
            });
        });
        var idQuote = $('#detail_id').val();
        if (idQuote) {
            $('.search-info').trigger('click', idQuote);
        }
    });
    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa dữ liệu trường hệ số nhân, giá nhập
            $('.product_ratio').val('')
            $('.price_import').val('')
            // Xóa required
            $('tbody .heSoNhan').removeAttr('required');
            $('tbody .giaNhap').removeAttr('required');
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            // Xóa dữ liệu trương đơn giá
            $('.product_price').val('');
            $('.total-amount').val('');
            $('#total-amount-sum').text('0đ');
            $('#grand-total').text('0đ');
            $('#product-tax').text('0đ');
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            // Thêm required
            $('tbody .heSoNhan').attr('required', true);
            $('tbody .giaNhap').attr('required', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
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

    //format giá
    var inputElement = document.getElementById('product_price');
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .fee_ship, .payment', function(event) {
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

    function kiemTraFormGiaoHang(event) {
        var rows = document.querySelectorAll('tr');
        var numberValue = $('input[name="code_payment"]').val();
        var hasProducts = false;
        var ajaxSuccess = false;

        $.ajax({
            url: '{{ route('checkCodePayment') }}',
            type: 'GET',
            async: false, // Chuyển thành đồng bộ
            data: {
                numberValue: numberValue
            },
            success: function(data) {
                if (!data.success) {
                    showNotification('warning', 'Mã thanh toán đã tồn tại!');
                } else {
                    ajaxSuccess = true;
                }
            }
        });

        if (!ajaxSuccess) {
            return false;
        }


        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('sanPhamGiao')) {
                hasProducts = true;
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            alert("Không có sản phẩm để thanh toán");
            event.preventDefault();
        }
    }
</script>
</body>

</html>
