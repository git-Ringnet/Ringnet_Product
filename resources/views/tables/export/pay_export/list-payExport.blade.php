<x-navbar :title="$title" activeGroup="sell" activeName="payexport" :workspacename="$workspacename"></x-navbar>
<div class="content-wrapper1 py-2">
    <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
        <div class="container-fluided">
            <div class="mb">
                <span class="font-weight-bold">Bán hàng</span>
                <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">Thanh toán bán hàng</span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0">
                <a href="{{ route('payExport.create', ['workspace' => $workspacename]) }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white" />
                        </svg>
                        <span class="text-button-add">Tạo mới</span>
                    </button>
                </a>
                <button class="btn-option bg-white border-0">
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
</div>
<div class="bg-filter-search pl-4">
    <div class="content-wrapper1 py-2">
        <div class="row m-auto filter p-0">
            <div class="w-100">
                <div class="row mr-0">
                    <div class="col-md-5 d-flex align-items-center">
                        <form action="" method="get" id="search-filter" class="p-0 m-0">
                            <div class="position-relative ml-1">
                                <input type="text" placeholder="Tìm kiếm" name="keywords" class="pr-4 w-100 input-search" value="">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search" aria-hidden="true"></i></span>
                            </div>
                        </form>
                        <div class="dropdown ml-1">
                            <button class="filter-btn ml-2 align-items-center d-flex border" data-toggle="dropdown" aria-expanded="false">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075"></path>
                                    <path d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z" fill="#6D7075"></path>
                                    <path d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z" fill="#6D7075"></path>
                                    <path d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z" fill="#6D7075"></path>
                                </svg>
                                <span class="text-secondary mx-1 text-filter"> Bộ lọc</span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z" fill="#6D7075"></path>
                                </svg>
                            </button>
                            <div class="dropdown-menu" style="">
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
<div class="content-wrapper py-0 pl-0 pr-2">
    <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12 p-0 m-0">
                    <div class="card scroll-custom">
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                                <thead class="sticky-head">
                                    <tr>
                                        <th><input type="checkbox" name="all" id="checkall"></th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="id"
                                                    data-sort-type="#">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Mã thanh toán</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-id"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Số báo giá#</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="created_at"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Khách hàng</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-created_at"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Trạng thái</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Hạn thanh toán</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Tổng tiền</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Đã nhận</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            <span class="d-flex">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type="">
                                                    <button class="btn-sort" type="submit">
                                                        <span class="text-nav text-secondary">Dư nợ</span>
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payExport as $item_pay)
                                        <tr onclick="handleRowClick('checkbox', event);">
                                            <td class="><input type="checkbox" class="cb-element" name="ids[]"
                                                id="checkbox" value="" onclick="event.stopPropagation();">
                                            </td>
                                            <td class="">
                                                {{ $item_pay->idThanhToan }}
                                            </td>
                                            <td class="">
                                                <a
                                                    href="{{ route('payExport.edit', ['workspace' => $workspacename, 'payExport' => $item_pay->idThanhToan]) }}">
                                                    {{ $item_pay->quotation_number }}
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                {{ $item_pay->guest_name_display }}
                                            </td>
                                            <td class="text-left">
                                                @if ($item_pay->status == 1)
                                                    @if ($item_pay->payment > 0)
                                                        <span style="color: #858585">Đặt cọc</span>
                                                    @else
                                                        <span style="color: #858585">Chưa thanh toán</span>
                                                    @endif
                                                @elseif($item_pay->status == 2)
                                                    <span style="color: #08AA36">Thanh toán đủ</span>
                                                @elseif($item_pay->status == 3)
                                                    <span style="color: #E8B600">Đến hạn trong
                                                        {{ $item_pay->formatDate($item_pay->payment_date)->diffInDays($today) + 1 }}
                                                        ngày
                                                    </span>
                                                @elseif($item_pay->status == 4)
                                                    <span style="color:#EC212D">Quá hạn trong
                                                        {{ $item_pay->formatDate($item_pay->payment_date)->diffInDays($today) }}
                                                        ngày
                                                    </span>
                                                @else
                                                    <span style="color: #E8B600">Đến hạn</span>
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                {{ date_format(new DateTime($item_pay->payment_date), 'd/m/Y') }}
                                            </td>
                                            <td class="text-left">
                                                {{ number_format($item_pay->tongTienNo) }}
                                            </td>
                                            <td class="text-left">
                                                {{ number_format($item_pay->tongThanhToan) }}
                                            </td>
                                            <td class="text-left">
                                                {{ number_format($item_pay->debt) }}
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
