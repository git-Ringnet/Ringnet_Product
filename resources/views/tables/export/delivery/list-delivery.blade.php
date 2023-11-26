<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Bán hàng</span>
                <span>/</span>
                <span class="font-weight-bold">Đơn giao hàng</span>
            </div>
            <div class="row m-0 mb-1">
                <a href="{{ route('delivery.create') }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white" />
                        </svg>
                        <span>Tạo mới</span>
                    </button>
                </a>
                <button class="btn-option">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                            fill="#42526E" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <hr class="mt-3">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="row m-auto filter pt-2 pb-4">
                        <div class="w-100">
                            <div class="row mr-0">
                                <div class="col-md-5 d-flex">
                                    <form action="" method="get" id='search-filter'>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search"></i></span>
                                        </div>
                                    </form>
                                    <div class="dropdown">
                                        <button class="filter-btn ml-2" data-toggle="dropdown">Bộ lọc
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card scroll-custom">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th><input type="checkbox" name="all" id="checkall"></th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort" type="submit">Mã giao
                                                        hàng#</button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="export_code"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Số báo
                                                        giá#</button></a>
                                                <div class="icon" id="icon-export_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Khách
                                                        hàng</button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Đơn vị
                                                        vận chuyển</button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Phí
                                                        giao hàng</button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Trạng
                                                        thái</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort" type="submit">Ngày
                                                        Giao
                                                        hàng</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($delivery as $item_delivery)
                                        <tr onclick="handleRowClick('checkbox', event);">
                                            <td class="border-top-0 bg-white"><input type="checkbox"
                                                    class="cb-element" name="ids[]" id="checkbox" value=""
                                                    onclick="event.stopPropagation();"></td>
                                            <td class="border-top-0 bg-white">
                                                {{ $item_delivery->maGiaoHang }}
                                            </td>
                                            <td class="border-top-0 bg-white">
                                                <div class="">
                                                    <a href="{{ route('watchDelivery', $item_delivery->maGiaoHang) }}"
                                                        class="duongDan">
                                                        {{ $item_delivery->quotation_number }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="border-top-0 bg-white">
                                                {{ $item_delivery->guest_name_display }}
                                            </td>
                                            <td class="text-center border-top-0 bg-white">
                                                {{ $item_delivery->shipping_unit }}
                                            </td>
                                            <td class="text-center border-top-0 bg-white">
                                                {{ number_format($item_delivery->shipping_fee) }}
                                            </td>
                                            <td class="text-center border-top-0 bg-white">
                                                @if ($item_delivery->status == 1)
                                                    <span>Chưa giao</span>
                                                @else
                                                    <span class="text-success">Đã giao</span>
                                                @endif
                                            </td>
                                            <td class="border-top-0 bg-white">
                                                {{ date_format(new DateTime($item_delivery->created_at), 'd/m/Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>

</html>
