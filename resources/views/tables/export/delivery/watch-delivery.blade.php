<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <form action="{{ route('delivery.update', $delivery->soGiaoHang) }}" method="POST" id="deliveryForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="detailexport_id" id="detailexport_id">
        <!-- Content Header (Page header) -->
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Bán hàng</span>
                    <span>/</span>
                    <span>Đơn giao hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">{{ $delivery->quotation_number }}</span>
                </div>
                @if ($delivery->tinhTrang !== 2)
                    <div class="row m-0 mb-1">
                        <button type="button" id="submitXacNhan" class="custom-btn d-flex align-items-center h-100"
                            onclick="kiemTraSoLuong()">
                            <span>Xác nhận đơn giao hàng</span>
                        </button>
                    </div>
                @endif
            </div>
        </section>
        <hr class="mt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluided">
                <div class="row">
                    <div class="col-12">
                        <div class="info-chung">
                            <div class="content-info">
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" readonly value="{{ $delivery->quotation_number }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 numberQute"
                                            id="myInput" autocomplete="off" name="quotation_number">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">Khách hàng</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" readonly value="{{ $delivery->guest_name_display }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 nameGuest"
                                            id="myInput" autocomplete="off">
                                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" readonly value="{{ $delivery->shipping_unit }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 unit_ship"
                                            id="myInput" autocomplete="off" name="shipping_unit">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" readonly name="shipping_fee"
                                            value="{{ $delivery->shipping_fee }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 fee_ship"
                                            id="myInput" autocomplete="off">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Ngày giao hàng</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" readonly
                                            value="{{ $delivery->created_at->format('d/m/Y') }}" name="date_deliver"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            <div class="d-flex align-items-center btn-basic pb-3 px-2">
                                <svg class="mr-1" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H14.25C14.6478 2.25 15.0294 2.40804 15.3107 2.68934C15.592 2.97064 15.75 3.35218 15.75 3.75V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75Z"
                                        stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4.5 4.5H13.5V11.25H4.5V4.5Z" stroke="#42526E" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.5 13.5H9.75" stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 13.5H13.5" stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="p-0 m-0 change_colum">Đầy đủ</p>
                                <svg class="ml-1" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#42526E" />
                                </svg>
                            </div>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right">
                                                Mã sản phẩm
                                            </th>
                                            <th class="border-right">Tên sản phẩm</th>
                                            <th class="border-right">Đơn vị</th>
                                            <th class="border-right">Số lượng</th>
                                            {{-- <th class="border-right">Đơn giá</th>
                                            <th class="border-right">Thuế</th>
                                            <th class="border-right">Thành tiền</th>
                                            <th class="p-0 bg-secondary border-0 Daydu" style="width:1%;"></th>
                                            <th class="border-right product_ratio">Hệ số nhân</th>
                                            <th class="border-right price_import">Giá nhập</th>
                                            <th class="border-right note">Ghi chú</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item_quote)
                                            <tr class="bg-white">
                                                <td
                                                    class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                    <div
                                                        class="d-flex w-100 justify-content-between align-items-center">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_code }}"
                                                            class="border-0 px-2 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" value="{{ $item_quote->product_name }}"
                                                            class="border-0 px-2 py-1 w-100 product_name" readonly
                                                            autocomplete="off" name="product_name[]">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $item_quote->product_id }}" autocomplete="off"
                                                            name="product_id[]">
                                                        <div class="info-product" data-toggle="modal"
                                                            data-target="#productModal">
                                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z"
                                                                    fill="#42526E">
                                                                </path>
                                                                <path
                                                                    d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z"
                                                                    fill="#42526E">
                                                                </path>
                                                                <path
                                                                    d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z"
                                                                    fill="#42526E">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        name="product_unit[]">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text" readonly
                                                        value="{{ is_int($item_quote->deliver_qty) ? $item_quote->deliver_qty : rtrim(rtrim(number_format($item_quote->deliver_qty, 4, '.', ''), '0'), '.') }}"
                                                        class="border-0 px-2 py-1 w-100 quantity-input"
                                                        autocomplete="off" name="product_qty[]">
                                                    <input type="hidden" class="tonkho">
                                                    <p class="text-primary text-center position-absolute inventory"
                                                        style="top: 68%;">Tồn kho:
                                                        <span
                                                            class="soTonKho">{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative d-none">
                                                    <input type="text"
                                                        value="{{ number_format($item_quote->price_export) }}"
                                                        class="border-0 px-2 py-1 w-100 product_price"
                                                        autocomplete="off" name="product_price[]" readonly>
                                                    <p class="text-primary text-right position-absolute transaction"
                                                        style="top: 68%; right: 5%; display: none;">Giao dịch gần đây
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 px-4 d-none">
                                                    <select name="product_tax[]"
                                                        class="border-0 text-center product_tax" disabled>
                                                        <option value="0" <?php if ($item_quote->product_tax == 0) {
                                                            echo 'selected';
                                                        } ?>>0%</option>
                                                        <option value="8" <?php if ($item_quote->product_tax == 8) {
                                                            echo 'selected';
                                                        } ?>>8%</option>
                                                        <option value="10" <?php if ($item_quote->product_tax == 10) {
                                                            echo 'selected';
                                                        } ?>>10%</option>
                                                        <option value="99" <?php if ($item_quote->product_tax == 99) {
                                                            echo 'selected';
                                                        } ?>>NOVAT</option>
                                                    </select>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 d-none">
                                                    <input type="text" readonly=""
                                                        value="{{ number_format($item_quote->product_total) }}"
                                                        class="border-0 px-2 py-1 w-100 total-amount">
                                                </td>
                                                <td class="border-top border-secondary p-0 bg-secondary Daydu d-none"
                                                    style="width:1%;"></td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative product_ratio d-none">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 heSoNhan"
                                                        autocomplete="off" required="required" readonly
                                                        value="{{ $item_quote->product_ratio }}"
                                                        name="product_ratio[]">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 giaNhap"
                                                        readonly autocomplete="off" required="required"
                                                        name="price_import[]"
                                                        value="{{ number_format($item_quote->price_import) }}">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative note p-1 d-none">
                                                    <input type="text" class="border-0 py-1 w-100" readonly
                                                        name="product_note[]"
                                                        value="{{ $item_quote->product_note }}">
                                                </td>
                                                <td style="display:none;" class="">
                                                    <input type="text" class="product_tax1">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <div class="content">
                            <div class="container-fluided">
                                <div class="row position-relative footer-total">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="mt-4 w-50" style="float: right;">
                                            <div class="d-flex justify-content-between">
                                                <span><b>Giá trị trước thuế:</b></span>
                                                <span id="total-amount-sum">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                                <span><b>Thuế VAT:</b></span>
                                                <span id="product-tax">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Giảm giá:</span>
                                                <div class="w-50">
                                                    <input type="text"
                                                        class="form-control text-right border-0 p-0 bg-white" readonly
                                                        name="discount" id="voucher" value="0">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Phí vận chuyển:</span>
                                                <div class="w-50">
                                                    <input type="text"
                                                        class="form-control text-right border-0 p-0 bg-white" readonly
                                                        name="transport_fee" id="transport_fee" value="0">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-lg"><b>Tổng cộng:</b></span>
                                                <span><b id="grand-total" data-value="0">0đ</b></span>
                                                <input type="text" hidden="" name="totalValue"
                                                    value="0" id="total">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    {{-- Thông tin sản phẩm --}}
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
    });
    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap', function() {
        calculateTotals();
    });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }
            if (giaNhapElement.length > 0) {
                var rawGiaNhap = giaNhapElement.val();
                if (rawGiaNhap !== "") {
                    giaNhap = parseFloat(rawGiaNhap.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                if (status_form == 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));

                if (status_form == 0) {
                    // Đơn giá
                    $(this).find('.product_price').val(formatCurrency(donGia));
                }

                // Cộng dồn vào tổng totalAmount và totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
        }

        // Cập nhật giá trị data-value
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        // Làm tròn đến 2 chữ số thập phân
        value = Math.round(value * 100) / 100;

        // Xử lý phần nguyên
        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        // Định dạng phần nguyên
        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        // Nếu có phần thập phân, thêm vào sau phần nguyên
        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }

    function kiemTraSoLuong() {
        var rows = document.querySelectorAll('tr');
        var invalidProducts = [];

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var quantityInput = parseInt(row.querySelector('.quantity-input').value);
            var soTonKho = parseInt(row.querySelector('.soTonKho').innerText);
            var productName = row.querySelector('.product_name').value;

            if (quantityInput > soTonKho) {
                invalidProducts.push(productName);
            }
        }

        if (invalidProducts.length > 0) {
            // Hiển thị thông báo cuối cùng
            alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" + invalidProducts.join(', '));
        } else {
            // Nếu không có lỗi, tiếp tục submit form
            document.getElementById('deliveryForm').submit();
        }
    }
</script>
</body>

</html>
