<x-navbar :title="$title" activeGroup="sell" activeName="quote"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0 margin-250 border-bottom-0">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Bán hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">Đơn báo giá</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <a href="{{ route('detailExport.create') }}" class="activity mr-3"
                        data-name1="BG" data-des="Tạo mới">
                        <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100">
                            <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <p class="m-0 ml-1">Tạo mới</p>
                        </button>
                    </a>
                    {{-- <button type="button" class="btn-option bg-white border-0">
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
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="content-filter-all">
        <div class="bg-filter-search pl-4 border-bottom-0">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative ml-1">
                                        <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}" />
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search btn-submit"></i>
                                        </span>
                                        <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                            style="display: none;" />
                                    </div>
                                </form>
                                <div class="dropdown mx-2 filter-all">
                                    <button class="btn-filter_search" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
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
                                        <span class="text-btnIner">Bộ lọc</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="#6B6F76" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        style="z-index:">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-date"
                                                data-button="date" type="button">Ngày báo giá
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-quotenumber" data-button="quotenumber" type="button">Số báo
                                                giá
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-reference_number" data-button="reference_number"
                                                type="button">Số tham chiếu
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-guests"
                                                data-button="guests" type="button">Khách hàng
                                            </button>
                                            @can('isAdmin')
                                                <button class="dropdown-item btndropdown text-13-black" id="btn-users"
                                                    data-button="users" type="button">Người tạo
                                                </button>
                                            @endcan
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-status"
                                                data-button="status" type="button">Trạng thái
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-receive"
                                                data-button="receive" type="button">Giao hàng
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-reciept"
                                                data-button="reciept" type="button">Hoá đơn
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-pay"
                                                data-button="pay" type="button">Thanh toán
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-total"
                                                data-button="total" type="button">
                                                Tổng tiền
                                            </button>
                                        </div>
                                    </div>
                                    <x-filter-text name="reference_number" title="Số tham chiếu" />
                                    {{-- <x-filter-checkbox :dataa='$quoteExport' name="reference_number" title="Số tham chiếu"
                                        namedisplay="reference_number" /> --}}
                                    <x-filter-checkbox :dataa='$quoteExport' name="quotenumber" title="Số báo giá"
                                        namedisplay="quotation_number" />
                                    {{-- <x-filter-checkbox :dataa='$guests' name="guests" title="Khách hàng"
                                        namedisplay="guest_name_display" /> --}}
                                    <x-filter-text name="guests" title="Khách hàng" />
                                    <x-filter-checkbox :dataa='$users' name="users" title="Người tạo"
                                        namedisplay="name" />
                                    <x-filter-status name="status" key1="1" value1="Draft" color1="#858585"
                                        key2="2" value2="Approved" color2="#E8B600" key3="3"
                                        value3="Close" color3="#08AA36BF" title="Trạng thái" />
                                    <x-filter-status name="receive" key1="1" value1="Chưa giao"
                                        color1="#858585" key2="2" value2="Đã giao" color2="#08AA36BF"
                                        key3="3" value3="Một phần" color3="#E8B600" title="Giao hàng" />
                                    <x-filter-status name="reciept" key1="1" value1="Chưa tạo"
                                        color1="#858585" key2="2" value2="Chính thức" color2="#08AA36BF"
                                        key3="3" color3="#E8B600" value3="Một phần" title="Hoá đơn" />
                                    <x-filter-status name="pay" key1="1" value1="Chưa thanh toán"
                                        color1="#858585" color2="#08AA36BF" color3="#E8B600" key2="2"
                                        value2="Thanh toán đủ" key3="3" value3="Một phần"
                                        title="Thanh toán" />
                                    <x-filter-compare name="total" title="Tổng tiền" />
                                    <x-filter-date-time name="date" title="Ngày báo giá" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-75">
        <section class="content margin-250">
            <div class="container-fluided">
                <div class="row result-filter-detailExport margin-left30 my-1">
                </div>
                <div class="row">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="card">
                            <div class="outer2 text-nowrap">
                                <table id="example2" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:5%;padding-left: 2rem;"
                                                class="height-52">
                                                <input type="checkbox" name="all" id="checkall">
                                            </th>
                                            <th scope="col" class="height-52" style="width: 14%;">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="quotation_number" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Số báo giá#
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-quotation_number"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 12%;">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="reference_number" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Số tham
                                                            chiếu</button>
                                                    </a>
                                                    <div class="icon" id="icon-reference_number"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 10%;">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="ngayBG" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Ngày báo giá
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-ngayBG"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 14%;">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="guest_name_display"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">Khách
                                                            hàng</button>
                                                    </a>
                                                    <div class="icon" id="icon-guest_name_display"></div>
                                                </span>
                                            </th>
                                            @can('isAdmin')
                                                <th scope="col" class="height-52" style="width: 10%;">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link btn-submit" data-sort-by=""
                                                            data-sort-type="DESC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Người tạo
                                                            </button>
                                                        </a>
                                                        <div class="icon" id=""></div>
                                                    </span>
                                                </th>
                                            @endcan
                                            <th scope="col" class="height-52" style="width: 8%;">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Trạng
                                                            thái</button>
                                                    </a>
                                                    <div class="icon" id="icon-status"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 8%;">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_receive" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Giao hàng</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_receive"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 8%;">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_reciept" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Hóa đơn</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_reciept"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52" style="width: 8%;">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_pay" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Thanh
                                                            toán</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_pay"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="total_price" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Tổng tiền</button>
                                                    </a>
                                                    <div class="icon" id="icon-total_price"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-detailExport">
                                        @foreach ($quoteExport as $value_export)
                                            <tr class="position-relative detailExport-info height-52"
                                                data-id="{{ $value_export->maBG }}">
                                                <input type="hidden" name="id-detailExport" class="id-detailExport"
                                                    id="id-detailExport" value="{{ $value_export->maBG }}">
                                                <td class="text-13-black border-top-0 border-bottom">
                                                    <span class="margin-Right10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                            height="10" viewBox="0 0 6 10" fill="none">
                                                            <g clip-path="url(#clip0_1710_10941)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                    fill="#282A30" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1710_10941">
                                                                    <rect width="6" height="10"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span>
                                                    <input type="checkbox" class="checkall-btn p-0 m-0"
                                                        name="ids[]" id="checkbox" value=""
                                                        onclick="event.stopPropagation();">
                                                </td>
                                                <td class="text-13-black text-left border-top-0 border-bottom">
                                                    <div class="">
                                                        <a href="{{ route('seeInfo', ['id' => $value_export->maBG]) }}"
                                                            class="duongDan activity" data-name1="BG"
                                                            data-des="Xem đơn báo giá">{{ $value_export->quotation_number }}</a>
                                                    </div>
                                                </td>
                                                <td
                                                    class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                                    {{ $value_export->reference_number }}
                                                </td>
                                                <td class="text-13-black text-left border-top-0 border-bottom">
                                                    {{ date_format(new DateTime($value_export->ngayBG), 'd/m/Y') }}</td>
                                                <td
                                                    class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                    {{ $value_export->guest_name }}
                                                </td>
                                                @can('isAdmin')
                                                    <td
                                                        class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                        {{ $value_export->name }}
                                                    </td>
                                                @endcan
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($value_export->tinhTrang === 1)
                                                        <span class="text-secondary">Draft</span>
                                                    @elseif($value_export->tinhTrang === 2)
                                                        <span class="text-warning">Approved</span>
                                                    @elseif($value_export->tinhTrang === 3)
                                                        <span class="text-success">Close</span>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($value_export->status_receive === 1)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($value_export->status_receive === 3)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1699_20021)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1699_20021">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @elseif($value_export->status_receive === 2)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($value_export->status_reciept === 1)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($value_export->status_reciept === 3)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1699_20021)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1699_20021">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @elseif($value_export->status_reciept === 2)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-center border-top-0 border-bottom">
                                                    @if ($value_export->status_pay === 1)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($value_export->status_pay === 3)
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1699_20021)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                    fill="#E8B600" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1699_20021">
                                                                    <rect width="16" height="16"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @elseif($value_export->status_pay === 2)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-right border-top-0 border-bottom">
                                                    {{ number_format($value_export->total_price + $value_export->total_tax) }}
                                                </td>
                                                <td
                                                    class="position-absolute m-0 p-0 border-0 bg-hover-icon icon-center">
                                                    <div class="d-flex w-100">
                                                        <a
                                                            href="{{ route('detailExport.edit', ['detailExport' => $value_export->maBG]) }}">
                                                            <div class="m-0 px-2 py-1 mx-2 rounded activity"
                                                                data-name1="BG" data-des="Xem đơn báo giá">
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.985" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                        fill="#6C6F74" />
                                                                    <path opacity="0.979" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                        fill="#6C6F74" />
                                                                </svg>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="m-0 mx-2 rounded">
                                                                <form
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                    action="{{ route('detailExport.destroy', ['detailExport' => $value_export->maBG]) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm">
                                                                        <svg width="16" height="16"
                                                                            viewBox="0 0 16 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.936" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                                fill="#6C6F74" />
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                                fill="#6C6F74" />
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                                fill="#6C6F74" />
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                                fill="#6C6F74" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </a>
                                                    </div>
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
</div>
<div class="menu bg-hover rounded"
    style="display: none; background: #ffffff; position: absolute; width:13%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3);   border: 1px solid #ccc;">
    <a href="#" class="text-dark">
        <p class="quickAction p-2 rounded my-1 text-13-black" data-type="receive" data-toggle="modal"
            data-target="#exampleModal">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14"
                    fill="none">
                    <path
                        d="M3.78596 0.285463C3.20002 0.359682 2.50471 0.625307 1.98127 0.972963C1.63752 1.19953 1.09064 1.7464 0.852362 2.10187C0.180487 3.11359 -0.0226381 4.34406 0.289862 5.53546C0.532049 6.45343 1.19611 7.3675 2.01642 7.91437L2.35627 8.13703L2.36799 9.94171C2.37971 11.7152 2.37971 11.7503 2.46564 11.9066C2.60236 12.1644 2.73908 12.3011 2.96174 12.4105C3.14533 12.5003 3.23908 12.5159 3.67658 12.5355L4.18049 12.5589L4.2508 12.7503C4.33674 13.0003 4.72345 13.4105 4.98908 13.5433C5.78595 13.93 6.74299 13.5862 7.11408 12.7777L7.21955 12.5472H10.411H13.5985L13.7195 12.7933C14.036 13.43 14.7039 13.7933 15.3641 13.68C15.9266 13.5862 16.3445 13.2659 16.5633 12.762C16.6727 12.5081 16.6766 12.5081 16.8328 12.5081C17.2078 12.5081 17.5399 12.305 17.7313 11.9573L17.8485 11.7464L17.8602 10.2777L17.8719 8.81281L17.4578 7.66437C17.2274 7.03156 16.9969 6.43 16.9461 6.32453C16.7391 5.92218 16.3328 5.61359 15.8836 5.51984C15.7586 5.4925 15.1961 5.47687 14.45 5.47687H13.2195V4.89875C13.2195 4.23468 13.1727 4.01984 12.9695 3.75421C12.8992 3.65656 12.743 3.52765 12.6297 3.46515L12.4188 3.34796L10.3836 3.33625L8.34455 3.32453L8.25861 3.06281C7.64142 1.22296 5.73517 0.0393696 3.78596 0.285463ZM4.76642 1.10578C5.4422 1.19953 6.07892 1.4964 6.57502 1.94953C6.91486 2.25812 7.15705 2.59015 7.35627 3.02375C7.59064 3.53156 7.64924 3.8089 7.64924 4.44171C7.64533 4.92218 7.63361 5.03156 7.54377 5.33234C7.23908 6.32843 6.6258 7.04328 5.71174 7.46515C5.29377 7.66046 4.96955 7.7425 4.50861 7.76984C2.66486 7.87921 1.07892 6.46515 0.965643 4.6175C0.840643 2.53156 2.69611 0.816713 4.76642 1.10578ZM12.3055 4.2464L12.3992 4.34015L12.3914 8.02375L12.3797 11.7073L9.79767 11.7191L7.21955 11.7269L7.1297 11.512C6.92658 11.0237 6.37189 10.6175 5.83674 10.5706C5.55549 10.5433 5.20783 10.6136 4.93439 10.7542C4.68439 10.8792 4.40314 11.1878 4.26642 11.4769L4.14533 11.7347L3.74299 11.7191C3.1258 11.6995 3.18049 11.8597 3.18049 10.0081V8.45734L3.40705 8.51203C3.77814 8.60578 4.66486 8.6214 5.07111 8.54718C6.99299 8.1839 8.39142 6.57843 8.48127 4.62531L8.5047 4.14875H10.3563H12.2078L12.3055 4.2464ZM15.8563 6.3714C16.1492 6.50812 16.2 6.59796 16.6375 7.80109L17.0477 8.9339V10.2269C17.0477 11.6605 17.0477 11.6527 16.7938 11.7073C16.6805 11.7269 16.6688 11.7191 16.5672 11.4964C16.2625 10.8284 15.5399 10.4495 14.8406 10.5941C14.282 10.7073 13.8602 11.0706 13.6531 11.6214C13.6141 11.7152 13.5945 11.7269 13.4149 11.7269H13.2195V9.01203V6.29718H14.4617C15.5828 6.29718 15.7156 6.305 15.8563 6.3714ZM6.02814 11.4886C6.25861 11.5941 6.39533 11.8089 6.41486 12.0784C6.43439 12.3636 6.38361 12.5042 6.18439 12.68C5.90705 12.9339 5.54767 12.9534 5.2508 12.7386C4.98517 12.5472 4.8797 12.223 4.98517 11.9183C5.13752 11.4612 5.59064 11.2777 6.02814 11.4886ZM15.3875 11.4417C15.5399 11.4808 15.7313 11.6605 15.8055 11.8362C16.0594 12.4105 15.5438 13.0237 14.9461 12.8597C14.368 12.7073 14.2039 11.9183 14.6727 11.5589C14.8797 11.3987 15.0945 11.3636 15.3875 11.4417Z"
                        fill="black" />
                    <path
                        d="M4.77368 3.94181L3.64868 5.0629L3.18774 4.60587C2.68774 4.10978 2.58227 4.05118 2.36743 4.16447C2.29711 4.19962 2.21508 4.28165 2.17993 4.34806C2.05883 4.58243 2.10961 4.66447 2.82055 5.36759C3.47289 6.01993 3.58618 6.09806 3.77368 6.04337C3.82446 6.02775 4.44946 5.434 5.16039 4.72306C6.55102 3.34025 6.57055 3.31681 6.46118 3.05118C6.39086 2.89103 6.27758 2.82072 6.07446 2.82072H5.89868L4.77368 3.94181Z"
                        fill="black" />
                    <path
                        d="M8.92669 6.78906C8.77825 6.91406 8.73529 7.10156 8.82122 7.26953C8.93841 7.49609 9.01263 7.50781 10.0947 7.50781C11.1767 7.50781 11.2509 7.49609 11.3681 7.26953C11.454 7.10156 11.4111 6.91406 11.2626 6.78906L11.1415 6.6875H10.0947H9.04779L8.92669 6.78906Z"
                        fill="black" />
                    <path
                        d="M5.58227 8.51953C5.32836 8.625 5.26195 8.98047 5.45727 9.17578L5.56273 9.28516H8.37523H11.1877L11.2932 9.17578C11.4495 9.02344 11.4495 8.76562 11.2932 8.61328L11.1877 8.50391L8.42211 8.49609C6.90258 8.49219 5.62523 8.50391 5.58227 8.51953Z"
                        fill="black" />
                    <path
                        d="M13.8477 6.74219C13.6602 6.84375 13.6523 6.91016 13.6484 8.00781V9.03906L13.7812 9.17188L13.9141 9.30469H15.043C16.082 9.30469 16.1758 9.29688 16.2891 9.23047C16.3633 9.18359 16.4336 9.09766 16.457 9.01953C16.5 8.89453 16.4766 8.81641 16.1875 7.99609C16.0117 7.50391 15.8242 7.04688 15.7734 6.97656C15.582 6.72656 15.4297 6.6875 14.6406 6.6875C14.1367 6.69141 13.9141 6.70312 13.8477 6.74219ZM15.2969 7.9375C15.3789 8.16406 15.457 8.37891 15.4687 8.41406C15.4883 8.48047 15.4492 8.48438 14.9805 8.48438H14.4687V7.99609V7.50391L14.8086 7.51562L15.1523 7.52734L15.2969 7.9375Z"
                        fill="black" />
                </svg>
            </span>
            <span class="title_delivery">Tạo đơn giao hàng</span>
        </p>
    </a>
    <a href="#" class="text-dark">
        <p class="quickAction p-2 rounded my-1 text-13-black" data-type="reciept" data-toggle="modal"
            data-target="#exampleModal">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <path
                        d="M16.6667 9.16667V4.16667C16.6667 3.72464 16.4911 3.30072 16.1785 2.98816C15.866 2.67559 15.442 2.5 15 2.5H4.16667C3.72464 2.5 3.30072 2.67559 2.98816 2.98816C2.67559 3.30072 2.5 3.72464 2.5 4.16667V15.8333C2.5 16.2754 2.67559 16.6993 2.98816 17.0118C3.30072 17.3244 3.72464 17.5 4.16667 17.5H8.33333"
                        stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M7.70898 12.5H8.33398" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.584 11.5146V14.1663" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M17.5007 18.333H11.7715C11.5228 18.333 11.2844 18.2342 11.1086 18.0584C10.9328 17.8826 10.834 17.6441 10.834 17.3955V13.8055C10.8341 13.5803 10.8798 13.3576 10.9682 13.1505L11.424 12.0838C11.4963 11.9149 11.6165 11.771 11.7698 11.6698C11.9231 11.5686 12.1028 11.5147 12.2865 11.5146H16.8815C17.0651 11.5147 17.2446 11.5687 17.3978 11.6699C17.5509 11.7711 17.671 11.915 17.7432 12.0838L18.1998 13.1521C18.2883 13.3592 18.334 13.582 18.334 13.8071V17.4996C18.334 17.7207 18.2462 17.9326 18.0899 18.0889C17.9336 18.2452 17.7217 18.333 17.5007 18.333Z"
                        stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M18.334 15.0003C18.334 14.7793 18.2462 14.5673 18.0899 14.4111C17.9336 14.2548 17.7217 14.167 17.5007 14.167H11.6673C11.4463 14.167 11.2343 14.2548 11.0781 14.4111C10.9218 14.5673 10.834 14.7793 10.834 15.0003"
                        stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M7.70898 9.16699H10.834" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.70898 5.9375H13.334" stroke="#26273B" stroke-opacity="0.8" stroke-width="1.15"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M5.625 6.5C5.74861 6.5 5.86945 6.46334 5.97223 6.39467C6.07501 6.32599 6.15512 6.22838 6.20242 6.11418C6.24973 5.99997 6.26211 5.87431 6.23799 5.75307C6.21388 5.63183 6.15435 5.52046 6.06694 5.43306C5.97953 5.34565 5.86817 5.28613 5.74693 5.26201C5.62569 5.23789 5.50003 5.25027 5.38582 5.29757C5.27162 5.34488 5.17401 5.42499 5.10533 5.52777C5.03666 5.63055 5 5.75139 5 5.875C5 6.04076 5.06585 6.19973 5.18306 6.31694C5.30027 6.43415 5.45924 6.5 5.625 6.5Z"
                        fill="#26273B" fill-opacity="0.8" />
                    <path
                        d="M5.625 9.83301C5.74861 9.83301 5.86945 9.79635 5.97223 9.72767C6.07501 9.659 6.15512 9.56139 6.20242 9.44718C6.24973 9.33298 6.26211 9.20731 6.23799 9.08608C6.21388 8.96484 6.15435 8.85347 6.06694 8.76606C5.97953 8.67866 5.86817 8.61913 5.74693 8.59502C5.62569 8.5709 5.50003 8.58328 5.38582 8.63058C5.27162 8.67789 5.17401 8.75799 5.10533 8.86077C5.03666 8.96355 5 9.08439 5 9.20801C5 9.37377 5.06585 9.53274 5.18306 9.64995C5.30027 9.76716 5.45924 9.83301 5.625 9.83301Z"
                        fill="#26273B" fill-opacity="0.8" />
                    <path
                        d="M5.625 13.083C5.74861 13.083 5.86945 13.0464 5.97223 12.9777C6.07501 12.909 6.15512 12.8114 6.20242 12.6972C6.24973 12.583 6.26211 12.4573 6.23799 12.3361C6.21388 12.2148 6.15435 12.1035 6.06694 12.0161C5.97953 11.9287 5.86817 11.8691 5.74693 11.845C5.62569 11.8209 5.50003 11.8333 5.38582 11.8806C5.27162 11.9279 5.17401 12.008 5.10533 12.1108C5.03666 12.2136 5 12.3344 5 12.458C5 12.6238 5.06585 12.7827 5.18306 12.8999C5.30027 13.0172 5.45924 13.083 5.625 13.083Z"
                        fill="#26273B" fill-opacity="0.8" />
                </svg>
            </span>
            <span class="title_billsale">Tạo hóa đơn</span>
        </p>
    </a>
    <a href="#" class="text-dark">
        <p class="quickAction p-2 rounded my-1 text-13-black" data-type="payorder" data-toggle="modal"
            data-target="#exampleModal">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <g clip-path="url(#clip0_5715_15670)">
                        <path
                            d="M5.71429 3.23868H4.64286C4.07454 3.23868 3.52949 3.45947 3.12763 3.85247C2.72576 4.24547 2.5 4.77849 2.5 5.33427V16.3361C2.5 16.8919 2.72576 17.4249 3.12763 17.8179C3.52949 18.2109 4.07454 18.4317 4.64286 18.4317H15.3571C15.9255 18.4317 16.4705 18.2109 16.8724 17.8179C17.2742 17.4249 17.5 16.8919 17.5 16.3361V5.33427C17.5 4.77849 17.2742 4.24547 16.8724 3.85247C16.4705 3.45947 15.9255 3.23868 15.3571 3.23868H14.2857V4.28648H15.3571C15.6413 4.28648 15.9138 4.39687 16.1148 4.59337C16.3157 4.78987 16.4286 5.05638 16.4286 5.33427V16.3361C16.4286 16.614 16.3157 16.8805 16.1148 17.077C15.9138 17.2735 15.6413 17.3839 15.3571 17.3839H4.64286C4.3587 17.3839 4.08617 17.2735 3.88524 17.077C3.68431 16.8805 3.57143 16.614 3.57143 16.3361V5.33427C3.57143 5.05638 3.68431 4.78987 3.88524 4.59337C4.08617 4.39687 4.3587 4.28648 4.64286 4.28648H5.71429V3.23868Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M11.6071 2.71479C11.7492 2.71479 11.8855 2.76998 11.986 2.86823C12.0864 2.96648 12.1429 3.09974 12.1429 3.23868V4.28648C12.1429 4.42542 12.0864 4.55868 11.986 4.65693C11.8855 4.75518 11.7492 4.81037 11.6071 4.81037H8.39286C8.25078 4.81037 8.11452 4.75518 8.01405 4.65693C7.91358 4.55868 7.85714 4.42542 7.85714 4.28648V3.23868C7.85714 3.09974 7.91358 2.96648 8.01405 2.86823C8.11452 2.76998 8.25078 2.71479 8.39286 2.71479H11.6071ZM8.39286 1.66699C7.96662 1.66699 7.55783 1.83258 7.25644 2.12733C6.95504 2.42208 6.78571 2.82185 6.78571 3.23868V4.28648C6.78571 4.70332 6.95504 5.10308 7.25644 5.39783C7.55783 5.69258 7.96662 5.85817 8.39286 5.85817H11.6071C12.0334 5.85817 12.4422 5.69258 12.7436 5.39783C13.045 5.10308 13.2143 4.70332 13.2143 4.28648V3.23868C13.2143 2.82185 13.045 2.42208 12.7436 2.12733C12.4422 1.83258 12.0334 1.66699 11.6071 1.66699H8.39286Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M6.78571 12.7622C6.90018 13.7603 7.95588 14.4686 9.56302 14.5603V15.2883H10.3697V14.5603C12.1253 14.4531 13.2143 13.6993 13.2143 12.5844C13.2143 11.6324 12.4819 11.0816 10.9281 10.7714L10.3697 10.6595V8.38305C11.2375 8.44892 11.8229 8.81055 11.9706 9.35062H13.1076C12.9792 8.39263 11.9165 7.70528 10.3697 7.62924V6.90596H9.56302V7.64421C8.06339 7.78192 7.03398 8.52555 7.03398 9.53383C7.03398 10.4044 7.78109 11.0205 9.09202 11.2804L9.5638 11.3774V13.7909C8.67515 13.6891 8.06339 13.3119 7.91566 12.7622H6.78571ZM9.40834 10.4655C8.60168 10.308 8.17089 9.97151 8.17089 9.49791C8.17089 8.9327 8.71537 8.51538 9.56302 8.40341V10.496L9.40834 10.4655ZM10.6388 11.5863C11.6342 11.7797 12.0712 12.1006 12.0712 12.6455C12.0712 13.3023 11.4324 13.74 10.3697 13.8064V11.5342L10.6388 11.5863Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M5.71429 3.23868H4.64286C4.07454 3.23868 3.52949 3.45947 3.12763 3.85247C2.72576 4.24547 2.5 4.77849 2.5 5.33427V16.3361C2.5 16.8919 2.72576 17.4249 3.12763 17.8179C3.52949 18.2109 4.07454 18.4317 4.64286 18.4317H15.3571C15.9255 18.4317 16.4705 18.2109 16.8724 17.8179C17.2742 17.4249 17.5 16.8919 17.5 16.3361V5.33427C17.5 4.77849 17.2742 4.24547 16.8724 3.85247C16.4705 3.45947 15.9255 3.23868 15.3571 3.23868H14.2857V4.28648H15.3571C15.6413 4.28648 15.9138 4.39687 16.1148 4.59337C16.3157 4.78987 16.4286 5.05638 16.4286 5.33427V16.3361C16.4286 16.614 16.3157 16.8805 16.1148 17.077C15.9138 17.2735 15.6413 17.3839 15.3571 17.3839H4.64286C4.3587 17.3839 4.08617 17.2735 3.88524 17.077C3.68431 16.8805 3.57143 16.614 3.57143 16.3361V5.33427C3.57143 5.05638 3.68431 4.78987 3.88524 4.59337C4.08617 4.39687 4.3587 4.28648 4.64286 4.28648H5.71429V3.23868Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                        <path
                            d="M11.6071 2.71479C11.7492 2.71479 11.8855 2.76998 11.986 2.86823C12.0864 2.96648 12.1429 3.09974 12.1429 3.23868V4.28648C12.1429 4.42542 12.0864 4.55868 11.986 4.65693C11.8855 4.75518 11.7492 4.81037 11.6071 4.81037H8.39286C8.25078 4.81037 8.11452 4.75518 8.01405 4.65693C7.91358 4.55868 7.85714 4.42542 7.85714 4.28648V3.23868C7.85714 3.09974 7.91358 2.96648 8.01405 2.86823C8.11452 2.76998 8.25078 2.71479 8.39286 2.71479H11.6071ZM8.39286 1.66699C7.96662 1.66699 7.55783 1.83258 7.25644 2.12733C6.95504 2.42208 6.78571 2.82185 6.78571 3.23868V4.28648C6.78571 4.70332 6.95504 5.10308 7.25644 5.39783C7.55783 5.69258 7.96662 5.85817 8.39286 5.85817H11.6071C12.0334 5.85817 12.4422 5.69258 12.7436 5.39783C13.045 5.10308 13.2143 4.70332 13.2143 4.28648V3.23868C13.2143 2.82185 13.045 2.42208 12.7436 2.12733C12.4422 1.83258 12.0334 1.66699 11.6071 1.66699H8.39286Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                        <path
                            d="M6.78571 12.7622C6.90018 13.7603 7.95588 14.4686 9.56302 14.5603V15.2883H10.3697V14.5603C12.1253 14.4531 13.2143 13.6993 13.2143 12.5844C13.2143 11.6324 12.4819 11.0816 10.9281 10.7714L10.3697 10.6595V8.38305C11.2375 8.44892 11.8229 8.81055 11.9706 9.35062H13.1076C12.9792 8.39263 11.9165 7.70528 10.3697 7.62924V6.90596H9.56302V7.64421C8.06339 7.78192 7.03398 8.52555 7.03398 9.53383C7.03398 10.4044 7.78109 11.0205 9.09202 11.2804L9.5638 11.3774V13.7909C8.67515 13.6891 8.06339 13.3119 7.91566 12.7622H6.78571ZM9.40834 10.4655C8.60168 10.308 8.17089 9.97151 8.17089 9.49791C8.17089 8.9327 8.71537 8.51538 9.56302 8.40341V10.496L9.40834 10.4655ZM10.6388 11.5863C11.6342 11.7797 12.0712 12.1006 12.0712 12.6455C12.0712 13.3023 11.4324 13.74 10.3697 13.8064V11.5342L10.6388 11.5863Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                    </g>
                    <defs>
                        <clipPath id="clip0_5715_15670">
                            <rect width="20" height="20" rx="4" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span class="title_payment">Tạo đơn thanh toán</span>
        </p>
    </a>
