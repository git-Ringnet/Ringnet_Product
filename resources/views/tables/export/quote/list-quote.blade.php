<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper m-0">
            <!-- Content Header (Page header) -->
            <section class="content-header-fixed p-0 margin-250">
                <div class="content__header--inner margin-left32">
                    <div class="content__heading--left">
                        <span >Bán hàng</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                            </svg>
                        </span>
                        <span class="font-weight-bold text-secondary">Đơn báo giá</span>
                    </div>
                    <div class="d-flex content__heading--right">
                        <div class="row m-0 mb-1">
                            <a href="{{ route('detailExport.create', ['workspace' => $workspacename]) }}">
                                <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="white"/>
                                    </svg>
                                    <span class="text-btnIner-primary ml-1">Tạo mới</span>
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
                </div>
                <div class="row m-auto filter pt-2 pb-4 height-50 border-custom">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex">
                                <form action="" method="get" id='search-filter'>
                                    <div class="position-relative">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords"
                                            class="pr-4 w-100 input-search" value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </form>
                                <div class="dropdown mx-2">
                                    <button class="btn-filter_searh" type="button" id="dropdownMenuButton"
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
                <div class="row m-auto filter p-0 border-custom" style="padding-left:32px; height:50px;">
                    <div class="w-100">
                        <div class="row mr-0" style="padding-left:32px;">
                            <div class="col-md-5 d-flex align-items-center">
                                <div class="border p-1 mt-2 rounded d-flex align-items-center px-2 w-50 justify-content-between">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-13">Trạng thái</span>
                                    <span class="text-13">:</span>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-13">Approved</span>
                                    <svg width="11" height="11" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.784066 0.284063C1.05865 0.0094789 1.50385 0.0094789 1.77843 0.284063L5.5 4.00531L9.22159 0.284063C9.49619 0.0094789 9.94131 0.0094789 10.2159 0.284063C10.4905 0.558648 10.4905 1.00385 10.2159 1.27843L6.49469 5L10.2159 8.72159C10.4656 8.97115 10.4882 9.36181 10.284 9.63706L10.2159 9.7159C9.94131 9.9905 9.49619 9.9905 9.22159 9.7159L5.5 5.99468L1.77843 9.7159C1.50385 9.9905 1.05865 9.9905 0.784066 9.7159C0.509482 9.44131 0.509482 8.99618 0.784066 8.72159L4.50531 5L0.784066 1.27843C0.534438 1.0288 0.51175 0.638185 0.715985 0.362926L0.784066 0.284063Z"
                                            fill="#6D7075" />
                                    </svg>
                                </div>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="ml-3 mt-2"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.70312 1.3125C6.70312 0.924178 6.38832 0.609375 6 0.609375C5.61168 0.609375 5.29688 0.924178 5.29688 1.3125V5.29688H1.3125C0.924178 5.29688 0.609375 5.61168 0.609375 6C0.609375 6.38832 0.924178 6.70312 1.3125 6.70312H5.29688V10.6875C5.29688 11.0758 5.61168 11.3906 6 11.3906C6.38832 11.3906 6.70312 11.0758 6.70312 10.6875V6.70312H10.6875C11.0758 6.70312 11.3906 6.38832 11.3906 6C11.3906 5.61168 11.0758 5.29688 10.6875 5.29688H6.70312V1.3125Z"
                                        fill="#6D7075" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content" style="margin-top:7rem;">
                <div class="container-fluided margin-250">
                    <div class="row">
                        <div class="col-12">
                            <div class="card scroll-custom mt-3">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive text-nowrap border-custom">
                                    <table id="example2" class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:5%;padding-left: 2rem;" class="height-52">
                                                    <input type="checkbox" name="all" id="checkall" class="checkall-btn">
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="id"
                                                            data-sort-type="#">
                                                            <button class="btn-sort text-13" type="submit">Ngày báo giá</button>
                                                        </a>
                                                        <div class="icon" id="icon-id"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type="">
                                                            <button class="btn-sort text-13" type="submit">Số báo giá#</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Số tham chiều</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Khách hàng</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Dự án</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Trạng thái</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Giao hàng</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Hóa đơn</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Thanh toán</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Tổng tiền</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quoteExport as $value_export)
                                                <tr onclick="handleRowClick('checkbox', event);">
                                                    <td class="bg-white text-13-black">
                                                        <span class="margin-Right10">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                                                                <g clip-path="url(#clip0_1710_10941)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z" fill="#282A30"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1710_10941">
                                                                        <rect width="6" height="10" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <input type="checkbox" class="cb-element checkall-btn"
                                                            name="ids[]" id="checkbox" value=""
                                                            onclick="event.stopPropagation();">
                                                    </td>
                                                    <td class="bg-white text-13-black">
                                                        {{ date_format(new DateTime($value_export->ngayBG), 'd/m/Y') }}
                                                    </td>
                                                    <td class="bg-white text-13-black">
                                                        <div class="">
                                                            <a href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $value_export->maBG]) }}"
                                                                class="duongDan text-13-black">{{ $value_export->quotation_number }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="bg-white text-13-black max-width120">
                                                            {{ $value_export->reference_number }}
                                                    </td>
                                                    <td class="bg-white text-13-black max-width180">
                                                        {{ $value_export->guest_name_display }}
                                                    </td>
                                                    <td class="bg-white">
                                                        <a href="#">
                                                            <span class="text-13-blue">Dự Án 1</span>
                                                        </a>
                                                    </td>
                                                    <td class="bg-white text-13-black text-left">
                                                        @if ($value_export->status === 1)
                                                            <span class="text-secondary">Draft</span>
                                                        @elseif($value_export->status === 2)
                                                            <span class="text-warning">Approved</span>
                                                        @elseif($value_export->status === 3)
                                                            <span class="text-success">Close</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center bg-white text-13-black">
                                                        @if ($value_export->status_receive === 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                                            </svg>
                                                        @elseif ($value_export->status_receive === 3)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <g clip-path="url(#clip0_2466_23134)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @elseif($value_export->status_receive === 2)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                                            </svg>
                                                        @endif
                                                    </td>
                                                    <td class="text-center bg-white text-13-black">
                                                        @if ($value_export->status_reciept === 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                                            </svg>
                                                        @elseif ($value_export->status_reciept === 3)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <g clip-path="url(#clip0_2466_23134)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @elseif($value_export->status_reciept === 2)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                                            </svg>
                                                        @endif
                                                    </td>
                                                    <td class="text-center bg-white text-13-black">
                                                        @if ($value_export->status_pay === 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                                            </svg>
                                                        @elseif ($value_export->status_pay === 3)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <g clip-path="url(#clip0_2466_23134)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_2466_23134">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @elseif($value_export->status_pay === 2)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                                            </svg>
                                                        @endif
                                                    </td>
                                                    <td class="bg-white text-13-black">
                                                        {{ number_format($value_export->total_price + $value_export->total_tax) }}
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
