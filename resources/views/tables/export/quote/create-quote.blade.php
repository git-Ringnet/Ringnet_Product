<x-navbar :title="$title" activeGroup="sell" activeName="quote">
</x-navbar>
<form action="{{ route('detailExport.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-2">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn báo giá</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">Tạo đơn báo giá</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('detailExport.index', $workspacename) }}">
                            <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">Hủy</span>
                            </button>
                        </a>
                    </div>
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle px-2"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-button">Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>
                    <button type="submit" onclick="kiemTraFormGiaoHang(event);"
                        class="custom-btn d-flex align-items-center h-100 py-1 px-2" style="margin-right:10px">
                        <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                fill="white" />
                        </svg>
                        <span>Lưu nháp</span>
                    </button>
                    <div id="sideGuest">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA" />
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </div>
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
                        <table class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 15%;">
                                        <input class="ml-4 border-danger" id="checkall" type="checkbox">
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 15%;">
                                        <span class="text-table text-secondary">Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 8%;">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 8%;">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 15%;">
                                        <span class="text-table text-secondary">Đơn giá</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 8%;">
                                        <span class="text-table text-secondary">Thuế</span>
                                    </th>
                                    <th class="border-right p-1 border-bottom-0 border-top-0" style="width: 15%;">
                                        <span class="text-table text-secondary border-top-0">Thành
                                            tiền</span>
                                    </th>
                                    <th class="border-right note p-1 border-bottom-0 border-top-0">
                                        <span class="text-table text-secondary">
                                            Ghi chú
                                        </span>
                                    </th>
                                    <th class="border-bottom-0 border-top-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="dynamic-fields" class="bg-white"></tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluided">
                        <div class="d-flex ml-3">
                            <button type="button" data-toggle="dropdown" id="add-field-btn"
                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                style="margin-right:10px">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                        fill="#42526E" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                        fill="#42526E" />
                                </svg>
                                <span class="text-table">Thêm sản phẩm</span>
                            </button>
                            <button type="button" data-toggle="dropdown" id="add-field-btn"
                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                style="margin-right:10px">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                        fill="#42526E" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                        fill="#42526E" />
                                </svg>
                                <span class="text-table">Thêm đầu mục</span>
                            </button>
                            <button type="button" data-toggle="dropdown"
                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                style="margin-right:10px">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                        fill="#42526E" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                        fill="#42526E" />
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
                <div class="content">
                    <div class="container-fluided">
                        <div class="row position-relative footer-total m-0">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="mt-4 w-50" style="float: right;">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-table"><b>Giá trị trước thuế:</b></span>
                                        <span id="total-amount-sum" class="text-table">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 align-items-center">
                                        <span class="text-table"><b>Thuế VAT:</b></span>
                                        <span id="product-tax" class="text-table">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-lg"><b>Tổng cộng:</b></span>
                                        <span><b id="grand-total" data-value="0">0đ</b></span>
                                        <input type="text" hidden="" name="totalValue" value="0"
                                            id="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="multiple_action border shadow" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex mx-4 align-items-center">
                            <div class="count_checkbox text-table border-dott m-0 p-0 border-right-0"></div>
                            <svg style="height: 24px;" class="border-dott cancal_action" width="16"
                                height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075" />
                            </svg>
                        </div>
                        <div class="row action">
                            <div class="btn-chotdon my-2 mr-3">
                                <button type="button" id="btn-chot"
                                    class="border bg-transparent rounded d-flex align-items-center h-100">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                            fill="#6D7075" />
                                        <path
                                            d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                            fill="#6D7075" />
                                        <path
                                            d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="px-1 text-table text-secondary">Nhân hệ số</span>
                                </button>
                            </div>
                            <div class="btn-xoahang my-2 mr-3">
                                <button id="deleteExports" type="button"
                                    class="border bg-transparent rounded d-flex align-items-center h-100">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                            fill="#6D7075" />
                                        <path
                                            d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                            fill="#6D7075" />
                                        <path
                                            d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="px-1 text-table text-secondary">Thuế</span>
                                </button>
                            </div>
                            <div class="btn-huy my-2">
                                <button id="cancelBillExport"
                                    class="border bg-transparent rounded d-flex align-items-center h-100">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="px-1 text-table text-secondary">Xóa</span>
                                </button>
                            </div>
                        </div>
                        <div class="btn ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        {{-- Modal khách hàng --}}
        <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 10%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <div class="mt-2">
                                <input type="hidden" id="id_guest" autocomplete="off">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Tên hiển thị
                                </p>
                                <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name_display" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Mã số thuế
                                </p>
                                <input name="guest_code" type="number" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_code" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 required-label text-danger text-nav">
                                    Địa chỉ
                                </p>
                                <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_address" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên viết tắt
                                </p>
                                <input name="key" type="text" placeholder="Nhập thông tin" id="key"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên đầy đủ
                                </p>
                                <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="guest_name" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input type="hidden" id="represent_guest_id">
                                <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                    id="represent_guest_name"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addGuest">Thêm khách hàng</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="updateGuest">Sửa khách hàng</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal người đại diện --}}
        <div class="modal fade" id="representModal" tabindex="-1" role="dialog"
            aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 10%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <input type="hidden"
                                class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                id="represent_id" autocomplete="off">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Người đại diện
                                </p>
                                <input name="represent_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_name" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Số điện thoại
                                </p>
                                <input name="represent_phone" type="number" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_phone" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Email
                                </p>
                                <input name="represent_email" type="email" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="represent_email" autocomplete="off">
                            </div>
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Địa chỉ nhận
                                </p>
                                <input name="represent_address" type="text" placeholder="Nhập thông tin"
                                    id="represent_address"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addRepresent">Thêm người đại diện</button>
                        <button type="button" class="custom-btn h-100 py-1 px-2 text-table" id="updateRepresent">Cập
                            nhật người đại diện</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal dự án --}}
        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 10%;">
                <div class="modal-content">
                    <div class="modal-body pb-0 px-2 pt-0">
                        <div class="content-info">
                            <input type="hidden"
                                class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                id="represent_id" autocomplete="off">
                            <div class="mt-2">
                                <p class="p-0 m-0 px-2 text-nav">
                                    Tên dự án
                                </p>
                                <input name="project_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                    id="project_name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 py-1 px-1">
                        <button type="button" class="btn-save-print rounded h-100 text-table py-1"
                            data-dismiss="modal">Trở về</button>
                        <button type="button" class="custom-btn align-items-center h-100 py-1 px-2 text-table"
                            id="addProject">Thêm dự án
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Thông tin khách hàng --}}
    <div class="content-wrapper2 px-0 py-0">
        <div id="mySidenav" class="sidenav border">
            <div id="show_info_Guest">
                <div class="bg-filter-search border-0 py-2 text-center">
                    <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                </div>
                <div class="d-flex">
                    <div style="width: 55%;">
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Khách hàng</span>
                        </div>
                        <div id="show-title-guest" style="display: none;">
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Người đại diện</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Số báo giá</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Số tham chiếu</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Ngày báo giá</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Hiệu lực báo giá</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Điều khoản</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Dự án</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Hàng hóa</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Giao hàng</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Địa điểm</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                id="myInput">
                            <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                            <ul id="myUL"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập công ty"
                                            class="pr-4 w-100 input-search" id="companyFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($guest as $guest_value)
                                    <li class="border" data-id="{{ $guest_value->id }}">
                                        <a href="#" title="{{ $guest_value->guest_name_display }}"
                                            class="text-dark d-flex justify-content-between p-2 search-info w-100"
                                            id="{{ $guest_value->id }}" name="search-info">
                                            <span
                                                class="w-100 text-nav text-dark overflow-hidden">{{ $guest_value->guest_name_display }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 1000;">
                                                <a class="dropdown-item edit-guest w-50" href="#"
                                                    data-toggle="modal" data-target="#guestModal"
                                                    data-id="{{ $guest_value->id }}">
                                                    <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                </a>
                                                <a class="dropdown-item delete-guest w-50" href="#"
                                                    data-id="{{ $guest_value->id }}" data-name="guest">
                                                    <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <a type="button"
                                    class="d-flex justify-content-center align-items-center p-2 position-sticky addGuestNew bg-white"
                                    data-toggle="modal" data-target="#guestModal" style="bottom: 0;">
                                    <span class="text-table text-center font-weight-bold">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30" />
                                        </svg>
                                        Thêm khách hàng
                                    </span>
                                </a>
                            </ul>
                            <div class="opacity-0">
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
                        <div id="show-info-guest" style="display: none;">
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0" autocomplete="off"
                                    id="represent_guest">
                                <input type="hidden" class="represent_guest_id" autocomplete="off"
                                    name="represent_guest_id">
                                <ul id="myUL7"
                                    class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 72px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập người đại diện"
                                                class="pr-4 w-100 input-search" id="companyFilter7">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div id="representativeList"></div>
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresentNew bg-white"
                                        data-toggle="modal" data-target="#representModal" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm người đại diện
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off">
                                <div class="opacity-0">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="reference_number"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off">
                                <div class="opacity-0">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" id="datePicker" placeholder="Chọn thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0" style="height: 20px;">
                                <input type="hidden" id="hiddenDateInput" name="date_quote" value="">
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="price_effect"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off"
                                    id="myInput-quote"
                                    value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_desc : '' }}">
                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[quote]"
                                    value="{{ isset($dataForm['quote']) ? $dataForm['quote']->id : '' }}">
                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                    name="fieldDate[quote]"
                                    value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_field : '' }}">
                                <ul id="myUL2"
                                    class="bg-white position-absolute rounded w-100 shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 33px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập hiệu lực"
                                                class="pr-4 w-100 input-search" id="companyFilter2">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($date_form as $item)
                                        @if ($item->form_field == 'quote')
                                            <li class="item-{{ $item->id }} border">
                                                <a href="#" title="{{ $item->form_name }}"
                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                    id="{{ $item->id }}" name="search-date-form"
                                                    data-name="quote">
                                                    <span class="w-100 text-nav text-dark overflow-hidden"
                                                        id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                </a>
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                        style="margin-right:10px">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu date-form-setting"
                                                        style="z-index: 1000;">
                                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                                            data-target="#formModalquote" data-name="quote"
                                                            data-id="{{ $item->id }}"
                                                            id="{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="dropdown-item delete-item" href="#"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->form_field }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                            id="default-id{{ $item->id }}" href="#"
                                                            data-name="{{ $item->form_field }}"
                                                            data-id="{{ $item->id }}">
                                                            @if ($item->default_form === 1)
                                                                <i class="fa-solid fa-link-slash"></i>
                                                            @else
                                                                <i class="fa-solid fa-link"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky bg-white addDateFormquote"
                                        data-toggle="modal" data-target="#formModalquote" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm mới
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="terms_pay"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off"
                                    id="myInput-payment"
                                    value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_desc : '' }}">
                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[payment]"
                                    value="{{ isset($dataForm['payment']) ? $dataForm['payment']->id : '' }}">
                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                    name="fieldDate[payment]"
                                    value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_field : '' }}">
                                <ul id="myUL1"
                                    class="w-100 bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 33px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập điều khoản"
                                                class="pr-4 w-100 input-search" id="companyFilter1">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($date_form as $item)
                                        @if ($item->form_field == 'payment')
                                            <li class="item-{{ $item->id }} border">
                                                <a href="#" title="{{ $item->form_name }}"
                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                    id="{{ $item->id }}" name="search-date-form"
                                                    data-name="payment">
                                                    <span class="w-100 text-nav text-dark overflow-hidden"
                                                        id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                </a>
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                        style="margin-right:10px">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu date-form-setting"
                                                        style="z-index: 1000;">
                                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                                            data-target="#formModalpayment" data-name="payment"
                                                            data-id="{{ $item->id }}"
                                                            id="{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="dropdown-item delete-item" href="#"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->form_field }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                            id="default-id{{ $item->id }}" href="#"
                                                            data-name="{{ $item->form_field }}"
                                                            data-id="{{ $item->id }}">
                                                            @if ($item->default_form === 1)
                                                                <i class="fa-solid fa-link-slash"></i>
                                                            @else
                                                                <i class="fa-solid fa-link"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky bg-white addDateFormpayment"
                                        data-toggle="modal" data-target="#formModalpayment" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm mới
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" id="ProjectInput"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off">
                                <input type="hidden" class="idProject" autocomplete="off" name="project_id">
                                <ul id="listProject"
                                    class="w-100 bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập dự án"
                                                class="pr-4 w-100 input-search" id="companyFilter8">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($project as $project_value)
                                        <li class="border">
                                            <a href="#"
                                                class="text-dark d-flex justify-content-between p-2 search-project w-100"
                                                id="{{ $project_value->id }}">
                                                <span
                                                    class="w-100 text-nav text-dark overflow-hidden">{{ $project_value->project_name }}</span>
                                            </a>
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown"
                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                    style="margin-right:10px" aria-expanded="false"><i
                                                        class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 1000;">
                                                    <a class="dropdown-item edit-project-form w-50"
                                                        data-toggle="modal" data-target="#projectModal"
                                                        data-name="" data-id="">
                                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="dropdown-item delete-project w-50" href="#"
                                                        data-id="{{ $project_value->id }}">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky addProjectNew bg-white"
                                        data-toggle="modal" data-target="#projectModal" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm dự án
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="goods"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off"
                                    id="myInput-goods"
                                    value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_desc : '' }}">
                                <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[goods]"
                                    value="{{ isset($dataForm['goods']) ? $dataForm['goods']->id : '' }}">
                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                    name="fieldDate[goods]"
                                    value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_field : '' }}">
                                <ul id="myUL4"
                                    class="w-100 bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 33px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập hàng hóa"
                                                class="pr-4 w-100 input-search" id="companyFilter4">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($date_form as $item)
                                        @if ($item->form_field == 'goods')
                                            <li class="item-{{ $item->id }} border">
                                                <a href="#" title="{{ $item->form_name }}"
                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                    id="{{ $item->id }}" name="search-date-form"
                                                    data-name="goods">
                                                    <span class="w-100 text-nav text-dark overflow-hidden"
                                                        id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                </a>
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                        style="margin-right:10px">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu date-form-setting"
                                                        style="z-index: 1000;">
                                                        <a class="dropdown-item search-date-form"
                                                            data-toggle="modal" data-target="#formModalgoods"
                                                            data-name="goods" data-id="{{ $item->id }}"
                                                            id="{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="dropdown-item delete-item" href="#"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->form_field }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                            id="default-id{{ $item->id }}" href="#"
                                                            data-name="{{ $item->form_field }}"
                                                            data-id="{{ $item->id }}">
                                                            @if ($item->default_form === 1)
                                                                <i class="fa-solid fa-link-slash"></i>
                                                            @else
                                                                <i class="fa-solid fa-link"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky bg-white addDateFormgoods"
                                        data-toggle="modal" data-target="#formModalgoods" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm mới
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="delivery"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off"
                                    id="myInput-delivery"
                                    value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_desc : '' }}">
                                <input type="hidden" class="idDateForm" autocomplete="off"
                                    name="idDate[delivery]"
                                    value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->id : '' }}">
                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                    name="fieldDate[delivery]"
                                    value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_field : '' }}">
                                <ul id="myUL5"
                                    class="w-100 bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 33px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập giao hàng"
                                                class="pr-4 w-100 input-search" id="companyFilter5">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($date_form as $item)
                                        @if ($item->form_field == 'delivery')
                                            <li class="item-{{ $item->id }} border">
                                                <a href="#" title="{{ $item->form_name }}"
                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                    id="{{ $item->id }}" name="search-date-form"
                                                    data-name="delivery">
                                                    <span class="w-100 text-nav text-dark overflow-hidden"
                                                        id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                </a>
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                        style="margin-right:10px">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu date-form-setting"
                                                        style="z-index: 1000;">
                                                        <a class="dropdown-item search-date-form"
                                                            data-toggle="modal" data-target="#formModaldelivery"
                                                            data-name="delivery" data-id="{{ $item->id }}"
                                                            id="{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="dropdown-item delete-item" href="#"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->form_field }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                            id="default-id{{ $item->id }}" href="#"
                                                            data-name="{{ $item->form_field }}"
                                                            data-id="{{ $item->id }}">
                                                            @if ($item->default_form === 1)
                                                                <i class="fa-solid fa-link-slash"></i>
                                                            @else
                                                                <i class="fa-solid fa-link"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky bg-white addDateFormdelivery"
                                        data-toggle="modal" data-target="#formModaldelivery" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm mới
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
                                class="position-relative d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Chọn thông tin" name="location"
                                    class="border-0 bg w-100 bg-input-guest py-0" autocomplete="off"
                                    id="myInput-location"
                                    value="{{ isset($dataForm['location']) ? $dataForm['location']->form_desc : '' }}">
                                <input type="hidden" class="idDateForm" autocomplete="off"
                                    name="idDate[location]"
                                    value="{{ isset($dataForm['location']) ? $dataForm['location']->id : '' }}">
                                <input type="hidden" class="nameDateForm" autocomplete="off"
                                    name="fieldDate[location]"
                                    value="{{ isset($dataForm['location']) ? $dataForm['location']->form_field : '' }}">
                                <ul id="myUL6"
                                    class="w-100 bg-white position-absolute rounded shadow p-0 scroll-data list-guest z-index-block"
                                    style="z-index: 99;top: 33px;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập địa điểm"
                                                class="pr-4 w-100 input-search" id="companyFilter6">
                                            <span id="search-icon" class="search-icon"><i
                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    @foreach ($date_form as $item)
                                        @if ($item->form_field == 'location')
                                            <li class="item-{{ $item->id }} border">
                                                <a href="#" title="{{ $item->form_name }}"
                                                    class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                    id="{{ $item->id }}" name="search-date-form"
                                                    data-name="location">
                                                    <span class="w-100 text-nav text-dark overflow-hidden"
                                                        id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                </a>
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                        class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                        style="margin-right:10px">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu date-form-setting"
                                                        style="z-index: 1000;">
                                                        <a class="dropdown-item search-date-form"
                                                            data-toggle="modal" data-target="#formModallocation"
                                                            data-name="location" data-id="{{ $item->id }}"
                                                            id="{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="dropdown-item delete-item" href="#"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->form_field }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                            id="default-id{{ $item->id }}" href="#"
                                                            data-name="{{ $item->form_field }}"
                                                            data-id="{{ $item->id }}">
                                                            @if ($item->default_form === 1)
                                                                <i class="fa-solid fa-link-slash"></i>
                                                            @else
                                                                <i class="fa-solid fa-link"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                    <a type="button"
                                        class="d-flex justify-content-center align-items-center p-2 position-sticky bg-white addDateFormlocation"
                                        data-toggle="modal" data-target="#formModallocation" style="bottom: 0;">
                                        <span class="text-table text-center font-weight-bold">
                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                    fill="#282A30" />
                                            </svg>
                                            Thêm mới
                                        </span>
                                    </a>
                                </ul>
                                <div class="opacity-0">
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
<x-date-form-modal title="Điều khoản thanh toán" name="payment" idModal="formModalpayment"></x-date-form-modal>
<x-date-form-modal title="Hiệu lực báo giá" name="quote" idModal="formModalquote"></x-date-form-modal>
<x-date-form-modal title="Hàng hóa" name="goods" idModal="formModalgoods"></x-date-form-modal>
<x-date-form-modal title="Giao hàng" name="delivery" idModal="formModaldelivery"></x-date-form-modal>
<x-date-form-modal title="Địa điểm" name="location" idModal="formModallocation"></x-date-form-modal>
{{-- Thông tin sản phẩm --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script type="text/javascript">
    //
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
    // Số báo giá
    getKeyGuest($('#guest_name_display'));
    //Lấy thông tin project
    $(document).ready(function() {
        $('.search-project').click(function() {
            var idProject = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchProject') }}',
                type: 'GET',
                data: {
                    idProject: idProject
                },
                success: function(data) {
                    $('#ProjectInput').val(data.project_name);
                    $('.idProject').val(data.id);
                }
            });
        });
    });
    //hiện danh sách khách hàng khi click trường tìm kiếm
    $("#myUL1").hide();
    $("#myUL2").hide();
    $("#myUL4").hide();
    $("#myUL5").hide();
    $("#myUL6").hide();
    $("#myUL7").hide();
    $("#listProject").hide();
    $(document).ready(function() {
        function toggleList(input, list) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length) {
                    list.hide();
                }
            });

            input.on("keyup", function() {
                var value = $(this).val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
        }

        function toggleListGuest(input, list, filterInput) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length && !$(event.target).closest(filterInput)
                    .length) {
                    list.hide();
                }
            });

            var applyFilter = function() {
                var value = filterInput.val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            };

            input.on("keyup", applyFilter);
            filterInput.on("keyup", applyFilter);
        }

        toggleListGuest($("#myInput"), $("#myUL"), $("#companyFilter"));
        toggleListGuest($("#represent_guest"), $("#myUL7"), $("#companyFilter7"));
        toggleListGuest($("#myInput-quote"), $("#myUL2"), $("#companyFilter2"));
        toggleListGuest($("#myInput-payment"), $("#myUL1"), $("#companyFilter1"));
        toggleListGuest($("#myInput-goods"), $("#myUL4"), $("#companyFilter4"));
        toggleListGuest($("#myInput-delivery"), $("#myUL5"), $("#companyFilter5"));
        toggleListGuest($("#myInput-location"), $("#myUL6"), $("#companyFilter6"));
        toggleListGuest($("#ProjectInput"), $("#listProject"), $("#companyFilter8"));
    });

    $(document).ready(function() {
        $(document).on('click', '.search-date-form', function(e) {
            $('.modal').on('hidden.bs.modal', function() {
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $('.btn-submit').attr('data-action', 'insert').text('Lưu');
                $('.title-dateform').text('Biểu mẫu mới');
            });
            var idDateForm = $(this).attr('id');
            var name = $(this).data('name');
            var dataid = $(this).data('id');
            if (dataid) {
                $('.btn-submit').attr('data-action', 'update').text(
                    'Cập nhật');
                $('.title-dateform').text('Cập nhật');
            }
            $.ajax({
                url: '{{ route('searchDateForm') }}',
                type: 'GET',
                data: {
                    idDateForm: idDateForm
                },
                success: function(data) {
                    $('#myInput-' + name).val(data.form_desc);
                    $("input[name='idDate[" + data.form_field + "]']").val(data
                        .id);
                    $("input[name='fieldDate[" + data.form_field + "]']").val(data
                        .form_field);
                    if (dataid) {
                        $('#form-name-' + name).val(data.form_name)
                        $('#form-desc-' + name).val(data.form_desc)
                        $('.btn-submit').attr('data-id', dataid)
                    }
                    if (dataid) {
                        $('.btn-submit').attr('data-action', 'update').text(
                            'Cập nhật');
                        $('.title-dateform').text('Cập nhật');
                    }
                }
            });
        });

        // Xóa form date
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: '{{ route('deleteDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        showNotification('success', data.msg);
                        $(".item-" + id).remove();
                        $('#myInput-' + name).val('');
                        $("input[name='idDate[" + name + "]']").val(null);
                        $("input[name='fieldDate[" + data.form_field + "]']").val();
                    }
                });
            }
        });

        // Set mặc định có các dateForm
        $(document).on('click', '.set-default', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            $.ajax({
                url: '{{ route('setDefault') }}',
                type: 'GET',
                data: {
                    id: id,
                    name: name,
                },
                success: function(data) {
                    // $("input[name='idDate[" + name + "]']").val(id);
                    // $("input[name='fieldDate[" + name + "]']").val(name);
                    data.update_form.forEach(item => {
                        if (item.default_form === 1) {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link-slash"></i>');
                        } else {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link"></i>');
                        }
                    });
                }
            });
        });

        // submit thêm mới các trường
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var name = $(this).data('button-name');
            var inputName = $('#form-name-' + name).val();
            var inputDesc = $('#form-desc-' + name).val();
            var action = $(this).data('action');

            if ($('.btn-submit' + name).text() === 'Lưu') {
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $.ajax({
                    url: '{{ route('addDateForm') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        $('#myInput-' + name).val(data.new_date_form.form_desc);
                        showNotification('success', data.msg);
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $('.modal [data-dismiss="modal"]').click();

                        // Đoạn html của set default
                        let originalHTML =
                            '<a class="dropdown-item set-default default-id' + data
                            .new_date_form.form_field + '"' +
                            'id="default-id' + data.new_date_form.id + '" href="#"' +
                            'data-name="' + data.new_date_form.form_field + '"' +
                            'data-id="' + data.new_date_form.id + '">' +
                            '<i class="fa-solid fa-link"></i>' +
                            '</a>';
                        // Thêm phần tử mới vào trong form tìm kiếm
                        var newListItem =
                            '<li class="item-' + data.new_date_form.id +
                            '"><a href="#" class="text-dark d-flex justify-content-between p-2 search-date-form" id="' +
                            data.new_date_form.id +
                            '" name="search-date-form" data-name="' +
                            name + '">' +
                            '<span class="w-50" id="' + data.new_date_form.form_field + data
                            .new_date_form.id + '">' + data.new_date_form.form_name +
                            '</span></a><div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">' +
                            '<i class="fa-solid fa-ellipsis"></i>' + '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                            '<a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModal' +
                            name + '" data-name="' +
                            name + '" data-id="' + data.new_date_form.id +
                            '" id="' + data.new_date_form.id +
                            '"><i class="fa-regular fa-pen-to-square"></i></a>' +
                            '<a class="dropdown-item delete-item" href="#" data-id="' + data
                            .new_date_form.id +
                            '" data-name="' + data.new_date_form.form_field +
                            '"><i class="fa-solid fa-trash-can"></i></a>' + originalHTML +
                            '</div>' +
                            '</div></li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addDateForm" + name);
                        $(newListItem).insertBefore(addButton);
                        //clear
                        $('.search-date-form').click(function() {
                            $('.modal').on('hidden.bs.modal', function() {
                                $('#form-name-' + name).val('')
                                $('#form-desc-' + name).val('')
                                $('.btn-submit').attr('data-action',
                                    'insert').text('Lưu');
                                $('.title-dateform').text('Biểu mẫu mới');
                            });
                            var idDateForm = $(this).attr('id');
                            var name = $(this).data('name');
                            var dataid = $(this).data('id');
                            if (dataid) {
                                $('.btn-submit').attr('data-action', 'update').attr(
                                    'data-id', dataid).text(
                                    'Cập nhật');
                                $('.title-dateform').text('Cập nhật');
                            }
                            $.ajax({
                                url: '{{ route('searchDateForm') }}',
                                type: 'GET',
                                data: {
                                    idDateForm: idDateForm
                                },
                                success: function(data) {
                                    $("input[name='idDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .id);
                                    $("input[name='fieldDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .form_field);
                                    $('#myInput-' + name).val(data
                                        .form_desc);
                                    if (dataid) {
                                        $('#form-name-' + name).val(data
                                            .form_name)
                                        $('#form-desc-' + name).val(data
                                            .form_desc)
                                    }
                                }
                            });
                        });
                    }
                });
            }
            if ($('.btn-submit' + name).text() === 'Cập nhật') {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('updateDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $("#" + name + id).text(data.new_date_form.form_name)
                        $('#myInput-' + name).val(data.new_date_form.form_desc);

                        showNotification('success', data.msg);
                    }
                });
            }
        });

        let fieldCounter = 1;
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
            });
            const maSanPham = $(
                "<td class='border border-left-0 border-bottom-0 position-relative'>" +
                "<div class='d-flex w-100 justify-content-between align-items-center'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24'" +
                "fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z' fill='#42526E'/>" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z'" +
                "fill='#42526E' />" +
                "</svg>" +
                "<input type='checkbox' class='cb-element'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-75 product_code' name='product_code[]'>" +
                "</td>");
            const tenSanPham = $(
                "<td class='border border-bottom-0 position-relative'>" +
                "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 10%;'>" +
                "@foreach ($product as $product_value)" +
                "<li data-id='{{ $product_value->id }}'>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-100'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "</a></ul>" +
                "<div class='d-flex align-items-center'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                "<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>" +
                "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<g clip-path='url(#clip0_1704_35239)'>" +
                "<path d='M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z' fill='#282A30' />" +
                "<path d='M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z' fill='#282A30' />" +
                "<path d='M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z' fill='#282A30' />" +
                "</g>" +
                "<defs>" +
                "<clipPath id='clip0_1704_35239'>" +
                "<rect width='16' height='16' fill='white' />" +
                "</clipPath>" +
                "</defs>" +
                "</svg>" +
                "</div></div></td>"
            );
            const dvTinh = $(
                "<td class='border border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'></td>"
            );
            const soLuong = $(
                "<td class='border border-bottom-0 position-relative'>" +
                "<input type='number' class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;display: none;'>Tồn kho: <span class='soTonKho'>35</span></p>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute transaction d-none' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-bottom-0 px-2'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-bottom-0'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'>"
            );
            const option = $(
                "<td class='border border-bottom-0 border-right-0 text-right'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const ghiChu = $(
                "<td class='border border-bottom-0 position-relative note p-1'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, thue, thanhTien, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
            });
            //Change
            var productNameInputs = document.querySelectorAll('.product_name');
            productNameInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    var productIdInput = this.parentElement.querySelector(
                        '.product_id');
                    productIdInput.value = '';
                });
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();
                var productTaxText = $('#product-tax').text();
                var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
                var taxAmount = parseFloat(('.product_tax1').text());
                var totalTax = productTaxValue - taxAmount;
                $('#product-tax').text(totalTax);
            });
            // Checkbox
            $('#checkall').change(function() {
                $('.cb-element').prop('checked', this.checked);
                updateMultipleActionVisibility();
            });
            $('.cb-element').change(function() {
                updateMultipleActionVisibility();
                if ($('.cb-element:checked').length === $('.cb-element').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
            $(document).on('click', '.cancal_action', function(e) {
                e.preventDefault();
                $('.cb-element:checked').prop('checked', false);
                $('#checkall').prop('checked', false);
                updateMultipleActionVisibility()
            })

            function updateMultipleActionVisibility() {
                if ($('.cb-element:checked').length > 0) {
                    $('.multiple_action').show();
                    $('.count_checkbox').html($('.cb-element:checked').length +
                        '<span class="ml-1">chọn</span>');
                } else {
                    $('.multiple_action').hide();
                }
            }
            //Hiển thị danh sách mã sản phẩm
            // $(".list_code").hide();
            // $('.product_code').on("click", function(e) {
            //     e.stopPropagation();
            //     $(this).closest('tr').find(".list_code").show();
            // });
            // $(document).on("click", function(e) {
            //     if (!$(e.target).is(".product_code")) {
            //         $(".list_code").hide();
            //     }
            // });
            //Hiển thị danh sách tên sản phẩm
            $(".list_product").hide();
            $('.product_name').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_product").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_name")) {
                    $(".list_product").hide();
                }
            });
            //search mã sản phẩm
            // $(".product_code").on("keyup", function() {
            //     var value = $(this).val().toUpperCase();
            //     var $tr = $(this).closest("tr");
            //     $tr.find(".list_code li").each(function() {
            //         var text = $(this).find("a").text().toUpperCase();
            //         $(this).toggle(text.indexOf(value) > -1);
            //     });
            // });
            //search tên sản phẩm
            $(".product_name").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_product li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
            //lấy thông tin sản phẩm
            $(document).ready(function() {
                $('.idProduct').off('click').on('click', function(event) {
                    event.stopPropagation();

                    var clickedRow = $(this).closest('tr');
                    var productCode = clickedRow.find('.product_code');
                    var productName = clickedRow.find('.product_name');
                    var productUnit = clickedRow.find('.product_unit');
                    var thue = clickedRow.find('.product_tax');
                    var product_id = clickedRow.find('.product_id');
                    var tonkho = clickedRow.find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = clickedRow.find('.soTonKho');
                    var infoProduct = clickedRow.find('.info-product');
                    var inventory = clickedRow.find('.inventory');
                    var clickedProductId = $(this).parent().data('id');

                    if (clickedProductId !== product_id.val()) {
                        if (clickedRow.siblings().find('.product_id[value="' +
                                clickedProductId + '"]').length > 0) {
                            alert(
                                'Không thể chọn sản phẩm này. Vui lòng chọn sản phẩm khác.'
                                );
                            return;
                        }
                    }

                    $.ajax({
                        url: '{{ route('getProduct') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            productCode.val(data.product_code);
                            productName.val(data.product_name);
                            productUnit.val(data.product_unit);
                            thue.val(data.product_tax);
                            product_id.val(data.id);
                            tonkho.val(data.product_inventory == null ? 0 :
                                data.product_inventory)
                            soTonKho.text(parseFloat(data
                                .product_inventory == null ? 0 :
                                data.product_inventory));
                            infoProduct.show();
                            if (data.product_inventory > 0) {
                                inventory.show();
                            }
                            thue.prop('disabled', true);
                            $(".list_product").hide();
                        }
                    });
                });
            });

            //lấy thông tin mã sản phẩm
            // $(document).ready(function() {
            //     $('.maSP').click(function() {
            //         var idCode = $(this).attr('id');
            //         var productCode = $(this).closest('tr').find('.product_code');
            //         $.ajax({
            //             url: '{{ route('getProductCode') }}',
            //             type: 'GET',
            //             data: {
            //                 idCode: idCode
            //             },
            //             success: function(data) {
            //                 productCode.val(data.product_code);
            //             }
            //         });
            //     });
            // });
            //Xem thông tin sản phẩm
            $('.info-product').click(function() {
                var productName = $(this).closest('tr').find('.product_name').val();
                var dvt = $(this).closest('tr').find('.product_unit').val();
                var thue = $(this).closest('tr').find('.product_tax').val();
                var tonKho = $(this).closest('tr').find('.tonkho').val();
                $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                    productName + '<br>' +
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + tonKho +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
            });
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $(document).on('click', '.search-info', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    if (data.key) {
                        quotation = getQuotation(data.key, data['count'], data['date']);
                    } else {
                        quotation = getQuotation(data['guest'].guest_name_display, data[
                            'count'], data['date']);
                    }
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data['guest'].guest_name_display);
                    $('.idGuest').val(data['guest'].id);
                    $.ajax({
                        url: '{{ route('searchFormByGuestId') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            Object.keys(data).forEach(function(key) {
                                var formField = data[key].form
                                    .form_field;
                                var dateFormId = data[key].date_form_id;
                                var formDesc = data[key].form.form_desc;
                                $("input[name='fieldDate[" + key +
                                        "]']")
                                    .val(key);
                                $("input[name='idDate[" + key +
                                        "]']")
                                    .val(dateFormId);
                                $('#myInput-' + key).val(formDesc);
                            });
                            $('#show-info-guest').show();
                            $('#show-title-guest').show();
                        }
                    });
                    $.ajax({
                        url: '{{ route('getRepresentGuest') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            $('#representativeList').empty();
                            $.each(data, function(index, representative) {
                                var listItem = $(
                                        '<li class="border" data-id = ' +
                                        representative.id + '>')
                                    .append(
                                        $('<a>').attr({
                                            href: '#',
                                            title: representative
                                                .represent_name,
                                            class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                            id: representative.id,
                                            name: 'search-represent',
                                        }).append(
                                            $('<span>').addClass(
                                                'w-100 text-nav text-dark overflow-hidden'
                                            ).text(representative
                                                .represent_name)
                                        )
                                    ).append(
                                        $('<div>').addClass('dropdown')
                                        .append(
                                            $('<button>').attr({
                                                type: 'button',
                                                'data-toggle': 'dropdown',
                                                class: 'btn-save-print d-flex align-items-center h-100 border-0 bg-transparent',
                                                style: 'margin-right:10px'
                                            }).append(
                                                $('<i>').addClass(
                                                    'fa-solid fa-ellipsis'
                                                ).attr(
                                                    'aria-hidden',
                                                    'true')
                                            )
                                        ).append(
                                            $('<div>').addClass(
                                                'dropdown-menu date-form-setting'
                                            ).css('z-index', '1000')
                                            .append(
                                                $('<a>').addClass(
                                                    'dropdown-item edit-represent-form'
                                                ).attr({
                                                    'data-toggle': 'modal',
                                                    'data-target': '#representModal',
                                                    'data-name': 'representGuest',
                                                    'data-id': representative
                                                        .id
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-regular fa-pen-to-square'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            ).append(
                                                $('<a>').addClass(
                                                    'dropdown-item delete-item-represent'
                                                ).attr({
                                                    href: '#',
                                                    'data-id': representative
                                                        .id,
                                                    'data-name': 'representGuest'
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-solid fa-trash-can'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            ).append(
                                                $('<a>').addClass(
                                                    'dropdown-item default-represent'
                                                ).attr({
                                                    id: 'default-id' +
                                                        representative
                                                        .id,
                                                    href: '#',
                                                    'data-name': 'representGuest',
                                                    'data-id': representative
                                                        .id
                                                }).append(
                                                    $('<i>').addClass(
                                                        'fa-solid fa-link'
                                                    ).attr(
                                                        'aria-hidden',
                                                        'true')
                                                )
                                            )
                                        )
                                    );
                                $('#representativeList').append(
                                    listItem);
                            });
                        }
                    });
                    //
                    $.ajax({
                        url: '{{ route('getRepresentGuest') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            var defaultGuestItem = data.find(item => item
                                .default_guest === 1);
                            if (data.length > 1 && defaultGuestItem) {
                                $('#represent_guest').val(defaultGuestItem
                                    .represent_name);
                                $('.represent_guest_id').val(defaultGuestItem
                                    .id);
                            } else if (data.length === 1) {
                                $('#represent_guest').val(data[0]
                                    .represent_name);
                                $('.represent_guest_id').val(data[0].id);
                            } else {
                                $('#represent_guest').val('');
                                $('.represent_guest_id').val('');
                            }
                        }
                    });
                }
            });
        });
        //lấy thông tin người đại diện
        $(document).on('click', '.search-represent', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchRepresent') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('#represent_guest').val(data.represent_name);
                    $('.represent_guest_id').val(data.id);
                }
            });
        });
    });
    //Thêm thông tin khách hàng
    $(document).on('click', '.addGuestNew', function(e) {
        $('#addGuest').show();
        $('#updateGuest').hide();
        $('#id_guest').val('');
        $('#guest_name_display').val('');
        $("input[name='key']").val('');
        $('#guest_address').val(null);
        $('#guest_code').val(null);
        $('#represent_guest_name').val(null);
    });
    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val().trim();
        var guest_name = $('#guest_name').val().trim();
        var guest_address = $('#guest_address').val().trim();
        var guest_code = $('#guest_code').val().trim();
        // var guest_email = $('#guest_email').val().trim();
        // var guest_phone = $('#guest_phone').val().trim();
        // var guest_receiver = $('#guest_receiver').val().trim();
        // var guest_email_personal = $('#guest_email_personal').val().trim();
        // var guest_phone_receiver = $('#guest_phone_receiver').val().trim();
        // var guest_note = $('#guest_note').val().trim();
        var key = $("input[name='key']").val().trim().trim();
        var represent_guest_name = $('#represent_guest_name').val().trim();
        if (!guest_name_display || !guest_address || !guest_code) {
            showNotification('warning', 'Vui lòng điền đủ thông tin khách hàng!');
        } else {
            $('.nameGuest').val(null);
            $('.idGuest').val(null);
            $.ajax({
                url: "{{ route('addGuest') }}",
                type: "get",
                data: {
                    guest_name_display: guest_name_display,
                    guest_name: guest_name,
                    guest_address: guest_address,
                    guest_code: guest_code,
                    // guest_email: guest_email,
                    // guest_phone: guest_phone,
                    // guest_receiver: guest_receiver,
                    // guest_email_personal: guest_email_personal,
                    // guest_phone_receiver: guest_phone_receiver,
                    // guest_note: guest_note,
                    key: key,
                    represent_guest_name: represent_guest_name,
                },
                success: function(data) {
                    if (data.success) {
                        quotation = getQuotation(data.key, '1');
                        $('input[name="quotation_number"]').val(quotation);
                        $('.nameGuest').val(data.guest_name_display);
                        showNotification('success', data.msg);
                        $('.idGuest').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();

                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL'); // Danh sách hiện có
                        var newListItem =
                            '<li class="border" data-id="' + newGuestInfo.id + '">' +
                            '<a href="#" title="' + newGuestInfo.guest_name_display +
                            '" class="text-dark d-flex justify-content-between p-2 search-info w-100" id="' +
                            newGuestInfo.id + '" name="search-info">' +
                            '<span class="w-100 text-nav text-dark overflow-hidden">' + newGuestInfo
                            .guest_name_display + '</span>' +
                            '</a>' +
                            '<div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px" aria-expanded="false">' +
                            '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                            '<a class="dropdown-item edit-guest w-50" href="#" data-toggle="modal" data-target="#guestModal" data-id="' +
                            newGuestInfo.id + '">' +
                            '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                            '</a>' +
                            '<a class="dropdown-item delete-guest w-50" href="#" data-id="' +
                            newGuestInfo.id + '" data-name="guest">' +
                            '<i class="fa-solid fa-trash-can" aria-hidden="true"></i>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addGuestNew");
                        $(newListItem).insertBefore(addButton);

                        //clear
                        $('#guest_name_display').val('');
                        $("input[name='key']").val('');
                        $('#guest_address').val(null);
                        $('#guest_code').val(null);
                        $('#represent_guest_name').val(null);
                        $('#representativeList').empty();

                        // Nếu có người đại diện, thêm vào danh sách
                        if (data.represent_name !== null && data.represent_name !== '') {
                            //reset 
                            $('#representativeList').empty();
                            $('#represent_guest').val('');
                            $('.represent_guest_id').val('');

                            // Thêm người đại diện mới
                            var newGuestInfo1 = data;
                            var guestList1 = $('#myUL7'); // Danh sách hiện có
                            var newListItem1 =
                                '<li class="border" data-id="' + newGuestInfo1.id +
                                '"><a href="#" title="' + newGuestInfo1.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo1.id_represent + '" name="search-represent">' +
                                '<span class="w-100 text-nav text-dark overflow-hidden">' +
                                newGuestInfo1
                                .represent_name +
                                '</span></a>' +
                                '<div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">' +
                                '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                                '</button><div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item edit-represent-form" data-toggle="modal" data-target="#representModal" data-name="representGuest" data-id="' +
                                newGuestInfo1.id_represent + '">' +
                                '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                                '</a><a class="dropdown-item delete-item-represent" href="#" data-id="' +
                                newGuestInfo1.id_represent + '" data-name="representGuest">' +
                                '<i class="fa-solid fa-trash-can" aria-hidden="true"></i></a><a class="dropdown-item default-represent" id="default-id' +
                                newGuestInfo1.id_represent +
                                '" href="#" data-name="representGuest" data-id="' +
                                newGuestInfo1.id_represent + '">' +
                                '<i class="fa-solid fa-link" aria-hidden="true"></i></a></div></div>' +
                                '</li>';

                            // Thêm mục mới vào danh sách
                            var addButton1 = $(".addRepresentNew");
                            $(newListItem1).insertBefore(addButton1);

                            $('#represent_guest').val(data.represent_name);
                            $('.represent_guest_id').val(data.id_represent);
                        } else {
                            $('#represent_guest').val('');
                            $('.represent_guest_id').val('');
                        }
                        $('#show-info-guest').show();
                        $('#show-title-guest').show();
                    } else {
                        showNotification('warning', data.msg);
                    }
                }
            });
        }
    });
    //Cập nhật khách hàng
    $(document).ready(function() {
        $(document).on('click', '.edit-guest', function(e) {
            $('#addGuest').hide();
            $('#updateGuest').show();
            var itemId = $(this).data('id');
            $.ajax({
                url: '{{ route('editGuest') }}',
                type: 'GET',
                data: {
                    itemId: itemId
                },
                success: function(data) {
                    $('#id_guest').val(data.idGuest);
                    $('#guest_name_display').val(data.guest_name_display);
                    $('#guest_code').val(data.guest_code);
                    $('#guest_address').val(data.guest_address);
                    $('#key').val(data.key);
                    $('#guest_name').val(data.guest_name);
                    $('#represent_guest_name').val(data.represent_name);
                    $('#represent_guest_id').val(data.representID);
                }
            });
        });
        $(document).on('click', '#updateGuest', function(e) {
            var guest_id = $('#id_guest').val().trim();
            var represent_id = $('#represent_guest_id').val().trim();
            var guest_name = $('#guest_name').val().trim();
            var guest_address = $('#guest_address').val().trim();
            var guest_code = $('#guest_code').val().trim();
            var key = $("input[name='key']").val().trim().trim();
            var guest_name_display = $('input[name="guest_name_display"]').val().trim();
            var represent_guest_name = $('#represent_guest_name').val().trim();
            $.ajax({
                url: '{{ route('updateGuest') }}',
                type: 'GET',
                data: {
                    guest_id: guest_id,
                    represent_id: represent_id,
                    guest_name: guest_name,
                    guest_address: guest_address,
                    guest_code: guest_code,
                    key: key,
                    guest_name_display: guest_name_display,
                    represent_guest_name: represent_guest_name,
                },
                success: function(data) {
                    if (data.success) {
                        quotation = getQuotation(data.updated_guest.key, '1');
                        $('input[name="quotation_number"]').val(quotation);
                        $('.nameGuest').val(data.updated_guest.guest_name_display);
                        showNotification('success', data.msg);
                        $('.idGuest').val(data.updated_guest.id);
                        $('.modal [data-dismiss="modal"]').click();
                        $('#myUL li[data-id="' + data.updated_guest.id + '"] .text-nav')
                            .text(data
                                .updated_guest.guest_name_display);
                        $('#representativeList li[data-id="' + data.updated_represent.id +
                            '"] .text-nav').text(
                            data.updated_represent.represent_name);
                        $('#represent_guest').val(data.updated_represent.represent_name);
                    } else {
                        showNotification('warning', data.msg);
                    }
                }
            });
        });
    });
    //Xóa khách hàng
    $(document).on('click', '.delete-guest', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteGuest') }}",
            type: "get",
            data: {
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#myInput').val('');
                    $('.idGuest').val('');
                    $('#represent_guest').val('');
                    $('.represent_guest_id').val('');
                    $('#representativeList').empty();
                    showNotification('success', data.message);
                } else {
                    showNotification('warning', data.message);
                }
            }
        });
    });
    //Thêm dự án
    $(document).on('click', '#addProject', function(e) {
        var project_name = $('#project_name').val().trim();
        if (!project_name) {
            showNotification('success', 'Vui lòng điền thông tin dự án!');
        } else {
            $.ajax({
                url: "{{ route('addProject') }}",
                type: "get",
                data: {
                    project_name: project_name,
                },
                success: function(data) {
                    if (data.success) {
                        $('#ProjectInput').val(data.project_name);
                        $('.idProject').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();
                        showNotification('success', data.msg);
                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL7'); // Danh sách hiện có
                        var newListItem =
                            '<li class="border" data-id="' + newGuestInfo.id + '">' +
                            '<a href="#" class="text-dark d-flex justify-content-between p-2 search-project w-100" id="' +
                            newGuestInfo.id + '" name="search-project">' +
                            '<span class="w-100 text-nav text-dark overflow-hidden">' + newGuestInfo
                            .project_name + '</span>' +
                            '</a>' +
                            '<a class="dropdown-item delete-project w-25" href="#" data-id="' +
                            newGuestInfo.id + '" data-name="project">' +
                            '<i class="fa-solid fa-trash-can" aria-hidden="true"></i>' +
                            '</a>' +
                            '</li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addProjectNew");
                        $(newListItem).insertBefore(addButton);
                        //clear
                        $('#project_name').val('');
                    } else {
                        showNotification('warning', data.msg);
                    }
                }
            });
        }
    });
    //Xóa dự án
    $(document).on('click', '.delete-project', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteProject') }}",
            type: "get",
            data: {
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#ProjectInput').val('');
                    $('.idProject').val('');
                    showNotification('success', data.message);
                } else {
                    showNotification('warning', data.message);
                }
            }
        });
    });
    //Thêm người đại diện
    $(document).on('click', '.addRepresentNew', function(e) {
        $('#updateRepresent').hide();
        $('#addRepresent').show();
        $('#represent_id').val('');
        $('#represent_name').val('');
        $("#represent_email").val('');
        $('#represent_phone').val('');
        $('#represent_address').val('');
    });
    $(document).on('click', '#addRepresent', function(e) {
        var represent_name = $('input[name="represent_name"]').val().trim();
        var represent_email = $('#represent_email').val().trim();
        var represent_phone = $('#represent_phone').val().trim();
        var represent_address = $('#represent_address').val().trim();
        var guest_id = $('.idGuest').val();
        if (!guest_id) {
            showNotification('warning', 'Vui lòng chọn khách hàng trước khi tạo người đại diện!');
        } else {
            if (!represent_name) {
                showNotification('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: "{{ route('addRepresentGuest') }}",
                    type: "get",
                    data: {
                        represent_name: represent_name,
                        represent_email: represent_email,
                        represent_phone: represent_phone,
                        represent_address: represent_address,
                        guest_id: guest_id,
                    },
                    success: function(data) {
                        if (data.success) {
                            $('#represent_guest').val(data.represent_name);
                            $('.represent_guest_id').val(data.id);
                            $('.modal [data-dismiss="modal"]').click();
                            showNotification('success', data.msg);
                            // Nếu thành công, tạo một mục mới
                            var newGuestInfo = data;
                            var guestList = $('#representativeList'); // Danh sách hiện có
                            var newListItem =
                                '<li class="border" data-id="' + newGuestInfo.id +
                                '"><a href="#" title="' + newGuestInfo.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo.id + '" name="search-represent">' +
                                '<span class="w-100 text-nav text-dark overflow-hidden">' +
                                newGuestInfo
                                .represent_name +
                                '</span></a>' +
                                '<div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px">' +
                                '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                                '</button><div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item edit-represent-form" data-toggle="modal" data-target="#representModal" data-name="representGuest" data-id="' +
                                newGuestInfo.id + '">' +
                                '<i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>' +
                                '</a><a class="dropdown-item delete-item-represent" href="#" data-id="' +
                                newGuestInfo.id + '" data-name="representGuest">' +
                                '<i class="fa-solid fa-trash-can" aria-hidden="true"></i></a><a class="dropdown-item default-represent" id="default-id' +
                                newGuestInfo.id +
                                '" href="#" data-name="representGuest" data-id="' +
                                newGuestInfo.id + '">' +
                                '<i class="fa-solid fa-link" aria-hidden="true"></i></a></div></div>' +
                                '</li>';
                            // Thêm mục mới vào danh sách
                            guestList.append(newListItem);
                            //clear
                            $('#represent_name').val('');
                            $("#represent_email").val('');
                            $('#represent_phone').val('');
                            $('#represent_address').val('');
                        } else {
                            showNotification('warning', data.msg);
                        }
                    }
                });
            }
        }
    });
    //Xóa người đại diện
    $(document).on('click', '.delete-item-represent', function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            url: "{{ route('deleteRepresentGuest') }}",
            type: "get",
            data: {
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#represent_guest').val('');
                    $('.represent_guest_id').val('');
                    showNotification('success', data.message);
                } else if (data.success == false) {
                    showNotification('warning', data.message);
                }
            }
        });
    });
    //Cập nhật thông tin người đại diện
    $(document).on('click', '.edit-represent-form', function(e) {
        e.preventDefault();
        $('#addRepresent').hide();
        $('#updateRepresent').show();
        var itemId = $(this).data('id');
        $.ajax({
            url: '{{ route('editRepresent') }}',
            type: 'GET',
            data: {
                itemId: itemId
            },
            success: function(data) {
                $('#represent_id').val(data.id);
                $('#represent_name').val(data.represent_name);
                $("#represent_email").val(data.represent_email);
                $('#represent_phone').val(data.represent_phone);
                $('#represent_address').val(data.represent_address);
            }
        });
    });
    $(document).ready(function() {
        $(document).on('click', '#updateRepresent', function(e) {
            var guest_id = $('.idGuest').val().trim();
            var represent_id = $('#represent_id').val().trim();
            var represent_name = $('input[name="represent_name"]').val().trim();
            var represent_email = $('#represent_email').val().trim();
            var represent_phone = $('#represent_phone').val().trim();
            var represent_address = $('#represent_address').val().trim();
            if (!represent_name) {
                showNotification('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: '{{ route('updateRepresent') }}',
                    type: 'GET',
                    data: {
                        guest_id: guest_id,
                        represent_id: represent_id,
                        represent_name: represent_name,
                        represent_email: represent_email,
                        represent_phone: represent_phone,
                        represent_address: represent_address,
                    },
                    success: function(data) {
                        if (data.success) {
                            var representId = data.representGuest.id;
                            $('#myUL7 li[data-id="' + representId +
                                '"] .text-nav').text(
                                data.representGuest.represent_name);
                            $('#represent_guest').val(data.representGuest.represent_name);
                            $('.represent_guest_id').val(data.representGuest.id);
                            $('.modal [data-dismiss="modal"]').click();
                            showNotification('success', data.msg);
                        } else {
                            showNotification('warning', data.msg);
                        }
                    }
                });
            }
        });
    });
    //Chọn mặc định người đại diện
    $(document).on('click', '.default-represent', function(e) {
        e.preventDefault();
        var represent_id = $(this).data('id');
        var guest_id = $('.idGuest').val();
        $.ajax({
            url: '{{ route('defaultRepresent') }}',
            type: 'GET',
            data: {
                represent_id: represent_id,
                guest_id: guest_id,
            },
            success: function(data) {
                if (data.success) {
                    $('#represent_guest').val(data.representGuest.represent_name);
                    $('.represent_guest_id').val(data.representGuest.id);
                    showNotification('success', 'Chọn mặc định người đại diện thành công!');
                } else {
                    showNotification('warning', 'Không tìm thấy người đại diện');
                }
            }
        });
    });

    //tính thành tiền của sản phẩm
    $(document).on('input', '.quantity-input, [name^="product_price"]', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var productPrice = parseFloat($(this).closest('tr').find('input[name^="product_price"]').val()
            .replace(
                /[^0-9.-]+/g, "")) || 0;
        updateTaxAmount($(this).closest('tr'));
        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount = productQty * productPrice;
            $(this).closest('tr').find('.total-amount').val(formatCurrency(totalAmount));
            calculateTotalAmount();
            calculateTotalTax();
        }
    });

    $(document).on('change', '.product_tax', function() {
        updateTaxAmount($(this).closest('tr'));
        calculateTotalAmount();
        calculateTotalTax();
    });

    function updateTaxAmount(row) {
        var productQty = parseFloat(row.find('.quantity-input').val());
        var productPrice = parseFloat(row.find('input[name^="product_price"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat(row.find('.product_tax').val());
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            var taxAmount = (totalAmount * taxValue) / 100;

            row.find('.product_tax1').text(Math.round(taxAmount));
        }
    }

    function calculateTotalAmount() {
        var totalAmount = 0;
        $('tr').each(function() {
            var rowTotal = parseFloat(String($(this).find('.total-amount').val()).replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTotal)) {
                totalAmount += rowTotal;
            }
        });
        totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
        $('#total-amount-sum').text(formatCurrency(totalAmount));
        calculateTotalTax();
        calculateGrandTotal();
    }

    function calculateTotalTax() {
        var totalTax = 0;
        $('tr').each(function() {
            var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTax)) {
                totalTax += rowTax;
            }
        });
        totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
        $('#product-tax').text(formatCurrency(totalTax));

        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

        var grandTotal = totalAmount + totalTax;
        grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
        $('#grand-total').text(formatCurrency(grandTotal));

        // Update data-value attribute
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

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

    //Tính đơn giá
    $(document).on('input', '.heSoNhan, .giaNhap', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var heSoNhan = parseFloat($(this).closest('tr').find('.heSoNhan').val()) || 0;
        var giaNhap = parseFloat($(this).closest('tr').find('.giaNhap').val().replace(/[^0-9.-]+/g, "")) || 0;
        updateTaxAmount($(this).closest('tr'));
        if (!isNaN(heSoNhan) && !isNaN(giaNhap)) {
            var donGia = ((heSoNhan + 100) * giaNhap) / 100;
            var totalAmount = productQty * donGia;
            $(this).closest('tr').find('.product_price').val(formatCurrency(donGia));
            $(this).closest('tr').find('.total-amount').val(formatCurrency(totalAmount));
            calculateTotalAmount();
            calculateTotalTax();
        }
    });

    //format giá
    var inputElement = document.getElementById('product_price');
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher', function(event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, '');

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    });

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split('.');
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }

    function kiemTraFormGiaoHang(event) {
        event.preventDefault();

        var rows = document.querySelectorAll('tr');
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                var inputs = rows[i].querySelectorAll('input[required]');
                for (var j = 0; j < inputs.length; j++) {
                    if (inputs[j].value.trim() === '') {
                        showNotification('warning', 'Vui lòng điền đủ thông tin sản phẩm');
                        return; // Dừng ngay khi gặp một trường input thiếu thông tin
                    }
                }
                hasProducts = true;
            }
        }

        // Tiếp tục với các kiểm tra khác và xử lý submit nếu cần
        var inputValue = $('.idGuest').val();
        var shouldSubmit = true;

        if ($.trim(inputValue) === '') {
            showNotification('warning', 'Vui lòng chọn khách hàng từ danh sách hoặc thêm mới khách hàng!');
            shouldSubmit = false;
        } else if (!hasProducts) {
            showNotification('warning', 'Không có sản phẩm để báo giá');
            shouldSubmit = false;
        }

        // Kiểm tra số báo giá tồn tại bằng Ajax
        if (hasProducts && shouldSubmit) {
            var quotetion_number = $('input[name="quotation_number"]').val();
            $('.product_tax').prop('disabled', false);
            $.ajax({
                url: "{{ route('checkQuotetionExport') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Số báo giá đã tồn tại');
                    } else {
                        // Nếu số báo giá không tồn tại, thực hiện submit form
                        $('form')[0].submit();
                    }
                }
            });
        }
    }
</script>
</body>

</html>
