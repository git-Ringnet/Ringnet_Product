<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('paymentOrder.store') }}" method="POST">
    @csrf
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <div class="content-header-fixed p-0 m-0 border-0">
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
                    <span class="nearLast-span">Thanh toán mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo thanh toán mua hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('paymentOrder.index') }}" class="user_flow" data-type="TTMH" data-des="Hủy">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>


                        <button name="action" value="payment" type="submit"
                            class="custom-btn mx-1 d-flex align-items-center h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                    fill="white"></path>
                            </svg>
                            <p class="m-0 ml-1" style="font-weight: 500; font-size:13px; color:white">Xác nhận</p>
                        </button>

                        <button id="sideProvide" type="button" class="btn-option border-0 mx-1">
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
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-38" id="main">
            <section class="content">
                <div id="title--fixed"
                    class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="content">
                        <div class="content-info position-relative table-responsive text-nowrap order_content">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:50px;">
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            <input class="checkall-btn ml-4 mr-1" id="checkall" type="checkbox">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">Tên sản phẩm</th>
                                        <th class="border-right p-0 px-2 text-13" style="width:8%;">Đơn vị</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Số
                                            lượng</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">Đơn
                                            giá</th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Thuế
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            Khuyến mãi
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">Thành
                                            tiền</th>
                                        <th class="p-0 px-2 note text-13">Ghi chú sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- @isset($dataImport)
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
                                                                                                                                                                                                                                                                                    name="price_export[]"></td>
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
                                                                                                                                                                                                                                                                            <td class="border border-top-0 border-bottom-0"><input type="text"
                                                                                                                                                                                                                                                                                    class="border-0 px-2 py-1 w-100 total_price" readonly=""
                                                                                                                                                                                                                                                                                    name="total_price[]">
                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                            <td class="border border-top-0 border-bottom-0"><input type="text"
                                                                                                                                                                                                                                                                                    class="border-0 px-2 py-1 w-100" name="product_note[]"></td>
                                                                                                                                                                                                                                                                        </tr>
    @endforeach
                                    @endisset -->
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <x-formsynthetic :import="''"></x-formsynthetic>
                </div>
            </section>
        </div>
        <div class="content">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG
                            CẤP
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom border-top align-items-center text-left text-nowrap position-relative"
                        style="height:50px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng
                        </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" id="search_quotation"
                                class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest search_quotation"
                                style="background-color:#F0F4FF; border-radius:4px;" name="quotation_number"
                                autocomplete="off" readonly>
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                        </span>
                        <div class="d-flex align-items-center justify-content-between border-0">
                            <ul id="listReceive"
                                class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập đơn mua hàng"
                                            class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                            id="provideFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($reciept as $value)
                                    <li class="p-2 align-items-center"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="javascript:void(0)" id="{{ $value->id }}" name="search-info"
                                            class="search-receive" style="flex:2;">
                                            <span
                                                class="text-13-black">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div id="more_info" style="display:none;">
                        <ul class="p-0 m-0">
                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhà cung cấp</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" readonly id="provide_name"
                                    value="@isset($yes){{ $show_receive['provide_name'] }}@endisset"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" id="represent" readonly name="represent"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã thanh toán</span>
                                <input type="text" placeholder="Chọn thông tin" name="payment_code" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hạn thanh toán</span>
                                <input id="datePicker" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" value="{{ date('Y-m-d') }}" />
                                <input type="hidden" name="payment_date" value="{{ date('Y-m-d') }}"
                                    id="hiddenDateInput">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày thanh toán</span>
                                <input id="datePickerDay" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" value="{{ date('Y-m-d') }}" />
                                <input type="hidden" name="payment_day" value="{{ date('Y-m-d') }}"
                                    id="hiddenDateInputDay">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hình thức t.toán</span>
                                <select name="payment_type" id="" class="border-0 text-13"
                                    style="width:55%;">
                                    <option value="Tiền mặt">Tiền mặt</option>
                                    <option value="UNC">UNC</option>
                                </select>
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng tiền</span>
                                <input readonly type="text" placeholder="Chọn thông tin" id="total_bill" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;"
                                    value="@isset($yes){{ number_format($getPaymentOrder[0]->total_price) }}@endisset">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đã thanh toán</span>
                                <input readonly id="payment" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;"
                                    value="@isset($yes){{ $getPaymentOrder[0]->payment == null ? 0 : number_format($getPaymentOrder[0]->payment) }}@endisset">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dư nợ</span>
                                <input type="text" placeholder="Chọn thông tin" id="debt" required readonly
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;"
                                    value="@isset($yes){{ $getPaymentOrder[0]->payment == null
                                        ? number_format($getPaymentOrder[0]->total_price)
                                        : number_format($getPaymentOrder[0]->total_price - $getPaymentOrder[0]->payment) }}@endisset">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thanh toán trước</span>
                                <input id="prepayment" type="text" placeholder="Nhập thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 payment_input"
                                    style="flex:2;background-color:#F0F4FF; border-radius:4px;" name="payment" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:49px;">
                                <span class="mx-1 text-13" style="flex: 2;">
                                    <input type="checkbox" name="payment_all" onclick="cbPayment(this)">
                                    <span class="text-13 btn-click">Thanh toán đủ : <span
                                            class="payment_all"></span></span>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                </section>

            </div>
        </div>

    </div>
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
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Nhà cung cấp
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 text-table text-secondary">
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div> --}}
        </div>
    </div>
