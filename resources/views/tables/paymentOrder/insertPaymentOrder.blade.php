<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('paymentOrder.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span class="font-weight-bold">Mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Thanh toán mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Tạo mới thanh toán mua hàng</span>
                </div>
                <div class="container-fluided z-index-block">
                    <div class="row m-0">
                        <a href="{{ route('paymentOrder.index', $workspacename) }}">
                            <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-button">Hủy</span>
                            </button>
                        </a>
    
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                                style="margin-right:10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14"
                                    fill="none" class="mr-2">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-button">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item" href="#">Xuất Excel</a>
                                <a class="dropdown-item" href="#">Xuất PDF</a>
                            </div>
                        </div>
    
                        <button name="action" value="payment" type="submit"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                viewBox="0 0 12 14" fill="none" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                    fill="white"></path>
                            </svg>
                            <span>Lưu nháp</span>
                        </button>
    
                        <span id="sideProvide" class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path
                                    d="M14 10C14 12.2091 12.2091 14 10 14L4 14C1.7909 14 0 12.2091 0 10L0 4C0 1.79086 1.7909 0 4 0L10 0C12.2091 0 14 1.79086 14 4L14 10ZM9 12.5L9 1.5L4 1.5C2.6193 1.5 1.5 2.61929 1.5 4L1.5 10C1.5 11.3807 2.6193 12.5 4 12.5H9Z"
                                    fill="#26273B" fill-opacity="0.8"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content" id="main" style="margin-top:3.8rem;">
            <section class="content margin-250">
                <div class="container-fluided">
                    <section class="content">
                        <div class="bg-filter-search border-top-0 text-center border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                        </div>
                        <div class="container-fluided order_content">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right p-1" style="width:15%;">
                                            <input type="checkbox" class="ml-4" id="checkall">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:25%;">
                                            <span class="text-table text-secondary"> Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Thành tiền</span>
                                        </th>
                                        <th class="border-right p-1 border-bottom" style="width:10%;">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($dataImport)
                                        @dd($dataImport)
                                        @foreach ($dataImport as $item)
                                            <tr class="bg-white">
                                                <td class="border border-left-0 border-top-0 border-bottom-0">
                                                    <input type="hidden" readonly value="{{ $item->id }}"
                                                        name="listProduct[]">
                                                    <div
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
                                                            class="border-0 px-2 py-1 w-75 searchProduct"
                                                            value="{{ $item->product_code }}">
                                                        <ul id="listProductCode"
                                                            class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 24%; top: 75%;">
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input id="searchProductName" type="text" name="product_name[]"
                                                        class="searchProductName border-0 px-2 py-1 w-100"
                                                        value="{{ $item->product_name }}">
                                                    <ul id="listProductName"
                                                        class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                        style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                    </ul>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" name="product_unit[]"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        value="{{ $item->product_unit }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <div class="d-flex"><input type="text" required=""
                                                            oninput="validateQtyInput1(this)"
                                                            class="border-0 px-2 py-1 w-100 quantity-input"
                                                            name="product_qty[]">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0"><input type="text"
                                                        required="" class="border-0 px-2 py-1 w-100 price_export"
                                                        name="price_export[]">
                                                </td>
                                                <input type="hidden" class="product_tax1">
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <select name="product_tax[]" id="" class="product_tax">
                                                        <option value="0"
                                                            @if ($item->product_tax == 0) selected @endif>0%
                                                        </option>
                                                        <option value="8"
                                                            @if ($item->product_tax == 8) selected @endif>8%
                                                        </option>
                                                        <option value="10"
                                                            @if ($item->product_tax == 10) selected @endif>10%
                                                        </option>
                                                        <option value="99"
                                                            @if ($item->product_tax == 99) selected @endif>NOVAT
                                                        </option>
                                                    </select>
                                                </td>
    
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 total_price"
                                                        readonly="" name="total_price[]">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0"><input type="text"
                                                        class="border-0 px-2 py-1 w-100" name="product_note[]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <x-formsynthetic :import="''"></x-formsynthetic>
                <div class="content px-0 py-0">
                    <div id="mySidenav" class="sidenavadd sidenav border" style="top: 60px;">
                        <div id="show_info_Guest">
                            <div class="bg-filter-search border-top-0 text-center border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG CẤP</p>
                            </div>
        
                            <div class="d-flex">
                                <div style="width:55%;">
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Đơn mua hàng</span>
                                    </div>
                                    <div id="more_info1" style="display: none;">
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Nhà cung cấp</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Người đại diện</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Mã thanh toán</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Hạn thanh toán</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Tổng tiền</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Đã thanh toán</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Dư nợ</span>
                                        </div>
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Thanh toán trước</span>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="">
                                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input readonly id="search_quotation" type="text" placeholder="Nhập thông tin"
                                            name="quotation_number"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0 search_quotation"
                                            autocomplete="off" required>
                                        <input type="hidden" name="detail_id" id="detail_id"
                                            value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                                        <ul id="listReceive"
                                            class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                            style="z-index: 99;">
                                            <div class="p-1">
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Nhập đơn mua hàng"
                                                        class="pr-4 w-100 input-search" id="provideFilter">
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            @foreach ($reciept as $value)
                                                <li>
                                                    <a href="javascript:void(0)" class="text-dark p-2 search-receive w-100"
                                                        id="{{ $value->id }}" name="search-info">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span
                                                                class="text-table font-weight-bold">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
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
                                        <div class="">
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
                                    <div id="more_info" style="display: none;">
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                value="@isset($yes){{ $show_receive['provide_name'] }}@endisset">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input readonly type="text" placeholder="Chọn thông tin" name="represent"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="represent">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input type="text" placeholder="Chọn thông tin" name="payment_code"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" required>
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input id="datePicker" type="text" placeholder="Nhập thông tin"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                value="{{ date('Y-m-d') }}">
                                            <input type="hidden" name="payment_date" value="{{ date('Y-m-d') }}"
                                                id="hiddenDateInput">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input type="text" placeholder="Nhập thông tin" name=""
                                                id="total_bill" readonly
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                value="@isset($yes){{ number_format($getPaymentOrder[0]->total_price) }}@endisset">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input id="payment" type="text" placeholder="Nhập thông tin" readonly
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                value="@isset($yes){{ $getPaymentOrder[0]->payment == null ? 0 : number_format($getPaymentOrder[0]->payment) }}@endisset">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input id="debt" type="text" placeholder="Nhập thông tin" name=""
                                                readonly class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                value="@isset($yes){{ $getPaymentOrder[0]->payment == null
                                                    ? number_format($getPaymentOrder[0]->total_price)
                                                    : number_format($getPaymentOrder[0]->total_price - $getPaymentOrder[0]->payment) }}@endisset">
                                            <div class="">
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
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input id="prepayment" type="text" placeholder="Nhập thông tin"
                                                name="payment"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0 payment_input">
                                            <div class="">
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
            </section>
    
        </div>
    </div>

    </div>
