<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<?php $import = '123'; ?>
<form action="{{ route('receive.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-2">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" value="" name="action" id="getAction">
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
                    <span class="font-weight-bold">Đơn nhận hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Tạo đơn nhận hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <a href="{{ route('receive.index', $workspacename) }}">
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
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-button">Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <a href="#" onclick="getAction(this)">
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px" value="action_1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14"
                                fill="none" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                    fill="white" />
                            </svg>
                            <span class="text-button">Lưu nháp</span>
                        </button>
                    </a>

                    <a href="#" onclick="getAction(this)">
                        <button value="action_2" type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 14 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                    fill="white"></path>
                            </svg>
                            <span class="text-button">Nhận hàng</span>
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

        {{-- <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span>Đơn nhận hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Tạo mới đơn nhận hàng</span>
                </div>
                <div class="row m-0 mb-1">
                    <a href="#" onclick="getAction(this)">
                        <button value="action_1" type="submit" class="custom-btn d-flex align-items-center h-100"
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
                            <span>Lưu nháp</span>
                        </button>
                    </a>

                    <a href="#" onclick="getAction(this)">
                        <button value="action_2" type="submit" class="custom-btn d-flex align-items-center h-100"
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
                            <span>Nhận hàng</span>
                        </button>
                    </a>

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
        </section> --}}
    </div>
    {{-- <hr class="mt-3"> --}}

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
                                        <span class="text-table text-secondary">Quản lý S/N</span>
                                    </th>
                                    <th class="border-right p-1" style="width:15%;">
                                        <span class="text-table text-secondary">Ghi chú</span>
                                    </th>
                                    <th class="border-top border-right p-1" style="width:1%;"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </section>
                <x-formsynthetic :import="$import"></x-formsynthetic>
            </div>
        </section>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenavadd border">
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
                                    <span class="text-table ml-2">Mã nhận hàng</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Đơn vị vận chuyển</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Phí giao hàng</span>
                                </div>
                                <div class="border border-right-0 py-1 border-left-0">
                                    <span class="text-table ml-2">Ngày nhận hàng</span>
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
                                    @foreach ($listDetail as $value)
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
                                    <input type="text" placeholder="Chọn thông tin" name="delivery_code"
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
                                    <input type="text" placeholder="Nhập thông tin" name="shipping_unit"
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
                                    <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
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
                                    <input type="date" placeholder="Nhập thông tin" name="received_date"
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

    <?php $product = []; ?>
    <x-formmodalseri :product="$product" :status="2" id="product"></x-formmodalseri>

</form>
</div>

