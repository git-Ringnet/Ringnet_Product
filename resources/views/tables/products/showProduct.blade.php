<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<div class="content-wrapper" style="background: none;">
    <!-- Content Header (Page header) -->

    <section class="content-header-fixed p-0 margin-250">
                <div class="content__header--inner margin-left32">
                    <div class="content__heading--left">
                        <span>Kho hàng</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                            </svg>
                        </span>
                        <span>Sản phẩm</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                            </svg>
                            <span>{{ $title }}</span>
                        </span>
                    </div>
                    <div class="d-flex content__heading--right">
                        {{-- Trở về --}}
                            <a href="{{ route('inventory.index', ['workspace' => $workspacename]) }}">
                                <button class="btn-destroy btn-light mx-2 d-flex align-items-center h-100" name="action" value="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z" fill="#6D7075"/>
                                    </svg>
                                    <span class="text-btnIner-primary ml-2">Trở về</span>
                                </button>
                            </a>
                        {{-- Sửa --}}
                        @if ($display == 1)
                            <a href="{{ route('inventory.edit', ['workspace' => $workspacename ,'inventory' => $product->id]) }}">
                                <button class="custom-btn d-flex mx-2 align-items-center h-100" name="action" value="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z" fill="white"/>
                                            <path d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z" fill="white"/>
                                            <path d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z" fill="white"/>
                                    </svg>
                                    <span class="text-btnIner-primary ml-2">Sửa</span>
                                </button>
                            </a>
                        @endif
                        {{-- Icon --}}
                            <div class="btn-option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                        fill="#42526E">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                        fill="#42526E">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                        fill="#42526E">
                                    </path>
                                </svg>
                            </div>
                    </div>
                </div>
                <section class="content-header--options p-0">
                    <ul class="header-options--nav nav nav-tabs margin-left32">
                        <li class="active">
                            <a class="text-secondary pl-3" data-toggle="tab" href="#info">Thông tin</a>
                        </li>
                        <li>
                            <a class="text-secondary" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
                        </li>
                        <li>
                            <a class="text-secondary pr-3" data-toggle="tab" href="#serialnumber">Serial Number</a>
                        </li>
                    </ul>
                </section>
    </section>
    <div class="tab-content margin-top-fixed5">
        <div id="info" class="content tab-pane in active">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin chung</p>
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13">Tên sản phẩm</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin" name="product_name"
                                            class="border w-100 height-100 py-2 border-left-0 border-right-0 px-3 text-13-black"
                                            autocomplete="off" required value="{{ $product->product_name }}" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0  margin-left32 text-13">Mã sản phẩm</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_code" value="{{ $product->product_code }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Đơn vị tính</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin" name="product_unit"
                                            value="{{ $product->product_unit }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Loại sản phẩm</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_type" value="{{ $product->product_type }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Hãng</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_manufacturer" value="{{ $product->product_manufacturer }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Xuất xứ</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_origin" value="{{ $product->product_origin }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Bảo hành</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_guarantee" value="{{ $product->product_guarantee }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 height-100 margin-left32 text-13">Quản lý Serial Number</p>
                                        </div>
                                        <div class="border border-top-0 height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                            <input disabled type="checkbox" name="check_seri"
                                                @if ($product->check_seri == 1) checked @endif>
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
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin giá</p>
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100 ">
                                            <p class="p-0 m-0 margin-left32 text-13 required-label text-danger">Đơn giá bán</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_price_export"
                                            value="{{ number_format($product->product_price_export) }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 "
                                            autocomplete="off" required>
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Đơn giá nhập</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_price_import"
                                            value="{{ number_format($product->product_price_import) }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Hệ số nhân</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_ratio" value="{{ $product->product_ratio }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile ">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Thuế</p>
                                        </div>
                                        <div class="border border-top-0 w-100 border-left-0 border-right-0 px-3 height-100 pt-2 pb-1">
                                            <select disabled name="product_tax" id=""
                                                class="w-25 text-13-black border-0" style="background-color:white;">
                                                <option value="0" 
                                                    @if ($product->product_tax == 0) selected @endif>0%
                                                </option>
                                                <option value="8"
                                                    @if ($product->product_tax == 8) selected @endif>8%
                                                </option>
                                                <option value="10"
                                                    @if ($product->product_tax == 10) selected @endif>
                                                    10%</option>
                                                <option value="99"
                                                    @if ($product->product_tax == 99) selected @endif>
                                                    NOVAT</option>
                                            </select>
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
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin tồn kho</p>
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class=" py-2 border border-left-0 height-100" style="width:27%;">
                                            <p class="p-0 m-0 margin-left32 text-13 text-left">Tên kho hàng</p>
                                        </div>
                                        <div class="py-2 border border-left-0 height-100 title-info">
                                            <p class="p-0 m-0  text-13 text-right px-2">Tồn kho</p>
                                        </div>
                                        <div class="py-2 border border-left-0 height-100 title-info">
                                            <p class="p-0 m-0 text-13 text-right px-2">Đang giao dịch</p>
                                        </div>
                                        <div class="py-2 border border-left-0 height-100 title-info">
                                            <p class="p-0 m-0 text-13 text-right px-2">Sẵn hàng</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- @foreach ($product->getProductImport as $item)
                                @dd($item->getDataProduct->getWareHouse)
                                @endforeach --}}
                                <div class="content-info mb-3">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="py-2 border border-left-0 height-100" style="width:27%;">
                                            <input readonly type="text"
                                                class="py-2 border-0  p-0 text-13-black w-100 padding-left35"
                                                value="{{($product->product_manufacturer) }}">
                                        </div>
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <input readonly
                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                type="text"
                                                value="{{ number_format($product->product_inventory) }}">
                                        </div>
                                        <div class="title-info py-2 border border-left- height-100">
                                            <input readonly
                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                type="text" value="{{ number_format($product->product_trade) }}">
                                        </div>
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <input readonly
                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                type="text"
                                                value="{{ number_format($product->product_available) }}">
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
                            <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed margin-250">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value="">
                                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <button class="btn-filter_searh mx-2" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075"/>
                                                        <path d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z" fill="#6D7075"/>
                                                        <path d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z" fill="#6D7075"/>
                                                        <path d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z" fill="#6D7075"/>
                                                    </svg>
                                                    <span class="text-btnIner">Bộc lọc</span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="#6B6F76" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content margin-top-fixed3">
                <div class="container-fluided table-responsive">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th scope="col" class="text-13 text-nowrap padding-left35">
                                    <span>Ngày báo giá</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    Số báo giá
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Khách Hàng</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Số lượng bán</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Đơn giá</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Thành tiền</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Chiết khấu</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Tiền thuế</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Tổng tiền</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Trạng thái</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $htr)
                                <tr class="bg-white">
                                    <td class="padding-left35">{{ date_format(new DateTime($htr->created_at), 'd/m/Y') }}</td>
                                    <td class="text-13-blue">
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
                                    <td class="text-success">Close</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div id="serialnumber" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed margin-250">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0 w-100">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search" value=""/>
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search"
                                                        aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <button class="btn-filter_searh mx-2" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075"/>
                                                        <path d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z" fill="#6D7075"/>
                                                        <path d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z" fill="#6D7075"/>
                                                        <path d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z" fill="#6D7075"/>
                                                    </svg>
                                                    <span class="text-btnIner">Bộc lọc</span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="#6B6F76" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content margin-top-fixed3">
                <div class="container-fluided table-responsive">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap text-13 padding-left35">Serial Number
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-nowrap text-13">Hóa đơn mua hàng
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                                <th scope="col" class="text-nowrap text-13">Hóa đơn bán hàng
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'><path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/></svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach ($history as $item)
                                @if ($item->getSerialNumber)
                                    @foreach ($item->getSerialNumber as $sn)
                                        @if ($item->product_id == $sn->product_id)
                                            <tr class="bg-white">
                                                <td class="text-14-black padding-left35 text-left" style="width: 33.34%;"> {{ $sn->serinumber }} </td>
                                                <td class= "text-14-blue text-left" style="width: 33.34%;">
                                                    <span style="display:block;" class="text-14-blue">
                                                        <a href="{{ route('receive.edit', ['workspace' => $workspacename ,'receive' => $item->getReceive->id]) }}">
                                                            {{ $item->getReceive->id }}
                                                        </a>
                                                    </span>
                                                    <span style="display:block;" class="text-14-blue">
                                                        {{ date_format(new DateTime($sn->created_at), 'd-m-Y') }}
                                                    </span>
                                                </td>
                                                <td class="text-14-blue text-left"style="width: 33.34%;">
                                                    @if ($sn->getQuotation)
                                                        <span style="display:block;" class="text-14-blue">
                                                            <a
                                                                href="{{ route('watchDelivery', $sn->getQuotation->id) }}">
                                                                {{ $sn->getQuotation->id }}
                                                            </a>
                                                        </span>
                                                        <span style="display:block;" class="text-14-blue">
                                                            {{ date_format(new DateTime($sn->getQuotation->created_at), 'd-m-Y') }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach -->
                            <tr>
                                <td class="text-13-black padding-left35 text-left" style="width: 33.34%;">SVN-01</td>
                                <td class="text-13-blue text-left"style="width: 33.34%;">
                                    <span style="display:block;" class="text-13-blue">IVN-001</span>
                                    <span style="display:block;" class="text-13-blue">11/12/2023</span>
                                </td>
                                <td class="text-13-blue text-left"style="width: 33.34%;">
                                    <span style="display:block;" class="text-13-blue">IVN-001</span>
                                    <span style="display:block;" class="text-13-blue">11/12/2023</span>
                                </td>
                            </tr>   
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