</div>
{{-- Modal --}}
<form action="#" method="POST" id="quickAction" onsubmit="">
    @csrf
    <input type="hidden" id="id_export" name="detailexport_id">
    <input type="hidden" name="action" id="getAction">
    <input type="hidden" name="pdf_export" id="pdf_export">
    <input type="hidden" name="redirect">
    <input type="hidden" name="_method" value="">
    <div id="selectedSerialNumbersContainer"></div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%;">
            <div class="modal-content">
                <div class="header-modal">
                </div>
                <div class="modal-body p-0 pb-2">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal seri --}}
    <div id="list_modal">
        <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                        <div class="d-flex align-items-center">
                            <button type="button"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 btnclose"
                                data-dismiss="modal">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="ml-2">Hủy</span>
                            </button>
                            <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100 check-seri"
                                data-dismiss="">
                                <div class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    <span class="ml-2">Xác nhận</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body px-0 pb-4 pt-0 m-0">
                        <table id="table_SNS" class="w-100 hover-tr-table">
                            <thead>
                                <tr>
                                    <th class="border border-right-0 pl-3 py-1 border-top-0 border-checkbox">
                                        <input type="checkbox">
                                    </th>
                                    <th class="border border-right-0 border-top-0 border-left-0 py-1 text-secondary">
                                        STT</th>
                                    <th class="border border-left-0 border-top-0 py-1 text-secondary">Serial
                                        number</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script src="{{ asset('/dist/js/export.js') }}"></script>

