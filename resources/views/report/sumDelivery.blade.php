<x-navbar :title="$title" activeGroup="statistic" activeName="sumDelivery"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner mt-4">
            <div class="content__heading--left">
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
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    {{-- In and export --}}
                    <button class="mx-1 d-flex align-items-center btn-primary rounded"
                        onclick="printContent('printContent', 'data','foot')">In
                        trang</button>
                    <form id="exportForm" action="{{ route('exportReportDelivery') }}" method="GET"
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
                                                <button class="dropdown-item btndropdown text-13-black"
                                                    id="btn-delivery_date" data-button="delivery_date"
                                                    type="button">Ngày giao hàng</button>
                                                <button class="dropdown-item btndropdown text-13-black"
                                                    id="btn-status" data-button="status" type="button">Trạng thái
                                                    giao</button>
                                            </div>
                                        </div>
                                        <!-- Input fields for filtering -->
                                        <x-filter-date-time name="date" title="Ngày" />
                                        <x-filter-text name="maphieu" title="Mã phiếu" />
                                        <x-filter-text name="customers" title="Tên khách hàng" />
                                        <x-filter-date-time name="delivery_date" title="Ngày giao hàng" />
                                        <x-filter-status name="status" key1="1" value1="Nháp" key2="2"
                                            value2="Đã giao" color1="#858585" color2="#08AA36BF"
                                            title="Trạng thái giao" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 12.9rem;">
        <section class="container-fluided">
            <div class="row result-filter-product margin-left30 my-1">
            </div>
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="" id="data">
                                <div class="outer top-table table-responsive text-nowrap">
                                    <table id="example2" class="table table-hover">
                                        <thead style="position: sticky">
                                            <tr>
                                                <th scope="col" class="height-52 border" style="width: 10%">
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
                                                <th scope="col" class="height-52 border" style="width: 10%">
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
                                                <th scope="col" class="height-52 border" style="width: 10%">
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
                                                {{-- <th scope="col" class="height-52 border" style="width: 14%">
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
                                                <th scope="col" class="height-52 border" style="width: 14%">
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
                                                <th scope="col" class="height-52 border" style="width: 14%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Còn lại
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th> --}}
                                                <th scope="col" class="height-52 border" style="width: 14%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="guest_debt"
                                                            data-sort-type="ASC">
                                                            <button class="btn-sort text-13 bold" type="submit">
                                                                Ngày giao hàng
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_debt"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border" style="width: 14%">
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
                                        <tbody class="table-buy">
                                            @php
                                                $totalVatSum = 0;
                                                $totalAfterVatSum = 0;
                                                $totalConlai = 0;
                                            @endphp
                                            @foreach ($sumDelivery as $item)
                                                @php
                                                    $totalVatSum += $item->tongTien;
                                                    $totalAfterVatSum += $item->tongTien - $item->conLai;
                                                    $totalConlai += $item->conLai;
                                                @endphp
                                                <tr class="main-row product-info" data-id="{{ $item->id }}">
                                                    <input type="hidden" value="{{ $item->id }}"
                                                        name="id-product" class="id-product" id="id-product">
                                                    <td class="text-13-black height-52 border">
                                                        {{ date_format(new DateTime($item->ngayTao), 'd/m/Y') }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ $item->maPhieu }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ $item->nameGuest }}
                                                    </td>
                                                    {{-- <td class="text-13-black height-52 border">
                                                        {{ number_format($item->tongTien) }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($item->tongTien - $item->conLai) }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($item->conLai) }}
                                                    </td> --}}
                                                    <td class="text-13-black height-52 border">
                                                        {{ date_format(new DateTime($item->ngayGiao), 'd/m/Y') }}
                                                    </td>
                                                    <td class="text-13-black height-52 border">
                                                        @if ($item->trangThai == 1)
                                                            <span>Nháp</span>
                                                        @elseif ($item->trangThai == 2)
                                                            <span class="text-green">Đã giao</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr class="position-relative relative">
                                                <td colspan="3"
                                                    class="text-red bold height-52 border text-right font-weight-bold">
                                                    Tổng cộng:
                                                </td>
                                                <td class="text-red bold height-52 border font-weight-bold">
                                                    {{ number_format($totalVatSum) }}
                                                </td>
                                                <td class="text-red bold height-52 border font-weight-bold">
                                                    {{ number_format($totalAfterVatSum) }}
                                                </td>
                                                <td class="text-red bold height-52 border font-weight-bold">
                                                    {{ number_format($totalConlai) }}
                                                </td>
                                                <td colspan="2" class="text-red bold height-52 border"></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="w-100 bg-filter-search position-fixed" style="height: 30px;bottom: 10px;left: 0;" id="foot">
        <div class="position-relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>
                    <tr>
                        <th class="text-center text-danger font-weight-bold border height-52" style="width: 30%;">
                            Tổng cộng
                        </th>
                        <th class="text-center text-red border" style="width: 14%;">
                            {{ number_format($totalVatSum) }}
                        </th>
                        <th class="text-center text-red border" style="width: 14%;">
                            {{ number_format($totalAfterVatSum) }}
                        </th>
                        <th class="text-center text-red border" style="width: 14%;">
                            {{ number_format($totalConlai) }}
                        </th>
                        <th style="width: 14%;"></th>
                        <th style="width:;"></th>


                    </tr>
                </thead>
            </table>
            <div class="position-absolute px-4 pt-1 border bg-white" style="right: 37%;">
                <span class="text-danger font-weight-bold">{{ number_format($total)}}</span>
            </div>
        </div>
    </div> --}}
</div>
<x-right-click :workspacename="$workspacename" :page="'sumDelivery'"></x-right-click>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) e.preventDefault();
        var buttonElement = this;
        var formData = {
            search: $('#search').val(), // Dữ liệu tìm kiếm
            date: retrieveDateData(this, 'date'), // Ngày
            maphieu: getData('#maphieu', this), // Mã phiếu
            customers: getData('#customers', this), // Tên khách hàng
            delivery_date: retrieveDateData(this, 'delivery_date'), // Ngày giao hàng
            status: getStatusData(this, 'status'), // Trạng thái giao
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
            url: "{{ route('searchRPDelivery') }}",
            data: formData,
            success: function(data) {
                updateFilters(data, filters, '.result-filter-product', '.table-buy',
                    '.product-info', '.id-product', buttonElement);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
