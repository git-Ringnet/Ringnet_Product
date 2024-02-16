<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<div class="content-wrapper1 py-2 border-bottom" style="background: none;">
    <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
        <div class="container-fluided">
            <div class="mb">
                <span class="font-weight-bold">Kho hàng</span>
                <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span class="font-weight-bold">Sản phẩm</span>
                <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">
                    {{ $title }}
                </span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0">
                <div class="dropdown">
                    <a href="{{ route('inventory.index', $workspacename) }}">
                        <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                            style="margin-right:10px;">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path
                                    d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">Trở về</span>
                        </button>
                    </a>
                </div>
                @if ($display == 1)
                    <a
                        href="{{ route('inventory.edit', ['workspace' => $workspacename, 'inventory' => $product->id]) }}">
                        <button type="button" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                class="mx-1" fill="none">
                                <path
                                    d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                    fill="white"></path>
                                <path
                                    d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                    fill="white"></path>
                                <path
                                    d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                    fill="white"></path>
                            </svg>
                            <span>Sửa</span>
                        </button>
                    </a>
                    {{-- <a href="#">
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
                    </a> --}}
                @endif
                <div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
    </div>
</div>

<section class="content-wrapper1 p-2 position-relative" style="margin-top:2px; margin-bottom: 2px;">
    <div class="d-flex justify-content-between">
        <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
            <li class="text-nav"><a class="text-secondary active" data-toggle="tab" href="#info">Thông tin</a></li>
            <li class="text-nav"><a class="text-secondary ml-4" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
            </li>
            <li class="text-nav"><a class="text-secondary ml-4" data-toggle="tab" href="#serialnumber">Serial Number</a>
            </li>
        </ul>
    </div>
</section>





