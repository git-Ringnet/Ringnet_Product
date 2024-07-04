<x-navbar :title="$title" activeGroup="statistic" activeName="viewReportReturnImport"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner mt-4">
            <div class="content__heading--left ">
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
                                            <button class="dropdown-item btndropdown text-13-black btn-code"
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
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black btn-debt"
                                                id="btn-debt-import" data-button="import" data-button="debt"
                                                type="button">
                                                Công nợ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="mx-1 d-flex align-items-center btn-primary rounded"
                                    onclick="printContent('printContent', 'buy','foot')">In
                                    trang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 14.5rem;">
        <section class="container-fluided">
            <div class="tab-content">
                <div id="buy" class="content tab-pane in active">
                    <div class="row  p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="">
                                <div class="outer top-table table-responsive text-nowrap">
                                    <table id="example2" class="table table-hover">
                                        <thead style="position: sticky">
                                            <tr>
                                                {{-- <th scope="col" class="height-52 border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                STT
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th> --}}
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Ngày
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Số phiếu
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="height-52 border"
                                                    style="width: 7.692307692307692%">
                                                    <span class="d-flex justify-content-end">
                                                        <a href="#" class="sort-link"
                                                            data-sort-by="guest_name_display" data-sort-type="ASC">
                                                            <button class="btn-sort text-13" type="submit">
                                                                Tên nhà cung cấp
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Tên hàng hóa
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
                                                            <button class="btn-sort text-13" type="submit">
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
                                                            <button class="btn-sort text-13" type="submit">
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
                                                            <button class="btn-sort text-13" type="submit">
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Thành tiền
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Tổng cộng
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Thanh toán
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Còn lại
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Ghi chú
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
                                                            <button class="btn-sort text-13" type="submit">
                                                                Trạng thái
                                                            </button>
                                                        </a>
                                                        <div class="icon" id="icon-guest_name_display"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        @php
                                            // Khởi tạo các biến để tính tổng cộng
                                            $totalQtyReturn = 0;
                                            $totalPriceProduct = 0;
                                            $totalAmount = 0;
                                            $totalTotal = 0;
                                            $totalPayment = 0;
                                            $totalBalance = 0;
                                        @endphp

                                        <tbody class="table-return">
                                            @foreach ($allReturn as $itemReturn)
                                                @php
                                                    $matchedItems = $sumReturnImport->where(
                                                        'idReturn',
                                                        $itemReturn->id,
                                                    );
                                                    $count = count($matchedItems);
                                                @endphp

                                                @if ($matchedItems->isNotEmpty())
                                                    @foreach ($matchedItems as $item)
                                                        @php
                                                            $totalQtyReturn += $item->qtyReturn;
                                                            $totalPriceProduct += $item->priceProduct;
                                                            $totalAmount += $item->qtyReturn * $item->priceProduct;
                                                        @endphp

                                                        <tr class="position-relative relative">
                                                            <input type="hidden" value="{{ $itemReturn->id }}"
                                                                class="return">
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->created_at : '' }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->return_code : '' }}
                                                            </td>
                                                            <td rowspan="{{ $count }}"
                                                                class="text-13-black height-52 border {{ $loop->first ? '' : 'd-none' }}">
                                                                {{ $loop->first ? $itemReturn->nameProvide : '' }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ $item->nameProduct }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ $item->unitProduct }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ number_format($item->qtyReturn) }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ number_format($item->priceProduct) }}
                                                            </td>
                                                            <td class="text-13-black height-52 border">
                                                                {{ number_format($item->qtyReturn * $item->priceProduct) }}
                                                            </td>
                                                            @if ($loop->first)
                                                                @php
                                                                    $totalTotal += $itemReturn->total;
                                                                    $totalPayment += $itemReturn->payment;
                                                                    $totalBalance +=
                                                                        $itemReturn->total - $itemReturn->payment;
                                                                @endphp
                                                                <td rowspan="{{ $count }}"
                                                                    class="text-13-black height-52 border">
                                                                    {{ number_format($itemReturn->total) }}
                                                                </td>
                                                                <td rowspan="{{ $count }}"
                                                                    class="text-13-black height-52 border">
                                                                    {{ number_format($itemReturn->payment) }}
                                                                </td>
                                                                <td rowspan="{{ $count }}"
                                                                    class="text-13-black height-52 border">
                                                                    {{ number_format($itemReturn->total - $itemReturn->payment) }}
                                                                </td>
                                                                <td rowspan="{{ $count }}"
                                                                    class="text-13-black height-52 border">
                                                                    {{ $itemReturn->description }}
                                                                </td>
                                                                <td rowspan="{{ $count }}"
                                                                    class="text-13-black height-52 border">
                                                                    @if ($itemReturn->status == 1)
                                                                        <span>Nháp</span>
                                                                    @elseif ($itemReturn->status == 2)
                                                                        <span class="text-green">Đã giao</span>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            {{-- <tr>
                                                <td colspan="5" class="text-13 bold text-right height-52 border">
                                                    Tổng cộng
                                                </td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalQtyReturn) }}</td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalPriceProduct) }}</td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalAmount) }}</td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalTotal) }}</td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalPayment) }}</td>
                                                <td class="text-13 bold height-52 border">
                                                    {{ number_format($totalBalance) }}</td>
                                                <td colspan="3" class="text-13 bold height-52 border"></td>
                                            </tr> --}}
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
        <div class="position-relative relative">
            <table class="table table-hover position-absolute bg-white border-0">
                <thead>
                    <tr>
                        <th class="text-center text-danger font-weight-bold border height-52"
                            style="width: 38.46153846153846% !important;">
                            Tổng cộng
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692% !important;">
                            {{ number_format($totalQtyReturn) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692% !important;">
                            {{ number_format($totalPriceProduct) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692% !important;">
                            {{ number_format($totalAmount) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692% !important;">
                            {{ number_format($totalTotal) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.692307692307692% !important;">
                            {{ number_format($totalPayment) }}
                        </th>
                        <th class="text-center text-red border" style="width: 6.95% !important;">
                            {{ number_format($totalBalance) }}
                        </th>
                        <th class="text-center text-red border" style="width: 7.05% !important;">

                        </th>
                        <th class="text-center text-red border" style="width: 7.85% !important;">

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
<x-print-component :contentId="$title" />

<script src="{{ asset('/dist/js/report.js') }}"></script>
<script>
    $(document).ready(function() {
        addHighlightFunctionality(".table-return", ".return");
    });
</script>
