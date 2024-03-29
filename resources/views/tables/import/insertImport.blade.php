<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.store', $workspacename) }}" method="POST">
    <div class="content-wrapper1 py-2">
        <!-- Content Header (Page header) -->
        @csrf
        <input type="hidden" id="provides_id" name="provides_id">
        <input type="hidden" id="project_id" name="project_id">
        <input type="hidden" id="represent_id" name="represent_id">
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
                    <span class="font-weight-bold">Đơn mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Tạo đơn mua hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <a href="{{ route('import.index', $workspacename) }}">
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
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <a href="#">
                        <button type="submit" class="custom-btn d-flex align-items-center h-100 py-1 px-2"
                            style="margin-right:10px">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                viewBox="0 0 12 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                    fill="white" />
                            </svg>
                            <span class="text-button">Lưu nháp</span>
                        </button>
                    </a>

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
    </div>

    {{-- Thông tin sản phẩm --}}
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="bg-filter-search text-center py-2 border-right-0 border-left-0">
            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
        </div>
        <section class="content">
            <div class="container-fluided">
                <section class="content">
                    <div class="container-fluided order_content">
                        <table id="inputcontent" class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right p-1 border-bottom" style="width:15%;">
                                        <input type="checkbox" class="ml-4 border-danger">
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:25%;">
                                        <span class="text-table text-secondary"> Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Đơn giá</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Thuế</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Thành tiền</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom" style="width:10%;">
                                        <span class="text-table text-secondary">Ghi chú</span>
                                    </th>
                                    <th class="border-top p-1 border-bottom border-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($dataImport)
                                    @foreach ($dataImport as $item)
                                        <tr class="bg-white">
                                            <td class="border border-left-0 border-top-0 border-bottom-0">
                                                <input type="hidden" readonly value="{{ $item->id }}"
                                                    name="listProduct[]">
                                                <div
                                                    class="d-flex w-100 justify-content-between align-items-center position-relative">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                            fill="#42526E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                            fill="#42526E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                            fill="#42526E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                            fill="#42526E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                            fill="#42526E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                            fill="#42526E" />
                                                    </svg>
                                                    <input type="checkbox">
                                                    <input type="text" name="product_code[]"
                                                        class="border-0 px-3 py-2 w-75 searchProduct"
                                                        value="{{ $item->product_code }}">
                                                    <ul id="listProductCode"
                                                        class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                        style="z-index: 99; left: 24%; top: 75%;">
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input id="searchProductName" type="text" name="product_name[]"
                                                    class="searchProductName border-0 px-3 py-2 w-100"
                                                    value="{{ $item->product_name }}">
                                                <ul id="listProductName"
                                                    class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                </ul>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" name="product_unit[]"
                                                    class="border-0 px-3 py-2 w-100 product_unit"
                                                    value="{{ $item->product_unit }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <div class="d-flex"><input type="text" required=""
                                                        oninput="validateQtyInput1(this)"
                                                        class="border-0 px-3 py-2 w-100 quantity-input"
                                                        name="product_qty[]">
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0"><input type="text"
                                                    required="" class="border-0 px-3 py-2 w-100 price_export"
                                                    name="price_export[]"></td>
                                            <input type="hidden" class="product_tax1">
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <select name="product_tax[]" id="" class="product_tax">
                                                    <option value="0"
                                                        @if ($item->product_tax == 0) selected @endif>0%
                                                    </option>
                                                    <option value="8"
                                                        @if ($item->product_tax == 8) selected @endif>8%
                                                    </option>
                                                    <option value="10"
                                                        @if ($item->product_tax == 10) selected @endif>10%
                                                    </option>
                                                    <option value="99"
                                                        @if ($item->product_tax == 99) selected @endif>NOVAT
                                                    </option>
                                                </select>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0"><input type="text"
                                                    class="border-0 px-3 py-2 w-100 total_price" readonly=""
                                                    name="total_price[]">
                                            </td>
                                            {{-- <td class="border border-bottom-0 p-0 bg-secondary"></td> --}}
                                            <td class="border border-top-0 border-bottom-0"><input type="text"
                                                    class="border-0 px-3 py-2 w-100" name="product_note[]"></td>
                                            <td class="border border-top-0 border deleteRow">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                        fill="#42526E"></path>
                                                </svg>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    <div class="ml-3">
                        <span class="text-perpage">
                            <section class="content">
                                <div class="container-fluided">
                                    <div class="d-flex">
                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            id="addRowTable" style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm sản phẩm</span>
                                        </button>

                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            id="" style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm đầu mục</span>
                                        </button>

                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            id="" style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm hàng loạt</span>
                                        </button>

                                        <button type="button" class="btn-option py-1 px-2 bg-white border-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </span>
                    </div>
                </section>
            </div>
        </section>

        <x-formsynthetic :import="''"></x-formsynthetic>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenavadd border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 py-2 text-center">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                    </div>
                    <div class="d-flex">
                        <div style="width: 55%;">
                            <div class="border border-right-0 py-1 border-left-0">
                                <span class="text-table ml-2">Nhà cung cấp</span>
                            </div>
                            <div id="more_info1" style="display:none;">
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Người đại diện</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Đơn mua hàng</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Số tham chiếu</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Ngày báo giá</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Hiệu lực báo giá</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Điều khoản</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Dự án</span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                <input readonly type="text" placeholder="Chọn thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                    id="myInput">
                                <ul id="myUL"
                                    class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập công ty"
                                                class="pr-4 w-100 input-search" id="provideFilter">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($provides as $item)
                                        <li>
                                            <a href="javascript:void(0)" class="text-dark p-2 search-info w-100"
                                                id="{{ $item->id }}" name="search-info">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span
                                                        class="text-table font-weight-bold">{{ $item->provide_name_display }}</span>
                                                    <span>
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 2.92308C5.19582 2.92308 2.92308 5.19582 2.92308 8C2.92308 10.8042 5.19582 13.0769 8 13.0769C10.8042 13.0769 13.0769 10.8042 13.0769 8C13.0769 5.19582 10.8042 2.92308 8 2.92308ZM8 14C4.68602 14 2 11.314 2 8C2 4.68602 4.68602 2 8 2C11.314 2 14 4.68602 14 8C14 11.314 11.314 14 8 14Z"
                                                                fill="#26273B" fill-opacity="0.8"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.00011 4.76904C8.25501 4.76904 8.46165 4.97568 8.46165 5.23058V8.3075C8.46165 8.56241 8.25501 8.76904 8.00011 8.76904C7.74521 8.76904 7.53857 8.56241 7.53857 8.3075V5.23058C7.53857 4.97568 7.74521 4.76904 8.00011 4.76904Z"
                                                                fill="#26273B" fill-opacity="0.8"></path>
                                                            <circle cx="7.99991" cy="10.4616" r="0.615385"
                                                                fill="#26273B" fill-opacity="0.8"></circle>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky addGuestNew"
                                        data-toggle="modal" data-target="#provideModal" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30"></path>
                                            </svg>
                                            Thêm nhà cung cấp
                                        </span>
                                    </a>
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
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off" id="represent" readonly>
                                    <ul id="listRepresent"
                                        class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="pr-4 w-100 input-search" id="searchRepresent">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                            data-toggle="modal" data-target="#modalAddRepresent" style="bottom: 0;">
                                            <span class="text-table text-center font-weight-bold">
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30"></path>
                                                </svg>
                                                Thêm mới
                                            </span>
                                        </a>
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

                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off">
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
                                    <input type="text" placeholder="Chọn thông tin" name="reference_number"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off">
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
                                    <input type="date" placeholder="Chọn thông tin" name=""
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0 flatpickr-input"
                                        autocomplete="off" value="{{ date('Y-m-d') }}" {{-- id="date_quote" --}}
                                        id="datePicker">
                                    <input type="hidden" name="date_quote" id="hiddenDateInput"
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

                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="text" placeholder="Chọn thông tin" name="price_effect"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off" id="price_effect" readonly>

                                    <ul id="listPriceEffect"
                                        class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="pr-4 w-100 input-search" id="searchPriceEffect">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                            data-toggle="modal" data-target="#formModalquote" style="bottom: 0;">
                                            <span class="text-table text-center font-weight-bold">
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30"></path>
                                                </svg>
                                                Thêm mới
                                            </span>
                                        </a>
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

                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="text" placeholder="Chọn thông tin" name="terms_pay"
                                        class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                        autocomplete="off" readonly id="terms_pay">
                                    <ul id="listTermsPay"
                                        class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập thông tin"
                                                    class="pr-4 w-100 input-search" id="searchTermsPay">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                            data-toggle="modal" data-target="#formModalTermPay" style="bottom: 0;">
                                            <span class="text-table text-center font-weight-bold">
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30"></path>
                                                </svg>
                                                Thêm mới
                                            </span>
                                        </a>
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

                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                    <input type="text" placeholder="Chọn thông tin" id="inputProject"
                                        class="border-0 bg w-100 bg-input-guest py-0 px-0 nameGuest"
                                        autocomplete="off">
                                    <ul id="listProject"
                                        class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                        style="z-index: 99;">
                                        @foreach ($project as $va)
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="text-dark d-flex justify-content-between p-2 project_name w-100"
                                                    id="{{ $va->id }}" name="project_name">
                                                    <span class="w-100">{{ $va->project_name }}</span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <x-formprovides></x-formprovides>
    <x-form-modal-import title="Thêm mới người đại diện" name="addRepresent"
        idModal="modalAddRepresent"></x-form-modal-import>
    <x-form-modal-import title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-form-modal-import>
    <x-form-modal-import title="Điều khoản thanh toán" name="termpay"
        idModal="formModalTermPay"></x-form-modal-import>
    {{-- <x-date-form-modal title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-date-form-modal> --}}
