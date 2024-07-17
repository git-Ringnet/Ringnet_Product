<x-navbar :title="$title" activeGroup="manageProfess" activeName="quote" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
    method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">
    <div class="content-wrapper--2Column m-0">
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
                    <span class="nearLast-span">Phiếu bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $detailExport->quotation_number }}</span>
                    @if ($detailExport->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('detailExport.index', $workspacename) }}" class="activity" data-name1="BG"
                            data-des="Hủy ">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <button type="submit" name="action1" value="action_1" onclick="kiemTraFormGiaoHang(event);"
                            class="custom-btn d-flex mx-1 align-items-center h-100" id="btn-submit">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <input type="hidden" id="hiddenAction" name="action" value="action_1">
                            <span class="text-btnIner-primary ml-2">Lưu</span>
                        </button>
                        <button id="sideGuest" type="button" class="btn-option border-0">
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
        <div class="content margin-top-117">
            <section class="content">
                {{-- Thông tin khách hàng --}}
                <div class="border">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH
                            HÀNG</p>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày lập</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" id="datePicker" style="flex:2;"
                                value="{{ date_format(new DateTime($detailExport->ngayBG), 'd/m/Y') }}" />
                            <input type="hidden" id="hiddenDateInput" name="date_quote"
                                value="{{ date_format(new DateTime($detailExport->ngayBG), 'Y-m-d') }}">
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 btn-click" style="flex: 1.5;">
                                Khách hàng
                            </span>
                            <span class="mx-1 text-13" style="flex: 2;">
                                <input type="text" name="guestName" readonly placeholder="Chọn thông tin"
                                    <?php if ($detailExport->tinhTrang != 1) {
                                        echo 'disabled';
                                    } ?> value="{{ $detailExport->export_guest_name }}"
                                    class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest" id="myInput"
                                    style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" required>
                                <input type="hidden" class="idGuest" autocomplete="off"
                                    value="{{ $detailExport->maKH }}" name="guest_id">
                                <div class="d-flex align-items-center justify-content-between border-0">
                                    <div id="myUL"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;display: none;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập công ty"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data">
                                            @foreach ($guest as $guest_value)
                                                <li class="p-2 align-items-center text-wrap"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                    data-id="{{ $guest_value->id }}">
                                                    <a href="#" title="{{ $guest_value->guest_name_display }}"
                                                        class="search-info" style="flex:2;"
                                                        id="{{ $guest_value->id }}" name="search-info">
                                                        <span
                                                            class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                                    </a>
                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown"
                                                            class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting"
                                                            style="z-index: 1000;">
                                                            <a class="dropdown-item edit-guest w-50" href="#"
                                                                data-toggle="modal" data-target="#guestModal"
                                                                data-id="{{ $guest_value->id }}">
                                                                <i class="fa-regular fa-pen-to-square"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a class="dropdown-item delete-guest w-50" href="#"
                                                                data-id="{{ $guest_value->id }}" data-name="guest">
                                                                <i class="fa-solid fa-trash-can"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a type="button"
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
                                                style="font-weight: 600 !important;">Thêm
                                                khách hàng</span>
                                        </a>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 btn-click" style="flex: 1.5;"> Ngày giao hàng
                            </span>
                            <input id="date_delivery" readonly
                                value="{{ date_format(new DateTime($detailExport->date_delivery), 'd/m/Y') }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2" />
                            <input type="hidden" id="hiddenDateDelivery" name="date_delivery"
                                value="{{ date_format(new DateTime($detailExport->date_delivery), 'd/m/Y') }}">
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"
                                style="flex:2;" <?php if ($detailExport->tinhTrang != 1) {
                                    echo 'readonly';
                                } ?> value="{{ $detailExport->quotation_number }}"
                                name="quotation_number" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Họ và tên</span>
                            <input name="guestName" value="{{ $detailExport->guest_name }}"
                                class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 bg-input-guest-blue"style="flex:2;" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa chỉ giao hàng</span>
                            <input name="address_delivery" value="{{ $detailExport->address_delivery }}"
                                class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 bg-input-guest-blue"style="flex:2;" />
                        </div>

                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số phiếu</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"
                                placeholder="Chọn thông tin" style="flex:2;"
                                value="{{ $detailExport->reference_number }}" name="reference_number" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa chỉ</span>
                            <input name="address_guest" value="{{ $detailExport->address_guest }}"
                                class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 bg-input-guest-blue"style="flex:2;" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Trạng thái giao</span>
                            <select name="status_receive"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                <option value="1" class="text-uppercase" <?php if ($detailExport->status_receive == 1) {
                                    echo 'selected';
                                } ?>>Chưa giao</option>
                                <option value="2" class="text-uppercase" <?php if ($detailExport->status_receive == 2) {
                                    echo 'selected';
                                } ?>>Đã giao</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập</span>
                            <input value="{{ $detailExport->name }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;"
                                readonly />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                            <input name="note" value="{{ $detailExport->note }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">SĐT người nhận hàng</span>
                            <input name="phone_receive" value="{{ $detailExport->phone_receive }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;" />
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thông tin liên hệ</span>
                            <input disabled class="text-13-black w-50 border-0 bg-input-guest  py-2 px-2"
                                style="flex:5.5;" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng nợ cũ</span>
                            <input disabled=""
                                class="text-13-black text-right w-50 border-0 bg-input-guest py-2 px-2 debt-old"
                                value="{{ number_format($detailExport->guest_debt) }}" style="flex:5.5;">
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhân viên Sale</span>
                            <select name="id_sale"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                <option value=""></option>
                                @foreach ($listUser as $listU)
                                    <option value="{{ $listU->id }}" <?php if ($listU->id === $detailExport->id_sale) {
                                        echo 'selected';
                                    } ?>>{{ $listU->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người nhận hàng</span>
                            <input name="receiver" value="{{ $detailExport->receiver }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;" />
                        </div>
                        <div
                            class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thời hạn thanh toán</span>
                            <input id="date_payment"
                                value="{{ date_format(new DateTime($detailExport->date_payment), 'd/m/Y') }}"
                                class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;" />
                            <input type="hidden" id="hiddenDatePayment" name="date_payment"
                                value="{{ date_format(new DateTime($detailExport->date_payment), 'd/m/Y') }}">
                        </div>
                    </div>
                </div>
                <div class="bg-filter-search text-center border-custom border-0">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                        THÔNG TIN SẢN PHẨM
                    </p>
                </div>
                <div class="container-fluided">
                    <section class="content">
                        <div class="content-info position-relative text-nowrap">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:15%;">
                                            <span class="mx-1 mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M6.37 7.63C6.49289 7.75305 6.56192 7.91984 6.56192 8.09375C6.56192 8.26766 6.49289 8.43445 6.37 8.5575L4.375 10.5L5.46875 11.5938C5.46875 11.7678 5.39961 11.9347 5.27654 12.0578C5.15347 12.1809 4.98655 12.25 4.8125 12.25H2.40625C2.2322 12.25 2.06528 12.1809 1.94221 12.0578C1.81914 11.9347 1.75 11.7678 1.75 11.5938V9.1875C1.75 9.01345 1.81914 8.84653 1.94221 8.72346C2.06528 8.60039 2.2322 8.53125 2.40625 8.53125L3.5 9.625L5.4425 7.63C5.56555 7.50711 5.73234 7.43808 5.90625 7.43808C6.08016 7.43808 6.24695 7.50711 6.37 7.63ZM7.63 6.37C7.50711 6.24695 7.43808 6.08016 7.43808 5.90625C7.43808 5.73234 7.50711 5.56555 7.63 5.4425L9.625 3.5L8.53125 2.40625C8.53125 2.2322 8.60039 2.06528 8.72346 1.94221C8.84653 1.81914 9.01345 1.75 9.1875 1.75H11.5938C11.7678 1.75 11.9347 1.81914 12.0578 1.94221C12.1809 2.06528 12.25 2.2322 12.25 2.40625V4.8125C12.25 4.98655 12.1809 5.15347 12.0578 5.27654C11.9347 5.39961 11.7678 5.46875 11.5938 5.46875L10.5 4.375L8.5575 6.37C8.43445 6.49289 8.26766 6.56192 8.09375 6.56192C7.91984 6.56192 7.75305 6.49289 7.63 6.37Z"
                                                        fill="#26273B" fill-opacity="0.8" />
                                                </svg>
                                            </span>
                                            <span class="pl-3 text-left">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:17%;">Tên sản
                                            phẩm</th>
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:7%;">Đơn vị
                                        </th>
                                        <th class="border-right p-0 px-2 text-13 text-right" style="width:10%;">
                                            Số lượng
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                            Đơn giá
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            KM
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            Thuế
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13"style="width:15%;">
                                            Thành tiền
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13"style="width:10%;">
                                            Kho
                                        </th>
                                        <th class="border-right p-0 px-2 text-left note text-13" style="width:15%;">
                                            Ghi chú sản phẩm
                                        </th>
                                        @if ($detailExport->tinhTrang == 1)
                                            <th class="p-0 px-2 text-center note text-13"></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quoteExport as $item_quote)
                                        <tr class="bg-white addProduct" style="height:80px;">
                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'
                                                style="">
                                                <span class="ml-1 mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                        height="10" viewBox="0 0 6 10" fill="none">
                                                        <g clip-path="url(#clip0_1710_10941)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                fill="#282A30" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1710_10941">
                                                                <rect width="6" height="10" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <input type="checkbox" class="cb-element checkall-btn">
                                                <input type="text" autocomplete="off" readonly
                                                    value="{{ $item_quote->product_code }}"
                                                    class="border-0 px-2 py-1 w-75 product_code height-32"
                                                    name="product_code[]">
                                            </td>
                                            <td
                                                class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>
                                                <ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data'
                                                    style='z-index: 99;top: 44%;left: 0%;display: none;'>
                                                    @foreach ($product as $product_value)
                                                        <li data-id="{{ $product_value->id }}">
                                                            <a href='javascript:void(0);'
                                                                class='text-dark d-flex justify-content-between p-2 idProduct w-100'
                                                                id='{{ $product_value->id }}' name='idProduct'>
                                                                <span
                                                                    class='w-50 text-13-black'>{{ $product_value->product_name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class='d-flex align-items-center'>
                                                    <input type='text' <?php if ($detailExport->tinhTrang != 1) {
                                                        echo 'disabled';
                                                    } ?>
                                                        class='border-0 px-2 py-1 w-100 product_name height-32'
                                                        autocomplete='off' required name='product_name[]'
                                                        value="{{ $item_quote->product_name }}">

                                                    <input type='hidden' class='product_id' autocomplete='off'
                                                        value="{{ $item_quote->product_id }}" name="product_id[]">

                                                    <div class='info-product' data-toggle='modal'
                                                        data-target='#productModal'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='14'
                                                            height='14' viewBox='0 0 14 14' fill='none'>
                                                            <g clip-path='url(#clip0_2559_39956)'>
                                                                <path
                                                                    d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z'
                                                                    fill='#282A30' />
                                                                <path
                                                                    d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z'
                                                                    fill='#282A30' />
                                                                <path
                                                                    d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z'
                                                                    fill='#282A30' />
                                                            </g>
                                                            <defs>
                                                                <clipPath id='clip0_2559_39956'>
                                                                    <rect width='14' height='14'
                                                                        fill='white' />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <input type='text' autocomplete='off'
                                                    value="{{ $item_quote->product_unit }}"
                                                    class='border-0 px-2 py-1 w-100 product_unit height-32' readonly
                                                    name='product_unit[]'>
                                            </td>

                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <div>
                                                    <input type='text' <?php if ($detailExport->tinhTrang != 1) {
                                                        echo 'readonly';
                                                    } ?>
                                                        class='text-right border-0 px-2 py-1 w-100 quantity-input height-32'
                                                        value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                        autocomplete='off' required name='product_qty[]'>
                                                    <input type='hidden' class='tonkho'>
                                                    <div
                                                        class="mt-3 text-13-blue inventory text-right <?php if ($item_quote->type == 2) {
                                                            echo 'd-none';
                                                        } ?>">
                                                        Tồn kho: <span
                                                            class="pl-1 soTonKho">{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <div>
                                                    <input type='text' <?php if ($detailExport->tinhTrang != 1) {
                                                        echo 'readonly';
                                                    } ?>
                                                        class='text-right border-0 px-2 py-1 w-100 product_price height-32'
                                                        autocomplete='off' name='product_price[]' required
                                                        value="{{ number_format($item_quote->price_export) }}">
                                                </div>
                                                <a href="#" class="activity" data-name1="BG"
                                                    data-des="Xem giao dịch gần đây ở trang chỉnh sửa">
                                                    <div class="mt-3 text-13-blue recentModal" data-toggle="modal"
                                                        data-target="#recentModal" style="">Giao dịch gần đây
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                @php
                                                    $promotionArray = json_decode($item_quote->promotion, true);
                                                    $promotionValue = isset($promotionArray['value'])
                                                        ? $promotionArray['value']
                                                        : '';
                                                    $promotionOption = isset($promotionArray['type'])
                                                        ? $promotionArray['type']
                                                        : '';
                                                @endphp
                                                <div>
                                                    <input type="text"
                                                        class="border-0 px-2 py-1 w-100 text-right height-32 promotion"
                                                        name="promotion[]"
                                                        value="{{ $promotionValue ? number_format($promotionValue) : 0 }}">
                                                </div>
                                                <div class="mt-3 text-13-blue text-right">
                                                    <select class="border-0 promotion-option"
                                                        name="promotion-option[]">
                                                        <option value="1"
                                                            @if ($promotionOption == 1) selected @endif>
                                                            Nhập tiền </option>
                                                        <option value="2"
                                                            @if ($promotionOption == 2) selected @endif>
                                                            Nhập %</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <select name='product_tax[]'
                                                    class='border-0 py-1 w-100 text-center product_tax height-32'
                                                    required="">
                                                    <option value="0" <?php if ($item_quote->product_tax == 0) {
                                                        echo 'selected';
                                                    } ?>>0% </option>
                                                    <option value="8" <?php if ($item_quote->product_tax == 8) {
                                                        echo 'selected';
                                                    } ?>>8%</option>
                                                    <option value="10" <?php if ($item_quote->product_tax == 10) {
                                                        echo 'selected';
                                                    } ?>>10%</option>
                                                    <option value="99" <?php if ($item_quote->product_tax == 99) {
                                                        echo 'selected';
                                                    } ?>>NOVAT</option>
                                                </select>
                                            </td>
                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <input type='text' readonly
                                                    value="{{ number_format($item_quote->product_total) }}"
                                                    class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>
                                            </td>
                                            <td
                                                class='border-right p-2 text-13 align-top border-bottom border-top-0 position-relative'>
                                                <input id="searchWarehouse" type="text" placeholder="Chọn kho"
                                                    class="border-0 py-1 w-100 height-32 text-13-black searchWarehouse"
                                                    name="warehouse[]"
                                                    value="@if (isset($item_quote->getWareHouse)) {{ $item_quote->getWareHouse->warehouse_name }} @endif">
                                                <input type="hidden" placeholder="Chọn kho"
                                                    class="border-0 py-1 w-100 height-32 text-13-black warehouse_id"
                                                    name="warehouse_id[]" value="{{ $item_quote->warehouse_id }}">
                                                <div id="listWareH"
                                                    class="bg-white position-absolute rounded shadow p-1 z-index-block"
                                                    style="z-index: 99;">
                                                    <ul id="listWarehouse" class="m-0 p-0 scroll-data listWarehouse"
                                                        style="z-index: 99; left: 0%; top: 44%; display: none;">
                                                        <div class="p-1">
                                                            <div class="position-relative"><input type="text"
                                                                    placeholder="Nhập kho hàng"
                                                                    class="pr-4 w-100 input-search bg-input-guest searchWarehouse"
                                                                    id="a"><span id="search-icon"
                                                                    class="search-icon"><i
                                                                        class="fas fa-search text-table"
                                                                        aria-hidden="true"></i></span></div>
                                                        </div>
                                                        @foreach ($warehouse as $item)
                                                            <li class="w-100">
                                                                <a data-id="{{ $item->id }}"
                                                                    data-value="{{ $item->warehouse_name }}"
                                                                    href="javascript:void(0)"
                                                                    class="text-dark d-flex w-100 justify-content-between p-2 search-warehouse"
                                                                    name="search-warehouse">
                                                                    <span
                                                                        class="w-100 text-13-black">{{ $item->warehouse_name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                            <td
                                                class='border-right p-2 note text-13 align-top border-bottom border-top-0'>
                                                <input type='text' name="product_note[]" <?php if ($detailExport->tinhTrang != 1) {
                                                    echo 'readonly';
                                                } ?>
                                                    value="{{ $item_quote->product_note }}"
                                                    class='border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú'>
                                            </td>
                                            @if ($detailExport->tinhTrang == 1)
                                                <td class='p-2 align-top border-bottom border-top-0'>
                                                    <svg class="delete-product activity" data-name1="BG"
                                                        data-des="Xóa sản phẩm ở trang chỉnh sửa" width='17'
                                                        height='17' viewBox='0 0 17 17' fill='none'
                                                        xmlns='http://www.w3.org/2000/svg'>
                                                        <path fill-rule='evenodd' clip-rule='evenodd'
                                                            d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z'
                                                            fill='#6B6F76' />
                                                    </svg>
                                                </td>
                                            @endif
                                            <td style="display:none;" class="">
                                                <input type="text" class="product_tax1">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                            @if ($detailExport->tinhTrang == 1)
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex ml-3">
                                            <button type="button" data-toggle="dropdown" id="add-field-btn"
                                                data-name1="BG" data-des="Thêm sản phẩm ở trang chỉnh sửa"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded activity"
                                                style="margin-right:10px">
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
                            @endif
                        </div>
                    </section>
                    <div class="content">
                        <div class="row" style="width:95%;">
                            <div class="position-relative col-lg-4 px-0"></div>
                            <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                <div class="m-3 ">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-13-black">
                                            Giá trị trước thuế:
                                        </span>
                                        <span id="total-amount-sum" class="text-13-black text-right">0đ</span>
                                    </div>
                                    @if ($detailExport != '')
                                        @php
                                            $promotionArray = json_decode($detailExport->promotion, true);
                                            $promotionValue = isset($promotionArray['value'])
                                                ? $promotionArray['value']
                                                : '';
                                            $promotionOption = isset($promotionArray['type'])
                                                ? $promotionArray['type']
                                                : '';
                                        @endphp
                                    @endif
                                    <div class="d-flex justify-content-between mt-2 align-items-center">
                                        <span class="text-13-black">Khuyến mãi</span>
                                        <input name="promotion-total" type="number"
                                            class="text-table border-0 text-right promotion-total"
                                            style="background-color:#F0F4FF "
                                            @if ($detailExport != '') value="{{ $promotionValue ? number_format($promotionValue) : 0 }}" @endif>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 align-items-center">
                                        <span class="text-13-black">Hình thức</span>
                                        <select name="promotion-option-total" id=""
                                            class="border-0 promotion-option-total">
                                            <option value="1" @if ($detailExport != '' && $promotionOption == 1) selected @endif>
                                                Nhập tiền
                                            </option>
                                            <option value="2" @if ($detailExport != '' && $promotionOption == 2) selected @endif>
                                                Nhập %
                                            </option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-13-black">
                                            Thuế VAT:
                                        </span>
                                        <span id="product-tax" class="text-13-black text-right">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-13-bold text-lg font-weight-bold">
                                            Tổng cộng:
                                        </span>
                                        <span class="text-13-bold text-lg font-weight-bold text-right"
                                            id="grand-total" data-value="0">0đ</span>
                                        <input type="text" hidden="" name="totalValue" value="0"
                                            id="total" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        {{-- Modal khách hàng --}}
        <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 5%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <div class="mt-2">
                                <input type="hidden" id="id_guest" autocomplete="off">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Tên hiển thị
                                </p>
                                <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name_display" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Mã số thuế
                                </p>
                                <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                    oninput="validateInput(this)"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_code" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Địa chỉ
                                </p>
                                <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_address" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên viết tắt
                                </p>
                                <input name="key" type="text" placeholder="Nhập thông tin" id="key"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên đầy đủ
                                </p>
                                <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input type="hidden" id="represent_guest_id">
                                <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                    id="represent_guest_name"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Số điện thoại
                                </p>
                                <input type="text" placeholder="Nhập thông tin" id="guest_phone"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Email
                                </p>
                                <input type="text" placeholder="Nhập thông tin" id="guest_email"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ nhận
                                </p>
                                <input type="text" placeholder="Nhập thông tin" id="guest_receiver"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addGuest">Thêm khách hàng</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="updateGuest">Sửa khách hàng</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal người đại diện --}}
        <div class="modal fade" id="representModal" tabindex="-1" role="dialog"
            aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 10%;max-width: 20%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <input type="hidden"
                                class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                id="represent_id" autocomplete="off">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input name="represent_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_name" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Số điện thoại
                                </p>
                                <input name="represent_phone" type="number" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_phone" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Email
                                </p>
                                <input name="represent_email" type="email" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_email" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ nhận
                                </p>
                                <input name="represent_address" type="text" placeholder="Nhập thông tin"
                                    id="represent_address"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addRepresent">Thêm người đại diện</button>
                        <button type="button" class="custom-btn h-100 py-1 px-2 text-table" id="updateRepresent">Cập
                            nhật người đại diện</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal dự án --}}
        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 10%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <input type="hidden"
                                class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                id="represent_id" autocomplete="off">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên dự án
                                </p>
                                <input name="project_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="project_name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addProject">Thêm dự án
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>

<x-date-form-modal title="Điều khoản thanh toán" name="payment" idModal="formModalpayment"></x-date-form-modal>
<x-date-form-modal title="Hiệu lực báo giá" name="quote" idModal="formModalquote"></x-date-form-modal>
<x-date-form-modal title="Hàng hóa" name="goods" idModal="formModalgoods"></x-date-form-modal>
<x-date-form-modal title="Giao hàng" name="delivery" idModal="formModaldelivery"></x-date-form-modal>
<x-date-form-modal title="Địa điểm" name="location" idModal="formModallocation"></x-date-form-modal>
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
<div class="modal fade" id="recentModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
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
                <div class="outer text-nowrap" style="scrollbar-width: inherit;">
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
                                                Khách hàng
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá bán
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
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script type="text/javascript">
    //
    $(document).ready(function() {
        flatpickr("#datePicker", {
            locale: "vn",
            dateFormat: "d/m/Y",
            onChange: function(selectedDates, dateStr, instance) {
                // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                document.getElementById("hiddenDateInput").value = instance.formatDate(
                    selectedDates[0],
                    "Y-m-d");
            },
            onReady: function(selectedDates, dateStr, instance) {
                updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
            },
        });
        flatpickr("#date_delivery", {
            locale: "vn",
            dateFormat: "d/m/Y",
            onChange: function(selectedDates, dateStr, instance) {
                // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                document.getElementById("hiddenDateDelivery").value = instance.formatDate(
                    selectedDates[0],
                    "Y-m-d");
            },
            onReady: function(selectedDates, dateStr, instance) {
                updateHiddenInput(selectedDates[0], instance, "hiddenDateDelivery");
            },
        });
        flatpickr("#date_payment", {
            locale: "vn",
            dateFormat: "d/m/Y",
            onChange: function(selectedDates, dateStr, instance) {
                // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                document.getElementById("hiddenDatePayment").value = instance.formatDate(
                    selectedDates[0],
                    "Y-m-d");
            },
            onReady: function(selectedDates, dateStr, instance) {
                updateHiddenInput(selectedDates[0], instance, "hiddenDatePayment");
            },
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
    });
    showListWarehouse();
    // $("table tbody").sortable({
    //     axis: "y",
    //     handle: "td",
    // });
    //Xem giao dịch gần đây
    $('.recentModal').click(function() {
        var idProduct = $(this).closest('tr').find('.product_id').val();
        $.ajax({
            url: '{{ route('getRecentTransaction') }}',
            type: 'GET',
            data: {
                idProduct: idProduct
            },
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    $('#recentModal .modal-body tbody').empty();
                    data.forEach(function(productData) {
                        var newRow = $(
                            '<tr class="position-relative">' +
                            '<td class="text-13-black" id="productName"></td>' +
                            '<td class="text-13-black" id="guestName"></td>' +
                            '<td class="text-13-black" id="productPrice"></td>' +
                            '<td class="text-13-black" id="productTax"></td>' +
                            '<td class="text-13-black" id="dateProduct"></td>' +
                            '</tr>');
                        newRow.find('#productName').text(productData
                            .product_name);
                        newRow.find('#guestName').text(productData
                            .guest_name);
                        newRow.find('#productPrice').text(
                            formatCurrency(productData
                                .price_export));
                        newRow.find('#productTax').text(
                            productData.product_tax == 99 ?
                            'NOVAT' : productData.product_tax +
                            '%');
                        var formattedDate = new Date(productData
                            .created_at).toLocaleDateString(
                            'vi-VN');
                        newRow.find('#dateProduct').text(
                            formattedDate);
                        newRow.appendTo(
                            '#recentModal .modal-body tbody');
                    });
                } else {
                    $('#recentModal .modal-body tbody').empty();
                }
            }
        });
    });
    //Lấy thông tin project
    $(document).ready(function() {
        $('.search-project').click(function() {
            var idProject = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchProject') }}',
                type: 'GET',
                data: {
                    idProject: idProject
                },
                success: function(data) {
                    $('#ProjectInput').val(data.project_name);
                    $('.idProject').val(data.id);
                }
            });
        });
    });
    //Thêm dự án
    $(document).on('click', '#addProject', function(e) {
        var project_name = $('#project_name').val().trim();
        if (!project_name) {
            showAutoToast('warning', 'Vui lòng điền thông tin dự án!');
        } else {
            $.ajax({
                url: "{{ route('addProject') }}",
                type: "get",
                data: {
                    update: 2,
                    project_name: project_name,
                },
                success: function(data) {
                    if (data.success) {
                        $('#ProjectInput').val(data.project_name);
                        $('.idProject').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();
                        showAutoToast('success', data.msg);
                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL7'); // Danh sách hiện có
                        var newListItem =
                            '<li class="border" data-id="' + newGuestInfo.id + '">' +
                            '<a href="#" class="text-dark d-flex justify-content-between p-2 search-project w-100" id="' +
                            newGuestInfo.id + '" name="search-project">' +
                            '<span class="w-100 text-nav text-dark overflow-hidden">' + newGuestInfo
                            .project_name + '</span>' +
                            '</a>' +
                            '<a class="dropdown-item delete-project w-25" href="#" data-id="' +
                            newGuestInfo.id + '" data-name="project">' +
                            '<i class="fa-solid fa-trash-can" aria-hidden="true"></i>' +
                            '</a>' +
                            '</li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addProjectNew");
                        $(newListItem).insertBefore(addButton);
                        //clear
                        $('#project_name').val('');
                    } else {
                        showAutoToast('warning', data.msg);
                    }
                }
            });
        }
    });
    //Xóa dự án
    $(document).on('click', '.delete-project', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteProject') }}",
            type: "get",
            data: {
                update: 2,
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#ProjectInput').val('');
                    $('.idProject').val('');
                    showAutoToast('success', data.message);
                } else {
                    showAutoToast('warning', data.message);
                }
            }
        });
    });
    getKeyGuest($('#guest_name_display'));

    $("#myUL").hide();
    $("#myUL1").hide();
    $("#myUL2").hide();
    $("#myUL4").hide();
    $("#myUL5").hide();
    $("#myUL6").hide();
    $("#myUL7").hide();
    $("#listProject").hide();
    $(document).ready(function() {
        function toggleList(input, list) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length) {
                    list.hide();
                }
            });

            input.on("keyup", function() {
                var value = $(this).val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
        }

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
        toggleListGuest($("#myInput-quote"), $("#myUL2"), $("#companyFilter2"));
        toggleListGuest($("#represent_guest"), $("#myUL7"), $("#companyFilter7"));
        toggleListGuest($("#myInput-payment"), $("#myUL1"), $("#companyFilter1"));
        toggleListGuest($("#myInput-goods"), $("#myUL4"), $("#companyFilter4"));
        toggleListGuest($("#myInput-delivery"), $("#myUL5"), $("#companyFilter5"));
        toggleListGuest($("#myInput-location"), $("#myUL6"), $("#companyFilter6"));
        toggleListGuest($("#ProjectInput"), $("#listProject"), $("#companyFilter8"));
    });

    var arrProduct = [];
    $(document).ready(function() {
        $(document).on('click', '.search-date-form', function(e) {
            $('.modal').on('hidden.bs.modal', function() {
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $('.btn-submit').attr('data-action', 'insert').text('Lưu');
                $('.title-dateform').text('Biểu mẫu mới');
            });
            var idDateForm = $(this).attr('id');
            var name = $(this).data('name');
            var dataid = $(this).data('id');
            // console.log(dataid);
            if (dataid) {
                $('.btn-submit').attr('data-action', 'update').text(
                    'Cập nhật');
                $('.title-dateform').text('Cập nhật');
            }
            $.ajax({
                url: '{{ route('searchDateForm') }}',
                type: 'GET',
                data: {
                    idDateForm: idDateForm
                },
                success: function(data) {
                    $('#myInput-' + name).val(data.form_desc);
                    $("input[name='idDate[" + data.form_field + "]']").val(data
                        .id);
                    $("input[name='fieldDate[" + data.form_field + "]']").val(data
                        .form_field);
                    if (dataid) {
                        $('#form-name-' + name).val(data.form_name)
                        $('#form-desc-' + name).val(data.form_desc)
                        $('.btn-submit').attr('data-id', dataid)
                    }
                    if (dataid) {
                        $('.btn-submit').attr('data-action', 'update').text(
                            'Cập nhật');
                        $('.title-dateform').text('Cập nhật');
                    }
                }
            });
        });
        // Xóa form date
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: '{{ route('deleteDateForm') }}',
                    type: 'GET',
                    data: {
                        update: 2,
                        id: id
                    },
                    success: function(data) {
                        showAutoToast('success', data.msg);
                        $(".item-" + id).remove();
                        $('#myInput-' + name).val('');
                        $("input[name='idDate[" + name + "]']").val(null);
                        $("input[name='fieldDate[" + data.form_field + "]']").val();
                    }
                });
            }
        });
        // Set mặc định có các dateForm
        $(document).on('click', '.set-default', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            $.ajax({
                url: '{{ route('setDefaultGuest') }}',
                type: 'GET',
                data: {
                    update: 2,
                    id: id,
                    name: name,
                },
                success: function(data) {
                    $("input[name='idDate[" + name + "]']").val(data.id);
                    $("#myInput-" + name).val(data.form.form_desc);
                    data.update_form.forEach(item => {
                        if (item.default_form === 1) {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link-slash"></i>');
                            showAutoToast('success', data.msg);
                        } else {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link"></i>');
                            showAutoToast('success', data.msg);
                        }
                    });
                }
            });
        });

        // submit thêm mới các trường
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var name = $(this).data('button-name');
            var inputName = $('#form-name-' + name).val();
            var inputDesc = $('#form-desc-' + name).val();
            var action = $(this).data('action');

            if (inputName == '' || inputDesc == '') {
                showAutoToast('warning', 'Vui lòng điền đầy đủ thông tin!');
                return;
            } else {
                if ($('.btn-submit' + name).text() === 'Lưu') {
                    $('#form-name-' + name).val('')
                    $('#form-desc-' + name).val('')
                    $.ajax({
                        url: '{{ route('addDateForm') }}',
                        type: 'GET',
                        data: {
                            update: 2,
                            name: name,
                            inputName: inputName,
                            inputDesc: inputDesc,
                        },
                        success: function(data) {
                            $('#myInput-' + name).val(data.new_date_form.form_desc);
                            $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                                .val(data.new_date_form
                                    .id);
                            $("input[name='fieldDate[" + data.new_date_form.form_field +
                                    "]']")
                                .val(data.new_date_form
                                    .form_field);
                            $('.modal [data-dismiss="modal"]').click();

                            // Đoạn html của set default
                            let originalHTML =
                                '<a class="dropdown-item set-default default-id' + data
                                .new_date_form.form_field + '"' +
                                'id="default-id' + data.new_date_form.id + '" href="#"' +
                                'data-name="' + data.new_date_form.form_field + '"' +
                                'data-id="' + data.new_date_form.id + '">' +
                                '<i class="fa-solid fa-link"></i>' +
                                '</a>';
                            // Thêm phần tử mới vào trong form tìm kiếm
                            var newListItem =
                                '<li class="border item-' + data.new_date_form.id +
                                '"><a href="#" class="text-dark d-flex justify-content-between p-2 search-date-form" id="' +
                                data.new_date_form.id +
                                '" name="search-date-form" data-name="' +
                                name + '">' +
                                '<span class="text-13-black" id="' + data.new_date_form
                                .form_field + data
                                .new_date_form.id + '">' + data.new_date_form.form_name +
                                '</span></a><div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">' +
                                '<i class="fa-solid fa-ellipsis"></i>' + '</button>' +
                                '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModal' +
                                name + '" data-name="' +
                                name + '" data-id="' + data.new_date_form.id +
                                '" id="' + data.new_date_form.id +
                                '"><i class="fa-regular fa-pen-to-square"></i></a>' +
                                '<a class="dropdown-item delete-item" href="#" data-id="' +
                                data
                                .new_date_form.id +
                                '" data-name="' + data.new_date_form.form_field +
                                '"><i class="fa-solid fa-trash-can"></i></a>' +
                                originalHTML +
                                '</div>' +
                                '</div></li>';
                            // Thêm mục mới vào danh sách
                            var addButton = $(".addDateForm" + name);
                            $(addButton).append(newListItem);
                            showAutoToast('success', data.msg);
                            //clear
                            $('.search-date-form').click(function() {
                                $('.modal').on('hidden.bs.modal', function() {
                                    $('#form-name-' + name).val('')
                                    $('#form-desc-' + name).val('')
                                    $('.btn-submit').attr('data-action',
                                        'insert').text('Lưu');
                                    $('.title-dateform').text(
                                        'Biểu mẫu mới');
                                });
                                var idDateForm = $(this).attr('id');
                                var name = $(this).data('name');
                                var dataid = $(this).data('id');
                                if (dataid) {
                                    $('.btn-submit').attr('data-action', 'update')
                                        .attr(
                                            'data-id', dataid).text(
                                            'Cập nhật');
                                    $('.title-dateform').text('Cập nhật');
                                }
                                $.ajax({
                                    url: '{{ route('searchDateForm') }}',
                                    type: 'GET',
                                    data: {
                                        idDateForm: idDateForm
                                    },
                                    success: function(data) {
                                        $("input[name='idDate[" + data
                                                .form_field + "]']")
                                            .val(
                                                data
                                                .id);
                                        $("input[name='fieldDate[" +
                                                data
                                                .form_field + "]']")
                                            .val(
                                                data
                                                .form_field);
                                        $('#myInput-' + name).val(data
                                            .form_desc);
                                        if (dataid) {
                                            $('#form-name-' + name).val(
                                                data
                                                .form_name)
                                            $('#form-desc-' + name).val(
                                                data
                                                .form_desc)
                                        }
                                    }
                                });
                            });
                        }
                    });
                }
                if ($('.btn-submit' + name).text() === 'Cập nhật') {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '{{ route('updateDateForm') }}',
                        type: 'GET',
                        data: {
                            update: 2,
                            id: id,
                            name: name,
                            inputName: inputName,
                            inputDesc: inputDesc,
                        },
                        success: function(data) {
                            $('.modal [data-dismiss="modal"]').click();
                            $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                                .val(data.new_date_form
                                    .id);
                            $("input[name='fieldDate[" + data.new_date_form.form_field +
                                    "]']")
                                .val(data.new_date_form
                                    .form_field);
                            $("#" + name + id).text(data.new_date_form.form_name)
                            $('#myInput-' + name).val(data.new_date_form.form_desc);

                            showAutoToast('success', data.msg);
                        }
                    });
                }
            }
        });


        let fieldCounter = 1;
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
                "style": `height:80px`
            });
            const maSanPham = $(
                `<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>` +
                `<span class='ml-1 mr-2'>` +
                `<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>` +
                `<g clip-path='url(#clip0_1710_10941)'>` +
                `<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>` +
                `</g>` +
                `<defs>` +
                `<clipPath id='clip0_1710_10941'>` +
                `<rect width='6' height='10' fill='white'/>` +
                `</clipPath>` +
                `</defs>` +
                `</svg>` +
                `</span>` +
                `<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>` +
                `<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code height-32' name='product_code[]'>` +
                `</td>`
            );
            const tenSanPham = $(
                `<td class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>` +
                `<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;'>` +
                `@foreach ($product as $product_value)` +
                `<li data-id='{{ $product_value->id }}'>` +
                `<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>` +
                `<span class='w-50 text-13-black'>{{ $product_value->product_name }}</span>` +
                `</a>` +
                `</li>` +
                `@endforeach` +
                `</ul>` +
                `<div class='d-flex align-items-center'>` +
                `<input type='text' class='border-0 px-2 py-1 w-100 product_name height-32' autocomplete='off' required name='product_name[]'>` +
                `<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>` +
                `<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>` +
                `<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>` +
                `<g clip-path='url(#clip0_2559_39956)'>` +
                `<path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>` +
                `<path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>` +
                `<path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>` +
                `</g>` +
                `<defs>` +
                `<clipPath id='clip0_2559_39956'>` +
                `<rect width='14' height='14' fill='white'/>` +
                `</clipPath>` +
                `</defs>` +
                `</svg>` +
                `</div>` +
                `</div>` +
                `</td>`
            );
            const dvTinh = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit height-32' required name='product_unit[]'>" +
                "</td>"
            );
            const soLuong = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div>" +
                "<input type='text' class='text-right border-0 px-2 py-1 w-100 quantity-input height-32' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "</div>" +
                "<div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho'></span></div>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div>" +
                "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price height-32' autocomplete='off' name='product_price[]' required>" +
                "</div>" +
                "<a href='#' class='activity1' data-name1='BG' data-des='Xem giao dịch gần đây ở trang chỉnh sửa'><div class='mt-3 text-13-blue recentModal' data-toggle='modal' data-target='#recentModal' style='display:none;'>Giao dịch gần đây</div></a>" +
                "</td>"
            );
            const chiTietChietKhau = $(
                "<td class='border-right p-2 align-top border-bottom border-top-0'>" +
                "<div class='d-flex flex-column align-items-center'>" +
                "<input type='number' name='promotion[]' class='border-0 px-2 py-1 w-100 text-right height-32 promotion' placeholder='Giá trị chiết khấu' style='border: none;'>" +
                "<select name='promotion-option[]' class='text-right border-0 mt-2'>" +
                "<option value='' disabled>Chọn chiết khấu</option>" +
                "<option value='1' selected>Nhập tiền</option>" +
                "<option value='2'>Nhập %</option>" +
                "</select>" +
                "</div>" +
                "</td>"
            );
            const thue = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<select name='product_tax[]' class='border-0 py-1 w-100 text-center product_tax height-32' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>" +
                "</td>"
            );
            const kho = $(
                '<td class="border-right note p-2 align-top border-bottom border-top-0 position-relative">' +
                '<input id="searchWarehouse" type="text" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black searchWarehouse" name="warehouse[]" readonly autocomplete="off">' +
                '<div id="listWareH" class="bg-white position-absolute rounded shadow p-1 z-index-block" style="z-index: 99;">' +
                '<ul class="m-0 p-0 scroll-data listWarehouse" id="listWarehouse" style="display:none;">' +
                '<div class="p-1">' +
                '<div class="position-relative">' +
                '<input type="text" placeholder="Nhập kho hàng" class="pr-4 w-100 input-search bg-input-guest searchWarehouse" id="a">' +
                '<span id="search-icon" class="search-icon">' +
                '<i class="fas fa-search text-table" aria-hidden="true"></i>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '</ul>' +
                '</div>' +
                '<input type="hidden" placeholder="Chọn kho" class="border-0 py-1 w-100 height-32 text-13-black warehouse_id" name="warehouse_id[]" >' +
                //'<ul id="listWarehouse" class="listWarehouse bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 0%; top: 44%;"> ' +
                //"</ul>" +
                '</td>');
            const ghiChu = $(
                "<td class='border-right p-2 text-13 align-top border-bottom note border-top-0'>" +
                "<input type='text' class='border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            const option = $(
                "<td class='border-right p-2 align-top activity border-bottom border-top-0' data-name1='BG' data-des='Xóa sản phẩm ở trang chỉnh sửa'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            // const heSoNhan = $(
            //     "<td class='border border-top-0 border-bottom-0 position-relative product_ratio'>" +
            //     "<input type='text' class='border-0 px-2 py-1 w-100 heSoNhan' autocomplete='off' name='product_ratio[]'>" +
            //     "</td>"
            // );
            // const giaNhap = $(
            //     "<td class='border border-top-0 border-bottom-0 position-relative price_import'>" +
            //     "<input type='text' class='border-0 px-2 py-1 w-100 giaNhap' autocomplete='off' required name='price_import[]'>" +
            //     "</td>"
            // );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh, soLuong, donGia, chiTietChietKhau, thue,
                thanhTien, kho, ghiChu,
                option
            );
            $("#dynamic-fields").before(newRow);
            checkProductTaxValues();
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            // $("table tbody").sortable({
            //     axis: "y",
            //     handle: "td",
            // });

            //Xem giao dịch gần đây
            $('.recentModal').click(function() {
                var idProduct = $(this).closest('tr').find('.product_id').val();
                $.ajax({
                    url: '{{ route('getRecentTransaction') }}',
                    type: 'GET',
                    data: {
                        idProduct: idProduct
                    },
                    success: function(data) {
                        if (Array.isArray(data) && data.length > 0) {
                            $('#recentModal .modal-body tbody').empty();
                            data.forEach(function(productData) {
                                var newRow = $(
                                    '<tr class="position-relative">' +
                                    '<td class="text-13-black" id="productName"></td>' +
                                    '<td class="text-13-black" id="guestName"></td>' +
                                    '<td class="text-13-black" id="productPrice"></td>' +
                                    '<td class="text-13-black" id="productTax"></td>' +
                                    '<td class="text-13-black" id="dateProduct"></td>' +
                                    '</tr>');
                                newRow.find('#productName').text(productData
                                    .product_name);
                                newRow.find('#guestName').text(productData
                                    .guest_name);
                                newRow.find('#productPrice').text(
                                    formatCurrency(productData
                                        .price_export));
                                newRow.find('#productTax').text(
                                    productData.product_tax == 99 ?
                                    'NOVAT' : productData.product_tax +
                                    '%');
                                var formattedDate = new Date(productData
                                    .created_at).toLocaleDateString(
                                    'vi-VN');
                                newRow.find('#dateProduct').text(
                                    formattedDate);
                                newRow.appendTo(
                                    '#recentModal .modal-body tbody');
                            });
                        } else {
                            $('#recentModal .modal-body tbody').empty();
                        }
                    }
                });
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateGrandTotal();
                var deletedProductId = $(this).closest("tr").find('.product_id').val();
                // Chuyển đổi deletedProductId thành số nguyên (nếu cần)
                var deletedProductIdInt = parseInt(deletedProductId);

                // Kiểm tra xem deletedProductIdInt có tồn tại trong mảng arrProduct không
                var index = arrProduct.indexOf(deletedProductIdInt);
                if (index !== -1) {
                    // Xóa product_id khỏi mảng arrProduct
                    arrProduct.splice(index, 1);
                }
                var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
                var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
                $.ajax({
                    url: '{{ route('addActivity') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        des: des,
                    },
                    success: function(data) {}
                });
            });
            //
            $('.activity1').click(function() {
                var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
                var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
                $.ajax({
                    url: '{{ route('addActivity') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        des: des,
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
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
                var clickedRow = $(this).closest('tr');
                // Lấy product_id của sản phẩm đang chọn trong hàng này
                var clickedProductId = clickedRow.find('.product_id').val();

                // Lặp qua danh sách sản phẩm để ẩn những sản phẩm đã được chọn và không thuộc hàng đang click
                $('.list_product li').each(function() {
                    var productId = $(this).data('id');
                    if (arrProduct.indexOf(productId) !== -1 &&
                        productId !==
                        clickedProductId) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                    if (clickedProductId == productId) {
                        $(this).show();
                    }
                });
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
                $('.idProduct').off('click').on('click', function(event) {
                    event.stopPropagation();

                    var clickedRow = $(this).closest('tr');
                    var productCode = clickedRow.find('.product_code');
                    var productName = clickedRow.find('.product_name');
                    var productUnit = clickedRow.find('.product_unit');
                    var thue = clickedRow.find('.product_tax');
                    var quantity_input = clickedRow.find('.quantity-input');
                    var product_id = clickedRow.find('.product_id');
                    var tonkho = clickedRow.find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = clickedRow.find('.soTonKho');
                    var infoProduct = clickedRow.find('.info-product');
                    var inventory = clickedRow.find('.inventory');
                    var clickedProductId = $(this).parent().data('id');

                    arrProduct = [];
                    $('.product_id').each(function() {
                        arrProduct.push($(this)
                            .val()); // Thêm product_id vào mảng arrProduct
                    });

                    $.ajax({
                        url: '{{ route('getProduct') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct,
                            warehouse_id: clickedRow.find('.warehouse_id')
                                .val(),
                        },
                        success: function(data) {
                            productCode.val(data.product_code);
                            productName.val(data.product_name);
                            productUnit.val(data.product_unit);
                            thue.val(data.product_tax);
                            product_id.val(data.id);

                            infoProduct.show();
                            recentModal.show();

                            productCode.prop('readonly', true);
                            productUnit.prop('readonly', true);
                            $(".list_product").hide();
                            arrProduct = [];
                            if (clickedRow.find('.warehouse_id')
                                .val()) {

                                tonkho.val(formatNumber(data
                                    .product_inventory == null ? 0 :
                                    data.product_inventory))
                                if (data.type == 2) {
                                    soTonKho.text('');
                                    inventory.hide();
                                    quantity_input.val(1);
                                } else {
                                    soTonKho.text(parseFloat(data
                                        .product_inventory == null ?
                                        0 :
                                        data.product_inventory));
                                    inventory.show();
                                    quantity_input.val("");
                                    if (data.product_inventory > 0) {
                                        inventory.show();
                                    }
                                }
                            }

                            // Thêm tất cả product_id hiện có vào mảng arrProduct
                            $('.product_id').each(function() {
                                // Lấy giá trị 'value' của phần tử input và chuyển đổi thành số nguyên
                                var productId = parseInt($(this)
                                    .val(), 10);
                                // Thêm giá trị vào mảng arrProduct
                                arrProduct.push(productId);
                            });
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
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + formatNumber(
                        tonKho) +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
            });
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $(document).on('click', '.search-info', function(e) {
            var idGuest = $(this).attr('id');
            var quotation_number = "{{ $detailExport->quotation_number }}"
            var old_guest = {{ $detailExport->maKH }}
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    if (data.key) {
                        if (old_guest == data['guest'].id) {
                            quotation = quotation_number
                        } else {
                            quotation = data.resultNumber
                        }
                    } else {
                        quotation = getQuotation(data['guest'].guest_name_display, data[
                            'count'], data['date'])
                    }
                    // $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data['guest'].guest_name_display);
                    $('.idGuest').val(data['guest'].id);
                    $('.debt-old').val(formatCurrency(data['guest'].guest_debt));
                    $.ajax({
                        url: '{{ route('searchFormByGuestId') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            Object.keys(data).forEach(function(key) {
                                var formField = data[key].form
                                    .form_field;
                                var dateFormId = data[key].date_form_id;
                                var formDesc = data[key].form.form_desc;
                                $("input[name='fieldDate[" + key +
                                        "]']")
                                    .val(key);
                                $("input[name='idDate[" + key +
                                        "]']")
                                    .val(dateFormId);
                                $('#myInput-' + key).val(formDesc);
                            });
                        }
                    });
                    $.ajax({
                        url: '{{ route('getRepresentGuest') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            $('#representativeList').empty();
                            $.each(data, function(index, representative) {
                                var listItem = $(
                                        '<li class="border" data-id = ' +
                                        representative.id + '>')
                                    .append(
                                        $('<a>').attr({
                                            href: '#',
                                            title: representative
                                                .represent_name,
                                            class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                            id: representative.id,
                                            name: 'search-represent',
                                        }).append(
                                            $('<span>').addClass(
                                                'w-100 text-nav text-dark overflow-hidden'
                                            ).text(representative
                                                .represent_name)
                                        )
                                    ).append(
                                        $('<div>').addClass('dropdown')
                                        .append(
                                            $('<button>').attr({
                                                type: 'button',
                                                'data-toggle': 'dropdown',
                                                class: 'btn-save-print d-flex align-items-center h-100 border-0 bg-transparent',
                                                style: 'margin-right:10px'
                                            }).append(
                                                $('<i>').addClass(
                                                    'fa-solid fa-ellipsis'
                                                ).attr(
                                                    'aria-hidden',
                                                    'true')
                                            )
                                        ).append(
                                            $('<div>').addClass(
                                                'dropdown-menu date-form-setting'
                                            ).css('z-index', '1000')
                                            .append(
                                                $('<a>').addClass(
                                                    'dropdown-item edit-represent-form'
                                                ).attr({
                                                    'data-toggle': 'modal',
                                                    'data-target': '#representModal',
                                                    'data-name': 'representGuest',
                                                    'data-id': representative
                                                        .id
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-regular fa-pen-to-square'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            ).append(
                                                $('<a>').addClass(
                                                    'dropdown-item delete-item-represent'
                                                ).attr({
                                                    href: '#',
                                                    'data-id': representative
                                                        .id,
                                                    'data-name': 'representGuest'
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-solid fa-trash-can'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            ).append(
                                                $('<a>').addClass(
                                                    'dropdown-item default-represent'
                                                ).attr({
                                                    id: 'default-id' +
                                                        representative
                                                        .id,
                                                    href: '#',
                                                    'data-name': 'representGuest',
                                                    'data-id': representative
                                                        .id
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-solid fa-link'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            )
                                        )
                                    );
                                $('#representativeList').append(
                                    listItem);
                            });
                        }
                    });
                    //
                    $.ajax({
                        url: '{{ route('getRepresentGuest') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            var defaultGuestItem = data.find(item => item
                                .default_guest === 1);
                            if (data.length > 1 && defaultGuestItem) {
                                $('#represent_guest').val(defaultGuestItem
                                    .represent_name);
                                $('.represent_guest_id').val(defaultGuestItem
                                    .id);
                            } else if (data.length === 1) {
                                $('#represent_guest').val(data[0]
                                    .represent_name);
                                $('.represent_guest_id').val(data[0].id);
                            } else {
                                $('#represent_guest').val('');
                                $('.represent_guest_id').val('');
                            }
                        }
                    });
                }
            });
        });
        //lấy thông tin người đại diện
        $(document).on('click', '.search-represent', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchRepresent') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('#represent_guest').val(data.represent_name);
                    $('.represent_guest_id').val(data.id);
                }
            });
        });
    });

    //Thêm thông tin khách hàng
    $(document).on('click', '.addGuestNew', function(e) {
        $('#addGuest').show();
        $('#updateGuest').hide();
        $('#id_guest').val('');
        $('#guest_name_display').val('');
        $("input[name='key']").val('');
        $('#guest_address').val(null);
        $('#guest_code').val(null);
        $('#represent_guest_name').val(null);
    });

    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showAutoToast(type, message);
        }, delayTime);
    }

    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val().trim();
        var guest_name = $('#guest_name').val().trim();
        var guest_address = $('#guest_address').val().trim();
        var guest_code = $('#guest_code').val().trim();
        var guest_email = $('#guest_email').val().trim();
        var guest_phone = $('#guest_phone').val().trim();
        var guest_receiver = $('#guest_receiver').val().trim();
        // var guest_email_personal = $('#guest_email_personal').val().trim();
        // var guest_phone_receiver = $('#guest_phone_receiver').val().trim();
        // var guest_note = $('#guest_note').val().trim();
        var key = $("input[name='key']").val().trim().trim();
        var represent_guest_name = $('#represent_guest_name').val().trim();
        if (!guest_name_display || !guest_address || !guest_code) {
            showAutoToast('warning', 'Vui lòng điền đủ thông tin khách hàng!');
        } else {
            $('.nameGuest').val(null);
            $('.idGuest').val(null);
            $.ajax({
                url: "{{ route('addGuest') }}",
                type: "get",
                data: {
                    update: 1,
                    guest_name_display: guest_name_display,
                    guest_name: guest_name,
                    guest_address: guest_address,
                    guest_code: guest_code,
                    guest_email: guest_email,
                    guest_phone: guest_phone,
                    guest_receiver: guest_receiver,
                    // guest_email_personal: guest_email_personal,
                    // guest_phone_receiver: guest_phone_receiver,
                    // guest_note: guest_note,
                    key: key,
                    represent_guest_name: represent_guest_name,
                },
                success: function(data) {
                    if (data.success) {
                        quotation = getQuotation1(data.key, '1');
                        // $('input[name="quotation_number"]').val(data.resultNumber);
                        $('.nameGuest').val(data.guest_name_display);
                        showAutoToast('success', data.msg);
                        $('.idGuest').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();

                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL'); // Danh sách hiện có
                        var newListItem =
                            '<li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" data-id="' +
                            newGuestInfo.id + '">' +
                            '<a href="#" title="' + newGuestInfo.guest_name_display +
                            '" style="flex:2;" id="' +
                            newGuestInfo.id + '" name="search-info">' +
                            '<span class="text-13-black">' + newGuestInfo
                            .guest_name_display + '</span>' +
                            '</a>' +
                            '<div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px" aria-expanded="false">' +
                            '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                            '<a class="dropdown-item edit-guest w-50" href="#" data-toggle="modal" data-target="#guestModal" data-id="' +
                            newGuestInfo.id + '">' +
                            '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                            '</a>' +
                            '<a class="dropdown-item delete-guest w-50" href="#" data-id="' +
                            newGuestInfo.id + '" data-name="guest">' +
                            '<i class="fa-solid fa-trash-can" aria-hidden="true"></i>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addGuestNew");
                        $("#myUL .m-0.p-0.scroll-data").append(newListItem);

                        //clear
                        $('#guest_name_display').val('');
                        $("input[name='key']").val('');
                        $('#guest_address').val(null);
                        $('#guest_code').val(null);
                        $('#represent_guest_name').val(null);
                        $('#representativeList').empty();

                        // Nếu có người đại diện, thêm vào danh sách
                        if (data.represent_name !== null && data.represent_name !== '') {
                            //reset 
                            $('#representativeList').empty();
                            $('#represent_guest').val('');
                            $('.represent_guest_id').val('');

                            // Thêm người đại diện mới
                            var newGuestInfo1 = data;
                            var guestList1 = $('#myUL7'); // Danh sách hiện có
                            var newListItem1 =
                                '<li class="border d-flex" data-id="' + newGuestInfo1.id +
                                '"><a href="#" title="' + newGuestInfo1.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo1.id_represent + '" name="search-represent">' +
                                '<span class="text-13-black">' +
                                newGuestInfo1
                                .represent_name +
                                '</span></a>' +
                                '<div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">' +
                                '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                                '</button><div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item edit-represent-form" data-toggle="modal" data-target="#representModal" data-name="representGuest" data-id="' +
                                newGuestInfo1.id_represent + '">' +
                                '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                                '</a><a class="dropdown-item delete-item-represent" href="#" data-id="' +
                                newGuestInfo1.id_represent + '" data-name="representGuest">' +
                                '<i class="fa-solid fa-trash-can" aria-hidden="true"></i></a><a class="dropdown-item default-represent" id="default-id' +
                                newGuestInfo1.id_represent +
                                '" href="#" data-name="representGuest" data-id="' +
                                newGuestInfo1.id_represent + '">' +
                                '<i class="fa-solid fa-link" aria-hidden="true"></i></a></div></div>' +
                                '</li>';

                            // Thêm mục mới vào danh sách
                            var addButton1 = $(".addRepresentNew");
                            $(newListItem1).insertBefore(addButton1);

                            $('#represent_guest').val(data.represent_name);
                            $('.represent_guest_id').val(data.id_represent);
                        } else {
                            $('#represent_guest').val('');
                            $('.represent_guest_id').val('');
                        }
                        $('#show-info-guest').show();
                        $('#show-title-guest').show();
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showAutoToast('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                1000);
                        } else {
                            showAutoToast('warning', data.msg);
                        }
                    }
                }
            });
        }
    });

    //Cập nhật khách hàng
    $(document).ready(function() {
        $(document).on('click', '.edit-guest', function(e) {
            $('#addGuest').hide();
            $('#updateGuest').show();
            var itemId = $(this).data('id');
            $.ajax({
                url: '{{ route('editGuest') }}',
                type: 'GET',
                data: {
                    itemId: itemId
                },
                success: function(data) {
                    $('#id_guest').val(data.idGuest);
                    $('#guest_name_display').val(data.guest_name_display);
                    $('#guest_code').val(data.guest_code);
                    $('#guest_address').val(data.guest_address);
                    $('#key').val(data.key);
                    $('#guest_name').val(data.guest_name);
                    $('#guest_email').val(data.guest_email);
                    $('#guest_phone').val(data.guest_phone);
                    $('#guest_receiver').val(data.guest_receiver);
                    $('#represent_guest_name').val(data.represent_name);
                    $('#represent_guest_id').val(data.representID);
                }
            });
        });
        $(document).on('click', '#updateGuest', function(e) {
            var guest_id = $('#id_guest').val().trim();
            var represent_id = $('#represent_guest_id').val().trim();
            var guest_name = $('#guest_name').val().trim();
            var guest_address = $('#guest_address').val().trim();
            var guest_code = $('#guest_code').val().trim();
            var key = $("input[name='key']").val().trim().trim();
            var guest_name_display = $('input[name="guest_name_display"]').val().trim();
            var represent_guest_name = $('#represent_guest_name').val().trim();
            var guest_email = $('#guest_email').val().trim();
            var guest_phone = $('#guest_phone').val().trim();
            var guest_receiver = $('#guest_receiver').val().trim();
            $.ajax({
                url: '{{ route('updateGuest') }}',
                type: 'GET',
                data: {
                    update: 2,
                    guest_id: guest_id,
                    represent_id: represent_id,
                    guest_name: guest_name,
                    guest_address: guest_address,
                    guest_code: guest_code,
                    key: key,
                    guest_name_display: guest_name_display,
                    represent_guest_name: represent_guest_name,
                    guest_email: guest_email,
                    guest_phone: guest_phone,
                    guest_receiver: guest_receiver,
                },
                success: function(data) {
                    if (data.success) {
                        $('.nameGuest').val(data.updated_guest.guest_name_display);
                        showAutoToast('success', data.msg);
                        $('.idGuest').val(data.updated_guest.id);
                        $('.modal [data-dismiss="modal"]').click();
                        $('#myUL li[data-id="' + data.updated_guest.id + '"] .text-nav')
                            .text(data
                                .updated_guest.guest_name_display);
                        $('#representativeList li[data-id="' + data.updated_represent.id +
                            '"] .text-nav').text(
                            data.updated_represent.represent_name);
                        $('#represent_guest').val(data.updated_represent.represent_name);
                    } else {
                        showAutoToast('warning', data.msg);
                    }
                }
            });
        });
    });

    //Xóa khách hàng
    $(document).on('click', '.delete-guest', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteGuest') }}",
            type: "get",
            data: {
                update: 2,
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#myInput').val('');
                    $('.idGuest').val('');
                    $('#represent_guest').val('');
                    $('.represent_guest_id').val('');
                    $('#representativeList').empty();
                    showAutoToast('success', data.message);
                } else {
                    showAutoToast('warning', data.message);
                }
            }
        });
    });

    //Danh sách người đại diện
    $(document).ready(function() {
        var idGuest = $('.idGuest').val();
        $.ajax({
            url: '{{ route('getRepresentGuest') }}',
            type: 'GET',
            data: {
                idGuest: idGuest
            },
            success: function(data) {
                $('#representativeList').empty();
                $.each(data, function(index, representative) {
                    var listItem = $(
                            '<li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" data-id = ' +
                            representative.id + '>')
                        .append(
                            $('<a>').attr({
                                href: '#',
                                title: representative
                                    .represent_name,
                                class: 'search-represent',
                                id: representative.id,
                                style: "flex:2",
                                name: 'search-represent',
                            }).append(
                                $('<span>').addClass(
                                    'text-13-black'
                                ).text(representative
                                    .represent_name)
                            )
                        ).append(
                            $('<div>').addClass('dropdown')
                            .append(
                                $('<button>').attr({
                                    type: 'button',
                                    'data-toggle': 'dropdown',
                                    class: 'btn-save-print d-flex align-items-center h-100 border-0 bg-transparent',
                                    style: 'margin-right:10px'
                                }).append(
                                    $('<i>').addClass(
                                        'fa-solid fa-ellipsis'
                                    ).attr(
                                        'aria-hidden',
                                        'true')
                                )
                            ).append(
                                $('<div>').addClass(
                                    'dropdown-menu date-form-setting'
                                ).css('z-index', '1000')
                                .append(
                                    $('<a>').addClass(
                                        'dropdown-item edit-represent-form'
                                    ).attr({
                                        'data-toggle': 'modal',
                                        'data-target': '#representModal',
                                        'data-name': 'representGuest',
                                        'data-id': representative
                                            .id
                                    }).append(
                                        $('<i>').addClass(
                                            'fa-regular fa-pen-to-square'
                                        ).attr(
                                            'aria-hidden',
                                            'true')
                                    )
                                ).append(
                                    $('<a>').addClass(
                                        'dropdown-item delete-item-represent'
                                    ).attr({
                                        href: '#',
                                        'data-id': representative
                                            .id,
                                        'data-name': 'representGuest'
                                    }).append(
                                        $('<i>').addClass(
                                            'fa-solid fa-trash-can'
                                        ).attr(
                                            'aria-hidden',
                                            'true')
                                    )
                                ).append(
                                    $('<a>').addClass(
                                        'dropdown-item default-represent'
                                    ).attr({
                                        id: 'default-id' +
                                            representative
                                            .id,
                                        href: '#',
                                        'data-name': 'representGuest',
                                        'data-id': representative
                                            .id
                                    }).append(
                                        $('<i>').addClass(
                                            'fa-solid fa-link'
                                        ).attr(
                                            'aria-hidden',
                                            'true')
                                    )
                                )
                            )
                        );
                    $('#representativeList').append(
                        listItem);
                });
            }
        });
        //
        // $.ajax({
        //     url: '{{ route('getRepresentGuest') }}',
        //     type: 'GET',
        //     data: {
        //         idGuest: idGuest
        //     },
        //     success: function(data) {
        //         var defaultGuestItem = data.find(item => item
        //             .default_guest === 1);
        //         if (data.length > 1 && defaultGuestItem) {
        //             $('#represent_guest').val(defaultGuestItem
        //                 .represent_name);
        //             $('.represent_guest_id').val(defaultGuestItem
        //                 .id);
        //         } else if (data.length === 1) {
        //             $('#represent_guest').val(data[0]
        //                 .represent_name);
        //             $('.represent_guest_id').val(data[0].id);
        //         } else {
        //             $('#represent_guest').val('');
        //             $('.represent_guest_id').val('');
        //         }
        //     }
        // });
    });

    //Thêm người đại diện
    $(document).on('click', '.addRepresentNew', function(e) {
        $('#updateRepresent').hide();
        $('#addRepresent').show();
        $('#represent_id').val('');
        $('#represent_name').val('');
        $("#represent_email").val('');
        $('#represent_phone').val('');
        $('#represent_address').val('');
    });
    $(document).on('click', '#addRepresent', function(e) {
        var represent_name = $('input[name="represent_name"]').val().trim();
        var represent_email = $('#represent_email').val().trim();
        var represent_phone = $('#represent_phone').val().trim();
        var represent_address = $('#represent_address').val().trim();
        var guest_id = $('.idGuest').val();
        if (!guest_id) {
            showAutoToast('warning', 'Vui lòng chọn khách hàng trước khi tạo người đại diện!');
        } else {
            if (!represent_name) {
                showAutoToast('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: "{{ route('addRepresentGuest') }}",
                    type: "get",
                    data: {
                        update: 2,
                        represent_name: represent_name,
                        represent_email: represent_email,
                        represent_phone: represent_phone,
                        represent_address: represent_address,
                        guest_id: guest_id,
                    },
                    success: function(data) {
                        if (data.success) {
                            $('#represent_guest').val(data.represent_name);
                            $('.represent_guest_id').val(data.id);
                            $('.modal [data-dismiss="modal"]').click();
                            showAutoToast('success', data.msg);
                            // Nếu thành công, tạo một mục mới
                            var newGuestInfo = data;
                            var guestList = $('#representativeList'); // Danh sách hiện có
                            var newListItem =
                                '<li class="border" data-id="' + newGuestInfo.id +
                                '"><a href="#" title="' + newGuestInfo.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo.id + '" name="search-represent">' +
                                '<span class="w-100 text-nav text-dark overflow-hidden">' +
                                newGuestInfo
                                .represent_name +
                                '</span></a>' +
                                '<div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">' +
                                '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                                '</button><div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item edit-represent-form" data-toggle="modal" data-target="#representModal" data-name="representGuest" data-id="' +
                                newGuestInfo.id + '">' +
                                '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                                '</a><a class="dropdown-item delete-item-represent" href="#" data-id="' +
                                newGuestInfo.id + '" data-name="representGuest">' +
                                '<i class="fa-solid fa-trash-can" aria-hidden="true"></i></a><a class="dropdown-item default-represent" id="default-id' +
                                newGuestInfo.id +
                                '" href="#" data-name="representGuest" data-id="' +
                                newGuestInfo.id + '">' +
                                '<i class="fa-solid fa-link" aria-hidden="true"></i></a></div></div>' +
                                '</li>';
                            // Thêm mục mới vào danh sách
                            guestList.append(newListItem);
                            //clear
                            $('#represent_name').val('');
                            $("#represent_email").val('');
                            $('#represent_phone').val('');
                            $('#represent_address').val('');
                        } else {
                            showAutoToast('warning', data.msg);
                        }
                    }
                });
            }
        }
    });
    //Xóa người đại diện
    $(document).on('click', '.delete-item-represent', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteRepresentGuest') }}",
            type: "get",
            data: {
                update: 2,
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#represent_guest').val('');
                    $('.represent_guest_id').val('');
                    showAutoToast('success', data.message);
                } else if (data.success == false) {
                    showAutoToast('warning', data.message);
                }
            }
        });
    });
    //Cập nhật thông tin người đại diện
    $(document).on('click', '.edit-represent-form', function(e) {
        e.preventDefault();
        $('#addRepresent').hide();
        $('#updateRepresent').show();
        var itemId = $(this).data('id');
        $.ajax({
            url: '{{ route('editRepresent') }}',
            type: 'GET',
            data: {
                itemId: itemId
            },
            success: function(data) {
                $('#represent_id').val(data.id);
                $('#represent_name').val(data.represent_name);
                $("#represent_email").val(data.represent_email);
                $('#represent_phone').val(data.represent_phone);
                $('#represent_address').val(data.represent_address);
            }
        });
    });
    $(document).ready(function() {
        $(document).on('click', '#updateRepresent', function(e) {
            var guest_id = $('.idGuest').val().trim();
            var represent_id = $('#represent_id').val().trim();
            var represent_name = $('input[name="represent_name"]').val().trim();
            var represent_email = $('#represent_email').val().trim();
            var represent_phone = $('#represent_phone').val().trim();
            var represent_address = $('#represent_address').val().trim();
            if (!represent_name) {
                showAutoToast('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: '{{ route('updateRepresent') }}',
                    type: 'GET',
                    data: {
                        update: 2,
                        guest_id: guest_id,
                        represent_id: represent_id,
                        represent_name: represent_name,
                        represent_email: represent_email,
                        represent_phone: represent_phone,
                        represent_address: represent_address,
                    },
                    success: function(data) {
                        if (data.success) {
                            var representId = data.representGuest.id;
                            $('#myUL7 li[data-id="' + representId +
                                '"] .text-13-black').text(
                                data.representGuest.represent_name);
                            $('#represent_guest').val(data.representGuest.represent_name);
                            $('.represent_guest_id').val(data.representGuest.id);
                            $('.modal [data-dismiss="modal"]').click();
                            showAutoToast('success', data.msg);
                        } else {
                            showAutoToast('warning', data.msg);
                        }
                    }
                });
            }
        });
    });
    //Chọn mặc định người đại diện
    $(document).on('click', '.default-represent', function(e) {
        e.preventDefault();
        var represent_id = $(this).data('id');
        var guest_id = $('.idGuest').val();
        $.ajax({
            url: '{{ route('defaultRepresent') }}',
            type: 'GET',
            data: {
                update: 2,
                represent_id: represent_id,
                guest_id: guest_id,
            },
            success: function(data) {
                if (data.success) {
                    $('#represent_guest').val(data.representGuest.represent_name);
                    $('.represent_guest_id').val(data.representGuest.id);
                    showAutoToast('success', 'Chọn mặc định người đại diện thành công!');
                } else {
                    showAutoToast('warning', 'Không tìm thấy người đại diện');
                }
            }
        });
    });

    //format giá
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher', function(event) {
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

    //xóa sản phẩm
    $('.delete-product').click(function() {
        $(this).closest("tr").remove();
        calculateTotals();
        calculateGrandTotal();
        // Lấy product_id của hàng đang được xóa
        var deletedProductId = $(this).closest("tr").find('.product_id').val();
        // Chuyển đổi deletedProductId thành số nguyên (nếu cần)
        var deletedProductIdInt = parseInt(deletedProductId);

        // Kiểm tra xem deletedProductIdInt có tồn tại trong mảng arrProduct không
        var index = arrProduct.indexOf(deletedProductIdInt);
        if (index !== -1) {
            // Xóa product_id khỏi mảng arrProduct
            arrProduct.splice(index, 1);
        }
    });

    //Hiển thị danh sách tên sản phẩm
    $(document).ready(function() {
        $('.product_id').each(function() {
            // Lấy giá trị 'value' của phần tử input và chuyển đổi thành số nguyên
            var productId = parseInt($(this).val(), 10);

            // Thêm giá trị vào mảng arrProduct
            arrProduct.push(productId);
        });
        $('.product_name').on("click", function(e) {
            e.stopPropagation();
            $(this).closest('tr').find(".list_product").show();
            var clickedRow = $(this).closest('tr');
            // Lấy product_id của sản phẩm đang chọn trong hàng này
            var clickedProductId = clickedRow.find('.product_id').val();

            // Lặp qua danh sách sản phẩm để ẩn những sản phẩm đã được chọn và không thuộc hàng đang click
            $('.list_product li').each(function() {
                var productId = $(this).data('id');
                if (arrProduct.indexOf(productId) !== -1 &&
                    productId !==
                    clickedProductId) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
                if (clickedProductId == productId) {
                    $(this).show();
                }
            });
        });
    });
    $(document).on("click", function(e) {
        if (!$(e.target).is(".product_name")) {
            $(".list_product").hide();
        }
    });
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
        $('.idProduct').off('click').on('click', function(event) {
            event.stopPropagation();

            var clickedRow = $(this).closest('tr');
            var productCode = clickedRow.find('.product_code');
            var productName = clickedRow.find('.product_name');
            var productUnit = clickedRow.find('.product_unit');
            var thue = clickedRow.find('.product_tax');
            var product_id = clickedRow.find('.product_id');
            var tonkho = clickedRow.find('.tonkho');
            var idProduct = $(this).attr('id');
            var soTonKho = clickedRow.find('.soTonKho');
            var infoProduct = clickedRow.find('.info-product');
            var inventory = clickedRow.find('.inventory');
            var clickedProductId = $(this).parent().data('id');

            arrProduct = [];
            $('.product_id').each(function() {
                arrProduct.push($(this)
                    .val()); // Thêm product_id vào mảng arrProduct
            });

            $.ajax({
                url: '{{ route('getProduct') }}',
                type: 'GET',
                data: {
                    idProduct: idProduct,
                    warehouse_id: clickedRow.find('.warehouse_id')
                        .val(),
                },
                success: function(data) {
                    productCode.val(data.product_code);
                    productName.val(data.product_name);
                    productUnit.val(data.product_unit);
                    thue.val(data.product_tax);
                    product_id.val(data.id);
                    tonkho.val(formatNumber(data.product_inventory == null ? 0 :
                        data.product_inventory))
                    soTonKho.text(parseFloat(data
                        .product_inventory == null ? 0 :
                        data.product_inventory));
                    infoProduct.show();
                    if (data.product_inventory > 0) {
                        inventory.show();
                    }
                    thue.prop('disabled', true);
                    $(".list_product").hide();
                    arrProduct = [];

                    // Thêm tất cả product_id hiện có vào mảng arrProduct
                    $('.product_id').each(function() {
                        // Lấy giá trị 'value' của phần tử input và chuyển đổi thành số nguyên
                        var productId = parseInt($(this)
                            .val(), 10);
                        // Thêm giá trị vào mảng arrProduct
                        arrProduct.push(productId);
                    });
                }
            });
        });
    });

    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input',
        '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap,.promotion,.promotion-option,.promotion-total,.promotion-option-total',
        function() {
            calculateTotals();
        });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('.addProduct').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
            var discountInput = $(this).find('[name^="promotion[]"]').val().replace(/,/g, '') || 0;
            var discountOption = $(this).find('[name^="promotion-option[]"]').val() || 0;
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }
            if (giaNhapElement.length > 0) {
                var rawGiaNhap = giaNhapElement.val();
                if (rawGiaNhap !== "") {
                    giaNhap = parseFloat(rawGiaNhap.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue) && !isNaN(productPrice)) {
                if (giaNhap > 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                // Apply discount
                if (discountOption == 1) {
                    rowTotal -= discountInput;
                } else if (discountOption == 2) {
                    rowTotal -= (rowTotal * discountInput) / 100;
                }
                var rowTax = (rowTotal * taxValue) / 100;
                // Round the tax
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));
                // Display the results
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));
                $(this).find('.product_price').val(formatCurrency(donGia));
                // Accumulate into totalAmount and totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        var promotionOption = $('select[name="promotion-option-total"]').val();
        var promotionTotal = parseFloat($('input[name="promotion-total"]').val().replace(/[^0-9.-]+/g, "")) || 0;

        if (promotionOption == 1) {
            totalAmount -= promotionTotal;
        } else if (promotionOption == 2) {
            totalAmount -= (totalAmount * promotionTotal) / 100;
        }
        // Hiển thị tổng totalAmount và totalTax
        // $('#product-tax').text(formatCurrency(Math.round(totalTax)));
        checkProductTaxValues();
        console.log(totalAmount);
        if (checkProductTaxValues()) {
            var commonTaxRate = parseFloat($('select[name="product_tax[]"]').first().val());
            if (!isNaN(commonTaxRate)) {
                totalTax = totalAmount * (commonTaxRate / 100);
            }
        } else {
            $("#promotion-total").val(0);
            $('.addProduct').each(function() {
                var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
                if (!isNaN(rowTax)) {
                    totalTax += rowTax;
                }
            });
        }
        totalTax = Math.round(totalTax);
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        var promotionOption = $('select[name="promotion-option-total"]').val();
        var promotionTotal = parseFloat($('input[name="promotion-total"]').val().replace(/[^0-9.-]+/g, "")) || 0;

        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

        if (promotionOption == 1) {
            totalAmount -= promotionTotal;
        } else if (promotionOption == 2) {
            totalAmount -= (totalAmount * promotionTotal) / 100;
        }
        var grandTotal = totalAmount + totalTax;
        grandTotal = Math.round(grandTotal);
        $('#grand-total').text(formatCurrency(grandTotal));
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
    //
    var productNameInputs = document.querySelectorAll('.product_name');

    productNameInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var productIdInput = this.parentElement.querySelector('.product_id');
            productIdInput.value = '';
        });
    });

    function validateInput(input) {
        // Loại bỏ tất cả các ký tự ngoại trừ số và dấu "-"
        input.value = input.value.replace(/[^0-9-]/g, '');

        // Loại bỏ các dấu "-" liên tiếp
        input.value = input.value.replace(/-{2,}/g, '');
    }

    function kiemTraFormGiaoHang(event) {
        event.preventDefault();

        var rows = document.querySelectorAll('tr');
        var hasProducts = false;
        var previousProductNames = [];
        var invalidProductNames = [];

        function normalizeProductName(name) {
            var lowercaseName = name.toLowerCase();
            var normalized = lowercaseName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            return normalized;
        }

        (async function() {
            for (var i = 1; i < rows.length; i++) {
                if (rows[i].classList.contains('addProduct')) {
                    var inputs = rows[i].querySelectorAll('input[required]');
                    var productNameInput = rows[i].querySelector('.product_name');
                    var productName = productNameInput.value;
                    var normalizedProductName = normalizeProductName(productName).trim();

                    // Kiểm tra trùng lặp tên sản phẩm
                    if (previousProductNames.includes(normalizedProductName)) {
                        showAutoToast('warning', 'Tên sản phẩm bị trùng: ' + productName);
                        return;
                    } else {
                        // Thêm tên sản phẩm đã chuẩn hóa vào mảng các tên sản phẩm đã xuất hiện trước đó
                        previousProductNames.push(normalizedProductName);
                    }

                    // Kiểm tra các trường input sản phẩm
                    for (var j = 0; j < inputs.length; j++) {
                        if (inputs[j].value.trim() === '') {
                            showAutoToast('warning', 'Vui lòng điền đủ thông tin sản phẩm');
                            return; // Dừng ngay khi gặp một trường input thiếu thông tin
                        }
                    }

                    var inputQty = rows[i].querySelector('input[name="product_qty[]"]');
                    var value = parseFloat(inputQty.value);
                    if (isNaN(value) || value <= 0) {
                        // Nếu số lượng không hợp lệ, thêm tên sản phẩm vào mảng invalidProductNames
                        invalidProductNames.push(productName);
                        $('#excel_export').val(0);
                        $('#pdf_export').val(0);
                    }

                    hasProducts = true;

                    hasProducts = true;
                }
            }

            if (invalidProductNames.length > 0) {
                var errorMessage = 'Các sản phẩm sau có số lượng không hợp lệ: ' + invalidProductNames.join(
                    ', ');
                showAutoToast('warning', errorMessage);
                return;
            }

            // Tiếp tục với các kiểm tra khác và xử lý submit nếu cần
            var inputValue = $('.idGuest').val();
            var shouldSubmit = true;

            if ($.trim(inputValue) === '') {
                showAutoToast('warning', 'Vui lòng chọn khách hàng từ danh sách hoặc thêm mới khách hàng!');
                shouldSubmit = false;
            } else if (!hasProducts) {
                showAutoToast('warning', 'Không có sản phẩm để báo giá');
                shouldSubmit = false;
            }

            // Kiểm tra số báo giá tồn tại bằng Ajax
            if (hasProducts && shouldSubmit) {
                var detailexport_id = $('input[name="detailexport_id"]').val();
                var quotetion_number = $('input[name="quotation_number"]').val();
                $('.product_tax').prop('disabled', false);
                $.ajax({
                    url: "{{ route('checkQuotetionExportEdit') }}",
                    type: "get",
                    data: {
                        quotetion_number: quotetion_number,
                        detailexport_id: detailexport_id,
                    },
                    success: function(data) {
                        if (!data['status']) {
                            showAutoToast('warning', 'Số báo giá đã tồn tại');
                        } else {
                            // Nếu số báo giá không tồn tại, thực hiện submit form
                            $('form')[1].submit();
                        }
                    }
                });
            }
        })();
    }
    //xem thông tin sản phẩm
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
        var tonkho = $(tr).find('.tonkho');
        var soTonKho = $(tr).find('.soTonKho');
        var inventory = $(tr).find('.inventory');
        var quantity_input = $(tr).find('.quantity-input');

        $.ajax({
            url: "{{ route('getInventWH') }}",
            type: "get",
            data: {
                warehouse_id: $(tr).find('.warehouse_id').val(),
                idProduct: $(tr).find('.product_id').val(),
            },
            success: function(data) {
                tonkho.val(formatNumber(data
                    .product_inventory == null ? 0 :
                    data.product_inventory))
                if (data.type == 2) {
                    soTonKho.text('');
                    inventory.hide();
                    quantity_input.val(1);
                } else {
                    soTonKho.text(parseFloat(data
                        .product_inventory == null ? 0 :
                        data.product_inventory));
                    inventory.show();
                    quantity_input.val("");
                    if (data.product_inventory > 0) {
                        inventory.show();
                    }
                }
            }
        })
    })
</script>
</body>

</html>
