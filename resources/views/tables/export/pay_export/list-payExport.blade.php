<x-navbar :title="$title" activeGroup="sell" activeName="payexport" :workspacename="$workspacename"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0">
    <!-- Content Header (Page header) -->
    <section class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left ">
                <span>Bán hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                    </svg>
                </span>
                <span class="font-weight-bold">Thanh toán bán hàng</span>
            </div>
            <div class="d-flex content__heading--right">
                <a href="{{ route('payExport.create', ['workspace' => $workspacename]) }}">
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
    </section>
    <!-- Main content -->
    <section class="content margin-top-fixed4">
        <div class="container-fluided margin-250">
            <div class="row">
                <div class="col-12">
                    <div class="card scroll-custom mt-3">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive text-nowrap">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th scope="col" style="width:5%;padding-left: 2rem;" class="height-52">
                                            <input type="checkbox" name="all" id="checkall" class="checkall-btn">
                                        </th>
                                        <th scope="col" class="height-52">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort text-13" type="submit">Mã thanh toán </button>
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
                                                    data-sort-type=""><button class="btn-sort text-13" type="submit">Khách hàng</button>
                                                </a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-13" type="submit">Trạng thái</button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-13" type="submit">Hạn thanh toán</button>
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
                                        <th scope="col" class="height-52">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-13" type="submit">Đã nhận</button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-13" type="submit">Dư nợ</button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payExport as $item_pay)
                                        <tr onclick="handleRowClick('checkbox', event);">
                                            <td style="width:5%;" class="height-52">
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
                                                <input type="checkbox" class="cb-element checkall-btn" name="ids[]"
                                                id="checkbox" value="" onclick="event.stopPropagation();">
                                            </td>
                                            <td class="text-13-black" >
                                                {{ $item_pay->idThanhToan }}
                                            </td>
                                            <td class="text-13-black ">
                                                {{ $item_pay->quotation_number }}
                                            </td>
                                            <td class="text-13-black">
                                                {{ $item_pay->guest_name_display }}
                                            </td>
                                            <td class="text-13-black">
                                                @if ($item_pay->status == 1)
                                                    @if ($item_pay->payment > 0)
                                                        <span style="color: #858585">Đặt cọc</span>
                                                    @else
                                                        <span style="color: #858585">Chưa thanh toán</span>
                                                    @endif
                                                @elseif($item_pay->status == 2)
                                                    <span style="color: #08AA36">Thanh toán đủ</span>
                                                @elseif($item_pay->status == 3)
                                                    <span style="color: #0052CC">Đến hạn trong
                                                        {{ $item_pay->formatDate($item_pay->payment_date)->diffInDays($today) + 1 }}
                                                        ngày</span>
                                                @elseif($item_pay->status == 4)
                                                    <span style="color:#EC212D">Quá hạn trong
                                                        {{ $item_pay->formatDate($item_pay->payment_date)->diffInDays($today) }}
                                                        ngày</span>
                                                @else
                                                    <span style="color: #0052CC">Đến hạn</span>
                                                @endif
                                            </td>
                                            <td class="text-13-black">
                                                {{ date_format(new DateTime($item_pay->payment_date), 'd/m/Y') }}
                                            </td>
                                            <td class="text-13-black">
                                                {{ number_format($item_pay->tongTienNo) }}
                                            </td>
                                            <td class="text-13-black">
                                                {{ number_format($item_pay->tongThanhToan) }}
                                            </td>
                                            <td class="text-13-black">
                                                {{ number_format($item_pay->debt) }}
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('payExport.edit', ['workspace' => $workspacename, 'payExport' => $item_pay->idThanhToan]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" viewBox="0 0 32 32" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M18.7832 6.79483C18.987 6.71027 19.2056 6.66675 19.4263 6.66675C19.6471 6.66675 19.8656 6.71027 20.0695 6.79483C20.2734 6.87938 20.4586 7.00331 20.6146 7.15952L21.9607 8.50563C22.1169 8.66165 22.2408 8.84693 22.3253 9.05087C22.4099 9.25482 22.4534 9.47342 22.4534 9.69419C22.4534 9.91495 22.4099 10.1336 22.3253 10.3375C22.2408 10.5414 22.1169 10.7267 21.9607 10.8827L20.2809 12.5626C20.2711 12.5736 20.2609 12.5844 20.2503 12.595C20.2397 12.6056 20.2289 12.6158 20.2178 12.6256L11.5607 21.2827C11.4257 21.4177 11.2426 21.4936 11.0516 21.4936H8.34644C7.94881 21.4936 7.62647 21.1712 7.62647 20.7736V18.0684C7.62647 17.8775 7.70233 17.6943 7.83737 17.5593L16.4889 8.9086C16.5003 8.89532 16.5124 8.88235 16.525 8.86973C16.5376 8.8571 16.5506 8.84504 16.5639 8.83354L18.2381 7.15952C18.394 7.00352 18.5795 6.8793 18.7832 6.79483ZM17.0354 10.3984L9.06641 18.3667V20.0536H10.7534L18.7221 12.085L17.0354 10.3984ZM19.7402 11.0668L18.0537 9.38022L19.2572 8.17685C19.2794 8.15461 19.3057 8.13696 19.3348 8.12493C19.3638 8.11289 19.3949 8.10669 19.4263 8.10669C19.4578 8.10669 19.4889 8.11289 19.5179 8.12493C19.5469 8.13697 19.5737 8.15504 19.5959 8.17728L20.9428 9.52411C20.9651 9.5464 20.9831 9.57315 20.9951 9.60228C21.0072 9.63141 21.0134 9.66264 21.0134 9.69419C21.0134 9.72573 21.0072 9.75696 20.9951 9.78609C20.9831 9.81522 20.9651 9.84197 20.9428 9.86426L19.7402 11.0668ZM6.6665 24.6134C6.6665 24.2158 6.98885 23.8935 7.38648 23.8935H24.6658C25.0634 23.8935 25.3858 24.2158 25.3858 24.6134C25.3858 25.0111 25.0634 25.3334 24.6658 25.3334H7.38648C6.98885 25.3334 6.6665 25.0111 6.6665 24.6134Z"
                                                            fill="#555555">
                                                        </path>
                                                    </svg>
                                                </a>
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
