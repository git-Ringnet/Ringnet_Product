<x-navbar :title="$title" activeGroup="statistic" activeName="debtGuests"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed-report p-0">
        <div class="content__header--inner">
            {{-- <div class="content__heading--left ">
                <span class="ml-4">Báo cáo</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div> --}}
            <div class="pl-3 d-flex align-items-center">
                <form action="" method="get" id="search-filter" class="p-0 m-0">
                    <div class="position-relative ml-1">
                        <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                            value="{{ request()->keywords }}" />
                        <span id="search-icon" class="search-icon">
                            <i class="fas fa-search btn-submit"></i>
                        </span>
                        <input class="btn-submit" type="submit" id="hidden-submit"
                            name="hidden-submit" style="display: none;" />
                    </div>
                </form>
                <div class="dropdown mx-2 filter-all">
                    <button class="btn-filter_search" type="button" id="dropdownMenuButton"
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
                    <div class="dropdown-menu" id="dropdown-menu"
                        aria-labelledby="dropdownMenuButton">
                        <div class="search-container px-2">
                            <input type="text" placeholder="Tìm kiếm" id="myInput"
                                onkeyup="filterFunction()" class="text-13">
                            <span class="search-icon mr-2">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div class="scrollbar">
                            <button class="dropdown-item btndropdown text-13-black" id="btn-date"
                                data-button="date" type="button">Ngày báo giá
                            </button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-customers" data-button="customers" type="button">Tên
                                khách hàng</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-sales"
                                data-button="sales" type="button">Bán hàng</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-customer_return" data-button="customer_return"
                                type="button">Khách trả hàng</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-receive" data-button="receive"
                                type="button">Thu</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-pay"
                                data-button="pay" type="button">Chi</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-ending-debt" data-button="ending_debt" type="button">Nợ
                                cuối
                                kỳ</button>
                        </div>
                    </div>
                    <x-filter-date-time name="date" title="Ngày báo giá" />
                    <x-filter-text name="customers" title="Tên khách hàng" />
                    <x-filter-compare name="sales" title="Bán hàng" />
                    <x-filter-compare name="customer_return" title="Khách trả hàng" />
                    <x-filter-compare name="receive" title="Thu" />
                    <x-filter-compare name="pay" title="Chi" />
                    <x-filter-compare name="ending_debt" title="Nợ cuối kỳ" />
                </div>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    {{-- In and export --}}
                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                        onclick="printContent('printContent', 'hanghoa')">In
                        trang</button>
                    <form id="exportForm" action="{{ route('exportDebtGuests') }}" method="GET"
                        style="display: none;">
                        @csrf
                        <input class="datavalue" type="hidden" name="data[]">
                    </form>
                    <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                        onclick="event.preventDefault(); document.getElementById('exportForm').submit();">
                        <button type="button" class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                            <i class="fa-regular fa-file-excel"></i>
                            <span class="m-0 ml-1">Xuất Excel</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-118">
        <section class="container-fluided">
            <div class="row result-filter-product margin-left30 my-1">
            </div>
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="tab-content">
                                <div id="hanghoa" class="content tab-pane in active">
                                    <div class="outer top-table table-responsive text-nowrap">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr class="">
                                                    <th scope="col" class="border height-52 " style="width: 15%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Tên khách hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    {{-- <th scope="col" class="border height-52 ">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Nợ đầu kì
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th> --}}
                                                    <th scope="col" class="border height-52" style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Bán hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Khách trả hàng
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name_display"
                                                                data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Thu
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name_display"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_name" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Chi
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_name"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border height-52 " style="width: 14%">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="guest_debt" data-sort-type="ASC">
                                                                <button class="btn-sort text-13 bold" type="submit">
                                                                    Nợ cuối kì
                                                                </button>
                                                            </a>
                                                            <div class="icon" id="icon-guest_debt"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-product">
                                                {{-- Không nhóm --}}
                                                <tr>
                                                    <td colspan="10" class="border-bottom bold">Nhóm khách hàng :
                                                        Chưa chọn nhóm</td>
                                                </tr>
                                                @php
                                                    // Khởi tạo các biến tổng cộng không nhóm
                                                    $totalProductVatUngrouped = 0;
                                                    $totalReturnUngrouped = 0;
                                                    $totalCashRecieptUngrouped = 0;
                                                    $totalChiKHUngrouped = 0;
                                                    $totalRemainingUngrouped = 0;

                                                    // Khởi tạo các biến tổng cộng lớn
                                                    $grandTotalProductVat = 0;
                                                    $grandTotalReturn = 0;
                                                    $grandTotalCashReciept = 0;
                                                    $grandTotalChiKH = 0;
                                                    $grandTotalRemaining = 0;
                                                @endphp

                                                @foreach ($debtGuests as $item)
                                                    @if ($item->group_id == 0)
                                                        @php
                                                            $totalProductVatUngrouped += $item->totalProductVat;
                                                            $totalReturnUngrouped += $item->totalReturn;
                                                            $totalCashRecieptUngrouped += $item->totalCashReciept;
                                                            $totalChiKHUngrouped += $item->chiKH;
                                                            $totalRemainingUngrouped +=
                                                                $item->totalProductVat -
                                                                $item->totalCashReciept -
                                                                ($item->totalReturn - $item->chiKH);
                                                        @endphp
                                                        <tr class="position-relative relative main-row product-info"
                                                            data-id="{{ $item->id }}">
                                                            <input type="hidden" name="id-product"
                                                                class="id-product" id="id-product"
                                                                value="{{ $item->id }}">
                                                            <td class="text-13-black border height-52">
                                                                {{ $item->tenKhach }}</td>
                                                            {{-- <td class="text-13-black period border height-52">
                                                                Nợ đầu kì</td> --}}
                                                            <td class="text-13-black totalProductVat border height-52"
                                                                data-id="{{ $item->id }}">
                                                                {{ number_format($item->totalProductVat) }}</td>
                                                            <td class="text-13-black totalReturn border height-52">
                                                                {{ number_format($item->totalReturn) }}</td>
                                                            <td
                                                                class="text-13-black totalCashReciept border height-52">
                                                                {{ number_format($item->totalCashReciept) }}</td>
                                                            <td class="text-13-black chiKH border height-52">
                                                                {{ number_format($item->chiKH) }}</td>
                                                            <td class="text-13-black totalDebt border height-52">
                                                                {{ number_format($item->totalProductVat - $item->totalCashReciept - ($item->totalReturn - $item->chiKH)) }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                <tr class="position-relative relative" data-group="0">
                                                    <td class="text-green bold border height-52 text-right"
                                                        colspan="1">Tổng cộng:
                                                    </td>
                                                    {{-- <td>Tổng nợ đầu kì</td> --}}
                                                    <td
                                                        class="text-green bold border height-52 totalProductVatUngrouped">
                                                        {{ number_format($totalProductVatUngrouped) }}
                                                    </td>
                                                    <td class="text-green bold border height-52 totalReturnUngrouped">
                                                        {{ number_format($totalReturnUngrouped) }}
                                                    </td>
                                                    <td
                                                        class="text-green bold border height-52 totalCashRecieptUngrouped">
                                                        {{ number_format($totalCashRecieptUngrouped) }}
                                                    </td>
                                                    <td class="text-green bold border height-52 chiKHUngrouped">
                                                        {{ number_format($totalChiKHUngrouped) }}
                                                    </td>
                                                    <td
                                                        class="text-green bold border height-52 totalRemainingUngrouped">
                                                        {{ number_format($totalRemainingUngrouped) }}
                                                    </td>
                                                </tr>

                                                {{-- Có nhóm --}}
                                                @foreach ($groups as $value)
                                                    @php
                                                        $totalProductVatGrouped = 0;
                                                        $totalReturnGrouped = 0;
                                                        $totalCashRecieptGrouped = 0;
                                                        $totalChiKHGrouped = 0;
                                                        $totalRemainingGrouped = 0;
                                                    @endphp
                                                    <tr>
                                                        <td colspan="10" class="border-bottom bold">Nhóm khách hàng
                                                            : {{ $value->name }}</td>
                                                    </tr>
                                                    @foreach ($debtGuests as $item)
                                                        @if ($item->group_id == $value->id)
                                                            @php
                                                                $totalProductVatGrouped += $item->totalProductVat;
                                                                $totalReturnGrouped += $item->totalReturn;
                                                                $totalCashRecieptGrouped += $item->totalCashReciept;
                                                                $totalChiKHGrouped += $item->chiKH;
                                                                $totalRemainingGrouped +=
                                                                    $item->totalProductVat -
                                                                    $item->totalCashReciept -
                                                                    ($item->totalReturn - $item->chiKH);
                                                            @endphp
                                                            <tr class="position-relative relative main-row product-info"
                                                                data-id="{{ $item->id }}">
                                                                <input type="hidden" name="id-product"
                                                                    class="id-product" id="id-product"
                                                                    value="{{ $item->id }}">
                                                                <td class="text-13-black border height-52">
                                                                    {{ $item->tenKhach }}</td>
                                                                {{-- <td class="text-13-black period border height-52">
                                                                    Nợ đầu kì</td> --}}
                                                                <td class="text-13-black totalProductVat border height-52"
                                                                    data-id="{{ $item->id }}">
                                                                    {{ number_format($item->totalProductVat) }}</td>
                                                                <td class="text-13-black totalReturn border height-52">
                                                                    {{ number_format($item->totalReturn) }}</td>
                                                                <td
                                                                    class="text-13-black totalCashReciept border height-52">
                                                                    {{ number_format($item->totalCashReciept) }}</td>
                                                                <td class="text-13-black chiKH border height-52">
                                                                    {{ number_format($item->chiKH) }}</td>
                                                                <td class="text-13-black totalDebt border height-52">
                                                                    {{ number_format($item->totalProductVat - $item->totalCashReciept - ($item->totalReturn - $item->chiKH)) }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    <tr class="position-relative relative bg-light"
                                                        data-group="{{ $value->id }}">
                                                        <td class="text-green bold border height-52 text-right"
                                                            colspan="1">Tổng
                                                            cộng:</td>
                                                        {{-- <td>Tổng nợ đầu kì</td> --}}
                                                        <td class="text-green bold border height-52">
                                                            {{ number_format($totalProductVatGrouped) }}
                                                        </td>
                                                        <td class="text-green bold border height-52 totalReturn">
                                                            {{ number_format($totalReturnGrouped) }}
                                                        </td>
                                                        <td class="text-green bold border height-52 totalCashReciept">
                                                            {{ number_format($totalCashRecieptGrouped) }}
                                                        </td>
                                                        <td class="text-green bold border height-52 chiKH">
                                                            {{ number_format($totalChiKHGrouped) }}
                                                        </td>
                                                        <td class="text-green bold border height-52 totalDebt">
                                                            {{ number_format($totalRemainingGrouped) }}
                                                        </td>
                                                    </tr>
                                                    @php
                                                        // Cộng dồn các giá trị của nhóm vào tổng cộng
                                                        $grandTotalProductVat += $totalProductVatGrouped;
                                                        $grandTotalReturn += $totalReturnGrouped;
                                                        $grandTotalCashReciept += $totalCashRecieptGrouped;
                                                        $grandTotalChiKH += $totalChiKHGrouped;
                                                        $grandTotalRemaining += $totalRemainingGrouped;
                                                    @endphp
                                                @endforeach

                                                @php
                                                    // Cộng dồn các giá trị không nhóm vào tổng cộng
                                                    $grandTotalProductVat += $totalProductVatUngrouped;
                                                    $grandTotalReturn += $totalReturnUngrouped;
                                                    $grandTotalCashReciept += $totalCashRecieptUngrouped;
                                                    $grandTotalChiKH += $totalChiKHUngrouped;
                                                    $grandTotalRemaining += $totalRemainingUngrouped;
                                                @endphp
                                            </tbody>
                                            <thead class="sticky-footer">
                                                <tr>
                                                    <th class="text-center text-danger font-weight-bold border height-52"
                                                        style="width: 15%;">
                                                        Tổng cộng tất cả
                                                    </th>
                                                    <th class="text-center text-red border" style="width: 14%;"
                                                        id="grandTotalProductVat">
                                                        {{ number_format($grandTotalProductVat) }}
                                                    </th>
                                                    <th class="text-center text-red border" style="width: 14%;"
                                                        id="grandTotalReturn">
                                                        {{ number_format($grandTotalReturn) }}
                                                    </th>
                                                    <th class="text-center text-red border" style="width: 14%;"
                                                        id="grandTotalCashReciept">
                                                        {{ number_format($grandTotalCashReciept) }}
                                                    </th>
                                                    <th class="text-center text-red border" style="width: 14%;"
                                                        id="grandTotalChiKH">
                                                        {{ number_format($grandTotalChiKH) }}
                                                    </th>
                                                    <th class="text-center text-red border" style="width: 14%;"
                                                        id="grandTotalRemaining">
                                                        {{ number_format($grandTotalRemaining) }}
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<x-print-component :contentId="$title" />
<x-right-click :workspacename="$workspacename" :page="'viewReportDebtGuests'"></x-right-click>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;
        var formData = {
            search: $('#search').val(),
            date: retrieveDateData(this, 'date'), // Ngày báo giá
            customers: getData('#customers', this), // Tên khách hàng
            sales: retrieveComparisonData(this, 'sales'), // Bán hàng
            customer_return: retrieveComparisonData(this, 'customer_return'), // Khách trả hàng
            receive: retrieveComparisonData(this, 'receive'), // Thu
            pay: retrieveComparisonData(this, 'pay'), // Chi
            ending_debt: retrieveComparisonData(this, 'ending_debt'), // Nợ cuối kỳ
            sort: getSortData(buttonElement) // Sắp xếp dữ liệu nếu có
        };
        if (!$(e.target).closest('li, input[type="checkbox"]').length) {
            $('#' + $(this).data('button-name') + '-options').hide();
        }
        // Để lọc filter khi xuất Excel
        var date = formData.date;
        var dataArray = [{
            key: 'date',
            value: date
        }];
        // Chuyển đổi mảng thành chuỗi JSON và lưu vào input hidden
        $('.datavalue').val(JSON.stringify(dataArray));
        // 
        $.ajax({
            type: 'get',
            url: "{{ route('searchDebtGuests') }}",
            data: formData,
            success: function(data) {
                console.log(data);

                updateFiltersReport(data, filters, '.result-filter-product', '.-product',
                    '.product-info', '.id-product', buttonElement);
                // Tính tổng của tất cả các phần tử có class 'totalProductVat'
                var result = sumElements("totalProductVat");
                // In ra tổng cộng tất cả các phần tử
                console.log("Tổng cộng tất cả phần tử:", result.grandTotal);
                // In ra tổng theo từng data-id
                console.log("Tổng theo data-id:", result.totalsById);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
