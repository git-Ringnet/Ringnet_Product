<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<form action="{{ route('inventory.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none" style="background: none;">
        <div class="content-header-fixed p-0 margin-250 border-bottom-0">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Kho hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Sản phẩm</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Thêm sản phẩm</span>
                </div>
                <div class="d-flex content__heading--right">
                    <a href="{{ route('inventory.index', $workspacename) }}">
                        <button type="button"
                            class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Hủy</span>
                        </button>
                    </a>

                    <button type="submit" class="custom-btn mx-1 d-flex align-items-center h-100 mr-1">
                        <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                fill="white"></path>
                        </svg>
                        <span class="text-btnIner-primary ml-2">Lưu</span>
                    </button>

                </div>
            </div>
        </div>
        <div class="content margin-top-38" style="background: none;">
            <section class="content margin-250">
                <section class="container-fluided">
                    <div class="info-chung">
                        <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông tin chung</p>
                        <div class="content-info">
                            {{-- <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                    <p class="p-0 m-0 text-danger margin-left32 text-13">Danh mục sản phẩm</p>
                                </div>
                                <div class="border-bottom height-100 w-100 py-2 px-3 text-13-black d-flex">
                                    <input type="radio" id="hanghoa" name="type_product" value="1"
                                        class="py-2" checked style="margin-right:10px;">
                                    <label for="html" class="m-0">Hàng hóa</label>
                                    <input type="radio" id="dichvu" name="type_product" value="2"
                                        class="py-2" style="margin-left:40px; margin-right:10px;">
                                    <label for="html" class="m-0">Dịch vụ</label>
                                </div>
                            </div> --}}

                            <div class="d-flex align-items-center height-60-mobile position-relative">
                                <div class="title-info py-2 border border-left-0 border-top-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Tên hàng hóa</p>
                                </div>
                                <input autocomplete="off" required="" type="text" id="searchProductName"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black searchProduct"
                                    name="product_name">

                                <ul id="listProductName"
                                    class="listProductName bg-white position-absolute rounded shadow p-0 scroll-data"
                                    style="z-index: 99; left: 23%; top: 100%; display: none; right:0;">
                                    @foreach ($product as $item)
                                        <li class="w-100">
                                            <a data-unit="Cái" data-ratio="0" data-priceimport="0.0000"
                                                href="javascript:void(0)"
                                                class="text-dark d-flex w-100 justify-content-between p-2 search-name"
                                                id="{{ $item->id }}" data-tax="10" name="search-product"><span
                                                    class="w-100 text-13-black"
                                                    data-id="{{ $item->id }}">{{ $item->product_name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>


                                {{-- <select name="product_name" id=""
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    @foreach ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                    @endforeach
                                </select> --}}
                                {{-- <input type="text" placeholder="Nhập thông tin" name="product_code"
                                    class=""> --}}
                            </div>

                            <div id="show_more" class="" style="display:none;">

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-left-0 border-top-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Kho hàng</p>
                                    </div>
                                    <select name="warehouse_id" id="warehouse"
                                        class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">

                                    </select>
                                    {{-- <input type="text" placeholder="Nhập thông tin" name="product_code"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black"> --}}
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-left-0 border-top-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Trạng thái</p>
                                    </div>
                                    <select name="status" id="status"
                                        class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </select>
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info py-2 border border-left-0 border-top-0">
                                        <p class="p-0 m-0 margin-left32 text-13">Số lượng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="qty"
                                        class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                </div>

                                <div class="d-flex align-items-center height-60-mobile" id="SN">
                                    <div class="title-info py-2 border border-left-0 border-top-0">
                                        <p class="p-0 m-0 margin-left32 text-13">S/N</p>
                                    </div>

                                    <a class="duongdan w-100 border-bottom" data-toggle="modal"
                                        data-target="#exampleModal1" style="opacity:1">
                                        <div class="sn--modal py-2 px-3">
                                            <span class="border-span--modal">
                                                SN
                                            </span>
                                        </div>
                                    </a>
                                    {{-- <input type="text" placeholder="Nhập thông tin" name="qty"
                                        class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black"> --}}
                                </div>

                            </div>
                            {{-- <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                    <p class="p-0 m-0 required-label text-danger margin-left32 text-13-red">Tên hàng hóa
                                    </p>
                                </div>
                                <input type="text" required placeholder="Nhập thông tin" name="product_name"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black"
                                    maxlength="255">
                            </div> --}}


                        </div>
                    </div>
        </div>
        </section>
    </div>


    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                    <div>
                        <button type="button" class="btn-destroy btn-light mx-1" data-dismiss="modal"
                            style="padding: 4px 8px;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075"></path>
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Hủy</span>
                        </button>
                        <button type="button" class="custom-btn" data-dismiss="modal" style="padding: 4px 8px;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                        fill="white"></path>
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Xác nhận</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <table id="table_SNS">
                        <thead>
                            <tr>
                                <th style="width:15%" class="text-table text-secondary border-bottom">STT</th>
                                <th style="width:100%" class="text-table text-secondary border-bottom">Serial number
                                </th>
                                <th style="width:3%" class="border-bottom"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-bottom">1</td>
                                <td class="border-bottom"><input class="form-control w-100 border-0 pl-0"
                                        type="text" name="seri0[]"></td>
                                <td class="deleteRow1 border-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                        viewBox="0 0 12 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z"
                                            fill="#6D7075" />
                                    </svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <button type="button" class="btn-destroy btn-light addRow" style="padding: 4px 8px;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 12 12" fill="none">
                                    <path
                                        d="M6.75 1C6.75 0.58579 6.41421 0.25 6 0.25C5.58579 0.25 5.25 0.58579 5.25 1V5.25H1C0.58579 5.25 0.25 5.58579 0.25 6C0.25 6.41421 0.58579 6.75 1 6.75H5.25V11C5.25 11.4142 5.58579 11.75 6 11.75C6.41421 11.75 6.75 11.4142 6.75 11V6.75H11C11.4142 6.75 11.75 6.41421 11.75 6C11.75 5.58579 11.4142 5.25 11 5.25H6.75V1Z"
                                        fill="#6D7075" />
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">
                                Thêm dòng
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<script>
    function showListProductName() {
        $(document).on("click", "#searchProductName", function() {
            $("#listProductName").show();
        });
    }

    showListProductName()
    $(document).click(function(event) {
        if ($(event.target).closest(".searchProduct").length == 0) {
            $("#listProductName").hide();
        }
    })

    $(document).on("click", ".search-name", function() {
        id = $(this).attr('id')
        $.ajax({
            url: "{{ route('checkInventory') }}",
            type: "get",
            data: {
                id: id,
                name: name,
            },
            success: function(data) {
                $('#status').empty();
                $('#warehouse').empty();
                if (data['status'] == "disabled") {
                    var option = `<option value="1">Thêm tồn kho</option> `;
                } else {
                    var option =
                        `<option value="1">Thêm tồn kho</option> <option value="2">Trừ tồn kho</option> `;
                }
                $('#status').append(option);

                data['warehouse'].forEach(function(element) {
                    var optionWarehouse = `
                        <option value="` + element.id + `" >` + element.warehouse_name + `</option>
                    `;
                    $('#warehouse').append(optionWarehouse);
                })
                if (data['check_seri'] == "d-block") {
                    $('#SN').attr('style', 'display: flex !important');
                } else {
                    $('#SN').attr('style', 'display: none !important');
                };
                // if (data.status == false) {
                //     showNotification('warning', data.msg);
                // } else {
                //     $('form')[1].submit();
                // }
            }
        })


        $('#searchProductName').val($(this).find('span').text());
        $('#show_more').show();
    })


    $("body").on(
        "input",
        'input[name="product_price_import"] ,input[name="price_retail"] ,input[name="price_wholesale"],input[name="price_specialsale"],input[name="product_weight"]',
        function(event) {
            // Lấy giá trị đã nhập
            var value = event.target.value;

            // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
            var formattedValue = value.replace(/[^0-9.]/g, "");

            // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
            var formattedNumber = numberWithCommas(formattedValue);

            event.target.value = formattedNumber;
        }
    );

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split(".");
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber =
            decimalPart !== undefined ?
            formattedIntegerPart + "." + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }


    $(document).on('click', '#dichvu', function() {
        $('.option-radio').attr('style', 'display:none !important;');
        $('select[name="product_tax"]').val(8);
        $('input[name="product_unit"]').val("Gói");
        $('input[name="product_unit"]').prop('readonly', true);
    })
    $(document).on('click', '#hanghoa', function() {
        $('.option-radio').removeAttr('style');
        $('select[name="product_tax"]').val(10);
        $('input[name="product_unit"]').val("");
        $('input[name="product_unit"]').prop('readonly', false);
    })

    $('form').on('submit', function(e) {
        e.preventDefault();
        var name = $('input[name="product_name"]').val()
        $.ajax({
            url: "{{ route('checkProductName') }}",
            type: "get",
            data: {
                name: name,
            },
            success: function(data) {
                if (data.status == false) {
                    showNotification('warning', data.msg);
                } else {
                    $('form')[1].submit();
                }
            }
        })
    })



    createRowInput('seri')

    function createRowInput(name) {
        var addRow = $(".addRow");
        for (let i = 0; i <= addRow.length; i++) {
            $(addRow[i])
                .off("click")
                .on("click", function() {
                    // SLTr = $(addRow[i])
                    //     .closest(".modal-dialog")
                    //     .find("#table_SNS tbody tr").length;
                    // id_target = $(addRow[i]).closest(".modal").attr("id");
                    // SLProduct = $("#quickAction")
                    //     .find('a[data-target="#' + id_target + '"]')
                    //     .closest("tr")
                    //     .find(".quantity-input")
                    //     .val();
                    // if (SLTr < SLProduct) {
                    var modal_body = $(this)
                        .closest(".modal-content")
                        .find(".modal-body");
                    var newtr = document.createElement("tr");
                    var newtd1 = document.createElement("td");
                    var newtd2 = document.createElement("td");
                    var newtd3 = document.createElement("td");
                    var newtd4 = document.createElement("td");
                    var newDiv = document.createElement("input");
                    var stt = document.createElement("span");
                    var checkboxes = modal_body[0].querySelectorAll(
                        // 'input[type="checkbox"]'
                        ".deleteRow1 "
                    );
                    var checkboxCount = checkboxes.length + 1;
                    // checkbox.setAttribute("type", "checkbox");
                    // newtd1.append(checkbox);
                    newDiv.setAttribute("type", "text");
                    newDiv.setAttribute(
                        "class",
                        "form-control w-100 border-0 pl-0"
                    );
                    newDiv.setAttribute("style", "background : none");
                    newDiv.setAttribute("name", name + i + "[]");
                    newtd3.append(newDiv);
                    newtd3.setAttribute("class", "border-bottom");
                    newtd2.setAttribute("class", "border-bottom");
                    newtd4.setAttribute("class", "deleteRow1 border-bottom");
                    newtd4.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3687 5.5C10.6448 5.5 10.8687 5.72386 10.8687 6C10.8687 6.03856 10.8642 6.07699 10.8554 6.11452L9.3628 12.4581C9.1502 13.3615 8.3441 14 7.41597 14H4.58403C3.65593 14 2.84977 13.3615 2.6372 12.4581L1.14459 6.11452C1.08135 5.84572 1.24798 5.57654 1.51678 5.51329C1.55431 5.50446 1.59274 5.5 1.6313 5.5H10.3687ZM6.5 0C7.88071 0 9 1.11929 9 2.5H11C11.5523 2.5 12 2.94772 12 3.5V4C12 4.27614 11.7761 4.5 11.5 4.5H0.5C0.22386 4.5 0 4.27614 0 4V3.5C0 2.94772 0.44772 2.5 1 2.5H3C3 1.11929 4.11929 0 5.5 0H6.5ZM6.5 1.5H5.5C4.94772 1.5 4.5 1.94772 4.5 2.5H7.5C7.5 1.94772 7.05228 1.5 6.5 1.5Z" fill="#6D7075"/>
                    </svg>`;

                    // newtd2.appendChild(stt);
                    // newtr.append(newtd1);
                    newtr.append(newtd2);
                    newtr.append(newtd3);
                    newtr.append(newtd4);
                    modal_body[0]
                        .querySelector("#table_SNS tbody")
                        .appendChild(newtr);
                    newtd2.innerHTML = checkboxCount;
                    // }
                });
        }
    }
</script>
