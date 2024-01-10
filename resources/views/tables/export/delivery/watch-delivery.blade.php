<x-navbar :title="$title" activeGroup="sell" activeName="delivery" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('delivery.update', ['workspace' => $workspacename, 'delivery' => $delivery->soGiaoHang]) }}"
    method="POST" id="deliveryForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $delivery->soGiaoHang }}">
    <input type="hidden" name="table_name" value="GH">
    <input type="hidden" name="detailexport_id" id="detailexport_id" value="{{ $delivery->detailexport_id }}">
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container-fluided">
                <div class="mb-3">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn báo giá</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">{{ $delivery->quotation_number }}</span>
                    @if ($delivery->tinhTrang == 1)
                        <span class="border ml-2 p-1 text-nav text-secondary shadow-sm rounded">Chưa giao</span>
                    @else
                        <span class="border ml-2 p-1 text-nav text-primary shadow-sm rounded">Đã giao</span>
                    @endif
                </div>
            </div>
            <div class="container-fluided">
                <div class="row m-0 mb-1">
                    <label class="custom-btn d-flex align-items-center mr-2 h-100 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="white" />
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="white" />
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>
                    <button name="action" value="action_2" type="submit" id="xoaBtn"
                        class="d-flex align-items-center h-100 btn-danger mr-2 border-0 rounded"
                        style="padding: 3px 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                            fill="none">
                            <path
                                d="M22.981 10.9603C26.3005 14.2798 26.3005 19.6617 22.981 22.9811C19.6615 26.3006 14.2796 26.3006 10.9602 22.9811C7.64073 19.6617 7.64073 14.2798 10.9602 10.9603C14.2796 7.64084 19.6615 7.64084 22.981 10.9603Z"
                                stroke="#E4E4E4"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.728 12.7281C13.0023 12.4538 13.447 12.4538 13.7213 12.7281L21.2133 20.22C21.4876 20.4943 21.4876 20.9391 21.2133 21.2133C20.939 21.4876 20.4943 21.4876 20.22 21.2133L12.728 13.7214C12.4537 13.4471 12.4537 13.0024 12.728 12.7281Z"
                                fill="#E4E4E4"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.2133 12.7281C21.4876 13.0024 21.4876 13.4471 21.2133 13.7214L13.7213 21.2133C13.447 21.4876 13.0023 21.4876 12.728 21.2133C12.4537 20.9391 12.4537 20.4943 12.728 20.22L20.22 12.7281C20.4943 12.4538 20.939 12.4538 21.2133 12.7281Z"
                                fill="#E4E4E4"></path>
                        </svg>
                        <span>Xóa đơn giao hàng</span>
                    </button>
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="{{ route('pdfdelivery', $delivery->soGiaoHang) }}">Xuất
                                PDF</a>
                        </div>
                    </div>
                    @if ($delivery->tinhTrang !== 2)
                        <button type="submit" id="submitXacNhan" name="action" value="action_1"
                            class="custom-btn d-flex align-items-center h-100 mr-2"
                            onclick="kiemTraFormGiaoHang(event)">
                            <span>Xác nhận đơn giao hàng</span>
                        </button>
                    @endif
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
                <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông tin</a></li>
                <li class="text-nav"><a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch sử sản phẩm</a></li>
                <li class="text-nav"><a data-toggle="tab" href="#files" class="text-secondary">Attachment</a></li>
            </ul>
            <div class="d-flex position-sticky" style="right: 10px; top: 80px;"></div>
        </div>
    </section>
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="col-12">
                        {{-- <div class="info-chung">
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" readonly
                                                value="{{ $delivery->quotation_number }}"
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
                                            <input type="text" value="{{ $delivery->shipping_unit }}"
                                                placeholder="Nhập thông tin"
                                                class="border w-100 py-2 border-left-0 border-right-0 px-3 unit_ship"
                                                id="myInput" autocomplete="off" name="shipping_unit">
                                        </div>
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" name="shipping_fee"
                                                value="{{ number_format($delivery->shipping_fee) }}"
                                                placeholder="Nhập thông tin"
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
                            </div> --}}
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
                                                                    height="32" viewBox="0 0 32 32"
                                                                    fill="none">
                                                                    <rect width="32" height="32"
                                                                        rx="4" fill="white">
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
                                                    <input type="text" class="border-0 px-2 py-1 w-100 heSoNhan"
                                                        autocomplete="off" required="required" readonly
                                                        value="{{ $item_quote->product_ratio }}"
                                                        name="product_ratio[]">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 giaNhap"
                                                        readonly autocomplete="off" required="required"
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
                                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                                <span><b>Thuế VAT:</b></span>
                                                <span id="product-tax">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Giảm giá:</span>
                                                <div class="w-50">
                                                    <input type="text"
                                                        class="form-control text-right border-0 p-0 bg-white" readonly
                                                        name="discount" id="voucher" value="0">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Phí vận chuyển:</span>
                                                <div class="w-50">
                                                    <input type="text"
                                                        class="form-control text-right border-0 p-0 bg-white" readonly
                                                        name="transport_fee" id="transport_fee" value="0">
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
                <div id="history" class="tab-pane fade">
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
</form>
<div id="files" class="tab-pane fade">
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
                if (giaNhap > 0) {
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
            } else {
                console.error('Phần tử không tồn tại trong hàng ' + i);
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
                        .product_unit + '<br>' + '<b>Tồn kho: </b>' + (productData
                            .product_inventory == null ? 0 : productData
                            .product_inventory) + '<br>' + '<b>Thuế: </b>' + (productData
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
