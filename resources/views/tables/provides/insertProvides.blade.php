<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Mua hàng</span>
                <span>/</span>
                <span><a class="text-dark" href="{{ route('provides.index') }}">Nhà cung cấp</a></span>
                <span>/</span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('provides.store') }}" method="POST">
        @csrf
        <section class="content-header p-0">
            <div class="container-fluided">
                <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                    <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                            fill="white"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                            fill="white"></path>
                    </svg>
                    <span>Thêm</span>
                </button>
            </div>
        </section>
        <hr>
        <section class="content">
            <div class="container-fluided">
                <div class="row">
                    <div class="col-12">
                        <div class="info-chung">
                            <p class="font-weight-bold ml-2">Thông tin chung</p>
                            <div class="content-info">
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Tên hiển thị</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin"
                                        name="provide_name_display"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Mã số thuế</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="provide_code"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Địa chỉ</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="provide_address"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Tên nhà cung cấp</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_name"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Người đại diện</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_represent"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Email</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_email"
                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Số diện thoại </p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_phone"
                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Địa chỉ nhận hàng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_address_delivery"
                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Dư nợ</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="provide_debt"
                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