<script>
    var selectedSerialNumbers = [];
    $(document).ready(function() {
        var menu = $('.menu'); //get the menu
        $(document).on('contextmenu', '.detailExport-info', function(e) {
            // Chặn click trình duyệt
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('getListExport') }}",
                type: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data.receive) {
                        $('.menu').find('p[data-type="receive"]').hide()
                    } else if (!data.receive) {
                        $('.menu').find('p[data-type="receive"]').show()
                    }
                    if (data.reciept) {
                        $('.menu').find('p[data-type="reciept"]').hide()
                    } else if (!data.reciept) {
                        $('.menu').find('p[data-type="reciept"]').show()
                    }
                    if (data.payment) {
                        $('.menu').find('p[data-type="payorder"]').hide()
                    } else if (!data.payment) {
                        $('.menu').find('p[data-type="payorder"]').show()
                    }
                    if (data.title_payment) {
                        $('.menu .title_payment').text(data.title_payment)
                    } else {
                        $('.menu .title_payment').text("Tạo thanh toán")
                    }
                    if (!data.receive || !data.reciept || !data.payment) {
                        menu.css({
                            display: 'block',
                            top: e.pageY,
                            left: e.pageX
                        });
                    } else {
                        menu.css({
                            display: 'none',
                        });
                    }
                }
            })
            $(document).off('click', '.quickAction').on('click', '.quickAction', function() {
                $('#quickAction #exampleModal .modal-content .modal-body')
                    .empty();
                $('#quickAction #exampleModal .modal-content .header-modal')
                    .empty();
                var type = $(this).data('type');
                if (type && id) {
                    if (type == "receive") {
                        $.ajax({
                            url: "{{ route('getDataExport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                if (data.status) {
                                    $('#id_export').val(id)
                                    $('#listProduct tbody').empty();
                                    var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận giao hàng</h5>
                                        <div class="d-flex">
                                            <a href="#">
                                                <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                                    style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                                    <span class="ml-2">Hủy</span>
                                                </button>
                                            </a>

                                            <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 dropdown-toggle">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#" id="pdf-link">Xuất PDF</a>
                            </div>
                        </div>

                                            <a href="#" data-type="delivery" onclick="getActionForm(this)" id="luuNhap">
                                                <button name="action" value="1" type="submit"
                                                    class="btn-destroy mx-1 d-flex align-items-center h-100" style="margin-right:5px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                                        viewBox="0 0 12 14" fill="none" class="mr-1">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                                            fill="#919397"></path>
                                                    </svg>
                                                    <p class="m-0 ml-1">Lưu nháp</p>
                                                </button>
                                            </a>

                                            <a href="#" data-type="delivery" onclick="getActionForm(this)" id="giaoHang">
                                                <button name="action" value="2" type="submit"
                                                    class="custom-btn d-flex align-items-center h-100">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                            fill="white"></path>
                                                    </svg>
                                                    <p class="m-0 ml-1">Xác nhận</p>
                                                </button>
                                            </a>
                                        </div>
                                    </div>`;
                                    $('#quickAction #exampleModal .modal-content .header-modal')
                                        .append(header);

                                    var body = `
                                    <div class="d-flex">
                                        <div class="content-left" style="width:70%;">
                                            <p class="font-weight-bold text-uppercase info-chung--modal text-center">THÔNG TIN SẢN
                                                PHẨM</p>

                                        <table id="listProduct" class="table table-hover bg-white rounded">
                                            <thead>
                                                <th class="border">
                                                    <span class="text-table">Tên sản phẩm</span>
                                                </th>
                                                <th class="border text-right" style="width: 25%;">
                                                    <span class="text-table">Số lượng</span>
                                                </th>
                                                <th class="border" style="width: 20%;">
                                                    <span class="text-table">Quản lý SN</span>
                                                </th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="content right" style="width:30%;">
                                            <p class="font-weight-bold text-uppercase info-chung--modal text-center border-left">
                                               THÔNG TIN KHÁCH HÀNG    
                                            </p>
                                            <div class="d-flex justify-content-between py-1 px-1 border align-items-center text-left text-nowrap position-relative"
                                                style="height:50px;">

                                                <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>

                                                <span class="mx-1 text-13" style="flex: 2;">
                                                    <input type="text" placeholder="Chọn thông tin"
                                                        class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                                                        style="border-radius:4px;" autocomplete="off" readonly=""
                                                        name="quotation_number">
                                                </span>
                                            </div>

                                            <div class="d-flex justify-content-between py-1 px-1 border align-items-center text-left text-nowrap position-relative"
                                                style="height:50px;">

                                                <span class="text-13 btn-click" style="flex: 1.5;">Khách hàng</span>

                                                <span class="mx-1 text-13" style="flex: 2;">
                                                    <input type="text" placeholder="Chọn thông tin"
                                                        class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                                                        style="border-radius:4px;" autocomplete="off" readonly=""
                                                        name="guest_name">
                                                    <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                                                    <input type="hidden" class="idGuest" autocomplete="off" name="code_delivery">
                                                </span>
                                            </div>

                                            <div class="d-flex justify-content-between py-1 px-1 border align-items-center text-left text-nowrap position-relative"
                                                style="height:50px;">

                                                <span class="text-13 btn-click" style="flex: 1.5;">Ngày giao hàng</span>
                                                    <input type="text" placeholder="Nhập thông tin"
                                                        class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input"
                                                        style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker" readonly="readonly">
                                                    <input id="hiddenDateInput" type="hidden" value="{{ date('Y-m-d') }}"
                                                        name="date_deliver">
                                            </div>
                                        </div>
                                    </div>`;
                                    $('#quickAction #exampleModal .modal-content .modal-body')
                                        .append(body);
                                    $("input[name='quotation_number']").val(data
                                        .quotation_number)
                                    $("input[name='guest_name']").val(data
                                        .guest_name)
                                    $("input[name='guest_id']").val(data
                                        .guest_id)
                                    $("input[name='code_delivery']").val('GH-' + (
                                        data.lastDeliveryId + 1))
                                    $.each(data.product, function(productId,
                                        productData) {
                                        var tr = `
                                            <tr class="bg-white addProduct" id="dynamic-row-` + productData
                                            .maSP + `">
                                                <td class="border border bg-white align-top text-13-black">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="hidden" class="product_id" value="` + productData
                                            .maSP + `" autocomplete="off" name="product_id[]">
                                                        <input name="product_name[]" value="` + productData
                                            .product_name +
                                            `" class="searchProductName w-100 border-0 px-2 py-1 bg-input-guest product_name" readonly>
                                                        <div class="info-product" data-toggle="modal" data-target="#productModal"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">                                     
                                                                <g clip-path="url(#clip0_2559_39956)">                                         
                                                                <path d="M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z" fill="#282A30"></path>                                         <path d="M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z" fill="#282A30"></path>                                         <path d="M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z" fill="#282A30"></path>                                     </g>                                     <defs>                                         <clipPath id="clip0_2559_39956">                                             <rect width="14" height="14" fill="white"></rect>                                         </clipPath>                                     </defs>                                 
                                                            </svg>                             
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border border bg-white align-top text-13-black text-right">
                                                    <div class="d-flex justify-content-between">
                                                        <input class="quantity-input w-100 border-0 px-2 py-1 bg-input-guest text-right" type="text" name="product_qty[]" value="` +
                                            formatCurrency(productData
                                                .product_qty) +
                                            `" readonly>
                                                    </div>
                                                    <p class="mt-3 text-13-blue inventory ${productData.type == 2 ? "d-none" : 'd-block'}">Tồn kho: <span class="soTonKho">${formatNumber(productData.product_inventory == null ? 0 : productData.product_inventory)}</span></p>
                                                </td>
                                                <td class="text-center d-none">
                                                    <input class="check-add-sn" data-seri="${productData.maSP}" type="checkbox" name="cbSeri[]" value="1" ${productData.check_seri == 1 ? 'checked' : ''}>    
                                                </td>
                                                <td class="border text-center border bg-white align-top text-13-black">
                                                    <a class="open-modal-btn" href="#" data-target="#exampleModal0" data-toggle="modal">
                                                    <div class="sn--modal pt-2">
                                                    <span class="border-span--modal">SN</span>
                                                    </div>
                                                </a>
                                                </td>
                                                <td class="border border bg-white align-top text-13-black text-right d-none">
                                                    <input type="hidden" class="product_tax" value="` + productData
                                            .product_tax + `" name="product_tax[]">
                                                    <input type="hidden" value="` + productData.price_export + `" class="text-right border-0 px-2 py-1 w-100 product_price" autocomplete="off" name="product_price[]" required="">
                                                </td>
                                                <td style="display:none;"><input type="text" class="type" value="` +
                                            productData.type + `"></td>
                                            </tr>`;
                                        $('#listProduct tbody').append(tr);
                                        //Ẩn/hiện button S/N
                                        var seriPro = productData.seri_pro;
                                        if (seriPro && seriPro.length > 0 &&
                                            seriPro[0] !== null) {
                                            // Hiển thị open-modal-btn
                                            $(`#dynamic-row-${productId} .open-modal-btn`)
                                                .show();
                                        } else {
                                            // Ẩn open-modal-btn
                                            $(`#dynamic-row-${productId} .open-modal-btn`)
                                                .hide();
                                        }
                                        //Check S/N
                                        var rowId = $(this.currentTarget)
                                            .closest('tr').attr('id');
                                        var seriList = productData.seri_pro
                                            .filter(
                                                item => item !== null).join(
                                                '</li><li>');
                                        var seriProElement = $(
                                            `#dynamic-row-${productData.maSP} .seri_pro`
                                        );
                                        var rowElement = $(
                                            `#dynamic-row-${productData.maSP}`
                                        );

                                        if (seriList.length > 0) {
                                            rowElement.find(`.check-add-sn`)
                                                .prop('disabled', true);
                                            seriProElement.hide();
                                        } else {
                                            seriProElement.html(
                                                `<li>${seriList}</li>`);
                                            seriProElement.show();
                                            rowElement.find(
                                                    `.open-modal-btn`)
                                                .hide();
                                        }
                                        //Hiện SN theo sản phẩm
                                        $('.open-modal-btn').off('click')
                                            .on(
                                                'click',
                                                function() {
                                                    var trElement = $(this)
                                                        .closest('tr');
                                                    var productInput =
                                                        trElement
                                                        .find(
                                                            '.product_id');
                                                    var productId =
                                                        productInput
                                                        .val();
                                                    var selectedSerialNumbersForProduct =
                                                        selectedSerialNumbers[
                                                            productId] ||
                                                    [];
                                                    var qty_enter =
                                                        trElement
                                                        .find(
                                                            '.quantity-input'
                                                        )
                                                        .val();
                                                    $("#exampleModal0 .modal-body tbody")
                                                        .empty();

                                                    $.ajax({
                                                        url: "{{ route('getProductSeri') }}",
                                                        method: 'GET',
                                                        data: {
                                                            productId: productId,
                                                        },
                                                        success: function(
                                                            response
                                                        ) {
                                                            var currentIndex =
                                                                1;
                                                            response
                                                                .forEach(
                                                                    function(
                                                                        sn
                                                                    ) {
                                                                        var snId =
                                                                            parseInt(
                                                                                sn
                                                                                .id
                                                                            );
                                                                        var selectedSerialNumbersForProductInt =
                                                                            selectedSerialNumbersForProduct
                                                                            .map(
                                                                                function(
                                                                                    value
                                                                                ) {
                                                                                    return parseInt(
                                                                                        value
                                                                                        .serialNumberId
                                                                                    );
                                                                                }
                                                                            );
                                                                        var isChecked =
                                                                            selectedSerialNumbersForProductInt
                                                                            .includes(
                                                                                snId
                                                                            );
                                                                        var newRow = `<tr style="">
                                                                <td class="border-bottom pl-3 border-checkbox">
                                                                    <input type="checkbox" class="check-item" data-product-id-sn="${sn.product_id}" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                                                                </td>
                                                                <td class="border-bottom ">${currentIndex}</td>
                                                                <td class="border-bottom ">
                                                                    <input readonly class="form-control w-25" type="text" value="${sn.serinumber}">
                                                                </td>
                                                            </tr>`;
                                                                        currentIndex++;
                                                                        $("#exampleModal0 .modal-body tbody")
                                                                            .append(
                                                                                newRow
                                                                            );
                                                                    }
                                                                );
                                                            $("#exampleModal0 .modal-body tbody tr")
                                                                .click(
                                                                    function(
                                                                        event
                                                                    ) {
                                                                        // Kiểm tra xem phần tử được click có phải là checkbox hay không
                                                                        var checkbox =
                                                                            $(
                                                                                this
                                                                            )
                                                                            .find(
                                                                                ".check-item"
                                                                            );
                                                                        if (!
                                                                            $(event
                                                                                .target
                                                                            )
                                                                            .is(
                                                                                checkbox
                                                                            )
                                                                        ) {
                                                                            // Đảo ngược trạng thái checked của checkbox
                                                                            checkbox
                                                                                .prop(
                                                                                    "checked",
                                                                                    !
                                                                                    checkbox
                                                                                    .prop(
                                                                                        "checked"
                                                                                    )
                                                                                );
                                                                            // Trigger sự kiện change cho checkbox
                                                                            checkbox
                                                                                .trigger(
                                                                                    "change"
                                                                                );
                                                                        }
                                                                    }
                                                                );
                                                            //Thay đổi số lượng thì xóa s/n đã check
                                                            $(".quantity-input")
                                                                .on("change",
                                                                    function() {
                                                                        var quantity =
                                                                            $(
                                                                                this
                                                                            )
                                                                            .val();
                                                                        var productId =
                                                                            $(
                                                                                this
                                                                            )
                                                                            .data(
                                                                                "product-id"
                                                                            );
                                                                        var
                                                                            selectedSerialNumbersForProductInt = [];
                                                                        if (Array
                                                                            .isArray(
                                                                                selectedSerialNumbersForProduct
                                                                            )
                                                                        ) {
                                                                            selectedSerialNumbersForProductInt
                                                                                =
                                                                                selectedSerialNumbersForProduct
                                                                                .map(
                                                                                    function(
                                                                                        value
                                                                                    ) {
                                                                                        return parseInt(
                                                                                            value
                                                                                            .serialNumberId
                                                                                        );
                                                                                    }
                                                                                );
                                                                        }
                                                                        for (
                                                                            let i =
                                                                                0; i <
                                                                            selectedSerialNumbers
                                                                            .length; i++
                                                                        ) {
                                                                            if (Array
                                                                                .isArray(
                                                                                    selectedSerialNumbers[
                                                                                        i
                                                                                    ]
                                                                                ) &&
                                                                                selectedSerialNumbers[
                                                                                    i
                                                                                ]
                                                                                .length >
                                                                                0
                                                                            ) {
                                                                                selectedSerialNumbers
                                                                                    [
                                                                                        i
                                                                                    ] =
                                                                                    selectedSerialNumbers[
                                                                                        i
                                                                                    ]
                                                                                    .filter(
                                                                                        function(
                                                                                            item
                                                                                        ) {
                                                                                            return item
                                                                                                .product_id !==
                                                                                                productId;
                                                                                        }
                                                                                    );
                                                                                $('input[name="selected_serial_numbers[]"][data-product-id="' +
                                                                                        productId +
                                                                                        '"]'
                                                                                    )
                                                                                    .remove();
                                                                            }
                                                                        }
                                                                    }
                                                                );
                                                            $('.check-item')
                                                                .on('change',
                                                                    function(
                                                                        event
                                                                    ) {
                                                                        event
                                                                            .stopPropagation();
                                                                        var checkedCheckboxes =
                                                                            $(
                                                                                '.check-item:checked'
                                                                            )
                                                                            .length;
                                                                        var serialNumberId =
                                                                            $(
                                                                                this
                                                                            )
                                                                            .val();
                                                                        var productId =
                                                                            $(
                                                                                this
                                                                            )
                                                                            .data(
                                                                                'product-id-sn'
                                                                            );
                                                                        if (checkedCheckboxes >
                                                                            qty_enter
                                                                        ) {
                                                                            $(this)
                                                                                .prop(
                                                                                    'checked',
                                                                                    false
                                                                                );
                                                                        } else {
                                                                            if ($(
                                                                                    this
                                                                                )
                                                                                .is(
                                                                                    ':checked'
                                                                                )
                                                                            ) {
                                                                                if (!
                                                                                    selectedSerialNumbers[
                                                                                        productId
                                                                                    ]
                                                                                ) {
                                                                                    selectedSerialNumbers
                                                                                        [
                                                                                            productId
                                                                                        ] = [];
                                                                                }
                                                                                selectedSerialNumbers
                                                                                    [
                                                                                        productId
                                                                                    ]
                                                                                    .push({
                                                                                        product_id: productId,
                                                                                        serialNumberId: serialNumberId
                                                                                    });

                                                                                // Tạo một trường input ẩn mới và đặt giá trị
                                                                                var newInput =
                                                                                    $('<input>', {
                                                                                        type: 'hidden',
                                                                                        name: 'selected_serial_numbers[]',
                                                                                        value: serialNumberId,
                                                                                        'data-product-id': productId,
                                                                                    });

                                                                                // Thêm trường input mới vào container
                                                                                $('#selectedSerialNumbersContainer')
                                                                                    .append(
                                                                                        newInput
                                                                                    );
                                                                            } else {
                                                                                if (selectedSerialNumbers[
                                                                                        productId
                                                                                    ]) {
                                                                                    selectedSerialNumbers
                                                                                        [
                                                                                            productId
                                                                                        ] =
                                                                                        selectedSerialNumbers[
                                                                                            productId
                                                                                        ]
                                                                                        .filter(
                                                                                            function(
                                                                                                item
                                                                                            ) {
                                                                                                return item
                                                                                                    .serialNumberId !==
                                                                                                    serialNumberId;
                                                                                            }
                                                                                        );

                                                                                    // Xóa trường input ẩn tương ứng
                                                                                    $('input[name="selected_serial_numbers[]"][value="' +
                                                                                            serialNumberId +
                                                                                            '"]'
                                                                                        )
                                                                                        .remove();
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                );

                                                            // Xoá sự kiện click trước đó nếu có
                                                            $('.check-seri')
                                                                .off(
                                                                    'click'
                                                                )
                                                                .on('click',
                                                                    function() {
                                                                        var checkedCheckboxes =
                                                                            $(
                                                                                '.check-item:checked'
                                                                            )
                                                                            .length;
                                                                        var check_item =
                                                                            $(
                                                                                '.check-item'
                                                                            );
                                                                        if (check_item
                                                                            .length >
                                                                            0
                                                                        ) {
                                                                            if (checkedCheckboxes <
                                                                                qty_enter
                                                                            ) {
                                                                                showAutoToast
                                                                                    ('warning',
                                                                                        'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                                    );
                                                                                // Không cho phép đóng modal khi có lỗi
                                                                                return false;
                                                                            } else if (
                                                                                checkedCheckboxes ==
                                                                                qty_enter
                                                                            ) {
                                                                                // Kiểm tra xem nút được nhấn có class 'check-seri' không
                                                                                if ($(
                                                                                        this
                                                                                    )
                                                                                    .hasClass(
                                                                                        'check-seri'
                                                                                    )
                                                                                ) {
                                                                                    $(this)
                                                                                        .attr(
                                                                                            'data-dismiss',
                                                                                            'modal'
                                                                                        );
                                                                                }
                                                                            }
                                                                        } else {
                                                                            $(this)
                                                                                .attr(
                                                                                    'data-dismiss',
                                                                                    'modal'
                                                                                );
                                                                        }
                                                                    }
                                                                );
                                                        }
                                                    });
                                                });
                                        $(document).ready(function() {
                                            function checkConditions() {
                                                var
                                                    insufficientSeriProducts = [];
                                                var
                                                    invalidInventoryProducts = [];
                                                var
                                                    invalidInventorySN = [];
                                                var
                                                    sanPhamHetSN = [];

                                                $(".bg-white.addProduct")
                                                    .each(
                                                        function() {
                                                            var soTonKho =
                                                                parseFloat(
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        ".soTonKho"
                                                                    )
                                                                    .text()
                                                                );
                                                            var checkbox =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".check-add-sn"
                                                                );
                                                            var quantity =
                                                                parseFloat(
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        ".quantity-input"
                                                                    )
                                                                    .val()
                                                                );
                                                            var type =
                                                                parseFloat(
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        ".type"
                                                                    )
                                                                    .val()
                                                                );
                                                            var productNameInventory =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".product_name"
                                                                )
                                                                .val();

                                                            // Kiểm tra số lượng tồn kho
                                                            if (type !=
                                                                2) {
                                                                if (quantity >
                                                                    soTonKho
                                                                ) {
                                                                    invalidInventoryProducts
                                                                        .push(
                                                                            productNameInventory
                                                                        );
                                                                }
                                                            }

                                                            if (checkbox
                                                                .prop(
                                                                    "checked"
                                                                ) &&
                                                                checkbox
                                                                .prop(
                                                                    "disabled"
                                                                )
                                                            ) {
                                                                var quantityValue =
                                                                    parseFloat(
                                                                        $(
                                                                            this
                                                                        )
                                                                        .find(
                                                                            ".quantity-input"
                                                                        )
                                                                        .val()
                                                                    );
                                                                var productId =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        ".product_id"
                                                                    )
                                                                    .val();
                                                                var productName =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        ".product_name"
                                                                    )
                                                                    .val();

                                                                for (
                                                                    var i =
                                                                        0; i <
                                                                    quantityValue; i++
                                                                ) {
                                                                    var isSeriInputExist =
                                                                        $(
                                                                            `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                        )
                                                                        .length >
                                                                        0;

                                                                    if (!
                                                                        isSeriInputExist
                                                                    ) {
                                                                        insufficientSeriProducts
                                                                            .push(
                                                                                productName
                                                                            );
                                                                        break;
                                                                    }
                                                                }
                                                            }

                                                            if (checkbox
                                                                .prop(
                                                                    "checked"
                                                                ) &&
                                                                !
                                                                checkbox
                                                                .prop(
                                                                    "disabled"
                                                                )
                                                            ) {
                                                                if (type !=
                                                                    2
                                                                ) {
                                                                    invalidInventorySN
                                                                        .push(
                                                                            productNameInventory
                                                                        );
                                                                    sanPhamHetSN
                                                                        .push(
                                                                            productNameInventory
                                                                        );
                                                                }
                                                            }
                                                        });

                                                if (insufficientSeriProducts
                                                    .length > 0) {
                                                    showAutoToast(
                                                        'warning',
                                                        `Serial Number chưa được chọn ở các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                                    );
                                                    $('#pdf_export')
                                                        .val(0);
                                                    return false;
                                                } else if (
                                                    invalidInventoryProducts
                                                    .length > 0) {
                                                    showAutoToast(
                                                        'warning',
                                                        "Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                        invalidInventoryProducts
                                                        .join(
                                                            ', '
                                                        ));
                                                    $('#pdf_export')
                                                        .val(0);
                                                    return false;
                                                } else if (
                                                    invalidInventorySN
                                                    .length > 0) {
                                                    showAutoToast(
                                                        'warning',
                                                        `Số lượng "seri" đã hết cho các sản phẩm: ${sanPhamHetSN.join(", ")}`
                                                    );
                                                    $('#pdf_export')
                                                        .val(0);
                                                    return false;
                                                }

                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct')
                                                    .each(
                                                        function() {
                                                            var productName =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_name'
                                                                )
                                                                .val();
                                                            var productUnit =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_unit'
                                                                )
                                                                .val();
                                                            var productQty =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.quantity-input'
                                                                )
                                                                .val();

                                                            if (productName ===
                                                                '' ||
                                                                productUnit ===
                                                                '' ||
                                                                productQty ===
                                                                ''
                                                            ) {
                                                                allFieldsFilled
                                                                    =
                                                                    false;
                                                                return false;
                                                            }
                                                        });

                                                if (!
                                                    allFieldsFilled
                                                ) {
                                                    showAutoToast(
                                                        'warning',
                                                        'Vui lòng điền đủ thông tin sản phẩm'
                                                    );
                                                    return false;
                                                }

                                                $('.check-add-sn:checked[disabled]')
                                                    .prop(
                                                        'disabled',
                                                        false);
                                                return true;
                                            }
                                            //Kiểm tra đã thêm seri chưa
                                            $('#luuNhap').off(
                                                'click').on(
                                                'click',
                                                function(e) {
                                                    if (!
                                                        checkConditions()
                                                    ) {
                                                        e
                                                            .preventDefault();
                                                    }
                                                });
                                            $('#giaoHang').off(
                                                'click').on(
                                                'click',
                                                function(e) {
                                                    if (!
                                                        checkConditions()
                                                    ) {
                                                        e
                                                            .preventDefault();
                                                    }
                                                });
                                            $("#pdf-link").click(
                                                function(
                                                    event) {
                                                    event
                                                        .preventDefault();
                                                    $("#pdf_export")
                                                        .val(1);
                                                    if (
                                                        checkConditions()
                                                    ) {
                                                        getActionForm
                                                            (document
                                                                .querySelector(
                                                                    "#luuNhap"
                                                                )
                                                            );
                                                        $("#quickAction")
                                                            .submit();
                                                    }
                                                });
                                        });
                                    })
                                }
                                flatpickr("#datePicker", {
                                    locale: "vn",
                                    dateFormat: "d/m/Y",
                                    defaultDate: new Date(),
                                    onChange: function(selectedDates,
                                        dateStr, instance) {
                                        // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                                        document.getElementById(
                                                "hiddenDateInput")
                                            .value = instance
                                            .formatDate(selectedDates[
                                                    0],
                                                "Y-m-d");
                                    }
                                });
                            }
                        })
                    } else if (type == "reciept") {
                        $.ajax({
                            url: "{{ route('getDataExport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                if (data.status) {
                                    $('#id_export').val(id)

                                    var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận hóa đơn</h5>
                                        <div class="d-flex">
                                            <a href="#">
                                                <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                                    style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                                    <span class="ml-2">Hủy</span>
                                                </button>
                                            </a>

                                            <a href="#" data-type="reciept" onclick="getActionForm(this)">
                                                <button name="action" type="submit"
                                                    class="custom-btn d-flex align-items-center h-100" value="2">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                            fill="white"></path>
                                                    </svg>
                                                    <p class="m-0 ml-1">Xác nhận</p>
                                                </button>
                                            </a>
                                        </div>
                                    </div>`;
                                    $('#quickAction #exampleModal .modal-content .header-modal')
                                        .append(header);
                                    var body = `
                                    <div class="content-left">
                                        <p class="font-weight-bold text-uppercase info-chung--modal text-center">THÔNG TIN</p>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                            style="border-radius:4px;" autocomplete="off" readonly="" name="quotation_number">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Khách hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Chọn thông tin"
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                                            style="border-radius:4px;" autocomplete="off" readonly="" name="guest_name">
                                            <input type="hidden" name="guest_id" value="">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Số hóa đơn</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Nhập thông tin" required
                                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                                            style="border-radius:4px;" autocomplete="off" name="number_bill">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                        style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Ngày nhận hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                            <input type="text" placeholder="Nhập thông tin"
                                            class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                            style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker1" readonly="readonly">
                                            <input id="hiddenDateInput1" type="hidden" value="{{ date('Y-m-d') }}" name="date_bill">
                                        </span>
                                        </div>
                                    </div>`;
                                    $('#quickAction #exampleModal .modal-content .modal-body')
                                        .append(body);

                                    $("input[name='quotation_number']").val(data
                                        .quotation_number)
                                    $("input[name='guest_name']").val(data
                                        .guest_name)
                                    $("input[name='guest_id']").val(data
                                        .guest_id)
                                    $('input[name="number_bill"]').val('SHD-' + (
                                        data.lastDeliveryId + 1));

                                    data.product.forEach((element, index) => {
                                        var input = `
                                        <tr>
                                            <input type="hidden" name="product_id[]" value="` + element
                                            .product_id + `">
                                            <input type="hidden" name="product_name[]" value="` + element
                                            .product_name + `">
                                            <input type="hidden" name="product_price[]" value="` + element
                                            .price_export + `">
                                            <input type="hidden" name="product_tax[]" value="` + element
                                            .product_tax + `">
                                            <input type="hidden" name="product_qty[]" value="` + element
                                            .soLuongHoaDon + `">
                                            </tr>`;
                                        $('#quickAction #exampleModal .content-left')
                                            .append(input);
                                    })
                                }

                                flatpickr("#datePicker1", {
                                    locale: "vn",
                                    dateFormat: "d/m/Y",
                                    defaultDate: new Date(),
                                    onChange: function(selectedDates,
                                        dateStr, instance) {
                                        // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                                        document.getElementById(
                                                "hiddenDateInput1")
                                            .value = instance
                                            .formatDate(selectedDates[
                                                    0],
                                                "Y-m-d");
                                    }
                                });
                            }
                        })
                    } else if (type == "payorder") {
                        $.ajax({
                            url: "{{ route('getDataExport') }}",
                            type: "get",
                            data: {
                                type: type,
                                id: id
                            },
                            success: function(data) {
                                if (data.status) {
                                    $('#id_export').val(id)
                                    var header = `
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 16px;">Xác nhận thanh toán
                                        </h5>
                                    <div class="d-flex">
                                    <a href="#">
                                        <button type="button"
                                            class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                            style="margin-right:10px" data-dismiss="modal" aria-label="Close">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                            <span class="ml-2">Hủy</span>
                                        </button>
                                    </a>
                                    <a href="#" data-id="${data.payTT}" data-type="${data.thanhToan == 1 ? 'thanhToan' : 'payorder'}" onclick="getActionForm(this)">
                                        <button name="action" value="${data.thanhToan == 1 ? 'action_1' : 'action_2'}" type="submit"
                                            class="custom-btn d-flex align-items-center h-100">
                                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 14 14" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                    fill="white"></path>
                                            </svg>
                                            <p class="m-0 ml-1">Xác nhận</p>
                                        </button>
                                    </a>
                                    </div>
                                </div>`;
                                    $('#quickAction #exampleModal .modal-content .header-modal')
                                        .append(header);
                                    var body = `
                                    <div class="content-left">
                                        <p class="font-weight-bold text-uppercase info-chung--modal text-center">THÔNG TIN</p>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin"
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                    style="border-radius:4px;" autocomplete="off" readonly=""
                                                    name="quotation_number">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Khách hàng</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin"
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                                    style="border-radius:4px;" autocomplete="off" readonly=""
                                                    name="guest_name">
                                                <input type="hidden" readonly=""
                                                    name="guest_id">
                                                <input type="hidden" readonly=""
                                                    name="code_payment">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Tổng tiền</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin" readonly
                                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="total"
                                                    style="border-radius:4px;" autocomplete="off" name="total">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Hạn thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                                    style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker2"
                                                    readonly="readonly">
                                                <input id="hiddenDateInput2" type="hidden" value="{{ date('Y-m-d') }}"
                                                    name="date_pay">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Ngày thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-100 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input active"
                                                    style="flex:2;" value="{{ date('Y-m-d') }}" id="datePicker3"
                                                    readonly="readonly">
                                                <input id="hiddenDateInput3" type="hidden" value="{{ date('Y-m-d') }}"
                                                    name="payment_day">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Hình thức thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <select name="payment_type" id="" class="border-0 text-13"
                                                    style="width:55%;">
                                                    <option value="Tiền mặt">Tiền mặt</option>
                                                    <option value="UNC">UNC</option>
                                                </select>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Đã thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input readonly="" type="text" placeholder="Chọn thông tin" name="daThanhToan"
                                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 daThanhToan"
                                                    style="flex:2;" value="">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Dư nợ</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input type="text" placeholder="Chọn thông tin" id="debt" required=""
                                                    class="text-danger w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                                    style="flex:2;" value="" readonly>
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;">Thanh toán</span>
                                            <span class="mx-1 text-13" style="flex: 2;">
                                                <input id="prepayment" type="text" placeholder="Nhập thông tin"
                                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 payment_input"
                                                    style="flex:2; background-color:#F0F4FF;" name="payment">
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between py-1 px-3 border align-items-center text-left text-nowrap position-relative"
                                            style="height:50px;">
                                            <span class="text-13 btn-click" style="flex: 1.5;"></span>
                                            <span class="mx-1 text-13 d-flex align-items-center" style="flex: 2;">
                                                <input type="checkbox" name="payment_all" onclick="cbPayment(this)"> 
                                                <span class="text-13 btn-click ml-2">Thanh toán đủ : <span class="payment_all"> </span></span>
                                            </span>
                                        </div>
                                     </div>`;
                                    $('#quickAction #exampleModal .modal-content .modal-body')
                                        .append(body);
                                    data.product.forEach((element, index) => {
                                        var input = `
                                    <input type="hidden" name="product_name[]" value="` + element
                                            .product_name + `">
                                            <input type="hidden" name="product_price[]" value="` + element
                                            .price_export + `">
                                        <input type="hidden" name="product_tax[]" value="` + element
                                            .product_tax + `">
                                        <input type="hidden" name="product_id[]" value="` + element
                                            .product_id + `">
                                        <input type="hidden" name="product_qty[]" value="` + formatCurrency(element
                                                .product_qty) + `">
                                            `;
                                        $('#quickAction #exampleModal .content-left')
                                            .append(input);
                                    })
                                    getDate(2)
                                    getDate(3)
                                    var debt = Math.round(data
                                        .tongTienNo - data.tongThanhToan)
                                    $("input[name='quotation_number']").val(data
                                        .quotation_number)
                                    $("input[name='guest_name']").val(data
                                        .guest_name)
                                    $("input[name='guest_id']").val(data
                                        .guest_id)
                                    $("input[name='code_payment']").val('MTT-' + (
                                        data
                                        .lastDeliveryId +
                                        1))
                                    $("#total").val(formatCurrency(Math.round(
                                        parseFloat(data.tongTienNo))));
                                    $(".daThanhToan").val(formatCurrency(Math.round(
                                        data
                                        .tongThanhToan)))
                                    $("#debt").val(formatCurrency(debt))
                                    $(".payment_all").text(formatCurrency(debt))
                                    $('#prepayment').on('input', function() {
                                        checkQty(this, debt)
                                    })
                                }
                            }
                        })
                    }
                }
            })
        });
        $(document).click(function() {
            menu.css({
                display: 'none'
            });
        });
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    });

    function getDate(number) {
        flatpickr("#datePicker" + number, {
            locale: "vn",
            dateFormat: "d/m/Y",
            defaultDate: new Date(),
            onChange: function(selectedDates, dateStr, instance) {
                // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
                updateHiddenInput(selectedDates[0], instance, "hiddenDateInput" + number);
            },
            onReady: function(selectedDates, dateStr, instance) {
                updateHiddenInput(selectedDates[0], instance, "hiddenDateInput" + number);
            },
        });
    }

    function updateHiddenInput(selectedDate, instance, hiddenInputId) {
        // Lấy thời gian hiện tại
        var currentTime = new Date();

        // Cập nhật giá trị của trường ẩn với thời gian hiện tại và ngày đã chọn
        var selectedDateTime = new Date(selectedDate);
        selectedDateTime.setHours(currentTime.getHours());
        selectedDateTime.setMinutes(currentTime.getMinutes());
        selectedDateTime.setSeconds(currentTime.getSeconds());

        document.getElementById(hiddenInputId).value = instance.formatDate(selectedDateTime, "Y-m-d H:i:S");
    }

    function getActionForm(e) {
        var type = $(e).data('type');
        $('#getAction').val($(e).find('button').val());

        if (type == "delivery") {
            $("input[name='redirect']").val('delivery');
            var actionUrl = "{{ route('delivery.store') }}";
            $('#quickAction').attr('action', actionUrl);
        } else if (type == "reciept") {
            $("input[name='redirect']").val('billSale');
            var actionUrl = "{{ route('billSale.store') }}";
            $('#quickAction').attr('action', actionUrl);
            $('#quickAction').attr('onsubmit', 'return kiemTraFormGiaoHang();');
        } else if (type == "payorder") {
            $("input[name='redirect']").val('payExport');
            var actionUrl = "{{ route('payExport.store') }}";
            $('#quickAction').attr('action', actionUrl);
        } else if (type == "thanhToan") {
            $("input[name='redirect']").val('payExport');
            $("input[name='_method']").val('PUT');
            var payExportId = $(e).data('id');
            var actionUrl =
                "{{ route('payExport.update', ['payExport' => ':payExportId']) }}";
            actionUrl = actionUrl.replace(':payExportId', payExportId);
            $('#quickAction').attr('action', actionUrl);
        }

        $('#quickAction').attr('data-type', type);
    }

    function kiemTraFormGiaoHang() {
        var numberValue = $('input[name="number_bill"]').val();
        var ajaxSuccess = false;

        $.ajax({
            url: '{{ route('checkNumberBill') }}',
            type: 'GET',
            async: false, // Chuyển thành đồng bộ
            data: {
                numberValue: numberValue
            },
            success: function(data) {
                if (!data.success) {
                    showAutoToast('warning', 'Số hóa đơn đã tồn tại');
                } else {
                    ajaxSuccess = true;
                }
            }
        });

        if (!ajaxSuccess) {
            return false;
        }
    }

    function formatCurrency(value) {
        value = Math.round(value * 100) / 100;

        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }
        return formattedValue;
    }

    $('body').on('input', '.payment_input', function(event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, '');

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    });

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split('.');
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }

    //
    var filters = [];
    var sort = [];
    var quotenumber = [];
    var users = [];
    var statusDe = [];
    var receive = [];
    var reciept = [];
    var pay = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"

    function filterquotenumber() {
        filterButtons("myInput-quotenumber", "ks-cboxtags-quotenumber");
    }

    function filterguests() {
        filterButtons("myInput-guests", "ks-cboxtags-guests");
    }

    function filterstatus() {
        filterButtons("myInput-status", "ks-cboxtags-status");
    }

    function filterreceive() {
        filterButtons("myInput-receive", "ks-cboxtags-receive");
    }

    function filterreciept() {
        filterButtons("myInput-reciept", "ks-cboxtags-reciept");
    }

    function filterpay() {
        filterButtons("myInput-pay", "ks-cboxtags-pay");
    }

    function filterusers() {
        filterButtons("myInput-users", "ks-cboxtags-users");
    }

    // get id check box name
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
        var buttonName = $(this).data('button');
        var btn_submit = $(this).data('button-name');
        var search = $('#search').val();
        var reference_number = $('#reference_number').val();
        var guests = $('#guests').val();
        var operator_total = $('.total-operator').val();
        var val_total = $('.total-quantity').val();
        var total = [operator_total, val_total];
        var date_start = $('#date_start_date').val();
        var date_end = $('#date_end_date').val();
        var date = [date_start, date_end];
        if ($(this).data('button-name') === 'quotenumber') {
            $('.ks-cboxtags-quotenumber input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && quotenumber.indexOf(value) === -1) {
                    quotenumber.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = quotenumber.indexOf(value);
                    if (index !== -1) {
                        quotenumber.splice(index, 1);
                    }
                }
            });
        }
        if ($(this).data('button-name') === 'users') {
            $('.ks-cboxtags-users input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && users.indexOf(value) === -1) {
                    users.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = users.indexOf(value);
                    if (index !== -1) {
                        users.splice(index, 1);
                    }
                }
            });
        }
        if ($(this).data('button-name') === 'status') {
            $('.ks-cboxtags-status input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked')) {
                    if (status.indexOf(value) === -1 && statusDe.indexOf(value) === -1) {
                        statusDe.push(value);
                    }
                } else {
                    const index = statusDe.indexOf(value);
                    if (index !== -1) {
                        statusDe.splice(index, 1);
                    }
                }
            });
        }

        if ($(this).data('button-name') === 'receive') {
            $('.ks-cboxtags-receive input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && receive.indexOf(value) === -1) {
                    receive.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = receive.indexOf(value);
                    if (index !== -1) {
                        receive.splice(index, 1);
                    }
                }
            });
        }
        if ($(this).data('button-name') === 'reciept') {
            $('.ks-cboxtags-reciept input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && reciept.indexOf(value) === -1) {
                    reciept.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = reciept.indexOf(value);
                    if (index !== -1) {
                        reciept.splice(index, 1);
                    }
                }
            });
        }
        if ($(this).data('button-name') === 'pay') {
            $('.ks-cboxtags-pay input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && pay.indexOf(value) === -1) {
                    pay.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = pay.indexOf(value);
                    if (index !== -1) {
                        pay.splice(index, 1);
                    }
                }
            });
        }
        var sort_by = '';
        if (typeof $(this).data('sort-by') !== 'undefined') {
            sort_by = $(this).data('sort-by');
        }
        var sort_type = $(this).data('sort-type');
        sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
        $(this).data('sort-type', sort_type);
        $('.icon').text('');
        var iconId = 'icon-' + sort_by;
        var iconDiv = $('#' + iconId);
        iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
        sort = [
            sort_by, sort_type
        ];
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + btn_submit + '-options').hide();
        }
        $(".btn-filter_search").prop("disabled", false);

        // Xoá phần tử trong mảng filters
        if ($(this).data('delete') === 'reference_number') {
            reference_number = null;
            $('#reference_number').val('');
        }
        if ($(this).data('delete') === 'quotenumber') {
            quotenumber = [];
            // $('.deselect-all-quotenumber').click();
            $('.ks-cboxtags-quotenumber input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'guests') {
            guests = null;
            $('#guests').val('');
        }
        if ($(this).data('delete') === 'users') {
            users = [];
            $('.ks-cboxtags-users input[type="checkbox"]').prop('checked', false);

        }
        if ($(this).data('delete') === 'status') {
            statusDe = [];
            $('.ks-cboxtags-status input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'receive') {
            receive = [];
            // $('.deselect-all-receive').click();
            $('.ks-cboxtags-receive input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'reciept') {
            reciept = [];
            // $('.deselect-all-reciept').click();
            $('.ks-cboxtags-reciept input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'pay') {
            pay = [];
            // $('.deselect-all-pay').click();
            $('.ks-cboxtags-pay input[type="checkbox"]').prop('checked', false);
        }
        if ($(this).data('delete') === 'total') {
            total = null;
            $('.total-quantity').val('');
        }
        if ($(this).data('delete') === 'date') {
            date = null;
            $('#date_start_date').val('');
            $('#date_end_date').val('');
        }
        $.ajax({
            type: 'get',
            url: "{{ route('searchDetailExport') }}",
            data: {
                search: search,
                quotenumber: quotenumber,
                reference_number: reference_number,
                guests: guests,
                users: users,
                status: statusDe,
                receive: receive,
                reciept: reciept,
                total: total,
                pay: pay,
                date: date,
                sort: sort,
            },
            success: function(data) {
                // Hiển thị label dữ liệu tìm kiếm ...
                var existingNames = [];
                data.filters.forEach(function(item) {
                    // Kiểm tra xem item.name đã tồn tại trong mảng filters chưa
                    if (filters.indexOf(item.name) === -1) {
                        filters.push(item.name);
                    }
                    existingNames.push(item.name);
                });

                filters = filters.filter(function(name) {
                    return existingNames.includes(name);
                });
                $('.result-filter-detailExport').empty();
                if (data.filters.length > 0) {
                    $('.result-filter-detailExport').addClass('has-filters');
                } else {
                    $('.result-filter-detailExport').removeClass('has-filters');
                }
                // Lặp qua mảng filters để tạo và render các phần tử
                data.filters.forEach(function(item) {
                    var index = filters.indexOf(item.name);
                    // Tạo thẻ item-filter
                    var itemFilter = $('<div>').addClass(
                        'item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2'
                    ).attr({
                        'data-icon': item.icon,
                        'data-button': item.name
                    });
                    itemFilter.css('order', index);
                    // Thêm nội dung và thuộc tính data vào thẻ item-filter
                    itemFilter.append(
                        '<span class="text text-13-black m-0" style="flex:2;">' +
                        item.value +
                        '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                        item.name + '" data-button="' + buttonName +
                        '"></i>');
                    // Thêm thẻ item-filter vào 
                    $('.result-filter-detailExport').append(itemFilter);
                });
                // Ẩn hiện dữ liệu khi đã filters
                var detailExportIds = [];
                // Lặp qua mảng provides và thu thập các detailExportIds
                data.detailExport.forEach(function(item) {
                    var detailExportId = item.maBG;
                    detailExportIds.push(detailExportId);
                });
                // console.log(detailExportIds);
                // Ẩn tất cả các phần tử .detailExport-info
                // $('.detailExport-info').hide();
                // Lặp qua từng phần tử .detailExport-info để hiển thị và cập nhật data-position
                $('.detailExport-info').each(function() {
                    var value = parseInt($(this).find('.id-detailExport')
                        .val());
                    var index = detailExportIds.indexOf(value);
                    if (index !== -1) {
                        $(this).show();
                        // Cập nhật data-position
                        $(this).attr('data-position', index + 1);
                    } else {
                        $(this).hide();
                    }
                });
                // Tạo một bản sao của mảng phần tử .detailExport-info
                var clonedElements = $('.detailExport-info').clone();
                // Sắp xếp các phần tử trong bản sao theo data-position
                var sortedElements = clonedElements.sort(function(a, b) {
                    return $(a).data('position') - $(b).data('position');
                });
                // Thay thế các phần tử trong .tbody-detailExport bằng các phần tử đã sắp xếp
                $('.tbody-detailExport').empty().append(sortedElements);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });

    @php
        $excelInfo = session('excel_info');
        $pdfSession = session('pdf_info');
        $pdfSession1 = session('pdf_info1');
    @endphp

    document.addEventListener("DOMContentLoaded", function() {
        @if ($excelInfo)
            fetch('{{ route('download.excel') }}')
                .then(response => response.blob())
                .then(blob => {
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'users.xlsx';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .then(() => {
                    // Sau khi tải xuống hoàn tất, gửi yêu cầu để xóa session
                    fetch('{{ route('clear.session') }}')
                        .then(() => {
                            // Sau khi xóa session, làm mới trang để cập nhật giao diện
                            window.location.reload();
                        });
                });
        @endif

        @if ($pdfSession)
            fetch('{{ route('download.pdf') }}')
                .then(response => response.blob())
                .then(blob => {
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'invoice.pdf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .then(() => {
                    // Sau khi tải xuống, gửi yêu cầu để xóa session pdf
                    fetch('{{ route('clear.pdf.session') }}')
                        .then(() => {
                            // Sau khi xóa session, làm mới trang để cập nhật giao diện
                            window.location.reload();
                        });
                });
        @endif

        @if ($pdfSession1)
            fetch('{{ route('download.pdf.delivery') }}')
                .then(response => response.blob())
                .then(blob => {
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'delivery.pdf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .then(() => {
                    // Sau khi tải xuống, gửi yêu cầu để xóa session pdf
                    fetch('{{ route('clear.pdf.session') }}')
                        .then(() => {
                            // Sau khi xóa session, làm mới trang để cập nhật giao diện
                            window.location.reload();
                        });
                });
        @endif
    });
</script>
</body>

</html>