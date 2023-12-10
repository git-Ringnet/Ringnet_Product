<x-navbar :title="$title" activeGroup="buy" activeName="provide"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Mua hàng</span>
                <span>/</span>
                <span><a class="text-dark" href="{{ route('provides.index') }}">Nhà cung cấp</a></span>
                <span>/</span>
                <span>Chỉnh sửa nhà cung cấp</span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('provides.update', $provide->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                    <span>Cập nhật</span>
                </button>
            </div>
        </section>
        <hr>

        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a class="text-secondary" data-toggle="tab" href="#info">Thông
                        tin</a></li>
                <li class="mr-2 mb-3"><a class="text-secondary" data-toggle="tab" href="#history">Sản phẩm đã
                        nhập</a></li>
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
                                    <p class="font-weight-bold ml-2">Thông tin chung</p>
                                    <div class="content-info">
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Tên hiển thị</p>
                                            </div>
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="provide_name_display"
                                                value="{{ old('provide_name_display') ?? $provide->provide_name_display }}"
                                                class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Mã số thuế</p>
                                            </div>
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="provide_code"
                                                value="{{ old('provide_code') ?? $provide->provide_code }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Địa chỉ</p>
                                            </div>
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="provide_address"
                                                value="{{ old('provide_address') ?? $provide->provide_address }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Key</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="key"
                                                value="{{ old('key') ?? $provide->key }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Tên nhà cung cấp</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="provide_name"
                                                value="{{ old('provide_name') ?? $provide->provide_name }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Người đại diện</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="provide_represent"
                                                value="{{ old('provide_represent') ?? $provide->provide_represent }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Email</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="provide_email"
                                                value="{{ old('provide_email') ?? $provide->provide_email }}"
                                                class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Số diện thoại </p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="provide_phone"
                                                value="{{ old('provide_phone') ?? $provide->provide_phone }}"
                                                class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Địa chỉ nhận hàng</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin"
                                                name="provide_address_delivery"
                                                value="{{ old('provide_address_delivery') ?? $provide->provide_address_delivery }}"
                                                class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Dư nợ</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin" name="provide_debt"
                                                value="{{ old('provide_debt') ?? $provide->provide_debt }}"
                                                class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
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
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search" aria-hidden="true"></i></span>
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



                @if ($provide->getAllDetail)
                    @foreach ($provide->getAllDetail as $detail)
                        <section class="content mt-2">
                            <div class="container-fluided">
                                <table class="table table-hover bg-white rounded" id="inputcontent">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn</th>
                                            <th>Số lượng nhập</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                            <th>Thuế</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detail->getProductImport)
                                            @foreach ($detail->getProductImport as $item)
                                                <tr class="bg-white">
                                                    <td>
                                                        {{ $detail->quotation_number == null ? $detail->id : $detail->quotation_number }}
                                                    </td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->price_export }}</td>
                                                    <td>{{ $item->product_total }}</td>
                                                    <td>{{ $item->product_tax }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    @endforeach
                @endif
            </div>
        </div>
    </form>
</div>
