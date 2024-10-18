<div id="mySidenav" class="sidenav border @if ($page == 'CTNB' || $page == 'PCK') margin-top-10 @else margin-top-75 @endif">
    <div id="show_info_Guest" class="position-relative">
        <div class="bg-filter-search border-0 text-center border-custom">
            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                DANH SÁCH
            </p>
        </div>
        <div class="d-flex w-100 my-2">
            <div class="">
                <p class="m-0 p-0 text-13-black">Từ ngày</p>
                <input type="date" class="w-100 form-control mr-1 bg-input-guest-blue" id="fromDate">
                <input type="hidden" id="hiddenInputDateFrom">
            </div>
            <div class="mr-2">
                <p class="m-0 p-0 text-13-black">Đến ngày</p>
                <input type="date" class="w-100 form-control ml-1 bg-input-guest-blue" id="toDate">
                <input type="hidden" id="hiddenInputDateTo">
            </div>
        </div>
        <div class="w-100 my-2">
            @if ($page == 'PBH' || $page == 'PXK' || $page == 'PT')
                <div class="position-relative">
                    <p class="m-0 p-0 text-13-black">Khách hàng</p>
                    <input type="text" placeholder="Chọn thông tin"
                        class="w-100 bg-input-guest py-2 px-2 form-control text-13-black nameGuestMiniView bg-input-guest-blue"
                        autocomplete="off" id="inputGuest">
                    <input type="hidden" class="idGuestMiniView" autocomplete="off">
                    <div id="listGuestMiniView" class="bg-white rounded list-guest w-100 shadow p-1 z-index-block"
                        style="z-index: 99;display: none;">
                        <div class="p-1">
                            <div class="position-relative">
                                <input type="text" placeholder="Nhập công ty"
                                    class="pr-4 w-100 input-search bg-input-guest" id="searchGuestMiniView">
                                <span class="search-icon">
                                    <i class="fas fa-search text-table" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <ul class="m-0 p-0 scroll-data">
                            @foreach ($guest as $guest_value)
                                <li class="p-2 align-items-center text-wrap border-top" data-id="{{ $guest_value->id }}"
                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                    <a href="#" title="{{ $guest_value->guest_name_display }}" style="flex:2;"
                                        class="search-guest-mini" id="{{ $guest_value->id }}">
                                        <span class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if ($page == 'DHNCC' || $page == 'PNK' || $page == 'PC')
                <div class="position-relative">
                    <p class="m-0 p-0 text-13-black">Nhà cung cấp</p>
                    <input type="text" placeholder="Chọn thông tin"
                        class="w-100 bg-input-guest py-2 px-2 form-control text-13-black nameGuestMiniView bg-input-guest-blue"
                        autocomplete="off" id="inputGuest">
                    <input type="hidden" class="idGuestMiniView">
                    <div id="listGuestMiniView"
                        class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block list-guest w-100"
                        style="z-index: 99;display: none;">
                        <ul class="m-0 p-0 scroll-data">
                            <div class="p-1">
                                <div class="position-relative">
                                    <input type="text" placeholder="Nhập nhà cung cấp"
                                        class="pr-4 w-100 input-search bg-input-guest" id="searchGuestMiniView">
                                    <span id="search-icon" class="search-icon">
                                        <i class="fas fa-search text-table" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            @foreach ($guest as $guest_value)
                                <li class="p-2 align-items-center text-wrap"
                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                    <a href="javascript:void(0)" style="flex:2" data-id="{{ $guest_value->id }}"
                                        name="search-infoEdit" class="search-infoEdit">
                                        <span
                                            class="text-13-black">{{ $guest_value->provide_name_display }}</span></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        <div class="w-100 my-2">
            <div class="">
                <p class="m-0 p-0 text-13-black">Người lập</p>
                <select id="creator" class="form-control text-13-black bg-input-guest-blue">
                    @foreach ($listUser as $listU)
                        <option value="{{ $listU->id }}">{{ $listU->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex w-100 my-2 justify-content-between align-items-center">
            <div class="">
                <p class="m-0 p-0 text-13-black"></p>
            </div>
            <a href="#" class="custom-btn" id="search-view-mini" data-status="{{ $status }}"
                data-page="{{ $page }}">
                <i class="fas fa-search btn-submit" aria-hidden="true"></i> Tìm kiếm
            </a>
        </div>
        <div class="outerViewMini text-nowrap">
            @if ($page == 'PBH')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã phiếu
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số phiếu
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày báo giá
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Khách hàng
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport" id="PBH">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->maBG }}"
                                data-page="PBH" data-status="{{ $status }}"
                                @if ($detail->status_receive == 2) style="background-color: #d1e7dd;"  {{-- Màu nền cho trạng thái "đã nhận hết" --}}
                                @elseif($detail->status_receive == 3)
                                    style="background-color: #fff3cd;"  {{-- Màu nền cho trạng thái "nhận 1 phần" --}} @endif>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->quotation_number }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->reference_number }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->ngayBG), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->guest_name_display }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'DHNCC')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Đơn mua hàng#
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số tham chiếu
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày báo giá
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Nhà cung cấp
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport" id="DHNCC">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="DHNCC" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->quotation_number == null ? $detail->id : $detail->quotation_number }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->reference_number }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->provide_name_display }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PNK')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Phiếu nhập kho
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày nhận hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Nhà cung cấp
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="PNK" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->delivery_code }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->provide_name_display }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PXK')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã giao hàng#
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày giao hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Khách hàng
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52"
                                data-id="{{ $detail->maGiaoHang }}" data-page="PXK"
                                data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->code_delivery }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->ngayGiao), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->nameGuest }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PT')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã số phiếu#
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày lập
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Khách hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Người nộp
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số tiền
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="PT" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->receipt_code }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->date_created), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->guest->guest_name_display ?? 'N/A' }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->payer }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ number_format($detail->amount) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PC')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã phiếu chi
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Khách hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Người nhận
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số tiền
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ghi chú
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="PC" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->payment_code }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->payment_date), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if ($detail->getGuest)
                                        {{ $detail->getGuest->provide_name_display }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->payment_type }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ number_format($detail->total) }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->note }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PXCK')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày lập
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã phiếu
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ghi chú
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Người lập
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="PXCK" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->change_warehouse_code }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->note }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PNCK')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày lập
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã phiếu
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ghi chú
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Người lập
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="PNCK" data-status="{{ $status }}">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->change_warehouse_code }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->note }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="bg-filter-search position-fixed" style="height: 30px; bottom: 0;right: 0; width: 310px;">
            <div class="position-relative">
                <div class="position-absolute px-4 pt-1 border bg-white">
                    @if (
                        $page == 'PBH' ||
                            $page == 'DHNCC' ||
                            $page == 'THNCC' ||
                            $page == 'KTH' ||
                            $page == 'PNK' ||
                            $page == 'PXK' ||
                            $page == 'PT' ||
                            $page == 'PC' ||
                            $page == 'CTNB' ||
                            $page == 'PCK' ||
                            $page == 'PXCK' ||
                            $page == 'PNCK')
                        <div class="text-danger font-weight-bold">Có <span class="text-danger font-weight-bold"
                                id="result-count">{{ count($listDetail) }}</span> phiếu</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/viewMini.js') }}"></script>
