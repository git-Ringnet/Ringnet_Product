<x-navbar :title="$title" activeGroup="systemFirst" activeName="warehouse"></x-navbar>
<div class="pr-2 editGuest min-height--none" style="background: none;">
    <div class="content-header-fixed p-0">
        <div class="content__header--inner">
            <div class="content__heading--left">
                <span class="ml-4">Thiết lập ban đầu</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="nearLast-span">Kho</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="last-span">
                    Xem thông tin kho
                </span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('warehouse.index', $workspacename) }}" class="activity" data-name1="KH"
                            data-des="Trở về">
                            <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                style="margin-right:10px;">
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-button">Trở về</span>
                            </button>
                        </a>
                    </div>
                    <a class="activity" data-name1="KH" data-des="Xem trang sửa"
                        href="{{ route('warehouse.edit', ['workspace' => $workspacename, 'warehouse' => $wareHouse->id]) }}">
                        <button type="button" class="custom-btn d-flex align-items-center h-100 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                    fill="white"></path>
                                <path
                                    d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                    fill="white"></path>
                                <path
                                    d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                    fill="white"></path>
                            </svg>
                            <span class="text-btnIner-primary ml-2">Sửa</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content editGuest margin-top-38">
        <section class="content">
            <section class="container-fluided">
                <div class="row">
                    <div class="col-12">
                        <section class="content-header--options p-0">
                            <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                                <li>
                                    <a id="info-tab" class="text-secondary active m-0 pl-3 activity" data-name1="KH"
                                        data-des="Xem thông tin khách hàng" data-toggle="tab" href="#info">Thông
                                        tin</a>
                                </li>
                                <li>
                                    <a id="product-tab" class="text-secondary m-0 pl-3 pr-3 activity" data-toggle="tab"
                                        href="#product">Sản phẩm</a>
                                </li>
                            </ul>
                        </section>
                        <div class="tab-content">
                            <div id="info" class="content tab-pane in active">
                                <div class="info-chung">
                                    <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông
                                        tin
                                        chung</p>
                                    <div class="content-info">

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 text-danger margin-left32 text-13">Mã kho
                                                    hàng
                                                </p>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $wareHouse->id }}">
                                            <input type="text" name="warehouse_code"
                                                value="{{ $wareHouse->warehouse_code }}" readonly
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Tên kho hàng</p>
                                            </div>
                                            <input type="text" name="warehouse_name"
                                                value="{{ $wareHouse->warehouse_name }}" readonly
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Địa chỉ</p>
                                            </div>
                                            <input type="text" name="warehouse_address"
                                                value="{{ $wareHouse->warehouse_address }}" readonly
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product" class="tab-pane fade">
                                <div class="info-chung">
                                    <p class="font-weight-bold text-uppercase info-chung--heading border-custom">
                                        Sản phẩm
                                    </p>
                                    <div class="outer container-fluided order_content">
                                        <table class="table table-hover bg-white rounded" id="warehouseTable">
                                            <thead>
                                                <tr>
                                                    <th class="border-right height-52 padding-left35 text-13">
                                                        Mã hàng hóa
                                                    </th>
                                                    <th class="border-right height-52 padding-left35 text-13">
                                                        Tên hàng hóa
                                                    </th>
                                                    <th class="border-right height/-52 padding-left35 text-13">
                                                        ĐVT
                                                    </th>
                                                    <th class="border-right height/-52 padding-left35 text-13">
                                                        Số lượng tồn
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $item_product)
                                                    <tr id="dynamic-row-1"
                                                        class="bg-white addWarehouse representative-row">
                                                        <td class="border border-top-0 border-left-0 padding-left35">
                                                            <input autocomplete="off"
                                                                value="{{ $item_product->product_code }}"
                                                                class="border-0 px-2 py-1 w-100 text-13-black"
                                                                readonly>
                                                        </td>
                                                        <td class="border border-top-0 padding-left35 border-left-0">
                                                            <input autocomplete="off" readonly
                                                                value="{{ $item_product->product_name }}"
                                                                class="border-0 px-2 py-1 w-100 text-13-black">
                                                        </td>
                                                        <td class="border border-top-0 padding-left35 border-left-0">
                                                            <input autocomplete="off" readonly
                                                                value="{{ $item_product->product_unit }}"
                                                                class="border-0 px-2 py-1 w-100 text-13-black">
                                                        </td>
                                                        <td class="border border-top-0 padding-left35 border-left-0">
                                                            <input autocomplete="off" readonly
                                                                value="{{ is_int($item_product->qty) ? $item_product->qty : rtrim(rtrim(number_format($item_product->qty, 4, '.', ''), '0'), '.') }}"
                                                                class="border-0 px-2 py-1 w-100 text-13-black">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    $(document).ready(function() {
        $("form").on("submit", function(e) {
            var rows = $("#warehouseTable .addWarehouse");
            if (rows.length === 0) {
                showAutoToast("warning", "Vui lòng thêm thủ kho!");
                e.preventDefault();
            }
        });
    });
</script>
{{-- <script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
    $('form').on('submit', function(e) {
        e.preventDefault();
        var id = {{ $product->id }}
        var name = $('input[name="product_name"]').val()
        $.ajax({
            url: "{{ route('checkProductName') }}",
            type: "get",
            data: {
                name: name,
                action: "edit",
                id: id
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
</script> --}}
