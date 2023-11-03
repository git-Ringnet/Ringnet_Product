<x-navbar :title="$title"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
            <span>Kho hàng / Tồn kho / {{ $title }}</span>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('inventory.update', $product->id) }}" method="POST">
        @method('PUT')
        @csrf
        <section class="content-header">
            <div class="container-fluided">
                <div class="d-flex">
                    {{-- Sửa --}}
                    @if ($display == 1)
                        <div class="mr-2">
                            <button class="btn btn-primary" name="action" value="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                        fill="white" />
                                </svg>
                                <span>Sửa</span></button>
                        </div>
                    @endif
                    {{-- Sửa tồn kho --}}
                    @if ($display == 2)
                        <div class="mr-2">
                            <button class="btn btn-secondary" name="action" value="2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                        fill="white" />
                                </svg>
                                <span>Sửa tồn kho</span>
                            </button>
                        </div>
                    @endif
                    {{-- Icon --}}
                    <div class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
        </section>
        @if ($display == 1)
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold ml-2 px-3">Thông tin chung</p>
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Tên sản phẩm</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_name"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                            autocomplete="off" required value="{{ $product->product_name }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Mã sản phẩm</p>
                                        </div>
                                        <input type="text" required="" placeholder="Nhập thông tin"
                                            name="product_code" value="{{ $product->product_code }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Đơn vị tính</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_unit"
                                            value="{{ $product->product_unit }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Loại sản phẩm</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_type"
                                            value="{{ $product->product_type }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Hãng</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_manufacturer"
                                            value="{{ $product->product_manufacturer }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Xuất xứ</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_origin"
                                            value="{{ $product->product_origin }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Bảo hành</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_guarantee"
                                            value="{{ $product->product_guarantee }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Quản lý Serial Number</p>
                                        </div>
                                        <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            <input type="checkbox" checked name="check_seri"
                                                @if ($product->check_seri == 1) checked @endif>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold ml-2 px-3 pt-3">Thông tin giá</p>
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Đơn giá bán</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin"
                                            name="product_price_export" value="{{ number_format($product->product_price_export) }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Đơn giá nhập</p>
                                        </div>
                                        <input type="text" required="" placeholder="Nhập thông tin"
                                            name="product_price_import" value="{{ number_format($product->product_price_import) }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Hệ số nhân</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_ratio"
                                            value="{{ $product->product_ratio }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Thuế</p>
                                        </div>
                                        <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            <select name="product_tax" id="" class="w-25 form-control">
                                                <option value="0"
                                                    @if ($product->product_tax == 0) selected @endif>0%</option>
                                                <option value="8"
                                                    @if ($product->product_tax == 8) selected @endif>8%</option>
                                                <option value="10"
                                                    @if ($product->product_tax == 10) selected @endif>10%</option>
                                                <option value="99"
                                                    @if ($product->product_tax == 99) selected @endif>NOVAT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section class="content-header mt-4">
            <div class="container-fluided">
                <h4>Thông tin tồn kho</h4>
                <div class="row mt-4">
                    <div class="col-md-3">
                        Tên kho hàng
                    </div>
                    <div class="col-md-2">
                        Tồn Kho
                    </div>
                    <div class="col-md-2">
                        Đang giao dịch
                    </div>
                    <div class="col-md-2">
                        Sẵn hàng bán
                    </div>
                    <div class="col-md-2">
                        SN
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        Tên kho hàng
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="product_inventory" name="product_inventory"
                            value=" {{ number_format($product->product_inventory) }}">
                    </div>
                    <div class="col-md-2">
                        <input type="text" readonly value="{{ number_format($product->product_trade) }}">

                    </div>
                    <div class="col-md-2">
                        <input type="text" readonly value="{{ number_format($product->product_available) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal" style="background:transparent; border:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32" fill="none">
                                <rect width="32" height="32" rx="4" fill="white"></rect>
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
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="table_SNS">
                                <thead>
                                    <td style="width:2%"><input type="checkbox"></td>
                                    <th style="width:5%">STT</th>
                                    <th style="width:100%">Serial number</th>
                                    <th style="width:3%"></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>1</td>
                                        <td><input class="form-control w-25" type="text" name="seri[]"></td>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 32 32" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.0606 6.66675C13.6589 6.66675 13.3333 6.99236 13.3333 7.39402C13.3333 7.79568 13.6589 8.12129 14.0606 8.12129H17.9394C18.341 8.12129 18.6667 7.79568 18.6667 7.39402C18.6667 6.99236 18.341 6.66675 17.9394 6.66675H14.0606ZM8 10.3031C8 9.90143 8.32561 9.57582 8.72727 9.57582H10.1818H21.8182H23.2727C23.6744 9.57582 24 9.90143 24 10.3031C24 10.7048 23.6744 11.0304 23.2727 11.0304H22.5455V22.6667C22.5455 24.2819 21.2158 25.5758 19.6179 25.5758H12.3452C11.9637 25.5755 11.5854 25.4997 11.2333 25.3528C10.8812 25.2059 10.5617 24.9908 10.2931 24.7199C10.0244 24.449 9.81206 24.1276 9.66816 23.7743C9.52463 23.4219 9.45204 23.0447 9.45455 22.6642V11.0304H8.72727C8.32561 11.0304 8 10.7048 8 10.3031ZM10.9091 22.6723V11.0304H21.0909V22.6667C21.0909 23.4623 20.4288 24.1213 19.6179 24.1213H12.3458C12.1562 24.1211 11.9684 24.0834 11.7934 24.0104C11.6183 23.9374 11.4595 23.8304 11.3259 23.6958C11.1924 23.5611 11.0868 23.4013 11.0153 23.2257C10.9437 23.05 10.9076 22.8619 10.9091 22.6723ZM17.9394 13.4546C18.3411 13.4546 18.6667 13.7802 18.6667 14.1819V20.9698C18.6667 21.3714 18.3411 21.6971 17.9394 21.6971C17.5377 21.6971 17.2121 21.3714 17.2121 20.9698V14.1819C17.2121 13.7802 17.5377 13.4546 17.9394 13.4546ZM14.7879 14.1819C14.7879 13.7802 14.4623 13.4546 14.0606 13.4546C13.6589 13.4546 13.3333 13.7802 13.3333 14.1819V20.9698C13.3333 21.3714 13.6589 21.6971 14.0606 21.6971C14.4623 21.6971 14.7879 21.3714 14.7879 20.9698V14.1819Z"
                                                    fill="#555555" />
                                            </svg></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary addRow">Thêm dòng</button>
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
