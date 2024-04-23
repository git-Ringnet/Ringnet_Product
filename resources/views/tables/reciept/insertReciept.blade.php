<x-navbar :title="$title" activeGroup="buy" activeName="reciept"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('reciept.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" name="action" id="getAction">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Hóa đơn mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo hóa đơn mua hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('reciept.index', $workspacename) }}" class="user_flow" data-type="HDMH"
                            data-des="Hủy">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <a href="#" onclick="getAction(this)">
                            <button name="action" value="action_2" type="submit"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Xác nhận</span>
                            </button>
                        </a>


                        <a href="#" onclick="getAction(this)">
                            <button typname="action" value="action_1" type="submit"
                                class="custom-btn mx-1 d-flex align-items-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                    viewBox="0 0 12 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                        fill="white" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                            </button>
                        </a>

                        <button id="sideProvide" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA" />
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                        </button>

                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-38" id="main">
            <section class="content margin-250">
                <div id="title--fixed"
                    class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="content">
                        <div class="content-info position-relative text-nowrap order_content">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right px-2 p-0" style="width: 15%;padding-left:2rem;">
                                            <input type='checkbox' class='checkall-btn ml-4 mr-1'id="checkall" />
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 16%;">
                                            <span class="text-table text-secondary">Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 8%;">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 8%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-center" style="width: 8%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-right" style="width: 12%;">
                                            <span class="text-table text-secondary">Thành tiền</span>
                                        </th>
                                        <th class="border-right note px-2 p-0" style="width: 15%;">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                        <th class="border-right"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <?php $import = '123'; ?>
                <x-formsynthetic :import="$import"></x-formsynthetic>
            </section>
        </div>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG
                            CẤP</p>
                    </div>

                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:42px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng
                        </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" id="myInput"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest search_quotation"
                                style="background-color:#F0F4FF; border-radius:4px;" name="quotation_number"
                                autocomplete="off" readonly>
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                        </span>
                        <div class="d-flex align-items-center justify-content-between border-0">
                            <ul id="listReceive"
                                class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập đơn mua hàng"
                                            class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                            id="provideFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($reciept as $value)
                                    <li class="p-2 align-items-center"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="javascript:void(0)" id="{{ $value->id }}" name="search-info"
                                            class="search-receive" style="flex:2;">
                                            <span
                                                class="text-13-black">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div id="more_info" style="display:none;">
                        <ul class="p-0 m-0">
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhà cung cấp</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" readonly id="provide_name"
                                    value="@isset($yes){{ $show_receive['provide_name'] }}@endisset"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" id="represent" readonly name="represent"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số hóa đơn</span>
                                <input type="text" placeholder="Chọn thông tin" name="number_bill" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày hóa đơn</span>
                                <input id="datePicker" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" name="" value="{{ date('d/m/Y') }}" />
                                <input type="hidden" name="date_bill" value="{{ date('Y-m-d') }}"
                                    id="hiddenDateInput">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="recentModal" tabindex="-1" aria-labelledby="productModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="outer text-nowrap">
                    <table id="example2" class="table table-hover bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Ngày mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>

<script>
    $(document).on('click', '.transaction', function() {
        nameProduct = $(this).closest('tr').find('.searchProductName').val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: "get",
            data: {
                product_name: nameProduct,
            },
            success: function(data) {
                $('#recentModal .modal-body tbody').empty()
                if (data['history']) {
                    data['history'].forEach(
                        element => {
                            var tr = `
                                <tr>
                                    <td>` + element.product_name + `</td>
                                    <td>` + formatCurrency(element.price_export) + `</td>
                                    <td>` + (element.product_tax == 99 ? "NOVAT" : element.product_tax + "%") + `</td>
                                    <td>` + new Date(element.created_at).toLocaleDateString('vi-VN'); + `</td>
                                </tr> `;
                            $('#recentModal .modal-body tbody').append(tr);
                        })
                }
            }
        })
    })

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
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
    deleteRow()
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $(document).ready(function() {
        $('.search-receive').on('click', function(event, detail_id) {
            if (detail_id) {
                detail_id = detail_id
            } else {
                detail_id = parseInt($(this).attr('id'), 10);
            }
            detail_id = $(this).attr('id');
            table = "reciept";
            $.ajax({
                url: "{{ route('show_receive') }}",
                type: "get",
                data: {
                    detail_id: detail_id,
                    table: table
                },
                success: function(data) {
                    // console.log(data);
                    $('#myInput').val(data.quotation_number == null ? data.id :
                        data
                        .quotation_number);
                    // $('input[name^="number_bill"]').val("SHD-"+data.id)
                    $('input[name^="number_bill"]').val(data.resultNumber)
                    $('#provide_name').val(data.provide_name);
                    $('#represent').val(data.represent)
                    $('#detailimport_id').val(data.id)
                    $('#listReceive').hide();
                    $.ajax({
                        url: "{{ route('getProduct_reciept') }}",
                        type: "get",
                        data: {
                            id: data.id
                        },
                        success: function(product) {
                            $('#inputcontent tbody').empty();
                            $('#more_info').show();
                            $('#more_info1').show();
                            product.forEach(function(element) {
                                if ((element.product_qty - element
                                        .reciept_qty) >
                                    0) {
                                    var tr =
                                        `<tr class="bg-white" style="height:80px">
                                            <td class='border-right p-2 text-13 align-top border-bottom'>
                                                    <span class='ml-1 mr-2'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>
                                                            <g clip-path='url(#clip0_1710_10941)'>
                                                                <path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>
                                                            </g>
                                                        <defs>
                                                            <clipPath id='clip0_1710_10941'>
                                                            <rect width='6' height='10' fill='white'/>
                                                            </clipPath>
                                                        </defs>
                                                        </svg>
                                                    </span>
                                                    <input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>

                                                    <input type="text" value="` + (element.product_code == null ? "" :
                                            element.product_code) + `" 
                                                            readonly autocomplete="off" 
                                                            class="border-0 pl-0 pr-2 py-1 w-50 searchProduct" name="product_code[]">

                                                    <input type="hidden" readonly value="` + element.id + `" name="listProduct[]">

                                                    <ul id="listProductCode" 
                                                        class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" 
                                                        style="z-index: 99; left: 24%; top: 75%;">
                                                    </ul>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                <div class='d-flex align-items-center'>

                                                    <input type='text' class='border-0 px-2 py-1 w-100 searchProductName'
                                                            value='` + element.product_name + `' readonly id="searchProductName"
                                                            autocomplete='off' name='product_name[]'>

                                                    <div class='info-product' data-toggle='modal' data-target='#productModal'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>
                                                            <g clip-path='url(#clip0_2559_39956)'>
                                                                <path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>
                                                                <path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>
                                                                <path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id='clip0_2559_39956'>
                                                                    <rect width='14' height='14' fill='white'/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                <input type="text" value="` + element.product_unit + `" 
                                                    readonly autocomplete="off" 
                                                    class="border-0 px-2 py-1 w-100 product_unit" name="product_unit[]">
                                            </td>

                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                    <div>
                                                        <input type='text' oninput="checkQty(this,` + (element
                                            .product_qty - element
                                            .reciept_qty) + `)"
                                                            value="` + formatCurrency(element.product_qty - element
                                            .reciept_qty) + `"
                                                            class='border-0 px-2 py-1 w-100 quantity-input text-right' autocomplete='off'
                                                            name='product_qty[]'>
                                                    </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                    <input type='text' class='text-right border-0 px-2 py-1 w-100 price_export' 
                                                        value="` + formatCurrency(element.price_export) + `"
                                                        autocomplete='off' name="price_export[]" required>
                                                        <div class="mt-3 text-13-blue text-right transaction" id="transaction" data-toggle="modal" data-target="#recentModal">Giao dịch
                                                            gần đây
                                                        </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                <input readonly type="text" name="product_tax[]" 
                                                    class="border-0 px-2 py-1 w-100 product_tax text-center" 
                                                    value="` + (element.product_tax == 99 ? "NOVAT" : element
                                            .product_tax + "%") + `">
                                            </td>

                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                <input type='text' name="total_price[]"
                                                        value="` + formatCurrency(element.product_total) + `" readonly 
                                                        class="border-0 px-2 py-1 w-100 total_price text-right">
                                            </td>
                                            
                                            <td class="border-right p-2 text-13 align-top border-bottom">
                                                <input type="text" placeholder='Nhập ghi chú'
                                                        readonly value="` + (element.product_note == null ? "" :
                                            element.product_note) + `"
                                                        class="border-0 py-1 w-100" name="product_note[]">
                                            </td>

                                            <input type="hidden" name="" class="product_tax1">

                                            <td class="border-right p-2 text-13 align-top border-bottom text-center deleteRow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z" fill="#6B6F76">
                                                    </path>
                                                </svg>
                                            </td>
                                    </tr>`;
                                    $('#inputcontent tbody').append(tr);
                                }
                                deleteRow()
                                updateTaxAmount()
                                calculateTotalAmount()
                                calculateTotalTax()
                                calculateGrandTotal()
                            })
                        }
                    })
                }
            })
        })
        var detail_id = $('#detail_id').val();
        if (detail_id) {
            $('.search-receive').trigger('click', detail_id);
        }
    });


    $('form').on('submit', function(e) {
        e.preventDefault();
        var number_bill = $("input[name='number_bill']").val();
        $.ajax({
            url: "{{ route('checkQuotetion') }}",
            type: "get",
            data: {
                number_bill: number_bill,
            },
            success: function(data) {
                if (!data['status']) {
                    showNotification('warning', 'Số hóa đơn đã tồn tại')
                } else {
                    $('form')[1].submit();
                }
            }
        })
    })

    $(document).on('click', '.user_flow', function(e) {
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
</script>
