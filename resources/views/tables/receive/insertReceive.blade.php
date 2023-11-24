<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('receive.store') }}" method="POST">
        @csrf
        <input type="hidden" name="detailimport_id" id="detailimport_id">
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Đơn nhận hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Tạo mới đơn nhận hàng</span>
                </div>
                <div class="row m-0 mb-1">
                    <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white" />
                        </svg>
                        <span>Tạo mới</span>
                    </button>
                    <button class="btn-option">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#42526E" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        <hr class="mt-3">

        <section class="content">
            <div class="container-fluided">
                <div class="row">
                    <div class="col-12">
                        <div class="info-chung">
                            <div class="content-info">
                                <div class="d-flex ml-2 align-items-center position-relative">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Đơn mua hàng</p>
                                    </div>
                                    <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                                        name="quotation_number"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 search_quotation"
                                        autocomplete="off" required>
                                    <ul id="listReceive"
                                        class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                        style="z-index: 99; left: 23%; top: 100%; display: block;">
                                        @foreach ($listDetail as $value)
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="text-dark d-flex justify-content-between p-2 search-receive"
                                                    id="{{ $value->id }}" name="search-info">
                                                    <span class="w-50">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Nhà cung cấp</p>
                                    </div>
                                    <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="shipping_unit"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Ngày nhận hàng</p>
                                    </div>
                                    <input type="date" placeholder="Nhập thông tin" name="received_date"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content mt-5">
            <div class="container-fluided">
                <table class="table table-hover bg-white rounded" id="inputcontent">
                    <thead>
                        <tr>
                            <th class="border-right"><input type="checkbox"> Mã sản phẩm
                            </th>
                            <th class="border-right">Tên sản phẩm</th>
                            <th class="border-right">Đơn vị</th>
                            <th class="border-right">Số lượng</th>
                            <th class="border-right">Đơn giá</th>
                            <th class="border-right">Thuế</th>
                            <th class="border-right">Thành tiền</th>
                            <th class="p-0 bg-secondary" style="width:1%;"></th>
                            <th class="border-right">Ghi chú</th>
                            <th class="border-top"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>
        <?php $product = []; ?>
        <x-formmodalseri :product="$product" :status="2" id="product"></x-formmodalseri>
        <?php $import = '123'; ?>
        <x-formsynthetic :import="$import"></x-formsynthetic>
    </form>
</div>

{{-- <script src="{{ asset('/dist/js/products.js') }}"></script> --}}
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $('.search-receive').on('click', function() {
        detail_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_receive') }}",
            type: "get",
            data: {
                detail_id: detail_id
            },
            success: function(data) {
                $('#search_quotation').val(data.quotation_number== null ? data.id : data.quotation_number);
                $('#provide_name').val(data.provide_name);
                $('#detailimport_id').val(data.id)
                $('#listReceive').hide();
                $.ajax({
                    url: "{{ route('getProduct_receive') }}",
                    type: "get",
                    data: {
                        id: data.id
                    },
                    success: function(product) {
                        $('#product').html(product)
                        $('#inputcontent tbody').empty();
                        product.forEach(element => {
                            if (element.product_qty - element.receive_qty > 0) {
                                var tr =
                                    `
                                <tr class="bg-white">
                                    <td class="border border-left-0 border-top-0 border-bottom-0">
                                    <input type="hidden" readonly value="` + element.id +
                                    `" name="listProduct[]">
                                    <div class="d-flex w-100 justify-content-between align-items-center position-relative">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
                                        </svg>
                                        <input type="checkbox">
                                        <input type="text" readonly name="product_code[]" class="border-0 px-3 py-2 w-75 searchProduct" value="` +
                                    (element.product_code == null ? "" : element
                                        .product_code) +
                                    `">
                                        <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
                                        </ul>
                                    </div>
                                </td> 
                                <td class="border border-top-0 border-bottom-0 position-relative">
                                    <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-3 py-2 w-100" value="` +
                                    element.product_name +
                                    `">
                                </td>   
                                <td> 
                                    <input readonly type="text" name="product_unit[]" class="border-0 px-3 py-2 w-100 product_unit" value="` +
                                    element.product_unit + `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                <div class="d-flex">
                                    <input oninput="checkQty(this,` + (element.product_qty - element.receive_qty) +
                                    `)" type="text" name="product_qty[]" class="border-0 px-3 py-2 w-100 quantity-input" value="` +
                                    formatCurrency(element.product_qty - element
                                        .receive_qty) +
                                    `">
                                </div>
                                </td>
                               
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="price_export[]" class="border-0 px-3 py-2 w-100 price_export" value="` +
                                    formatCurrency(element
                                        .price_export) +
                                    `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="product_tax[]" class="border-0 px-3 py-2 w-100 product_tax" value="` +
                                    element.product_tax +
                                    `%">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="total_price[]" class="border-0 px-3 py-2 w-100 total_price" readonly="" value="` +
                                    formatCurrency(element.product_total) +
                                    `">
                                </td>
                                <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                <td class="border border-top-0 border-bottom-0">
                                    <input readonly type="text" name="product_note[]" class="border-0 px-3 py-2 w-100" value="` +
                                    (element.product_note == null ? "" : element
                                        .product_note) + `">
                                </td>
                                <td class="border border-top-0 border deleteRow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
                                    </svg>
                                </td>
                                </tr>
                            `;
                                $('#inputcontent tbody').append(tr);
                            }
                            deleteRow()
                            updateTaxAmount()
                            calculateTotalAmount()
                            calculateTotalTax()
                            calculateGrandTotal()
                        });
                    }
                })
            }
        })

    })


    function deleteRow() {
        $('.deleteRow').off('click').on('click', function() {
            id = $(this).closest('tr').find('button').attr('data-target');
            $('#list_modal ' + id).remove();
            $(this).closest('tr').remove();

        })
    }
</script>
