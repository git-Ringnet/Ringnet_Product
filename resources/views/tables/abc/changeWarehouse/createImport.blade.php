<x-navbar :title="$title" activeGroup="manageProfess" activeName="importChangeWarehouse"></x-navbar>
<form action="{{ route('importChangeWarehouse.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left opacity-0">
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
                        <a class="text-dark" href="{{ route('importChangeWarehouse.index', $workspacename) }}">
                            Phiếu nhập chuyển kho
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
                    <span class="last-span">Tạo phiếu nhập chuyển kho</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('importChangeWarehouse.index', $workspacename) }}" class="user_flow"
                            data-type="NCC" data-des="Hủy thêm nhà cung cấp">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <p class="m-0 p-0 text-13">Hủy</p>
                            </button>
                        </a>

                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <p class="m-0 p-0">Xác nhận chuyển kho</p>
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
                            <div class="d-flex w-100">
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày lập</span>
                                    <input type="text" placeholder="Chọn ngày" id="datePicker"
                                        class="border-0 w-100 py-2 px-3 text-13-black height-100 bg-input-guest-blue">
                                    <input type="hidden" name="created_at" id="hiddenDateInput">
                                </div>
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thủ kho</span>
                                    <div class="w-100">
                                        <select name="manager_warehouse"
                                            class="text-13-black w-100 border-0 bg-input-guest bg-input-guest-blue py-2 px-2">
                                            @foreach ($users as $user_item)
                                                <option value="{{ $user_item->id }}">{{ $user_item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Kho xuất</span>
                                    <div class="w-100 text-13-black position-relative">
                                        <input id="searchWarehouse" type="text" placeholder="Chọn kho"
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100 searchWarehouse bg-input-guest-blue"
                                            readonly>
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
                                                            class="fas fa-search text-table"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            @foreach ($warehouse as $va)
                                                <li class="p-2 align-items-center"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                    <a href="javascript:void(0)" id="{{ $va->id }}"
                                                        name="search-info" class="search-warehouse" style="flex:2;">
                                                        <span class="text-13-black">{{ $va->warehouse_name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex w-100">
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                                    <input type="text" readonly name="change_warehouse_code"
                                        value="{{ $invoiceAuto }}"
                                        class="border-0 w-100 py-2 px-3 text-13-black height-100">
                                </div>
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập</span>
                                    <input type="text" placeholder="Nhập thông tin"
                                        class="border-0 w-100 py-2 px-3 text-13-black height-100"
                                        value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Kho nhận</span>
                                    <div class="border-0 w-100 text-13-black position-relative">
                                        <input id="searchWarehouse1" type="text" placeholder="Chọn kho"
                                            class="w-100 py-2 border-0 px-3 text-13-black height-100 searchWarehouse bg-input-guest-blue"
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
                            </div>
                            <div class="d-flex w-100">
                                <div
                                    class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                                    <input type="text" placeholder="Nhập thông tin" name="note"
                                        class="border-0 w-100 py-2 px-3 text-13-black height-100 bg-input-guest-blue">
                                </div>
                            </div>
                            {{-- <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Sản phẩm</p>
                                </div>
                                <div class="border-0 w-100 text-13-black position-relative">
                                    <input id="searchProduct" type="text" placeholder="Chọn kho"
                                        class="border w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black height-100 searchProduct"
                                        readonly>
                                    <input type="hidden"
                                        class="border-0 py-1 w-100 height-32 text-13-black product_id"
                                        name="product_id">
                                    <input type="hidden"
                                        class="border-0 py-1 w-100 height-32 text-13-black quoteImport"
                                        name="quoteImport_id">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- Thông tin hàng hóa --}}
    <div class="content">
        <div id="title--fixed" class="bg-filter-search text-center border-custom border-0">
            <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM
            </p>
        </div>
        <div class="container-fluided">
            <section class="content">
                <table class="table" id="inputcontent">
                    <thead>
                        <tr style="height:44px;">
                            <th class="border-right px-2 p-0 text-left">
                                <span class="text-table text-secondary">Hàng hóa</span>
                            </th>
                            <th class="border-right px-2 p-0 text-left">
                                <span class="text-table text-secondary">ĐVT</span>
                            </th>
                            <th class="border-right px-2 p-0 text-left">
                                <span class="text-table text-secondary">Số lượng</span>
                            </th>
                            <th class="border-right note px-2 p-0 text-left">
                                <span class="text-table text-secondary">Ghi chú</span>
                            </th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="dynamic-fields" class="bg-white"></tr>
                    </tbody>
                </table>
            </section>
        </div>
        <section class="content mt-2">
            <div class="container-fluided">
                <div class="d-flex ml-4">
                    <button type="button" data-toggle="dropdown" id="add-field-btn" data-name1="BG"
                        data-des="Thêm sản phẩm"
                        class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded activity"
                        style="margin-right:10px">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="#42526E"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="#42526E"></path>
                        </svg>
                        <span class="text-table">Thêm sản phẩm</span>
                    </button>
                </div>
            </div>
        </section>
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
<script src="{{ asset('/dist/js/changeWarehouse.js') }}"></script>
<script>
    //Thêm hàng hóa
    $("#add-field-btn").click(function() {
        const newRow = $("<tr>", {
            id: `dynamic-row-${fieldCounter}`,
            class: `bg-white addProduct`,
            style: `height:80px`,
        });

        const tenSanPham = $(
            `<td class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>` +
            `<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;display: none;'>` +
            `@foreach ($product as $product_value)` +
            `<li data-id='{{ $product_value->id }}'>` +
            `<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>` +
            `<span class='w-50 text-13-black' style='flex:2'>{{ $product_value->product_name }}</span>` +
            `</a>` +
            `</li>` +
            `@endforeach` +
            `</ul>` +
            `<div class='d-flex align-items-center'>` +
            `<input type='text' class='border-0 px-2 py-1 w-100 product_name height-32' autocomplete='off' required name='product_name[]'>` +
            `<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>` +
            `</div>` +
            `</td>`
        );

        const dvt = $(
            "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<input type='text' class='border-0 px-2 py-1 w-100 height-32 product_unit' autocomplete='off' required name='product_unit[]'>" +
            "</td>"
        );

        const soluong = $(
            "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<input type='number' class='border-0 px-2 py-1 w-100 height-32 quantity-input' autocomplete='off' name='qty[]' required>" +
            "</td>"
        );
        const ghiChu = $(
            "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<input type='text' class='border-0 px-2 py-1 w-100 height-32' autocomplete='off' name='product_note[]'>" +
            "</td>"
        );
        const xoa = $(
            "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
            "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'></path></svg>" +
            "</td>"
        );

        // Append other elements like maSanPham, tenSanPham, chiTietChietKhau, thue, thanhTien, kho, ghiChu, option here
        newRow.append(tenSanPham, dvt, soluong, ghiChu, xoa);

        $("#dynamic-fields").before(newRow);

        // Increment fieldCounter for the next row
        fieldCounter++;

        //Xóa sản phẩm
        xoa.click(function() {
            // Lấy product_id của hàng đang được xóa
            var deletedProductId = $(this).closest("tr").find(".product_id").val();

            // Xóa hàng
            $(this).closest("tr").remove();
            fieldCounter--;

            // Chuyển đổi deletedProductId thành số nguyên (nếu cần)
            var deletedProductIdInt = parseInt(deletedProductId);

            // Kiểm tra xem deletedProductIdInt có tồn tại trong mảng arrProduct không
            var index = arrProduct.indexOf(deletedProductIdInt);
            if (index !== -1) {
                // Xóa product_id khỏi mảng arrProduct
                arrProduct.splice(index, 1);
            }
        });
        addProductRow();
        $(".idProduct").off("click").on("click", function(event) {
            event.stopPropagation();
            var clickedRow = $(this).closest("tr");
            var productName = clickedRow.find(".product_name");
            var productUnit = clickedRow.find(".product_unit");
            var product_id = clickedRow.find(".product_id");
            var idProduct = $(this).attr("id");

            var tonkho = clickedRow.find(".tonkho");
            var soTonKho = clickedRow.find(".soTonKho");
            var inventory = clickedRow.find(".inventory");
            var quantity_input = clickedRow.find(".quantity-input");

            arrProduct = [];
            $(".product_id").each(function() {
                arrProduct.push($(this).val());
            });

            $.ajax({
                url: '{{ route('getProduct') }}',
                type: "GET",
                data: {
                    idProduct: idProduct,
                },
                success: function(data) {
                    productName.val(data.product_name);
                    productUnit.val(data.product_unit);
                    product_id.val(data.id);
                    productUnit.prop("readonly", true);
                    $(".list_product").hide();
                    arrProduct = [];
                    if (clickedRow.find(".warehouse_id").val()) {
                        tonkho.val(
                            formatNumber(
                                data.product_inventory == null ?
                                0 :
                                data.product_inventory
                            )
                        );
                        if (data.type == 2) {
                            soTonKho.text("");
                            inventory.hide();
                            quantity_input.val(1);
                        } else {
                            soTonKho.text(
                                parseFloat(
                                    data.product_inventory == null ?
                                    0 :
                                    data.product_inventory
                                )
                            );
                            inventory.show();
                            quantity_input.val("");
                            if (data.product_inventory > 0) {
                                inventory.show();
                            }
                        }
                    }
                    // Thêm tất cả product_id hiện có vào mảng arrProduct
                    $(".product_id").each(function() {
                        // Lấy giá trị 'value' của phần tử input và chuyển đổi thành số nguyên
                        var productId = parseInt($(this).val(), 10);
                        // Thêm giá trị vào mảng arrProduct
                        arrProduct.push(productId);
                    });
                },
            });
        });
    });
    //
    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi mở date picker
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
        }
    });

    function updateHiddenInput(selectedDate, instance, hiddenInputId) {
        // Lấy thời gian hiện tại
        var currentTime = new Date();

        // Cập nhật giá trị của trường ẩn với thời gian hiện tại và ngày đã chọn
        var selectedDateTime = new Date(selectedDate);
        selectedDateTime.setHours(currentTime.getHours());
        selectedDateTime.setMinutes(currentTime.getMinutes());
        selectedDateTime.setSeconds(currentTime.getSeconds());

        document.getElementById(hiddenInputId).value = instance.formatDate(selectedDateTime, "Y-m-d H:i:S");
    }

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
        var rows = document.querySelectorAll('tr');
        var hasProducts = false;
        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                var inputs = rows[i].querySelectorAll('input[required]');
                var productNameInput = rows[i].querySelector('.product_name');
                var productName = productNameInput.value;

                // Kiểm tra các trường input sản phẩm
                for (var j = 0; j < inputs.length; j++) {
                    if (inputs[j].value.trim() === '') {
                        showAutoToast('warning', 'Vui lòng điền đủ thông tin sản phẩm');
                        return;
                    }
                }
                hasProducts = true;
            }
        }
        if (!hasProducts) {
            showAutoToast('warning', 'Không có sản phẩm để chuyển kho');
            check = true;
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
