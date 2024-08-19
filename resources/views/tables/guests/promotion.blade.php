<x-navbar :title="$title" activeGroup="manageProfess" activeName="promotion"></x-navbar>
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
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="dropdown mx-1">
                                    <button class="filter-btn ml-2 align-items-center d-flex border mb-0"
                                        id="filter-date" data-toggle="dropdown">
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
                                        <span class="text-btnIner mx-1">Lọc theo tháng</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.82078 6.15415C5.02632 5.94862 5.35956 5.94862 5.5651 6.15415L7.99996 8.58901L10.4348 6.15415C10.6404 5.94862 10.9736 5.94862 11.1791 6.15415C11.3847 6.35969 11.3847 6.69294 11.1791 6.89848L8.37212 9.70549C8.16658 9.91103 7.83334 9.91103 7.6278 9.70549L4.82078 6.89848C4.61524 6.69294 4.61524 6.35969 4.82078 6.15415Z"
                                                fill="#26273B" fill-opacity="0.8" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu d-none" id="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton">
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black d-none"
                                                id="btn-date" data-button="date" type="button">Chọn tháng
                                            </button>
                                        </div>
                                    </div>
                                    <x-filter-month name="date" title="Tháng" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-142">
        <section class="content">
            <div class="container-fluided">
                <div class="row result-filter-import margin-left30 my-1">
                </div>
                <div class="row">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="outer2 text-nowrap">
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
                                                            <span class="text-13">Nhân viên Sale</span>
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
                                                            <span class="text-13">Đơn giá</span>
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
                                                            <span class="text-13">Thành tiền</span>
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
                                                            <span class="text-13">Bao (Số lượng)</span>
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
                                                            <span class="text-13">Tiền(VND)</span>
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
                                                            <span class="text-13">Vàng</span>
                                                        </button>
                                                    </a>
                                                    <div class="icon"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sell">
                                        <tr>
                                            <td colspan="12" class="border-bottom bold">Nhóm khách hàng:
                                                Chưa chọn nhóm</td>
                                        </tr>
                                        @foreach ($guest as $item)
                                            @if ($item->group_id == 0)
                                                <tr>
                                                    <td class="border-bottom bold"></td>
                                                    <td colspan="11" class="border-bottom bold">Khách hàng:
                                                        {{ $item->guest_name_display }}</td>
                                                </tr>
                                                @php
                                                    $totalDeliverQty = 0;
                                                    $totalPriceExport = 0;
                                                    $totalProductTotalVat = 0;
                                                    $totalItemDeliveryTotalProductVat = 0;
                                                    $Pay = 0;
                                                    $Remai = 0;
                                                    $totalPay = 0;
                                                    $totalRemai = 0;
                                                    $totalProductQuantity = 0;
                                                    $totalCashValue = 0;
                                                    $goldValues = []; // Initialize an array to hold gold values
                                                    $stt = 1; // Initialize the STT variable
                                                @endphp

                                                @foreach ($allDelivery as $itemDelivery)
                                                    @php
                                                        $matchedItems = $productDelivered
                                                            ->where('detailexport_id', $itemDelivery->id)
                                                            ->where('guest_id', $item->id);
                                                        $count = $matchedItems->count();
                                                    @endphp

                                                    @if ($matchedItems->isNotEmpty())
                                                        @php
                                                            $totalItemDeliveryTotalProductVat +=
                                                                $itemDelivery->totalProductVat +
                                                                $itemDelivery->total_tax;
                                                            $Pay =
                                                                $itemDelivery->totalProductVat +
                                                                $itemDelivery->total_tax -
                                                                $itemDelivery->amount_owed;
                                                            $Remai = $itemDelivery->amount_owed;
                                                            $totalPay += $Pay;
                                                            $totalRemai += $Remai;
                                                        @endphp

                                                        @foreach ($matchedItems as $matchedItem)
                                                            @php
                                                                $totalDeliverQty += $matchedItem->product_qty;
                                                                $totalPriceExport += $matchedItem->price_export;
                                                                $totalProductTotalVat += $matchedItem->product_total;
                                                                $totalProductQuantity += $matchedItem->product_quantity;
                                                                $totalCashValue += $matchedItem->cash_value;
                                                                if (!empty($matchedItem->gold_value)) {
                                                                    $goldValues[] = $matchedItem->gold_value; // Collect non-empty gold values into the array
                                                                }
                                                            @endphp
                                                            <tr class="position-relative relative">
                                                                <input type="hidden" value="{{ $itemDelivery->id }}"
                                                                    class="sell">
                                                                @if ($loop->first)
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->maPhieu }}</td>
                                                                    <td rowspan="{{ $count }}"
                                                                        class="text-13-black height-52 border">
                                                                        {{ $itemDelivery->nameGuest }}</td>
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
                                                                    {{ number_format($matchedItem->price_export) }}
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    {{ number_format($matchedItem->product_total) }}
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    <input type="text" autocomplete="off"
                                                                        class="border-0 px-2 py-1 w-100 number product_quantity height-32"
                                                                        data-type="quantity"
                                                                        data-guest="{{ $item->id }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        value="{{ number_format($matchedItem->product_quantity) }}"
                                                                        name="product_quantity[]">
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    <input type="text" autocomplete="off"
                                                                        class="border-0 px-2 py-1 w-100 cash_value number height-32"
                                                                        data-type="cash"
                                                                        data-guest="{{ $item->id }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        value="{{ number_format($matchedItem->cash_value) }}"
                                                                        name="cash_value[]">
                                                                </td>
                                                                <td class="text-13-black height-52 border">
                                                                    <input type="text" autocomplete="off"
                                                                        class="border-0 px-2 py-1 w-100 gold_value height-32"
                                                                        data-type="gold"
                                                                        data-guest="{{ $item->id }}"
                                                                        data-quote="{{ $matchedItem->id_quote }}"
                                                                        data-month="{{ $itemDelivery->ngayTao }}"
                                                                        value="{{ $matchedItem->gold_value }}"
                                                                        name="gold_value[]">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @php
                                                            $stt++; // Increment STT after each invoice
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <!-- Add total row for each guest -->
                                                <tr>
                                                    <td colspan="6" class="border-top bold text-right">Tổng cộng:
                                                    </td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ number_format($totalDeliverQty) }}</td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ number_format($totalPriceExport) }}</td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ number_format($totalProductTotalVat) }}</td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ number_format($totalProductQuantity) }}</td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ number_format($totalCashValue) }}</td>
                                                    <td class="border-top text-13-black height-52 border">
                                                        {{ implode(', ', $goldValues) }}</td>
                                                    <!-- Combine gold values into a comma-separated string -->
                                                </tr>
                                            @endif
                                        @endforeach

                                        @foreach ($groupGuests as $value)
                                            <tr>
                                                <td colspan="12" class="border-bottom bold">Nhóm khách hàng:
                                                    {{ $value->name }}</td>
                                            </tr>
                                            @foreach ($guest as $item)
                                                @if ($item->group_id == $value->id)
                                                    <tr>
                                                        <td class="border-bottom bold"></td>
                                                        <td colspan="11" class="border-bottom bold">Khách hàng:
                                                            {{ $item->guest_name_display }}</td>
                                                    </tr>
                                                    @php
                                                        $totalDeliverQty = 0;
                                                        $totalPriceExport = 0;
                                                        $totalProductTotalVat = 0;
                                                        $totalProductQuantity = 0;
                                                        $totalCashValue = 0;
                                                        $goldValues = []; // Initialize an array to hold gold values
                                                        $stt = 1; // Initialize the STT variable
                                                    @endphp

                                                    @foreach ($allDelivery as $itemDelivery)
                                                        @php
                                                            $matchedItems = $productDelivered
                                                                ->where('detailexport_id', $itemDelivery->id)
                                                                ->where('guest_id', $item->id);
                                                            $count = $matchedItems->count();
                                                        @endphp

                                                        @if ($matchedItems->isNotEmpty())
                                                            @php
                                                                $totalItemDeliveryTotalProductVat +=
                                                                    $itemDelivery->totalProductVat +
                                                                    $itemDelivery->total_tax;
                                                                $Pay =
                                                                    $itemDelivery->totalProductVat +
                                                                    $itemDelivery->total_tax -
                                                                    $itemDelivery->amount_owed;
                                                                $Remai = $itemDelivery->amount_owed;
                                                                $totalPay += $Pay;
                                                                $totalRemai += $Remai;
                                                            @endphp

                                                            @foreach ($matchedItems as $matchedItem)
                                                                @php
                                                                    $totalDeliverQty += $matchedItem->product_qty;
                                                                    $totalPriceExport += $matchedItem->price_export;
                                                                    $totalProductTotalVat +=
                                                                        $matchedItem->product_total;
                                                                    $totalProductQuantity +=
                                                                        $matchedItem->product_quantity;
                                                                    $totalCashValue += $matchedItem->cash_value;
                                                                    if (!empty($matchedItem->gold_value)) {
                                                                        $goldValues[] = $matchedItem->gold_value; // Collect non-empty gold values into the array
                                                                    }
                                                                @endphp
                                                                <tr class="position-relative relative">
                                                                    <input type="hidden"
                                                                        value="{{ $itemDelivery->id }}"
                                                                        class="sell">
                                                                    @if ($loop->first)
                                                                        <td rowspan="{{ $count }}"
                                                                            class="text-13-black height-52 border">
                                                                            {{ $itemDelivery->maPhieu }}</td>
                                                                        <td rowspan="{{ $count }}"
                                                                            class="text-13-black height-52 border">
                                                                            {{ $itemDelivery->nameUser }}</td>
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
                                                                        {{ number_format($matchedItem->product_qty) }}
                                                                    </td>
                                                                    <td class="text-13-black height-52 border">
                                                                        {{ number_format($matchedItem->price_export) }}
                                                                    </td>
                                                                    <td class="text-13-black height-52 border">
                                                                        {{ number_format($matchedItem->product_total) }}
                                                                    </td>
                                                                    <td class="text-13-black height-52 border">
                                                                        <input type="text" autocomplete="off"
                                                                            class="border-0 px-2 py-1 w-100 number product_quantity height-32"
                                                                            data-type="quantity"
                                                                            data-guest="{{ $item->id }}"
                                                                            data-month="{{ $itemDelivery->ngayTao }}"
                                                                            data-quote="{{ $matchedItem->id_quote }}"
                                                                            value="{{ number_format($matchedItem->product_quantity) }}"
                                                                            name="product_quantity[]">
                                                                    </td>
                                                                    <td class="text-13-black height-52 border">
                                                                        <input type="text" autocomplete="off"
                                                                            class="border-0 px-2 py-1 w-100 cash_value number height-32"
                                                                            data-type="cash"
                                                                            data-guest="{{ $item->id }}"
                                                                            data-quote="{{ $matchedItem->id_quote }}"
                                                                            data-month="{{ $itemDelivery->ngayTao }}"
                                                                            value="{{ number_format($matchedItem->cash_value) }}"
                                                                            name="cash_value[]">
                                                                    </td>
                                                                    <td class="text-13-black height-52 border">
                                                                        <input type="text" autocomplete="off"
                                                                            class="border-0 px-2 py-1 w-100 gold_value height-32"
                                                                            data-type="gold"
                                                                            data-guest="{{ $item->id }}"
                                                                            data-quote="{{ $matchedItem->id_quote }}"
                                                                            data-month="{{ $itemDelivery->ngayTao }}"
                                                                            value="{{ $matchedItem->gold_value }}"
                                                                            name="gold_value[]">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            @php
                                                                $stt++; // Increment STT after each invoice
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <!-- Add total row for each guest -->
                                                    <tr>
                                                        <td colspan="6" class="border-top bold text-right">Tổng
                                                            cộng:</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ number_format($totalDeliverQty) }}</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ number_format($totalPriceExport) }}</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ number_format($totalProductTotalVat) }}</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ number_format($totalProductQuantity) }}</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ number_format($totalCashValue) }}</td>
                                                        <td class="border-top text-13-black height-52 border">
                                                            {{ implode(', ', $goldValues) }}</td>
                                                        <!-- Combine gold values into a comma-separated string -->
                                                    </tr>
                                                @endif
                                            @endforeach
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
        $(document).on('blur', '.product_quantity, .cash_value, .gold_value', function() {
            var $row = $(this).closest('tr');
            var product_quantity = $row.find('.product_quantity').val();
            var cash_value = $row.find('.cash_value').val();
            var gold_value = $row.find('.gold_value').val();
            var month = $(this).data('month');
            var guest = $(this).data('guest');
            var quote = $(this).data('quote');
            var type = $(this).data('type');
            var value = $(this).val();
            $.ajax({
                url: "{{ route('promotionGuestAjax') }}",
                type: "GET",
                data: {
                    month: month,
                    guest: guest,
                    quote: quote,
                    type: type,
                    value: value,
                    product_quantity: product_quantity,
                    cash_value: cash_value,
                    gold_value: gold_value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.error('Error:', error);
                }
            });
        });
        addHighlightFunctionality(".table-sell", ".sell");
    });
</script>