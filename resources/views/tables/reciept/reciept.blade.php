<x-navbar :title="$title" activeGroup="buy" activeName="reciept"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0  min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Mua hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span>Hóa đơn mua hàng</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <a href="{{ route('reciept.create', $workspacename) }}" class="user_flow" data-type="HDMH"
                        data-des="HDMH">
                        <button type="button" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-1">Tạo mới</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Search --}}
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
                                <div class="dropdown mx-2">
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
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-number_bill" data-button="number_bill" type="button">Số
                                                hoá đơn
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-quotenumber" data-button="quotenumber" type="button">Đơn mua
                                                hàng
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-provides"
                                                data-button="provides" type="button">Nhà cung cấp
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-users"
                                                data-button="users" type="button">Người tạo
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-status"
                                                data-button="status" type="button">Trạng thái
                                            </button>
                                            {{-- <button class="dropdown-item btndropdown text-13-black" id="btn-reciept"
                                                data-button="reciept" type="button">Ngày giao hàng
                                            </button> --}}
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-total"
                                                data-button="total" type="button">
                                                Tổng tiền
                                            </button>
                                        </div>
                                    </div>
                                    <x-filter-text name="quotenumber" title="Đơn mua hàng" />
                                    <x-filter-checkbox :dataa='$reciept' name="number_bill" title="Số hoá đơn"
                                        namedisplay="number_bill" />
                                    <x-filter-text name="provides" title="Nhà cung cấp" />
                                    <x-filter-checkbox :dataa='$users' name="users" title="Người tạo"
                                        namedisplay="name" />
                                    <x-filter-status name="status" key1="1" value1="Bản nháp" key2="2"
                                        value2="Chính thức" title="Trạng thái" />
                                    <x-filter-compare name="total" title="Tổng tiền" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Content --}}
    <div class="content margin-top-75">
        <section class="content margin-250">
            <div class="container-fluided">
                <div class="row result-filter-reciept margin-left30 my-1">
                </div>
                <div class="row p-0 m-0">
                    <div class="col-12 p-0">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="content-info position-relative outer2 text-nowrap">
                                <table id="example2" class="table table-hover">
                                    <thead class="sticky-head">
                                        <tr>
                                            <th scope="col" style="width:5%;padding-left: 2rem;"
                                                class="height-52 border-bottom">
                                                <input type="checkbox" name="all" id="checkall"
                                                    class="checkall-btn">
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="number_bill" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">Số hóa
                                                            đơn</button>
                                                    </a>
                                                    <div class="icon" id="icon-number_bill"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="quotation_number" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Đơn mua
                                                            hàng</button>
                                                    </a>
                                                    <div class="icon" id="icon-quotation_number"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="date_bill" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">Ngày hóa
                                                            đơn</button>
                                                    </a>
                                                    <div class="icon" id="icon-date_bill"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="provide_name_display"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">Nhà cung
                                                            cấp</button>
                                                    </a>
                                                    <div class="icon" id="icon-provide_name_display"></div>
                                                </span>
                                            </th>
                                            @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                <th scope="col" class="height-52 border-bottom">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13"
                                                                type="submit">Người tạo</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            @endif
                                            <th scope="col"
                                                class="height-52 border-bottom d-flex justify-content-center">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Trạng
                                                            thái</button>
                                                    </a>
                                                    <div class="icon" id="icon-status"></div>
                                                </span>
                                            </th>

                                            <th scope="col" class="height-52">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="price_total" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Tổng tiền</button>
                                                    </a>
                                                    <div class="icon" id="icon-price_total"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-reciept">
                                        @foreach ($reciept as $item)
                                            <tr class="position-relative reciept-info" style="height:44px;"><input
                                                    type="hidden" name="id-reciept" class="id-reciept"
                                                    id="id-reciept" value="{{ $item->id }}">
                                                <td class="pr-0 py-2 text-13-black border-bottom border-top-0">
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
                                                    <input type="checkbox" class="cb-element checkall-btn">
                                                </td>
                                                <td class="py-2 text-13-black border-bottom border-top-0 text-wrap">
                                                    <a href="{{ route('reciept.edit', ['workspace' => $workspacename, 'reciept' => $item->id]) }}"
                                                        class="duongdan user_flow" data-type="HDMH"
                                                        data-des="Xem hóa đơn mua hàng">
                                                        {{ $item->number_bill }}
                                                    </a>
                                                </td>
                                                <td class="py-2 text-13-black border-bottom border-top-0 text-wrap">
                                                    @if ($item->getQuotation)
                                                        {{ $item->getQuotation->quotation_number == null ? $item->getQuotation->id : $item->getQuotation->quotation_number }}
                                                    @endif
                                                </td>
                                                <td class="py-2 text-13-black border-bottom border-top-0">
                                                    {{ date_format(new DateTime($item->date_bill), 'd/m/Y') }}
                                                </td>
                                                <td class="py-2 text-13-black border-bottom border-top-0 text-wrap">
                                                    @if ($item->getQuotation)
                                                        {{ $item->getQuotation->provide_name }}
                                                    @endif
                                                </td>
                                                @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                    <td class="py-2 text-13-black border-bottom border-top-0">
                                                        @if ($item->getNameUser)
                                                            {{ $item->getNameUser->name }}
                                                        @endif
                                                    </td>
                                                @endif
                                                <td class="py-2 text-13-black text-center border-bottom border-top-0">
                                                    @if ($item->status == 1)
                                                        <span style="color: #858585">Bản nháp</span>
                                                    @else
                                                        <span style="color: #08AA36">Chính thức</span>
                                                    @endif
                                                </td>
                                                <td class="py-2 text-13-black text-right border-bottom border-top-0">
                                                    {{ number_format($item->price_total) }}
                                                </td>
                                                <td class="position-absolute m-0 p-0 border-0 bg-hover-icon border-bottom border-top-0 align-items-center"
                                                    style="right: 10px; top: 3px; bottom:0;">
                                                    <div class="d-flex align-items-center">
                                                        <a href="#">
                                                            <div class="m-0 mx-2 rounded">
                                                                <form
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                    action="{{ route('reciept.destroy', ['workspace' => $workspacename, 'reciept' => $item->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm">
                                                                        <svg width="16" height="16"
                                                                            viewBox="0 0 16 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.936" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                                fill="#6C6F74"></path>
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                                fill="#6C6F74"></path>
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                                fill="#6C6F74"></path>
                                                                            <path opacity="0.891" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                                fill="#6C6F74"></path>
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

