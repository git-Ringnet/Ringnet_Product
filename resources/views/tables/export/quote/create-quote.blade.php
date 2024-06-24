<x-navbar :title="$title" activeGroup="sell" activeName="quote">
</x-navbar>
<form id="form-submit" action="{{ route('detailExport.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <input type="hidden" name="excel_export" id="excel_export">
    <input type="hidden" name="pdf_export" id="pdf_export">
    <div class="content-wrapper--2Column m-0 min-height--none">
        <div class="content-header-fixed p-0 margin-250 border-bottom-0">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn báo giá</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo đơn báo giá</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('detailExport.index', $workspacename) }}" class="activity" data-name1="BG"
                            data-des="Hủy">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>
                        <div class="dropdown">
                            <button type="submit" data-toggle="dropdown"
                                class="btn-save-print rounded d-flex mx-1 align-items-center h-100 dropdown-toggle px-2">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#" id="excel-link">Xuất Excel</a>
                                <a class="dropdown-item text-13-black" href="#" id="pdf-link">Xuất PDF</a>
                            </div>
                        </div>
                        <button type="submit" onclick="kiemTraFormGiaoHang(event);" id="luuNhap"
                            class="custom-btn d-flex align-items-center h-100 mx-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                        </button>
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
        <div class="content margin-top-38" id="main">
            <section class="content margin-250">
                <div id="title--fixed"
                    class="content-title--fixed bg-filter-search text-center border-custom border-0">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="content">
                        <table class="table">
                            <thead>
                                <tr style="height:44px;">
                                    <th class="border-right px-2 p-0" style="width: 16%">
                                        <input type='checkbox'
                                            class='checkall-btn ml-4 mr-1 text-left'id="checkall" />
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-left" style="width: 15%;z-index:99;">
                                        <span class="text-table text-secondary">Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-left" style="width: 8%;">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 13%;">
                                        <span class="text-table text-secondary">Đơn giá</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 10%;">
                                        <span class="text-table text-secondary">KM</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-center" style="width: 8%;">
                                        <span class="text-table text-secondary">Thuế</span>
                                    </th>
                                    <th class="border-right px-2 p-0 text-right" style="width: 11%;">
                                        <span class="text-table text-secondary">Thành tiền</span>
                                    </th>
                                    <th class="border-right note px-2 p-0 text-left" style="width: 15%;">
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
                    <!-- <section class="multiple_action border shadow" style="display: none;">
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
                    </section> -->
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
                                        fill="#42526E" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                        fill="#42526E" />
                                </svg>
                                <span class="text-table">Thêm sản phẩm</span>
                            </button>
                            {{-- <button type="button" data-toggle="dropdown"
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
                            </button> --}}
                        </div>
                    </div>
                </section>
                <div class="content">
                    <div class="row" style="width:95%;">
                        <div class="position-relative col-lg-4 px-0"></div>
                        <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                            <div class="m-3 ">
                                <div class="d-flex justify-content-between">
                                    <span class="text-13-black">Giá trị trước thuế:</span>
                                    <span id="total-amount-sum" class="text-table">0</span>
                                </div>
                                <div class="d-flex justify-content-between mt-2 align-items-center">
                                    <span class="text-13-black">Khuyến mãi</span>
                                    <input name="promotion-total" id="promotion-total" type="text"
                                        class="text-table border-0 text-right" disabled>
                                </div>
                                <div class="d-flex justify-content-between mt-2 align-items-center">
                                    <span class="text-13-black">Hình thức</span>
                                    <select name="promotion-option-total" class="border-0 promotion-option-total">
                                        <option value="1">Nhập tiền</option>
                                        <option value="2">Nhập %</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-between mt-2 align-items-center">
                                    <span class="text-13-black">Thuế VAT:</span>
                                    <span id="product-tax" class="text-table">0</span>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="text-13-bold text-lg font-weight-bold">Tổng cộng:</span>
                                    <span id="grand-total" data-value="0"
                                        class="text-13-bold text-lg font-weight-bold text-right">
                                        0
                                    </span>
                                    <input type="text" hidden="" name="totalValue" value="0"id="total">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Modal khách hàng --}}
            <div class="modal fade" id="guestModal" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 5%;">
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
                                    <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                        oninput="validateInput(this)"
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
                                <div class="mt-2">
                                    <p class="p-0 m-0 px-2 text-nav">
                                        Số điện thoại
                                    </p>
                                    <input type="text" placeholder="Nhập thông tin" id="guest_phone"
                                        class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                        autocomplete="off">
                                </div>
                                <div class="mt-2">
                                    <p class="p-0 m-0 px-2 text-nav">
                                        Email
                                    </p>
                                    <input type="text" placeholder="Nhập thông tin" id="guest_email"
                                        class="border w-100 py-1 border-left-0 border-right-0 px-2 border-top-0 text-nav"
                                        autocomplete="off">
                                </div>
                                <div class="mt-2">
                                    <p class="p-0 m-0 px-2 text-nav">
                                        Địa chỉ nhận
                                    </p>
                                    <input type="text" placeholder="Nhập thông tin" id="guest_receiver"
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
                <div class="modal-dialog" role="document" style="margin-top: 10%;max-width: 20%;">
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
                            <button type="button" class="custom-btn h-100 py-1 px-2 text-table"
                                id="updateRepresent">Cập
                                nhật người đại diện</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal dự án --}}
            {{-- <div class="modal fade" id="projectModal" tabindex="-1" role="dialog"
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
            </div> --}}
            {{-- Modal giao dịch gần đây --}}
            <div class="modal fade" id="recentModal" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="outer text-nowrap" style="scrollbar-width: inherit;">
                                <table id="example2" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Tên sản phẩm
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Khách hàng
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Giá bán
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Thuế
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Ngày bán
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
        </div>
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG
                        </p>
                    </div>
                    <div class="d-flex border-left-0 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:43px;">
                        <span class="text-13 btn-click" style="flex: 1.5;"> Khách hàng </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" name="guestName"
                                class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest " id="myInput" readonly
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" required>
                            <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                        </span>
                        <div class="">
                            <div id="myUL"
                                class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập công ty"
                                            class="pr-4 w-100 input-search bg-input-guest" id="companyFilter">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="m-0 p-0 scroll-data">
                                    @foreach ($guest as $guest_value)
                                        <li class="p-2 align-items-center text-wrap border-top"
                                            data-id="{{ $guest_value->id }}"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="#" title="{{ $guest_value->guest_name_display }}"
                                                style="flex:2;" id="{{ $guest_value->id }}" name="search-info"
                                                class="search-info">
                                                <span
                                                    class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                            </a>
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown"
                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 1000;">
                                                    <a class="dropdown-item edit-guest w-50" href="#"
                                                        data-toggle="modal" data-target="#guestModal"
                                                        data-id="{{ $guest_value->id }}">
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
                                                    <a class="dropdown-item delete-guest w-50" href="#"
                                                        data-id="{{ $guest_value->id }}" data-name="guest">
                                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a type="button"
                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                    data-toggle="modal" data-target="#guestModal"
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
                                        khách hàng</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="content-info--common" id="show-info-guest" style="display: none;">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between border-bottom py-2 px-3 align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" id="represent_guest"
                                        name="representName" readonly autocomplete="off" style="flex:2;"
                                        placeholder="Chọn thông tin">
                                    <input type="hidden" class="represent_guest_id" name="represent_guest_id"
                                        autocomplete="off">
                                    <div id="myUL7"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập người đại diện"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter7">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data" id="representativeList"></ul>
                                        <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addRepresentNew mt-2"
                                            data-toggle="modal" data-target="#representModal"
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
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between border-bottom py-2 px-3 align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Số báo giá</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"style="flex:2;"
                                        name="quotation_number" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"
                                        placeholder="Chọn thông tin" style="flex:2;" name="reference_number" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                    <input type="text" id="datePicker" style="flex:2;"
                                        placeholder="Chọn thông tin"
                                        class="text-13-black w-50 border-0 bg-input-guest">
                                    <input type="hidden" id="hiddenDateInput" name="date_quote" value="">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left position-relative"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" autocomplete="off"
                                        placeholder="Chọn thông tin" name="price_effect" id="myInput-quote"
                                        style="flex:2;"
                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[quote]"
                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[quote]"
                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_field : '' }}">

                                    <div id="myUL2"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập hiệu lực "
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter2">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data addDateFormquote">
                                            @foreach ($date_form as $item)
                                                @if ($item->form_field == 'quote')
                                                    <li class="item-{{ $item->id }} p-2 align-items-center text-wrap border-top"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="#" title="{{ $item->form_name }}"
                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                            id="{{ $item->id }}" name="search-date-form"
                                                            data-name="quote">
                                                            <span class="text-13-black"
                                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                        </a>
                                                        @if ($item->workspace_id != null)
                                                            <div class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <div class="dropdown-menu date-form-setting"
                                                                    style="z-index: 1000;">
                                                                    <a class="dropdown-item search-date-form"
                                                                        data-toggle="modal"
                                                                        data-target="#formModalquote"
                                                                        data-name="quote"
                                                                        data-id="{{ $item->id }}"
                                                                        id="{{ $item->id }}"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                    <a class="dropdown-item delete-item"
                                                                        href="#" data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->form_field }}"><i
                                                                            class="fa-solid fa-trash-can"></i></a>
                                                                    <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                        id="default-id{{ $item->id }}"
                                                                        href="#"
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
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
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
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between position-relative py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" id="myInput-payment"
                                        placeholder="Chọn thông tin" style="flex:2;" name="terms_pay"
                                        autocomplete="off"
                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off"
                                        name="idDate[payment]"
                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[payment]"
                                        value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_field : '' }}">

                                    <div id="myUL1"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập điều khoản"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter1">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data addDateFormpayment">
                                            @foreach ($date_form as $item)
                                                @if ($item->form_field == 'payment')
                                                    <li class="item-{{ $item->id }} p-2 align-items-center text-wrap border-top"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="#" title="{{ $item->form_name }}"
                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                            id="{{ $item->id }}" name="search-date-form"
                                                            data-name="payment">
                                                            <span class="text-13-black"
                                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                        </a>
                                                        @if ($item->workspace_id != null)
                                                            <div class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <div class="dropdown-menu date-form-setting"
                                                                    style="z-index: 1000;">
                                                                    <a class="dropdown-item search-date-form"
                                                                        data-toggle="modal"
                                                                        data-target="#formModalpayment"
                                                                        data-name="payment"
                                                                        data-id="{{ $item->id }}"
                                                                        id="{{ $item->id }}"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                    <a class="dropdown-item delete-item"
                                                                        href="#" data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->form_field }}"><i
                                                                            class="fa-solid fa-trash-can"></i></a>
                                                                    <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                        id="default-id{{ $item->id }}"
                                                                        href="#"
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
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
                                            data-toggle="modal" data-target="#formModalpayment"
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
                                    </div>
                                </li>
                                {{-- <li class="d-flex justify-content-between position-relative py-2 px-3 border-bottom border align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;"
                                        autocomplete="off" placeholder="Chọn thông tin" id="ProjectInput" />
                                    <input type="hidden" class="idProject" autocomplete="off" name="project_id">

                                    <div id="listProject"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập dự án"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter8">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data addProjectNew">
                                            @foreach ($project as $project_value)
                                                <li class="p-2 align-items-center text-wrap"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                    <a href="#"
                                                        class="text-dark d-flex justify-content-between p-2 search-project w-100"
                                                        id="{{ $project_value->id }}">
                                                        <span
                                                            class="text-13-black">{{ $project_value->project_name }}</span>
                                                    </a>
                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown"
                                                            class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent"
                                                            style="margin-right:10px" aria-expanded="false"><i
                                                                class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting"
                                                            style="z-index: 1000;">
                                                            <a class="dropdown-item delete-project w-50"
                                                                href="#" data-id="{{ $project_value->id }}">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
                                            data-toggle="modal" data-target="#projectModal"
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
                                                style="font-weight: 600 !important;">Thêm dự án</span>
                                        </a>
                                    </div>
                                </li> --}}
                                <li class="d-flex justify-content-between position-relative py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hàng hóa</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                        id="myInput-goods" placeholder="Chọn thông tin" name="goods"
                                        autocomplete="off"
                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[goods]"
                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[goods]"
                                        value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_field : '' }}">

                                    <div id="myUL4"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập hàng hóa"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter4">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data addDateFormgoods">
                                            @foreach ($date_form as $item)
                                                @if ($item->form_field == 'goods')
                                                    <li class="item-{{ $item->id }} p-2 align-items-center text-wrap border-top"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="#" title="{{ $item->form_name }}"
                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                            id="{{ $item->id }}" name="search-date-form"
                                                            data-name="goods">
                                                            <span class="text-13-black"
                                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                        </a>
                                                        @if ($item->workspace_id != null)
                                                            <div class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <div class="dropdown-menu date-form-setting"
                                                                    style="z-index: 1000;">
                                                                    <a class="dropdown-item search-date-form"
                                                                        data-toggle="modal"
                                                                        data-target="#formModalgoods"
                                                                        data-name="goods"
                                                                        data-id="{{ $item->id }}"
                                                                        id="{{ $item->id }}"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                    <a class="dropdown-item delete-item"
                                                                        href="#" data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->form_field }}"><i
                                                                            class="fa-solid fa-trash-can"></i></a>
                                                                    <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                        id="default-id{{ $item->id }}"
                                                                        href="#"
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
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
                                            data-toggle="modal" data-target="#formModalgoods"
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
                                                style="font-weight: 600 !important;">Thêm hàng hóa</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between position-relative py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Giao hàng</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                        placeholder="Chọn thông tin" name="delivery" id="myInput-delivery"
                                        autocomplete="off"
                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off"
                                        name="idDate[delivery]"
                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[delivery]"
                                        value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_field : '' }}">

                                    <div id="myUL5"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập giao hàng"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter5">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data2 addDateFormdelivery">
                                            @foreach ($date_form as $item)
                                                @if ($item->form_field == 'delivery')
                                                    <li class="item-{{ $item->id }} p-2 align-items-center text-wrap border-top"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="#" title="{{ $item->form_name }}"
                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                            id="{{ $item->id }}" name="search-date-form"
                                                            data-name="delivery">
                                                            <span class="text-13-black"
                                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                        </a>
                                                        @if ($item->workspace_id != null)
                                                            <div class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <div class="dropdown-menu date-form-setting"
                                                                    style="z-index: 1000;">
                                                                    <a class="dropdown-item search-date-form"
                                                                        data-toggle="modal"
                                                                        data-target="#formModaldelivery"
                                                                        data-name="delivery"
                                                                        data-id="{{ $item->id }}"
                                                                        id="{{ $item->id }}"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                    <a class="dropdown-item delete-item"
                                                                        href="#" data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->form_field }}"><i
                                                                            class="fa-solid fa-trash-can"></i></a>
                                                                    <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                        id="default-id{{ $item->id }}"
                                                                        href="#"
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
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
                                            data-toggle="modal" data-target="#formModaldelivery"
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
                                                style="font-weight: 600 !important;">Thêm giao hàng</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between position-relative py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa điểm</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                        placeholder="Chọn thông tin" name="location" id="myInput-location"
                                        autocomplete="off"
                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off"
                                        name="idDate[location]"
                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[location]"
                                        value="{{ isset($dataForm['location']) ? $dataForm['location']->form_field : '' }}">

                                    <div id="myUL6"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest--special z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Nhập địa điểm"
                                                    class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                                    id="companyFilter6">
                                                <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data2 addDateFormlocation">
                                            @foreach ($date_form as $item)
                                                @if ($item->form_field == 'location')
                                                    <li class="item-{{ $item->id }} p-2 align-items-center text-wrap border-top"
                                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                        <a href="#" title="{{ $item->form_name }}"
                                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                                            id="{{ $item->id }}" name="search-date-form"
                                                            data-name="location">
                                                            <span class="text-13-black"
                                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                                        </a>
                                                        @if ($item->workspace_id != null)
                                                            <div class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <div class="dropdown-menu date-form-setting"
                                                                    style="z-index: 1000;">
                                                                    <a class="dropdown-item search-date-form"
                                                                        data-toggle="modal"
                                                                        data-target="#formModallocation"
                                                                        data-name="location"
                                                                        data-id="{{ $item->id }}"
                                                                        id="{{ $item->id }}"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                    <a class="dropdown-item delete-item"
                                                                        href="#"
                                                                        data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->form_field }}"><i
                                                                            class="fa-solid fa-trash-can"></i></a>
                                                                    <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                                        id="default-id{{ $item->id }}"
                                                                        href="#"
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
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a type="button" class="d-flex align-items-center p-2 position-sticky mt-2"
                                            data-toggle="modal" data-target="#formModallocation"
                                            style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#282A30" />
                                                </svg>
                                            </span>
                                            <span class="text-13-black pl-3 pt-1"
                                                style="font-weight: 600 !important;">Thêm địa điểm</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
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
<x-user-flow></x-user-flow>
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
                        update: 1,
                        id: id
                    },
                    success: function(data) {
                        showAutoToast('success', data.msg);
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
                url: '{{ route('setDefaultGuest') }}',
                type: 'GET',
                data: {
                    update: 1,
                    id: id,
                    name: name,
                },
                success: function(data) {
                    $("input[name='idDate[" + name + "]']").val(data.id);
                    $("#myInput-" + name).val(data.form.form_desc);
                    data.update_form.forEach(item => {
                        if (item.default_form === 1) {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link-slash"></i>');
                            showAutoToast('success', data.msg);
                        } else {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link"></i>');
                            showAutoToast('success', data.msg);
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

            if (inputName == '' || inputDesc == '') {
                showAutoToast('warning', 'Vui lòng nhập đầy đủ thông tin');
                return false;
            } else {
                if ($('.btn-submit' + name).text() === 'Lưu') {
                    $('#form-name-' + name).val('')
                    $('#form-desc-' + name).val('')
                    $.ajax({
                        url: '{{ route('addDateForm') }}',
                        type: 'GET',
                        data: {
                            update: 1,
                            name: name,
                            inputName: inputName,
                            inputDesc: inputDesc,
                        },
                        success: function(data) {
                            $('#myInput-' + name).val(data.new_date_form.form_desc);
                            $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                                .val(data.new_date_form
                                    .id);
                            $("input[name='fieldDate[" + data.new_date_form.form_field +
                                    "]']")
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
                                '<li class="border-bottom p-2 align-items-center text-wrap border-top item-' +
                                data.new_date_form.id +
                                '"><a href="#" class="text-dark d-flex justify-content-between p-2 search-date-form" id="' +
                                data.new_date_form.id +
                                '" name="search-date-form" data-name="' +
                                name + '">' +
                                '<span class="text-13-black" id="' + data.new_date_form
                                .form_field + data
                                .new_date_form.id + '">' + data.new_date_form.form_name +
                                '</span></a><div class="dropdown">' +
                                '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent">' +
                                '<i class="fa-solid fa-ellipsis"></i>' + '</button>' +
                                '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                                '<a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModal' +
                                name + '" data-name="' +
                                name + '" data-id="' + data.new_date_form.id +
                                '" id="' + data.new_date_form.id +
                                '"><i class="fa-regular fa-pen-to-square"></i></a>' +
                                '<a class="dropdown-item delete-item" href="#" data-id="' +
                                data
                                .new_date_form.id +
                                '" data-name="' + data.new_date_form.form_field +
                                '"><i class="fa-solid fa-trash-can"></i></a>' +
                                originalHTML +
                                '</div>' +
                                '</div></li>';
                            // Thêm mục mới vào danh sách
                            var addButton = $(".addDateForm" + name);
                            $(addButton).append(newListItem);
                            showAutoToast('success', data.msg);
                            //clear
                            $('.search-date-form').click(function() {
                                $('.modal').on('hidden.bs.modal', function() {
                                    $('#form-name-' + name).val('')
                                    $('#form-desc-' + name).val('')
                                    $('.btn-submit').attr('data-action',
                                        'insert').text('Lưu');
                                    $('.title-dateform').text(
                                        'Biểu mẫu mới');
                                });
                                var idDateForm = $(this).attr('id');
                                var name = $(this).data('name');
                                var dataid = $(this).data('id');
                                if (dataid) {
                                    $('.btn-submit').attr('data-action', 'update')
                                        .attr(
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
                                                .form_field + "]']")
                                            .val(
                                                data
                                                .id);
                                        $("input[name='fieldDate[" +
                                                data
                                                .form_field + "]']")
                                            .val(
                                                data
                                                .form_field);
                                        $('#myInput-' + name).val(data
                                            .form_desc);
                                        if (dataid) {
                                            $('#form-name-' + name).val(
                                                data
                                                .form_name)
                                            $('#form-desc-' + name).val(
                                                data
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
                            update: 1,
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
                            $("input[name='fieldDate[" + data.new_date_form.form_field +
                                    "]']")
                                .val(data.new_date_form
                                    .form_field);
                            $("#" + name + id).text(data.new_date_form.form_name)
                            $('#myInput-' + name).val(data.new_date_form.form_desc);

                            showAutoToast('success', data.msg);
                        }
                    });
                }
            }
        });

        let fieldCounter = 1;
        var arrProduct = [];
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
                "style": `height:80px`,
            });
            const maSanPham = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<span class='ml-1 mr-2'>" +
                "<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>" +
                "<g clip-path='url(#clip0_1710_10941)'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>" +
                "</g>" +
                "<defs>" +
                "<clipPath id='clip0_1710_10941'>" +
                "<rect width='6' height='10' fill='white'/>" +
                "</clipPath>" +
                "</defs>" +
                "</svg>" +
                "</span>" +
                "<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>" +
                "<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code height-32' name='product_code[]'>" +
                "</td>"
            );
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
                `<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>` +
                `<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>` +
                `<g clip-path='url(#clip0_2559_39956)'>` +
                `<path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>` +
                `<path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>` +
                `<path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>` +
                `</g>` +
                `<defs>` +
                `<clipPath id='clip0_2559_39956'>` +
                `<rect width='14' height='14' fill='white'/>` +
                `</clipPath>` +
                `</defs>` +
                `</svg>` +
                `</div>` +
                `</div>` +
                `</td>`
            );
            const dvTinh = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit height-32' required name='product_unit[]'>" +
                "</td>"
            );
            const soLuong = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div>" +
                "<input type='number' class='text-right border-0 px-2 py-1 w-100 quantity-input height-32' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "</div>" +
                "<div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho'></span></div>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div>" +
                "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price height-32' autocomplete='off' name='product_price[]' required>" +
                "</div>" +
                "<a href='#'><div class='mt-3 text-right text-13-blue recentModal' data-toggle='modal' data-target='#recentModal' style='display:none;'>Giao dịch gần đây</div></a>" +
                "</td>"
            );
            const chiTietChietKhau = $(
                "<td class='border-right p-2 align-top border-bottom border-top-0'>" +
                "<div class='d-flex flex-column align-items-center'>" +
                "<input type='text' name='discount_input[]' class='discount_input text-13-black py-1 w-100 height-32 mt-1' placeholder='Giá trị chiết khấu' style='border: none;'>" +
                "<select name='discount_option[]' class='discount_option border-0 mt-2'>" +
                "<option value='' disabled>Chọn chiết khấu</option>" +
                "<option value='1' selected>Nhập tiền</option>" +
                "<option value='2'>Nhập %</option>" +
                "</select>" +
                "</div>" +
                "</td>"
            );
            const thue = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<select name='product_tax[]' class='border-0 py-1 w-100 text-center product_tax height-32' required>" +
                "<option value='0' selected>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border-right note p-2 align-top border-bottom border-top-0'>" +
                "<input type='text' class='text-13-black border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            const option = $(
                "<td class='p-2 align-top activity border-bottom border-top-0' data-name1='BG' data-des='Xóa sản phẩm'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, chiTietChietKhau, thue, thanhTien, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            checkProductTaxValues();
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            // $("table tbody").sortable({
            //     axis: "y",
            //     handle: "td",
            // });
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
                // Lấy product_id của hàng đang được xóa
                var deletedProductId = $(this).closest("tr").find('.product_id').val();

                // Xóa hàng
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();

                // Chuyển đổi deletedProductId thành số nguyên (nếu cần)
                var deletedProductIdInt = parseInt(deletedProductId);

                // Kiểm tra xem deletedProductIdInt có tồn tại trong mảng arrProduct không
                var index = arrProduct.indexOf(deletedProductIdInt);
                if (index !== -1) {
                    // Xóa product_id khỏi mảng arrProduct
                    arrProduct.splice(index, 1);
                }
                var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
                var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
                $.ajax({
                    url: '{{ route('addActivity') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        des: des,
                    },
                    success: function(data) {}
                });
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
            $(document).on('change', 'select[name="discount_option[]"]', function() {
                const $row = $(this).closest('td');
                const $discountInput = $row.find('input[name="discount_input[]"]');
                if (this.value === '1') {
                    $discountInput.attr('placeholder', 'Tiền chiết khấu');
                } else if (this.value === '2') {
                    $discountInput.attr('placeholder', '% Chiết khấu');
                }
            });
            $(document).ready(function() {
                $('select[name="discount_option[]"]').each(function() {
                    const $row = $(this).closest('td');
                    const $discountInput = $row.find('input[name="discount_input[]"]');

                    if ($(this).val() === '1') {
                        $discountInput.attr('placeholder', 'Tiền chiết khấu');
                    } else if ($(this).val() === '2') {
                        $discountInput.attr('placeholder', '% Chiết khấu');
                    }
                });
            });
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
                //Hiển thị danh sách tên sản phẩm
                $('.product_name').on("click", function(e) {
                    e.stopPropagation();
                    $(".list_product").hide();

                    var clickedRow = $(this).closest('tr');
                    var listProduct = clickedRow.find(".list_product");
                    listProduct.toggle();

                    // Lấy product_id của sản phẩm đang chọn trong hàng này
                    var clickedProductId = clickedRow.find('.product_id').val();

                    // Lặp qua danh sách sản phẩm để ẩn những sản phẩm đã được chọn và không thuộc hàng đang click
                    $('.list_product li').each(function() {
                        var productId = $(this).data('id');
                        if (arrProduct.indexOf(productId) !== -1 &&
                            productId !==
                            clickedProductId) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                        if (clickedProductId == productId) {
                            $(this).show();
                        }
                    });
                });
                $(document).on("click", function(e) {
                    if (!$(e.target).is(".product_name")) {
                        $(".list_product").hide();
                    }
                });
                $('.idProduct').off('click').on('click', function(event) {
                    event.stopPropagation();

                    var clickedRow = $(this).closest('tr');
                    var productCode = clickedRow.find('.product_code');
                    var productName = clickedRow.find('.product_name');
                    var productUnit = clickedRow.find('.product_unit');
                    var quantity_input = clickedRow.find('.quantity-input');
                    var thue = clickedRow.find('.product_tax');
                    var product_id = clickedRow.find('.product_id');
                    var tonkho = clickedRow.find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = clickedRow.find('.soTonKho');
                    var infoProduct = clickedRow.find('.info-product');
                    var recentModal = clickedRow.find('.recentModal');
                    var inventory = clickedRow.find('.inventory');
                    var clickedProductId = $(this).parent().data('id');

                    arrProduct = [];
                    $('.product_id').each(function() {
                        arrProduct.push($(this).val());
                    });

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
                            tonkho.val(formatNumber(data
                                .product_inventory == null ? 0 :
                                data.product_inventory))
                            if (data.type == 2) {
                                soTonKho.text('');
                                inventory.hide();
                                quantity_input.val(1);
                            } else {
                                soTonKho.text(parseFloat(data
                                    .product_inventory == null ? 0 :
                                    data.product_inventory));
                                inventory.show();
                                quantity_input.val("");
                            }
                            infoProduct.show();
                            recentModal.show();
                            if (data.product_inventory > 0) {
                                inventory.show();
                            }
                            productCode.prop('readonly', true);
                            productUnit.prop('readonly', true);
                            $(".list_product").hide();
                            arrProduct = [];

                            // Thêm tất cả product_id hiện có vào mảng arrProduct
                            $('.product_id').each(function() {
                                // Lấy giá trị 'value' của phần tử input và chuyển đổi thành số nguyên
                                var productId = parseInt($(this)
                                    .val(), 10);
                                // Thêm giá trị vào mảng arrProduct
                                arrProduct.push(productId);
                            });
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
            //Xem giao dịch gần đây
            $('.recentModal').click(function() {
                var idProduct = $(this).closest('tr').find('.product_id').val();
                $.ajax({
                    url: '{{ route('getRecentTransaction') }}',
                    type: 'GET',
                    data: {
                        idProduct: idProduct
                    },
                    success: function(data) {
                        if (Array.isArray(data) && data.length > 0) {
                            $('#recentModal .modal-body tbody').empty();
                            data.forEach(function(productData) {
                                var newRow = $(
                                    '<tr class="position-relative">' +
                                    '<td class="text-13-black" id="productName"></td>' +
                                    '<td class="text-13-black" id="guestName"></td>' +
                                    '<td class="text-13-black" id="productPrice"></td>' +
                                    '<td class="text-13-black" id="productTax"></td>' +
                                    '<td class="text-13-black" id="dateProduct"></td>' +
                                    '</tr>');
                                newRow.find('#productName').text(productData
                                    .product_name);
                                newRow.find('#guestName').text(productData
                                    .guest_name);
                                newRow.find('#productPrice').text(
                                    formatCurrency(productData
                                        .price_export));
                                newRow.find('#productTax').text(
                                    productData.product_tax == 99 ?
                                    'NOVAT' : productData.product_tax +
                                    '%');
                                var formattedDate = new Date(productData
                                    .created_at).toLocaleDateString(
                                    'vi-VN');
                                newRow.find('#dateProduct').text(
                                    formattedDate);
                                newRow.appendTo(
                                    '#recentModal .modal-body tbody');
                            });
                        } else {
                            $('#recentModal .modal-body tbody').empty();
                        }
                    }
                });
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
                    $('input[name="quotation_number"]').val(data['resultNumber']);
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
                                var dateFormId = data[key]
                                    .date_form_id;
                                var formDesc = data[key].form
                                    .form_desc;
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
                                        '<li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" data-id = ' +
                                        representative.id + '>')
                                    .append(
                                        $('<a>').attr({
                                            href: '#',
                                            title: representative
                                                .represent_name,
                                            class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                            id: representative
                                                .id,
                                            name: 'search-represent',
                                        }).append(
                                            $('<span>').addClass(
                                                'text-13-black').text(
                                                representative
                                                .represent_name)
                                        )
                                    ).append(
                                        $('<div>').addClass(
                                            'dropdown')
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
                                                    $('<i>')
                                                    .addClass(
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
                                                    $('<i>')
                                                    .addClass(
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
                                                    $('<i>')
                                                    .addClass(
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
                                $('.represent_guest_id').val(
                                    defaultGuestItem
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

    function delayAndshowAutoToast(type, message, delayTime) {
        setTimeout(function() {
            showAutoToast(type, message);
        }, delayTime);
    }

    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val().trim();
        var guest_name = $('#guest_name').val().trim();
        var guest_address = $('#guest_address').val().trim();
        var guest_code = $('#guest_code').val().trim();
        var guest_email = $('#guest_email').val().trim();
        var guest_phone = $('#guest_phone').val().trim();
        var guest_receiver = $('#guest_receiver').val().trim();
        // var guest_email_personal = $('#guest_email_personal').val().trim();
        // var guest_phone_receiver = $('#guest_phone_receiver').val().trim();
        // var guest_note = $('#guest_note').val().trim();
        var key = $("input[name='key']").val().trim().trim();
        var represent_guest_name = $('#represent_guest_name').val().trim();
        if (!guest_name_display || !guest_address || !guest_code) {
            showAutoToast('warning', 'Vui lòng điền đủ thông tin khách hàng!');
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
                    guest_email: guest_email,
                    guest_phone: guest_phone,
                    guest_receiver: guest_receiver,
                    // guest_email_personal: guest_email_personal,
                    // guest_phone_receiver: guest_phone_receiver,
                    // guest_note: guest_note,
                    key: key,
                    represent_guest_name: represent_guest_name,
                },
                success: function(data) {
                    if (data.success) {
                        quotation = getQuotation1(data.key, '1');
                        $('input[name="quotation_number"]').val(quotation);
                        $('.nameGuest').val(data.guest_name_display);
                        showAutoToast('success', data.msg);
                        $('.idGuest').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();

                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL'); // Danh sách hiện có
                        var newListItem =
                            '<li class="p-2 align-items-center text-wrap border-top" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;" data-id="' +
                            newGuestInfo.id + '">' +
                            '<a href="#" title="' + newGuestInfo.guest_name_display +
                            '" style="flex:2;" id="' +
                            newGuestInfo.id + '" name="search-info" class="search-info">' +
                            '<span class="text-13-black">' + newGuestInfo
                            .guest_name_display + '</span>' +
                            '</a>' +
                            '<div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" aria-expanded="false">' +
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
                        $("#myUL .m-0.p-0.scroll-data").append(newListItem);

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
                                '<li class="border d-flex" data-id="' + newGuestInfo1.id +
                                '"><a href="#" title="' + newGuestInfo1.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo1.id_represent + '" name="search-represent">' +
                                '<span class="text-13-black">' +
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
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showAutoToast('warning', data.msg);
                            delayAndshowAutoToast('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showAutoToast('warning', data.msg);
                        }
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
                    $('#guest_email').val(data.guest_email);
                    $('#guest_phone').val(data.guest_phone);
                    $('#guest_receiver').val(data.guest_receiver);
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
            var guest_email = $('#guest_email').val().trim();
            var guest_phone = $('#guest_phone').val().trim();
            var guest_receiver = $('#guest_receiver').val().trim();
            $.ajax({
                url: '{{ route('updateGuest') }}',
                type: 'GET',
                data: {
                    update: 1,
                    guest_id: guest_id,
                    represent_id: represent_id,
                    guest_name: guest_name,
                    guest_address: guest_address,
                    guest_code: guest_code,
                    key: key,
                    guest_name_display: guest_name_display,
                    represent_guest_name: represent_guest_name,
                    guest_email: guest_email,
                    guest_phone: guest_phone,
                    guest_receiver: guest_receiver,
                },
                success: function(data) {
                    if (data.success) {
                        $('.nameGuest').val(data.updated_guest.guest_name_display);
                        showAutoToast('success', data.msg);
                        $('.idGuest').val(data.updated_guest.id);
                        $('.modal [data-dismiss="modal"]').click();
                        $('#myUL li[data-id="' + data.updated_guest.id +
                            '"] .text-13-black').text(data
                            .updated_guest.guest_name_display);
                        $('#representativeList li[data-id="' + data.updated_represent
                            .id +
                            '"] .text-nav').text(
                            data.updated_represent.represent_name);
                        $('#represent_guest').val(data.updated_represent
                            .represent_name);
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showAutoToast('warning', data.msg);
                            delayAndshowAutoToast('success',
                                'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showAutoToast('warning', data.msg);
                        }
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
                update: 1,
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
                    showAutoToast('success', data.message);
                } else {
                    showAutoToast('warning', data.message);
                }
            }
        });
    });
    //Thêm dự án
    $(document).on('click', '#addProject', function(e) {
        var project_name = $('#project_name').val().trim();
        if (!project_name) {
            showAutoToast('success', 'Vui lòng điền thông tin dự án!');
        } else {
            $.ajax({
                url: "{{ route('addProject') }}",
                type: "get",
                data: {
                    update: 1,
                    project_name: project_name,
                },
                success: function(data) {
                    if (data.success) {
                        $('#ProjectInput').val(data.project_name);
                        $('.idProject').val(data.id);
                        $('.modal [data-dismiss="modal"]').click();
                        showAutoToast('success', data.msg);
                        // Nếu thành công, tạo một mục mới
                        var newGuestInfo = data;
                        var guestList = $('#myUL7'); // Danh sách hiện có
                        var newListItem =
                            '<li class="border" data-id="' + newGuestInfo.id + '">' +
                            '<a href="#" class="text-dark d-flex justify-content-between p-2 search-project w-100" id="' +
                            newGuestInfo.id + '" name="search-project">' +
                            '<span class="text-13-black">' + newGuestInfo.project_name +
                            '</span>' +
                            '</a>' +
                            '<div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100 border-0 bg-transparent" style="margin-right:10px" aria-expanded="false">' +
                            '<i class="fa-solid fa-ellipsis" aria-hidden="true"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 1000;">' +
                            '<a class="dropdown-item delete-project w-100" href="#" data-id="' +
                            newGuestInfo.id + '" data-name="project">' +
                            '<i class="fa-solid fa-trash-can" aria-hidden="true"></i>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addProjectNew");
                        $(addButton).append(newListItem);
                        //clear
                        $('#project_name').val('');
                    } else {
                        showAutoToast('warning', data.msg);
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
                update: 1,
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#ProjectInput').val('');
                    $('.idProject').val('');
                    showAutoToast('success', data.message);
                } else {
                    showAutoToast('warning', data.message);
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
            showAutoToast('warning', 'Vui lòng chọn khách hàng trước khi tạo người đại diện!');
        } else {
            if (!represent_name) {
                showAutoToast('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: "{{ route('addRepresentGuest') }}",
                    type: "get",
                    data: {
                        update: 1,
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
                            showAutoToast('success', data.msg);
                            // Nếu thành công, tạo một mục mới
                            var newGuestInfo = data;
                            var guestList = $('#representativeList'); // Danh sách hiện có
                            var newListItem =
                                '<li class="border" data-id="' + newGuestInfo.id +
                                '"><a href="#" title="' + newGuestInfo.represent_name +
                                '" class="text-dark d-flex justify-content-between p-2 search-represent w-100" id="' +
                                newGuestInfo.id + '" name="search-represent">' +
                                '<span class="text-13-black">' +
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
                            showAutoToast('warning', data.msg);
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
                update: 1,
                itemId: itemId,
            },
            success: function(data) {
                if (data.success) {
                    $(e.target).closest('li').remove();
                    $('#represent_guest').val('');
                    $('.represent_guest_id').val('');
                    showAutoToast('success', data.message);
                } else if (data.success == false) {
                    showAutoToast('warning', data.message);
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
                showAutoToast('warning', 'Vui lòng điền thông tin người đại diện!');
            } else {
                $.ajax({
                    url: '{{ route('updateRepresent') }}',
                    type: 'GET',
                    data: {
                        update: 1,
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
                                '"] .text-13-black').text(
                                data.representGuest.represent_name);
                            $('#represent_guest').val(data.representGuest
                                .represent_name);
                            $('.represent_guest_id').val(data.representGuest.id);
                            $('.modal [data-dismiss="modal"]').click();
                            showAutoToast('success', data.msg);
                        } else {
                            showAutoToast('warning', data.msg);
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
                update: 1,
                represent_id: represent_id,
                guest_id: guest_id,
            },
            success: function(data) {
                if (data.success) {
                    $('#represent_guest').val(data.representGuest.represent_name);
                    $('.represent_guest_id').val(data.representGuest.id);
                    showAutoToast('success', 'Chọn mặc định người đại diện thành công!');
                } else {
                    showAutoToast('warning', 'Không tìm thấy người đại diện');
                }
            }
        });
    });

    //tính thành tiền của sản phẩm
    // $(document).on('input', '.quantity-input, [name^="product_price"],input[name="discount_input[]"]', function(e) {
    //     var $row = $(this).closest('tr');
    //     var discountOption = $row.find('select[name="discount_option[]"]').val();
    //     var discountInput = parseFloat($row.find('input[name="discount_input[]"]').val().replace(/[^0-9.-]+/g,
    //         "")) || 0;
    //     console.log(discountOption + "dasdas" + discountInput);
    //     var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
    //     var productPrice = parseFloat($(this).closest('tr').find('input[name^="product_price"]').val()
    //         .replace(
    //             /[^0-9.-]+/g, "")) || 0;
    //     updateTaxAmount($(this).closest('tr'));
    //     if (!isNaN(productQty) && !isNaN(productPrice)) {
    //         if (discountOption == 1) {
    //             var totalAmount = productQty * productPrice - discountInput;
    //         } else {
    //             var totalAmount = productQty * productPrice - (productQty * productPrice) * discountInput / 100;
    //         }
    //         $(this).closest('tr').find('.total-amount').val(formatCurrency(Math.round(totalAmount)));
    //         calculateTotalAmount();
    //         calculateTotalTax();
    //     }
    // });

    // $(document).on('change', '.product_tax,select[name="discount_option[]"]', function() {
    //     updateTaxAmount($(this).closest('tr'));
    //     calculateTotalAmount();
    //     calculateTotalTax();
    // });
    $(document).on('input',
        '.quantity-input, [name^="product_price"], input[name="discount_input[]"]',
        function(e) {
            var $row = $(this).closest('tr');
            updateRow($row);
        });

    $(document).on('change', '.product_tax, select[name="discount_option[]"]', function() {
        var $row = $(this).closest('tr');
        updateRow($row);
    });
    $(document).on('input',
        '#promotion-total',
        function(e) {
            calculateTotalTax();
        });

    function updateRow($row) {
        var discountOption = $row.find('select[name="discount_option[]"]').val();
        var discountInput = parseFloat($row.find('input[name="discount_input[]"]').val().replace(/[^0-9.-]+/g, "")) ||
            0;
        var productQty = parseFloat($row.find('.quantity-input').val()) || 0;
        var productPrice = parseFloat($row.find('input[name^="product_price"]').val().replace(/[^0-9.-]+/g, "")) || 0;

        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount = productQty * productPrice;
            if (discountOption == 1) {
                totalAmount -= discountInput;
            } else if (discountOption == 2) {
                totalAmount -= (totalAmount * discountInput) / 100;
            }
            $row.find('.total-amount').val(formatCurrency(Math.round(totalAmount)));
            updateTaxAmount($row, totalAmount); // Gọi hàm updateTaxAmount với tham số totalAmount
            calculateTotalAmount();
            calculateTotalTax();
            calculateGrandTotal();
        }
    }

    function updateTaxAmount($row, totalAmount) { // Thêm tham số totalAmount vào hàm updateTaxAmount
        var productQty = parseFloat($row.find('.quantity-input').val());
        var productPrice = parseFloat($row.find('input[name^="product_price"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat($row.find('.product_tax').val());

        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var taxAmount = (totalAmount * taxValue) /
                100; // Tính thuế dựa trên totalAmount thay vì productQty * productPrice

            $row.find('.product_tax1').text(Math.round(taxAmount));
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

    $(document).on('input', '#promotion-total', function(e) {
        calculateGrandTotal();
    });
    $(document).on('change', 'select[name="promotion-option-total"]', function() {
        calculateGrandTotal();
    });

    function calculateTotalTax() {
        checkProductTaxValues();
        var totalTax = 0;
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var promotionOption = $('select[name="promotion-option-total"]').val();
        var promotionTotal = parseFloat($('input[name="promotion-total"]').val().replace(/[^0-9.-]+/g, "")) || 0;
        if (promotionOption == 1) {
            totalAmount -= promotionTotal;
        } else if (promotionOption == 2) {
            totalAmount -= (totalAmount * promotionTotal) / 100;
        }
        if (checkProductTaxValues()) {
            var commonTaxRate = parseFloat($('select[name="product_tax[]"]').first().val());
            if (!isNaN(commonTaxRate)) {
                totalTax = totalAmount * (commonTaxRate / 100);
            }
        } else {
            $("#promotion-total").val(0);
            $('.addProduct').each(function() {
                var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
                if (!isNaN(rowTax)) {
                    totalTax += rowTax;
                }
            });
        }
        totalTax = Math.round(totalTax);
        $('#product-tax').text(formatCurrency(totalTax));
        calculateGrandTotal();
    }


    function calculateGrandTotal() {
        // Lấy giá trị tổng tiền và thuế
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

        // Lấy giá trị khuyến mãi
        var promotionOption = $('select[name="promotion-option-total"]').val();
        var promotionTotal = parseFloat($('input[name="promotion-total"]').val().replace(/[^0-9.-]+/g, "")) || 0;
        if (promotionOption == 1) {
            totalAmount -= promotionTotal;
        } else if (promotionOption == 2) {
            totalAmount -= (totalAmount * promotionTotal) / 100;
        }
        var grandTotal = totalAmount + totalTax;
        grandTotal = Math.round(grandTotal);
        $('#grand-total').text(formatCurrency(grandTotal));
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
        var giaNhap = parseFloat($(this).closest('tr').find('.giaNhap').val().replace(/[^0-9.-]+/g, "")) ||
            0;
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
    $('body').on('input',
        '.product_price, #transport_fee, .giaNhap, #voucher',
        function(event) {
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
        var previousProductNames = [];
        var invalidProductNames = [];

        function normalizeProductName(name) {
            var lowercaseName = name.toLowerCase();
            var normalized = lowercaseName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            return normalized;
        }

        (async function() {
            for (var i = 1; i < rows.length; i++) {
                if (rows[i].classList.contains('addProduct')) {
                    var inputs = rows[i].querySelectorAll('input[required]');
                    var productNameInput = rows[i].querySelector('.product_name');
                    var productName = productNameInput.value;
                    var normalizedProductName = normalizeProductName(productName).trim();

                    // Kiểm tra trùng lặp tên sản phẩm
                    if (previousProductNames.includes(normalizedProductName)) {
                        showAutoToast('warning', 'Tên sản phẩm bị trùng: ' + productName);
                        $('#excel_export').val(0);
                        $('#pdf_export').val(0);
                        return;
                    } else {
                        // Thêm tên sản phẩm đã chuẩn hóa vào mảng các tên sản phẩm đã xuất hiện trước đó
                        previousProductNames.push(normalizedProductName);
                    }

                    // Kiểm tra các trường input sản phẩm
                    for (var j = 0; j < inputs.length; j++) {
                        if (inputs[j].value.trim() === '') {
                            showAutoToast('warning', 'Vui lòng điền đủ thông tin sản phẩm');
                            $('#excel_export').val(0);
                            $('#pdf_export').val(0);
                            return; // Dừng ngay khi gặp một trường input thiếu thông tin
                        }
                    }

                    var inputQty = rows[i].querySelector('input[name="product_qty[]"]');
                    var value = parseFloat(inputQty.value);
                    if (isNaN(value) || value <= 0) {
                        // Nếu số lượng không hợp lệ, thêm tên sản phẩm vào mảng invalidProductNames
                        invalidProductNames.push(productName);
                        $('#excel_export').val(0);
                        $('#pdf_export').val(0);
                    }

                    hasProducts = true;
                }
            }

            if (invalidProductNames.length > 0) {
                var errorMessage = 'Các sản phẩm sau có số lượng không hợp lệ: ' + invalidProductNames.join(
                    ', ');
                showAutoToast('warning', errorMessage);
                return;
            }

            // Tiếp tục với các kiểm tra khác và xử lý submit nếu cần
            var inputValue = $('.idGuest').val();
            var shouldSubmit = true;

            if ($.trim(inputValue) === '') {
                showAutoToast('warning', 'Vui lòng chọn khách hàng từ danh sách hoặc thêm mới khách hàng!');
                shouldSubmit = false;
                $('#excel_export').val(0);
                $('#pdf_export').val(0);
            } else if (!hasProducts) {
                showAutoToast('warning', 'Không có sản phẩm để báo giá');
                shouldSubmit = false;
                $('#excel_export').val(0);
                $('#pdf_export').val(0);
            }

            // Kiểm tra số báo giá tồn tại bằng Ajax
            if (hasProducts && shouldSubmit) {
                var quotetion_number = $('input[name="quotation_number"]').val();
                $('.product_tax').prop('disabled', false);
                $.ajax({
                    url: "{{ route('checkQuotetionExportEdit') }}",
                    type: "get",
                    data: {
                        quotetion_number: quotetion_number,
                    },
                    success: function(data) {
                        if (!data['status']) {
                            showAutoToast('warning', 'Số báo giá đã tồn tại');
                            $('#excel_export').val(0);
                            $('#pdf_export').val(0);
                        } else {
                            // Nếu số báo giá không tồn tại, thực hiện submit form
                            $('form')[1].submit();
                        }
                    }
                });
            }
        })();
    }
    //Lưu và in
    document.addEventListener("DOMContentLoaded", function() {
        var excelLink = document.querySelector("#excel-link");
        var pdfLink = document.querySelector("#pdf-link");

        excelLink.addEventListener("click", function(event) {
            event.preventDefault();
            $('#excel_export').val(1);
            $('#luuNhap').click();
        });

        pdfLink.addEventListener("click", function(event) {
            event.preventDefault();
            $('#pdf_export').val(1);
            $('#luuNhap').click();
        });
    });
</script>
</body>

</html>