</div>

</div>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<!-- <script src="{{ asset('/dist/js/products.js') }}"></script> -->
<script>
    const lastDevicePixelRatio = window.devicePixelRatio;
    window.addEventListener('resize', function() {
        const currentDevicePixelRatio = window.devicePixelRatio;

        if (currentDevicePixelRatio >= 1.5) {
            $('#mySidenav').attr('style', 'height:90vh; overflow:auto;');
        } else {
            $('#mySidenav').attr('style', 'height:100vh');
        }
    });

    $(document).on('click', '.transaction', function() {
        nameProduct = $(this).closest('tr').find('.searchProductName').val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: "get",
            data: {
                product_name: nameProduct,
            },
            success: function(data) {
                $('#recentModal .modal-body tbody').empty()
                if (data['history']) {
                    data['history'].forEach(
                        element => {
                            var tr = `
                                        <tr>
                                            <td class="text-13-black border-bottom">` + element.product_name + `</td>
                                            <td class="text-13-black border-bottom">` + element.nameProvide + `</td>
                                            <td class="text-13-black border-bottom">` + formatCurrency(element
                                    .price_export) + `</td>
                                            <td class="text-13-black border-bottom">` + (element.product_tax == 99 ?
                                    "NOVAT" : element.product_tax + "%") + `</td>
                                            <td class="text-13-black border-bottom">` + new Date(element.created_at)
                                .toLocaleDateString('vi-VN'); + `</td>
                                        </tr> `;
                            $('#recentModal .modal-body tbody').append(tr);
                        })
                }
            }
        })
    })

    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi mở date picker
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
        },
    });

    flatpickr("#datePickerDay", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi mở date picker
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
        }
    });

    function updateHiddenInput(selectedDate, instance, hiddenInputId) {
        // Lấy thời gian hiện tại
        var currentTime = new Date();

        // Cập nhật giá trị của trường ẩn với thời gian hiện tại và ngày đã chọn
        var selectedDateTime = new Date(selectedDate);
        selectedDateTime.setHours(currentTime.getHours());
        selectedDateTime.setMinutes(currentTime.getMinutes());
        selectedDateTime.setSeconds(currentTime.getSeconds());

        document.getElementById(hiddenInputId).value = instance.formatDate(selectedDateTime, "Y-m-d H:i:S");
    }

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
            table = "payOrder";
            $.ajax({
                url: "{{ route('show_receive') }}",
                type: "get",
                data: {
                    detail_id: detail_id,
                    table: table
                },
                success: function(data) {
                    $('#voucher').val(formatCurrency(data.discount))
                    $('#discount_type').val(data.discount_type)
                    $('#voucher').prop('readonly', true);
                    $('#discount_type').prop('disabled', true);
                    $('#search_quotation').val(data.quotation_number == null ? data.id :
                        data.quotation_number);
                    // $('input[name^="payment_code"]').val('MTT-' + data.id)
                    $('input[name^="payment_code"]').val(data.resultNumber)
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
                            $('#prepayment').removeAttr('readonly')
                            var total = 0;
                            var total_tax = 0;
                            var price_export = 0;
                            $('#inputcontent tbody').empty();
                            product.forEach(function(element) {
                                var tr =
                                    `<tr class="bg-white" style="height:80px">
                                            <td class='border-right border-top-0 p-2 text-13 align-top border-bottom'>
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <span class="mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="13" viewBox="0 0 10 13" fill="none">
                                             <g clip-path="url(#clip0_1710_10941)">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z" fill="#282A30"></path>
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_1710_10941">
                                                 <rect width="6" height="10" fill="white"></rect>
                                                 </clipPath>
                                             </defs>
                                                </svg>
                                                </span>
                                                    <input type='checkbox' class='cb-element checkall-btn'>

                                                    <input type="text" value="` + (element.product_code == null ? "" :
                                        element.product_code) + `" 
                                                            readonly autocomplete="off" 
                                                            class="border-0 text-13-black px-2 py-1 w-75 height-32 searchProduct" name="product_code[]">

                                                    <input type="hidden" readonly value="` + element.id + `" name="listProduct[]">

                                                    <ul id="listProductCode" 
                                                        class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" 
                                                        style="z-index: 99; left: 24%; top: 75%;">
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <div class='d-flex align-items-center'>

                                                    <input type='text' class='border-0 text-13-black px-2 py-1 w-100 height-32 searchProductName'
                                                            value='` + element.product_name + `' readonly id="searchProductName"
                                                            autocomplete='off' name='product_name[]'>

                                                    <div class='info-product' data-toggle='modal' data-target='#productModal'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>
                                                            <g clip-path='url(#clip0_2559_39956)'>
                                                                <path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>
                                                                <path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>
                                                                <path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id='clip0_2559_39956'>
                                                                    <rect width='14' height='14' fill='white'/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text" value="` + element.product_unit + `" 
                                                    readonly autocomplete="off" 
                                                    class="border-0 px-2 py-1 w-100 product_unit height-32" name="product_unit[]">
                                            </td>

                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                    <div>
                                                        <input type='text' oninput="checkQty(this,` + (element
                                        .product_qty) + `)"
                                                            value="` + formatCurrency(element.product_qty) + `"
                                                            class='border-0 px-2 py-1 w-100 quantity-input text-right height-32' autocomplete='off'
                                                            name='product_qty[]' readonly>
                                                        <input type='hidden' class='tonkho'>
                                                        <div class="mt-3 text-13-blue inventory text-right" tyle="top: 68%;">Tồn kho:
                                                            <span class="pl-1 soTonKho">
                                                                ` + (element.inventory == "null" ? 0 : formatCurrency(
                                        element.inventory)) + `
                                                            </span>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                    <input type='text' readonly class='text-right border-0 px-2 py-1 w-100 height-32 price_export' 
                                                        value="` + formatCurrency(element.price_export) + `"
                                                        autocomplete='off' name="price_export[]" required>
                                                        <div class="mt-3 text-13-blue text-right transaction" id="transaction" data-toggle="modal" data-target="#recentModal">Giao dịch
                                                            gần đây
                                                        </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input readonly type="text" name="product_tax[]" 
                                                    class="border-0 px-2 py-1 w-100 product_tax text-center height-32" 
                                                    value="` + (element.product_tax == 99 ? "NOVAT" : element
                                        .product_tax + "%") + `">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                <div class="d-flex align-item-center">
                                    <input value="` + formatCurrency(element.promotion) + `" type="text" name="promotion[]" class="text-right border-0 px-2 py-1 w-100 height-32 promotion" autocomplete="off">
                                    <span class="mt-2 percent d-none">%</span>
                                </div>
                                <div class="text-right">
                                    <select class="border-0 mt-3 text-13-blue text-center" disabled="">
                                        <option value="1" ` + (element.promotion_type == 1 ? 'selected' : '') + `>Nhập tiền</option>
                                        <option value="2" ` + (element.promotion_type == 2 ? 'selected' : '') + `>
                                            Nhập %
                                        </option>
                                    </select>
                                    <input type="hidden" class="promotion_type" name="promotion_type[]" value="` + (
                                        element.promotion_type) + `">
                                </div>
                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type='text' name="total_price[]"
                                                        value="` + formatCurrency(element.product_total) + `" readonly 
                                                        class="border-0 px-2 py-1 w-100 total_price text-right height-32" >
                                            </td>
                                            
                                            <td class="border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text" placeholder='Nhập ghi chú'
                                                        readonly value="` + (element.product_note == null ? "" :
                                        element.product_note) + `"
                                                        class="border-0 py-1 w-100 height-32" name="product_note[]">
                                            </td>

                                            <input type="hidden" name="" class="product_tax1">

                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0 text-center deleteProduct d-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z" fill="#6B6F76">
                                                    </path>
                                                </svg>
                                            </td>
                                    </tr>`;
                                $('#inputcontent tbody').append(tr);
                                deleteRow()
                                if (element.promotion_type == 1) {
                                    price_export = (element
                                            .price_export * element
                                            .product_qty) - element
                                        .promotion
                                } else {
                                    price_export = (element
                                        .price_export * element
                                        .product_qty) - ((element
                                        .price_export * element
                                        .product_qty * element
                                        .promotion) / 100)
                                }
                                total_tax += price_export * (element
                                    .product_tax == 99 ? 0 : element
                                    .product_tax) / 100
                                total += price_export;
                            })
                            var voucher = 0;
                            if (data.discount_type == 1) {
                                voucher = (total - data.discount + total_tax)
                            } else {
                                voucher = ((total - (total * data.discount /
                                    100)) + total_tax)
                            }
                            $('#payment').val(product[0].payment == null ? 0 :
                                formatCurrency(product[0].payment));
                            $('#debt').val(product[0].payment == null ?
                                formatCurrency(
                                    (voucher)) :
                                formatCurrency(Math.round(voucher) -
                                    product[0].payment
                                ))
                            $('#total_bill').val(formatCurrency(Math.round(
                                voucher)));
                            $('#prepayment').on('input', function() {
                                checkQty(this, product[0].payment ==
                                    null ? Math.round(voucher) :
                                    Math.round(voucher) - product[0]
                                    .payment
                                );
                            })
                            $('.payment_all').text(product[0].payment == null ?
                                formatCurrency(Math.round(voucher)) :
                                formatCurrency(Math.round(voucher) -
                                    product[0].payment));
                            updateTaxAmount()
                            calculateTotalAmount()
                            calculateTotalTax()
                            calculateGrandTotal()
                            $('#more_info').show()
                            $('#more_info1').show()
                        }
                    })
                    if (lastDevicePixelRatio <= 1.25) {
                        $('#mySidenav').attr('style', 'height:100vh');
                    } else {
                        $('#mySidenav').attr('style', 'height:90vh; overflow:auto');
                    }
                }
            })
        })
        var detail_id = $('#detail_id').val();
        if (detail_id) {
            $('.search-receive').trigger('click', detail_id);
        }
    });

    var error = false;

    function checkQuotetion() {
        var payment_code = $("input[name='payment_code']").val();
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    payment_code: payment_code,
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Mã thanh toán đã tồn tại');
                        resolve(false);
                    } else {
                        resolve(true);
                    }
                },
                error: function() {
                    reject('Error in AJAX request');
                }
            });
        });
    }

    var submit = false;
    $('form').on('submit', function(e) {
        e.preventDefault();

        if (!submit) {
            checkQuotetion().then(function(isValid) {
                if (isValid) {
                    submit = true;
                    $('form')[1].submit();
                }
            }).catch(function(error) {
                console.error(error);
            });
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
