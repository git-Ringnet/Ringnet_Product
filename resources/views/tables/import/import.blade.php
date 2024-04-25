<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
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
                <span class="font-weight-bold text-secondary">Đơn mua hàng</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <a href="{{ route('import.create', $workspacename) }}" class="user_flow" data-type="DMH"
                        data-des="Tạo mới">
                        {{-- <a href="#" class="user_flow" data-type="DMH" data-des="Tạo mới"> --}}
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
        <div class="row m-auto filter pt-2 pb-4 height-50 border-custom">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex align-items-center">
                        <form action="" method="get" id='search-filter' class="p-0 m-0">
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
                        <div class="dropdown mx-2 d-none">
                            <button class="btn-filter_searh" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                </span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-13-black" href="#">Action</a>
                                <a class="dropdown-item text-13-black" href="#">Another action</a>
                                <a class="dropdown-item text-13-black" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="result-filter-import d-flex">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-68">
        {{-- Content --}}
        <section class="content margin-250">
            <div class="container-fluided">
                <div class="row p-0 m-0">
                    <div class="col-12 p-0">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="outerImport text-nowrap">
                                <table id="example2" class="table table-hover">
                                    <thead class="sticky-head">
                                        <tr>
                                            <th scope="col" class="border-bottom"
                                                style="width:5%;padding-left: 2rem;" class="height-52">
                                                <input type="checkbox" name="all" id="checkall"
                                                    class="checkall-btn">
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="quotation_number" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">Đơn mua
                                                            hàng#</button>
                                                    </a>
                                                    <div class="icon" id="icon-quotation_number"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="created_at" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">Ngày báo
                                                            giá</button>
                                                    </a>
                                                    <div class="icon" id="icon-created_at"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="reference_number" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Số tham
                                                            chiều</button>
                                                    </a>
                                                    <div class="icon" id="icon-reference_number"></div>
                                                </span>
                                            </th>
                                            <th></th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="provide_name" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Nhà cung
                                                            cấp</button>
                                                    </a>
                                                    <div class="icon" id="icon-provide_name"></div>
                                                </span>
                                            </th>
                                            @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                <th scope="col" class="height-52 border-bottom">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13"
                                                                type="submit">Người tạo</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            @endif
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Trạng
                                                            thái</button>
                                                    </a>
                                                    <div class="icon" id="icon-status"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_receive" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Nhận hàng</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_receive"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_reciept" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Hóa đơn</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_reciept"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_pay" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Thanh
                                                            toán</button>
                                                    </a>
                                                    <div class="icon" id="icon-status_pay"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52 border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="total_tax" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Tổng tiền</button>
                                                    </a>
                                                    <div class="icon" id="icon-total_tax"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-import">
                                        @foreach ($import as $item)
                                            <tr class="position-relative import-info" style="height:44px;"
                                                data-id="{{ $item->id }}">
                                                <input type="hidden" name="id-import" class="id-import"
                                                    id="id-import" value="{{ $item->id }}">
                                                <td class="text-13-black border-bottom border-top-0">
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
                                                    <input type="checkbox" id="{{ $item->id }}"
                                                        class="cb-element checkall-btn">
                                                </td>
                                                <td class="text-13-black border-bottom border-top-0">
                                                    <div class="user_flow" data-type="DMH"
                                                        data-des="Xem đơn mua hàng">
                                                        <a href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}"
                                                            class="duongDan">
                                                            {{ $item->quotation_number == null ? $item->id : $item->quotation_number }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-13-black border-bottom border-top-0">
                                                    {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                                </td>
                                                <td class="text-13-black border-bottom border-top-0">
                                                    {{ $item->reference_number }}
                                                </td>
                                                <td class="border-bottom border-top-0">
                                                    <div class="bg-white position-absolute rounded shadow p-2 z-index-block"
                                                        style="z-index: 99; width: 165px; top: 20px; right: 88px; display:none;"
                                                        id="listBtnCreateFast">
                                                        <ul class="m-0 p-0 scroll-data">
                                                            <li class="p-2 align-items-left text-wrap user_flow"
                                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                                data-type="DMH" data-des="Tạo nhanh đơn nhận hàng">
                                                                <a href="#" style="flex:2;"
                                                                    onclick="getAction(this)" name="search-info"
                                                                    class="search-info">
                                                                    <button
                                                                        class="align-items-left h-100 border-0 w-100 rounded"
                                                                        style="background-color: transparent;"
                                                                        name="action" value="action_2"
                                                                        type="submit">
                                                                        <span
                                                                            style="font-weight: 600;color: #000; font-size:13px">Thêm
                                                                            nhận
                                                                            hàng</span>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 align-items-left text-wrap user_flow"
                                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                                data-type="DMH" data-des="Tạo nhanh hóa đơn mua hàng">
                                                                <a href="#" style="flex:2;"
                                                                    onclick="getAction(this)" name="search-info"
                                                                    class="search-info">
                                                                    <button
                                                                        class="align-items-left h-100 border-0 w-100 rounded "
                                                                        style="background-color: transparent;"
                                                                        name="action" value="action_3"
                                                                        type="submit">
                                                                        <span
                                                                            style="font-weight: 600;color: #000; font-size:13px">Thêm
                                                                            mua
                                                                            hàng</span>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 align-items-left text-wrap user_flow"
                                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                                data-type="DMH"
                                                                data-des="Tạo nhanh thanh toán mua hàng">
                                                                <a href="#" style="flex:2;"
                                                                    onclick="getAction(this)" name="search-info"
                                                                    class="search-info">
                                                                    <button
                                                                        class="align-items-left h-100 border-0 w-100 rounded"
                                                                        style="background-color: transparent;"
                                                                        name="action" value="action_4"
                                                                        type="submit">
                                                                        <span
                                                                            style="font-weight: 600;color: #000; font-size:13px">Thêm
                                                                            thanh
                                                                            toán</span>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="text-13-black border-bottom border-top-0">
                                                    {{ $item->provide_name }}
                                                </td>
                                                @if (Auth::check() && Auth::user()->getRoleUser->roleid == 2)
                                                    <td class="text-13-black border-bottom border-top-0">
                                                        @if ($item->getNameUser)
                                                            {{ $item->getNameUser->name }}
                                                        @endif
                                                    </td>
                                                @endif
                                                <td class="text-center py-2 border-bottom border-top-0">
                                                    @if ($item->status_receive == 2 && $item->status_reciept == 2 && $item->status_pay == 2)
                                                        <span style="color: #08AA36">Close</span>
                                                    @elseif($item->status == 1)
                                                        <span style="color: #858585">Draft</span>
                                                    @else
                                                        <span style="color: #E8B600">Approved</span>
                                                    @endif
                                                </td>
                                                <td class="text-center py-2 border-bottom border-top-0">
                                                    @if ($item->status_receive == 0)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($item->status_receive == 1)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                fill="#E8B600" />
                                                            <path
                                                                d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                fill="#E8B600" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-center py-2 border-bottom border-top-0">
                                                    @if ($item->status_reciept == 0)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($item->status_reciept == 1)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                fill="#E8B600" />
                                                            <path
                                                                d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                fill="#E8B600" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-center py-2 border-bottom border-top-0">
                                                    @if ($item->status_pay == 0)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                fill="#858585" />
                                                        </svg>
                                                    @elseif ($item->status_pay == 1)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                fill="#E8B600" />
                                                            <path
                                                                d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                fill="#E8B600" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                fill="#08AA36" fill-opacity="0.75" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="text-13-black text-right border-bottom border-top-0">
                                                    {{ number_format($item->total_tax) }}</td>
                                                <td class="position-absolute m-0 p-0 border-0 bg-hover-icon border-bottom border-top-0"
                                                    style="right: 10px; top: 7px;">
                                                    <div class="d-flex w-100">
                                                        <a class="user_flow" data-type="DMH"
                                                            data-des="Xem đơn mua hàng"
                                                            href="{{ route('import.edit', ['workspace' => $workspacename, 'import' => $item->id]) }}">
                                                            <div class="m-0 px-2 py-1 mx-2 rounded">
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.985" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                        fill="#6C6F74"></path>
                                                                    <path opacity="0.979" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                        fill="#6C6F74"></path>
                                                                </svg>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="m-0 mx-2 rounded">
                                                                <form
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                    action="{{ route('import.destroy', ['workspace' => $workspacename, 'import' => $item->id]) }}"
                                                                    method="post" id="search-filter">
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
<div class="menu bg-hover rounded"
    style="display: none; background: #ffffff; position: absolute; width:14%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3);   border: 1px solid #ccc;">
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
            </span> Tạo đơn nhận hàng
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
            Tạo hóa đơn mua hàng
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
            <span class="title_payment">Tạo thanh toán</span>
        </p>
    </a>
</div>

{{-- Modal --}}
<form action="#" method="POST" id="quickAction">
    @csrf
    <input type="hidden" id="id_import" name="id_import">
    <input type="hidden" name="action" id="getAction">
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


    <div id="list_modal"></div>
</form>


<x-form-modal-quick-action></x-form-modal-quick-action>
</div>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script type="text/javascript">
    var filters = [];
    var sort = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"




    function getDate(number) {
        flatpickr("#datePicker" + number, {
            locale: "vn",
            dateFormat: "d/m/Y",
            defaultDate: new Date(),
            onChange: function(selectedDates,
                dateStr, instance) {
                document.getElementById(
                        "hiddenDateInput" + number)
                    .value = instance
                    .formatDate(selectedDates[
                            0],
                        "Y-m-d");
            }
        });
    }

    $('#quickAction').on('submit', function(e) {
        var type = $(this).data('type');
        e.preventDefault();
        if (type == "receive_bill") {
            var productSN = {}
            var formSubmit = true;
            var listProductName = [];
            var listQty = [];
            var listSN = [];
            var checkSN = [];

            $('.searchProductName').each(function() {
                checkSN.push($(this).closest('tr').find('input[name^="cbSeri"]').val())
                listProductName.push($(this).val().trim());
                listQty.push($(this).closest('tr').find('.quantity-input').val().trim());
                var count = $($(this).closest('tr').find('.duongdan').attr('data-target')).find(
                    'input[name^="seri"]').filter(
                    function() {
                        return $(this).val() !== '';
                    }).length;
                listSN.push(count);
                var oldValue = $(this).val().trim();
                productSN[oldValue] = {
                    sn: []
                };
                SerialNumbers = $($(this).closest('tr').find('.duongdan').attr('data-target')).find(
                    'input[name^="seri"]').map(function() {
                    return $(this).val().trim();
                }).get();
                // Kiểm tra trùng seri 1 sản phẩm
                if (checkDuplicateSerialNumbers(SerialNumbers) !== null) {
                    showNotification('warning', 'Sản phảm' + $(this).val() + 'đã trùng seri' +
                        checkDuplicateSerialNumbers(SerialNumbers))
                    formSubmit = false
                } else {
                    productSN[oldValue].sn.push(...SerialNumbers)
                }

            });
            if (formSubmit) {
                $.ajax({
                    url: "{{ route('checkSN') }}",
                    type: "get",
                    data: {
                        listProductName: listProductName,
                        listQty: listQty,
                        listSN: listSN,
                        checkSN: checkSN,
                    },
                    success: function(data) {
                        if (data['status'] == 'false') {
                            showNotification('warning', 'Vui lòng nhập đủ số lượng seri sản phẩm ' +
                                data[
                                    'productName'])
                        } else {
                            // Kiểm tra sản phẩm đã tồn tại seri chưa
                            $.ajax({
                                url: "{{ route('checkduplicateSN') }}",
                                type: "get",
                                data: {
                                    value: productSN,
                                },
                                success: function(data) {
                                    if (data['success'] == false) {
                                        showNotification('warning', 'Sản phảm' + data[
                                                'msg'] +
                                            'đã tồn tại seri' + data['data'])
                                    } else {
                                        updateProductSN()
                                        $('#quickAction')[0].submit();
                                    }
                                }
                            })
                        }
                    }
                })
            }
        } else if (type == "reciept") {
            // Hóa đơn mua hàng
            var number_bill = $("input[name='number_bill']").val();
            console.log(number_bill);
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    number_bill: number_bill,
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Số hóa đơn đã tồn tại')
                    } else {
                        $('#quickAction')[0].submit();
                    }
                }
            })
        } else {
            // Thanh toán
            $('#quickAction')[0].submit();
        }
    })

    function getActionForm(e) {
        type = $(e).data('type');
        $('#getAction').val($(e).find('button').val());
        if (type == "receive_bill") {
            $('#quickAction').attr('action', "{{ route('receive.store', $workspacename) }}");
        } else if (type == "reciept") {
            $('#quickAction').attr('action', "{{ route('reciept.store', $workspacename) }}");
        } else {
            $('#quickAction').attr('action', "{{ route('paymentOrder.store', $workspacename) }}");
        }
        $('#quickAction').attr('data-type', type)
    }

    $(document).on('click', '.btn-destroy.btn-light.mx-2.d-flex.align-items-center.h-100', function() {
        $('#list_modal').empty()
    })
    $(document).ready(function() {
        // get id check box name
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var buttonName = $(this).data('button');
            var btn_submit = $(this).data('button-name');
            var search = $('#search').val();
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
            $(".text-btnIner").prop("disabled", false);
            $.ajax({
                type: 'get',
                url: "{{ route('searchImport') }}",
                data: {
                    search: search,
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
                    $('.result-filter-import').empty();
                    // Lặp qua mảng filters để tạo và render các phần tử
                    data.filters.forEach(function(item) {
                        var index = filters.indexOf(item.name);
                        // Tạo thẻ item-filter
                        var itemFilter = $('<div>').addClass(
                            'item-filter span d-flex justify-content-center align-items-baseline'
                        );
                        itemFilter.css('order', index);
                        // Thêm nội dung và thuộc tính data vào thẻ item-filter
                        itemFilter.append('<p class="text">' + item.value +
                            '</p><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                            item.name + '" data-button="' + buttonname +
                            '"></i>');
                        // Thêm thẻ item-filter vào resultfilters
                        $('.result-filter-import').append(itemFilter);
                    });

                    // Ẩn hiện dữ liệu khi đã filters
                    var importIds = [];
                    // Lặp qua mảng provides và thu thập các deleveryIds
                    data.data.forEach(function(item) {
                        var deleveryId = item.id;
                        importIds.push(deleveryId);
                    });
                    // Ẩn tất cả các phần tử .detailExport-info
                    // $('.detailExport-info').hide();
                    // Lặp qua từng phần tử .detailExport-info để hiển thị và cập nhật data-position
                    $('.import-info').each(function() {
                        var value = parseInt($(this).find('.id-import')
                            .val());
                        var index = importIds.indexOf(value);
                        if (index !== -1) {
                            $(this).show();
                            // Cập nhật data-position
                            $(this).attr('data-position', index + 1);
                        } else {
                            $(this).hide();
                        }
                    });
                    // Tạo một bản sao của mảng phần tử .import-info
                    var clonedElements = $('.import-info').clone();
                    // Sắp xếp các phần tử trong bản sao theo data-position
                    var sortedElements = clonedElements.sort(function(a, b) {
                        return $(a).data('position') - $(b).data('position');
                    });
                    // Thay thế các phần tử trong .tbody-import bằng các phần tử đã sắp xếp
                    $('.tbody-import').empty().append(sortedElements);

                }
            });
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
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


    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
</script>
