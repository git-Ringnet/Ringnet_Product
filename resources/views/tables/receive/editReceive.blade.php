<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('receive.update', $receive->id) }}" method="POST" id="formSubmit" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="detailimport_id" id="detailimport_id">
        <input type="hidden" value="" name="action" id="getAction">
        <input type="hidden" name="detail_id" value="{{ $receive->id }}">
        <input type="hidden" name="table_name" value="DNH">
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Đơn nhận hàng</span>
                </div>
                <div class="row m-0 mb-1">
                    {{-- <a href="#" onclick="getAction(this)">
                        <button value="1" type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <span>Chỉnh sửa đơn</span>
                        </button>
                    </a> --}}
                    <a href="#" onclick="getAction(this)">
                        <button value="2" type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <span>Nhận hàng</span>
                        </button>
                    </a>
                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
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

                    <a href="#" id="delete_receive" class="d-flex align-items-center h-100 btn-danger"
                        style="padding: 3px 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                            fill="none">
                            <path
                                d="M22.981 10.9603C26.3005 14.2798 26.3005 19.6617 22.981 22.9811C19.6615 26.3006 14.2796 26.3006 10.9602 22.9811C7.64073 19.6617 7.64073 14.2798 10.9602 10.9603C14.2796 7.64084 19.6615 7.64084 22.981 10.9603Z"
                                stroke="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.728 12.7281C13.0023 12.4538 13.447 12.4538 13.7213 12.7281L21.2133 20.22C21.4876 20.4943 21.4876 20.9391 21.2133 21.2133C20.939 21.4876 20.4943 21.4876 20.22 21.2133L12.728 13.7214C12.4537 13.4471 12.4537 13.0024 12.728 12.7281Z"
                                fill="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.2133 12.7281C21.4876 13.0024 21.4876 13.4471 21.2133 13.7214L13.7213 21.2133C13.447 21.4876 13.0023 21.4876 12.728 21.2133C12.4537 20.9391 12.4537 20.4943 12.728 20.22L20.22 12.7281C20.4943 12.4538 20.939 12.4538 21.2133 12.7281Z"
                                fill="#E4E4E4" />
                        </svg>
                        <span>Xóa đơn nhận hàng</span>
                    </a>

                    {{-- <button class="btn-option">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#42526E" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </section>
        <hr class="mt-3">

        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a data-toggle="tab" href="#info">Thông tin</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#files">Attachment</a></li>
            </ul>
        </section>

        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <section class="content">
                        <div class="container-fluided">
                            <div class="row">
                                <div class="col-12">
                                    <div class="info-chung">
                                        <div class="content-info">
                                            <div class="d-flex ml-2 align-items-center position-relative">
                                                <div class="title-info py-2 border border-left-0">
                                                    <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                                </div>
                                                <input readonly id="search_quotation" type="text"
                                                    placeholder="Nhập thông tin" name="quotation_number"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 search_quotation"
                                                    autocomplete="off" required
                                                    value="{{ $receive->quotation_number == null ? $receive->id : $receive->quotation_number }}">
                                            </div>
                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-top-0 border-left-0">
                                                    <p class="p-0 m-0 px-3">Nhà cung cấp</p>
                                                </div>
                                                <input readonly type="text" id="provide_name"
                                                    placeholder="Nhập thông tin"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                    value="{{ $receive->getNameProvide->provide_name_display }}">
                                            </div>
                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-top-0 border-left-0">
                                                    <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                                </div>
                                                <input @if ($receive->status == 2) readonly @endif type="text"
                                                    placeholder="Nhập thông tin" name="shipping_unit"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                    value="{{ $receive->shipping_unit }}">
                                            </div>
                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-top-0 border-left-0">
                                                    <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                                </div>
                                                <input @if ($receive->status == 2) readonly @endif type="text"
                                                    placeholder="Nhập thông tin" name="delivery_charges"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                    value="{{ number_format($receive->delivery_charges) }}">
                                            </div>
                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-top-0 border-left-0">
                                                    <p class="p-0 m-0 px-3">Ngày nhận hàng</p>
                                                </div>
                                                <input @if ($receive->status == 2) readonly @endif type="date"
                                                    placeholder="Nhập thông tin" name="received_date"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                    value="{{ $receive->created_at->toDateString() }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="content mt-5">
                        <div class="container-fluided">
                            <table class="table table-hover bg-white rounded" id="inputcontent">
                                <thead>
                                    <tr>
                                        <th class="border-right"><input type="checkbox"> Mã sản phẩm
                                        </th>
                                        <th class="border-right">Tên sản phẩm</th>
                                        <th class="border-right">Đơn vị</th>
                                        <th class="border-right" style="width:12%;">Số lượng</th>
                                        {{-- <th class="border-right">Đơn giá</th>
                                        <th class="border-right">Thuế</th>
                                        <th class="border-right">Thành tiền</th> --}}
                                        <th class="border-right">
                                            Quản lý S/N
                                        </th>
                                        {{-- <th class="p-0 bg-secondary" style="width:1%;"></th> --}}
                                        <th class="border-right">Ghi chú sản phẩm</th>
                                        <th class="border-top"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $st = 0; ?>
                                    @foreach ($product as $item)
                                        <tr class="bg-white">
                                            <td class="border border-left-0 border-top-0 border-bottom-0">
                                                <div
                                                    class="d-flex w-100 justify-content-between align-items-center position-relative">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"> ' +
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
                                                    <input type="checkbox">
                                                    <input readonly type="text" name="product_code[]"
                                                        id="" class="border-0 px-3 py-2 w-75 searchProduct">
                                                    {{ $item->product_code }}
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input type="text"
                                                    class="searchProductName border-0 px-3 py-2 w-100"
                                                    name="product_name[]" value="{{ $item->product_name }}" readonly>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">{{ $item->product_unit }}
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <input @if ($receive->status == 2) readonly @endif
                                                        type="text" class="border-0 px-3 py-2 w-100 quantity-input"
                                                        name="product_qty[]" {{-- oninput="checkQty(this,{{ $item->product_qty }})"  --}} readonly
                                                        value="{{ number_format($item->product_qty) }}">
                                                    @if ($item->cbSN == 1)
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{ $st }}"
                                                            style="background:transparent; border:none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 32 32" fill="none">
                                                                <rect width="32" height="32" rx="4"
                                                                    fill="white">
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
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0 text-center">
                                                <input type="checkbox" name="cbSeri[]" disabled
                                                    value="{{ $item->cbSN }}"
                                                    @if ($item->cbSN == 1) {{ 'checked' }} @endif>
                                            </td>
                                            {{-- <td class="border border-top-0 border-bottom-0">
                                                <input type="text" class="border-0 px-3 py-2 w-100 price_export"
                                                    name="price_export[]"
                                                    value="{{ fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                    readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="border-0 px-3 py-2 w-100 product_tax"
                                                    name="product_tax[]" value="{{ $item->product_tax }}" readonly>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <input type="text" class="border-0 px-3 py-2 w-100 total_price"
                                                    name="total_price[]"
                                                    value="{{ fmod($item->product_total, 1) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                    readonly>
                                            </td> --}}
                                            {{-- <td class="border border-bottom-0 p-0 bg-secondary"></td> --}}
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" class="border-0 px-3 py-2 w-100"
                                                    name="product_note[]" value="{{ $item->product_note }}" readonly>
                                            </td>
                                            <td
                                                class="border border-top-0 @if ($receive->status == 3) deleteRow @endif">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                        fill="#42526E"></path>
                                                </svg>
                                            </td>
                                        </tr>
                                        <?php $st++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    @if ($receive->status == 0)
                        <section class="content">
                            <div class="container-fluided">
                                <div class="d-flex">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100" id="addRowTable"
                                        style="margin-right:10px">
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                fill="#42526E" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                fill="#42526E" />
                                        </svg>
                                        <span>Thêm dòng</span>
                                    </button>
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                                fill="white" />
                                        </svg>
                                        <span>Thêm hàng loạt</span>
                                    </button>
                                    <button class="btn-option">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                                    </button>
                                </div>
                            </div>
                        </section>
                    @endif
                    <x-formmodalseri :product="$product"></x-formmodalseri>
                    <?php $import = '123'; ?>
                    <x-formsynthetic :import="$import"></x-formsynthetic>
    </form>
</div>

<div id="files" class="tab-pane fade">
    <x-form-attachment :value="$receive" name="DNH"></x-form-attachment>
</div>
</div>
</div>

</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })
    // Xóa đơn hàng
    deleteImport('#delete_receive', '{{ route('receive.destroy', $receive->id) }}')

    $('#addRowTable').off('click').on('click', function() {
        addRowTable(2);
        $('.searchProductName').on('click', function() {
            var id = @php echo $receive->id; @endphp;
            console.log(id);
            $.ajax({
                url: "{{ route('getProduct_receive') }}",
                type: "get",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
                }
            })
        })
    })



    $('form').on('submit', function(e) {
        e.preventDefault();
        var productSN = {}
        var formSubmit = false;
        var listProductName = [];
        var listQty = [];
        var listSN = [];
        var checkSN = [];
        if ($('#getAction').val() == 2) {
            $('.searchProductName').each(function() {
                checkSN.push($(this).closest('tr').find('input[name^="cbSeri"]').val())
                listProductName.push($(this).val().trim());
                listQty.push($(this).closest('tr').find('.quantity-input').val().trim());
                var count = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').filter(
                    function() {
                        return $(this).val() !== '';
                    }).length;
                listSN.push(count);
                var oldValue = $(this).val().trim();
                productSN[oldValue] = {
                    sn: []
                };
                SerialNumbers = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').map(function() {
                    return $(this).val().trim();
                }).get();
                productSN[oldValue].sn.push(...SerialNumbers)
            });
            // Kiểm tra số lượng sn và số lượng sản phẩm
            $.ajax({
                url: "{{ route('checkSN') }}",
                type: "get",
                data: {
                    listProductName: listProductName,
                    listQty: listQty,
                    listSN: listSN,
                    checkSN: checkSN,
                },
                success: function(data) {
                    if (data['status'] == 'false') {
                        alert('Vui lòng nhập đủ số lượng seri sản phẩm ' + data['productName'])
                    } else {
                        // Kiểm tra sản phẩm đã tồn tại seri chưa
                        $.ajax({
                            url: "{{ route('checkduplicateSN') }}",
                            type: "get",
                            data: {
                                value: productSN,
                            },
                            success: function(data) {
                                if (data['success'] == false) {
                                    alert('Sản phảm' + data['msg'] + 'đã tồn tại seri' +
                                        data['data'])
                                } else {
                                    updateProductSN()
                                    $('form')[0].submit();
                                }
                            }
                        })
                    }
                }
            })
        } else {
            $('form')[0].submit();
        }
    })

    // Tạo INPUT SERI
    createRowInput('seri');
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })
</script>
