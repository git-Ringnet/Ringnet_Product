<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('paymentOrder.update', ['workspace' => $workspacename, 'paymentOrder' => $payment->id]) }}"
        method="POST" id="formSubmit" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="detailimport_id" id="detailimport_id" value="{{ $payment->detailimport_id }}">
        <input type="hidden" name="detail_id" value="{{ $payment->id }}">
        <input type="hidden" name="table_name" value="TTMH">
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Đơn nhận hàng</span>
                </div>
                <div class="row m-0 mb-1">
                    @if ($payment->status != 2)
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <span>Thanh toán hóa đơn</span>
                        </button>
                    @else
                        <a href="{{ route('paymentOrder.index',$workspacename) }}">
                            <span class="btn btn-secondary d-flex align-items-center h-100">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="10"
                                    viewBox="0 0 6 10" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.76877 0.231232C6.07708 0.53954 6.07708 1.03941 5.76877 1.34772L2.11648 5L5.76877 8.65228C6.07708 8.96059 6.07708 9.46046 5.76877 9.76877C5.46046 10.0771 4.96059 10.0771 4.65228 9.76877L0.441758 5.55824C0.13345 5.24993 0.13345 4.75007 0.441758 4.44176L4.65228 0.231231C4.96059 -0.0770772 5.46046 -0.0770772 5.76877 0.231232Z"
                                        fill="#42526E" />
                                </svg>
                                <span>Trở về</span>
                            </span>
                        </a>
                    @endif

                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="#0095F6" />
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="#0095F6" />
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>

                    <a href="#" id="delete_payment" class="d-flex align-items-center h-100 btn-danger"
                        style="padding: 3px 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                            fill="none">
                            <path
                                d="M22.981 10.9603C26.3005 14.2798 26.3005 19.6617 22.981 22.9811C19.6615 26.3006 14.2796 26.3006 10.9602 22.9811C7.64073 19.6617 7.64073 14.2798 10.9602 10.9603C14.2796 7.64084 19.6615 7.64084 22.981 10.9603Z"
                                stroke="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.728 12.7281C13.0023 12.4538 13.447 12.4538 13.7213 12.7281L21.2133 20.22C21.4876 20.4943 21.4876 20.9391 21.2133 21.2133C20.939 21.4876 20.4943 21.4876 20.22 21.2133L12.728 13.7214C12.4537 13.4471 12.4537 13.0024 12.728 12.7281Z"
                                fill="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.2133 12.7281C21.4876 13.0024 21.4876 13.4471 21.2133 13.7214L13.7213 21.2133C13.447 21.4876 13.0023 21.4876 12.728 21.2133C12.4537 20.9391 12.4537 20.4943 12.728 20.22L20.22 12.7281C20.4943 12.4538 20.939 12.4538 21.2133 12.7281Z"
                                fill="#E4E4E4" />
                        </svg>
                        <span>Xóa đơn nhận hàng</span>
                    </a>


                </div>
            </div>
        </section>
        <hr class="mt-3">

        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a data-toggle="tab" href="#info">Thông tin</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#histpry">Lịch sử thanh toán</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#attachment">Attachment</a></li>
            </ul>
        </section>

        <div class="tab-content">
            <div id="info" class="content tab-pane in active">
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
                                                autocomplete="off" required readonly
                                                value="{{ $payment->getQuotation->quotation_number }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Nhà cung cấp</p>
                                            </div>
                                            <input readonly type="text" id="provide_name"
                                                placeholder="Nhập thông tin"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                readonly value="{{ $payment->getProvideName->provide_name_display }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Hạn thanh toán</p>
                                            </div>
                                            <input type="date" placeholder="Nhập thông tin" name="payment_date"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                value="{{ $payment->formatDate($payment->payment_date)->format('Y-m-d') }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Tổng tiền</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin"
                                                name="delivery_charges"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                readonly value="{{ number_format($payment->total) }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Đã thanh toán</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="payment"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                value="{{ number_format($payment->payment) }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Dư nợ</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="debt"
                                                readonly
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                value="{{ number_format($payment->debt) }}">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Thanh toán trước</p>
                                            </div>
                                            <input oninput="checkQty(this,{{ $payment->debt }})" type="text"
                                                placeholder="Nhập thông tin" name="payment"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 payment_input">
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
                                    <th class="border-right product_ratio">Hệ số nhân</th>
                                    <th class="border-right price_import">Giá nhập</th>
                                    <th class="border-right">Ghi chú</th>
                                    {{-- <th class="border-top border-right"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr class="bg-white">
                                        <td class="border-right">
                                            <input type="checkbox">
                                            <input type="text" name="product_code[]" readonly
                                                class="border-0 px-3 py-2 w-75 searchProduct">{{ $item->product_code }}
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 position-relative">
                                            <input readonly name="product_name[]" type="text"
                                                class="searchProductName border-0 px-3 py-2 w-100"
                                                value=" {{ $item->product_name }}">
                                        </td>
                                        <td class="border-right">
                                            <input readonly type="text" name="product_unit[]"
                                                class="border-0 px-3 py-2 w-100 product_unit"
                                                value="  {{ $item->product_unit }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" name="product_qty[]"
                                                class="border-0 px-3 py-2 w-100 quantity-input"
                                                value=" {{ number_format($item->product_qty) }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" name="price_export[]"
                                                class="border-0 px-3 py-2 w-100 price_export"
                                                value="{{ fmod($item->price_export, 2) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" class="border-0 px-3 py-2 w-100 product_tax"
                                                name="product_tax[]" value=" {{ $item->product_tax }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" name="total_price[]"
                                                class="border-0 px-3 py-2 w-100 total_price"
                                                value=" {{ fmod($item->product_total, 2) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}">
                                        </td>
                                        <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                        <td class="border border-top-0 border-bottom-0 product-ratio">
                                            <input type="text" name="product_ratio[]"
                                                class="border-0 px-3 py-2 w-100 product_ratio"
                                                value=" {{ $item->product_ratio }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 price_import">
                                            <input type="text" name="price_import[]"
                                                class="border-0 px-3 py-2 w-100 price_import"
                                                value="{{ number_format($item->price_import) }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0">
                                            <input type="text" name="product_note[]"
                                                class="border-0 px-3 py-2 w-100" value="{{ $item->product_note }}">
                                        </td>
                                        {{-- <td class="border border-top-0 border"></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php $import = '123'; ?>
                <x-formsynthetic :import="$import"></x-formsynthetic>
            </div>

            <div id="histpry" class="tab-pane fade">
                <section class="content">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-12">
                                <div class="row m-auto filter pt-4 pb-4">
                                    <form class="w-100" action="" method="get" id="search-filter">
                                        <div class="row mr-0 w-100">
                                            <div class="col-md-5 d-flex">
                                                <div class="position-relative" style="width: 55%;">
                                                    <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                        class="pr-4 w-100 input-search" value="">
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search" aria-hidden="true"></i></span>
                                                </div>
                                                <button class="filter-btn ml-2">Bộ lọc
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content mt-2">
                    <div class="container-fluided">
                        <table class="table table-hover bg-white rounded" id="inputcontent1">
                            <thead>
                                <tr>
                                    <th>Mã thanh toán</th>
                                    <th>Ngày thanh toán</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Dư nợ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $htr)
                                    <tr class="bg-white">
                                        <td>{{ $htr->id }}</td>
                                        <td>{{ date_format(new DateTime($htr->created_at), 'd-m-Y') }}</td>
                                        <td>{{ number_format($htr->total) }}</td>
                                        <td>{{ number_format($htr->payment) }}</td>
                                        <td>{{ number_format($htr->debt) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
    </form>
    <div id="attachment" class="tab-pane fade">
        <x-form-attachment :value="$payment" name="TTMH"></x-form-attachment>
    </div>
</div>


</div>

<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    // Xóa đơn hàng
    deleteImport('#delete_payment',
        '{{ route('paymentOrder.destroy', ['workspace' => $workspacename, 'paymentOrder' => $payment->id]) }}')
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })

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
                $('#search_quotation').val(data.quotation_number);
                $('#provide_name').val(data.provide_name);
                $('#detailimport_id').val(data.id)
                $('#listReceive').hide();
                $.ajax({
                    url: "{{ route('getProduct') }}",
                    type: "get",
                    data: {
                        id: data.id
                    },
                    success: function(product) {
                        $('#inputcontent tbody').empty();
                        product.forEach(function(element) {
                            var tr =
                                `
                                <tr class="bg-white">
                                    <td class="border border-left-0 border-top-0 border-bottom-0">
                                    <input type="hidden" readonly= value="` + element.id +
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
                                        <input type="text" readonly name="product_code[]" class="border-0 px-3 py-2 w-75 searchProduct" value="">
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
                                element
                                .product_unit +
                                `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="product_qty[]" class="border-0 px-3 py-2 w-100 quantity-input" value="` +
                                formatCurrency(element.product_qty) +
                                `">
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
                                <td class="border border-top-0 border-bottom-0 product-ratio">
                                    <input readonly required="" type="text" name="product_ratio[]" class="border-0 px-3 py-2 w-100 product_ratio" value="` +
                                element.product_ratio +
                                `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 price_import">
                                    <input readonly required="" type="text" name="price_import[]" class="border-0 px-3 py-2 w-100 price_import" value="` +
                                formatCurrency(element.price_import) +
                                `">
                                </td>
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
                            deleteRow()
                        })
                    }
                })
            }
        })
    })
</script>
