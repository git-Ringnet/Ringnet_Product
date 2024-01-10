<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<?php $import = '123'; ?>
<form action="{{ route('receive.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id"
            value="@isset($yes){{ $show_receive['id'] }}@endisset">
        <input type="hidden" value="" name="action" id="getAction">


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
            <div class="container-fluided">
                <div class="row m-0 mb-1">
                    <a href="{{ route('receive.index', $workspacename) }}">
                        <span class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075" />
                            </svg>
                            <span>Hủy</span>
                        </span>
                    </a>

                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <a href="#" onclick="getAction(this)">
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px" value="action_1">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
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

                    <span id="sideProvide">
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
                <div class="col-12">
                    <section class="content">
                        <div class="container-fluided order_content">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right p-1"><input type="checkbox">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary"> Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Quản lý S/N</span>
                                        </th>
                                        <th class="border-right p-1">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                        <th class="border-top p-1"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </section>
                    <x-formsynthetic :import="$import"></x-formsynthetic>
                </div>
            </div>
        </section>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 py-2 text-center">
                        <span class="font-weight-bold text-secondary">THÔNG TIN NHÀ CUNG CẤP</span>
                    </div>
                    {{-- Đơn nhận hàng --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Đơn mua hàng</span>
                        <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                            name="quotation_number"
                            class="border w-100 py-2 border-left-0 border-right-0 px-3 search_quotation"
                            autocomplete="off" required>
                        <input type="hidden" name="detail_id" id="detail_id"
                            value="@isset($yes) {{ $show_receive['id'] }} @endisset">
                        <ul id="listReceive" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data list-guest"
                            style="z-index: 99; display: block;">
                            <div class="p-1">
                                <div class="position-relative">
                                    <input type="text" placeholder="Nhập công ty" class="pr-4 w-100 input-search" id="companyFilter">
                                    <span id="search-icon" class="search-icon"><i class="fas fa-search text-table" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            @foreach ($listDetail as $value)
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-dark d-flex justify-content-between p-2 search-receive"
                                        id="{{ $value->id }}" name="search-info">
                                        <span
                                            class="w-50">{{ $value->quotation_number == null ? $value->id : $value->quotation_number }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="">
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
                        </div>
                    </div>
                    <div id="more_info" style="display:none;">
                    {{-- Nhà cung cấp --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Nhà cung cấp</span>
                        <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                            value="@isset($yes){{ $show_receive['provide_name'] }}@endisset">
                        <div class="">
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
                        </div>
                    </div>
                    {{-- Người đại diện --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Người đại diện</span>
                        <input name="represent" type="text" placeholder="Chọn thông tin"
                            class="border-0 bg w-50 bg-input-guest py-1" autocomplete="off" id="represent">
                        <div class="">
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
                        </div>
                    </div>
                    {{-- Mã thanh toán --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Mã thanh toán</span>
                        <input type="text" placeholder="Chọn thông tin" name="reference_number"
                            class="border-0 bg w-50 bg-input-guest py-1" autocomplete="off">
                        <div class="">
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
                        </div>
                    </div>
                    {{-- Đơn vị vận chuyển --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Đơn vị vận chuyển</span>
                        <input type="text" placeholder="Nhập thông tin" name="shipping_unit"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        <div class="">
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
                        </div>
                    </div>
                    {{-- Phí giao hàng --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Phí giao hàng</span>
                        <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        <div class="">
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
                        </div>
                    </div>
                    {{-- Ngày giao hàng --}}
                    <div class="d-flex align-items-center justify-content-between border py-2 px-1">
                        <span class="text-table mr-3">Ngày nhận hàng</span>
                        <input type="date" placeholder="Nhập thông tin" name="received_date"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                            value="{{ date('Y-m-d') }}">
                        <div class="">
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
                    $('#search_quotation').val(data.quotation_number == null ? data.id :
                        data
                        .quotation_number);
                    $('#provide_name').val(data.provide_name);
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
                            console.log(product);
                            $('#product').html(product)
                            $('#inputcontent tbody').empty();
                            product.quoteImport.forEach((element, index) => {
                                if (element.product_qty - element
                                    .receive_qty > 0) {
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
                                        (element.product_code == null ?
                                            "" : element
                                            .product_code) +
                                        `">
                                        <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
                                        </ul>
                                        </div>
                                    </td> 
                                    <td class="border border-top-0 border-bottom-0 position-relative">
                                        <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-3 py-2 w-100" value='` +
                                        element.product_name +
                                        `'>
                                    </td>   
                                    <td> 
                                        <input readonly type="text" name="product_unit[]" class="border-0 px-3 py-2 w-100 product_unit" value="` +
                                        element.product_unit + `">
                                    </td>
                                    <td class="border border-top-0 border-bottom-0 border-right-0">
                                    <div class="d-flex">
                                        <input oninput="checkQty(this,` + (element.product_qty - element.receive_qty) +
                                        `)" type="text" name="product_qty[]" class="border-0 px-3 py-2 w-100 quantity-input" value="` +
                                        formatCurrency(element
                                            .product_qty - element
                                            .receive_qty) +
                                        `">
                                        <button type="button" class="btn btn-primary"
                                                data-toggle="modal" data-target="#exampleModal` + element.id + `"
                                                style="background:transparent; border:none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                    height="32" viewBox="0 0 32 32" fill="none">
                                                        <rect width="32" height="32" rx="4" fill="white"></rect>
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
                                    <td class="border border-top-0 border-bottom-0 text-center">
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
                                    <td class="border border-top-0 border-bottom-0">
                                        <input readonly type="text" name="product_note[]" class="border-0 px-3 py-2 w-100" value="` +
                                        (element.product_note == null ?
                                            "" : element.product_note) + `">
                                    </td>
                                    <input type="hidden" class="border-0 px-3 py-2 w-100 price_export"
                                        name="price_export[]" value="` + formatCurrency(element.price_export) + `" readonly>
                                    <input type="hidden" class="border-0 px-3 py-2 w-100 product_tax"
                                        name="product_tax[]" value="` + element.product_tax + `" readonly>
                                    <input type="hidden" class="product_tax1">  
                                    <input type="hidden" class="border-0 px-3 py-2 w-100 total_price"
                                        name="total_price[]" value="` + formatCurrency(element.product_total) + `" readonly>             
                                    <td class="border border-top-0 border deleteRow">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
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
                                createModal(element.id)
                            });
                            $('#more_info').show();
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
            $(element).closest('tr').find('button').show()
        } else {
            $(element).closest('tr').find('input[name^="cbSeri"]').val(0)
            $(element).closest('tr').find('button').hide();
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
