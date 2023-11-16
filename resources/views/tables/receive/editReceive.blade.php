<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('receive.update', $receive->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="detailimport_id" id="detailimport_id">
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Đơn nhận hàng</span>
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
                        <span>Nhận hàng</span>
                    </button>
                    {{-- <button class="btn-option">
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
                    </button> --}}
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
                                        <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                    </div>
                                    <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                                        name="quotation_number"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 search_quotation"
                                        autocomplete="off" required value="{{ $receive->quotation_number }}">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Nhà cung cấp</p>
                                    </div>
                                    <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ $receive->getNameProvide->provide_name_display }}">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Đơn vị vận chuyển</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="shipping_unit"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ $receive->shipping_unit }}">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Phí giao hàng</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ $receive->delivery_charges }}">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Ngày nhận hàng</p>
                                    </div>
                                    <input type="date" placeholder="Nhập thông tin" name="received_date"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ $receive->created_at->toDateString() }}">
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
                            <th class="border-right" style="width:12%;">Số lượng</th>
                            <th class="border-right">Đơn giá</th>
                            <th class="border-right">Thuế</th>
                            <th class="border-right">Thành tiền</th>
                            <th class="p-0 bg-secondary" style="width:1%;"></th>
                            <th class="border-right product_ratio">Hệ số nhân</th>
                            <th class="border-right price_import">Giá nhập</th>
                            <th class="border-right">Ghi chú</th>
                            {{-- <th class="border-top"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $st = 0; ?>
                        @foreach ($product as $item)
                            <tr class="bg-white">
                                <td class="border border-left-0 border-top-0 border-bottom-0"><input type="checkbox"
                                        name="product_code[]" id=""> {{ $item->product_code }}</td>
                                <td class="border border-top-0 border-bottom-0 position-relative">
                                    <input type="text" class="searchProductName border-0 px-3 py-2 w-100"
                                        name="product_name[]" value="{{ $item->product_name }}" readonly>
                                </td>
                                <td class="border border-top-0 border-bottom-0">{{ $item->product_unit }}</td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="text" class="border-0 px-3 py-2 w-100 quantity-input"
                                            name="product_qty[]" value="{{ number_format($item->product_qty) }}"
                                            readonly>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{ $st }}"
                                            style="background:transparent; border:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 32 32" fill="none">
                                                <rect width="32" height="32" rx="4" fill="white">
                                                </rect>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                    fill="#0095F6"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                    fill="#0095F6"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                    fill="#0095F6"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                    fill="#0095F6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="border border-top-0 border-bottom-0">
                                    <input type="text" class="border-0 px-3 py-2 w-100 price_export"
                                        name="price_export[]"
                                        value="{{ fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                        readonly>
                                </td>
                                <td>
                                    <input type="text" class="border-0 px-3 py-2 w-100 product_tax"
                                        name="product_tax[]" value="{{ $item->product_tax }}" readonly>
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input type="text" class="border-0 px-3 py-2 w-100 total_price"
                                        name="total_price[]"
                                        value="{{ fmod($item->product_total, 1) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                        readonly>
                                </td>
                                <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                <td class="border border-top-0 border-bottom-0 product-ratio">
                                    <input type="text" class="border-0 px-3 py-2 w-100 product_ratio"
                                        name="product_ratio[]" value="{{ $item->product_ratio }}" readonly>
                                </td>
                                <td class="border border-top-0 border-bottom-0 price_import">
                                    <input type="text" class="border-0 px-3 py-2 w-100 price_import"
                                        name="price_import[]" value="{{ fmod($item->price_import,1) > 0 ? number_format($item->price_import,2,'.',',') : number_format($item->price_import) }}"
                                        readonly>
                                </td>
                                <td class="border border-top-0 border-bottom-0">
                                    <input type="text" class="border-0 px-3 py-2 w-100" name="product_note[]"
                                        value="{{ $item->product_note }}" readonly>
                                </td>
                            </tr>
                            <?php $st++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <x-formmodalseri :product="$product"></x-formmodalseri>
        <?php $import = '123'; ?>
        <x-formsynthetic :import="$import"></x-formsynthetic>
    </form>
</div>

<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $('form').on('submit', function(e) {
        e.preventDefault();
        var productSN = {}
        var formSubmit = false;
        var listProductName = [];
        var listQty = [];
        var listSN = [];
        var status = {{ $receive->status }}
        if (status == 1) {
            $('.searchProductName').each(function() {
                listProductName.push($(this).val().trim());
                listQty.push($(this).closest('tr').find('.quantity-input').val().trim());
                var count = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').filter(
                    function() {
                        return $(this).val() !== '';
                    }).length;
                listSN.push(count);
                var oldValue = $(this).val().trim();
                productSN[oldValue] = {
                    sn: []
                };
                SerialNumbers = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').map(function() {
                    return $(this).val().trim();
                }).get();
                productSN[oldValue].sn.push(...SerialNumbers)
            });
            // Kiểm tra số lượng sn và số lượng sản phẩm
            $.ajax({
                url: "{{ route('checkSN') }}",
                type: "get",
                data: {
                    listProductName: listProductName,
                    listQty: listQty,
                    listSN: listSN
                },
                success: function(data) {
                    if (data['status'] == 'false') {
                        alert('Vui lòng nhập đủ số lượng seri sản phẩm ' + data['productName'])
                    } else {
                        // Kiểm tra sản phẩm đã tồn tại seri chưa
                        $.ajax({
                            url: "{{ route('checkduplicateSN') }}",
                            type: "get",
                            data: {
                                value: productSN,
                            },
                            success: function(data) {
                                if (data['success'] == false) {
                                    alert('Sản phảm' + data['msg'] + 'đã tồn tại seri' +
                                        data['data'])
                                } else {
                                    updateProductSN()
                                    $('form')[0].submit();
                                }
                            }
                        })
                    }
                }
            })
        } else {
            $('form')[0].submit();
        }
    })

    // Tạo INPUT SERI
    createRowInput('seri');
</script>
