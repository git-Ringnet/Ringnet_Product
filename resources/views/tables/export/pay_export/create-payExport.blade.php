<x-navbar :title="$title" activeGroup="sell" activeName="payexport"></x-navbar>
<form action="{{ route('payExport.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <input type="hidden" name="billSale_id" id="billSale_id">
    <div class="content-wrapper1 py-2">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">Thanh toán bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">Tạo thanh toán bán hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('payExport.index', $workspacename) }}">
                            <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">Hủy</span>
                            </button>
                        </a>
                    </div>
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-button">In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>
                    <button type="submit" onclick="kiemTraFormGiaoHang(event);"
                        class="custom-btn d-flex align-items-center h-100 py-1 px-2" style="margin-right:10px">
                        <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                fill="white" />
                        </svg>
                        <span>Lưu nháp</span>
                    </button>
                    <div id="sideGuest">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA" />
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <!-- Main content -->
        <div class="bg-filter-search text-center py-2 border-bottom-0 border-right-0">
            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
        </div>
        <section class="content">
            <div class="container-fluided">
                <section class="content">
                    <div class="container-fluided order_content">
                        <section class="multiple_action" style="display: none;">
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
                        </section>
                        <table class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right p-1">
                                        <input class="ml-4" id="checkall" type="checkbox">
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right text-table text-secondary p-1">Tên sản phẩm</th>
                                    <th class="border-right text-table text-secondary p-1">Đơn vị</th>
                                    <th class="border-right text-table text-secondary p-1">Số lượng</th>
                                    <th class="border-right text-table text-secondary p-1">Đơn giá</th>
                                    <th class="border-right text-table text-secondary p-1">Thuế</th>
                                    <th class="border-right text-table text-secondary p-1">Thành tiền</th>
                                    <th class="note text-table text-secondary p-1">Ghi chú</th>
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
                                                        class="border-0 px-2 py-1 w-100 product_name" autocomplete="off"
                                                        required="" name="product_name[]">
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
                                                    style="top: 68%; right: 5%; display: none;">Giao dịch gần
                                                    đây
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 px-4">
                                                <select name="product_tax[]" class="border-0 text-center product_tax" disabled
                                                    required="" readonly>
                                                    <option value="0" {{ $item->product_tax == 0 ? 'selected' : '' }}>
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
                                                <input type="text" value="{{ number_format($item->product_total) }}"
                                                    readonly="" class="border-0 px-2 py-1 w-100 total-amount">
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
    </div>
    {{-- Thông tin khách hàng --}}
    <div class="content-wrapper2 px-0 py-0">
        <div id="mySidenav" class="sidenav border">
            <div id="show_info_Guest">
                <div class="bg-filter-search border-0 py-2 text-center">
                    <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                </div>
                <div class="d-flex">
                    <div style="width: 55%;">
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Số báo giá</span>
                        </div>
                        <div id="show-title-guest">
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Khách hàng</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Người đại diện</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Hạn thanh toán</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Tổng tiền</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Đã thanh toán</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Dư nợ</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Thanh toán trước</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                            <input type="text" placeholder="Nhập thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 px-0 numberQute" id="myInput"
                                autocomplete="off" name="quotation_number" required
                                value="@isset($yes) {{ $data['quotation_number'] }} @endisset">
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $data['detail_id'] }} @endisset">
                            <ul id="myUL"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập số báo giá"
                                            class="pr-4 w-100 input-search" id="companyFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($numberQuote as $quote_value)
                                    <li>
                                        <a href="#" class="text-dark p-2 search-info w-100"
                                            id="{{ $quote_value->id }}" name="search-info">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span
                                                    class="text-table font-weight-bold w-100">{{ $quote_value->quotation_number }}</span>
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 2.92308C5.19582 2.92308 2.92308 5.19582 2.92308 8C2.92308 10.8042 5.19582 13.0769 8 13.0769C10.8042 13.0769 13.0769 10.8042 13.0769 8C13.0769 5.19582 10.8042 2.92308 8 2.92308ZM8 14C4.68602 14 2 11.314 2 8C2 4.68602 4.68602 2 8 2C11.314 2 14 4.68602 14 8C14 11.314 11.314 14 8 14Z"
                                                            fill="#26273B" fill-opacity="0.8"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.00011 4.76904C8.25501 4.76904 8.46165 4.97568 8.46165 5.23058V8.3075C8.46165 8.56241 8.25501 8.76904 8.00011 8.76904C7.74521 8.76904 7.53857 8.56241 7.53857 8.3075V5.23058C7.53857 4.97568 7.74521 4.76904 8.00011 4.76904Z"
                                                            fill="#26273B" fill-opacity="0.8"></path>
                                                        <circle cx="7.99991" cy="10.4616" r="0.615385"
                                                            fill="#26273B" fill-opacity="0.8"></circle>
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
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
                        <div id="show-info-guest">
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 border-top-0">
                                <input type="text" placeholder="Nhập thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                    required readonly
                                    value="@isset($yes){{ $getGuestbyId[0]->guest_name_display }}@endisset">
                                <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                    value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
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
                                <input type="text" placeholder="Nhập thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 represent_name" autocomplete="off"
                                    required readonly
                                    value="@isset($yes){{ $getRepresentbyId[0]->represent_name }}@endisset">
                                <input type="hidden" class="idRepresent" autocomplete="off"
                                    value="@isset($yes){{ $getRepresentbyId[0]->id }}@endisset">
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
                                <input type="text" placeholder="Nhập thông tin"
                                    required class="border-0 bg w-100 bg-input-guest py-0 px-0"
                                    id="datePicker">
                                <input type="hidden" id="hiddenDateInput" value="" name="date_pay">
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
                                <input type="text" placeholder="Nhập thông tin" readonly name="total"
                                    value="" class="border-0 bg w-100 bg-input-guest py-0 px-0 tongTien">
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
                                <input type="text" value="" readonly
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 daThanhToan">
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
                                <input type="text" value="" readonly
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 duNo">
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
                                <input type="text" placeholder="Nhập thông tin" name="payment"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 payment">
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
                $('.transaction').hide();
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
                    $('.tongTien').val(formatCurrency(data.tongTienNo));
                    $('.daThanhToan').val(formatCurrency(data.tongThanhToan));
                    $('.duNo').val(formatCurrency(data.tongTienNo - data.tongThanhToan));
                    $.ajax({
                        url: '{{ route('getProductPay') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".sanPhamGiao").remove();
                            $.each(data, function(index, item) {
                                $("#detailexport_id").val(item
                                    .detailexport_id);
                                var totalTax = parseFloat(item
                                    .total_tax) || 0;
                                var totalPrice = parseFloat(item
                                    .total_price) || 0;
                                var grandTotal = totalTax + totalPrice;
                                $(".idGuest").val(item.guest_id);
                                var newRow = `
                                <tr id="dynamic-row-${item.id}" class="bg-white sanPhamGiao">
                            <td class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
                                    </svg>
                                    <input type="checkbox" class="cb-element">
                                    <input type="text" value="${item.product_code == null ? '' : item.product_code}" readonly autocomplete="off" class="border-0 px-2 py-1 w-75 product_code" name="product_code[]">
                                </div>
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly value="${item.product_name}" class="border-0 px-2 py-1 w-100 product_name" autocomplete="off" required="" name="product_name[]">
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
                            <td class="border border-top-0 border-bottom-0">
                                <input type="text" value="${item.product_unit}" readonly autocomplete="off" class="border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <input type="text" value="${item.product_qty}" readonly class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off" required="" name="product_qty[]">
                                <input type="hidden" class="tonkho">
                                <p class="text-primary text-center position-absolute inventory" style="top: 68%; display: none;">Tồn kho: 35</p>
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <input type="text" value="${formatCurrency(item.price_export)}" readonly class="border-0 px-2 py-1 w-100 product_price" autocomplete="off" name="product_price[]" required="" readonly="readonly">
                                <p class="text-primary text-right position-absolute transaction" style="top: 68%; right: 5%; display: none;">Giao dịch gần đây</p>
                            </td>
                            <td class="border border-top-0 border-bottom-0 px-4">
                                <select name="product_tax[]" class="border-0 text-center product_tax" required="" disabled>
                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                </select>
                            </td>
                            <td class="border border-top-0 border-bottom-0">
                                <input type="text" value="${formatCurrency(item.product_total)}" readonly="" class="border-0 px-2 py-1 w-100 total-amount">
                            </td>
                            <td class="border border-top-0 border-bottom-0 border-right-0 position-relative note p-1">
                                <input type="text" readonly value="${(item.product_note == null) ? '' : item.product_note}" class="border-0 py-1 w-100" name="product_note[]">
                            </td>
                            <td style="display:none;" class="><input type="text" class="product_tax1"></td>
                            <td style="display:none;"><input type="text" class="product_tax1"></td>
                            </tr>`;
                                $("#dynamic-fields").before(newRow);
                                //kéo thả vị trí sản phẩm
                                $("table tbody").sortable({
                                    axis: "y",
                                    handle: "td",
                                });
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
                                    $('.transaction').hide();
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
    $(document).on('input', '.quantity-input, [name^="product_price"]', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var productPrice = parseFloat($(this).closest('tr').find('input[name^="product_price"]').val()
            .replace(
                /[^0-9.-]+/g, "")) || 0;
        updateTaxAmount($(this).closest('tr'));
        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount = productQty * productPrice;
            $(this).closest('tr').find('.total-amount').val(formatCurrency(totalAmount));
            calculateTotalAmount();
            calculateTotalTax();
        }
    });

    $(document).on('change', '.product_tax', function() {
        updateTaxAmount($(this).closest('tr'));
        calculateTotalAmount();
        calculateTotalTax();
    });

    function updateTaxAmount(row) {
        var productQty = parseFloat(row.find('.quantity-input').val());
        var productPrice = parseFloat(row.find('input[name^="product_price"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat(row.find('.product_tax').val());
        var heSoNhan = parseFloat(row.find('.heSoNhan').val()) || 0;
        var giaNhap = parseFloat(row.find('.giaNhap').val().replace(/[^0-9.-]+/g, "")) || 0;
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (status_form == 1) {
            if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
                var totalAmount = productQty * productPrice;
                var taxAmount = (totalAmount * taxValue) / 100;

                row.find('.product_tax1').text(Math.round(taxAmount));
            }
        } else {
            if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue) && !isNaN(heSoNhan) && !isNaN(giaNhap)) {
                var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                var totalAmount = productQty * donGia;
                var taxAmount = (totalAmount * taxValue) / 100;

                row.find('.product_tax1').text(Math.round(taxAmount));
            }
        }
    }

    function calculateTotalAmount() {
        var totalAmount = 0;
        $('tr').each(function() {
            var rowTotal = parseFloat(String($(this).find('.total-amount').val()).replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTotal)) {
                totalAmount += rowTotal;
            }
        });
        totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
        $('#total-amount-sum').text(formatCurrency(totalAmount));
        calculateTotalTax();
        calculateGrandTotal();
    }

    function calculateTotalTax() {
        var totalTax = 0;
        $('tr').each(function() {
            var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTax)) {
                totalTax += rowTax;
            }
        });
        totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
        $('#product-tax').text(formatCurrency(totalTax));

        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

        var grandTotal = totalAmount + totalTax;
        grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
        $('#grand-total').text(formatCurrency(grandTotal));

        // Update data-value attribute
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        value = Math.round(value * 100) / 100;

        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }
        return formattedValue;
    }

    //Tính đơn giá
    $(document).on('input', '.heSoNhan, .giaNhap', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var heSoNhan = parseFloat($(this).closest('tr').find('.heSoNhan').val()) || 0;
        var giaNhap = parseFloat($(this).closest('tr').find('.giaNhap').val().replace(/[^0-9.-]+/g, "")) || 0;
        updateTaxAmount($(this).closest('tr'));
        if (!isNaN(heSoNhan) && !isNaN(giaNhap)) {
            var donGia = ((heSoNhan + 100) * giaNhap) / 100;
            var totalAmount = productQty * donGia;
            $(this).closest('tr').find('.product_price').val(formatCurrency(donGia));
            $(this).closest('tr').find('.total-amount').val(formatCurrency(totalAmount));
            calculateTotalAmount();
            calculateTotalTax();
        }
    });

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
        var hasProducts = false;

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
