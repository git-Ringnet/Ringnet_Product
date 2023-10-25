<x-navbar :title="$title"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="row mb-2">
            </div>
            <span>Mua hàng / Nhà cung cấp / {{ $title }}</span>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('nha-cung-cap.store') }}" method="POST">
        @csrf

        <section class="content-header">
            <div class="container-fluided">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </section>

        <section class="content-header">
            <div class="container-fluided">
                <h4>Thông tin nhà cung cấp</h4>
                <div class="row mt-3">
                    <div class="col-md-3 required-label">
                        Tên hiển thị
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_name_display" class="w-100 form-control" required>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 required-label">
                        Mã số thuế
                    </div>
                    <div class="col-md-9">
                        <input type="text" required name="provide_code" class="w-100 form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 required-label">
                        Địa chỉ
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_address" class="w-100 form-control" required>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-3">
                        Tên nhà cung cấp
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_name" class="w-100 form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        Người đại điện
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_represent" class="w-100 form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        Email
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_email" class="w-100 form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        Số điện thoại
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="provide_phone" class="w-100 form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        Địa chỉ nhận hàng
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="w-100 form-control" name="provide_address_delivery">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        Dư nợ
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" checked name="provide_debt">
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
