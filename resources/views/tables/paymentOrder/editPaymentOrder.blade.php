<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('paymentOrder.update', ['workspace' => $workspacename, 'paymentOrder' => $payment->id]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="content-wrapper1 py-0 border-bottom px-4">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id" value="{{ $payment->detailimport_id }}">
        <input type="hidden" name="detail_id" value="{{ $payment->id }}">
        <input type="hidden" name="table_name" value="TTMH">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container-fluided">
                <div class="mb-3">
                    <span class="font-weight-bold">Mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Thanh toán mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Chỉnh sửa thanh toán mua hang</span>
                </div>
            </div>
            <div class="container-fluided">
                <div class="row m-0 mb-3">
                    <a href="{{ route('paymentOrder.index', $workspacename) }}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                fill="none" class="mr-2">
                                <path
                                    d="M2.6738 7.48012C2.939 7.79833 3.41191 7.84132 3.73012 7.57615C4.04833 7.31097 4.09132 6.83805 3.82615 6.51984L2.3513 4.75L9.25 4.75C9.66421 4.75 10 4.41421 10 4C10 3.58579 9.66421 3.25 9.25 3.25L2.3512 3.25L3.82615 1.4801C4.09132 1.1619 4.04833 0.688999 3.73012 0.423799C3.41191 0.158599 2.939 0.201599 2.6738 0.519799L0.1738 3.51984C-0.0579996 3.79798 -0.0579996 4.20198 0.1738 4.48012L2.6738 7.48012Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>Trở về</span>
                        </button>
                    </a>

                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white"></path>
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mr-2">
                            <path
                                d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                fill="white"></path>
                        </svg>
                        <span>Đính kèm file</span><input type="file" style="display: none;" id="file_restore"
                            accept="*" name="file">
                    </label>

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
                            <span>Xác nhận</span>
                        </button>
                    @endif

                    <a href="#" id="delete_payment" class="d-flex align-items-center h-100 btn-danger rounded"
                        style="padding: 6px 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="none" class="mr-2">
                            <path
                                d="M0.96967 0.969668C1.26256 0.676777 1.73744 0.676777 2.03033 0.969668L6 4.939L9.9697 0.969668C10.2626 0.676777 10.7374 0.676777 11.0303 0.969668C11.3232 1.26256 11.3232 1.73744 11.0303 2.03033L7.061 6L11.0303 9.9697C11.2966 10.2359 11.3208 10.6526 11.1029 10.9462L11.0303 11.0303C10.7374 11.3232 10.2626 11.3232 9.9697 11.0303L6 7.061L2.03033 11.0303C1.73744 11.3232 1.26256 11.3232 0.96967 11.0303C0.67678 10.7374 0.67678 10.2626 0.96967 9.9697L4.939 6L0.96967 2.03033C0.7034 1.76406 0.6792 1.3474 0.89705 1.05379L0.96967 0.969668Z"
                                fill="white"></path>
                        </svg>
                        <span>Xóa</span>
                    </a>

                </div>
            </div>
        </div>
    </div>


    <section class="content-wrapper1 p-2 position-relative" style="margin-top:2px; margin-bottom: 2px;">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
                <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông
                        tin</a>
                </li>
                <li class="text-nav"><a data-toggle="tab" href="#histpry" class="text-secondary">Lịch
                        sử</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
                </li>
            </ul>
            <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
            </div>
        </div>
    </section>

    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                    </div>
                    <div class="col-12">
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right p-1" style="width:15%;"><input type="checkbox">
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
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" name="product_note[]"
                                                        class="border-0 px-3 py-2 w-100"
                                                        value="{{ $item->product_note }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php $import = '123'; ?>
                        <x-formsynthetic :import="$import"></x-formsynthetic>
                    </div>
                </div>
                <div id="histpry" class="tab-pane fade">
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">LỊCH SỬ</span>
                    </div>
                    <div class="container-fluided">
                        <table class="table table-hover bg-white rounded" id="inputcontent1">
                            <thead>
                                <tr>
                                    <th class="text-table text-secondary">Mã thanh toán</th>
                                    <th class="text-table text-secondary">Ngày thanh toán</th>
                                    <th class="text-table text-secondary">Tổng tiền</th>
                                    <th class="text-table text-secondary">Thanh toán</th>
                                    <th class="text-table text-secondary">Dư nợ</th>
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
                </div>

                <div id="files" class="tab-pane fade">
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">FILE ĐÍNH KÈM</span>
                    </div>
                    <x-form-attachment :value="$payment" name="TTMH"></x-form-attachment>
                </div>

                <div class="content-wrapper2 px-0 py-0">
                    <div id="mySidenav" class="sidenavshow" style="top: 137px;">
                        <div id="show_info_Guest">
                            <div class="bg-filter-search border-top-0 py-2 text-center">
                                <span class="font-weight-bold text-secondary">THÔNG TIN NHÀ
                                    CUNG CẤP</span>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Đơn mua hàng</span>
                                <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                                    name="quotation_number"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest search_quotation"
                                    autocomplete="off" required readonly
                                    value="{{ $payment->getQuotation->quotation_number }}">
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

                            {{-- Nhà cung cấp --}}
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Nhà cung cấp</span>
                                <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" readonly
                                    value="{{ $payment->getProvideName->provide_name_display }}">
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

                            {{-- Người đại diện --}}
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Người đại diện</span>
                                <input readonly type="text" placeholder="Chọn thông tin"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                    id="represent">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Hạn thanh toán</span>
                                <input type="date" placeholder="Nhập thông tin" name="payment_date"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ $payment->formatDate($payment->payment_date)->format('Y-m-d') }}">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Tổng tiền</span>
                                <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" readonly
                                    value="{{ number_format($payment->total) }}">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Đã thanh toán</span>
                                <input readonly type="text" placeholder="Nhập thông tin" name="payment"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ number_format($payment->payment) }}">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Dư nợ</span>
                                <input type="text" placeholder="Nhập thông tin" name="debt" readonly
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ number_format($payment->debt) }}">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Thanh toán trước</span>
                                <input oninput="checkQty(this,{{ $payment->debt }})" type="text"
                                    placeholder="Nhập thông tin" name="payment"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest payment_input">
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
</form>
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
