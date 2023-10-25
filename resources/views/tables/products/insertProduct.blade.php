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
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <section class="content-header">
            <div class="container-fluided">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluided">
                <h4>Thông tin chung</h4>
                {{-- Tên sản phẩm --}}
                <div class="row mt-3">
                    <div class="col-md-3">
                        Tên sản phảm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_name" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Tên sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Mã sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_code" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Đơn vị tính --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn vị tính
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_unit" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Loại sản phẩm --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Loại sản phẩm
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_type" class="w-100 form-control">
                    </div>
                </div>
                {{-- Hãng --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hãng
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_manufacturer" class="w-100 form-control">
                    </div>
                </div>
                {{-- Xuất xứ --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Xuất xứ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_origin" class="w-100 form-control">
                    </div>
                </div>
                {{-- Bảo hành --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Bảo hành
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_guarantee" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Quản lý Serial Number --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Quản lý Serial Number
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" checked name="check_seri form-control">
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header mt-5">
            <div class="container-fluided">
                <h4>Thông tin giá</h4>
                {{-- Đơn giá bán --}}
                <div class="row mt-3">
                    <div class="col-md-3">
                        Đơn giá bán
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_price_export" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Đơn giá mua --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Đơn giá mua
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_price_import" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Hệ số nhân --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Hệ số nhân
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="product_ratio" class="w-100 form-control" required>
                    </div>
                </div>
                {{-- Thuế --}}
                <div class="row mt-1">
                    <div class="col-md-3">
                        Thuế
                    </div>
                    <div class="col-md-9">
                        <select name="product_tax" id="" class="form-control w-25">
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
