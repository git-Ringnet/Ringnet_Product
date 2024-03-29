<x-navbar :title="$title" activeGroup="history" activeName="history" :workspacename="$workspacename"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper1 py-0">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center pl-4">
        <div class="container-fluided">
            <div class="mb-3">
                <span class="font-weight-bold">Lịch sử giao dịch</span>
            </div>
        </div>
        <div class="container-fluided">
            <div class="row m-0 mb-1">
            </div>
        </div>
    </div>
</div>
<div class="bg-filter-search pl-4">
    <div class="content-wrapper1 py-1">
        <div class="row m-auto filter pt-1">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex">
                        <form action="" method="get" id='search-filter'>
                            <div class="position-relative">
                                {{-- <input type="text" placeholder="Tìm kiếm" name="keywords"
                                    class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search"></i></span> --}}
                                <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                    class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                <span id="search-icon" class="search-icon"><i
                                        class="fas fa-search btn-submit"></i></span>
                                <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                    style="display: none;">
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                        fill="#6D7075" />
                                    <path
                                        d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                        fill="#6D7075" />
                                    <path
                                        d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                        fill="#6D7075" />
                                    <path
                                        d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-secondary mx-1"> Bộ lọc</span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#6D7075" />
                                </svg>
                            </button>
                            <div class="dropdown-menu"id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="search-container px-2">
                                    <input type="text" placeholder="Tìm kiếm" id="myInput"
                                        onkeyup="filterFunction()">
                                    <span class="search-icon"><i class="fas fa-search"></i></span>
                                </div>
                                <div class="scrollbar">
                                    <button class="dropdown-item btndropdown" id="btn-code" data-button="code"
                                        type="button">Thời gian</button>
                                    <button class="dropdown-item btndropdown" id="btn-provides" data-button="provides"
                                        type="button">Nhà cung cấp
                                    </button>
                                    <button class="dropdown-item btndropdown" id="btn-tensp" data-button="tensp"
                                        type="button">Mặt hàng</button>
                                    <button class="dropdown-item btndropdown" id="btn-product_qty"
                                        data-button="product_qty" type="button">Số lượng nhập</button>
                                    <button class="dropdown-item btndropdown" id="btn-price_import"
                                        data-button="price_import" type="button">Giá nhập</button>
                                    <button class="dropdown-item btndropdown" id="btn-guests" data-button="guests"
                                        type="button">Khách hàng</button>

                                    <button class="dropdown-item btndropdown" id="btn-guests" data-button="guests"
                                        type="button">Thành tiền nhập</button>
                                    <button class="dropdown-item btndropdown" id="btn-guests" data-button="guests"
                                        type="button">Giá bán</button>
                                    <button class="dropdown-item btndropdown" id="btn-guests" data-button="guests"
                                        type="button">Thành tiền bán</button>
                                </div>
                            </div>

                            <x-filter-checkbox :dataa='$provides' name="provides" title="Nhà cung cấp"
                                namedisplay="provide_name_display" />
                            <x-filter-checkbox :dataa='$guests' name="guests" title="Khách hàng"
                                namedisplay="guest_name_display" />
                            <x-filter-text name="tensp" title="Mặt hàng" />
                            <x-filter-compare name="product_qty" title="Số lượng nhập" />
                            <x-filter-compare name="price_import" title="Giá nhập" />
                            <x-filter-compare name="inventory" title="Số lượng tồn" />
                            <x-filter-compare name="inventory" title="Số lượng tồn" />
                            {{--   <x-filter-checkbox :dataa='$provides' name="name" title="Tên hàng hóa"
                                namedisplay="product_name" />
                            <x-filter-compare name="inventory" title="Số lượng tồn" /> --}}
                        </div>
                        <div class="filter-results d-flex m-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-wrapper1 py-1 pl-4 border-bottom">
    <div class="row m-auto filter pt-1">
        <div class="w-100">
            <div class="row mr-0">
                <div class="col-md-5 d-flex align-items-center">
                    <div class="border p-2 rounded d-flex align-items-center px-2 w-50 justify-content-between">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z"
                                fill="#6D7075" />
                        </svg>
                        <span class="text-table">Status</span>
                        <span>is</span>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                fill="#6D7075" />
                        </svg>
                        <span>Todo</span>
                        <svg width="11" height="11" viewBox="0 0 11 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.784066 0.284063C1.05865 0.0094789 1.50385 0.0094789 1.77843 0.284063L5.5 4.00531L9.22159 0.284063C9.49619 0.0094789 9.94131 0.0094789 10.2159 0.284063C10.4905 0.558648 10.4905 1.00385 10.2159 1.27843L6.49469 5L10.2159 8.72159C10.4656 8.97115 10.4882 9.36181 10.284 9.63706L10.2159 9.7159C9.94131 9.9905 9.49619 9.9905 9.22159 9.7159L5.5 5.99468L1.77843 9.7159C1.50385 9.9905 1.05865 9.9905 0.784066 9.7159C0.509482 9.44131 0.509482 8.99618 0.784066 8.72159L4.50531 5L0.784066 1.27843C0.534438 1.0288 0.51175 0.638185 0.715985 0.362926L0.784066 0.284063Z"
                                fill="#6D7075" />
                        </svg>
                    </div>
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="ml-3"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.70312 1.3125C6.70312 0.924178 6.38832 0.609375 6 0.609375C5.61168 0.609375 5.29688 0.924178 5.29688 1.3125V5.29688H1.3125C0.924178 5.29688 0.609375 5.61168 0.609375 6C0.609375 6.38832 0.924178 6.70312 1.3125 6.70312H5.29688V10.6875C5.29688 11.0758 5.61168 11.3906 6 11.3906C6.38832 11.3906 6.70312 11.0758 6.70312 10.6875V6.70312H10.6875C11.0758 6.70312 11.3906 6.38832 11.3906 6C11.3906 5.61168 11.0758 5.29688 10.6875 5.29688H6.70312V1.3125Z"
                            fill="#6D7075" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper py-0 pl-0 pr-2">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-md-12 p-0 m-0">
                    <div class="card scroll-custom">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    {{-- SortType --}}
                                    <input type="hidden" id="perPageinput" name="perPageinput"
                                        value="{{ request()->perPageinput ?? 25 }}">
                                    <input type="hidden" id="sortByInput" name="sort-by" value="">
                                    <input type="hidden" id="sortTypeInput" name="sort-type">
                                    <tr>
                                        <th scope="col" style="width:2%">
                                            <span class="d-flex align-items-center">
                                                <a href="#" class="sort-link" data-sort-by=""
                                                    data-sort-type="DESC"><button class="btn-sort"
                                                        type="submit">STT</button></a>
                                                <div class="icon" id="icon_"></div>
                                            </span>
                                        </th>
                                        {{-- <th scope="col">
                                            <span class="d-flex align-items-center" style="width:100px;">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="name"
                                                    data-sort-type="DESC"><button class="btn-sort"
                                                        type="submit">Nhân
                                                        viên</button></a>
                                                <div class="icon" id="icon-name"></div>
                                            </span>
                                        </th> --}}
                                        <th scope="col">
                                            <span class="d-flex align-items-center" style="width:110px;">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="time"
                                                    data-sort-type="DESC"><button class="btn-sort"
                                                        type="submit">Thời
                                                        gian</button></a>
                                                <div class="icon" id="icon-time"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="text-left">
                                            <span class="d-flex justify-content-start" style="width:300px;">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="tenNCC"
                                                    data-sort-type="DESC"><button class="btn-sort"
                                                        type="submit">NCC</button></a>
                                                <div class="icon" id="icon-tenNCC"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="text-left">
                                            <span class="d-flex justify-content-start" style="width:300px;">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="tensp"
                                                    data-sort-type="DESC"><button class="btn-sort" type="submit">Mặt
                                                        hàng</button></a>
                                                <div class="icon" id="icon-tensp"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-end">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="product_qty" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">SL
                                                        nhập</button></a>
                                                <div class="icon" id="icon-product_qty"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="price_import" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Giá
                                                        nhập</button></a>
                                                <div class="icon" id="icon-price_import"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-end">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="total_import" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Thành
                                                        tiền nhập</button></a>
                                                <div class="icon" id="icon-total_import"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="hdvao"
                                                    data-sort-type="DESC"><button class="btn-sort" type="submit">HĐ
                                                        vào</button></a>
                                                <div class="icon" id="icon-hdvao"></div>
                                            </span>
                                        </th>
                                        {{-- <th scope="col" class="text-center">
                                            <span class="d-flex justify-content-center align-items-center"
                                                style="width:135px;">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="import_status" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Tình
                                                        trạng nhập</button></a>
                                                <div class="icon" id="icon-import_status"></div>
                                            </span>
                                        </th> --}}
                                        <th scope="col" class="text-center">
                                            <span class="d-flex justify-content-start align-items-center"
                                                style="width:300px;">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="tenKhach" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Khách
                                                        hàng</button></a>
                                                <div class="icon" id="icon-tenKhach"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="deliver_qty" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">SL
                                                        xuất</button></a>
                                                <div class="icon" id="icon-deliver_qty"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="product_unit" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">ĐVT</button></a>
                                                <div class="icon" id="icon-product_unit"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="giaban"
                                                    data-sort-type="DESC"><button class="btn-sort" type="submit">Giá
                                                        bán</button></a>
                                                <div class="icon" id="icon-giaban"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="product_total_vat" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Thành
                                                        tiền xuất</button></a>
                                                <div class="icon" id="icon-product_total_vat"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="hdra"
                                                    data-sort-type="DESC"><button class="btn-sort" type="submit">HĐ
                                                        ra</button></a>
                                                <div class="icon" id="icon-hdra"></div>
                                            </span>
                                        </th>
                                        {{-- <th scope="col">
                                            <span class="d-flex align-items-center" style="width:135px;">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="export_status" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Tình
                                                        trạng xuất</button></a>
                                                <div class="icon" id="icon-export_status"></div>
                                            </span>
                                        </th> --}}
                                        {{-- <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="total_difference" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Lợi
                                                        nhuận</button></a>
                                                <div class="icon" id="icon-total_difference"></div>
                                            </span>
                                        </th> --}}
                                        <th scope="col">
                                            <span class="d-flex justify-content-end align-items-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="tranport_fee" data-sort-type="DESC"><button
                                                        class="btn-sort" type="submit">Chi phí
                                                        VC</button></a>
                                                <div class="icon" id="icon-tranport_fee"></div>
                                            </span>
                                        </th>
                                        {{-- <th scope="col">
                                            <span class="d-flex justify-content-start align-items-center">
                                                <a href="#" class="sort-link" data-sort-by="history_note"
                                                    data-sort-type="DESC"><button class="btn-sort"
                                                        type="submit">Ghi
                                                        chú</button></a>
                                                <div class="icon" id="icon-history_note"></div>
                                            </span>
                                        </th> --}}
                                        <th scope="col">S/N</th>
                                        <th></th>
                                    </tr>
                                    </form>
                                </thead>
                                <tbody class="history-body">
                                    @isset($history)
                                        @foreach ($history as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                {{-- <td>{{ $item->user_id }}</td> --}}
                                                <td>{{ date('d-m-Y', strtotime($item->time)) }}</td>
                                                <td>{{ $item->tenNCC }}</td>
                                                <td>{{ $item->tensp }}</td>
                                                <td>{{ number_format($item->product_qty) }}</td>
                                                {{-- Này đặt sai tên cột nha --}}
                                                <td>{{ number_format($item->price_import) }}</td>
                                                <td>{{ number_format($item->total_import) }}</td>
                                                <td>{{ $item->hdvao }}</td>
                                                {{-- <td>Tình trạng nhập</td> --}}
                                                <td>{{ $item->tenKhach }}</td>
                                                <td>{{ number_format($item->deliver_qty) }}</td>
                                                <td>{{ $item->product_unit }}</td>
                                                <td>{{ number_format($item->giaban) }}</td>
                                                <td>{{ number_format($item->product_total_vat) }}</td>
                                                <td>{{ $item->hdra }}</td>
                                                <td>{{ number_format($item->transfer_fee) }}</td>
                                                <td data-toggle="modal" data-target="#snModal"
                                                    data-delivery-id="{{ $item->delivery_id }}"
                                                    data-product-id="{{ $item->product_id }}" class="sn"><img
                                                        src="../../dist/img/icon/list.png"></td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <div class="modal fade" id="snModal" tabindex="-1" role="dialog"
                                aria-labelledby="productModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 85%;">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Serial
                                                    Number</h5>
                                                <p>Thông tin chi tiết về số S/N của mỗi sản phẩm </p>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Tên sản phẩm</th>
                                                        <th class="text-right">Số lượng sản phẩm</th>
                                                        <th class="text-right">Số lượng S/N</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="product-name"></td>
                                                        <td class="text-right product-qty"></td>
                                                        <td class="text-right qty-sn"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h3>Thông tin Serial Number </h3>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Serial Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white-sn">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="text-perpage">
                            Hiển thị:
                            <select name="perPage" id="perPage" class="border-0">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).ready(function() {
        function filterguests() {
            filterButtons("myInput-guests", "ks-cboxtags-guests");
        }

        function filterprovides() {
            filterButtons("myInput-provides", "ks-cboxtags-provides");
        }

        $('#snModal').on('hidden.bs.modal', function() {
            // Xóa nội dung của các phần tử
            $('.bg-white-sn').empty();
            $('.product-name').text('');
            $('.product-qty').text('');
            $('.qty-sn').text('');
        });

        // Khai báo biến
        var sort = [];
        var filters = [];
        var idProvides = [];
        var idGuests = [];
        var filter = [];
        var buttonNamee;
        var titlee;
        var tensp;
        var product_qty;
        var product_qty_op;
        var product_qty_val;
        var price_import;
        var price_import_op;
        var price_import_val;
        // Func ajax    
        function sendAjaxRequest(search, filters, sort, buttonName, title) {
            buttonNamee = buttonName;
            titlee = title;
            $.ajax({
                type: 'get',
                url: '{{ URL::to('searchHistory') }}',
                data: {
                    'search': search,
                    'sort': sort,
                    'filters': filters,
                },
                success: function(data) {
                    $('.history-body').html(data.output);
                    console.log(data);
                    var dataValues = {
                        guests: data.guests.join(', '),
                        provides: data.provides.join(', '),
                        tensp: data.tensp,
                        product_qty: data.product_qty,
                        price_import: data.price_import,
                    };
                    var value = dataValues[buttonName];
                    if (value !== '' && value !== null) {
                        var existingFilterItem = filter.find(item => item.name ===
                            buttonName);
                        existingFilterItem
                            ?
                            (existingFilterItem.title = title, existingFilterItem.value =
                                value) :
                            filter.push({
                                name: buttonName,
                                title: title,
                                value: value
                            });
                    } else {
                        // Xóa mục khỏi filter nếu tồn tại
                        const existingFilterIndex = filter.findIndex(item => item.name ===
                            buttonName);
                        if (existingFilterIndex !== -1) {
                            filter.splice(existingFilterIndex, 1);
                        }
                    }
                    updateFilterResults();
                }
            });
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        }

        function updateFilterResults() {
            $('.filter-results').empty();
            // Tạo và thêm các phần tử mới vào .filter-results
            filter.forEach(function(item) {
                // Kiểm tra nếu 'name' không phải là undefined
                if (item.name !== undefined) {
                    console.log(item.value);
                    var filterItemElement = $(
                        '<div class="filter-item filter-item' + item.name + '">' +
                        '<span class="filter-title">' + (item.name === 'inventory' ? item.title :
                            item
                            .title + ':') + ' </span>' +
                        '<span class="filter-value">' +
                        (item.name === 'product_qty' ? item.value[0][0] + item.value[0][1] : " " +
                            item
                            .value) +
                        '</span>' +
                        '<button class="btn-delete" data-button-name="' + item.name +
                        '"><i class="fa-solid fa-xmark"></i></button>' +
                        '</div>'
                    );

                    // Xóa item filter
                    filterItemElement.find('.btn-delete').on('click', function() {
                        var nameToDelete = $(this).data('button-name');
                        filter = filter.filter(function(item) {
                            return item.name !== nameToDelete;
                        });
                        if (nameToDelete === 'guests') {
                            $('.deselect-all-guests').click();
                            idGuests = [];
                        } else if (nameToDelete === 'provides') {
                            $('.deselect-all-provides').click();
                            idProvides = [];
                        } else if (nameToDelete === 'tensp') {
                            $('#tensp').val('');
                            tensp = '';
                        } else if (nameToDelete === 'product_qty') {
                            $('.product_qty-quantity').val('');
                            product_qty_op = '';
                            product_qty_val = '';
                            product_qty = [];
                        } else if (nameToDelete === 'price_import') {
                            $('.price_import-quantity').val('');
                            price_import_op = '';
                            price_import_val = '';
                            price_import = [];
                        }
                        updateFilterResults();
                        var search = $('#search').val();
                        filters = {
                            'idProvides': idProvides,
                            'idGuests': idGuests,
                            'tensp': tensp,
                            'product_qty': product_qty,
                            'price_import': price_import,
                        };
                        sendAjaxRequest(search, filters, sort, nameToDelete, item.title)
                        // $('.btn-submit').click();
                    });
                    // Load filter results
                    $('.filter-results').append(filterItemElement);
                }
            });
        }

        // Filter ajxx
        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault();
            var buttonName = $(this).data('button-name');
            var title = $(this).data('title');
            $('#' + buttonName + '-options').hide();
            $(".filter-btn").prop("disabled", false);

            if (buttonName === 'guests') {
                $('.ks-cboxtags-guests input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && idGuests.indexOf(value) === -1) {
                        idGuests.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = idGuests.indexOf(value);
                        if (index !== -1) {
                            idGuests.splice(index, 1);
                        }
                    }
                });
            }

            if (buttonName === 'provides') {
                $('.ks-cboxtags-provides input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && idProvides.indexOf(value) === -1) {
                        idProvides.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = idProvides.indexOf(value);
                        if (index !== -1) {
                            idProvides.splice(index, 1);
                        }
                    }
                });
            }

            // Số lượng nhập
            product_qty_op = $('.product_qty-operator').val();
            product_qty_val = $('.product_qty-quantity').val();
            product_qty = [product_qty_op, product_qty_val];
            // Giá nhập
            price_import_op = $('.price_import-operator').val();
            price_import_val = $('.price_import-quantity').val();
            price_import = [price_import_op, price_import_val];

            tensp = $('#tensp').val();
            var search = $('#search').val();
            var sort_by = 'history.id';
            // var sort_by;
            if (typeof $(this).data('sort-by') !== 'undefined') {
                sort_by = $(this).data('sort-by');
            }
            var sort_type = $(this).data('sort-type');

            sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
            $(this).data('sort-type', sort_type);
            $('.icon').text('');
            var iconId = 'icon-' + sort_by;
            var iconDiv = $('#' + iconId);
            var svgtop =
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
            var svgbot =
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"
            iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);

            sort = [
                sort_by, sort_type
            ];
            filters = {
                'idProvides': idProvides,
                'idGuests': idGuests,
                'tensp': tensp,
                'product_qty': product_qty,
                'price_import': price_import,
            };

            sendAjaxRequest(search, filters, sort, buttonName, title)
        });

        // Load SN cho từng sản phẩm
        $(document).on('click', '.sn', function(e) {
            var delivery_id = $(this).data('delivery-id');
            var product_id = $(this).data('product-id');
            console.log(delivery_id, product_id);
            $.ajax({
                type: 'get',
                url: '{{ URL::to('getSN') }}',
                data: {
                    'delivery_id': delivery_id,
                    'product_id': product_id,
                },
                success: function(data) {
                    data.serinumber.forEach(function(item, index) {
                        var newRow = $('<tr></tr>');
                        var numberCell = $('<td></td>').text(index + 1)
                        newRow.append(numberCell)
                        var serinumberCell = $('<td></td>').text(item.serinumber)
                        newRow.append(serinumberCell)
                        $('.bg-white-sn').append(newRow)
                    });
                    data.product.forEach(function(item) {
                        $('.product-name').text(item.product_name)
                        $('.product-qty').text(item.deliver_qty)
                        $('.qty-sn').text(data.serinumber.length)
                    });
                }
            });
        });
    });
</script>

</html>