<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
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
                    console.log(data);
                    $('#myInput').val(data.quotation_number == null ? data.id :
                        data
                        .quotation_number);
                    $('#provide_name').val(data.provide_name);
                    $('#represent').val(data.represent)
                    $('#detailimport_id').val(data.id)
                    $('#listReceive').hide();
                    $('#list_modal').empty();
                    $.ajax({
                        url: "{{ route('getProduct_receive') }}",
                        type: "get",
                        data: {
                            id: data.id
                        },
                        success: function(product) {
                            $('#product').html(product)
                            $('#inputcontent tbody').empty();
                            product.quoteImport.forEach((element, index) => {
                                if (element.product_qty - element
                                    .receive_qty > 0) {
                                    var tr =
                                        `
                                <tr class="bg-white">
                                    <td class="border border-left-0 border-top-0 border-bottom-0 py-1">
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
                                    <td class="border border-top-0 border-bottom-0 position-relative py-1">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                        <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-2 py-1 w-100" value='` +
                                        element.product_name +
                                        `'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M8.0002 1.69571C6.32827 1.69571 4.72483 2.35988 3.5426 3.54211C2.36037 4.72434 1.6962 6.32779 1.6962 7.99971C1.6962 9.67164 2.36037 11.2751 3.5426 12.4573C4.72483 13.6395 6.32827 14.3037 8.0002 14.3037C9.67212 14.3037 11.2756 13.6395 12.4578 12.4573C13.64 11.2751 14.3042 9.67164 14.3042 7.99971C14.3042 6.32779 13.64 4.72434 12.4578 3.54211C11.2756 2.35988 9.67212 1.69571 8.0002 1.69571ZM0.304199 7.99971C0.304199 5.9586 1.11503 4.0011 2.55831 2.55782C4.00159 1.11454 5.95909 0.303711 8.0002 0.303711C10.0413 0.303711 11.9988 1.11454 13.4421 2.55782C14.8854 4.0011 15.6962 5.9586 15.6962 7.99971C15.6962 10.0408 14.8854 11.9983 13.4421 13.4416C11.9988 14.8849 10.0413 15.6957 8.0002 15.6957C5.95909 15.6957 4.00159 14.8849 2.55831 13.4416C1.11503 11.9983 0.304199 10.0408 0.304199 7.99971Z"
                                                    fill="#282A30" />
                                            <path
                                                d="M8.08026 4.96571C7.92018 4.95474 7.75956 4.97681 7.60838 5.03055C7.4572 5.08429 7.31869 5.16855 7.20146 5.2781C7.08422 5.38764 6.99077 5.52012 6.92691 5.66732C6.86306 5.81451 6.83015 5.97327 6.83026 6.13371C6.83026 6.31844 6.75688 6.49559 6.62626 6.62621C6.49564 6.75683 6.31848 6.83021 6.13376 6.83021C5.94903 6.83021 5.77188 6.75683 5.64126 6.62621C5.51064 6.49559 5.43726 6.31844 5.43726 6.13371C5.43716 5.6638 5.56625 5.20289 5.81043 4.8014C6.05461 4.3999 6.40447 4.07326 6.82176 3.85719C7.23906 3.64111 7.70773 3.54393 8.17653 3.57625C8.64534 3.60856 9.09623 3.76915 9.47993 4.04044C9.86363 4.31174 10.1654 4.6833 10.3521 5.1145C10.5389 5.54571 10.6035 6.01997 10.5389 6.48542C10.4744 6.95088 10.283 7.38963 9.98593 7.75369C9.68881 8.11776 9.29732 8.39314 8.85426 8.54971C8.80815 8.56625 8.76829 8.59666 8.74018 8.63678C8.71206 8.67689 8.69707 8.72473 8.69726 8.77371V9.39971C8.69726 9.58444 8.62387 9.76159 8.49326 9.89221C8.36264 10.0228 8.18548 10.0962 8.00076 10.0962C7.81603 10.0962 7.63888 10.0228 7.50826 9.89221C7.37764 9.76159 7.30426 9.58444 7.30426 9.39971V8.77371C7.30416 8.43668 7.40854 8.10791 7.60303 7.83265C7.79752 7.5574 8.07255 7.3492 8.39026 7.23671C8.64378 7.14687 8.85861 6.97241 8.99857 6.74271C9.13853 6.51302 9.19507 6.24211 9.15867 5.97561C9.12228 5.70911 8.99517 5.46328 8.79875 5.27952C8.60233 5.09576 8.34859 4.98429 8.08026 4.96571Z"
                                                    fill="#282A30" />
                                            <path
                                                d="M8.05029 11.5707C8.00282 11.5707 7.95729 11.5896 7.92372 11.6231C7.89015 11.6567 7.87129 11.7022 7.87129 11.7497C7.87129 11.7972 7.89015 11.8427 7.92372 11.8763C7.95729 11.9099 8.00282 11.9287 8.05029 11.9287C8.09777 11.9287 8.1433 11.9099 8.17686 11.8763C8.21043 11.8427 8.22929 11.7972 8.22929 11.7497C8.22929 11.7022 8.21043 11.6567 8.17686 11.6231C8.1433 11.5896 8.09777 11.5707 8.05029 11.5707ZM8.05029 12.4997C8.14878 12.4997 8.24631 12.4803 8.33731 12.4426C8.4283 12.4049 8.51098 12.3497 8.58062 12.28C8.65027 12.2104 8.70551 12.1277 8.7432 12.0367C8.78089 11.9457 8.80029 11.8482 8.80029 11.7497C8.80029 11.6512 8.78089 11.5537 8.7432 11.4627C8.70551 11.3717 8.65027 11.289 8.58062 11.2194C8.51098 11.1497 8.4283 11.0945 8.33731 11.0568C8.24631 11.0191 8.14878 10.9997 8.05029 10.9997C7.85138 10.9997 7.66061 11.0787 7.51996 11.2194C7.37931 11.36 7.30029 11.5508 7.30029 11.7497C7.30029 11.9486 7.37931 12.1394 7.51996 12.28C7.66061 12.4207 7.85138 12.4997 8.05029 12.4997Z"
                                                    fill="#282A30" />
                                        </svg>
                                        </div>
                                    </td>   
                                    <td class="border border-top-0 border-bottom-0 border-right-0 py-1"> 
                                        <input readonly type="text" name="product_unit[]" class="border-0 px-2 py-1 w-100 product_unit" value="` +
                                        element.product_unit + `">
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 border-right-0 py-1">
                                    <div>
                                        <input oninput="checkQty(this,` + (element.product_qty - element.receive_qty) +
                                        `)" type="text" name="product_qty[]" class="border-0 px-2 py-1 w-100 quantity-input" value="` +
                                        formatCurrency(element
                                            .product_qty - element
                                            .receive_qty) +
                                        `">
                                        <a class="duongdan" data-toggle="modal" data-target="#exampleModal` + element.id + `">Serial Number </a>
                                       
                                    </div>
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 text-center py-1">
                                        <input onclick="getDataCheckbox(this)" type="checkbox" ` + (product.checked[
                                                index] == 'endable' ||
                                            product.cb[index] == 1 ?
                                            'checked' : '') + ` ` + (
                                            product.checked[index]) + ` >
                                    <input type="hidden" name="cbSeri[]" value="` + (product.checked[index] ==
                                            'endable' || product.cb[
                                                index] == 1 ? 1 : 0) +
                                        `">
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 py-1">
                                        <input readonly type="text" name="product_note[]" class="border-0 px-2 py-1 w-100" value="` +
                                        (element.product_note == null ?
                                            "" : element.product_note) + `">
                                    </td>
                                    <input type="hidden" class="border-0 px-2 py-1 w-100 price_export"
                                        name="price_export[]" value="` + formatCurrency(element.price_export) + `" readonly>
                                    <input type="hidden" class="border-0 px-2 py-1 w-100 product_tax"
                                        name="product_tax[]" value="` + element.product_tax + `" readonly>
                                    <input type="hidden" class="product_tax1">  
                                    <input type="hidden" class="border-0 px-2 py-1 w-100 total_price"
                                        name="total_price[]" value="` + formatCurrency(element.product_total) + `" readonly>             
                                    <td class="border border-top-0 border deleteRow py-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z" fill="#6B6F76"></path></svg>
                                    </td>
                                </tr>`;
                                    $('#inputcontent tbody').append(tr);
                                }
                                deleteRow()
                                updateTaxAmount()
                                calculateTotalAmount()
                                calculateTotalTax()
                                calculateGrandTotal()
                                createModal(element.id)
                            });
                            $('#more_info').show();
                            $('#more_info1').show();
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


    function deleteRow() {
        $('.deleteRow').off('click').on('click', function() {
            id = $(this).closest('tr').find('button').attr('data-target');
            $('#list_modal ' + id).remove();
            $(this).closest('tr').remove();
        })
    }

    function getDataCheckbox(element) {
        var isChecked = $(element).is(':checked');
        if (isChecked) {
            $(element).closest('tr').find('input[name^="cbSeri"]').val(1)
            // $(element).closest('tr').find('a').show()
            $(element).closest('tr').find('a').css('opacity',1)
        } else {
            $(element).closest('tr').find('input[name^="cbSeri"]').val(0)
            // $(element).closest('tr').find('a').hide();
            $(element).closest('tr').find('a').css('opacity',0)
        }
    }

    // Tạo INPUT SERI
    createRowInput('seri');


    // Kiểm tra Serial Number
    $('form').on('submit', function(e) {
        e.preventDefault();
        var productSN = {}
        var formSubmit = false;
        var listProductName = [];
        var listQty = [];
        var listSN = [];
        var checkSN = [];
        // if ($('#getAction').val() == 2) {
        $('.searchProductName').each(function() {
            checkSN.push($(this).closest('tr').find('input[name^="cbSeri"]').val())
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
                listSN: listSN,
                checkSN: checkSN,
            },
            success: function(data) {
                console.log(data);
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
        // }
        // else {
        //     $('form')[0].submit();
        // }
    })
</script>