<div class="content-wrapper1 px-0 py-0 editGuest" style="background: none;">
    <div class="tab-content mt-3">
        <div id="info" class="content tab-pane in active">
            <div class="bg-filter-search border-bottom-0 py-2">
                <span class="font-weight-bold text-secondary text-nav ml-3">THÔNG TIN CHUNG</span>
            </div>
            <div class="content-info">
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Tên sản phẩm</p>
                    </div>
                    <input readonly="" type="text" placeholder="Nhập thông tin" name="provide_name_display"
                        value="{{ $product->product_name }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Mã sản phẩm</p>
                    </div>
                    <input readonly="" type="text" required="" placeholder="Nhập thông tin"
                        name="provide_code" value="{{ $product->product_code }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Đơn vị tính</p>
                    </div>
                    <input readonly="" type="text" required="" placeholder="Nhập thông tin"
                        name="provide_address" value="{{ $product->product_unit }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Loại sản phẩm</p>
                    </div>
                    <input readonly="" type="text" placeholder="Nhập thông tin" name="key"
                        value="{{ $product->product_type }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Hãng</p>
                    </div>
                    <input readonly="" type="text" placeholder="Nhập thông tin" name="provide_name"
                        value="{{ $product->product_manufacturer }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Xuất xứ</p>
                    </div>
                    <input readonly="" type="text" placeholder="Nhập thông tin" name="provide_name"
                        value="{{ $product->product_origin }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Bảo hành</p>
                    </div>
                    <input readonly="" type="text" placeholder="Nhập thông tin" name="provide_name"
                        value="{{ $product->product_guarantee }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Quản lý Serial Number</p>
                    </div>
                    <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"> <input disabled
                            type="checkbox" placeholder="Nhập thông tin" name=""
                            value="" @if ($product->check_seri == 1) checked @endif>
                    </div>

                </div>
            </div>
            <div class="bg-filter-search border-bottom-0 py-2">
                <span class="font-weight-bold text-secondary text-nav ml-3">THÔNG TIN GIÁ</span>
            </div>
            <div class="content-info">
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Đơn giá bán</p>
                    </div>
                    <input type="text" placeholder="Nhập thông tin" name=""
                        value="{{ number_format($product->product_price_export) }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3" readonly>
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Đơn giá mua</p>
                    </div>
                    <input type="text" placeholder="Nhập thông tin" name=""
                        value="{{ number_format($product->product_price_import) }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3" readonly>
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Hệ số nhân</p>
                    </div>
                    <input type="text" placeholder="Nhập thông tin" name=""
                        value="{{ $product->product_ratio }}"
                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3" readonly>
                </div>
                <div class="d-flex align-items-center">
                    <div class="title-info py-2 border border-top-0 border-left-0">
                        <p class="p-0 m-0 px-3 ml-2">Thuế</p>
                    </div>
                    <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        <select disabled name="product_tax" id="" class="border-0">
                            <option value="0" @if ($product->product_tax == 0) selected @endif>0%
                            </option>
                            <option value="8" @if ($product->product_tax == 8) selected @endif>8%
                            </option>
                            <option value="10" @if ($product->product_tax == 10) selected @endif>
                                10%</option>
                            <option value="99" @if ($product->product_tax == 99) selected @endif>
                                NOVAT</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="history" class="tab-pane fade">
            <div class="bg-filter-search">
                <div class="row m-auto filter pt-1 pl-4">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center" "="">
                                <form action="" method="get" id="search-filter">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords" class="pr-4 w-100 input-search" value="">
                                        <span id="search-icon" class="search-icon"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </form>
                                <div class="dropdown">
                                    <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d=" M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024
                                3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579
                                13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075">
                                </path>
                                <path
                                    d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                    fill="#6D7075"></path>
                                <path
                                    d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                    fill="#6D7075"></path>
                                <path
                                    d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                    fill="#6D7075"></path>
                                </svg>
                                <span class="text-secondary mx-1"> Bộ lọc</span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#6D7075"></path>
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
            <section class="content mt-2">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th class="text-table text-secondary">Ngày mua</th>
                                <th class="text-table text-secondary">Mã đơn</th>
                                <th class="text-table text-secondary">Nhà cung cấp</th>
                                <th class="text-table text-secondary">Số lượng mua</th>
                                <th class="text-table text-secondary">Đơn giá</th>
                                <th class="text-table text-secondary">Thành tiền</th>
                                <th class="text-table text-secondary">Chiết khấu</th>
                                <th class="text-table text-secondary">Tiền thuế</th>
                                <th class="text-table text-secondary">Tổng tiền</th>
                                <th class="text-table text-secondary">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $htr)
                                <tr class="bg-white">
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
    </div>
    <div id="serialnumber" class="tab-pane fade">
        <div class="bg-filter-search">
            <div class="row m-auto filter pt-1 pl-4">
                <div class="w-100">
                    <div class="row mr-0">
                        <div class="col-md-5 d-flex align-items-center" "="">
                                <form action="" method="get" id="search-filter">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords" class="pr-4 w-100 input-search" value="">
                                        <span id="search-icon" class="search-icon"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </form>
                                <div class="dropdown">
                                    <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d=" M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024
                            3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002
                            6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075">
                            </path>
                            <path
                                d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                fill="#6D7075"></path>
                            <path
                                d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                fill="#6D7075"></path>
                            <path
                                d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                fill="#6D7075"></path>
                            </svg>
                            <span class="text-secondary mx-1"> Bộ lọc</span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                    fill="#6D7075"></path>
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
        <section class="content mt-2">
            <div class="container-fluided">
                <table class="table table-hover bg-white rounded" id="inputcontent">
                    <thead>
                        <th class="text-table text-secondary">Serial Number</th>
                        <th class="text-table text-secondary">Hóa đơn mua hàng</th>
                        <th class="text-table text-secondary">Hóa đơn bán hàng</th>
                    </thead>
                    <tbody>
                        @foreach ($history as $item)
                            @if ($item->getSerialNumber)
                                @foreach ($item->getSerialNumber as $sn)
                                    @if ($item->product_id == $sn->product_id)
                                        <tr class="bg-white">
                                            <td>{{ $sn->serinumber }}</td>
                                            <td>
                                                <div>
                                                    <a
                                                        href="{{ route('receive.edit', ['workspace' => $workspacename, 'receive' => $item->getReceive->id]) }}">
                                                        {{ $item->getReceive->id }}
                                                    </a>
                                                </div>
                                                {{ date_format(new DateTime($sn->created_at), 'd-m-Y') }}
                                            </td>
                                            <td>
                                                @if ($sn->getQuotation)
                                                    <div>
                                                        <a href="{{ route('watchDelivery', $sn->getQuotation->id) }}">
                                                            {{ $sn->getQuotation->id }}
                                                        </a>
                                                    </div>
                                                    {{ date_format(new DateTime($sn->getQuotation->created_at), 'd-m-Y') }}
                                                @endif
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





    <div id="info" class="content tab-pane in active">

    </div>
    <div id="history" class="tab-pane fade">

    </div>
    <div id="serialnumber" class="tab-pane fade">

    </div>
</div>
</div>
</div>




</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
