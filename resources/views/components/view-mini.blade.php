<div id="mySidenav" class="sidenav border @if ($page == 'CTNB' || $page == 'PCK') margin-top-10 @else margin-top-127 @endif">
    <div id="show_info_Guest" class="position-relative">
        <div class="bg-filter-search border-0 text-center border-custom">
            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                DANH SÁCH
            </p>
        </div>
        <div class="p-2">
            <div class="position-relative ml-1">
                <input type="text" placeholder="Tìm kiếm" style="outline: none;" class="w-100 text-13 form-control"
                    id="search-input" autocomplete="off">
                <span id="search-icon" class="search-icon">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="outer2 text-nowrap">
            @if ($page == 'PBH')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số báo giá#
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
                                    Khách hàng
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->maBG }}"
                                data-page="PBH">
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
                                    {{ $detail->guest_name }}
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
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="DHNCC">
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
                                    {{ $detail->provide_name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'THNCC')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Phiếu trả hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Phiếu nhập kho#
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày trả hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Nội dung trả hàng
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="THNCC">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->return_code }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    @if ($detail->getReceive)
                                        {{ $detail->getReceive->delivery_code }}
                                    @endif
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'KTH')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Mã phiếu#
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Phiếu bán hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Ngày trả hàng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Nội dung trả hàng
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-detailExport">
                        @foreach ($listDetail as $detail)
                            <tr class="position-relative detailExport-info height-52" data-id="{{ $detail->id }}"
                                data-page="KTH">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->code_return }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    @if ($detail->getDelivery)
                                        {{ $detail->getDelivery->code_delivery }}
                                    @endif
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->description }}
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
                                    Đơn mua hàng
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
                                data-page="PNK">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->delivery_code }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    @if ($detail->getQuotation)
                                        {{ $detail->getQuotation->quotation_number == null ? $detail->getQuotation->id : $detail->getQuotation->quotation_number }}
                                    @endif
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if (isset($detail->getQuotation))
                                        {{ $detail->getQuotation->provide_name }}
                                    @else
                                        @if (isset($detail->getNameProvide))
                                            {{ $detail->getNameProvide->provide_name_display }}
                                        @endif
                                    @endif
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
                                    Số báo giá#
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
                                data-id="{{ $detail->maGiaoHang }}" data-page="PXK">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->code_delivery }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->quotation_number }}
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
                                    Nội dung
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số tiền
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Quỹ
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
                                data-page="PT">
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
                                    {{ $detail->content->name ?? 'N/A' }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ number_format($detail->amount) }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->fund->name ?? 'N/A' }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->note ?? 'N/A' }}
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
                                    Đơn mua hàng#
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
                                    Nội dung
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Quỹ
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
                                data-page="PC">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->payment_code }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    @if ($detail->getQuotation)
                                        {{ $detail->getQuotation->quotation_number }}
                                    @endif
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
                                    @if ($detail->getContentPay)
                                        {{ $detail->getContentPay->name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if ($detail->getFund)
                                        {{ $detail->getFund->name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->note }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'CTNB')
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
                                    Số tiền
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Từ quỹ
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Đến quỹ
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
                                data-page="CTNB">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ date_format(new DateTime($detail->payment_day), 'd/m/Y') }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ $detail->form_code }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ number_format($detail->qty_money) }}
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if ($detail->getFromFund)
                                        {{ $detail->getFromFund->name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if ($detail->getToFund)
                                        {{ $detail->getToFund->name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->notes }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($page == 'PCK')
                <table id="example" class="table table-hover bg-white rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Sản phẩm
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Số lượng
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Từ kho
                                </span>
                            </th>
                            <th scope="col" class="height-52">
                                <span class="d-flex justify-content-start text-13">
                                    Đến kho
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
                                data-page="PCK">
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    {{ $detail->product_name }}
                                </td>
                                <td class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                    {{ number_format($detail->qty) }}
                                </td>
                                <td class="text-13-black text-left border-top-0 border-bottom">
                                    @if ($detail->getFromWarehouse)
                                        {{ $detail->getFromWarehouse->warehouse_name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    @if ($detail->getToWarehouse)
                                        {{ $detail->getToWarehouse->warehouse_name }}
                                    @endif
                                </td>
                                <td class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                    {{ $detail->note }}
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
                            $page == 'PCK')
                        <div class="text-danger font-weight-bold">Có <span class="text-danger font-weight-bold"
                                id="result-count">{{ count($listDetail) }}</span> phiếu</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //tìm kiếm
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const tableRows = document.querySelectorAll('#example tbody tr');
        const resultCountSpan = document.getElementById('result-count');

        // Khôi phục dữ liệu tìm kiếm nếu có từ localStorage
        const savedSearch = localStorage.getItem('savedSearch');
        if (savedSearch) {
            searchInput.value = savedSearch;
            filterTable(savedSearch);
        }

        searchInput.addEventListener('input', function() {
            const searchText = this.value.trim(); // Giữ nguyên dữ liệu nhập vào
            filterTable(searchText);
            localStorage.setItem('savedSearch', searchText); // Lưu dữ liệu tìm kiếm vào localStorage
        });

        function filterTable(searchText) {
            let count = 0;
            tableRows.forEach(row => {
                const cellText = row.querySelector('td').textContent.toLowerCase().trim();
                if (cellText.includes(searchText.toLowerCase())) {
                    row.style.display = ''; // Hiển thị hàng nếu có nội dung phù hợp
                    count++;
                } else {
                    row.style.display = 'none'; // Ẩn hàng nếu không phù hợp
                }
            });
            resultCountSpan.textContent = count; // Cập nhật số kết quả tìm kiếm
        }
    });


    //chèn đường dẫn cho tr
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.detailExport-info');

        rows.forEach(row => {
            row.addEventListener('click', function() {
                const id = this.dataset.id;
                const page = this.dataset.page;
                let url;
                if (page === 'DHNCC') {
                    url =
                        "{{ route('import.show', ['workspace' => $workspacename, 'import' => ':id']) }}";
                }
                if (page === 'THNCC') {
                    url =
                        "{{ route('returnImport.edit', ['workspace' => $workspacename, 'returnImport' => ':id']) }}";
                }
                if (page === 'PBH') {
                    url =
                        "{{ route('seeInfo', ['workspace' => $workspacename, 'id' => ':id']) }}";
                }
                if (page === 'KTH') {
                    url =
                        "{{ route('returnExport.edit', ['workspace' => $workspacename, 'returnExport' => ':id']) }}";
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
                if (page === 'CTNB') {
                    url =
                        "{{ route('changeFund.edit', ['workspace' => $workspacename, 'changeFund' => ':id']) }}";
                }
                if (page === 'PCK') {
                    url =
                        "{{ route('changeWarehouse.edit', ['workspace' => $workspacename, 'changeWarehouse' => ':id']) }}";
                }
                window.location.href = url.replace(':id', id);
            });
        });
    });
</script>
