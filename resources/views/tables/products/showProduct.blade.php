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
    <section class="content-header">
        <div class="container-fluided">
            <div class="d-flex">
                {{-- Sửa --}}
                @if ($display == 1)
                    <a href="{{ route('inventory.edit', $product->id) }}">
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
                    </a>
                    <a href="#">
                        <div class="mr-2">
                            <button class="btn btn-secondary" name="action" value="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                        fill="white" />
                                </svg>
                                <span>Sửa tồn kho</span></button>
                        </div>
                    </a>
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

    <hr class="mt-3">

    <section class="content-header p-0">
        <ul class="nav nav-tabs">
            <li class="active mr-2 mb-3"><a class="text-secondary" data-toggle="tab" href="#info">Thông tin</a></li>
            <li class="mr-2 mb-3"><a class="text-secondary" data-toggle="tab" href="#history">Lịch sử giao dịch</a></li>
            <li class="mr-2 mb-3"><a class="text-secondary" data-toggle="tab" href="#serialnumber">Serial Number</a>
            </li>
        </ul>
    </section>

    <div class="tab-content mt-3">
        <div id="info" class="content tab-pane in active">
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
                                        <input readonly type="text" placeholder="Nhập thông tin" name="product_name"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                            autocomplete="off" required value="{{ $product->product_name }}">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Mã sản phẩm</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_code" value="{{ $product->product_code }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Đơn vị tính</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin" name="product_unit"
                                            value="{{ $product->product_unit }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Loại sản phẩm</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_type" value="{{ $product->product_type }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Hãng</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_manufacturer" value="{{ $product->product_manufacturer }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Xuất xứ</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_origin" value="{{ $product->product_origin }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Bảo hành</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_guarantee" value="{{ $product->product_guarantee }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Quản lý Serial Number</p>
                                        </div>
                                        <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            <input disabled type="checkbox" name="check_seri"
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
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_price_export"
                                            value="{{ number_format($product->product_price_export) }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Đơn giá nhập</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_price_import"
                                            value="{{ number_format($product->product_price_import) }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Hệ số nhân</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_ratio" value="{{ $product->product_ratio }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Thuế</p>
                                        </div>
                                        <div class="border border-top-0 w-100 border-left-0 border-right-0 px-3">
                                            <select disabled name="product_tax" id=""
                                                class="w-25 form-control">
                                                <option value="0"
                                                    @if ($product->product_tax == 0) selected @endif>0%
                                                </option>
                                                <option value="8"
                                                    @if ($product->product_tax == 8) selected @endif>8%
                                                </option>
                                                <option value="10"
                                                    @if ($product->product_tax == 10) selected @endif>
                                                    10%</option>
                                                <option value="99"
                                                    @if ($product->product_tax == 99) selected @endif>
                                                    NOVAT</option>
                                            </select>
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
                                <p class="font-weight-bold ml-2 px-3 pt-3">Thông tin tồn kho</p>
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0" style="width:23%;">
                                            <p class="p-0 m-0 px-3">Tên kho hàng</p>
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <p class="p-0 m-0 px-3">Tồn kho</p>
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <p class="p-0 m-0 px-3">Đang giao dịch</p>
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <p class="p-0 m-0 px-3">Sẵn hàng</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- @foreach ($product->getProductImport as $item)
                                @dd($item->getDataProduct->getWareHouse)
                                @endforeach --}}
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0" style="width:23%;">
                                            <input readonly type="text"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                value="Tên kho hàng">
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <input readonly
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                type="text"
                                                value="{{ number_format($product->product_inventory) }}">
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <input readonly
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                type="text" value="{{ number_format($product->product_trade) }}">
                                        </div>
                                        <div class="title-info py-2 border border-left-0" style="width:20%;">
                                            <input readonly
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                type="text"
                                                value="{{ number_format($product->product_available) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div id="history" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value="">
                                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <button class="filter-btn ml-2">Bộ lọc
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="white"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content mt-2">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Ngày mua</th>
                                <th>Mã đơn</th>
                                <th>Nhà cung cấp</th>
                                <th>Số lượng mua</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Chiết khấu</th>
                                <th>Tiền thuế</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $htr)
                                <tr class="bg-white">
                                    <td><input type="checkbox"></td>
                                    <td>{{ date_format(new DateTime($htr->created_at), 'd-m-Y') }}</td>
                                    <td>
                                        @if ($htr->getQuotetion)
                                            {{ $htr->getQuotetion->quotation_number }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($htr->getQuotetion->getProvideName)
                                            {{ $htr->getQuotetion->getProvideName->provide_name_display }}
                                        @endif
                                    </td>
                                    <td>{{ number_format($htr->product_qty) }}</td>
                                    <td>
                                        @if ($htr->getQuoteImport)
                                            {{ $htr->getQuoteImport->product_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($htr->getQuoteImport)
                                            {{ $htr->getQuoteImport->price_export * $htr->product_qty }}
                                        @endif
                                    </td>
                                    <td>Chiết khấu</td>
                                    <td>
                                        @if ($htr->getQuoteImport)
                                            {{ ($htr->getQuoteImport->price_export * $htr->product_qty * $htr->getQuoteImport->product_tax) / 100 }}
                                        @endif
                                    </td>
                                    <td>Tổng tiền</td>
                                    <td>Trạng thái</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div id="serialnumber" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0 w-100">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value="">
                                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <button class="filter-btn ml-2">Bộ lọc
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="white"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Hóa đơn mua hàng</th>
                                <th>Hóa đơn bán hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                                @if ($item->getSerialNumber)
                                    @foreach ($item->getSerialNumber as $sn)
                                        @if ($item->receive_id == $sn->receive_id)
                                            <tr class="bg-white">
                                                <td>{{ $sn->serinumber }}</td>
                                                <td>
                                                    <div>
                                                        {{ $item->getQuotetion->quotation_number == null ? $item->getQuotetion->id : $item->getQuotetion->quotation_number }}
                                                    </div>

                                                    {{ date_format(new DateTime($sn->created_at), 'd-m-Y') }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
