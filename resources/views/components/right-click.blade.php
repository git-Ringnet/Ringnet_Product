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
            style="display: none;">Xem đơn hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="donhang" id="donhang"
            style="display: none;">Xem đơn hàng</a>
        <a class="dropdown-item text-13-black" href="#" data-option="congno" id="congno"
            style="display: none;">Xem công nợ</a>
    @endif
    @if ($page == 'viewReportProvides')
        <a class="dropdown-item text-13-black" href="#" data-option="congno">Xem công nợ</a>
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

            if (status === "hanghoa") {
                $('#banhang').show();
                $('#donhang').hide();
                $('#congno').hide();
            } else {
                $('#banhang').hide();
                $('#donhang').show();
                $('#congno').show();
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
        });
    });
</script>
