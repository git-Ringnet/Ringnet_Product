<x-navbar :title="$title" activeGroup="manageProfess" activeName="changeWarehouse"></x-navbar>
<form action="{{ route('changeWarehouse.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left">
                    <span class="ml-4">Quản lý nghiệp vụ</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('changeWarehouse.index', $workspacename) }}">
                            Phiếu chuyển kho
                        </a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo phiếu chuyển kho</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('changeWarehouse.index', $workspacename) }}" class="user_flow" data-type="NCC"
                            data-des="Hủy thêm nhà cung cấp">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Xác nhận chuyển kho</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="margin-top:10rem;">
            <section class="content">
                <div class="container-fluided">
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="info-chung">
                        <div class="content-info">
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Kho hàng</p>
                                </div>
                                <div class="w-100 text-13-black position-relative">
                                    <input id="searchWarehouse" type="text" placeholder="Chọn kho"
                                        class="border w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black height-100 searchWarehouse" readonly>
                                    <input type="hidden"
                                        class="border-0 py-1 w-100 height-32 text-13-black warehouse_id"
                                        name="from_warehouse" id="from_warehouse">

                                    <ul id="listWarehouse"
                                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                        style="z-index: 99; right: 0px; width: 100%; display:none;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập đơn mua hàng"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="search">
                                                <input type="hidden" name="" id="">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        @foreach ($warehouse as $va)
                                            <li class="p-2 align-items-center"
                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                <a href="javascript:void(0)" id="{{ $va->id }}" name="search-info"
                                                    class="search-warehouse" style="flex:2;">
                                                    <span class="text-13-black">{{ $va->warehouse_name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div id="more_info">
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">Sản phẩm</p>
                                    </div>
                                    <div class="border-0 w-100 text-13-black position-relative">
                                        <input id="searchProduct" type="text" placeholder="Chọn kho"
                                            class="border w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black height-100 searchProduct" readonly>
                                        <input type="hidden"
                                            class="border-0 py-1 w-100 height-32 text-13-black product_id"
                                            name="product_id">
                                        {{-- <input type="hidden"
                                            class="border-0 py-1 w-100 height-32 text-13-black quoteImport"
                                            name="quoteImport_id"> --}}
                                        <ul id="listProduct"
                                            class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                            style="z-index: 99; right: 0px; width: 100%; display:none;">
                                            <div class="p-1">
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Nhập đơn mua hàng"
                                                        class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                        id="provideFilter">
                                                    <input type="hidden" name="" id="">
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search text-table"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>

                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">Số lượng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="qty"
                                        class="border w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black height-100 change_qty">
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">Đến kho</p>
                                    </div>
                                    <div class="border-0 w-100 text-13-black position-relative">
                                        <input id="searchWarehouse1" type="text" placeholder="Chọn kho"
                                            class="border w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black height-100 searchWarehouse"
                                            readonly>
                                        <input type="hidden"
                                            class="border-0 py-1 w-100 height-32 text-13-black warehouse_id"
                                            name="to_warehouse" id="to_warehouse">

                                        <ul id="listWarehouse1"
                                            class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                            style="z-index: 99; right: 0px; width: 100%; display:none;">
                                            <div class="p-1">
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Nhập đơn mua hàng"
                                                        class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                        id="provideFilter1">
                                                    <input type="hidden" name="" id="">
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search text-table"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            @foreach ($warehouse as $va)
                                                <li class="p-2 align-items-center"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                    <a href="javascript:void(0)" id="{{ $va->id }}"
                                                        name="search-info" class="search-warehouse1" style="flex:2;">
                                                        <span class="text-13-black">{{ $va->warehouse_name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center height-60-mobile SERIALNUMBER"
                                    style="display: none !important">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">SN</p>
                                    </div>
                                    <a href=""
                                        class="duongdan border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        data-toggle="modal" data-target="#exampleModal0">
                                        <div class="sn--modal">
                                            <span class="border-span--modal">SN</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">Ghi chú</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="note"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                        <p class="p-0 m-0 margin-left32 text-13">Người tạo</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>




    {{-- Modal --}}
    <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>

                </div>
                <div class="modal-body">
                    <table id="table_SNS">
                        <thead>
                            <tr>
                                <th class="text-table text-secondary border-bottom" style="width:15%">STT</th>
                                <th class="text-table text-secondary border-bottom" style="width:100%">Serial
                                    number</th>
                                <th style="width:3%" class="border-bottom"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-bottom">1</td>
                                <td class="border-bottom">
                                    <input class="form-control w-100 border-0 pl-0" type="text" name="seri0[]"
                                        value="123123" readonly="" style="background: none">
                                </td>
                                <td class="border-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                        viewBox="0 0 12 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z"
                                            fill="#6D7075"></path>
                                    </svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4">
                    </div>

                </div>

            </div>
        </div>
    </div>




</form>
</div>
{{-- <script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script> --}}
<script>
    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });

    $('#searchWarehouse').on('click', function() {
        $('#listWarehouse').show()
    })

    $('#searchWarehouse1').on('click', function() {
        $('#listWarehouse1').show()
    })

    $('#searchProduct').on('click', function() {
        $('#listProduct').show()
    })


    $('#more_info').hide();
    $(document).click(function(event) {
        if (
            !$(event.target).closest("#searchWarehouse").length &&
            !$(event.target).closest("#provideFilter").length &&
            !$(event.target).closest("#search").length &&
            !$(event.target).closest("#searchProduct").length &&
            !$(event.target).closest("#searchWarehouse1").length
        ) {
            $("#listWarehouse").hide();
            $("#listWarehouse1").hide();
            // Xóa dữ liệu search trước đó
            $('#provideFilter').val('')
            $('#provideFilter1').val('')
            $('#listProduct').hide()
            $('#search').val('')

        }
    });

    $('.search-warehouse1').on('click', function() {
        id = $(this).attr('id');
        text = $(this).find('span').text()

        $('#to_warehouse').val(id)
        $('#searchWarehouse1').val(text)
    })

    function formatCurrency(value) {
        value = Math.round(value * 100) / 100;

        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }


    $('.search-warehouse').on('click', function() {
        id = $(this).attr('id')
        $('#searchWarehouse').val($(this).find('span').text());
        $('#from_warehouse').val(id)
        if (id) {
            $('#more_info').show();
            // Gửi AJAX lấy dữ liệu sản phẩm theo kho hàng
            $.ajax({
                url: "{{ route('getProductByWarehouse') }}",
                type: "get",
                data: {
                    warehouse_id: id
                },
                success: function(data) {
                    // Xóa dữ liệu trường đã nhập trước
                    $('#searchProduct').val('')
                    $('.change_qty').val('')

                    var qty_export = 0;
                    $('#listProduct li').remove();
                    if (data['quoteImport']) {
                        data['quoteImport'].forEach(item => {
                            var li = `
                            <li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                <a href="javascript:void(0)" id="` + item.id + `" data-warehouse=` +
                                id + ` name="search-info" class="search-product" style="flex:2;">
                                                    <span class="text-13-black">` + item.product_name + `</span>
                                                </a>
                                            </li>
                            `;
                            $('#listProduct').append(li)


                        })
                        // Gửi Ajax lấy thông tin sn
                        $('.search-product').on('click', function() {
                            id_product = $(this).attr('id');
                            id_warehouse = $(this).attr('data-warehouse')
                            $.ajax({
                                url: "{{ route('getProductByWarehouse') }}",
                                type: "get",
                                data: {
                                    id_product: id_product,
                                    id_warehouse: id_warehouse
                                },
                                success: function(data) {
                                    if (data['product']) {
                                        if (data['product'].check_seri == 1) {
                                            $('.SERIALNUMBER').attr('style',
                                                'display:flex');
                                        } else {
                                            $('.SERIALNUMBER').attr('style',
                                                'display:none !important');
                                        }
                                        $('.product_id').val(data['product'].id)
                                        // $('.quoteImport').val(id_quote)



                                        // Đỗ dữ liệu vào input
                                        $('#searchProduct').val(data['product']
                                            .product_name)

                                        qty_export = formatCurrency(data['qty'])
                                        $('.change_qty').on('input',
                                            function() {
                                                checkQty(this, qty_export);
                                            })

                                    }


                                    // Xóa dữ liệu SN cũ
                                    $('#exampleModal0 #table_SNS tbody')
                                        .empty();

                                    // Nếu sản phẩm có seri đỗ vào modal
                                    if (data['seri']) {
                                        data['seri'].forEach(item => {
                                            var sn =
                                                `
                                            <tr>
                                                <td class="border-bottom">
                                                    <input type="checkbox" value="` + item.id + `" name="SN_id[]"> 
                                                </td>
                                                <td class="border-bottom">
                                                    <input class="form-control w-100 border-0 pl-0" type="text" name="seri0[]" value="` +
                                                item.serinumber + `" readonly="" style="background: none">
                                                </td>
                                                <td class="border-bottom">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z" fill="#6D7075"></path>
                                                    </svg>
                                                </td>
                                            </tr>`;
                                            // Thêm dữ liệu vào modal SN
                                            $('#exampleModal0 #table_SNS tbody')
                                                .append(sn)
                                        })
                                    }
                                }
                            })
                        })

                    }
                }
            })
        }
    })

    function checkQty(value, odlQty) {
        if (
            $(value)
            .val()
            .replace(/[^0-9.-]+/g, "") > odlQty
        ) {
            $(value).val(odlQty);
        }
    }


    $('form').on('submit', function(e) {
        e.preventDefault();
        var check = false;
        if ($('#from_warehouse').val() == "") {
            check = true;
            showNotification('warning', 'Vui lòng chọn kho hàng')
            return false;
        }
        if ($('.product_id').val() == "") {
            check = true;
            showNotification('warning', 'Vui lòng chọn sản phẩm cần chuyển');
            return false;
        }
        if ($('.change_qty').val() == "") {
            check = true;
            showNotification('warning', 'Vui lòng nhập số lượng cần chuyển');
            return false;
        } else {
            if ($('.change_qty').val() == 0) {
                check = true;
                showNotification('warning', 'Số lượng sản phẩm phải lớn hơn 0');
                return false;
            }
        }
        if ($('#to_warehouse').val() == "") {
            check = true;
            showNotification('warning', 'Vui lòng chọn kho cần chuyển hàng đến');
            return false;
        }

        if ($('#to_warehouse').val() == $('#from_warehouse').val()) {
            check = true;
            showNotification('warning', 'Vui lòng chọn kho hàng cần chuyển đến khác');
            return false;
        }

        if (!check) {
            $('form')[1].submit();
        }

    })
</script>


{{-- <script>
    getKeyProvide($('input[name="provide_name_display"]'))
    $('form').on('submit', function(e) {
        e.preventDefault();
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var key = $("input[name='key']").val().trim();

        if (provide_name_display == '') {
            showNotification('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
            check = true;
            return false;
        }

        if (!check) {
            $.ajax({
                url: "{{ route('checkKeyProvide') }}",
                type: "get",
                data: {
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    status: "add"
                },
                success: function(data) {
                    console.log(data);
                    if (data.success) {
                        $('form')[1].submit();
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showNotification('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showNotification('warning', data.msg);
                        }
                    }
                }
            })
        }
    })

    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showNotification(type, message);
        }, delayTime);
    }

    $(document).off('click').on('click', '.user_flow', function(e) {
        var type = $(this).attr('data-type')
        var des = $(this).attr('data-des');
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: type,
                des: des
            },
            success: function(data) {}
        })
    })
</script> --}}
