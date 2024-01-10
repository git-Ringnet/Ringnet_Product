<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper1 py-0 border-bottom px-4">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="container-fluided">
            <div class="mb-3">
                <span class="font-weight-bold">Mua hàng</span>
                <span class="mx-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span>Đơn mua hàng</span>
            </div>
        </div>
        <div class="container-fluided">
            <a href="{{ route('import.create', $workspacename) }}">
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
            {{-- <button class="btn-option">
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
                    </button> --}}
        </div>
    </div>
</div>
{{-- <hr class="mt-3"> --}}


<div class="bg-filter-search">
    <div class="content-wrapper1 py-1">
        <div class="row m-auto filter pt-1">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex">
                        <form action="" method="get" id="search-filter">
                            <div class="position-relative">
                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                    class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                        fill="#6D7075"></path>
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
    </div>
</div>

<div class="content-wrapper py-0 px-2" style="min-height: 335px;">
    {{-- Content --}}
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="card scroll-custom">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th class="border-top-0 bg-white"><input type="checkbox" name="all"
                                                id="checkall"></th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#"><button class="btn-sort text-secondary text-nav" type="submit">Ngày
                                                        báo
                                                        giá</button></a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="export_code"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Đơn mua
                                                        hàng#</button></a>
                                                <div class="icon" id="icon-export_code"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="guest_receiver"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Số tham
                                                        chiếu#</button></a>
                                                <div class="icon" id="icon-guest_receiver"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Nhà
                                                        cung cấp
                                                    </button></a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Dự
                                                        án</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Trạng
                                                        thái</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Nhận
                                                        hàng</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">
                                                        Hóa đơn</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Thanh
                                                        toán</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="border-top-0 bg-white">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-secondary text-nav" type="submit">Tổng
                                                        tiền</button></a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($import as $item)
                                        <tr>
                                            <td><input type="checkbox" id="{{ $item->id }}"></td>
                                            <td class="text-center">
                                                {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}</td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}">
                                                    {{ $item->quotation_number == null ? $item->id : $item->quotation_number }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $item->reference_number }}</td>
                                            <td class="text-center">
                                                @if ($item->getProvideName)
                                                    {{ $item->getProvideName->provide_name_display }}
                                                @endif
                                            </td>
                                            <td class="text-center" style="color: #0052CC">
                                                @if ($item->getProjectName)
                                                    {{ $item->getProjectName->project_name }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_receive == 2 && $item->status_reciept == 2 && $item->status_pay == 2)
                                                    <span style="color: #08AA36">Close</span>
                                                @elseif($item->status == 1)
                                                    <span style="color: #858585">Draft</span>
                                                @else
                                                    <span style="color: #E8B600">Approved</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
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
                                            <td class="text-center">
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
                                            <td class="text-center">
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
                                            <td class="text-center">{{ number_format($item->total_tax) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
{{-- Pagination --}}
<div class="paginator mt-2 d-flex justify-content-end">
    {{ $import->appends(request()->except('page'))->links() }}
</div>
</div>