</form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
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
    getKeyProvide($('#getKeyProvide'));

    $(document).click(function(event) {
        if ((!$(event.target).closest("#searchRepresent").length && !$(event.target).closest('#represent')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listRepresent').hide();
        }
        if ((!$(event.target).closest('#price_effect').length && !$(event.target).closest('#searchPriceEffect')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listPriceEffect').hide();
        }
        if ((!$(event.target).closest('#terms_pay').length && !$(event.target).closest('#searchTermsPay')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listTermsPay').hide();
        }
    });

    $('.search-info').click(function() {
        var provides_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                if (data.key) {
                    quotation = getQuotation(data.key, data['count'], data['date']);
                } else {
                    quotation = getQuotation(data['provide'].provide_name_display, data['count'],
                        data['date']);
                }
                $('input[name="quotation_number"]').val(quotation);
                $('#myInput').val(data['provide'].provide_name_display);
                $('#provides_id').val(data['provide'].id);

                $.ajax({
                    url: "{{ route('getDataForm') }}",
                    type: "get",
                    data: {
                        id: data['provide'].id,
                        status: 'add'
                    },
                    success: function(data) {
                        $('#listRepresent li').empty();
                        $('#listPriceEffect li').empty();
                        $('#listTermsPay li').empty();
                        $('#represent').val('');
                        $('#price_effect').val('');
                        $('#terms_pay').val('')
                        if (data['default_price'][0]) {
                            $('#price_effect').val(data['default_price'][0].form_desc)
                        }
                        if (data['default_term'][0]) {
                            $('#terms_pay').val(data['default_term'][0].form_desc)
                        }

                        data['represent'].forEach(function(element) {
                            var li =
                                `
                            <li class="border" id="` + element.id + `">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent"
                                    id="` + element.id + `" name="search-represent">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.represent_name + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#modalAddRepresent" data-name="represent"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="represent"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.represent_name + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="represent"
                                            data-id="` + element.id + `">
                                            ` + (element.default === 1 ? '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listRepresent .p-1').after(li);
                            if (element.default == 1) {
                                $('#represent').val(element.represent_name);
                                $('#represent_id').val(element.id);
                            }
                        });

                        data['price_effect'].forEach(function(element) {
                            var li =
                                `
                            <li class="border" id="` + element.id + `">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect"
                                    id="` + element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="priceeffect"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="import"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listPriceEffect .p-1').after(li);
                        });

                        data['terms_pay'].forEach(function(element) {
                            var li =
                                `
                            <li class="border" id="` + element.id + `">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay"
                                    id="` + element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="termpay"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="termpay"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listTermsPay .p-1').after(li);
                        });
                    }
                })
                $('#more_info').show();
                $('#more_info1').show();
            }
        });
    });

    function showData(classname, inputShow, inputHide) {
        $(document).on('click', '.' + classname, function(e) {
            e.preventDefault();
            id = $(this).attr('id');
            table = $(this).attr('name');
            $.ajax({
                url: "{{ route('showData') }}",
                type: "get",
                data: {
                    id: id,
                    table: table,
                },
                success: function(data) {
                    if (data['table'] == "search-represent") {
                        $('#' + inputShow).val(data[table].represent_name)
                        $('#' + inputHide).val(data[table].id)
                    } else {
                        $(data['table'] == "search-price-effect" ? '#price_effect' : '#terms_pay')
                            .val(data[table].form_desc)
                    }
                }
            })
        })
    }



    showData('search-represent', 'represent', 'represent_id')
    showData('search-price-effect', 'price_effect', '')
    showData('search-term-pay', 'terms_pay', '')

    // Ghim 
    $(document).on('click', '.set-default', function() {
        id = $(this).attr('data-id');
        form = $(this).attr('data-name');
        provides_id = $('#provides_id').val();
        $.ajax({
            url: "{{ route('setDefault') }}",
            type: "get",
            data: {
                id: id,
                provides_id: provides_id,
                form: form
            },
            success: function(data) {
                if (data['represent']) {
                    $('#represent').val(data['represent'].represent_name)
                    $('#represent_id').val(data['represent'].id)
                    $('#listRepresent').hide()
                } else {
                    $(data['price_effect'] ? '#price_effect' : '#terms_pay').val((data[
                            'price_effect'] ?
                        data['price_effect'] : data['termpay']).form_desc)
                    $(data['price_effect'] ? '#listPriceEffect' : '#listTermsPay').hide()
                }

            }
        })
    })

    // Xóa người đại diện
    $(document).on('click', '.delete-item', function() {
        id = $(this).attr('data-id')
        table = $(this).attr('data-name')
        $.ajax({
            url: "{{ route('deleteForm') }}",
            type: "get",
            data: {
                id: id,
                table: table
            },
            success: function(data) {
                $('#' + data.list + ' li#' + data.id).remove();
                showNotification('success', data.msg)
            }
        })
    })

    // Chỉnh sửa thông tin
    $(document).on('click', '.search-date-form', function() {
        var id = $(this).data('id');
        var table = $(this).attr('data-name')
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                    table: table
                },
                success: function(data) {
                    if (data['represent']) {
                        $('input[name="provide_represent_new"]').val(data['represent']
                            .represent_name)
                        $('input[name="provide_email_new"]').val(data['represent'].represent_email)
                        $('input[name="provide_phone_new"]').val(data['represent'].represent_phone)
                        $('input[name="provide_address_delivery_new"]').val(data['represent']
                            .represent_address)
                        $('#modalAddRepresent #exampleModalLabel').text('Cập nhật')
                        $('#addRepresent').attr('data-id', data['represent'].id).text('Cập nhật')
                    } else {
                        $('#form-name-' + data['table']).val(data[data['table']].form_name)
                        $('#form-desc-' + data['table']).val(data[data['table']].form_desc)
                        $('#form_field').val(data[data['table']].form_field)
                        $('#formModalquote #exampleModalLabel').text('Cập nhật')
                        $('#' + data['table']).attr('data-id', data[data['table']].id).text(
                            'Cập nhật')
                    }

                }
            })

        }
    })

    $('#addProvide').click(function() {
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var key = $("input[name='key']").val().trim();
        var provide_name = $("input[name='provide_name']").val().trim();
        var provide_represent = $("input[name='provide_represent']").val().trim();
        var provide_email = $("input[name='provide_email']").val().trim();
        var provide_phone = $("input[name='provide_phone']").val().trim();
        var provide_address_delivery = $("input[name='provide_address_delivery']").val().trim();
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
                url: "{{ route('addNewProvide') }}",
                type: "get",
                data: {
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    provide_name: provide_name,
                    provide_represent: provide_represent,
                    provide_email: provide_email,
                    provide_phone: provide_phone,
                    provide_address_delivery: provide_address_delivery
                },
                success: function(data) {
                    if (data.success == true) {
                        quotation = getQuotation(data.key, '1')
                        $('#myInput').val(data.name);
                        $('#provides_id').val(data.id);
                        $('input[name="quotation_number"]').val(quotation);
                        $('.modal [data-dismiss="modal"]').click();
                        showNotification('success', data.msg)
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='key']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                        if (data.id_represent) {
                            var newli = `
                                    <li class="border" id="` + data.id_represent +
                                `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                data.id_represent + `" name="search-represent">
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                .represent_name +
                                `</span>
                                    </a>

                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                data.id_represent + `" id="` + data.id_represent + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id_represent + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.represent_name +
                                `" id="default-id` + data.id_represent +
                                `" href="#" data-name="represent" data-id="` + data.id_represent + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                            $('#listRepresent .p-1').after(newli)
                        }
                        $('#more_info').show();
                        $('#more_info1').show();
                    } else {
                        showNotification('warning', data.msg)
                    }
                }
            });
        }
    });

    function actionForm(id, routeAdd, routeEdit) {
        $('#' + id).click(function() {
            var status = $(this).text().trim();
            var provide_represent = $("input[name='provide_represent_new']").val().trim();
            var provide_email = $("input[name='provide_email_new']").val().trim();
            var provide_phone = $("input[name='provide_phone_new']").val().trim();
            var provide_address_delivery = $("input[name='provide_address_delivery_new']").val().trim();

            if (status == 'Thêm mới') {
                if ((provides_id == "" || provide_represent == "") && id == 'addRepresent') {
                    showNotification('warning', 'Vui lòng nhập tên người đại diện')
                } else {
                    if (id == 'addRepresent') {
                        provides_id = $('#provides_id').val();
                        $.ajax({
                            url: routeAdd,
                            type: "get",
                            data: {
                                table: id,
                                provides_id: provides_id,
                                provide_represent: provide_represent,
                                provide_email: provide_email,
                                provide_phone: provide_phone,
                                provide_address_delivery: provide_address_delivery
                            },
                            success: function(data) {
                                if (data.success) {
                                    $("input[name='provide_represent_new']").val('')
                                    $("input[name='provide_email_new']").val('')
                                    $("input[name='provide_phone_new']").val('')
                                    $("input[name='provide_address_delivery_new']").val('')
                                    $('.closeModal').click()
                                    $('#represent_id').val(data.id)
                                    $('#represent').val(data.data)
                                    var newli = `
                                    <li class="border" id="` + data.id +
                                        `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                        data.id + `" name="search-represent">
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data.data +
                                        `</span>
                                    </a>

                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                        data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.data +
                                        `" id="default-id` + data.id +
                                        `" href="#" data-name="represent" data-id="` + data.id + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                                    $('#listRepresent .p-1').after(newli)
                                }
                                showNotification('success', data.msg)
                            }
                        })
                    } else {
                        inputName = $('#form-name-' + id).val().trim();
                        inputDesc = $('#form-desc-' + id).val()
                        $.ajax({
                            url: routeAdd,
                            type: "get",
                            data: {
                                table: id,
                                inputName: inputName,
                                inputDesc: inputDesc,
                            },
                            success: function(data) {
                                $('.btn.btn-default').click()
                                $('#form-name-' + id).val('')
                                $('#form-desc-' + id).val('')
                                $('.closeModal').click()
                                if (data.success) {
                                    $(id == "import" ? '#price_effect' : '#terms_pay').val(data
                                        .data);
                                    if (id == "import") {
                                        var price_effect = `
                                        <li class="border" id="` + data.id + `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="16" name="search-price-effect">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data.data +
                                            `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                            data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                            .id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                            `" id="default-id` + data.id +
                                            `" href="#" data-name="import" data-id="` + data.id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                    } else {
                                        var term_pay = `
                                        <li class="border" id="` + data.id +
                                            `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                            data.id + `" name="search-term-pay">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data.data +
                                            `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                            data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                            .id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                            `" id="default-id` + data.id +
                                            `" href="#" data-name="termpay" data-id="` + data.id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                    }
                                    $(id == "import" ? $('#listPriceEffect .p-1').after(
                                        price_effect) : $('#listTermsPay .p-1').after(
                                        term_pay))
                                }
                                showNotification('success', data.msg)
                            }
                        })
                    }
                }
            } else {
                present_id = $(this).attr('data-id');
                if (id == 'addRepresent') {
                    $.ajax({
                        url: routeEdit,
                        type: "get",
                        data: {
                            table: id,
                            present_id: present_id,
                            provide_represent: provide_represent,
                            provide_email: provide_email,
                            provide_phone: provide_phone,
                            provide_address_delivery: provide_address_delivery
                        },
                        success: function(data) {
                            $('.closeModal').click()
                            if (data.success) {
                                showNotification('success', data.msg)
                            } else {
                                showNotification('warning', data.msg)
                            }
                        }
                    })
                } else {
                    inputName = $('#form-name-' + id).val().trim();
                    inputDesc = $('#form-desc-' + id).val()
                    inputField = $('#form_field').val()
                    $.ajax({
                        url: routeEdit,
                        type: "get",
                        data: {
                            table: id,
                            present_id: present_id,
                            inputName: inputName,
                            inputDesc: inputDesc,
                            inputField: inputField
                        },
                        success: function(data) {
                            $('.closeModal').click()
                            if (data.success) {
                                showNotification('success', data.msg)
                            } else {
                                showNotification('warning', data.msg)
                            }
                        }
                    })

                }
            }
        })

    }

    function getAc(button) {
        return $(button).attr('id');
    }

    actionForm('addRepresent', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('import', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('termpay', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')

    function getProduct(name) {
        $('#inputcontent tbody tr .' + name).on('click', function() {
            listProductName = $(this).closest('tr').find('#listProductName');
            inputCode = $(this).closest('tr').find('.searchProduct');
            inputName = $(this).closest('tr').find('.searchProductName');
            inputUnit = $(this).closest('tr').find('.product_unit');
            inputPriceExprot = $(this).closest('tr').find('.price_export');
            inputRatio = $(this).closest('tr').find('.product_ratio');
            inputPriceImport = $(this).closest('tr').find('.price_import');
            selectTax = $(this).closest('tr').find('.product_tax');
            $.ajax({
                url: "{{ route('showProductName') }}",
                type: "get",
                success: function(data) {
                    listProductName.empty();
                    data.forEach(element => {
                        var UL = '<li class="w-100">' +
                            '<a data-unit="' + element
                            .product_unit +
                            '" data-code="' + element
                            .product_code +
                            '" data-priceExport= "' +
                            element.product_price_export +
                            '" data-ratio="' + element
                            .product_ratio +
                            '" data-priceImport="' + element
                            .product_price_import +
                            '" href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-name" id="' +
                            element.id +
                            '" data-tax="' + element
                            .product_tax +
                            '" name="search-product">' +
                            '<span class="w-100" data-id="' +
                            element.id + '">' + element
                            .product_name + '</span>' +
                            '</a>' +
                            '</li>';
                        listProductName.append(UL);
                    })
                    $('.search-name').on('click', function() {
                        inputCode.val($(this).attr('data-code') == "null" ? "" : $(this)
                            .attr('data-code'));
                        inputName.val($(this).closest('li').find('span').text());
                        inputUnit.val($(this).attr('data-unit') == "null" ? "" : $(this)
                            .attr('data-unit'));
                        inputPriceExprot.val($(this).attr('data-priceExport') == "null" ?
                            "" : formatCurrency($(this).attr('data-priceExport')))
                        inputRatio.val($(this).attr('data-ratio') == "null" ? "" : $(this)
                            .attr('data-ratio'))
                        inputPriceImport.val($(this).attr('data-priceImport') == "null" ?
                            "" : formatCurrency($(this).attr('data-priceImport')))
                        selectTax.val($(this).attr('data-tax'))
                        listProductName.hide();
                        checkDuplicateRows()
                    })
                }
            })
        })
    }


    $('.project_name').on('click', function() {
        var project_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_project') }}",
            type: "get",
            data: {
                project_id: project_id
            },
            success: function(data) {
                $('#inputProject').val(data.project_name);
                $('#project_id').val(data.id);
            }
        })
    })

    $('form').on('submit', function(e) {
        e.preventDefault();
        var formSubmit = true;
        if ($('#provides_id').val() == '') {
            formSubmit = false;
            showNotification('warning', 'Vui lòng chọn nhà cung cấp')
            return false;
        }
        if ($('#inputcontent tbody tr').length < 1) {
            formSubmit = false;
            showNotification('warning', 'Vui lòng thêm ít nhất 1 sản phẩm')
            return false;
        }

        var quotetion_number = $('input[name="quotation_number"]').val();
        if (formSubmit) {
            provide_id = $('#provides_id').val();
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    provide_id: provide_id
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Số báo giá đã tồn tại')
                    } else {
                        $('form')[0].submit();
                    }
                }
            })
        }
    })
</script>
</body>
</html>
