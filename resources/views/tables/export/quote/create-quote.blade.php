<x-navbar :title="$title" activeGroup="sell" activeName="quote">
</x-navbar>
<form action="{{ route('detailExport.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0 margin-250 ">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn báo giá</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="last-span">Tạo đơn báo giá</span>
                </div>
                <div class="d-flex content__heading--right">
                        <div class="dropdown">
                            <a href="{{ route('detailExport.index', $workspacename) }}">
                                <button type="button" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100"
                                    style="margin-right:10px">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z" fill="#6D7075"/>
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="#6D7075"/>
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item" href="#">Xuất Excel</a>
                                <a class="dropdown-item" href="#">Xuất PDF</a>
                            </div>
                        </div>
                        <button type="submit" onclick="kiemTraFormGiaoHang(event);"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="white"/>
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
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-fixed2 " id="main">
            <div class="bg-filter-search border-top-0 text-center border-custom">
                <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
            </div>
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="col-12 p-0">
                        <section class="content">
                            <div class="content-info position-relative table-responsive text-nowrap order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="border-right px-2 p-0" style="width: 15%;padding-left:2rem;">
                                                <input type='checkbox' class='checkall-btn ml-4 mr-1'id="checkall"/>
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right px-2 p-0" style="width: 15%;">
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
                                                <span class="text-table text-secondary">Thành
                                                    tiền</span>
                                            </th>
                                            <th class="border-right note px-2 p-0">
                                                <span class="text-table text-secondary">Ghi chú</span>
                                            </th>
                                            <th class="border-right"></th>
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
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                            height="14" viewBox="0 0 18 18" fill="none">
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
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                            height="14" viewBox="0 0 18 18" fill="none">
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
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                            height="14" viewBox="0 0 18 18" fill="none">
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
                            <div class="row footer-total" style="width:95%;">
                                    <div class="position-relative col-lg-4 px-0"></div>
                                    <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                        <div class="m-3 ">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-13-black">Giá trị trước thuế:</span>
                                                <span id="total-amount-sum" class="text-table">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                                <span class="text-13-black">Thuế VAT:</span>
                                                <span id="product-tax" class="text-table">0đ</span>
                                            </div>
                                        
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-bold text-lg font-weight-bold">Tổng cộng:</span>
                                                <span id="grand-total" data-value="0"  class="text-13-bold text-lg font-weight-bold text-right">
                                                    0đ
                                                </span>
                                                <input type="text" hidden="" name="totalValue" value="0"id="total">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <section class="multiple_action" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="count_checkbox mr-5">Đã chọn 1</span>
                                <div class="row action">
                                    <div class="btn-chotdon my-2 ml-3">
                                        <button type="button" id="btn-chot"
                                            class="btn-group btn-light d-flex align-items-center h-100">
                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                    fill="#42526E" />
                                            </svg>
                                            <span class="px-1">Nhân hệ số</span>
                                        </button>
                                    </div>
                                    <div class="btn-xoahang my-2 ml-1">
                                        <button id="deleteExports" type="button"
                                            class="btn-group btn-light d-flex align-items-center h-100">
                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                    fill="#42526E" />
                                            </svg>
                                            <span class="px-1">Thuế</span>
                                        </button>
                                    </div>
                                    <div class="btn-huy my-2 ml-3">
                                        <button id="cancelBillExport"
                                            class="btn-group btn-light d-flex align-items-center h-100">
                                            <svg width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 15.75L2.25 2.25" stroke="#42526E"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M15.75 2.25L2.25 15.75" stroke="#42526E"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="px-1">Xóa</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="btn ml-auto cancal_action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M18 18L6 6" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18 6L6 18" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <!-- CREATE GUEST -->
            <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="content-info">
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13"> Tên hiển thị </p>
                                    </div>
                                    <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                        id="guest_name_display" autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0 text-13">
                                        <p class="p-0 m-0">
                                            Mã số thuế
                                        </p>
                                    </div>
                                    <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_code"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0 ">
                                        <p class="p-0 m-0 text-13">
                                            Địa chỉ
                                        </p>
                                    </div>
                                    <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_address"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Tên viết tắt</p>
                                    </div>
                                    <input name="key" type="text" placeholder="Nhập thông tin" id="key"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Tên đầy đủ</p>
                                    </div>
                                    <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_name"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Người đại diện</p>
                                    </div>
                                    <input name="" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                        id="represent_name"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">
                                            Số điện thoại
                                        </p>
                                    </div>
                                    <input name="guest_phone" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                        id="represent_phone"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">
                                            Email
                                        </p>
                                    </div>
                                    <input name="guest_email" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                        id="represent_email"
                                        autocomplete="off">
                                </div>
                                <div class="ml-2">
                                    <div class="py-2 border-0">
                                        <p class="p-0 m-0 text-13">Địa chỉ nhận hàng</p>
                                    </div>
                                    <input name="" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                         id="represent_address"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn-destroy btn-light" data-dismiss="modal">
                                <span>Trở về</span>
                            </button>
                            <button type="button" class="custom-btn" id="addGuest">
                                <span>Thêm khách hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EDIT GUEST -->
            <div class="modal fade" id="guestModalEdit" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="content-info">
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13"> Tên hiển thị </p>
                                        </div>
                                        <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                            class="guest_name_display border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off">
                                    </div>
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0 text-13">
                                            <p class="p-0 m-0">Mã số thuế</p>
                                        </div>
                                        <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                            class="guest_code border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off">
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0 ">
                                            <p class="p-0 m-0 text-13">Địa chỉ</p>
                                        </div>
                                        <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                            class="guest_address border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off" >
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Tên viết tắt</p>
                                        </div>
                                        <input name="key" type="text" placeholder="Nhập thông tin"
                                            class="key border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off" >
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Tên đầy đủ</p>
                                        </div>
                                        <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                            class="guest_name border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off" >
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Người đại diện</p>
                                        </div>
                                        <input name="represent_name" type="text" placeholder="Nhập thông tin"
                                            class="represent_name border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off">
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">
                                                Số điện thoại
                                            </p>
                                        </div>
                                        <input name="represent_phone" type="number" placeholder="Nhập thông tin"
                                            class="represent_phone border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off">
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">
                                                Email
                                            </p>
                                        </div>
                                        <input name="represent_email" type="email" placeholder="Nhập thông tin"
                                            class="represent_email border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" id="guest_email"
                                            autocomplete="off">
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Địa chỉ nhận hàng</p>
                                        </div>
                                        <input name="represent_address" type="text" placeholder="Nhập thông tin"
                                            class="represent_address border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off" >
                                    </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn-destroy btn-light" data-dismiss="modal">
                                <span>Trở về</span>
                            </button>
                            <button type="button" class="custom-btn" id="addGuest">
                                <span>Sửa khách hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CREATE REPRESENT -->
            <div class="modal fade" id="addRepresent" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="content-info">
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Người đại diện</p>
                                        </div>
                                        <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                            class="guest_name_display border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black"
                                            autocomplete="off">
                                    </div>
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0 text-13">
                                            <p class="p-0 m-0">Số điện thoại</p>
                                        </div>
                                        <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                            class="guest_code border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off">
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0 ">
                                            <p class="p-0 m-0 text-13">Email</p>
                                        </div>
                                        <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                            class="guest_address border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off" >
                                    </div>
                                    <div class="ml-2">
                                        <div class="py-2 border-0">
                                            <p class="p-0 m-0 text-13">Địa chỉ nhận</p>
                                        </div>
                                        <input name="key" type="text" placeholder="Nhập thông tin"
                                            class="key border w-100 py-2 border-top-0 border-left-0 border-right-0 bg-input-guest text-13-black" 
                                            autocomplete="off" >
                                    </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn-destroy btn-light" data-dismiss="modal">
                                <span>Trở về</span>
                            </button>
                            <button type="button" class="custom-btn" id="addGuest">
                                <span>Sửa khách hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin khách hàng --}}
        <div class="content margin-top-fixed2">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG</p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative" style="height:44px;" style="height:44px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">
                                Khách hàng
                        </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                                <input type="text" placeholder="Chọn thông tin"
                                     class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest " id="myInput"
                                     style="background-color:#F0F4FF; border-radius:4px;"
                                     autocomplete="off" required >
                                 <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                        </span>
                        <div class="">
                            <div id="myUL" class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block"
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
                                                <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                    <a href="#" title="{{ $guest_value->guest_name_display }}" style="flex:2;"
                                                        id="{{ $guest_value->id }}" name="search-info" class="search-info">
                                                            <span class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                                    </a>
                                                    <a id="{{ $guest_value->id }}" class="search-infoEdit" type="button" data-toggle="modal" data-target="#guestModalEdit" >
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"/>
                                                                <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"/>
                                                                <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"/>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                        data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                            </svg>
                                        </span>
                                        <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm khách hàng</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="content-info--common" id="show-info-guest">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" 
                                            id="represent_guest" style="flex:2;" placeholder="Chọn thông tin">
                                    <input type="hidden" class="represent_guest_id" name="represent_guest_id" autocomplete="off">
                                    <div id="myUL7"
                                        class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                        style="z-index: 99;">
                                        <div class="p-1">
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Nhập người đại diện"
                                                        class="pr-4 w-100 input-search bg-input-guest" id="companyFilter7">
                                                    <span id="search-icon" class="search-icon"><i
                                                        class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                </div>
                                        </div>
                                        <ul class="m-0 p-0 scroll-data" id="representativeList"></ul>
                                        <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                            data-toggle="modal" data-target="#addRepresent" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                </svg>
                                            </span>
                                            <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm người đại diện</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Số báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest"style="flex:2;" name="quotation_number" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" placeholder="Chọn thông tin" style="flex:2;" name="reference_number" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                <input class="text-13-black w-50 border-0 bg-input-guest " id="customDateInput" name="date_quote" style="flex:2;"  value="{{ date('Y-m-d') }}" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " placeholder="Chọn thông tin" name="price_effect" id="myInput-quote"
                                        style="flex:2;"  value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[quote]"
                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                        name="fieldDate[quote]"
                                        value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_field : '' }}">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" id="myInput-payment"
                                            placeholder="Chọn thông tin" style="flex:2;" name="terms_pay"
                                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_desc : '' }}"/>
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[payment]"
                                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                            name="fieldDate[payment]"
                                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_field : '' }}">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" placeholder="Chọn thông tin" id="ProjectInput" />
                                    <input type="hidden" class="idProject" autocomplete="off" name="project_id">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hàng hóa</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                            id="myInput-goods" placeholder="Chọn thông tin" name="goods"
                                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_desc : '' }}" />
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[goods]"
                                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                            name="fieldDate[goods]"
                                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_field : '' }}">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Giao hàng</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                            placeholder="Chọn thông tin" name="delivery" id="myInput-delivery"
                                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_desc : '' }}"/>
                                    <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[delivery]"
                                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                            name="fieldDate[delivery]"
                                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_field : '' }}">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa điểm</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                            placeholder="Chọn thông tin" name="location" id="myInput-location"
                                            value="{{ isset($dataForm['location']) ? $dataForm['location']->form_desc : '' }}"/>
                                    <input type="hidden" class="idDateForm" autocomplete="off"
                                            name="idDate[location]"
                                            value="{{ isset($dataForm['location']) ? $dataForm['location']->id : '' }}">
                                    <input type="hidden" class="nameDateForm" autocomplete="off"
                                            name="fieldDate[location]"
                                            value="{{ isset($dataForm['location']) ? $dataForm['location']->form_field : '' }}">
                                </li>
                            </ul>
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
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script type="text/javascript">
    // Số báo giáo
    getKeyGuest($('#guest_name_display'));
    //hiện danh sách project khi click trường tìm kiếm
    $("#listProject").hide();
    $("#ProjectInput").on("click", function() {
        $("#listProject").show();
    });
    //ẩn danh sách project
    $(document).click(function(event) {
        if (!$(event.target).closest("#ProjectInput").length) {
            $("#listProject").hide();
        }
    });
    //search thông tin project
    $(document).ready(function() {
        $("#ProjectInput").on("keyup", function() {
            var value = $(this).val().toUpperCase();
            $("#listProject li").each(function() {
                var text = $(this).find("a").text().toUpperCase();
                $(this).toggle(text.indexOf(value) > -1);
            });
        });
    });
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
    $("#myUL").hide();
    $("#myUL1").hide();
    $("#myUL2").hide();
    $("#myUL4").hide();
    $("#myUL5").hide();
    $("#myUL6").hide();
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
        toggleList($("#myInput-payment"), $("#myUL1"));
        toggleList($("#myInput-quote"), $("#myUL2"));
        toggleList($("#myInput-goods"), $("#myUL4"));
        toggleList($("#myInput-delivery"), $("#myUL5"));
        toggleList($("#myInput-location"), $("#myUL6"));
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
                        alert(data.msg);
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
                            '<div class="dropdown-menu date-form-setting" style="z-index: 100;">' +
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
                        alert(data.msg);
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
                "style":`height:80px`,
            });
            const maSanPham = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                "<span class='mx-2'>"+
                "<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>"+
                "<g clip-path='url(#clip0_1710_10941)'>"+
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>"+
                "</g>"+
                "<defs>"+
                "<clipPath id='clip0_1710_10941'>"+
                "<rect width='6' height='10' fill='white'/>"+
                "</clipPath>"+
                "</defs>"+
                "</svg>"+
                "</span>"+
                "<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>" +
                "<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code' name='product_code[]'>" +
                "</td>"
            );
            const tenSanPham = $(
                "<td class='border-right p-2 text-13 align-top position-relative'>" +
                    "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;'>" +
                        "@foreach ($product as $product_value)" +
                        "<li>" +
                            "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>" +
                                "<span class='w-50 text-13-black'>{{ $product_value->product_name }}</span>" +
                            "</a>" +
                        "</li>" +
                        "@endforeach" +
                    "</ul>" +
                    "<div class='d-flex align-items-center'>" +
                        "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                        "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                            "<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>" +
                               "<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>"+
                                    "<g clip-path='url(#clip0_2559_39956)'>"+
                                        "<path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>"+
                                        "<path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>"+
                                        "<path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>"+
                                    "</g>"+
                                    "<defs>"+
                                        "<clipPath id='clip0_2559_39956'>"+
                                            "<rect width='14' height='14' fill='white'/>"+
                                        "</clipPath>"+
                                    "</defs>"+
                                "</svg>"+
                            "</div>"+
                    "</div>"+
                "</td>"
            );
            const dvTinh = $(
                "<td class='border-right p-2 text-13 align-top'>"+
                    "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'>"+
                "</td>"
            );
            const soLuong = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                    "<div>"+
                        "<input type='text' class='text-right border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                        "<input type='hidden' class='tonkho'>" +
                    "</div>"+
                    "<div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>"+
                "</td>"
            );
            const donGia = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                "<div>"+
                    "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "</div>"+
                    "<div class='mt-3 text-13-blue transaction'>Giao dịch gần đây</div>"+
                "</td>"
            );
            const thue = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                    "<select name='product_tax[]' class='border-0 px-2 py-1 w-100 text-left product_tax' required>" +
                        "<option value='0'>0%</option>" +
                        "<option value='8'>8%</option>" +
                        "<option value='10'>10%</option>" +
                        "<option value='99'>NOVAT</option>" +
                    "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border-right p-2 text-13 align-top'>"+
                    "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border-right p-2 note text-13 align-top'>" +
                    "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            const option = $(
                "<td class='border-right p-2 align-top'>" +
                    "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                    "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                    "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh, soLuong, donGia, thue, thanhTien,ghiChu, option
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
                $('.cb-element').style["background-color"]="#F0F4FF";
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
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
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
                $('.inventory').hide();
                $('.transaction').hide();
                $('.idProduct').click(function() {
                    var productCode = $(this).closest('tr').find('.product_code');
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var prductPrice = $(this).closest('tr').find('.price_export');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var infoProduct = $(this).closest('tr').find('.info-product');
                    var inventory = $(this).closest('tr').find('.inventory');

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
                            prductPrice.val(data.price_export);
                            thue.val(data.product_tax);
                            product_id.val(data.id);
                            tonkho.val(data.product_inventory == null ? 0 : data.product_inventory)
                            soTonKho.text(parseFloat(data.product_inventory == null ? 0 :data.product_inventory));
                            infoProduct.show();
                            if (data.product_inventory > 0) {
                                $('.inventory').show();
                                $('.transaction').show();
                            }
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
            // //Mở rộng
            // if (status_form == 1) {
            //     $('.change_colum').text('Tối giản');
            //     $('.product_price').attr('readonly', false);
            //     // Xóa dữ liệu trường hệ số nhân, giá nhập
            //     $(this).closest("tr").find('.product_ratio').val('')
            //     $(this).closest("tr").find('.price_import').val('')
            //     // Xóa required
            //     $('tbody .giaNhap').removeAttr('required');
            //     $('.product-ratio').hide();
            //     $('.product_ratio').hide()
            //     $('.price_import').hide();
            //     $('.note').hide();
            //     $('.Daydu').hide();
            //     $('.heSoNhan').val('')
            //     $('.giaNhap').val('')
            // } else {
            //     $('.change_colum').text('Đầy đủ');
            //     $('.product_price').attr('readonly', true);
            //     $(this).closest("tr").find('.product_price').val('');
            //     // Xóa dữ liệu trương đơn giá
            //     $(this).closest("tr").find('.price_export').val('')
            //     // Thêm required
            //     $('tbody .giaNhap').attr('required', true);
            //     $('.product_ratio').show()
            //     $('.price_import').show();
            //     $('.note').show();
            //     $('.Daydu').show();
            //     $(this).closest("tr").find('.heSoNhan').val('');
            //     $(this).closest("tr").find('.giaNhap').val('');
            // }
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $('#show-info-guest').hide();
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
                        quotation = getQuotation(data['guest'].guest_name_display, data['count'], data['date']);
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
                                var formField = data[key].form.form_field;
                                var dateFormId = data[key].date_form_id;
                                var formDesc = data[key].form.form_desc;
                                $("input[name='fieldDate[" + key +"]']").val(key);
                                $("input[name='idDate[" + key +"]']").val(dateFormId);
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
                                var listItem = $('<li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">')
                                    .append($('<a>').attr({
                                            href: '#',
                                            title: representative.represent_name,
                                            class: 'text-dark d-flex justify-content-between search-represent p-2 w-100',
                                            id: representative.id,
                                            name: 'search-represent',
                                        }).append(
                                            $('<span>').addClass('text-13-black').text(representative.represent_name)
                                        ))
                                $('#representativeList').append(listItem);
                            });
                        }
                    });
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
                                $('#represent_guest').val(defaultGuestItem.represent_name);
                                $('.represent_guest_id').val(defaultGuestItem.id);
                            } else if (data.length === 1) {
                                $('#represent_guest').val(data[0].represent_name);
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

        // Lấy thông tin khách hàng chỉnh sửa
        $(document).on('click', '.search-infoEdit',function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('.guest_name_display').val(data['guest'].guest_name_display);
                    $('.guest_name').val(data['guest'].guest_name);
                    $('.guest_address').val(data['guest'].guest_address);
                    $('.key').val(data['guest'].key);
                    $('.guest_code').val(data['guest'].guest_code);
                }
            });
            $.ajax({
                url: '{{ route('getRepresentGuest') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    var defaultGuestItem = data.find(item => item.default_guest === 1);
                        if (data.length > 1 && defaultGuestItem) {
                                $('.represent_name').val(defaultGuestItem.represent_name);
                                $('.represent_email').val(defaultGuestItem.represent_email);
                                $('.represent_phone').val(defaultGuestItem.represent_phone);
                                $('.represent_address').val(defaultGuestItem.represent_address);
                                $('.represent_guest_id').val(defaultGuestItem.id);
                        } else if (data.length === 1) {
                                $('.represent_name').val(data[0].represent_name);
                                $('.represent_email').val(data[0].represent_email);
                                $('.represent_phone').val(data[0].represent_phone);
                                $('.represent_address').val(data[0].represent_address);
                                $('.represent_guest_id').val(data[0].id);
                        } else {
                                $('.represent_name').val('');
                                $('.represent_guest_id').val('');
                                $('.represent_name').val('');
                                $('.represent_email').val('');
                                $('.represent_phone').val('');
                                $('.represent_address').val('');
                        }
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
    })

    

    //Thêm thông tin khách hàng
    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val();
        var guest_name = $('#guest_name').val();
        var guest_address = $('#guest_address').val();
        var guest_code = $('#guest_code').val();
        var guest_email = $('#guest_email').val();
        var guest_phone = $('#guest_phone').val();
        var guest_receiver = $('#guest_receiver').val();
        var guest_email_personal = $('#guest_email_personal').val();
        var guest_phone_receiver = $('#guest_phone_receiver').val();
        var guest_note = $('#guest_note').val();
        var key = $("input[name='key']").val().trim();
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
                guest_email_personal: guest_email_personal,
                guest_phone_receiver: guest_phone_receiver,
                guest_note: guest_note,
                key: key,
            },
            success: function(data) {
                if (data.success) {
                    quotation = getQuotation(data.key, '1')
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data.guest_name_display);
                    alert(data.msg);
                    $('.idGuest').val(data.id);
                    $('.modal [data-dismiss="modal"]').click();
                    // Nếu thành công, tạo một mục mới
                    var newGuestInfo = data;
                    var guestList = $('#myUL'); // Danh sách hiện có
                    var newListItem =
                        '<li><a href="#" class="text-dark d-flex justify-content-between p-2 search-info" id="' +
                        newGuestInfo.id + '" name="search-info">' +
                        '<span class="w-50">' + newGuestInfo.guest_name_display +
                        '</span></a></li>';
                    // Thêm mục mới vào danh sách
                    var addButton = $(".addGuestNew");
                    $(newListItem).insertBefore(addButton);
                    //clear
                    $('#guest_name_display').val('');
                    $("input[name='key']").val('');
                    $('#guest_address').val(null);
                    $('#guest_code').val(null);
                    //
                    $('#show-info-guest').show();
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //tính thành tiền của sản phẩm
    $(document).on('input', '.quantity-input, [name^="product_price"]', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var productPrice = parseFloat($(this).closest('tr').find('input[name^="product_price"]').val()
            .replace(/[^0-9.-]+/g, "")) || 0;
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
        // var heSoNhan = parseFloat(row.find('.heSoNhan').val()) || 0;
        // var giaNhap = parseFloat(row.find('.giaNhap').val().replace(/[^0-9.-]+/g, "")) || 0;
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            var taxAmount = (totalAmount * taxValue) / 100;

            row.find('.product_tax1').text(Math.round(taxAmount));
        }
        // if (status_form == 1) {
        //     if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
        //         var totalAmount = productQty * productPrice;
        //         var taxAmount = (totalAmount * taxValue) / 100;

        //         row.find('.product_tax1').text(Math.round(taxAmount));
        //     }
        // } else {
        //     if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue) && !isNaN(heSoNhan) && !isNaN(giaNhap)) {
        //         var donGia = ((heSoNhan + 100) * giaNhap) / 100;
        //         var totalAmount = productQty * donGia;
        //         var taxAmount = (totalAmount * taxValue) / 100;

        //         row.find('.product_tax1').text(Math.round(taxAmount));
        //     }
        // }
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
    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa dữ liệu trường hệ số nhân, giá nhập
            $('.product_ratio').val('')
            $('.price_import').val('')
            // Xóa required
            $('tbody .giaNhap').removeAttr('required');
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            // Xóa dữ liệu trương đơn giá
            $('.product_price').val('');
            $('.total-amount').val('');
            $('#total-amount-sum').text('0đ');
            $('#grand-total').text('0đ');
            $('#product-tax').text('0đ');
            // Thêm required
            $('tbody .giaNhap').attr('required', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
    });
    //
    function kiemTraFormGiaoHang(event) {
        event.preventDefault();

        var rows = document.querySelectorAll('tr');
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                var inputs = rows[i].querySelectorAll('input[required]');
                for (var j = 0; j < inputs.length; j++) {
                    if (inputs[j].value.trim() === '') {
                        alert('Vui lòng điền đủ thông tin sản phẩm');
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
            alert('Vui lòng chọn khách hàng từ danh sách hoặc thêm mới khách hàng!');
            shouldSubmit = false;
        } else if (!hasProducts) {
            alert("Không có sản phẩm để báo giá");
            shouldSubmit = false;
        }

        // Kiểm tra số báo giá tồn tại bằng Ajax
        if (hasProducts && shouldSubmit) {
            var quotetion_number = $('input[name="quotation_number"]').val();
            $.ajax({
                url: "{{ route('checkQuotetionExport') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                },
                success: function(data) {
                    if (!data['status']) {
                        alert('Số báo giá đã tồn tại');
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
