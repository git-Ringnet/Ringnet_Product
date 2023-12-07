<x-navbar :title="$title" activeGroup="products" activeName="editproduct"></x-navbar>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
            <span>Kho hàng / Tồn kho / {{ $title }}</span>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('ton-kho.update', $product->id) }}" method="POST">
        @method('PUT')
        @csrf
        <section class="content-header">
            <div class="container-fluided">
                <div class="d-flex">
                    {{-- Sửa --}}
                    <div>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                    fill="white" />
                            </svg>
                            <span>Sửa</span></button>
                    </div>
                    {{-- Sửa tồn kho --}}
                    <div class="ml-2">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                    fill="white" />
                            </svg>
                            <span>Sửa tồn kho</span>
                        </button>
                    </div>
                    {{-- Icon --}}
                    <div class="ml-2 btn">
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
        <section class="content-header">
            <div class="container-fluided">
                <h6>Thông tin chung</h6>
                {{-- Tên sản phẩm --}}
                <div class="row">
                    <div class="col-md-3">
                        Tên sản phảm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_name" value="{{ $product->product_name }}">
                    </div>
                </div>
                {{-- Tên sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Mã sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_code" value="{{ $product->product_code }}">
                    </div>
                </div>
                {{-- Đơn vị tính --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn vị tính
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_unit" value="{{ $product->product_unit }}">
                    </div>
                </div>
                {{-- Loại sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Loại sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_type" value="{{ $product->product_type }}">
                    </div>
                </div>
                {{-- Hãng --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hãng
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_manufacturer" value="{{ $product->product_manufacturer }}">
                    </div>
                </div>
                {{-- Xuất xứ --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Xuất xứ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_origin" value="{{ $product->product_origin }}">
                    </div>
                </div>
                {{-- Bảo hành --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Bảo hành
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_guarantee" value="{{ $product->product_guarantee }}">
                    </div>
                </div>
                {{-- Quản lý Serial Number --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Quản lý Serial Number
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" @if ($product->check_seri == 1) checked @endif name="check_seri">
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header mt-3">
            <div class="container-fluided">
                <h6>Thông tin giá</h6>
                {{-- Đơn giá bán --}}
                <div class="row">
                    <div class="col-md-3">
                        Đơn giá bán
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_price_export"
                            value="{{ $product->product_price_export }}">
                    </div>
                </div>
                {{-- Đơn giá mua --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn giá mua
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_price_import"
                            value="{{ $product->product_price_import }}">
                    </div>
                </div>
                {{-- Hệ số nhân --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hệ số nhân
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_ratio" value="{{ $product->product_ratio }}">
                    </div>
                </div>
                {{-- Thuế --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Thuế
                    </div>
                    <div class="col-md-9">
                        <select name="product_tax" id="">
                            <option value="0" @if ($product->product_tax == 0) selected @endif>0%</option>
                            <option value="8" @if ($product->product_tax == 8) selected @endif>8%</option>
                            <option value="10" @if ($product->product_tax == 10) selected @endif>10%</option>
                            <option value="99" @if ($product->product_tax == 99) selected @endif>NOVAT</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header mt-3">
            <div class="container-fluided">
                <h6>Thông tin tồn kho</h6>
                <div class="row">
                    <div class="col-md-3">
                        Tên Kho hàng
                    </div>
                    <div class="col-md-2">
                        Tồn kho
                    </div>
                    <div class="col-md-2">
                        Đang giao dịch
                    </div>
                    <div class="col-md-2">
                        Sẵn hàng bán
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>
    </form>
</div>
