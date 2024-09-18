<x-navbar :title="$title" activeGroup="manageProfess" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('paymentOrder.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" name="returnImport_id" id="returnImport_id" value="">

        <div class="content-header-fixed p-0 border-0">
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
                    <span class="nearLast-span">Phiếu chi</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo phiếu chi</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <button type="submit" data-toggle="dropdown"
                                class="btn-save-print rounded d-flex mx-1 align-items-center h-100 dropdown-toggle px-2">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">In phiếu</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#"
                                    onclick="printCashRC('printContent','PHIẾU CHI')">Phiếu thu</a>
                            </div>
                        </div>
                        <a href="{{ route('paymentOrder.index', $workspacename) }}" class="user_flow" data-type="TTMH"
                            data-des="Hủy">
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
                            <span class="text-btnIner-primary ml-2">Xác nhận</span>
                        </button>
                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA"></rect>
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-75">
            <x-view-mini :listDetail="$listDetail" :workspacename="$workspacename" :page="'PC'" :status="'1'" :guest="$guest"
                :listUser="$listUser" />
            <section class="content" id="main">
                <div class="bg-filter-search border-0 text-center">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                        THÔNG TIN PHIẾU CHI
                    </p>
                </div>
                {{-- <div class="container-fluided">
                    <section class="content" style="height: 80vh;">
                        <div class="content-info position-relative table-responsive text-nowrap order_content h-100">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:50px;">
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            <span>Đơn đặt hàng</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            <input class="checkall-btn ml-4 mr-1" id="checkall" type="checkbox">
                                            <span class="text-table text-left text-secondary">Mã phiếu</span>
                                        </th>
                                        <th class="border-right text-left p-0 px-2 text-13" style="width:8%;">Ngày
                                        </th>
                                        <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Khách
                                            hàng
                                        </th>
                                        <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Người
                                            nhận
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Số
                                            tiền
                                        </th>
                                        <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Nội
                                            dung
                                        </th>
                                        <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Quỹ
                                        </th>
                                        <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Người
                                            lập phiếu
                                        </th>
                                        <th class="p-0 px-2 text-left note text-13">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white" style="height:80px;">
                                        <td
                                            class="border-right border-top-0 p-2 text-13 align-top border-bottom position-relative">
                                            <input type="text" placeholder="Chọn thông tin" id="myInput"
                                                class="border-0 text-13-black px-2 py-1 w-100 height-32 search_quotation"
                                                style="background-color:#F0F4FF; border-radius:4px;"
                                                name="quotation_number" autocomplete="off" readonly>
                                            <input type="hidden" name="detail_id" id="detail_id"
                                                value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                                            </span>

                                            <ul id="listReceive"
                                                class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                style="z-index: 99;display: none; right:0; width:100%">
                                                <div class="p-1">
                                                    <div class="position-relative">
                                                        <input type="text" placeholder="Nhập đơn mua hàng"
                                                            class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                            id="provideFilter">
                                                        <input type="hidden" name="" id="">
                                                        <span id="search-icon" class="search-icon"><i
                                                                class="fas fa-search text-table"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                                @foreach ($reciept as $value)
                                                    <li class="p-2 align-items-center"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="javascript:void(0)" id="{{ $value->id }}"
                                                            name="search-info" class="search-receive"
                                                            style="flex:2;">
                                                            <span
                                                                class="text-13-black">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @foreach ($returnExport as $value)
                                                    <li class="p-2 align-items-center"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="javascript:void(0)" id="{{ $value->id }}"
                                                            name="search-info" class="search-return" style="flex:2;">
                                                            <span
                                                                class="text-13-black">{{ $value->code_return }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black text-left py-1 w-100 height-32 searchProductName"
                                                value="{{ $getQuoteCount }}" readonly name="payment_code">
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input
                                                class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2"
                                                name="" placeholder="Chọn thông tin" style="flex:2;"
                                                id="datePicker" value="{{ date('Y-m-d') }}" />
                                            <input type="hidden" name="payment_date" id="hiddenDateInput"
                                                value="{{ date('Y-m-d') }}">
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="myGuest"
                                                    class="border-0 text-13-black py-1 w-100 height-32 search_guest"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    autocomplete="off" readonly required="required">
                                                <input type="hidden" name="guest_id" id="guest_id">

                                                <ul id="listGuest"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_guest"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($guest as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-guest"
                                                                style="flex:2;">
                                                                <span
                                                                    class="text-13-black">{{ $value->provide_name_display }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text" required
                                                class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2"
                                                name="payment_type" style="background-color:#F0F4FF;">
                                        </td>
                                        <td
                                            class="border-right border-top-0 p-2 text-13 align-top border-bottom text-right">
                                            <input
                                                class="text-13-black text-right w-100 border-0 bg-input-guest flatpickr-input py-2 price_export "
                                                name="total" placeholder="Nhập số tiền"
                                                style="flex:2;background-color:#F0F4FF; border-radius:4px;"
                                                id="prepayment" required />
                                            <br>
                                            <div class="cash_reciept" style="display: none;">
                                                <label class="" for="">Công nợ:</label>
                                                <input type="text"
                                                    class="text-13-black w-auto border-0 bg-input-guest py-2 text-right"
                                                    name="total_bill" id="total_bill" readonly>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="myContent"
                                                    class="border-0 text-13-black py-1 w-100 height-32 search_content"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    autocomplete="off" readonly required="required">
                                                <input type="hidden" name="content_pay" id="content_id" />

                                                <ul id="listContent"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_content"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($content as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-content"
                                                                style="flex:2;">
                                                                <span class="text-13-black">{{ $value->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <div
                                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="fund"
                                                    class="border-0 text-13-black py-1 w-100 height-32 search_funds"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    name="search_funds" autocomplete="off" readonly required>
                                                <input type="hidden" name="fund_id" id="fund_id">

                                                <ul id="listFunds"
                                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                    style="z-index: 99;display: none; right:0; width:100%">
                                                    <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_funds"
                                                                id="provideFilter">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    @foreach ($funds as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-funds"
                                                                style="flex:2;">
                                                                <span class="text-13-black">{{ $value->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black text-left py-1 w-100 height-32 searchuser"
                                                name="userName" value="{{ Auth::user()->name }}" readonly>
                                        </td>
                                        <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                            <input type="text"
                                                class="border-0 text-13-black py-1 w-100 height-32 note"
                                                style="background-color:#F0F4FF; border-radius:4px;" name="note">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </section>

                </div> --}}
                <div class="border">
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                            <input type="text"
                                class="border-0 text-13-black text-left py-1 w-100 height-32 searchProductName quote"
                                value="{{ $getQuoteCount }}" readonly name="payment_code">
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44 w-100">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng - NCC</span>
                            <div
                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative w-100">
                                <input type="text" placeholder="Chọn thông tin" id="myGuest"
                                    class="border-0 text-13-black py-1 w-100 height-32 search_guest"
                                    style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" readonly
                                    required="required">
                                <input type="hidden" name="guest_id" id="guest_id">
                                <input type="hidden" name="provide_id" id="provide_id">
                                <input type="hidden" name="addr" id="addr" value="">
                                <ul id="listGuest"
                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                    style="z-index: 99;display: none; right:0; width:100%">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Chọn thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_guest"
                                                id="provideFilter">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($guest as $value)
                                        <li class="p-2 align-items-center"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" id="{{ $value->id }}" name="search-info"
                                                class="search-guest" style="flex:2;" data-name="guest">
                                                <span class="text-13-black">{{ $value->guest_name_display }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    @foreach ($provides as $value_provide)
                                        <li class="p-2 align-items-center"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" id="{{ $value_provide->id }}"
                                                name="search-info" class="search-guest" style="flex:2;"
                                                data-name="provide">
                                                <span
                                                    class="text-13-black">{{ $value_provide->provide_name_display }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người nhận</span>
                            <select name="payment_type" required
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                @foreach ($listUser as $item_user)
                                    <option value="{{ $item_user->name }}">
                                        {{ $item_user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày</span>
                            <input class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2"
                                name="" placeholder="Chọn thông tin" style="flex:2;" id="datePicker"
                                value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="payment_date" id="hiddenDateInput"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tiền</span>
                            <div class="w-100">
                                <input
                                    class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 price_export "
                                    name="total" placeholder="Nhập số tiền"
                                    style="flex:2;background-color:#F0F4FF; border-radius:4px;" id="prepayment"
                                    required />
                                <br>
                                <div class="cash_reciept" style="display: none;">
                                    <label class="" for="">Công nợ:</label>
                                    <input type="text" class="text-13-black w-auto border-0 bg-input-guest py-2"
                                        name="total_bill" id="total_bill" readonly>
                                </div>
                            </div>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nội dung</span>
                            <div
                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative w-100">
                                <input type="text" placeholder="Chọn thông tin" id="myContent"
                                    class="border-0 text-13-black py-1 w-100 height-32 search_content"
                                    style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" readonly
                                    required="required">
                                <input type="hidden" name="content_pay" id="content_id" />

                                <ul id="listContent"
                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                    style="z-index: 99;display: none; right:0; width:100%">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_content" id="contentFilter">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($content as $value)
                                        <li class="p-2 align-items-center"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" id="{{ $value->id }}" name="search-info"
                                                class="search-content" style="flex:2;">
                                                <span class="text-13-black">{{ $value->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Quỹ</span>
                            <div
                                class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative w-100">
                                <input type="text" placeholder="Chọn thông tin" id="fund"
                                    class="border-0 text-13-black py-1 w-100 height-32 search_funds"
                                    style="background-color:#F0F4FF; border-radius:4px;" name="search_funds"
                                    autocomplete="off" readonly required>
                                <input type="hidden" name="fund_id" id="fund_id">

                                <ul id="listFunds"
                                    class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                    style="z-index: 99;display: none; right:0; width:100%">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest text-13-black search_funds" id="fundFilter">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($funds as $value)
                                        <li class="p-2 align-items-center"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" id="{{ $value->id }}" name="search-info"
                                                class="search-funds" style="flex:2;">
                                                <span class="text-13-black">{{ $value->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập phiếu</span>
                            <input type="text"
                                class="border-0 text-13-black text-left py-1 w-100 height-32 searchuser"
                                name="userName" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                            <input type="text" class="border-0 text-13-black py-1 w-100 height-32 note"
                                style="background-color:#F0F4FF; border-radius:4px;" name="note">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="content">
            {{-- <div id="mySidenav" class="sidenav border">
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
                            <input type="text" placeholder="Chọn thông tin" id="myInput"
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
            </div> --}}
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
<x-print-export :title="$title" />

<script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/print.js') }}"></script>
<script src="{{ asset('/dist/js/export.js') }}"></script>

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

    $(document).on('click', '.option_pay', function() {
        console.log($(this));
    })

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

    //Tìm kiếm 
    $('#listReceive').hide();

    function toggleListGuest(input, list, filterInput) {
        input.on("click", function() {
            list.show();
        });

        $(document).click(function(event) {
            if (
                !$(event.target).closest(input).length &&
                !$(event.target).closest(filterInput).length
            ) {
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

    toggleListGuest(
        $("#myGuest"), $("#listGuest"), $("#provideFilter")
    );
    toggleListGuest(
        $("#fund"), $("#listFunds"), $("#fundFilter")
    );
    toggleListGuest(
        $("#myContent"), $("#listContent"), $("#contentFilter")
    );
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    function showList(id, list) {
        $(id).on('click', function() {
            $(list).show();
        })
    }

    $(document).ready(function() {
        $('.search-return').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $('#returnImport_id').val(detail_id);
            $('#myInput').val($(this).find('span').text())

            $.ajax({
                url: "{{ route('getReturnProduct') }}",
                type: "get",
                data: {
                    detail_id: detail_id,
                },
                success: function(data) {
                    if (data['status']) {
                        $('#prepayment').val(formatCurrency(data['total']));
                        $('#guest_id').val(data['return'].guest_id);
                        $('.search_guest').val(data['return'].nameGuest);
                        // Hiển số tiền còn lại cần thanh toán
                        $('#prepayment').val(formatCurrency(data['return'].total_return -
                            data['return'].payment));
                        $('.cash_reciept').attr('style', 'display:none;')
                    }
                }
            })
        })
    })

    $(document).ready(function() {
        $('.search-guest').on('click', function(event, detail_id) {
            var dataName = $(this).data('name');
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            if (dataName == "guest") {
                $('#guest_id').val(detail_id);
                $('#provide_id').val("");
            } else {
                $('#guest_id').val("");
                $('#provide_id').val(detail_id);
            }
            $('#myGuest').val($(this).find('span').text())
            $('#listGuest').hide();
            $.ajax({
                url: "{{ route('getDebtProvide') }}",
                type: "get",
                data: {
                    provide_id: detail_id,
                    dataName: dataName,
                },
                success: function(data) {
                    if (dataName == "guest") {
                        $('#addr').val(data['guest_address']);
                        var provideDebt = parseFloat(data['guest_debt']);
                        if (isNaN(provideDebt)) {
                            provideDebt = 0;
                        }
                        $('#total_bill').val(formatCurrency(provideDebt));
                        $('.cash_reciept').attr('style', 'display:block');

                        // Xóa sự kiện input trước đó
                        $('input[name="total_bill"]').off('input');

                        // Thiết lập sự kiện input mới với giá trị data['provide_debt']
                        $('input[name="total_bill"]').on('input', function() {
                            var inputValue = parseFloat($(this).val().replace(
                                /[^0-9.-]+/g, ""));
                            if (inputValue > provideDebt) {
                                inputValue = provideDebt;
                            }
                            $(this).val(formatCurrency(inputValue));
                        });
                    } else {
                        $('#addr').val(data['provide_address']);
                        var provideDebt = parseFloat(data['provide_debt']);
                        if (isNaN(provideDebt)) {
                            provideDebt = 0;
                        }
                        $('#total_bill').val(formatCurrency(provideDebt));
                        $('.cash_reciept').attr('style', 'display:block');
                        $('input[name="total_bill"]').on('input', function() {
                            var inputValue = parseFloat($(this).val().replace(
                                /[^0-9.-]+/g, ""));
                            if (inputValue > provideDebt) {
                                inputValue = provideDebt;
                            }
                            $(this).val(formatCurrency(inputValue));
                        });
                    }
                }
            });
        });
    })

    $(document).ready(function() {
        $('.search-receive').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $('#detailimport_id').val(detail_id);
            $('#myInput').val($(this).find('span').text())
        })
    })

    $(document).ready(function() {
        $('.search-content').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $('#content_id').val(detail_id);
            $('#myContent').val($(this).find('span').text())
        })
    })

    $(document).ready(function() {
        $('.search-funds').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $('#fund_id').val(detail_id);
            $('#fund').val($(this).find('span').text())
        })
    })



    $(document).ready(function() {
        $('.search-receive').on('click', function(event, detail_id) {
            name = $(this).find('span').text()
            $('input.price_export').val('');
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
                    $('#myInput').val(data.quotation_number == null ? data.id :
                        data.quotation_number);
                    // $('input[name^="payment_code"]').val('MTT-' + data.id)
                    // $('input[name^="payment_code"]').val(data.resultNumber)
                    $('#represent').val(data.represent)
                    $('#myGuest').val(data.provide_name);
                    $('#detailimport_id').val(data.id)
                    $('#myInput').val(name)
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
                            $('#inputcontent tbody tr:not(:first)').remove();
                            product.quoteImport.forEach(function(element) {
                                var tr =
                                    `<tr class="bg-white d-none" style="height:80px">
                                            <td class='border-right border-top-0 p-2 text-13 align-top border-bottom'>
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <input hidden='checkbox' class='cb-element checkall-btn'>

                                                    <input type="hidden" value="` + (element.product_code == null ?
                                        "" :
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

                                                    <input type='hidden' class='border-0 text-13-black px-2 py-1 w-100 height-32 searchProductName'
                                                            value='` + element.product_name + `' readonly id="searchProductName"
                                                            autocomplete='off' name='product_name[]'>
                                                </div>
                                            </td>

                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="hidden" value="` + element.product_unit + `" 
                                                    readonly autocomplete="off" 
                                                    class="border-0 px-2 py-1 w-100 product_unit height-32" name="product_unit[]">
                                            </td>

                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                    <div>
                                                        <input type='hidden' oninput="checkQty(this,` + (element
                                        .product_qty) + `)"
                                                            value="` + formatCurrency(element.product_qty) + `"
                                                            class='border-0 px-2 py-1 w-100 quantity-input text-right height-32' autocomplete='off'
                                                            name='product_qty[]' readonly>
                                                        <input type='hidden' class='tonkho'>
                                                        <div class="mt-3 text-13-blue inventory text-right d-none" tyle="top: 68%;">Tồn kho:
                                                            <span class="pl-1 soTonKho">
                                                                ` + (element.inventory == "null" ? 0 : formatCurrency(
                                        element.inventory)) + `
                                                            </span>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                    <input type='hidden' readonly class='text-right border-0 px-2 py-1 w-100 height-32 price_export' 
                                                        value="` + formatCurrency(element.price_export) + `"
                                                        autocomplete='off' name="price_export[]" required>
                                                        <div class="mt-3 text-13-blue text-right transaction d-none" id="transaction" data-toggle="modal" data-target="#recentModal">Giao dịch
                                                            gần đây
                                                        </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input readonly type="hidden" name="product_tax[]" 
                                                    class="border-0 px-2 py-1 w-100 product_tax text-center height-32" 
                                                    value="` + (element.product_tax == 99 ? "NOVAT" : element
                                        .product_tax + "%") + `">
                                            </td>

                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type='hidden' name="total_price[]"
                                                        value="` + formatCurrency(element.product_total) + `" readonly 
                                                        class="border-0 px-2 py-1 w-100 total_price text-right height-32" >
                                            </td>

                                            <td class="border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="hidden" placeholder='Nhập ghi chú'
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
                                total_tax += (element.price_export *
                                    element
                                    .product_qty) * (element
                                    .product_tax == 99 ? 0 : element
                                    .product_tax) / 100
                                total += element.price_export * element
                                    .product_qty
                            })
                            $('#payment').val(product.quoteImport[0].payment ==
                                null ? 0 :
                                formatCurrency(product.quoteImport[0]
                                    .payment));
                            $('#debt').val(product.quoteImport[0].payment ==
                                null ?
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax))) :
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax)) -
                                    product.quoteImport[0].payment
                                ))
                            $('#total_bill').val(formatCurrency(Math.round(
                                    total) +
                                Math.round(total_tax)))
                            // $('#prepayment').on('input', function() {
                            //     checkQty(this, product[0].payment ==
                            //         null ? (Math.round(total) + Math
                            //             .round(
                            //                 total_tax)) :
                            //         (Math.round(total) + Math.round(
                            //             total_tax)) - product[0]
                            //         .payment
                            //     );
                            // })

                            // Chặn quá số tiền
                            $('#prepayment').off('input');
                            $('#prepayment').on('input', function() {
                                var currentVal = parseFloat($(this)
                                    .val().replace(/,/g, ''));

                                var amount_owed = Math.round(total) +
                                    Math.round(total_tax);

                                if (currentVal > amount_owed) {
                                    $(this).val(formatCurrency(
                                        amount_owed));
                                } else {
                                    $(this).val(formatCurrency(
                                        currentVal));
                                }
                            });
                            $('.payment_all').text(product.quoteImport[0]
                                .payment == null ?
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax))) :
                                formatCurrency(
                                    (Math.round(total) + Math.round(
                                        total_tax)) -
                                    product.quoteImport[0].payment
                                ))

                            // $('input[name="total"]').val(product[0].payment ==
                            //     null ?
                            //     formatCurrency(
                            //         (Math.round(total) + Math.round(
                            //             total_tax))) :
                            //     formatCurrency(
                            //         (Math.round(total) + Math.round(
                            //             total_tax)) -
                            //         product[0].payment
                            //     ))
                            $('input[name="total_bill"]').val(formatCurrency(
                                Math
                                .round(product.quoteImport[0]
                                    .total_tax) - Math.round(product
                                    .payment)))
                            $('.cash_reciept').attr('style', 'display:block;')
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
    var submit = false;

    async function checkQuotetion() {
        var payment_code = $("input[name='payment_code']").val();

        try {
            let isUnique = await $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    payment_code: payment_code,
                }
            });

            if (isUnique['status']) {
                return payment_code; // Mã duy nhất, trả về mã hiện tại
            }

            showNotification('warning', 'Mã phiếu đã tồn tại, đang tạo mã mới...');

            // Tạo mã mới nếu bị trùng
            let new_code = payment_code;
            while (!isUnique['status']) {
                let matches = new_code.match(/^(\D+)(\d+)(-\d+)$/);
                if (matches) {
                    let prefix = matches[1];
                    let number = (parseInt(matches[2]) + 1).toString().padStart(matches[2].length,
                        '0'); // Tăng số và giữ độ dài cố định
                    let suffix = matches[3];
                    new_code = `${prefix}${number}${suffix}`;
                } else {
                    showNotification('error', 'Mã thanh toán không đúng định dạng.');
                    return null;
                }

                // Kiểm tra mã mới có duy nhất không
                isUnique = await $.ajax({
                    url: "{{ route('checkQuotetion') }}",
                    type: "get",
                    data: {
                        payment_code: new_code,
                    }
                });
            }

            $("input[name='payment_code']").val(new_code); // Cập nhật input với mã mới
            return new_code; // Trả về mã mới duy nhất
        } catch (error) {
            console.error('Error:', error);
            return null;
        }
    }

    $('form').on('submit', async function(e) {
        e.preventDefault();
        var check = false;

        if ($('#fund_id').val() === "" || $('#content_id').val() === "") {
            check = true;
            $('#fund_id').val() === "" ? showNotification('warning', 'Vui lòng chọn quỹ thanh toán') :
                showNotification('warning', 'Vui lòng chọn nội dung thanh toán');
        }

        if (!check) {
            let result = await checkQuotetion();
            if (result) {
                submit = true;
                $('form')[1].submit();
            }
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
