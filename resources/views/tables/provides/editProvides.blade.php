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
                                                <p class="p-0 m-0 px-3">Tên viết tắt</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="key"
                                                value="{{ old('key') ?? $provide->key }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
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
                                                <p class="p-0 m-0 px-3">Tên đầy đủ</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="provide_name"
                                                value="{{ old('provide_name') ?? $provide->provide_name }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
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
                                    <p class="font-weight-bold ml-2 px-3 pt-3">Thông tin người đại diện</p>
                                    <div class="content-info">
                                        <div class="d-flex ml-2 align-items-center">
                                            <table class="table table-hover" id="listrepesent">
                                                <thead>
                                                    <tr>
                                                        <th class="border-right border-left" style="width:23%;">Họ tên
                                                        </th>
                                                        <th class="border-right">Email</th>
                                                        <th class="border-right">Số điện thoại</th>
                                                        <th class="border-right">Địa chỉ nhận hàng</th>
                                                        <th class="border-right"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($repesent as $rp)
                                                        <tr class="bg-white">
                                                            <input type="hidden" name="repesent_id[]" value="{{$rp->id}}">
                                                            <td class="border border-top-0">
                                                                <input type="text" name="represent_name[]"
                                                                    value="{{ $rp->represent_name }}"
                                                                    class="border-0 px-3 py-2 w-75 w-100">
                                                            </td>
                                                            <td class="border border-top-0">
                                                                <input type="text" name="represent_email[]"
                                                                    value="{{ $rp->represent_email }}"
                                                                    class="border-0 px-3 py-2 w-75 w-100">
                                                            </td>
                                                            <td class="border border-top-0">
                                                                <input type="text" name="represent_phone[]"
                                                                    value="{{ $rp->represent_phone }}"
                                                                    class="border-0 px-3 py-2 w-75 w-100">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="represent_address[]"
                                                                    value="{{ $rp->represent_address }}"
                                                                    class="border-0 px-3 py-2 w-75 w-100">
                                                            </td>
                                                            <td class="border border-top-0 deleteRepesent">
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                        fill="#42526E"></path>
                                                                </svg>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <section class="content mt-2">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                id="addRowRepesent" style="margin-right:10px">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18"
                                                    height="18" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                        fill="#42526E"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                        fill="#42526E"></path>
                                                </svg>
                                                <span>Thêm dòng</span>
                                            </button>
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <svg class="mr-2" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                                        fill="white"></path>
                                                </svg>
                                                <span>Thêm hàng loạt</span>
                                            </button>
                                            <button class="btn-option">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Thông tin bán hàng --}}
                <section class="content">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-12">
                                <div class="info-chung">
                                    <p class="font-weight-bold ml-2 px-3 pt-3">Thông tin mua hàng</p>
                                    <div class="content-info">
                                        <div class="info-chung">
                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-left-0">
                                                    <p class="p-0 m-0 px-3">Tổng số đơn đã mua</p>
                                                </div>
                                                <input readonly type="text" placeholder="Nhập thông tin"
                                                    name=""
                                                    value="@if ($provide->getAllDetail) {{ $provide->getAllDetail->count() }} @endif"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                            </div>

                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-left-0">
                                                    <p class="p-0 m-0 px-3">Tổng số tiền đã thanh toán</p>
                                                </div>
                                                <input readonly type="text" placeholder="Nhập thông tin"
                                                    name=""
                                                    value="@if ($provide->getPayment && $provide->getPayment->getHistoryPayment) {{ number_format($provide->getPayment->getHistoryPayment->sum('payment')) }}@else{{ 0 }} @endif vnd"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                            </div>

                                            <div class="d-flex ml-2 align-items-center">
                                                <div class="title-info py-2 border border-left-0">
                                                    <p class="p-0 m-0 px-3">Dư nợ</p>
                                                </div>
                                                <input readonly type="text" placeholder="Nhập thông tin"
                                                    name=""
                                                    value="{{ old('provide_debt') ?? number_format($provide->provide_debt) }} vnd"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3">
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
<script src="{{ asset('/dist/js/products.js') }}"></script>
