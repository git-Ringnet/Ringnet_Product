<x-navbar :title="$title" activeGroup="manageProfess" activeName="cash_receipts"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('cash_receipts.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" name="returnImport_id" id="returnImport_id">
        <input type="hidden" name="guestId" id="guestId">
        <input type="hidden" name="code_reciept" id="code_reciept" value="{{ $invoiceAuto }}">
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
                    <span class="nearLast-span">Phiếu thu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo phiếu thu</span>
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
                                    onclick="printCashRC('printContent','PHIẾU THU')">Phiếu thu</a>
                            </div>
                        </div>
                        <a href="{{ route('cash_receipts.index', $workspacename) }}" class="user_flow" data-type="TTMH"
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
                        {{-- <button type="submit" value="1" class="btn-destroy mx-1 d-flex align-items-center h-100"
                            id="luuNhap">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                        </button> --}}
                        <button type="submit" value="2" class="custom-btn mx-1 d-flex align-items-center h-100"
                            id="xacNhan">
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
                                <rect x="16" width="16" height="16" rx="5"
                                    transform="rotate(90 16 0)" fill="#ECEEFA"></rect>
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8"></path>
                            </svg>
                        </button>

                        <input type="hidden" name="action" value="">
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-75">
            <x-view-mini :listDetail="$listDetail" :workspacename="$workspacename" :page="'PT'" :status="'1'" :guest="$guest" :listUser="$listUser" />
            <div id="main">
                {{-- <section class="content">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                            THÔNG TIN PHIẾU THU
                        </p>
                    </div>
                    <div class="container-fluided">
                        <section class="content" style="height: 80vh;">
                            <div
                                class="content-info position-relative table-responsive text-nowrap order_content h-100">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:50px;">
                                            <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                            <span>Đơn bán hàng</span>
                                        </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                                <input class="checkall-btn ml-4 mr-1" id="checkall" type="checkbox">
                                                <span class="text-table text-secondary text-left">Mã phiếu</span>
                                            </th>
                                            <th class="border-right text-left p-0 px-2 text-13" style="width:8%;">Ngày
                                            </th>
                                            <th class="border-right text-left p-0 px-2 text-13" style="width:10%;">
                                                Khách
                                                hàng
                                            </th>
                                            <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">
                                                Người
                                                nộp
                                            </th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Số
                                                tiền
                                            </th>
                                            <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Nội
                                                dung
                                            </th>
                                            <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">Quỹ
                                            </th>
                                            <th class="border-right p-0 px-2 text-left text-13" style="width:10%;">
                                                Người
                                                lập phiếu
                                            </th>
                                            <th class="p-0 px-2 textleft note text-13">Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white" style="height:80px;">
                                            <td
                                                class="border-right border-top-0 p-2 text-13 align-top border-bottom position-relative">
                                                <input type="text" placeholder="Chọn thông tin" id="myInput"
                                                    readonly
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
                                                    @foreach ($detailOwed as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-receipts"
                                                                style="flex:2;">
                                                                <span
                                                                    class="text-13-black">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @foreach ($returnImport as $value)
                                                        <li class="p-2 align-items-center"
                                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="javascript:void(0)" id="{{ $value->id }}"
                                                                name="search-info" class="search-return"
                                                                style="flex:2;">
                                                                <span
                                                                    class="text-13-black">{{ $value->return_code }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 searchProductName"
                                                    value="{{ $invoiceAuto }}" readonly disabled>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input
                                                    class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 px-2"
                                                    name="" placeholder="Chọn thông tin" style="flex:2;"
                                                    id="datePicker" value="{{ date('Y-m-d') }}" />
                                                <input type="hidden" name="payment_date" id="hiddenDateInput"
                                                    value="{{ date('Y-m-d') }}">
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <div
                                                    class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                    <input type="text" placeholder="Chọn thông tin" id="myGuest"
                                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_guest"
                                                        style="background-color:#F0F4FF; border-radius:4px;"
                                                        autocomplete="off" readonly>
                                                    <input type="hidden" name="guest_id" id="guest_id">

                                                    <ul id="listGuest"
                                                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                        style="z-index: 99;display: none; right:0; width:100%">
                                                        <div class="p-1">
                                                            <div class="position-relative">
                                                                <input type="text" placeholder="Tìm kiếm"
                                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
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
                                                                        class="text-13-black">{{ $value->guest_name_display }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text" required
                                                    class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2"
                                                    name="payer" style="background-color:#F0F4FF;"
                                                    placeholder="Nhập người nộp">
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text"
                                                    class="text-13-black w-100 border-0 bg-input-guest text-right flatpickr-input py-2 px-2 price_export "
                                                    name="total" placeholder="Nhập số tiền"
                                                    style="flex:2;background-color:#F0F4FF; border-radius:4px;"
                                                    required autocomplete="off" />
                                                <br>
                                                <div class="cash_reciept text-right" style="display: none">
                                                    <label class="text-right" for="">Công nợ:</label><input
                                                        type="text"
                                                        class="text-13-black w-auto text-right border-0 bg-input-guest flatpickr-input py-2 px-2"
                                                        name="money_reciept" id="money_reciept">
                                                </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <div
                                                    class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative">
                                                    <input type="text" placeholder="Chọn thông tin" id="myContent"
                                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_content"
                                                        style="background-color:#F0F4FF; border-radius:4px;"
                                                        autocomplete="off" readonly required="required" required>
                                                    <input type="hidden" name="content_pay" id="content_id" />

                                                    <ul id="listContent"
                                                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                                        style="z-index: 99;display: none; right:0; width:100%">
                                                        <div class="p-1">
                                                            <div class="position-relative">
                                                                <input type="text" placeholder="Tìm kiếm nội dung"
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
                                                                    <span
                                                                        class="text-13-black">{{ $value->name }}</span>
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
                                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_funds"
                                                        style="background-color:#F0F4FF; border-radius:4px;"
                                                        name="search_funds" autocomplete="off" readonly>
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
                                                                    <span
                                                                        class="text-13-black">{{ $value->name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 searchuser"
                                                    name="userName" value="{{ Auth::user()->name }}" readonly
                                                    disabled>
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <input type="text"
                                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 note"
                                                    style="background-color:#F0F4FF; border-radius:4px;"
                                                    name="note">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </section> --}}
                <div class="border">
                    <div>
                        <div class="bg-filter-search border-0 text-center">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN PHIẾU THU
                            </p>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                                <input type="text"
                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 searchProductName quote"
                                    value="{{ $invoiceAuto }}" readonly disabled>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                                <div
                                    class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative w-100">
                                    <input type="text" placeholder="Chọn thông tin" id="myGuest"
                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_guest"
                                        style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                        readonly>
                                    <input type="hidden" name="guest_id" id="guest_id">
                                    <input type="hidden" name="addr" id="addr" value="">
                                    <ul id="listGuest"
                                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                        style="z-index: 99;display: none; right:0; width:100%">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Tìm kiếm"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
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
                                                    name="search-info" class="search-guest" style="flex:2;">
                                                    <span class="text-13-black">{{ $value->guest_name_display }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 2;">Người nộp</span>
                                <select name="payer" required style="flex: 2;"
                                    class="text-13-black w-100 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                    @foreach ($guest as $item_guest)
                                        <option value="{{ $item_guest->guest_name_display }}">
                                            {{ $item_guest->guest_name_display }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày</span>
                                <input class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 px-2"
                                    name="" placeholder="Chọn thông tin" style="flex:2;" id="datePicker"
                                    value="{{ date('Y-m-d') }}" />
                                <input type="hidden" name="payment_date" id="hiddenDateInput"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tiền</span>
                                <div class="w-100">
                                    <input type="text"
                                        class="text-13-black w-100 border-0 bg-input-guest flatpickr-input py-2 px-2 price_export"
                                        name="total" placeholder="Nhập số tiền"
                                        style="flex:8; background-color:#F0F4FF; border-radius:4px;" required
                                        autocomplete="off" />
                                    <div class="cash_reciept text-right" style="display: none">
                                        <label class="text-right" for="">Công nợ:</label>
                                        <input type="text"
                                            class="text-13-black w-auto text-right border-0 bg-input-guest flatpickr-input py-2 px-2"
                                            name="money_reciept" id="money_reciept">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nội dung</span>
                                <div
                                    class="border-0 d-flex justify-content-between border-bottom border-top align-items-center text-left text-nowrap position-relative w-100">
                                    <input type="text" placeholder="Chọn thông tin" id="myContent"
                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_content"
                                        style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                        readonly required="required" required>
                                    <input type="hidden" name="content_pay" id="content_id" />

                                    <ul id="listContent"
                                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                        style="z-index: 99;display: none; right:0; width:100%">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Tìm kiếm nội dung"
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
                                                    name="search-info" class="search-content" style="flex:2;">
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
                                        class="border-0 text-13-black px-2 py-1 w-100 height-32 search_funds"
                                        style="background-color:#F0F4FF; border-radius:4px;" name="search_funds"
                                        autocomplete="off" readonly>
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
                                                    name="search-info" class="search-funds" style="flex:2;">
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
                                    class="border-0 text-13-black px-2 py-1 w-100 height-32 searchuser"
                                    name="userName" value="{{ Auth::user()->name }}" readonly disabled>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                                <input type="text" class="border-0 text-13-black px-2 py-1 w-100 height-32 note"
                                    style="background-color:#F0F4FF; border-radius:4px;" name="note">
                            </div>
                        </div>
                    </div>
                </div>
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
<x-print-export :title="$title" />

<script src="{{ asset('/dist/js/cash_reciepts.js') }}"></script>
<script src="{{ asset('/dist/js/print.js') }}"></script>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    // DebtGuest
    $(document).ready(function() {
        $('.search-guest').on('click', function(event, detail_id) {
            $('input.price_export').val('');
            if (detail_id) {
                detail_id = detail_id;
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            $('#guestId').val(detail_id);
            $('#myGuest').val($(this).find('span').text());
            $('#listGuest').hide();
            $.ajax({
                url: "{{ route('getDebtGuest') }}",
                type: "get",
                data: {
                    guest_id: detail_id,
                },
                success: function(data) {
                    $('#addr').val(data['guest_address']);
                    var guestDebt = parseFloat(data['guest_debt']);
                    if (isNaN(guestDebt)) {
                        guestDebt = 0;
                    }
                    $('#money_reciept').val(formatCurrency(guestDebt));
                    $('.cash_reciept').attr('style', 'display:block');

                    // Xóa sự kiện input trước đó
                    $('input[name="total"]').off('input');

                    // Thiết lập sự kiện input mới với giá trị data['guest_debt']
                    $('input[name="total"]').on('input', function() {
                        var inputValue = parseFloat($(this).val().replace(
                            /[^0-9.-]+/g, ""));
                        if (inputValue > guestDebt) {
                            inputValue = guestDebt;
                        }
                        $(this).val(formatCurrency(inputValue));
                    });
                }
            });
        });
    })

    function checkQty(value, odlQty) {
        var inputValue = parseFloat($(value).val().replace(/[^0-9.-]+/g, ""));
        if (inputValue > odlQty) {
            inputValue = odlQty;
        }
        $(value).val(formatCurrency(inputValue));
    }

    var error = false;
    var submit = false;

    async function checkQuotetion() {
        var payment_code = $("input[name='code_reciept']").val();

        try {
            let isUnique = await $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    code_reciept: payment_code,
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
                        code_reciept: new_code,
                    }
                });
            }

            $("input[name='code_reciept']").val(new_code); // Cập nhật input với mã mới
            return new_code; // Trả về mã mới duy nhất
        } catch (error) {
            console.error('Error:', error);
            return null;
        }
    }

    $("form").on("submit", async function(e) {
        e.preventDefault();

        if ($("#fund_id").val() === "" || $("#content_id").val() === "") {
            showNotification("warning", "Vui lòng chọn quỹ thanh toán hoặc nội dung thanh toán.");
            return;
        }

        let result = await checkQuotetion();
        if (result) {
            submit = true;
            $("form")[1].submit(); // Submit form
        } else {
            showNotification("warning", "Không thể tạo mã phiếu duy nhất.");
        }
    });
</script>