</form>
</div>
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
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $(document).ready(function() {
        $('.search-receive').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $.ajax({
                url: "{{ route('show_receive') }}",
                type: "get",
                data: {
                    detail_id: detail_id
                },
                success: function(data) {
                    $('#search_quotation').val(data.quotation_number == null ? data.id :
                        data
                        .quotation_number);
                    $('#represent').val(data.represent)
                    $('#provide_name').val(data.provide_name);
                    $('#detailimport_id').val(data.id)
                    $('#listReceive').hide();
                    $.ajax({
                        url: "{{ route('getPaymentOrder') }}",
                        type: "get",
                        data: {
                            id: data.id
                        },
                        success: function(product) {
                            console.log(product);
                            $('#prepayment').removeAttr('readonly')
                            var total = 0;
                            var total_tax = 0;
                            $('#inputcontent tbody').empty();
                            product.forEach(function(element) {
                                var tr =
                                    `
                                <tr class="bg-white">
                                    <td class="border border-left-0 border-top-0 border-bottom-0">
                                    <input type="hidden" readonly value="` + element.id +
                                    `" name="listProduct[]">
                                    <div class="d-flex w-100 justify-content-between align-items-center position-relative">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
                                        </svg>
                                        <input type="checkbox">
                                        <input type="text" readonly name="product_code[]" class="border-0 px-2 py-1 w-75 searchProduct" value="` +
                                    element.product_code +
                                    `">
                                        <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
                                        </ul>
                                    </div>
                                </td> 
                                <td class="border border-top-0 border-bottom-0 position-relative">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                    <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-2 py-1 w-100" value='` +
                                    element.product_name +
                                    `'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8.0002 1.69571C6.32827 1.69571 4.72483 2.35988 3.5426 3.54211C2.36037 4.72434 1.6962 6.32779 1.6962 7.99971C1.6962 9.67164 2.36037 11.2751 3.5426 12.4573C4.72483 13.6395 6.32827 14.3037 8.0002 14.3037C9.67212 14.3037 11.2756 13.6395 12.4578 12.4573C13.64 11.2751 14.3042 9.67164 14.3042 7.99971C14.3042 6.32779 13.64 4.72434 12.4578 3.54211C11.2756 2.35988 9.67212 1.69571 8.0002 1.69571ZM0.304199 7.99971C0.304199 5.9586 1.11503 4.0011 2.55831 2.55782C4.00159 1.11454 5.95909 0.303711 8.0002 0.303711C10.0413 0.303711 11.9988 1.11454 13.4421 2.55782C14.8854 4.0011 15.6962 5.9586 15.6962 7.99971C15.6962 10.0408 14.8854 11.9983 13.4421 13.4416C11.9988 14.8849 10.0413 15.6957 8.0002 15.6957C5.95909 15.6957 4.00159 14.8849 2.55831 13.4416C1.11503 11.9983 0.304199 10.0408 0.304199 7.99971Z" fill="#282A30"></path>
                                        <path d="M8.08026 4.96571C7.92018 4.95474 7.75956 4.97681 7.60838 5.03055C7.4572 5.08429 7.31869 5.16855 7.20146 5.2781C7.08422 5.38764 6.99077 5.52012 6.92691 5.66732C6.86306 5.81451 6.83015 5.97327 6.83026 6.13371C6.83026 6.31844 6.75688 6.49559 6.62626 6.62621C6.49564 6.75683 6.31848 6.83021 6.13376 6.83021C5.94903 6.83021 5.77188 6.75683 5.64126 6.62621C5.51064 6.49559 5.43726 6.31844 5.43726 6.13371C5.43716 5.6638 5.56625 5.20289 5.81043 4.8014C6.05461 4.3999 6.40447 4.07326 6.82176 3.85719C7.23906 3.64111 7.70773 3.54393 8.17653 3.57625C8.64534 3.60856 9.09623 3.76915 9.47993 4.04044C9.86363 4.31174 10.1654 4.6833 10.3521 5.1145C10.5389 5.54571 10.6035 6.01997 10.5389 6.48542C10.4744 6.95088 10.283 7.38963 9.98593 7.75369C9.68881 8.11776 9.29732 8.39314 8.85426 8.54971C8.80815 8.56625 8.76829 8.59666 8.74018 8.63678C8.71206 8.67689 8.69707 8.72473 8.69726 8.77371V9.39971C8.69726 9.58444 8.62387 9.76159 8.49326 9.89221C8.36264 10.0228 8.18548 10.0962 8.00076 10.0962C7.81603 10.0962 7.63888 10.0228 7.50826 9.89221C7.37764 9.76159 7.30426 9.58444 7.30426 9.39971V8.77371C7.30416 8.43668 7.40854 8.10791 7.60303 7.83265C7.79752 7.5574 8.07255 7.3492 8.39026 7.23671C8.64378 7.14687 8.85861 6.97241 8.99857 6.74271C9.13853 6.51302 9.19507 6.24211 9.15867 5.97561C9.12228 5.70911 8.99517 5.46328 8.79875 5.27952C8.60233 5.09576 8.34859 4.98429 8.08026 4.96571Z" fill="#282A30"></path>
                                        <path d="M8.05029 11.5707C8.00282 11.5707 7.95729 11.5896 7.92372 11.6231C7.89015 11.6567 7.87129 11.7022 7.87129 11.7497C7.87129 11.7972 7.89015 11.8427 7.92372 11.8763C7.95729 11.9099 8.00282 11.9287 8.05029 11.9287C8.09777 11.9287 8.1433 11.9099 8.17686 11.8763C8.21043 11.8427 8.22929 11.7972 8.22929 11.7497C8.22929 11.7022 8.21043 11.6567 8.17686 11.6231C8.1433 11.5896 8.09777 11.5707 8.05029 11.5707ZM8.05029 12.4997C8.14878 12.4997 8.24631 12.4803 8.33731 12.4426C8.4283 12.4049 8.51098 12.3497 8.58062 12.28C8.65027 12.2104 8.70551 12.1277 8.7432 12.0367C8.78089 11.9457 8.80029 11.8482 8.80029 11.7497C8.80029 11.6512 8.78089 11.5537 8.7432 11.4627C8.70551 11.3717 8.65027 11.289 8.58062 11.2194C8.51098 11.1497 8.4283 11.0945 8.33731 11.0568C8.24631 11.0191 8.14878 10.9997 8.05029 10.9997C7.85138 10.9997 7.66061 11.0787 7.51996 11.2194C7.37931 11.36 7.30029 11.5508 7.30029 11.7497C7.30029 11.9486 7.37931 12.1394 7.51996 12.28C7.66061 12.4207 7.85138 12.4997 8.05029 12.4997Z" fill="#282A30"></path>
                                    </svg>
                                    </div>
                                </td>   
                                <td> 
                                    <input readonly type="text" name="product_unit[]" class="border-0 px-2 py-1 w-100 product_unit" value="` +
                                    element
                                    .product_unit +
                                    `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly oninput="checkQty(this,` + (element.product_qty) +
                                    `)" type="text" name="product_qty[]" class="border-0 px-2 py-1 w-100 quantity-input" value="` +
                                    formatCurrency(element
                                        .product_qty) +
                                    `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="price_export[]" class="border-0 px-2 py-1 w-100 price_export" value="` +
                                    formatCurrency(element
                                        .price_export) +
                                    `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="product_tax[]" class="border-0 px-2 py-1 w-100 product_tax"
                                    value="` +
                                    (element.product_tax == 99 ?
                                        "NOVAT" : element
                                        .product_tax + "%") +
                                    `"
                                    >
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="total_price[]" class="border-0 px-2 py-1 w-100 total_price" readonly="" value="` +
                                    formatCurrency(element
                                        .product_total) +
                                    `">
                                </td>
                                <td class="border border-top-0 border-bottom-0">
                                    <input readonly type="text" name="product_note[]" class="border-0 px-2 py-1 w-100" value="` +
                                    (element.product_note == null ? "" :
                                        element
                                        .product_note) + `">
                                </td>
                                <input type="hidden" name="" class="product_tax1">
                                </tr>
                            `;
                                $('#inputcontent tbody').append(tr);
                                deleteRow()
                                total_tax += (element.price_export *
                                    element
                                    .product_qty) * (element
                                    .product_tax == 99 ? 0 : element
                                    .product_tax) / 100
                                total += element.price_export * element
                                    .product_qty
                            })
                            $('#payment').val(product[0].payment == null ? 0 :
                                formatCurrency(product[0].payment));
                            $('#debt').val(product[0].payment == null ?
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax))) :
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax)) -
                                    product[0].payment
                                ))
                            $('#total_bill').val(formatCurrency(Math.round(
                                    total) +
                                Math.round(total_tax)))
                            $('#prepayment').on('input', function() {
                                checkQty(this, product[0].payment ==
                                    null ? (Math.round(total) + Math
                                        .round(
                                            total_tax)) :
                                    (Math.round(total) + Math.round(
                                        total_tax)) - product[0]
                                    .payment
                                );
                            })
                            updateTaxAmount()
                            calculateTotalAmount()
                            calculateTotalTax()
                            calculateGrandTotal()
                            $('#more_info').show()
                            $('#more_info1').show()
                        }
                    })
                }
            })
        })
        var detail_id = $('#detail_id').val();
        if (detail_id) {
            $('.search-receive').trigger('click', detail_id);
        }
    });

    $('form').on('submit', function(e) {
        e.preventDefault();
        var payment_code = $("input[name='payment_code']").val();
        $.ajax({
            url: "{{ route('checkQuotetion') }}",
            type: "get",
            data: {
                payment_code: payment_code,
            },
            success: function(data) {
                if (!data['status']) {
                    showNotification('warning', 'Mã thanh toán đã tồn tại')
                } else {
                    $('form')[0].submit();
                }
            }
        })
    })
</script>
