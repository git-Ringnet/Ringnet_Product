<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <form action="{{ route('delivery.update', $delivery->soGiaoHang) }}" method="POST" id="deliveryForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="detail_id" value="{{ $delivery->id }}">
        <input type="hidden" name="table_name" value="DGH">
        <input type="hidden" name="detailexport_id" id="detailexport_id" value="{{ $delivery->detailexport_id }}">
        <!-- Content Header (Page header) -->
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Bán hàng</span>
                    <span>/</span>
                    <span>Đơn giao hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">{{ $delivery->quotation_number }}</span>
                </div>
                <div class="row m-0 mb-1">
                    @if ($delivery->tinhTrang !== 2)
                        <button type="button" id="submitXacNhan"
                            class="custom-btn d-flex align-items-center h-100 mr-2" onclick="kiemTraFormGiaoHang()">
                            <span>Xác nhận đơn giao hàng</span>
                        </button>
                    @endif
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="{{ route('pdfdelivery', $delivery->soGiaoHang) }}">Xuất
                                PDF</a>
                        </div>
                    </div>
                    <label class="custom-btn d-flex align-items-center h-100 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="#0095F6" />
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="#0095F6" />
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>
                </div>
            </div>
        </section>
        <hr class="mt-3">
        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a data-toggle="tab" href="#info">Thông tin</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#history">Lịch sử sản phẩm</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#files">Attachment</a></li>
            </ul>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="row">
                            <div class="col-12">
                                <div class="info-chung">
                                    <div class="content-info">
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly value="{{ $delivery->quotation_number }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 numberQute"
                                                    id="myInput" autocomplete="off" name="quotation_number">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3">Khách hàng</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly
                                                    value="{{ $delivery->guest_name_display }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 nameGuest"
                                                    id="myInput" autocomplete="off">
                                                <input type="hidden" class="idGuest" autocomplete="off"
                                                    name="guest_id">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly value="{{ $delivery->shipping_unit }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 unit_ship"
                                                    id="myInput" autocomplete="off" name="shipping_unit">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly name="shipping_fee"
                                                    value="{{ $delivery->shipping_fee }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 fee_ship"
                                                    id="myInput" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Ngày giao hàng</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly
                                                    value="{{ date_format(new DateTime($delivery->ngayGiao), 'd/m/Y') }}"
                                                    name="date_deliver"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                    <div class="d-flex align-items-center btn-basic pb-3 px-2">
                                        <svg class="mr-1" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H14.25C14.6478 2.25 15.0294 2.40804 15.3107 2.68934C15.592 2.97064 15.75 3.35218 15.75 3.75V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75Z"
                                                stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.5 4.5H13.5V11.25H4.5V4.5Z" stroke="#42526E" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4.5 13.5H9.75" stroke="#42526E" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 13.5H13.5" stroke="#42526E" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="p-0 m-0 change_colum">Đầy đủ</p>
                                        <svg class="ml-1" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="#42526E" />
                                        </svg>
                                    </div>
                                </div>
                                <section class="content">
                                    <div class="container-fluided order_content">
                                        <table class="table table-hover bg-white rounded">
                                            <thead>
                                                <tr>
                                                    <th class="border-right">
                                                        Mã sản phẩm
                                                    </th>
                                                    <th class="border-right">Tên sản phẩm</th>
                                                    <th class="border-right">Đơn vị</th>
                                                    <th class="border-right">Số lượng</th>
                                                    {{-- <th class="border-right">Đơn giá</th>
                                            <th class="border-right">Thuế</th>
                                            <th class="border-right">Thành tiền</th>
                                            <th class="p-0 bg-secondary border-0 Daydu" style="width:1%;"></th>
                                            <th class="border-right product_ratio">Hệ số nhân</th>
                                            <th class="border-right price_import">Giá nhập</th> --}}
                                                    <th class="border-right note">Ghi chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $item_quote)
                                                    <tr class="bg-white addProduct">
                                                        <td
                                                            class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                            <div
                                                                class="d-flex w-100 justify-content-between align-items-center">
                                                                <input type="text" autocomplete="off" readonly
                                                                    value="{{ $item_quote->product_code }}"
                                                                    class="border-0 px-2 py-1 w-75 product_code"
                                                                    name="product_code[]">
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text"
                                                                    value="{{ $item_quote->product_name }}"
                                                                    class="border-0 px-2 py-1 w-100 product_name"
                                                                    readonly autocomplete="off" name="product_name[]">
                                                                <input type="hidden" class="product_id"
                                                                    value="{{ $item_quote->product_id }}"
                                                                    autocomplete="off" name="product_id[]">
                                                                <div class="info-product" data-toggle="modal"
                                                                    data-target="#productModal">
                                                                    <svg width="18" height="18"
                                                                        viewBox="0 0 18 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
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
                                                                class="border-0 px-2 py-1 w-100 product_unit"
                                                                name="product_unit[]">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative">
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
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="32" height="32"
                                                                            viewBox="0 0 32 32" fill="none">
                                                                            <rect width="32" height="32"
                                                                                rx="4" fill="white">
                                                                            </rect>
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                                                fill="#0095F6"></path>
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                                                fill="#0095F6"></path>
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                                                fill="#0095F6"></path>
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                                                fill="#0095F6"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative d-none">
                                                            <input type="text"
                                                                value="{{ number_format($item_quote->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price"
                                                                autocomplete="off" name="product_price[]" readonly>
                                                            <p class="text-primary text-right position-absolute transaction"
                                                                style="top: 68%; right: 5%; display: none;">Giao dịch
                                                                gần đây
                                                            </p>
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0 px-4 d-none">
                                                            <select name="product_tax[]"
                                                                class="border-0 text-center product_tax" disabled>
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
                                                            <input type="text"
                                                                class="border-0 px-2 py-1 w-100 heSoNhan"
                                                                autocomplete="off" required="required" readonly
                                                                value="{{ $item_quote->product_ratio }}"
                                                                name="product_ratio[]">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                            <input type="text"
                                                                class="border-0 px-2 py-1 w-100 giaNhap" readonly
                                                                autocomplete="off" required="required"
                                                                name="price_import[]"
                                                                value="{{ number_format($item_quote->price_import) }}">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative note p-1">
                                                            <input type="text" class="border-0 py-1 w-100" readonly
                                                                name="product_note[]"
                                                                value="{{ $item_quote->product_note }}">
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
                                        <div class="row position-relative footer-total">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 w-50" style="float: right;">
                                                    <div class="d-flex justify-content-between">
                                                        <span><b>Giá trị trước thuế:</b></span>
                                                        <span id="total-amount-sum">0đ</span>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between mt-2 align-items-center">
                                                        <span><b>Thuế VAT:</b></span>
                                                        <span id="product-tax">0đ</span>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-2">
                                                        <span class="text-primary">Giảm giá:</span>
                                                        <div class="w-50">
                                                            <input type="text"
                                                                class="form-control text-right border-0 p-0 bg-white"
                                                                readonly name="discount" id="voucher"
                                                                value="0">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-2">
                                                        <span class="text-primary">Phí vận chuyển:</span>
                                                        <div class="w-50">
                                                            <input type="text"
                                                                class="form-control text-right border-0 p-0 bg-white"
                                                                readonly name="transport_fee" id="transport_fee"
                                                                value="0">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <span class="text-lg"><b>Tổng cộng:</b></span>
                                                        <span><b id="grand-total" data-value="0">0đ</b></span>
                                                        <input type="text" hidden="" name="totalValue"
                                                            value="0" id="total">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade">
                    </div>
                    <div id="files" class="tab-pane fade">
                        <x-form-attachment :value="$delivery" name="BG"></x-form-attachment>
                    </div>
                </div>
            </div>
        </section>
        {{-- Modal seri --}}
        @foreach ($product as $item)
            {{-- Modal seri --}}
            <div id="list_modal">
                <div class="modal fade my-custom-modal" id="exampleModal{{ $item->product_id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                                <a href="#" class="close btnclose" data-dismiss="" aria-label="Close">
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
                                                            type="checkbox" class="check-item"
                                                            data-product-id={{ $item_seri->product_id }}
                                                            value="{{ $item_seri->id }}">
                                                    </td>
                                                    <td>{{ $stt++ }}</td>
                                                    <td>
                                                        <input readonly class="form-control w-25" type="text"
                                                            value="{{ $item_seri->serinumber }}">
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-primary check-seri" data-dismiss="" data-row="row{{$item_seri->product_id }}" data-target="#exampleModal{{ $item->product_id }}">
                                    Save changes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </form>
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
{{-- Modal seri --}}
<div id="list_modal">
    <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                    <a href="#" class="close btnclose" data-dismiss="" aria-label="Close">
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
                                <th style="width:3%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary check-seri" data-dismiss="">
                        Save changes
                    </a>
                </div>
            </div>
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

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
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

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap', function() {
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
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
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

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                if (status_form == 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));

                if (status_form == 0) {
                    // Đơn giá
                    $(this).find('.product_price').val(formatCurrency(donGia));
                }

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

    function kiemTraFormGiaoHang() {
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
            } else {
                console.error('Phần tử không tồn tại trong hàng ' + i);
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            alert("Không có sản phẩm để giao");
        }

        // Hiển thị thông báo cuối cùng nếu có sản phẩm không hợp lệ
        if (invalidProducts.length > 0) {
            alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" + invalidProducts.join(', '));
        } else if (hasProducts) {
            // Nếu không có lỗi và có sản phẩm, tiếp tục submit form
            document.getElementById('deliveryForm').submit();
        }
    }
</script>
</body>

</html>
