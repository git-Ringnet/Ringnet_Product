<x-navbar :title="$title" activeGroup="buy" activeName="reciept"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('reciept.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-2">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        {{-- <div class="content-header p-0"> --}}
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Hóa đơn mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Tạo hóa đơn mua hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <a href="{{ route('reciept.index', $workspacename) }}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">Hủy</span>
                        </button>
                    </a>

                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14"
                                fill="none" class="mr-2">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <button name="action" value="action_1" type="submit"
                        class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14"
                            fill="none" class="mr-1">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                fill="white"></path>
                        </svg>
                        <span>Lưu nháp</span>
                    </button>

                    <button name="action" value="action_2" type="submit"
                        class="custom-btn d-flex align-items-center h-100 rounded" style="margin-right:10px">
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 14 14" fill="none" class="mr-1">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                fill="white"></path>
                        </svg>
                        <span>Xác nhận</span>
                    </button>

                    <span id="sideProvide" class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none">
                            <path
                                d="M14 10C14 12.2091 12.2091 14 10 14L4 14C1.7909 14 0 12.2091 0 10L0 4C0 1.79086 1.7909 0 4 0L10 0C12.2091 0 14 1.79086 14 4L14 10ZM9 12.5L9 1.5L4 1.5C2.6193 1.5 1.5 2.61929 1.5 4L1.5 10C1.5 11.3807 2.6193 12.5 4 12.5H9Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>


                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    {{-- Thông tin sản phẩm --}}
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="bg-filter-search border-top-0 text-center py-2">
            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
        </div>
        <section class="content">
            <div class="container-fluided">
                <section class="content">
                    <div class="container-fluided order_content">
                        <table id="inputcontent" class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right p-1 border-top-0" style="width:15%;">
                                        <input type="checkbox" class="ml-4" id="checkall">
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1" style="width:25%;">
                                        <span class="text-table text-secondary"> Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Đơn giá</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Thuế</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Thành tiền</span>
                                    </th>
                                    <th class="border-right p-1" style="width:10%;">
                                        <span class="text-table text-secondary">Ghi chú</span>
                                    </th>
                                    <th class="border-top border-right p-1" style="width:1%;"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </section>
                <?php $import = '123'; ?>
                <x-formsynthetic :import="$import"></x-formsynthetic>
            </div>
        </section>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenavadd border" style="top: 44px;">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 py-2 text-center">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN NHÀ CUNG CẤP</span>
                    </div>

                    <div class="d-flex">
                        <div style="width:55%;">
                            <div class="border border-right-0 py-1 border-left-0">
                                <span class="text-table ml-2">Đơn mua hàng</span>
                            </div>
                            <div id="more_info1" style="display:none;">
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Nhà cung cấp</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Người đại diện</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Số hóa đơn</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Ngày hóa đơn</span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                <input readonly id="myInput" type="text" placeholder="Nhập thông tin"
                                    name="quotation_number"
                                    class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0 search_quotation"
                                    autocomplete="off" required>
                                <input type="hidden" name="detail_id" id="detail_id"
                                    value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                                <ul id="listReceive"
                                    class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                    style="z-index: 99; display: block;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập đơn mua hàng"
                                                class="pr-4 w-100 input-search" id="provideFilter">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($reciept as $value)
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="text-dark d-flex justify-content-between p-2 search-receive"
                                                id="{{ $value->id }}" name="search-info">
                                                <span
                                                    class="w-100">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                            fill="#42526E"></path>
                                    </svg>
                                </div>
                            </div>
                            <div id="more_info" style="display:none;">
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        value="@isset($yes){{ $show_receive['provide_name'] }}@endisset">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input readonly name="represent" type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off" id="represent">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="text" placeholder="Nhập thông tin" name="number_bill"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="date" placeholder="Nhập thông tin" name="date_bill"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        value="{{ date('Y-m-d') }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                                fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                                fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
</div>
{{-- <script src="{{ asset('/dist/js/products.js') }}"></script> --}}
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
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
            $.ajax({
                url: "{{ route('show_receive') }}",
                type: "get",
                data: {
                    detail_id: detail_id
                },
                success: function(data) {
                    $('#myInput').val(data.quotation_number == null ? data.id :
                        data
                        .quotation_number);
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
                                        <input type="text" readonly name="product_code[]" class="border-0 px-2 py-1 w-75 searchProduct" value="` +
                                        (element.product_code == null ?
                                            "" : element
                                            .product_code) +
                                        `">
                                        <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
                                        </ul>
                                    </div>
                                </td> 
                                <td class="border border-top-0 border-bottom-0 position-relative">
                                    <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-2 py-1 w-100" value='` +
                                        element.product_name +
                                        `'>
                                </td>   
                                <td> 
                                    <input readonly type="text" name="product_unit[]" class="border-0 px-2 py-1 w-100 product_unit" value="` +
                                        element
                                        .product_unit +
                                        `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input oninput="checkQty(this,` + (element.product_qty - element.reciept_qty) +
                                        `)" type="text" name="product_qty[]" class="border-0 px-2 py-1 w-100 quantity-input" value="` +
                                        formatCurrency(element
                                            .product_qty - element
                                            .reciept_qty) +
                                        `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="price_export[]" class="border-0 px-2 py-1 w-100 price_export" value="` +
                                        formatCurrency(element
                                            .price_export) +
                                        `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="product_tax[]" class="border-0 px-2 py-1 w-100 product_tax" value="` +
                                        (element.product_tax == 99 ? "NOVAT" : element.product_tax + "%") +
                                        `">
                                </td>
                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <input readonly type="text" name="total_price[]" class="border-0 px-2 py-1 w-100 total_price" readonly="" value="` +
                                        formatCurrency(element
                                            .product_total) +
                                        `">
                                </td>
                                <td class="border border-top-0 border-bottom-0">
                                    <input readonly type="text" name="product_note[]" class="border-0 px-2 py-1 w-100" value="` +
                                        (element.product_note == null ?
                                            "" : element
                                            .product_note) + `">
                                </td>
                                <input type="hidden" name="" class="product_tax1">
                                <td class="border border-top-0 border deleteRow">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z" fill="#6B6F76"></path>
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
</script>
