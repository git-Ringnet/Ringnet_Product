<div id="custom-context-menu" class="dropdown-menu"
    style="display: none; background: #ffffff; position: absolute; width:13%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3); border: 1px solid #ccc;">
    @if ($page == 'viewReportDebtGuests')
        <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem đơn hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem công nợ</a>
    @endif
    @if ($page == 'viewReportSales')
        <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem đơn hàng</a>
    @endif
    @if ($page == 'viewReportBuy')
        <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem đơn hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem công nợ</a>
    @endif
    @if ($page == 'sumDelivery')
        <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem phiếu xuất kho</a>
    @endif
    @if ($page == 'viewReportSumReturnExport')
        <a class="dropdown-item text-13-black" href="#" data-option="donhang">Xem phiếu khách trả</a>
    @endif
    @if ($page == 'viewReportSumSellProfit')
        <a class="dropdown-item text-13-black" href="#" data-type="hanghoa" id="banhang"
            style="display: none;">Xem phiếu bán hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="donhang" id="donhang"
            style="display: none;">Xem đơn hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="congno" id="congno"
            style="display: none;">Xem công nợ</a>
    @endif
    @if ($page == 'viewReportProvides')
        <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem công nợ</a>
    @endif
    @if ($page == 'viewReportReturnImport')
        <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem phiếu trả NCC</a>
    @endif
    @if ($page == 'viewReportIE')
        <a class="dropdown-item text-13-black" href="#" data-option="noidung">Xem nội dung</a>
    @endif
    @if ($page == 'viewReportChangeFunds')
        <a class="dropdown-item text-13-black" href="#" data-option="noidung">Xem chuyển tiền nội bộ</a>
    @endif
    @if ($page == 'viewReportIEFunds')
        <a class="dropdown-item text-13-black" href="#" data-type="thu" id="thu" style="display: none;">Xem
            phiếu thu</a>
        <a class="dropdown-item text-13-black" href="#" data-type="chi" id="chi" style="display: none;">Xem
            phiếu chi</a>
    @endif
</div>
<input type="hidden" value="{{ $page }}" id="page">
<script>
    $(document).ready(function() {
        var $contextMenu = $("#custom-context-menu");
        var $currentRow;
        var page = $('#page').val();

        $('#example2').on('contextmenu', '.main-row', function(e) {
            e.preventDefault();

            $currentRow = $(this);
            var guestId = $currentRow.data('id');

            $contextMenu.css({
                display: "block",
                left: e.pageX,
                top: e.pageY
            }).data('guest-id', guestId);
            var status = $(this).data('status');
            var fund = $(this).data('fund');

            if (status === "hanghoa") {
                $('#banhang').show();
                $('#donhang').hide();
                $('#congno').hide();
            } else {
                $('#banhang').hide();
                $('#donhang').show();
                $('#congno').show();
            }
            if (fund === "thu") {
                $('#thu').show();
                $('#chi').hide();
            } else if (fund === "chi") {
                $('#chi').show();
                $('#thu').hide();
            }
        });

        // Ẩn menu tùy chỉnh khi nhấp ra ngoài
        $(document).on("click", function() {
            $contextMenu.hide();
        });

        // Xử lý sự kiện khi người dùng chọn một tùy chọn từ menu
        $contextMenu.on("click", ".dropdown-item", function(e) {
            e.preventDefault();
            var option = $(this).data('option');
            var guestId = $contextMenu.data('guest-id');
            var type = $(this).data('type');

            // Tạo URL động với guestId và option
            if (page == "viewReportDebtGuests") {
                var url =
                    `{{ route('guests.show', ['workspace' => $workspacename, 'guest' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportSales") {
                var url =
                    `{{ route('guests.show', ['workspace' => $workspacename, 'guest' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportBuy") {
                var url =
                    `{{ route('provides.show', ['workspace' => $workspacename, 'provide' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "sumDelivery") {
                var url =
                    `{{ route('watchDelivery', ['workspace' => $workspacename, 'id' => 'GUEST_ID']) }}`
                    .replace('GUEST_ID', guestId);
                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportSumReturnExport") {
                var url =
                    `{{ route('returnExport.edit', ['workspace' => $workspacename, 'returnExport' => 'GUEST_ID']) }}`
                    .replace('GUEST_ID', guestId);
                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportSumSellProfit") {
                if (type == "hanghoa") {
                    var url =
                        `{{ route('seeInfo', ['workspace' => $workspacename, 'id' => 'GUEST_ID']) }}`
                        .replace('GUEST_ID', guestId);
                    // Mở tab mới với URL
                    window.open(url, '_blank');

                    $contextMenu.hide();
                } else {
                    var url =
                        `{{ route('guests.show', ['workspace' => $workspacename, 'guest' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                        .replace('GUEST_ID', guestId)
                        .replace('OPTION_ID', option);

                    // Mở tab mới với URL
                    window.open(url, '_blank');

                    $contextMenu.hide();
                }
            }
            if (page == "viewReportProvides") {
                var url =
                    `{{ route('provides.show', ['workspace' => $workspacename, 'provide' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportReturnImport") {
                var url =
                    `{{ route('returnImport.edit', ['workspace' => $workspacename, 'returnImport' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportIE") {
                var url =
                    `{{ route('content.show', ['workspace' => $workspacename, 'content' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportChangeFunds") {
                var url =
                    `{{ route('changeFund.edit', ['workspace' => $workspacename, 'changeFund' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                    .replace('GUEST_ID', guestId)
                    .replace('OPTION_ID', option);

                // Mở tab mới với URL
                window.open(url, '_blank');

                $contextMenu.hide();
            }
            if (page == "viewReportIEFunds") {
                if (type == "thu") {
                    var url =
                        `{{ route('cash_receipts.edit', ['workspace' => $workspacename, 'cash_receipt' => 'GUEST_ID']) }}`
                        .replace('GUEST_ID', guestId);
                    // Mở tab mới với URL
                    window.open(url, '_blank');

                    $contextMenu.hide();
                } else {
                    var url =
                        `{{ route('paymentOrder.edit', ['workspace' => $workspacename, 'paymentOrder' => 'GUEST_ID', 'option' => 'OPTION_ID']) }}`
                        .replace('GUEST_ID', guestId)
                        .replace('OPTION_ID', option);

                    // Mở tab mới với URL
                    window.open(url, '_blank');

                    $contextMenu.hide();
                }
            }
        });
    });
</script>
