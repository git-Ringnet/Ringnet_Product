<x-navbar :title="$title" activeGroup="manageProfess" activeName="commission"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner">
            <div class="content__heading--left opacity-0">
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
                        onclick="printContentCustom('printContent', 'print-commission')">In
                        trang
                    </button>
                    <form id="exportFormSales" action="{{ route('exportCommission') }}" method="GET"
                        style="display: none;">
                        @csrf
                        <input class="datavalue" type="hidden" name="data[]">
                    </form>
                    <a href="#" class="activity mr-3" data-name1="NCC" data-des="Export excel"
                        onclick="event.preventDefault(); document.getElementById('exportFormSales').submit();">
                        <button type="button" class="btn btn-outline-secondary mx-1 d-flex align-items-center h-100">
                            <i class="fa-regular fa-file-excel"></i>
                            <span class="m-0 ml-1">Xuất Excel</span>
                        </button>
                    </a>
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
                                    <div class="position-relative relative ml-1">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </form>
                                <div class="dropdown mx-1">
                                    <button class="filter-btn ml-2 align-items-center d-flex border mb-0"
                                        data-toggle="dropdown">
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
                                        <span class="text-btnIner mx-1">Bộ lọc</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.82078 6.15415C5.02632 5.94862 5.35956 5.94862 5.5651 6.15415L7.99996 8.58901L10.4348 6.15415C10.6404 5.94862 10.9736 5.94862 11.1791 6.15415C11.3847 6.35969 11.3847 6.69294 11.1791 6.89848L8.37212 9.70549C8.16658 9.91103 7.83334 9.91103 7.6278 9.70549L4.82078 6.89848C4.61524 6.69294 4.61524 6.35969 4.82078 6.15415Z"
                                                fill="#26273B" fill-opacity="0.8" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-date"
                                                data-button="date" type="button">Ngày
                                            </button>
                                            {{-- <button class="dropdown-item btndropdown text-13-black btn-code"
                                                id="btn-code-import" data-button="code" data-button="import"
                                                type="button">Mã nhà cung cấp
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black btn-name"
                                                id="btn-name-import" data-button="name" data-button="import"
                                                type="button">Công ty
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black btn-total"
                                                id="btn-total-import" data-button="import" data-button="total"
                                                type="button">
                                                Tổng thanh toán
                                            </button> --}}
                                        </div>
                                    </div>
                                    <x-filter-date-time name="date" title="Ngày lập phiếu" />
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-127">
        <section class="content">
            <div class="container-fluided">
                <div class="row result-filter-import margin-left30 my-1">
                </div>
                <div class="row">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="outer2 text-nowrap" id="print-commission">
                                <table id="example2" class="table table-hover bg-white rounded">
                                    <thead class="border-custom">
                                        <tr style="height: 44px;">
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Mã phiếu</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Khách hàng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Nhóm hàng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Mã hàng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Tên hàng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>

                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Đơn vị tính</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Số lượng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Hoa hồng (VND)</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Tổng cộng (hoa hồng * số
                                                                lượng)</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                            <th class="height-52 border" scope="col" style="">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="group_type" data-sort-type="DESC">
                                                        <button class="btn-sort" type="submit">
                                                            <span class="text-13">Trạng thái giao</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sell">
                                        <tr>
                                            <td colspan="12" class="border-bottom bold">Nhóm đối tượng: Chưa chọn
                                                nhóm</td>
                                        </tr>

                                        @php
                                            // Tổng cộng cho tất cả nhân viên
                                            $grandTotalDeliverQty = 0;
                                            $grandTotalCommission = 0;
                                            $grandTotalAmount = 0;
                                        @endphp

                                        @foreach ($users as $item)
                                            @if ($item->group_id == 0)
                                                <tr>
                                                    <td class="border-bottom bold"></td>
                                                    <td colspan="11" class="border-bottom bold">Nhân viên:
                                                        {{ $item->name }}</td>
                                                </tr>
                                                @php
                                                    $totalDeliverQty = 0;
                                                    $totalCommission = 0;
                                                    $totalAmount = 0;
                                                @endphp

                                                @foreach ($allDelivery as $itemDelivery)
                                                    @php
                                                        $matchedItems = $productDelivered
                                                            ->where('detailexport_id', $itemDelivery->id)
                                                            ->where('id_sale', $item->id);
                                                        $count = $matchedItems->count();
                                                    @endphp

                                                    @if ($matchedItems->isNotEmpty())
                                                        @foreach ($matchedItems as $matchedItem)
                                                            @php
                                                                $totalDeliverQty += $matchedItem->product_qty;
                                                                $totalCommission += $matchedItem->commission;
                                                                $totalAmount += $matchedItem->total_amount;
                                                            @endphp
                                                            <tr class="position-relative relative sell-info">
                                                                <input type="hidden" value="{{ $itemDelivery->id }}"
                                                                    class="sell">
                                                                @if ($loop->first)
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->maPhieu }}
                                                                    </td>
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->nameGuest }}
                                                                    </td>
                                                                @endif
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->nameGr }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_code }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_name }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ $matchedItem->product_unit }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ number_format($matchedItem->product_qty) }}</td>
                                                                <td class="text-13-black height-52 border">
                                                                    <input type="text" autocomplete="off"
                                                                        class="border-0 px-2 py-1 w-100 number commission height-32"
                                                                        data-sale="{{ $item->id }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        value="{{ number_format($matchedItem->commission) }}"
                                                                        name="commission[]">
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    <input type="text" autocomplete="off"
                                                                        class="border-0 px-2 py-1 w-100 commission_total height-32"
                                                                        data-sale="{{ $item->id }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        value="{{ number_format($matchedItem->total_amount) }}"
                                                                        readonly name="commission_total[]">
                                                                </td>
                                                                <td class="text-13-black height-52 border text-center">
                                                                    <input type="checkbox" class="checkbox-status"
                                                                        name="checkbox_name[]"
                                                                        data-sale="{{ $item->id }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        value="{{ $item->id }}"
                                                                        {{ $matchedItem->statusCM == 1 ? 'checked' : '' }}>
                                                                </td>
                                                                <input type="hidden" class="qty"
                                                                    value="{{ $matchedItem->product_qty }}">
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                <!-- Tổng cộng cho từng nhân viên -->
                                                @php
                                                    // Cộng dồn vào tổng cộng chung
                                                    $grandTotalDeliverQty += $totalDeliverQty;
                                                    $grandTotalCommission += $totalCommission;
                                                    $grandTotalAmount += $totalAmount;
                                                @endphp

                                                <tr class="bold">
                                                    <td colspan="6" class="text-right border">Tổng cộng cho nhân
                                                        viên {{ $item->name }}:</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($totalDeliverQty) }}</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($totalCommission) }}</td>
                                                    <td class="text-13-black height-52 border">
                                                        {{ number_format($totalAmount) }}</td>
                                                    <td colspan="4" class="border"></td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <!-- Tổng cộng cuối cùng cho tất cả nhân viên -->
                                        <tr class="bold">
                                            <td colspan="6" class="text-right border">Tổng cộng tất cả nhân viên:
                                            </td>
                                            <td class="text-13-black height-52 border">
                                                {{ number_format($grandTotalDeliverQty) }}</td>
                                            <td class="text-13-black height-52 border">
                                                {{ number_format($grandTotalCommission) }}</td>
                                            <td class="text-13-black height-52 border">
                                                {{ number_format($grandTotalAmount) }}</td>
                                            <td colspan="4" class="border"></td>
                                        </tr>
                                    </tbody>



                                </table>
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

            </table>

        </div>
    </div>
