<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
            <span>Kho hàng / Tồn kho / {{ $title }}</span>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('inventory.store',$workspacename) }}" method="POST">
        @csrf
        <section class="content-header">
            <div class="container-fluided">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </section>
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
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off"
                                        required>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Mã sản phẩm</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_code"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Đơn vị tính</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_unit"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Loại sản phẩm</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_type"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Hãng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_manufacturer"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Xuất xứ</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_origin"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Bảo hành</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_guarantee"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Quản lý Serial Number</p>
                                    </div>
                                    <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        <input type="checkbox" checked name="check_seri" class="">
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
                                        <p class="p-0 m-0 px-3">Đơn giá bán</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_price_export"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Đơn giá nhập</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_price_import"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Hệ số nhân</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="product_ratio"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Thuế</p>
                                    </div>
                                    <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        <select name="product_tax" id="" class="form-control w-25">
                                            <option value="0">0%</option>
                                            <option value="8">8%</option>
                                            <option value="10">10%</option>
                                            <option value="99">NOVAT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
</div>