{{-- Pagination --}}
{{-- <div class="paginator mt-2 d-flex justify-content-end">
    {{ $reciept->appends(request()->except('page'))->links() }}
</div> --}}


</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>

<script type="text/javascript">
    var filters = [];
    var sort = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"

    var number_bill = [];
    var users = [];
    var statusDe = [];

    function filterstatus() {
        filterButtons("myInput-status", "ks-cboxtags-status");
    }

    function filterusers() {
        filterButtons("myInput-users", "ks-cboxtags-users");
    }

    function filternumber_bill() {
        filterButtons("myInput-number_bill", "ks-cboxtags-number_bill");
    }
    // get id check box name
    $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        var buttonName = $(this).data('button');
        var btn_submit = $(this).data('button-name');
        var search = $('#search').val();
        var quotenumber = $('#quotenumber').val();
        var provides = $('#provides').val();
        var shipping_unit = $('#shipping_unit').val();
        var operator_total = $('.total-operator').val();
        var val_total = $('.total-quantity').val();
        var total = [operator_total, val_total];
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
        if ($(this).data('button-name') === 'number_bill') {
            $('.ks-cboxtags-number_bill input[type="checkbox"]').each(function() {
                const value = $(this).val();
                if ($(this).is(':checked') && number_bill.indexOf(value) === -1) {
                    number_bill.push(value);
                } else if (!$(this).is(':checked')) {
                    const index = number_bill.indexOf(value);
                    if (index !== -1) {
                        number_bill.splice(index, 1);
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
        $('#' + btn_submit + '-options').hide();
        $(".btn-filter_search").prop("disabled", false);
        if ($(this).data('delete') === 'quotenumber') {
            quotenumber = null;
            $('#quotenumber').val('');
        }
        if ($(this).data('delete') === 'number_bill') {
            number_bill = [];
            $('.deselect-all-number_bill').click();
        }
        if ($(this).data('delete') === 'provides') {
            provides = null;
            $('#provides').val('');
        }
        if ($(this).data('delete') === 'users') {
            users = [];
            $('.deselect-all-users').click();
        }
        if ($(this).data('delete') === 'status') {
            statusDe = [];
            $('.deselect-all-status').click();
        }
        if ($(this).data('delete') === 'total') {
            total = null;
            $('.total-quantity').val('');
        }
        $.ajax({
            type: 'get',
            url: "{{ route('searchReciept') }}",
            data: {
                search: search,
                quotenumber: quotenumber,
                users: users,
                provides: provides,
                number_bill: number_bill,
                status: statusDe,
                total: total,
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
                $('.result-filter-reciept').empty();
                // Lặp qua mảng filters để tạo và render các phần tử
                data.filters.forEach(function(item) {
                    var index = filters.indexOf(item.name);
                    // Tạo thẻ item-filter
                    var itemFilter = $('<div>').addClass(
                        'item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2'
                    );
                    itemFilter.css('order', index);
                    // Thêm nội dung và thuộc tính data vào thẻ item-filter
                    itemFilter.append(
                        '<span class="text text-13-black m-0" style="flex:2;">' +
                        item.value +
                        '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                        item.name + '" data-button="' + buttonName +
                        '"></i>');
                    // Thêm thẻ item-filter vào resultfilters

                    $('.result-filter-reciept').append(itemFilter);
                });

                // Ẩn hiện dữ liệu khi đã filters
                var recieptIds = [];
                // Lặp qua mảng provides và thu thập các deleveryIds
                data.data.forEach(function(item) {
                    var deleveryId = item.id;
                    recieptIds.push(deleveryId);
                });
                // Ẩn tất cả các phần tử .detailExport-info
                // $('.detailExport-info').hide();
                // Lặp qua từng phần tử .detailExport-info để hiển thị và cập nhật data-position
                $('.reciept-info').each(function() {
                    var value = parseInt($(this).find('.id-reciept')
                        .val());
                    var index = recieptIds.indexOf(value);
                    if (index !== -1) {
                        $(this).show();
                        // Cập nhật data-position
                        $(this).attr('data-position', index + 1);
                    } else {
                        $(this).hide();
                    }
                });
                // Tạo một bản sao của mảng phần tử .reciept-info
                var clonedElements = $('.reciept-info').clone();
                // Sắp xếp các phần tử trong bản sao theo data-position
                var sortedElements = clonedElements.sort(function(a, b) {
                    return $(a).data('position') - $(b).data('position');
                });
                // Thay thế các phần tử trong .tbody-reciept bằng các phần tử đã sắp xếp
                $('.tbody-reciept').empty().append(sortedElements);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });


    $(document).on('click', '.user_flow', function(e) {
        var type = $(this).attr('data-type')
        var des = $(this).attr('data-des');
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: type,
                des: des
            },
            success: function(data) {}
        })
    })
</script>
