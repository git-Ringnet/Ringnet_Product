<x-navbar :title="$title"></x-navbar>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
            <span>Kho hàng / Tồn kho / {{ $title }}</span>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('ton-kho.store') }}" method="POST">
        @csrf

        <section class="content-header">
            <div class="container-fluided">
                <button type="submit">Thêm</button>
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
                        <input type="text" name="product_name">
                    </div>
                </div>
                {{-- Tên sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Mã sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_code">
                    </div>
                </div>
                {{-- Đơn vị tính --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn vị tính
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_unit">
                    </div>
                </div>
                {{-- Loại sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Loại sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_type">
                    </div>
                </div>
                {{-- Hãng --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hãng
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_manufacturer">
                    </div>
                </div>
                {{-- Xuất xứ --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Xuất xứ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_origin">
                    </div>
                </div>
                {{-- Bảo hành --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Bảo hành
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_guarantee">
                    </div>
                </div>
                {{-- Quản lý Serial Number --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Quản lý Serial Number
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" checked name="check_seri">
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
                        <input type="text" name="product_price_export">
                    </div>
                </div>
                {{-- Đơn giá mua --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn giá mua
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_price_import">
                    </div>
                </div>
                {{-- Hệ số nhân --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hệ số nhân
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_ratio">
                    </div>
                </div>
                {{-- Thuế --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Thuế
                    </div>
                    <div class="col-md-9">
                        <select name="product_tax" id="">
                            <option value="0">0%</option>
                            <option value="8">8%</option>
                            <option value="10">10%</option>
                            <option value="99">NOVAT</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
