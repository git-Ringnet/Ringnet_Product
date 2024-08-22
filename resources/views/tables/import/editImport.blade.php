<x-navbar :title="$title" activeGroup="manageProfess" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST">
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
        <input type="hidden" id="represent_id" name="represent_id" value="{{ $import->represent_id }}">
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
                    <span class="last-span">{{ $title }}</span>
                    {{-- @if ($import->status == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif --}}
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('import.index', $workspacename) }}">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <a href="#" onclick="getAction(this)">
                            <button name="action" value="action_1" type="submit"
                                class="custom-btn d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Lưu</span>
                            </button>
                        </a>
                    </div>
                    <input type="hidden" value="action_1" name="action" id="getAction">
                </div>
            </div>
        </div>
        <!-- Main content -->
        <x-formprovides> </x-formprovides>
        <div class="content margin-top-75">
            <x-view-mini :listDetail="$listDetail" :workspacename="$workspacename" :page="'DHNCC'" :status="'3'" :guest="$provides" :listUser="$listUser" />
            <div id="contextMenuDHNCC" class="dropdown-menu"
                style="display: none; background: #ffffff; position: absolute; width:13%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3); border: 1px solid #ccc;">
                <a class="dropdown-item text-13-black" href="#" data-option="donhang">Tạo phiếu nhập kho</a>
            </div>
            <div id="main">
                <div class="border">
                    <div>
                        <div class="bg-filter-search border-0 text-center">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN NHÀ CUNG CẤP
                            </p>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày lập</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest px-2 py-2"
                                    id="datePicker" style="flex:2;" placeholder="Chọn thông tin"
                                    value="{{ date_format(new DateTime($import->created_at), 'd/m/Y') }}">
                                <input type="hidden" id="hiddenDateInput" name="date_quote"
                                    value="{{ $import->created_at->toDateString() }}">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 btn-click" style="flex: 1.5;">
                                    Nhà cung cấp
                                </span>
                                <span class="mx-1 text-13" style="flex: 2;">
                                    <input type="text" placeholder="Chọn thông tin" {{-- value="{{ $import->getProvideName->provide_name_display }}" --}}
                                        value="{{ $import->provide_name_display }}"
                                        class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest" id="myInput"
                                        style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                        required readonly>
                                </span>
                                @if ($import->status == 1)
                                    <div class="d-flex align-items-center justify-content-between border-0">
                                        <div id="myUL"
                                            class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                            style="z-index: 99;display: none;">
                                            <ul class="m-0 p-0 scroll-data">
                                                <div class="p-1">
                                                    <div class="position-relative">
                                                        <input type="text" placeholder="Nhập thông tin"
                                                            class="pr-4 w-100 input-search bg-input-guest"
                                                            id="provideFilter">
                                                        <span id="search-icon" class="search-icon"><i
                                                                class="fas fa-search text-table"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                                @foreach ($provides as $item)
                                                    <li class="p-2 align-items-center text-wrap"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="javascript:void(0)" style="flex:2;"
                                                            id="{{ $item->id }}" name="search-info"
                                                            class="search-info">
                                                            <span
                                                                class="text-13-black">{{ $item->provide_name_display }}</span>
                                                        </a>
                                                        <a type="button" data-toggle="modal"
                                                            data-target="#editProvide" data-id="{{ $item->id }}"
                                                            class="search-infoEdit">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
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
                                @endif
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng nợ cũ</span>
                                <input tye="text"
                                    class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 text-right debt-old"
                                    value="{{ number_format($import->provide_debt) }}" disabled="">
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest px-2 py-2"
                                    name="quotation_number"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                    placeholder="Chọn thông tin" value="{{ $import->quotation_number }}"
                                    @if ($import->status == 2) readonly @endif>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Họ và tên</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    value="{{ $import->provide_name }}" name="provides_name" style="flex:2;">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số điện thoại</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    value="{{ $import->phone }}" name="phone" style="flex:2;">
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số phiếu</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest px-2 py-2"
                                    name="reference_number"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                    placeholder="Chọn thông tin" value="{{ $import->reference_number }}">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa chỉ</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    value="{{ $import->address }}" name="address" style="flex:2;">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao</span>
                                <input id="date_delivery" readonly
                                    value="{{ date_format(new DateTime($import->date_delivery), 'd/m/Y') }}"
                                    class="text-13-black w-50 border-0 bg-input-guest py-2 px-2 flatpickr-input active"
                                    style="flex:2;" type="text">
                                <input type="hidden" id="hiddenDateDelivery" name="date_delivery" value="">
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    style="flex:2;" disabled="" value="{{ $import->name }}">
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhân viên</span>
                                <select name="id_sale" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2">
                                    <option value=""></option>
                                    @foreach ($listUser as $listU)
                                        <option value="{{ $listU->id }}" <?php if ($listU->id === $import->id_sale) {
                                            echo 'selected';
                                        } ?>>
                                            {{ $listU->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Trạng thái</span>
                                <select name="status_receive"
                                    class="text-13-black w-50 border-0 bg-input-guest py-2 px-2">
                                    <option value="0" class="text-uppercase" <?php if ($import->status_receive == 0) {
                                        echo 'selected';
                                    } ?>>Chưa nhận
                                    </option>
                                    <option value="2" class="text-uppercase" <?php if ($import->status_receive == 2) {
                                        echo 'selected';
                                    } ?>>Đã nhận
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div
                                class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-44">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest py-2 px-2"
                                    value="{{ $import->note }}" name="note" style="flex:10;">
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluided">
                        <div class="bg-filter-search border-0 text-center">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN SẢN PHẨM
                            </p>
                        </div>
                        <div class="content-info text-nowrap">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right px-2 p-0" style="width: 10%">
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
                                        <th class="border-right px-2 p-0 text-right" style="width: 8%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                            <span class="text-table text-secondary">KM</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-center" style="width: 6%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                            <span class="text-table text-secondary">Thành tiền</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-center"style="width: 10%;">
                                            <span class="text-table text-secondary">Kho</span>
                                        </th>
                                        <th class="border-right note px-2 p-0 text-left">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                        <th class=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr class="bg-white" style="height:80px;">
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="hidden" readonly value="{{ $item->id }}"
                                                    name="listProduct[]">
                                                <span class="ml-1 mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                        height="10" viewBox="0 0 6 10" fill="none">
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
                                                <input type="checkbox" class="cb-element checkall-btn">
                                                <input type="text" name="product_code[]"
                                                    class="border-0 w-75 px-2 py-1 w-75 searchProduct height-32"
                                                    value="{{ $item->product_code }}"
                                                    @if ($import->status == 2) echo readonly @endif>
                                                <ul id="listProductCode"
                                                    class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; left: 24%; top: 75%;">
                                                </ul>
                                            </td>
                                            <td
                                                class="border-right p-2 text-13 align-top position-relative border-bottom border-top-0">
                                                <div class="d-flex align-items-center">
                                                    <input id="searchProductName" type="text"
                                                        name="product_name[]"
                                                        class="searchProductName border-0 px-2 py-1 w-100 height-32"
                                                        value="{{ $item->product_name }}" autocomplete="off"
                                                        @if ($import->status != 1) echo readonly @endif required>
                                                    <input type="hidden" class="product_id" autocomplete="off"
                                                        value="{{ $item->product_id }}" name="product_id[]"
                                                        value="">
                                                    <div class="info-product" data-toggle="modal"
                                                        data-target="#productModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <g clip-path="url(#clip0_2559_39956)">
                                                                <path
                                                                    d="M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z"
                                                                    fill="#282A30"></path>
                                                                <path
                                                                    d="M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z"
                                                                    fill="#282A30"></path>
                                                                <path
                                                                    d="M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z"
                                                                    fill="#282A30"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2559_39956">
                                                                    <rect width="14" height="14"
                                                                        fill="white">
                                                                    </rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="listProductName"
                                                    class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                </ul>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text" name="product_unit[]"
                                                    class="border-0 px-2 py-1 w-100 product_unit height-32"
                                                    value="{{ $item->product_unit }}"
                                                    @if ($import->status != 1) echo readonly @endif required>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <div class="">
                                                    <input {{-- oninput="checkQty(this,{{ $item->product_qty }})" --}} type="text" name="product_qty[]"
                                                        class="border-0 px-2 py-1 w-100 quantity-input text-right height-32"
                                                        value="{{ number_format($item->product_qty) }}"
                                                        @if ($import->status != 1) echo readonly @endif>
                                                    <div class='mt-3 text-13-blue inventory text-right'
                                                        tyle="top: 68%;">
                                                        Tồn kho:
                                                        <span class='pl-1 soTonKho'>
                                                            {{ fmod($item->product_inventory, 2) > 0 && fmod($item->product_inventory, 1) > 0 ? number_format($item->product_inventory, 2, '.', ',') : number_format($item->product_inventory) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text" name="price_export[]"
                                                    class="border-0 px-2 py-1 w-100 price_export text-right height-32"
                                                    value="{{ fmod($item->price_export, 2) > 0 && fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                    @if ($import->status != 1) echo readonly @endif>
                                                <div class='mt-3 text-13-blue text-right transaction' id="transaction"
                                                    data-toggle="modal" data-target="#recentModal">Giao dịch gần đây
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">

                                                @php
                                                    $promotionArray = json_decode($item->promotion, true);
                                                    $promotionValue = isset($promotionArray['value'])
                                                        ? $promotionArray['value']
                                                        : 0;
                                                    $promotionOption = isset($promotionArray['type'])
                                                        ? $promotionArray['type']
                                                        : '';
                                                @endphp


                                                <div>
                                                    <input type="text"
                                                        class="border-0 px-2 py-1 w-100 text-right height-32 promotion"
                                                        name="promotion[]"
                                                        value="{{ number_format($promotionValue) }}">
                                                </div>
                                                <div class="mt-3 text-13-blue text-right">
                                                    <select class="border-0 promotion-option"
                                                        name="promotion-option[]">
                                                        <option value="1"
                                                            @if ($promotionOption == 1) selected @endif>
                                                            Nhập tiền</option>
                                                        <option value="2"
                                                            @if ($promotionOption == 2) selected @endif>
                                                            Nhập %</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <input type="hidden" class="product_tax1">
                                            <td
                                                class="border-right pt-0 p-2 text-13 align-top border-top-0 border-bottom text-center">
                                                <select name="product_tax[]" id=""
                                                    class="border-0 py-1 w-100 text-center product_tax height-32">
                                                    @if ($item->product_tax == 0)
                                                        <option value="0">0%</option>
                                                    @elseif($item->product_tax == 8)
                                                        <option value="8">8%</option>
                                                    @elseif($item->product_tax == 10)
                                                        <option value="10">10%</option>
                                                    @else
                                                        <option value="99">NOVAT</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td
                                                class="border-right p-2 text-13 align-top border-top-0 border-bottom position-relative">
                                                <input type="text" name="total_price[]"
                                                    class="text-right border-0 px-2 py-1 w-100 total_price height-32"
                                                    readonly
                                                    value="{{ fmod($item->product_total, 2) > 0 && fmod($item->product_total, 1) > 0 ? number_format($promotionOption == 1 ? $item->product_total - $promotionValue : $item->product_total - ($item->product_total * $promotionValue) / 100, 2, '.', ',') : number_format($promotionOption == 1 ? $item->product_total - $promotionValue : $item->product_total - ($item->product_total * $promotionValue) / 100) }}">
                                            </td>
                                            <td
                                                class='border-right p-2 text-13 align-top border-top-0 border-bottom position-relative'>
                                                <input type="text" class="border-0 py-1 w-100 searchWarehouse"
                                                    name="warehouse[]" readonly id="searchWarehouse"
                                                    placeholder="Chọn kho"
                                                    value="@if (isset($item->getWareHouse)) {{ $item->getWareHouse->warehouse_name }} @endif">
                                                <div id="listWareH"
                                                    class="bg-white position-absolute rounded shadow p-1 z-index-block"
                                                    style="z-index: 99;">
                                                    <ul class="m-0 p-0 scroll-data listWarehouse" id="listWarehouse"
                                                        style="display:none;">
                                                        <div class="p-1">
                                                            <div class="position-relative">
                                                                <input type="text" placeholder="Nhập kho hàng"
                                                                    class="pr-4 w-100 input-search bg-input-guest searchWarehouse"
                                                                    id="a">
                                                                <span id="search-icon" class="search-icon">
                                                                    <i class="fas fa-search text-table"
                                                                        aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <input type="hidden" placeholder="Chọn kho"
                                                    class="border-0 py-1 w-100 height-32 text-13-black warehouse_id"
                                                    name="warehouse_id[]">
                                            </td>
                                            <td class="border-right border-top-0 p-2 text-13 align-top border-bottom">
                                                <textarea placeholder="Nhập ghi chú" class='text-13-black border-0 py-1 w-100 height-32' name='product_note[]'
                                                    @if ($import->status != 1) echo readonly @endif rows='2' cols='50'>
                                                {{ $item->product_note }}
                                            </textarea>
                                            </td>
                                            <td class="p-2 align-top border-bottom border-top-0 deleteRow">
                                                <svg width='17' height='17' viewBox='0 0 17 17'
                                                    fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd' clip-rule='evenodd'
                                                        d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z'
                                                        fill='#6B6F76' />
                                                </svg>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="content mt-3 ml-3">
                            <span class="text-perpage">
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            @if ($import->status == 1)
                                                <button type="button" data-toggle="dropdown"
                                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                                    id="addRowTable" style="margin-right:10px">
                                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 18 18"
                                                        fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                    <span class="text-table">Thêm sản phẩm</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </section>
                            </span>
                        </div>
                        <x-formsynthetic :import="$import"></x-formsynthetic>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
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


<x-form-modal-import title="Thêm mới người đại diện" name="addRepresent"
    idModal="modalAddRepresent"></x-form-modal-import>
<x-form-modal-import title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-form-modal-import>
<x-form-modal-import title="Điều khoản thanh toán" name="termpay" idModal="formModalTermPay"></x-form-modal-import>
<x-form-modal-import title="Chỉnh sửa nhà cung cấp" name="provide" idModal="editProvide"></x-form-modal-import>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
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
                if (data['history']) {
                    data['history'].forEach(element => {
                        var tr = `
                        <tr>
                        <td>` + element.product_name + `</td>
                        <td>` + formatCurrency(element.price_export) + `</td>
                        <td>` + (element.product_tax == 99 ? "NOVAT" : element.product_tax + "%") + `</td>
                        <td>` + new Date(element.created_at).toLocaleDateString('vi-VN'); + `</td>
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
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    flatpickr("#date_delivery", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateDelivery").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });

    getKeyProvide($('#getKeyProvide'));
    getKeyProvide($('#getKeyProvide1'));

    $('#addRowTable').off('click').on('click', function() {
        addRowTable(1);
    })

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

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $(document).on('click', '.search-info', function() {
        var provides_id = $(this).attr('id');
        var quotation_number = "{{ $import->quotation_number }}"
        var old_provide = {{ $import->provide_id }}
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                if (data.key) {
                    if (old_provide == data['provide'].id) {
                        quotation = quotation_number
                    } else {
                        quotation = data.resultNumber
                        // quotation = getQuotation(data.key, data['count'], data['date']);
                    }
                } else {
                    quotation = getQuotation(data['provide'].provide_name_display, data['count'],
                        data['date'])
                }
                $('input[name="quotation_number"]').val(quotation);
                $('#myInput').val(data['provide'].provide_name_display);
                $('#provides_id').val(data['provide'].id);
                $('.debt-old').val(formatCurrency(data['provide'].provide_debt));
                $('input[name="provides_name"]').val(data['provide'].provide_name);
                $('input[name="address"]').val(data['provide'].provide_address);

                $.ajax({
                    url: "{{ route('getDataForm') }}",
                    type: "get",
                    data: {
                        id: data['provide'].id,
                        status: 'add'
                    },
                    success: function(data) {
                        $('#listRepresent li').empty()
                        $('#listPriceEffect li').empty()
                        $('#listTermsPay li').empty()
                        $('#represent_id').val('')
                        $('#price_effect').val("")
                        $('#represent').val('')
                        $('#terms_pay').val("")
                        if (data['default_price'][0]) {
                            $('#price_effect').val(data['default_price'][0].form_desc)
                        }
                        if (data['default_term'][0]) {
                            $('#terms_pay').val(data['default_term'][0].form_desc)
                        }

                        data['represent'].forEach(function(element) {
                            var li =
                                `
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-represent w-100 search-represent"
                                    id="` + element.id + `" name="search-represent">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.represent_name + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#modalAddRepresent" data-name="represent"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="represent"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.represent_name + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="represent"
                                            data-id="` + element.id + `">
                                            ` + (element.default === 1 ? '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listRepresent .p-1').after(li);
                            if (element.default == 1) {
                                $('#represent').val(element.represent_name);
                                $('#represent_id').val(element.id);
                            }
                        });

                        data['price_effect'].forEach(function(element) {
                            var li =
                                `
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-priceeffect w-100 search-price-effect"
                                    id="` + element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
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
                                            data-name="import"
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
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-termpay w-100 search-term-pay"
                                    id="` + element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
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
            }
        });
    })


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
                            .val(data[table].form_desc).attr('data-id', data[table].id)
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
                    $(data['import'] ? '#price_effect' : '#terms_pay').val(
                        (data['import'] ? data['import'] : data['termpay']).form_desc)
                    $(data['import'] ? '#listPriceEffect' : '#listTermsPay').hide()

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
                    showNotification('success', data.msg)

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
                    showNotification('warning', data.msg)
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


    function actionForm(id, routeAdd, routeEdit) {
        $('#' + id).click(function() {
            // console.log(id);
            var status = $(this).text().trim();
            var provide_represent = $("input[name='provide_represent_new']").val().trim();
            var provide_email = $("input[name='provide_email_new']").val().trim();
            var provide_phone = $("input[name='provide_phone_new']").val().trim();
            var provide_address_delivery = $("input[name='provide_address_delivery_new']").val().trim();

            if (status == 'Thêm mới') {
                if ((provides_id == "" || provide_represent == "") && id == 'addRepresent') {
                    showNotification('warning', 'Vui lòng nhập tên người đại diện')
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
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data.data +
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
                                showNotification('success', data.msg)
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
                                            var price_effect = `
                                        <li class="border" id="` + data.id +
                                                `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                                data.id + `" name="search-price-effect">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                                .inputName +
                                                `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
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
                                        <li class="border" id="` + data.id +
                                                `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                                data.id + `" name="search-term-pay">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                                .inputName +
                                                `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
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

                                        showNotification('success', data.msg)

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
                                        showNotification('warning', data.msg)
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
                                $('#' + id).closest('div').find('.closeModal')[0].click()
                                showNotification('success', data.msg)
                                if (data.id == $('#represent_id').val()) {
                                    $('#represent').val(data.data)
                                }
                                $('#listRepresent').find('li#' + data.id + " span").text(data.data)
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
                                showNotification('warning', data.msg)
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
                                    showNotification('success', data.msg)

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
                                    showNotification('warning', data.msg)
                                }
                            }
                        })
                    }
                }
            }
        })

    }

    actionForm('addRepresent', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('import', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('termpay', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')



    $('#addProvide').click(function() {
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var provide_name = $("input[name='provide_name']").val().trim();
        var provide_represent = $("input[name='provide_represent']").val().trim();
        var provide_email = $("input[name='provide_email']").val().trim();
        var provide_phone = $("input[name='provide_phone']").val().trim();
        var provide_address_delivery = $("input[name='provide_address_delivery']").val().trim();
        var key = $("input[name='key']").val().trim();
        if (provide_name_display == '') {
            showNotification('warning', 'Vui lòng nhập Tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập Mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập Địa chỉ nhà cung cấp')
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
                    provide_name: provide_name,
                    provide_represent: provide_represent,
                    provide_email: provide_email,
                    provide_phone: provide_phone,
                    provide_address_delivery: provide_address_delivery,
                    key: key
                },
                success: function(data) {
                    $('#listPriceEffect li').empty();
                    $('#listTermsPay li').empty();
                    if (data.success == true) {
                        quotation = getQuotation(data.key, '1')
                        $("input[name='quotation_number']").val(quotation)
                        $('#myInput').val(data.name);
                        $('#provides_id').val(data.id);
                        showNotification('success', data.msg)
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
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

                        if (data.price_effect) {
                            data.price_effect.forEach(function(element) {
                                var li = `
                            <li class="border" id="` +
                                    element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                    element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
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

                        if (data.terms_pay) {
                            data.terms_pay.forEach(function(element) {
                                var li = `
                                <li class="border" id="` + element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                    element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
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

                        if (data.id_represent) {
                            $('#represent').val(data.represent_name)
                            $('#represent_id').val(data.id_represent)
                            var newli = `
                                    <li class="border" id="` + data.id_represent +
                                `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                data.id_represent + `" name="search-represent">
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data
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
                            showNotification('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showNotification('warning', data.msg)
                        }
                    }
                }
            });
        }
    })

    getProduct('searchProductName');
    showListProductName()

    function getProduct(name) {
        $('#inputcontent tbody tr .' + name).on('click', function() {
            listProductCode = $(this).closest('tr').find('#listProductCode');
            listProductName = $(this).closest('tr').find('#listProductName');
            inputCode = $(this).closest('tr').find('.searchProduct');
            inputID = $(this).closest('tr').find('.product_id');
            inputName = $(this).closest('tr').find('.searchProductName');
            inputUnit = $(this).closest('tr').find('.product_unit');
            inputPriceExprot = $(this).closest('tr').find('.price_export');
            inputRatio = $(this).closest('tr').find('.product_ratio');
            inputPriceImport = $(this).closest('tr').find('.price_import');
            selectTax = $(this).closest('tr').find('.product_tax');
            $.ajax({
                url: "{{ route('getAllProducts') }}",
                type: "get",
                success: function(result) {
                    listProductName.empty()
                    var createLi =
                        '<a class="bg-dark d-flex justify-content-between p-2 position-sticky">' +
                        '<span class="w-100 text-white">Thêm mới</span>' +
                        '</a>';
                    result.forEach(element => {
                        var UL = '<li>' +
                            '<a href="javascript:void(0)" class="text-dark d-flex justify-content-between w-100 p-2 search-name" id="' +
                            element.id + ' "data-code="' + element.product_code +
                            ' "data-id="' + element.id +
                            '"data-tax="' + element
                            .product_tax +
                            '"data-priceExport= "' +
                            element.product_price_export +
                            '"data-unit="' + element.product_unit + '" "data-name="' +
                            element.product_name +
                            '""name="search-product">' +
                            '<span class="w-100" data-id="' + element.id + '">' + element
                            .product_name + '</span>' +
                            '</a>' +
                            '</li>';
                        listProductName.append(UL);
                    });

                    $('.search-name').on('click', function() {
                        inputCode.val($(this).attr(
                                'data-code') == "null" ?
                            "" : $(this).attr(
                                'data-code'))
                        inputName.val($(this).closest('li')
                            .find('span')
                            .text());
                        inputID.val($(this).attr('data-id') == "null" ? "" : $(this)
                            .attr('data-id'));
                        inputUnit.val($(this).attr(
                                'data-unit') == null ?
                            "" : $(this).attr(
                                'data-unit'));
                        inputPriceExprot.val($(this).attr(
                                'data-priceExport') ==
                            "null" ? "" :
                            formatCurrency($(this).attr(
                                'data-priceExport')))
                        inputRatio.val($(this).attr(
                                'data-ratio') ==
                            "null" ? "" : $(this).attr(
                                'data-ratio'))
                        inputPriceImport.val($(this).attr(
                                'data-priceImport') ==
                            "null" ? "" :
                            formatCurrency($(this).attr(
                                'data-priceImport')))
                        selectTax.val($(this).attr(
                            'data-tax'))
                        listProductName.hide();
                        var product_name = $(this).find("span").text()
                        var currentTr = $(this).closest('tr');
                        var warehouseId = currentTr.find('.warehouse_id').val();
                        $.ajax({
                            url: "{{ route('getInventory') }}",
                            type: "get",
                            data: {
                                product_name: product_name,
                                warehouse_id: warehouseId,
                            },
                            success: function(data) {
                                if (data && data['products']) {
                                    var productInventory = data['products']
                                        .product_inventory;
                                    currentTr.find('#soTonKho').text(
                                        formatCurrency(productInventory ==
                                            null ? 0 : productInventory));
                                } else {
                                    currentTr.find('#soTonKho').text(
                                        formatCurrency(0));
                                }
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


    $('form').on('submit', function(e) {
        e.preventDefault();
        var quotetion_number = $('input[name="quotation_number"]').val();
        var detail_id = {{ $import->id }}
        var provide_id = $('#provides_id').val()
        var formSubmit = true;
        if (!checkProduct()) {
            formSubmit = false
        }
        if (!checkQtyProduct()) {
            formSubmit = false;
            showAutoToast('warning', 'Vui lòng nhập số lượng sản phẩm lớn hơn 0')
        }

        if (formSubmit) {
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    detail_id: detail_id,
                    provide_id: provide_id
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Số báo giá đã tồn tại')
                    } else {
                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Chỉnh sửa đơn mua hàng"
                            },
                            success: function(data) {}
                        })
                        $('form')[1].submit();
                    }
                }
            })
        }
    })

    $(document).on('click', '.closeModal', function(e) {
        e.preventDefault();
        $("input[name='provide_represent_new']").val('')
        $("input[name='provide_email_new']").val('')
        $("input[name='provide_phone_new']").val('')
        $("input[name='provide_address_delivery_new']").val('')
        $("input[name='form-name-import']").val('')
        $("input[name='form-desc-import']").val('')
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
            showNotification('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
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
                    console.log(data);
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
                        showNotification('success', 'Chỉnh sửa thông tin thành công !')


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
                        showNotification('warning', 'Nhà cung cấp đã tồn tại !')
                    }
                }
            })
        }
    })


    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showNotification(type, message);
        }, delayTime);
    }
</script>
</body>

</html>