<script>
    flatpickr("#fromDate", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenInputDateFrom").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    flatpickr("#toDate", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenInputDateTo").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    $(document).ready(function() {
        // Menu ngữ cảnh cho PBH
        $('#PBH').on('contextmenu', 'tr', function(e) {
            e.preventDefault();
            $('#PBH tr').removeClass('highlights');
            $(this).addClass('highlights');
            $('#contextMenuPBH').data('row', $(this));

            $('#contextMenuPBH').css({
                display: 'block',
                left: e.pageX + 'px',
                top: (e.pageY - 200) + 'px'
            }).addClass('show');
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#contextMenuPBH').length) {
                $('#contextMenuPBH').hide();
                $('#PBH tr').removeClass('highlights');
            }
        });

        $('#contextMenuPBH').click(function(e) {
            e.stopPropagation();
        });

        $('#contextMenuPBH .dropdown-item').on('click', function(e) {
            e.preventDefault();
            var row = $('#contextMenuPBH').data('row');
            var dataId = row.data('id');
            var routeUrl = "{{ route('delivery.create', ['workspace' => $workspacename]) }}" +
                '?convert=' + dataId;
            window.open(routeUrl, '_blank');
        });

        $(window).on('scroll', function() {
            $('#contextMenuPBH').hide();
            $('#PBH tr').removeClass('highlights');
        });

        // Menu ngữ cảnh cho DHNCC
        $('#DHNCC').on('contextmenu', 'tr', function(e) {
            e.preventDefault();
            $('#DHNCC tr').removeClass('highlights');
            $(this).addClass('highlights');
            $('#contextMenuDHNCC').data('row', $(this));

            $('#contextMenuDHNCC').css({
                display: 'block',
                left: e.pageX + 'px',
                top: (e.pageY - 200) + 'px'
            }).addClass('show');
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#contextMenuDHNCC').length) {
                $('#contextMenuDHNCC').hide();
                $('#DHNCC tr').removeClass('highlights');
            }
        });

        $('#contextMenuDHNCC').click(function(e) {
            e.stopPropagation();
        });

        $('#contextMenuDHNCC .dropdown-item').on('click', function(e) {
            e.preventDefault();
            var row = $('#contextMenuDHNCC').data('row');
            var dataId = row.data('id');
            var routeUrl = "{{ route('receive.create', ['workspace' => $workspacename]) }}" +
                '?convert=' + dataId;
            window.open(routeUrl, '_blank');
        });

        $(window).on('scroll', function() {
            $('#contextMenuDHNCC').hide();
            $('#DHNCC tr').removeClass('highlights');
        });
    });

    $(document).on('click', '.detailExport-info', function() {
        const rows = document.querySelectorAll('.detailExport-info');

        const id = this.dataset.id;
        const page = this.dataset.page;
        const status = this.dataset.status;
        let url;
        if (status == 1) {
            $.ajax({
                url: '{{ route('getViewMini') }}',
                type: 'GET',
                data: {
                    id: id,
                    page: page,
                },
                success: function(data) {
                    if (page == "PBH") {
                        $("#datePicker").val(formatDate(data.infoGuest.ngayBG));
                        $("#hiddenDateInput").val(data.infoGuest.ngayBG);
                        $("#myInput").val(data.infoGuest.export_guest_name);
                        $(".idGuest").val(data.infoGuest.guest_id);
                        $("#date_delivery").val(formatDate(data.infoGuest
                            .date_delivery));
                        $("#hiddenDateDelivery").val(data.infoGuest
                            .date_delivery);
                        $("input[name='guestName']").val(data.infoGuest
                            .guest_name);
                        $("input[name='address_delivery']").val(data
                            .infoGuest
                            .address_delivery);
                        $("select[name='status_receive']").val(data
                            .infoGuest
                            .status_receive);
                        $("input[name='note']").val(data.infoGuest.note);
                        $("input[name='phone_receive']").val(data.infoGuest
                            .phone_receive);
                        $("select[name='id_sale']").val(data.infoGuest
                            .id_sale);
                        $("input[name='receiver']").val(data.infoGuest
                            .receiver);
                        $("#date_payment").val(formatDate(data.infoGuest
                            .date_payment));
                        $("#hiddenDatePayment").val(data.infoGuest
                            .date_payment);
                        $(".debt-old").val(formatCurrency(data.infoGuest
                            .guest_debt));
                        //
                        if (data.product && data.product.length > 0) {
                            $("#inputcontent tbody").children().not(
                                '#dynamic-fields').remove();
                            data.product.forEach(function(product) {
                                var newRow = createProductRow(
                                    product,
                                    "PBH");
                                $("#inputcontent tbody").append(
                                    newRow);
                            });
                        }
                        //
                        calculateTotals();
                    }
                    if (page == "PXK") {
                        $("input[name='quotation_number']").val(data
                            .delivery
                            .quotation_number);
                        $("input[name='guestName']").val(data.delivery
                            .guest_name_display);
                        $("input[name='guest_id']").val(data.delivery
                            .guest_id);
                        $("input[name='representName']").val(data.delivery
                            .represent_name);
                        $("input[name='represent_guest_id']").val(data
                            .delivery
                            .represent_id);
                        $("input[name='shipping_unit']").val(data.delivery
                            .shipping_unit);
                        $("input[name='shipping_fee']").val(formatNumber(
                            data
                            .delivery.shipping_fee));
                        $("#datePicker").val(formatDate(data.delivery
                            .ngayGiao));
                        $("#hiddenDateInput").val(data.delivery.ngayGiao);
                        //
                        if (data.product && data.product.length > 0) {
                            $("#inputcontent tbody").children().not(
                                '#dynamic-fields').remove();
                            data.product.forEach(function(product) {
                                var newRow = createProductRow(
                                    product,
                                    "PXK");
                                $("#inputcontent tbody").append(
                                    newRow);
                            });
                        }
                    }
                    if (page == "DHNCC") {
                        $("#datePicker").val(formatDate(data.import
                            .created_at));
                        $("#hiddenDateInput").val(formatDate1(data.import
                            .created_at));
                        $("#myInput").val(data.import.provide_name_display);
                        $(".debt-old").val(formatCurrency(data.import
                            .provide_debt));
                        $("input[name='provides_name']").val(data.import
                            .provide_name);
                        $("input[name='provides_id']").val(data.import
                            .provide_id);
                        $("input[name='phone']").val(data.import
                            .phone);
                        $("input[name='reference_number']").val(data.import
                            .reference_number);
                        $("input[name='address']").val(data.import
                            .address);
                        $("#date_delivery").val(formatDate(data.import
                            .date_delivery));
                        $("#hiddenDateDelivery").val(data.import
                            .date_delivery);
                        $("select[name='id_sale']").val(data.import
                            .id_sale);
                        $("select[name='status_receive']").val(data.import
                            .status_receive);
                        //
                        if (data.product && data.product.length > 0) {
                            $("#inputcontent tbody").children().not(
                                '#dynamic-fields').remove();
                            data.product.forEach(function(product) {
                                var newRow = createProductRow(
                                    product,
                                    "DHNCC");
                                $("#inputcontent tbody").append(
                                    newRow);
                            });
                        }
                        updateTaxAmount1();
                        calculateTotalAmount1();
                        calculateTotalTax1();
                        calculateGrandTotal1();
                    }
                    if (page == "PNK") {
                        $("input[name='quotation_number']").val(data.receive
                            .quotation_number);
                        $("input[name='provides_name']").val(data.receive
                            .provide_name_display);
                        $("input[name='provide_id']").val(data.receive
                            .provide_id);
                        $("input[name='shipping_unit']").val(data.receive
                            .shipping_unit);
                        $("input[name='delivery_charges']").val(
                            formatCurrency(
                                data.receive.delivery_charges));
                        $("#datePicker").val(formatDate(data.receive
                            .ngayNH));
                        $("#hiddenDateInput").val(formatDate1(data.receive
                            .ngayNH));
                        //
                        if (data.product && data.product.length > 0) {
                            $("#inputcontent tbody").children().not(
                                '#dynamic-fields').remove();
                            data.product.forEach(function(product) {
                                var newRow = createProductRow(
                                    product,
                                    "PNK");
                                $("#inputcontent tbody").append(
                                    newRow);
                            });
                        }
                    }
                    if (page == "PT") {
                        $("#myGuest").val(data.cashReceipt.guest
                            .guest_name_display);
                        $("#guest_id").val(data.cashReceipt.guest
                            .id);
                        $("input[name='payer']").val(data.cashReceipt
                            .payer);
                        $("input[name='total']").val(formatCurrency(data
                            .cashReceipt
                            .amount));
                        $("#myContent").val(data.cashReceipt.content
                            .name);
                        $("#content_id").val(data.cashReceipt.content
                            .id);
                        $("#fund").val(data.cashReceipt.fund
                            .name);
                        $("#fund_id").val(data.cashReceipt.fund
                            .id);
                        $("input[name='note']").val(data.cashReceipt
                            .note);
                        $("#money_reciept").val(formatCurrency(data
                            .cashReceipt
                            .guest
                            .guest_debt));
                        $(".cash_reciept").show();
                    }
                    if (page == "PC") {
                        $("#datePicker").val(formatDate(data.payment
                            .payment_date));
                        $("#hiddenDateInput").val(data.payment
                            .payment_date);
                        $("#myGuest").val(data.payment
                            .provide_name_display);
                        $("#guest_id").val(data.payment.guest_id);
                        $("input[name='payment_type']").val(data.payment
                            .payment_type);
                        $("input[name='total']").val(formatCurrency(data
                            .payment
                            .total));
                        $("#myContent").val(data.payment
                            .content);
                        $("#content_id").val(data.payment
                            .content_pay);
                        $("input[name='search_funds']").val(data.payment
                            .nameFund);
                        $("input[name='fund_id']").val(data.payment
                            .fund_id);
                        $("input[name='note']").val(data.payment
                            .note);
                        $("input[name='total_bill']").val(formatCurrency(
                            data
                            .payment
                            .provide_debt));
                        $(".cash_reciept").show();
                    }
                    $("#inputcontent").on("click", ".delete-product",
                        function() {
                            $(this).closest("tr").remove();
                            if (page == "PBH") {
                                calculateTotals();
                            } else {
                                calculateTotalAmount1();
                                calculateTotalTax1();
                                calculateGrandTotal1();
                            }
                        });
                }
            });
        }
        if (status == 2) {
            if (page === 'DHNCC') {
                url =
                    "{{ route('import.show', ['workspace' => $workspacename, 'import' => ':id']) }}";
            }
            if (page === 'PBH') {
                url =
                    "{{ route('seeInfo', ['workspace' => $workspacename, 'id' => ':id']) }}";
            }
            if (page === 'PNK') {
                url =
                    "{{ route('receive.edit', ['workspace' => $workspacename, 'receive' => ':id']) }}";
            }
            if (page === 'PXK') {
                url =
                    "{{ route('watchDelivery', ['workspace' => $workspacename, 'id' => ':id']) }}";
            }
            if (page === 'PT') {
                url =
                    "{{ route('cash_receipts.edit', ['workspace' => $workspacename, 'cash_receipt' => ':id']) }}";
            }
            if (page === 'PC') {
                url =
                    "{{ route('paymentOrder.edit', ['workspace' => $workspacename, 'paymentOrder' => ':id']) }}";
            }
            if (page === 'PXCK') {
                url =
                    "{{ route('changeWarehouse.edit', ['workspace' => $workspacename, 'changeWarehouse' => ':id']) }}";
            }
            if (page === 'PNCK') {
                url =
                    "{{ route('importChangeWarehouse.edit', ['workspace' => $workspacename, 'importChangeWarehouse' => ':id']) }}";
            }
            window.location.href = url.replace(':id', id);
        }
        if (status == 3) {
            if (page === 'PBH') {
                url =
                    "{{ route('detailExport.edit', ['workspace' => $workspacename, 'detailExport' => ':id']) }}";
            }
            if (page === 'DHNCC') {
                url =
                    "{{ route('import.edit', ['workspace' => $workspacename, 'import' => ':id']) }}";
            }
            window.location.href = url.replace(':id', id);
        }
    });

    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $(document).on('click', '.search-guest-mini', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('.nameGuestMiniView').val(data['guest'].guest_name_display);
                    $('.idGuestMiniView').val(data['guest'].id);
                }
            });
        });
    });

    //Lấy thông tin NCC
    $(document).on('click', '.search-infoEdit', function() {
        var id = $(this).data('id');

        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                },
                success: function(data) {
                    $('.nameGuestMiniView').val(data.provide_name_display);
                    $('.idGuestMiniView').val(data.id);
                }
            })
        }
    })

    //Tìm kiếm
    $(document).ready(function() {
        $('#search-view-mini').on('click', function() {
            const status = this.dataset.status;
            const page = this.dataset.page;
            var fromDate = $('#hiddenInputDateFrom').val();
            var toDate = $('#hiddenInputDateTo').val();
            var idGuest = $('.idGuestMiniView').val();
            var creator = $('#creator').val();
            $.ajax({
                url: '{{ route('searchMiniView') }}',
                type: 'GET',
                data: {
                    page: page,
                    fromDate: fromDate,
                    toDate: toDate,
                    idGuest: idGuest,
                    creator: creator,
                },
                success: function(data) {
                    $('.tbody-detailExport').empty();
                    if (page == "PBH" || page == "DHNCC") {
                        $.each(data, function(index, detail) {
                            var newRow = `
                        <tr class="position-relative detailExport-info height-52" data-id="${detail.id}" data-page="${page}" data-status="${status}">
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.quotation_number}
                        </td>
                        <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                            ${detail.reference_number == null ? '' : detail.reference_number}
                        </td>
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.created_at}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.guest_name}
                        </td></tr>`;
                            $('.tbody-detailExport').append(newRow);
                        });
                    }
                    if (page == "PNK" || page == "PXK") {
                        $.each(data, function(index, detail) {
                            var newRow = `
                        <tr class="position-relative detailExport-info height-52" data-id="${detail.id}" data-page="${page}" data-status="${status}">
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.quotation_number}
                        </td>
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.created_at}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.guest_name ?? ''}
                        </td></tr>`;
                            $('.tbody-detailExport').append(newRow);
                        });
                    }
                    if (page == "PT" || page == "PC") {
                        $.each(data, function(index, detail) {
                            var newRow = `
                        <tr class="position-relative detailExport-info height-52" data-id="${detail.id}" data-page="${page}" data-status="${status}">
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.quotation_number}
                        </td>
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.created_at}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.guest_name ?? ''}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.payer ?? ''}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.amount ?? ''}
                        </td>
                        </tr>`;
                            $('.tbody-detailExport').append(newRow);
                        });
                    }
                    if (page == "PXCK" || page == "PNCK") {
                        $.each(data, function(index, detail) {
                            var newRow = `
                        <tr class="position-relative detailExport-info height-52" data-id="${detail.id}" data-page="${page}" data-status="${status}">
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.created_at}
                        </td>
                        <td class="text-13-black text-left border-top-0 border-bottom">
                            ${detail.change_warehouse_code}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.note ?? ''}
                        </td>
                        <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                            ${detail.creator_name ?? ''}
                        </td>
                        </tr>`;
                            $('.tbody-detailExport').append(newRow);
                        });
                    }
                }
            });
        });
    });
</script>
