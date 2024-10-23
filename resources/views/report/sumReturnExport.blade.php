<x-navbar :title="$title" activeGroup="statistic" activeName="sumReturnExport"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
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
                                data-button="date" type="button">Ngày</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-maphieu" data-button="maphieu" type="button">Mã
                                phiếu</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-customers" data-button="customers" type="button">Tên
                                khách hàng</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-name"
                                data-button="name" type="button">Tên
                                hàng hoá</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-dvt"
                                data-button="dvt" type="button">ĐVT</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-quantity" data-button="quantity" type="button">Số
                                lượng</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-unit_price" data-button="unit_price" type="button">Đơn
                                giá</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-price"
                                data-button="price" type="button">Thành tiền</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-total"
                                data-button="total" type="button">Tổng cộng</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-payment" data-button="payment" type="button">Thanh
                                toán</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-remaining" data-button="remaining" type="button">Còn
                                lại</button>
                            <button class="dropdown-item btndropdown text-13-black" id="btn-note"
                                data-button="note" type="button">Ghi chú</button>
                            <button class="dropdown-item btndropdown text-13-black"
                                id="btn-status" data-button="status" type="button">Trạng thái
                                giao</button>
                        </div>
                    </div>
                    <!-- Input fields for filtering -->
                    <x-filter-date-time name="date" title="Ngày" />
                    <x-filter-text name="maphieu" title="Mã phiếu" />
                    <x-filter-text name="customers" title="Tên khách hàng" />
                    <x-filter-text name="name" title="Tên hàng hoá" />
                    <x-filter-text name="dvt" title="ĐVT" />
                    <x-filter-compare name="quantity" title="Số lượng" />
                    <x-filter-compare name="unit_price" title="Đơn giá" />
                    <x-filter-compare name="price" title="Thành tiền" />
                    <x-filter-compare name="total" title="Tổng cộng" />
                    <x-filter-compare name="payment" title="Thanh toán" />
                    <x-filter-compare name="remaining" title="Còn lại" />
                    <x-filter-text name="note" title="Ghi chú" />
                    <x-filter-status name="status" key1="1" value1="Nháp" key2="2"
                        value2="Đã giao" color1="#858585" color2="#08AA36BF"
                        title="Trạng thái giao" />
                </div>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    {{-- In and export --}}
                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                        onclick="printContent('printContent', 'data','foot')">In
                        trang</button>
                    <form id="exportForm" action="{{ route('exportReportReturnE') }}" method="GET"
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
    <div class="content" style="margin-top: 8.4rem;">
        <section class="container-fluided">
            <div class="row result-filter-product margin-left30 my-1">
            </div>
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="" id="data">
                                <div class="outer top-table table-responsive text-nowrap">
                                    <table id="example2" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Ngày
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Mã phiếu
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Tên khách hàng
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Tên hàng hoá
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                ĐVT
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Số lượng
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Đơn giá
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Thành tiền
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_name"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Tổng cộng
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Thanh toán
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Còn lại
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Ghi chú
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Trạng thái giao
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-return">
                                            @php
                                                $totalQtyReturn = 0;
                                                $totalPriceProduct = 0;
                                                $totalProductTotal = 0;
                                                $total_return = 0;
                                                $totalPayment = 0;
                                                $totalRemaining = 0;
                                            @endphp

                                            @foreach ($allReturn as $itemReturn)
                                                @php
                                                    $matchedItems = $sumReturnExport->where(
                                                        'idReturn',
                                                        $itemReturn->id,
                                                    );
                                                    $count = count($matchedItems);
                                                @endphp

                                                @if ($matchedItems->isNotEmpty())
                                                    @foreach ($matchedItems as $item)
                                                        <tr class="main-row product-info"
                                                            data-id="{{ $itemReturn->id }}">
                                                            <input type="hidden" value="{{ $itemReturn->id }}"
                                                                class="return">
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? date_format(new DateTime($itemReturn->created_at), 'd/m/Y') : '' }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->code_return : '' }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->nameGuest : '' }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ $item->nameProduct }}</td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ $item->unitProduct }}</td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ $item->qtyReturn }}</td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ number_format($item->priceProduct) }}</td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ number_format($item->product_total) }}</td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ number_format($itemReturn->total_return) }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ number_format($itemReturn->payment) }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ number_format($itemReturn->total_return - $itemReturn->payment) }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->description : '' }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                @if ($loop->first)
                                                                    @if ($itemReturn->status == 1)
                                                                        <span>Nháp</span>
                                                                    @elseif ($itemReturn->status == 2)
                                                                        <span class="text-green">Đã giao</span>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    @php
                                                        $totalQtyReturn += $matchedItems->sum('qtyReturn');
                                                        $totalPriceProduct += $matchedItems->sum('priceProduct');
                                                        $totalProductTotal += $matchedItems->sum('product_total');
                                                        $total_return += $itemReturn->total_return;
                                                        $totalPayment += $itemReturn->payment;
                                                        $totalRemaining +=
                                                            $itemReturn->total_return - $itemReturn->payment;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="w-100 bg-filter-search position-fixed" style="height: 30px;bottom: 10px;left: 0;" id="foot">
        <div class="position-relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>
                    <tr>
                        <th class="text-center text-danger font-weight-bold border height-52"
                            style="width: 38.46153846153846%;">
                            Tổng cộng
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ $totalQtyReturn }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ number_format($totalPriceProduct) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ number_format($totalProductTotal) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ number_format($total_return) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ number_format($totalPayment) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">
                            {{ number_format($totalRemaining) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">

                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692%;">

                        </th>
                    </tr>
                </thead>
            </table>
            {{-- <div class="position-absolute px-4 pt-1 border bg-white" style="right: 37%;">
                <span class="text-danger font-weight-bold">{{ number_format($total)}}</span>
            </div> --}}
        </div>
    </div>
</div>
<x-right-click :workspacename="$workspacename" :page="'viewReportSumReturnExport'"></x-right-click>
<x-print-component :contentId="$title" />

<script src="{{ asset('/dist/js/report.js') }}"></script>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;
        var formData = {
            search: $('#search').val(), // Nếu có trường tìm kiếm chung
            date: retrieveDateData(this, 'date'), // Lọc theo ngày
            maphieu: getData('#maphieu', this), // Mã phiếu
            customers: getData('#customers', this), // Tên khách hàng
            name: getData('#name', this), // Tên hàng hoá
            dvt: getData('#dvt', this), // ĐVT (Đơn vị tính)
            quantity: retrieveComparisonData(this, 'quantity'), // Số lượng
            unit_price: retrieveComparisonData(this, 'unit_price'), // Đơn giá
            price: retrieveComparisonData(this, 'price'), // Thành tiền
            total: retrieveComparisonData(this, 'total'), // Tổng cộng
            payment: retrieveComparisonData(this, 'payment'), // Thanh toán
            remaining: retrieveComparisonData(this, 'remaining'), // Còn lại
            note: getData('#note', this), // Ghi chú
            status: getStatusData(this, 'status'), // Trạng thái giao
            sort: getSortData(buttonElement) // Nếu có sắp xếp dữ liệu
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
            url: "{{ route('searchRPReturnE') }}",
            data: formData,
            success: function(data) {
                updateFilters(data, filters, '.result-filter-product', '.table-return',
                    '.product-info', '.return', buttonElement);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });


    $(document).ready(function() {
        addHighlightFunctionality(".table-return", ".return");
    });
</script>
