<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.store', $workspacename) }}" method="POST">
    <div class="content-wrapper--2Column m-0 min-height--none">
        <!-- Content Header (Page header) -->
        @csrf
        <input type="hidden" id="provides_id" name="provides_id">
        <input type="hidden" id="project_id" name="project_id">
        <input type="hidden" id="represent_id" name="represent_id">
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
                    <span class="nearLast-span">Đơn mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo đơn mua hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('import.index', $workspacename) }}">
                            <button type="button" class="btn-destroy btn-light d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light d-flex align-items-center h-100 dropdown-toggle"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-2">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-btnIner" href="#">Xuất
                                    Excel</a>
                                <a class="dropdown-item text-btnIner border-top" href="#">Xuất PDF</a>
                            </div>
                        </div>

                        <a href="#">
                            <button type="submit" class="custom-btn d-flex align-items-center h-100">
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                                    viewBox="0 0 12 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                        fill="white" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                            </button>
                        </a>

                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
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
        <div class="content" id="main" style="margin-top:3.8rem;">
            <section class="content margin-250">
                <div id="title--fixed" class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
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
                                        <th class="border-right px-2 p-0" style="width: 15%;z-index:100;">
                                            <span class="text-table text-secondary">Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 8%;">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 8%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 8%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right px-2 p-0" style="width: 10%;">
                                            <span class="text-table text-secondary">Thành tiền</span>
                                        </th>
                                        <th class="border-right note px-2 p-0" style="width: 15%;">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                        <th class="border-right"></th>
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
                                                    <div class="d-flex">
                                                        <input type="text" required=""
                                                            oninput="validateQtyInput1(this)"
                                                            class="border-0 px-3 py-2 w-100 quantity-input"
                                                            name="product_qty[]">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" required=""
                                                        class="border-0 px-3 py-2 w-100 price_export"
                                                        name="price_export[]">
                                                </td>
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
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    </section>
                </div>
                <div class="ml-4 mt-1">
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
            <x-formsynthetic :import="''"></x-formsynthetic>
        </div>
        <div class="content-wrapper2 margin-top-fixed4">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN nhà cung
                            cấp</p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:44px;" style="height:44px;">

                        <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>

                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" readonly>
                        </span>
                        <div class="">
                            <div id="myUL"
                                class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block list-guest"
                                style="z-index: 99;display: none;">
                                <ul class="m-0 p-0 scroll-data">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập nhà cung cấp"
                                                class="pr-4 w-100 input-search bg-input-guest" id="provideFilter">
                                            <span id="search-icon" class="search-icon">
                                                <i class="fas fa-search text-table" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @foreach ($provides as $item)
                                        <li class="p-2 align-items-center text-wrap"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" style="flex:2" id="{{ $item->id }}"
                                                name="search-info" class="search-info">
                                                <span
                                                    class="text-13-black">{{ $item->provide_name_display }}</span></span>
                                            </a>
                                            <a id="" class="search-infoEdit" type="button"
                                                data-toggle="modal" data-target="#editProvide"
                                                data-id="{{ $item->id }}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" viewBox="0 0 14 14" fill="none">
                                                        <path
                                                            d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z"
                                                            fill="black" />
                                                        <path
                                                            d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z"
                                                            fill="black" />
                                                        <path
                                                            d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a type="button"
                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                    data-toggle="modal" data-target="#provideModal"
                                    style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30" />
                                        </svg>
                                    </span>
                                    <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm
                                        nhà cung cấp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div id="more_info" style="display:none;">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest nameGuest"
                                        style="flex:2;" id="represent" readonly placeholder="Chọn thông tin" />
                                    <ul id="listRepresent"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập công ty"
                                                    class="pr-4 w-100 input-search bg-input-guest"
                                                    id="searchRepresent">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search text-table" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                            data-toggle="modal" data-target="#modalAddRepresent"
                                            style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30" />
                                                </svg>
                                            </span>
                                            <span class="text-13-black pl-3 pt-1"
                                                style="font-weight: 600 !important;">Thêm người đại diện</span>
                                        </a>
                                    </ul>
                                </li>

                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số báo giá</span>

                                    <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                        name="quotation_number" style="flex:2;" placeholder="Chọn thông tin">

                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest"
                                        placeholder="Nhập thông tin" style="flex:2;" name="reference_number" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest flatpickr-input"
                                        name="" placeholder="Chọn thông tin" style="flex:2;" id="datePicker"
                                        value="{{ date('Y-m-d') }}" />
                                    <input type="hidden" name="date_quote" id="hiddenDateInput"
                                        value="{{ date('Y-m-d') }}">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" name="price_effect"
                                        placeholder="Chọn thông tin" style="flex:2;" id="price_effect" readonly />
                                    <ul id="listPriceEffect"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập hiệu lực"
                                                    class="pr-4 w-100 input-search bg-input-guest"
                                                    id="searchPriceEffect">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search text-table" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                            data-toggle="modal" data-target="#formModalquote"
                                            style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30" />
                                                </svg>
                                            </span>
                                            <span class="text-13-black pl-3 pt-1"
                                                style="font-weight: 600 !important;">Thêm hiệu lực báo giá</span>
                                        </a>
                                    </ul>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " name="terms_pay"
                                        id="terms_pay" placeholder="Chọn thông tin" style="flex:2;" readonly />
                                    <ul id="listTermsPay"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập điều khoản"
                                                    class="pr-4 w-100 input-search bg-input-guest"
                                                    id="searchTermsPay">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search text-table" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                            data-toggle="modal" data-target="#formModalTermPay"
                                            style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30" />
                                                </svg>
                                            </span>
                                            <span class="text-13-black pl-3 pt-1"
                                                style="font-weight: 600 !important;">Thêm điều khoản</span>
                                        </a>
                                    </ul>
                                </li>
                            </ul>
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
    <x-form-modal-import title="Chỉnh sửa nhà cung cấp" name="provide" idModal="editProvide"></x-form-modal-import>
    <x-form-modal-import title="Điều khoản thanh toán" name="termpay"
        idModal="formModalTermPay"></x-form-modal-import>
    {{-- <x-date-form-modal title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-date-form-modal> --}}
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
    $(document).on('click', '#myUL .search-info', function() {
        var provides_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                $('input[name="quotation_number"]').val(data['resultNumber']);
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
                        // console.log(data);
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
                                `<li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" id="` +
                                element.id + `">
                                        <a href="javascript:void(0)"
                                            class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent"
                                            id="` + element.id + `" name="search-represent">
                                            <span class="w-100 text-13-black">` + element.represent_name + `</span>
                                        </a>
                                    </li>`;
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
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name + `</span>
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
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name + `</span>
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
                            .val(data[table].form_desc).attr('data-id', id)
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
                if (data.success) {
                    $('#' + data.list + ' li#' + data.id).remove();
                    showNotification('success', data.msg)
                } else {
                    showNotification('warning', data.msg)
                }
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

    // Chỉnh sửa nhà cung cấp
    $(document).on('click', '.search-infoEdit', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                },
                success: function(data) {
                    $('#editProvide input[name="provide_name_display"]').val(data
                        .provide_name_display)
                    $('#editProvide input[name="provide_code"]').val(data.provide_code)
                    $('#editProvide input[name="provide_address"]').val(data.provide_address)
                    $('#editProvide input[name="key"]').val(data.key)
                    $('#editProvide input[name="provide_name"]').val(data.provide_name)
                    $('#editProvide #editProvide').attr('data-id', data.id)
                }
            })
        }
    })

    $('.modal-dialog #editProvide').on('click', function(e) {
        e.preventDefault();
        var id = $('.modal-dialog #editProvide').data('id');
        var check = false;
        var provide_name_display = $("#editProvide input[name='provide_name_display']").val().trim();
        var provide_code = $("#editProvide input[name='provide_code']").val().trim();
        var provide_address = $("#editProvide input[name='provide_address']").val().trim();
        var key = $("#editProvide input[name='key']").val().trim();
        var provide_name = $("#editProvide input[name='provide_name']").val().trim();
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
                url: "{{ route('updateProvide') }}",
                type: "get",
                data: {
                    id: id,
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    provide_name: provide_name,
                },
                success: function(data) {
                    if (data.success) {
                        $('.btn.btn-secondary').click()
                        if (data.provide_id == $('#provides_id').val()) {
                            $('#myInput').val(provide_name_display)
                        }
                        $('#myUL ul li').find('a#' + data.provide_id + " span").text(
                            provide_name_display)
                        $("#editProvide input[name='provide_name_display']").val('')
                        $("#editProvide input[name='provide_code']").val('')
                        $("#editProvide input[name='provide_address']").val('')
                        $("#editProvide input[name='key']").val('')
                        $("#editProvide input[name='provide_name']").val('')
                        showNotification('success', 'Chỉnh sửa thông tin thành công !')
                    } else {
                        showNotification('warning', 'Nhà cung cấp đã tồn tại !')
                    }
                    // console.log(data);
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
                    $('#listPriceEffect li').empty();
                    $('#listTermsPay li').empty();
                    if (data.success == true) {
                        quotation = getQuotation(data.key, '1')
                        // Thêm nhà cung cấp vào danh sách
                        if (data.id) {
                            var newLi = `
                            <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" style="flex:2" id="` + data.id + `" name="search-info" class="search-info">
                                                <span class="text-13-black">` + data.name +
                                `</span>
                                            </a>
                                            <a id="" class="search-infoEdit" type="button" data-toggle="modal" data-target="#editProvide" data-id="` +
                                data.id + `">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"></path>
                                                        <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"></path>
                                                        <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>
                            `;
                            $('#myUL .p-1').after(newLi)
                        }
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
                        // Thêm hiệu lực báo giá vào danh sách
                        if (data.price_effect) {
                            data.price_effect.forEach(function(element) {
                                var li = `
                            <li class="border" id="` +
                                    element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                    element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                    element.id + `" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` +
                                    element.id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` +
                                    element.form_name + `" id="default-id` +
                                    element.id + `" href="#" data-name="import" data-id="` +
                                    element.id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listPriceEffect .p-1').after(li);
                            })

                        }

                        // Thêm điều khoản thanh toán
                        if (data.terms_pay) {
                            data.terms_pay.forEach(function(element) {
                                var li = `
                                <li class="border" id="` + element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                    element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="2" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + element.id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc +
                                    `" id="default-id` + element.id +
                                    `" href="#" data-name="termpay" data-id="` + element
                                    .id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listTermsPay .p-1').after(li);
                            })

                        }

                        // Thêm người đại diện
                        if (data.id_represent) {
                            $('#represent').val(data.represent_name)
                            $('#represent_id').val(data.id_represent)
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
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showNotification('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showNotification('warning', data.msg)
                        }
                    }
                }
            });
        }
    });


    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showNotification(type, message);
        }, delayTime);
    }

    $(document).on('click', '.closeModal', function(e) {
        e.preventDefault();
        $("input[name='provide_represent_new']").val('')
        $("input[name='provide_email_new']").val('')
        $("input[name='provide_phone_new']").val('')
        $("input[name='provide_address_delivery_new']").val('')
        $("input[name='form-name-import']").val('')
        $("input[name='form-desc-import']").val('')
    })


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
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
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
                                if (data.success) {
                                    $('#form-name-' + id).val('')
                                    $('#form-desc-' + id).val('')
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
                                    $(id == "import" ? '#price_effect' : '#terms_pay').val(data
                                        .data);
                                        $(id == "import" ? '#price_effect' : '#terms_pay').attr('data-id',data.id);
                                    if (id == "import") {
                                        var price_effect = `
                                        <li class="border" id="` + data.id +
                                            `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                            data.id + `" name="search-price-effect">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                            .inputName +
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
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                            .inputName +
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
                                    showNotification('success', data.msg)
                                } else {
                                    showNotification('warning', data.msg)
                                }
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
                            if (data.success) {
                                $('#' + id).closest('div').find('.closeModal')[0].click()
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
                            if (data.success) {
                                var get_dataID = $('#price_effect').data('id')
                                if (get_dataID != null) {
                                    if (get_dataID == data.id) {
                                        $('#' + (id == "import" ? "price_effect" : "terms_pay"))
                                            .val(data.form_desc)
                                    }
                                }
                                $('#' + (id == "import" ? "listPriceEffect" : "listTermsPay")).find(
                                    'li#' + data.id + " span").text(data.form_name)
                                $('#' + id).closest('div').find('.closeModal')[0].click()
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
                            '" href="javascript:void(0)" class="text-dark d-flex w-100 justify-content-between p-2 search-name" id="' +
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
                        var product_name = $(this).find("span").text()
                        $.ajax({
                            url: "{{ route('getInventory') }}",
                            type: "get",
                            data: {
                                product_name: product_name,
                            },
                            success: function(data) {
                                $('#soTonKho').text(formatCurrency(data[
                                    'products'].product_inventory))
                                console.log(data);
                            }
                        })
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