</div>
<x-print-component :contentId="$title" />
<script src="{{ asset('/dist/js/report.js') }}"></script>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('blur', '.commission', function() {
            var $row = $(this).closest('tr');
            var $commissionTotal = $row.find('.commission_total');
            var qty = $row.find('.qty').val();
            var month = $(this).data('month');
            var sale = $(this).data('sale');
            var quote = $(this).data('quote');
            var value = $(this).val();
            $.ajax({
                url: "{{ route('updateOrCreate') }}",
                type: "get",
                data: {
                    month: month,
                    sale: sale,
                    quote: quote,
                    value: value,
                    qty: qty,
                    _token: $('meta[name="csrf-token"]').attr(
                        'content')
                },
                success: function(response) {
                    $commissionTotal.val(formatCurrency(response.data.total_amount))
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.error('Error:', error);
                }
            });
        });

        $(document).on('change', '.checkbox-status', function() {
            var sale = $(this).data('sale');
            var quote = $(this).data('quote');
            var isChecked = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('updateStatusCommission') }}",
                type: "get",
                data: {
                    sale: sale,
                    quote: quote,
                    isChecked: isChecked,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Xử lý khi thành công
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.error('Error:', error);
                }
            });
        });

        addHighlightFunctionality(".table-sell", ".sell");
    });

    var filters = [];
    var idName = [];
    var svgtop =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
    var svgbot =
        "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"

    $(document).on('click', '.btn-submit', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            e.preventDefault();
        }
        var buttonName = $(this).data('button');
        var btn_submit = $(this).data('button-name');
        var search = $('#search').val();
        var date_start = $('#date_start_date').val();
        var date_end = $('#date_end_date').val();
        var date = [date_start, date_end];

        var dataArray = [{
            key: 'date',
            value: date
        }, ];

        // Chuyển đổi mảng thành chuỗi JSON và lưu vào input hidden
        $('.datavalue').val(JSON.stringify(dataArray));
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
        if ($(this).data('delete') === 'date') {
            date = null;
            $('#date_start_date').val('');
            $('#date_end_date').val('');
        }
        $.ajax({
            type: 'get',
            url: "{{ route('searchCommission') }}",
            data: {
                search: search,
                date: date,
                sort: sort,
            },
            success: function(data) {
                updateFilters(data, filters, '.result-filter-import', '.tbody-sell',
                    '.sell-info', '.sell', buttonName);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
